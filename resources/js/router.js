// sintassi per utilizzare VueRouter 
import Vue from 'vue';
import VueRouter from 'vue-router';
			
Vue.use(VueRouter);


// importo le pagine
import HomePage from './pages/HomePage.vue';
import AboutPage from './pages/AboutPage.vue';
import BlogPage from './pages/BlogPage.vue';

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
    ]
})
// inserisco la stringa export default a fine pagina per permettere l'utilizo di app.js
export default router;


