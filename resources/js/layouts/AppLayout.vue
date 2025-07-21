<script setup>
    import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div>
        <nav class="topnav">
            <div class="space-x-4">
                <Link class="link" :href="route('home')">Home</Link>
                <Link class="link" :href="route('lista-eleicoes')">Eleições</Link>
                <Link class="link" :href="route('lista-candidatos')">Candidatos</Link>
                <Link class="link" :href="route('lista-candidaturas')">Candidaturas</Link>
                <Link class="link" :href="route('lista-partidos')">Partidos</Link>
                <Link class="link" :href="route('lista-cargos')">Cargos</Link>
                <Link class="link" :href="route('lista-status')">Status</Link>
            </div>
        </nav>

        <main class="p-6">
            <slot />
        </main>
    </div>
</template>

