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

$pattern = '/\b\d{10}\b/';
$numeri = [];
$persona = implode(", ", $persone);

if (preg_match_all($pattern, $persona, $matches)) {
    $numeri = array_merge($numeri, $matches[0]);
}
print_r($numeri);
