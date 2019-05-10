
<template>
  <div>

    <h1>Galactic Lab</h1>



    <!-- Stage can report x and y coordinate values of mouse
    position and will render a blue square at position mouse is clicked-->
    <v-stage ref="stage" :config="stageSize" @mousemove="handleMouseMove">
      <v-layer>

        <v-circle @click="log" :config="center" ref="ord"/>

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
          v-for="item in systems" 
          :key="item.id"
          :SunID="item.id" 
          :xC="center.x" 
          :yC="center.y" 
          :ampC="item.YCoordinate"
          :degreeC="item.XCoordinate"
          :sati="item.id">
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
        width: 10000,
        height: 1000
      },

      center: {
        x: 650,
        y: 450,
        radius: 10,
        fill: "black"
      },

      text: "",

      systems: [],

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
      // console.log('systems', this.systems)
      const mousePos = this.$refs.stage.getStage().getPointerPosition();
      const x = mousePos.x;
      const y = mousePos.y;
      this.writeMessage("x: " + x + ", y: " + y);
    },

    log(){
      console.log
    }

  }
};
</script>



<style>
</style>


