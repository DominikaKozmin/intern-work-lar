<template>
    <div>
        <Dropdown
        :options="abilities"
        v-on:selected="setAbility"
        placeholder="Wszystkie Umiejętności">
        </Dropdown>
        <Dropdown
        :options="locations"
        v-on:selected="setLocation"
        placeholder="Wszystkie lokacje">
        </Dropdown>
        <Dropdown
        :options="categories"
        :maxItem="100"
        v-on:selected="setCategory"
        placeholder="Wszystkie kategorie">
        </Dropdown>
        <button @click="search"></button>
    </div>


</template>

<script>
import Dropdown from 'vue-simple-search-dropdown'
export default {
    data(){
        return{
            abilities: [],
            locations: [],
            categories: [],
            chosenAbility: null,
            chosenLocation: null,
            chosenCategory: null,
        }
    },
    methods:{
        setAbility(selection){
            this.chosenAbility = selection;
        },
        setLocation(selection){
            this.chosenLocation = selection;
        },
        setCategory(selection){
            this.chosenCategory = selection;
        },
        search(){
            window.location.href = "http://www.google.com"
        }

    },
    beforeCreate(){
        console.log(window.location.origin + "/api/abilities")
        fetch(window.location.origin + "/api/abilities")
        .then(response => response.json())
        .then(data => (this.abilities = data));
        fetch(window.location.origin + "/api/locations")
        .then(response => response.json())
        .then(data => (this.locations = data));
        fetch(window.location.origin + "/api/industries")
        .then(response => response.json())
        .then(data => (this.categories = data));
    },
    components:{
        Dropdown
    }
}
</script>

<style>

</style>