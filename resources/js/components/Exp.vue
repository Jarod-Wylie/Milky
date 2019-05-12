<template>
  <div>
    <div>
      <b-navbar toggleable="lg" type="dark" variant="Dark" fixed="bottom">
        <b-navbar-brand>Milky</b-navbar-brand>

        <b-button v-b-modal.modal-Suns>Add Suns/Sytems Origin</b-button>

        <b-button @click="showSunOps = !showSunOps">Edit Systems</b-button>

      <div v-if="showSunOps">
          <b-button v-b-modal.modal-editSuns>Edit Origins/Suns</b-button>
          <b-button v-b-modal.modal-Planets>Add Planets To Systems</b-button>
          <b-button v-b-modal.modal-Moons>Add Moons To Planets</b-button>
      </div>



        <!--Input for editing Suns -->
        <b-modal  id="modal-editSuns" title="Systems Registry">
          <ul>
              <li v-for="sun in content" :key="sun.id">
                    <button @click="selected = sun.id">{{sun.name}}</button>
                <input v-model="star.name" type="text" name="name" placeholder="Add a System">
                <input
                  v-model="star.XCoordinate"
                  type="number"
                  name="XCoordinate"
                  placeholder="How far away?"
                >

                <input
                  v-model="star.YCoordinate"
                  type="number"
                  name="YCoordinate"
                  placeholder="Where in is it in it's orbit?"
                >

                  <editSuns v-on:edit="editSun" :editable="sun"></editSuns>
              </li>
          </ul>

        </b-modal>

        <!--Input for adding Suns -->
        <b-modal  id="modal-Suns" title="Systems Registry">
          <input v-model="star.name" type="text" name="name" placeholder="Add a System">
          <input
            v-model="star.XCoordinate"
            type="number"
            name="XCoordinate"
            placeholder="How far away?"
          >

          <input
            v-model="star.YCoordinate"
            type="number"
            name="YCoordinate"
            placeholder="Where in is it in it's orbit?"
          >

          <input type="button" value="+" @click="updateAtlas">
        </b-modal>

        <b-modal id="modal-Planets" title="Systems Registry">

          <!-- Modal for Adding Planets-->
          <h1>Suns:</h1>
          <ul>
          <!-- Input for Planets -->
            <li v-for="sun in content" :key="sun.id">
              <button @click="selected = sun.id">{{sun.name}}</button>

          <div v-if="sun.id == selected">
              <input v-model="planet.name" type="text" name="name" placeholder="Planet Name">

              <input
                v-model="planet.amp"
                type="number"
                name="amp"
                placeholder="How far away?"
              >

              <input
                v-model="planet.degree"
                type="number"
                name="degree"
                placeholder="Where in is it in it's orbit?"
              >

              <!-- <testing :editable="sun" 
              v-on:addPlanet="addPlanet"
              v-on:addMoon="addMoon"
              ></testing> -->

              <addPlanets v-on:addPlanet="addPlanet" :editable="sun"></addPlanets>
              <!-- <addMoons v-on:addMoon="addMoon" :editable="sun" ></addMoons> -->
          </div>

            </li>
          </ul>
        </b-modal>



          <!-- Modal for Adding moons-->
          <b-modal id="modal-Moons" title="Moons Registry">
          <h1>Planets:</h1>
          <ul>
          <!-- Input for moon -->
            <li v-for="planet in content" :key="planet.name">
              <button @click="selected = planet.id">{{planet.name}}</button>

          <div v-if="sun.id == selected">
              <input v-model="moon.name" type="text" name="name" placeholder="moon Name">

              <input
                v-model="moon.amp"
                type="number"
                name="amp"
                placeholder="How far away?"
              >moon
              <input
                v-model="moon.degree"
                type="number"
                name="degree"
                placeholder="Where in is it in it's orbit?"
              >

              <!-- <testing :editable="sun" 
              v-on:addPlanet="addPlanet"
              v-on:addMoon="addMoon"
              ></testing> -->

              <addPlanets v-on:addPlanet="addPlanet" :editable="sun"></addPlanets>
              <!-- <addMoons v-on:addMoon="addMoon" :editable="sun" ></addMoons> -->
          </div>

            </li>
          </ul>
        </b-modal>


        <!-- <button @click="log">LOG</button> -->

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

      content: [],

      mouseXY: {},

      star: { name: "", XCoordinate: null, YCoordinate: null },

      planet: { name: "", amp: null, degree: null, trackX: 0, trackY: 0 ,moons:[] },
      planets:[],

      moons: { name: "", amp: null, degree: null, trackX: 0, trackY: 0 },
      moon:[],

      patchPath: "/editObj/",

      selected: 0,


      //  rendering conditions

      view: false,
      showSunOps: false,
      showPlanetOps: false,






    };
  },

  mounted() {
    axios.get("/systems").then(response => (this.content = response.data));


    


  },

  methods: {
    log() {
      console.log(this.content);
    },

    // Creates New Sun and System strawman
    updateAtlas() {
      var self = this;

      // Neccessary for converting the text input of html fields to number.
      self.star.XCoordinate = parseInt(self.star.XCoordinate);
      self.star.YCoordinate = parseInt(self.star.YCoordinate);

      axios
        .post("Atlas", {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          Satelites:'[]'
        })
        .then(function(response) {
          console.log("Post attempted");
        });
    },

    editSun(obj) {
      var self = this;
      self.patchPath = "/editObj/";

      console.log("changing:", obj.satelites);

      self.patchPath += obj.edit;
      console.log("Post attempted:", self.patchPath);

      axios
        .post(self.patchPath, {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          Satelites: obj.satelites,
          _method: "patch",
        })
        .then(function(response) {});
    },

    addPlanet(obj) {



      var self = this;

      self.planets = obj.satelites;
      self.patchPath = "/editObj/";

      console.log("changing:", self.satelites);

      self.patchPath += obj.add.toString();
      console.log("Post attempted:", self.patchPath);

      //push to an array to give to the Satelites column
      self.planet.amp = parseInt(self.planet.amp);
      self.planet.degree = parseInt(self.planet.degree);
      self.planets.push(self.planet);

      console.log("planet:", self.planets);

      // self.planets[0].moons = "hoi";
      
      axios
        .post(self.patchPath, {
          name: obj.name,
          XCoordinate: obj.x,
          YCoordinate: obj.y,
          Satelites: JSON.stringify(self.planets),
          _method: "patch",
        })
        .then(function(response) {});
    },


    addMoon(obj){

       axios
        .post(self.patchPath, {
          name: obj.name,
          XCoordinate: obj.x,
          YCoordinate: obj.y,
          Satelites: JSON.stringify(self.planets),
          _method: "patch",
        })
        .then(function(response) {});

    },

    // Reports the X and Y of the stage created in the component: GalacticCenter
    reportXY(obj) {
      this.mouseXY = obj;
    }
  }
};
</script>