<template>
  <div class="py-10 px-5" v-if="post">
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
      <div class="aspect-video rounded-2xl overflow-hidden">
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
        const { post } = res.data
        this.post = post
      }).catch((err) => {
        const {status } = err.response
        switch(status) {
          case 404: this.$router.replace({name: 'page404'})
                      break;
          default: console.log(`Errore sconosciuto: ${err}`)
        }
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