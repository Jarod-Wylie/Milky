<template>
  <div>
        
        
    
<div>
  <b-navbar toggleable="lg" type="dark" variant="Dark" fixed="bottom">
    <b-navbar-brand >Milky</b-navbar-brand>

    <b-navbar-item variant="light">
        <b-button v-b-modal.modal-1>Atlas</b-button>



      <b-modal id="modal-1" title="Galactic Atlas">

        <ul>
          <li v-for="sun in content"
            :key="sun.id">{{sun.name}}</li>

        </ul>
                        
      </b-modal>

    </b-navbar-item>
        <b-button v-b-modal.modal-2>Edit Galaxy</b-button>


      <b-modal id="modal-2" title="Input">

          <form method="POST" action="/Atlas">
                            <input v-model="star.name" type="text" name="name" placeholder="Add a System">

                            <input v-model="star.XCoordinate" type="text" name="XCoordinate" placeholder="How far away?">

                            <input v-model="star.YCoordinate" type="text" name="YCoordinate" placeholder="Where in is it in it's orbit?">

                            <input type="button" value="+" @click="updateAtlas">
          </form>
                        
      </b-modal>

    </b-navbar-item>

      <button @click="log">LOG</button>

      <p class="navbar-text"> X:{{ mouseXY.x}}----Y:{{ mouseXY.y }}</p>

  </b-navbar>
</div>

    <GalacticCenter v-on:reportedStageCoordinates="reportXY"></GalacticCenter>
    
  </div>
</template>

<script>

export default {
  data() {
    return {

      message: "NAAVY",

      content:[],

      mouseXY: {},

      star: {name: "", XCoordinate: 0, YCoordinate: 0},
      


    }
  },

    mounted() {
    axios
    .get('/systems')
    .then(response => this.content = (response.data));
    // .then(response => console.log('home:', response.data));

    
  },

        methods: {

          log(){
            console.log(this.content);
          },

            draw() {
                console.log(this.message);
            },

            updateAtlas(){

              var self = this;

              axios
                .post ("Atlas", {
                  name: self.star.name,
                  XCoordinate: self.star.XCoordinate,
                  YCoordinate: self.star.YCoordinate,
                })
                .then( function(response){
                  console.log("Post attempted");
                });
            },

            reportXY(obj){
              this.mouseXY = obj;
              // console.log(obj);
            }
        }
        


};
</script>