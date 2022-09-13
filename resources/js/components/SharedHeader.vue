<template>
    <div>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- eseguo un ciclo v-for per stampare il contenuto dell'array di oggetti menuLinks -->
            <li v-for="link, index in menuLinks" :key="index" class="nav-item">
                    <!-- assegno alla <li> router-link così da creare un collegamento che mostri i contenuti della pagina con name: home (regola delle route) -->
                <router-link :to="{name: link.name}"  class='nav-link'>{{link.label}}</router-link>
            </li>
        </ul>
    </div>
  </div>
</nav>
    </div>
</template>

<script>
export default {
    name: 'SharedHeader',
    data(){
        return{
            // creo un array di oggeti per i link di navigazione così da poterli stampare tramite un v-for, inserisco in ogni oggetto le caratteristiche così da poter stampare quello che mi serve
            menuLinks: [
                {
                    name: 'home',
                    label:'Home'
                },
                {
                    name: 'about',
                    label:'About'
                },
                {
                    name: 'blog',
                    label:'Blog'
                },
            ]
        }
    }
}
</script>