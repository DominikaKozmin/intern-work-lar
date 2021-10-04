<template>
    <div class="bg-white mb-4 p-3 border hover:shadow-lg">
    <div class="d-inline-block align-top float-start pr-2">
        <img class="float-left" src="{{ URL::asset('img/images/user64.png') }}" alt="">
    </div>
    <div class="d-inline-block w-auto overflow-hidden">
        <div class="fs-5"><a href="/oferty/{{ $Slug }}">{{ $Title }}</a></div>
        <div><img class="pr-1" src="{{ URL::asset('img/icons/location.png') }}" alt="">{{ $Location }}</div>
        <div><img class="pr-1" src="{{ URL::asset('img/icons/briefcase.png') }}" alt="">{{ $Username }}</div>
        <div><img class="pr-1" src="{{ URL::asset('img/icons/salary.png') }}" alt="">{{ $Salary }}</div>
        <div><img class="pr-1" src="{{ URL::asset('img/icons/calendar.png') }}" alt="">{{ $Created_at }}</div>
    </div>
    <div class="d-inline-block align-top float-right float-end">
        <div class="float-end bg-danger text-white rounded-pill px-2 py-1">Kontrakt</div>
        <img src="{{ URL::asset('img/icons/heart.png') }}" alt="">               
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>