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
    (1, 'FizzPop Light', 'Light', 'Frizzante', 'Lime', 9.99, 50, 'AZ001'),
    (2, 'Glow Water', 'Light', 'Liscia', 'Melone', 7.50, 30, 'AZ004'),
    (3, 'Sparkle Splash', 'Light', 'Frizzante', 'Pesca', 8.25, 40, 'AZ003');

-- Bibite della linea strong
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (4, 'Xtreme Energy', 'Strong', 'Frizzante', 'Lampone', 10.00, 300, 'AZ003'),
    (5, 'Turbo Tonic', 'Strong', 'Liscia', 'Arancia', 9.75, 400, 'AZ004'),
    (6, 'Power Punch', 'Strong', 'Frizzante', 'Mango', 9.50, 350, 'AZ001');

-- Bibite della linea light
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (7, 'EcoFizz Light', 'Light', 'Frizzante', 'Limone', 8.50, 40, 'AZ003'),
    (8, 'VitaSpritz', 'Light', 'Liscia', 'Mela', 6.99, 25, 'AZ002'),
    (9, 'ZenZero Zero', 'Light', 'Frizzante', 'Zenzero', 9.25, 20, 'AZ004');

-- Bibite della linea strong
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (10, 'MegaCharge', 'Strong', 'Frizzante', 'Guaranà', 9.50, 450, 'AZ003'),
    (11, 'HyperRush', 'Strong', 'Liscia', 'Frutti di bosco', 8.75, 480, 'AZ001'),
    (12, 'Shockwave', 'Strong', 'Frizzante', 'Ciliegia', 9.99, 400, 'AZ003');

-- Bibite della linea light
INSERT INTO Prodotto (Indice, Nome, Linea, Miscela, Gusto, Prezzo, Calorie, Azienda) VALUES
    (13, 'BreezeLite', 'Light', 'Frizzante', 'Limone e Lime', 7.99, 35, 'AZ003'),
    (14, 'CrystalClear', 'Light', 'Liscia', 'Mango', 6.50, 30, 'AZ001'),
    (15, 'SummerSip', 'Light', 'Frizzante', 'Ananas', 8.75, 45, 'AZ004');
    (16, 'CottonCandySuper', 'Light', 'Frizzante', 'Zucchero filato', 5.00, 30, 'AZ003');

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
SET Descrizione = 'Una bibita frizzante leggera con gusto al lime.'
WHERE Indice = 1;

UPDATE Prodotto
SET Descrizione = 'Una bibita leggera con gusto al melone.'
WHERE Indice = 2;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante leggera con gusto alla pesca.'
WHERE Indice = 3;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante leggera con gusto al limone.'
WHERE Indice = 7;

UPDATE Prodotto
SET Descrizione = 'Una bibita leggera con gusto alla mela.'
WHERE Indice = 8;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante leggera con gusto allo zenzero.'
WHERE Indice = 9;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante leggera con gusto al limone e lime.'
WHERE Indice = 13;

UPDATE Prodotto
SET Descrizione = 'Una bibita leggera con gusto al mango.'
WHERE Indice = 14;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante leggera con gusto all\'ananas.'
WHERE Indice = 15;

-- Bibite della linea strong
UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante energetica con gusto al lampone.'
WHERE Indice = 4;

UPDATE Prodotto
SET Descrizione = 'Una bibita forte con gusto all\'arancia.'
WHERE Indice = 5;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante forte con gusto al mango.'
WHERE Indice = 6;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante energetica con gusto al guaranà.'
WHERE Indice = 10;

UPDATE Prodotto
SET Descrizione = 'Una bibita forte con gusto ai frutti di bosco.'
WHERE Indice = 11;

UPDATE Prodotto
SET Descrizione = 'Una bibita frizzante forte con gusto alla ciliegia.'
WHERE Indice = 12;
