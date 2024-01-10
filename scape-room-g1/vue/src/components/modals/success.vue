<template>
    <div
        v-show="enhorabuena"
        class="min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="modal-id"
    >
        <div
            class="w-full max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg bg-white"
        >
            <div class="">
                <div class="text-center p-5 flex-auto justify-center">
                    <div
                        class="min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
                        id="modal-id"
                    >
                        <div
                            class="w-full max-w-lg p-5 relative m-auto rounded-xl bg-white opacity-90"
                        >
                            <div
                                class="flex flex-col text-center p-5 items-center justify-center"
                            >
                                <svg class="w-16"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1"
                                    id="Capa_1"
                                    viewBox="0 0 50 50"
                                    xml:space="preserve"
                                >
                                    <circle
                                        style="fill: rgb(34 197 94)"
                                        cx="25"
                                        cy="25"
                                        r="25"
                                    />
                                    <polyline
                                        style="
                                            fill: none;
                                            stroke: #ffffff;
                                            stroke-width: 2;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-miterlimit: 10;
                                        "
                                        points="  38,15 22,33 12,25 "
                                    />
                                </svg>
                                <h3 class="text-xl font-bold py-4">
                                    Muy bien!!!
                                </h3>
                                <p class="text-xl font-bold py-4">
                                    Has superado el Mini-Juego y aún te queda
                                    tiempo!
                                </p>
                            </div>

                            <div
                                class="p-3 mt-2 text-center space-x-4 md:block"
                            >
                                <button
                                    @click="clicked2"
                                    class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600"
                                >
                                    Bien Hecho
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        enhorabuena: Boolean,
    },
    methods: {
        clicked2() {
            this.$emit("clicked2", false);
            
        },
    },
};
</script>
