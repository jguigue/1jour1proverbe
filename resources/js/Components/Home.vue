<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <section class="bg-img">
        <div class="bg-glass flex justify-center">
            <div>
                <Link class="more" :href="route('dashboard')"
                    ><font-awesome-icon icon="fa-solid fa-ellipsis-vertical"
                /></Link>
            </div>
            <div class="citation flex justify-center flex-col text-center">
                <div class="bulle rounded-3xl">
                    <font-awesome-icon
                        class="quote"
                        icon="fa-solid fa-quote-left"
                    />
                    <div
                        v-for="proverbes in result"
                        :key="proverbes.ProverbeId"
                    >
                        <h1 class="text-white">{{ proverbes.proverbe }}</h1>
                    </div>
                    <font-awesome-icon
                        class="quote"
                        icon="fa-solid fa-quote-right"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<style sccoped>
.more {
    position: absolute;
    top: 30px;
    right: 30px;
    color: white;
    font-size: 2rem;
}
.citation {
}
.citation h1 {
    font-size: 2rem;
    padding-left: 5vw;
    padding-right: 5vw;
}
.bulle {
    background: rgba(192, 3, 3, 0.36);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(44, 10, 179, 0.1);
    backdrop-filter: blur(100px);
    -webkit-backdrop-filter: blur(100px);
}
.quote {
    color: white;
    margin: 2rem auto;
    font-size: 3rem;
    text-align: center;
}
.bg-img {
    background-image: url("https://images.pexels.com/photos/7971274/pexels-photo-7971274.jpeg?auto=compress&cs=tinysrgb&w=1600");
    background-repeat: no-repeat no-repeat;
    background-size: cover;
    background-position: center;
    width: 100vw;
    height: 100vh;
    position: relative;
    overflow: hidden;
}
.bg-glass {
    background: rgba(0, 0, 0, 0.06);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(7px);
    -webkit-backdrop-filter: blur(7px);
    width: 100%;
    height: 100%;
    position: absolute;
}
</style>

<script>
import axios from "axios";
export default {
    data() {
        return {
            result: {},
        };
    },
    created() {
        this.loadProverbes();
    },
    methods: {
        loadProverbes() {
            console.log("LoadTasks() calling...");
            var page =
                "//proverbia.herokuapp.com/api/randomproverbes";
            axios.get(page).then(({ data }) => {
                console.log(data);
                this.result = data;
            });
        },
    },
};
</script>
