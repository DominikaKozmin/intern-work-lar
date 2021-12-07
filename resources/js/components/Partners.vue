<template>
    <div>
        <div class="text-center fs-3 mb-5">Współpracujemy:</div>
    <Carousel :per-page="5" :mouse-drag="false" :autoplay="true" :autoplayHoverPause="false" :autoplayTimeout="2000" :loop="true" :paginationEnabled="false" :scrollPerPage="false">
        <Slide v-for="(item, index) in partners" :key="index">
            <div class="d-inline-block d-flex justify-content-center align-items-center" style="height: 150px;width: 200px;">
                <a :href="'http://www.' + item['url']"><img :src="'/img/wheel/' + item['path_to_wheel_img']"></a>
            </div>
        </Slide>
    </Carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    data(){
        return {
            partners: null
        }
    },
    created() {
        fetch("http://localhost:8000/api/partners")
        .then(response => response.json())
        .then(data => (this.partners = data));
    },
    computed:{
        parameters: function(){
            this.position = this.partners.length
        }
    },
    components:{
        Carousel,
        Slide
    }
}
</script>

<style>

</style>