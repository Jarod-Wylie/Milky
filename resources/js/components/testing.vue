<template>
    <div>
        <b-button @click="change"> Submit</b-button>

        <button @click="addPlanet"> Add</button>

   


    </div>
</template>

<script>
    export default {

        props:{

            editable: Object,

        },

        data(){
            return {


                patchPath:"/editObj/",

                message: "",

                skills:[],

            }
        },

        mounted(){

            console.log("testing:", this.editable);
        },

        methods:{
            
            change(){
                 

                    this.$emit("change", {edit: this.editable.id});
            },

              
            addPlanet(){
                 

                    this.$emit("change", {add: this.editable.id});

              
            }
        }
        
    }
</script>

<style lang="scss" scoped>

</style>