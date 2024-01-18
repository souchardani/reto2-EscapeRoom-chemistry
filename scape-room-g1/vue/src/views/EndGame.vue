<template>

    <div class="container-fluid flex mx-4 p-4 justify-center items-center">
        <h1 :cientifico="cientifico" class="text-5xl font-medium">{{ this.cientifico }}</h1>
    </div>
    <div class="container-fluid flex justify-center items-center mx-4 p-4">
        <input type="text" id="1" maxlength="1" v-model="input1" class="flex w-[100px] h-[100px] md:w-[150px] md:h-[150px] xl:w-[200px] xl:h-[200px] bg-white shadow-lg rounded-3xl bg-opacity-60 border border-gray-200 mx-1 md:mx-2 text-center justify-center items-center my-auto text-5xl font-medium ">
        <input type="text" id="2" maxlength="1" v-model="input2" class="flex w-[100px] h-[100px] md:w-[150px] md:h-[150px] xl:w-[200px] xl:h-[200px] bg-white shadow-lg rounded-3xl bg-opacity-60 border border-gray-200 mx-1 md:mx-2 text-center justify-center items-center my-auto text-5xl font-medium ">
        <input type="text" id="3" maxlength="1" v-model="input3" class="flex w-[100px] h-[100px] md:w-[150px] md:h-[150px] xl:w-[200px] xl:h-[200px] bg-white shadow-lg rounded-3xl bg-opacity-60 border border-gray-200 mx-1 md:mx-2 text-center justify-center items-center my-auto text-5xl font-medium ">
        <input type="text" id="4" maxlength="1" v-model="input4" class="flex w-[100px] h-[100px] md:w-[150px] md:h-[150px] xl:w-[200px] xl:h-[200px] bg-white shadow-lg rounded-3xl bg-opacity-60 border border-gray-200 mx-1 md:mx-2 text-center justify-center items-center my-auto text-5xl font-medium ">
        <input type="text" id="5" maxlength="1" v-model="input5" class="flex w-[100px] h-[100px] md:w-[150px] md:h-[150px] xl:w-[200px] xl:h-[200px] bg-white shadow-lg rounded-3xl bg-opacity-60 border border-gray-200 mx-1 md:mx-2 text-center justify-center items-center my-auto text-5xl font-medium ">
    </div>

</template>
<script>
import { useFinalyWord } from '../store/finalyWord';
import { mapWritableState } from 'pinia';
export default{
    data() {
        return {
            cientifico:"Henri Moissan",//esta variable es el nombre el cientifico que daremos como pista
            pista:"F1886",//esta variable es la pista completa que tienen que resolver
            words:[
                {input1:""},
                {input2:""},
                {input3:""},
                {input4:""},
                {input5:""},
            ],
        }

    },
    methods:{
        siguienteinput(){

        }
    },
    computed:{
        ...mapWritableState(useFinalyWord,["cientifico","clave"]),
    }
}
</script>
