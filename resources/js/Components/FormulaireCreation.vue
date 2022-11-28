<template>
    <vue-final-modal v-model="showModal"> Modal Content Here </vue-final-modal>
    <form @submit.prevent="save">
        <div class="form-group">
            <label for="proverbe">Proverbe</label>
            <textarea
                v-model="proverbe.proverbe"
                id="proverbe"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            />
        </div>
        <div class="form-group">
            <label for="auteur">Auteur</label>
            <input
                v-model="proverbe.auteur"
                type="text"
                id="auteur"
                class="rounded mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            />
        </div>
        <button type="submit" class="rounded-md mt-3">
            Ajouter le proverbe
        </button>
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "Ajout",
    data() {
        return {
            result: {},
            proverbe: {
                id: "",
                proverbe: "",
                auteur: "",
                created_at: "",
            },
        };
    },
    created() {
        this.loadProverbes();
    },
    methods: {
        loadProverbes() {
            console.log("LoadTasks() calling...");
            var page = "https://proverbia.herokuapp.com/api/proverbes";
            axios.get(page).then(({ data }) => {
                console.log(data);
                this.result = data;
            });
        },
        save() {
            if (this.proverbe.id == "") {
                this.savedata();
            } else {
                this.updateData();
            }
        },
        savedata() {
            axios
                .post("https://proverbia.herokuapp.com/api/save", this.proverbe)
                .then(({ data }) => {
                    alert("saved!");
                });
        },
    },
};
</script>

<style scoped>
.form-group {
    display: flex;
    flex-direction: column;
    width: 60%;
}
.form-group label {
    padding: 0.8rem 0 0.2rem 0;
}

button {
    color: white;
    background-color: rgba(32, 50, 215, 0.5);
    padding: 10px 30px;
    width: 60%;
}
</style>
