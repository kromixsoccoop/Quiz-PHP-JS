// Dato un array di oggetti, ordinarlo in ordine crescente di punteggio
const lista = [
    {
        nome: 'Fabio',
        punteggio: 10,
    },
    {
        nome: 'Stefano',
        punteggio: 5,
    },
    {
        nome: 'Anna',
        punteggio: 7,
    },
    {
        nome: 'Luca',
        punteggio: 2,
    },
    {
        nome: 'Giuseppe',
        punteggio: 3,
    }
];

function bubbleSort(l) {  //uso l'algoritmo di ordinamento bubblesort
    let scambio;
    do {
      scambio = false;
  
      for (let i = 0; i < (l.length) - 1; i++) {
        if (l[i].punteggio > l[i + 1].punteggio) {//se l'elemento corrente è maggiore di quello successivo, uso una variabile temp per fare lo scambio
          const temp = l[i];
          l[i] = l[i + 1];
          l[i + 1] = temp;
          scambio = true;
        }
      }
    } while (scambio);                  //itera fino a quando scambio=false cioè fino all'ultimo confronto
  
    return l;
  }

  const newL = bubbleSort(lista);
  console.log(newL);