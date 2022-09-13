<template>
    <div class="container">
        <h1>I nostri posts</h1>
        <Posts /> 
    </div>
</template>

<script>
// importo Posts
import Posts from '../components/Posts.vue'

export default {
    name: 'BlogPage',
    components: {
        Posts
    }
}
</script>