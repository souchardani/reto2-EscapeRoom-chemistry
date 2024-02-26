import { defineStore } from "pinia";

export const useMessageStore = defineStore("message", {
    state: () => ({
        message: "",
    }),
    actions: {
        setMessage(message) {
            alert("setMessage");
            this.message = message;
            setTimeout(() => {
                this.clearMessage();
            }, 5000); // Elimina el mensaje después de 5 segundos
        },
        clearMessage() {
            this.message = "";
        },
    },
});
