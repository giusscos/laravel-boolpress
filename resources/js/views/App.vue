<template>
    <Default>
        <router-view></router-view>
    </Default>
</template>
<script>
import Default from '../layouts/Default.vue';

export default {
    name: "App",
    components: {
        Default
    }
}
</script>
<style lang="scss" scoped>
main {
    flex-grow: 1;
}
</style>