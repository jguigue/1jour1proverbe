<template>
    <vue-final-modal v-model="showModal" class="bg-white">
        <font-awesome-icon
            @click="showModal = false"
            class="quote text-right close"
            icon="fa-solid fa-close"
        />
        <div class="form-group">
            <form @submit.prevent="save">
                <div class="form-group">
                    <label for="proverbe">Proverbe</label>
                    <textarea
                        v-model="proverbe.proverbe"
                        placeholder="Proverbe"
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
                        placeholder="Auteur"
                        class="rounded mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                </div>
                <button
                    type="submit"
                    class="rounded-md mt-3"
                    @click="showModal = false"
                >
                    Modifier le proverbe
                </button>
            </form>
        </div>
    </vue-final-modal>

    <table class="table-fixed w-11/12 mt-10 m-auto">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Proverbe</th>
                <th class="text-left">Auteur</th>
                <th class="text-left">Ajouté le</th>
                <th class="text-center">Édition</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="proverbe in result" v-bind:key="proverbe.id">
                <td class="text-left">{{ proverbe.id }}</td>
                <td class="text-left">{{ proverbe.proverbe }}</td>
                <td class="text-left">{{ proverbe.auteur }}</td>
                <td class="text-left">{{ proverbe.created_at }}</td>
                <td class="text-center">
                    <button type="submit" class="rounded-md mt-3">
                        <font-awesome-icon
                            @click="edit(proverbe), (showModal = true)"
                            class="quote"
                            icon="fa-solid fa-pen-to-square"
                        />
                    </button>
                    <button type="submit" class="rounded-md mt-3">
                        <font-awesome-icon
                            @click="remove(proverbe)"
                            class="quote pl-3"
                            icon="fa-solid fa-trash-can"
                        />
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<style>
td {
    padding: 1.2rem 0 !important;
}
.vfm {
    position: absolute;
    margin: auto;
    width: 20vw;
    height: 30vh;
}
.vfm__content {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.vfm__overlay,
.vfm--overlay,
.vfm--inset,
.vfm-container,
.vfm {
    padding: 10px;
    background-color: white !important;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
}
</style>
<style scoped>
.close {
    position: absolute;
    right: 10px;
    top: 10px;
}
form {
    padding: 10px;
}
form input,
form textarea {
    margin-top: 0.2rem;
}
form textarea {
    margin-bottom: 2vh;
}
form button {
    color: white;
    background-color: rgba(32, 50, 215, 0.5);
    padding: 10px 30px;
    width: 100%;
}
</style>
<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";
import axios from "axios";
export default {
    name: "Table",
    data() {
        return {
            showModal: false,
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
        confirm() {
            // some code...
            this.show = false;
        },
        cancel(close) {
            // some code...
            close();
        },
        loadProverbes() {
            console.log("LoadTasks() calling...");
            var page = "//proverbia.herokuapp.com/api/proverbes";
            axios.get(page).then(({ data }) => {
                console.log(data);
                this.result = data;
            });
        },
        save() {
            this.savedata();
        },
        savedata() {
            axios.post(
                "//proverbia.herokuapp.com/api/save",
                this.proverbe
            );
        },
        edit(proverbe) {
            this.proverbe = proverbe;
        },
        updateData() {
            var editrecords =
                "//proverbia.herokuapp.com/api/update/" + this.proverbe.id;
            axios.put(editrecords, this.proverbe).then(({ data }) => {
                this.proverbe.proverbe = "";
                this.proverbe.auteur = "";
                alert("Proverbe mis à jour");
                this.loadProverbes();
            });
        },
        remove(proverbe) {
            var url = `//proverbia.herokuapp.com/api/delete/${proverbe.id}`;
            axios.delete(url);
            alert("Proverbe supprimé");
            this.loadProverbes();
        },
    },
};
</script>
