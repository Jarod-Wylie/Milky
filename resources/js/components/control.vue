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
        <b-modal id="modal-editSuns" title="Systems Registry">
          <ul>
            <li v-for="sun in content" :key="sun.id">
              <!-- button for sun -->
              <button @click="selected = sun.id">{{sun.name}}</button>
              <input v-model="star.name" type="text" name="name" placeholder="Add a System">
              <input
                v-model="star.YCoordinate"
                type="number"
                name="YCoordinate"
                placeholder="How far away?"
              >
              <input
                v-model="star.XCoordinate"
                type="number"
                name="XCoordinate"
                placeholder="Where is it's orbit?"
              >

              <textarea v-model="star.Description" placeholder="Short Description of System"></textarea>

              <editSuns v-on:edit="editSun" :editable="sun"></editSuns>
              <deleteSystem v-on:delete="deleteSystem" :editable="sun"></deleteSystem>

            </li>
          </ul>
        </b-modal>

        <!--Input for adding Suns -->
        <b-modal id="modal-Suns" title="Systems Registry">
          <input v-model="star.name" type="text" name="name" placeholder="Add a System">
          <input
            v-model="star.YCoordinate"
            type="number"
            name="YCoordinate"
            placeholder="How far awar?"
          >
          <input
            v-model="star.XCoordinate"
            type="number"
            name="XCoordinate"
            placeholder="Where is it's orbit?"
          >

          <textarea v-model="star.Description" placeholder="Short Description of System"></textarea>

          <input type="button" value="+" @click="addSun">
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

                <input v-model="planet.amp" type="number" name="amp" placeholder="How far away?">

                <input
                  v-model="planet.degree"
                  type="number"
                  name="degree"
                  placeholder="Where in is it in it's orbit?"
                >

                <textarea v-model="planet.Description" placeholder="Short Description of Planet"></textarea>

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
            <div v-for="object in content" :key="JSON.parse(object.Satelites).name">
              <ul>
                <li v-for="planets in JSON.parse(object.Satelites)" :key="planets.name">
                  <button @click="selected = planets.name">{{planets.name}}</button>

                  <div v-if="planets.name == selected">
                    <input v-model="moons.name" type="text" name="name" placeholder="moon Name">

                    <input v-model="moons.amp" type="number" name="amp" placeholder="How far away?">
                    <input
                      v-model="moons.degree"
                      type="number"
                      name="degree"
                      placeholder="Where in is it in it's orbit?"
                    >
                    <textarea v-model="moons.Description" placeholder="Short description of the moon"></textarea>

                    <addMoons v-on:addMoon="addMoon" :sun="object" :editable="planets"></addMoons>
                  </div>
                </li>
              </ul>
            </div>
          </ul>
        </b-modal>

        <!-- <button @click="debugLog">LOG</button> -->
      </b-navbar>

    </div>

    <GalacticCenter 
          v-on:reportedStageCoordinates="reportXY"
          :nowSystems="nowSystemsAr"
    ></GalacticCenter>
  </div>
</template>

<script>
export default {
  data() {
    return {
      content: [],

      mouseXY: {},

      star: { name: "", XCoordinate: null, YCoordinate: null, Description: null ,Satelites: '[]' },

      planet: {
        name: "",
        amp: null,
        degree: null,
        trackX: 0,
        trackY: 0,
        description: null,
        moons: []
      },
      planets: [],

      nowSystemsAr: [],

      moons: { name: "", amp: null, degree: null, trackX: 0, trackY: 0, Description: null },
      moon: [],

      patchPath: "/editObj/",

      selected: 0,

      //  rendering conditions

      view: false,
      showSunOps: false,
      showPlanetOps: false,

      parsed: []
    };
  },

  mounted() {
    axios.get("/systems").then(response => (this.content = response.data));

    console.log("data:", this.content[0]);

  },

  methods: {
    debugLog() {
      // console.log(this.content);
      console.log("data:", JSON.parse(this.content[0].Satelites));
    },

    // Post to Create new Sun and System strawman
    addSun() {
      var self = this;


      self.star.XCoordinate = parseInt(self.star.XCoordinate)
      self.star.YCoordinate = parseInt(self.star.YCoordinate)
      
      self.nowSystemsAr.push(self.star);
      console.log('star:', self.nowSystemsAr)

      // Neccessary for converting the text input of html fields to number.
      self.star.XCoordinate = parseInt(self.star.XCoordinate);
      self.star.YCoordinate = parseInt(self.star.YCoordinate);

      console.log("iuhfsohceo:",self.star.YCoordinate);

      axios
        .post("Atlas", {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          Satelites: self.star.Satelites,
          Description: self.star.Description
        })
        .then(function(response) {
          console.log("Post attempted");
        });
    },

    // Post to edit sun name and position
    editSun(obj) {
      var self = this;
      self.patchPath = "/editObj/";

      console.log("changing:", obj.satelites);

      self.patchPath += obj.edit;
      console.log("Post attempted:", self.patchPath);

      self.star.XCoordinate = parseInt(self.star.XCoordinate);
      self.star.YCoordinate = parseInt(self.star.YCoordinate);
      console.log("iuhfsohceo:",self.star.XCoordinate);

      axios
        .post(self.patchPath, {
          name: self.star.name,
          XCoordinate: self.star.XCoordinate,
          YCoordinate: self.star.YCoordinate,
          Satelites: obj.satelites,
          Description: self.star.Description,
          _method: "patch"
        })
        .then(function(response) {});
    },

    //Post to delete Systems
    deleteSystem(obj){
      self.patchPath = "/editObj/";

      console.log("changing:", obj.satelites);

      self.patchPath += obj.edit;
      console.log("Post attempted:", self.patchPath);

      axios
        .post(self.patchPath, {
          // name: self.star.name,
          // XCoordinate: self.star.XCoordinate,
          // YCoordinate: self.star.YCoordinate,
          // Satelites: obj.satelites,
          _method: "delete"
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

      axios
        .post(self.patchPath, {
          name: obj.name,
          XCoordinate: obj.x,
          YCoordinate: obj.y,
          Satelites: JSON.stringify(self.planets),
          _method: "patch"
        })
        .then(function(response) {});
    },

    addMoon(obj) {
      var self = this;

      self.patchPath = "/editObj/" + obj.patchID.toString();

      console.log("Post attempted:", self.patchPath);

      //push to an array to give to the Satelites column
      self.moons.amp = parseInt(self.moons.amp);
      self.moons.degree = parseInt(self.moons.degree);

      console.log("moon to be added:", obj.preserve);
      obj.preserve.moons.push(self.moons);

      // self.planets[0].moons = "hoi";

      axios
        .post(self.patchPath, {
          name: obj.name,
          XCoordinate: obj.x,
          YCoordinate: obj.y,
          Satelites: JSON.stringify([obj.preserve]),
          _method: "patch"
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