<template>
    <div class="d-flex justify-content-center align-items-baseline bg-dark text-light p-3" >
        <h4 class="w-100 text-center text-danger" v-if="store.getCart.length == 0">Sorry, your cart is empty. Please add more!</h4>
            <table class="table table-dark table-striped table-bordered text-center mt-2" v-else>
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in store.getCart" :key="product.item.id">
                        <td>{{ product.item.id }}</td>
                        <td>{{ product.item.name }}</td>
                        <td>{{ currencyFormater(product.item.price) }}</td>
                        <td>{{ product.quantity }}</td>
                        <td><img :src="product.item.image" alt="Book Image"></td>
                        <td>
                            <button class="btn btn-secondary rounded-circle" :disabled="product.item.instock == 0"  @click="handleAddToCart(product.item)">
                              <b> + </b>
                            </button> &nbsp;|&nbsp;  <button class="btn btn-secondary  rounded-circle" @click="handleDrobToCart(product.item)">
                              <b> - </b>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </template>

<script setup>
    import { useCartStore } from "../store/cart";
    const store = useCartStore();
    function currencyFormater(val) 
    {
        return Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
            minimumFractionDigits: 0
        }).format(val);
    };
    const handleAddToCart = async (product) => {
        try {
            await store.addToCart(product);
        } catch (error) {
            console.error("Error adding product to cart:", error);
        }
    };
    const handleDrobToCart = async (product) => {
        try {
            await store.reduseQuantity(product);
        } catch (error) {
            console.error("Error adding product to cart:", error);
        }
    };
</script>

<style>
.table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .table img:hover {
            transform: scale(1.2);
        }
</style>