<template>
    <div>
        <label for="">Introduce una letra</label><br><br>
        <input type="text" id="letra" maxlength="1" size="1" ><br><br>
        <GlassBtn @click="mostrarLetra()">pulsar</GlassBtn>
    </div>
    <div>
        <h1>{{ palabraBarra }}</h1>
        <h2>{{ mostrar }}</h2>
    </div>
</template>

<script>
import GlassBtn from "../components/GlassBtn.vue";
export default {
    components:{
        GlassBtn,
    },
    data() {
        return {
            palabras:["botella","manzana","escoba"],
            random:"",
            oculto:"",
            palabraBarra:"",
            mostrar:[],
            letra:"",
        }
    },
    methods: {
        insertarPalabra(){
            this.random=this.palabras[Math.floor(Math.random()*this.palabras.length)];
            return this.random;
        },
        ocultarPalabra(){
            this.oculto=this.random.length;

            for (let i = 0; i < this.oculto; i++) {
                this.palabraBarra += "_ ";

            }
        },
        mostrarLetra(){
            this.letra=document.getElementById('letra').value;

            for (let i = 0; i < this.random.length; i++) {
               if (this.letra==this.random[i]) {
                    alert('has acertado');
                    // this.mostrar+=this.random[i];
                    this.mostrar[i]=this.letra;
               }else{
                    this.mostrar[i]="_";
               }



            }
        },

    },
    mounted(){
        this.insertarPalabra();
        this.ocultarPalabra();
        this.mostrarLetra();
    }
}
</script>
