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

INSERT  INTO `avatar`(`id`,`avatar`) VALUES (1,'avatar.png'),(2,'avatar-2.png');

/*Data for the table `avatar` */

LOCK TABLES `avatar` WRITE;

UNLOCK TABLES;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` INT(11) NOT NULL,
  `id_restaurante` INT(11) DEFAULT NULL,
  `nombre` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_restaurante_cat` (`id_restaurante`),
  CONSTRAINT `fk_restaurante_cat` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

INSERT  INTO `categoria`(`id`,`id_restaurante`,`nombre`) VALUES (0,1,'Entradas'),(2,1,'Platos Fuertes'),(3,1,'bebidas');

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

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `id_restaurante` INT(11) DEFAULT NULL,
  `id_usuario` CHAR(15) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'0',
  PRIMARY KEY (`id_pedido`),
  KEY `fk_id_restaurante_pedidos` (`id_restaurante`),
  KEY `fk_id_usuario_pedido` (`id_usuario`),
  CONSTRAINT `fk_id_restaurante_pedidos` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_usuario_pedido` FOREIGN KEY (`id_usuario`) REFERENCES `usuario_datos` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `pedido` */

LOCK TABLES `pedido` WRITE;

UNLOCK TABLES;

/*Table structure for table `pedido_detalle` */

DROP TABLE IF EXISTS `pedido_detalle`;

CREATE TABLE `pedido_detalle` (
  `id_pedido` INT(11) DEFAULT NULL,
  `id_producto` INT(11) DEFAULT NULL,
  KEY `fk_id_pedido_detalle` (`id_pedido`),
  KEY `fk_id_producto_detalle` (`id_producto`),
  CONSTRAINT `fk_id_pedido_detalle` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_producto_detalle` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `pedido_detalle` */

LOCK TABLES `pedido_detalle` WRITE;

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

INSERT  INTO `producto`(`id`,`id_cat`,`codigo`,`nombre`,`descripcion`,`precio`,`excluyente`) VALUES (1,0,'1234','mini lasagna con ensalada','Lasagna con carne acompanada de ensalada cesar','3650',1),(2,2,'12345','minicrepa de pollo con ensalada y papas','crepa de tortilla de harina con papas a la francesa y ensalada ','4350',1),(3,2,'12455','medio lapiz integral','emparedado de pan integral ','2600',1),(4,3,'12','capuccino frio',NULL,'2250',1);

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

INSERT  INTO `restaurante`(`id`,`gerente`,`nombre`,`telefono`,`mesas`,`localidad`,`direccion`) VALUES (0,'115320153','Fogata','24520913',15,1,'100m Norte de supercoop Palmares Alajuela'),(1,'503890553','Restaurante Las Lomas','26661234',14,555178,'Liberia Guanacaste');

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

/*Table structure for table `submenu_categoria` */

DROP TABLE IF EXISTS `submenu_categoria`;

CREATE TABLE `submenu_categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) DEFAULT NULL,
  `submenu_tipo` TINYINT(2) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_submenu_tipo` (`submenu_tipo`),
  CONSTRAINT `fk_submenu_tipo` FOREIGN KEY (`submenu_tipo`) REFERENCES `submenu_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `submenu_categoria` */

LOCK TABLES `submenu_categoria` WRITE;

INSERT  INTO `submenu_categoria`(`id`,`nombre`,`submenu_tipo`,`estado`) VALUES (2,'carne',1,1);

UNLOCK TABLES;

/*Table structure for table `submenu_items` */

DROP TABLE IF EXISTS `submenu_items`;

CREATE TABLE `submenu_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `submenu_items` */

LOCK TABLES `submenu_items` WRITE;

INSERT  INTO `submenu_items`(`id`,`nombre`,`estado`) VALUES (1,'pollo',1),(2,'carne',1),(3,'Jamon',1),(4,'pavo',1),(5,'mano de piedra',1);

UNLOCK TABLES;

/*Table structure for table `submenu_relacion` */

DROP TABLE IF EXISTS `submenu_relacion`;

CREATE TABLE `submenu_relacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_producto` INT(11) DEFAULT NULL,
  `id_submenu_items` INT(11) DEFAULT NULL,
  `id_categoria` INT(11) DEFAULT NULL,
  `estado` BIT(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_id_producto_excluyente` (`id_producto`),
  KEY `fk_id_excluyente` (`id_submenu_items`),
  KEY `fk_id_excluyente_categoria` (`id_categoria`),
  CONSTRAINT `fk_id_excluyente` FOREIGN KEY (`id_submenu_items`) REFERENCES `submenu_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_excluyente_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `submenu_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_producto_excluyente` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `submenu_relacion` */

LOCK TABLES `submenu_relacion` WRITE;

INSERT  INTO `submenu_relacion`(`id`,`id_producto`,`id_submenu_items`,`id_categoria`,`estado`) VALUES (1,1,1,2,1),(2,1,2,2,1),(3,2,1,2,1),(4,2,3,2,1),(5,3,2,2,1),(6,3,3,2,1),(7,3,4,2,1),(8,3,5,2,1);

UNLOCK TABLES;

/*Table structure for table `submenu_tipo` */

DROP TABLE IF EXISTS `submenu_tipo`;

CREATE TABLE `submenu_tipo` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(35) DEFAULT NULL,
  `estado` BIT(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `submenu_tipo` */

LOCK TABLES `submenu_tipo` WRITE;

INSERT  INTO `submenu_tipo`(`id`,`tipo`,`estado`) VALUES (1,'Excluyente',1),(2,'Incluyente',1);

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `cedula` CHAR(15) NOT NULL,
  `usuario` VARCHAR(20) DEFAULT NULL,
  `clave` VARCHAR(88) DEFAULT NULL,
  `id_roles` TINYINT(2) DEFAULT NULL,
  `log_externo` BIT(1) DEFAULT b'0',
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

INSERT  INTO `usuario`(`cedula`,`usuario`,`clave`,`id_roles`,`log_externo`,`token`,`inactivo`) VALUES ('115320153','danieljoserm','WFFRTHMwUlQ0WWV6UjNET0daOXBzdz09',1,'\0',NULL,'\0'),('503890553','luis','L0tyelN1N0JqUW53dVkvQTQ2alMzUT09',0,'\0','1546','');

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

INSERT  INTO `usuario_avatar`(`cedula`,`id_avatar`) VALUES ('115320153',1),('503890553',2);

UNLOCK TABLES;

/*Table structure for table `usuario_datos` */

DROP TABLE IF EXISTS `usuario_datos`;

CREATE TABLE `usuario_datos` (
  `cedula` CHAR(15) NOT NULL,
  `nombre` VARCHAR(30) DEFAULT NULL,
  `apellido` VARCHAR(30) DEFAULT NULL,
  `telefono` CHAR(12) DEFAULT NULL,
  `correo` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `usuario_datos` */

LOCK TABLES `usuario_datos` WRITE;

INSERT  INTO `usuario_datos`(`cedula`,`nombre`,`apellido`,`telefono`,`correo`) VALUES ('115320153','Daniel','Rodriguez','87389992','danieljoserm@gmail.com'),('503890553','Luis','Cortes','87969889','luizcortesj@gmail.com');

UNLOCK TABLES;

/* Procedure structure for procedure `sp_buscar_usuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscar_usuario` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_buscar_usuario`(IN correo VARCHAR(50))
BEGIN
	if correo = 'NULL' then
	 set correo= NULL;
	end If;
	SELECT
	u.cedula,
	u.usuario,
	a.avatar,
	ud.`correo`,
	ud.`telefono`,
	ud.nombre,
	ud.apellido,
	r.id_roles,
	r.rol,
	u.`token`,
	u.`inactivo`
	FROM usuario AS u
	INNER JOIN roles r ON (r.id_roles = u.id_roles)
	INNER JOIN `usuario_datos` AS ud ON (ud.`cedula` = u.`cedula`)
	INNER JOIN `usuario_avatar` AS ua ON (ua.`cedula` = u.`cedula`)
	INNER JOIN `avatar` AS a ON (a.id = ua.id_avatar)
	WHERE
	(correo IS NULL OR ud.`correo` = correo);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_comprobar_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_comprobar_login` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_comprobar_login`(in ucorreo varchar(30), in uclave VARCHAR(88))
BEGIN
	SELECT
	COUNT(*) AS login,
	u.id_roles
	FROM `usuario` u
	INNER JOIN `usuario_datos` AS ud ON (ud.`cedula` = u.`cedula`)
	WHERE ud.`correo`=ucorreo AND u.`clave`=uclave AND u.`inactivo`=1;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_crear_usuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_crear_usuario` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `sp_crear_usuario`(IN ced CHAR(15),IN nom VARCHAR(30),IN ape VARCHAR(30),in tel char(12), in email varchar(30), IN users VARCHAR(20), IN pass VARCHAR(88),IN rol TINYINT(2))
BEGIN
	INSERT INTO `usuario_datos` (`cedula`, `nombre`, `apellido`, `telefono`, `correo`) VALUES (ced, nom, ape, tel, email);
	INSERT INTO `usuario` (`cedula`, `usuario`, `clave`, `id_roles`, `inactivo`) VALUES (ced, users, pass, rol, 0) ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_mostrar_usuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_mostrar_usuarios` */;

DELIMITER $$

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
