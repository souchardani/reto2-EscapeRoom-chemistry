<template>
    <div
        class="container-fluid backdrop-blur-lg min-h-screen px-2 p-2 pt-8 md:px-12 md:p-8 overflow-hidden"
        style="
            background-color: rgb(88, 28, 135);
            background-image: radial-gradient(
                    at 86% 61%,
                    rgb(190, 24, 93) 0,
                    transparent 57%
                ),
                radial-gradient(
                    at 56% 55%,
                    rgb(52, 211, 153) 0,
                    transparent 28%
                ),
                radial-gradient(
                    at 49% 17%,
                    rgb(34, 211, 238) 0,
                    transparent 75%
                ),
                radial-gradient(at 75% 23%, rgb(30, 64, 175) 0, transparent 73%),
                radial-gradient(
                    at 77% 71%,
                    rgb(252, 211, 77) 0,
                    transparent 25%
                ),
                radial-gradient(
                    at 87% 91%,
                    rgb(139, 92, 246) 0,
                    transparent 81%
                );
        "
    >
        <h1
            class="text-center text-[32px] md:text-[32px] lg:text-[48px] xl:text-[56px] font-bold p-6"
        >
            Escape Room Química
        </h1>
        <div class="grid gap-8 place-items-center p-4">
            <registrer></registrer>
        </div>
        <div class="mt-8">
            <Footer></Footer>
        </div>
    </div>
</template>
<script>
import Footer from "./../components/Footer.vue";
import registrer from "./../components/Registrer.vue";
import { useMessageStore } from "../store/SessionMessageStore";
import { mapWritableState, mapActions } from "pinia";
import BtnPerfil from "./../components/BtnPerfil.vue";
export default {
    data() {
        return {};
    },
    components: {
        registrer,
        Footer,
        BtnPerfil,
    },
    computed: {
        ...mapWritableState(useMessageStore, ["message"]),
    },
    methods: {
        ...mapActions(useMessageStore, ["setMessage"]),
    },
};
</script>
