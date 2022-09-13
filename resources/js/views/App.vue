<template>
    <main>  
            <!-- utilizzo router-view così da poter stampare i contenuti di ogni singola pagina, funziona un po come lo @yield -->
       <router-view></router-view>
    </main>
    
</template>

<script >
// importo il componente in app.vue
import Posts from '../components/Posts.vue';

export default {
   name: 'App',
    //creo la lista dei componenti che verranno importati in app.vue
    components: {
       
    }

}
</script>
