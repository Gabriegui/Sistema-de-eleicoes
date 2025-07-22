<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

type Cargo = {
    id: number;
    Descricao: string;
    created_at: string;
}

defineProps<{
    cargos: Cargo[]
}>();

const deleteCargo = (id: number) => {
    if (confirm('Você tem certeza que deseja deletar este cargo?')) {
        router.delete(route('delete-cargo', id));
    }
}

</script>

<template>
    <Head title="Lista de cargos" />
    <AppLayout> 
        <div>
            <div class="flex justify-center items-center gap-6 mb-8 mt-4">
                <h1 class="text-2xl font-bold mb-0">Lista de cargos</h1>
                <Link
                    :href="route('register-cargo')"
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
                            <th class="px-4 py-2 border">Descrição</th>
                            <th class="px-4 py-2 border">Criado em</th>
                            <th class="px-4 py-2 border">Editar/Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cargo in cargos" :key="cargo.id">
                            <td class="px-4 py-2 border">{{ cargo.id }}</td>
                            <td class="px-4 py-2 border">{{ cargo.Descricao }}</td>
                            <td class="px-4 py-2 border">
                                {{ new Date(cargo.created_at).toLocaleString('pt-BR', { 
                                    day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'
                                }) }}
                            </td>
                            <Link
                                :href="route('edit-cargo', cargo.id)"
                                class="inline-block rounded-sm border border-[#19140035] 
                                px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] 
                                dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                                >
                                Edit
                            </Link>
                            <Button
                                @click="deleteCargo(cargo.id)"
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