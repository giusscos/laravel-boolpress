<template>
    <div>
        <h1>
            {{ title }}
        </h1>
        <div>
            <ul>
                <li v-for="post in posts" :key="post.id">
                    {{ post.title }}
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default{
    name: 'App',
    data() {
        return {
            title: 'Post Bellissimi',
            posts: []
        }
    },
    methods: {
        getPosts(){
            axios.get('/api/posts').then((res) => {
                const { posts } = res.data
                // console.log(posts)
                this.posts = posts
            })
        }
    },
    beforeMount(){
        this.getPosts()
    }
}
</script>