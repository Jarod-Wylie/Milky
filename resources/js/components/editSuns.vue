<template>
    <div>

        <b-button @click="edit">Submit Changes</b-button>

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

                    this.$emit("edit", {
                        edit: this.editable.id,
                        satelites: this.editable.Satelites});
            },

        }
        
    }
</script>

<style lang="scss" scoped>

</style>