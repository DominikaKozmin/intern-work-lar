<template>
    <div class="row">
        <div class="col-3">
            <offers-left-bar :data="data" @filterData="addFilterData"></offers-left-bar>
        </div>
        <div class="col-9">
            <offers-middle-panel :filters="options"></offers-middle-panel>
        </div>
    </div>
</template>

<script>
import OffersLeftBar from './OffersLeftBar.vue'
import OffersMiddlePanel from './OffersMiddlePanel.vue'
export default {
    data(){
        return{
            filterData: null,
            options: null,
            counter: 1
        }
    },
    methods:{
        addFilterData(content){
            this.filterData = content
        },
    },
    props: ['data'], 
    components:{
        OffersLeftBar,
        OffersMiddlePanel
    }
}
</script>

<style>

</style>