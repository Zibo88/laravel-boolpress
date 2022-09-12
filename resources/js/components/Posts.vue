<template>
    <main>
        <h1>{{pageTitle}}</h1>
        <div class="container">
            <div class="row row-cols-3">
                    <!-- eseguo ciclo v-for dell'array posts, e assegno come chiave univoca l'id di ogni post -->
                    <div v-for="post in posts" :key="post.id" class="col">
                        <div class="card mt-4">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{cutText(post.content)}}</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </main>
</template>


<script>
// assegno il name al componenete
export default {
    name: 'Posts',
    data(){
        return{
            pageTitle: 'Ciao sono Posts',
            // array vuoto per inserire i dati dalla chiamata axios
            posts: [],
        }
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

        // funzione per la chiamata axios
        getAxiosCall(){
            axios.get('http://127.0.0.1:8000/api/posts')
            .then((response) => {
            // assegno ai post i dati provenienti dal database
            //  console.log(response.data.results.data) (controllo dopo paginate nel model)
            this.posts = response.data.results.data;
           
        
        });
        }
    },
    mounted() {
        // richiamo la chiamata axios nel componente
        this.getAxiosCall();
       
    }
   
}
</script>