/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - online_weeding_services
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_weeding_services` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_weeding_services`;

/*Table structure for table `tbl_booking` */

DROP TABLE IF EXISTS `tbl_booking`;

CREATE TABLE `tbl_booking` (
  `bk_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_id` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  `bk_date` varchar(10) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`bk_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_booking` */

insert  into `tbl_booking`(`bk_id`,`f_id`,`h_id`,`m_id`,`bk_date`,`customer_id`,`status`) values 
(1,2,2,2,'21-20-2001',1,'paid'),
(2,2,2,2,'19-20-2001',1,'pending');

/*Table structure for table `tbl_card` */

DROP TABLE IF EXISTS `tbl_card`;

CREATE TABLE `tbl_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `card_name` varchar(25) DEFAULT NULL,
  `card_no` varchar(16) DEFAULT NULL,
  `card_type` varchar(15) DEFAULT NULL,
  `card_expiry` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_card` */

insert  into `tbl_card`(`card_id`,`customer_id`,`card_name`,`card_no`,`card_type`,`card_expiry`) values 
(1,1,'name','1234567890123456','gkhkjhlkj','2023-12');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `customer_name` varchar(25) DEFAULT NULL,
  `customer_district` varchar(15) DEFAULT NULL,
  `customer_pincode` varchar(6) DEFAULT NULL,
  `customer_city` varchar(15) DEFAULT NULL,
  `customer_house_name` varchar(50) DEFAULT NULL,
  `customer_state` varchar(15) DEFAULT NULL,
  `customer_phone` varchar(10) DEFAULT NULL,
  `date_added` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`customer_id`,`username`,`customer_name`,`customer_district`,`customer_pincode`,`customer_city`,`customer_house_name`,`customer_state`,`customer_phone`,`date_added`) values 
(1,'renu@gmail.com','renuka',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_food` */

DROP TABLE IF EXISTS `tbl_food`;

CREATE TABLE `tbl_food` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `f_rate` decimal(7,0) DEFAULT NULL,
  `f_type` varchar(15) DEFAULT NULL,
  `f_status` varchar(10) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_food` */

insert  into `tbl_food`(`f_id`,`staff_id`,`f_rate`,`f_type`,`f_status`,`f_name`) values 
(1,0,0,'none','Active','none'),
(2,0,500,'type','Active','food');

/*Table structure for table `tbl_hall` */

DROP TABLE IF EXISTS `tbl_hall`;

CREATE TABLE `tbl_hall` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `capacity` varchar(7) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `h_rate` decimal(8,2) DEFAULT NULL,
  `place` varchar(15) DEFAULT NULL,
  `h_status` varchar(10) DEFAULT NULL,
  `h_name` varchar(25) DEFAULT NULL,
  `h_image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hall` */

insert  into `tbl_hall`(`h_id`,`staff_id`,`capacity`,`size`,`h_rate`,`place`,`h_status`,`h_name`,`h_image`) values 
(1,0,'0','0',0.00,'none','Active','none','none'),
(2,0,'120','1',200.00,'place','Active','hall name','image/image_63633458bd11e.jpg');

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_type` varchar(8) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`username`,`password`,`user_type`,`status`) values 
('admin@gmail.com','admin','admin','Active'),
('renu@gmail.com','renu','Customer','Active');

/*Table structure for table `tbl_media` */

DROP TABLE IF EXISTS `tbl_media`;

CREATE TABLE `tbl_media` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `m_rate` decimal(8,2) DEFAULT NULL,
  `m_type` varchar(15) DEFAULT NULL,
  `m_status` varchar(10) DEFAULT NULL,
  `m_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_media` */

insert  into `tbl_media`(`m_id`,`staff_id`,`m_rate`,`m_type`,`m_status`,`m_name`) values 
(1,0,0.00,'none','Active','none'),
(2,0,500.00,'typw','Active','medianame'),
(3,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bk_id` int(11) DEFAULT NULL,
  `payment_date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`payment_id`,`bk_id`,`payment_date`) values 
(1,1,'2023-01-04');

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `staff_name` varchar(15) DEFAULT NULL,
  `staff_district` varchar(15) DEFAULT NULL,
  `staff_pincode` varchar(6) DEFAULT NULL,
  `staff_city` varchar(15) DEFAULT NULL,
  `staff_house_name` varchar(50) DEFAULT NULL,
  `staff_state` varchar(25) DEFAULT NULL,
  `staff_phone` varchar(13) DEFAULT NULL,
  `staff_salary` varchar(15) DEFAULT NULL,
  `date_added` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
