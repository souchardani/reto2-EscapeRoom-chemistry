<template>
    <router-link to="/editUser" class="flex gap-2 items-center cursor-pointer">
        <img
            src="https://www.w3schools.com/howto/img_avatar.png"
            class="rounded-full w-8 h-8 border border-gray-500"
        />
        <span class="text-sm font-semibold text-slate-900">{{
            registrado.name
        }}</span>
    </router-link>
</template>

<script>
import { useLoginStore } from "../store/LoginStore";
import { mapWritableState, mapActions } from "pinia";
export default {
    computed: {
        ...mapWritableState(useLoginStore, ["registrado", "usuario"]),
    },
};
</script>
