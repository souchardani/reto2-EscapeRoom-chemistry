<template>
    <div class="container-fluid flex mx-4 p-4 justify-center items-center">
        <h1 class="text-4xl font-medium md:text-5xl">{{ this.cientifico }}</h1>
    </div>
    <div class="container-fluid flex justify-center items-center mx-4 p-4">
        <input
            type="text"
            id="1"
            maxlength="1"
            v-model="words[0].input"
            :class="[
                'flex',
                'w-[70px]',
                'h-[70px]',
                'md:w-[150px]',
                'md:h-[150px]',
                'xl:w-[200px]',
                'xl:h-[200px]',
                {
                    'bg-red-500': words[0].estado == 'rojo',
                    'bg-green-500': words[0].estado == 'verde',
                    'pointer-events-none': words[0].estado == 'verde',
                },
                { 'bg-white': words[0].estado == undefined },
                'shadow-lg',
                'rounded-3xl',
                'bg-opacity-60',
                'border',
                'border-gray-200',
                'mx-1',
                'md:mx-2,',
                'text-center',
                'justify-center',
                'items-center',
                'my-auto',
                'text-3xl',
                'md:text-5xl',
                'font-medium',
            ]"

            @keyup="comprobarClave(0),$event.target.nextElementSibling.focus()"
        />
        <input
            type="text"
            id="2"
            maxlength="1"
            v-model="words[1].input"
            :class="[
                'flex',
                'w-[70px]',
                'h-[70px]',
                'md:w-[150px]',
                'md:h-[150px]',
                'xl:w-[200px]',
                'xl:h-[200px]',
                {
                    'bg-red-500': words[1].estado == 'rojo',
                    'bg-green-500': words[1].estado == 'verde',
                    'pointer-events-none': words[1].estado == 'verde',
                },
                { 'bg-white': words[0].estado == undefined },
                'shadow-lg',
                'rounded-3xl',
                'bg-opacity-60',
                'border',
                'border-gray-200',
                'mx-1',
                'md:mx-2,',
                'text-center',
                'justify-center',
                'items-center',
                'my-auto',
                'text-3xl',
                'md:text-5xl',
                'font-medium',
            ]"
            @keyup="comprobarClave(1),$event.target.nextElementSibling.focus()"
        />
        <input
            type="text"
            id="3"
            maxlength="1"
            v-model="words[2].input"
            :class="[
                'flex',
                'w-[70px]',
                'h-[70px]',
                'md:w-[150px]',
                'md:h-[150px]',
                'xl:w-[200px]',
                'xl:h-[200px]',
                {
                    'bg-red-500': words[2].estado == 'rojo',
                    'bg-green-500': words[2].estado == 'verde',
                    'pointer-events-none': words[2].estado == 'verde',
                },
                { 'bg-white': words[0].estado == undefined },
                'shadow-lg',
                'rounded-3xl',
                'bg-opacity-60',
                'border',
                'border-gray-200',
                'mx-1',
                'md:mx-2,',
                'text-center',
                'justify-center',
                'items-center',
                'my-auto',
                'text-3xl',
                'md:text-5xl',
                'font-medium',
            ]"
            @keyup="comprobarClave(2),$event.target.nextElementSibling.focus()"
        />
        <input
            type="text"
            id="4"
            maxlength="1"
            v-model="words[3].input"
            :class="[
                'flex',
                'w-[70px]',
                'h-[70px]',
                'md:w-[150px]',
                'md:h-[150px]',
                'xl:w-[200px]',
                'xl:h-[200px]',
                {
                    'bg-red-500': words[3].estado == 'rojo',
                    'bg-green-500': words[3].estado == 'verde',
                    'pointer-events-none': words[3].estado == 'verde',
                },
                { 'bg-white': words[0].estado == undefined },
                'shadow-lg',
                'rounded-3xl',
                'bg-opacity-60',
                'border',
                'border-gray-200',
                'mx-1',
                'md:mx-2,',
                'text-center',
                'justify-center',
                'items-center',
                'my-auto',
                'text-3xl',
                'md:text-5xl',
                'font-medium',
            ]"
            @keyup="comprobarClave(3),$event.target.nextElementSibling.focus()"
        />
        <input
            type="text"
            id="5"
            maxlength="1"
            v-model="words[4].input"
            :class="[
                'flex',
                'w-[70px]',
                'h-[70px]',
                'md:w-[150px]',
                'md:h-[150px]',
                'xl:w-[200px]',
                'xl:h-[200px]',
                {
                    'bg-red-500': words[4].estado == 'rojo',
                    'bg-green-500': words[4].estado == 'verde',
                    'pointer-events-none': words[4].estado == 'verde',
                },
                { 'bg-white': words[0].estado == undefined },
                'shadow-lg',
                'rounded-3xl',
                'bg-opacity-60',
                'border',
                'border-gray-200',
                'mx-1',
                'md:mx-2,',
                'text-center',
                'justify-center',
                'items-center',
                'my-auto',
                'text-3xl',
                'md:text-5xl',
                'font-medium',
            ]"
            @keyup="comprobarClave(4)"
        />
    </div>
    <unsuccess v-bind:mostrar="mostrar" @clicked="closeModal"></unsuccess>
</template>
<script>
import { useFinalyWord } from "../store/finalyWord";
import { useProgressBarStore } from "../store/progressBar";
import { mapWritableState, mapActions } from "pinia";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import unsuccess from "../components/modals/unsuccess.vue";
import axios from "axios";
export default {
    data() {
        return {
            //esta variable es el nombre el cientifico que daremos como pista
            pista: "", //esta variable es la pista completa que tienen que resolver
            words: [
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
                { input: "", estado: "" },
            ],
            estado: true,
            contador: 0,
            mostrar: false,
            aciertos: 0,
            descontarTiempo: 0,
            nuevotiempo: 0,
        };
    },
    methods: {
        comprobarClave(indice) {
            if (this.words[indice].input == "") {
                this.words[indice].estado = "";
            } else {
                if (
                    this.words[indice].input.toLocaleUpperCase() ===
                    this.pista[indice]
                ) {
                    //******ES UN ACIERTO */
                    this.words[indice].estado = "verde";
                    this.aciertos++;
                    this.compruebaAciertos(this.aciertos);
                } else if (this.words[indice].input != this.pista[indice]) {
                    this.words[indice].estado = "rojo";
                    this.contador++;
                    this.marcaError(this.contador);
                    this.compruebafallo(this.contador, this.words);
                }
            }
        },
        async addPlayerToRanking() {
            try {
                await axios.post("http://127.0.0.1:8000/api/addToRanking", {
                    nick: this.usuario.nick,
                    dificultad: this.usuario.dificultad,
                    tiempo: this.nuevotiempo,
                });

            } catch (error) {
                console.log(error);
            }
        },
        compruebafallo(contador, array) {
            if (contador == 5) {
                this.mostrar = true;
                this.descontarTiempo = this.saberTiempoXdificultad(
                    this.usuario.dificultad
                );
                this.reduceTime(this.descontarTiempo);
                this.resetState();
                this.contador = 0;
                array.forEach((element) => {
                    element.input = "";
                    element.estado = "";
                });
            }
        },
        focusNext(e) {
            const inputs = Array.from(
                e.target.form.querySelectorAll('input[type="text"]')
            );
            const index = inputs.indexOf(e.target);

            if (index < inputs.length) {
                inputs[index + 1].focus();
            }
        },
        closeModal() {
            this.mostrar = false;
        },
        async compruebaAciertos(aciertos) {
            if (aciertos == 5) {
                this.nuevotiempo = this.getTiempoLaravel();
                await this.addPlayerToRanking();
                this.$router.push("Ranking");
            }
        },
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "marcaError",
            "resetState",
        ]),
        ...mapActions(useTemporizadorStore, [
            "reduceTime",
            "saberTiempoXdificultad",
            "getTiempoLaravel",
        ]),
    },
    computed: {
        ...mapWritableState(useTemporizadorStore, ["totalTime"]),
        ...mapWritableState(useFinalyWord, ["cientifico", "clave"]),
        ...mapWritableState(useLoginStore, ["usuario"]),
    },
    components: {
        unsuccess,
    },
    mounted() {
        this.pista = this.clave;
    },
};
</script>
