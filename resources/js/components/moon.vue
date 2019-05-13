<template>
  <div>
<a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">
    <v-circle
      ref="orb"
      data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"

      :config="{
            x:xC,
            y:yC,
            radius: 2,
            fill: 'blue',
            trackX: kX,
            trackY: kY,
        }"/></a>

  </div>
</template>

<script>
export default {
  props: {
    xC: Number,
    yC: Number,
    ord: Object,
    kX: Number,
    kY: Number
  },

  data() {
    return {
      degree: 180,
      amp: 20,
      satelites: false,
      list: []
    };
  },

  methods: {
    
  },

  mounted() {
    // console.log("Mounting Moon");
    const vm = this;
    const amplitude = 4000;
    const period = 1000;
    var radians = 1;

    const sun = this.$refs.orb.getStage();
    const centerX = sun.attrs.x;

    const centerY = sun.attrs.y;

    // console.log("ord:", this.$refs.orb.getStage().attrs.x);

    const anim = new Konva.Animation(function(frame) {

      var centerX = sun.attrs.trackX;
      var centerY = sun.attrs.trackY;

      radians = (frame.time * 2 * Math.PI) / period;

      sun.setX(vm.amp * Math.sin(radians) + parseInt(centerX));
      sun.setY(vm.amp * Math.cos(radians) + parseInt(centerY));

    }, sun.getLayer());

    anim.start();
  }
};
</script>

<style>
</style>