<?php

// dato un array di stringhe, ottenere l'indirizzo di residenza di ogni utente

$persone = [
    'Fabio Cappellieri - Via Inghilterra 1, 88900 Crotone',
    'Antonio Rossi - Via Mario Rossi 5, 10100 Milano',
    'Stefano Venneri - Minami-Azabu 4-11-44, Shinjuku-ku, Tōkyō',
    'Pinco Pallino - Trav. 2 - Via Roma 10, 10100 Torino',
];

/* Soluzione
Via Inghilterra 1
Via Mario Rossi 5
Minami-Azabu 4-11-44
Trav. 2 - Via Roma 10
*/

// Codice:
foreach ($persone as $persona) {
    preg_match('/\s-\s(.*?),/', $persona, $matches);
    if (isset($matches[1])) {
        echo $matches[1] . "\n";
    }
}
