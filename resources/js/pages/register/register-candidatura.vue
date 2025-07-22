<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    Candidato: '',
    Apelido: '',
    Partido: '',
    Urna: '',
    Cargo: '',
    Status: ''
});

const submit = () => {
    form.post('register-candidatura', {
        preserveScroll: true,
        onSuccess: () => {
            alert('Candidatura registrada!')
        },
    })
}

</script>

<template>
    <AppLayout>
    <AuthBase title="Registre a candidatura" description="Outros valores precisam estar registrado para a candidatura ser validada.">
        <Head title="Candidatura" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="Candidato">Nome do candidato</Label>
                    <Input id="Candidato" type="text" v-model="form.Candidato" required placeholder="Nome completo" />
                    <p v-if="form.errors.Candidato" class="text-sm text-red-600">{{ form.errors.Candidato }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Apelido">Apelido</Label>
                    <Input id="Apelido" type="text" required autofocus :tabindex="2" v-model="form.Apelido" placeholder="Apelido" />
                    <p v-if="form.errors.Apelido" class="text-sm text-red-600">{{ form.errors.Apelido }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Partido">Partido do candidato</Label>
                    <Input id="Partido" type="text" required :tabindex="3" v-model="form.Partido" placeholder="Partido" />
                    <p v-if="form.errors.Partido" class="text-sm text-red-600">{{ form.errors.Partido }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Urna">Número da urna</Label>
                    <Input id="Urna" type="text" required :tabindex="4" v-model="form.Urna" placeholder="Número da urna" />
                    <p v-if="form.errors.Urna" class="text-sm text-red-600">{{ form.errors.Urna }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Cargo">Cargo do candidato</Label>
                    <Input id="Cargo" type="text" required :tabindex="5" v-model="form.Cargo" placeholder="Cargo" />
                    <p v-if="form.errors.Cargo" class="text-sm text-red-600">{{ form.errors.Cargo }}</p>
                </div>

                <div class="grid gap-2">
                    <Label for="Status">Status da candidatura</Label>
                    <Input id="Status" type="text" required :tabindex="6" v-model="form.Status" placeholder="Status" />
                    <p v-if="form.errors.Status" class="text-sm text-red-600">{{ form.errors.Status }}</p>
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
