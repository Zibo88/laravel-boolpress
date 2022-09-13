<template>
    <main>  
            <!-- utilizzo router-view così da poter stampare i contenuti di ogni singola pagina, funziona un po come lo @yield -->
       <router-view></router-view>
    </main>
    
</template>

<script >
// importo i componenti in app.vue
import SharedHeader from '../components/SharedHeader.vue'


export default {
   name: 'App',
    //creo la lista dei componenti che verranno importati in app.vue
    components: {
       SharedHeader,

    }

}
</script>
