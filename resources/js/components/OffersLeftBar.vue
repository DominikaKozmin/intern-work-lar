<template>
    <div>
        <div v-for="(item,index) in this.jsondata" :key="index">
            <offers-left-bar-category :table=item @chosen-filter="addFilterData(index,$event)"></offers-left-bar-category>
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
            jsondata: null,
            filterData: []
        }
    },
    mounted: function(){
        this.jsondata = JSON.parse(this.data);
    },
    methods:{
        addFilterData(id, content){
            this.filterData[id] = content
            this.$emit('filterData', this.filterData)
        },
    },
    components:{
        OffersLeftBarCategory,
    }
}
</script>

<style>

</style>