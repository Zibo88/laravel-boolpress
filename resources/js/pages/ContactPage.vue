<template>
    <div class="container">
        Form di contatto
        <!-- inserito form per l'invio di un messaggio, dalla parte front-office all'admin -->
        <form class="mt-3">
            <!-- nome -->
			 <div class="mb-3">
                <label for="user-name" class="form-label">Nome e Cognome</label>
                <input type="text" class="form-control" id="user-name">
            </div>

            <div class="mb-3">
                <label for="user-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user-email">
            </div>

            <div class="mb-3">
                <div>
                     <label for="user-message" class="form-label">Message</label>
                </div>
               
                <textarea  id="user-message" cols="100" rows="10"></textarea>
            </div>
			
            <input type="submit" value="Invia"> 
		</form>

    </div>
</template>

<script>
export default {
    name:'ContactPage',
}
</script>