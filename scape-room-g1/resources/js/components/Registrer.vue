<template>
    <div
        class="bg-white opacity-60 rounded-xl p-8 min-w-1/2 flex flex-col items-center"
    >
        <h1 class="text-3xl font-bold text-center">
            Registrte para jugar y guardar tu progreso
        </h1>
        <div class="flex flex-col p-5">
            <div class="flex flex-col my-5">
                <label for="nombre" class="font-semibold text-xl my-2 mx-4"
                    >Nombre</label
                >
                <input
                    v-model="nombre"
                    type="text"
                    placeholder="Escribe aqui tu nombre o nick"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
            <div class="flex flex-col my-5">
                <label for="password" class="font-semibold text-xl my-2 mx-4"
                    >Contraseña</label
                >
                <input
                    v-model="contra"
                    type="password"
                    placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
            <div class="flex flex-col my-5">
                <label
                    for="confirmpassword"
                    class="font-semibold text-xl my-2 mx-4"
                    >Confirmar Contraseña</label
                >
                <input
                    v-model="confirmpassword"
                    type="password"
                    placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
            <button
                class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                @click="registrarse()"
            >
                Registrarse
            </button>
        </div>
        <!-- <div
            v-show="errMesage == true"
            class="bg-red-400 rounded py-2 px-4 my-3"
        >
            <pre>Las contraseñas no coinciden</pre>
        </div>
        <div
            v-show="errMesage2 == true"
            class="bg-red-400 rounded py-2 px-4 my-3"
        >
            <pre>Este usuario ya existe en la base de datos</pre>
        </div>
        <div
            v-show="errMesage4 == true"
            class="bg-red-400 rounded py-2 px-4 my-3"
        >
            <pre>Debes de introducir un usuario</pre>
        </div>
        <div
            v-show="errMesage3 == true"
            class="bg-red-400 rounded py-2 px-4 my-3"
        >
            <pre>Debes de introducir una contraseña</pre>
        </div> -->
        <div v-show="defaultError" class="bg-red-400 rounded py-2 px-4 my-3">
            <pre>{{ defaultError }}</pre>
        </div>
        <router-link
            to="/userLogin"
            class="underline text-center hover:text-slate-600"
            >Volver a inicio</router-link
        >
    </div>
</template>
<script>
import axios from "axios";
import { useLoginStore } from "../store/LoginStore";
import { useMessageStore } from "../store/SessionMessageStore";
import { mapWritableState, mapActions } from "pinia";

export default {
    data() {
        return {
            nombre: "",
            contra: "",
            revisa: [],
            confirmpassword: "",
            errMesage: false,
            errMesage2: false,
            errMesage3: false,
            errMesage4: false,
            usuarios: [],
            defaultError: "",
        };
    },
    methods: {
        registrarse() {
            if (this.contra != this.confirmpassword) {
                this.defaultError = "Las contraseñas no coinciden";
                return;
            }

            if (this.usuarios.includes(this.nombre) == true) {
                this.defaultError =
                    "Este usuario ya existe en la base de datos";
                return;
            }

            if (this.contra == "") {
                this.defaultError = "Debes de introducir una contraseña";
                return;
            }

            if (this.nombre == "") {
                this.defaultError = "Debes de introducir un usuario";
                return;
            }
            //verificar que el nombre tenga al menos 4 caracteres
            if (this.nombre.length < 4) {
                this.defaultError =
                    "El nombre debe tener al menos 4 caracteres";
                return;
            }
            //verificamos la contraseña por regex
            if (this.contra.length < 6) {
                this.defaultError =
                    "La contraseña debe tener al menos 6 caracteres";
                return;
            }
            if (
                !this.contra.match(
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/
                )
            ) {
                this.defaultError =
                    "La contraseña debe tener al menos una mayuscula, una minuscula y un numero";
                return;
            }
            if (
                this.contra == this.confirmpassword &&
                this.usuarios.includes(this.nombre) == false &&
                this.contra != "" &&
                this.nombre != ""
            ) {
                this.enviar();
                this.errMesage2 = false;
                this.errMesage = false;
                this.setMessage(
                    "Usuario registrado correctamente, ya puedes iniciar sesion"
                );
                this.$router.push("/userlogin");
            }
        },
        async enviar() {
            try {
                await axios.post(
                    //"http://127.0.0.1:8000/api/registro",
                    "http://44.196.190.239/api/registro",
                    {
                        nick: this.nombre,
                        password: this.contra,
                    },
                    {
                        headers: {
                            "Content-Type": "application/json",
                        },
                    }
                );
            } catch (error) {
                console.log(error.response.data); // Muestra la respuesta del servidor
                console.log(error.response.status); // Muestra el código de estado HTTP
                console.log(error.response.headers); // Muestra los encabezados de la respuesta
            }
        },
        async revisar() {
            await axios
                //.get("http://127.0.0.1:8000/api/registro")
                .get("http:/44.196.190.239/api/registro")
                .then((response) => {
                    // Manejar éxito
                    this.revisa = response.data;
                    this.revisa.forEach((user) => {
                        this.usuarios.push(user.nick);
                    });
                })
                .catch((error) => {
                    // Manejar error
                    console.error(error);
                });
        },
        ...mapActions(useMessageStore, ["setMessage"]),
    },
    computed: {
        ...mapWritableState(useLoginStore, ["usuario"]),
        ...mapWritableState(useMessageStore, ["message"]),
    },
    mounted() {
        this.enviar();
        this.revisar();
    },
};
</script>
