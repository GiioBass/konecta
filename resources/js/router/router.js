import {createRouter, createWebHistory} from 'vue-router'
import products from '@/views/Products/index.vue'
import productsEdit from '@/views/Products/edit.vue'
import productsCreate from '@/views/Products/create.vue'
const routes = [
    {
        path: '/',
        component: products,
        name: '/'
    },
    {
        path: '/product/edit/:id',
        component: productsEdit,
        name: '/product/edit'
    },
    {
        path: '/product/create',
        component: productsCreate,
        name: '/product/create'
    }
]

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "active",
    routes
});

export default router