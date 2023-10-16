
// data una lista di numeri, scrivi una funzione che restituisca il fattoriale di ogni numero passato come parametro, ottimizzando e utilizzando meno codice possibile

const lista = [5, 10, 8, 7, 2];

/* Soluzione: 
  [ 120, 3628800, 40320, 5040, 2 ]
*/

// Codice:
const calcolaFattoriali = lista => lista.map(n => (n <= 1 ? 1 : Array.from({ length: n }, (_, i) => i + 1).reduce((a, b) => a * b)));

console.log(calcolaFattoriali(lista));
