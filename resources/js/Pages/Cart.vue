<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, toRefs } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue'
import { useCartStore } from '@/Store/cart.js'
import { storeToRefs } from 'pinia';

const cartStore = useCartStore()
const { cart } = storeToRefs(cartStore)

const total = computed(() => {
    let total = 0
    cart.value.forEach(c => {
        total += c.price
    })

    if (total > 0) {
        return total.toFixed(2)
    }
    return 0
})

const totalWithOutDot = () => {
    let num = String(total.value).split('.').join('')
}

</script>

<template>
    <Head title="Cart" />

    <AuthenticatedLayout>
        <div class="flex gap-4">
            <div class="w-full bg-white p-4 mt-4">
                <div class="border-b">
                    <div class="text-[27px] font-semibold">Shopping Cart</div>
                    <div class="text-sm w-full flex justify-end items-center font-semibold">Price</div>
                </div>

                <div v-if="!cart.length" class="text-center font-bold text-2xl py-20">
                    Your Amazon Cart is empty
                </div>

                <div v-else v-for="product in cart" :key="product" class="flex border-b">
                    <img :src="product.image" class="h-[180px] mt-4">
                    <div class="flex justify-between mb-4">
                        <div class="pl-8 py-10 relative">
                            <span>{{ product.description.substring(0, 180) }}...</span>
                            <div class="text-teal-600 py-2">In Stock</div>
                            <div class="text-teal-600 absolute bottom-0 mb-4 flex items-center">
                                <div @click.prevent="cartStore.removeProductFromCart(product.id)"
                                    class="text-sm hover:underline cursor-pointer">
                                    Delete
                                </div>
                            </div>
                        </div>

                        <div class="py-10 justify-end">
                            <div class="font-bold py-20">{{ product.price }}</div>
                        </div>
                    </div>
                </div>

                <div class="font-extrabold text-[18px] pt-4 text-right">Subtotal (Items: {{ cart.length }}): ${{ total }}
                </div>
            </div>

            <div class="bg-white w-[350px] p-4 mt-4 h-48">
                <div class="text-sm text-green-700">
                    Welcome to Amazon! FREE Delivery on your first order to UK or Ireland.
                    Select this option at checkout.
                </div>
                <div class="font-extrabold text-[18px] pt-4">Subtotal (Items: {{ cart.length }}): ${{ total }}</div>
                <Link :href="$page.props.auth.user !== null ? route('checkout.index', {
                    total: totalWithOutDot(),
                    total_decimal: total,
                    items: cart
                }) : route('login')" as="button"
                    :class="Number(total) === 0.00 ? 'bg-gray-400' : 'bg-yellow-400 hover:bg-yellow-500'"
                    class="block mt-4 w-full text-center py-1 font-bold text-sm rounded-lg border shadow-sm cursor-pointer">
                Proceed To Checkout
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
