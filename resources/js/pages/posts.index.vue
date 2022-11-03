<template>
  <div>
    <h1 class="basis-full text-center text-3xl">
      {{ title }}
    </h1>
    <div>
      <div class="grid sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
        <PostComponent v-for="post in posts" :key="post.id" :post="post" />
      </div>
      <div class="flex justify-center gap-10 py-5 cursor-pointer">
        <span
          @click="getPosts(page)"
          :class="{
            'bg-gray-600 text-white': page === currentPage,
            'bg-gray-300 ': page !== currentPage,
            'px-2 py-1 rounded-xl hover:bg-gray-600 hover:text-white': true,
          }"
          v-for="page in lastPage"
          :key="page"
        >
          {{ page }}
        </span>
      </div>
    </div>
  </div>
</template>
<script>
import PostComponent from "../components/PostComponent.vue";

export default {
  name: "posts.index",
  data() {
    return {
      title: "Post Bellissimi",
      posts: [],
      currentPage: 1,
      lastPage: 0,
      total: 0,
    };
  },
  methods: {
    getPosts(currentPage) {
      axios
        .get("/api/posts", {
          params: {
            page: currentPage,
          },
        })
        .then((res) => {
          const { data, current_page, last_page, total } = res.data.posts;
          this.posts = data;
          this.currentPage = current_page;
          this.lastPage = last_page;
          this.total = total;
        });
    },
  },
  beforeMount() {
    this.getPosts();
  },
  components: { PostComponent },
};
</script>