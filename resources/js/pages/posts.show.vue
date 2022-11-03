<template>
  <div class="py-10 px-5">
      <h1 class="text-2xl text-center capitalize">
        {{ post.title }}
      </h1>
      <div class="flex justify-between py-2">
        <span>
          {{post.category?.name}}
        </span>
        <span>
          {{post.date}}
        </span>
      </div>
      <div class="aspect-video">
        <img class="h-full w-full object-fit object-center" 
        v-if="post.cover_path" :src="post.cover_path" :alt="post.title">
      </div>
      <TagsComponent :tags="post.tags" />
      <p>
        {{ post.content }}
      </p>
  </div>
</template>
<script>
import TagsComponent from '../components/TagsComponent.vue'

export default {
  name: "posts.show",
  data() {
    return {
      post: {}
    };
  },
  props: ['slug'],
  methods: {
    getPost(){
      
      axios
      .get(`/api/posts/${this.slug}`)
      .then((res) => {
        // console.log(res.data)
        const { post } = res.data
        this.post = post
      }).catch((err) => {
        console.log(err)
      })
    }
  },
  components:{
    TagsComponent,
  },
  beforeMount(){
    this.getPost()
  }
};
</script>