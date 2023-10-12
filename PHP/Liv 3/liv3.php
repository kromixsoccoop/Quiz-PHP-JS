<?php

// Dato un codice HTML, ottenere un array associativo contenente il nome e cognome della persona indicata
$html = <<<EOF
    <html>
        <head>
            <title>Test</title>
        </head>
        <body>
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Cognome</td>
                </tr>
                <tr>
                    <td>Mario</td>
                    <td>Rossi</td>
                </tr>
            </table>
        </body>
    </html>
EOF;

$doc = new DOMDocument();
$doc->loadHTML($html);

$dati = [];

$righe = $doc->getElementsByTagName('tr');
if ($righe->length >= 2) {
    $intestazioni = $righe->item(0)->getElementsByTagName('td');
    $valori = $righe->item(1)->getElementsByTagName('td');

    if ($intestazioni->length === $valori->length) {
        for ($i = 0; $i < $intestazioni->length; $i++) {
            $intestazione = trim($intestazioni->item($i)->textContent);
            $valore = trim($valori->item($i)->textContent);

            $dati[$intestazione] = $valore;
        }
    }
}

print_r($dati);
