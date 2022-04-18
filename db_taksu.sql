/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - db_taksu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_taksu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_taksu`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL AUTO_INCREMENT,
  `nama_admin` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama_admin`,`email`,`no_hp`,`username`,`password`) values 
(1,'Eko','eko@gmail.com',1122,'tsar','1234');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(20) DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `password` int(20) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id_order` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `id_tari` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `user_id` (`user_id`),
  KEY `id_tari` (`id_tari`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_tari`) REFERENCES `tari` (`id_tari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `order` */

/*Table structure for table `sanggar` */

DROP TABLE IF EXISTS `sanggar`;

CREATE TABLE `sanggar` (
  `id_sanggar` int(10) NOT NULL AUTO_INCREMENT,
  `nama_sanggar` text DEFAULT NULL,
  `alamat_sanggar` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `crated_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sanggar`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sanggar` */

insert  into `sanggar`(`id_sanggar`,`nama_sanggar`,`alamat_sanggar`,`email`,`no_hp`,`username`,`password`,`salt`,`crated_at`,`updated_at`,`deleted_at`) values 
(1,'Sanggar A','Badingkayu','aaa@gmail.com',1,'pebri','2JTvxwmo7dZaNtzLlQ8JtiAj+PQ2N2U2YjZkZDFm','67e6b6dd1f',NULL,NULL,NULL),
(5,'Alpha','denpasar','ufikganteng@gmail.com',825683676,'eko','12345',NULL,NULL,NULL,NULL),
(8,'Naruto','Rusia','eko@eko.com',1,'sanggar1','2JTvxwmo7dZaNtzLlQ8JtiAj+PQ2N2U2YjZkZDFm','67e6b6dd1f',NULL,NULL,NULL),
(9,'Sanggar wayang','Rusia','dahdaau@gmail.com',1,'eka','67890',NULL,NULL,NULL,NULL);

/*Table structure for table `tari` */

DROP TABLE IF EXISTS `tari`;

CREATE TABLE `tari` (
  `sanggar` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `id_tari` int(20) NOT NULL AUTO_INCREMENT,
  `harga` int(20) DEFAULT NULL,
  `tari` text DEFAULT NULL,
  `id_sanggar` int(11) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id_tari`),
  KEY `id_sanggar` (`id_sanggar`),
  CONSTRAINT `tari_ibfk_1` FOREIGN KEY (`id_sanggar`) REFERENCES `sanggar` (`id_sanggar`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tari` */

insert  into `tari`(`sanggar`,`durasi`,`id_tari`,`harga`,`tari`,`id_sanggar`,`gambar`) values 
('Inazuma','10 menit',32,200,'hilcurt',NULL,NULL),
('Inazuma','10 menit',33,500,'hilcurt',NULL,NULL),
('Kenriah','3 menit',37,500,'hilcurt',NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_email` text DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `login_id` int(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `login_id` (`login_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
