create database bfdrinks;
use bfdrinks;

CREATE TABLE Classe (
    Classe varchar(5) PRIMARY KEY,
    Aula varchar(7),
    NAlunni int
);

CREATE TABLE Azienda (
    Id varchar(10) PRIMARY KEY,
    Nome varchar(50) not null,
    Telefono varchar(15),
    Indirizzo varchar(100),
    Email varchar(100)
);

CREATE TABLE Prodotto (
    Indice int PRIMARY KEY,
    Nome varchar(50),
    Linea varchar(50),
    Miscela varchar(50),
    Gusto varchar(50),
    Prezzo decimal(10, 2),
    Calorie int,
    Azienda varchar(10),
    FOREIGN KEY (Azienda) REFERENCES Azienda(Id)
);

CREATE TABLE Utente (
    Username varchar(10) PRIMARY KEY,
    Pswd varchar(50) not null,
    Email varchar(100) not null,
    Nome varchar(50) not null,
    Cognome varchar(50) not null,
    Telefono varchar(15),
    Classe varchar(5),
    FOREIGN KEY (Classe) REFERENCES Classe(Classe),
    Ruolo varchar(30)
);


CREATE TABLE Carrello (
    Utente varchar(10),
    Prodotto int,
    Data_Inserimento date,
    PRIMARY KEY (Utente, Prodotto),
    FOREIGN KEY (Utente) REFERENCES Utente(Username),
    FOREIGN KEY (Prodotto) REFERENCES Prodotto(Indice)
);


-- Aggiungi l'attributo 'Descrizione' di tipo varchar(255) alla tabella 'Prodotto'
ALTER TABLE Prodotto
ADD Descrizione varchar(255);
