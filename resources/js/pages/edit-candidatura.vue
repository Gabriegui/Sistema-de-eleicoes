<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const props = defineProps(["candidatura"]);
const form = useForm({
    Apelido: props.candidatura.Apelido,
    partido: props.candidatura.partido.Nome,
    numero_urna: props.candidatura.numero_urna,
    ano_eleicao: props.candidatura.ano_eleicao
});

</script>

<template>
    <AppLayout>
    <AuthBase title="Edite a candidatura" description="Preencha as informações necessárias">
        <Head title="Edit candidatura" />

        <form @submit.prevent="form.put(route('update-candidatura', {id: candidatura.id}))" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="Apelido">Apelido</Label>
                    <Input id="Apelido" type="text" required autofocus :tabindex="1" v-model="form.Apelido" placeholder="Nome completo" />
                    <p v-if="form.errors.Apelido" class="text-sm text-red-600">{{ form.errors.Apelido }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="partido">Partido</Label>
                    <Input id="partido" type="text" required :tabindex="2" v-model="form.partido" placeholder="Partido" />
                    <p v-if="form.errors.partido" class="text-sm text-red-600">{{ form.errors.partido }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="numero_urna">Urna</Label>
                    <Input id="numero_urna" type="text" required :tabindex="3" v-model="form.numero_urna" placeholder="Urna" />
                    <p v-if="form.errors.numero_urna" class="text-sm text-red-600">{{ form.errors.numero_urna }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="ano_eleicao">Ano de eleição</Label>
                    <Input id="ano_eleicao" type="text" required :tabindex="4" v-model="form.ano_eleicao" placeholder="Ano" />
                    <p v-if="form.errors.ano_eleicao" class="text-sm text-red-600">{{ form.errors.ano_eleicao }}</p>
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