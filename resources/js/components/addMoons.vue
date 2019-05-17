

<template>
    <div>
        
        <button @click="addMoon"> Add Moon</button>

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

            console.log("Moon testing:", this.editable);
            console.log('PATCH ID:', this.systemID);
        },

        methods:{

            addMoon(){
                 

                    this.$emit("addMoon", {
                        patchID: this.sun.id, 
                        name: this.sun.name, 
                        x: this.sun.XCoordinate,
                        y: this.sun.YCoordinate,
                        preserve: this.editable
                        });
            },
              
            }

        
    }
</script>

<style lang="scss" scoped>

</style>