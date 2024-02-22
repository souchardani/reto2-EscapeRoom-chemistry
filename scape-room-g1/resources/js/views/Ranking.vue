<template>
    <!--Falta poner el encabezado aqui-->
    <div
        class="container-fluid relative container-fluid backdrop-blur-lg min-h-screen px-2 md:px-12 p-8"
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
        <div class="container-fluid mt-5 flex content-center justify-center">
            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><h1 class="text-4xl text-center">Ranking de Mejores Tiempos</h1></div>
            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><h1 class="text-4xl text-center">Ranking of Best Times</h1></div>
            <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><h1 class="text-4xl text-center">Garai onenen sailkapena</h1></div>
            <select
                v-model="opcionSeleccionado"
                @="primerfiltrado"
                @change="filtrar"
                class="mx-5 p-2 w-[10%] text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                name=""
                id=""
            >
                <option
                    :value="dificultad.value"
                    v-for="dificultad in dificultades"
                    :selected="
                        dificultad.value == usuario.dificultad ? true : false
                    "
                >
                    {{ dificultad.texto }}
                </option>
            </select>
            <div v-show="registrado.logeado" class="flex justify-around">
    <label for="todos">
        Todos
        <input type="radio" name="filtro" id="" v-model="todos" />
    </label>
    <label for="personal">
        Personal
        <input type="radio" name="filtro" id="" v-model="personal" />
    </label>
</div>
        </div>
        <div
            v-if="usuario.nick != null"
            class="container-fluid flex flex-col justify-center p-1 m-2"
        >
            <GlassCard>
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><label
                    >Felicidades {{ this.usuario.nick }}, tu tiempo
                    {{ this.getTiempoLaravel() }} y difultad
                    {{ this.usuario.dificultad }}</label
                ></div>
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><label
                    >Congratulations {{ this.usuario.nick }}, your time is
                    {{ this.getTiempoLaravel() }} and your difficulty has been
                    {{ this.usuario.dificultad }}</label
                ></div>
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><label
                    >Zorionak {{ this.usuario.nick }}, zure denbora
                    {{ this.getTiempoLaravel() }} izan da esta zailtasuna
                    {{ this.usuario.dificultad }}</label
                ></div>
            </GlassCard>
        </div>
        <div class="container-fluid flex flex-col justify-center p-1 m-2">
            <GlassCard>
                <table
                    class="table w-full text-sm border-separate border-spacing-y-1 md:border-spacing-y-3 md:text-md lg:border-spacing-y-4 lg:text-lg"
                >
                    <thead>
                        <tr class="shadow-xl rounded-xl">
                            <th class="md:p-3 rounded-l-xl text-center">
                                Posición
                            </th>
                            <th class="md:p-3 text-center">Nick</th>
                            <th class="md:p-3 text-center">Tiempo</th>
                            <th class="md:p-3 text-center rounded-r-xl">
                                Dificultad
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr
                            class="shadow-xl rounded-xl"
                            v-for="(jugador, index) in filtrar"
                            :key="index"
                        >
                            <td class="md:p-3 rounded-l-xl text-center">
                                {{ index + 1 }}
                            </td>
                            <td
                                class="md:p-3 font-medium uppercase text-center"
                            >
                                {{ jugador.player_nickname }}
                            </td>
                            <td class="md:p-3 text-center">
                                {{ jugador.time }}
                            </td>
                            <td
                                class="md:p-3 capitalize rounded-r-xl text-center"
                            >
                                {{ jugador.difficulty }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </GlassCard>
            <div class="flex flex-col items-center m-5 mb-20">
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'es'"><div>
                    <GlassBtn @click="volveraJugar">Volver a Jugar</GlassBtn>
                </div></div>
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'en'"><div>
                    <GlassBtn @click="volveraJugar">Return to play</GlassBtn>
                </div></div>
                <div v-show="idioma.find(idioma => idioma.estado)?.name === 'eu'"><div>
                    <GlassBtn @click="volveraJugar">Berriz jokatu</GlassBtn>
                </div></div>
            </div>
            <!-- footer -->
            <Footer></Footer>
        </div>
    </div>
    <!--Falta poner el footer aqu-->
</template>
<script>
import { useIdioma } from "../store/languages";
import GlassCard from "../components/GlassCard.vue";
import GlassBtn from "../components/GlassBtn.vue";
import Footer from "../components/Footer.vue";
import { useLoginStore } from "../store/LoginStore";
import { useCheckStore } from "../store/checkState";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useProgressBarStore } from "../store/progressBar";
import { mapWritableState, mapActions } from "pinia";
import axios from "axios";

export default {
    data() {
        return {
            todos:true,
            personal:false,
            opcionSeleccionado: null,
            jugadores: [],
            nivel: [],
            dificultades: [
                { value: "Facil", texto: "Principiante" },
                { value: "Normal", texto: "Intermedio" },
                { value: "Dificil", texto: "Avanzado" },
            ],
        };
    },
    methods: {
        async dataRanking() {
            try {
                const ranking = await axios.get(
                    //"http://44.196.190.239/api/getRanking"
                    "http://127.0.0.1:8000/api/getRanking"
                );
                this.jugadores = ranking.data;
            } catch (error) {
                console.log(error);
            }
        },

        personal() {
            alert("pulsado");
            this.nivel.filter((elemento) => elemento.id == this.usuario.id);
        },
        primerfiltrado() {
            this.opcionSeleccionado = this.usuario.dificultad;
        },
        volveraJugar() {
            //reinicamos los valores de usuario
            this.resetUser();
            //ponemos el tiempo final de nuevo a 0
            this.reiniciarEstadoTiempo();
            //reiciamos el setState
            this.resetSetState();
            //reiniciamos el store del progress bar
            this.resetState();
            this.$router.push("/login");
            console.log(this.getUsuario());
        },
        ...mapActions(useTemporizadorStore, [
            "reiniciarEstadoTiempo",
            "getTiempoLaravel",
        ]),
        ...mapActions(useLoginStore, ["resetUser", "getUsuario"]),
        ...mapActions(useCheckStore, ["resetSetState"]),
        ...mapActions(useProgressBarStore, ["resetState"]),
    },
    beforeMount() {
        this.primerfiltrado();
    },
    async mounted() {
        await this.dataRanking();
        this.primerfiltrado();
        this.filtrar();
    },
    computed: {
        ...mapWritableState(useLoginStore, ["usuario", "registrado"]),
        ...mapWritableState(useIdioma,["idioma"]),
        filtrar() {
            if (this.todos) {
                // Filtrar todos los jugadores
                return this.jugadores.filter(jugador => jugador.difficulty == this.opcionSeleccionado);
            } else if (this.personal) {
                // Filtrar jugadores personales
                return this.jugadores.filter(jugador => jugador.id === this.usuario.id);
            } else {
                // No hay filtro seleccionado
                return this.jugadores;
            }
        },
    },
    components: { GlassCard, GlassBtn, Footer },
};
</script>
