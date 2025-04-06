<template>
    <a :href="route(routeName)"
        class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition font-medium"
        :class="{ 'bg-gray-200 text-gray-900': isActive }">
        <component :is="iconComponent" class="w-5 h-5" />
        <span>{{ name }}</span>
    </a>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import * as icons from 'lucide-vue-next'

const props = defineProps({
    name: String,
    routeName: String,
    icon: String
})

console.log()

const page = usePage()
const isActive = route().current() == props.routeName
const iconComponent = icons[props.icon[0].toUpperCase() + props.icon.slice(1)]
</script>
