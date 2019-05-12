<template>
    <div>


        <button @click="addMoon"> Add Moon</button>

   


    </div>
</template>

<script>
    export default {

        props:{

            editable: Object,

        },

        data(){
            return {





            }
        },

        mounted(){

            console.log("testing:", this.editable);
        },

        methods:{
              
            }

        
    }
</script>

<style lang="scss" scoped>

</style>