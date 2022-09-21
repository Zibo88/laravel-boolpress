<template>
    <div class="container">
        Form di contatto
        <!-- inserisco form per l'invio di un messaggio, dalla parte front-office all'admin -->
        <!-- aggiunta di @submit.prevent al tag form per richiamare la funzione sendMessage quando l'utente invia i dati del form  -->
        <form class="mt-3" @submit.prevent="sendMessage">
            <!-- inserisco un alert da BS5 per ringraziare l'utente del messaggio inviato -->
            <!-- per evitare che il messaggio sia sempre visibile aggiungo success: false a data() e lo stampo solo se la condizione è vera, attraverso un v-if-->
            <div v-if="success" class="alert alert-primary" role="alert">
                Grazie per averci contattato
            </div>

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
            success: false,
		}
	},
    methods: {
        // creo una funzione dentro methods per eseguire la chiamata Axios
        sendMessage(){
            // eseguo la chiamata axios
            axios.post('/api/leads',{
                // passo alla chiamata i parametri sotto forma di oggetto
                name: this.userName,
                email: this.userEmail,
                message: this.userMessage,

            })
            .then((response) => {
                // se response.data.success è vera this.success diventa true e svuoto tutti i campi
                if(response.data.success){
                    this.success = true;
                    this.userName = '';
			        this.userEmail = '';
			        this.userMessage = '';
                }
            })

        }
    }

}
</script>