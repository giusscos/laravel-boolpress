<template>
    <div class="flex flex-col gap-5">
        <HeaderComponent />
        <slot />
        <FooterComponent />
    </div>
</template>
<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';

export default{
    name: "default",
    components: {
        HeaderComponent,
        FooterComponent
    }
}
</script>
<style lang="scss" scoped>
main{
    flex-grow: 1;
}
</style>