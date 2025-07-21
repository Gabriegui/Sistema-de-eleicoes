<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';

const form = useForm({
    Ano: '',
    Descricao: '',
});

const submit = () => {
    form.post('register-eleicao', {
        preserveScroll: true,
        onSuccess: () => {
            alert('Eleição registrada!')
        },
    })
}
</script>

<template>
    <AppLayout>
    <AuthBase title="Registre a eleição" description="Preencha as informações necessárias">
        <Head title="Eleição" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="Ano">Ano de eleição</Label>
                    <Input id="Ano" type="text" required autofocus :tabindex="1" v-model="form.Ano" placeholder="Ano de eleição" />
                    <p v-if="form.errors.Ano" class="text-sm text-red-600">{{ form.errors.Ano }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Descricao">Descrição</Label>
                    <Input id="Descricao" type="text" required :tabindex="2" v-model="form.Descricao" placeholder="Descrição" />
                    <p v-if="form.errors.Descricao" class="text-sm text-red-600">{{ form.errors.Descricao }}</p>
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Registrar
                </Button>
            </div>
        </form>
    </AuthBase>
    </AppLayout>
</template>