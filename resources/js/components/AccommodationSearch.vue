<template>
    <div class="adverts-options">
        <div class="advert">
            <div class="input-group">
                <input type="text" v-model="keywords" class="form-control rounded" placeholder="Słowo kluczowe..." aria-label="Search" aria-describedby="search-addon" />
            </div>
            <div class="input-group">
                <Dropdown
                    :options="locations"
                    :maxItem="100"
                    v-on:selected="setLocation"
                    placeholder="Lokacja...">
                </Dropdown>
            </div>
        </div>
        <button @click="search" class="btn btn-outline-primary">Szukaj 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
</template>

<script>
import Dropdown from 'vue-simple-search-dropdown';
export default {
    data(){
        return{
            keywords: '',
            locations: null,
            chosenLocation: null,
        }
    },
    methods:{
        setLocation(selection){
            this.chosenLocation = selection;
        },
        search(){
            let url = window.location.origin + "/zakwaterowanie?"
            url += 'search=' + this.keywords;
            url += this.chosenLocation['id'] == undefined ? '' : '&location=' + this.chosenLocation['id'];
            window.location.href = url
        }
    },
    beforeCreate(){
        console.log(window.location.origin + "/api/cities")
        fetch(window.location.origin + "/api/cities")
        .then(response => response.json())
        .then(data => (this.locations = data));
    },
    components:{
        Dropdown
    }
}
</script>

<style>

</style>