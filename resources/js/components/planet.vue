<template>
    <div>

            <v-circle
                @click="addOrb"
                v-on:inMotion="account"
                ref="orb"
                :config="{
                    x:xC,
                    y:yC,
                    radius: 20,
                    fill: 'green',
                }"/>



    </div>
</template>

<script>
    export default {

        props:{
            xC: Number,
            yC: Number,
            ord: Object,

        },

        data(){

            return{
                degree: 360,
                amp: 100,

            }
        
        },

        methods:{

            account(obj){
                console.log("acounting");
            },

            addOrb(){
                var orb = { radius: 20, fill: 'blue'};

                orb["x"] = this.xC;

                orb["y"] = this.yC;




                this.$emit("onOrbSelected", {x: orb.x, y: orb.y})
            },

            
        },

        mounted(){
                const vm = this;
                const amplitude = 100;
                const period = 10000;
                var radians = 1;
                // in ms
                const sun = this.$refs.orb.getStage();
                const centerX = sun.attrs.x;

                

                const centerY = sun.attrs.y;
                console.log("ord:", this.$refs.orb.getStage().attrs.x);

                // console.log("This is stage", planet.attrs);

                // example of Konva.Animation
                const anim = new Konva.Animation(function(frame) {
                // if (vm.ani == true) {
                    radians = (frame.time * 2 * Math.PI) / period;
                // } else {
                //     //  vm.degree = radians / 0.0174532925;
                //     radians = vm.degree * 0.0174532925;
                // }
             
                    // sun.setX(vm.xC);
                    // sun.setY(vm.yC);
                sun.setX(vm.amp * Math.sin(radians) + parseInt(centerX));
                

                sun.setY(vm.amp * Math.cos(radians) + parseInt(centerY));
                }, sun.getLayer());

                anim.start();

        }

               
        
            

        
        
    }
</script>

<style>

</style>