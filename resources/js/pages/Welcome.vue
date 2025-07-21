<script setup lang="ts">
    import { Head } from '@inertiajs/vue3';
    import AppLayout from '@/layouts/AppLayout.vue';
</script>

<template>
    <Head title="Home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLayout>
        <div>
            <h1 class="text-3xl font-bold">Welcome Page</h1>
        </div>
    </AppLayout>
</template>