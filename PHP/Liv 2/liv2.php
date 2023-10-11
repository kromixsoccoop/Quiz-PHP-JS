<?php

// dato un array di stringhe, ottenere il numero di telefono di ogni persona in un array

$persone = [
    'Nome: Mario, Cognome: Rossi, Telefono: 3331234567',
    'Nome: Giuseppe, Cognome: Verdi, Telefono: 3337654321',
    'Nome: Carlo, Cognome: Bianchi, Telefono: 3334567890',
    'Nome: Giovanni, Cognome: Neri, Telefono: 3332345678',
];

/* Soluzione
Array
(
    [0] => 3331234567
    [1] => 3337654321
    [2] => 3334567890
    [3] => 3332345678
)
*/


/*-------------------PRIMA SOLUZIONE----------------------
$stringa = implode(' : ', $persone);  //prendo gli elem di persone e li salvo tutti in una stringa separati da ' : '

$parole = explode(':', $stringa);   //prendo la stringa e la salvo nell'array parole, ogni elemento è separato da ':'

for($i=3; $i<=count($parole)-1; $i+=4){ //itera a partire da 3 e incrementa di 4 fino a quando non raggiunge la lunghezza dell'array-1
    echo "\n", $parole[$i]; //stampo il numero di telefono che è salvato nelle posizioni i+4 con i>=3
}
*/

$telefoni = [];

foreach ($persone as $persona) {    //scorro l'array $persone ed ogni elemento trovato lo salvo in $persona
    
    $dettagli = explode(', ', $persona);    // divido la stringa di persona in un array utilizzando ', ' come delimitatore

    foreach ($dettagli as $dettaglio) { // Itera attraverso i dettagli per trovare il numero di telefono
        if (strpos($dettaglio, 'Telefono:') !== false) {    //se trova la posizione dove legge 'Telefono:'
            
            $numeroTelefono = str_replace('Telefono: ', '', $dettaglio);    // estraggo numero di telefono rimuovendo 'Telefono:' e spazi
            $telefoni[] = $numeroTelefono;  //lo salvo nell'array creato all'inizio
            break; // esce una volta trovato il numero
        }
    }
}

print_r($telefoni); //stampo l'array
