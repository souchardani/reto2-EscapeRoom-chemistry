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
                <p class="mt-4">
                    Puedes editar los datos que quieras de tu cuenta.
                </p>
                <div v-if="message" class="flex justify-center">
                    <p class="bg-green-300 p-4 rounded-xl text-center">
                        {{ message }}
                    </p>
                </div>
                <p
                    v-if="localError"
                    class="bg-red-300 p-4 rounded-xl text-center mt-4"
                >
                    {{ localError }}
                </p>
                <div class="flex flex-col w-96 p-5">
                    <div class="flex flex-col my-5">
                        <label
                            for="nombre"
                            class="font-semibold text-xl my-2 mx-4"
                            >Editar nombre:</label
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
                <h1 class="text-3xl font-bold my-5">Eliminar Cuenta</h1>
                <button
                    class="bg-red-400 p-4 rounded-xl hover:bg-red-200 font-bold"
                    @click="messageModal.showModal = true"
                >
                    Borrar Usuario
                </button>
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
    <ModalStartGame
        :showModal="messageModal.showModal"
        :bgColor="messageModal.bgColor"
        :titulo="messageModal.titulo"
        :texto="messageModal.texto"
        :textoBotonCerrar="messageModal.textoBotonCerrar"
        @close="eliminarCuenta"
    ></ModalStartGame>
</template>
<script>
import axios from "axios";
import { useLoginStore } from "../store/LoginStore";
import Footer from "../components/Footer.vue";
import { useMessageStore } from "../store/SessionMessageStore";
import { mapWritableState, mapActions } from "pinia";
import ModalStartGame from "../components/modals/ModalStartGame.vue";
export default {
    components: {
        Footer,
        ModalStartGame,
    },
    data() {
        return {
            nombre: "",
            contrasenaActual: "",
            nuevaContrasena: "",
            usuarioActual: {},
            localError: "",
            messageModal: {
                showModal: false,
                bgColor: "bg-red-400",
                titulo: "Estas seguro que quieres eliminar tu cuenta?",
                texto: "Esta accion no se puede deshacer, perderas todo tu progreso y no podras recuperarlo.",
                textoBotonCerrar: "Eliminar Cuenta",
            },
        };
    },
    methods: {
        getcurrentUser() {
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
            //verificamos errores
            //verificar que las contraseñas sean iguales
            if (this.nuevaContrasena != "" && this.contrasenaActual != "") {
                if (this.contrasenaActual != this.usuarioActual.password) {
                    this.localError = "Las contraseña actual es incorrecta";
                    setTimeout(() => {
                        this.localError = "";
                    }, 5000);
                    return;
                }
                if (this.nuevaContrasena != "") {
                    if (
                        !this.nuevaContrasena.match(
                            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/
                        )
                    ) {
                        this.localError =
                            "La contraseña debe tener al menos 6 caracteres, una mayuscula, una minuscula y un numero";
                        setTimeout(() => {
                            this.localError = "";
                        }, 5000);
                        return;
                    }
                }
            }
            //validamos la nueva contraseña por regex
            //validamos el campo de texto por regex
            if (this.nombre != "") {
                if (!this.nombre.match(/^[a-zA-Z0-9_]*$/)) {
                    this.localError =
                        "El nombre no puede tener caracteres especiales";
                    setTimeout(() => {
                        this.localError = "";
                    }, 5000);
                    return;
                }
            }
            if (this.nombre == "") {
                this.localError = "El nombre no puede estar vacio";
                setTimeout(() => {
                    this.localError = "";
                }, 5000);
                return;
            }
            if (this.nuevaContrasena != "" && this.contrasenaActual == "") {
                this.localError =
                    "Si quieres cambiar la contraseña, debes introducir la contraseña actual";
                setTimeout(() => {
                    this.localError = "";
                }, 5000);
                return;
            }
            if (this.nuevaContrasena == "" && this.contrasenaActual != "") {
                this.localError =
                    "Si quieres cambiar la contraseña, debes introducir la nueva contraseña";
                setTimeout(() => {
                    this.localError = "";
                }, 5000);
                return;
            }
            //si no hay errores, procedemos a editar el usuario

            axios
                .post("http://127.0.0.1:8000/api/editPlayer", {
                    id: this.registrado.id,
                    nick: this.nombre,
                    newPassword: this.nuevaContrasena,
                })
                .then((response) => {
                    console.log(response);
                    this.setMessage("Usuario editado correctamente");
                    //ahora cambiamos las variables locales
                    this.registrado.name = this.nombre;
                    if (this.nuevaContrasena != null) {
                        this.usuario.password = this.nuevaContrasena;
                    }
                    this.usuario.nick = this.nombre;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        ...mapActions(useMessageStore, ["setMessage"]),
        eliminarCuenta() {
            alert("eliminando cuentas");
            axios.post("http://127.0.0.1:8000/api/deleteUser", {
                id: this.registrado.id,
            });
            //reiniciamos las variables de usuario de pinia
            this.registrado = {};
            this.usuario = {};
            this.$router.push("/userLogin");
            this.setMessage("Usuario eliminado correctamente");
        },
    },
    computed: {
        ...mapWritableState(useLoginStore, ["registrado", "usuario"]),
        ...mapWritableState(useMessageStore, ["message"]),
    },
    mounted() {
        console.log("this.registrado: ", this.registrado);
        this.nombre = this.registrado.name;
        console.log("this.nombre: ", this.nombre);
        this.getcurrentUser();
        console.log("this.usuarioActual: ", this.usuarioActual);
    },
};
</script>
