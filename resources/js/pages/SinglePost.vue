<template>
<div>
    <!-- leggo lo slug dall'url -->
    {{$route.params.slug}}
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
            console.log(response);
        })
    }
}
</script>