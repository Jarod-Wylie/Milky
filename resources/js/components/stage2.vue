<template>
  <div>
    <h1>Orbit Lab</h1>
    <div>
      <button @click="distance">How far away?</button>
      <button @click="changeAmp">Change Amp</button>
      <button @click="changeDegree">Change Degree</button>
      <button @click="ani = !ani">Orbit on</button>

    </div>

    <!-- Stage can report x and y coordinate values of mouse
    position and will render a blue square at position mouse is clicked-->
    <v-stage ref="stage" :config="stageSize" @mousemove="handleMouseMove">
      <v-layer>
        <v-circle 
        :config="circle" 
        ref="circ"
        />

        <v-circle 
        :config="center" 
        ref="ord"
        v-on:onOrbSelected="pushSun"
        @click="addSun"/>

        <!-- <v-rect
            v-for="item in list"
            :key="item.id"
            :config="{
            x: item.x, y: item.y, width: 10, height: 10, fill: 'blue',
        }"/>-->

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

        <orbiter
          v-for="item in list"
          :key="item.id"
          :xC="item.x"
          :yC="item.y"
        ></orbiter>
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
      amp: 100,
      origin: 650,

      max: 100,

      stageSize: {
        width: width,
        height: height
      },
      flip: true,

      circle: {
        x: 650,
        y: 100,
        radius: 10,
        fill: "blue"
      },

      center: {
        x: 300,
        y: 200,
        radius: 10,
        fill: "black"
      },

      text: "",
      list: []
    };
  },

  mounted() {
    const vm = this;
    const amplitude = 100;
    const period = 10000;
    var radians = 0;
    // in ms
    const centerX = this.$refs.ord.getStage().attrs.x;

    const centerY = this.$refs.ord.getStage().attrs.y;
    console.log("ord:", this.$refs.ord.getStage().attrs.x);

    const circ = this.$refs.circ.getStage();
    console.log("This is stage", circ);

    // example of Konva.Animation
    const anim = new Konva.Animation(function(frame) {
      if (vm.ani == true) {
        radians = (frame.time * 2 * Math.PI) / period;
      } else {
        //  vm.degree = radians / 0.0174532925;
        radians = vm.degree * 0.0174532925;
      }

      circ.setX(vm.amp * Math.sin(radians) + centerX);

      circ.setY(vm.amp * Math.cos(radians) + centerY);
    }, circ.getLayer());

    anim.start();
  },

  computed: {},

  methods: {

    addSun(){
        this.list.push({ x: 300, y: 200, radius: 20, fill: 'blue'});
        console.log(this.list[0]);
    },

    pushSun(obj) {
      // var orb = { radius: 50, fill: 'blue'};
      // orb["x"] = parseInt(prompt("Add xCOORD"));
      // orb["y"] = parseInt(prompt("Add yCOORD"));
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
      const mousePos = this.$refs.stage.getStage().getPointerPosition();
      const x = mousePos.x;
      const y = mousePos.y;
      this.writeMessage("x: " + x + ", y: " + y);
    }
  }
};
</script>

<style>
</style>