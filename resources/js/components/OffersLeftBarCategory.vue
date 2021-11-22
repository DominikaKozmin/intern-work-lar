<template>
    <div>
        <h3 class="widget-title">
            <span class="border-bottom">{{ table.tablename }}</span>
        </h3>
        <div v-for="(value, index) in table">
            <div v-if="value['name'] != null">
                <div v-if="index <=4 || showMore">
                    <OffersLeftBarSingleCategory :data=value></OffersLeftBarSingleCategory>
                </div>
            </div>
        </div>
        <div class="my-4">
            <a href="#" onclick="return false;" v-show="!showMore" v-on:click="changeShowMore">Pokaż więcej</a>
            <a href="#" onclick="return false;" v-show="showMore" v-on:click="changeShowMore">Pokaż mniej</a>
        </div>
    </div>
</template>

<script>
import OffersLeftBarSingleCategory from './OffersLeftBarSingleCategory.vue'
export default {
    props: ['table'],
    data(){
        return {
            showMore: false
        }
    },
    methods:{
        changeShowMore: function(){
            this.showMore = !this.showMore;
        }
    },
    components:{
        OffersLeftBarSingleCategory
    }
}
</script>

<style>

</style>