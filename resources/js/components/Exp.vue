<template>
  <div>
    <butt></butt>
    <v-stage ref="stage" :config="stageSize">
      <v-layer>
      <v-text :config="{text: 'Milky', fontSize: 15}"/>

      <v-circle :config="circle"/>
      
     
      </v-layer>
      <v-layer ref="dragLayer"></v-layer>
    </v-stage>

  </div>
</template>

<script>
const width = window.innerWidth;
const height = window.innerHeight;
let vm = {};
export default {
  data() {
    return {
      stageSize: {
        width: width,
        height: height
      },

      message:"trying to draw circle.",

        circle: {
          x: 700,
          y: 350,
          radius: 10,
          fill: 'black'
        },

        methods: {

            draw() {
                console.log(this.message);
            }
        }
        
    };
  }
};
</script>