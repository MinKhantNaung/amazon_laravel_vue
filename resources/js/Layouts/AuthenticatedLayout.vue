<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue'
import MenuDownIcon from 'vue-material-design-icons/MenuDown.vue'
import MagnifyIcon from 'vue-material-design-icons/Magnify.vue'
import CartMinusIcon from 'vue-material-design-icons/CartMinus.vue'

const showingNavigationDropdown = ref(false);

</script>

<template>
    <div class="min-w-[1150px] bg-gray-100 h-full">
        <!-- Main Layout Section Start -->
        <div class="flex items-center bg-gray-900 h-[60px] py-2 fixed z-50 min-w-[1150px] w-full">
            <div class="flex">
                <Link class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300 text-white">
                Amazon
                </Link>

                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300 text-white">
                    <div class="flex items-center justify-center">
                        <MapMarkerOutlineIcon class="pt-2 -ml-1" fillColor="#f5f5f5" />

                        <div>
                            <div class="text-[13px] text-gray-300 font-extrabold">
                                <div>
                                    Delivery to John
                                </div>
                            </div>

                            <div class="text-[15px] text-white -mt-1.5 font-extrabold">
                                <div>
                                    London SW2 SW2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex grow items-center h-[45px] px-1">
                <div
                    class="flex items-center justify-center bg-gray-100 border-r border-r-gray-300 font-extrabold text-[11px] text-gray-600 w-[60px] h-[40px] rounded-l-md cursor-pointer">
                    <div class="pt-[3px]">
                        All
                    </div>
                    <MenuDownIcon fillColor="#5E5E5E" :size="20" class="-mr-2" />
                </div>
                <input type="text"
                    class="block w-full border-none border-transparent focus:border-transparent focus:ring-0">
                <div class="cursor-pointer bg-orange-300 p-[5px] px-2 rounded-r-md">
                    <MagnifyIcon :size="30" />
                </div>
            </div>

            <div class="flex">
                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300">
                    <div class="flex items-center justify-center mt-1.5 px-1">
                        <img src="https://via.placeholder.com/35x20" alt="">
                        <div class="text-[15px] text-white -mt-2 -mr-0.5 font-extrabold">EN</div>
                        <MenuDownIcon fillColor="#c2c2c2" :size="20" class="-mr-4 -mt-1.5 pr-1" />
                    </div>
                </div>

                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300">
                    <div class="flex items-center justify-center">
                        <div>
                            <div class="text-[12px] text-white font-extrabold">
                                Hello,
                                <span>Sign In</span>
                            </div>
                            <div class="flex items-center">
                                <div class="text-[15px] text-white -mt-1.5 font-extrabold">Account & List</div>
                                <MenuDownIcon fillColor="#c2c2c2" :size="20" class="-mr-4 -mt-1 pr-1" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300">
                    <div class="flex items-center justify-center">
                        <div>
                            <div class="text-[12px] text-white font-extrabold">Returns</div>
                            <div class="flex items-center">
                                <div class="text-[15px] text-white -mt-1.5 font-extrabold">& Orders</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative h-[50px] p-2 border-[1px] border-gray-900 rounded-sm hover:border-gray-300">
                    <span class="absolute text-center right-[21px] w-[14px] -top-0 rounded-full text-[20px]">
                        <div class="text-orange-400 font-extrabold bg-gray-900 h-[16px]">0</div>
                    </span>
                    <div class="flex items-center justify-center">
                        <CartMinusIcon fillColor="#FCFCFC" :size="40" class="-mt-0.5" />
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Layout Section End -->
    </div>
</template>
