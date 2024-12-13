<script setup lang="ts">
import type { Option, OptionValue } from '@/types';
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { NInput, NFormItem, NDynamicInput, NButton, NSpin, useNotification } from 'naive-ui'
import { router } from '@inertiajs/vue3'
import { delay } from '@/helpers'

const notification = useNotification()

const props = defineProps<{
    option?: Option
}>()

const form = ref<{
    name: string
    values: OptionValue[]
}>({
    name: '',
    values: [{ id: null, name: '' }]
})

const errors = ref<{
    name?: string
    values: { index: number, error: string }[]
}>({
    name: null,
    values: []
})

const loading = ref(false)

function addEmptyValue() {
    return { id: null, name: '' }
}

function notifyInvalidForm() {
    notification.error({
        title: 'Formulario inválido',
        duration: 4000
    })
}

function cleanErrors() {
    errors.value = {
        name: null,
        values: []
    }
}

function validate() {
    cleanErrors()
    if (!form.value.name) {
        notifyInvalidForm()
        errors.value.name = 'Opcional deve ter um nome'
        return false
    }
    for (const [index, value] of form.value.values.entries()) {
        if (!value.name) {
            notifyInvalidForm()
            errors.value.values.push({ index, error: 'Preencha o valor' })
            return false
        }
    }
    return true
}

async function submit() {
    loading.value = true
    await delay(500)
    if (!validate()) {
        loading.value = false
        return
    }
    send()
}

async function send() {
    try {
        const { method, url } = getEndpoint()
        const res = await axios[method](url, form.value)
        router.get(route('options.index'))
    } catch (error) {
        console.error(error)
        const message = error.response.data.error ?? 'Erro ao salvar formulário'
        notification.error({
            title: message,
            duration: 4000
        })
    } finally {
        loading.value = false
    }
}

function getEndpoint() {
    if (props.option) {
        return { method: 'put', url: `/opcionais/${props.option.id}` }
    }
    return { method: 'post', url: '/opcionais' }
}

onMounted(() => {
    if (props.option) {
        form.value.name = props.option.name
        form.value.values = props.option.values.map(value => ({
            id: value.id,
            name: value.name
        }))
    }
})
</script>

<template>
    <div>
        <NSpin :show="loading">
            <NFormItem label="Nome" :validation-status="errors.name ? 'error' : ''" :feedback="errors.name">
                <NInput
                    v-model:value="form.name"
                    placeholder="Digite o nome do opcional" />
            </NFormItem>

            <NFormItem label="Valores">
                <NDynamicInput v-model:value="form.values" @create="addEmptyValue">
                    <template #create-button-default>
                        Adicionar Valor
                    </template>
                    <template #default="{ value, index }">
                        <NInput
                            v-model:value="value.name"
                            :status="errors.values.find(v => v.index == index)?.error ? 'error' : ''"
                            placeholder="Digite o nome do valor" />
                    </template>
                </NDynamicInput>
            </NFormItem>

            <NButton @click="submit" type="success">
                Salvar
            </NButton>
        </NSpin>
    </div>
</template>
