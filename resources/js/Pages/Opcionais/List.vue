<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, router } from '@inertiajs/vue3';
import { Option } from '@/types'
import OptionTable from '@/Components/OptionTable.vue';

defineProps<{
    options: Option[]
}>()
</script>

<template>
    <Head title="Zaribina - Store" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800"
                >
                    Opcionais
                </h2>

                <PrimaryButton type="button" @click="router.visit(route('options.create'))">
                    + Adicionar
                </PrimaryButton>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <OptionTable :options="options" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
