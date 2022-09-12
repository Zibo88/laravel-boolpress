<template>
    <main>
        <h1>{{pageTitle}}</h1>
        <div class="container">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
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
    mounted() {
        // creo la chiamata axios nel componente
        axios.get('http://127.0.0.1:8000/api/posts')
        .then((response) => {
            console.log(response);
        })
    }
   
}
</script>