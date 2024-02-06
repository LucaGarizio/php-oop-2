<!-- 
Immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche:

L'e-commerce vende prodotti per animali

I prodotti sono categorizzati, le categorie sono Cani o Gatti

I prodotti saranno oltre al cibo, anche giochi, cucce, etc

Stampiamo delle card contenenti i dettagli dei prodotti, come immagine, titolo, prezzo, icona della categoria ed il tipo di articolo che si sta visualizzando (prodotto, cibo, gioco, cuccia, ecc). -->

<?php

class Prodotto {
    private $id;
    private $nome;
    private $categoria;
    private $prezzo;
    private $tipoArticolo;

    public function __construct($id, $nome, $categoria, $prezzo, $tipoArticolo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->prezzo = $prezzo;
        $this->tipoArticolo = $tipoArticolo;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

    public function getTipoArticolo() {
        return $this->tipoArticolo;
    }
}

class Carrello {
    private $prodotti = [];

    public function aggiungiProdotto(Prodotto $prodotto) {
        $this->prodotti[] = $prodotto;
    }

    public function rimuoviProdotto($index) {
        unset($this->prodotti[$index]);
        $this->prodotti = array_values($this->prodotti);
    }

    public function calcolaTotale() {
        $totale = 0;
        foreach ($this->prodotti as $prodotto) {
            $totale += $prodotto->getPrezzo();
        }
        return $totale;
    }
}

class Categoria {
    private $nome;
    private $icona;

    public function __construct($nome, $icona) {
        $this->nome = $nome;
        $this->icona = $icona;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIcona() {
        return $this->icona;
    }

    public function setIcona($icona) {
        $this->icona = $icona;
    }
}

class CardStampata {
    private $titolo;
    private $prezzo;
    private $iconaCategoria;
    private $tipoArticolo;

    public function __construct($titolo, $prezzo, $iconaCategoria, $tipoArticolo) {
        $this->titolo = $titolo;
        $this->prezzo = $prezzo;
        $this->iconaCategoria = $iconaCategoria;
        $this->tipoArticolo = $tipoArticolo;
    }

    public function stampa() {
        echo "<div class='card'>";
        echo "<h2>$this->titolo</h2>";
        echo "<p>Prezzo: $this->prezzo</p>";
        echo "<p>Tipo: $this->tipoArticolo</p>";
        echo "<img src='$this->iconaCategoria' alt='Icona Categoria'>";
        echo "</div>";
    }
}

// Esempio di utilizzo delle classi
$prodotto1 = new Prodotto(1, "Cibo per cani", "Cani", 10.99, "Cibo");
$prodotto2 = new Prodotto(2, "Giocattolo per gatti", "Gatti", 5.99, "Gioco");

$carrello = new Carrello();
$carrello->aggiungiProdotto($prodotto1);
$carrello->aggiungiProdotto($prodotto2);


$categoriaCani = new Categoria("Cani", "icona_cani.jpg");
$categoriaGatti = new Categoria("Gatti", "icona_gatti.jpg");

$card1 = new CardStampata($prodotto1->getNome(), $prodotto1->getPrezzo(), $categoriaCani->getIcona(), $prodotto1->getTipoArticolo());
$card1->stampa();

$card2 = new CardStampata($prodotto2->getNome(), $prodotto2->getPrezzo(), $categoriaGatti->getIcona(), $prodotto2->getTipoArticolo());
$card2->stampa();

echo "Totale nel carrello: " . $carrello->calcolaTotale();
?>

