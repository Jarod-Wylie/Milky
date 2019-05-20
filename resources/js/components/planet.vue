<template>
  <div>

    <!-- Shape and inheritable attributes of native component: Planet -->
    <v-circle
      ref="orb"
      @click="satelites = true"
      :config="{
        x:xC,
        y:yC,
        radius: 8,
        amplitude: ampC,
        start: degreeC,
        trackX: kX,
        trackY: kY,
        fill: '#176087',
    }"
    />

    <moon
      v-for="item in sati"
      ref="satelite"
      :key="item.id"
      :kX="item.trackX"
      :kY="item.trackY"
    ></moon>
  </div>
</template>

<script>
export default {
  props: {
    xC: Number,
    yC: Number,
    ord: Object,
    kX: Number,
    kY: Number,
    ampC: Number,
    degreeC: Number,
    sati: Array,
    
  },

  data() {
    return {
      degree: 360,
      amp: 0,
      moons: [],

    };
  },

  methods: {

  

    // Updates each object in the list of moons a planet has
    move(obj) {
      for (let moon in this.sati) {
        this.sati[moon].trackX = obj.nuX;
        this.sati[moon].trackY = obj.nuY;
      }

    }
  },

  mounted() {

    

    // console.log("planet mounted");
    const vm = this;
    const planet = this.$refs.orb.getStage();
    var centerX = planet.attrs.x;
    var centerY = planet.attrs.y;

    var obj = { nuX: 0, nuY: 0 };
    var radians = planet.attrs.start * (Math.PI / 180);

    // console.log('radians:', radians);

    vm.amp = planet.attrs.amplitude;

    const period = ((2000 * vm.amp)/1.5);
    //small period = fast speed
    //large period = slow speed

    //sets the starting origin for the planet to orbit around



    // Animation of the planet begins here
    const anim = new Konva.Animation(function(frame) {

      //Updates the origin the planet orbits around
      var centerX = planet.attrs.trackX;
      var centerY = planet.attrs.trackY;

      // Calculating the changing radians by frame
      radians = radians + (60 * 2 * Math.PI) / period;

      // passes orbit path to an object to pass to addPlanet() -> move() -> child
      obj.nuX = vm.amp * Math.sin(radians) + centerX;
      obj.nuY = vm.amp * Math.cos(radians) + centerY;

      //Calculates the orbit path
      planet.setX(vm.amp * Math.sin(radians) + parseInt(centerX));
      planet.setY(vm.amp * Math.cos(radians) + parseInt(centerY));

      // console.log("moons:",vm.sati);
      
      // When a moon is initiated it will be in motion by default. Run move() every frame
        vm.move(obj);

    }, planet.getLayer());

    anim.start();
  }
};
</script>

<style>
</style>