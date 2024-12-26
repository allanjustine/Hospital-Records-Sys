<template layout="default">
    <div class="container bg-cyan-700 bg-opacity-60 w-[500px] shadow p-10 mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Add Room
        </h1>
        <form @submit.prevent="add">
            <div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="room_number"
                        >Room Number:</label
                    >
                    <input
                        type="number"
                        id="room_number"
                        v-model="form.room_number"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.room_number" class="text-red-600">{{
                        form.errors.room_number
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="doctor"
                        >Doctor:</label
                    >
                    <input
                        v-model="form.doctor"
                        type="text"
                        id="doctor"
                        name="doctor"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.doctor" class="text-red-600">{{
                        form.errors.doctor
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="capacity"
                        >Capacity:</label
                    >
                    <input
                        v-model="form.capacity"
                        type="number"
                        id="capacity"
                        name="capacity"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.capacity"
                        class="text-red-600"
                        >{{ form.errors.capacity }}</span
                    >
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-cyan-500 bg-opacity-60 hover:bg-cyan-600 bg-opacity-60 text-white font-bold py-2 px-4 rounded"
                >
                    Save
                </button>
                <Link
                    href="/rooms"
                    class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                >
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    room_number: "",
    doctor: "",
    capacity: "",
});

const add = () => {
    form.post("/rooms");
};
</script>
