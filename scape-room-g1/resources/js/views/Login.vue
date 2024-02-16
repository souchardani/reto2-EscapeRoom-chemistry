php
<template>
    <!-- component -->
    <div
        class="container-fluid backdrop-blur-lg"
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
        <div class="flex flex-col-reverse justify-center md:flex-row">
            <div
                class="relative bg-cover lg:block lg:w-2/3 max-md:mx-8 max-md:rounded-2xl overflow-hidden"
                style="background-image: url(/img/puerta.jpg)"
            >
                <div
                    class="flex items-center h-96 md:h-full px-20 bg-gray-900 bg-opacity-75"
                >
                    <div>
                        <h2 class="text-4xl font-bold text-white">
                            Que tenía el Vial
                            <i
                                class="ph ph-flask font-5xl"
                                @click="
                                    showPass({
                                        descripcion:
                                            'JAJA, te has equivocado, y recuerda, este no es un tubo de ensayo, es un matraz',
                                        titulo: 'No tan Rápido',
                                        bgColor: 'bg-red-500',
                                        srcGift:
                                            'https://media.giphy.com/media/l0HlUxcWRsqROFYuk/giphy.gif',
                                    })
                                "
                                alt="matraz"
                            ></i>
                        </h2>

                        <p class="max-w-xl mt-3 text-gray-300 text-lg">
                            Entra en nuestro scape room y descubre un mundo de
                            aventuras!
                        </p>
                    </div>
                    <i
                        class="absolute ph ph-test-tube lg:bottom-150 left-3 text-2xl"
                        @click="
                            showPass({
                                titulo: 'Lo has Conseguido',
                                bgColor: 'bg-green-500',
                                descripcion: `Enhorabuena, Encontraste una etiqueta en el vial. En ella se lee: ${this.pass}`,
                                srcGift:
                                    'https://media.giphy.com/media/PkoGC4SZK3DynYxlXy/giphy.gif',
                            })
                        "
                        alt="vial"
                    ></i>
                </div>
            </div>

            <div
                class="flex items-center w-full max-w-md px-6 mx-auto lg:w-1/3 mt-10 mb-12"
            >
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center">
                            Accede al juego
                        </h2>
                        <!-- <img src="../assets/img/puerta.jpg" alt="" /> -->

                        <p class="my-5">
                            Introduce un nick para guardar tu progreso y tu
                            clasificacion, y la contraseña de acceso.
                        </p>
                        <!-- tarjeta -->

                        <div
                            v-show="showModalInfo"
                            id="tarjeta-info"
                            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
                        >
                            <i class="ph ph-info text-2xl"></i>
                            <span class="text-left">
                                Aqui tienes tu primer reto, presiona el tubo de
                                ensayo escondido en la página (debes buscar
                                bien) y descubre como puedes encontrar la
                                contraseña de acceso
                            </span>
                            <i
                                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                @click="showModalInfo = false"
                            ></i>
                        </div>
                    </div>
                    <div class="w-100 my-8">
                        <div
                            class="w-full text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                            style="backdrop-filter: blur(20px)"
                        >
                            <div class="mx-auto">
                                <!-- aqui va el contenido dentro del glass -->
                                <div class="mt-6">
                                    <!-- este el el badge de un error -->
                                    <div
                                        v-show="showErrorMessage"
                                        class="relative bg-red-100 border-t border-b text-red-700 px-4 py-3 rounded-xl mb-4"
                                    >
                                        <p class="font-bold">
                                            Error en el formulario
                                        </p>
                                        <p class="text-sm">
                                            {{ txtErrorMsg }}
                                        </p>
                                        <i
                                            class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                                            @click="showErrorMessage = false"
                                        ></i>
                                    </div>
                                    <form @submit.prevent>
                                        <div v-if="registrado.logeado">
                                            <label
                                                for="nickJugador"
                                                class="block mb-2 text-2xl  font-bold"
                                                >Bienvenido {{ registrado.name }}</label
                                            >

                                            <!-- <input
                                                @focus="
                                                    showErrorMessage = false
                                                "
                                                v-model="txtNick"
                                                type="text"
                                                name="nickJugador"
                                                id="nickJugador"
                                                placeholder="Daniel_Jugador1"
                                                class="block w-full px-4 py-2 mt-2 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                            /> -->
                                        </div>
                                        <div v-else="registrado.logeado">
                                            <label
                                                for="nickJugador"
                                                class="block mb-2 text-xl  font-bold"
                                                >Bienvenido Anónimo</label
                                            >

                                            <!-- <input
                                                @focus="
                                                    showErrorMessage = false
                                                "
                                                v-model="txtNick"
                                                type="text"
                                                name="nickJugador"
                                                id="nickJugador"
                                                placeholder="Daniel_Jugador1"
                                                class="block w-full px-4 py-2 mt-2 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                            /> -->
                                        </div>


                                        <div class="mt-6">
                                            <div
                                                class="flex justify-between mb-2"
                                            >
                                                <label
                                                    for="clave-acceso"
                                                    class="text-sm font-bold"
                                                    >Clave de acceso</label
                                                >
                                                <a
                                                    @click.prevent="
                                                        showModalInfo = true
                                                    "
                                                    href="#"
                                                    class="text-sm focus:text-blue-500 hover:text-blue-500 hover:underline"
                                                    >No tienes la clave?</a
                                                >
                                            </div>

                                            <input
                                                @focus="
                                                    showErrorMessage = false
                                                "
                                                v-model="txtPassword"
                                                type="password"
                                                name="clave-acceso"
                                                id="clave-acceso"
                                                placeholder="Debes buscar la clave con las pistas de la web"
                                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                            />
                                        </div>
                                        <div class="mt-6">
                                            <div
                                                class="flex justify-between mb-2"
                                            >
                                                <label
                                                    for="dificultad"
                                                    class="text-sm font-bold"
                                                    >Nivel de Dificultad</label
                                                >
                                                <i
                                                    @click="
                                                        mostrarInfoDificultad = true
                                                    "
                                                    class="ph ph-info text-2xl"
                                                ></i>
                                            </div>

                                            <select
                                                @focus="
                                                    showErrorMessage = false
                                                "
                                                v-model="cmbDificultad"
                                                name="dificultad"
                                                id="dificultad"
                                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                            >
                                                option
                                                <option value="Facil">
                                                    Principiante
                                                </option>
                                                <option value="Normal">
                                                    Medio
                                                </option>
                                                <option value="Dificil">
                                                    Avanzado
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mt-6 flex">
                                            <button
                                                @click="validar"
                                                style="
                                                    backdrop-filter: blur(20px);
                                                "
                                                class="grow rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                            >
                                                Iniciar partida
                                            </button>
                                            <button
                                                @click="logout"
                                                style="
                                                    backdrop-filter: blur(20px);
                                                "
                                                class="grow rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                                            >
                                                Cerrar Sesión
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer transparente -->
        <div class="w-100 p-3 m-6 md:hidden">
            <div
                class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
                style="backdrop-filter: blur(20px)"
            >
                <div class="mx-auto">
                    <div>
                        <div class="text-black w-full h-25 p-4">
                            <div class="my-1">
                                <span class="font-medium">Colaboradores:</span>
                                <span class=""
                                    >Alumnos de 2DW3A y dpto. Química</span
                                >
                            </div>
                            <div class="my-1">
                                <span class="font-medium">Email: </span>
                                <span>alumnos@txurdinaga.eus</span>
                            </div>
                            <div class="my-1">
                                <span class="font-medium">Telf: </span>
                                <span>555-222-123</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ModalStartGame
            @close="inicioJuegoDesdeModal"
            :showModal="showModalStart"
            bgColor="bg-blue-500"
            titulo="Bienvenido al juego"
            textoBotonCerrar="Iniciar partida"
            ><strong
                >Bienvenido al juego,
                <span class="text-blue-900">{{ this.txtNick }}</span></strong
            >
            <p>
                Tienes la oportunidad de demostrar que eres un verdadero
                químico.
            </p>
            <p>
                Para ello, deberás superar una serie de pruebas que te llevarán
                a descubrir la contraseña final y salvar a la humanidad.
            </p>
            <p>
                Tendrás que usar tus habilidades e ingenio para resolver los
                retos que te proponemos.
            </p>
            <p>
                Recuerda, tienes solo 30 minutos, y cada vez que falles en un
                juego, perderás tiempo del reloj en función de la dificultad que
                hayas elegido. ¡Ánimo, y mucha suerte!
            </p></ModalStartGame
        >
        <ModalStartGame
            @close="hint.showModalHints = false"
            :showModal="hint.showModalHints"
            :bgColor="hint.bgHint"
            :titulo="hint.titulo"
            :texto="hint.descripcion"
        >
            <div @mouseover.prevent class="w-60 pb-6 relative">
                <img :src="hint.srcGift" alt="" />
            </div>
        </ModalStartGame>
        <ModalStartGame
            @close="mostrarInfoDificultad = false"
            :showModal="mostrarInfoDificultad"
            bgColor="bg-blue-500"
            titulo="Informacion de la dificultad"
        >
            <p>
                En base a la dificultad que elijas, tu temporizador se verá
                afectado.
            </p>
            <p>
                Para completar el juego tendrás 30 minutos, y por cada fallo en
                una de las pruebas, según la dificultad, se descontará tiempo
                del reloj:
            </p>
            <p class="font-bold">Fácil: 5 Minutos</p>

            <p class="font-bold">Medio: 7 Minutos</p>
            <p class="font-bold">Dificil: 12 Minutos</p>
        </ModalStartGame>
    </div>
</template>

<script>
import ModalStartGame from "../components/modals/ModalStartGame.vue";
import { useLoginStore } from "../store/LoginStore";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { mapWritableState, mapActions } from "pinia";

export default {
    data() {
        return {
            showModalStart: false,
            txtNick: "",
            txtPassword: "",
            cmbDificultad: "",
            pass: "",
            showModalInfo: true,
            showErrorMessage: false,
            txtErrorMsg: "",
            mostrarInfoDificultad: false,
            hint: {
                showModalHints: false,
                bgHint: "bg-blue-500",
                titulo: "Bienvenido al juego",
                descripcion: "descripcion placeholder",
                srcGift: "",
            },
        };
    },
    components: { ModalStartGame },
    methods: {
        validar() {
           /*  if (this.txtNick.length < 4) {
                this.txtErrorMsg = "El nick debe tener al menos 4 caracteres.";
                this.showErrorMessage = true;
                return;
            } */
            if (!this.cmbDificultad) {
                this.txtErrorMsg = "Debes seleccionar una opción.";
                this.showErrorMessage = true;
                return;
            }
            if (this.txtPassword !== this.pass) {
                this.txtErrorMsg = "La clave de acceso no es correcta";
                this.showErrorMessage = true;
                return;
            }

            /* if (
                this.txtNick === "" ||
                !this.cmbDificultad ||
                this.txtPassword === ""
            ) {
                this.txtErrorMsg = "Todos los campos son obligatorios.";
                this.showErrorMessage = true;
                return;
            } */
            //llamamos a inicio del luego
            this.inicioJuego();
        },
        inicioJuego() {
            //guardamos las variable de inicio de sesion en el store de pinia
            if(this.registrado.logeado){
                this.usuario.nick = this.registrado.name;
                this.usuario.dificultad = this.cmbDificultad;
                this.usuario.iniciado = true;
            console.log(this.usuario);
            }else{
                this.usuario.nick ="Anónimo";
                this.usuario.dificultad = this.cmbDificultad;
                this.usuario.iniciado = true;
            }
            //iniciamos los dos temporizadores

            //redirigimos a la pagina de inicio del juego desde el modal
            this.showModalStart = true;
        },
        inicioJuegoDesdeModal() {
            //al iniciar partida guardamos las variables de inicio,
            //y desde el modal, al  darle al boton, iniciamos los relojes y redirigimos a la pagina de inicio del juego
            //1.reloj para el ranking
            this.iniciarTemporizador();
            //2.reloj visual de la pagina
            this.iniciarCuentaAtras();
            this.$router.push("/startGame");
        },

        ...mapActions(useTemporizadorStore, [
            "iniciarTemporizador",
            "iniciarCuentaAtras",
        ]),
        generatePass() {
            //this.pass = ""

            // genera la contraseña usando los siguientes caracteres
            const characters =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            const charactersLength = characters.length;
            let counter = 0;

            while (counter < 5) {
                this.pass += characters.charAt(
                    Math.floor(Math.random() * charactersLength)
                );
                counter += 1;
            }
        },

        showPass(obj) {
            this.hint.showModalHints = true;
            this.hint.bgHint = obj.bgColor;
            this.hint.titulo = obj.titulo;
            this.hint.descripcion = obj.descripcion;
            this.hint.srcGift = obj.srcGift;
        },
        logout(){
            this.registrado.logeado=false;
            this.registrado.name= null;
            this.$router.push("/userlogin");
        }
    },
    computed: {
        ...mapWritableState(useLoginStore, ["usuario", "registrado"]),
    },
    mounted() {
        this.generatePass();
    },
};
</script>
