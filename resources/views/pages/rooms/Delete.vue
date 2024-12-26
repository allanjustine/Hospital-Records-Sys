<template layout="default">
    <div
        class="container bg-cyan-400 bg-opacity-60 w-[400px] text-center shadow p-10 mx-auto mt-5"
    >
        <p class="text-center text-xl text-white mb-5"><strong>"Deleting Room"</strong></p>
        <hr />
        <br /><span class="text-white">
            <h2 class="text-2md font-bold mb-5 text-white text-center">
                Are you sure you want to delete? Room: {{ room.room_number }},
                Doctor: {{ room.doctor }}
            </h2></span
        >
        <br />
        <div class="flex justify-between">
            <button
                @click="deleteRoom"
                class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
            >
                Proceed
            </button>
            <Link
                href="/rooms"
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
    room: Object,
});

const deleteRoom = () => {
    Inertia.post(`/rooms/${props.room.id}`, {
        _method: "delete",
    });
};
</script>
