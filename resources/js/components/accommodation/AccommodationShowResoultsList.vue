<template>
    <div class="album py-4 px-1 d-inline-block" style="width:33%;">
        <div class="card shadow">
            <img width="100%" height="225" class="" :src="'/storage/accommodations_images/' + data['photo'][0]['path']">
            <div class="card-body">
                <p class="fs-5 fw-bolder"><a class="text-dark" :href="data['slug']"> {{ data['title'] }} </a></p>
                <div class="row">
                    <div class="col">
                        <p>Lokacja: {{ data['city']['name'] }}</p>
                        <p>Liczba pokoji: {{ data['rooms'] }}</p>
                    </div>
                    <div class="col">
                        <p>Metry kwadratowe: {{ data['square_meters'] }}</p>
                        <p>Cena: {{ data['price'] }}zł</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div v-show="data['user_id']==userid">
                            <form class="d-inline-block float-end" :action="'/zakwaterowanie/' + data['slug']" method="POST">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="_method" value="delete"/>
                            <button class="btn btn-danger">Usuń</button>
                            </form>
                            <a class="btn btn-info float-end" :href="'/zakwaterowanie/' + data['slug'] + '/edit/'">Edytuj</a>
                        </div>
                    </div>
                    <div class="text-primary fw-bold"><a :href="'zakwaterowanie/' + data['slug']">Czytaj dalej <img src="/img/icons/right-arrow.png" alt=""></a></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['data', 'userid', 'api'],
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }
}
</script>

<style>

</style>