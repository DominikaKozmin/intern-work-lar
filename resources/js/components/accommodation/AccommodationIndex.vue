<template>
    <div>
        <div class="d-flex justify-content-center mb-5">
            <div class="bg-primary rounded-pill p-1 fw-bold">
                <div v-on:click="showHighlightedOffers=false" v-bind:class="{ 'bg-white': !showHighlightedOffers, 'rounded-pill': !showHighlightedOffers, 'text-white': showHighlightedOffers}" class="uppercase d-inline-block py-1 px-5 user-select-none">
                    Najnowsze oferty
                </div>
                <div v-on:click="showHighlightedOffers=true" v-bind:class="{ 'bg-white': showHighlightedOffers, 'rounded-pill': showHighlightedOffers, 'text-white': !showHighlightedOffers}" class="uppercase d-inline-block py-1 px-5 user-select-none">
                    Wyróżnione oferty
                </div>
            </div>
        </div>
        <accommodation-search @api="showApi"></accommodation-search>
        <div>
            <accommodation-show-resoults-grid v-for="offer in offers" :key="offer['id']" :data="offer" :userid="userid" :api="api"></accommodation-show-resoults-grid>
        </div>
    </div>
</template>

<script>
import AccommodationSearch from './AccommodationSearch.vue'
import AccommodationShowResoultsGrid from './AccommodationShowResoultsGrid.vue';
export default {
    components: { AccommodationSearch, AccommodationShowResoultsGrid },
    props:['userid'],
    data(){
        return {
            offers: {},
            showHighlightedOffers: false,
            api: ''
        }
    },
    beforeCreate(){
        fetch(window.location.origin + "/api/accommodations")
        .then(response => response.json())
        .then(data => (this.offers = data));
    },
    methods:{
        showApi(resoult){
            this.api = resoult
        }
    },
    watch:{
        showHighlightedOffers: function(){
            if(this.showHighlightedOffers){
                fetch(window.location.origin + "/api/higlightedaccommodations" + this.api)
                .then(response => response.json())
                .then(data => (this.offers = data));
            }
            else{
                fetch(window.location.origin + "/api/accommodations" + this.api)
                .then(response => response.json())
                .then(data => (this.offers = data));
            }
        },
        api: function(){
            if(this.showHighlightedOffers){
                fetch(window.location.origin + "/api/higlightedaccommodations" + this.api)
                .then(response => response.json())
                .then(data => (this.offers = data));
            }
            else{
                fetch(window.location.origin + "/api/accommodations" + this.api)
                .then(response => response.json())
                .then(data => (this.offers = data));
            }
        }
    }
}
</script>

<style>

</style>