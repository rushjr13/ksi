-- Generation time: Wed, 26 Jun 2019 08:21:55 +0000
-- Host: mysql.hostinger.ro
-- DB name: u574849695_25
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

DROP TABLE IF EXISTS `misi`;
CREATE TABLE `misi` (
  `id_misi` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `judul_misi` varchar(255) NOT NULL,
  `ket_misi` text NOT NULL,
  PRIMARY KEY (`id_misi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `misi` VALUES ('1','Maiores asperiores dolore unde omnis.','However, everything is to-day! And yesterday things went on in the air, mixed up with the bread-knife.\' The March Hare said in a moment: she looked down at her for a great deal to come upon them.'),
('2','A eius ipsum officiis dolor quam.','All on a bough of a muchness?\' \'Really, now you ask me,\' said Alice, in a tone of great relief. \'Call the first to speak. \'What size do you know that you\'re mad?\' \'To begin with,\' the Mock Turtle,.'),
('3','Vitae porro reprehenderit iste et.','Mock Turtle in a tone of this sort of lullaby to it in a trembling voice:-- \'I passed by his garden.\"\' Alice did not come the same when I was going to do such a capital one for catching mice--oh, I.'),
('4','At voluptas ipsam dolor placeat corrupti aliquid.','NOT, being made entirely of cardboard.) \'All right, so far,\' said the Hatter, and, just as if it likes.\' \'I\'d rather not,\' the Cat said, waving its tail about in all their simple joys, remembering.'),
('5','Sapiente et necessitatibus vel ratione iste et.','Alice heard the King repeated angrily, \'or I\'ll have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then all the unjust things--\' when his eye chanced to fall upon.'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

