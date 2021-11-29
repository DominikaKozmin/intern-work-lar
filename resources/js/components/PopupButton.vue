<template>
    <div>
        <button class="btn btn-primary" @click="popupShowed=true">Powiadom o ofercie</button>
        <div v-if="popupShowed"><popup @close-tab="closeTab"></popup></div>
    </div>
</template>

<script>
import Popup from './Popup.vue'
export default {
    data(){
        return{
            popupShowed: false
        }
    },
    methods:{
        closeTab(){
            this.popupShowed = false
        }
    },
    components: {
        Popup
    }
}
</script>

<style>

</style>