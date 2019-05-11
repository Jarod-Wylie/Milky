<template>
    <div>
        hoi testing
        {{skills}}
    </div>
</template>

<script>
    export default {

        data(){
            return {

                message: "",

                skills:[],

            }
        },

        created(){

            let vm = this;

            axios.get("/skills").then(response => vm.skills = response.data);
        }
        
    }
</script>

<style lang="scss" scoped>

</style>