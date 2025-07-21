<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';

const props = defineProps(["candidato"]);
const form = useForm({
    Nome: props.candidato.Nome,
    Email: props.candidato.Email,
    Telefone: props.candidato.Telefone,
    Titulo_eleitor: props.candidato.Titulo_eleitor,
});

</script>

<template>
    <AppLayout>
    <AuthBase title="Edite o candidato" description="Preencha as informações necessárias">
        <Head title="Edit candidato" />

        <form @submit.prevent="form.put(route('update-candidato', {id: candidato.id}))" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="Nome">Nome</Label>
                    <Input id="Nome" type="text" required autofocus :tabindex="1" v-model="form.Nome" placeholder="Nome completo" />
                    <p v-if="form.errors.Nome" class="text-sm text-red-600">{{ form.errors.Nome }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Email">E-mail</Label>
                    <Input id="Email" type="text" required :tabindex="2" v-model="form.Email" placeholder="Email" />
                    <p v-if="form.errors.Email" class="text-sm text-red-600">{{ form.errors.Email }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Telefone">Telefone</Label>
                    <Input id="Telefone" type="text" required :tabindex="3" v-model="form.Telefone" placeholder="Telefone" />
                    <p v-if="form.errors.Telefone" class="text-sm text-red-600">{{ form.errors.Telefone }}</p>
                </div>

                <div>
                    <Label for="Titulo_eleitor">Titulo de eleitor</Label>
                    <Input id="Titulo_eleitor" type="text" required :tabindex="4" v-model="form.Titulo_eleitor" placeholder="Apelido" />
                    <p v-if="form.errors.Titulo_eleitor" class="text-sm text-red-600">{{ form.errors.Titulo_eleitor }}</p>
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