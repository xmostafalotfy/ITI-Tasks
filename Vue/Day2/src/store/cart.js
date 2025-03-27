import { defineStore } from 'pinia'
export const useCartStore = defineStore('cart', {
    state: () => ({ cart: [] }),
    getters: {
      getCart: (state) => state.cart,
    },
    actions: {
      async addToCart(item) {

        const existingItem = this.cart.find(cartItem => cartItem.item.id === item.id);
        if (existingItem) {
          existingItem.quantity += 1; 
          
        } else {
          this.cart.push({ item: item, quantity: 1 });
        }
        const cartItemIndex = this.cart.findIndex(e => e.item.id === item.id);
        if (cartItemIndex !== -1) {
          this.cart[cartItemIndex] = {
            ...this.cart[cartItemIndex],
            item: { ...this.cart[cartItemIndex].item, instock: this.cart[cartItemIndex].item.instock - 1 }
          };
        }
        console.log(item.instock);
        const updatedItem = { ...item, instock: item.instock-1 };
        
        await fetch(`http://localhost:5500/products/${item.id}`, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updatedItem) 
        });
      },

      async reduseQuantity(item){
        
        const existingItem = this.cart.find(cartItem => cartItem.item.id === item.id);
        if (existingItem.quantity > 1) {
          existingItem.quantity -= 1; 
        } else {
          this.cart = this.cart.filter(cartItem => cartItem.item.id !== item.id);
        }
        
        
        const cartItemIndex = this.cart.findIndex(e => e.item.id === item.id);
        if (cartItemIndex !== -1) {
          this.cart[cartItemIndex] = {
            ...this.cart[cartItemIndex],
            item: { ...this.cart[cartItemIndex].item, instock: this.cart[cartItemIndex].item.instock +1 }
          };
        }
        console.log(item.instock);
        const updatedItem = { ...item, instock: item.instock+1};

        await fetch(`http://localhost:5500/products/${item.id}`, {
            method: "PUT",
            body: JSON.stringify(updatedItem) 
        });
      }
    },
  })
