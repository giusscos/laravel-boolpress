<template>
    <article class="bg-gray-200 rounded-lg text-center py-3 relative">
        <router-link :to="{name: 'posts.show', params: {slug: post.slug}}" :slug="post.slug" class="card-link"></router-link>
        <span class="text-sm">
            {{post.date}}
        </span>
        <h3 class="text-3xl px-2 py-3">
            {{ post.title }}
        </h3>
        <span v-if="post.category" class="rounded-md bg-gray-400 text-white hover:bg-gray-600 cursor-pointer py-1 px-2">
            {{ post.category.name }}
        </span>
        <img class="py-2 aspect-square" v-if="post.cover_path" :src="post.cover_path" :alt="post.title">
        <TagsComponent :tags="post.tags" />
    </article>
</template>
<script>
import TagsComponent from './TagsComponent.vue'

export default{
    name: 'PostComponent',
    props: {
        post: Object,
    },
    components: {
        TagsComponent,
    }
}
</script>
<style lang="scss" scoped>
.card-link{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
</style>