<template>
    <div class="container-fluid md: lg xl bg-gradient-to-r from-emerald-500 to-emerald-900">
        <header>
            <h1 class="text-4xl text-center font-bold text-gray-50 bg-black px-3 py-8 m-1">Cada Oveja con su Pareja</h1>
        </header>

            <main class="m-5">
                <p class="border-transparent shadow-xl p-2 rounded-lg m-8 text-center m-auto bg-gradient-to-r from-slate-300 to-slate-400">Ya estas cerca de conseguir el objetivo, solo tendrás que terminar esta prueba. Deberás responder bie a 10 cuestiones seleccionando las respuestas que estan en el desplegable. Solo se te concederán 5 fallos. Te deseo suerte</p>
            </main>
            <div class="w-full bg-red-600 rounded-full h-2.5 dark:bg-red-600">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 10%"></div>
            </div>

            <select name="answeres" class="p-4 m-5">
                <option v-for="grow in grows" value="">{{grow.answere}}</option>
            </select>
            <h4>Une con la casilla que corresponas:</h4>
            <h4 class="text-4xl">{{ this.quizs[{{ this.contador }}].quiz }}</h4>
    </div>
</template>
<script>
export default{
    data() {
        return {
            contador:0,
            quizs:[],
            grows:[{
                quiz:'Recuento de mesófilos, aerobios y heterótrofos.',
                answere:'PCA'
            },{
                quiz:'Detección de Coliformes, los de fermentación lenta tardan en crecer.',
                answere:'MCCONKEY'
            },{
                quiz:'Detección y recuento de E. coli y coliformes.',
                answere:'CCA'
            },{
                quiz:'Para la confirmación de enterococos.',
                answere:'KAA'
            },{
                quiz:'Detección y recuento de coliformes en agua, alimentos….',
                answere:'VRBG'
            },{
                quiz:'Se usa para el aislamiento y el cultivo de microorganismos Gram - entéricos, y especialmente para el aislamiento de especies de Shigella y Salmonella.',
                answere:'HEKTOEN'
            },{
                quiz:'Crecimiento general. Recuento de totales.',
                answere:'TSA'
            },{
                quiz:'Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico.',
                answere:'KIA'
            },{
                quiz:'Diferenciación de enterobacterias en base la capacidad de usar citrato como única fuente de carbono y energía.',
                answere:'CITRATO SIMMONS'
            },{
                quiz:'Se utiliza para la detección de coliformes y la detección fluorogénica de Escherichia coli en un entorno de laboratorio.',
                answere:'LAURIL SULFATO CON MUG'
            },{
                quiz:'Es ideal para la enumeración de enterococos mediante el método de dilución en serie (NMP).',
                answere:'CALDO DE GLUCOSA ACIDA (ROTHE)'
            },{
                quiz:'Aislamiento y recuento de enterococos.',
                answere:'AGAR SLANETZ Y BARTLEY'
            },{
                quiz:'Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.',
                answere:'AGAR SANGRE'
            },{
                quiz:'Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.',
                answere:'MCP'
            },{
                quiz:'Aislamiento  y recuento de Clostridium perfringens en agua, alimentos….',
                answere:'TSC'
            },{
                quiz:'Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG.',
                answere:'AGUA DE PEPTONA'
            },{
                quiz:'Para analizar la sensibilidad de cepas aisladas a partir de agentes antimicrobianos ANTIBIOGRAMAS.',
                answere:'MUELLER-HILTON'
            },{
                quiz:'Diferenciación de la fermentación de lactosa  de tipo butanodiólica y ácido mixta (Diferenciar Serratia-E.coli).',
                answere:'EMB'
            },{
                quiz:'Se utiliza para el cultivo de microorganismos heterótrofos.',
                answere:'BACTO 2R'
            },{
                quiz:'Medio selectivo y diferencial utilizado para el control presuntivo de E. coli y coliformes en aguas.',
                answere:'CHAPMAN TTC'
            },{
                quiz:'Es utilizado en el control de esterilidad de productos biológicos, farmacéuticos y cosméticos.',
                answere:'TSB'
            },{
                quiz:'Medio selectivo y diferencial para enumeración de coliformes fecales por la técnica de Filtración de Membrana, en aguas.',
                answere:'M-FC'
            },{
                quiz:'Este medio se utiliza para el aislamiento primario de Salmonella a partir de muestras fecales humanas.',
                answere:'SALMONELLA-SHIGELLA'
            },{
                quiz:'La selectividad se debe al sulfito de sodio, supresión parcial de los microorganismos Gram +',
                answere:'ENDO'
            },{
                quiz:'Medio para la detección y recuento de enterococos.',
                answere:'ESTREPTOCOCOS-KF'
            },{
                quiz:'Se usa para el aislamiento de hongos.',
                answere:'SABOURAUD CON CLORANFENICOL'
            },{
                quiz:'Es un medio nutricionalmente rico que se utiliza principalmente para el cultivo de bacterias..',
                answere:'LURIA'
            },{
                quiz:'Recuento y detección de E. coli en alimentos.',
                answere:'TSX'
            },{
                quiz:'Medio de cultivo utilizado para diferenciar microorganismos, especialmente Salmonella spp., basado en la descarboxilación y desaminación de la lisina y en la producción de ácido sulfhídrico.',
                answere:'LIA'
            },{
                quiz:'Medio para ensayos de Rojo de metilo y Voges-Proskauer (APHA) para la identificación acorde al IMVIC.',
                answere:'CLARCK Y LUBS'
            }]
        }
    },
    mounted(){

        for(let i=0;i<15;i++){
            let qquiz=Math.floor(Math.random()*(this.grows.length));
            let object={quiz:this.grows[qquiz].quiz,
                        answere:this.grows[qquiz].answere};

            this.quizs.push(object);
        }
    }
}
</script>
