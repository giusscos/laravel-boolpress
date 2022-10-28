<template>
    <article class="bg-gray-200 rounded-lg text-center py-3">
        <h3 class="text-3xl px-2">
            {{ post.title }}
        </h3>
        <span class="rounded-md bg-gray-400 text-white hover:bg-gray-600 cursor-pointer px-2 my-5">
            {{ post.category.name }}
        </span>
        <img class="py-2 aspect-square" v-if="post.cover_path" :src="post.cover_path" :alt="post.title">
        <ul class="flex gap-10 justify-center items-center p-2">
            <li class="rounded-md bg-red-400 text-white hover:bg-red-600 cursor-pointer py-1 px-2" 
            v-for="tag in post.tags" :key="tag.id">
                {{ tag.name }}
            </li>
        </ul>
    </article>
</template>
<script>
export default{
    name: 'PostComponent',
    props: {
        post: Object,
    }
}
</script>