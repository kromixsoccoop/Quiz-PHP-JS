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


$doc = new DOMDocument();   //creo un documento xml vuoto
$doc->loadHTML($html);  //carico la stringa html nell'oggetto creato prima per analizzarla


$dati = []; //creo un array vuoto per salvare i dati


$righe = $doc->getElementsByTagName('tr');  //selezione tutte le righe attraverso il tag tr e li salvo nella variabile righe. Conterrà i dati che voglio prendere


if ($righe->length >= 2) {  //controllo se è andata a buon fine l'operazione precedente
    $nome = trim($righe->item(1)->getElementsByTagName('td')->item(0)->textContent);    //qui salverà 'Mario'
    $cognome = trim($righe->item(1)->getElementsByTagName('td')->item(1)->textContent); //qui salverà 'Rossi'

    //aggiungo i dati all'array associativo
    $dati['Nome'] = $nome;
    $dati['Cognome'] = $cognome;
}


print_r($dati); // stampo l'array

/*con $righe->item(1) estraggola seconda riga
con getElementsByTagName('td') accedo ai suoi nodi figli cioè td, la cella della tabella
con item(0) estraggo l'elemento contenuto nella cella td con indice 0 della seconda riga
con textContent ottengo il contenuto stringa di td
con trim() elimino spazi vuoti all'inizio e alla fine di td
/*
