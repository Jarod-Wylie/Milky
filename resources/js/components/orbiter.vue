<template>
    <div>

            <v-circle
                @click="addPlanet"
                ref="orb"
                :config="{
                    x:xC,
                    y:yC,
                    radius: 20,
                    fill: 'yellow',
                }"/>

            <planet
                v-for="item in list"
                ref="satelite"
                :key="item.id"
                :xC="item.x"
                :yC="item.y">  
            </planet>



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
                list:[],
                XLL: 0,
                YLL: 0,
                satelites: false,

            }
        
        },

        

        mounted(){
                const vm = this;
                const amplitude = 100;
                const period = 10000;
                var radians = 1;
                 var obj= {nuX: 0, nuY: 0};

                const sun = this.$refs.orb.getStage();
                const centerX = sun.attrs.x;

                const centerY = sun.attrs.y;
              
                const anim = new Konva.Animation(function(frame) {

                radians = (frame.time * 2 * Math.PI) / period;


                sun.setX(vm.amp * Math.sin(radians) + centerX);

                

                sun.setY(vm.amp * Math.cos(radians) + centerY);

                obj.nuX = vm.amp * Math.sin(radians) + centerX;

                obj.nuY = vm.amp * Math.cos(radians) + centerY;
                if(!vm.satelites){
                    vm.adjustPlanet(obj);
                }
                

                }, sun.getLayer());
                anim.start();

        },

        methods:{

            addPlanet(obj){
                console.log("hoi",obj.nuX);
                this.list.push({ x: obj.nuX, y: obj.nuY, radius: 20, fill: 'brown'});

                this.list[0].x = obj.nuX;
                this.list[0].y = obj.nuY;
                this.satelites = true;
                console.log('trying to mutate:', this.list[0].x );
                // this.list[0].x += 45;

            },

            adjustPlanet(event){
                // console.log("hoi");
                // var orb = { radius: 20, fill: 'blue'};

                // orb["x"] = this.xC;

                // orb["y"] = this.yC;
            

                

                this.satelites = true;
                // console.log("HOI:",this.$refs.satelite[0].xC);

                // this.$refs.satelite[0].xC += 50;

                // this.$emit("inMotion", {x: 3, y: 4})

            },

            
        },

               
        
            

        
        
    }
</script>

<style>

</style>