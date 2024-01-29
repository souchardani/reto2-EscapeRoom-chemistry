<template>
    <div v-if="showModal"
        class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <!-- Contenido del modal -->
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">

            <div class="">

                <div class="text-center p-5 flex-auto justify-center">
                    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
                        id="modal-id">

                        <div class="w-full  max-w-lg p-5 relative m-auto rounded-xl bg-white opacity-90">
                            <div class="flex flex-col text-center p-5 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="88" height="88" viewBox="0 0 448 512"><path d="M368 128c0 44.4-25.4 83.5-64 106.4V256c0 17.7-14.3 32-32 32H176c-17.7 0-32-14.3-32-32V234.4c-38.6-23-64-62.1-64-106.4C80 57.3 144.5 0 224 0s144 57.3 144 128zM168 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM3.4 273.7c7.9-15.8 27.1-22.2 42.9-14.3L224 348.2l177.7-88.8c15.8-7.9 35-1.5 42.9 14.3s1.5 35-14.3 42.9L295.6 384l134.8 67.4c15.8 7.9 22.2 27.1 14.3 42.9s-27.1 22.2-42.9 14.3L224 419.8 46.3 508.6c-15.8 7.9-35 1.5-42.9-14.3s-1.5-35 14.3-42.9L152.4 384 17.7 316.6C1.9 308.7-4.5 289.5 3.4 273.7z"/></svg>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="88" height="88" fill="#ed5050"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm-12-80V80a12,12,0,0,1,24,0v52a12,12,0,0,1-24,0Zm28,40a16,16,0,1,1-16-16A16,16,0,0,1,144,172Z" />
                                </svg>  -->
                                <h3 class="text-xl font-bold py-4 ">El tiempo se ha terminado</h3>
                                <p class="text-xl font-bold py-4">Ahora tendreis una muerte lenta y dolorosa!!</p>
                            </div>

                            <div class="p-3  mt-2 text-center space-x-4 md:block">
                                <button @click="cerrarModal"
                                    class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Volver
                                    a Sala</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>


export default {
    props: {
        showModal: Boolean,
    },
    methods: {
        cerrarModal() {
            this.$emit('cerrar-modal');
        },
    },
};
</script>




