<template>
    <div class="rounded-xl bg-white">
        <div
            class="container-fluid border border-orange-300 w-[500px] p-4 rounded-xl flex flex-col items-center gap-3"
        >
            <div class="flex gap-3">
                <div class="bg-orange-300 p-2 rounded-xl">
                    <h1 class="text-center">Descripción de la Ayuda</h1>
                </div>
                <div class="flex items-center">
                    <button
                        class="border rounded-3xl px-2 bg-red-500"
                        @click="visibility"
                    >
                        X
                    </button>
                </div>
            </div>
            <div class="w-full p-3 bg-orange-300 rounded-xl">
                <p class="my-5 text-center">{{ texto }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import { useHelpStore } from "../../store/help";
import { mapActions, mapWritableState } from "pinia";
export default {
    data() {
        return {};
    },
    computed: {
        ...mapWritableState(useHelpStore, ["texto"]),
    },
    methods: {
        ...mapActions(useHelpStore, ["visibility"]),
    },
};
</script>
