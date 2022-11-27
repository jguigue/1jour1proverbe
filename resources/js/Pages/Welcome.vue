<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AccueilLayout from "@/Layouts/AccueilLayout.vue";
import Home from "@/Components/Home.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Un jour, un proverbe" />
    <AccueilLayout />
    <Home />
</template>
