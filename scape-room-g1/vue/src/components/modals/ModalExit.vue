<template>
    <!-- Modal Overlay -->
    <div
        v-show="showModal"
        class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center transition-opacity ease-out duration-300"
    >
        <!-- Modal Content -->
        <div
            class="bg-white overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50 shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-90 border border-gray-200"
        >
            <!-- Modal Header -->
            <div
                :class="[
                    'shadow-lg',
                    'bg-clip-padding',
                    'border',
                    ' border-gray-200',
                    'text-white',
                    'px-4',
                    'py-2',
                    'flex justify-between',
                    bgColor,
                ]"
            >
                <h2 class="text-lg font-semibold">
                    Estas Seguro que quieres salir del juego?
                </h2>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                Esto hará que pierdas la partida, eliminando tu progreso, y
                tendrás que volver a empezar.
                <slot></slot>
            </div>
            <!-- Modal Footer -->
            <div class="border-t px-4 py-2 flex justify-end">
                <button
                    @click="cancelar"
                    :class="[
                        'px-3',
                        'py-1',
                        'text-black',
                        'rounded-md',
                        'w-full',
                        'sm:w-auto',
                        'bg-slate-300',
                        'mr-2',
                    ]"
                >
                    Cancelar
                </button>
                <button
                    @click="enviarCierre"
                    :class="[
                        'px-3',
                        'py-1',
                        'text-white',
                        'rounded-md',
                        'w-full',
                        'sm:w-auto',
                        bgColor,
                    ]"
                >
                    {{
                        textoBotonCerrar
                            ? textoBotonCerrar
                            : "Finalizar Partida"
                    }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        showModal: Boolean,
        bgColor: String,
        titulo: String,
        texto: String,
        textoBotonCerrar: String,
    },
    name: "ModalStartGame",

    methods: {
        enviarCierre() {
            this.$emit("close");
        },
        cancelar() {
            this.$emit("cancelar");
        },
    },
    mounted() {},
};
</script>

<style></style>
