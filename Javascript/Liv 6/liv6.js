// utilizza i generatori per stampare una lista dei primi 10 numeri primi

function isPrime(numero) {  //funzione che verifica se il numero passato nell'argomento è primo
    if (numero >= 2) {  //il numero primo più piccolo è 2, escludo quindi gli n<2
    
    for (let i = 2; i <= Math.sqrt(numero); i++) {  // Prendo il numero e lo divido partendo da 2 fin ad arrivare alla sua radice quadrata
      if (numero % i === 0) {
        return false; // false se il numero diviso il divisore da come resto 0, vuol dire che esistono altri divisori oltre 1 e se stesso
      }else{}
    }
  }
    return true; // true se non trova altri divisori
  }
  
  function* genPrimi(){ //creo un generatore per numeri primi
    i = 2               //variabile che passerò alla funzione isPrime()
    while(true){        //ciclo while precondizionale, itera sempre
      if(isPrime(i)){   //chiamo la funzione isPrime(i) e se da come risultato true vuol dire che "i" è primo
        console.log(i); //stampo il valore di i
        yield;
      }
      i++;              //incremento i di uno
    }
    }
  
  const mygen = genPrimi(); //creo un'istanza di genPrimi che chiamo mygen
  for(k=0; k<10; k++){      
    mygen.next();           //richiamo l'esecuzione del generatore 10 volte
  }  