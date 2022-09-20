<template>
    <div class="container">
        <!-- stampo gli elementi solo se post non è NULL -->
        <div v-if="post">
            <h1>{{post.title}}</h1>
            
             <!-- stampo le post->cover solo se sono presenti e quindi non sono null -->
            <img v-if="post.cover" :src="post.cover" :alt="post.title">

            <!-- stampo la categoria solo se post.category non è NULL -->
            <div v-if="post.category">
                Categoria: {{post.category.name}}
            </div>
            <!-- stampo i tag solo se la loro lunghezza è maggiore di 0 -->
            <div v-if="post.tags.length > 0">
                <!-- eseguo il ciclo v-for dei tag in post.tags -->
                <span v-for="tag in post.tags" :key="tag.id"  class="badge bg-primary mr-2">{{tag.name}}</span>
            </div>
               
            <p>{{post.content}}</p>
        </div>

        <!-- finchè non carica mostra Loading -->
        <div v-else>Loading</div>
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
            // se la chiamata al database va a buon fine
            if(response.data.success){
                  // assegno i dati a post
                this.post = response.data.results

            }else{
                // Altrimenti, se non va a buon fine, reindirizza l'utente alla pagina con name: not-found, quando assegno una rotta scrivi router
                this.$router.push({name:'not-found'})
            }
        //    console.log(this.post)
        })
    }
}
</script>