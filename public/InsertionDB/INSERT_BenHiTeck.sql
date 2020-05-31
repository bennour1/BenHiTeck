use benhiteck;

SET FOREIGN_KEY_CHECKS = 0;

-- Contenu de la table pays
truncate table pays;
INSERT INTO pays (code_pays, nom_pays) VALUES
('033', 'France'),	('034', 'Espagne'),	('035', 'Angleterre'),	('039', 'Italie');


-- Contenu de la table villes
truncate table ville;
INSERT INTO ville (`cp`, `nom_ville`, `pays_id`) VALUES
('13000', 'Marseille', '033'),	('24200', 'Sarlat', '033'),		('24300', 'Carsac', '033'),		('24400', 'Aillac', '033'),		
('59000', 'Lille', '033'),		('69000', 'LION', '033'),		('75011', 'Paris 11', '033'),	('75012', 'Paris 12', '033'),
('75019', 'Paris XIX', '033'),	('78000', 'Versailles', '033'),	('94100', 'Vincennes', '033'),	('94200', 'St Mandé', '033'),
('99391', 'ROME', '039'),		('99392', 'MILAN', '039');

-- Contenu de la table utilisateurs
truncate table utilisateur;
INSERT INTO utilisateur (id, nom_utilisateur, prenom_utilisateur, adresse, date_de_naissance, ville_id, telephone, email, mot_de_passe, date_ajout, activation_compte) VALUES
(1, 'Buguet', 'Pascal', '18 Square Jean Lurçat', '1955-10-03', '1', '0601370000', 'af@free.fr', '123', CURDATE(), 'OUI'),
(2, 'Buguet', 'MJ', '18 Square Jean Lurçat', '1948-08-22', '2', '0700000031', '2@free.fr', '123', CURDATE(), 'OUI'),
(3, 'Fassiola', 'Annabelle', '18 Square Jean Lurçat', '1985-05-10', '3', '0700000031', '3@free.fr', '123A', CURDATE(), 'OUI'),
(4, 'Roux', 'Françoise', '18 Square Jean Lurçat', '1950-10-10', '4', '0901370031', '4@free.fr', '123E', CURDATE(), 'OUI'),
(5, 'Tintin', 'Albert', '18 Square Jean Lurçat', '1950-10-10', '5', '010000031', '5@free.fr', '123R', CURDATE(), 'OUI'),
(6, 'Sordi', 'Alberto', '18 Square Jean Lurçat', '1950-10-10', '6', '010000031', '6@free.fr', '123F', CURDATE(), 'OUI'),
(7, 'Muti', 'Ornella', '18 Square Jean Lurçat', '1950-10-10', '7', '010000031', '7@free.fr', '123F', CURDATE(), 'OUI'),
(8, 'Milou', 'Le chien', '18 Square Jean Lurçat', '1950-10-10', '8', '0101370031', '8@free.fr', '123S', CURDATE(), 'OUI'),
(9, 'Tournesol', 'Bruno', '18 Square Jean Lurçat', '1950-10-10', '9', '0700000031', '9@free.fr', '123Q', CURDATE(), 'OUI'),
(10, 'Roberts', 'Julia', '18 Square Jean Lurçat', '1965-10-03', '10', '0700000031', '10@free.fr', '1234D', CURDATE(), 'OUI'),
(11, 'CHAHIDI', 'Omar', '18 Square Jean Lurçat', '1984-04-14', '11', '0601370031', 'oci@gmail.com', '123', CURDATE(), 'OUI');
  

-- Contenu de la table commandes
truncate table commande;
INSERT INTO commande (id, date_commande, utilisateur_id) VALUES
(1, '2005-10-03', 1),	(2, '2005-10-10', 2),	(3, '2005-11-01', 1),	(4, '2000-11-01', 1),	(5, '2000-12-10', 2),
(6, CURDATE(), 1),		(7, CURDATE(), 2),		(8, CURDATE(), 5),		(9, CURDATE(), 4),		(10, CURDATE(), 11); 


-- Contenu de la table factures
truncate table facture;
INSERT INTO facture (date_facture, commande_id) VALUES
('2005-10-03', 1),	('2005-10-10', 2),	('2005-11-01', 3),	('2000-11-01', 4),	('2000-12-10', 5),
(CURDATE(), 6),		(CURDATE(), 7),		(CURDATE(), 8),		(CURDATE(), 9),		(CURDATE(), 10); 


-- Contenu de la table bons_de_livraison
truncate table bon_de_livraison;
INSERT INTO bon_de_livraison (date_livraison, commande_id) VALUES
('2005-10-03', 1),	('2005-10-10', 2),	('2005-11-01', 3),	('2000-11-01', 4),	('2000-12-10', 5),
(CURDATE(), 6),		(CURDATE(), 7),		(CURDATE(), 8),		(CURDATE(), 9),		(CURDATE(), 10);


-- Contenu de la table categorie
truncate table categorie;
insert into categorie (id, nom_categorie) VALUES	(1, 'Ordinateurs'),	(2, 'Smartphones'),	(3, 'Tablettes'),	(4, 'Montres connectées'),	(5, 'Accessoires');


-- Contenu de la table marque
truncate table marque;
insert into marque (id, nom_marque, logo) VALUES
(1, 'SAMSUNG', 'SAMSUNG.png'),	
(2, 'HUAWEI', 'HUAWEI.png'),	
(3, 'DELL', 'DELL.png'),	
(4, 'ASUS', 'ASUS.png'),	
(5, 'PHILIPS', 'PHILIPS.png'),	
(6, 'SONY', 'SONY.png'), 
(7, 'MSI', 'MSI.png') , 
(8, 'APPLE', 'APPLE.png'),
(9, 'HP', 'HP.png');

-- Contenu de la table produit
truncate table produit;
insert into produit (id, nom_produit, marque_id, categorie_id, description, mot_recherche) VALUES
-- Ordinateurs
(1, 'ZenBook Pro Duo', 4, 1, 'Asus ZenBook Pro Duo', 'Ordinateur Asus'),	
(2, 'Pavilion Gaming', 9, 1, 'HP Pavilion Gaming', 'Ordinateur hp'),
(3, 'GP72M 7REX Leopard Pro', 7, 1, 'GP72M 7REX Leopard Pro', 'Ordinateurs MSI'),	
(4, 'MacBook Air', 8, 1, 'CHAUSSURE NMD R1', 'Ordinateur APPLE'),
-- Smartphones	
(5, 'iPhone 11 Pro Max', 8, 2, 'iPhone 11 Pro Max', 'Smartphone'),
(6, 'Galaxy Note 10', 1, 2, 'Galaxy Note 10', 'Smartphone SAMSUNG'),
(7, 'Huawei P30 Pro', 2, 2, 'Huawei P30 Pro', 'Smartphone HUAWEI'),	
(8, 'Galaxy S20+', 1, 2, 'Galaxy S20+', 'Smartphone SAMSUNG'),
-- Tablettes
(9, 'Galaxy Tab S6', 1, 3, 'Galaxy Tab S6', 'Tablette Samsung'),	
(10, 'iPad Pro', 8, 3, 'iPad Pro', 'Tablette Apple'),	
(11, 'MediaPad M5 lite', 2, 3, 'MediaPad M5 lite', 'Tablette HUAWEI'),
-- Montres connectées
(12, 'Watch 2 Sport', 2, 4, 'Watch 2 Sport', 'Montre Huawei'),
(13, 'Galaxy Montre SM-R800NZSADBT', 1, 4, 'Galaxy Montre SM-R800NZSADBT', 'Montre Samsung'),	
(14, 'Watch Series 5', 8, 4, 'Watch Series 5', 'Montre Apple'),
-- Accessoires
(15, 'AirPods', 8, 5, 'AirPods', 'Accessoire Apple'),	
(16, 'Chargeur Rapide Type C', 1, 5, 'Chargeur Rapide Type C', 'Accessoire Samsung'),	
(17, 'WH-CH510 Casque Sans Fil Bluetooth avec micro intégré et appels mains libres', 6, 5, 'WH-CH510 Casque Sans Fil Bluetooth avec micro intégré et appels mains libres', 'Accessoire SONY')
;

-- Contenu de la table image
truncate table image;
insert into image (id, nom_image, master, produit_id) VALUES
-- Ordinateurs
(1, 'ZenBook_Pro_Duo.jpg', 1, 1),	
(2, 'ZenBook_Pro_Duo_2.jpg', 0, 1),	
(3, 'ZenBook_Pro_Duo_3.jpg', 0, 1),	
	
(4, 'Pavilion_Gaming.jpg', 1, 2),	
(5, 'Pavilion_Gaming_2.jpg', 0, 2),	
(6, 'Pavilion_Gaming_3.jpg', 0, 2),

(7, 'GP72M_REX_Leopard_Pro.jpg', 1, 3),	
(8, 'GP72M_REX_Leopard_Pro_2.jpg', 0, 3),	
(9, 'GP72M_REX_Leopard_Pro_3.jpg', 0, 3),

(10, 'MacBook_Air.jpg', 1, 4),	
(11, 'MacBook_Air_2.jpg', 0, 4),	
(12, 'MacBook_Air_3.jpg', 0, 4),	
(13, 'MacBook_Air_4.jpg', 0, 4),
		
--  Smartphones	
(14, 'iPhone_11_Pro_Max_1.jpg', 1, 5),
(15, 'iPhone_11_Pro_Max_2.jpg', 0, 5),
(16, 'iPhone_11_Pro_Max_3.jpg', 0, 5),

(17, 'Galaxy_Note_10_1.jpg', 1, 6),
(18, 'Galaxy_Note_10_2.jpg', 0, 6),
(19, 'Galaxy_Note_10_3.jpg', 0, 6),

(20, 'Huawei_P30_Pro_1.jpg', 1, 7),
(21, 'Huawei_P30_Pro_2.jpg', 0, 7),
(22, 'Huawei_P30_Pro_3.jpg', 0, 7),

(23, 'Galaxy_S20_1.jpg', 1, 8),	
(24, 'Galaxy_S20_2.jpg', 0, 8),	
(25, 'Galaxy_S20_3.jpg', 0, 8),	
(26, 'Galaxy_S20_4.jpg', 0, 8),
	
-- Tablettes  
(27, 'Galaxy_Tab_S6_1.jpg', 1, 9),
(28, 'Galaxy_Tab_S6_2.jpg', 0, 9),

(29, 'iPad_Pro_1.jpg', 1, 10),	
(30, 'iPad_Pro_2.jpg', 0, 10),
	
(31, 'MediaPad_M5_lite_1.jpg', 1, 11),	
(32, 'MediaPad_M5_lite_2.jpg', 0, 11),	

-- Montres connectées
(33, 'Watch_2_Sport_1.jpg', 1, 12),
(34, 'Watch_2_Sport_2.jpg', 0, 12),

(35, 'Galaxy_Montre_SM-R800NZSADB_1.jpg', 1, 13),
(36, 'Galaxy_Montre_SM-R800NZSADB_2.jpg', 0, 13),
(37, 'Galaxy_Montre_SM-R800NZSADB_3.jpg', 0, 13),

(38, 'Watch_Series_5_1.jpg', 1, 14),
(39, 'Watch_Series_5_2.jpg', 0, 14),
(40, 'Watch_Series_5_3.jpg', 0, 14),

-- Accessoires
(41, 'AirPods_1.jpg', 1, 15),
(42, 'AirPods_2.jpg', 0, 15),

(43, 'Casque_Sans_Fil_Bluetooth_avec_micro_intégré_et_appels_mains_libres_1.jpg', 1, 17),
(44, 'Casque_Sans_Fil_Bluetooth_avec_micro_intégré_et_appels_mains_libres_2.jpg', 0, 17),
(45, 'Casque_Sans_Fil_Bluetooth_avec_micro_intégré_et_appels_mains_libres_3.jpg', 0, 17),
(46, 'Casque_Sans_Fil_Bluetooth_avec_micro_intégré_et_appels_mains_libres_4.jpg', 0, 17),

(47, 'Chargeur_Rapide_Type_C_1.jpg',  1, 16),
(48, 'Chargeur_Rapide_Type_C_2.jpg',  0, 16),
(49, 'Chargeur_Rapide_Type_C_3.jpg',  0, 16)
;



-- Contenu de la table variante
truncate table variante;
insert into variante (produit_id, core, espace_disque, couleur, qte_stoque, memoire, prix, master, remise) VALUES
-- 1 Ordinateurs
(1, 'i5', '512 Go', 'NOIRE', 100, '10 Go', 300, 1, 10),	(1, 'i5', '512 Go', 'BLANC', 50, '30 Go', 400, 0, 20),

(2, 'i5', '512 Go', 'NOIRE', 20, '10 Go', 235, 1, 10),	(2, 'i5', '512 Go', 'NOIRE', 20, '20 Go', 800, 0, 20),	(2, 'i7', '512 Go', 'NOIRE', 30, '110 Go', 900, 0, 30),	
(3, 'i5', '512 Go', 'NOIRE', 30, '110 Go', 767, 1, 10),	
(4, 'i7', '512 Go', 'BLEU', 40, '120 Go', 532, 1, 10),	

-- 2 Smartphones	
(5, null, '256 Go', 'NOIRE', 50, '90 Go', 123, 1, 10),		(5, null, '256 Go', 'BLEU', 50, '30 Go', 556, 0, 20),
(6, null, '128 Go', 'NOIRE',  60, '90 Go', 643, 1, 10),		(6, null, '512 Go', 'NOIRE', 30, '10 Go', 754, 0, 20),
(7, null, '512 Go', 'NOIRE', 70, '60 Go', 980, 1, 10),		(7, null, '512 Go', 'BLANC', 70, '50 Go', 765, 0, 20),
(8, null, '512 Go', 'NOIRE', 80, '70 Go', 654, 1, 10),		(8, null, '128 Go', 'ROSE', 30, '80 Go', 654, 0, 20),

-- 3 Tablettes
(9, null, '16 Go', 'NOIRE', 30, '10 Go', 432, 1, 10),	(9, null, '32 Go', 'NOIRE', 40, '20 Go', 643, 0, 20),	(9, null, '64 Go', 'NOIRE', 60, '40 Go', 987, 0, 20),		
(10, null, '16 Go', 'NOIRE', 20, '70 Go', 654, 1, 10),	(10, null, '16 Go', 'GRIS', 20, '80 Go', 432, 0, 20),
(11, null, '32 Go', 'BLEU', 20, '100 Go', 1032, 1, 30),


-- 4 Montres connectées
(12, null, null, 'BLANC', 20, NULL, 654, 1, 10), 	(12, null, null, 'NOIRE', 20, NULL, 654, 0, 10),
(13, null, null, 'NOIRE', 20, NULL, 654, 1, 10),	(13, null, NULL, 'GOLD', 20, NULL, 6456, 0, 20),	(13, null, NULL, 'ARGENT', 20, NULL, 765, 0, 20),	
(14, null, NULL, 'NOIRE', 20, NULL, 876, 1, 10),

-- 5 Accessoires
(15, null, null, 'NOIRE', 20, NULL, 765, 1, 10),	(15, null, null, 'BLANC', 20, NULL, 432, 0, 20),		(15, null, null, 'GRIS', 20, NULL, 321, 0, 20),	
(16, null, null, 'NOIRE', 20, NULL, 765, 1, 10),		(16, null, null, 'BLANC', 20, NULL, 765, 0, 20),	
(17, null, null, 'NOIRE', 20, NULL, 645, 1, 10)
;

-- Contenu de la table ligne_de_commande
truncate table ligne_de_commande;
INSERT INTO ligne_de_commande (commande_id, variante_id, prix_unitaire, quantite_commande) VALUES
(1, 1, 90.5, 2),	(1, 2, 35.5, 3),
(2, 3, 200.5, 2),	
(3, 4, 45.59, 1),	(3, 5, 100, 2),	(3, 6, 30.99, 1),
(4, 7, 150.80, 2),
(5, 8, 20.5, 1),
(6, 9, 100.30, 1),	(6, 10, 20.30, 1),	(6, 11, 10.50, 1),	(6, 12, 100.77, 1),
(7, 13, 60.66, 1),
(8, 14, 200.50, 1),
(9, 15, 100.30, 1),
(10, 16, 100.30, 1),	(10, 17, 80.80, 2),	(10, 18, 100.67, 2)
;

SET FOREIGN_KEY_CHECKS = 1;
