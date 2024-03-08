-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 12:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwa_2022_vz_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `dostava`
--

CREATE TABLE `dostava` (
  `dostava_id` int(11) NOT NULL,
  `dron_id` int(11) DEFAULT NULL,
  `korisnik_id` int(11) NOT NULL,
  `datum_vrijeme_dostave` datetime DEFAULT NULL,
  `datum_vrijeme_zahtjeva` datetime NOT NULL,
  `opis_posiljke` varchar(45) NOT NULL,
  `napomene` varchar(500) DEFAULT NULL,
  `adresa_dostave` varchar(100) NOT NULL,
  `adresa_polazista` varchar(100) NOT NULL,
  `dostavaKM` float NOT NULL,
  `dostavaKG` float NOT NULL,
  `hitnost` tinyint(4) NOT NULL,
  `ukupna_cijena` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dostava`
--

INSERT INTO `dostava` (`dostava_id`, `dron_id`, `korisnik_id`, `datum_vrijeme_dostave`, `datum_vrijeme_zahtjeva`, `opis_posiljke`, `napomene`, `adresa_dostave`, `adresa_polazista`, `dostavaKM`, `dostavaKG`, `hitnost`, `ukupna_cijena`, `status`) VALUES
(1, 15, 3, '2023-04-05 16:06:35', '2023-04-05 16:06:35', 'Mala pošiljka', 'Lomljivo', 'Marulićeva 21, 42000 Varaždin', 'Škrinjina 30, 42000 Varaždin', 2, 0.2, 1, 0.6, 2),
(2, 15, 3, '2023-02-09 10:10:00', '2023-01-09 09:10:00', 'Mala pošiljka', 'Lomljivo', 'Marulićeva 21, 42000 Varaždin', 'Škrinjina 30, 42000 Varaždin', 15, 0.3, 1, 4.5, 2),
(3, 14, 3, '2023-01-10 10:10:00', '2023-01-09 09:10:00', 'Koverta', NULL, 'Marulićeva 21, 42000 Varaždin', 'Vukovarska 30, 42000 Varaždin', 16, 0.2, 0, 4.8, 2),
(4, 13, 3, '2022-01-11 15:10:00', '2023-01-09 09:10:00', 'Paket s narukvicama', NULL, 'Marulićeva 21, 42000 Varaždin', 'Korelijeva 30, 42000 Varaždin', 17, 0.5, 0, 5.1, 2),
(5, 12, 3, '2022-01-12 14:10:00', '2022-01-10 12:10:00', 'Ljekovi', NULL, 'Marulićeva 21, 42000 Varaždin', 'Božićeva 21, 42000 Varaždin', 14, 0.1, 1, 4.2, 2),
(6, 11, 5, '2022-02-09 13:10:00', '2022-02-01 11:10:00', 'Ljekovi', NULL, 'Varaždinska 91, 42000 Varaždin', 'Eugenova 21a, 42000 Varaždin', 20, 0.2, 0, 8, 2),
(7, 1, 6, '2022-02-10 11:10:00', '2022-01-30 11:10:00', 'Oprema', 'Paziti na prijenos', 'Zagrebačka 10, 42000 Varaždin', 'Varaždinska 12, 42000 Varaždin', 23, 0.3, 0, 11.5, 2),
(8, 9, 7, '2022-02-15 22:10:00', '2022-02-20 12:10:00', 'Mali paket', 'Ne treba paziti', 'Stanka Vraza 20, 42000 Varaždin', 'Zagrebačka 31, 42000 Varaždin', 23, 0.5, 0, 9.2, 2),
(9, NULL, 1, '2022-04-10 21:10:00', '2023-08-22 14:44:28', 'Plišanci', 'velika kutija', 'Ognjena Prica 21, 42000 Varaždin', 'Medulićeva 21, 42000 Varaždin', 22, 0.2, 1, 8.8, 2),
(10, NULL, 1, '2022-03-21 21:10:00', '2023-08-31 13:21:09', 'Ne treba paziti na njegas', 'Mali pakettt', 'Marulićeva 21, 42000 Varaždin', 'Zagrebačka 50, 42000 Varaždin', 26, 0.4, 1, 13, 1),
(11, 2, 3, '2022-03-14 21:10:00', '2022-03-10 13:10:00', 'Mekano', 'Velike dimenzije', 'Marulićeva 21, 42000 Varaždin', 'Božićeva 41, 42000 Varaždin', 27, 0.5, 0, 13.5, 2),
(12, 3, 5, '2022-02-10 21:10:00', '2022-02-02 14:10:00', 'Hitno prenijeti ljekove', 'Srednje veličine', 'Varaždinska 91, 42000 Varaždin', 'Šimićeva 12, 42000 Varaždin', 25, 0.1, 0, 12.5, 2),
(13, 6, 6, '2022-05-10 21:10:00', '2022-04-30 15:10:00', 'Ljekovi', NULL, 'Zagrebačka 10, 42000 Varaždin', 'Stančićeva 32, 42000 Varaždin', 27, 0.6, 0, 13.5, 1),
(14, NULL, 1, '2022-04-21 21:10:00', '2023-08-22 14:43:49', 'Narukviceda', '', 'Stanka Vraza 20, 42000 Varaždin', 'Šubarićeva 21, 42000 Varaždin', 22.1, 0.6, 1, 8.84, 2),
(15, NULL, 1, '2022-04-15 21:10:00', '2023-08-22 14:44:47', 'Lomljivo', '', 'Ognjena Prica 21, 42000 Varaždin', 'Škrinjina 30, 42000 Varaždin', 22.2, 0.1, 0, 8.88, 2),
(16, 7, 3, '2022-03-10 21:10:00', '2023-03-09 10:10:00', 'Lomljivo', 'Lomljivo', 'Marulićeva 21, 42000 Varaždin', 'Vukovarska 12, 42000 Varaždin', 21, 0.2, 0, 8.4, 2),
(17, NULL, 3, NULL, '2023-03-10 10:10:00', 'Mala pošiljka', NULL, 'Marulićeva 21, 42000 Varaždin', 'Kranjićeva 21, 42000 Varaždin', 19, 0.2, 1, NULL, 2),
(18, NULL, 3, NULL, '2023-03-11 11:10:00', 'Veća pošiljka', NULL, 'Marulićeva 21, 42000 Varaždin', 'Modrićeva 20, 42000 Varaždin', 23.2, 0.2, 0, NULL, 0),
(19, NULL, 3, NULL, '2022-03-13 12:10:00', 'Začini', NULL, 'Marulićeva 21, 42000 Varaždin', 'Balaševićeva 31, 42000 Varaždin', 17, 0.3, 0, NULL, 0),
(20, NULL, 3, NULL, '2022-02-15 11:10:00', 'Lomljivo', NULL, 'Marulićeva 21, 42000 Varaždin', 'Porećka 12, 42000 Varaždin', 16, 0.4, 0, NULL, 0),
(21, NULL, 5, NULL, '2022-04-01 14:10:00', 'Začini', NULL, 'Varaždinska 91, 42000 Varaždin', 'Zadarska 19, 42000 Varaždin', 2, 0.3, 0, NULL, 0),
(22, NULL, 6, NULL, '2022-04-02 12:10:00', 'Lomljivo', NULL, 'Marulićeva 21, 42000 Varaždin', 'Osiječka 14, 42000 Varaždin', 3, 0.4, 0, NULL, 0),
(23, NULL, 6, NULL, '2022-04-03 11:10:00', 'Ljekovi', NULL, 'Zagrebačka 10, 42000 Varaždin', 'Vukovarska 21, 42000 Varaždin', 5, 0.5, 0, NULL, 0),
(24, NULL, 3, NULL, '2023-08-22 14:41:05', 'adwawd', 'awddaw', 'awddaw', 'adwawd', 2, 2, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dron`
--

CREATE TABLE `dron` (
  `dron_id` int(11) NOT NULL,
  `vrsta_drona_id` int(11) NOT NULL,
  `poveznica_slika` varchar(500) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dron`
--

INSERT INTO `dron` (`dron_id`, `vrsta_drona_id`, `poveznica_slika`, `naziv`) VALUES
(1, 1, 'https://images.unsplash.com/photo-1473968512647-3e447244af8f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZHJvbmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60', ' Dron DJI Ryze Tech Tello Boost Combo mama'),
(2, 1, 'https://images.unsplash.com/photo-1473968512647-3e447244af8f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZHJvbmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60', ' Dron DJI Ryze Tech Tello Boost Combo '),
(3, 1, 'https://images.unsplash.com/photo-1506947411487-a56738267384?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80', 'Dron DJI MAX'),
(4, 1, 'https://images.unsplash.com/photo-1527977966376-1c8408f9f108?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80', 'Dron DJI Professional'),
(5, 1, 'https://images.unsplash.com/photo-1533309907656-7b1c2ee56ddf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=752&q=80', 'Dron VKi Pro'),
(6, 1, 'https://images.unsplash.com/photo-1504890001746-a9a68eda46e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1087&q=80', 'Dron VKi Tech Ryze'),
(7, 2, 'https://images.unsplash.com/photo-1524143986875-3b098d78b363?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8ZHJvbmV8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60', 'Dron VKi Middle'),
(8, 2, 'https://images.unsplash.com/photo-1479152471347-3f2e62a2b2a7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1048&q=80', 'Dron VKi IO4'),
(9, 2, 'https://images.unsplash.com/photo-1532989029401-439615f3d4b4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80', 'Dron VKi IO5'),
(10, 2, 'https://images.unsplash.com/photo-1495764506633-93d4dfed7c6b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80', 'Dron DJK Pro'),
(11, 2, 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80', 'Dron DJK KVS1'),
(12, 3, 'https://images.unsplash.com/photo-1520870121499-7dddb6ccbcde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80', 'Dron DJK KVS2'),
(13, 3, 'https://images.unsplash.com/photo-1521405924368-64c5b84bec60?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80', 'Dron VKi IO4Mid'),
(14, 3, 'https://images.unsplash.com/photo-1514043454212-14c181f46583?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80', 'Dron VKi IO5Mid'),
(15, 3, 'https://images.unsplash.com/photo-1555009306-9e3c5b6a66e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80', 'Dron DJK ProMid'),
(16, 4, 'https://images.unsplash.com/photo-1499708544652-0e4c43899071?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80', 'Dron DJK KVS1 miniPro'),
(17, 4, 'https://images.unsplash.com/photo-1507582020474-9a35b7d455d9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', 'Dron DJK KVS2 miniPro'),
(18, 4, 'https://images.unsplash.com/photo-1488263590619-bc1fff43b6c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80', 'Dron VKi IO5 miniPro'),
(19, 4, 'https://images.unsplash.com/photo-1504890195358-94a018166410?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1178&q=80', 'Dron VKi IO4 miniPro'),
(20, 5, 'https://images.unsplash.com/photo-1514598800938-f7125ea1aa1c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1031&q=80', 'Dron VKi IO5 mini'),
(21, 5, 'https://images.unsplash.com/photo-1504881464977-380fd2f91c51?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80', 'Dron VKi IO4 mini'),
(22, 5, 'https://images.unsplash.com/photo-1514043133987-e4801c95b2c8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=955&q=80', 'Dron DJK KVS1 mini'),
(23, 5, 'https://images.unsplash.com/photo-1491738785019-dd6647a54f24?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80', 'Dron DJK KVS2 mini');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `tip_korisnika_id` int(11) NOT NULL,
  `vrsta_drona_id` int(11) DEFAULT NULL,
  `korime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(100) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `tip_korisnika_id`, `vrsta_drona_id`, `korime`, `email`, `lozinka`, `ime`, `prezime`) VALUES
(1, 0, NULL, 'admin', 'admin@foi.hr', 'foi', 'Administrator', 'Admin'),
(2, 1, 1, 'voditelj', 'voditelj@foi.hr', '123456', 'voditelj', 'Vodi'),
(3, 2, NULL, 'pkos', 'pkos@fff.hr', '123456', 'Pero', 'Kos'),
(4, 1, 2, 'vzec', 'vzec@fff.hr', '123456', 'Vladimir', 'Zec'),
(5, 2, NULL, 'qtarantino', 'qtarantino@foi.hr', '123456', 'Quentin', 'Tarantino'),
(6, 2, NULL, 'mbellucci', 'mbellucci@foi.hr', '123456', 'Monica', 'Bellucci'),
(7, 2, NULL, 'vmortensen', 'vmortensen@foi.hr', '123456', 'Viggo', 'Mortensen'),
(8, 2, NULL, 'jgarner', 'jgarner@foi.hr', '123456', 'Jennifer', 'Garner'),
(9, 2, NULL, 'nportman', 'nportman@foi.hr', '123456', 'Natalie', 'Portman'),
(10, 2, NULL, 'dradcliffe', 'dradcliffe@foi.hr', '123456', 'Daniel', 'Radcliffe'),
(11, 2, NULL, 'hberry', 'hberry@foi.hr', '123456', 'Halle', 'Berry'),
(12, 1, 3, 'vdiesel', 'vdiesel@foi.hr', '123456', 'Vin', 'Diesel'),
(13, 2, NULL, 'ecuthbert', 'ecuthbert@foi.hr', '123456', 'Elisha', 'Cuthbert'),
(14, 1, 4, 'janiston', 'janiston@foi.hr', '123456', 'Jennifer', 'Aniston'),
(15, 2, NULL, 'ctheron', 'ctheron@foi.hr', '123456', 'Charlize', 'Theron'),
(16, 1, 5, 'nkidman', 'nkidman@foi.hr', '123456', 'Nicole', 'Kidman'),
(17, 1, 1, 'ewatson', 'ewatson@foi.hr', '123456', 'Emma', 'Watson'),
(18, 2, NULL, 'kdunst', 'kdunst@foi.hr', '123456', 'Kirsten', 'Dunst'),
(19, 2, NULL, 'sjohansson', 'sjohansson@foi.hr', '123456', 'Scarlett', 'Johansson'),
(20, 2, NULL, 'philton', 'philton@foi.hr', '123456', 'Paris', 'Hilton'),
(21, 2, NULL, 'kbeckinsale', 'kbeckinsale@foi.hr', '123456', 'Kate', 'Beckinsale'),
(22, 2, NULL, 'tcruise', 'tcruise@foi.hr', '123456', 'Tom', 'Cruise'),
(23, 2, NULL, 'hduff', 'hduff@foi.hr', '123456', 'Hilary', 'Duff'),
(24, 2, NULL, 'ajolie', 'ajolie@foi.hr', '123456', 'Angelina', 'Jolie'),
(25, 2, NULL, 'kknightley', 'kknightley@foi.hr', '123456', 'Keira', 'Knightley'),
(26, 2, NULL, 'obloom', 'obloom@foi.hr', '123456', 'Orlando', 'Bloom'),
(27, 2, NULL, 'llohan', 'llohan@foi.hr', '123456', 'Lindsay', 'Lohan'),
(28, 2, NULL, 'jdepp', 'jdepp@foi.hr', '123456', 'Johnny', 'Depp'),
(29, 2, NULL, 'kreeves', 'kreeves@foi.hr', '123456', 'Keanu', 'Reeves'),
(30, 2, NULL, 'thanks', 'thanks@foi.hr', '123456', 'Tom', 'Hanks'),
(31, 2, NULL, 'elongoria', 'elongoria@foi.hr', '123456', 'Eva', 'Longoria'),
(32, 2, NULL, 'rde', 'rde@foi.hr', '123456', 'Robert', 'De'),
(33, 2, NULL, 'jheder', 'jheder@foi.hr', '123456', 'Jon', 'Heder'),
(34, 2, NULL, 'rmcadams', 'rmcadams@foi.hr', '123456', 'Rachel', 'McAdams'),
(35, 2, NULL, 'cbale', 'cbale@foi.hr', '123456', 'Christian', 'Bale'),
(36, 2, NULL, 'jalba', 'jalba@foi.hr', '123456', 'Jessica', 'Alba'),
(37, 2, NULL, 'bpitt', 'bpitt@foi.hr', '123456', 'Brad', 'Pitt'),
(43, 2, NULL, 'apacino', 'apacino@foi.hr', '123456', 'Al', 'Pacino'),
(44, 2, NULL, 'wsmith', 'wsmith@foi.hr', '123456', 'Will', 'Smith'),
(45, 2, NULL, 'ncage', 'ncage@foi.hr', '123456', 'Nicolas', 'Cage'),
(46, 2, NULL, 'vanne', 'vanne@foi.hr', '123456', 'Vanessa', 'Anne'),
(47, 2, NULL, 'kheigl', 'kheigl@foi.hr', '123456', 'Katherine', 'Heigl'),
(48, 2, NULL, 'gbutler', 'gbutler@foi.hr', '123456', 'Gerard', 'Butler'),
(49, 2, NULL, 'jbiel', 'jbiel@foi.hr', '123456', 'Jessica', 'Biel'),
(50, 2, NULL, 'ldicaprio', 'ldicaprio@foi.hr', '123456', 'Leonardo', 'DiCaprio'),
(51, 2, NULL, 'mdamon', 'mdamon@foi.hr', '123456', 'Matt', 'Damon'),
(52, 2, NULL, 'hpanettiere', 'hpanettiere@foi.hr', '123456', 'Hayden', 'Panettiere'),
(53, 2, NULL, 'rreynolds', 'rreynolds@foi.hr', '123456', 'Ryan', 'Reynolds'),
(54, 2, NULL, 'jstatham', 'jstatham@foi.hr', '123456', 'Jason', 'Statham'),
(55, 2, NULL, 'enorton', 'enorton@foi.hr', '123456', 'Edward', 'Norton'),
(56, 2, NULL, 'mwahlberg', 'mwahlberg@foi.hr', '123456', 'Mark', 'Wahlberg'),
(57, 2, NULL, 'jmcavoy', 'jmcavoy@foi.hr', '123456', 'James', 'McAvoy'),
(58, 2, NULL, 'epage', 'epage@foi.hr', '123456', 'Ellen', 'Page'),
(59, 2, NULL, 'mcyrus', 'mcyrus@foi.hr', '123456', 'Miley', 'Cyrus'),
(60, 2, NULL, 'kstewart', 'kstewart@foi.hr', '123456', 'Kristen', 'Stewart'),
(61, 2, NULL, 'mfox', 'mfox@foi.hr', '123456', 'Megan', 'Fox'),
(62, 2, NULL, 'slabeouf', 'slabeouf@foi.hr', '123456', 'Shia', 'LaBeouf'),
(63, 2, NULL, 'ceastwood', 'ceastwood@foi.hr', '123456', 'Clint', 'Eastwood'),
(64, 2, NULL, 'srogen', 'srogen@foi.hr', '123456', 'Seth', 'Rogen'),
(65, 2, NULL, 'nreed', 'nreed@foi.hr', '123456', 'Nikki', 'Reed'),
(66, 2, NULL, 'agreene', 'agreene@foi.hr', '123456', 'Ashley', 'Greene'),
(67, 2, NULL, 'zdeschanel', 'zdeschanel@foi.hr', '123456', 'Zooey', 'Deschanel'),
(68, 2, NULL, 'dfanning', 'dfanning@foi.hr', '123456', 'Dakota', 'Fanning'),
(69, 2, NULL, 'tlautner', 'tlautner@foi.hr', '123456', 'Taylor', 'Lautner'),
(70, 2, NULL, 'rpattinson', 'rpattinson@foi.hr', '123456', 'Robert', 'Pattinson'),
(71, 1, 1, 'matija', 'm@m.m', 'matija', 'matija', 'matija');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_korisnika_id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'admin'),
(1, 'moderator'),
(2, 'obicni');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_drona`
--

CREATE TABLE `vrsta_drona` (
  `vrsta_drona_id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `minKM` float NOT NULL,
  `maxKM` float NOT NULL,
  `cijenaPoKM` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrsta_drona`
--

INSERT INTO `vrsta_drona` (`vrsta_drona_id`, `naziv`, `minKM`, `maxKM`, `cijenaPoKM`) VALUES
(1, 'Veliki dronovi - 1', 25, 35, 0.5),
(2, 'Srednji dronovi - 1', 20, 25, 0.4),
(3, 'Srednji dronovi - 2', 15, 20, 0.3),
(4, 'Manji dronovi - 1', 10, 15, 0.2),
(5, 'Manji dronovi - 2', 0, 10, 0.1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dostava`
--
ALTER TABLE `dostava`
  ADD PRIMARY KEY (`dostava_id`),
  ADD KEY `fk_termini_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_dostava_dron1_idx` (`dron_id`);

--
-- Indexes for table `dron`
--
ALTER TABLE `dron`
  ADD PRIMARY KEY (`dron_id`),
  ADD KEY `fk_dron_vrsta_drona1_idx` (`vrsta_drona_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_id`),
  ADD KEY `fk_korisnik_vrsta_drona1_idx` (`vrsta_drona_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_korisnika_id`);

--
-- Indexes for table `vrsta_drona`
--
ALTER TABLE `vrsta_drona`
  ADD PRIMARY KEY (`vrsta_drona_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dostava`
--
ALTER TABLE `dostava`
  MODIFY `dostava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dron`
--
ALTER TABLE `dron`
  MODIFY `dron_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_korisnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vrsta_drona`
--
ALTER TABLE `vrsta_drona`
  MODIFY `vrsta_drona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dostava`
--
ALTER TABLE `dostava`
  ADD CONSTRAINT `fk_dostava_dron1` FOREIGN KEY (`dron_id`) REFERENCES `dron` (`dron_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_termini_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dron`
--
ALTER TABLE `dron`
  ADD CONSTRAINT `fk_dron_vrsta_drona1` FOREIGN KEY (`vrsta_drona_id`) REFERENCES `vrsta_drona` (`vrsta_drona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`tip_korisnika_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_vrsta_drona1` FOREIGN KEY (`vrsta_drona_id`) REFERENCES `vrsta_drona` (`vrsta_drona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
