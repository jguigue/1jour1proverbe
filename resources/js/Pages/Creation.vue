<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/FormulaireCreation.vue";

import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
    <Head title="Création d'un proverbe" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un proverbe
            </h2>
            <Table />
        </template>
    </AuthenticatedLayout>
</template>
