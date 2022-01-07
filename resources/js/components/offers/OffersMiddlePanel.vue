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
                <label for="">odwórć</label>
                <input type="checkbox" name="order" id="" v-model="order">
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
import PopupButton from './../popup/PopupButton.vue'

export default {
    props:['filters'],
    data(){
        return {
            jsondata: null,
            showAsList: true,
            selected: { id: null, api: null, name: null },
            totalVuePackages: null,
            filterParams: null,
            order: false

        }
    },
    created() {
        fetch("http://localhost:8000/api/test")
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
        },
        parseFiltersData(filterIndex){
            let value = ""
            if(this.filters[filterIndex]!=undefined){
                this.filters[filterIndex].forEach((element,index) => {
                    if(element){
                        value += index+1 + ","
                    }    
                });
            }
            return value
        },
        update(){
            let industry = "?industry="
            let ability = "&ability="
            let level = "&level="
            let salary = "&salary="
            let location = "&location="
            let type = "&type="
            if(this.filters!=null){
                industry += this.parseFiltersData(0)
                ability += this.parseFiltersData(1)
                level += this.parseFiltersData(2)
                salary += this.parseFiltersData(3)
                location += this.parseFiltersData(4)
                type += this.parseFiltersData(5)
            }
            let orderBy = "&orderBy=";
            switch (this.selected['id']){
                case 1:
                    orderBy += 'created_at'
                break;
                case 2:
                    orderBy += 'salary'
                break;
                case 3:
                    orderBy += 'title'
                break;
                default:
                    orderBy += 'title'
                break;
            }
            let order = "&order=" + this.order
            fetch("http://localhost:8000/api/test" + industry + ability + level + salary + location + type + orderBy + order)
            .then(response => response.json())
            .then(data => (this.jsondata = data));
        }
    },
    computed:{
        apiEndpoint: function(){
            return this.selected.api
        },
    },
    watch:{
        selected: function(val){
            this.update()
        },
        filters: function(val){
            this.update()
        },
        order: function(val){
            this.update()
        }
    }
}

</script>

<style>

</style>