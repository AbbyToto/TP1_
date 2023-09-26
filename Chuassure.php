<?php
class Chaussure
{

    public function getAllChaussure()
    {
        // connexion a la base de donnee
        global $pdo;
        //preparation de la requette
        $pdoStmt = $pdo->query("SELECT * FROM Chaussure");
        $chaussures = $pdoStmt->fetchAll(PDO::FETCH_ASSOC);
        return $chaussures;
    }

    public function getChaussureById($id)
    {
        global $pdo;
        $pdoStmt = $pdo->prepare("SELECT id, nom, marque,taille,prix FROM Chaussure WHERE id = :id");
        $pdoStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $pdoStmt->execute();
        $chaussure = $pdoStmt->fetch(PDO::FETCH_ASSOC);
        return $chaussure;
    }


    public function addChaussure($nom, $marque, $taille, $prix)
    {
        global $pdo;
        // Prépare requete SQL
        $sql = "INSERT INTO Chaussure (nom, marque, taille, prix) VALUES (:nom, :marque, :taille, :prix)";
        $stmt = $pdo->prepare($sql);

        // Lier les valeurs
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
        $stmt->bindParam(':taille', $taille, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        //executer la requette preparee
        $stmt->execute();
        //tester le nombre de ligne affectee
        if ($stmt->rowCount() <= 0) {
            return false;
        }
        return $pdo->lastInsertId();
    }



    public function updateChaussureById($id, $nom, $marque, $taille, $prix)
    {
        // recherche l'element 
        $chaussure = $this->getChaussureById($id);
        if ($chaussure) {
            global $pdo;
            // Préparez requete SQL
            $sql = "UPDATE Chaussure SET nom = :nom, marque = :marque, taille = :taille, prix = :prix WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            // Lier les valeurs
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
            $stmt->bindParam(':taille', $taille, PDO::PARAM_STR);
            $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);

            // Exécuter l'instruction préparée
            $stmt->execute();
            $chaussure = $stmt->fetch(PDO::FETCH_ASSOC);
            return $chaussure;
        }
    }

    public function deleteChaussureById($id)
    {
        $chaussure = $this->getChaussureById($id);
        if ($chaussure) {
            global $pdo;
            //Préparez l'instruction SQL
            $sql = "DELETE FROM Chaussure WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Lier l'ID 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécuter l'instruction préparée
            $resultat = $stmt->execute();

            // retourne le resultats de la requete sql et stocke la dans la variable resultats
            return $resultat;
        } else {
            return "chuassure introuvable";
        }
    }



    function displayChaussuresByBrand($column, $brand)
    {
        global $pdo;

        $sql = "SELECT * FROM Chaussure WHERE marque = :brand ORDER BY $column";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->execute();


        echo "<h2>Chaussures de la marque $brand triées par $column :</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nom</th><th>Marque</th><th>Taille</th><th>Prix</th></tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['marque'] . "</td>";
            echo "<td>" . $row['taille'] . "</td>";
            echo "<td>" . $row['prix'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
