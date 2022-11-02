<template>
    <div class="container mx-auto px-2 flex gap-5 flex-wrap items-center justify-center">
        <NavComponent />
        <router-view></router-view>
    </div>
</template>
<script>
import NavComponent from '../components/NavComponent.vue';

export default{
    name: "App",
    components: {
        NavComponent,
    }
}
</script>