<template>
    <div>
        Stage Set
    <div>
        <button @click="distance">How far away?</button>
    </div>
    
    <div>
        <button @click="changeAmp">Change Amp</button>
    </div>
    
    <div>
        <button @click="changeDegree">Change Degree</button>
    </div>

    <div>
        <button @click="ani = !ani">Orbit on</button>
    </div>

    <!-- Stage can report x and y coordinate values of mouse
     position and will render a blue square at position mouse is clicked-->
      <v-stage 
      ref="stage" 
      :config="stageSize"
      @mousemove="handleMouseMove"
      @click="handleClick">
      <v-layer>
            <v-circle 
            :config="circle"
            ref = "circ"/>

            <v-circle
            :config="center"
            ref="ord"/>

            <v-rect
            v-for="item in list"
            :key="item.id"
            :config="{
            x: item.x, y: item.y, width: 10, height: 10, fill: 'blue',
          }"/>

            <v-text ref="text" :config="{
                x: 10,
                y: 10,
                fontFamily: 'Calibri',
                fontSize: 24,
                text: text,
                fill: 'black'
            }" />

            
     
      </v-layer>

      
    </v-stage>

    </div>
</template>

<script>
const width = window.innerWidth;
const height = window.innerHeight;

    export default {

        

        data(){

            return {
            
            ani: false,
            degree: 0,
            amp: 100,
            origin: 650,

            max: 100,

            stageSize: {
            width: width,
            height: height,

            },
            flip:true,

            circle: {
                x: 650,
                y: 100,
                radius: 10,
                fill: 'blue',
                
            },
            
            center: {
                x: 300,
                y: 100,
                radius: 10,
                fill: 'black',
                
            },


            text: "",
            list: [{ x: 650, y: 100, radius: 50, fill: 'blue' }],
        }

        },

        mounted() {
            
            const vm = this;
            const amplitude = 100;
            const period = 1000;
            // in ms
            const centerX = this.$refs.ord.getStage().attrs.x;
            
            const centerY = this.$refs.ord.getStage().attrs.y;
            console.log("ord:", this.$refs.ord.getStage().attrs.x);


            const circ = this.$refs.circ.getStage();
            console.log("mounted");

            // example of Konva.Animation
            const anim = new Konva.Animation(function(frame) {


            if(vm.ani == true){
                radians = (frame.time * 2 * 3.14) / period;
            }
            else{
                var radians = vm.degree * 0.0174532925;
            }

            circ.setX(
                vm.amp * Math.sin(radians) + centerX
            );
            
            circ.setY(
                vm.amp * Math.cos(radians) + centerY
            );
            
            }, circ.getLayer());

            anim.start();
        },

        methods: {

            changeAmp(){
                this.amp = prompt("Enter a number 1 - 100");
                console.log(this.amp);
            },

            changeDegree(){
                this.degree = prompt("Enter a number 1 - 100");

            },

            distance(){
                var dist = prompt("Enter a number 1 - 100");
                dist = parseInt(dist);
                dist += this.origin;
                this.list.push({x: dist, y: 100});

                
            },

            handleClick(evt) {
                const stage = evt.target.getStage();
                const pos = stage.getPointerPosition();
                this.list.push(pos);
                console.log(pos);
            },

            writeMessage(message) {
                this.text = message;
            },
            
            handleMouseMove(event) {
                const mousePos = this.$refs.stage.getStage().getPointerPosition();
                const x = mousePos.x;
                const y = mousePos.y;
                this.writeMessage('x: ' + x + ', y: ' + y);
    }
        }
        
    }


//     frame.time * 2 * 3.14) / period

</script>

<style>

</style>