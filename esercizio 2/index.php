
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-3</title>
</head>

<body>
    
<h1>PERSONAL COMPUTER</h1>

<?php
/**
     * 
     *          Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     * 
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     * 
     *          ECCEZIONI:
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
     * 
     */
class Computer {
    private $codiceUnivoco;
    private $modello;
    private $prezzo;
    private $marca;

    public function __construct($codiceUnivoco, $prezzo) {

        $this -> setCodiceUnivoco($codiceUnivoco);
        $this -> setPrezzo($prezzo);
    }

    // CODICE UNIVOCO
    public function getCodiceUnivoco() {
        
        return $this -> codiceUnivoco;
    }
    public function setCodiceUnivoco($codiceUnivoco) {
        if(strlen($codiceUnivoco) != 6 || !is_numeric($codiceUnivoco))
        throw new Exception ("Il codice univoco deve essere composto esattamente da 6 cifre!");

        $this -> codiceUnivoco = $codiceUnivoco;
    }

    // MODELLO
    public function getModello() {

        return $this -> modello;
    }
    public function setModello($modello) {
        if (strlen($modello) < 3 || strlen($modello) > 20 )                                                              
        throw new Exception("Il nome del modello deve essere composto da min 3 a max 20 caratteri");
        $this -> modello = $modello;
    }

    // PREZZO
    public function getPrezzo() {

        return $this -> prezzo;
    }
    public function setPrezzo($prezzo) {
        if (!is_numeric($prezzo) || $prezzo < 1 || $prezzo > 2000)                                                              
        throw new Exception("Il prezzo deve essere un valore numerico compreso tra €1 e €2000");
        $this -> prezzo = $prezzo;
    }

    // MARCA
    public function getMarca() {

        return $this -> marca;
    }
    public function setMarca($marca) {
        if (strlen($marca) < 3 || strlen($marca) > 20 )                                                              
        throw new Exception("La marca deve essere composta da min 3 a max 20 caratteri");

        $this -> marca = $marca;
    }

    public function printMe() {

        echo $this;
    }

    public function __toString() {

        return "Dati pc| " . "Marca--" . $this -> getMarca() . ", Modello--" . $this -> getModello() . ": €" . $this -> getPrezzo() . " [" . $this -> getCodiceUnivoco() . "]"; 
    }
}



try {
    $pc1 = new Computer(132723, 1999);
    $pc1 -> setMarca("HPa");
    $pc1 -> setModello("Pavilion x360");
    
    $pc1 -> printMe();
} catch (Exception $err) {

    echo $err . "<br><h1>" . $err -> getMessage() . "</h1>";
}

?>

</body>
</html>