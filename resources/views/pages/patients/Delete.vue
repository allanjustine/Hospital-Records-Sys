<template layout="default">
    <div
        class="container bg-cyan-400 bg-opacity-60 w-[400px] text-center shadow p-10 mx-auto mt-5"
    >
        <p class="text-center text-xl text-white mb-5"><strong>"Deleting Patient"</strong></p>
        <hr />
        <br /><span class="text-white">
            <h2 class="text-2md font-bold mb-5 text-white text-center">
                Are you sure you want to delete?
                Name: {{ patient.name }}, Reasons: {{ patient.reasons }}
            </h2></span
        >
        <br />
        <div class="flex justify-between">
            <button
                @click="deletePatient"
                class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
            >
                Proceed
            </button>
            <Link
                href="/patients"
                class="mt-10 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
            >
                Cancel
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    patient: Object,
});

const deletePatient = () => {
    Inertia.post(`/patients/${props.patient.id}`, {
        _method: "delete",
    });
};
</script>
