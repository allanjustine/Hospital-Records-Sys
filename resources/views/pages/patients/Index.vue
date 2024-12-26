<template layout>
    <div>
        <h1 class="mb-2">Patient List</h1>
    </div>
    <div class="bg-cyan-700 bg-opacity-20 w-[1250px] p-5 text-white rounded mt-5">
        <Link
            href="/patients/create"
            class="btn bg-cyan-500 hover:bg-cyan-600 float-left block text-center mt-5 mb-4"
            >Add Patient</Link
        >
        <div class="py-4">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="patient of patients.data" :key="patient.id">
                        <td>{{ patient.id }}</td>
                        <td>{{ patient.room.room_number }}</td>
                        <td>{{ patient.name }}</td>
                        <td>{{ patient.gender }}</td>
                        <td>
                            {{
                                new Date(patient.date_of_birth).toLocaleDateString(
                                    "en-US"
                                )
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
                        <td>
                            <span class="flex">
                                <Link
                                    :href="'/patients/view/' + patient.id"
                                    class="mr-1 btn bg-cyan-300 hover:bg-cyan-800"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="'/patients/edit/' + patient.id"
                                    class="btn bg-sky-600 hover:bg-sky-700"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="'/patients/delete/' + patient.id"
                                    class="ml-1 btn bg-red-700 hover:bg-red-800"
                                >
                                    Delete
                                </Link>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ patients.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in patients.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-cyan-900 ring-1 ring-inset ring-cyan-300 hover:bg-cyan-600 bg-cyan-500 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-cyan-300 ring-1 ring-inset ring-cyan-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-cyan-900 ring-1 ring-inset ring-cyan-300 hover:bg-cyan-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-cyan-300 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-cyan-300 ring-1 ring-inset ring-cyan-300':
                                    !page.url && page.label === 'Previous',
                            }"
                        >
                            <span v-if="page.label.includes('Next')"
                                >Next <i class="fas fa-chevron-right"></i
                            ></span>

                            <span v-else-if="page.label.includes('Previous')">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                            <span v-else class="page-link">{{
                                page.label
                            }}</span>
                        </Link>
                        <span
                            v-else-if="page.label.includes('Previous')"
                            class="cursor-not-allowed px-4 py-2"
                            ><i class="fas fa-chevron-left"></i> Previous</span
                        >
                        <span v-else class="cursor-not-allowed px-4 py-2"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    patients: Array,
});
</script>
