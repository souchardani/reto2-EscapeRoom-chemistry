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
        <div class="flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M20.985 12.518a9 9 0 1 0 -8.45 8.466" />
  <path d="M3.6 9h16.8" />
  <path d="M3.6 15h11.4" />
  <path d="M11.5 3a17 17 0 0 0 0 18" />
  <path d="M12.5 3a16.998 16.998 0 0 1 2.283 12.157" />
  <path d="M16 19h6" />
  <path d="M19 16v6" />
</svg><select
                name=""
                id=""
                class="rounded-xl opacity-60"
                v-model="seleccionIdioma" @change="cambioIdioma(seleccionIdioma)"
            >
                <option v-for="lang in idioma" :value="lang.name">{{ lang.texto }}</option>
                <!-- <option value=""></option>
                <option>ES</option>
                <option>EN</option>
                <option>EU</option> -->
            </select>
        </div>
        <h1
            class="text-center font-medium px-5 mb-10 text-5xl md:text-4xl mb-5 drop-shadow-2xl"
        >
            Escape Room
        </h1>
        <!-- main component in movil -->
        <div class="lg:hidden">
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
                                :src="'/img/labmainrecorte2.jpg'"
                                alt="laboratorio"
                                class="rounded-lg mb-7 shadow-xl"
                            />
                        </div>
                        <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><div>
                            <h2
                                class="text-3xl font-bold tracking-tight sm:text-4xl"
                            >
                                ¿Que Tenía el Vial?
                            </h2>
                        </div></div>
                        <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><div>
                            <h2
                                class="text-3xl font-bold tracking-tight sm:text-4xl"
                            >
                            What did the Vial have?
                            </h2>
                        </div></div>
                        <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><div>
                            <h2
                                class="text-3xl font-bold tracking-tight sm:text-4xl"
                            >
                            Zer zegoen ontzian?
                            </h2>
                        </div></div>
                        <div class="divide-y divide-gray-200">
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><div
                                class="pb-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
                            >
                                <p class="mt-6 text-md leading-8">
                                    En un laboratorio de máxima seguridad
                                    biológica, seguridad de nivel 4, ha ocurrido
                                    un terrible accidente. Por suerte, la
                                    persona que lo ha roto se ha apresurado a
                                    presionar la alarma y se han cerrados las
                                    puertas blindadas para evitar la expansión
                                    del agente biológico. Tenemos 30 minutos
                                    para que, por medio de diferentes pruebas,
                                    determinar el antídoto para ingerirlo y
                                    acabar con el microorganismo mortal.
                                </p>
                            </div></div>
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><div
                                class="pb-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
                            >
                                <p class="mt-6 text-md leading-8">
                                    In a laboratory of maximum biological security,
                            level 4 security, a terrible accident has occurred.
                            accident has occurred. Fortunately, the person who broke it was quick to press the alarm
                            the alarm was pressed and the armored doors were closed to prevent the
                            the shielded doors closed to prevent the spread of the biological agent.
                            expansion of the biological agent. We have 30 minutes
                            so that, by means of different tests, we can determine the antidote
                            determine the antidote to ingest and kill the deadly microorganism.
                            the deadly microorganism.
                                </p>
                            </div></div>
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><div
                                class="pb-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
                            >
                                <p class="mt-6 text-md leading-8">
                                    Gehieneko segurtasun biologikoko laborategi batean,
                            4. maila segurtasuna, gauza ikaragarria gertatu da
                            istripua. Zorionez, hautsi zuen pertsona
                            presa egin du alarma sakatu eta izan
                            ate blindatuak itxita saihesteko
                            agente biologikoaren hedapena. 30 minutu ditugu
                            beraz, proba ezberdinen bidez,
                            irensteko antidotoa zehaztu eta amaitzeko
                            mikroorganismo hilgarria.
                                </p>
                            </div></div>
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
                    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><GlassBtn> Iniciar Partida </GlassBtn></div>
                    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><GlassBtn> Start Game </GlassBtn></div>
                    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><GlassBtn> Jokoa Hasi </GlassBtn></div>
                </router-link>
            </div>
        </div>
        <!-- main component desktop -->
        <div class="hidden lg:block">
            <div class="py-24">
                <div class="flex gap-x-20 pt-0">
                    <div
                        class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left"
                    >
                    <div>
    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><h2
                            class="text-4xl text-gray-800 font-bold tracking-tight"
                        >
                            ¿Que Tenía el Vial?
                        </h2></div>
    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><h2
                            class="text-4xl text-gray-800 font-bold tracking-tight"
                        >
                        What did the Vial have?
                        </h2></div>
    <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><h2
                            class="text-4xl text-gray-800 font-bold tracking-tight"
                        >
                        Zer zegoen ontzian?
                        </h2></div>
  </div>

  <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><p class="mt-6 text-lg leading-8 text-gray-100">
                            En un laboratorio de máxima seguridad biológica,
                            seguridad de nivel 4, ha ocurrido un terrible
                            accidente. Por suerte, la persona que lo ha roto se
                            ha apresurado a presionar la alarma y se han
                            cerrados las puertas blindadas para evitar la
                            expansión del agente biológico. Tenemos 30 minutos
                            para que, por medio de diferentes pruebas,
                            determinar el antídoto para ingerirlo y acabar con
                            el microorganismo mortal.
                        </p></div>
  <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><p class="mt-6 text-lg leading-8 text-gray-100">
    In a laboratory of maximum biological security,
                            level 4 security, a terrible accident has occurred.
                            accident has occurred. Fortunately, the person who broke it was quick to press the alarm
                            the alarm was pressed and the armored doors were closed to prevent the
                            the shielded doors closed to prevent the spread of the biological agent.
                            expansion of the biological agent. We have 30 minutes
                            so that, by means of different tests, we can determine the antidote
                            determine the antidote to ingest and kill the deadly microorganism.
                            the deadly microorganism.

Translated with DeepL.com (free version)
                        </p></div>
  <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><p class="mt-6 text-lg leading-8 text-gray-100">
    Gehieneko segurtasun biologikoko laborategi batean,
                            4. maila segurtasuna, gauza ikaragarria gertatu da
                            istripua. Zorionez, hautsi zuen pertsona
                            presa egin du alarma sakatu eta izan
                            ate blindatuak itxita saihesteko
                            agente biologikoaren hedapena. 30 minutu ditugu
                            beraz, proba ezberdinen bidez,
                            irensteko antidotoa zehaztu eta amaitzeko
                            mikroorganismo hilgarria.


                        </p></div>
                        <div
                            class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start"
                        >
                            <router-link to="/userlogin">
                                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><GlassBtn> Iniciar Partida </GlassBtn></div>
                                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><GlassBtn> Start </GlassBtn></div>
                                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><GlassBtn> Hasi jokoa </GlassBtn></div>

                            </router-link>
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'">
                            <router-link
                                to="/Ranking"
                                class="text-sm font-semibold leading-6 text-white"
                                >Acceder al ranking
                                <span aria-hidden="true">→</span></router-link
                            ></div>
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'">
                            <router-link
                                to="/Ranking"
                                class="text-sm font-semibold leading-6 text-white"
                                >Go to Ranking
                                <span aria-hidden="true">→</span></router-link
                            ></div>
                            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'">
                            <router-link
                                to="/Ranking"
                                class="text-sm font-semibold leading-6 text-white"
                                >Jokalarien sailkapena
                                <span aria-hidden="true">→</span></router-link
                            ></div>
                        </div>
                    </div>
                    <div class="relative mt-16 h-80 lg:mt-8">
                        <img
                            class="absolute left-16 top-0 w-[57rem] h-30 max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                            :src="'/img/labmainrecorte2.jpg'"
                            alt="App screenshot"
                            width="1824"
                            height="1080"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- footer transparente -->
        <div
            class="w-100 py-3 mt-8 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6 lg:mt-24"
        >
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import GlassBtn from "../components/GlassBtn.vue";
import { useIdioma } from "../store/languages";
import { mapWritableState,mapActions } from "pinia";
export default {
    components: {
        Footer,
        GlassBtn,
    },
    computed:{
        ...mapWritableState(useIdioma,["seleccionIdioma","idioma"])
    },
    methods: {
        ...mapActions(useIdioma,["cambioIdioma",])
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
