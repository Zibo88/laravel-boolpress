<template>
    <div class="container">
        <!-- stampo gli elementi solo se post non è NULL -->
        <div v-if="post">
            <h1>{{post.title}}</h1>
            <p>{{post.content}}</p>
        </div>
    </div>
    
</template>

<script>
export default {
    name:'SinglePost',
    data(){
        return{
            // variabile che servirà per salvare i dati
            post: null
        }
    },
    // eseguo la chiamata axios tramite l'api creata 
    mounted() {
        // aggiungo all'url $route.params.slug, dove sono appunto tutti i dati e lo slug
        axios.get('/api/posts/' + this.$route.params.slug )
        .then((response)=>{
            // assegno i dati a post
            this.post = response.data.results
        //    console.log(this.post)
        })
    }
}
</script>