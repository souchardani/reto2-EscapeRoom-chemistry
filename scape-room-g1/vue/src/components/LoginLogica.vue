<template>
    <p>pass: {{ pass }} </p>
</template>

<script>
export default {
    data() {
        return {
            pass: ""
        };
    },
    computed: {

    },
    methods: {
        generatePass() {
            //this.pass = ""

            // genera la contraseña usando los siguientes caracteres
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;

            while (counter < 5) {
                this.pass += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
        }

    },
    mounted() {
        this.generatePass()
    },
};
</script>

<style scoped></style>
