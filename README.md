Voici les commandes SQL réalisées pour la création de la base de données et des tables :


`CREATE DATABASE tp_notes;
USE tp_notes;`

`CREATE TABLE etudiants (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   	nom VARCHAR(100) NOT NULL,
   	prenom VARCHAR(100) NOT NULL,
	matricule VARCHAR(50) NOT NULL
);`

`CREATE TABLE matieres (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   	nomMatiere VARCHAR(100) NOT NULL,
   	codeMatiere VARCHAR(50) NOT NULL
);`

`CREATE TABLE notes (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_etudiant INT NOT NULL,
    CONSTRAINT fk_etudiant FOREIGN KEY (id_etudiant) REFERENCES etudiants(id),
    id_matiere INT NOT NULL,
    CONSTRAINT fk_matiere FOREIGN KEY (id_matiere) REFERENCES matieres(id),
    valeurNote FLOAT NOT NULL
);`

`ALTER TABLE etudiants
ADD date_naissance DATE;`

`ALTER TABLE matieres
ADD bareme_20 INT;`

`ALTER TABLE matieres
ADD bareme_10 INT;`





## [ENGLISH VERSION]

### 🎯 Learning Goals

This project was developed to:

- **Reinforce core skills** in PHP and database handling with PDO.

- **Understand CRUD operations** (Create, Read, Update, Delete) using SQL.

- **Structure a PHP project** with clarity and separation of concerns.



### ⚙️ Features

- **Add a movie:** Fill out a form to add a new movie to the database.

- **Edit a movie:** Modify the details (title, director, year, description) of an existing movie.

- **Delete a movie:** Remove a movie permanently from the database.

- **Movie detail page:** Click on a movie to view all its information on a dedicated page.

- **Simple design and user-friendly navigation.**

### 💡 Technologies used

- PHP

- MySQL with PDO

- HTML & CSS/SCSS



## [VERSION FRANÇAISE]

### 🎯 Objectifs d'apprentissage

Ce projet a été développé pour :

- **Renforcer mes compétences de base** en PHP et gestion de base de données avec PDO.

- **Comprendre les opérations CRUD** (Créer, Lire, Mettre à jour, Supprimer) avec SQL.

- **Structurer un projet PHP** de façon claire et maintenable.



### ⚙️ Fonctionnalités

- **Ajouter un film :** Remplir un formulaire pour ajouter un nouveau film à la base de données.

- **Modifier un film :** Changer les informations d’un film existant (titre, réalisateur, année, description).

- **Supprimer un film :** Supprimer définitivement un film de la base de données.

- **Page dédiée à un film :** Cliquer sur un film pour accéder à une page contenant tous ses détails.

- **Design simple et navigation intuitive.**


### 💡 Technologies utilisées

- PHP

- MySQL avec PDO

- HTML & CSS/SCSS



### Screenshot

![](./screenshot.png)
