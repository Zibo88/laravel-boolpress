// sintassi per utilizzare VueRouter 
import Vue from 'vue';
import VueRouter from 'vue-router';
			
Vue.use(VueRouter);


// importo le pagine
import HomePage from './pages/HomePage.vue';
import AboutPage from './pages/AboutPage.vue';
import BlogPage from './pages/BlogPage.vue';
import NotFound from './pages/NotFound.vue';
import SinglePost from './pages/SinglePost.vue';

// Regole delle rotte
const router = new VueRouter ({
    // inserisco la modalità hystory per eliminare il comporamento del cancelletto nell'url
    mode: 'history',
    routes: [
        {
            path : '/',
            name: 'home',
            component: HomePage
        },
        {
            path : '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path : '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePost
        },
        {
            path : '*/',
            name: 'not-found',
            component: NotFound
        }
    ]
})
// inserisco la stringa export default a fine pagina per permettere l'utilizo di app.js
export default router;


