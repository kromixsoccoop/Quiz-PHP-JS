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

class Persona {
    public string $nome;
    public string $cognome;
    public int $eta;
    public bool $alive;

    public function __construct(string $nome, string $cognome, int $eta, bool $alive) {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->eta = $eta;
        $this->alive = $alive;
    }
}

class Paziente extends Persona {
    public array $figli = [];
}

class Figlio extends Persona {
}


$doc = new DOMDocument();
$doc->loadXML($xml);

$pazienti = [];

$pazientiXML = $doc->getElementsByTagName('paziente');

foreach ($pazientiXML as $pazienteXML) {
    $nome = trim($pazienteXML->getElementsByTagName('nome')->item(0)->textContent);
    $cognome = trim($pazienteXML->getElementsByTagName('cognome')->item(0)->textContent);
    $eta = $pazienteXML->getElementsByTagName('eta')->item(0)->textContent;
    $alive = filter_var($pazienteXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);

    $paziente = new Paziente($nome, $cognome, $eta, $alive);

    $figliXML = $pazienteXML->getElementsByTagName('figlio');
    foreach ($figliXML as $figlioXML) {
        $nomeFiglio = trim($figlioXML->getElementsByTagName('nome')->item(0)->textContent);
        $cognomeFiglio = trim($figlioXML->getElementsByTagName('cognome')->item(0)->textContent);
        $etaFiglio = $figlioXML->getElementsByTagName('eta')->item(0)->textContent;
        $aliveFiglio = filter_var($figlioXML->getElementsByTagName('alive')->item(0)->textContent, FILTER_VALIDATE_BOOLEAN);

        $figlio = new Figlio($nomeFiglio, $cognomeFiglio, $etaFiglio, $aliveFiglio);
        $paziente->figli[] = $figlio;
    }

    $pazienti[] = $paziente;
}

$json = json_encode($pazienti, JSON_PRETTY_PRINT);

echo $json;
?>