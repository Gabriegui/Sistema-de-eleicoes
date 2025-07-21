<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps(["partido"]);
const form = useForm({
    Sigla: props.partido.Sigla,
    Nome: props.partido.Nome
});

</script>

<template>
    <AppLayout>
    <AuthBase title="Edite o partido" description="Preencha as informações necessárias">
        <Head title="Edit partido" />

        <form @submit.prevent="form.put(route('update-partido', {id: partido.id}))" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="Sigla">Sigla do partido</Label>
                    <Input id="Sigla" type="text" required autofocus :tabindex="1" v-model="form.Sigla" placeholder="Sigla do partido" />
                    <p v-if="form.errors.Sigla" class="text-sm text-red-600">{{ form.errors.Sigla }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Nome">Nome do partido</Label>
                    <Input id="Nome" type="text" required :tabindex="2" v-model="form.Nome" placeholder="Nome do partido" />
                    <p v-if="form.errors.Nome" class="text-sm text-red-600">{{ form.errors.Nome }}</p>
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Salvar
                </Button>
            </div>
        </form>
    </AuthBase>
    </AppLayout>
</template>