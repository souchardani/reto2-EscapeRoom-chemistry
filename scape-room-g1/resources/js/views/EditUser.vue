<template>
    <div
        class="relative container-fluid min-h-screen px-8 p-3 md:px-20"
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
        <!--aqui va el formulario y el ranking-->
        <div class="grid gap-8 lg:grid-cols-2 place-items-center p-4">
            <!-- formulario -->
            <div
                class="bg-white opacity-60 rounded-xl mx-auto p-8 flex flex-col items-center"
            >
                <h1 class="text-3xl font-bold">Editar Usuario</h1>
                <div class="flex flex-col w-96 p-5">
                    <div class="flex flex-col my-5">
                        <label
                            for="nombre"
                            class="font-semibold text-xl my-2 mx-4"
                            >Nombre:</label
                        >
                        <input
                            v-model="nombre"
                            type="text"
                            class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        />
                    </div>
                    <div class="flex flex-col my-5">
                        <label
                            for="password"
                            class="font-semibold text-xl my-2 mx-4"
                            >Contraseña actual:</label
                        >
                        <input
                            type="password"
                            id="currentPassword"
                            v-model="contrasenaActual"
                            class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        />
                    </div>
                    <div class="flex flex-col my-5">
                        <label
                            for="password"
                            class="font-semibold text-xl my-2 mx-4"
                            >Nueva Contraseña:</label
                        >
                        <input
                            type="password"
                            id="newPassword"
                            v-model="nuevaContrasena"
                            class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                        />
                    </div>
                </div>
                <div class="flex flex-col-2">
                    <button
                        class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                        @click="editarUser"
                    >
                        Editar Usuario
                    </button>
                </div>
                <router-link
                    to="/login"
                    class="underline text-center hover:text-slate-600 mt-3"
                    >Volver atras</router-link
                >
            </div>
            <!-- ranking -->
            <div
                class="bg-white opacity-60 rounded-xl p-8 flex flex-col items-center"
            >
                <h1 class="text-3xl font-bold text-center">Tus tiempos</h1>
                <h6 class="p-4 text-center font-semibold text-xl">
                    Aqui encontraras tus mejores tiempos y partidas jugadas.
                </h6>

                <button
                    class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                    @click="this.$router.push('/login')"
                >
                    Invitado
                </button>
            </div>
        </div>
        <!-- y el footer -->
        <div class="mt-8">
            <Footer></Footer>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { useLoginStore } from "../store/LoginStore";
import { mapWritableState } from "pinia";
import Footer from "../components/Footer.vue";
export default {
    components: {
        Footer,
    },
    data() {
        return {
            nombre: "",
            contrasenaActual: "",
            nuevaContrasena: "",
            usuarioActual: {},
        };
    },
    methods: {
        getcurrentUser() {
            alert("getcurrentUser");
            axios
                .get("http://127.0.0.1:8000/api/currentUser", {
                    params: {
                        id: this.registrado.id,
                    },
                })
                .then((response) => {
                    console.log("repsonse" + response);
                    this.usuarioActual = response.data;
                    console.log("this.usuarioActual: ", this.usuarioActual);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        editarUser() {
            console.log("editarUser");
            axios
                .post("http://127.0.0.1:8000/api/editPlayer", {
                    id: this.registrado.id,
                    name: this.nombre,
                    password: this.contrasenaActual,
                    newPassword: this.nuevaContrasena,
                })
                .then((response) => {
                    console.log(response);
                    this.$router.push("/StartGame");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    computed: {
        ...mapWritableState(useLoginStore, ["registrado", "usuario"]),
    },
    mounted() {
        console.log("this.registrado: ", this.registrado);
        this.nombre = this.registrado.name;
        console.log("this.nombre: ", this.nombre);
        this.getcurrentUser();
    },
};
</script>
