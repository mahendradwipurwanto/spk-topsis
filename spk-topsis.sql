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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_auth` */

insert  into `tb_auth`(`user_id`,`nama`,`email`,`password`,`role`,`log_time`,`created_at`,`is_deleted`) values 
(1,'ADMIN','admin@spktopsis.com','$2y$10$5mLHXQU1HlxAlU4ckCvWc.fXhyDLTl5RzngEFmF6BzV2rTUa6GiZ6',1,1669076916,1656234898,0);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
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

insert  into `tb_kategori`(`id`,`kode`,`kategori`,`keterangan`,`jenis`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(10,'C1','Tinggi Badan','',1,1669043044,0,0,0,0),
(11,'C2','Berat Badan','',1,1669043050,0,0,0,0),
(12,'C3','Lingkar Kepala','',1,1669043055,0,0,0,0),
(13,'C4','Kognitif','',1,1669043062,0,0,0,0),
(14,'C5','Motorik Kasar','',1,1669043072,0,0,0,0),
(15,'C6','Motorik Halus','',1,1669043080,0,0,0,0),
(16,'C7','SOsial','',1,1669043085,0,0,0,0),
(17,'C8','Kemandirian','',1,1669043090,0,0,0,0),
(18,'C9','Emosional','',1,1669043097,0,0,0,0),
(19,'C10','Agama','',1,1669043103,0,0,0,0),
(20,'C11','Bahasa','',1,1669043107,0,0,0,0),
(21,'C12','Seni','',1,1669043112,0,0,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `tb_penilaian` */

insert  into `tb_penilaian`(`id`,`siswa_id`,`kategori_id`,`nilai`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(15,5,10,5,1669077110,1,1669077529,1,0),
(16,5,19,4,1669077110,1,1669077529,1,0),
(17,5,20,3,1669077110,1,1669077529,1,0),
(18,5,21,2,1669077110,1,1669077529,1,0),
(19,5,11,1,1669077110,1,1669077529,1,0),
(20,5,12,5,1669077110,1,1669077529,1,0),
(21,5,13,4,1669077110,1,1669077529,1,0),
(22,5,14,3,1669077110,1,1669077529,1,0),
(23,5,15,2,1669077110,1,1669077529,1,0),
(24,5,16,1,1669077110,1,1669077529,1,0),
(25,5,17,5,1669077110,1,1669077529,1,0),
(26,5,18,4,1669077110,1,1669077529,1,0);

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
  `nip` varchar(20) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL DEFAULT '-',
  `alamat` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`nip`,`nama`,`jenkel`,`alamat`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(5,'9992055127','Mahendra Dwi Purwanto','Laki-laki','Singosari',1669042190,0,1669042198,0,0),
(6,'9992055129','Ngodingin','Laki-laki','',1669042209,0,0,0,0),
(7,'9992055125','Ajeng Salsabilla','Perempuan','',1669042217,0,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
