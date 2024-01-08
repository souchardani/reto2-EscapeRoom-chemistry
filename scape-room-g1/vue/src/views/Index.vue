<template>
    <div
        class="container-fluid backdrop-blur-lg min-h-screen px-2 p-2 pt-8 md:px-12 md:p-8"
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
            class="text-center font-medium px-5 mb-10 text-5xl md:text-4xl mb-5 drop-shadow-2xl"
        >
            Scape Room
        </h1>
        <!-- glass card -->
        <!-- component -->

        <div class="relative py-3 sm:max-w-xl sm:mx-auto m-6">
            <div
                class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl sm:p-20 bg-clip-padding bg-opacity-60 border border-gray-200"
                style="backdrop-filter: blur(20px)"
            >
                <div class="max-w-md mx-auto">
                    <div>
                        <img
                            src="https://i.pinimg.com/originals/64/ce/4e/64ce4ea227c11941829c5667f3552deb.jpg"
                            alt=""
                            class="rounded-lg mb-7 shadow-xl"
                        />
                    </div>
                    <div>
                        <h2
                            class="text-3xl font-bold tracking-tight sm:text-4xl"
                        >
                            ¿Que Tenía el Vial?
                        </h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div
                            class="pb-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
                        >
                            <p class="mt-6 text-md leading-8">
                                En un laboratorio de máxima seguridad biológica,
                                seguridad de nivel 4, ha ocurrido un terrible
                                accidente. Por suerte, la persona que lo ha roto
                                se ha apresurado a presionar la alarma y se han
                                cerrados las puertas blindadas para evitar la
                                expansión del agente biológico. Tenemos 30
                                minutos para que, por medio de diferentes
                                pruebas, determinar el antídoto para ingerirlo y
                                acabar con el microorganismo mortal.
                            </p>
                        </div>
                        <div
                            class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- glass card -->
        <div class="flex items-center justify-center gap-x-6 md:py-20">
            <router-link to="/StartGame">
                <GlassBtn> Iniciar Partida </GlassBtn>
            </router-link>
        </div>

        <!-- footer transparente -->
        <div class="w-100 py-3 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6">
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import GlassBtn from "../components/GlassBtn.vue";
export default {
    components: {
        Footer,
        GlassBtn,
    },
};
</script>

<!-- glass component -->
<!-- <div class="w-100 p-3 m-6">
    <div
        class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
        style="backdrop-filter: blur(20px)"
    >
        <div class="mx-auto">
            contenido
        </div>
    </div>
</div> -->
