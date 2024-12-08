<script setup lang="ts">
import { h } from 'vue'
import type { Option } from '@/types';
import { NDataTable, NButton, NSpace, useDialog, useNotification } from 'naive-ui';
import { router } from '@inertiajs/vue3'
import axios from 'axios'

defineProps<{
    options: Option[]
}>()

const dialog = useDialog()
const notification = useNotification()

function goToEdit(id: number) {
    return router.visit(route('options.edit', id))
}

async function destroy(id: number) {
    try {
        await axios.delete(`/opcionais/${id}`)
        router.reload()
        notification.success({ title: 'Sucesso', description: 'Opcional excluído com sucesso' })
    } catch (error) {
        console.error(error)
        notification.error({ title: 'Erro', description: 'Ocorreu um erro ao excluir o opcional' })
    }
}

function confirmDelete(id: number) {
    dialog.warning({
        title: 'Excluir Opcional',
        content: `Deseja realmente excluir o opcional ${id}?`,
        positiveText: 'Não',
        negativeText: 'Sim',
        onNegativeClick: () => destroy(id)
    })
}

const columns = [
    { key: 'id', title: 'ID' },
    { key: 'name', title: 'Nome' },
    { key: 'actions', title: 'Ações', render(row) {
        return h(NSpace, {}, {
            default: () => [
                h(NButton, {
                    strong: true,
                    size: 'small',
                    onClick: () => goToEdit(row.id)
                }, { default: () => 'Editar' }),
                h(NButton, {
                    strong: true,
                    size: 'small',
                    type: 'error',
                    onClick: () => confirmDelete(row.id),
                }, { default: () => 'Excluir' })
            ]
        })
    }}
]
</script>

<template>
    <div>
        <NDataTable :columns="columns" :data="options">
        </NDataTable>
    </div>
</template>
