<template layout="default">
    <div
        class="container bg-cyan-700 bg-opacity-60 w-[800px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-white text-center">
            Add New Patients
        </h1>
        <form @submit.prevent="updateRoom">
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="room_id"
                        >Select Room Number:</label
                    >
                    <select
                        v-model="form.room_id"
                        name="room_id"
                        id="room_id"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">
                            Select Room Number
                        </option>
                        <option disabled>Select Room Number</option>
                        <option
                            v-for="room in rooms"
                            :key="room.id"
                            :value="room.id"
                        >
                            {{ room.room_number }}
                        </option>
                    </select>
                    <span v-if="form.errors.room_id" class="text-red-600">{{
                        form.errors.room_id
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="name"
                        >Name:</label
                    >
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.name" class="text-red-600">{{
                        form.errors.name
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="address"
                        >Address:</label
                    >
                    <input
                        v-model="form.address"
                        type="text"
                        name="address"
                        id="address"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.address" class="text-red-600">{{
                        form.errors.address
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="gender"
                        >Gender:</label
                    >
                    <select
                        name="gender"
                        id="gender"
                        v-model="form.gender"
                        class="border py-2 px-3"
                    >
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span v-if="form.errors.gender" class="text-red-600">{{
                        form.errors.gender
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="reasons"
                        >Reasons:</label
                    >
                    <select
                        name="reasons"
                        id="reasons"
                        v-model="form.reasons"
                        class="border py-2 px-3"
                    >
                        <option value="">Select Reasons</option>
                        <option value="Medical Checkup">
                            Medical Check-up
                        </option>
                        <option value="Health Check-up">Health Check-up</option>
                    </select>
                    <span v-if="form.errors.reasons" class="text-red-600">{{
                        form.errors.reasons
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="date_of_birth"
                        >Date of Birth:</label
                    >
                    <input
                        type="date"
                        id="date_of_birth"
                        v-model="form.date_of_birth"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.date_of_birth"
                        class="text-red-600"
                        >{{ form.errors.date_of_birth }}</span
                    >
                </div>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="date_in"
                        >Date In:</label
                    >
                    <input
                        type="date"
                        id="date_in"
                        v-model="form.date_in"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.date_in" class="text-red-600">{{
                        form.errors.date_in
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="date_out"
                        >Date Out:</label
                    >
                    <input
                        type="date"
                        id="date_out"
                        v-model="form.date_out"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.date_out" class="text-red-600">{{
                        form.errors.date_out
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-white mb-2" for="phone"
                        >Phone Number:</label
                    >
                    <input
                        v-model="form.phone"
                        type="text"
                        name="phone"
                        id="phone"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.phone" class="text-red-600">{{
                        form.errors.phone
                    }}</span>
                </div>
            </div>
            <div class="flex justify-between">
                <button
                    type="submit"
                    class="bg-cyan-500 hover:bg-cyan-800 text-white font-bold block py-2 px-4 rounded"
                >
                    Update
                </button>

                <Link
                    href="/patients"
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
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    patient: Object,
    rooms: Object,
});

let form = useForm({
    name: props.patient.name,
    gender: props.patient.gender,
    date_of_birth: props.patient.date_of_birth,
    date_in: props.patient.date_in,
    date_out: props.patient.date_out,
    address: props.patient.address,
    phone: props.patient.phone,
    reasons: props.patient.reasons,
    room_id: props.patient.room_id,
});

const updateRoom = () => {
    Inertia.post(`/patients/${props.patient.id}`, {
        _method: "put",
        name: form.name,
        gender: form.gender,
        date_of_birth: form.date_of_birth,
        date_in: form.date_in,
        date_out: form.date_out,
        address: form.address,
        address: form.address,
        phone: form.phone,
        reasons: form.reasons,
        room_id: form.room_id,
    });
};
</script>
