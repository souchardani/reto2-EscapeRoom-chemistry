import { defineStore } from 'pinia';

export const useIdioma = defineStore('languages', {
    state: () => {
        return {
            seleccionIdioma: 'es',
            idioma: [{
                name: "es", estado: true
            }, {
                name: "en", estado: false
            }, {
                name: "eu", estado: false
            },]
        }
    },
    getters: {}
    ,
    actions: {
        cambioIdioma(nuevoIdioma) {
            let indice = this.idioma.findIndex(element => element.name === nuevoIdioma.toLowerCase());
            this.idioma.forEach(element => {
                element.estado = false;
            });
            this.idioma[indice].estado = true;
        }
    }

})
