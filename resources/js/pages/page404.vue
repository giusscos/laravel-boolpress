<template>
    <div>
        <h1 class="text-5xl text-center">
            404
        </h1>
        <p>
            Torna alla <router-link class="text-white py-1 px-3 bg-orange-600 rounded-xl" :to="{name: 'home'}">home</router-link>
        </p>
    </div>
</template>
<script>
export default {
    name: 'page404',
}
</script>