<template>
    <header class="py-3 w-full">
        <div class="container mx-auto flex w-full">
            <div class="mr-auto">
                <h1>
                    Logo
                </h1>
            </div>
            <nav>
                <NavList :links="navLinks" />
            </nav>
        </div>
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
                    'route': '/about',
                    'text': 'About',
                },
                {
                    'name': 'contacts',
                    'route': '/contacts',
                    'text': 'Contacts',
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