<template>
    <div class="p-4">
        <h4>{{ title }}</h4>
        <ul class="list-group">
<!--            <a v-for="(item ,index) in todos" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center" :href="item.routeTo">-->
<!--                {{ item.title }}-->
<!--                <span class="badge jay-badge badge-pill">-->
<!--                    {{ item.reading_volume }}-->
<!--                </span>-->
<!--            </a>-->
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            title: String
        }
    }
</script>

<style scoped>

</style>
