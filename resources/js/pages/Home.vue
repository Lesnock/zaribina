<template>
    <Layout :userName="userName">
        <h1 class="text-2xl font-semibold mb-4">Bem-vindo à Home</h1>
        <p>Este é o painel inicial do sistema de vendas.</p>
    </Layout>
</template>

<script setup>
import Layout from '@/layouts/Layout.vue'
import { usePage } from '@inertiajs/vue3'

const userName = usePage().props.auth.user.name
</script>
