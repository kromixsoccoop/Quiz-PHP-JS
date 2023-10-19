
// Realizza un conto alla rovescia partendo da 5 secondi, e che stampi il testo "FINE" dopo che il conto è arrivato a 0. Utilizzare le Promise

/* Soluzione:
5
4
3
2
1
0
FINE
*/

// Codice:
function contoAllaRovescia(secondi) {
    return new Promise((resolve) => {
      let interval = setInterval(() => {
        if (secondi >= 0) {
          console.log(secondi);
          secondi--;
        } else {
          clearInterval(interval);
          console.log("FINE");
          resolve();
        }
      }, 1000);
    });
  }
  
  contoAllaRovescia(5)
    .then();