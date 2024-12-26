<template layout>
    <div class="container mx-auto">
        <div
            class="flex flex-col items-center justify-center min-h-screen bg-opacity-30 bg-white"
        >
            <h1 class="text-4xl font-bold text-gray-900 mb-5" st>
                Welcome to Our Hospital
            </h1>
            <p class="text-lg text-gray-700">
                Providing Quality Healthcare Services
            </p>
            <p class="text-xl text-gray-900 mt-5">
                Total Patients: {{ patientCounts }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth: Array,
    patientCounts: Number,
});

const user = usePage().props.auth;

console.log(user);
</script>
