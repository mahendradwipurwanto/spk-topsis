/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_spkbansos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_spkbansos` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_spkbansos`;

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
(1,'ADMIN','admin@spkbansos.com','$2y$10$5mLHXQU1HlxAlU4ckCvWc.fXhyDLTl5RzngEFmF6BzV2rTUa6GiZ6',1,1668343194,1656234898,0);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `bobot` int(5) NOT NULL COMMENT '1 s.d. 5',
  `jenis` int(5) NOT NULL DEFAULT 1 COMMENT '1: pendapatan; 2: pengeluaran',
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id`,`kode`,`kategori`,`keterangan`,`bobot`,`jenis`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(7,'C1','Pekerjaan','',5,1,1664550047,1,0,0,0),
(8,'C2','Rumah','',5,1,1664550059,1,0,0,0),
(9,'C3','Jumlah Keluarga','TEST',3,2,1666523815,1,0,0,0);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id`,`kategori_id`,`kode`,`kriteria`,`keterangan`,`nilai`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(3,8,'W1','Tipe 29','',4,1664550089,1,1666523970,1,0),
(4,8,'W2','Tipe 24','',3,1664550106,1,1666523870,1,0),
(5,7,'W3','CMYK','',0,1666516497,1,1666516583,1,1),
(6,7,'W4','SWASTA','',5,1666516795,1,0,0,0),
(7,9,'W5','Tip 32','',5,1666523980,1,1666523987,1,1),
(8,7,'S6','PNS','',4,1666524140,1,0,0,0),
(9,7,'S7','Pengusaha','',5,1666524151,1,0,0,0),
(10,9,'S8','3 Orang','',2,1666524168,1,0,0,0),
(11,9,'S9','5','',4,1666524175,1,0,0,0),
(12,9,'S10','> 5','',5,1666524179,1,0,0,0),
(13,8,'S11','Tipe 32','',5,1666524226,1,0,0,0);

/*Table structure for table `tb_penduduk` */

DROP TABLE IF EXISTS `tb_penduduk`;

CREATE TABLE `tb_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL DEFAULT '0',
  `kk` varchar(30) DEFAULT '0',
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL DEFAULT '-',
  `alamat` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tb_penduduk` */

insert  into `tb_penduduk`(`id`,`nik`,`kk`,`nama`,`jenkel`,`alamat`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'EMP0010003','12512351231412','MAHENDRA DWI PURWANTO penduduk','Laki-laki','Singosari Malang',1664498058,1,1664498211,1,1),
(2,'EMP0010003','12512351231412','Mahendra Dwi Purwanto','Laki-laki','',1664498517,1,1666523575,1,0),
(3,'EMP0010011','12512351231412','Ngodingin Indonesia','Laki-laki','',1666525041,1,0,0,0),
(4,'14253145','12512351231412','Ajeng','Perempuan','',1668348060,1,1668348066,1,0);

/*Table structure for table `tb_penilaian` */

DROP TABLE IF EXISTS `tb_penilaian`;

CREATE TABLE `tb_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penduduk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tb_penilaian` */

insert  into `tb_penilaian`(`id`,`penduduk_id`,`kategori_id`,`kriteria_id`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,2,8,4,1666521179,1,1666524246,1,1),
(2,2,7,6,1666521179,1,1666524246,1,1),
(3,2,7,6,1666524235,1,1666524246,1,0),
(4,2,8,4,1666524235,1,1666524246,1,0),
(5,2,9,10,1666524235,1,1666524246,1,0),
(6,3,7,8,1666525067,1,0,0,0),
(7,3,8,4,1666525067,1,0,0,0),
(8,3,9,11,1666525067,1,0,0,0),
(9,4,7,8,1668348087,1,0,0,0),
(10,4,8,3,1668348087,1,0,0,0),
(11,4,9,10,1668348087,1,0,0,0),
(12,4,7,8,1668348087,1,0,0,0),
(13,4,8,3,1668348087,1,0,0,0),
(14,4,9,10,1668348087,1,0,0,0);

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
('mailer_alias','SPK BANSOS',NULL,1664444535,0,0),
('mailer_connection','ssl',NULL,0,0,0),
('mailer_host','smtp.googlemail.com',NULL,1664444535,0,0),
('mailer_mode','0',NULL,1664444535,0,0),
('mailer_password','ctzpmwrozzycessd',NULL,1664444535,0,0),
('mailer_port','465',NULL,1664444535,0,0),
('mailer_username','ngodingin.indonesia@gmail.com',NULL,1664444535,0,0),
('web_desc','Penerapan metode weighted product untuk penerimaan bantuan sosial di malang',NULL,1664444535,0,0),
('web_icon','icon.png',NULL,1664444535,0,0),
('web_logo','logo.png',NULL,1664444535,0,0),
('web_title','SPK BANSOS',NULL,1664444535,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
