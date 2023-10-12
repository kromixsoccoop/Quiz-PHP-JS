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

class Paziente {
    public $nome;
    public $cognome;
    public $eta;
    public $alive;
    public $figli = [];
}

class Figlio {
    public $nome;
    public $cognome;
    public $eta;
    public $alive;
}

$doc = new DOMDocument();
$doc->loadXML($xml);

$pazienti = [];

$pazientiXML = $doc->getElementsByTagName('paziente');

foreach ($pazientiXML as $pazienteXML) {
    $paziente = new Paziente();
    $paziente->nome = trim($pazienteXML->getElementsByTagName('nome')->item(0)->textContent);
    $paziente->cognome = trim($pazienteXML->getElementsByTagName('cognome')->item(0)->textContent);
    $paziente->eta = intval($pazienteXML->getElementsByTagName('eta')->item(0)->textContent);
    $paziente->alive = filter_var($pazienteXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);

    $figliXML = $pazienteXML->getElementsByTagName('figlio');
    foreach ($figliXML as $figlioXML) {
        $figlio = new Figlio();
        $figlio->nome = trim($figlioXML->getElementsByTagName('nome')->item(0)->textContent);
        $figlio->cognome = trim($figlioXML->getElementsByTagName('cognome')->item(0)->textContent);
        $figlio->eta = intval($figlioXML->getElementsByTagName('eta')->item(0)->textContent);
        $figlio->alive = filter_var($figlioXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);
        $paziente->figli[] = $figlio;
    }

    $pazienti[] = $paziente;
}

$json = json_encode($pazienti, JSON_PRETTY_PRINT);

echo $json;
