<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';

import PlusIcon from 'vue-material-design-icons/Plus.vue'

const showDeleteModal = ref(false)

const deleteAddress = (id) => {
    router.delete(route('address.destroy', {
        id: id
    }), {
        onSuccess: () => {
            showDeleteModal.value = false
        }
    })
}
</script>

<template>
    <Head title="Address" />

    <AuthenticatedLayout>
        <div class="mt-12"></div>

        <div class="max-w-[1000px] mx-auto text-3xl mb-10">
            Your Addresses
        </div>

        <div v-show="$page.props.message" class="max-w-[1000px] mx-auto bg-teal-300 mb-3 px-2 flex justify-between">
            <div>{{ $page.props.message }}</div>
            <div @click="$page.props.message = null" class="px-2 cursor-pointer">x</div>
        </div>

        <div class="max-w-[1000px] mx-auto flex gap-2 h-[270px]">
            <div class="border border-dotted border-gray-400 rounded-md w-1/3">
                <Link v-if="!$page.props.auth.address" :href="route('address.add')">
                <div class="grid h-full place-items-center cursor-pointer">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <PlusIcon :size="50" />
                        </div>
                        <div class="font-bold text-2xl">Add Address</div>
                    </div>
                </div>
                </Link>

                <div v-else class="grid h-full place-items-center">
                    <div class="text-center">
                        <div class="font-bold text-2xl">Address is added</div>
                    </div>
                </div>
            </div>

            <div v-if="$page.props.auth.address" class="relative border border-gray-400 rounded-md w-1/3 shadow-md">
                <div class="flex items-center justify-start p-3 text-xs text-gray-600 font-extrabold border-b-gray-400">
                    Default: <img class="h-3 mt-1.5 ml-2" src="/images/logo/AMAZON_LOGO_DARK.png" alt="">
                </div>
                <div class="text-sm font-extrabold px-4 pt-4">
                    {{ $page.props.auth.user.first_name }} {{ $page.props.auth.user.last_name }}
                </div>
                <div class="text-sm px-4">
                    <div>{{ $page.props.auth.address.addr1 }}</div>
                    <div>{{ $page.props.auth.address.addr2 }}</div>
                    <div>{{ $page.props.auth.address.city }}</div>
                    <div>{{ $page.props.auth.address.post_code }}</div>
                    <div>{{ $page.props.auth.address.country }}</div>
                </div>
                <div class="px-4 absolute bottom-0 pb-4">
                    <button @click="showDeleteModal = true"
                        class="text-teal-700 text-sm font-extrabold hover:underline hover:text-red-700">
                        Remove
                    </button>
                    <!-- <Link :href="route('address.destroy', { id: $page.props.auth.address.id })" method="delete" as="button" class="text-teal-700 text-sm font-extrabold hover:underline hover:text-red-700">
                        Remove
                    </Link> -->
                </div>
            </div>
        </div>

        <!-- DeleteModal -->
        <Modal :show="showDeleteModal" maxWidth="lg">
            <div class="p-5 text-gray-200">
                <p class="text-black">Are you sure you want to remove your address info?</p>
                <div class="flex justify-end mt-5">
                    <button @click="deleteAddress($page.props.auth.address.id)" class="bg-teal-700 rounded text-sm font-extrabold px-2 py-1">
                    Remove
                    </button>
                    <button @click="showDeleteModal = false" class="bg-rose-500 rounded px-2 py-1 ml-2">Cancel</button>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
