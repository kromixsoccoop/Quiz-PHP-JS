
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
function attesa(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function contoAllaRovescia(secondi) {
  for (let i = secondi; i >= 0; i--) {
    console.log(i);
    await attesa(1000);
  }
  console.log("FINE");
}

contoAllaRovescia(5);
