create database tp_1;
use tp_1;

CREATE TABLE Chaussure (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    marque VARCHAR(50),
    taille FLOAT,
    prix DECIMAL(10, 2)
);

INSERT INTO Chaussure(nom, marque,taille,prix) VALUES
                                        ("Classic", "Nike",8.5,120.99),
                                        ("SuperStar", "Addidas",7.0,89.49),
                                        ("God", "Puma",6.5,83.59),
                                        ("Bye", "Ander",6.0,60.43),
                                        ("Begin", "Aldo",12.0,99.29),
                                        ("Summer", "ELLE",10.0,87.09),
                                        ("Fly", "HM",5.5,50.81);
