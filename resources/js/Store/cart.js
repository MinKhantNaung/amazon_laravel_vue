import { defineStore } from "pinia";
import { ref } from 'vue'

export const useCartStore = defineStore('cartStore', {
    state: () => ({ cart: [] }),
    actions: {
        removeProductFromCart(productId) {
            this.cart.forEach((product, index) => {
                if(product.id === productId) {
                    this.cart.splice(index, 1)
                }
            })
        }
    },
    persist: true
    // i am using pinia plugin persistedstate, so i will use only option API
    // benefits: by using that plugin, we can store in local-storage, store will not disappear even reload page.
    // Example: After store in pinia store, see in console/Application/Local Storage
})
