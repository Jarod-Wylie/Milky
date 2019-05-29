
<template>
  <div>
    <v-stage ref="stage" :config="stageSize">
      <v-layer>
        <v-line :config="line" ref="line"/>

        <v-text
          ref="text"
          :config="{
          x: 250,
          y: 400,
          fontFamily: 'Calibri',
          fontSize: 40,
          text: info,
          fill: 'white'
        }"
        />

        <v-text ref="text" :config="scaleText"/>
        <v-text ref="text" :config="zero"/>
        <v-text ref="text" :config="ninety"/>
        <v-text ref="text" :config="oneEighty"/>
        <v-text ref="text" :config="twoSeventy"/>

        <v-circle
          @mouseover="getInfo"
          @mouseleave="getLess"
          @click="log"
          :config="center"
          ref="ord"
        />

        <sun
          v-for="item in systems"
          :key="item.id"
          :SunID="item.name"
          :xC="center.x"
          :yC="center.y"
          :ampC="item.YCoordinate"
          :degreeC="item.XCoordinate"
          :sati="item.id"
          :planetObj="item.Satelites"
          :sunObj="item"
        ></sun>
      </v-layer>
    </v-stage>
  </div>
</template>

<script>
const width = window.innerWidth;
const height = window.innerHeight;

export default {
  props: {
    nowSystems: Array
  },

  data() {
    return {
      stageSize: {
        width: 1500,
        height: 1000
      },

      info: "",

      center: {
        x: 750,
        y: 500,
        radius: 10,
        fill: "black",
        stroke: "white"
      },

      line: {
        points: [120, 300, 220, 300],
        stroke: "white",
        strokeWidth: 13,
        lineCap: "round",
        lineJoin: "round"
      },

      scaleText: {
        x: 120,
        y: 260,
        fontFamily: "Calibri",
        fontSize: 20,
        text: "This is 100 units.",
        fill: "white"
      },
      zero: {
        x: 750,
        y: 900,
        fontFamily: "Calibri",
        fontSize: 20,
        text: "0°",
        fill: "white"
      },
      ninety: {
        x: 1400,
        y: 500,
        fontFamily: "Calibri",
        fontSize: 20,
        text: "90°",
        fill: "white"
      },
      oneEighty: {
        x: 750,
        y: 40,
        fontFamily: "Calibri",
        fontSize: 20,
        text: "180°",
        fill: "white"
      },
      twoSeventy: {
        x: 50,
        y: 500,
        fontFamily: "Calibri",
        fontSize: 20,
        text: "270°",
        fill: "white"
      },

      systems: [],

      mousePos: {}
    };
  },
  // On mount retreive data from sql table systems
  mounted() {
    axios.get("/systems").then(response => (this.systems = response.data));
    // .then(response => console.log('home:', response.data));
    console.log("now:", this.nowSystems);
  },

  methods: {
    writeMessage(message) {
      this.text = message;
    },

    handleMouseMove(event) {
      this.mousePos = this.$refs.stage.getStage().getPointerPosition();
    },

    draw() {
      this.line.points.push(this.$refs.stage.getStage().getPointerPosition().x);
      this.line.points.push(this.$refs.stage.getStage().getPointerPosition().y);
      console.log(this.line.points);
    },

    log() {
      var vm = this;

      vm.$forceUpdate();
      console.log(this.systems);
    },

    getInfo() {
      this.info = "";
      this.info =
        "I represent the super massive blackhole holding our galaxy together!";
    },
    getLess() {
      this.info = "";
    }
  }
};
</script>



<style>
</style>


