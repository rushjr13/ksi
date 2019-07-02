-- Generation time: Tue, 25 Jun 2019 00:47:48 +0000
-- Host: mysql.hostinger.ro
-- DB name: u574849695_24
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `galeri_kegiatan`;
CREATE TABLE `galeri_kegiatan` (
  `id_gk` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `judul_gk` varchar(255) NOT NULL,
  `foto_gk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `galeri_kegiatan` VALUES ('1','Quo rerum officiis blanditiis.','Qui.'),
('2','Eveniet amet.','Enim.'),
('3','Deleniti laboriosam id.','Qui.'),
('4','Sit rerum doloribus porro ullam.','Quod.'),
('5','Sed magni tempora sapiente.','Rem.'),
('6','Aut molestias ratione.','Eius.'),
('7','Atque tempora dolores magni.','Quis.'),
('8','Quia quis ipsa voluptatum.','Illo.'),
('9','Nulla neque ducimus.','Quia.'),
('10','Aut accusamus et.','Et.'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

