<template>
    <div class="card-body">
        <div class="m-3 d-flex justify-content-start">
            <h1>Products</h1>
        </div>
        <div class="m-3 d-flex justify-content-end">
            <router-link to="/product/create" class="btn btn-primary btn-lg ">Create Product</router-link>
        </div>

        <div>
            <table ref="tableProducts" class="table table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">Ref</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Date Creation</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" key="product.id">
                        <th scope="row">{{ product.reference }}</th>
                        <td>{{ product.name }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.weight }}</td>
                        <td>{{ product.category }}</td>
                        <td>{{ product.stock }}</td>
                        <td>{{ new Date(product.created_at).toLocaleDateString("en-US") }}</td>
                        <td>
                            <router-link :to="`/product/edit/${product.id}`" class="btn btn-primary"
                                type="submit">Edit</router-link>
                            <button @click="deleteProduct(product.id)" class="btn btn-primary" type="button">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script setup>

import axios from 'axios'
import { ref } from 'vue'
import Swal from 'sweetalert2';
import {useRouter} from 'vue-router';

const products = ref(null)
const router = useRouter()
const response = ref(null)

const getData = async () => {
    try {
        const res = await axios.get('/api/product')
        products.value = res.data.data.data
    } catch (error) {

    }

}

const deleteProduct = async (productId) => {
    try {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "Delete Product",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        });

        if (result.isConfirmed) {
            const res = await axios.delete(`/api/product/${productId}`);
            console.log(res)
            if(res.data.success){
                getData()
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
            }else {
                Swal.fire(
                    'Error!',
                    'Your file has not been deleted.',
                    'error'
                    )
            }
        }

    } catch (error) {
        console.log(error)
    }
}


getData()

</script>