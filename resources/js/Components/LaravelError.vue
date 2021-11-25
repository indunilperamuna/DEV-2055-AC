<template>
    <small v-if="field" class="error" v-for="error in field">{{ error }}</small>
</template>

<script>
export default {
    name: "LaravelError",
    props: ['field']
}
</script>

<style scoped>
    .error{
        color: red;
    }
</style>
