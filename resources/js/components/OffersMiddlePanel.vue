<template>
    <div v-if="jsondata">
        <div>
            <div class="bg-white w-full p-4 mb-4">
                <div v-on:click="showAsList=true" v-bind:class="{ 'bg-primary': showAsList }" class="d-inline-block p-2">lista</div>
                <div v-on:click="showAsList=false" v-bind:class="{ 'bg-primary': !showAsList }" class="d-inline-block p-2">kratka</div>
                <Dropdown
                    class="d-inline-block"
                    :options="[{ id: 1, api:'latestoffers', name: 'Nowa oferta'}, {id: 2, api:'salary', name:'Wynagrodzenie'}, {id:3, api:'jobtitle', name:'Tytuł Pracy'}]"
                    v-on:selected="validateSelection"
                    :disabled="false"
                    name="zipcode"
                    placeholder="Ustawienia domyślne">
                </Dropdown>
                <popup-button class="d-inline-block float-end"></popup-button>
            </div>
        </div>
        <div>
            <div v-for="table in this.jsondata" :key="table.id">
                <offers-job-offer v-show="showAsList" :offer=table></offers-job-offer>
                
            </div>
            <div>
                <div v-show="!showAsList">
                    <div class="row">
                        <div class="col">
                            <div v-for="item in jsondata.length" :key="item">
                                <div v-if="item%2==1"><offers-job-offer-titles :offer=jsondata[item-1]></offers-job-offer-titles></div>
                            </div>
                        </div>
                        <div class="col">
                            <div v-for="item in jsondata.length" :key="item">
                                <div v-if="item%2==0"><offers-job-offer-titles :offer=jsondata[item-1]></offers-job-offer-titles></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OffersJobOffer from './OffersJobOffer.vue'
import OffersJobOfferTitles from './OffersJobOfferTiles.vue'
import Dropdown from 'vue-simple-search-dropdown';
import PopupButton from './PopupButton.vue'

export default {
    props:['filters'],
    data(){
        return {
            jsondata: null,
            showAsList: true,
            selected: { id: null, api: null, name: null },
            totalVuePackages: null,
            filterParams: null
        }
    },
    created() {
        fetch("http://localhost:8000/api/test?level=1,2,3")
        .then(response => response.json())
        .then(data => (this.jsondata = data));
    },
    components: {
        OffersJobOffer,
        OffersJobOfferTitles,
        Dropdown,
        PopupButton
    },
    methods: {
        validateSelection(selection){
            this.selected = selection;
        }
    },
    computed:{
        apiEndpoint: function(){
            return this.selected.api
        },
    },
    watch:{
        selected: function(val){
            fetch("http://localhost:8000/api/" + val.api)
            .then(response => response.json())
            .then(data => (this.jsondata = data));
        },
        filters: function(val){
            let industry = "?industry="
            if(this.filters[0]!=undefined){
                this.filters[0].forEach((element,index) => {
                    if(element){
                        industry += index+1 + ","
                    }    
                });
            }
            let ability = "&ability="
            if(this.filters[1]!=undefined){
                this.filters[1].forEach((element,index) => {
                    if(element){
                        ability += index+1 + ","
                    }    
                });
            }
            let level = "&level="
            if(this.filters[2]!=undefined){
                this.filters[2].forEach((element,index) => {
                    if(element){
                        level += index+1 + ","
                    }    
                });
            }
            let salary = "&salary="
            if(this.filters[3]!=undefined){
                this.filters[3].forEach((element,index) => {
                    if(element){
                        salary += index+1 + ","
                    }    
                });
            }
            let location = "&location="
            if(this.filters[4]!=undefined){           
                this.filters[4].forEach((element,index) => {
                    if(element){
                        location += index+1 + ","
                    }    
                });
            }
            let type = "&type="
            if(this.filters[5]!=undefined){
                this.filters[5].forEach((element,index) => {
                    if(element){
                        type += index+1 + ","
                    }    
                });
            }
            console.log("http://localhost:8000/api/test" + industry + ability + level + salary + location + type)
            fetch("http://localhost:8000/api/test" + industry + ability + level + salary + location + type)
            .then(response => response.json())
            .then(data => (this.jsondata = data));
        }
    }
}

</script>

<style>

</style>