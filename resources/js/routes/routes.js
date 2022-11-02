import home from '../pages/home.vue'
import about from '../pages/about.vue'
import contacts from '../pages/contacts.vue'
import postsIndex from '../pages/posts.index.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component: home
    },
    {
        path: '/about',
        name: 'about',
        component: about
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: contacts
    },
    {
        path: '/blog',
        name: 'posts.index',
        component: postsIndex
    },
]

export default routes