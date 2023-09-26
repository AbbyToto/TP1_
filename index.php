<?php

// Configuration de la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "tp_1";
global $dpo;
// Créer une instance PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

require_once "Chuassure.php";
echo "<br>";
$chuassure1 = new Chaussure;
var_dump($chuassure1);

echo "<br>";
echo "<br>";
$allChuassures = $chuassure1->getAllChaussure();
print_r($allChuassures);

echo "<br>";
echo "<br>";

$chaussure = $chuassure1->getChaussureById(1);
print_r($chaussure);

// //Ajouter nouveau chuassure
echo "<br>";
echo "<br>";

$chuassure_added = $chuassure1->addChaussure("NBA", "Nike", 7.0, 96.44);
var_dump($chuassure_added);

echo "<br>";
echo "<br>";

//Modiffier une chuassure

$newChaussure = $chuassure1->updateChaussureById(8, "UpdatedName", "UpdatedBrand", 6.0, 66.66);
print_r($newChaussure);

//supprimer une chuassure

$id = 13; // Replace with the Chaussure ID you want to delete

$result = $chuassure1->deleteChaussureById($id);

//tri dans une colonne choisi(tous les chaussure d’un même marque)
$columnToSortBy = "nom"; //Remplacez par la colonne par laquelle vous souhaitez trier (par exemple, « nom », « taille », « prix »)
$brandToShow = "Nike"; // Remplacez par la marque que vous souhaitez afficher

$tab = $chuassure1->displayChaussuresByBrand($columnToSortBy, $brandToShow);

// fermer la  base de donnees de connection
$pdo = null;
