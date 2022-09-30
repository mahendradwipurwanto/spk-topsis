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
(1,'ADMIN','admin@spkbansos.com','$2y$10$5mLHXQU1HlxAlU4ckCvWc.fXhyDLTl5RzngEFmF6BzV2rTUa6GiZ6',1,1664492589,1656234898,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id`,`kode`,`kategori`,`keterangan`,`bobot`,`jenis`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'1','Pekerjaan','',5,0,1664498928,1,1664498933,1,1),
(2,'1','Rumah','TEST',4,2,1664498961,1,1664499062,1,0),
(3,'1','Pekerjaan','',5,1,1664506189,1,0,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id`,`kategori_id`,`kode`,`kriteria`,`keterangan`,`nilai`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,2,'1','SENG','',5,1664499717,1,1664508627,1,0),
(2,3,'1','CMYK','',3730,1664507078,1,1664508616,1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_penduduk` */

insert  into `tb_penduduk`(`id`,`nik`,`kk`,`nama`,`jenkel`,`alamat`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'EMP0010003','12512351231412','MAHENDRA DWI PURWANTO penduduk','Laki-laki','Singosari Malang',1664498058,1,1664498211,1,1),
(2,'EMP0010003','','Mahendra Dwi Purwanto','Laki-laki','',1664498517,1,0,0,0);

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
('mailer_alias','Ngodingin Indonesia',NULL,1664444535,0,0),
('mailer_host','smtp.gmail.com',NULL,1664444535,0,0),
('mailer_mode','0',NULL,1664444535,0,0),
('mailer_password','1234',NULL,1664444535,0,0),
('mailer_port','587',NULL,1664444535,0,0),
('mailer_username','ngodingin.indonesia@gmail.com',NULL,1664444535,0,0),
('web_desc','This is Base Project Template',NULL,1664444535,0,0),
('web_icon','icon.png',NULL,1664444535,0,0),
('web_logo','logo.png',NULL,1664444535,0,0),
('web_title','Base Project',NULL,1664444535,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
