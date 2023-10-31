# Host: localhost  (Version 8.0.27)
# Date: 2023-01-12 16:21:45
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tb_user"
#

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `login_user` varchar(255) DEFAULT NULL,
  `pw_user` varchar(255) DEFAULT NULL,
  `nm_user` varchar(255) DEFAULT NULL,
  `validation_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for table "tb_pw"
#

DROP TABLE IF EXISTS `tb_pw`;
CREATE TABLE `tb_pw` (
  `id_pw` int unsigned NOT NULL AUTO_INCREMENT,
  `nm_app` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL,
  `tb_user_id_user` int NOT NULL,
  PRIMARY KEY (`id_pw`,`tb_user_id_user`),
  KEY `fk_tb_pw_tb_user_idx` (`tb_user_id_user`),
  CONSTRAINT `fk_tb_pw_tb_user` FOREIGN KEY (`tb_user_id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
