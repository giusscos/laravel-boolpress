<template>
  <div>
      <h1>
        {{ post.title }}
      </h1>    
  </div>
</template>
<script>
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
        console.log(res.data)
        const { post } = res.data
        this.post = post
      }).catch((err) => {
        console.log(err)
      })
    }
  },
  beforeMount(){
    this.getPost()
  }
};
</script>