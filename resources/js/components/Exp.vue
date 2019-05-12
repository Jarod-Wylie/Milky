<template>
  <div>
    <div>
      <b-navbar toggleable="lg" type="dark" variant="Dark" fixed="bottom">
        <b-navbar-brand>Milky</b-navbar-brand>

        <b-button v-b-modal.modal-1>Atlas</b-button>

        <b-modal id="modal-1" title="Galactic Atlas">
          <ul>
            <li v-for="sun in content" :key="sun.id">
              {{sun.name}}
          <div>
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
              <testing :editable="sun" v-on:change="addPlanet" ></testing>
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

        <p class="navbar-text">X:{{ mouseXY.x}}----Y:{{ mouseXY.y }}</p>
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

      planets: { name: "", XCoordinate: null, YCoordinate: null },

      moons: { name: "", XCoordinate: null, YCoordinate: null },

      patchPath: "/editObj/"




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

    addPlanet(obj) {
      var self = this;
      self.patchPath = "/editObj/";

      console.log("changing:", obj);

      self.patchPath += obj.edit.toString();
      console.log("Post attempted:", self.patchPath);

      axios
        .post(self.patchPath, {
          Satelites:'[HOI',
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
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