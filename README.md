### 📄 Création de la base de données

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


