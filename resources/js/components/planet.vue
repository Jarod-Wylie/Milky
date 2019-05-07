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
        fill: 'red',
        amplitude: ampC,
        trackX: kX,
        trackY: kY,
    }"
    />
    <!-- Child of Planet and the props being passed to it -->
    <moon
      v-for="item in list"
      ref="satelite"
      :key="item.id"
      :xC="item.x"
      :yC="item.y"
      :kX="item.kX"
      :kY="item.kY"
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
  },

  data() {
    return {
      degree: 360,
      amp: 0,
      satelites: false,
      list: []
    };
  },

  methods: {
    // Pushes to list to make planet object
    addPlanet(obj) {
      this.satelites = false;
      console.log("hoi", obj.nuX);
      this.list.push({
        x: obj.nuX,
        y: obj.nuY,
        radius: 20,
        fill: "brown",
        kX: obj.nuX,
        kY: obj.nuY
      });

      // Sets the conditon in
      this.inMotion = true;
    },

    // Updates each object in the list of moons a planet has
    move(obj) {
      for (let planet in this.list) {
        this.list[planet].kX = obj.nuX;
        this.list[planet].kY = obj.nuY;
      }

      //   console.log("moon moving now", obj);
    }
  },

  mounted() {
    console.log("planet mounted");
    const vm = this;
    const planet = this.$refs.orb.getStage();

    console.log("Planet:",planet.attrs);
    // const amplitude = 100;

    vm.amp = planet.attrs.amplitude;
    console.log("amp:", vm.amp);
    const period = ((200 * vm.amp)/1.5);
    //small period = fast speed
    //large period = slow speed

    var radians = 1;
    var obj = { nuX: 0, nuY: 0 };


    //sets the starting origin for the planet to orbit around
    var centerX = planet.attrs.x;
    var centerY = planet.attrs.y;

    console.log("ord:", this.$refs.orb.getStage());


    // Animation of the planet begins here
    const anim = new Konva.Animation(function(frame) {

      //Updates the origin the planet orbits around
      var centerX = planet.attrs.trackX;
      var centerY = planet.attrs.trackY;

      // Calculating the changing radians by frame
      radians = (frame.time * 2 * Math.PI) / period;

      // passes orbit path to an object to pass to addPlanet() -> move() -> child
      obj.nuX = vm.amp * Math.sin(radians) + centerX;
      obj.nuY = vm.amp * Math.cos(radians) + centerY;


      //Calculates the orbit path
      planet.setX(vm.amp * Math.sin(radians) + parseInt(centerX));
      planet.setY(vm.amp * Math.cos(radians) + parseInt(centerY));

      // If a planet is desired by user initiated addPlanet() once
      if (vm.satelites) {
        vm.addPlanet(obj);
      }

      // When a moon is initiated it will be in motion by default. Run move() every frame
      if (vm.inMotion) {
        vm.move(obj);
      }
    }, planet.getLayer());

    anim.start();
  }
};
</script>

<style>
</style>