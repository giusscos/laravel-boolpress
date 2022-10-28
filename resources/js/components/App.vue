<template>
    <div class="container mx-auto px-2 flex gap-5 flex-wrap items-center justify-center">
        <h1 class="basis-full text-center text-3xl">
            {{ title }}
        </h1>
        <div>
            <div class="grid grid-cols-3 gap-10">
                <PostComponent v-for="post in posts" :key="post.id" :post="post" />
            </div>
        </div>
    </div>
</template>
<script>
import PostComponent from './PostComponent.vue'

export default{
    name: "App",
    data() {
        return {
            title: "Post Bellissimi",
            posts: []
        };
    },
    methods: {
        getPosts() {
            axios.get("/api/posts").then((res) => {
                const { posts } = res.data;
                console.log(posts)
                this.posts = posts;
            });
        }
    },
    beforeMount() {
        this.getPosts();
    },
    components: { PostComponent }
}
</script>