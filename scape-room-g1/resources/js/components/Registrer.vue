<template>
    <div class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center">
        <h1 class="text-3xl font-bold">Registrate</h1>
        <div class="flex flex-col w-96 p-5">
            <div class="flex flex-col my-5">
                <label for="nombre" class="font-semibold text-xl my-2 mx-4">Nombre :</label>
                <input v-model="nombre" type="text" placeholder="Escribe aqui tu nombre o nick"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
            </div>
            <div class="flex flex-col my-5">
                <label for="password" class="font-semibold text-xl my-2 mx-4">Contraseña :</label>
                <input v-model="contra" type="password" placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />

            </div>
            <div class="flex flex-col my-5">
                <label for="confirmpassword" class="font-semibold text-xl my-2 mx-4">Confirmar Contraseña :</label>
                <input v-model="confirmpassword" type="password" placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />

            </div>
            <button class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold" @click="registrarse()">
                Registrarse
            </button>
        </div>
        <div v-show="errMesage == true">
            <pre>Las contraseñas no coinciden</pre>
        </div>
        <div v-show="errMesage2 == true">
            <pre>El usuario existe</pre>
        </div>


    </div>
</template>
<script>
import axios from "axios";
import { mapWritableState } from "pinia";
import { useLoginStore } from "../store/LoginStore";
export default {
    data() {
        return {
            nombre: "",
            contra: "",
            revisa: {},
            confirmpassword: "",
            errMesage: false,
            errMesage2: false,
            usuario:[]
        }
    },
    methods: {
        registrarse() {



            if (this.contra != this.confirmpassword) {
                this.errMesage = true;
            }

            if (this.contra == this.confirmpassword && this.usuario.includes(this.nombre)==false) {

                this.enviar();
                this.errMesage2=false;
                this.errMesage = false;
                this.$router.push("/login");

            }

           if(this.usuario.includes(this.nombre)==true){
                this.errMesage2=true;
           }




        },
        async enviar() {
            try {
                await axios.post("http://127.0.0.1:8000/api/registro", {
                    nick: this.nombre,
                    password: this.contra,
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

            } catch (error) {
                console.log(error.response.data); // Muestra la respuesta del servidor
                console.log(error.response.status); // Muestra el código de estado HTTP
                console.log(error.response.headers); // Muestra los encabezados de la respuesta
            }

        },
        async revisar() {
            await axios.get('http://127.0.0.1:8000/api/registro')
                .then((response) => {
                    // Manejar éxito
                    console.log(response.data);
                    this.revisa = response.data;
                    console.log(this.revisa);
                    this.revisa.forEach(user => {
                        this.usuario=user.nick;
                    });

                })
                .catch((error) => {
                    // Manejar error
                    console.error(error);
                });
        },




    },
    computed: {
        ...mapWritableState(useLoginStore, ["usuario"]),
    },
    mounted() {
        this.enviar();
        this.revisar();
    },
}
</script>
