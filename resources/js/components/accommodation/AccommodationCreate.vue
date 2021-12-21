<template>
    <div>
        <div class="container mt-5">
            <div>
                <form action="/zakwaterowanie" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf">
                    Tytuł<br>
                    <input class="w-full" type="text" name="title" placeholder="Tytuł..."><br><br>
                    Cena<br>
                    <input class="w-full" type="text" name="price" placeholder="Cena..."><br><br>
                    Miasto<br>
                    <input type="hidden" name='city_id' :value="chosenLocation['id']">
                    <Dropdown
                        :options="locations"
                        :maxItem="100"
                        v-on:selected="setLocation"
                        placeholder="Lokacja...">
                    </Dropdown>
                    Liczba pokoi<br>
                    <input class="w-full" type="text" name="rooms" placeholder="Liczba pokoi..."><br><br>
                    Metry kwadratowe<br>
                    <input class="w-full" type="text" name="square_meters" placeholder="Metry kwadratowe..."><br><br>
                    Zdjęcie
                    <div class="input-group">
                        <input type="file"  name="image"  class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>
                    Opis<br>
                    <textarea id="content" name="content"></textarea><br>
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
export default {
    data(){
        return{
            locations: [],
            chosenLocation: '',
        }
    },
    methods:{
        setLocation(selection){
            this.chosenLocation = selection;
        },
    },
    beforeCreate(){
        console.log(window.location.origin + "/api/cities")
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
        Dropdown
    }
}
</script>

<style>

</style>