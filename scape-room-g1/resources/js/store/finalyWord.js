import { defineStore } from "pinia";
import axios from "axios";

export const useFinalyWord = defineStore("finalyWord", {
    //variables en state
    state: () => {
        return {
            dataBaseData: [],
            respuestaFinal: [{}],
            cientifico: "",
            clave: "",
        };
    },
    //getters o propiedades computadas
    getters: {},
    //setters o metodos
    actions: {
        //funcion asincrona para recoger los datos de la BD
        async getDataBase() {
            const response = await axios.get(
                "http://127.0.0.1:8000/api/getjuego5"
            );
            this.dataBaseData = response.data;
            this.getClaveAleatoria(this.dataBaseData);
        },
        //funcion seleccionar clave aleatoriamente
        getClaveAleatoria(array) {
            this.respuestaFinal =
                array[Math.floor(Math.random() * array.length)];
            this.cientifico = this.respuestaFinal.nombreCientifico;
            this.clave = this.respuestaFinal.clave;
        },
    },
});
