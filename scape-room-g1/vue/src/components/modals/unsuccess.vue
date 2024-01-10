    <template>
    <div v-show="mostrar" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">

        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">

            <div class="">

                <div class="text-center p-5 flex-auto justify-center">
                    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">

                        <div class="w-full  max-w-lg p-5 relative m-auto rounded-xl bg-white opacity-90">
                            <div class="flex flex-col text-center p-5 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="88" height="88" fill="#ed5050" viewBox="0 0 256 256"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm-12-80V80a12,12,0,0,1,24,0v52a12,12,0,0,1-24,0Zm28,40a16,16,0,1,1-16-16A16,16,0,0,1,144,172Z"/></svg>
                                <h3 class="text-xl font-bold py-4 ">No has superado el Mini-Juego</h3>
                                <p class="text-xl font-bold py-4" >Se descontarán 5 minutos de tu tiempo</p>
                            </div>

                            <div class="p-3  mt-2 text-center space-x-4 md:block">
                                <button @click="emitiendo" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Volver a Sala</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    props:{
        mostrar:Boolean
    },
    data() {
        return {
        }
    },
    methods: {
        emitiendo(){
             this.$emit('clicked',false);
        },

    },
    computed:{

    }
}
</script>
