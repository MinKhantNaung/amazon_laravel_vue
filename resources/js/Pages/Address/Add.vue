<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue';

import PlusIcon from 'vue-material-design-icons/Plus.vue'

const show = ref(true)

const page = usePage()

const form = useForm({
    country: 'United States',
    first_name: page.props.auth.user ? page.props.auth.user.first_name : '',
    last_name: page.props.auth.user ? page.props.auth.user.last_name : '',
    addr1: '',
    addr2: '',
    city: '',
    post_code: ''
})

const storeAddress = () => {
    form.post(route('address.store'))
}

</script>

<template>
    <Head title="Address" />

    <AuthenticatedLayout>
        <div class="mt-8"></div>

        <div class="w-[500px] mx-auto text-2xl font-extrabold">
            <div>Add a new address</div>

            <form @submit.prevent="storeAddress">
                <div class="text-[15px] -mb-1.5 font-extrabold">Country</div>
                <select v-model="form.country" name="country" class="
                w-full
                border-gray-300
                rounded-lg
                shadow-md
                py-1
                bg-gray-200
                hover:bg-gray-300
                cursor-pointer
                focus:border-orange-400
                focus:ring-orange-400
                ">
                    <option selected value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Albania">Albania</option>
                    <option value="France">France</option>
                </select>

                <div class="mt-4">
                    <InputLabel value="First Name" class="mb-1.5" />
                    <TextInput v-model="form.first_name" type="text" class="mt-1 block w-full" placeholder="First Name" disabled />
                    <InputError :message="form.errors.first_name" />
                </div>

                <div class="mt-3">
                    <InputLabel value="Last Name" class="mb-1.5" />
                    <TextInput v-model="form.last_name" type="text" class="mt-1 block w-full" placeholder="Last Name" disabled />
                    <InputError :message="form.errors.last_name" />
                </div>

                <div class="mt-3">
                    <InputLabel value="Address" class="mb-1.5" />
                    <TextInput v-model="form.addr1" type="text" class="mt-1 block w-full" placeholder="Address line 1" required />
                    <InputError :message="form.errors.addr1" />
                    <TextInput v-model="form.addr2" type="text" class="mt-1 block w-full" placeholder="Address line 2" required />
                    <InputError :message="form.errors.addr2" />
                </div>

                <div class="mt-3">
                    <div class="flex gap-2">
                        <div class="w-full">
                            <InputLabel class="mb-1.5" value="City" />
                            <TextInput v-model="form.city" type="text" class="mt-1 block w-full" placeholder="City" required />
                            <InputError :message="form.errors.city" />
                        </div>

                        <div class="w-full">
                            <InputLabel class="mb-1.5" value="Postcode" />
                            <TextInput v-model="form.post_code" type="text" class="mt-1 block w-full" placeholder="Postcode" required />
                            <InputError :message="form.errors.post_code" />
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button class="bg-yellow-400 px-3 font-bold text-[14px] rounded-lg shadow-sm cursor-pointer">
                        Add Address
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
