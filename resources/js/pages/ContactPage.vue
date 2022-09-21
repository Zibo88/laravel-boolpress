<template>
    <div class="container">
        Form di contatto
        <!-- inserisco form per l'invio di un messaggio, dalla parte front-office all'admin -->
        <form class="mt-3">

            <!-- nome -->
			 <div class="mb-3">
                <label for="user-name" class="form-label">Nome e Cognome</label>
                <!-- inserisco il v-model nelle input -->
                <input v-model="userName" type="text" class="form-control" id="userName">
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="usere-email" class="form-label">Email</label>
                <!-- inserisco il v-model nelle input -->
                <input v-model="userEmail" type="email" class="form-control" id="user-email">
            </div>

            <!-- messaggio -->
            <div class="mb-3">
                <div>
                     <label for="user-message" class="form-label">Message</label>
                </div>
               <!-- inserisco il v-model nelle input -->
                <textarea v-model="userMessage"  id="user-message" cols="100" rows="10"></textarea>
            </div>
			
            <input type="submit" value="Invia"> 
		</form>

    </div>
</template>

<script>
export default {
    name:'ContactPage',
    // creo delle variabili dentro data per poter leggere tramite v-model i contenuto della input
    data() {
		return {
			userName: '',
			userEmail: '',
			userMessage: '',
		}
	}

}
</script>