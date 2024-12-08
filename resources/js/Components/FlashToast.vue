<script setup lang="ts">
import { onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { useNotification } from 'naive-ui'

const page = usePage()
const notification = useNotification()

onMounted(() => {
    if (page.props.flash.message) {
        notification[page.props.flash.type ?? 'create']({
            title: page.props.flash.message,
            duration: 4000
        })
    }
})
</script>

<template>
</template>
