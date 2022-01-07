<template>
    <div class="bg-white mb-4 p-3 border hover:shadow-lg">
        <div class="d-inline-block align-top float-start pr-2">
            <img class="float-left" src="/img/images/user64.png" alt="">
        </div>
        <div class="d-inline-block w-auto overflow-hidden">
            <div class="fs-5"><a v-bind:href="`/oferty/`+data.slug">{{ data.title }}</a></div>
            <div><img class="pr-1" src="/img/icons/location.png" alt="">Placholder location</div>
            <div><img class="pr-1" src="/img/icons/briefcase.png" alt="">{{ data.user.name }}</div>
            <div><img class="pr-1" src="/img/icons/salary.png" alt="">{{ data.salary }}</div>
            <div><img class="pr-1" src="/img/icons/calendar.png" alt="">{{ data.deadline }}</div>
        </div>
        <div class="d-inline-block align-top float-right float-end">
            <div class="float-end bg-danger text-white rounded-pill px-2 py-1">Kontrakt</div>
            <img src="/img/icons/heart.png" alt="">               
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
}
</script>

<style>

</style>