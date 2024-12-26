<template layout="default">
    <div
        class="container bg-cyan-700 bg-opacity-60 w-[1000px] shadow p-10 mx-auto m-10"
    >
        <h1 class="text-2xl font-bold text-white mb-5">
            Viewing Patient: {{ patient.name }} - Doctor: {{ patient.room.doctor }} | Room: [{{ patient.room.room_number }}]
        </h1>
        <hr />
        <div v-if="patient" class="text-white mt-2">
            <table class="table mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Room</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Date In</th>
                        <th>Date Out</th>
                        <th>Address</th>
                        <th>Reasons</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ patient.id }}</td>
                        <td>{{ patient.room.room_number }}</td>
                        <td>{{ patient.name }}</td>
                        <td>{{ patient.gender }}</td>
                        <td>
                            {{
                                new Date(
                                    patient.date_of_birth
                                ).toLocaleDateString("en-US")
                            }}
                        </td>
                        <td>
                            {{
                                new Date(patient.date_in).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td>
                            {{
                                new Date(patient.date_out).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td>{{ patient.address }}</td>
                        <td>{{ patient.reasons }}</td>
                        <td>{{ patient.phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <div class="flex justify-end float-end">
            <Link
                class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                href="/patients"
            >
                Back
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    patient: Array,
    rooms: Array,
});
</script>
