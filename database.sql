-- Tabella 'favorites'
CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `favorite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dati di esempio per la tabella 'favorites'
INSERT INTO `favorites` (`id`, `idUser`, `favorite`) VALUES
(122, 111, 14);

-- --------------------------------------------------------

-- Tabella 'users'
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dati di esempio per la tabella 'users'
INSERT INTO `users` (`idUser`, `name`, `lastname`, `nickname`, `email`, `password`, `role`) VALUES
(110, 'Admin', 'Admin', 'Admin', 'admin@email.com', '211021d2b119d78fe0e0d4d29eeff687', 'admin'),
(111, 'User', 'User', 'User', 'user@email.com', '211021d2b119d78fe0e0d4d29eeff687', 'user');

-- --------------------------------------------------------

-- Tabella 'vintage_items'
CREATE TABLE `vintage_items` (
  `idItem` int(11) NOT NULL,
  `nameItem` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `condition` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imgPath` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dati di esempio per la tabella 'vintage_items'
INSERT INTO `vintage_items` (`idItem`, `nameItem`, `description`, `price`, `condition`, `imgPath`, `idUser`) VALUES
(1, 'Orologio da taschino antico', 'Orologio da tasca del XIX secolo, funzionante.', 120.00, 'Buono', '/TecnologieWeb/assets/images/items/orologio_da_taschino_antico.jpg', 110),
(2, 'Radio a valvole', 'Radio vintage degli anni \'50, perfettamente funzionante.', 85.00, 'Eccellente', '/TecnologieWeb/assets/images/items/radio_a_valvole.jpg', 110),
(3, 'Tazza porcellana dipinta', 'Tazza d\'epoca, decorata a mano con motivi.', 15.00, 'Usata', '/TecnologieWeb/assets/images/items/tazza_in_porcellana_dipinta_a_mano.jpg', 110),
(4, 'Vecchia macchina fotografica', 'Macchina fotografica a pellicola degli anni \'70.', 70.00, 'Buono', '/TecnologieWeb/assets/images/items/macchina_fotografica.jpg', 110),
(5, 'Lampada da tavolo retrò', 'Lampada da tavolo in stile retrò, funzionante.', 40.00, 'Usato', '/TecnologieWeb/assets/images/items/lampada_vintage_retro.jpg', 110),
(6, 'Borsa vintage in pelle', 'Borsa in pelle d\'epoca, con dettagli artigianali.', 55.00, 'Buono', '/TecnologieWeb/assets/images/items/borsa_in_pelle_vintage.jpg', 110),
(7, 'Maglietta rock anni \'80', 'Maglietta vintage di una band rock degli anni \'80.', 25.00, 'Usato', '/TecnologieWeb/assets/images/items/maglietta_rock_anni_80.jpg', 110),
(8, 'Vaso ceramica dipinto', 'Vaso decorativo in ceramica dipinta a mano.', 30.00, 'Buono', '/TecnologieWeb/assets/images/items/vaso_in_ceramica_dipinto_a_mano.jpg', 110),
(9, 'Valigia retrò', 'Valigia da viaggio retrò con chiusura a scatto.', 35.00, 'Usato', '/TecnologieWeb/assets/images/items/valigia_retro.jpg', 110),
(10, 'Videocamera vintage', 'Videocamera a nastro degli anni \'90, con borsa.', 50.00, 'Usato', '/TecnologieWeb/assets/images/items/videocamera_vintage.jpg', 110),
(11, 'Radio a transistor', 'Radio a transistor degli anni \'60, ottime condizioni.', 65.00, 'Eccellente', '/TecnologieWeb/assets/images/items/radio_a_transistor.jpg', 110),
(12, 'Orologio parete vintage', 'Orologio da parete a pendolo degli anni \'50.', 90.00, 'Buono', '/TecnologieWeb/assets/images/items/orologio_da_parete_vintage.jpg', 110),
(13, 'Set scrivania retrò', 'Set da scrivania in stile retrò, con penna a sfera.', 28.00, 'Usato', '/TecnologieWeb/assets/images/items/set_scrivania_retro.jpg', 110),
(14, 'Pelliccia sintetica vintage', 'Pelliccia sintetica vintage degli anni \'70, taglia S.', 55.00, 'Buono', '/TecnologieWeb/assets/images/items/pelliccia_sintetica_vintage.jpg', 110),
(15, 'Macchina cucire d\'epoca', 'Macchina da cucire meccanica d\'epoca con tavolo.', 75.00, 'Usato', '/TecnologieWeb/assets/images/items/macchina_da_cucire.jpg', 110),
(16, 'Bicicletta retrò', 'Bicicletta da corsa retrò degli anni \'80, telaio in acciaio.', 120.00, 'Da revisionare', '/TecnologieWeb/assets/images/items/bicicletta_retro.jpg', 110),
(17, 'Valigetta per vinili', 'Valigetta vintage per vinili in pelle marrone.', 40.00, 'Buono', '/TecnologieWeb/assets/images/items/valigetta_per_vinili.jpg', 110),
(18, 'Macchina scrivere portatile', 'Macchina da scrivere portatile degli anni \'50, con custodia.', 60.00, 'Buono', '/TecnologieWeb/assets/images/items/macchina_da_scrivere_portatile.jpg', 110),
(19, 'Fotocamera a box', 'Fotocamera a box degli anni \'30, con obiettivo a menisco.', 45.00, 'Usato', '/TecnologieWeb/assets/images/items/fotocamera_a_box.jpg', 110),
(20, 'Sedia legno intagliato', 'Sedia vintage in legno intagliato a mano, seduta rifoderata.', 50.00, 'Buono', '/TecnologieWeb/assets/images/items/sedia_in_legno_intagliato.jpg', 110);
