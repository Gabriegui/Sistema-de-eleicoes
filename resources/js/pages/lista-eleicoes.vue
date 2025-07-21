<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

type Eleicao = {
    id: number;
    Ano: Number;
    Descricao: string;
    created_at: string;
}

defineProps<{
    eleicoes: Eleicao[]
}>();

const deleteEleicao = (id: number) => {
    if (confirm('Você tem certeza que deseja deletar esta eleição?')) {
        router.delete(route('delete-eleicao', id));
    }
}

</script>

<template>
    <Head title="Lista de eleições" />
    <AppLayout> 
        <div>
            <div class="flex justify-center items-center gap-6 mb-8 mt-4">
                <h1 class="text-2xl font-bold mb-0">Lista de eleições</h1>
                <Link
                    :href="route('register-eleicao')"
                    class="inline-block rounded-sm border border-[#19140035] 
                    px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                    dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Registrar eleição
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
                            <th class="px-4 py-2 border">Ano</th>
                            <th class="px-4 py-2 border">Descrição</th>
                            <th class="px-4 py-2 border">Criado em</th>
                            <th class="px-4 py-2 border">Editar/Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="eleicao in eleicoes" :key="eleicao.id">
                            <td class="px-4 py-2 border">{{ eleicao.id }}</td>
                            <td class="px-4 py-2 border">{{ eleicao.Ano }}</td>
                            <td class="px-4 py-2 border">{{ eleicao.Descricao }}</td>
                            <td class="px-4 py-2 border">
                                {{ new Date(eleicao.created_at).toLocaleString('pt-BR', { 
                                    day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'
                                }) }}
                            </td>
                            <Link
                                :href="route('edit-eleicao', eleicao.id)"
                                class="inline-block rounded-sm border border-[#19140035] 
                                px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                                dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                Edit
                            </Link>
                            <Button
                                @click="deleteEleicao(eleicao.id)"
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