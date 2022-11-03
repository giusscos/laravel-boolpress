<template>
    <ul class="flex gap-10 justify-center items-center p-2">
        <li class="rounded-md bg-orange-600 text-white cursor-pointer py-1 px-2" v-for="tag in tags"
            :key="tag.id">
            {{ tag.name }}
        </li>
    </ul>
</template>
<script>
export default {
    name: 'TagsComponent',
    props: {
        tags: Array
    },
}
</script>