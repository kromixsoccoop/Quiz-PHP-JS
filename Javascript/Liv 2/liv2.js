// Data una lista di parole, restituire le parole che sono palindrome
const lista = [
    'anna',
    'ciao',
    'fabio',
    'stefano',
    'osso',
    'radar',
];
// Soluzione: [ 'anna', 'osso', 'radar' ]
for(i=0; i<lista.length; i++){
    if(isPalindromaFirstV(lista[i])){   //se la funzione è vera
        console.log(lista[i]);          //stampo la parola che è palindroma
    }
}

function isPalindromaFirstV(a){
    let i;
    let x = 1;
    let palindroma = 0;
    for(i=0; i<(a.length)/2; i++){  //itera fino a quando non raggiunge la metà della lunghezza della parola
        if(a[i]===a[(a.length)-x]){ //se la lettera corrente è uguale alla lettera della parte opposta della lettera corrente
            palindroma ++;  //incremento count palindroma
    }else{
        palindroma --;      //decremento count palindroma
    }
    x++;
    }

    if(palindroma>0){
        return true;    //la parola è palindroma
    }else{return false;}    //la parola non è palindroma
}


//console.log(isPalindromaFirstV('anna'));

/*palindroma pari (anna):
    restituisce 2 => la metà della lunghezza della parola

palindroma dispari (radar):
    restituisce 3 => la metà +1

non palindroma dispari: 
    es: christian restituisce -3
non palindroma pari:
    es: afna restituisce 0

deve essere maggiore quindi almeno della metà della lunghezza della parola palindroma>=[(parola.lenght)/2]
*/

