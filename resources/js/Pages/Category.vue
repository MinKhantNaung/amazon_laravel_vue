<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { Carousel, Slide } from 'vue3-carousel';

defineProps({
    category: Object,
    products_of_category: Object,
})

</script>

<template>
    <Head title="Category" />

    <AuthenticatedLayout>
        <div class="w-full p-1 pt-2 mb-6">
            <div class="text-[27px] font-extrabold">{{ category.name }}</div>
            <div class="text-sm font-bold">
                Shop home entertainment, TVs, home audio, headphones, cameras, accessories and more
            </div>
        </div>

        <div class="border border-gray-300 rounded-lg text-sm py-3.5 px-10 mb-4">
            1-{{ products_of_category.length }} of over {{ products_of_category.length }} results for
            {{ category.name }}
        </div>

        <div class="grid grid-cols-4 gap-1">
            <div v-for="product in products_of_category" :key="product" class="m-1">
                {{ product }}
            </div>
        </div>
    </AuthenticatedLayout>
</template>
