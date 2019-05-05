<template>
    <div>
        
        <div>
            <button @click="draw">draw</button>
      </div>
    </div>
</template>

<script>
    export default {

        data(){

            return{

            }
        
        },

        props:{
            x: Number,
            y: Number,

        },

        methods:{

        draw(){
            console.log("draw");

        }
        }
        
    }
</script>

<style>

</style>