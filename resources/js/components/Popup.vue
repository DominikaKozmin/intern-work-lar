<template>
    <div v-on:click.self="$emit('close-tab')" class="popup">
        <div>
            <div class="text-center bg-primary popup-title fs-5 text-white uppercase">Zarejestruj się</div>
            <div class="popup-inner">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <label class="uppercase fw-bold form-label" for="">Twój email*</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="Wprowadź swój email">
                            <label class="uppercase fw-bold form-label" for="">Tytuł*</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="Wprowadź tytuł">
                            <label class="uppercase fw-bold form-label" for="">Branża</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                            <label class="uppercase fw-bold form-label" for="">Poziomy</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                            <label class="uppercase fw-bold form-label" for="">Umiejętności</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                        </div>
                        <div class="col">
                            <label class="uppercase fw-bold form-label" for="">Twoje imię*</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="Wpisz swoje imię">
                            <label class="uppercase fw-bold form-label" for="">Wynagrodzenie od</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="Wprowadź wynagrodzenie od">
                            <label class="uppercase fw-bold form-label" for="">Typy</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                            <label class="uppercase fw-bold form-label" for="">Lokalizacja</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                            <label class="uppercase fw-bold form-label" for="">Częstotliwość</label>
                            <input type="text" name="" id="" class="form-control mb-2" placeholder="">
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="btn btn-primary uppercase" type="submit" value="Zarejestruj się teraz">
                        <input class="btn btn-secondary uppercase" @click="$emit('close-tab')" type="button" value="Zamknij">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.popup {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 99;
	background-color: rgba(0, 0, 0, 0.2);
	
	display: flex;
	align-items: center;
	justify-content: center;
	.popup-inner {
		background: #FFF;
        width: 600px;
        padding: 32px;
	}
    .popup-title{
        background: #FFF;
        width: 600px;
        padding: 32px;
    }
}
</style>