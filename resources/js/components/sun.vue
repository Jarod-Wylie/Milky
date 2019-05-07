<template>
    <div>

            <v-circle
                @click="satelites = true"
                ref="orb"
                :config="{
                    x:xC,
                    y:yC,
                    amplitude: ampC,
                    start: degreeC,
                    radius: 20,
                    fill: 'yellow',
                }"/>

            <planet
                v-for="item in list"
                ref="satelite"
                :key="item.id"
                :xC="item.x"
                :yC="item.y"
                :kX="item.kX"
                :kY="item.kY"
                :ampC="item.amplitude">  
            </planet>



    </div>
</template>

<script>
    export default {

        props:{
            xC: Number,
            yC: Number,
            ord: Object,
            ampC: Number,
            degreeC: Number,

        },

        data(){

            return{
                degree: 360,
                amp: 0,
                list:[],
                satelites: false,
                inMotion: false,
            }
        
        },

        

        mounted(){
                console.log('Sun Mounted');

                const vm = this;
                const sun = this.$refs.orb.getStage();

                vm.amp = sun.attrs.amplitude;

                const period = ((200 * vm.amp)/1.5);
                var radians = 90;
                    console.log("attrs",sun.attrs)

                // nuX and nuY are temporary attributes that pass out of the
                // animation frame into the addPlanet() and move()
                var obj= {nuX: 0, nuY: 0};

                const centerX = sun.attrs.x;

                const centerY = sun.attrs.y;
                
                // console.log("Amplitude", ampC);
                const anim = new Konva.Animation(function(frame) {


                radians = (frame.time * 2 * Math.PI) / period;


                sun.setX(vm.amp * Math.sin(radians) + centerX);


                sun.setY(vm.amp * Math.cos(radians) + centerY);

                obj.nuX = vm.amp * Math.sin(radians) + centerX;

                obj.nuY = vm.amp * Math.cos(radians) + centerY;


                            if(vm.satelites){
                                vm.addPlanet(obj);
                            }
                            if(vm.inMotion){
                                vm.move(obj);
                            }


                }, sun.getLayer());
                anim.start();

        },

        methods:{

            
            // Pushes to list to make planet object
            addPlanet(obj){

                var amp = parseInt(prompt("How far away is this planet?"));

                this.satelites = false;
                console.log("hoi",obj.nuX);
                this.list.push({ 
                    x: obj.nuX, 
                    y: obj.nuY, 
                    kX: obj.nuX, 
                    kY: obj.nuY,
                    amplitude: amp,
                });

                // Sets the conditon in 
                this.inMotion = true;
            },

            // Updates each object in the list of planets a Sun has
            move(obj){

                for(let planet in this.list){
                    this.list[planet].kX = obj.nuX;
                    this.list[planet].kY = obj.nuY;
                }

            }
        },

               
        
            

        
        
    }   
</script>

<style>

</style>