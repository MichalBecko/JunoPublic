-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: cistime
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` text COLLATE utf8_slovak_ci,
  `city` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `psc` varchar(10) COLLATE utf8_slovak_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_slovak_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (311,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `support_user_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `support_user_id` (`support_user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `application_ibfk_1` FOREIGN KEY (`support_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `application_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_environment`
--

DROP TABLE IF EXISTS `application_environment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_environment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `environment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `environment_id` (`environment_id`),
  CONSTRAINT `application_environment_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `application_environment_ibfk_2` FOREIGN KEY (`environment_id`) REFERENCES `environment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_environment`
--

LOCK TABLES `application_environment` WRITE;
/*!40000 ALTER TABLE `application_environment` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_environment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_module`
--

DROP TABLE IF EXISTS `application_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `module_id` (`module_id`),
  CONSTRAINT `application_module_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE CASCADE,
  CONSTRAINT `application_module_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_module`
--

LOCK TABLES `application_module` WRITE;
/*!40000 ALTER TABLE `application_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_address`
--

DROP TABLE IF EXISTS `billing_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `street` text COLLATE utf8_slovak_ci,
  `city` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `psc` varchar(10) COLLATE utf8_slovak_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `ico` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `dic` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `icdph` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_address`
--

LOCK TABLES `billing_address` WRITE;
/*!40000 ALTER TABLE `billing_address` DISABLE KEYS */;
INSERT INTO `billing_address` VALUES (288,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `billing_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_comment`
--

DROP TABLE IF EXISTS `campaign_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_slovak_ci,
  `author_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `campaign_id` (`campaign_id`),
  CONSTRAINT `campaign_comment_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  CONSTRAINT `campaign_comment_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_comment`
--

LOCK TABLES `campaign_comment` WRITE;
/*!40000 ALTER TABLE `campaign_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_milestone`
--

DROP TABLE IF EXISTS `campaign_milestone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_milestone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `milestone_date` datetime NOT NULL,
  `importance` tinyint(4) NOT NULL DEFAULT '1',
  `campaign_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id` (`campaign_id`),
  CONSTRAINT `campaign_milestone_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_milestone`
--

LOCK TABLES `campaign_milestone` WRITE;
/*!40000 ALTER TABLE `campaign_milestone` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_milestone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `e_mail` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `telephone_number` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `favicon_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mul` (`multimedia_id`),
  KEY `e_mail_id` (`e_mail`),
  KEY `address_id` (`address_id`),
  KEY `telephone_number_id` (`telephone_number`),
  KEY `billing_address_id` (`billing_address_id`),
  CONSTRAINT `client_ibfk_10` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_address` (`id`) ON DELETE SET NULL,
  CONSTRAINT `client_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE SET NULL,
  CONSTRAINT `client_ibfk_8` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'JUNO','support@denevy.eu','+420123456789',311,288,338,280);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard_test_plan_sprint`
--

DROP TABLE IF EXISTS `dashboard_test_plan_sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard_test_plan_sprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_plan_sprint_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_test_plan_sprint_ibfk_1` (`user_id`),
  KEY `dashboard_test_plan_sprint_ibfk_2` (`test_plan_sprint_id`),
  CONSTRAINT `dashboard_test_plan_sprint_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `dashboard_test_plan_sprint_ibfk_2` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard_test_plan_sprint`
--

LOCK TABLES `dashboard_test_plan_sprint` WRITE;
/*!40000 ALTER TABLE `dashboard_test_plan_sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard_test_plan_sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migrations`
--

DROP TABLE IF EXISTS `doctrine_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migrations` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migrations`
--

LOCK TABLES `doctrine_migrations` WRITE;
/*!40000 ALTER TABLE `doctrine_migrations` DISABLE KEYS */;
INSERT INTO `doctrine_migrations` VALUES ('20180405094823'),('20180405182948'),('20180420123934'),('20180422061856'),('20180422063730'),('20180422134425'),('20180423065215'),('20180423105530'),('20180423140927'),('20180424083031'),('20180425105837'),('20180427140816'),('20180430090720'),('20180502071740'),('20180503111327'),('20180505150935'),('20180507111543'),('20180509115004'),('20180510121203'),('20180513095419'),('20180514114106'),('20180515060542'),('20180521100539'),('20180522082508'),('20180523055728'),('20180527145405'),('20180528152126'),('20180529073808');
/*!40000 ALTER TABLE `doctrine_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `environment`
--

DROP TABLE IF EXISTS `environment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `environment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `owner` varchar(255) DEFAULT NULL,
  `support` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `environment`
--

LOCK TABLES `environment` WRITE;
/*!40000 ALTER TABLE `environment` DISABLE KEYS */;
INSERT INTO `environment` VALUES (2,'SysTest','Systest','Andrej Hyben','Mil'),(3,'INT1','INT1','Andy','Aklkl'),(6,'SIT1','SIT1','',''),(7,'SIT2','SIT2','',''),(8,'SIT3','SIT3','',''),(9,'Perf','pro perf testy','SuperTest','');
/*!40000 ALTER TABLE `environment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folder`
--

DROP TABLE IF EXISTS `folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `application_environement_id` (`application_id`),
  CONSTRAINT `folder_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folder`
--

LOCK TABLES `folder` WRITE;
/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue`
--

DROP TABLE IF EXISTS `issue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `project_id` int(11) DEFAULT NULL,
  `test_plan_id` int(11) DEFAULT NULL,
  `test_plan_sprint_id` int(11) DEFAULT NULL,
  `test_plan_sprint_case_id` int(11) DEFAULT NULL,
  `test_step_id` int(11) DEFAULT NULL,
  `test_step_execution_id` int(11) DEFAULT NULL,
  `issue_type_id` int(2) DEFAULT NULL,
  `priority_id` int(2) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `assigned_id` int(11) DEFAULT NULL,
  `change_status_date` datetime DEFAULT NULL,
  `jira_id` int(11) DEFAULT NULL,
  `otrs_id` int(11) DEFAULT NULL,
  `update_to_tracker` tinyint(1) DEFAULT '0',
  `application_id` int(11) DEFAULT NULL,
  `environment_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `custom_fields` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `test_plan_sprint_id` (`test_plan_sprint_id`),
  KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`),
  KEY `test_step_id` (`test_step_id`),
  KEY `test_step_execution_id` (`test_step_execution_id`),
  KEY `creator_id` (`creator_id`),
  KEY `assigned_id` (`assigned_id`),
  KEY `test_plan_id` (`test_plan_id`),
  KEY `application_id` (`application_id`),
  KEY `environment_id` (`environment_id`),
  KEY `issue_ibfk_20` (`module_id`),
  CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_17` FOREIGN KEY (`assigned_id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  CONSTRAINT `issue_ibfk_18` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE SET NULL,
  CONSTRAINT `issue_ibfk_19` FOREIGN KEY (`environment_id`) REFERENCES `environment` (`id`) ON DELETE SET NULL,
  CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_20` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE SET NULL,
  CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_4` FOREIGN KEY (`test_step_id`) REFERENCES `test_step` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_5` FOREIGN KEY (`test_step_execution_id`) REFERENCES `test_step_execution` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_ibfk_7` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue`
--

LOCK TABLES `issue` WRITE;
/*!40000 ALTER TABLE `issue` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_comment`
--

DROP TABLE IF EXISTS `issue_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_slovak_ci,
  `author_id` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `jira_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `issue_id` (`issue_id`),
  CONSTRAINT `issue_comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  CONSTRAINT `issue_comment_ibfk_3` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_comment`
--

LOCK TABLES `issue_comment` WRITE;
/*!40000 ALTER TABLE `issue_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_multimedia`
--

DROP TABLE IF EXISTS `issue_multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `multimedia_id` int(11) DEFAULT NULL,
  `issue_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_id` (`issue_id`),
  KEY `multimedia_id` (`multimedia_id`),
  CONSTRAINT `issue_multimedia_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`id`) ON DELETE CASCADE,
  CONSTRAINT `issue_multimedia_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_multimedia`
--

LOCK TABLES `issue_multimedia` WRITE;
/*!40000 ALTER TABLE `issue_multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iteration`
--

DROP TABLE IF EXISTS `iteration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iteration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start_milestone_id` int(11) NOT NULL,
  `end_milestone_id` int(11) NOT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iteration_ibfk_1` (`campaign_id`),
  KEY `start_milestone_id` (`start_milestone_id`),
  KEY `end_milestone_id` (`end_milestone_id`),
  CONSTRAINT `iteration_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE CASCADE,
  CONSTRAINT `iteration_ibfk_2` FOREIGN KEY (`start_milestone_id`) REFERENCES `campaign_milestone` (`id`),
  CONSTRAINT `iteration_ibfk_3` FOREIGN KEY (`end_milestone_id`) REFERENCES `campaign_milestone` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iteration`
--

LOCK TABLES `iteration` WRITE;
/*!40000 ALTER TABLE `iteration` DISABLE KEYS */;
/*!40000 ALTER TABLE `iteration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_slovak_ci,
  `action_id` int(3) DEFAULT NULL,
  `tab_id` int(3) DEFAULT NULL,
  `privilege_id` int(11) DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_slovak_ci DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_picture`
--

DROP TABLE IF EXISTS `login_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `multimedia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_picture`
--

LOCK TABLES `login_picture` WRITE;
/*!40000 ALTER TABLE `login_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `type` int(11) NOT NULL,
  `localization` varchar(3) NOT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_template`
--

LOCK TABLES `mail_template` WRITE;
/*!40000 ALTER TABLE `mail_template` DISABLE KEYS */;
INSERT INTO `mail_template` VALUES (1,'is.mailer.addTestCaseToTester','Juno - Novo priradené scenáre','<p>Už&iacute;vateľ $USER_NAME$ na teba priradil $COUNT_TEST_CASE$ nov&yacute;ch sc&eacute;n&aacute;rov.</p>',1,'sk',1),(2,'is.mailer.addTestCaseToTester','Juno - Nově přiřazené scénáře','<p>Uživatel&nbsp;$USER_NAME$ na tebe přiřadil&nbsp;$COUNT_TEST_CASE$ nov&yacute;ch sc&eacute;n&aacute;řů.</p>',1,'cs',1),(3,'is.mailer.addTestCaseToTester','Juno - New assigned scenarios','<p>User $USER_NAME$ assigned you $COUNT_TEST_CASE$ new scenarios.</p>',1,'en',1),(4,'is.mailer.assignIssueToUser','Juno - Novo priradená Issue','<p>Už&iacute;vateľ&nbsp;$USER_NAME$ na teba priradil Issue.</p>',2,'sk',1),(5,'is.mailer.assignCommentToIssue','Juno - Nový komentár u Issue','<p>Už&iacute;vateľ&nbsp;$USER_NAME$ okomentoval na teba priraden&uacute; Issue.</p>',3,'sk',1),(6,'is.mailer.creatingUser','','',4,'sk',1),(7,'is.mailer.assignIssueToUser','Juno - Nově přiřazená Issue','<p>Uživatel&nbsp;$USER_NAME$ na tebe přiřadil Issue.&nbsp;</p>',2,'cs',1),(8,'is.mailer.assignIssueToUser','Juno - New assigned Issue','<p>$USER_NAME$ assigned Issue to you.&nbsp;</p>',2,'en',1),(9,'is.mailer.assignCommentToIssue','Juno - Nový komentář u Issue','<p>Uživatel $USER_NAME$ okomentoval na tebe přiřazenou Issue.</p>',3,'cs',1),(10,'is.mailer.assignCommentToIssue','Juno - New comment on Issue','<p>$USER_NAME$ commented on Issue assigned to you.</p>',3,'en',1),(11,'is.mailer.creatingUser','Juno - Vytvoření uživatele','<p>Uživatel&nbsp;$USER_NAME$ ti vytvořil nov&eacute;ho uživatele Login: Heslo:&nbsp;$PASSWORD$</p>',4,'cs',1);
/*!40000 ALTER TABLE `mail_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailer`
--

DROP TABLE IF EXISTS `mailer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `subject` varchar(250) COLLATE utf8_slovak_ci DEFAULT NULL,
  `body` text COLLATE utf8_slovak_ci,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailer`
--

LOCK TABLES `mailer` WRITE;
/*!40000 ALTER TABLE `mailer` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailer_attachment`
--

DROP TABLE IF EXISTS `mailer_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailer_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailer_id` int(11) DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7C7BB363F989867` (`mailer_id`),
  KEY `IDX_7C7BB3620531EB8` (`multimedia_id`),
  CONSTRAINT `mailer_attachment_ibfk_1` FOREIGN KEY (`mailer_id`) REFERENCES `mailer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mailer_attachment_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailer_attachment`
--

LOCK TABLES `mailer_attachment` WRITE;
/*!40000 ALTER TABLE `mailer_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailer_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailer_default`
--

DROP TABLE IF EXISTS `mailer_default`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailer_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `subject` varchar(250) COLLATE utf8_slovak_ci DEFAULT NULL,
  `body` text COLLATE utf8_slovak_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailer_default`
--

LOCK TABLES `mailer_default` WRITE;
/*!40000 ALTER TABLE `mailer_default` DISABLE KEYS */;
INSERT INTO `mailer_default` VALUES (1,'Narodeniny','Predmet narodenín','<p>Telo naroden&iacute;nee</p>'),(7,'Jedna sablona','AA','<p>Supersablona</p>');
/*!40000 ALTER TABLE `mailer_default` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menuitem`
--

DROP TABLE IF EXISTS `menuitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menuitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `glyphicon` varchar(50) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `menuitem_id` int(11) DEFAULT NULL,
  `sort` tinyint(2) NOT NULL DEFAULT '1',
  `privilege_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menuitem_id` (`menuitem_id`),
  CONSTRAINT `menuitem_ibfk_1` FOREIGN KEY (`menuitem_id`) REFERENCES `menuitem` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuitem`
--

LOCK TABLES `menuitem` WRITE;
/*!40000 ALTER TABLE `menuitem` DISABLE KEYS */;
INSERT INTO `menuitem` VALUES (1,'is.modulName.homepage','glyphicon glyphicon-home',':Admin:Homepage:Homepage:default',NULL,1,1006),(2,'is.modulName.projects','glyphicon glyphicon-tasks',':Admin:Project:Project:',NULL,4,1007),(3,'is.modulName.user','glyphicon glyphicon-user',':Admin:User:User:',NULL,6,1008),(4,'is.modulName.log','glyphicon glyphicon-blackboard',':Admin:Log:Log:',NULL,7,1009),(5,'is.modulName.settings','glyphicon glyphicon-cog',':Admin:Settings:Settings:',NULL,8,1010),(6,'is.modulName.help','glyphicon glyphicon-hdd',':Admin:Help:Help:',NULL,9,1011),(7,'is.modulName.general','glyphicon glyphicon-leaf',':Admin:Settings:SimpleSettings:default',5,1,0),(8,'is.modulName.specific','glyphicon glyphicon-grain',':Admin:Settings:SpecificSettings:default',5,2,0),(9,'is.modulName.napoveda','glyphicon glyphicon-education',':Admin:Help:Help:default',6,1,0),(10,'is.modulName.information','glyphicon glyphicon-info-sign',':Admin:Help:Help:information',6,2,0),(11,'is.modulName.issue','glyphicon glyphicon-fire',':Admin:Issue:Issue:',NULL,5,1014),(12,'is.modulName.storage','glyphicon glyphicon-folder-close',':Admin:Storage:Storage:',NULL,10,1052),(13,'Release/Camp.','glyphicon glyphicon-briefcase',':Admin:Campaign:Homepage:',NULL,2,1015);
/*!40000 ALTER TABLE `menuitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `support` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (2,'CRDS','Andrej Hyben','Matej Hlavac'),(3,'Switching','Jozef Trnka','Ondrej Nutny'),(4,'Regena','Jon Doe','Tim Klark'),(5,'OTRS','Daniel Balon','Rasto Glavic'),(6,'HJKL','Jan Klace','Miro Drcic'),(8,'Perf','SuperTest','');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_slovak_ci,
  `path` text COLLATE utf8_slovak_ci,
  `type` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `multimedia_folder_id` int(11) DEFAULT NULL,
  `datein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mul_fol` (`multimedia_folder_id`),
  CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`multimedia_folder_id`) REFERENCES `multimedia_folder` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=359 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
INSERT INTO `multimedia` VALUES (1,NULL,NULL,NULL,NULL,'2018-01-02 10:19:00',NULL),(184,'photo-1428279148693-1cf2163ed67d.jpg','multimedia/multimedias/photo-1428279148693-1cf2163ed67d.jpg','image/jpeg',NULL,'2016-08-18 06:08:14','287007'),(185,'photo-1441312311734-f44cc0bda31d.jpg','multimedia/multimedias/photo-1441312311734-f44cc0bda31d.jpg','image/jpeg',NULL,'2016-08-18 06:08:26','792644'),(186,'photo-1446776899648-aa78eefe8ed0.jpg','multimedia/multimedias/photo-1446776899648-aa78eefe8ed0.jpg','image/jpeg',NULL,'2016-08-18 06:08:48','736034'),(187,'photo-1447752875215-b2761acb3c5d.jpg','multimedia/multimedias/photo-1447752875215-b2761acb3c5d.jpg','image/jpeg',NULL,'2016-08-18 06:08:59','712070'),(188,'photo-1449157291145-7efd050a4d0e.jpg','multimedia/multimedias/photo-1449157291145-7efd050a4d0e.jpg','image/jpeg',NULL,'2016-08-18 06:09:13','312436'),(189,'photo-1453668069544-b8dbea7a0477.jpg','multimedia/multimedias/photo-1453668069544-b8dbea7a0477.jpg','image/jpeg',NULL,'2016-08-18 06:09:22','443417'),(190,'photo-1457685373807-8c4d8be4c560.jpg','multimedia/multimedias/photo-1457685373807-8c4d8be4c560.jpg','image/jpeg',NULL,'2016-08-18 06:09:32','252968'),(191,'photo-1458668383970-8ddd3927deed.jpg','multimedia/multimedias/photo-1458668383970-8ddd3927deed.jpg','image/jpeg',NULL,'2016-08-18 06:09:55','279961'),(192,'photo-1460923396110-d57007bc184f.jpg','multimedia/multimedias/photo-1460923396110-d57007bc184f.jpg','image/jpeg',NULL,'2016-08-18 06:10:05','439093'),(193,'photo-1462887522061-50ac95eaad10.jpg','multimedia/multimedias/photo-1462887522061-50ac95eaad10.jpg','image/jpeg',NULL,'2016-08-18 06:10:15','389639'),(194,'photo-1463995439889-6cc080aaf7dd.jpg','multimedia/multimedias/photo-1463995439889-6cc080aaf7dd.jpg','image/jpeg',NULL,'2016-08-18 06:10:25','683153'),(195,'photo-1464013778555-8e723c2f01f8.jpg','multimedia/multimedias/photo-1464013778555-8e723c2f01f8.jpg','image/jpeg',NULL,'2016-08-18 06:10:34','481118'),(196,'photo-1464565134312-083f9c103854.jpg','multimedia/multimedias/photo-1464565134312-083f9c103854.jpg','image/jpeg',NULL,'2016-08-18 06:10:45','764304'),(197,'photo-1465083817055-242d46f326c8.jpg','multimedia/multimedias/photo-1465083817055-242d46f326c8.jpg','image/jpeg',NULL,'2016-08-18 06:11:11','403507'),(198,'photo-1465491736982-abaddedcedc7.jpg','multimedia/multimedias/photo-1465491736982-abaddedcedc7.jpg','image/jpeg',NULL,'2016-08-18 06:11:22','256556'),(199,'photo-1466838931486-92f3b5ff31a6.jpg','multimedia/multimedias/photo-1466838931486-92f3b5ff31a6.jpg','image/jpeg',NULL,'2016-08-18 06:11:32','980998'),(200,'photo-1466927593098-4d4aa7a2b2d8.jpg','multimedia/multimedias/photo-1466927593098-4d4aa7a2b2d8.jpg','image/jpeg',NULL,'2016-08-18 06:11:44','294054'),(201,'photo-1467154030602-c218f6ed540a.jpg','multimedia/multimedias/photo-1467154030602-c218f6ed540a.jpg','image/jpeg',NULL,'2016-08-18 06:11:56','276045'),(202,'photo-1467226632440-65f0b4957563.jpg','multimedia/multimedias/photo-1467226632440-65f0b4957563.jpg','image/jpeg',NULL,'2016-08-18 06:12:06','441962'),(203,'1photo-1467226632440-65f0b4957563.jpg','multimedia/multimedias/1photo-1467226632440-65f0b4957563.jpg','image/jpeg',NULL,'2016-08-18 06:12:18','441962'),(204,'unsplash-527bf56961712-1.jpg','multimedia/multimedias/unsplash-527bf56961712-1.jpg','image/jpeg',NULL,'2016-08-18 06:13:14','393214'),(205,'Y1hediOeRoya666XCjYg-forest.jpg','multimedia/multimedias/Y1hediOeRoya666XCjYg-forest.jpg','image/jpeg',NULL,'2016-08-18 06:13:23','780327'),(210,'whitelogo.png','multimedia/client/whitelogo.png','image/png',NULL,'2018-01-02 12:18:05','2565'),(211,'favicon.png','multimedia/client/favicon.png','image/png',NULL,'2018-01-02 12:18:05','2005'),(212,'juno-logo.png','multimedia/client/juno-logo.png','image/png',NULL,'2018-01-11 16:26:16','6306'),(213,'1favicon.png','multimedia/client/1favicon.png','image/png',NULL,'2018-01-11 16:26:16','8536'),(214,'1juno-logo.png','multimedia/client/1juno-logo.png','image/png',NULL,'2018-01-17 18:17:17','6306'),(215,'21favicon.png','multimedia/client/21favicon.png','image/png',NULL,'2018-01-17 18:17:17','8536'),(216,'desc.gif','multimedia/projects/5/testcases/desc.gif','image/gif',NULL,'2018-01-18 09:00:56','54'),(217,'321favicon.png','multimedia/projects/5/testcases/321favicon.png','image/png',NULL,'2018-01-18 09:00:56','8536'),(218,'21juno-logo.png','multimedia/projects/5/testcases/21juno-logo.png','image/png',NULL,'2018-01-18 09:00:56','6306'),(219,'321juno-logo.png','multimedia/client/321juno-logo.png','image/png',NULL,'2018-01-18 09:39:53','6306'),(220,'4321favicon.png','multimedia/client/4321favicon.png','image/png',NULL,'2018-01-18 09:39:53','8536'),(221,'Voucher-AXA.pdf','multimedia/projects/15/issues/Voucher-AXA.pdf','application/pdf',NULL,'2018-02-08 10:15:05','224181'),(222,'test-import-sablona-v01.xlsx','multimedia/projects/18/testcases/test-import-sablona-v01.xlsx',NULL,NULL,'2018-02-13 13:53:24','10798'),(223,'code.png','multimedia/projects/3/issues/code.png',NULL,NULL,'2018-02-14 16:00:51','646611'),(231,'Screen-Shot-2018-02-14-at-18.18.37.png','multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.18.37.png',NULL,NULL,'2018-02-14 17:43:43','265640'),(232,'Screen-Shot-2018-02-14-at-18.47.03.png','multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.47.03.png',NULL,NULL,'2018-02-14 17:54:37','186316'),(233,'Screen-Shot-2018-02-14-at-18.47.03.png','multimedia/projects/23/issues/Screen-Shot-2018-02-14-at-18.47.03.png',NULL,NULL,'2018-02-14 17:54:37','186316'),(234,'Snimek-obrazovky-2018-02-20-v-10.24.27.png','multimedia/loginPictures/Snimek-obrazovky-2018-02-20-v-10.24.27.png',NULL,NULL,'2018-02-20 10:43:34','284093'),(235,'JunoDashboardInspire.jpg','multimedia/loginPictures/JunoDashboardInspire.jpg',NULL,NULL,'2018-02-20 11:03:41','50293'),(237,'Snimek-obrazovky-2018-02-20-v-12.29.40.png','multimedia/projects/30/issues/Snimek-obrazovky-2018-02-20-v-12.29.40.png',NULL,NULL,'2018-02-27 09:08:10','325463'),(238,'Snimek-obrazovky-2018-02-15-v-14.31.21.png','multimedia/projects/30/issues/Snimek-obrazovky-2018-02-15-v-14.31.21.png',NULL,NULL,'2018-02-27 09:14:49','157802'),(239,'Snimek-obrazovky-2018-03-01-v-9.37.56.png','multimedia/loginPictures/Snimek-obrazovky-2018-03-01-v-9.37.56.png',NULL,NULL,'2018-03-01 12:07:28','230707'),(240,'4321juno-logo.png','multimedia/client/4321juno-logo.png',NULL,NULL,'2018-03-03 20:58:29','6306'),(241,'symbol-juno-web.png','multimedia/client/symbol-juno-web.png',NULL,NULL,'2018-03-03 20:58:29','8536'),(242,'C8HJUhKUQAAfrLQ.jpg','multimedia/avatars/C8HJUhKUQAAfrLQ.jpg',NULL,NULL,'2018-03-05 11:31:32','147300'),(243,'avatar.png','multimedia/client/symbol-juno-web.png',NULL,NULL,'2018-03-06 16:32:36','96973'),(244,'image002.png','multimedia/client/image002.png',NULL,NULL,'2018-03-07 15:47:53','308878'),(245,'1C8HJUhKUQAAfrLQ.jpg','multimedia/client/1C8HJUhKUQAAfrLQ.jpg',NULL,NULL,'2018-03-07 15:48:49','147300'),(246,'MyFaceCB.jpg','multimedia/client/MyFaceCB.jpg',NULL,NULL,'2018-03-07 16:09:22','54979'),(247,'IMG-E8553.JPG','multimedia/client/IMG-E8553.JPG',NULL,NULL,'2018-03-08 10:56:59','1445746'),(248,'closed-issue.png','multimedia/client/closed-issue.png',NULL,NULL,'2018-03-08 10:57:25','369739'),(249,'20170904-181032.jpg','multimedia/client/20170904-181032.jpg',NULL,NULL,'2018-03-08 17:51:23','1322698'),(250,'22051023-10210139394697787-943754367903693802-o.jpg','multimedia/client/22051023-10210139394697787-943754367903693802-o.jpg',NULL,NULL,'2018-03-08 21:47:39','229172'),(251,'DBTEG.png','multimedia/client/DBTEG.png',NULL,NULL,'2018-03-09 08:58:03','22875'),(252,'denik.jpg','multimedia/client/denik.jpg',NULL,NULL,'2018-03-15 08:29:17','1042786'),(253,'Avatar.png','multimedia/client/Avatar.png',NULL,NULL,'2018-03-15 08:38:05','78995'),(254,'DSC1585fin.jpg','multimedia/client/DSC1585fin.jpg',NULL,NULL,'2018-03-16 11:03:09','512075'),(255,'aa.png','multimedia/projects/51/testcases/aa.png',NULL,NULL,'2018-03-20 13:48:13','408593'),(256,'TCases-PRMS.zip','multimedia/projects/51/testcases/TCases-PRMS.zip',NULL,NULL,'2018-03-20 13:49:31','51510'),(257,'reports-1-.pdf','multimedia/projects/51/testcases/reports-1-.pdf',NULL,NULL,'2018-03-20 13:49:57','36037'),(258,'test-juno.sql','multimedia/projects/51/testcases/test-juno.sql',NULL,NULL,'2018-03-20 13:51:40','562610'),(259,'Struktorogram-1-.xml','multimedia/projects/51/testcases/Struktorogram-1-.xml',NULL,NULL,'2018-03-20 13:52:03','33431'),(260,'Composer-Setup.exe','multimedia/projects/51/testcases/Composer-Setup.exe',NULL,NULL,'2018-03-20 13:52:03','765592'),(263,'54321juno-logo.png','multimedia/client/54321juno-logo.png',NULL,NULL,'2018-03-20 17:30:21','3008'),(264,'Snimek-obrazovky-2018-03-22-v-10.21.47.png','multimedia/loginPictures/Snimek-obrazovky-2018-03-22-v-10.21.47.png',NULL,NULL,'2018-03-22 11:26:15','210870'),(265,'issue-export-22032018.csv','multimedia/projects/60/issues/issue-export-22032018.csv',NULL,NULL,'2018-03-23 14:38:48','2875'),(266,'avatr.png','multimedia/client/avatr.png',NULL,NULL,'2018-03-27 20:24:15','3722'),(267,'download.jpeg','multimedia/client/download.jpeg',NULL,NULL,'2018-03-28 09:15:00','2645'),(271,'IMG-5198.JPG','multimedia/loginPictures/IMG-5198.JPG',NULL,NULL,'2018-04-03 13:50:47','330763'),(272,'kryti.png','multimedia/client/kryti.png',NULL,NULL,'2018-04-03 15:21:47','112710'),(273,'Arch.png','multimedia/client/Arch.png',NULL,NULL,'2018-04-03 15:21:48','106104'),(274,'154321juno-logo.png','multimedia/client/154321juno-logo.png',NULL,NULL,'2018-04-03 15:22:07','3018'),(275,'1symbol-juno-web.png','multimedia/client/1symbol-juno-web.png',NULL,NULL,'2018-04-03 15:22:07','1513'),(276,'faktura-FV20170001.pdf','multimedia/projects/56/testcases/faktura-FV20170001.pdf',NULL,NULL,'2018-04-05 09:41:07','71812'),(277,'11symbol-juno-web.png','multimedia/client/11symbol-juno-web.png',NULL,NULL,'2018-04-05 09:42:33','1513'),(278,'11symbol-juno-web.png','multimedia/client/11symbol-juno-web.png',NULL,NULL,'2018-04-05 09:42:33','1513'),(279,'211symbol-juno-web.png','multimedia/client/211symbol-juno-web.png',NULL,NULL,'2018-04-05 09:42:43','1513'),(280,'3211symbol-juno-web.png','multimedia/client/3211symbol-juno-web.png',NULL,NULL,'2018-04-05 09:42:52','1513'),(281,'1154321juno-logo.png','multimedia/client/1154321juno-logo.png',NULL,NULL,'2018-04-05 09:42:58','3018'),(282,'21154321juno-logo.png','multimedia/client/21154321juno-logo.png',NULL,NULL,'2018-04-05 10:04:02','3018'),(283,'1IMG-E8553.JPG','multimedia/projects/60/issues/1IMG-E8553.JPG',NULL,NULL,'2018-04-05 10:19:36','1445746'),(284,'321154321juno-logo.png','multimedia/projects/60/issues/321154321juno-logo.png',NULL,NULL,'2018-04-05 10:22:54','3018'),(285,'43211symbol-juno-web.png','multimedia/projects/60/issues/43211symbol-juno-web.png',NULL,NULL,'2018-04-05 10:22:54','1513'),(286,'543211symbol-juno-web.png','multimedia/projects/60/issues/543211symbol-juno-web.png',NULL,NULL,'2018-04-05 10:26:51','1513'),(287,'4321154321juno-logo.png','multimedia/projects/60/issues/4321154321juno-logo.png',NULL,NULL,'2018-04-05 10:26:51','3018'),(288,'543211symbol-juno-web.png','multimedia/projects/60/issues/543211symbol-juno-web.png',NULL,NULL,'2018-04-05 10:26:51','1513'),(289,'54321154321juno-logo.png','multimedia/loginPictures/54321154321juno-logo.png',NULL,NULL,'2018-04-05 11:24:01','3018'),(290,'20170903-220201.jpg','multimedia/loginPictures/20170903-220201.jpg',NULL,NULL,'2018-04-05 14:52:24','801551'),(291,'DSCF3104.jpg','multimedia/client/DSCF3104.jpg',NULL,NULL,'2018-04-11 12:48:13','178185'),(292,'foto.jpg','multimedia/client/foto.jpg',NULL,NULL,'2018-04-16 09:13:13','229172'),(293,'reports-16042018.pdf','multimedia/projects/78/issues/reports-16042018.pdf',NULL,NULL,'2018-04-17 06:48:35','80310'),(294,'reports-12042018-1-.pdf','multimedia/projects/78/issues/reports-12042018-1-.pdf',NULL,NULL,'2018-04-17 06:48:35','30603'),(295,'reports-12042018.pdf','multimedia/projects/78/issues/reports-12042018.pdf',NULL,NULL,'2018-04-17 06:48:35','29993'),(296,'reports-12042018-3.pdf','multimedia/projects/78/issues/reports-12042018-3.pdf',NULL,NULL,'2018-04-17 06:49:40','29857'),(297,'reports-12042018-2-.pdf','multimedia/projects/60/issues/reports-12042018-2-.pdf',NULL,NULL,'2018-04-17 06:51:50','30096'),(303,'reports-17042018-1-.pdf','multimedia/projects/23/testcases/reports-17042018-1-.pdf',NULL,NULL,'2018-04-17 13:41:46','91198'),(304,'issue-issue-issue','multimedia/projects/56/issues/issue-issue-issue',NULL,NULL,'2018-04-17 14:25:40','17'),(305,'reports-20042018.pdf','multimedia/projects/80/issues/reports-20042018.pdf',NULL,NULL,'2018-04-20 12:39:08','83699'),(306,'Export-20.4.2018.xls','multimedia/projects/80/issues/Export-20.4.2018.xls',NULL,NULL,'2018-04-20 12:39:08','45568'),(307,'Snimek-obrazovky-2018-04-20-v-12.45.52.png','multimedia/projects/60/issues/Snimek-obrazovky-2018-04-20-v-12.45.52.png',NULL,NULL,'2018-04-24 08:53:21','425504'),(308,'Snimek-obrazovky-2018-04-20-v-12.41.18.png','multimedia/projects/60/issues/Snimek-obrazovky-2018-04-20-v-12.41.18.png',NULL,NULL,'2018-04-24 08:53:21','1098966'),(309,'3TS.png','multimedia/projects/60/issues/3TS.png',NULL,NULL,'2018-04-24 13:43:34','131985'),(310,'metodaDaskalos.docx','multimedia/projects/60/issues/metodaDaskalos.docx',NULL,NULL,'2018-04-26 09:07:12','11911'),(311,'David-Grunt-Hodnoceni.docx','multimedia/projects/51/testcases/David-Grunt-Hodnoceni.docx',NULL,NULL,'2018-05-03 13:23:50','11492'),(312,'A.png','multimedia/projects/60/issues/A.png',NULL,NULL,'2018-05-03 13:48:28','64208'),(314,'1David-Grunt-Hodnoceni.docx','multimedia/projects/23/issues/1David-Grunt-Hodnoceni.docx',NULL,NULL,'2018-05-04 09:51:55','11492'),(315,'issue-export-20042018.xls','multimedia/projects/106/issues/issue-export-20042018.xls',NULL,NULL,'2018-05-04 15:19:39','6656'),(316,'PATH.txt','multimedia/projects/100/issues/PATH.txt',NULL,NULL,'2018-05-07 15:59:20','50'),(321,'a.png','multimedia/projects/a.png',NULL,NULL,'2018-05-09 10:38:49','586308'),(322,'1a.png','multimedia/projects/1a.png',NULL,NULL,'2018-05-09 10:39:08','586308'),(323,'zapocet.pdf','multimedia/projects/zapocet.pdf',NULL,NULL,'2018-05-09 10:42:53','173463'),(324,'21a.png','multimedia/projects/21a.png',NULL,NULL,'2018-05-09 10:43:37','586308'),(325,'321a.png','multimedia/projects/108/issues/321a.png',NULL,NULL,'2018-05-09 13:19:41','586308'),(326,'4321a.png','multimedia/projects/108/issues/4321a.png',NULL,NULL,'2018-05-09 13:49:16','586308'),(327,'Program.cs','multimedia/projects/Program.cs',NULL,NULL,'2018-05-11 09:26:46','9575'),(328,'1Program.cs','multimedia/projects/1Program.cs',NULL,NULL,'2018-05-11 09:27:53','9575'),(329,'AdamGrunt.csproj','multimedia/projects/AdamGrunt.csproj',NULL,NULL,'2018-05-11 09:31:43','2327'),(330,'reports-11052018.pdf','multimedia/projects/reports-11052018.pdf',NULL,NULL,'2018-05-11 13:01:00','151577'),(331,'1reports-11052018.pdf','multimedia/projects/111/issues/1reports-11052018.pdf',NULL,NULL,'2018-05-11 13:06:51','151577'),(332,'B.png','multimedia/projects/112/issues/B.png',NULL,NULL,'2018-05-11 13:41:18','515825'),(333,'54321a.png','multimedia/projects/54321a.png',NULL,NULL,'2018-05-24 09:42:41','189502'),(334,'654321a.png','multimedia/projects/654321a.png',NULL,NULL,'2018-05-24 09:43:24','189502'),(335,'7654321a.png','multimedia/projects/7654321a.png',NULL,NULL,'2018-05-24 09:44:13','189502'),(336,'1zapocet.pdf','multimedia/projects/1zapocet.pdf',NULL,NULL,'2018-05-24 09:44:27','173463'),(337,'87654321a.png','multimedia/projects/87654321a.png',NULL,NULL,'2018-05-25 10:22:55','184074'),(338,'Juno-logo-new.png','multimedia/client/Juno-logo-new.png',NULL,NULL,'2018-05-25 16:19:40','14687'),(339,'987654321a.png','multimedia/projects/111/issues/987654321a.png',NULL,NULL,'2018-05-28 14:09:27','129948'),(340,'21zapocet.pdf','multimedia/projects/111/issues/21zapocet.pdf',NULL,NULL,'2018-05-28 14:28:10','173463'),(341,'Screen-Shot-2018-04-17-at-08.05.16.png','multimedia/projects/Screen-Shot-2018-04-17-at-08.05.16.png',NULL,NULL,'2018-05-29 10:44:11','19841'),(342,'Snimek-obrazovky-2018-05-24-v-9.43.39.png','multimedia/projects/80/issues/Snimek-obrazovky-2018-05-24-v-9.43.39.png',NULL,NULL,'2018-05-29 14:21:32','210366'),(343,'Test_Step_Result_','multimedia/projects/Test_Step_Result_',NULL,NULL,'2018-05-31 09:05:18','1513'),(344,'PerfJunoImport.xlsx','multimedia/projects/127/issues/PerfJunoImport.xlsx',NULL,NULL,'2018-06-04 14:40:10','17719'),(345,'perf.txt','multimedia/projects/127/issues/perf.txt',NULL,NULL,'2018-06-04 14:55:33','0'),(346,'1perf.txt','multimedia/projects/127/issues/1perf.txt',NULL,NULL,'2018-06-04 14:57:44','0'),(347,'21perf.txt','multimedia/projects/127/issues/21perf.txt',NULL,NULL,'2018-06-04 15:08:07','0'),(348,'321perf.txt','multimedia/projects/127/issues/321perf.txt',NULL,NULL,'2018-06-04 15:13:06','0'),(349,'4321perf.txt','multimedia/projects/127/issues/4321perf.txt',NULL,NULL,'2018-06-04 15:20:33','0'),(352,'54321perf.txt','multimedia/projects/127/issues/54321perf.txt',NULL,NULL,'2018-06-06 11:23:16','0');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_folder`
--

DROP TABLE IF EXISTS `multimedia_folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `datein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_folder`
--

LOCK TABLES `multimedia_folder` WRITE;
/*!40000 ALTER TABLE `multimedia_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `create_date` datetime NOT NULL,
  `read_date` datetime DEFAULT NULL,
  `can_be_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BF5476CAA76ED395` (`user_id`),
  CONSTRAINT `FK_BF5476CAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `name_safe` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text COLLATE utf8_slovak_ci,
  `archive` tinyint(4) DEFAULT '0',
  `tracker` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `tracker_user` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `tracker_password` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `tracker_project_name` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `tracker_url` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `tracker_webservice_name` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `update_issues_from_tracker` tinyint(1) DEFAULT '0',
  `tracker_mapping` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_role`
--

DROP TABLE IF EXISTS `project_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `project_id` (`project_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `project_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_role_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_role_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_role`
--

LOCK TABLES `project_role` WRITE;
/*!40000 ALTER TABLE `project_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `name_safe` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `is_for_project` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Test Manager','test-manager',1),(2,'Project Manager','project-manager',1),(3,'Test Executor','test-executor',1),(4,'Guest','guest',1),(5,'Test Analyst','test-analyst',1),(7,'Developer','developer',1),(8,'Portal administrátor','portal-administrator',0),(9,'Zobrazenie Menu','zobrazenie-menu',0),(15,'Reporter','reporter',1),(34,'Show alerts','show-alerts',0),(43,'PerfPort1','perfport1',0),(48,'User Admin','user-admin',0),(49,'Campaing View','campaing-view',0),(50,'Campaing Edit','campaing-edit',0),(51,'Storage View','storage-view',0),(52,'Storage Edit','storage-edit',0),(53,'Issue View','issue-view',0),(54,'Issue Edit','issue-edit',0),(55,'Log View','log-view',0),(56,'Project View','project-view',0),(57,'Project Create','project-create',0),(58,'Settings View','settings-view',0),(59,'Application Admin','application-admin',0),(60,'Role Admin','role-admin',0),(61,'System View','system-view',0),(62,'System Edit','system-edit',0),(63,'Homepage View','homepage-view',0),(64,'SuperUser','superuser',0),(65,'View All Projects','view-all-projects',0);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_privilege`
--

DROP TABLE IF EXISTS `role_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `role_privilege_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_privilege`
--

LOCK TABLES `role_privilege` WRITE;
/*!40000 ALTER TABLE `role_privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'help','<h2 style=\"text-align: center;\"><strong>Přihl&aacute;&scaron;en&iacute;</strong></h2>\n<p style=\"text-align: justify;\">&nbsp;&nbsp;</p>\n<p style=\"text-align: justify;\">Po přihl&aacute;&scaron;en&iacute; se objev&iacute; domovsk&aacute; str&aacute;nka, kde m&aacute;me stručn&yacute; přehled projektů.</p>\n<p style=\"text-align: justify;\">V&nbsp;lev&eacute; č&aacute;sti vid&iacute;me menu s&nbsp;možnostmi Homepage,,Release/Camp, Projekty,Issue, Uživatel&eacute;, Log, Nastaven&iacute;, Syst&eacute;m, &Uacute;loži&scaron;tě(vysvětlen&iacute; n&iacute;že).</p>\n<p style=\"text-align: justify;\">V&nbsp;prav&eacute;m horn&iacute;m rohu m&aacute;me uživatelsk&eacute; jm&eacute;no, po kliknut&iacute; se n&aacute;m objev&iacute; menu Můj profil,Projekty, Nahl&aacute;sit probl&eacute;m, Logy,&nbsp;Změnit jazyk a tlač&iacute;tko Odhl&aacute;sit se.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Můj profil se objev&iacute; str&aacute;nka, kde můžeme upravit n&aacute;&scaron; profil(jm&eacute;no, heslo, telefonn&iacute; č&iacute;slo). Změny se potvrd&iacute; tlač&iacute;tkem Uložit.</p>\n<p>Po kliknut&iacute; na Projekty n&aacute;m vyskoč&iacute; okno s tabulkou projektů, kter&eacute; jsem vytvořili, nebo jsme jejich souč&aacute;st&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Logy se objev&iacute; tabulka Moje logy, kde vid&iacute;me přehled sv&yacute;ch ud&aacute;lost&iacute; jako vytv&aacute;řen&iacute;, měněn&iacute;, maz&aacute;n&iacute; včetně m&iacute;sta a data proveden&iacute;. V&nbsp;prav&eacute;m horn&iacute;m rohu nad tabulkou je modr&eacute; tlač&iacute;tko, kter&eacute; po kliknut&iacute; otevře filtr vyhled&aacute;v&aacute;n&iacute;. Ten se objevuje u v&scaron;ech tabulek pro jednodu&scaron;&scaron;&iacute; vyhled&aacute;v&aacute;n&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na&nbsp;Nahl&aacute;sit probl&eacute;m se objev&iacute; formul&aacute;ř, kde dopln&iacute;me nadpis, popis, popř&iacute;padě dopln&iacute;me př&iacute;lohy kliknut&iacute;m na tlač&iacute;tko Zvolit soubory. V&scaron;e se potvrd&iacute; tlač&iacute;tkem Odeslat tiket.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na&nbsp;Změnit jazyk vyskoč&iacute; okno s&nbsp;v&yacute;běrem jazyka, kde si můžeme přepnout jazyk.(ENG/SK/CZ)</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<h2 style=\"text-align: center;\"><strong>Homepage</strong></h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Homepage se v&aacute;m otevře &Uacute;vodn&iacute; str&aacute;nka Domov.</p>\n<p style=\"text-align: justify;\">Zde vid&iacute;me přehled sv&yacute;ch Projektů, Issues, Stav sprintů, kde můžete přep&iacute;nat jednotliv&eacute; sprinty, kde se pak podle grafu dozv&iacute;te jejich stav.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Projekt n&aacute;m vyskoč&iacute; okno s tabulkou projektů, kter&eacute; jsem vytvořili, nebo jsme jejich souč&aacute;st&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Kalend&aacute;ř se n&aacute;m zobraz&iacute; kalend&aacute;ř.&nbsp;</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Moje &uacute;lohy se zobraz&iacute; z&aacute;ložka Issues, kde m&aacute;me vyfiltrovan&eacute; pouze Issues, kde jsem nastaven&yacute; jako ře&scaron;itel.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na n&aacute;zev Issue se n&aacute;m zobraz&iacute; dan&aacute; Issue v projektu.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na č&iacute;slo v kolonce POčet m&yacute;ch sc&eacute;n&aacute;řů se n&aacute;m otevře z&aacute;ložka Test Exekuce dan&yacute;ch sc&eacute;n&aacute;řů.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na n&aacute;zev sprintu se n&aacute;m otevře Dashboard Test Sprintu.</p>\n<h2 style=\"text-align: center;\"><strong>Release/Camp</strong></h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Release/Camp se v&aacute;m otevře tabulka Release/Camp.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Vytvořit kampaň n&aacute;m vyskoč&iacute; okno, zad&aacute;me n&aacute;zev a potvrd&iacute;me tlač&iacute;tkem Vytvořit.&nbsp;</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit kampaň se n&aacute;m zobraz&iacute; z&aacute;ložka na &uacute;pravu kampaně. Zde můžeme měnitn&aacute;zev kampaně nebo jednotliv&eacute; iterace a miln&iacute;ky.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me že chceme kampaň smazat.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na n&aacute;zev Kampaně se zobraz&iacute; Dashboard Kampaně.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na n&aacute;zev Test Pl&aacute;nu se zobraz&iacute; Dashboard Test Pl&aacute;nu.</p>\n<p style=\"text-align: justify;\">Kliknut&iacute;m na tlač&iacute;tko Odebrat můžeme z kampaně odebrat dan&yacute; Test Pl&aacute;n.</p>\n<h3 style=\"text-align: justify;\"><strong>Dashboard Kampaně</strong></h3>\n<p>&nbsp;</p>\n<p>Zde vid&iacute;me přehled jednotliv&yacute;ch iterac&iacute; a miln&iacute;ků, Stavy Test Exekuce a Issues v&nbsp;tabulk&aacute;ch a grafech.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Report se st&aacute;hne PDF soubor obsahuj&iacute;c&iacute; ve&scaron;ker&eacute; informace o kampani.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Přidat koment&aacute;ř, přid&aacute;me koment&aacute;ř ke kampani.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko koment&aacute;ře se n&aacute;m zobraz&iacute; historie v&scaron;ech koment&aacute;řu k dan&eacute; kampani.</p>\n<h3 style=\"text-align: justify;\"><strong>&Uacute;prava Kampaně</strong></h3>\n<p>Zde vid&iacute;me přehled jednotliv&yacute;ch iterac&iacute; a miln&iacute;ků&nbsp;&nbsp;a pr&aacute;ce s nimi.</p>\n<p>Po kliknut&iacute; na Upravit kampaň vyskoč&iacute; okno, kde můžeme změnit n&aacute;zev.</p>\n<p>Po kliknut&iacute; na Přidat miln&iacute;k vyskoč&iacute; okno, zad&aacute;me n&aacute;zev, datum, popis, důležitost a tlač&iacute;tkem Vytvořit potvrd&iacute;me.</p>\n<p>Po kliknut&iacute; na Přidat Iteraci vyskoč&iacute; okno, zad&aacute;me n&aacute;zev, popis, zač&aacute;tek a konec Iterace(mus&iacute; b&yacute;t předem vytvořen&eacute; miln&iacute;ky) a barvu grafu, tlač&iacute;tkem Vytvořit potvrd&iacute;me.</p>\n<p>Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me že chceme kampaň smazat.</p>\n<p>Po kliknut&iacute; na Upravit iterace vyskoč&iacute; okno, kde můžeme změnit n&aacute;zev, popis, miln&iacute;ky zač&aacute;tku a konce a barvu.</p>\n<p>Po kliknut&iacute; na Upravit miln&iacute;k vyskoč&iacute; okno, kde můžeme změnit n&aacute;zev, popis, datum a důležitost.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Zpět&nbsp; se n&aacute;m zobraz&iacute; tabulka Release/Camp.</p>\n<h2 style=\"text-align: center;\"><strong>Projekty&nbsp;</strong></h2>\n<p>Zde vid&iacute;me přehled jednotliv&yacute;ch projektů, můžeme zde vytvořit nov&yacute; projekt nebo si zobrazit Archiv projektů.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Vytvořit projekt vyskoč&iacute; okno, kde zad&aacute;me n&aacute;zev a popis.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Archiv se n&aacute;m zobraz&iacute; tabulka projektů, kter&eacute; jsou archivov&aacute;ny.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Otevř&iacute;t projekt se zobraz&iacute; Dashboard Projektu.</p>\n<h3 style=\"text-align: justify;\"><strong>Dashboard&nbsp;projektu</strong></h3>\n<p>Zde vid&iacute;me přehled Projektu důležit&eacute; informace o projektu, Status Test Anal&yacute;zy, Stav Test Exekuce, Projektov&eacute; probl&eacute;my.</p>\n<p>Po kliknut&iacute; na č&iacute;slo v tabulce Status test anal&yacute;zy se n&aacute;m otevře Test Anal&yacute;za s celkov&yacute;m přehledem.&nbsp;</p>\n<p>Po kliknut&iacute; na n&aacute;zev Test Pl&aacute;nu se n&aacute;m otevře&nbsp; Dashboard Test Planu.</p>\n<p>Po kliknut&iacute; na n&aacute;zev Issue se n&aacute;m zobraz&iacute; dan&aacute; Issue v projektu.</p>\n<p>&nbsp;</p>\n<h2 style=\"text-align: justify;\"><span style=\"text-decoration: underline;\"><span style=\"color: #000000;\"><strong>Test Plan</strong></span></span></h2>\n<h3 style=\"text-align: justify;\"><strong>Legenda</strong></h3>\n<p style=\"text-align: justify;\">Test Plan = testovac&iacute; pl&aacute;n<br />Test Sprint = testovac&iacute; běh(sprint) cyklu<br />Test Execution = test exekuce <br />Test Set = sada testů<br />Test Case = testovac&iacute; sc&eacute;n&aacute;ř</p>\n<h3 style=\"text-align: justify;\"><strong>Test plan &ndash; Z&aacute;kladn&iacute; popis + možnosti akce</strong></h3>\n<p style=\"text-align: justify;\"><strong>Popis:</strong> <br />Test Plan n&aacute;m slouž&iacute; k&nbsp;vytvořen&iacute; a spr&aacute;vu jednotliv&yacute;ch běhů(sprintů) testovac&iacute;ch cyklů. <br />V&nbsp;Test Planu jde předev&scaron;&iacute;m o vytv&aacute;řen&iacute; testovac&iacute;ch pl&aacute;nů a test sprintů pro jednotliv&eacute; pl&aacute;ny Dan&yacute;m Test Pl&aacute;nům přiřad&iacute;me Test Set, kter&eacute; obsahuj&iacute; Test Casy, kter&eacute; se budou v&nbsp;jednotliv&yacute;ch Test pl&aacute;nech testovat.<br />Tak&eacute; zde přiřezujeme jednotliv&yacute;m testerům Test Casy k&nbsp;testov&aacute;n&iacute;.</p>\n<p style=\"text-align: justify;\"><strong>Možnosti:</strong><br /> Po kliknut&iacute; na z&aacute;ložku Test plan se v&aacute;m otevře nov&aacute; z&aacute;ložka Test Plan/ Test Plan Sprint. Zde m&aacute;me tabulku Test pl&aacute;nů, kde vid&iacute;me jejich ID, N&aacute;zev, Autora, Datum vytvořen&iacute; a možnosti akc&iacute; jako jsou &Uacute;prava nebo smaz&aacute;n&iacute;.<br />V&nbsp;prav&eacute;m horn&iacute;m rohu nad tabulkou jsou 4 tlač&iacute;tka: Vytvořit nov&yacute; Test Plan, Vytvořit nov&yacute; Test Sprint, Filtr vyhled&aacute;van&iacute;, Možnosti zobrazen&iacute; tabulky.<br />Pokud m&aacute;me vytvořen&yacute; nějak&yacute; Test plan nebo Test Sprint je možnost se na ně pod&iacute;vat kliknut&iacute;m na jejich n&aacute;zev v&nbsp;tabulce.</p>\n<h3 style=\"text-align: justify;\"><strong>Vytvořen&iacute; nov&eacute;ho Test&nbsp;Pl&aacute;nu</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Vytvořit nov&yacute; Test plan se n&aacute;m otevře nov&aacute; z&aacute;ložka. Zde zad&aacute;me n&aacute;zev Test planu a tak&eacute; zde m&aacute;me tabulku kter&aacute; obsahuje Testovac&iacute; Sc&eacute;n&aacute;ře. Z&nbsp;tabulky vybereme Testovac&iacute; Sc&eacute;n&aacute;ř/e, kter&yacute; se maj&iacute; v&nbsp;dan&eacute;m Test planu testovat. (Pokud nem&aacute;me vytvořen&eacute; ž&aacute;dn&eacute; Testovac&iacute; Sc&eacute;n&aacute;ře tabulka bude pr&aacute;zdn&aacute;.) Klikneme na tlač&iacute;tko Přidat a t&iacute;m se n&aacute;m vytvoř&iacute; Test pl&aacute;n.</p>\n<h3 style=\"text-align: justify;\"><strong>Dashboard Test pl&aacute;nu</strong></h3>\n<p><strong>Dashboard:</strong></p>\n<p>Po kliknut&iacute; na n&aacute;zev Test Pl&aacute;nu se otevře Dashboard Test pl&aacute;nu.&nbsp;</p>\n<p>Zde vid&iacute;me informace o dan&eacute;m Test pl&aacute;nu v tabulk&aacute;ch a grafech.</p>\n<p>Můžeme zde přep&iacute;nam mezi jednotliv&yacute;mi Test Pl&aacute;ny, pomoc&iacute; tlač&iacute;tka Změň.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Report se st&aacute;hne PDF soubor obsahuj&iacute;c&iacute; ve&scaron;ker&eacute; informace o Test pl&aacute;nu včetně grafů.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Přidat koment&aacute;ř přid&aacute;me koment&aacute;ř k dan&eacute;mu Test pl&aacute;nu.</p>\n<p>Po kliknut&iacute; na Koment&aacute;ře se n&aacute;m zobraz&iacute; historie v&scaron;ech koment&aacute;řu k Test pl&aacute;nu.</p>\n<p>Po kliknut&iacute; na Zpět se n&aacute;m zobraz&iacute; tabulka Test Pl&aacute;nu.</p>\n<p><strong>Seznam test sprintů:</strong></p>\n<p>Po kliknut&iacute; na Seznam test sprintů se zobraz&iacute; tabulka Test sprintů&nbsp; v Test pl&aacute;nu.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Vytvořit nov&yacute; Test sprint se otevře z&aacute;ložka na Vytvořen&iacute; test sprintu.</p>\n<p>Po kliknut&iacute; na n&aacute;zev Test sprintu nebo tlač&iacute;tko Zobrazit se n&aacute;m otevře Dashboard Test Sprintu.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Upravit se otevře z&aacute;ložka, kde můžeme upravit Test Sprint.&nbsp;</p>\n<p>Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute; Test Sprintu.</p>\n<p><strong>Upravit Test pl&aacute;n:</strong></p>\n<p>Po kliknut&iacute; na Upravit Test pl&aacute;n se otevře z&aacute;ložka, kde můžeme změnit n&aacute;zev Test pl&aacute;nu, nebo jednotliv&eacute; testovac&iacute; sc&eacute;n&aacute;ře co se budou testovat v dan&eacute;m Test pl&aacute;nu.&nbsp;</p>\n<p><strong>Zařadit do kampaně:&nbsp;</strong></p>\n<p>Po kliknut&iacute; na Zařadit do Kampaně se otevře z&aacute;ložka, kde můžu zvolit do jak&eacute; kampaně se Test pl&aacute;n m&aacute; zařadit.</p>\n<p>&nbsp;</p>\n<h3 style=\"text-align: justify;\"><strong>Vytvořen&iacute; nov&eacute;ho Test Sprintu</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Vytvořit nov&yacute; Test Sprint se n&aacute;m otevře nov&aacute; z&aacute;ložka. Zde m&aacute;me 4 kolonky na vyplněn&iacute;: N&aacute;zev Test sprintu, V&yacute;běr Test planu, Zač&aacute;tek a Konec. Aby &scaron;el vytvořit nov&yacute; Test sprint je zapotřeb&iacute; m&iacute;t vytvořen&yacute; alespoň jeden Test plan. (Pokud nevyberete Test plan vyskoč&iacute; v&aacute;m chybov&aacute; hl&aacute;&scaron;ka.) Zad&aacute;me n&aacute;zev Test sprintu, vybereme Test plan, do kter&eacute;ho bude patřit dan&yacute; Test sprint. Nakonec zvol&iacute;me datum zač&aacute;tku a konec Test sprintu. Klikneme na Přidat, t&iacute;m se n&aacute;m vytvoř&iacute; nov&yacute; Test sprint a otevře se nov&aacute; z&aacute;ložka Dashboard Test Sprintu.</p>\n<h3 style=\"text-align: justify;\"><strong>Dashboard Test Sprint</strong></h3>\n<p style=\"text-align: justify;\"><strong>M&aacute;me dvě možnosti na otevřen&iacute; Dashboardu Test Sprintu:</strong></p>\n<p style=\"text-align: justify;\">Vytvořen&iacute;m nov&eacute;ho Test sprintu <br />Kliknut&iacute;m na n&aacute;zev Test sprintu v&nbsp;tabulce &uacute;vodn&iacute; tabulce Test planu</p>\n<h3 style=\"text-align: justify;\"><strong>Dashboard Test Sprintu</strong></h3>\n<h4 style=\"text-align: justify;\"><strong>Dashboard</strong></h4>\n<p>Zde vid&iacute;me informace o dan&eacute;m Test sprintu v tabulk&aacute;ch.</p>\n<p>Můžeme zde přep&iacute;nam mezi jednotliv&yacute;mi Test sprinty, pomoc&iacute; tlač&iacute;tka Změň.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Report se st&aacute;hne PDF soubor obsahuj&iacute;c&iacute; ve&scaron;ker&eacute; informace o Test sprintu.</p>\n<p>Po kliknut&iacute; na tlač&iacute;tko Přidat koment&aacute;ř přid&aacute;me koment&aacute;ř k dan&eacute;mu Test sprintu.</p>\n<p>Po kliknut&iacute; na Koment&aacute;ře se n&aacute;m zobraz&iacute; historie v&scaron;ech koment&aacute;řu k Test sprintu.</p>\n<p>Po kliknut&iacute; na Zpět se n&aacute;m zobraz&iacute; Dashboard Test Pl&aacute;nu.</p>\n<h4 style=\"text-align: justify;\"><strong>Upravit Test sprint</strong></h4>\n<p>Po kliknut&iacute; na Upravit Test sprint se otevře z&aacute;ložka, kde můžeme změnit n&aacute;zev, datumy zač&aacute;tku a konce Test sprintu, nebo jednotliv&eacute; testovac&iacute; sc&eacute;n&aacute;ře co se budou testovat v dan&eacute;m Test sprintu.&nbsp;</p>\n<p style=\"text-align: justify;\"><strong>Upravit Tagy</strong></p>\n<p style=\"text-align: justify;\">Otevře se n&aacute;m z&aacute;ložka spr&aacute;va tagů, zde vid&iacute;me tabulku v&scaron;ech tagů v&nbsp;dan&eacute;m Test sprintu. Obsahuje n&aacute;zev tagu, datum od a datum do. Můžeme zde změnit obě data a kliknut&iacute;m na tlač&iacute;tko Uložit, se projev&iacute; změny.</p>\n<h4 style=\"text-align: justify;\"><strong>Přiřadit testovac&iacute; sc&eacute;n&aacute;ř</strong></h4>\n<p style=\"text-align: justify;\">Otevře se n&aacute;m z&aacute;ložka Přiřadit testovac&iacute; sc&eacute;n&aacute;ř, zde vid&iacute;me tabulku, kter&aacute; obsahuje testery. (Pokud nejsou testeři k&nbsp;projektu přiřazeni tabulka bude pr&aacute;zdn&aacute;.) Kliknut&iacute;m na tlač&iacute;tko Přiřadit testovac&iacute; sc&eacute;n&aacute;řt v&nbsp;prav&eacute; č&aacute;sti se n&aacute;m zobraz&iacute; z&aacute;ložka, kde vid&iacute;me seznam Testovac&iacute;ch sc&eacute;n&aacute;řů. Zde můžeme dan&eacute;mu testerovi přiřadit, jak&eacute; testovac&iacute; sc&eacute;n&aacute;ře m&aacute; testovat. Kliknut&iacute;m na tlač&iacute;tko Uložit se projev&iacute; změny a testerovi se přiřad&iacute; dan&eacute; Testovac&iacute; sc&eacute;n&aacute;ře.<br /><br /></p>\n<h3 style=\"text-align: justify;\">&nbsp;<strong>Upravit Test Plan</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Upravit Test Plan v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Planu se n&aacute;m otevře z&aacute;ložka. Zde můžeme změnit n&aacute;zev jeho přeps&aacute;n&iacute;m, nebo upravit seznam Testovac&iacute;ch sc&eacute;n&aacute;řů, kter&eacute; se maj&iacute; testovat v&nbsp;dan&eacute;m Test planu. Kliknut&iacute;m na tlač&iacute;tko Uložit se projev&iacute; změny. A vr&aacute;t&iacute; n&aacute;s to na &uacute;vodn&iacute; tabulku Test Planu.</p>\n<h3 style=\"text-align: justify;\"><strong>Smazat Test Plan/Sprint</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Smazat v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Planu n&aacute;m vyskoč&iacute; okno Smazat, kter&eacute; se n&aacute;s pt&aacute;, jestli chceme Test Plan/Sprint opravdu smazat. <br />M&aacute;me zde dvě tlač&iacute;tka:<br />Zpět-Vr&aacute;t&iacute; n&aacute;s na &uacute;vodn&iacute; tabulku Test Planu.<br />Smazat-Smaže Test Plan/Sprint</p>\n<h3 style=\"text-align: justify;\"><strong>Filtr</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko filtr n&aacute;m vyskoč&iacute; okno filtru, kter&eacute; obsahuje 4 kolonky: N&aacute;zev TP, Autor TP, rozmez&iacute; datumu vytvořen&iacute;. <br />Po jeho vyplněn&iacute; se n&aacute;m aktualizuje seznam Test Planu/Sprintu. Po vyplněn&iacute; nějak&eacute; kolonky se n&aacute;m zobraz&iacute; tlač&iacute;tko na resetovan&iacute; filtru, kter&eacute; resetuje cel&yacute; filtr.</p>\n<h3 style=\"text-align: justify;\"><strong>Tlač&iacute;tko Možnosti zobrazen&iacute; tabulky</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko n&aacute;m vyskoč&iacute; okno, ve kter&eacute;m můžeme zvolit/zru&scaron;it zobrazen&iacute; někter&eacute; informace tabulky (ID, N&aacute;zev, Autor, Datum vytvořen&iacute;, Akce). Nebo můžeme zvolit zobrazen&iacute; v&scaron;ech sloupců.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<h2 style=\"text-align: justify;\"><span style=\"text-decoration: underline;\"><strong>Test Analyses</strong></span></h2>\n<h3 style=\"text-align: justify;\"><strong>Legenda</strong></h3>\n<p style=\"text-align: justify;\">Test Set = sada testů<br />Test Case = testovac&iacute; sc&eacute;n&aacute;ř<br />Bulk Test Case = skupina testů<br />Import = Nahr&aacute;t</p>\n<h3 style=\"text-align: justify;\"><strong>Test analyses &ndash; Z&aacute;kladn&iacute; popis + možnosti akce</strong></h3>\n<h4 style=\"text-align: justify;\"><strong>Popis:</strong></h4>\n<p style=\"text-align: justify;\">Test anal&yacute;za n&aacute;m slouž&iacute; k&nbsp;vytvořen&iacute; Testovac&iacute;ch sad, kter&eacute; obsahuj&iacute; testovac&iacute; sc&eacute;n&aacute;ře.<br />V&nbsp;Test anal&yacute;ze, lze předev&scaron;&iacute;m o vytvořen&iacute; konkr&eacute;tn&iacute;ch postupů dan&yacute;ch testů, kter&eacute; se později spou&scaron;t&iacute; v&nbsp;Test Exekuci a z&nbsp;t&eacute; dostaneme konkr&eacute;tn&iacute; v&yacute;sledky, jak dan&yacute; test proběhl.<br />Ty se potom přiřazuj&iacute; konkr&eacute;tn&iacute;m Testovac&iacute;m pl&aacute;nům, kter&eacute; se přiřazuj&iacute; testerům.</p>\n<h4 style=\"text-align: justify;\"><strong>Možnosti:</strong></h4>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Test analyses se v&aacute;m otevře nov&aacute; z&aacute;ložka Test analyses. Zde m&aacute;me tabulku Test Set/Casu, kde vid&iacute;me jejich ID, N&aacute;zev, Autora, Schv&aacute;len&iacute;, Datum vytvořen&iacute; a možnosti akc&iacute; jako jsou Přid&aacute;n&iacute;, &Uacute;prava, Klonov&aacute;n&iacute;, Schv&aacute;len&iacute; nebo Smaz&aacute;n&iacute;.<br />V&nbsp;prav&eacute;m horn&iacute;m rohu nad tabulkou je 7 tlač&iacute;tek: Vytvořit Test Set, Přidat Test Case, Přidat Bulk Test Case, Import, Export, Filtr vyhled&aacute;van&iacute;, Možnosti zobrazen&iacute; tabulky.<br />Pokud m&aacute;me vytvořen&yacute; nějak&yacute; Test Case je možnost se na něj pod&iacute;vat kliknut&iacute;m na jeho n&aacute;zev v&nbsp;tabulce.</p>\n<h3 style=\"text-align: justify;\"><strong>Vytvořen&iacute; nov&eacute;ho Test Setu</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Vytvořit nov&yacute; Test Set n&aacute;m vyskoč&iacute; okno Vytvořit nov&yacute; Test Set. Zde zad&aacute;me n&aacute;zev Test Setu a Tagy a Popis projektu. Klikneme na tlač&iacute;tko Přidat a t&iacute;m se n&aacute;m vytvoř&iacute; Test Set.</p>\n<h3 style=\"text-align: justify;\"><strong>Přid&aacute;n&iacute; nov&eacute;ho Test Casu</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Přidat Test Case (Tlač&iacute;tko Nad tabulkou, nebo + v tabulce) n&aacute;m vyskoč&iacute; okno Přidat Test Case. Zde m&aacute;me několik kolonek na vyplněn&iacute;: V&yacute;běr Test Setu (Test Set, do kter&eacute;ho přid&aacute;v&aacute;me Test Case), N&aacute;zev Test Casu, Tagy, Popis, V&yacute;sledek, Priorita,Seznam aplikac&iacute;, Prostřed&iacute;, Modul, Schv&aacute;len&eacute;, Př&iacute;lohy a Test Stepy (Jednotliv&eacute; kroky dan&eacute;ho Test Casu), kter&eacute; jsou rozděleny na dvě č&aacute;sti: Předpoklad a Oček&aacute;van&yacute; v&yacute;sledek. Aby &scaron;el vytvořit nov&yacute; Test Case je zapotřeb&iacute; m&iacute;t vytvořen&yacute; alespoň jeden Test Set. (Pokud nevyberete Test Set vyskoč&iacute; v&aacute;m chybov&aacute; hl&aacute;&scaron;ka.) Vybereme Test Set, do kter&eacute;ho bude Test Case přidan&yacute;.<br /> Zad&aacute;me n&aacute;zev Test Casu, zad&aacute;me tagy, popis, v&yacute;sledek, zvol&iacute;m prioritu dan&eacute;ho Test Casu, vybereme, jestli bude dan&yacute; Test Case schv&aacute;len&yacute;, přid&aacute;me př&iacute;lohy (nen&iacute; nutn&eacute;) a nakonec zad&aacute;me jednotliv&eacute; kroky dan&eacute;ho Test Casu. Po kliknut&iacute; na tlač&iacute;tko Přidat se n&aacute;m vytvoř&iacute; Test Case a zobraz&iacute; se n&aacute;m v&nbsp;&uacute;vodn&iacute; tabulce.</p>\n<p style=\"text-align: justify;\">&nbsp;<strong>Zobrazen&iacute; Test Casu</strong></p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na jm&eacute;no Test Casu n&aacute;m vyskoč&iacute; okno, ve kter&eacute;m vid&iacute;me v&scaron;echny hodnoty, kter&eacute; dan&yacute; Test Case obsahuje. A nav&iacute;c zde vid&iacute;me, kdo dan&yacute; Test Case vytvořil a datum, kdy byl vytvořen. Po kliknut&iacute; na tlač&iacute;tko Zavř&iacute;t se n&aacute;m zobraz&iacute; &uacute;vodn&iacute; tabulka.</p>\n<h3 style=\"text-align: justify;\"><strong>Přid&aacute;n&iacute; Bulk Test Case</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Přidat Bulk Test Case n&aacute;m vyskoč&iacute; okno Přidat Bulk Test Case. Zde m&aacute;me několik kolonek na vyplněn&iacute;. V&yacute;běr Test Setu (Test Set, do kter&eacute;ho přid&aacute;v&aacute;me Bulk Test Case), tuto kolonku můžeme změnit kliknut&iacute;m na Vytvořit nov&yacute; Test Set. Tato funkce n&aacute;m přepne V&yacute;běr Test Setu na Zad&aacute;n&iacute; n&aacute;zvu nov&eacute;ho Test Setu a kolonka Test Case, zde zad&aacute;me n&aacute;zvy nov&yacute;ch Test Casu. <br />Vybereme Test Set, do kter&eacute;ho bude Bulk Test Case přidan&yacute; (Nebo zad&aacute;me n&aacute;zev nov&eacute;ho Test Setu) a zad&aacute;me n&aacute;zvy nov&yacute;ch Test Casu. Kliknut&iacute;m na tlač&iacute;tko Přidat se buď přidaj&iacute; Test Casy do již vytvořen&eacute;ho Test Setu, nebo se vytvoř&iacute; nov&yacute; Test Set a do něho se přidaj&iacute; nov&eacute; Test Casy. A vr&aacute;t&iacute; n&aacute;s to na &uacute;vodn&iacute; tabulku.</p>\n<h3 style=\"text-align: justify;\"><strong>Import</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Import n&aacute;m vyskoč&iacute; okno Import, zde můžeme vybrat (Excel.xlsx) soubor (Importn&iacute; &scaron;ablona). Po kliknut&iacute; na Přidat se n&aacute;m do projektu přidaj&iacute; již vyplněn&eacute; Test Sety a Test Casy z&nbsp;dan&eacute; &scaron;ablony.</p>\n<h3 style=\"text-align: justify;\"><strong>Export</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Export se n&aacute;m st&aacute;hne soubor(Excel) podobn&yacute; Importn&iacute; &scaron;abloně, kter&yacute; po nahran&iacute; vytvoř&iacute; stejn&eacute; Test Sety a Test Casy, kter&eacute; byly v&nbsp;exportovan&eacute; Test Anal&yacute;ze.</p>\n<h3 style=\"text-align: justify;\"><strong>Označit v&scaron;echny Test Casy jako schv&aacute;len&eacute;</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Označit v&scaron;echny Test Casy jako schv&aacute;len&eacute; v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky se n&aacute;m změn&iacute; schv&aacute;len&iacute; v&scaron;ech Test Casu, takže celkov&eacute; schv&aacute;len&iacute; Test Setu na schv&aacute;len&eacute;.</p>\n<h3 style=\"text-align: justify;\"><strong>Upravit Test Set</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Upravit Test Set v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Setu/Casu n&aacute;m vyskoč&iacute; okno Upravit Test Set. <br />Zde můžeme změnit n&aacute;zev a popis jeho přeps&aacute;n&iacute;m, nebo upravit seznam Tagů (Přidat nebo Odebrat), v&nbsp;dan&eacute;ho Test Setu. Kliknut&iacute;m na tlač&iacute;tko Uložit se projev&iacute; změny. A vr&aacute;t&iacute; n&aacute;s to na &uacute;vodn&iacute; tabulku Test Setu/Casu.</p>\n<h3 style=\"text-align: justify;\"><strong>Klonovat Test Case</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Klonovat Test Case v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Setu/Casu n&aacute;m vyskoč&iacute; okno na Vytvořen&iacute; nov&eacute;ho Test Casu. <br />Změn&iacute;me n&aacute;zev Test Casu, uprav&iacute;me potřebn&eacute; změny v&nbsp;někter&eacute; z&nbsp;kolonek: Tagy, Popis, V&yacute;sledek, Priorita, vybereme, jestli bude dan&yacute; Test Case schv&aacute;len&yacute;, Př&iacute;lohy a Test Stepy (Nemus&iacute;me měnit v&scaron;e, pouze věci, ve kter&yacute;ch se bude nov&yacute; Test Case li&scaron;it od původn&iacute;ho klonovan&eacute;ho.) Po kliknut&iacute; na tlač&iacute;tko Přidat se n&aacute;m vytvoř&iacute; nov&yacute; Test Case a zobraz&iacute; se n&aacute;m v&nbsp;&uacute;vodn&iacute; tabulce.</p>\n<h3 style=\"text-align: justify;\"><strong>Upravit Test Case</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Upravit Test Case v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Setu/Casu n&aacute;m vyskoč&iacute; okno Upravit Test Case. <br />Zde můžeme změnit Test Set, do kter&eacute;ho bude patřit dan&yacute; Test Case, n&aacute;zev Test Casu, Tagy, Popis, V&yacute;sledek, Prioritu, Schv&aacute;len&iacute;, Př&iacute;lohy a jednotliv&eacute; Test Stepy. Kliknut&iacute;m na tlač&iacute;tko Uložit se projev&iacute; změny. A vr&aacute;t&iacute; n&aacute;s to na &uacute;vodn&iacute; tabulku Test Setu/Casu.</p>\n<h3 style=\"text-align: justify;\"><strong>Smazat Test Set/Case</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko Smazat v&nbsp;prav&eacute; č&aacute;sti &uacute;vodn&iacute; tabulky Test Setu/Casu n&aacute;m vyskoč&iacute; okno Smazat, kter&eacute; se n&aacute;s pt&aacute;, jestli chceme Test Set/Case opravdu smazat. <br />M&aacute;me zde dvě tlač&iacute;tka:<br />Zpět-Vr&aacute;t&iacute; n&aacute;s na &uacute;vodn&iacute; tabulku Test Setu/Casu.<br />Smazat-Smaže Test Set/Case</p>\n<h3 style=\"text-align: justify;\"><strong>Filtr</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko filtr n&aacute;m vyskoč&iacute; okno filtru, kter&eacute; obsahuje 4 kolonky: N&aacute;zev Test Setu, Autor Test Setu, rozmez&iacute; datumu vytvořen&iacute; Test Setu. <br />Po jeho vyplněn&iacute; se n&aacute;m aktualizuje seznam Test Setu/Casu. Po vyplněn&iacute; nějak&eacute; kolonky se n&aacute;m zobraz&iacute; tlač&iacute;tko na resetovan&iacute; filtru, kter&eacute; resetuje cel&yacute; filtr.</p>\n<h3 style=\"text-align: justify;\"><strong>Tlač&iacute;tko Možnosti zobrazen&iacute; tabulky</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na tlač&iacute;tko n&aacute;m vyskoč&iacute; okno, ve kter&eacute;m můžeme zvolit/zru&scaron;it zobrazen&iacute; někter&eacute; informace tabulky (ID, N&aacute;zev, Autor, Schv&aacute;len&eacute;, Datum vytvořen&iacute;, Akce). Nebo můžeme zvolit zobrazen&iacute; v&scaron;ech sloupců.</p>\n<h2><span style=\"text-decoration: underline;\"><strong>Test Execution</strong></span></h2>\n<h3><strong>Z&aacute;kladn&iacute; popis a akce</strong></h3>\n<p>Po kliknut&iacute; na z&aacute;ložku Test Execution se v&aacute;m otevře str&aacute;nka, kde jsou dva pr&aacute;zdn&eacute; ř&aacute;dky a jedno tlač&iacute;tko s n&aacute;pisem Vybrat .Pokud jsou vytvořeny jak Test Plany tak Test Sprinty můžete kliknut&iacute;m na pr&aacute;zdn&yacute; ř&aacute;dek nějak&yacute; vybrat a kliknout na tlač&iacute;tko Vybrat. Pokud ale nic z toho vytvořen&eacute; nen&iacute; mus&iacute;te si je nejdř&iacute;ve vytvořit. (N&aacute;vod na vytvořen&iacute; je v&yacute;&scaron;e....)Po kliknut&iacute; na tlač&iacute;tko Vybrat se otevře nov&aacute; str&aacute;nka, kde je seznam různ&yacute;ch sc&eacute;n&aacute;řů k testov&aacute;n&iacute;. Sc&eacute;n&aacute;ře, kter&eacute; j&iacute;ž byly testovan&eacute; jsou označen&eacute; buď zelenou, červenou nebo žlutou barvou.V seznamu m&aacute;te vyps&aacute;ny n&aacute;sleduj&iacute;c&iacute; &uacute;daje. ID sc&eacute;n&aacute;ře, n&aacute;zev Test Setu, n&aacute;zev Test Casu, počet Test Stepů v Test Casu, počet otestovan&yacute;ch Test Stepů, Status po proveden&iacute;, priorita proveden&iacute; sc&eacute;n&aacute;ře a posledn&iacute; je tlač&iacute;tko Otevř&iacute;t nebo-li akce .</p>\n<h3><strong>Proveden&iacute;&nbsp;Exekuce</strong></h3>\n<p>Pokud kliknete na tlač&iacute;tko Otevř&iacute;t, otevře se ok&eacute;nko pro testovan&iacute; dan&eacute;ho sc&eacute;n&aacute;ře.</p>\n<p>Zde jsou vidět podobn&eacute; informace jako v seznamu sc&eacute;n&aacute;řů nav&iacute;c jsou zde podrobn&eacute; o Test Stepech jako je jejich ID, předpoklad proveden&iacute; a oček&aacute;van&yacute; v&yacute;sledek. Vpravo v rohu si můžeme pov&scaron;imnout 3 akc&iacute;. 1. akc&iacute; je časovač ten se po stisknut&iacute; tlač&iacute;tka play spust&iacute;. 2. akc&iacute; je Priorita, zde je vidět jak důležit&eacute; je proveden&iacute; n&aacute;sleduj&iacute;c&iacute;ho sc&eacute;n&aacute;ře.</p>\n<p>Akce je status, kter&yacute; dok&aacute;že nastavit v&scaron;em Test Stepům najednou přiřadit stejnou hodnotu. Tak&eacute; si můžeme pov&scaron;imnout, že status je u jednotliv&yacute;ch Test Stepů &scaron;ediv&yacute;. To proto, že před nastavov&aacute;n&iacute; statusu u jednotliv&yacute;ch Test Stepů se mus&iacute; spustit časovač. Po spu&scaron;těn&iacute; časovače se tlač&iacute;tka zv&yacute;razn&iacute; a vy na ně můžete kliknout. Když na ně kliknete zobraz&iacute; se 5 možnost&iacute; : Passed, Failed, No Run, N/A a Not Completed. U každ&eacute;ho Test stepu můžete zvolit v&yacute;sledek, kter&yacute; se prop&iacute;&scaron;e do tabulky Historie Test Stepu.&nbsp;<br />Pokud zvol&iacute;te možnost Passed, cel&yacute; řadek dostane zelenou barvu a vy můžete přejit k dal&scaron;&iacute;mu kroku. Když zvol&iacute;te Failed, cel&yacute; ř&aacute;dek zčerven&aacute; a pod tlač&iacute;tkem, kde je naps&aacute;no Failed se objev&iacute; slovo Issue na, kter&eacute; vy mus&iacute;te kliknout a vytvořit způsobem,kter&yacute; je pops&aacute;n v kapitole Issues jelikož dan&yacute; Test Step se nepovedl splnit. To sam&eacute; se děje i u hl&aacute;&scaron;ek N/A a Not Completed, akor&aacute;t že m&iacute;sto červen&eacute; je ř&aacute;dek žlut&yacute;. Po splněn&iacute; v&scaron;ech Test Stepu vypnete časovač a kliknete na tlač&iacute;tko Zavř&iacute;t.</p>\n<h3><strong>Historie při prov&aacute;děn&iacute; Test Execution</strong></h3>\n<p>Po proveden&iacute; jednotliv&eacute;ho kroku a označen&iacute; kroku odpov&iacute;daj&iacute;c&iacute;m statusem se pod touto kolonkou vedle n&aacute;pisu issue zobraz&iacute; n&aacute;pis Historie. Po kliknut&iacute; na tento n&aacute;pis se zobraz&iacute; ok&eacute;nko, kde je možno vidět kdo prov&aacute;děl danou exekuci, kdy byla provedena a jak&yacute;m v&yacute;sledkem skončila. Tak&eacute; je zde vidět historie issue, kter&eacute; byly vytvořeny. U nich je možno vidět, kdo je vytvořil jak&eacute; maj&iacute; ID a kdy byly vytvořeny. a je zde vidět v&yacute;sledek Test Stepu a př&iacute;padně přidan&eacute; př&iacute;lohy.</p>\n<h3><strong>Vyhled&aacute;v&aacute;n&iacute; konkr&eacute;tn&iacute; Execution</strong></h3>\n<p>Pokud je na str&aacute;nce hodně sc&eacute;n&aacute;řů a vy hled&aacute;te jeden konkr&eacute;tn&iacute; mohl by v&aacute;m pomoci filtr. Ten se objev&iacute; kliknut&iacute;m na modr&eacute; tlač&iacute;tko, kter&eacute; se nach&aacute;z&iacute; vpravo nad sloupcem s akc&iacute;. Zde m&aacute;te na v&yacute;běr ze 4 možnost. Buď můžete hledat pomoc&iacute; n&aacute;zvu Test Setu, n&aacute;zvu Test Casu, Priority a nebo Statusu, kter&yacute; m&aacute; požadovan&yacute; sc&eacute;n&aacute;ř.</p>\n<h2 style=\"text-align: justify;\"><span style=\"text-decoration: underline;\"><strong>Issues</strong></span></h2>\n<h3 style=\"text-align: justify;\"><strong>Issue- Z&aacute;kladn&iacute; popis a akce</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Issues se zobraz&iacute; str&aacute;nka, kde je možno vidět seznam již vytvořen&yacute;ch Issues. Je zde vidět jejich ID, n&aacute;zev Test Stepu, Sprintu a Casu pro kter&eacute; byla Issue vytvořena, n&aacute;zev Issue, popis dan&eacute; Issue, kdo m&aacute; Issue ře&scaron;it, typ Issue (jestli je to bug, defect nebo request), jej&iacute; prioritu, status a datum vytvořen&iacute; Issue.Vpravo vedle data vytvořen&iacute; jsou viděl jednotliv&eacute; akce. Je zde Zobrazit Issue, Editovat Issue a Smazat Issue. Nad těmito akcemi jsou vidět dal&scaron;&iacute; 4 tlač&iacute;tka. Když kliknete na mal&eacute; modr&eacute; tlač&iacute;tko , tak se v&aacute;m zobraz&iacute; filtr, kter&yacute; v&aacute;m usnadn&iacute; pr&aacute;ci při vyhled&aacute;v&aacute;n&iacute; konkr&eacute;tn&iacute; Issue. Pokud kliknete vedle na mal&eacute; b&iacute;le tlač&iacute;tko, zobraz&iacute; seznam věc&iacute;, kter&eacute; chcete v seznamu u Issue vidět. Tento seznam si můžete jakkoliv editovat např. v seznamu bude vidět jen n&aacute;zev Issues, jejich priorita a ře&scaron;itel.</p>\n<h3 style=\"text-align: justify;\"><strong>Založen&iacute; nov&eacute; Issue</strong></h3>\n<p style=\"text-align: justify;\">Je to možn&eacute; dvěma způsoby. 1. způsob už byl zm&iacute;něn u Test Execution. Takže zde bude pops&aacute;n ten druh&yacute;. Prvn&iacute;m krokem je kliknut&iacute; na tlač&iacute;tko Založit Issue, kde se pot&eacute; zobraz&iacute; str&aacute;nka s voln&yacute;mi kolonkami, kter&eacute; mus&iacute; b&yacute;t vyplněny.Mus&iacute;te zde zadat vybrat Test Plan, Sprint, Set, Case a Step u kter&eacute;ho chyba nastala, zvolit Prioritu, kter&aacute; může nab&yacute;vat hodnot: Low, Medium a High, Typ dan&eacute; chyby, kter&yacute; může b&yacute;t buď Bug, Defect a nebo Request. Pot&eacute; stručně napsat n&aacute;zev chyby a pod to podrobněj&scaron;&iacute; popis probl&eacute;mu. Tak&eacute; zde můžete přidat přilohu jako např. obr&aacute;zek co přesně se stalo, když nastala chyba. A vyplnit Seznam aplikac&iacute;, Prostřed&iacute;, Modul pokud je třeba. V posledn&iacute; řadě mus&iacute;te zvolit kdo by dan&yacute; probl&eacute;m měl vyře&scaron;it .&nbsp;</p>\n<h3 style=\"text-align: justify;\"><strong>Export Issues</strong></h3>\n<p style=\"text-align: justify;\">Kliknut&iacute;m na tlač&iacute;tko Export se do va&scaron;eho poč&iacute;tače st&aacute;hne soubor s př&iacute;ponou .csv. Tu když otevřete tak zde bude tabulka Issues kter&eacute; jsou i na port&aacute;le se v&scaron;emi informacemi o Issues.</p>\n<h3 style=\"text-align: justify;\"><strong>Zobrazit Issue</strong></h3>\n<p style=\"text-align: justify;\">Když kliknete na tlač&iacute;tko Zobrazit Issue, zobraz&iacute; se str&aacute;nka, kde můžete vidět ve&scaron;ker&eacute; informaci o probl&eacute;mu, kter&yacute; nastal. Nemůžete tyto informace nijak upravit ale můžete k dan&eacute;mu probl&eacute;mu vložit koment&aacute;ř.</p>\n<p style=\"text-align: justify;\">Ten se vkl&aacute;d&aacute; dole na str&aacute;nce.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit vyskoč&iacute; okno, kde můžeme Upravit Issue.</p>\n<h3 style=\"text-align: justify;\"><strong>Upravit Issue</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na žlut&eacute; tlač&iacute;tko vpravo od tlač&iacute;tka Zobrazit Issue se zobraz&iacute; podobn&aacute; str&aacute;nka jako při kliknut&iacute; na tlač&iacute;tko Zobrazit Issue. Jedin&eacute; co tu chyb&iacute; je položka s koment&aacute;ře-mi.Hlavn&iacute; rozd&iacute;l je zde, ale v tom že zde se daj&iacute; upravit věci jako je Priorita,Typ,Status,Nadpis a Popis Issue. Tak&eacute; zde bude možn&eacute; vložit př&iacute;lohu. A změnit ře&scaron;itele.</p>\n<h3 style=\"text-align: justify;\"><strong>Odstraněn&iacute; Issue</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na červen&eacute; tlač&iacute;tko se zobraz&iacute; ok&eacute;nko, kde je uvedena ot&aacute;zka zda danou Issue chcete opravdu smazat. Pokud ji opravdu smazat kliknete je&scaron;tě jednou na červen&eacute; tlač&iacute;tko Zmazať jinak kliknete na tlač&iacute;tko Zatvoriť.</p>\n<h2><strong>&nbsp;<span style=\"text-decoration: underline;\">Project Settings</span></strong></h2>\n<h3><strong>Project Settings - Z&aacute;kladn&iacute; popis a akce</strong></h3>\n<p>Po kliknut&iacute; na z&aacute;ložku Settings se zobraz&iacute; str&aacute;nka s V&scaron;eobecn&yacute;m nastaven&iacute;m a v lev&eacute;m menu v&iacute;d&iacute;me z&aacute;ložky Projektov&eacute; nastaven&iacute;, Ostatn&iacute; nastaven&iacute; a Služby.</p>\n<h3><strong>V&scaron;eobecn&eacute; nastaven&iacute;</strong></h3>\n<p>Zde můžete vidět n&aacute;zev projektu a jeho popis, kter&yacute; je možno upravovat.</p>\n<h3><strong>Projektov&eacute; Role</strong></h3>\n<p>V tomto nastaven&iacute; je možn&eacute; vidět a nastavit jak&eacute; role patř&iacute; jak&eacute;mu uživatele v aktu&aacute;ln&iacute;m projektu. Je zde možnost přiřadit roli k Test Manager, Project Manager, Test Executor, Guest, Test Analyses, Developer a Reporter</p>\n<h3><strong>Ostatn&iacute;&nbsp; Nastaven&iacute;</strong></h3>\n<p>Zde můžete projekt buď archivovat kliknut&iacute;m&nbsp; na žlut&eacute; tlač&iacute;tko a nebo &uacute;plně smazat kliknut&iacute;m na tlač&iacute;tko červen&eacute;.</p>\n<h3><strong>Services</strong></h3>\n<p>Zde nastav&iacute;te Issue Tracker, kter&yacute; př&iacute;padně propoj&iacute; Juno např&iacute;klad s Jirou, zvol&iacute;te Issue Tracker vypln&iacute;te potřebn&eacute; kolonky a nastav&iacute;te mapov&aacute;n&iacute;.&nbsp;</p>\n<h2 style=\"text-align: center;\"><strong>Issues</strong></h2>\n<h3 style=\"text-align: justify;\"><strong>Issue- Z&aacute;kladn&iacute; popis a akce</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Issues se zobraz&iacute; str&aacute;nka, kde je možno vidět seznam již vytvořen&yacute;ch Issues. Je zde vidět jejich ID, n&aacute;zev Test Stepu, Sprintu a Casu pro kter&eacute; byla Issue vytvořena, n&aacute;zev Issue, popis dan&eacute; Issue, kdo m&aacute; Issue ře&scaron;it, typ Issue (jestli je to bug, defect nebo request), jej&iacute; prioritu, status a datum vytvořen&iacute; Issue.Vpravo vedle data vytvořen&iacute; jsou viděl jednotliv&eacute; akce. Je zde Zobrazit Issue, Editovat Issue a Smazat Issue. Nad těmito akcemi jsou vidět dal&scaron;&iacute; 4 tlač&iacute;tka. Když kliknete na mal&eacute; modr&eacute; tlač&iacute;tko , tak se v&aacute;m zobraz&iacute; filtr, kter&yacute; v&aacute;m usnadn&iacute; pr&aacute;ci při vyhled&aacute;v&aacute;n&iacute; konkr&eacute;tn&iacute; Issue. Pokud kliknete vedle na mal&eacute; b&iacute;le tlač&iacute;tko, zobraz&iacute; seznam věc&iacute;, kter&eacute; chcete v seznamu u Issue vidět. Tento seznam si můžete jakkoliv editovat např. v seznamu bude vidět jen n&aacute;zev Issues, jejich priorita a ře&scaron;itel.</p>\n<h3 style=\"text-align: justify;\"><strong>Založen&iacute; nov&eacute; Issue</strong></h3>\n<p style=\"text-align: justify;\">Je to možn&eacute; dvěma způsoby. 1. způsob už byl zm&iacute;něn u Test Execution. Takže zde bude pops&aacute;n ten druh&yacute;. Prvn&iacute;m krokem je kliknut&iacute; na tlač&iacute;tko Založit Issue, kde se pot&eacute; zobraz&iacute; str&aacute;nka s voln&yacute;mi kolonkami, kter&eacute; mus&iacute; b&yacute;t vyplněny.Mus&iacute;te zde zadat vybrat Test Plan, Sprint, Set, Case a Step u kter&eacute;ho chyba nastala, zvolit Prioritu, kter&aacute; může nab&yacute;vat hodnot: Low, Medium a High, Typ dan&eacute; chyby, kter&yacute; může b&yacute;t buď Bug, Defect a nebo Request. Pot&eacute; stručně napsat n&aacute;zev chyby a pod to podrobněj&scaron;&iacute; popis probl&eacute;mu. Tak&eacute; zde můžete přidat přilohu jako např. obr&aacute;zek co přesně se stalo, když nastala chyba. A vyplnit Seznam aplikac&iacute;, Prostřed&iacute;, Modul pokud je třeba. V posledn&iacute; řadě mus&iacute;te zvolit kdo by dan&yacute; probl&eacute;m měl vyře&scaron;it .&nbsp;</p>\n<h3 style=\"text-align: justify;\"><strong>Export Issues</strong></h3>\n<p style=\"text-align: justify;\">Kliknut&iacute;m na tlač&iacute;tko Export se do va&scaron;eho poč&iacute;tače st&aacute;hne soubor s př&iacute;ponou .csv. Tu když otevřete tak zde bude tabulka Issues kter&eacute; jsou i na port&aacute;le se v&scaron;emi informacemi o Issues.</p>\n<h3 style=\"text-align: justify;\"><strong>Zobrazit Issue</strong></h3>\n<p style=\"text-align: justify;\">Když kliknete na tlač&iacute;tko Zobrazit Issue,nebo na n&aacute;zev Issue zobraz&iacute; se str&aacute;nka, kde můžete vidět ve&scaron;ker&eacute; informaci o probl&eacute;mu, kter&yacute; nastal. Nemůžete tyto informace nijak upravit ale můžete k dan&eacute;mu probl&eacute;mu vložit koment&aacute;ř.</p>\n<p style=\"text-align: justify;\">Ten se vkl&aacute;d&aacute; dole na str&aacute;nce.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit vyskoč&iacute; okno, kde můžeme Upravit Issue.</p>\n<h3 style=\"text-align: justify;\"><strong>Upravit Issue</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na žlut&eacute; tlač&iacute;tko vpravo od tlač&iacute;tka Zobrazit Issue se zobraz&iacute; podobn&aacute; str&aacute;nka jako při kliknut&iacute; na tlač&iacute;tko Zobrazit Issue. Jedin&eacute; co tu chyb&iacute; je položka s koment&aacute;ře-mi.Hlavn&iacute; rozd&iacute;l je zde, ale v tom že zde se daj&iacute; upravit věci jako je Priorita,Typ,Status,Nadpis a Popis Issue. Tak&eacute; zde bude možn&eacute; vložit př&iacute;lohu. A&nbsp;změnit&nbsp;ře&scaron;itele.</p>\n<h3 style=\"text-align: justify;\"><strong>Odstraněn&iacute; Issue</strong></h3>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na červen&eacute; tlač&iacute;tko se zobraz&iacute; ok&eacute;nko, kde je uvedena ot&aacute;zka zda danou Issue chcete opravdu smazat. Pokud ji opravdu smazat kliknete je&scaron;tě jednou na červen&eacute; tlač&iacute;tko Zmazať jinak kliknete na tlač&iacute;tko Zatvoriť.</p>\n<h2 style=\"text-align: center;\"><strong>Uživatel&eacute;</strong></h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Uživatel&eacute; se otevře str&aacute;nka, kde jsou vidět v&scaron;ichni uživatel&eacute;. Je zde vidět jejich ID, Jm&eacute;no, Př&iacute;jmen&iacute;, E-mail a Datum vytvořen&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na přidat uživatele se otevře z&aacute;ložka, kde vypln&iacute;me &uacute;daje jako jm&eacute;no, př&iacute;jmen&iacute;, heslo, email, telefon.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit se otevře z&aacute;ložka, kde můžeme změnit nějak&eacute; informace uživatele.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Archivovat/Odarchivovat můžeme archivovat př&iacute;padně odarchivovat uživatele.</p>\n<h2 style=\"text-align: center;\"><strong>Log&nbsp;</strong></h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Log se v&aacute;m otevře str&aacute;nka, kde je možnost vidět přehled v&scaron;ech logů. Je zde vidět jejich id, popis jednotliv&yacute;ch logů, n&aacute;zev akce, kter&aacute; se provedla, uživatele, kteř&iacute; tu akci provedli, IP adresu poč&iacute;tače, kde byla akce provedena a Datum vložen&iacute;.</p>\n<h2 style=\"text-align: center;\"><strong>Nastaven&iacute;</strong>&nbsp;</h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Nastaven&iacute; se v&aacute;m objev&iacute; dvě možnosti na v&yacute;běr. Po kliknut&iacute; na V&scaron;eobecn&eacute; se otevře str&aacute;nka, kde si můžete přeč&iacute;st Jm&eacute;no, E-mail, Telefonn&iacute; Č&iacute;slo, Adresu a Fakturačn&iacute; &uacute;daje, kter&eacute; můžete změnit a žlut&yacute;m tlač&iacute;tkem Uložit.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Specifick&eacute; se otevře str&aacute;nka, kde jsou vidět dal&scaron;&iacute; z&aacute;ložky : Role, Mailer, LDAP, Seznam aplikac&iacute;, Modul, Prostřed&iacute;</p>\n<h3 style=\"text-align: justify;\"><strong>Role</strong></h3>\n<p style=\"text-align: justify;\">Zde si můžeme prohl&eacute;dnout n&aacute;zvy jednotliv&yacute;ch rol&iacute;, kter&eacute; jsou rozděleny na Projektov&eacute; role a Webov&eacute; role.&nbsp;Jednotliv&eacute; role se daj&iacute; přidat, upravit nebo odstranit.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Přidat roli vyskoč&iacute; okno, kde zad&aacute;te N&aacute;zev role a rozhodnete se, zda role bude patřit do Projektov&yacute;ch nebo Webov&yacute;ch roli.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit&nbsp;se zobraz&iacute; str&aacute;nka, kde můžeme změnit n&aacute;zev role&nbsp;a přidat nebo odebrat opr&aacute;vněn&iacute;, pot&eacute; kliknut&iacute;m na žlut&eacute; tlač&iacute;tko Upravit ulož&iacute;te změny.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na červen&eacute; tlač&iacute;tko Smazat vyskoč&iacute; okno, kde potvrd&iacute;te smaz&aacute;n&iacute;.</p>\n<h3 style=\"text-align: justify;\"><strong>Mailer</strong></h3>\n<p style=\"text-align: justify;\">&nbsp;Zde můžete nastavit aplikaci na zas&iacute;lan&iacute; emailů nastaven&iacute;m udajů SMTP.&nbsp;</p>\n<h3 style=\"text-align: justify;\"><strong>LDAP</strong></h3>\n<p style=\"text-align: justify;\">&nbsp;Zde můžete nastavit LDAP server.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<h3 style=\"text-align: justify;\"><strong>Seznam aplikac&iacute;</strong></h3>\n<p style=\"text-align: justify;\">Zde vid&iacute;te tabulku jednotliv&yacute;ch aplikac&iacute;, kter&eacute; jsou propojeny Moduly a Prostřed&iacute;mi.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Přidat vyskoč&iacute; okno, kde zad&aacute;me potřebn&eacute; informace.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Klonovat vyskoč&iacute; předvyplněn&eacute; okno, kde jen změn&iacute;me potřebn&eacute; informace.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit n&aacute;m vyskoč&iacute; okno, kde můžeme změnit informace o aplikaci.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute;.</p>\n<h3 style=\"text-align: justify;\"><strong>Modul</strong></h3>\n<p style=\"text-align: justify;\">Zde vid&iacute;te tabulku jednotliv&yacute;ch modulů.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Přidat vyskoč&iacute; okno, kde zad&aacute;me potřebn&eacute; informace.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit n&aacute;m vyskoč&iacute; okno, kde můžeme změnit informace o aplikaci.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute;.</p>\n<h3 style=\"text-align: justify;\"><strong>Prostřed&iacute;</strong></h3>\n<p style=\"text-align: justify;\">Zde vid&iacute;te tabulku jednotliv&yacute;ch prostřed&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Přidat vyskoč&iacute; okno, kde zad&aacute;me potřebn&eacute; informace.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Upravit n&aacute;m vyskoč&iacute; okno, kde můžeme změnit informace o prostřed&iacute;.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute;.</p>\n<h2 style=\"text-align: center;\"><strong>Syst&eacute;m&nbsp;</strong></h2>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na z&aacute;ložku Syst&eacute;m se v&aacute;m objev&iacute; dvě možnost&iacute; na v&yacute;běr.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na N&aacute;pověda si můžeme přeč&iacute;st n&aacute;povědu k&nbsp;použ&iacute;v&aacute;n&iacute; str&aacute;nky JUNO, kterou si můžeme i st&aacute;hnout.</p>\n<p style=\"text-align: justify;\">Po kliknut&iacute; na Informace si můžeme přeč&iacute;st Informace o DENEVY Slovakia s.r.o. a o Informačn&iacute;m syst&eacute;mu&nbsp;Juno</p>\n<h2 style=\"text-align: center;\"><strong>&Uacute;loži&scaron;tě</strong></h2>\n<p><strong>Popis:</strong></p>\n<p>&Uacute;loži&scaron;tě slouž&iacute; pro &uacute;schovu jednotliv&yacute;ch Test Setů/Casů a jejich n&aacute;sledn&eacute; použit&iacute;.&nbsp;V &Uacute;loži&scaron;ti budou uloženy a v pokud budou potřeba importuj&iacute; se do projektů. &Uacute;loži&scaron;tě zjednodu&scaron;uje pr&aacute;ci s Testovac&iacute;mi sc&eacute;n&aacute;ři, nemus&iacute; se ps&aacute;t znova jen se použ&iacute;j&iacute; z &uacute;loži&scaron;tě.</p>\n<p><strong>Akce:</strong></p>\n<p>Po kliknut&iacute; na Složka vyskoč&iacute; okno, kde zad&aacute;me n&aacute;zev a aplikaci po kliknut&iacute; na Vytvořit, vznikne nov&aacute; složka pro &uacute;schovu.</p>\n<p>D&aacute;le jsou zde funkce jako v test anal&yacute;ze na vytvořen&iacute; Testovac&iacute;ch sad/sc&eacute;n&aacute;řů, import..(popis je v Test Anal&yacute;ze v&yacute;&scaron;&scaron;e v n&aacute;povědě)</p>\n<p>Po kliknut&iacute; na Upravit vyskoč&iacute; okno na &Uacute;pravu složky.</p>\n<p>Po kliknut&iacute; na Smazat vyskoč&iacute; okno, kde potvrd&iacute;me smaz&aacute;n&iacute;.</p>\n<h2 style=\"text-align: center;\"><strong>Popis a pr&aacute;va jednotliv&yacute;ch rol&iacute;</strong></h2>\n<p style=\"text-align: justify;\"><img src=\"https://git.denevy.eu/ArtexeSRO/Juno/uploads/f0a576be3c29d73172c66d0aab51ca99/workflow.png\" alt=\"WorkFlow\" width=\"1072\" height=\"1419\" /></p>','2016-05-03 11:55:47'),(12,'mailer_host','admin.emaily.online','2016-08-08 13:59:18'),(13,'mailer_port','587','2016-08-08 13:59:26'),(14,'mailer_username','support@denevy.de','2016-08-08 13:59:41'),(15,'mailer_password','njrdGgH6BhPx7A4q','2016-08-08 13:59:52'),(16,'mailer_secure','tls','2016-08-08 14:00:02'),(17,'mailer_timeout','20','2016-08-08 14:00:09'),(18,'licence_key','eyJhbGciOiJSUzUxMiJ9.eyJ2YWxpZFRvIjoiMjAxOC0xMi0zMSIsImp0aSI6IjY5MDJlZDBhLTZiYTUtNDhlNS1iMDdlLTMzN2YwYjA2ZjJlNCIsImlhdCI6MTUyODgwNjY2MywiZXhwIjoxNTQ2Mjk3MjAwfQ.V6IRHwN-VHjqrVbHcDyq9JbnRqvwIa7PtxwUJie6H5NZqdjnHM5Lb_sG5aUTiMlNcLNXyYxFTQvku1lq50TmXQgWCzfKlC5-IUQnzcaRGmvYWo6Jxa-TnAWOuSMbj42NHGlnIWNzqG0If0Du6BKLXyNDIo5DvGVP-UeQgrdI2cbkxf7lyVTJh-nnj7Tufw2fMuThpw2oykxUynDAy5WjykTgDzRtPfg8I2pzP65EJb9ZhtACy71zIDh2ogKbOgidmgANEPv2djajzIIIcEb4WAocYmfPiWAE6r3COqZBJQ08_pGYYl-lUqP4C6ei39y35K3oiimKdR-eUuLBoqA3Jg','2018-05-17 07:43:09'),(19,'hostname','ldap://vpn.denevy.eu:9389','2018-06-25 08:06:42'),(20,'ldapAdminGroups','[]','2018-06-25 08:07:01'),(21,'ldapUserGroups','[]','2018-06-25 08:07:16'),(22,'ldapBaseDn','','2018-06-25 08:07:28'),(23,'ldap','0','2018-06-25 08:09:36'),(24,'admin_name','tuser@denevy.eu','2018-06-25 08:09:52'),(25,'admin_password','Heslo123+','2018-06-25 08:10:08');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_case`
--

DROP TABLE IF EXISTS `tag_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_case`
--

LOCK TABLES `tag_case` WRITE;
/*!40000 ALTER TABLE `tag_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_set`
--

DROP TABLE IF EXISTS `tag_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_set`
--

LOCK TABLES `tag_set` WRITE;
/*!40000 ALTER TABLE `tag_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_test_case`
--

DROP TABLE IF EXISTS `tag_test_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_test_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_case_id` int(11) DEFAULT NULL,
  `tag_case_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_case_id` (`test_case_id`),
  KEY `tag_case_id` (`tag_case_id`),
  CONSTRAINT `tag_test_case_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tag_test_case_ibfk_2` FOREIGN KEY (`tag_case_id`) REFERENCES `tag_case` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_test_case`
--

LOCK TABLES `tag_test_case` WRITE;
/*!40000 ALTER TABLE `tag_test_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_test_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_test_set`
--

DROP TABLE IF EXISTS `tag_test_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_test_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_set_id` int(11) DEFAULT NULL,
  `tag_set_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_set_id` (`test_set_id`),
  KEY `tag_set_id` (`tag_set_id`),
  CONSTRAINT `tag_test_set_ibfk_1` FOREIGN KEY (`test_set_id`) REFERENCES `test_set` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tag_test_set_ibfk_2` FOREIGN KEY (`tag_set_id`) REFERENCES `tag_set` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_test_set`
--

LOCK TABLES `tag_test_set` WRITE;
/*!40000 ALTER TABLE `tag_test_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_test_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_case`
--

DROP TABLE IF EXISTS `test_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `result` text COLLATE utf8_slovak_ci,
  `priority` int(11) DEFAULT '1',
  `approved` int(11) DEFAULT '0',
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `test_set_id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `environment_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_set_id` (`test_set_id`),
  KEY `creator_id` (`creator_id`),
  KEY `application_id` (`application_id`),
  KEY `environment_id` (`environment_id`),
  KEY `test_case_ibfk_5` (`module_id`),
  CONSTRAINT `test_case_ibfk_1` FOREIGN KEY (`test_set_id`) REFERENCES `test_set` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_case_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_case_ibfk_3` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE SET NULL,
  CONSTRAINT `test_case_ibfk_4` FOREIGN KEY (`environment_id`) REFERENCES `environment` (`id`) ON DELETE SET NULL,
  CONSTRAINT `test_case_ibfk_5` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_case`
--

LOCK TABLES `test_case` WRITE;
/*!40000 ALTER TABLE `test_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_case_multimedia`
--

DROP TABLE IF EXISTS `test_case_multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_case_multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_case_id` int(11) NOT NULL,
  `multimedia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_case_id` (`test_case_id`),
  KEY `multimedia_id` (`multimedia_id`),
  CONSTRAINT `test_case_multimedia_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_case_multimedia_ibfk_2` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_case_multimedia`
--

LOCK TABLES `test_case_multimedia` WRITE;
/*!40000 ALTER TABLE `test_case_multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_case_multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_case_run`
--

DROP TABLE IF EXISTS `test_case_run`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_case_run` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endtime` timestamp NULL DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `test_plan_sprint_case_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`),
  CONSTRAINT `test_case_run_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_case_run_ibfk_2` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_case_run`
--

LOCK TABLES `test_case_run` WRITE;
/*!40000 ALTER TABLE `test_case_run` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_case_run` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan`
--

DROP TABLE IF EXISTS `test_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `creator_id` (`creator_id`),
  KEY `test_plan_ibfk_3` (`campaign_id`),
  CONSTRAINT `test_plan_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_ibfk_3` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan`
--

LOCK TABLES `test_plan` WRITE;
/*!40000 ALTER TABLE `test_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_case`
--

DROP TABLE IF EXISTS `test_plan_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_plan_id` int(11) NOT NULL,
  `test_case_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_plan_id` (`test_plan_id`),
  KEY `test_case_id` (`test_case_id`),
  CONSTRAINT `test_plan_case_ibfk_1` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_case_ibfk_2` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_case`
--

LOCK TABLES `test_plan_case` WRITE;
/*!40000 ALTER TABLE `test_plan_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_comment`
--

DROP TABLE IF EXISTS `test_plan_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_slovak_ci,
  `author_id` int(11) DEFAULT NULL,
  `test_plan_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `test_plan_id` (`test_plan_id`),
  CONSTRAINT `test_plan_comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  CONSTRAINT `test_plan_comment_ibfk_3` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_comment`
--

LOCK TABLES `test_plan_comment` WRITE;
/*!40000 ALTER TABLE `test_plan_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_sprint`
--

DROP TABLE IF EXISTS `test_plan_sprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_sprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `test_plan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_plan_id` (`test_plan_id`),
  KEY `creator_id` (`creator_id`),
  CONSTRAINT `test_plan_sprint_ibfk_1` FOREIGN KEY (`test_plan_id`) REFERENCES `test_plan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_sprint_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_sprint`
--

LOCK TABLES `test_plan_sprint` WRITE;
/*!40000 ALTER TABLE `test_plan_sprint` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_sprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_sprint_case`
--

DROP TABLE IF EXISTS `test_plan_sprint_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_sprint_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_plan_sprint_id` int(11) NOT NULL,
  `test_plan_case_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT '1',
  `forced_status_id` int(11) DEFAULT NULL,
  `is_work_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_plan_case_id` (`test_plan_case_id`),
  KEY `test_plan_sprint_id` (`test_plan_sprint_id`),
  CONSTRAINT `test_plan_sprint_case_ibfk_1` FOREIGN KEY (`test_plan_case_id`) REFERENCES `test_plan_case` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_sprint_case_ibfk_2` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_sprint_case`
--

LOCK TABLES `test_plan_sprint_case` WRITE;
/*!40000 ALTER TABLE `test_plan_sprint_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_sprint_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_sprint_case_user`
--

DROP TABLE IF EXISTS `test_plan_sprint_case_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_sprint_case_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `test_plan_sprint_case_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`),
  CONSTRAINT `test_plan_sprint_case_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_plan_sprint_case_user_ibfk_2` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_sprint_case_user`
--

LOCK TABLES `test_plan_sprint_case_user` WRITE;
/*!40000 ALTER TABLE `test_plan_sprint_case_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_sprint_case_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_plan_sprint_comment`
--

DROP TABLE IF EXISTS `test_plan_sprint_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_plan_sprint_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_slovak_ci,
  `author_id` int(11) DEFAULT NULL,
  `test_plan_sprint_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `test_plan_sprint_id` (`test_plan_sprint_id`),
  CONSTRAINT `test_plan_sprint_comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  CONSTRAINT `test_plan_sprint_comment_ibfk_3` FOREIGN KEY (`test_plan_sprint_id`) REFERENCES `test_plan_sprint` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_plan_sprint_comment`
--

LOCK TABLES `test_plan_sprint_comment` WRITE;
/*!40000 ALTER TABLE `test_plan_sprint_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_plan_sprint_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_set`
--

DROP TABLE IF EXISTS `test_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_slovak_ci DEFAULT NULL,
  `description` text COLLATE utf8_slovak_ci,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `project_id` (`project_id`),
  KEY `test_set_ibfk_3` (`folder_id`),
  CONSTRAINT `test_set_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_set_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_set_ibfk_3` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_set`
--

LOCK TABLES `test_set` WRITE;
/*!40000 ALTER TABLE `test_set` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_step`
--

DROP TABLE IF EXISTS `test_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precondition` text COLLATE utf8_slovak_ci,
  `expected_result` text COLLATE utf8_slovak_ci,
  `creator_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `test_case_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_case_id` (`test_case_id`),
  KEY `creator_id` (`creator_id`),
  CONSTRAINT `test_step_ibfk_1` FOREIGN KEY (`test_case_id`) REFERENCES `test_case` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_step_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_step`
--

LOCK TABLES `test_step` WRITE;
/*!40000 ALTER TABLE `test_step` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_step_execution`
--

DROP TABLE IF EXISTS `test_step_execution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_step_execution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_plan_sprint_case_id` int(11) NOT NULL,
  `test_step_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actual_result` text COLLATE utf8_slovak_ci,
  `multimedia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `test_step_id` (`test_step_id`),
  KEY `test_plan_sprint_case_id` (`test_plan_sprint_case_id`),
  CONSTRAINT `test_step_execution_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_step_execution_ibfk_2` FOREIGN KEY (`test_step_id`) REFERENCES `test_step` (`id`) ON DELETE CASCADE,
  CONSTRAINT `test_step_execution_ibfk_4` FOREIGN KEY (`test_plan_sprint_case_id`) REFERENCES `test_plan_sprint_case` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_step_execution`
--

LOCK TABLES `test_step_execution` WRITE;
/*!40000 ALTER TABLE `test_step_execution` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_step_execution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `phone_number` varchar(30) COLLATE utf8_slovak_ci DEFAULT NULL,
  `e_mail` varchar(60) COLLATE utf8_slovak_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_slovak_ci DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8_slovak_ci DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `super_admin` int(1) DEFAULT '0',
  `archive` int(2) DEFAULT '0',
  `jira_name` varchar(255) COLLATE utf8_slovak_ci DEFAULT NULL,
  `language` varchar(3) COLLATE utf8_slovak_ci DEFAULT 'sk',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (14,'Test','tes','','test@juno.sk','$2y$10$IrieSij4HXNXZ.keeHKkB.mNw4Pc3h.kbUC.3iDIYgk4u7DpJpcDu','',NULL,'2018-01-03 13:12:48',1,0,'','sk');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_web_role`
--

DROP TABLE IF EXISTS `user_web_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_web_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_web_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_web_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=629 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_web_role`
--

LOCK TABLES `user_web_role` WRITE;
/*!40000 ALTER TABLE `user_web_role` DISABLE KEYS */;
INSERT INTO `user_web_role` VALUES (400,14,8);
/*!40000 ALTER TABLE `user_web_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 15:13:41
