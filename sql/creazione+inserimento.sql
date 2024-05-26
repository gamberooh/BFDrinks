DROP DATABASE bfdrinks;
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
    qnt int,
    Data_Inserimento varchar(100),
    PRIMARY KEY (Username, Prodotto),
    FOREIGN KEY (Username) REFERENCES Utente(Username),
    FOREIGN KEY (Prodotto) REFERENCES Prodotto(Indice)
);

use bfdrinks;

-- insert aziende
INSERT INTO AZIENDA (Id, Nome, Telefono, Indirizzo, Email) VALUES 
('AZ001', 'Coca-Cola Company', 1234567890, 'Via Marco Ledpido 64', 'info@cocacola.com'),
('AZ002', 'Lavazza', 9876543210, 'Via Togliatti 23' ,'info@lavazza.com'),
('AZ003', 'Skipper Beverages', 5555555555, 'Via Cesare 5', 'info@skipperbeverages.com'),
('AZ004', 'Yoga Drinks', 8888888888, 'Via Costanzo 34','info@yogadrinks.com'),
('AZ005', 'Mentos Beverages', 4444444444, 'Via De Filippi 26','info@mentos.com');

-- Bibite della linea light
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (1, 'FizzPop Light', 'Light', 'Sparkling', 'Lime', 9.99, 50, 'AZ001'),
    (2, 'Glow Water', 'Light', 'Still', 'Melon', 7.50, 30, 'AZ004'),
    (3, 'Sparkle Splash', 'Light', 'Sparkling', 'Peach', 8.25, 40, 'AZ003');

-- Bibite della linea strong
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (4, 'Xtreme Energy', 'Strong', 'Sparkling', 'Raspberry', 10.00, 300, 'AZ003'),
    (5, 'Turbo Tonic', 'Strong', 'Still', 'Arancia', 9.75, 400, 'AZ004'),
    (6, 'Power Punch', 'Strong', 'Sparkling', 'Mango', 9.50, 350, 'AZ001');

-- Bibite della linea light
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (7, 'EcoFizz Light', 'Light', 'Sparkling', 'Lemon', 8.50, 40, 'AZ003'),
    (8, 'VitaSpritz', 'Light', 'Still', 'Apple', 6.99, 25, 'AZ002'),
    (9, 'ZenZero Zero', 'Light', 'Sparkling', 'Ginger', 9.25, 20, 'AZ004');

-- Bibite della linea strong
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (10, 'MegaCharge', 'Strong', 'Sparkling', 'Guaranà', 9.50, 450, 'AZ003'),
    (11, 'HyperRush', 'Strong', 'Still', 'Berries', 8.75, 480, 'AZ001'),
    (12, 'Shockwave', 'Strong', 'Sparkling', 'Cherry', 9.99, 400, 'AZ003');

-- Bibite della linea light
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (13, 'BreezeLite', 'Light', 'Sparkling', 'Lemon and Lime', 7.99, 35, 'AZ003'),
    (14, 'CrystalClear', 'Light', 'Still', 'Mango', 6.50, 30, 'AZ001'),
    (15, 'SummerSip', 'Light', 'Sparkling', 'Ananas', 8.75, 45, 'AZ004'),
    (16, 'CottonCandySuper', 'Light', 'Sparkling', 'Cotton Sugar', 5.00, 30, 'AZ003');

-- Inserimento delle classi
INSERT INTO Classe (Classe, Aula, NAlunni) VALUES
    ('1AI','A100',25),
    ('2AI','A101',24),
    ('3AI','A102',26),
    ('4AI','A103',18),
    ('5AI','A104',20),
    ('1BI','A105',14),
    ('2BI','A106',12),
    ('3BI','A107',32),
    ('4BI','A108',15),
    ('5BI','A109',45),
    ('1CI','A110',32),
    ('2CI','A111',33),
    ('3CI','A112',12),
    ('4CI','A113',21),
    ('5CI','A114',20),
    ('1DI','A115',25),
    ('2DI','A116',25),
    ('3DI','A117',25),
    ('4DI','A118',24),
    ('5DI','A119',23);

-- Inserimento dei superuser

INSERT INTO Utente (Username, Pswd, Email, Nome, Cognome, Telefono, Classe, Ruolo)
VALUES 
    ('Nicco-Ni', '777', 'niccomarchez@bfdrinks.com', 'Niccolò', 'Marchesini', '7777777777', '5CI', 'superuser'),
    ('Gamberooh', '1234', 'gamberooh@bfdrinks.com', 'Davide', 'Gamberini', '9696966969', '5CI', 'superuser'),
    ('Duolingo', '5678', 'duoling@bfdrinks.com', 'Riccardo', 'Marchesini', '1234567890', '5CI', 'superuser'),
    ('Deme', '9012', 'demeNba@bfdrinks.com', 'Davide', 'Demelas', '0987654321', '5CI', 'superuser');

-- Bibite della linea light
UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with lime flavor.'
WHERE Indice = 1;

UPDATE Prodotto
SET Descrizione = 'A light drink with melon flavour.'
WHERE Indice = 2;

UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with peach flavour.'
WHERE Indice = 3;

UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with lemon flavour.'
WHERE Indice = 7;

UPDATE Prodotto
SET Descrizione = 'A light drink with apple flavour.'
WHERE Indice = 8;

UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with ginger flavour.'
WHERE Indice = 9;

UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with lemon-lime flavour.'
WHERE Indice = 13;

UPDATE Prodotto
SET Descrizione = 'A light drink with mango flavour.'
WHERE Indice = 14;

UPDATE Prodotto
SET Descrizione = 'A light fizzy drink with pineapple flavour.'
WHERE Indice = 15;

-- Bibite della linea strong
UPDATE Prodotto
SET Descrizione = 'A sparkling energy drink with raspberry flavour.'
WHERE Indice = 4;

UPDATE Prodotto
SET Descrizione = 'A strong drink with orange flavour.'
WHERE Indice = 5;

UPDATE Prodotto
SET Descrizione = 'A strong fizzy drink with mango flavour.'
WHERE Indice = 6;

UPDATE Prodotto
SET Descrizione = 'A sparkling energy drink with guarana flavour.'
WHERE Indice = 10;

UPDATE Prodotto
SET Descrizione = 'A strong drink with a berry flavour.'
WHERE Indice = 11;

UPDATE Prodotto
SET Descrizione = 'A strong sparkling drink with cherry flavour.'
WHERE Indice = 12;

UPDATE Prodotto
SET Descrizione = 'Enjoy the sweet, nostalgic flavor of cotton candy combined with a refreshing, fizzy boost in this sparkling energy drink.'
WHERE Indice = 16;

UPDATE utente
SET Pswd = '8cce10345c5e1de90d277b9869465f5972b828afbbbfd7ef08b1d835eedee993'
WHERE Username = 'Deme';

UPDATE utente
SET Pswd = 'f8638b979b2f4f793ddb6dbd197e0ee25a7a6ea32b0ae22f5e3c5d119d839e75'
WHERE Username = 'Duolingo';

UPDATE utente
SET Pswd = '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'
WHERE Username = 'Gamberooh';

UPDATE utente
SET Pswd = 'eaf89db7108470dc3f6b23ea90618264b3e8f8b6145371667c4055e9c5ce9f52'
WHERE Username = 'Nicco-Ni';