<?php

// dato un input XML, trasforma il codice in un array di oggetti tipizzati, e stampa il risultato in JSON

$xml = <<<EOF
    <pazienti>
        <paziente>
            <nome>Mario</nome>
            <cognome>Rossi</cognome>
            <eta>24</eta>
            <alive>true</alive>
            <figli>
                <figlio>
                    <nome>Giuseppe</nome>
                    <cognome>Rossi</cognome>
                    <eta>3</eta>
                    <alive>true</alive>
                </figlio>
            </figli>
        </paziente>
        <paziente>
            <nome>Giuseppe</nome>
            <cognome>Verdi</cognome>
            <eta>30</eta>
            <alive>false</alive>
            <figli>
                <figlio>
                    <nome>Carlo</nome>
                    <cognome>Verdi</cognome>
                    <eta>5</eta>
                    <alive>true</alive>
                </figlio>
                <figlio>
                    <nome>Giovanni</nome>
                    <cognome>Verdi</cognome>
                    <eta>10</eta>
                    <alive>true</alive>
                </figlio>
            </figli>
        </paziente>
    </pazienti>
EOF;


$doc = new DOMDocument();   //creo un oggetto DOM
$doc->loadXML($xml);    // carico il documento XML

$pazienti = []; //array per salvare i dati dei pazienti

$pazientiXML = $doc->getElementsByTagName('paziente');  //salvo tutti gli elementi 'paziente' del documento

foreach ($pazientiXML as $pazienteXML) {    //itero per tutto pazientiXML e salvo il corrente in pazienteXML
    // salvo i dati ottenuti dal pazienteXML corrente
    $nome = $pazienteXML->getElementsByTagName('nome')->item(0)->textContent;
    $cognome = $pazienteXML->getElementsByTagName('cognome')->item(0)->textContent;
    $eta = intval($pazienteXML->getElementsByTagName('eta')->item(0)->textContent);
    $alive = filter_var($pazienteXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);

    // salvo i dati in un array associativo per ogni pazienteXML
    $paziente = [
        'nome' => $nome,
        'cognome' => $cognome,
        'eta' => $eta,
        'alive' => $alive,
    ];

    // controllo se il paziente ha figli e li salvo in un array
    $figliXML = $pazienteXML->getElementsByTagName('figlio');
    $figli = [];

    foreach ($figliXML as $figlioXML) { //ciclo simile a quello precedente
        $nomeFiglio = $figlioXML->getElementsByTagName('nome')->item(0)->textContent;
        $cognomeFiglio = $figlioXML->getElementsByTagName('cognome')->item(0)->textContent;
        $etaFiglio = intval($figlioXML->getElementsByTagName('eta')->item(0)->textContent);
        $aliveFiglio = filter_var($figlioXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);

        //salvo i dati di figlioXML corrente nell'array associativo figlio
        $figlio = [
            'nome' => $nomeFiglio,
            'cognome' => $cognomeFiglio,
            'eta' => $etaFiglio,
            'alive' => $aliveFiglio,
        ];
        
        $figli[] = $figlio; //salvo nell'array tutti i figli trovati
    }

    if (!empty($figli)) {   //se l'array non è vuoto
        $paziente['figli'] = $figli;    //creo un nuovo campi 'figli' nell'array paziente dove salvo figli
    }

    
    $pazienti[] = $paziente;    //aggiungo il paziente all'array dei pazienti
}

$json = json_encode($pazienti, JSON_PRETTY_PRINT);  // converto l'array di pazienti in json

echo $json; // stampo il risultato in formato json
