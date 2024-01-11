<template>
    <router-link to="/">
        <div
            class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            style="backdrop-filter: blur(20px)"
        >
            Salir
        </div>
    </router-link>
</template>

<script>
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";

export default {
    data() {
        return {};
    },
};
</script>
