<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { ref } from 'vue'
import { Head } from '@inertiajs/vue3';

interface Form {
    group_id: number
    description: string
    paid_price: number
    sell_price: number
    quantity: number
}

const form = ref<Form>({})
</script>

<template>
    <Head title="Zaribina - Store" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800"
                >
                    Produtos - Adicionar
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div>
                            <InputLabel for="description" value="Descrição" />

                            <TextInput
                                id="description"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                required
                                autocomplete="current-password"
                            />

                            <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
