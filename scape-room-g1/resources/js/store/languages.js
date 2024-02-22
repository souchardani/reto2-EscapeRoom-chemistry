import { defineStore } from 'pinia';

export const useIdioma = defineStore('languages', {
    state: () => {
        return {
            seleccionIdioma: 'es',
            idioma: [{
                name: "es", estado: true, texto: "Español"
            }, {
                name: "en", estado: false, texto: "English"
            }, {
                name: "eu", estado: false, texto: "Euskara"
            },]
        }
    },
    getters: {}
    ,
    actions: {
        cambioIdioma(nuevoIdioma) {

            this.idioma.forEach(element => {
                if (element.name == nuevoIdioma) {
                    element.estado = true;
                    console.log(`Idioma cambiado a ${element.texto}`);
                } else {
                    element.estado = false;
                }
            });
        }
    }

})
