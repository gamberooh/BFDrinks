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
    Descrizione varchar(255),
    FOREIGN KEY (Azienda) REFERENCES Azienda(Id)
);

CREATE TABLE Utente (
    Username varchar(65) PRIMARY KEY,
    Pswd varchar(65) not null,
    Email varchar(100) not null,
    Nome varchar(50) not null,
    Cognome varchar(50) not null,
    Telefono varchar(15),
    Classe varchar(5),
    FOREIGN KEY (Classe) REFERENCES Classe(Classe),
    Ruolo varchar(30)
);

CREATE TABLE Carrello (
    Username varchar(10),
    Prodotto int,
    Data_Inserimento date,
    PRIMARY KEY (Username, Prodotto),
    FOREIGN KEY (Username) REFERENCES Utente(Username),
    FOREIGN KEY (Prodotto) REFERENCES Prodotto(Indice)
);