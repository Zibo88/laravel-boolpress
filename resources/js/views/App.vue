<template>
    <main>  
        <h1> ciao sono app vue </h1>
        <!-- utilizzo posts.vue -->
        <Posts/>
    </main>
    
</template>

<script >
// importo il componente in app.vue
import Posts from '../components/Posts.vue';

export default {
   name: 'App',
    //creo la lista dei componenti che verranno importati in app.vue
    components: {
        Posts
    }

}
</script>
