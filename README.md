![](./screenshot.png)


## [ENGLISH VERSION]

### 🎯 Learning Goals

This project was developed to:

- **Strengthen my core skills** and database management using PDO.

- **Understand and implement CRUD operations** (Create, Read, Update, Delete) with SQL in a real-world context.

- **Learn to structure a PHP application** with clarity and modularity.



### ⚙️ Features

- **Add a student:** Fill out a form to create a new student record.

- **Add a subject:** Add a new subject that can be associated with students and grades.

- **Add a grade:** Assign a grade to a student for a specific subject.

- **Main dashboard:** Displays:

A table of students and their average grades.

A table of all professors.

A table of all subjects.

A table listing all grades, including the student and subject involved.

- **Simple and clear interface** for easy navigation and management.

### 💡 Technologies used

- PHP

- MySQL with PDO

- HTML & CSS/SCSS



## [VERSION FRANÇAISE]

### 🎯 Objectifs d'apprentissage

Ce projet a été développé pour :

- **Renforcer mes compétences fondamentales** en PHP et gestion de base de données avec PDO.

- **Comprendre et appliquer les opérations CRUD** (Créer, Lire, Mettre à jour, Supprimer) dans un cas concret.

- **Apprendre à structurer une application PHP** de manière claire et modulaire.



### ⚙️ Fonctionnalités

- **Ajouter un étudiant :** Remplir un formulaire pour enregistrer un nouvel étudiant.

- **Modifier une matière :** Créer une nouvelle matière à associer aux étudiants et aux notes.

- **Ajouter une note :** Attribuer une note à un étudiant dans une matière donnée.

- **Tableau de bord principal :** Affiche :

Un tableau avec la liste des étudiants et leur moyenne.

Un tableau listant les professeurs.

Un tableau des matières.

Un tableau des notes (avec l’étudiant et la matière concernés).

- **Interface simple et claire** pour une navigation fluide.


### 💡 Technologies utilisées

- PHP

- MySQL avec PDO

- HTML & CSS/SCSS


## 📄 Création de la base de données

## EN - 
Here are the SQL lines used to create the database and the tables for this project:

## FR - 
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

`CREATE TABLE professeurs (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   	nom VARCHAR(100) NOT NULL,
   	prenom VARCHAR(100) NOT NULL,
	id_matiere INT NOT NULL,
	CONSTRAINT fk_matiere_prof FOREIGN KEY (id_matiere) REFERENCES matieres(id)
);`

`ALTER TABLE etudiants
ADD date_naissance DATE;`

`ALTER TABLE matieres
ADD bareme_20 INT;`

`ALTER TABLE matieres
ADD bareme_10 INT;`
