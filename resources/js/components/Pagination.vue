<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    links: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div class="flex flex-wrap gap-2 justify-center">
        <template v-for="(link, index) in links" :key="index">
            <span
                v-if="!link.url"
                class="px-3 py-1 text-sm text-gray-400 border rounded"
                v-html="link.label"
            />

            <Link
                v-else
                :href="link.url"
                class="px-3 py-1 text-sm border rounded hover:bg-gray-100"
                :class="{
                    'bg-red-600 text-white border-red-600 hover:bg-red-700': link.active,
                    'text-gray-700': !link.active
                }"
                v-html="link.label"
            />
        </template>
    </div>
</template>

<style scoped>
span,
a {
    min-width: 36px;
    text-align: center;
}
</style>
