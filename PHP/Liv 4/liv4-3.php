<?php

// Crea una classe che permetta di essere istanziata una sola volta, facendo si che i due oggetti $test1 e $test2 risultino identici (===)



/* Risultato:
bool(true)
*/

// Codice:
class Singleton {
    private static $instance;

    private function __construct(){}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

$test1 = Singleton::getInstance();
$test2 = Singleton::getInstance();

// NON MODIFICARE
var_dump($test1 === $test2);