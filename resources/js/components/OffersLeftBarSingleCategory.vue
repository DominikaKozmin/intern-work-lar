<template>
    <div>
        <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
            <div class="col-9">
                <label>
                    <input type="radio" name="group1" value="Milk">
                    {{ data['name'] }}
                </label><br/>
            </div>
            <div class="col">
                <span class="float-end pl-1">0</span>
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    props: ['data']
}
</script>

<style>

</style>