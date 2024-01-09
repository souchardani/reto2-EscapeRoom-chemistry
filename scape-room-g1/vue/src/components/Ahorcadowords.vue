<template>
    <div>
        <label for="">Introduce una letra</label>
        <div class="pb-5 mt-20 mb-12">

            <img :src="imagen" class='mx-auto'>

        </div>
        <input type="text" id="letra" maxlength="1" size="1" ><br><br>
        <button class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 mb-5 text-2xl font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            style="backdrop-filter: blur(20px)" @click="mostrarLetra()">pulsar</button><br>

    </div>
    <div>
        <!-- <h1>{{ palabraBarra }}</h1> -->
        <h2>{{ mostrar }}</h2>
        <!-- <h1>{{ imagen }}</h1> -->
    </div>
</template>

<script>




export default {


    data() {
        return {
            palabras:["botella","manzana","escoba"],
            random:"",
            oculto:"",
            palabraBarra:"",
            mostrar:[],
            letra:"",
            imagen: "../assets/game3_hangman_img/hangman1.png",

        }
    },
    methods: {
        insertarPalabra(){
            this.random=this.palabras[Math.floor(Math.random()*this.palabras.length)];
            return this.random;
        },
        mostrarLetra(){
            this.letra=document.getElementById('letra').value;

            for (let i = 0; i < this.random.length; i++) {

               if (this.letra==this.random[i]) {
                    alert('has acertado');
                    // this.mostrar+=this.random[i];
                    this.mostrar[i]=this.letra;
               }

               if(this.letra!=this.random[i] ){
                    // this.imagen='../assets/game3_hangman_img/hangman1.png'
               }

               if (this.mostrar[i]==null) {
                this.mostrar[i]="_";
               }
            }
        },

    },
    mounted(){
        this.insertarPalabra();
        this.mostrarLetra();
    }
}
</script>
