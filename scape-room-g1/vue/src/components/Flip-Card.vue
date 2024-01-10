<template>
    <div class="card-container" @click="flipCard">
        <div class="card">
            <div v-bind:class="{'card-superior':Sinvolteo,'card-superior-volteo':ConVolteo,'correcto':correcto}">BUSCA Y ENCUENTRA</div>
            <div v-bind:class="{'card-inferior':Sinvolteo,'card-inferior-volteo':ConVolteo,'correcto':correcto}"><slot></slot></div>
	   </div>
    </div>
</template>
<script>
export default{
    props:{
        name:String,
        id:Number
    },
		data() {
				return {
						Sinvolteo:true,
						ConVolteo:false,
                        correcto:false,
                        incorrecto:false
				}
		},
		methods:{
				flipCard(){
						if(this.Sinvolteo){
								this.Sinvolteo=false;
								this.ConVolteo=true;
                                setTimeout(() => {
                                    this.$emit('volteo',this.Sinvolteo,this.id);
                                },500);
						}
				},
                voltearDeNuevo(){

                    if(this.ConVolteo){
                        this.Sinvolteo=true;
                        this.ConVolteo=false;
                        console.log("dando la vuelta a "+this.id);
                        //desde aqui llamo a la progress bar para sumar un error
                        // this.incorrecto=true;
                        // this.$emit('contabilizaError',this.incorrecto)
                    }
                },
                correct(){
                    this.Sinvolteo=false;
                    this.ConVolteo=true;
                    this.correcto=true;
                }
		},

}
</script>
<style scoped>
.card-container{
	box-sizing: border-box;
	padding: 0.5rem;

}
.card div{
    transition: transform 1s ease, opacity 1s ease;
}
.card{
    width: 9rem;
    height: 9rem;
    position: relative;
    perspective: 1000px;
    margin: 0.5rem;
    transform-style: preserve-3d;
}

.card-superior{
	display: flex;
    text-align: center;
	width: 100%;
	height: 100%;
	align-items: center;
	justify-content: center;
	z-index: 1;
	background-color: rgba(255, 255, 255, 0.603);
	border-radius: 1.5rem;
    border: 1px solid rgb(229 231 235);
	position: absolute;
	opacity: 80%;

}
.card-inferior{
	display: flex;
	height: 100%;
	width: 100%;
	align-items: center;
	justify-content: center;
	overflow: hidden;
	background-color: white;
	border-radius: 1.5rem;
    border: 1px solid rgb(229 231 235);
	position: absolute;
	backface-visibility: hidden;
	transform: rotateY(180deg);
}
.card-superior-volteo{
	display: flex;
	width: 100%;
	height: 100%;
	align-items: center;
	justify-content: center;
	z-index: -1;
	background-color: rgba(255, 255, 255, 0.603);
	border-radius: 1.5rem;
    border: 1px solid rgb(229 231 235);
	position: absolute;
	opacity: 80%;
	overflow: hidden;
	backface-visibility: hidden;
	transform: rotateY(180deg);
}
.card-inferior-volteo{
	display: flex;
	height: 100%;
	width: 100%;
	align-items: center;
	justify-content: center;
	background-color: white;
	border-radius: 1.5rem;
    border: 1px solid rgb(229 231 235);
	position: absolute;
	transform: rotateY(360deg);

}
.correcto{
    z-index: 1;
    display: flex;
	height: 100%;
	width: 100%;
	align-items: center;
	justify-content: center;
	background-color: white;
	border-radius: 1.5rem;
	position: absolute;
	transform: rotateY(360deg);
    border: 1px solid rgb(55, 246, 42);
    box-shadow: 0px 0px 35px rgb(55, 246, 42);

}
</style>
