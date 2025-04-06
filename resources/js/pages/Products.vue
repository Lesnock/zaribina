<script setup>
import { usePage, Link } from '@inertiajs/vue3'
import Layout from '@/layouts/Layout.vue'
import Pagination from '@/components/Pagination.vue'

const { props } = usePage()

const products = props.products ?? { 
    data: [
        { id: 1, name: 'Produto 1', paidPrice: 10, sellPrice: 20, category: { name: 'Vestido Longo' } },
        { id: 1, name: 'Produto 2', paidPrice: 52, sellPrice: 112, category: { name: 'Camisa Regata' } },
    ]
}
const userName = props.auth.user.name
</script>

<template>
    <Layout :userName="userName">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Produtos</h1>
            <Link
                :href="route('products.index')"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
            >
                + Adicionar Produto
            </Link>
        </div>

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-100 text-sm text-gray-600">
                    <tr>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3">Categoria</th>
                        <th class="px-6 py-3">Preço Pago</th>
                        <th class="px-6 py-3">Preço de Venda</th>
                        <th class="px-6 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products.data" :key="product.id" class="border-t">
                        <td class="px-6 py-4">{{ product.name }}</td>
                        <td class="px-6 py-4">{{ product.category.name }}</td>
                        <td class="px-6 py-4">R$ {{ product.paidPrice.toFixed(2) }}</td>
                        <td class="px-6 py-4">R$ {{ product.sellPrice.toFixed(2) }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <Link
                                :href="route('products.index', product.id)"
                                class="text-blue-600 hover:underline"
                            >Ver</Link>
                            <Link
                                :href="route('products.index', product.id)"
                                class="text-blue-600 hover:underline"
                            >Editar</Link>
                        </td>
                    </tr>
                    <tr v-if="products.data.length === 0">
                        <td colspan="4" class="text-center text-gray-500 px-6 py-8">
                            Nenhum produto encontrado.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <Pagination :links="products.links" />
        </div>
    </Layout>
</template>
