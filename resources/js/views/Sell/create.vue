<template>
    <h1>Sells</h1>
    <div class="mt-3">
        <div class="card-body d-flex justify-content-center ">
            <div class="w-75 mt-3">
                <form class="form-control">

                    <div>
                        <label for="select-product">Select a product:</label>
                        <select id="select-product" v-model="selectedProduct">
                            <option v-for="product in products" :key="product.id" :value="product.id">
                                {{ product.name }}
                            </option>
                        </select>
                        <p>You selected: {{ selectedProduct }}</p>
                    </div>

                    <div class="m-3">
                        <label for="quantity" class="form-label">Quantity:*</label>
                        <input required type="number" class="form-control" v-model="sell.quantity"
                            aria-describedby="quantity">
                    </div>
                    <div class="m-3">
                        <label for="name_seller" class="form-label">Name Seller:*</label>
                        <input required type="text" class="form-control" v-model="sell.name_seller"
                            aria-describedby="name_seller">
                    </div>


                    <div class=" m-4 d-grid gap-2 col-6 mx-auto">
                        <button type="button" @click="addProductToPurchase">Add Product</button>
                    </div>
                    <div class=" m-4 d-grid gap-2 col-6 mx-auto">
                        <button type="button" @click="createPurchase">Create Purchase</button>
                    </div>
                </form>
                {{ purchaseProducts }}
                <div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>

import axios from 'axios'
import Swal from 'sweetalert2';
import { useRouter } from 'vue-router';
import { ref } from 'vue'


const sell = ref({})
const products = ref({})
const selectedProduct = ref([])
const quantity = ref(0)
const nameSeller = ref('')
const purchaseProducts = ref([])

const createPurchase = async () => {
    try {
        const response = await axios.post('/api/purchases', {
            productIds: selectedProduct.value,
            quantity: quantity.value,
            sellerName: nameSeller.value
        });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
}

const addProductToPurchase = () => {
    if (selectedProduct && quantity > 0) {
        console.log(selectedProduct)
        const purchaseProduct = {
            productId: selectedProduct.id,
            name: selectedProduct.name,
            price: selectedProduct.price,
            quantity: quantity
        };
        console.log(purchaseProduct)
        purchaseProducts.push(purchaseProduct);
        selectedProduct = null;
        quantity = 0;
    }
}

const sendData = async () => {
    try {
        const res = await axios.post(`/api/sell`, sell)

        if (res.data.stock == false) {
            Swal.fire({
                title: 'Error!',
                text: res.data.message,
                icon: 'error',
            })
            redirect();
        }
        p
        if (res.data.success) {
            Swal.fire({
                title: 'Exitoso!',
                text: res.data.message,
                icon: 'success',
            })
            redirect();
        } else {
            Swal.fire({
                title: 'Error!',
                text: res.data.message,
                icon: 'error',
            })
        }
    } catch (e) {
        Swal.fire({
            title: 'Error!',
            text: response.value.message,
            icon: 'error',
        })
    } finally {
    }
}

const getDataProducts = async () => {
    try {
        const res = await axios.get('/api/product')
        products.value = res.data.data.data
    } catch (error) {

    }

}
getDataProducts()
</script>