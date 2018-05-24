# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 10.1.16-MariaDB)
# Database: cortina_ecommerce
# Generation Time: 2018-05-24 06:19:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Brand`;

CREATE TABLE `Brand` (
  `brand_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(150) NOT NULL DEFAULT '',
  `brand_desc` text NOT NULL,
  `brand logo` text NOT NULL,
  `brand_header_img` text NOT NULL,
  `brand_order` text NOT NULL,
  `brand_flag` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`brand_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Brand_page_carousel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Brand_page_carousel`;

CREATE TABLE `Brand_page_carousel` (
  `brand_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `brand_fk` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`brand_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `category_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL DEFAULT '',
  `category_order` int(11) NOT NULL,
  `category_flag` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Country`;

CREATE TABLE `Country` (
  `country_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(150) NOT NULL DEFAULT '',
  `Created_dtm` datetime NOT NULL,
  `Created_by` int(11) NOT NULL,
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` int(11) NOT NULL,
  PRIMARY KEY (`country_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Customer`;

CREATE TABLE `Customer` (
  `cust_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(150) NOT NULL DEFAULT '',
  `cust_fam_name` varchar(150) NOT NULL DEFAULT '',
  `cust_email` varchar(150) NOT NULL DEFAULT '',
  `cust_country_code` varchar(20) NOT NULL DEFAULT '',
  `cust_contact_num` bigint(20) NOT NULL,
  `cust_country_fk` int(11) NOT NULL,
  `cust_enc_pwd` varchar(150) NOT NULL DEFAULT '',
  `cust_gender` varchar(10) NOT NULL DEFAULT '',
  `cust_dob` date NOT NULL,
  `cust_pri_policy` varchar(10) NOT NULL DEFAULT '',
  `cust_sub_newsletter` varchar(10) NOT NULL DEFAULT '',
  `cust_purchase_before` varchar(10) NOT NULL DEFAULT '',
  `cust_flag` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`cust_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Customer_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Customer_address`;

CREATE TABLE `Customer_address` (
  `cust_add_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `add_label` int(11) NOT NULL,
  `add_customer_fk` int(11) NOT NULL,
  `add_title` varchar(5) NOT NULL DEFAULT '',
  `add_given_name` varchar(150) NOT NULL DEFAULT '',
  `add_fam_name` varchar(150) NOT NULL DEFAULT '',
  `add_country` varchar(150) NOT NULL DEFAULT '',
  `add_country_code` tinyint(3) NOT NULL,
  `add_contact_number` varchar(25) NOT NULL DEFAULT '',
  `add_address` text NOT NULL,
  `add_town_city` varchar(150) NOT NULL DEFAULT '',
  `add_state_region` varchar(150) NOT NULL DEFAULT '',
  `add_zipcode` int(11) NOT NULL,
  `add_flag` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`cust_add_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table E-manual
# ------------------------------------------------------------

DROP TABLE IF EXISTS `E-manual`;

CREATE TABLE `E-manual` (
  `emanual_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `em_video_url` varchar(150) NOT NULL DEFAULT '',
  `em_desc` varchar(150) NOT NULL DEFAULT '',
  `em_order` varchar(150) NOT NULL DEFAULT '',
  `em_flag` int(11) NOT NULL,
  PRIMARY KEY (`emanual_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Forgot_pwd_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Forgot_pwd_history`;

CREATE TABLE `Forgot_pwd_history` (
  `fph_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fph_label` int(11) NOT NULL,
  `fph_user_cust_fk` int(11) NOT NULL,
  `fph_rand_id` varchar(150) NOT NULL DEFAULT '',
  `fph_rand_id_status` int(11) NOT NULL,
  `fph_created_dtm` datetime NOT NULL,
  `fph_updated_dtm` datetime NOT NULL,
  PRIMARY KEY (`fph_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Internal_User
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Internal_User`;

CREATE TABLE `Internal_User` (
  `user_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(150) NOT NULL DEFAULT '',
  `u_email` varchar(150) NOT NULL DEFAULT '',
  `u_mobile` int(11) NOT NULL,
  `u_enc_pwd` varchar(150) NOT NULL DEFAULT '',
  `u_type` varchar(50) NOT NULL DEFAULT '',
  `u_flag` int(11) NOT NULL,
  `Created_dtm` datetime NOT NULL,
  `Created_by` varchar(150) NOT NULL DEFAULT '',
  `Updated_dtm` datetime NOT NULL,
  `Updated_by` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Views
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Views`;

CREATE TABLE `Views` (
  `view_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `view_label` int(11) NOT NULL,
  `view_url` varchar(150) NOT NULL DEFAULT '',
  `view_by` int(11) NOT NULL,
  `customer_fk` int(11) NOT NULL,
  `view_dtm` datetime NOT NULL,
  `view_flag` int(11) NOT NULL,
  PRIMARY KEY (`view_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Wishlist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Wishlist`;

CREATE TABLE `Wishlist` (
  `wish_pk` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_fk` int(11) NOT NULL,
  `wishlist_by` int(11) NOT NULL,
  `wishlist_dtm` datetime NOT NULL,
  `wishlist_flag` int(11) NOT NULL,
  PRIMARY KEY (`wish_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
