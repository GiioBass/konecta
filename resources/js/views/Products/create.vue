<template>
    <div>
        <h1>Create Product</h1>
    </div>
    <div class="mt-3">
        <div class="card-body d-flex justify-content-center ">
        <div class="w-75 mt-3">
            <form class="form-control" @submit.prevent="sendData">
                <div class="m-3">
                    <label for="reference" class="form-label">Reference:*</label>
                    <input required type="text" class="form-control" v-model="product.reference" aria-describedby="reference">
                </div>
                <div class="m-3">
                    <label for="name" class="form-label">Name:*</label>
                    <input required type="text" class="form-control" v-model="product.name" aria-describedby="name">
                </div>
                <div class="m-3">
                    <label for="category" class="form-label">Category:*</label>
                    <input required type="text" class="form-control" v-model="product.category" aria-describedby="category">
                </div>
                <div class="m-3">
                    <label for="price" class="form-label">Price:*</label>
                    <input required type="number" class="form-control" v-model="product.price" aria-describedby="price">
                </div>
                <div class="m-3">
                    <label for="weight" class="form-label">Weight:*</label>
                    <input required type="number" class="form-control" v-model="product.weight" aria-describedby="weight">
                </div>
                <div class="m-3">
                    <label for="stock" class="form-label">Stock:*</label>
                    <input required type="number" class="form-control" v-model="product.stock" aria-describedby="stock">
                </div>

                <div class=" m-4 d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>

    </div>
</template>
<script setup>

import axios from 'axios'
import Swal from 'sweetalert2';
import {useRouter} from 'vue-router';
import { ref } from 'vue'


const response = ref(null);
const product = ref({})
const router = useRouter();

const redirect = () => {
    router.push('/');
}
const sendData = async () => {
    try {
        const res = await axios.post(`/api/product`, product)
        if (res.data.success) {
            Swal.fire({
                title: 'Exitoso!',
                text: res.data.message,
                icon: 'success',
            })
            redirect();
        }else {
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
</script>