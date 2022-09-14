<template>
     <div class="card mt-4">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{cutText(post.content)}}</p>
            <!-- inserisco un link di collegamento che porta l'utente alla pagina con i maggiori dettagli -->
            <router-link class="btn btn-primary" :to="{name: 'single-post',params: {slug: post.slug}}"> Leggi </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name:'PostDetails'
}
</script>