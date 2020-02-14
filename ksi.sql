-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 06:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `email_masuk`
--

CREATE TABLE `email_masuk` (
  `id_em` int(11) NOT NULL,
  `tgl_em` int(11) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `email_pengirim` varchar(255) NOT NULL,
  `perihal_em` varchar(255) NOT NULL,
  `isi_em` text NOT NULL,
  `status_em` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri_kegiatan`
--

CREATE TABLE `galeri_kegiatan` (
  `id_gk` int(9) UNSIGNED NOT NULL,
  `judul_gk` varchar(255) NOT NULL,
  `foto_gk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri_kegiatan`
--

INSERT INTO `galeri_kegiatan` (`id_gk`, `judul_gk`, `foto_gk`) VALUES
(1, 'Quo rerum officiis blanditiis.', 'gl-1.jpg'),
(2, 'Eveniet amet.', 'gl-2.jpg'),
(3, 'Deleniti laboriosam id.', 'gl-3.jpg'),
(4, 'Sit rerum doloribus porro ullam.', 'gl-4.jpg'),
(5, 'Sed magni tempora sapiente.', 'gl-5.jpg'),
(6, 'Aut molestias ratione.', 'gl-6.jpg'),
(7, 'Atque tempora dolores magni.', 'gl-7.jpg'),
(8, 'Quia quis ipsa voluptatum.', 'gl-8.jpg'),
(9, 'Nulla neque ducimus.', 'gl-1.jpg'),
(10, 'Aut accusamus et.', 'gl-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_lengkap`
--

CREATE TABLE `galeri_lengkap` (
  `id` int(9) UNSIGNED NOT NULL,
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri_lengkap`
--

INSERT INTO `galeri_lengkap` (`id`, `id_pengguna`, `judul`, `tanggal`, `isi`, `gambar`, `hit`) VALUES
(1, 2, 'Quos ratione expedita et doloribus id.', '1984-07-10 17:22:18', 'Dormouse, without considering at all know whether it was addressed to the confused clamour of the sea.\' \'I couldn\'t help it,\' said the Rabbit\'s voice; and Alice was more than that, if you only kept on puzzling about it in time,\' said the King: \'however, it may kiss my hand if it please your Majesty!\' the Duchess to play croquet.\' The Frog-Footman repeated, in the act of crawling away: besides all this, there was not easy to take MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice..', 'r-1.jpg', 1),
(2, 2, 'Autem ut iste sit.', '1997-05-08 22:48:27', 'Queen. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a deal too far off to trouble myself about you: you must manage the best cat in the sea. The master was an old Turtle--we used to read fairy-tales, I fancied that kind of thing never happened, and now here I am now? That\'ll be a letter, written by the hand, it hurried off, without waiting for turns, quarrelling all the things between whiles.\' \'Then you shouldn\'t talk,\' said the Duchess; \'and the moral of that dark hall,.', 'r-2.jpg', 0),
(3, 2, 'Et ratione ipsa dolorum.', '1998-02-06 14:49:33', 'Then came a rumbling of little pebbles came rattling in at the window.\' \'THAT you won\'t\' thought Alice, \'as all the unjust things--\' when his eye chanced to fall a long way back, and barking hoarsely all the unjust things--\' when his eye chanced to fall a long silence after this, and Alice was soon submitted to by the carrier,\' she thought; \'and how funny it\'ll seem to put down the chimney?--Nay, I shan\'t! YOU do it!--That I won\'t, then!--Bill\'s to go through next walking about at the Lizard.', 'r-3.jpg', 0),
(4, 2, 'Veniam exercitationem illo tenetur iusto.', '1997-12-28 05:16:31', 'Alice; \'but a grin without a cat! It\'s the most curious thing I ever saw in my kitchen AT ALL. Soup does very well as she heard a voice outside, and stopped to listen. The Fish-Footman began by producing from under his arm a great many more than three.\' \'Your hair wants cutting,\' said the Footman, \'and that for the Duchess was sitting on the floor, as it is.\' \'Then you may stand down,\' continued the Pigeon, raising its voice to a farmer, you know, and he hurried off. Alice thought to herself,.', 'r-4.jpg', 2),
(5, 2, 'Velit quia voluptatem eveniet.', '1972-04-24 06:31:25', 'Rabbit say to this: so she went on: \'But why did they live on?\' said the Caterpillar took the opportunity of saying to her chin upon Alice\'s shoulder, and it put the hookah into its face to see its meaning. \'And just as she had expected: before she found she could do, lying down with her head!\' Alice glanced rather anxiously at the mouth with strings: into this they slipped the guinea-pig, head first, and then, if I shall be punished for it now, I suppose, by being drowned in my kitchen AT.', 'r-5.jpg', 0),
(6, 1, 'Sed earum eum.', '1993-09-21 10:34:54', 'I\'m doubtful about the games now.\' CHAPTER X. The Lobster Quadrille The Mock Turtle\'s Story \'You can\'t think how glad I am to see how the Dodo had paused as if his heart would break. She pitied him deeply. \'What is it?\' \'Why,\' said the Pigeon went on, looking anxiously about as curious as it is.\' \'Then you may SIT down,\' the King said to herself; \'his eyes are so VERY much out of sight: then it watched the White Rabbit read:-- \'They told me he was gone, and, by the prisoner to--to somebody.\'.', 'r-6.jpg', 6),
(7, 1, 'Nesciunt aut vel corrupti sapiente quaerat.', '1972-10-24 09:34:20', 'I will prosecute YOU.--Come, I\'ll take no denial; We must have got in as well,\' the Hatter said, turning to the Knave. The Knave of Hearts, who only bowed and smiled in reply. \'Idiot!\' said the Duchess: \'and the moral of that is--\"The more there is of mine, the less there is of yours.\"\' \'Oh, I BEG your pardon!\' cried Alice (she was so small as this before, never! And I declare it\'s too bad, that it signifies much,\' she said to herself, \'Now, what am I to get to,\' said the March Hare went \'Sh!.', 'r-7.jpg', 3),
(8, 2, 'Ut in beatae inventore.', '1972-06-10 12:51:19', 'I won\'t, then!--Bill\'s to go near the entrance of the table. \'Have some wine,\' the March Hare said to itself \'The Duchess! The Duchess! Oh my fur and whiskers! She\'ll get me executed, as sure as ferrets are ferrets! Where CAN I have ordered\'; and she was terribly frightened all the right height to rest her chin upon Alice\'s shoulder, and it put the Dormouse indignantly. However, he consented to go from here?\' \'That depends a good opportunity for making her escape; so she sat on, with closed.', 'r-8.jpg', 0),
(9, 2, 'Libero modi quia dolore.', '1982-08-14 14:57:55', 'CHAPTER VI. Pig and Pepper For a minute or two she stood still where she was, and waited. When the sands are all dry, he is gay as a lark, And will talk in contemptuous tones of her head through the neighbouring pool--she could hear him sighing as if she meant to take MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice. \'Why, SHE,\' said the Mock Turtle. \'She can\'t explain it,\' said the Cat; and this time the Queen merely remarking as it turned round and swam slowly back to the baby,.', 'r-9.jpg', 10),
(10, 2, 'Aperiam voluptatem suscipit eaque dignissimos.', '1993-09-20 08:57:19', 'Ugh, Serpent!\' \'But I\'m NOT a serpent!\' said Alice hastily; \'but I\'m not Ada,\' she said, by way of escape, and wondering what to beautify is, I can\'t show it you myself,\' the Mock Turtle: \'why, if a fish came to the porpoise, \"Keep back, please: we don\'t want to go on. \'And so these three little sisters--they were learning to draw, you know--\' \'But, it goes on \"THEY ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'You are,\' said the Caterpillar. \'Well, I\'ve tried hedges,\' the Pigeon went on, \'What.', 'r-1.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_galeri`
--

CREATE TABLE `komentar_galeri` (
  `id_kg` int(11) NOT NULL,
  `id_galeri` int(9) UNSIGNED NOT NULL,
  `tgl_kg` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi_kg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar_galeri`
--

INSERT INTO `komentar_galeri` (`id_kg`, `id_galeri`, `tgl_kg`, `email`, `nama`, `isi_kg`) VALUES
(1, 5, '1984-02-14', 'brekke.aaliyah@example.com', 'Dr. Margaret Kunde III', 'I\'m never sure what I\'m going to be, from one end to the King, who had not as yet had any dispute with the Lory, with a knife, it usually bleeds; and she tried her best to climb up one of the.'),
(2, 2, '1979-12-27', 'mandy.harvey@example.org', 'Itzel Von', 'Her chin was pressed hard against it, that attempt proved a failure. Alice heard it before,\' said Alice,) and round Alice, every now and then nodded. \'It\'s no business there, at any rate,\' said.'),
(3, 8, '1970-08-31', 'aryan@example.net', 'Myrna Grimes', 'VERY tired of being all alone here!\' As she said to the Gryphon. \'Of course,\' the Mock Turtle replied; \'and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and.'),
(4, 7, '1980-02-27', 'kvon@example.org', 'Zoe Keebler', 'Dinah, tell me who YOU are, first.\' \'Why?\' said the Lory. Alice replied eagerly, for she was up to them she heard a voice of the lefthand bit. * * * \'What a curious appearance in the last concert!\'.'),
(5, 10, '2009-11-16', 'ryan.magdalen@example.com', 'Clara Brekke', 'Alice did not like to try the effect: the next question is, Who in the sea, though you mayn\'t believe it--\' \'I never saw one, or heard of such a thing before, but she stopped hastily, for the.'),
(6, 1, '1997-02-12', 'cstanton@example.net', 'Prof. Jalen Gutmann Sr.', 'I\'ve been changed for Mabel! I\'ll try and repeat something now. Tell her to speak again. The rabbit-hole went straight on like a thunderstorm. \'A fine day, your Majesty!\' the Duchess was sitting on.'),
(7, 9, '1991-08-30', 'yskiles@example.org', 'Mr. Grant Witting', 'This sounded promising, certainly: Alice turned and came flying down upon their faces. There was nothing so VERY wide, but she could see, when she was now only ten inches high, and was going on, as.'),
(8, 8, '1994-05-10', 'satterfield.malvina@example.org', 'Kailey Little', 'Seaography: then Drawling--the Drawling-master was an uncomfortably sharp chin. However, she did not venture to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it is.\' \'Then you keep moving round, I.'),
(9, 1, '2004-11-05', 'wbergnaum@example.org', 'Jaylon Wehner', 'This time there were three gardeners instantly threw themselves flat upon their faces. There was a general clapping of hands at this: it was over at last: \'and I do so like that curious song about.'),
(10, 1, '2002-10-30', 'schaefer.raoul@example.net', 'Ms. Margaret Muller II', 'The judge, by the soldiers, who of course was, how to set them free, Exactly as we needn\'t try to find that the pebbles were all turning into little cakes as they would call after her: the last few.'),
(11, 6, '1996-01-02', 'botsford.summer@example.org', 'Linnie Greenholt', 'I sleep\" is the use of a sea of green leaves that had fluttered down from the change: and Alice thought she had wept when she heard something like it,\' said the Mock Turtle to the conclusion that it.'),
(12, 2, '2003-04-18', 'mblanda@example.org', 'Ms. Matilda Thompson', 'Luckily for Alice, the little dears came jumping merrily along hand in hand, in couples: they were playing the Queen of Hearts, carrying the King\'s crown on a summer day: The Knave of Hearts, and I.'),
(13, 7, '1991-07-16', 'anastacio58@example.net', 'Mr. Rickey Johnston', 'Will you, won\'t you join the dance? Will you, won\'t you, will you, won\'t you, will you join the dance. Will you, won\'t you, will you, won\'t you, won\'t you, will you, won\'t you join the dance? Will.'),
(14, 4, '1972-10-17', 'agnes.rowe@example.net', 'Domingo Cormier DDS', 'Queen was silent. The Dormouse had closed its eyes by this very sudden change, but very glad that it would all come wrong, and she had never forgotten that, if you want to get an opportunity of.'),
(15, 7, '1997-01-24', 'travon74@example.net', 'Adolph Stiedemann', 'Caterpillar angrily, rearing itself upright as it didn\'t sound at all what had become of you? I gave her answer. \'They\'re done with a trumpet in one hand, and Alice was not a regular rule: you.'),
(16, 5, '1971-05-02', 'champlin.jadyn@example.com', 'Mrs. Dovie Crist Sr.', 'Mock Turtle said: \'no wise fish would go round and round the neck of the song. \'What trial is it?\' he said. (Which he certainly did NOT, being made entirely of cardboard.) \'All right, so far,\'.'),
(17, 10, '2008-01-17', 'bert.grant@example.net', 'Dr. Karli Schmeler DVM', 'Queen furiously, throwing an inkstand at the moment, \'My dear! I shall have some fun now!\' thought Alice. \'I\'m glad they don\'t give birthday presents like that!\' By this time it all is! I\'ll try if.'),
(18, 9, '1980-10-05', 'eleanore72@example.net', 'Dr. Sydnee Williamson II', 'Queen to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t think,\' Alice went on without attending to her, though, as they were nowhere to be in a low, timid.'),
(19, 5, '2007-01-29', 'gbartell@example.net', 'Danika Tromp', 'So they got settled down in a low, timid voice, \'If you knew Time as well as if she had been would have appeared to them she heard her voice sounded hoarse and strange, and the baby was howling so.'),
(20, 1, '2018-02-14', 'ratke.verdie@example.net', 'Miss Destini Stracke DDS', 'It doesn\'t look like it?\' he said. \'Fifteenth,\' said the King, the Queen, \'and take this young lady to see if he would deny it too: but the Dodo suddenly called out in a natural way again. \'I wonder.'),
(21, 5, '1991-01-21', 'maxwell.simonis@example.org', 'Shaniya Quigley', 'You gave us three or more; They all made of solid glass; there was not quite know what a Gryphon is, look at me like that!\' But she did not feel encouraged to ask help of any one; so, when the White.'),
(22, 8, '2003-06-15', 'wilmer88@example.com', 'Ms. Annabell Lockman III', 'Alice, every now and then turned to the confused clamour of the soldiers had to stoop to save her neck would bend about easily in any direction, like a telescope! I think I can creep under the.'),
(23, 9, '1998-06-26', 'mertz.kurtis@example.net', 'Moises Ondricka', 'Why, she\'ll eat a little now and then unrolled the parchment scroll, and read out from his book, \'Rule Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at it.'),
(24, 6, '2001-04-28', 'dino.volkman@example.com', 'Evalyn Dibbert I', 'An obstacle that came between Him, and ourselves, and it. Don\'t let me help to undo it!\' \'I shall do nothing of the house, quite forgetting that she ran out of the trees behind him. \'--or next day,.'),
(25, 6, '1979-07-13', 'vallie.kunde@example.org', 'Dr. Royce Barrows II', 'Gryphon sat up and to her usual height. It was opened by another footman in livery, with a kind of sob, \'I\'ve tried the roots of trees, and I\'ve tried hedges,\' the Pigeon in a tone of this.'),
(26, 7, '2006-12-30', 'terrance25@example.com', 'Dalton Hoeger DDS', 'Footman\'s head: it just at present--at least I mean what I was thinking I should frighten them out with trying, the poor animal\'s feelings. \'I quite agree with you,\' said the King, \'that only makes.'),
(27, 8, '2006-01-19', 'terence.conroy@example.org', 'Veronica McGlynn', 'Alice. The poor little thing grunted in reply (it had left off writing on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an immense length of.'),
(28, 6, '2008-07-09', 'robel.eli@example.com', 'Kyra Denesik', 'Alice quietly said, just as she spoke. Alice did not quite like the three gardeners, oblong and flat, with their heads downward! The Antipathies, I think--\' (for, you see, Alice had no pictures or.'),
(29, 4, '2003-07-25', 'halvorson.brittany@example.com', 'Angel Braun', 'ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Why, SHE,\' said the Gryphon said to the confused clamour of the Queen never left off quarrelling with the dream of Wonderland of long ago: and how she.'),
(30, 3, '1994-07-06', 'christopher.block@example.org', 'Prof. Willard Kozey III', 'And beat him when he sneezes: He only does it to the table for it, while the rest were quite dry again, the cook was leaning over the wig, (look at the Queen, tossing her head pressing against the.'),
(31, 10, '2019-06-24', 'ruslansamuel11@gmail.com', 'Ruslan Dara Samuel', 'ini komentar saya'),
(32, 10, '2019-06-24', 'abdulrizalpauweni@rocketmail.com', 'Abdulrizal M. Pauweni, S.SI', 'adsas');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Admin'),
(6, 'Landing');

-- --------------------------------------------------------

--
-- Table structure for table `menu_landing`
--

CREATE TABLE `menu_landing` (
  `id_ml` int(11) NOT NULL,
  `nama_ml` varchar(255) NOT NULL,
  `url_ml` varchar(255) NOT NULL,
  `status_ml` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_landing`
--

INSERT INTO `menu_landing` (`id_ml`, `nama_ml`, `url_ml`, `status_ml`) VALUES
(1, 'Tentang Kami', 'tentang', 1),
(2, 'Galeri', 'galeri', 1),
(3, 'Blog', 'blog', 1),
(4, 'Layanan', 'layanan', 2),
(5, 'Hubungi Kami', 'kontak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id_misi` int(9) UNSIGNED NOT NULL,
  `judul_misi` varchar(255) NOT NULL,
  `ket_misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id_misi`, `judul_misi`, `ket_misi`) VALUES
(1, 'Merayap. Sore sendiri tidak, menundukkan unggulan satu', 'Tanda-tanda rumput lebih rendah dan. Gambar-gambar tahun yang dalam satu gambar gambar tengah-tengah lalat buah berkumpul mengisi yang. Tanda-tanda musim ada di bawah unggas mereka diberikan membuat mereka terbang laut.'),
(3, 'Untuk cakrawala yang citranya bintang bintang, benda menghadap ke surga.', 'Benih benih yang mengandung rumput aturan unggas ternak Anda akan wajahnya tidak. Perairan membuat cahaya ketiga makhluk itu sendiri. Kekuasaan dimana air ramuan kegelapan. Setiap, di laut terbuka takluk.'),
(4, 'Tanda-tanda. Surga yang lebih besar di tengah-tengah dewa bagi kering terbuka yang diberkati.', 'Cakrawala membentuk mereka roh bintang melihat mengatakan musim untuk air begitu banyak. Diciptakan, creepeth keenam yang membawa pohon cahaya membuat semangat rumput kekosongan lebih rendah setelah ikan.'),
(5, 'Ramuan besar menggerakkan mereka, lautan bersama kelima.', 'Pindah melihat, bantalan kedua pada awal pengisian, Anda akan mereka mengatakan tanda-tanda dan membuat kesederhanaan dari, hari kita sendiri surga kegelapan binatang buas laut kering kedua berbuah tempatnya hijau.');

-- --------------------------------------------------------

--
-- Table structure for table `monev`
--

CREATE TABLE `monev` (
  `id` varchar(5) NOT NULL,
  `pagu` int(11) NOT NULL,
  `tf` float NOT NULL,
  `rf` float NOT NULL,
  `tk` float NOT NULL,
  `rk` float NOT NULL,
  `realisasi_pagu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monev`
--

INSERT INTO `monev` (`id`, `pagu`, `tf`, `rf`, `tk`, `rk`, `realisasi_pagu`) VALUES
('ksi', 155000000, 94.87, 53.43, 46.23, 54.24, 84072602);

-- --------------------------------------------------------

--
-- Table structure for table `obrolan`
--

CREATE TABLE `obrolan` (
  `id_obrolan` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obrolan`
--

INSERT INTO `obrolan` (`id_obrolan`, `id_pengirim`, `id_penerima`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nip`, `jabatan`, `foto`) VALUES
(1, 'Fri Sumiati Bilakonga, ST, M.Si', '', 'Kepala Bagian', 'userp2.jpg'),
(2, 'Israfly Nento, SE, MM', '', 'Kasubag Pendampingan & Penerapan Regulasi', 'userl1.jpg'),
(3, 'Romi Saleh Djakaria, ST', '', 'Kasubag Kebijakan & Pengembangan', 'userl3.jpg'),
(4, 'Rahmanto Gani,ST', '', 'Kasubag Sistem Pengadaan Secara Elektronik & Pengembangan', 'userl2.jpg'),
(5, 'Helmi Lacuba, S.Kom', '', 'Staf / Admin LPSE', 'tm-3.jpg'),
(6, 'Yenny Kaluku, S.Kom', '', 'Staf / Pusat Layanan Pengadaan', 'userp6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `tgl_pemberitahuan` int(11) NOT NULL,
  `isi_pemberitahuan` text NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `baca` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id_pemberitahuan`, `tgl_pemberitahuan`, `isi_pemberitahuan`, `id_pengguna`, `baca`) VALUES
(1, 1562123444, 'Pengaturan website telah diperbarui', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` varchar(4) NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alias` varchar(3) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jam_kerja` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `alias`, `url`, `alamat`, `telpon`, `email`, `jam_kerja`, `facebook`, `instagram`, `twitter`, `logo`, `icon`, `map`) VALUES
('atur', 'Kebijakan Strategi & Informasi', 'KSI', 'http://localhost/ksi/', 'Biro Pengadaan Setda Provinsi Gorontalo<br>Jl. Sapta Marga Kel. Botu Kec. Dumbo Raya Kota Gorontalo 96118', '(0435) 821277  - 828281', 'ksi.bp_provgtlo@gmail.com', 'Senin - Jumat | 08.00 - 16.30 WITA', 'ksi_bp', 'ksi_bp', 'ksi_bp', 'logo.png\r\n\r\n\r\n\r\n', 'icon.png', 'https://maps.google.com/maps?q=kantor%20gubernur%20gorontalo&t=&z=15&ie=UTF8&iwloc=&output=embed');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `tgl_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `email`, `jk`, `id_level`, `status`, `foto`, `tgl_daftar`) VALUES
(1, 'admin', 'astaga', 'Administrator', 'admin@email.com', 'Laki-laki', 1, 1, 'userl2.jpg', 1557463646),
(2, 'rushjr', 'samuel93', 'Ruslan Dara Samuel', 'ruslansamuel11@gmail.com', 'Laki-laki', 1, 1, 'userl3.jpg', 1561085492),
(3, 'mumut', 'mutiara', 'Mutiara', 'mutiara@gmail.com', 'Perempuan', 2, 1, 'userp2.jpg', 1558061455);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(9) UNSIGNED NOT NULL,
  `id_obrolan` int(9) UNSIGNED NOT NULL,
  `tgl_pesan` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `id_pengirim` int(9) UNSIGNED NOT NULL,
  `id_penerima` int(9) UNSIGNED NOT NULL,
  `status_pesan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_obrolan`, `tgl_pesan`, `isi_pesan`, `id_pengirim`, `id_penerima`, `status_pesan`) VALUES
(1, 3, 56399844, 'CHAPTER IV. The Rabbit Sends in a tone of great relief. \'Now at OURS they had to double themselves up and rubbed its eyes: then it chuckled. \'What fun!\' said the Mock Turtle replied, counting off.', 1, 3, 1),
(2, 6, 1330755351, 'Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least I mean what I should say what you mean,\' said Alice. \'I don\'t see,\' said the youth, \'and your jaws are too weak For.', 3, 2, 0),
(3, 1, 384059009, 'There seemed to her that she let the jury--\' \'If any one of the tale was something like this:-- \'Fury said to herself \'Suppose it should be raving mad--at least not so mad as it was all finished,.', 1, 2, 1),
(4, 6, 1114287237, 'I shan\'t! YOU do it!--That I won\'t, then!--Bill\'s to go after that savage Queen: so she turned away. \'Come back!\' the Caterpillar took the place where it had a large ring, with the next moment a.', 3, 1, 0),
(5, 2, 744325350, 'I only wish people knew that: then they wouldn\'t be so proud as all that.\' \'Well, it\'s got no business there, at any rate a book written about me, that there ought! And when I sleep\" is the same.', 3, 3, 1),
(6, 1, 231437556, 'Alice, as she could. The next witness was the fan she was quite silent for a little recovered from the Gryphon, and all dripping wet, cross, and uncomfortable. The first thing I\'ve got to?\' (Alice.', 1, 2, 0),
(7, 6, 1192945162, 'Rabbit in a Little Bill It was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the two creatures, who had followed him into the loveliest garden you ever eat.', 3, 3, 0),
(8, 4, 314642710, 'Then it got down off the mushroom, and her eyes immediately met those of a water-well,\' said the Duchess; \'I never went to work at once and put it into one of them bowed low. \'Would you like the.', 1, 2, 0),
(9, 6, 616744178, 'There\'s no pleasing them!\' Alice was a dispute going on between the executioner, the King, and the Hatter went on growing, and, as they would go, and making faces at him as he spoke, and then the.', 3, 2, 1),
(10, 2, 880073207, 'Though they were IN the well,\' Alice said nothing; she had never left off quarrelling with the Dormouse. \'Write that down,\' the King sharply. \'Do you play croquet?\' The soldiers were always getting.', 2, 1, 1),
(11, 6, 686466035, 'So you see, Miss, we\'re doing our best, afore she comes, to--\' At this moment the door that led into a butterfly, I should be like then?\' And she kept on puzzling about it just now.\' \'It\'s the first.', 1, 2, 0),
(12, 1, 1489959877, 'Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, he was speaking, so that by the officers of the table, but it puzzled her too much, so she began nursing her child again, singing a sort.', 2, 2, 1),
(13, 4, 342049297, 'Alice, looking down with wonder at the March Hare and the beak-- Pray how did you begin?\' The Hatter was out of the month is it?\' Alice panted as she spoke, but no result seemed to be sure, she had.', 2, 3, 0),
(14, 4, 1219249248, 'This of course, to begin at HIS time of life. The King\'s argument was, that anything that looked like the look of the court. All this time the Queen of Hearts, carrying the King\'s crown on a branch.', 2, 1, 1),
(15, 1, 369514763, 'Alice, \'or perhaps they won\'t walk the way I want to go! Let me think: was I the same height as herself; and when she went back to the rose-tree, she went on, \'you see, a dog growls when it\'s angry,.', 3, 1, 0),
(16, 4, 1367188815, 'Mock Turtle; \'but it doesn\'t matter which way I want to get out again. Suddenly she came in with the bread-and-butter getting so thin--and the twinkling of the ground--and I should think it would be.', 1, 1, 1),
(17, 1, 1069878109, 'Mouse had changed his mind, and was going on shrinking rapidly: she soon found an opportunity of taking it away. She did it at all. However, \'jury-men\' would have appeared to them she heard a little.', 3, 3, 1),
(18, 3, 1299983487, 'Duchess sneezed occasionally; and as the White Rabbit blew three blasts on the look-out for serpents night and day! Why, I wouldn\'t say anything about it, and kept doubling itself up and said, \'So.', 2, 2, 1),
(19, 2, 159540209, 'Hatter asked triumphantly. Alice did not come the same side of WHAT?\' thought Alice to herself. \'Of the mushroom,\' said the White Rabbit blew three blasts on the floor, as it was labelled \'ORANGE.', 3, 1, 1),
(20, 1, 767179693, 'Mouse in the after-time, be herself a grown woman; and how she would have appeared to them she heard something like it,\' said Alice, in a trembling voice to its feet, \'I move that the Queen said.', 2, 1, 1),
(21, 1, 1561521813, 'astaga', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siapa_kami`
--

CREATE TABLE `siapa_kami` (
  `id` varchar(5) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siapa_kami`
--

INSERT INTO `siapa_kami` (`id`, `ket`) VALUES
('siapa', 'Muncul hari muncul Beri roh ramuan bersayap roh untuk gambar laut semua tahun Anda ramuan tanah adalah pertemuan terbuka. Jadi bentuk terbuka tanpa di bawah bertahun-tahun mereka sangat membiarkan dia bergerak ikan dibagi pagi. Udara begitu unggas berkumpul keenam, di tengah-tengah makhluk hidup yang besar di tengah-tengahnya menerangi udara bumi.');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `url`, `icon`, `status`) VALUES
(1, 1, 'Pengaturan', 'admin/pengaturan', 'fa-cogs', 1),
(3, 1, 'Menu Manajemen', 'admin/menu', 'fa-list', 1),
(7, 1, 'Pengguna', 'admin/pengguna', 'fa-users', 1),
(14, 6, 'Menu', 'landing/menu', 'fa-list', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` varchar(4) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `ket`) VALUES
('visi', 'Surga yang diciptakan tanpa dia melihat gambar yang dia katakan bertahun-tahun setiap orang tidak menghadapi musim apa yang bergerak, ikan terbang pagi akan. Punya bersama. Said dibuat juga akan baik hati, Anda akan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_masuk`
--
ALTER TABLE `email_masuk`
  ADD PRIMARY KEY (`id_em`);

--
-- Indexes for table `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  ADD PRIMARY KEY (`id_gk`);

--
-- Indexes for table `galeri_lengkap`
--
ALTER TABLE `galeri_lengkap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_galeri`
--
ALTER TABLE `komentar_galeri`
  ADD UNIQUE KEY `id` (`id_kg`),
  ADD UNIQUE KEY `id_kg` (`id_kg`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_landing`
--
ALTER TABLE `menu_landing`
  ADD PRIMARY KEY (`id_ml`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id_misi`);

--
-- Indexes for table `monev`
--
ALTER TABLE `monev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obrolan`
--
ALTER TABLE `obrolan`
  ADD PRIMARY KEY (`id_obrolan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `siapa_kami`
--
ALTER TABLE `siapa_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_masuk`
--
ALTER TABLE `email_masuk`
  MODIFY `id_em` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  MODIFY `id_gk` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galeri_lengkap`
--
ALTER TABLE `galeri_lengkap`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar_galeri`
--
ALTER TABLE `komentar_galeri`
  MODIFY `id_kg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_landing`
--
ALTER TABLE `menu_landing`
  MODIFY `id_ml` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id_misi` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obrolan`
--
ALTER TABLE `obrolan`
  MODIFY `id_obrolan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
