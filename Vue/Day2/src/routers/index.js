import wrapper from '../wrapper.vue';
import {createRouter,createWebHistory} from 'vue-router'
import products from '../components/products.vue';
import cart from '../components/cart.vue';


const routes=[
    {path:'/',component:products},
    {path:'/cart',component:cart},
   
];
const router=createRouter({
    routes,
    history:createWebHistory()
})
export default router;
