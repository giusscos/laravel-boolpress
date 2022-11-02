<template>
    <header class="flex w-full py-3">
        <div class="mr-auto">
            <h1>
                Logo
            </h1>
        </div>
        <nav>
            <NavList :links="navLinks" />
        </nav>
    </header>
</template>
<script>
import NavList from './NavList.vue'

export default {
    name: 'NavComponent',
    data() {
        return{
            navLinks: [
                {
                    'name': 'home',
                    'route': '/',
                    'text': 'Home',
                },
                {
                    'name': 'about',
                    'route': '/chi-siamo',
                    'text': 'About',
                },
                {
                    'name': 'posts.index',
                    'route': '/blog',
                    'text': 'Blog',
                },
            ],
        }
    },
    components: {
        NavList,
    }
}
</script>