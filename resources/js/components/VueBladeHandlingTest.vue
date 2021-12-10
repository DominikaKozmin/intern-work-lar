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
        <div v-show="!showHighlightedOffers"> 
            <div class="row">
                <div class="col">
                    <div v-for="item in 12" :key="item">
                        <div v-if="item%2==1"><JobOfferTemplate :data="latestOffers[item-1]"></JobOfferTemplate></div>
                    </div>
                </div>
                <div class="col">
                    <div v-for="item in 12" :key="item">
                        <div v-if="item%2==0"><JobOfferTemplate :data="latestOffers[item-1]"></JobOfferTemplate></div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="showHighlightedOffers"> 
            <div class="row">
                <div class="col">
                    <div v-for="item in 12" :key="item">
                        <div v-if="item%2==1"><JobOfferTemplate :data="highlightedOffers[item-1]"></JobOfferTemplate></div>
                    </div>
                </div>
                <div class="col">
                    <div v-for="item in 12" :key="item">
                        <div v-if="item%2==0"><JobOfferTemplate :data="highlightedOffers[item-1]"></JobOfferTemplate></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center ">
            <a href="/oferty" class="uppercase btn btn-primary fw-bold rounded-pill"><span>Zobacz wszystkie oferty</span><div class="d-inline-block ml-1"><img class="pb-3px" src="/img/icons/right-arrow-white-background.png" alt=""></div> </a>
        </div>
    </div>
</template>

<script>
import JobOfferTemplate from './JobOfferTemplate.vue'

export default {
    props: ['latest-offers', 'highlighted-offers'],
    data(){
        return {
            counter: 1,
            showHighlightedOffers: false
        }
    },
    components: {
        JobOfferTemplate
    }
}
</script>

<style>
.pb-3px{
    padding-bottom: 3px;
}
</style>