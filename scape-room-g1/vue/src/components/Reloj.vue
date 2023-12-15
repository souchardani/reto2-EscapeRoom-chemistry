<template>
    <div class="clock" id="model3">
        <div :value="txtTitle" id="txtTitle"></div>
        <div class="count">
            <div :value="txtTimer" id="timer"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            txtTitle: "Tiempo Restante",
            segundos: 1800,
        };
    },
    methods: {
        setTimer() {
            this.segundos = 1800;
        },
        bajarSeg() {
            let minutos = Math.floor(this.segundos / 60);
            let segundosRestantes = sec % 60;
            if (segundosRestantes < 10) {
                segundosRestantes = "0" + segundosRestantes;
            }
            if (minutos < 10) {
                minutos = "0" + minutos;
            }
            this.txtTimer = minutos + " + " + segundosRestantes;

            if (segundosRestantes > 0) {
                segundosRestantes = segundosRestantes - 1;
            } else {
                clearInterval(countDown);

                countDiv.innerHTML = "countdown done";
            }
        },
    },
    computed: {
        txtTimer() {
            cuentaAtras = setInterval(() => {
                this.bajarSeg();
            }, 1000);
        },
    },
};

function secpass() {
    "use strict";

    if (sec > 0) {
        sec = sec - 1;
    } else {
        clearInterval(countDown);

        countDiv.innerHTML = "countdown done";
    }
}
</script>
