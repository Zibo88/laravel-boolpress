<template>
     <div class="card mt-4">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <!-- stampo le immagini per ogni singolo post in Blog -->
            <img class="w-100" v-if="post.cover" :src="post.cover" :alt="post.title">

            <p class="card-text">{{cutText(post.content)}}</p>
            <!-- inserisco un link di collegamento che porta l'utente alla pagina con i maggiori dettagli -->
            <router-link class="btn btn-primary" :to="{name: 'single-post',params: {slug: post.slug}}"> Leggi </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name:'PostDetails',
    // la nostra card ha necessità di post per poter lavorare
    props:{
        post: Object,
    },
    methods: {
         // funzione per tagliare il testo del content
        cutText(text){
            // se la lunghezza del text è superiore a 40 caratteri torna il text con slice, altrimenti torna text normale
            if(text.length > 40){
                return text.slice(0, 40) + '...'
            }
            return text
  
        },
    }
}
</script>