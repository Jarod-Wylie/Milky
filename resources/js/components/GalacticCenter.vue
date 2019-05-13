
<template>
  <div>
    <!-- Stage can report x and y coordinate values of mouse
    position and will render a blue square at position mouse is clicked-->
    <v-stage ref="stage" :config="stageSize" @mousemove="handleMouseMove">
      <v-layer>

         <!-- <rocket></rocket> -->

        <v-circle @click="log" :config="center" ref="ord"/>

        <sun
          v-for="item in systems" 
          :key="item.id"
          :SunID="item.name" 
          :xC="center.x" 
          :yC="center.y" 
          :ampC="item.YCoordinate"
          :degreeC="item.XCoordinate"
          :sati="item.id"
          :planetObj="item.Satelites">
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

      stageSize: {
        width: 1500,
        height: 1000
      },

      center: {
        x: 650,
        y: 450,
        radius: 10,
        fill: "black"
      },

      systems: [],

      mousePos: {},

    };
  },

  mounted() {
    axios
    .get('/systems')
    .then(response => this.systems = (response.data));
    // .then(response => console.log('home:', response.data));
  },

  methods: {

    writeMessage(message) {
      this.text = message;
    },

    handleMouseMove(event) {

      this.mousePos = this.$refs.stage.getStage().getPointerPosition();

      // this.$emit("reportedStageCoordinates", {x: this.mousePos.x, y: this.mousePos.y});
    },

    log(){
      console.log(this.systems);
    }

  }
};
</script>



<style>
</style>


