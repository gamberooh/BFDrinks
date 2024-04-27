use bfdrinks;

-- Inserimento dei dati per la tabella AZIENDA
INSERT INTO AZIENDA (Id, Nome, NTel, eMail) VALUES 
('COKE01', 'Coca-Cola Company', 1234567890, 'info@cocacola.com'),
('LAV01', 'Lavazza', 9876543210, 'info@lavazza.com'),
('SKIP01', 'Skipper Beverages', 5555555555, 'info@skipperbeverages.com'),
('YOGA01', 'Yoga Drinks', 8888888888, 'info@yogadrinks.com'),
('MENT01', 'Mentos Beverages', 4444444444, 'info@mentos.com');

-- Inserimento dei dati per la tabella PRODOTTO
INSERT INTO PRODOTTO (Indice, Nome, Linea, Miscela, Calorie, Collab) VALUES 
(1, 'EnerLITE Fusion', 'light', 'Frutta Tropicale', 24, 'YOGA01'),
(2, 'ZeroCharge Mint', 'light', 'Limone e Menta', 10, 'MENT01'),
(3, 'PureVibe Spark', 'light', 'Ciliegia', 35, NULL),
(4, 'CalorieCrush Essence', 'light', 'Arancia', 3, 'COKE01'),
(5, 'RefreshZero Burst', 'light', 'Melograno e Frutti di Bosco', 12, 'SKIP01'),
(6, 'PureBurst Revive', 'light', 'Frutta Tropicale e Frutti di Bosco', 35, 'YOGA01'),
(7, 'VitalWave Harmony', 'light', 'Limone e Arancia', 2, 'COKE01'),
(8, 'MegaFuel Surge', 'strong', 'Frutti di Bosco', 450, 'SKIP01'),
(9, 'PowerPunch Intensity', 'strong', 'Frutti di Bosco e Mirtillo', 150, 'SKIP01'),
(10, 'XtremeVital Blitz', 'strong', 'Limone, Arancia e Bergamotto', 95, 'YOGA01'),
(11, 'TurboThirst Revolt', 'strong', 'Cola', 500, 'COKE01'),
(12, 'CoffeePower Surge', 'strong', 'Caffè', 106, 'LAV01'),
(13, 'MegaVortex Fury', 'strong', 'Kiwi e Bergamotto', 230, NULL),
(14, 'ThunderFuel Storm', 'strong', 'Ananas e Frutta Tropicale', 332, NULL);

-- Inserimento dei dati per la tabella CLASSE
INSERT INTO CLASSE (Anno, Sez, Acr, NAlunni, Aula) VALUES 
(5, 'A', 'CLAS', 25, 'A101'),
(4, 'B', 'BCLS', 28, 'B202'),
(3, 'C', 'CCLS', 30, 'C303');

-- Inserimento dei dati per la tabella ORDINE
INSERT INTO ORDINE (Id, qta, data, indProdotto, Anno, Sez, Acr) VALUES 
(1, 50, '2024-04-08 09:00:00', 1, 5, 'A', 'CLAS'),
(2, 30, '2024-04-08 10:00:00', 2, 4, 'B', 'BCLS'),
(3, 40, '2024-04-08 11:00:00', 3, 3, 'C', 'CCLS'),
(4, 20, '2024-04-08 12:00:00', 4, 5, 'A', 'CLAS'),
(5, 35, '2024-04-08 13:00:00', 5, 4, 'B', 'BCLS'),
(6, 45, '2024-04-08 14:00:00', 6, 3, 'C', 'CCLS'),
(7, 55, '2024-04-08 15:00:00', 7, 5, 'A', 'CLAS'),
(8, 60, '2024-04-08 16:00:00', 8, 4, 'B', 'BCLS'),
(9, 70, '2024-04-08 17:00:00', 9, 3, 'C', 'CCLS'),
(10, 80, '2024-04-08 18:00:00', 10, 5, 'A', 'CLAS'),
(11, 90, '2024-04-08 19:00:00', 11, 4, 'B', 'BCLS'),
(12, 100, '2024-04-08 20:00:00', 12, 3, 'C', 'CCLS'),
(13, 110, '2024-04-08 21:00:00', 13, 5, 'A', 'CLAS'),
(14, 120, '2024-04-08 22:00:00', 14, 4, 'B', 'BCLS');
