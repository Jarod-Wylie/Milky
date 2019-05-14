

<template>
  <div>

    <v-stage ref="stage" :config="stageSize">
      <v-layer>

        <v-line :config="line" ref="line"/>

        <v-circle :config="circle" ref="circ"/>

        <v-circle :config="center"  @click="draw" ref="ord" />

      </v-layer>
    </v-stage>
  </div>
</template>
<script>
const width = window.innerWidth; 
const height = window.innerHeight;

export default {
  data() {
    return {
      ani: false,
      degree: 0,
      amp: 200,
      origin: { x: 300, y: 300 },

      stageSize: {
        width: 600,
        height: 500
      },
      flip: true,

      circle: {
        x: 650,
        y: 50,
        radius: 15,
        fill: "blue"
      },

      center: {
        x: 300,
        y: 250,
        radius: 20,
        fill: "black"
      },

      line: {
        points: [],
        stroke: 'white',
        strokeWidth: 40,
        lineCap: 'round',
        lineJoin: 'round'

      },

      list: [],
      text: "",

      paused: false,

      circ: {},

      systems: [],

      index: 0,

      b: 0,
      c: 0,
    };
  },

  mounted() {
    this.start();
  },

  computed: {},

  methods: {
    start() {

      const vm = this;
      const amplitude = 100;
      const period = 10000;

      const centerX = this.$refs.ord.getStage().attrs.x;
      const centerY = this.$refs.ord.getStage().attrs.y;

      // Formula to translate degrees selceted by user to radians. see changeDegree()
      var radians = vm.degree * (Math.PI/180);


      const circ = this.$refs.circ.getStage();
      
      const anim = new Konva.Animation(function(frame) {

        // Calculates object's position in its orbit
        circ.setX(vm.amp * Math.sin(radians) + centerX);
        circ.setY(vm.amp * Math.cos(radians) + centerY);
        
        vm.line.points.push(vm.amp * Math.sin(radians) + centerX);
        vm.line.points.push(vm.amp * Math.cos(radians) + centerY);

        if(vm.amp * Math.sin(radians) + centerX == vm.line.points[290] && vm.amp * Math.cos(radians) + centerY == vm.line.points[291]){
            window.location.href = '/Milk';
        }
        // vm.draw();

        // retains the original degree->radian set in the data to begin motion from
        // rather than: radians = (frame.time * 2 * Math.PI) / period;
        radians = radians + (((60 * 2 * Math.PI)) / period);
        
      }, circ.getLayer());

      anim.start();
    },

    draw(){
      this.index++
      this.line.points.push(this.b);
      this.line.points.push(this.c);

    }

  }
};
</script>

<style>
</style>


