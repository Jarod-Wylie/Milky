<template>
    <div>

        <b-button @click="edit">Delete</b-button>

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
            
            edit(){

                    this.$emit("delete", {
                        edit: this.editable.id});
            },

        }
        
    }
</script>

<style lang="scss" scoped>

</style>