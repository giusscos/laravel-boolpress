<template>
    <div class="container mx-auto px-2 flex gap-5 flex-wrap items-center justify-center">
        <h1 class="basis-full text-center text-3xl">
            {{ title }}
        </h1>
        <div>
            <div class="grid grid-cols-3 gap-10">
                <PostComponent v-for="post in posts" :key="post.id" :post="post" />
            </div>
            <div class="flex justify-center gap-10 py-5 cursor-pointer">
                <span @click="getPosts(page)" v-for="page in lastPage" :key="page">
                    {{ page }}
                </span>
            </div>
        </div>
    </div>
</template>
<script>
import PostComponent from '../components/PostComponent.vue'

export default{
    name: "App",
    data() {
        return {
            title: "Post Bellissimi",
            posts: [],
            currentPage: 1,
            lastPage: 0,
            total: 0
        };
    },
    methods: {
        getPosts(currentPage) {
            axios.get("/api/posts", {
                params: {
                    page: currentPage
                }
            }).then((res) => {
                const { data, current_page, last_page, total } = res.data.posts;
                console.log(res.data.posts)
                this.posts = data
                this.currentPage = current_page
                this.lastPage = last_page
                this.total = total
            });
        }
    },
    beforeMount() {
        this.getPosts();
    },
    components: { PostComponent }
}
</script>