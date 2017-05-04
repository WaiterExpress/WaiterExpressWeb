--
-- Copyright (C) 2017 Luis Cortes Juarez
--
-- An open source application development framework for PHP
--
-- This content is released under the MIT License (MIT)
--
-- Copyright (c) 2017, DevFy
--
-- Permission is hereby granted, free of charge, to any person obtaining a copy
-- of this software and associated documentation files (the "Software"), to deal
-- in the Software without restriction, including without limitation the rights
-- to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
-- copies of the Software, and to permit persons to whom the Software is
-- furnished to do so, subject to the following conditions:
--
-- The above copyright notice and this permission notice shall be included in
-- all copies or substantial portions of the Software.
--
-- THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
-- IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
-- FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
-- AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
-- LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
-- OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
-- THE SOFTWARE.
--
-- @package	DevfyFramework
-- @author	Luis Cortes | DevFy
-- @copyright	Copyright (c) 2017, DevFy. (http://www.devfy.net/)
-- @license	http://opensource.org/licenses/MIT	MIT License
-- @link	http://www.devfy.net
-- @since	Version 1.0.0
-- @filesource
--

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `avatar` */

DROP TABLE IF EXISTS `avatar`;

CREATE TABLE `avatar` (
  `id` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `avatar` VARCHAR(10) DEFAULT 'avatar.png',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `avatar` */

LOCK TABLES `avatar` WRITE;

UNLOCK TABLES;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` INT(11) NOT NULL,
  `id_restaurante` INT(11) DEFAULT NULL,
  `nombre` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

UNLOCK TABLES;

/*Table structure for table `empleados_restaurante` */

DROP TABLE IF EXISTS `empleados_restaurante`;

CREATE TABLE `empleados_restaurante` (
  `id` INT(11) DEFAULT NULL,
  `id_restaurante` INT(11) DEFAULT NULL,
  `id_empledo` CHAR(15) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'0',
  KEY `fk_id_restaurante` (`id_restaurante`),
  KEY `fk_id_empleado` (`id_empledo`),
  CONSTRAINT `fk_id_empleado` FOREIGN KEY (`id_empledo`) REFERENCES `usuario_datos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `empleados_restaurante` */

LOCK TABLES `empleados_restaurante` WRITE;

UNLOCK TABLES;

/*Table structure for table `foto_producto` */

DROP TABLE IF EXISTS `foto_producto`;

CREATE TABLE `foto_producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_producto` INT(11) DEFAULT NULL,
  `foto` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_producto_foto` (`id_producto`),
  CONSTRAINT `fk_id_producto_foto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `foto_producto` */

LOCK TABLES `foto_producto` WRITE;

UNLOCK TABLES;

/*Table structure for table `foto_restaurante` */

DROP TABLE IF EXISTS `foto_restaurante`;

CREATE TABLE `foto_restaurante` (
  `id_restaurante` INT(11) DEFAULT NULL,
  `foto` VARCHAR(15) DEFAULT 'imagen.png',
  KEY `fk_restaurante` (`id_restaurante`),
  CONSTRAINT `fk_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `foto_restaurante` */

LOCK TABLES `foto_restaurante` WRITE;

UNLOCK TABLES;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` INT(11) NOT NULL,
  `id_restaurante` INT(11) DEFAULT NULL,
  `id_producto` INT(11) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_id_producto_menu` (`id_producto`),
  KEY `fk_id_restaurante_menu` (`id_restaurante`),
  CONSTRAINT `fk_id_producto_menu` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_restaurante_menu` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

LOCK TABLES `menu` WRITE;

UNLOCK TABLES;

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cat` INT(11) DEFAULT NULL,
  `codigo` CHAR(5) DEFAULT NULL,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `descripcion` TEXT,
  `precio` DECIMAL(10,0) DEFAULT NULL,
  `excluyente` BIT(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria` (`id_cat`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `producto` */

LOCK TABLES `producto` WRITE;

UNLOCK TABLES;

/*Table structure for table `restaurante` */

DROP TABLE IF EXISTS `restaurante`;

CREATE TABLE `restaurante` (
  `id` INT(11) NOT NULL,
  `gerente` CHAR(15) DEFAULT NULL,
  `nombre` VARCHAR(50) DEFAULT NULL,
  `telefono` CHAR(12) DEFAULT NULL,
  `mesas` TINYINT(3) DEFAULT NULL,
  `localidad` MEDIUMINT(6) DEFAULT NULL,
  `direccion` TEXT,
  PRIMARY KEY (`id`),
  KEY `fk_localidad` (`localidad`),
  KEY `fk_gerente` (`gerente`),
  CONSTRAINT `fk_gerente` FOREIGN KEY (`gerente`) REFERENCES `usuario_datos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_localidad` FOREIGN KEY (`localidad`) REFERENCES `localidades` (`LocalidCod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `restaurante` */

LOCK TABLES `restaurante` WRITE;

UNLOCK TABLES;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_roles` TINYINT(2) NOT NULL,
  `rol` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

INSERT  INTO `roles`(`id_roles`,`rol`) VALUES (0,'Administrador'),(1,'Gerente Restaurante'),(2,'Cocinero'),(3,'Salonero'),(4,'Cliente');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `cedula` CHAR(15) NOT NULL,
  `usuario` VARCHAR(20) DEFAULT NULL,
  `clave` VARCHAR(88) DEFAULT NULL,
  `id_roles` TINYINT(2) DEFAULT NULL,
  `token` VARCHAR(88) DEFAULT NULL,
  `inactivo` BIT(1) DEFAULT b'0',
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `UNIQUE` (`usuario`),
  UNIQUE KEY `Token` (`token`),
  KEY `fk_rol` (`id_roles`),
  CONSTRAINT `fk_cedula` FOREIGN KEY (`cedula`) REFERENCES `usuario_datos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuario_avatar` */

DROP TABLE IF EXISTS `usuario_avatar`;

CREATE TABLE `usuario_avatar` (
  `cedula` CHAR(15) NOT NULL,
  `id_avatar` TINYINT(2) DEFAULT '1',
  PRIMARY KEY (`cedula`),
  KEY `fk_avatar` (`id_avatar`),
  CONSTRAINT `fk_avatar` FOREIGN KEY (`id_avatar`) REFERENCES `avatar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cedula_avatar` FOREIGN KEY (`cedula`) REFERENCES `usuario_datos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `usuario_avatar` */

LOCK TABLES `usuario_avatar` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuario_datos` */

DROP TABLE IF EXISTS `usuario_datos`;

CREATE TABLE `usuario_datos` (
  `cedula` CHAR(15) NOT NULL,
  `nombre` VARCHAR(30) DEFAULT NULL,
  `apellido` VARCHAR(30) DEFAULT NULL,
  `telefono` CHAR(12) DEFAULT NULL,
  `correo` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `usuario_datos` */

LOCK TABLES `usuario_datos` WRITE;

UNLOCK TABLES;

/* Procedure structure for procedure `sp_mostrar_usuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_mostrar_usuarios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_mostrar_usuarios`()
BEGIN
	SELECT
	u.`cedula`,
	u.`usuario`,
	u.`id_roles`,
	ud.`nombre`,
	ud.`apellido`,
	ud.`correo`,
	ud.`telefono`,
	a.`avatar`
	FROM `usuario` AS u 
	INNER JOIN `usuario_datos` AS ud ON ( ud.`cedula` = u.`cedula`)
	INNER JOIN `usuario_avatar` AS ua ON (ua.`cedula` = u.`cedula`)
	INNER JOIN `avatar` AS a ON (a.`id`= ua.`id_avatar`);
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
