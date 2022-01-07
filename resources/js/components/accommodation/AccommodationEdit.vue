<template>
    <div>
        <div class="container mt-5">
            <div>
                <form :action="'/zakwaterowanie/'+this.jsondata['slug']" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" :value="csrf">
                    <label for="title">Tytuł</label>
                    <input class="w-full" type="text" name="title" id="title" placeholder="Tytuł..." v-model="this.jsondata['title']">
                    <label for="price">Cena</label>
                    <input class="w-full" type="text" name="price" id="price" placeholder="Cena..." v-model="this.jsondata['price']">
                    <label for="">Miasto</label>
                    <input type="hidden" name='city_id' :value="chosenLocation['id']">
                    <Dropdown
                        :options="locations"
                        :maxItem="100"
                        v-on:selected="setLocation"
                        placeholder="Lokacja...">
                    </Dropdown>
                    <label for="rooms">Liczba pokoi</label>
                    <input class="w-full" type="text" name="rooms" id="rooms" placeholder="Liczba pokoi..." :value="this.jsondata['rooms']">
                    <label for="square_meters">Metry kwadratowe</label>
                    <input class="w-full" type="text" name="square_meters" id="square_meters" placeholder="Metry kwadratowe..." :value="this.jsondata['square_meters']">
                    <label for="photo_group"></label>
                    Zdjęcie
                    <div class="input-group">
                        <input type="file"  name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    Opis<br>
                    <editor
                    :init="{
                        selector: '#content',
                        height: 500,
                        plugins: 'lists',
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | outdent indent'
                    }"
                    name="content"
                    v-model="this.jsondata['content']"
                    />
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Dropdown from 'vue-simple-search-dropdown';
import Editor from '@tinymce/tinymce-vue'
export default {
    props: ['data'], 
    data(){
        return{
            locations: [],
            chosenLocation: '',
            jsondata: Object
        }
    },
    methods:{
        setLocation(selection){
            this.chosenLocation = selection;
        }
    },
    mounted: function(){
        this.jsondata = JSON.parse(this.data);
        this.chosenLocation = JSON.parse('{ "id": '+ this.jsondata['city_id'] +'}')
    },
    beforeCreate(){
        fetch(window.location.origin + "/api/cities")
        .then(response => response.json())
        .then(data => (this.locations = data));
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    components:{
        Dropdown,
        'editor': Editor
    }
}
</script>

<style>

</style>