create database bfdrinks;
use bfdrinks;

create table AZIENDA (
	Id varchar(6) PRIMARY KEY,
    Nome varchar(30) NOT NULL,
    NTel int(10) NOT NULL,
    eMail varchar(50)
);

create table PRODOTTO (
	Indice int(6) PRIMARY KEY,
    Nome varchar(30) NOT NULL,
    Linea char(20),
    Miscela char(20),
    Calorie float(6),
    Collab varchar(6) REFERENCES AZIENDA(Id)    
);

create table CLASSE (
	Anno int(1),
    Sez char(1),
    Acr char(4),
    NAlunni int(3),
    Aula varchar(4),
    PRIMARY KEY (Anno, Sez, Acr)    
);

create table ORDINE (
	Id int(6) primary key,
    qta int(4),
    data datetime,
    indProdotto int(6) REFERENCES PRODOTTO(Indice),
    Anno int(1),
    Sez char(1),
    Acr char(4),
    foreign key (Anno, Sez, Acr) REFERENCES CLASSE(Anno, Sez, Acr)
    );