import {createRouter, createWebHistory} from 'vue-router'
import products from '@/views/Products/index.vue'
import productsEdit from '@/views/Products/edit.vue'
import productsCreate from '@/views/Products/create.vue'
import sellCreate from '@/views/Sell/create.vue'
const routes = [
    {
        path: '/',
        name: '/',
        component: products
    },
    {
        path: '/product/edit/:id',
        name: '/product/edit',
        component: productsEdit
    },
    {
        path: '/product/create',
        name: '/product/create',
        component: productsCreate
    },
    {
        path: '/sell/create',
        name: '/sell/create',
        component: sellCreate
    }
]

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "active",
    routes
});

export default router