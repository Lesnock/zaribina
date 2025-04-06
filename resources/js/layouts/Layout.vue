<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { Menu as MenuIcon } from 'lucide-vue-next'
import { usePage } from '@inertiajs/vue3'
import NavLink from '@/components/NavLink.vue'

const sidebarOpen = ref(false)
const dropdownOpen = ref(false)
const mobileDropdownOpen = ref(false)
const dropdownRef = ref(null)
const mobileDropdownRef = ref(null)
const page = usePage()

defineProps({
    userName: {
        type: String,
        required: true
    }
})

function toggleSidebar() {
    sidebarOpen.value = !sidebarOpen.value
}

function handleClickOutside(event) {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        dropdownOpen.value = false
    }
    if (mobileDropdownRef.value && !mobileDropdownRef.value.contains(event.target)) {
        mobileDropdownOpen.value = false
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside)
})

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside)
})
</script>

<template>
    <div class="min-h-screen flex flex-col bg-gray-50 text-gray-800">
        <header class="flex items-center justify-between bg-white shadow-md px-6 py-3 border-b">
            <div class="flex items-center space-x-3">
                <img src="/images/logo.png" alt="Logo" class="h-8 w-auto" />
            </div>

            <!-- Mobile: nome + menu -->
            <div class="flex items-center space-x-4 md:hidden">
                <div class="relative" ref="mobileDropdownRef">
                    <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="font-medium focus:outline-none">
                        {{ userName }}
                    </button>
                    <div v-if="mobileDropdownOpen"
                        class="absolute right-0 mt-2 w-48 bg-white border rounded shadow z-50">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Alterar senha</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sair</a>
                    </div>
                </div>
                <button @click="toggleSidebar">
                    <MenuIcon class="w-6 h-6 text-gray-700" />
                </button>
            </div>

            <!-- Desktop: dropdown -->
            <div class="hidden md:block relative" ref="dropdownRef">
                <button @click="dropdownOpen = !dropdownOpen"
                    class="font-medium focus:outline-none hover:text-gray-600 transition">
                    {{ userName }}
                </button>
                <div v-if="dropdownOpen"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded shadow z-50">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Alterar senha</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sair</a>
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden">
            <aside
                :class="[
                    'bg-white shadow-md w-full md:w-64 p-4 space-y-2 md:block transition-all',
                    sidebarOpen ? 'block' : 'hidden'
                ]"
                class="absolute md:relative z-10"
            >
                <nav class="space-y-2">
                    <NavLink name="Início" icon="home" routeName="home" />
                    <NavLink name="Produtos" icon="box" routeName="products.index" />
                    <!-- <NavLink name="Compras" icon="shopping-cart" routeName="compras" />
                    <NavLink name="Vendas" icon="dollar-sign" routeName="vendas" />
                    <NavLink name="Estoque" icon="archive" routeName="estoque" /> -->
                </nav>
            </aside>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6">
                <div class="bg-white rounded-xl shadow p-6 min-h-full">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>