<template>
    <div>
        <b-button @click="change"> Submit</b-button>

   


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

              
            }
        }
        
    }
</script>

<style lang="scss" scoped>

</style>