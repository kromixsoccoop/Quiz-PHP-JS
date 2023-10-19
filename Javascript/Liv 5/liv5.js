
// Dato l'url "https://jsonplaceholder.typicode.com/users" creare una funzione asyncrona che restituisca l'output in json
// e successivamente utilizzare tale funzione per stampare in console tutti i nomi degli utenti ottenuti
// Utilizzare nodefetch@2 per effettuare la chiamata (npm install node-fetch@2)

/* Soluzione:
Leanne Graham
Ervin Howell
Clementine Bauch
Patricia Lebsack
Chelsey Dietrich
Mrs. Dennis Schulist
Kurtis Weissnat
Nicholas Runolfsdottir V
Glenna Reichert
Clementina DuBuque
*/
const fetch = require('node-fetch');  //importo il modulo node-fetch, per eseguire richieste http in node

async function fetchUserData() {  //definisco una funzione asincrona che effettuerà la richiesta http ed estrarre i dati
  try {
    const response = await fetch('https://jsonplaceholder.typicode.com/users'); //attendo la risposta dall'url con await e salvo l'esito

    if (!response.ok) { //se non è andato a buon fine
      throw new Error('Errore nella richiesta HTTP: ' + response.status);
    }

    const data = await response.json(); //uso await per fare il parsing della risposta e la salvo come json
    return data;  //se andrà a buon fine restituirà i dati ottenuti dalla richiesta
  } catch (error) {
    throw new Error('Si è verificato un errore durante la richiesta: ' + error.message);
  }
}


fetchUserData()
  .then(data => { //quando la promessa implicita si risolve, la funzione .then() verrà eseguita con i dati ottenuti e verranno stampati
    console.log(data);
  })
  .catch(error => { //se si verifica un errore il catch lo gestirà stampando il messaggio di errore
    console.error(error);
  });