/*
SQLyog Community v11.1 (32 bit)
MySQL - 5.7.17-log : Database - b2b
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`b2b` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `b2b`;

/*Table structure for table `access` */

DROP TABLE IF EXISTS `access`;

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=latin1;

/*Data for the table `access` */

insert  into `access`(`id`,`id_usuario`,`id_aplicacion`) values (34,1,35),(33,1,6),(32,1,7),(31,1,3),(30,1,2),(29,1,1),(28,1,9),(27,1,4),(44,1,46),(122,2,35),(121,2,6),(119,2,7),(114,2,3),(113,2,2),(111,2,1),(110,2,15),(109,2,9),(108,2,4),(273,8,6),(268,8,7),(263,8,3),(262,8,2),(260,8,1),(259,8,15),(258,8,9),(257,8,4),(286,5,6),(287,5,35),(306,2,84),(305,4,85),(304,3,85),(303,4,6),(299,12,7),(300,12,6),(302,3,6);

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `applications` */

insert  into `applications`(`id`,`nombre`,`ruta`,`estado`,`tipo`,`category`) values (1,'Mantenedor Menu','APP_ADM_MENU','ON','ADM',4),(2,'Mantenedor Usuarios','APP_ADM_USERS','ON','ADM',3),(3,'Mantenedor de Permisos User/Aplicacion','APP_ADM_USER_APPLICATION','ON','ADM',4),(4,'Mantenedor Aplicaciones','APP_ADM_APPLICATIONS','ON','ADM',4),(6,'Perfil ','APP_USER_PROFILE','ON','ALL',4),(7,'Configuracion','APP_USER_CONFIGURATION','ON','ALL',4),(9,'Mantenedor de Permisos Aplicacion/User','APP_ADM_APPLICATION_USER','ON','ADM',4),(15,'Categorias','APP_ADM_CATEGORY','ON','ADM',4),(35,'Proyectos','APP_USER_PROYECTOS','ON','USER',5),(46,'Estado de Resultado (EERR)','APP_USER_EERR','ON','USER',5),(85,'Pizarra','APP_USER_PIZARRA','ON','USER',6),(84,'Administrador Pizarra','APP_USER_ADMINISTRADOR_PIZARRA','ON','USER',6);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`nombre`,`estado`) values (1,'Reportes Vendedores',1),(2,'Reportes Funcionarios',1),(3,'Mantenedores',1),(4,'Plataforma ',1),(6,'Pizarra',1);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`id`,`nombre`,`descripcion`,`direccion`,`email`,`telefono`) values (1,'BATA','Bata es una empresa de calzado con sede en Lausana en Suiza. Fundada en 1894 en lo que hoy es la República Checa, ha crecido con el tiempo hasta convertirse en una marca conocida a nivel internacional','Av Libertador Bernardo O\'Higgins 3023, Santiago, Región Metropolitana','bata@comercial.cl','226814335'),(2,'(SMU) Unimarc','Unimarc es una cadena chilena de supermercados, controlada desde 2008 por Álvaro Saieh, Juan Rendic y Enrique Bravo a través de la sociedad Supermercados SMU','Cerro El Plomo 5680, Santiago, Las Condes, Región Metropolitana','unimarc@contacto.cl','226714567');

/*Table structure for table `docs` */

DROP TABLE IF EXISTS `docs`;

CREATE TABLE `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc1` varchar(250) DEFAULT NULL,
  `doc2` varchar(250) DEFAULT NULL,
  `identifier` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `docs` */

insert  into `docs`(`id`,`doc1`,`doc2`,`identifier`) values (7,'1537392669_Documento 1.docx',NULL,1537392669),(8,NULL,'1537392765_Documento 2.docx',1537392765),(9,'1537392827_Documento 2.docx','1537392828_Documento 1.docx',1537392828),(10,'1537393904_Documento 3.docx',NULL,1537393904);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `idpadre` int(4) DEFAULT NULL,
  `permisos` int(4) DEFAULT NULL,
  `aplicacion` varchar(30) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `ubicacion` int(10) NOT NULL,
  `posicion` int(10) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nombre`,`idpadre`,`permisos`,`aplicacion`,`activo`,`ubicacion`,`posicion`,`descripcion`) values (322,'Categorías',9,3,'15','ON',2,0,'Categorías'),(43,'Permisos Aplicación/Users',9,3,'9','ON',2,0,'Permisos Aplicación/Users'),(9,'Plataforma',0,3,'0','ON',2,0,'Plataforma'),(129,'Menú',9,3,'1','ON',2,0,'Menú'),(14,'Permisos User/Aplicación',9,1,'3','ON',2,0,'Permisos User/Aplicación'),(37,'Mantenedores',0,3,'0','ON',2,0,'Mantenedores'),(38,'Usuarios',37,3,'2','ON',2,0,'Usuarios'),(147,'Cuenta de Usuario',0,1,'0','ON',3,0,'Cuenta de Usuario'),(148,'Perfil',147,1,'6','ON',3,0,'Perfil'),(149,'Configuración',147,1,'7','ON',3,0,'Configuración'),(319,'Aplicaciones',9,3,'4','ON',2,0,'Aplicaciones'),(320,'Estado de Resultado',0,1,'46','ON',1,0,'Estado de Resultado'),(323,'Pizarra',0,1,'0','ON',1,0,'Pizarra'),(343,'Pizarra',323,1,'85','ON',1,0,'Pizarra'),(342,'Administrar Pizarra',323,3,'84','ON',1,0,'Administrador de Pizarra');

/*Table structure for table `pizarra` */

DROP TABLE IF EXISTS `pizarra`;

CREATE TABLE `pizarra` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `vigencia_ini` date DEFAULT NULL,
  `vigencia_fin` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `identifier` bigint(20) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '0',
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente` (`id_cliente`),
  CONSTRAINT `cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `pizarra` */

insert  into `pizarra`(`id`,`titulo`,`descripcion`,`vigencia_ini`,`vigencia_fin`,`email`,`phone`,`identifier`,`disabled`,`id_cliente`) values (2,'Manual de Emaque','Manual de Emaque','2018-05-01','2018-09-30','test@gmail.com','56978654',1537392669,0,1),(3,'Manual de Etiquetado','Manual de Etiquetado','2018-06-01','2019-03-31','test1@gmail.com','56978654',1537392765,0,1),(4,'Manual de Empiochado','Manual de Empiochado','2018-04-01','2019-04-30','test2@gmail.com','56978654',1537392828,0,1),(5,'Manual Desempaque','Manual Desempaque','2018-01-01','2019-06-30','test3@gmail.com','56978633',1537393904,0,1);

/*Table structure for table `proyectos` */

DROP TABLE IF EXISTS `proyectos`;

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(100) NOT NULL,
  `descripcion` blob NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `costo` int(11) NOT NULL,
  `gasto` int(11) NOT NULL,
  `avance` int(11) NOT NULL,
  `nombre_reponsable` varchar(100) NOT NULL,
  `rut_responsable` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `proyectos` */

insert  into `proyectos`(`id`,`nombre_proyecto`,`descripcion`,`fecha_inicio`,`fecha_termino`,`costo`,`gasto`,`avance`,`nombre_reponsable`,`rut_responsable`,`status`) values (1,'Test','','2018-03-01','2018-03-08',1000,32122,63,'Carlos ',0,0),(2,'Test Cancelado','','2018-04-07','0000-00-00',2500,23123,22,'',0,1),(3,'Proyecto Canc','','2018-05-07','2018-03-16',5000,23434,222,'Camila Vidal',180947108,0),(23,'Proyecto 23','Last login: Tue Jan  9 13:01:58 on ttys003\nYou have new mail.\nMacBook:app-movilink camilavidalt$ cd ~\nMacBook:~ camilavidalt$ \nMacBook:~ camilavidalt$ sudo nano .bash_profile\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n  GNU nano 2.0.6                                                      File: .bash_profile                                                                                                         Modified  \n\nexport ANDROID_HOME=~/Library/Android/sdk\nexport PATH=${PATH}:$ANDROID_HOME/tools:$ANDROID_HOME/platform-tools\nexport PATH=~/.npm-global/bin:$PATH\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n^G Get Help                       ^O WriteOut                       ^R Read File                      ^Y Prev Page                      ^K Cut Text                       ^C Cur Pos\n^X Exit                           ^J Justify                        ^W Where Is                       ^V Next Page                      ^U UnCut Text                     ^T To Spell\n','2018-06-14','2018-03-31',5000,2332323,34,'Camila Vidal',180947108,2),(24,'test 2','','2018-04-10','2018-04-27',3000,1500,23,'',0,0),(25,'ddddd','','2018-04-11','2018-04-25',10000,239,23,'d',0,0),(26,'test','','2018-07-06','2018-09-07',3456,2352,23,'',0,0),(27,'Proyecto Graphics ','','0000-00-00','0000-00-00',786876876,8767867,23,'Camila Vidal',180947108,0),(28,'Proyecto Graphics 2','','0000-00-00','0000-00-00',726736,7676,76,'Camila Vidal',180947108,0),(29,'djkhsakjh','dsajkhdkjsahd&nbsp;','0000-00-00','0000-00-00',323213123,321323,32,'',0,0),(30,'Proyecto Graphics 3','dsa djsakhd kjashdk j','0000-00-00','0000-00-00',78267836,7676,71,'Camila Vidal',180947108,0),(31,'Proyecto Graphics XX','djksahkjdhs','0000-00-00','0000-00-00',2147483647,767676,81,'Camila Vidal',0,0),(32,'Proyecto Graphics Final','dsakdahskjd kdjhsakjdhks ajhdjk ashdkj sa','2018-04-13','2018-04-18',65265265,65625,61,'',0,0);

/*Table structure for table `proyectos_actividad` */

DROP TABLE IF EXISTS `proyectos_actividad`;

CREATE TABLE `proyectos_actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `costo` int(11) NOT NULL,
  `gasto` int(11) NOT NULL,
  `usuario_responsable` varchar(100) NOT NULL,
  `avance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `proyectos_actividad` */

insert  into `proyectos_actividad`(`id`,`id_proyecto`,`id_actividad`,`codigo`,`nombre`,`fecha_inicio`,`fecha_termino`,`costo`,`gasto`,`usuario_responsable`,`avance`) values (1,10,0,'','','0000-00-00','0000-00-00',0,0,'',0),(2,11,1,'','','0000-00-00','0000-00-00',0,0,'',0),(3,12,1201,'','','0000-00-00','0000-00-00',0,0,'',0),(4,13,1301,'','','0000-00-00','0000-00-00',0,0,'',0),(5,15,1501,'','','0000-00-00','0000-00-00',0,0,'',0),(6,15,1502,'','','0000-00-00','0000-00-00',0,0,'',0),(7,15,1503,'','','0000-00-00','0000-00-00',0,0,'',0),(8,16,1601,'','','0000-00-00','0000-00-00',0,0,'',0),(9,16,1602,'','','0000-00-00','0000-00-00',0,0,'',0),(10,17,0,'','','0000-00-00','0000-00-00',0,0,'',0),(11,18,0,'','','0000-00-00','0000-00-00',0,0,'',0),(12,19,0,'','','0000-00-00','0000-00-00',0,0,'',0),(13,20,0,'','','0000-00-00','0000-00-00',0,0,'',0),(14,20,0,'','','0000-00-00','0000-00-00',0,0,'',0),(15,20,0,'','','0000-00-00','0000-00-00',0,0,'',0),(16,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(17,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(18,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(19,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(20,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(21,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(22,21,0,'','','0000-00-00','0000-00-00',0,0,'',0),(23,22,0,'','','0000-00-00','0000-00-00',0,0,'',0),(24,23,2301,'32432432','Proyecto 23 - Act 01','2018-03-04','2018-03-14',324324,4324234,'Carlos Gonzalez ',98),(25,23,2302,'3213123','Proyecto 23 - Act 02','2018-03-04','2018-03-14',2321321,3333,'Cristian Singer',67),(26,23,2303,'23132','Proyecto 23 - Act 03','2018-03-04','2018-03-14',321323,333213,'Andrea Miranda ',12),(27,23,2304,'3123123','Proyecto 23 - Act 04','2018-03-04','2018-03-14',321323,2222,'Cristobal Mendoza',53),(28,27,0,'','','0000-00-00','0000-00-00',0,0,'',0),(29,28,0,'','','0000-00-00','0000-00-00',0,0,'',0),(30,29,0,'','','0000-00-00','0000-00-00',0,0,'',0),(31,30,0,'','','0000-00-00','0000-00-00',0,0,'',0),(32,31,0,'','','0000-00-00','0000-00-00',0,0,'',0),(33,32,0,'','','0000-00-00','0000-00-00',0,0,'',0);

/*Table structure for table `sucursales` */

DROP TABLE IF EXISTS `sucursales`;

CREATE TABLE `sucursales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COD_SUCURSAL` int(100) NOT NULL,
  `SUCURSAL` varchar(255) NOT NULL,
  `ZONA` varchar(255) NOT NULL,
  `PAIS` varchar(255) NOT NULL,
  `SUCURSAL_ALT` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `sucursales` */

insert  into `sucursales`(`ID`,`COD_SUCURSAL`,`SUCURSAL`,`ZONA`,`PAIS`,`SUCURSAL_ALT`) values (1,10000,'Huerfanos','Santiago','CL','TDA HUERFANOS'),(2,10002,'Mall Concepcion','Sur','CL','TDA MALL CONCEPCION'),(3,10003,'Vina','Norte','CL','TDA VINA PLAZA SUCRE'),(4,10004,'Temuco','Sur','CL','TDA TEMUCO'),(5,10007,'Los Dominicos','Oriente','CL','TDA LOS DOMINICOS'),(6,10009,'Concepcion','Sur','CL','TDA CONCEPCION BARROS ARANA'),(7,10010,'Los Andes','Norte','CL','TDA LOS ANDES'),(8,10011,'Concepcion 2','Sur','CL','TDA CONCEPCION CASTELLON'),(9,10012,'Parque Arauco','Oriente','CL','TDA PARQUE ARAUCO'),(10,10014,'Puerto Montt','Sur','CL','TDA PUERTO MONTT'),(11,10016,'Plaza Vespucio','Santiago','CL','TDA PLAZA VESPUCIO'),(12,10017,'Astor','Santiago','CL','TDA ASTOR'),(13,10018,'Puente','Santiago','CL','TDA MALL DEL CENTRO'),(14,10019,'Crillon','Santiago','CL','TDA CRILLON'),(15,10022,'Chillan','Sur','CL','TDA CHILLAN'),(16,10023,'San Fernando','Santiago','CL','TDA SAN FERNANDO'),(17,10025,'Valparaiso','Norte','CL','TDA VALPARAISO'),(18,10026,'Antofagasta','Norte','CL','TDA ANTOFAGASTA'),(19,10028,'El Trebol','Sur','CL','TDA EL TREBOL'),(20,10029,'Alto las Condes','Oriente','CL','TDA ALTO LAS CONDES'),(21,10032,'Rancagua','Santiago','CL','TDA RANCAGUA'),(22,10034,'Costanera Center','Oriente','CL','TDA COSTANERA CENTER'),(23,10037,'Marina Arauco','Norte','CL','TDA MARINA ARAUCO'),(24,10039,'Internet','Otros Canales','CL','INTERNET'),(25,10041,'La Serena','Norte','CL','TDA LA SERENA'),(26,10045,'Plaza Oeste','Santiago','CL','TDA PLAZA OESTE'),(27,10046,'Plaza Tobalaba','Santiago','CL','TDA PLAZA TOBALABA'),(28,10048,'Huechuraba','Oriente','CL','TDA PLAZA HUECHURABA'),(29,10049,'Iquique','Norte','CL','TDA IQUIQUE'),(30,10051,'Mall Calama','Norte','CL','TDA MALL CALAMA'),(31,10057,'Florida Center','Oriente','CL','TDA FLORIDA CENTER'),(32,10059,'Venta Empresa','Otros Canales','CL','VENTA EMPRESA'),(33,10067,'Outlet Buenaventura','Oriente','CL','OUTLET BUENAVENTURA'),(34,10068,'Portal Temuco','Sur','CL','TDA MALL TEMUCO'),(35,10069,'Coquimbo','Norte','CL','TDA COQUIMBO'),(36,10071,'Plaza Egana','Oriente','CL','TDA PLAZA EGANA'),(37,10072,'Los Angeles','Sur','CL','TDA LOS ANGELES'),(38,10074,'Talca','Sur','CL','TDA TALCA'),(39,10076,'Curico','Sur','CL','TDA CURICO'),(40,10077,'La Dehesa','Oriente','CL','TDA LA DEHESA'),(41,10078,'M.Costanera P.Montt','Sur','CL','TDA PTO. MONTT COSTANERA'),(42,10079,'La Calera','Norte','CL','TDA LA CALERA'),(43,10084,'Copiapo','Norte','CL','TDA. COPIAPO'),(44,10085,'Quilpue','Norte','CL','TDA QUILPUE'),(45,10088,'Maipu','Santiago','CL','TDA MAIPU'),(46,10096,'Punta Arenas','Sur','CL','TDA PTA ARENAS'),(47,10097,'Nueva Alameda','Santiago','CL','TDA ESTACION CENTRAL'),(48,10098,'Nueva Valdivia Store','Sur','CL','TDA NUEVA VALDIVIA'),(49,10099,'San Bernardo','Santiago','CL','TDA SAN BERNARDO'),(50,20021,'Chorrillos','','PE','CHORRILLOS'),(51,20023,'Primavera','','PE','PRIMAVERA'),(52,20024,'Los Olivos','','PE','LOS OLIVOS'),(53,20025,'Jockey Plaza','','PE','JOCKEY PLAZA'),(54,20027,'San Isidro','','PE','SAN ISIDRO'),(55,20028,'Plaza San? Miguel','','PE','SAN MIGUEL'),(56,20030,'Miraflores','','PE','MIRAFLORES'),(57,20040,'Trujillo','','PE','TRUJILLO'),(58,20049,'Cayma','','PE','CAYMA'),(59,20058,'Mall del Sur - Atocongo','','PE','ATOCONGO'),(60,20062,'Porongoche','','PE','AREQUIPA'),(61,20066,'Plaza Lima Norte','','PE','PLAZA LIMA NORTE'),(62,20073,'Santa Anita','','PE','SANTA ANITA'),(63,20074,'San Borja','','PE','SAN BORJA'),(64,20079,'Salaverry','','PE','SALAVERRY'),(65,10021,'Arica','Norte','CL','TDA ARICA');

/*Table structure for table `sucursales_ads` */

DROP TABLE IF EXISTS `sucursales_ads`;

CREATE TABLE `sucursales_ads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COD_SUCURSAL` int(11) NOT NULL,
  `DIRECCION` int(11) NOT NULL,
  `NODO_PRIMARIO` varchar(200) NOT NULL,
  `IP_PRIMARIO` varchar(200) NOT NULL,
  `NODO_SECUNDARIO` varchar(200) NOT NULL,
  `IP_SECUNDARIO` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `sucursales_ads` */

insert  into `sucursales_ads`(`ID`,`COD_SUCURSAL`,`DIRECCION`,`NODO_PRIMARIO`,`IP_PRIMARIO`,`NODO_SECUNDARIO`,`IP_SECUNDARIO`) values (1,0,967,'CUACE1','10.0.150.17','CINCE2','10.0.234.49'),(2,2,2,'UNOCO','10.0.150.46','DOSCO','10.8.58.49'),(3,3,290,'CINVI','10.0.150.49','SEIVI','10.5.2.49'),(4,4,656,'TRETE','10.0.150.25','CUATE','10.9.2.49'),(5,7,7,'UNODOM','10.0.150.184','DOSDOM','10.15.74.49'),(6,9,839,'CUACO','10.0.150.36','CINCO','10.8.18.49'),(7,10,10,'UNOLA','10.0.150.37','DOSLA','10.5.74.49'),(8,11,520,'CUACO','10.0.150.36','SEICO','10.8.11.49'),(9,12,5413,'UNOPA','10.0.150.78','TREPA','10.0.20.49'),(10,14,595,'TREPM','10.0.150.23','CUAPM','10.10.2.49'),(11,16,7110,'CUAPV','10.0.150.75','CINPV','10.0.242.49'),(12,17,886,'CUACE1','10.0.150.17','DOSAS','10.0.130.48'),(13,18,698,'TREPU','10.0.150.77','CUAPU','10.0.114.48'),(14,19,19,'UNOCR','10.0.150.48','DOSCR','10.15.34.49'),(15,21,21,'UNOARI','10.0.150.156','DOSARI','10.1.18.49'),(16,22,699,'TRECH','10.0.150.47','CUACH','10.8.42.49'),(17,23,23,'UNOSF','10.0.150.169','DOSSF','10.6.34.49'),(18,25,1646,'UNOVP','10.0.150.52','DOSVP','10.5.4.49'),(19,26,530,'DOSAN','10.0.150.24','UNOAN','10.2.10.48'),(20,28,28,'UNOTR','10.0.150.50','DOSTR','10.8.2.50'),(21,29,29,'UNOAC','10.0.150.28','DOSAC','10.0.82.49'),(22,32,490,'UNORA','10.0.150.69','DOSRA','10.6.10.49'),(23,34,34,'UNOCC','10.0.150.115','DOSCC','10.0.74.49'),(24,37,1348,'UNOMA','10.0.150.42','DOSMA','10.5.6.48'),(25,39,39,'CUAAL','10.0.150.30','XXXX','1.1.1.1'),(26,41,41,'UNOLS','10.0.150.31','DOSLS','10.4.10.49'),(27,45,45,'UNOPO','10.0.150.72','DOSPO','10.0.42.50'),(28,46,46,'UNOPT','10.0.150.51','DOSPT','10.0.39.49'),(29,48,48,'UNOHU','10.0.150.76','DOSHU','10.0.44.50'),(30,49,49,'UNOIQ','10.0.150.15','DOSIQ','10.1.10.49'),(32,57,57,'UNOFC','10.0.150.82','DOSFC','10.0.66.49'),(33,67,67,'UNOBV','10.0.150.186','DOSBV','10.0.224.49'),(34,68,68,'UNOTP','10.0.150.80','DOSTP','10.9.10.49'),(35,69,69,'UNOCQ','10.0.150.185','DOSCQ','10.4.34.49'),(36,71,71,'UNOPEG','10.0.150.83','DOSPEG','10.15.154.49'),(37,72,72,'UNOLAG','10.0.150.26','DOSLAG','10.8.66.49'),(38,74,74,'UNOTA','10.0.150.59','DOSTA','10.7.11.49'),(39,76,76,'UNOCU','10.0.150.104','DOSCU','10.7.35.49'),(40,77,77,'UNODH','10.0.150.105','DOSDH','10.15.75.50'),(41,78,78,'UNOPM','10.0.150.235','DOSPM','10.10.51.49'),(42,79,79,'UNOCAL','10.0.150.238','DOSCAL','10.5.139.49'),(43,84,84,'UNOCOP','10.0.150.193','DOSCOP','10.3.2.49'),(44,85,85,'UNOQUI','10.0.150.196','DOSQUI','10.5.147.49'),(45,88,88,'UNOMAI','10.0.150.188','DOSMAI','10.15.91.49'),(46,96,96,'UNOAR','10.0.150.68','DOSAR','10.12.11.49'),(47,97,97,'UNOAL','10.0.150.41','DOSAL','10.15.139.49'),(48,98,98,'UNOVA','10.0.150.74','DOSVA','10.10.59.49'),(49,99,99,'UNOSB','10.0.150.153','DOSSB','10.15.147.49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `forename` varchar(100) DEFAULT NULL,
  `paternal` varchar(1000) NOT NULL,
  `maternal` varchar(1000) NOT NULL,
  `cellphone` varchar(18) DEFAULT NULL,
  `permits` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `business` varchar(1000) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user`,`pass`,`forename`,`paternal`,`maternal`,`cellphone`,`permits`,`email`,`status`,`business`,`id_cliente`) values (1,'cvidal','123456.*','Camila','Vidal','T','967170092',3,'cami.vidal@hotmail.com','OFF','www.camividal.com',0),(2,'test','123456.*','Test','Demo','Demo','976778827',3,'a@a.cl','ON','a.com',0),(3,'smu','123','Juan','Aaaaa','Bbbbb','56912345678',1,'juan.smu@gmail.com','ON','www.aaa.com',2),(4,'bata','123','Raul','Perez','Rodriguez','987654329',1,'raul.bata@gmail.com','ON','www.otro.com',1),(8,'agutierrezv','1234','Andres','Gutierrez','Valle','945678900',3,'andres@gmail.com','OFF',NULL,0),(12,'e-ocorreas','e-ocorreas','Orlando','Correa','Sepulveda','942886182',3,'ocorrea@stiv.cl','OFF',NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
