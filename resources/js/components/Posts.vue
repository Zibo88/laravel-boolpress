<template>
    <div>
        <h1>{{pageTitle}}</h1>
    </div>
</template>


<script>
// assegno il name al componenete
export default {
    name: 'Posts',
    data(){
        return{
            pageTitle: 'Ciao sono Posts'
        }
    }
   
}
</script>