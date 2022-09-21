<template>
    <div class="container">
        Form di contatto
        <!-- inserisco form per l'invio di un messaggio, dalla parte front-office all'admin -->
        <!-- aggiunta di @submit.prevent al tag form per richiamare la funzione sendMessage quando l'utente invia i dati del form  -->
        <form class="mt-3" @submit.prevent="sendMessage" >
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

                <!-- se errors.name esiste -->
                <div v-if="errors.name">
                        <!-- per ogni errore in errors.name stampa un errore -->
                    <div v-for="error, index in errors.name" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="user-email" class="form-label">Email</label>
                <!-- inserisco il v-model nelle input -->
                <input v-model="userEmail" type="email" class="form-control" id="user-email">

                 <!-- se errors.email esiste -->
                <div v-if="errors.email">
                    <div v-for="error, index in errors.email" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>

            <!-- messaggio -->
            <div class="mb-3">
                <div>
                     <label for="user-message" class="form-label">Message</label>
                </div>
               <!-- inserisco il v-model nelle input -->
                <textarea v-model="userMessage"  id="user-message" cols="100" rows="10"></textarea>

                 <!-- se errors.message esiste -->
                <div v-if="errors.message">
                        <!-- per ogni errore in errors.name stampa un errore -->
                    <div v-for="error, index in errors.message" :key="index" class="alert alert-danger" role="alert">
                        {{ error }}
                    </div>
                </div>
            </div>
			
            <input type="submit" value="Invia" :disabled="sending"> 
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
            // creo una variabile che setto su false, questa variabile indica quando l'utente ha inviato il form, ci permetterà di disabilitare il tasto submit se il form è giastato inviato
            sending: false,
            // creo una variabile per salvare gli errori e do come valore un oggetto vuoto
            errors: {},
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
                    this.errors = {};
                }else{
                    // se response.data.success è falsa allora this.errors sarà uguale a response.data.success
                    this.errors = response.data.errors
                }
            })

        }
    }

}
</script>