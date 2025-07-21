<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

type RelatedModel = {
  id: number;
  Nome: string;
  Sigla: string;
  Descricao: string;
};

type Candidatura = {
    id: number;
    Nome_urna: string;
    Numero_urna: number;
    candidato: RelatedModel;
    partido: RelatedModel;
    cargo: RelatedModel;
    status: RelatedModel;
    created_at: string;
}

defineProps<{
    candidaturas: Candidatura[]
}>();

const deleteCandidatura = (id: number) => {
    if (confirm('Você tem certeza que deseja deletar esta candidata?')) {
        router.delete(route('delete-candidatura', id));
    }
}

</script>

<template>
    <Head title="Lista de candidaturas" />
    <AppLayout> 
        <div>
            <div class="flex justify-center items-center gap-6 mb-8 mt-4">
                <h1 class="text-2xl font-bold mb-0">Lista de candidaturas</h1>
                <Link
                    :href="route('register-candidatura')"
                    class="inline-block rounded-sm border border-[#19140035] 
                    px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                    dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Registrar candidatura
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
                            <th class="px-4 py-2 border">Apelido</th>
                            <th class="px-4 py-2 border">Numero na urna</th>
                            <th class="px-4 py-2 border">Candidato</th>
                            <th class="px-4 py-2 border">Partido</th>
                            <th class="px-4 py-2 border">Cargo</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Criado em</th>
                            <th class="px-4 py-2 border">Editar/Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="candidatura in candidaturas" :key="candidatura.id">
                            <td class="px-4 py-2 border">{{ candidatura.id }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.Nome_urna }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.Numero_urna }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.candidato.Nome }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.partido.Sigla }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.cargo.Descricao }}</td>
                            <td class="px-4 py-2 border">{{ candidatura.status.Descricao }}</td>
                            <td class="px-4 py-2 border">
                                {{ new Date(candidatura.created_at).toLocaleString('pt-BR', { 
                                    day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'
                                }) }}
                            </td>
                            <Link
                                :href="route('edit-candidatura', candidatura.id)"
                                class="inline-block rounded-sm border border-[#19140035] 
                                px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                                dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                Edit
                            </Link>
                            <Button
                                @click="deleteCandidatura(candidatura.id)"
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