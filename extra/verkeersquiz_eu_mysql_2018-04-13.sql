-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: verkeersquiz.eu.mysql:3306
-- Generation Time: Apr 13, 2018 at 01:30 PM
-- Server version: 10.1.30-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `verkeersquiz_eu`
--
CREATE DATABASE `verkeersquiz_eu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `verkeersquiz_eu`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `questionId` int(11) NOT NULL,
  `correct` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Question_idx` (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=393 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `questionId`, `correct`) VALUES
(85, 'Mag je op straat spelen.', 108, b'0'),
(86, 'Mogen er geen zebrapaden gemarkeerd worden.', 108, b'0'),
(87, 'Gratis hamburgers.', 109, b'0'),
(88, 'Dit duidt de voorrang aan bij het eerstvolgende kruispunt.', 109, b'1'),
(93, 'Naar links, naar rechts en opnieuw naar links.', 111, b'1'),
(94, 'Recht voor je uit.', 111, b'0'),
(95, 'Mag een fietser niet sneller dan 30 rijden.', 108, b'1'),
(97, 'Op deze weg moet je voorrang geven.', 109, b'0'),
(98, 'Naar rechts, naar links en opnieuw naar rechts.', 111, b'0'),
(99, 'Fietsers', 112, b'0'),
(100, 'Fietsers +Bromfietsers A (geel 	plaatje)', 112, b'0'),
(101, 'Fietsers + Bromfietsers A + bromfietsers B', 112, b'1'),
(102, 'Je in de straat woont.', 113, b'0'),
(103, 'Je in de straat woont of een bezoek aflegt.', 113, b'0'),
(104, 'Je mag dit bord nooit voorbij fietsen.', 113, b'1'),
(105, 'Een deel van de openbare weg dat door fietsers en voetgangers door elkaar mag gebruikt worden.', 114, b'0'),
(106, 'Een deel van de openbare weg 	voorbehouden voor, van elkaar 	gescheiden verkeer van fietsers en voetgangers.', 114, b'1'),
(107, 'Een openbare weg enkel bestemd voor fietsers en voetgangers.', 114, b'0'),
(108, 'Een woonerf.', 115, b'1'),
(109, 'Een speelstraat.', 115, b'0'),
(110, 'Een weg enkel voor auto’s 	van bewoners, voetgangers en fietsers en je mag er op straat spelen.', 115, b'0'),
(112, 'Je hebt voorrang op je tegenligger.', 116, b'1'),
(113, 'Je moet je tegenligger voorrang geven.', 116, b'0'),
(114, 'De persoon die eerst door rijdt heeft voorrang.', 116, b'0'),
(117, '25 en 30 meter', 117, b'1'),
(118, '40 en 50 meter', 117, b'0'),
(119, 'Dat je op het volgende kruispunt ook voorrang moet verlenen aan fietsverkeer dat van links komt.', 118, b'0'),
(120, 'Dat je op het volgende kruispunt enkel naar rechts mag afslaan en dat je daarbij voorrang moet verlenen.', 118, b'0'),
(121, 'Je mag het oranje en het rode verkeerslicht voorbijfietsen om naar rechts te gaan.', 118, b'1'),
(122, 'Links in de rijrichting.', 119, b'0'),
(123, 'Rechts in de rijrichting.', 119, b'1'),
(124, 'Links of rechts in de rijrichting. ', 119, b'0'),
(125, 'Je bent niet verplicht om het fietspad te volgen.', 120, b'1'),
(126, 'Je bent niet verplicht om het fietspad te volgen, maar jullie moeten vergezeld zijn van 2 wegkapiteins.', 120, b'0'),
(127, 'Je bent niet verplicht om het fietspad te volgen, maar jullie moeten vergezeld zijn van 2 wegkapiteins en een begeleidende auto met verkeersbord.', 120, b'0'),
(128, 'Een fietser en een bromfietser naast elkaar rijden.', 121, b'0'),
(129, 'Fietsers naast elkaar rijden.', 121, b'0'),
(130, 'Fietsers naast elkaar rijden zolang tegenstanders nog kunnen kruisen.', 121, b'1'),
(132, 'Alle bestuurders moeten stoppen of het kruispunt vrijmaken.', 122, b'0'),
(133, 'Alle weggebruikers moeten stoppen of het kruispunt vrijmaken.', 122, b'1'),
(134, 'Alle bestuurders  moeten stoppen.', 122, b'0'),
(135, 'Je hebt nu voorrang.', 123, b'0'),
(136, 'Je hebt geen voorrang.', 123, b'1'),
(137, 'Je hebt enkel voorrang als de bestuurder je een teken geeft dat hij je voorlaat.', 123, b'0'),
(138, '100 centimeter breedte innemen.', 124, b'1'),
(139, 'Aan weerszijden maximaal 50 cm uitsteken.', 124, b'0'),
(140, '120 centimeter breedte innemen.', 124, b'0'),
(141, 'Je mag op dat fietspad rijden.', 125, b'0'),
(142, 'Je moet op dat fietspad rijden.', 125, b'0'),
(143, 'Je moet rechts op de weg rijden.', 125, b'1'),
(144, 'Je mag hier nooit oversteken.', 126, b'0'),
(145, 'Je moet hier eerst naar de linkerzijde van de rijstrook fietsen en dan oversteken.', 126, b'0'),
(146, 'Je moet hier afstappen en dan oversteken.', 126, b'1'),
(147, 'Op de begaanbare grasberm of op het fietspad.', 127, b'1'),
(148, 'Op het fietspad.', 127, b'0'),
(149, 'Op de rijbaan.', 127, b'0'),
(150, 'Vierwielers.', 128, b'0'),
(151, 'Voertuigen voor langzaam verkeer.', 128, b'0'),
(152, 'Voortbewegingstoestellen.', 128, b'1'),
(153, '12 jaar', 129, b'0'),
(154, '14 jaar ', 129, b'1'),
(155, '16 jaar', 129, b'0'),
(159, 'Als het op minder dan 30 meter ligt.', 131, b'1'),
(160, 'Als het op minder dan 50 meter ligt.', 131, b'0'),
(161, 'Als het op minder dan 100 meter ligt.', 131, b'0'),
(162, 'Enkel tweewielig zijn.', 132, b'0'),
(163, 'Enkel tweewielig of vierwielig zijn.', 132, b'0'),
(164, 'Driewielig zijn.', 132, b'1'),
(165, 'Voorrang op het verkeer.', 133, b'0'),
(166, 'Voorrang op het verkeer als er oogcontact is met de bestuurder.', 133, b'0'),
(167, 'Geen voorrang op het verkeer.', 133, b'1'),
(168, 'Personenwagens', 134, b'1'),
(169, 'Peugeot', 134, b'0'),
(170, 'Personeel', 134, b'0'),
(171, '50 meter', 135, b'0'),
(172, '75 meter', 135, b'0'),
(173, '100 meter', 135, b'1'),
(174, '6', 136, b'0'),
(175, '9', 136, b'1'),
(176, '12', 136, b'0'),
(177, 'Op straat spelen.', 138, b'0'),
(178, 'Mag je op straat spelen maar moet je auto’s en fietsers doorlaten.', 138, b'1'),
(179, 'Mag je op straat spelen en moet je auto’s en fietsers niet doorlaten.', 138, b'0'),
(180, 'Neen, nooit.', 139, b'0'),
(181, 'Ja, als je jonger dan 9 jaar bent en de wielen van je fiets niet hoger zijn dan 50 cm.', 139, b'1'),
(182, 'Ja, als het te druk is op de straat.', 139, b'0'),
(184, 'Mag je op straat spelen.', 140, b'0'),
(185, 'Alleen op straat spelen als er geen auto’s rijden.', 140, b'0'),
(186, 'Mag je niet op straat spelen.', 140, b'1'),
(187, 'Zijn linkerarm altijd uitsteken.', 141, b'0'),
(188, 'Zijn arm niet uitsteken.', 141, b'0'),
(189, 'Zijn linkerarm uitsteken behalve als dat niet mogelijk is.', 141, b'1'),
(190, 'Verplicht rechtdoor rijden.', 142, b'1'),
(191, 'Weg met éénrichtingsverkeer.', 142, b'0'),
(192, 'Voorrangsweg.', 142, b'0'),
(193, 'Een kruispunt met voorrang van rechts.', 143, b'1'),
(194, 'Een overweg zonder slagbomen.', 143, b'0'),
(195, 'Opgelet: de weg is onderbroken.', 143, b'0'),
(196, 'Ik mag enkel naar rechts.', 144, b'0'),
(197, 'Ik mag enkel naar links.', 144, b'0'),
(198, 'Ik mag zowel naar rechts als naar links.', 144, b'1'),
(202, '9 en 12 meter', 117, b'0'),
(203, 'Je nadert een station.', 146, b'0'),
(204, 'Je nadert een overweg zonder slagbomen.', 146, b'1'),
(205, 'Je nadert een overweg met slagbomen.', 146, b'0'),
(206, 'Verbod voor fietsers om voetgangers in te halen.', 147, b'0'),
(207, 'Woonerf.', 147, b'0'),
(208, 'Deel van de weg alleen bestemd voor fietsers en voetgangers.', 147, b'1'),
(209, 'Ik heb als fietser voorrang op de tegenliggers.', 148, b'0'),
(210, 'Eénrichtingsstraat behalve voor fietsers en bromfietsers A.', 148, b'1'),
(211, 'Straat met overstekende fietsers en bromfietsers A.', 148, b'0'),
(215, 'Een bagagedrager.', 150, b'0'),
(216, 'Een antidiefstalslot. ', 150, b'0'),
(217, 'Twee goedwerkende remmen.', 150, b'1'),
(219, '3', 151, b'1'),
(220, '4', 151, b'0'),
(221, '5', 151, b'0'),
(222, 'Je nooit door hem laten voortslepen.', 152, b'1'),
(223, 'Je door hem laten voortslepen op het fietspad.', 152, b'0'),
(224, 'Je door hem laten voortslepen als je fiets defect is.', 152, b'0'),
(225, 'Voor alle weggebruikers.', 154, b'1'),
(226, 'Enkel voor fietsers en automobilisten.', 154, b'0'),
(227, 'Enkel voor bestuurders van motorvoertuigen.', 154, b'0'),
(228, 'Op het kruispunt mag jij voorgaan op de bestuurders die van links of van rechts komen.', 155, b'1'),
(229, 'Op het kruispunt moet jij voorrang geven aan de andere bestuurders.', 155, b'0'),
(230, 'Dit is het begin van een voorrangsweg.', 156, b'0'),
(231, 'Je nadert het einde van de voorrangsweg', 156, b'1'),
(233, 'Op dit kruispunt moet je voorrang geven aan alle bestuurders die van rechts komen.', 157, b'1'),
(234, 'Op dit kruispunt moet je voorrang geven aan iedereen.', 157, b'0'),
(235, 'Geef op dit kruispunt voorrang aan rijders van links en van recht.', 158, b'1'),
(236, 'Op dit kruispunt mag jij voorgaan.', 158, b'0'),
(237, 'Altijd.', 159, b'0'),
(238, 'Nooit.', 159, b'1'),
(239, 'Een oranje licht.', 160, b'0'),
(240, 'Een rood licht.', 160, b'0'),
(241, 'Een rood licht.', 161, b'1'),
(242, 'Een wit licht.', 161, b'0'),
(245, 'Dicht bij de boordsteen.', 163, b'0'),
(246, 'Aan de kant van de huizen.', 163, b'1'),
(248, 'Het regent pijpenstelen.', 164, b'1'),
(249, 'Het vriest hard overdag.', 164, b'0'),
(250, 'De zon schijnt.', 164, b'0'),
(251, 'Ik mag fietsen op straat.', 165, b'0'),
(252, 'Ik moet fietsen op het fietspad-gedeelte.', 165, b'1'),
(253, 'Fietssuggestiestrook.', 166, b'0'),
(254, 'Verplicht fietspad.', 166, b'1'),
(257, 'De verkeersborden gaan voor op de verkeerslichten', 167, b'0'),
(259, 'De verkeerslichten.', 169, b'0'),
(260, 'De agent.', 169, b'1'),
(261, 'Je moet doen wat je zelf denkt dat goed is.', 169, b'0'),
(262, 'Rond met een rode rand.', 170, b'0'),
(263, 'Driehoekig met een rode rand.', 170, b'1'),
(264, 'Rechthoekig en blauw.', 170, b'0'),
(265, 'Hier mag je alleen door als je 70 jaar of ouder bent.', 171, b'0'),
(266, 'Hier mag je maximaal 70 kilometer per uur rijden.', 171, b'1'),
(267, 'Hier moet je minimaal 70 kilometer per uur rijden.', 171, b'0'),
(268, 'Krokodillentanden.', 172, b'0'),
(269, 'Tijgertanden.', 172, b'0'),
(270, 'Haaientanden.', 172, b'1'),
(271, 'In deze straat mag je de letter ''T'' niet uitspreken.', 173, b'0'),
(272, 'Deze straat loopt dood.', 173, b'1'),
(273, 'Deze straat heeft een rood muurtje aan het eind.', 173, b'0'),
(274, 'Tandem.', 174, b'1'),
(276, 'Snorfiets.', 174, b'0'),
(277, 'Omafiets.', 174, b'0'),
(278, 'Ik wacht tot de agent teken doet dat ik mag afslaan.', 175, b'0'),
(279, 'Ik rij de agent rechts voorbij en sla links af.', 175, b'1'),
(280, ' Ik stop en wacht tot het verkeerslicht groen is.', 175, b'0'),
(281, 'Overal.', 176, b'0'),
(282, 'Enkel aan het zebrapad.', 176, b'1'),
(283, 'Nergens.', 176, b'0'),
(285, 'Aan het volgende kruispunt heb je voorrang op verkeer dat van rechts komt.', 177, b'1'),
(286, 'Aan het volgende kruispunt heeft verkeer dat van rechts komt voorrang.', 177, b'0'),
(287, 'Je hebt op deze weg altijd voorrang.', 177, b'0'),
(291, 'Aan het kruispunt heb je voorrang op het andere verkeer.', 179, b'0'),
(292, 'Je moet voorrang verlenen aan het andere verkeer en indien nodig stoppen.', 179, b'1'),
(293, 'Aan het kruispunt is er voorrang van rechts.', 179, b'0'),
(294, 'Je rijdt nog snel door voor de slagbomen naar beneden gaan.', 180, b'0'),
(295, 'Je stopt en wacht tot de lichten op wit staat en de bel stopt.', 180, b'1'),
(296, 'Je kijkt links en rechts om te zien of er een trein aan komt en steekt snel over.', 180, b'0'),
(297, 'Je rijdt de auto langs links voorbij en houdt 1 meter afstand.', 181, b'1'),
(298, 'Je rijdt de auto langs rechts voorbij over het voetpad.', 181, b'0'),
(299, 'Je rijdt de auto langs links voorbij, maar je blijft zo dicht mogelijk bij de auto.', 181, b'0'),
(300, 'Je rijdt er snel voorbij.', 182, b'0'),
(301, 'Je vertraagt, je houdt de auto in het oog en rijdt hem voorbij over het fietspad.', 182, b'1'),
(302, 'Je wijkt uit naar de rijbaan.', 182, b'0'),
(306, 'De fietser heeft voorrang op het fietspad.', 184, b'1'),
(307, 'De voetganger heeft voorrang.', 184, b'0'),
(308, 'De voetganger heeft altijd voorrang.', 184, b'0'),
(309, 'Neen.', 185, b'0'),
(310, 'Ja, maar je moet het verkeer kunnen horen.', 185, b'1'),
(311, 'Ja, maar alleen op een vrijliggend fietspad.', 185, b'0'),
(312, 'Je gaat achter elkaar fietsen.', 186, b'1'),
(313, 'Je blijft naast elkaar fietsen. De auto maakt wel plaats.', 186, b'0'),
(314, 'Je fietst door over het voetpad.', 186, b'0'),
(315, 'Ja.', 187, b'0'),
(316, 'nee.', 187, b'1'),
(317, 'ja, maar enkel op een vrijliggend fietspad.', 187, b'0'),
(318, 'Ja.', 188, b'0'),
(319, 'Neen.', 188, b'1'),
(320, 'Ja, als er geen bus rijdt.', 188, b'0'),
(321, 'Je stopt want de bus heeft voorrang.', 189, b'1'),
(322, 'Je gaat de bus nog snel voorbij.', 189, b'0'),
(323, 'Je vertraagt en houdt de bus in het oog. Je rijdt wel door want je hebt voorrang.', 189, b'0'),
(324, 'Rechts op de rijweg.', 190, b'1'),
(325, 'Links op de fietssuggestiestrook.', 190, b'0'),
(326, 'Op het voetpad.', 190, b'0'),
(327, 'Je haast je om over te steken.', 191, b'0'),
(328, 'Je stopt en laat de brandweerwagen passeren: hij heeft voorrang.', 191, b'1'),
(329, 'Je neemt je tijd om over te steken: hij moet jou eerst overlaten.', 191, b'0'),
(330, 'Minstens 1,35 m groot zijn.', 192, b'1'),
(331, 'Minstens 12 jaar zijn.', 192, b'0'),
(332, 'Exact 30 jaar zijn.', 192, b'0'),
(336, '50 meter', 194, b'0'),
(337, '100 meter', 194, b'0'),
(338, '150 meter', 194, b'1'),
(339, 'Ik stop.', 195, b'1'),
(340, 'Ik rijd door want anders ben ik te laat op school.', 195, b'0'),
(341, 'Ik rijd door nadat ik eerst goed naar links en rechts heb gekeken.', 195, b'0'),
(342, 'De voetgangers mogen hier niet zijn. Ik fiets er voorbij en roep dat ze weg moeten gaan', 196, b'0'),
(343, 'Ik fiets ze op de straat voorbij.', 196, b'0'),
(344, 'Ik vertraag, gebruik mijn bel om ze te waarschuwen en fiets voorzichtig verder op het fietspad.', 196, b'1'),
(345, 'Ik fiets gewoon over als ik vind dat dat veilig kan.', 197, b'0'),
(346, 'Ik stap af en steek over als ik vind dat dat veilig kan.', 197, b'0'),
(347, 'Ik stap af en steek over als de gemachtigde opzichter een teken geeft.', 197, b'1'),
(348, 'Ik steek de auto lang het voetpad voorbij.', 198, b'0'),
(349, 'Ik kijk over mijn linkerschouder, steek mijn linkerarm uit en rij hem voorbij als er geen auto aankomt.', 198, b'1'),
(350, 'Ik bel, kijk over mijn linkerschouder en rij dan de auto voorbij.', 198, b'0'),
(351, 'Ja, als de trein al voorbij gereden is.', 199, b'0'),
(352, 'Nee, dat mag nooit.', 199, b'1'),
(353, 'Ja, als de slagbomen naar boven gaan, de lichten nog op rood staan en het belsignaal gaat.', 199, b'0'),
(354, 'De slagbomen omlaag zijn.', 200, b'0'),
(355, 'De slagbomen naar beneden gaan.', 200, b'0'),
(356, 'Je het belsignaal hoort.', 200, b'1'),
(357, 'Persoon in donkere kledij.', 201, b'0'),
(358, 'Persoon in fluorescerende kledij.', 201, b'1'),
(359, 'Proberen de auto''s te doen stoppen.', 202, b'0'),
(360, 'Iets verder stoppen en goed kijken of er verkeer van links of van rechts komt.', 202, b'1'),
(361, 'De struiken snoeien.', 202, b'0'),
(362, '101', 203, b'0'),
(363, '112', 203, b'1'),
(364, '900', 203, b'0'),
(365, 'Eerste hulp bij overval.', 204, b'0'),
(366, 'Eerste hulp bij ongelukken/ongevallen.', 204, b'1'),
(367, 'Beschermt je tegen de zon.', 205, b'0'),
(368, 'Beschermt je hoofd bij een val.', 205, b'1'),
(370, 'Persoon in kleurrijke kledij.', 201, b'0'),
(371, 'Op het kruispunt moet jij voorrang geven aan bestuurders die van links komen.', 155, b'0'),
(372, 'Hij mag doorlopen', 206, b'1'),
(373, 'Hij moet stoppen', 206, b'0'),
(375, 'Hier mag je je fiets parkeren.', 208, b'0'),
(376, 'Fietsers mogen deze weg niet in.', 208, b'1'),
(377, 'Een wit of geel licht.', 160, b'1'),
(378, 'Een groen licht.', 161, b'0'),
(379, 'Dit verkeersbord bestaat niet.', 156, b'0'),
(380, 'Je nadert een overweg zonder slagbomen.', 157, b'0'),
(381, 'Op dit kruispunt moet je enkel voorrang geven aan alle bestuurders die van rechts komen.', 158, b'0'),
(382, 'Als ik van rechts kom.', 159, b'0'),
(383, 'In groep op de rijbaan.', 163, b'0'),
(384, 'Ik mag fietsen op het fiets- en voetpad gedeelte.', 165, b'0'),
(385, 'Fietsenparking.', 166, b'0'),
(386, 'De verkeerslichten gaan voor op de agent.', 167, b'0'),
(387, 'De bevelen van de agent gaan voor op de verkeersborden en verkeerslichten.', 167, b'1'),
(388, 'Eerste hulp bij onnozelheid.', 204, b'0'),
(389, 'Is een mode accessoire.', 205, b'0'),
(390, 'Hij mag zelf kiezen.', 206, b'0'),
(391, 'Je hebt voorrang op de andere weggebruikers.', 208, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE IF NOT EXISTS `answer_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `awnserId` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Student_idx` (`userId`),
  KEY `Answer_idx` (`awnserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `answer_user`
--

INSERT INTO `answer_user` (`id`, `userId`, `awnserId`, `time`) VALUES
(48, 106, 85, '00:00:30'),
(49, 107, 85, '00:00:30'),
(50, 108, 85, '00:00:30'),
(51, 109, 85, '00:00:30'),
(52, 110, 87, '00:00:30'),
(53, 110, 85, '00:00:30'),
(54, 111, 85, '00:00:30'),
(55, 111, 87, '00:00:30'),
(56, 112, 85, '00:00:30'),
(57, 112, 87, '00:00:30'),
(58, 113, 85, '00:00:30'),
(59, 113, 88, '00:00:30'),
(60, 113, 94, '00:00:30'),
(61, 114, 86, '00:00:30'),
(62, 114, 88, '00:00:30'),
(63, 114, 94, '00:00:30'),
(64, 116, 85, '00:00:30'),
(65, 116, 94, '00:00:30'),
(66, 116, 88, '00:00:30'),
(67, 117, 95, '00:00:30'),
(68, 117, 88, '00:00:30'),
(69, 117, 101, '00:00:30'),
(70, 117, 104, '00:00:30'),
(71, 117, 93, '00:00:30'),
(72, 117, 106, '00:00:30'),
(73, 117, 108, '00:00:30'),
(74, 118, 88, '00:00:30'),
(75, 118, 95, '00:00:30'),
(76, 118, 101, '00:00:30'),
(77, 118, 104, '00:00:30'),
(78, 118, 93, '00:00:30'),
(79, 118, 106, '00:00:30'),
(80, 118, 108, '00:00:30'),
(81, 118, 117, '00:00:30'),
(82, 118, 112, '00:00:30'),
(83, 118, 121, '00:00:30'),
(84, 118, 123, '00:00:30'),
(85, 118, 130, '00:00:30'),
(86, 118, 125, '00:00:30'),
(87, 118, 133, '00:00:30'),
(88, 118, 136, '00:00:30'),
(89, 118, 146, '00:00:30'),
(90, 118, 147, '00:00:30'),
(91, 118, 138, '00:00:30'),
(92, 118, 143, '00:00:30'),
(93, 118, 164, '00:00:30'),
(94, 118, 153, '00:00:30'),
(95, 118, 152, '00:00:30'),
(96, 118, 159, '00:00:30'),
(97, 118, 168, '00:00:30'),
(98, 118, 175, '00:00:30'),
(100, 118, 172, '00:00:30'),
(101, 118, 167, '00:00:30'),
(102, 120, 95, '00:00:30'),
(103, 120, 88, '00:00:30'),
(104, 120, 93, '00:00:30'),
(105, 120, 101, '00:00:30'),
(106, 120, 104, '00:00:30'),
(107, 120, 108, '00:00:30'),
(108, 120, 146, '00:00:30'),
(109, 120, 133, '00:00:30'),
(110, 120, 123, '00:00:30'),
(111, 120, 125, '00:00:30'),
(112, 120, 147, '00:00:30'),
(113, 120, 106, '00:00:30'),
(114, 120, 143, '00:00:30'),
(115, 120, 130, '00:00:30'),
(116, 120, 138, '00:00:30'),
(117, 120, 136, '00:00:30'),
(119, 120, 168, '00:00:30'),
(120, 120, 172, '00:00:30'),
(121, 120, 175, '00:00:30'),
(122, 120, 112, '00:00:30'),
(123, 120, 117, '00:00:30'),
(124, 120, 121, '00:00:30'),
(125, 120, 152, '00:00:30'),
(126, 120, 159, '00:00:30'),
(127, 120, 164, '00:00:30'),
(128, 120, 167, '00:00:30'),
(129, 120, 153, '00:00:30'),
(130, 121, 122, '00:00:17'),
(131, 121, 164, '00:00:20'),
(132, 121, 108, '00:00:14'),
(135, 121, 138, '00:00:18'),
(136, 121, 141, '00:00:19'),
(139, 121, 130, '00:00:08'),
(141, 121, 95, '00:00:20'),
(142, 121, 112, '00:00:18'),
(143, 121, 106, '00:00:13'),
(145, 121, 103, '00:00:07'),
(146, 121, 93, '00:00:13'),
(147, 121, 153, '00:00:25'),
(148, 121, 88, '00:00:27'),
(149, 121, 175, '00:00:24'),
(151, 121, 133, '00:00:20'),
(152, 121, 137, '00:00:27'),
(153, 121, 166, '00:00:27'),
(154, 121, 160, '00:00:28'),
(155, 121, 147, '00:00:28'),
(156, 121, 210, '-00:00:01'),
(157, 121, 119, '00:00:29'),
(158, 121, 168, '00:00:26'),
(160, 121, 125, '00:00:28'),
(161, 121, 197, '-00:00:01'),
(162, 121, 101, '00:00:28'),
(163, 121, 171, '00:00:27'),
(165, 121, 206, '-00:00:01'),
(166, 121, 145, '00:00:29'),
(167, 121, 219, '-00:00:01'),
(168, 121, 150, '00:00:28'),
(169, 121, 118, '00:00:28'),
(172, 121, 216, '-00:00:01'),
(173, 121, 216, '-00:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(5, 'verkeersborden'),
(6, 'algemeen'),
(7, 'situaties');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `organisationId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `School_idx` (`organisationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `organisationId`) VALUES
(13, '4e leerjaar', 7),
(14, '5e leerjaar', 7),
(15, '6e leerjaar', 7),
(16, '4e leerjaar', 8),
(17, '5e leerjaar', 8),
(18, '6e leerjaar', 8),
(19, '4e leerjaar', 9),
(20, '5e leerjaar', 9),
(21, '6e leerjaar', 9),
(22, '4e leerjaar', 10),
(23, '5e leerjaar', 10),
(24, '6e leerjaar', 10),
(25, '4e leerjaar', 11),
(26, '5e leerjaar', 11),
(27, '6e leerjaar', 11),
(28, '4e leerjaar', 12),
(29, '5e leerjaar', 12),
(30, '6e leerjaar', 12),
(31, '4e leerjaar', 13),
(32, '5e leerjaar', 13),
(33, '6e leerjaar', 13);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`id`, `difficulty`, `time`) VALUES
(5, 'Gemakkelijk', 30),
(6, 'Gemiddeld', 30),
(7, 'Moeilijker', 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(2, 'Renzie', '$2y$10$HxR/xDXO3.BlUuKGTuwwOuTsPsR0fHchcx.LrTUkI105l4qsXWtAy'),
(4, 'Thomas', '$2y$10$Aq9tfASpWfKvLqYNKpJxyOCALSsnN48MKtmb5TOutd/1W3uvkHTTi');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `timestamp`, `message`) VALUES
(141, '2018-03-21 12:10:39', 'Failed login from 81.82.205.108 with username:Thomas'),
(142, '2018-03-28 12:00:53', 'Failed login from 81.82.205.108 with username:Thomas');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `extraInfo`) VALUES
(7, 'Sjabi', ''),
(8, 'kasteeltje', ''),
(9, 'de krinkel', ''),
(10, 'VBS Liezele', ''),
(11, 'twinkelveld', ''),
(12, 'carolus', ''),
(13, 'klavertje4', ''),
(14, 'de wissel', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `extraInfo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `difficulty` int(11) DEFAULT '0',
  `imageLink` longtext,
  `category` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Diff_idx` (`difficulty`),
  KEY `Cat_idx` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `difficulty`, `imageLink`, `category`) VALUES
(108, '1) In een Zone 30', 7, 'imageQuestion_108.png', 7),
(109, '2) Wat betekent dit verkeersbord?', 7, 'imageQuestion_109.png', 5),
(111, '3) Voor je de straat oversteekt, kijk je:', 5, 'imageQuestion_111.png', 5),
(112, '4) Wie mag gebruik maken van een fietspad aangeduid met dit bord? ', 7, 'imageQuestion_112.png', 5),
(113, '5) Je mag dit verbodsbord voorbij fietsen als:', 7, 'imageQuestion_113.png', 5),
(114, '6) Wat betekent dit verkeersbord?', 7, 'imageQuestion_114.png', 5),
(115, '7) Wat betekent dit verkeersbord?', 5, 'imageQuestion_115.png', 5),
(116, '8) Wat betekent dit verkeersbord?', 5, 'imageQuestion_116.png', 5),
(117, '9) Als een personenwagen met een snelheid  van 50 rijdt dan is de stopafstand tussen:', 7, 'imageQuestion_117.png', 6),
(118, '10) Wat betekent dit verkeersbord?', 7, 'imageQuestion_118.png', 5),
(119, '11) Waar moet je, als je met de fiets in de hand loopt, op de straat lopen?', 6, 'imageQuestion_119.png', 7),
(120, '12) Je fietst met 24 in groep.', 7, 'imageQuestion_120.png', 7),
(121, '13) In de bebouwde kom mogen:', 5, 'imageQuestion_121.png', 6),
(122, '14) De agent steekt zijn arm rechtop.', 6, 'imageQuestion_122.png', 7),
(123, '15) Je bevindt je in een straat waar voorrang van rechts geldt. Er komt een wagen van rechts aangereden. De wagen stopt.', 6, 'imageQuestion_123.png', 7),
(124, '16) Ik vervoer met de fiets een doos met knutselmateriaal voor de jeugdbeweging. Die doos mag, dwars vervoerd,  maximaal:', 7, 'imageQuestion_124.png', 7),
(125, '17) Je rijdt met de fiets op deze weg. Er is slechts één fietspad aan de linkerkant aangeduid met wegmarkeringen.', 6, 'imageQuestion_125.png', 7),
(126, '18) Je fietst in de richting van de pijl en je bestemming is X.', 7, 'imageQuestion_126.png', 7),
(127, '19) Er is geen trottoir. Waar moet hier als voetganger stappen?', 5, 'imageQuestion_127.png', 7),
(128, '20) Inline skates zijn:', 7, 'imageQuestion_128.png', 6),
(129, '21) Wat is de minimumleeftijd voor een ruiter wanneer hij met z’n paard zonder begeleiding op de openbare weg rijdt?', 7, 'imageQuestion_129.png', 6),
(131, '22) Wanneer moet je een zebrapad gebruiken?', 5, 'imageQuestion_131.png', 6),
(132, '23) Bromfietsen mogen:', 7, 'imageQuestion_132.png', 6),
(133, '24) Op een fietsoversteekplaats heb je als overstekende fietser:', 6, 'imageQuestion_133.png', 6),
(134, '25) Waarvoor staat de P als afkorting in STOP-principe?', 7, 'imageQuestion_134.png', 6),
(135, '26) Het rode achterlicht van een fiets moet ‘s nachts zichtbaar zijn vanop een minimumafstand van:', 6, 'imageQuestion_135.png', 6),
(136, '27) Wat is de maximum leeftijd waarmee je op het voetpad mag fietsen:', 6, 'imageQuestion_136.png', 6),
(138, '28) In een woonerf mag je:', 5, 'imageQuestion_138.png', 6),
(139, '29) Mag je op het voetpad fietsen?', 6, 'imageQuestion_139.png', 6),
(140, '30) In een zone 30:', 5, 'imageQuestion_140.png', 6),
(141, '31) Een fietser die links gaat afslaan, moet:', 5, 'imageQuestion_141.png', 7),
(142, '32) Wat betekent dit verkeersbord?', 5, 'imageQuestion_142.png', 5),
(143, '33) Wat betekent dit verkeersbord?', 5, 'imageQuestion_143.png', 5),
(144, '34) Welke richting mag ik als fietser kiezen?', 6, 'imageQuestion_144.png', 7),
(146, '35) Wat betekent dit verkeersbord?', 7, 'imageQuestion_146.png', 5),
(147, '36) Wat betekent dit verkeersbord?', 5, 'imageQuestion_147.png', 5),
(148, '37) Wat betekent dit verkeersbord?', 6, 'imageQuestion_148.png', 5),
(150, '38) Wat is wel verplicht op een gewone fiets?', 5, 'imageQuestion_150.png', 6),
(151, '39) Een auto heeft achteraan drie zitplaatsen met veiligheidsgordels.  Met hoeveel mogen jullie op de achterbank zitten?', 5, 'imageQuestion_151.png', 6),
(152, '40) Je broer rijdt met de bromfiets van school naar huis.   Jij mag:', 0, 'imageQuestion_152.png', 7),
(154, '41) Voor wie gelden verkeersborden?', 6, 'imageQuestion_154.png', 6),
(155, '42) Je fietst en je ziet dit bord rechts van de weg. Wat betekent dit bord? ', 6, 'imageQuestion_155.png', 5),
(156, '43) Je ziet rechts deze oranjegele ruit met zwarte dwarsstreep. Wat betekent dit bord?', 7, 'imageQuestion_156.png', 5),
(157, '44) Je fietst. Je ziet rechts dit bord met een kruisje. Wat betekent dit bord?', 5, 'imageQuestion_157.png', 5),
(158, '45) Je fietst. Rechts van de weg staat dit bord met de punt naar beneden. Wat betekent dit bord?', 5, 'imageQuestion_158.png', 5),
(159, '46) Je fietst van de aardeweg naar de rijbaan toe. Wanneer heb ik voorang?', 7, 'imageQuestion_159.png', 7),
(160, '47) Welke verlichting is de juiste, vooraan je fiets?', 5, 'imageQuestion_160.png', 6),
(161, '48) Welke verlichting is de juiste achteraan de fiets?', 5, 'imageQuestion_161.png', 6),
(163, '49) Je stapt op de stoep ...', 5, 'imageQuestion_163.png', 7),
(164, '50) Wanneer fiets je met licht?', 6, 'imageQuestion_164.png', 6),
(165, '51) Je fietst. Je ziet dit verkeersbord. Wat betekent dit bord?', 5, 'imageQuestion_165.png', 5),
(166, '52) Wat betekent dit verkeersbord?', 6, 'imageQuestion_166.png', 5),
(167, '53) Wat is waar?', 7, 'imageQuestion_167.png', 7),
(169, '54) Je staat op een kruispunt met verkeerslichten én een agent die het verkeer regelt. Van wie moet je de aanwijzingen volgen?', 7, 'imageQuestion_169.png', 7),
(170, '55) Hoe ziet een gevaarsbord er altijd uit?', 7, 'imageQuestion_170.png', 5),
(171, '56) Wat wil dit verkeersbord zeggen?', 6, 'imageQuestion_171.png', 5),
(172, '57) Hoe noem je een rij omgekeerde, witte driehoeken op de weg?', 6, 'imageQuestion_172.png', 6),
(173, '58) Wat betekent dit verkeersbord?', 5, 'imageQuestion_173.png', 5),
(174, '59) Wat is de anderen naam voor een fiets waar je met z''n tweeën op kunt rijden?', 5, 'imageQuestion_174.png', 6),
(175, '60) Op dit kruispunt wil je links afslaan. De agent heeft één arm uitgestoken in jouw richting. Wat doe je?', 7, 'imageQuestion_175.png', 7),
(176, '61) Waar heb je als voetganger voorrang bij het oversteken in een zone 30?', 0, 'imageQuestion_176.png', 6),
(177, '62) Wat betekent dit verkeersbord?', 5, 'imageQuestion_177.png', 5),
(179, '63) Wat betekenen de haaientanden op de foto.', 6, 'imageQuestion_179.png', 6),
(180, '64) Je komt met de fiets aan aan een overweg. De bel gaat, de lichten staan op rood maar de slagbomen zijn nog omhoog. Wat doe je.', 6, 'imageQuestion_180.png', 7),
(181, '65) Er staat een auto op het fietspad geparkeerd. Je wil hem voorbij rijden met de fiets. Wat doe je?', 6, 'imageQuestion_181.png', 7),
(182, '66) Je rijdt met je fiets op het fietspad. De witte auto gebruikt zijn richtingaanwijzer om duidelijk te maken dat hij uit de parkeerplaats wenst te rijden. Wat doe je?', 7, 'imageQuestion_182.png', 7),
(184, '67) Je steekt als voetganger over op een zebrapad. Het zebrapad stopt aan het fietspad. Wie heeft er voorrang?', 7, 'imageQuestion_184.png', 7),
(185, '68) Je rijdt met je fiets rond. Je hebt oortjes in van je muziekspeler. Mag dat?', 6, 'imageQuestion_185.png', 6),
(186, '69) Je rijdt met je vriend of vriendin naast elkaar op straat. Er komt een tegenligger aan die niet kan passeren. Wat doe je?', 6, 'imageQuestion_186.png', 7),
(187, '70) Je krijgt op de fiets een smsje van je beste vriend of vriendin. Je moet dringend antwoorden. Mag dat?', 7, 'imageQuestion_187.png', 7),
(188, '71) Het is druk op straat. Er is een busstrook. Mag je hier als fietser gebruik van maken?', 7, 'imageQuestion_188.png', 6),
(189, '72) Je rijdt binnen de bebouwde kom. Voor je vertrekt een bus aan de halte. Wat doe je.', 6, 'imageQuestion_189.png', 7),
(190, '73) Je fietst in een enkel richting straat. Er is een fietssuggestiestrook aan de linker kant. Waar fiets je als fietser?', 6, 'imageQuestion_190.png', 7),
(191, '74) Een brandweerwagen met sirene bereikt de straat die je net wil oversteken. Het mannetje staat op groen.', 6, 'imageQuestion_191.png', 7),
(192, '75) Om vooraan in de auto te mogen zitten zonder zitje, moet je:', 7, 'imageQuestion_192.png', 6),
(194, '76) Vanaf welke afstand ben je zichtbaar als je een fluorescerend hesje draagt?', 7, 'imageQuestion_194.png', 6),
(195, '77) Je bent te laat naar school vertrokken. Je bent aan het fietsen en het licht springt op oranje. Wat doe je?', 6, 'imageQuestion_195.png', 7),
(196, '78) Je rijdt op het fietspad en nadert voetgangers die heel het fietspad versperren. Wat doe je?', 5, 'imageQuestion_196.png', 7),
(197, '79) Je komt met de fiets aan een zebrapad waar een gemachtigd staat. Je moet oversteken. Wat doe je?', 6, 'imageQuestion_197.png', 7),
(198, '80) Je rijdt rechts op de rijbaan en ziet voor je een auto geparkeerd staan. Je moet er langs links voorbij op de rijbaan. Wat doe je?', 6, 'imageQuestion_198.png', 7),
(199, '81) Mag je de overweg oversteken als de slagbomen nog gesloten zijn?', 6, 'imageQuestion_199.png', 6),
(200, '82) Je moet pas stoppen bij de overweg als ...', 6, 'imageQuestion_200.png', 6),
(201, '83) Wie is het best zichtbaar in het donker?', 5, 'imageQuestion_201.png', 7),
(202, '84) Je wil als fietser een kruispunt oversteken. Door de struiken kan je de auto''s die van rechts komen niet zien. Wat moet je doen?', 5, 'imageQuestion_202.png', 7),
(203, '85) Je wil de ziekenwagen verwittigen. Welk nummer bel je?', 7, 'imageQuestion_203.png', 7),
(204, '86) Wat betekenen de letters EHBO?', 5, 'imageQuestion_204.png', 6),
(205, '87) Een fietshelm:', 5, 'imageQuestion_205.png', 6),
(206, '88) Aan welke verkeersregel moet de voetganger zich hier houden?', 5, 'imageQuestion_206.png', 7),
(208, '89) Wat bekent dit verkeersbord?', 5, 'imageQuestion_208.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extraInfo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `extraInfo`) VALUES
(15, 'Verkeersquiz Puurs 2018', 'editie 2018');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`quizId`,`questionId`),
  KEY `_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quizId`, `questionId`) VALUES
(15, 108),
(15, 109),
(15, 111),
(15, 112),
(15, 113),
(15, 114),
(15, 115),
(15, 116),
(15, 117),
(15, 118),
(15, 119),
(15, 120),
(15, 121),
(15, 122),
(15, 123),
(15, 124),
(15, 125),
(15, 126),
(15, 127),
(15, 128),
(15, 129),
(15, 131),
(15, 132),
(15, 133),
(15, 134),
(15, 135),
(15, 136),
(15, 138),
(15, 139),
(15, 140),
(15, 141),
(15, 142),
(15, 143),
(15, 144),
(15, 146),
(15, 147),
(15, 148),
(15, 150),
(15, 151),
(15, 152),
(15, 154),
(15, 155),
(15, 156),
(15, 157),
(15, 158),
(15, 159),
(15, 160),
(15, 161),
(15, 163),
(15, 164),
(15, 165),
(15, 166),
(15, 167),
(15, 169),
(15, 170),
(15, 171),
(15, 172),
(15, 173),
(15, 174),
(15, 175),
(15, 176),
(15, 177),
(15, 179),
(15, 180),
(15, 181),
(15, 182),
(15, 184),
(15, 185),
(15, 186),
(15, 187),
(15, 188),
(15, 189),
(15, 190),
(15, 191),
(15, 192),
(15, 194),
(15, 195),
(15, 196),
(15, 197),
(15, 198),
(15, 199),
(15, 200),
(15, 201),
(15, 202),
(15, 203),
(15, 204),
(15, 205),
(15, 206),
(15, 208);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_template`
--

CREATE TABLE IF NOT EXISTS `quiz_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatequizid` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `quiz_template`
--

INSERT INTO `quiz_template` (`id`, `quizId`, `name`, `template`) VALUES
(28, 15, '4e leerjaar      ', '{"5":{"5":"1","6":"1","7":"0"}}'),
(29, 15, '5e leerjaar  ', '{"5":{"5":"1","6":"1","7":"1"}}'),
(30, 15, '6e leerjaar   ', '{"5":{"5":"1","6":"1","7":"1"}}');

-- --------------------------------------------------------

--
-- Table structure for table `template_department`
--

CREATE TABLE IF NOT EXISTS `template_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schemaId` int(11) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_idx` (`departmentId`),
  KEY `shema_idx` (`schemaId`),
  KEY `quizId` (`quizId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `template_department`
--

INSERT INTO `template_department` (`id`, `schemaId`, `departmentId`, `quizId`) VALUES
(22, 28, 13, 15),
(23, 29, 14, 15),
(24, 30, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `template_question`
--

CREATE TABLE IF NOT EXISTS `template_question` (
  `templateId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  PRIMARY KEY (`templateId`,`questionId`),
  KEY `question_idx` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Class_idx` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `familyName`, `departmentId`, `quizId`) VALUES
(106, 'thomas', 'Van reeth', 16, 0),
(107, 'tho', 'vr', 13, 0),
(108, 'Test', 'Test', 15, 0),
(109, 'Thomas', 'Van Reeth', 13, 0),
(110, 'Thomas', 'Van Reeth', 13, 0),
(111, 'Thomas', 'Van Reeth', 13, 0),
(112, 'Test Makkelijk', 'Test', 13, 0),
(113, 'Test', 'Makkelijk', 13, 0),
(114, 'Test2', 'makkelijk', 13, 0),
(115, 'Test3', 'Makkelijk', 13, 0),
(116, 'tw', 'test', 14, 0),
(117, 't', 'vr', 13, 0),
(118, 'Thomas', 'Van Reeth', 35, 0),
(119, 'Thomas', 'Van Reeth', 34, 0),
(120, 'Thomas', 'Van Reeth', 35, 0),
(121, 'test', 'test', 34, 15),
(122, 't', 't', 35, 15),
(123, 'Thomas', 'Van Reeth', 35, 15),
(124, 'Thomas', 'Van Reeth', 36, 15),
(125, 'Thomas', 'Van Reeth', 34, 15),
(126, 'Thomas', 'Van Reeth', 20, 15),
(127, 'Thomas', 'Van Reeth', 35, 15),
(128, 'Thomas', 'Van Reeth', 34, 15),
(129, 'Thomas', 'Van Reeth', 34, 15),
(130, 'Thomas', 'Van Reeth', 35, 15),
(131, 'Thomas', 'Van Reeth', 34, 15),
(132, 'Thomas', 'Van Reeth', 34, 15),
(133, 'Thomas', 'Van Reeth', 35, 15),
(134, 'Thomas', 'Van Reeth', 35, 15),
(135, 'Thomas', 'Van Reeth', 34, 15),
(136, 'Thomas', 'Van Reeth', 34, 15),
(137, 'Thomas', 'Van Reeth', 35, 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD CONSTRAINT `Student` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `answer_user_ibfk_1` FOREIGN KEY (`awnserId`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `oragnisation` FOREIGN KEY (`organisationId`) REFERENCES `organisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_template`
--
ALTER TABLE `quiz_template`
  ADD CONSTRAINT `quiz_template_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_department`
--
ALTER TABLE `template_department`
  ADD CONSTRAINT `department` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shema` FOREIGN KEY (`schemaId`) REFERENCES `quiz_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_department_ibfk_2` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template_question`
--
ALTER TABLE `template_question`
  ADD CONSTRAINT `question` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `template_question_ibfk_1` FOREIGN KEY (`templateId`) REFERENCES `template_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
