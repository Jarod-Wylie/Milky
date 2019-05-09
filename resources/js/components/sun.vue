    <template>
    <div>
        <v-circle
        @click="satelites = true"
        ref="orb"
        :config="{
                    x:xC,
                    y:yC,
                    amplitude: ampC,
                    start: degreeC,
                    radius: 20,
                    fill: 'yellow',
                }"
        />
        <!---Planets added on click -->
        <planet
        v-for="item in list"
        ref="satelite"
        :key="item.id"
        :xC="item.x"
        :yC="item.y"
        :kX="item.kX"
        :kY="item.kY"
        :ampC="item.amplitude"
        :degreeC="item.start"
        ></planet>

        <!-- Planets added on load from database-->
        <planet
        v-for="item in planets"
        ref="satelite"
        :key="item.id"
        :xC="temp.x"
        :yC="temp.y"
        :kX="temp.x"
        :kY="temp.y"
        :ampC="item.XCoordinate"
        :degreeC="item.YCoordinate"
        ></planet>
    </div>
    </template>

    <script>
    export default {
    props: {
        xC: Number,
        yC: Number,
        ord: Object,
        ampC: Number,
        degreeC: Number
    },

    data() {
        return {
        amp: 0,
        list: [],
        planets: [],
        satelites: false,
        inMotion: false,
        temp: {x:650, y:450},
        };
    },

    mounted() {



        axios
        .get('/planets')
        .then(response => this.planets = (response.data));
        // .then(response => console.log('home:', response.data));

        console.log("Sun Mounted");

        console.log('Planets:', this.planets)

        const vm = this;
        const sun = this.$refs.orb.getStage();
        const centerX = sun.attrs.x;
        const centerY = sun.attrs.y;

        vm.amp = sun.attrs.amplitude;

        const period = (200 * vm.amp) / 1.5;

        // Translates degrees -> radians and is the where the sun first starts its orbit
        var radians = sun.attrs.start * (Math.PI / 180);
        // console.log('radians of beggining:', radians);
        // console.log("attrs",sun.attrs);

        // nuX and nuY are temporary attributes that pass out of the
        // animation frame into the addPlanet() and move()
        var obj = { nuX: 0, nuY: 0 };

        // Animation of Sun starts here
        const anim = new Konva.Animation(function(frame) {

        sun.setX(vm.amp * Math.sin(radians) + centerX);
        sun.setY(vm.amp * Math.cos(radians) + centerY);

        // object object that keeps track of x and y positons to pass to the Sun's planets
        obj.nuX = vm.amp * Math.sin(radians) + centerX;
        obj.nuY = vm.amp * Math.cos(radians) + centerY;

        // radians = (frame.time * 2 * Math.PI) / period;
        radians = radians + (60 * 2 * Math.PI) / period;

        // checks for desired planets
        if (vm.satelites) {
            vm.addPlanet(obj);
        }
        // Allows this sun's x and y to be known by its children
        if (vm.inMotion) {
            vm.move(obj);
        }
        }, sun.getLayer());
        anim.start();
    },

    methods: {
        // Pushes to list to make planet object
        addPlanet(obj) {

            // add: 
        //amplitude - distance away from black hole
        var amp = parseInt(prompt("How far away is this star?"));

        // degree - where in is the planet in it's orbit right now
        var degree = parseInt(prompt("Where is it right now in it's orbit?"))

        this.satelites = false;
        console.log("hoi", obj.nuX);
        this.list.push({
            x: obj.nuX,
            y: obj.nuY,
            kX: obj.nuX,
            kY: obj.nuY,
            amplitude: amp,
            start: degree,
        });

        // Sets the conditon in
        this.inMotion = true;
        },

        // Updates each object in the list of planets a Sun has
        move(obj) {
        for (let planet in this.list) {
            this.list[planet].kX = obj.nuX;
            this.list[planet].kY = obj.nuY;
        }
        }
    }
    };
    </script>

    <style>
    </style>