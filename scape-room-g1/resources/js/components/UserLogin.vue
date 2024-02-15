<template>
    <div
        class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center"
    >
        <h1 class="text-3xl font-bold">Ya estas registrado?</h1>
        <div class="flex flex-col w-96 p-5">
            <div class="flex flex-col my-5">
                <label for="nombre" class="font-semibold text-xl my-2 mx-4"
                    >Nombre :</label
                >
                <input v-model="name"
                    type="text"
                    placeholder="Escribe aqui tu nombre o nick"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
            <div class="flex flex-col my-5">
                <label for="password" class="font-semibold text-xl my-2 mx-4"
                    >PassWord :</label
                >
                <input v-model="password"
                    type="password"
                    placeholder="Escribe aqui tu password"
                    class="block px-4 py-2 mt-2 mx-4 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                />
            </div>
        </div>
        <button class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold" @click="comprobar">
            Login
        </button>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            players: [],
            name: "",
            password: "",
            playfilter:[]
        };
    },
    methods: {
        async getplayers() {
            const results = await axios.get(
                "http://127.0.0.1:8000/api/userlogin"
            );
            this.players=results.data;
        },
        comprobar(name,pass){
            this.playfilter = this.players.filter(elemento=>elemento.nick==name);
            this.playfilter.forEach(elem =>{
                if(elem.password==pass){
                    alert("el usuario y contraseña son correctos");
                }
            })

        }
        /*comprobar(name, pass) {
  this.playfilter = this.players.filter(elemento => elemento.nick === name);

  if (this.playfilter.length > 0) {
    // Se encontró al menos un usuario con el nombre proporcionado
    const usuarioEncontrado = this.playfilter.find(elem => elem.password === pass);

    if (usuarioEncontrado) {
      // La contraseña coincide
      alert("El usuario y contraseña son correctos");
      return true;  // O puedes devolver algún indicador de éxito
    } else {
      // La contraseña no coincide
      alert("Contraseña incorrecta");
    }
  } else {
    // No se encontró ningún usuario con el nombre proporcionado
    alert("Usuario no encontrado");
  }

  return false;  // O puedes devolver algún indicador de fallo
}*/
    },
    mounted() {
        this.getplayers();
    },
};
</script>
