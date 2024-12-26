<template>
    <section class="bg-cyan-700">
        <div class="wrapper flex">
            <div
                id="brand"
                class="text-lg text-white font-bold py-5"
                style="
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri,
                        'Trebuchet MS', sans-serif;
                "
            >
                <span class="bg-cyan-800 px-10 py-2 rounded-full">HOSPITAL PATIENTS RECORD</span>
            </div>
            <nav class="main-nav py-2 ml-auto">
                <Link class="main-link" href="/">Home</Link>
                <!-- <Link v-if="user" class="main-link" href="/users"
                    >Users</Link
                > -->
                <Link v-if="user" class="main-link" href="/patients"
                    >Patients</Link
                >
                <Link v-if="user" class="main-link" href="/rooms">Rooms</Link>
            </nav>
            <div class="flex p-2 ml-auto">
                <Link
                    v-if="!user"
                    class="ml-2 py-4 text-white font-semibold bg-cyan-500 hover:bg-cyan-600 text-white font-bold px-4 rounded"
                    href="/login"
                    >Log In</Link
                >
                <Link
                    v-if="user"
                    class="py-4 text-white font-semibold hover:bg-cyan-500 px-2"
                    href="/logout"
                    method="post"
                    as="button"
                    >Log Out</Link
                >
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    user: "",
});
</script>
