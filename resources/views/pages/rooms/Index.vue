<template layout>
    <div>
        <h1 class="mb-3">Room List</h1>
    </div>
    <div class="bg-cyan-700 bg-opacity-60 w-[1250px] p-5 text-white rounded mt-5">
        <br />
        <Link
            href="/rooms/create"
            class="btn bg-cyan-500 text-center hover:bg-cyan-600 mt-5 mb-4"
            >Add Room</Link
        >
        <div class="py-4">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Room Number</th>
                        <th>Doctor</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="room in rooms.data" :key="room.id">
                        <td>{{ room.id }}</td>
                        <td>{{ room.room_number }}</td>
                        <td>{{ room.doctor }}</td>
                        <td>{{ room.capacity }}</td>
                        <td>
                            <Link
                                :href="'/rooms/edit/' + room.id"
                                class="btn bg-sky-600 hover:bg-sky-700"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="'/rooms/delete/' + room.id"
                                class="ml-1 btn bg-red-700 hover:bg-red-800"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div>
                Showing <strong>{{ rooms.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in rooms.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-cyan-600 bg-cyan-500 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-cyan-300 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 ring-1 ring-inset ring-gray-300':
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
    rooms: Array,
});
</script>
