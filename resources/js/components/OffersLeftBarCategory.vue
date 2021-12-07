<template>
    <div>
        <h3 class="widget-title">
            <span class="border-bottom">{{ table.tablename }}</span>
        </h3>
        <div v-for="(value, index) in table" :key="index">
            <div v-if="value['name'] != null">
                <div v-if="index <=4 || showMore">
                    <div>
                        <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                            <div class="col-9">
                                <label>
                                    <input type="checkbox" :name="value['name']" :id="value['name']" :value="value['name']" v-model="picked[index]" @click="emit">
                                    {{ value['name'] }}
                                </label><br/>
                            </div>
                            <div class="col">
                                <span class="float-end pl-1">{{ value['count'] }}</span>
                            </div>
                        </div>
                    </div> 
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
            showMore: false,
            picked: []
        }
    },
    methods:{
        changeShowMore(){
            this.showMore = !this.showMore;
        },
        emit(){
            setTimeout(() => {  this.$emit('chosen-filter', this.picked); }, 1);
        }
    },
    components:{
        OffersLeftBarSingleCategory
    }
}
</script>

<style>

</style>