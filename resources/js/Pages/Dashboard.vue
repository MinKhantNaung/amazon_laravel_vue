<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Navigation } from 'vue3-carousel';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <Carousel :items-to-show="1" :wrap-around="true">
            <Slide v-for="slide in 6" :key="slide">
                <div class="carousel__item">
                    <img :src="`/images/carousel/slide${slide}.jpg`" alt="">
                </div>
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>

        <!-- Category Section Start -->
        <div class="relative -mt-[320px]">
            <div class="flex m-4 z-10 relative">
                <div class="bg-white p-2 mx-10 text-md w-full text-center">
                    You are on amazon.com You can also shop on Amazon UK for millions of products with fast local delivery.
                    <span class="underline text-teal-600 cursor-pointer">Click here to go to amazon.co.uk</span>
                </div>
            </div>

            <div class="grid grid-cols-3 m-4 z-10 relative">
                <div class="p-1.5 flex">
                    <div class="bg-white p-5">
                        <div class="text-2xl font-extrabold flex">Computers</div>
                        <div class="flex">
                            <img src="https://via.placeholder.com/1000x756" alt="" class="object-fill">
                        </div>
                        <button class="pt-3 -mb-2 text-teal-800 font-bold hover:underline hover:text-red-400 cursor-pointer">
                            See More
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Section End -->
    </AuthenticatedLayout>
</template>

<style>
    .carousel__item {
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel__prev,
    .carousel__next {
        widows: 40px;
        height: 200px;
        color: rgb(196, 196, 196);
        margin-top: -100px;
        border: transparent;
    }

    .carousel__prev:hover,
    .carousel__next:hover {
        width: 40px;
        height: 200px;
        color: rgb(212, 212, 212);
        /* margin-top: -100px; */
        border: 3px solid rgb(217, 217, 217);
    }
</style>
