// scrivi una funzione che estragga la sequenza di fibonacci fino al valore N (parametro della funzione)
/* Soluzione: console.log(fibonacci(10));
    [
  1,  1,  2,  3,  5,
  8, 13, 21, 34, 55
]
*/
var n = 10;
var seq = fibonacci(n);
console.log(seq);

function fibonacci(n) {
  if(n>0){  //controllo che sia >0
  if (n > 1) {  //se n > 1
    var seq = [1, 1]; //i primi due valori della seq
    for (var i = 2; i < n; i++) { //itera fino a quando i< dell'argomento
      var nextN = seq[i - 1] + seq[i - 2];  //calcolo il prossimo elemento prendendo l'n-1esimo della sequenza sommato a all'n-2esimo
      seq.push(nextN);  //inserisco il nuovo elemento in seq
    }
    return seq;
  }else {return 1;} //se n = 1

}else{return "Errore: n<1"} 
}