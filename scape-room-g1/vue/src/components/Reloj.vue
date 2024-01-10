<template>
    <GlassCard>
        <div class="">
            <div class="flex items-center flex-col justify-center font-bold">
                <div class="rounded-full px-9 py-2 text-3xl md:text-4xl">
                    <span>{{ minutes }}</span>
                    <span>:</span>
                    <span>{{ seconds }}</span>
                    <span class="text-3xl md:text-4xl"> Para salvarte</span>
                </div>
            </div>
        </div>
    </GlassCard>
</template>

<script>
import GlassCard from "./GlassCard.vue";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { mapWritableState, mapActions } from "pinia";
export default {
    data() {},
    computed: {
        ...mapWritableState(useTemporizadorStore, [
            "tiempo",
            "totalTime",
            "currentTime",
            "minutes",
            "seconds",
        ]),
    },
    methods: {
        ...mapActions(useTemporizadorStore, ["getTiempo"]),
    },
    mounted() {},
    components: { GlassCard },
};
</script>

<style scoped></style>
