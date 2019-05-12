<template>
  <div>
    <div>
      <b-navbar toggleable="lg" type="dark" variant="Dark" fixed="bottom">
        <b-navbar-brand>Milky</b-navbar-brand>

        <b-button v-b-modal.modal-1>Atlas</b-button>

        <b-modal id="modal-1" title="Galactic Atlas">

          <h1>Suns:</h1>
          <ul>
            <li v-for="sun in content" :key="sun.id">
              {{sun.name}}
              <button @click="selected = sun.id">Edit Me</button>
          <div v-if="sun.id == selected">
              
              <input v-model="planet.name" type="text" name="name" placeholder="Name">

              <input
                v-model="planet.XCoordinate"
                type="text"
                name="XCoordinate"
                placeholder="How far away?"
              >

              <input
                v-model="planet.YCoordinate"
                type="text"
                name="YCoordinate"
                placeholder="Where in is it in it's orbit?"
              >
              <button @click="view = !view">Add Planet</button>
                <div v-if="view">
                  <input v-model="star.name" type="text" name="name" placeholder="Name">

              <input
                v-model="star.XCoordinate"
                type="text"
                name="XCoordinate"
                placeholder="How far away?"
              >

              <input
                v-model="star.YCoordinate"
                type="text"
                name="YCoordinate"
                placeholder="Where in is it in it's orbit?">

            </div>
                  

              <testing :editable="sun" 
              v-on:change="editSun"
              v-on:addPlanet="addPlanet"
              ></testing>
          </div>

            </li>
          </ul>
        </b-modal>

        <b-button v-b-modal.modal-2>Edit Galaxy</b-button>

        <b-modal id="modal-2" title="Input">
          <input v-model="star.name" type="text" name="name" placeholder="Add a System">

          <input
            v-model="star.XCoordinate"
            type="text"
            name="XCoordinate"
            placeholder="How far away?"
          >

          <input
            v-model="star.YCoordinate"
            type="text"
            name="YCoordinate"
            placeholder="Where in is it in it's orbit?"
          >

          <input type="button" value="+" @click="updateAtlas">
        </b-modal>

        <button @click="log">LOG</button>

        <p class="navbar-text">-------------X:{{ mouseXY.x}}----Y:{{ mouseXY.y }}</p>
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

      planet: { name: "", amp: null, degree: null, trackX: 0, trackY: 0 },
      planets:[],

      moons: { name: "", XCoordinate: null, YCoordinate: null },

      patchPath: "/editObj/",

      selected: 0,

      view: false,






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

      axios
        .post("Atlas", {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          Satelites:'[{"name" : "BLUUUU", "amp":50, "degree":180, "trackX": 0 , "trackY": 0}]'
        })
        .then(function(response) {
          console.log("Post attempted");
        });
    },

    editSun(obj) {
      var self = this;
      self.patchPath = "/editObj/";

      console.log("changing:", obj);

      self.patchPath += obj.edit;
      console.log("Post attempted:", self.patchPath);

      axios
        .post(self.patchPath, {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          _method: "patch",
        })
        .then(function(response) {});
    },

    addPlanet(obj) {
      var self = this;
      self.patchPath = "/editObj/";

      console.log("changing:", obj);

      self.patchPath += obj.add.toString();
      console.log("Post attempted:", self.patchPath);

      self.planets.push(self.planet);

      console.log("planet:", self.planets);

      axios
        .post(self.patchPath, {
          Satelites:'[{asdas}]',
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