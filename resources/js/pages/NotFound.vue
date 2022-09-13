<template>
    <div class="container">
         <h1>Non ci sono contenuti</h1>
         <div> Visita la nostra <router-link :to="{name: 'home'}"> Home </router-link> </div>

    </div>
   
</template>

<script>
export default {
    name: 'NotFound'
}
</script>