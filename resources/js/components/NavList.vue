<template>
  <ul class="flex gap-4">
    <li v-for="(item, i) in links" :key="i">
      <router-link :to="{ name: item.name }" class="hover:bg-black hover:text-white px-3 py-1 rounded">
        {{ item.text }}
      </router-link>
    </li>
  </ul>
</template>
<script>
export default {
    name: 'NavList',
    props:{
        links: Array,
    } 
}
</script>