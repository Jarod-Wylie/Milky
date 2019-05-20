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

            }
        },

        mounted(){

            console.log("testing:", this.editable);
        },

        methods:{
            
            change(){

                    this.$emit("change", {
                        edit: this.editable.id,
                        satelites: this.editable.Satelites});
            },

              
            addPlanet(){
                    this.$emit("addPlanet", {
                        add: this.editable.id, 
                        name: this.editable.name, 
                        x: this.editable.XCoordinate,
                        y: this.editable.YCoordinate,
                        satelites: JSON.parse(this.editable.Satelites),
                        });

            }
        }
        
    }
</script>

<style lang="scss" scoped>

</style>