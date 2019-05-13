<template>
    <div>

        <button @click="addPlanet" data-dismiss="modal"> Add</button>

    </div>
</template>

<script>
    export default {

        props:{

            editable: Object,
            sun: Object,

        },

        data(){
            return {



            }
        },

        mounted(){

            console.log("testing:", this.editable);
        },

        methods:{
            

              
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