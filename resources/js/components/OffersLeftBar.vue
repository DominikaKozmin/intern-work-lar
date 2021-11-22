<template>
    <div>
        <div v-for="table in this.jsondata">
            <offers-left-bar-category :table=table></offers-left-bar-category>
        </div>  
    </div>
</template>

<script>
import OffersLeftBarCategory from './OffersLeftBarCategory.vue';
export default {
    name: 'OffersLeftBar',
    props:['data'],
    data(){
        return {
            jsondata: null
        }
    },
    mounted: function(){
        this.jsondata = JSON.parse(this.data);
    },
    components:{
        OffersLeftBarCategory,
    }
}
</script>

<style>

</style>