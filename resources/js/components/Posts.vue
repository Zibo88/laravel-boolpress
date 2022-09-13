<template>
    <main>
        <h2>{{pageTitle}}</h2>
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

            <!-- paginazione -->
            <nav class="mt-3">
                <ul class="pagination">
                    <!-- Preview -->
                    <!-- nel caso in cui ci troviamo alla prima pagina inseriamo una classe dinamica che impedisca di poter tornare indietro -->
                    <li class="page-item" @click.prevent="getAxiosCall(currentPaginationPage - 1)" :class="{'disabled' : currentPaginationPage == 1}">
                        <a class="page-link" href="#">Previous</a>
                    </li>

                    <!-- pagination number -->
                    <li class="page-item" v-for="pageNumber in lastPaginationPage" :key="pageNumber" :class="{ 'active' : pageNumber == currentPaginationPage }">
                        <!-- richiamo la funzione che esegue la chiamata Axios e gli passo come argomento il numero di pagine per permmetere all'utente di navigare tra le pagine -->
                        <!-- asegno una classe dinamica che permette di avere la classe active solo se pageNumber = current_page -->
                        <a @click.prevent="getAxiosCall(pageNumber)" class="page-link" href="#" >{{pageNumber}}</a>
                    </li>
                   
                   <!-- Next -->
                    <!-- quando l'utente clicca su next viene richiamta la funzione getAxiosCall che in base alla currentPaginationPage permette di andare avanti -->
                    <!-- assegno una classe dinamica così da attivare la classe disabled solo quando lapagina corrente è uguale all'ultima pagina  -->
                    <li class="page-item" @click.prevent="getAxiosCall(currentPaginationPage + 1)" :class="{'disabled' : currentPaginationPage == lastPaginationPage}">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

       <!-- :class="{'disabled' : currentPaginationPage == lastPaginationPage} -->
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
            // pagina corrente
            currentPaginationPage: 1,
            // ultima pagina
            lastPaginationPage: null

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
        // assegno un parametro alla funzione
        getAxiosCall(pageNumber){
            axios.get('http://127.0.0.1:8000/api/posts', {
                // do un secondo parametro alla chiamata axios aggiungendo un params
                params: {
                    page: pageNumber
                }
            }
            
            )
            .then((response) => {
            // assegno ai post i dati provenienti dal database
            //  console.log(response.data.results.data) (controllo dopo paginate nel model)
            this.posts = response.data.results.data;
            //chiamata per assegnare il vlore di current_page a currentPaginationPage
            this.currentPaginationPage = response.data.results.current_page
            // chiamata per assegnare il valore di last_page a lastPaginationPage
            this.lastPaginationPage = response.data.results.last_page
            console.log(this.lastPaginationPage)
           
        
        });
        }
    },
    mounted() {
        // richiamo la chiamata axios nel componente, per fare dei test puoi inserire un numero di pagina diverso da 1
        this.getAxiosCall(1);
       
    }
   
}
</script>