<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    product: Object,
})

</script>

<template>
    <div class="border border-gray-300 rounded-md bg-white p-1.5">
        <Link :href="route('products.index', { id: product.id })" class="w-full">
            <img :src="product.image" alt="" class="rounded-md w-full">
            <div class="text-left">
                <div class="text-[16px] text-gray-900 font-extrabold cursor-pointer">
                    {{ product.title }}
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-2xl p-1 font-semibold w-full text-left">${{ product.price }}</div>
                    <img src="/images/logo/PRIME_LOGO.png" alt="" width="80">
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-md p-1 font-semibold w-full text-left">In Stock</div>
                </div>
                <div class="flex justify-between items-center">
                    <img src="/images/STARS.png" alt="" width="80">
                </div>
            </div>
        </Link>
    </div>
</template>
