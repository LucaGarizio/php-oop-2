<!-- ## Todo

### Day 1
Immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche:

- L'e-commerce vende **prodotti** per animali
- I prodotti sono categorizzati, le **categorie** sono `Cani` o `Gatti`
- I prodotti saranno oltre al **cibo**, anche **giochi**, **cucce**, etc

Stampiamo delle card contenenti i dettagli dei **prodotti**, come `immagine`, `titolo`, `prezzo`, `icona della categoria` ed il `tipo di articolo` che si sta visualizzando (prodotto, cibo, gioco, cuccia, ecc).

### Day 2
Aggiungere almeno un `trait` ed un `exception` (con al relativa gestione attraverso un `try-catch`) al vostro *shop*. -->


<?php

class ProdottoInesistente extends Exception {
    public function errorMessage() {
        return "Prodotto non trovato. <br> <br>";
    }
}

class Product {
    public $nome;
    public $prezzo;
    public $codiceProdotto;

    function __construct($nome, $prezzo, $codiceProdotto) {
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->codiceProdotto = $codiceProdotto;
    }

    function printCard() {
        echo "Nome: " . $this->nome . '<br>';
        echo "Prezzo: " . $this->prezzo . ' euro' . '<br>';
        echo "Codice Prodotto: " . $this->codiceProdotto . '<br>';
    }
}

class Cibo extends Product {
    public $tipo;
    public $peso;

    function __construct($nome, $prezzo, $codiceProdotto, $tipo, $peso) {
        parent::__construct($nome, $prezzo, $codiceProdotto);
        $this->tipo = $tipo;
        $this->peso = $peso;
    }

    function printCard() {
        parent::printCard();
        echo "Tipo: " . $this->tipo . '<br>';
        echo "Peso: " . $this->peso;
    }
}

class Cuccie extends Product {
    public $materiale;
    public $dimensione;

    function __construct($nome, $prezzo, $codiceProdotto, $materiale, $dimensione) {
        parent::__construct($nome, $prezzo, $codiceProdotto);
        $this->materiale = $materiale;
        $this->dimensione = $dimensione;
    }

    function printCard() {
        parent::printCard();
        echo "Materiale: " . $this->materiale . '<br>';
        echo "Dimensione: " . $this->dimensione;
    }
}

class Giochi extends Product {
    public $materiale;
    public $forma;

    function __construct($nome, $prezzo, $codiceProdotto, $materiale, $forma) {
        parent::__construct($nome, $prezzo, $codiceProdotto);
        $this->materiale = $materiale;
        $this->forma = $forma;
    }

    function printCard() {
        parent::printCard();
        echo "Materiale: " . $this->materiale . '<br>';
        echo "Forma: " . $this->forma . '<br> <br>' ;
    }
}


try {
    // Simulazione di un prodotto non trovato
    throw new ProdottoInesistente();
} catch (ProdottoInesistente $e) {
    echo "Errore: " . $e->errorMessage();
} catch (Exception $e) {
    echo "Errore generico: " . $e->getMessage();
}

$gioco = new Giochi('pupazzo', '15', 'C7ERTB', 'Tessuto', 'Cuore');
$gioco->printCard();
$cuccia = new Cuccie('cuccia per Cane', '100', 'CRZYLU', 'Legno', 'grande');
$cuccia->printCard();

?>