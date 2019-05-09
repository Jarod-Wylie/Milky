



<!-- Warning: VERY MESSY CODE

Much of what is here right now is not the finished product. The super massivee black hole is only important
for hosting the original ordinate for spawning stars.-->



<template>
  <div>


      
<!--       
      <h1 
      v-for="system in systems"
      :key="system">
      System: {{ system.x }}</h1> -->




    <h1>Orbit Lab</h1>
    <div>
      <button @click="distance">How far away?</button>
      <button @click="changeAmp">Change Amp</button>
      <button @click="changeDegree">Change Degree</button>

    </div>

    <!-- Stage can report x and y coordinate values of mouse
    position and will render a blue square at position mouse is clicked-->
    <v-stage ref="stage" :config="stageSize" @mousemove="handleMouseMove">
      <v-layer>
        <v-circle :config="circle" ref="circ"/>

        <v-circle :config="center" ref="ord" v-on:onOrbSelected="pushSun" @click="addSun"/>

        <v-text
          ref="text"
          :config="{
              x: 10,
              y: 10,
              fontFamily: 'Calibri',
              fontSize: 24,
              text: text,
              fill: 'black'
            }"
        />

        <sun 
          v-for="item in list" 
          :key="item.id" 
          :xC="item.x" 
          :yC="item.y" 
          :ampC="item.amplitude"
          :degreeC="item.start">
        </sun>

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
      degree: 270,
      amp: 100,
      origin: { x: 650, y: 450 },

      stageSize: {
        width: 1000,
        height: 1000
      },
      flip: true,

      circle: {
        x: 650,
        y: 100,
        radius: 10,
        fill: "blue"
      },

      center: {
        x: 650,
        y: 450,
        radius: 10,
        fill: "black"
      },

      list: [],
      text: "",

      paused: false,

      circ: {},

      systems: [],

      index: 0,
    };
  },

  mounted() {
    this.start();



    axios
    .get('/systems')
    .then(response => this.systems = (response.data));
    // .then(response => console.log('home:', response.data));


    



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

        // retains the original degree->radian set in the data to begin motion from
        // rather than: radians = (frame.time * 2 * Math.PI) / period;
        radians = radians + (((60 * 2 * Math.PI)) / period);
        
      }, circ.getLayer());

      anim.start();
    },

    addSun() {

      // add: 
      //amplitude - distance away from black hole
      var amp = parseInt(prompt("How far away is this star?"));

      // degree - where in is the planet in it's orbit right now
      var degree = parseInt(prompt("Where is it right now in it's orbit?"))

      this.list.push({
        x: this.origin.x,
        y: this.origin.y,
        paused: false,
        radius: 20,
        amplitude: amp,
        start: degree,
      });
      console.log("Sun1:", this.list[0]);
    },

    pushSun(obj) {
      this.list.push(obj);
    },

    changeAmp() {
      this.amp = prompt("Enter a number 1 - 100");
      console.log(this.amp);
    },

    changeDegree() {
      this.degree = prompt("Enter a number 1 - 100");
    },

    distance() {
      var dist = prompt("Enter a number 1 - 100");
      dist = parseInt(dist);
      dist += this.origin;
      this.list.push({ x: dist, y: 100 });
    },

    writeMessage(message) {
      this.text = message;
    },

    handleMouseMove(event) {
      console.log('Systems array', this.systems[0]);
      const mousePos = this.$refs.stage.getStage().getPointerPosition();
      const x = mousePos.x;
      const y = mousePos.y;
      this.writeMessage("x: " + x + ", y: " + y);
    },

    

  }
};
</script>

<style>
</style>


