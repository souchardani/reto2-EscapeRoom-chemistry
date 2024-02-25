import { defineStore } from "pinia"

export const useHelpStore = defineStore("help", {
    state: () => {
        return {
            texto: "",
            visible: false
        }
    },
    getters: {

    },
    actions: {
        eligeAyuda(help) {
            this.visible = true;
            switch (help) {
                case 1:
                    this.texto = "Aqui podrás elegir la opcion de jugar de manera invitado. Disfrutarás de toda la extensión del juego, pero tu progreso no se guardará. Si ya dispones de una cuenta, solo necisitas rellenar el nombre de iusuario y contraseña. Si aún no tienes una y quieres disfrutar de la competicion con tus compañeros por una mejor puntuación, Registrate en solo 30 segundos!";
                    break;
                case 2:
                    this.texto = "¿Preparado para empezar? Para hacerlo necesitas encontrar un vial oculto en la imagen. Ese vial te dará una clave para que puedas ponerla en la clave de acceso. Una vez los campos esten completados podrás comenzar la partida. En cualquier momento podrás cancelar la partida y no se guardará nada del progreso. Ánimo";
                    break;
                case 3:
                    this.texto = "Para conseguir progresar,debes seguir las incicaciones de los juegos. Completalos en orden. Hemos puesto las pistas muy claras para que consigas salir del enrollo en el que te has metido. Cada Juego te dará un número que utilizarás en la prueba final que se desbloqueará cuando superes los 4 juegos. ";
                    break;

                default:
                    break;
            }


        },
        visibility() {
            this.visible = !this.visible;
        },

    }
})
