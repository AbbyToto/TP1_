<?php


class Shoes {
    private $brand;
    private $size;
    private $price;
    private $color;

    public function __construct($brand, $size, $price, $color) {
        $this->brand = $brand;
        $this->size = $size;
        $this->price = $price;
        $this->color = $color;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }
    
}

// Créer une classe enfant SportsShoes qui hérite de Shoes
class SportsShoes extends Shoes {
    private $sportType;

    public function __construct($brand, $size, $price, $color, $sportType) {
        parent::__construct($brand, $size, $price, $color);
        $this->sportType = $sportType;
    }

    public function getSportType() {
        return $this->sportType;
    }
}

// Exemple d’utilisation :

// Créer une instance de la classe de base Shoes
$casualShoes = new Shoes("Adidas", 41, 89.99, "Black");

// Accéder aux propriétés et les afficher à l’aide des méthodes getter
echo "Brand: " . $casualShoes->getBrand() . "<br>";

// Mettre à jour la marque à l’aide de la méthode setter
$casualShoes->setBrand("Puma");
echo "Updated Brand: " . $casualShoes->getBrand() . "<br>";

// Créer une instance de la classe enfant SportsShoes
$sportsShoes = new SportsShoes("Nike", 42, 100.00, "Blue", "Running");

// Accéder aux propriétés des classes parente et enfant et les afficher
echo "Brand: " . $sportsShoes->getBrand() . "<br>";
echo "Sport Type: " . $sportsShoes->getSportType() . "<br>";
