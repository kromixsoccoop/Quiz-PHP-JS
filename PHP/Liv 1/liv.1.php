<?php
// Dato un testo, restituire il numero di parole che contengono un numero di lettere dispari
$testo = 'Questo è un testo di esempio per effettuare questo esercizio'; //'Questo è un testo di esempio per effettuare questo esercizio';

$parole = explode(' ', $testo); // Dividi il testo in un array di parole
$dispari = 0;   //contatore parole dispari

function parolaDispari($x) {    //funzione che restituisce true se la parola passata ha lunghezza dispari
    return mb_strlen($x, 'UTF-8') % 2 != 0;
}

foreach ($parole as $parola) {  //scorro l'array parole e prendo la parola corrente per passarla alla funzione
    if (parolaDispari($parola)) {   //se la funzione restituisce true vuol dire che la parola passata ha lunghezza dispari
        $dispari++; //incremento il contatore dispari di uno
    }
}
echo $dispari;

?>
