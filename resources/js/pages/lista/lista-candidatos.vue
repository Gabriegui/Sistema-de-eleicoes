<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

type Candidato = {
    id: number;
    Nome: string;
    Email: string;
    Telefone: string;
    Titulo_eleitor: string;
    created_at: string;
}

defineProps<{
    candidatos: Candidato[]
}>();

const deleteCandidato = (id: number) => {
    if (confirm('Você tem certeza que deseja deletar este candidato?')) {
        router.delete(route('delete-candidato', id));
    }
}

</script>

<template>
    <Head title="Lista de candidatos" />
    <AppLayout> 
        <div>
            <div class="flex justify-center items-center gap-6 mb-8 mt-4">
                <h1 class="text-2xl font-bold mb-0">Lista de candidatos</h1>
                <Link
                    :href="route('register-candidato')"
                    class="inline-block rounded-sm border border-[#19140035] 
                    px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                    dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Registrar candidato
                </Link>
                <Link
                    :href="route('home')"
                    class="inline-block rounded-sm border border-[#19140035] 
                    px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                    dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Voltar para Menu
                </Link>
            </div>
            <div class ="flex justify-center">
                <table class="table-auto border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nome</th>
                            <th class="px-4 py-2 border">E-mail</th>
                            <th class="px-4 py-2 border">Telefone</th>
                            <th class="px-4 py-2 border">Titulo de eleitor</th>
                            <th class="px-4 py-2 border">Criado em</th>
                            <th class="px-4 py-2 border">Editar/Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="candidato in candidatos" :key="candidato.id">
                            <td class="px-4 py-2 border">{{ candidato.id }}</td>
                            <td class="px-4 py-2 border">{{ candidato.Nome }}</td>
                            <td class="px-4 py-2 border">{{ candidato.Email }}</td>
                            <td class="px-4 py-2 border">{{ candidato.Telefone }}</td>
                            <td class="px-4 py-2 border">{{ candidato.Titulo_eleitor }}</td>
                            <td class="px-4 py-2 border">
                                {{ new Date(candidato.created_at).toLocaleString('pt-BR', { 
                                    day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'
                                }) }}
                            </td>
                            <Link
                                :href="route('edit-candidato', candidato.id)"
                                class="inline-block rounded-sm border border-[#19140035] 
                                px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                                dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                Edit
                            </Link>
                            <Button
                                @click="deleteCandidato(candidato.id)"
                                class="inline-block rounded-sm border border-[#19140035] 
                                px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                                dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                Delete
                            </Button>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout> 
</template>