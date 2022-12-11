/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_spktopsis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `tb_auth` */

DROP TABLE IF EXISTS `tb_auth`;

CREATE TABLE `tb_auth` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT 'User',
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) NOT NULL DEFAULT 2 COMMENT '1: Admin; 2: Pengguna',
  `log_time` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `tb_auth` */

insert  into `tb_auth`(`user_id`,`nama`,`email`,`password`,`role`,`log_time`,`created_at`,`is_deleted`) values 
(1,'ADMIN','admin@spktopsis.com','$2y$10$5mLHXQU1HlxAlU4ckCvWc.fXhyDLTl5RzngEFmF6BzV2rTUa6GiZ6',1,1670572689,1656234898,0),
(2,'Guru Test','gurutest@gmail.com','$2y$10$8P9nf4zAv6F8HJUe3HkCDeEgx2bte/LrVUgOnZjoMKH892UhbuG22',2,1670765321,1670764803,1),
(3,'Guru 1','guru1@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',2,1670765372,1670764867,0),
(4,'ABIYYU NAKHLAH ARTANTA','siswa1@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670766172,1670764867,0),
(5,'AISYA PUTRI RAMADHANI','siswa2@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(6,'ALYATUS SYAFIRA','siswa3@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(7,'ARABELLA QUEENKA VIRRANZA','siswa4@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(8,'ARETHA DANEEN GHEIS VERSACE','siswa5@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(9,'Chalista Pradipta Berliana','siswa6@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(10,'CHALISTA PUTRI','siswa7@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(11,'	\r\nElsa Faradita','siswa8@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(12,'GRACEA DWISETYA ANANDA','siswa9@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(13,'JIHAN RIFANDA AISYAH','siswa10@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(14,'KENZO ARZACHEL RAMADHAN SAPUTRA','siswa11@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(15,'	KIMORA SAFAQUELA ELCHOSIM','siswa12@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(16,'MUHAMMAD FATHI FARHAD','siswa13@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(17,'NAYRA RHEVANIA PUTRI PRASETYO','siswa14@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(18,'	\r\nWIEFY ALDEN KENZHI CAHYONO','siswa15@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0),
(19,'ZHAFRAN AZKAIBRAHIM R.','siswa16@gmail.com','$2y$10$hDaqoeqE11y68nbTnlnSAuroX11nfLKpngnVL223l7hFUT2k81WSu',3,1670765372,1670764867,0);

/*Table structure for table `tb_guru` */

DROP TABLE IF EXISTS `tb_guru`;

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jenkel` varchar(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`id`,`user_id`,`nip`,`jenkel`,`alamat`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,2,'10959318594280','0','Singosari\r\nCandirenggo',1670764803,1,1670764821,1,1),
(2,3,'143141551','Perempuan','Singosari\r\nCandirenggo',1670764867,1,1670765195,1,0);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `jenis` int(5) NOT NULL DEFAULT 1 COMMENT '1: pendapatan; 2: pengeluaran',
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id`,`kode`,`kategori`,`bobot`,`keterangan`,`jenis`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(10,'C1','Tinggi Badan',90,'',1,1669043044,0,1669287943,1,0),
(11,'C2','Berat Badan',90,'',1,1669043050,0,1669287953,1,0),
(12,'C3','Lingkar Kepala',90,'',1,1669043055,0,1669287960,1,0),
(13,'C4','Kognitif',75,'',1,1669043062,0,1669287970,1,0),
(14,'C5','Motorik Kasar',75,'',1,1669043072,0,1669287990,1,0),
(15,'C6','Motorik Halus',75,'',1,1669043080,0,1669288000,1,0),
(16,'C7','SOsial',75,'',1,1669043085,0,1669288005,1,0),
(17,'C8','Kemandirian',75,'',1,1669043090,0,1669288011,1,0),
(18,'C9','Emosional',75,'',1,1669043097,0,1669288040,1,0),
(19,'C10','Agama',90,'',1,1669043103,0,1669288035,1,0),
(20,'C11','Bahasa',80,'',1,1669043107,0,1669288029,1,0),
(21,'C12','Seni',75,'',1,1669043112,0,1669288019,1,0);

/*Table structure for table `tb_penilaian` */

DROP TABLE IF EXISTS `tb_penilaian`;

CREATE TABLE `tb_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8;

/*Data for the table `tb_penilaian` */

insert  into `tb_penilaian`(`id`,`siswa_id`,`kategori_id`,`nilai`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(15,5,10,2,1669077110,1,1669282904,1,1),
(16,5,19,3,1669077110,1,1669282904,1,1),
(17,5,20,3,1669077110,1,1669282904,1,1),
(18,5,21,2,1669077110,1,1669282904,1,1),
(19,5,11,2,1669077110,1,1669282904,1,1),
(20,5,12,2,1669077110,1,1669282904,1,1),
(21,5,13,3,1669077110,1,1669282904,1,1),
(22,5,14,3,1669077110,1,1669282904,1,1),
(23,5,15,3,1669077110,1,1669282904,1,1),
(24,5,16,3,1669077110,1,1669282904,1,1),
(25,5,17,3,1669077110,1,1669282904,1,1),
(26,5,18,3,1669077110,1,1669282904,1,1),
(27,7,10,3,1669280532,1,1669282707,1,1),
(28,7,19,5,1669280532,1,1669282707,1,1),
(29,7,20,2,1669280532,1,1669282707,1,1),
(30,7,21,3,1669280532,1,1669282707,1,1),
(31,7,11,1,1669280532,1,1669282707,1,1),
(32,7,12,2,1669280532,1,1669282707,1,1),
(33,7,13,4,1669280532,1,1669282707,1,1),
(34,7,14,5,1669280532,1,1669282707,1,1),
(35,7,15,1,1669280532,1,1669282707,1,1),
(36,7,16,2,1669280532,1,1669282707,1,1),
(37,7,17,4,1669280532,1,1669282707,1,1),
(38,7,18,3,1669280532,1,1669282707,1,1),
(39,5,10,2,1669282722,1,1669282904,1,0),
(40,5,19,3,1669282722,1,1669282904,1,0),
(41,5,20,3,1669282722,1,1669282904,1,0),
(42,5,21,2,1669282722,1,1669282904,1,0),
(43,5,11,2,1669282722,1,1669282904,1,0),
(44,5,12,2,1669282722,1,1669282904,1,0),
(45,5,13,3,1669282722,1,1669282904,1,0),
(46,5,14,3,1669282722,1,1669282904,1,0),
(47,5,15,3,1669282722,1,1669282904,1,0),
(48,5,16,3,1669282722,1,1669282904,1,0),
(49,5,17,3,1669282722,1,1669282904,1,0),
(50,5,18,3,1669282722,1,1669282904,1,0),
(51,6,10,3,1669282735,1,1669282812,1,0),
(52,6,19,3,1669282735,1,1669282812,1,0),
(53,6,20,3,1669282735,1,1669282812,1,0),
(54,6,21,3,1669282735,1,1669282812,1,0),
(55,6,11,3,1669282735,1,1669282812,1,0),
(56,6,12,3,1669282735,1,1669282812,1,0),
(57,6,13,3,1669282735,1,1669282812,1,0),
(58,6,14,3,1669282735,1,1669282812,1,0),
(59,6,15,3,1669282735,1,1669282812,1,0),
(60,6,16,2,1669282735,1,1669282812,1,0),
(61,6,17,3,1669282735,1,1669282812,1,0),
(62,6,18,3,1669282735,1,1669282812,1,0),
(63,7,10,3,1669282798,1,0,0,0),
(64,7,19,3,1669282798,1,0,0,0),
(65,7,20,3,1669282798,1,0,0,0),
(66,7,21,3,1669282798,1,0,0,0),
(67,7,11,3,1669282798,1,0,0,0),
(68,7,12,3,1669282798,1,0,0,0),
(69,7,13,3,1669282798,1,0,0,0),
(70,7,14,3,1669282798,1,0,0,0),
(71,7,15,2,1669282798,1,0,0,0),
(72,7,16,3,1669282798,1,0,0,0),
(73,7,17,3,1669282798,1,0,0,0),
(74,7,18,3,1669282798,1,0,0,0),
(75,8,10,2,1669282841,1,1669282931,1,0),
(76,8,19,4,1669282841,1,1669282931,1,0),
(77,8,20,3,1669282841,1,1669282931,1,0),
(78,8,21,3,1669282841,1,1669282931,1,0),
(79,8,11,3,1669282841,1,1669282931,1,0),
(80,8,12,3,1669282841,1,1669282931,1,0),
(81,8,13,2,1669282841,1,1669282931,1,0),
(82,8,14,3,1669282841,1,1669282931,1,0),
(83,8,15,3,1669282841,1,1669282931,1,0),
(84,8,16,3,1669282841,1,1669282931,1,0),
(85,8,17,3,1669282841,1,1669282931,1,0),
(86,8,18,3,1669282841,1,1669282931,1,0),
(87,9,10,2,1669282960,1,0,0,0),
(88,9,11,3,1669282960,1,0,0,0),
(89,9,12,3,1669282960,1,0,0,0),
(90,9,13,3,1669282960,1,0,0,0),
(91,9,14,3,1669282960,1,0,0,0),
(92,9,15,3,1669282960,1,0,0,0),
(93,9,16,3,1669282960,1,0,0,0),
(94,9,17,3,1669282960,1,0,0,0),
(95,9,18,3,1669282960,1,0,0,0),
(96,9,19,3,1669282960,1,0,0,0),
(97,9,20,3,1669282960,1,0,0,0),
(98,9,21,3,1669282960,1,0,0,0),
(99,10,10,3,1669282979,1,0,0,0),
(100,10,11,3,1669282979,1,0,0,0),
(101,10,12,3,1669282979,1,0,0,0),
(102,10,13,3,1669282979,1,0,0,0),
(103,10,14,3,1669282979,1,0,0,0),
(104,10,15,3,1669282979,1,0,0,0),
(105,10,16,3,1669282979,1,0,0,0),
(106,10,17,3,1669282979,1,0,0,0),
(107,10,18,3,1669282979,1,0,0,0),
(108,10,19,3,1669282979,1,0,0,0),
(109,10,20,3,1669282979,1,0,0,0),
(110,10,21,3,1669282979,1,0,0,0),
(111,11,10,2,1669282997,1,0,0,0),
(112,11,11,3,1669282997,1,0,0,0),
(113,11,12,3,1669282997,1,0,0,0),
(114,11,13,3,1669282997,1,0,0,0),
(115,11,14,3,1669282997,1,0,0,0),
(116,11,15,3,1669282997,1,0,0,0),
(117,11,16,3,1669282997,1,0,0,0),
(118,11,17,3,1669282997,1,0,0,0),
(119,11,18,3,1669282997,1,0,0,0),
(120,11,19,3,1669282997,1,0,0,0),
(121,11,20,3,1669282997,1,0,0,0),
(122,11,21,3,1669282997,1,0,0,0),
(123,12,10,2,1669283016,1,0,0,0),
(124,12,11,3,1669283016,1,0,0,0),
(125,12,12,3,1669283016,1,0,0,0),
(126,12,13,3,1669283016,1,0,0,0),
(127,12,14,3,1669283016,1,0,0,0),
(128,12,15,3,1669283016,1,0,0,0),
(129,12,16,3,1669283016,1,0,0,0),
(130,12,17,3,1669283016,1,0,0,0),
(131,12,18,3,1669283016,1,0,0,0),
(132,12,19,3,1669283016,1,0,0,0),
(133,12,20,3,1669283016,1,0,0,0),
(134,12,21,3,1669283016,1,0,0,0),
(135,13,10,4,1669283037,1,1669285666,1,0),
(136,13,11,4,1669283037,1,1669285666,1,0),
(137,13,12,3,1669283037,1,1669285666,1,0),
(138,13,13,3,1669283037,1,1669285666,1,0),
(139,13,14,2,1669283037,1,1669285666,1,0),
(140,13,15,3,1669283037,1,1669285666,1,0),
(141,13,16,3,1669283037,1,1669285666,1,0),
(142,13,17,3,1669283037,1,1669285666,1,0),
(143,13,18,3,1669283037,1,1669285666,1,0),
(144,13,19,3,1669283037,1,1669285666,1,0),
(145,13,20,3,1669283037,1,1669285666,1,0),
(146,13,21,3,1669283037,1,1669285666,1,0),
(147,14,10,2,1669283059,1,0,0,0),
(148,14,11,3,1669283059,1,0,0,0),
(149,14,12,3,1669283059,1,0,0,0),
(150,14,13,3,1669283059,1,0,0,0),
(151,14,14,3,1669283059,1,0,0,0),
(152,14,15,3,1669283059,1,0,0,0),
(153,14,16,3,1669283059,1,0,0,0),
(154,14,17,2,1669283059,1,0,0,0),
(155,14,18,3,1669283059,1,0,0,0),
(156,14,19,3,1669283059,1,0,0,0),
(157,14,20,3,1669283059,1,0,0,0),
(158,14,21,3,1669283059,1,0,0,0),
(159,15,10,3,1669283077,1,0,0,0),
(160,15,11,3,1669283077,1,0,0,0),
(161,15,12,3,1669283077,1,0,0,0),
(162,15,13,3,1669283077,1,0,0,0),
(163,15,14,3,1669283077,1,0,0,0),
(164,15,15,3,1669283077,1,0,0,0),
(165,15,16,3,1669283077,1,0,0,0),
(166,15,17,3,1669283077,1,0,0,0),
(167,15,18,3,1669283077,1,0,0,0),
(168,15,19,3,1669283077,1,0,0,0),
(169,15,20,3,1669283077,1,0,0,0),
(170,15,21,3,1669283077,1,0,0,0),
(171,16,10,2,1669283102,1,0,0,0),
(172,16,11,2,1669283102,1,0,0,0),
(173,16,12,3,1669283102,1,0,0,0),
(174,16,13,3,1669283102,1,0,0,0),
(175,16,14,3,1669283102,1,0,0,0),
(176,16,15,3,1669283102,1,0,0,0),
(177,16,16,2,1669283102,1,0,0,0),
(178,16,17,3,1669283102,1,0,0,0),
(179,16,18,3,1669283102,1,0,0,0),
(180,16,19,3,1669283102,1,0,0,0),
(181,16,20,3,1669283102,1,0,0,0),
(182,16,21,3,1669283102,1,0,0,0),
(183,17,10,2,1669283118,1,0,0,0),
(184,17,11,3,1669283118,1,0,0,0),
(185,17,12,3,1669283118,1,0,0,0),
(186,17,13,3,1669283118,1,0,0,0),
(187,17,14,3,1669283118,1,0,0,0),
(188,17,15,3,1669283118,1,0,0,0),
(189,17,16,3,1669283118,1,0,0,0),
(190,17,17,3,1669283118,1,0,0,0),
(191,17,18,3,1669283118,1,0,0,0),
(192,17,19,3,1669283118,1,0,0,0),
(193,17,20,3,1669283118,1,0,0,0),
(194,17,21,3,1669283118,1,0,0,0),
(195,18,10,3,1669283138,1,0,0,0),
(196,18,11,3,1669283138,1,0,0,0),
(197,18,12,3,1669283138,1,0,0,0),
(198,18,13,3,1669283138,1,0,0,0),
(199,18,14,3,1669283138,1,0,0,0),
(200,18,15,3,1669283138,1,0,0,0),
(201,18,16,3,1669283138,1,0,0,0),
(202,18,17,3,1669283138,1,0,0,0),
(203,18,18,2,1669283138,1,0,0,0),
(204,18,19,3,1669283138,1,0,0,0),
(205,18,20,3,1669283138,1,0,0,0),
(206,18,21,3,1669283138,1,0,0,0),
(207,19,10,4,1669283158,1,0,0,0),
(208,19,11,4,1669283158,1,0,0,0),
(209,19,12,3,1669283158,1,0,0,0),
(210,19,13,4,1669283158,1,0,0,0),
(211,19,14,3,1669283158,1,0,0,0),
(212,19,15,3,1669283158,1,0,0,0),
(213,19,16,3,1669283158,1,0,0,0),
(214,19,17,4,1669283158,1,0,0,0),
(215,19,18,3,1669283158,1,0,0,0),
(216,19,19,3,1669283158,1,0,0,0),
(217,19,20,4,1669283158,1,0,0,0),
(218,19,21,4,1669283158,1,0,0,0);

/*Table structure for table `tb_settings` */

DROP TABLE IF EXISTS `tb_settings`;

CREATE TABLE `tb_settings` (
  `key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_settings` */

insert  into `tb_settings`(`key`,`value`,`desc`,`created_at`,`modified_at`,`is_deleted`) values 
('mailer_alias','SPK TOPSIS',NULL,1664444535,0,0),
('mailer_connection','ssl',NULL,0,0,0),
('mailer_host','smtp.googlemail.com',NULL,1664444535,0,0),
('mailer_mode','0',NULL,1664444535,0,0),
('mailer_password','ctzpmwrozzycessd',NULL,1664444535,0,0),
('mailer_port','465',NULL,1664444535,0,0),
('mailer_username','ngodingin.indonesia@gmail.com',NULL,1664444535,0,0),
('web_desc','Penerapan metode SPK TOPSIS',NULL,1664444535,0,0),
('web_icon','icon.png',NULL,1664444535,0,0),
('web_logo','logo.png',NULL,1664444535,0,0),
('web_title','SPK TOPSIS',NULL,1664444535,0,0);

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nip` varchar(20) NOT NULL DEFAULT '0',
  `jenkel` varchar(10) NOT NULL DEFAULT '-',
  `alamat` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`user_id`,`nip`,`jenkel`,`alamat`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(5,4,'9992055127','Laki-laki','Singosari',1669042190,0,1669282544,1,0),
(6,5,'9992055129','Laki-laki','',1669042209,0,1669281193,1,0),
(7,6,'9992055125','Laki-laki','',1669042217,0,1669282521,1,0),
(8,7,'9992055129','Laki-laki','',1669281204,1,1669282533,1,0),
(9,8,'9992055125','Laki-laki','',1669281210,1,0,0,0),
(10,9,'9992055127','Laki-laki','',1669281215,1,1669282539,1,0),
(11,10,'9992055127','Laki-laki','',1669281220,1,0,0,0),
(12,11,'9992055129','Perempuan','',1669281227,1,0,0,0),
(13,12,'9992055127','Perempuan','',1669281234,1,0,0,0),
(14,13,'9992055129','Laki-laki','',1669281242,1,0,0,0),
(15,14,'9992055129','Laki-laki','',1669281249,1,0,0,0),
(16,15,'9992055125','Laki-laki','',1669281257,1,1670765689,1,0),
(17,16,'9992055129','Laki-laki','',1669281262,1,0,0,0),
(18,17,'9992055129','Laki-laki','',1669281269,1,0,0,0),
(19,18,'9992055129','Laki-laki','',1669281275,1,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
