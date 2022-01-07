<template>
    <div class="d-flex justify-content-around">
        <div style="height:75px">
            <div class="">
                    <label for="">Umiejętności</label>
                    <Dropdown
                    :options="abilities"
                    v-on:selected="setAbility"
                    placeholder="Wszystkie Umiejętności">
                    </Dropdown>
            </div>
        </div>
        <div style="height:75px">
            <div class="">
                <label for="">Gdzie</label> 
                <Dropdown
                :options="locations"
                v-on:selected="setLocation"
                placeholder="Wszystkie lokacje">
                </Dropdown>
            </div>

        </div>
        <div style="height:75px">
            <div class="">
                <label for="">Branża</label> 
                <Dropdown
                :options="categories"
                :maxItem="100"
                v-on:selected="setIndustry"
                placeholder="Wszystkie kategorie">
                </Dropdown>
            </div>
        </div>
        
        <button class="btn btn-primary" @click="search" style="width:70px; height:75px;">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.4697 8.53033C13.1768 8.23744 13.1768 7.76256 13.4697 7.46967C13.7626 7.17678 14.2374 7.17678 14.5303 7.46967L18.5303 11.4697C18.8232 11.7626 18.8232 12.2374 18.5303 12.5303L14.5303 16.5303C14.2374 16.8232 13.7626 16.8232 13.4697 16.5303C13.1768 16.2374 13.1768 15.7626 13.4697 15.4697L16.1893 12.75H6.5C6.08579 12.75 5.75 12.4142 5.75 12C5.75 11.5858 6.08579 11.25 6.5 11.25H16.1893L13.4697 8.53033Z" fill="white"/>
            </svg>
        </button>
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
            chosenIndustry: null,
        }
    },
    methods:{
        setAbility(selection){
            this.chosenAbility = selection;
        },
        setLocation(selection){
            this.chosenLocation = selection;
        },
        setIndustry(selection){
            this.chosenIndustry = selection;
        },
        search(){
            let url = window.location.origin + "/oferty?"
            url += this.chosenAbility['id'] == undefined ? '' : 'ability=' + this.chosenAbility['id'];
            url += this.chosenLocation['id'] == undefined ? '' : '&location=' + this.chosenLocation['id'];
            url += this.chosenIndustry['id'] == undefined ? '' : '&industry=' + this.chosenIndustry['id'];
            window.location.href = url
        }

    },
    beforeCreate(){
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