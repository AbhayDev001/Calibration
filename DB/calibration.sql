-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 04:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calibration`
--

-- --------------------------------------------------------

--
-- Table structure for table `calibration`
--

CREATE TABLE `calibration` (
  `RecId` bigint(20) NOT NULL,
  `CalibrationId` bigint(20) NOT NULL,
  `WeightBoxId` varchar(100) NOT NULL,
  `CalibrationName` varchar(100) NOT NULL,
  `InstrumentId` bigint(20) NOT NULL,
  `InstrumentName` varchar(100) NOT NULL,
  `DeviceId` bigint(20) NOT NULL,
  `DeviceName` varchar(100) NOT NULL,
  `DeviceType` varchar(100) NOT NULL,
  `Make` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `SpiritLevel` int(11) NOT NULL,
  `Internal` int(11) NOT NULL,
  `CalibrationDate` datetime DEFAULT NULL,
  `CalibrationNextDate` datetime DEFAULT NULL,
  `CalibrationNextDate1` datetime DEFAULT NULL,
  `PerformedBy` varchar(70) NOT NULL,
  `PerformDate` datetime NOT NULL,
  `VerifiedBy` varchar(70) NOT NULL,
  `VerifiedDate` datetime DEFAULT NULL,
  `AproovelBy` varchar(70) NOT NULL,
  `AproovelDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `FormId` varchar(50) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `RePerform` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calibration`
--

INSERT INTO `calibration` (`RecId`, `CalibrationId`, `WeightBoxId`, `CalibrationName`, `InstrumentId`, `InstrumentName`, `DeviceId`, `DeviceName`, `DeviceType`, `Make`, `Model`, `SpiritLevel`, `Internal`, `CalibrationDate`, `CalibrationNextDate`, `CalibrationNextDate1`, `PerformedBy`, `PerformDate`, `VerifiedBy`, `VerifiedDate`, `AproovelBy`, `AproovelDate`, `Status`, `FormId`, `CreatedDate`, `RePerform`) VALUES
(1, 2, '', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-02-26 00:00:00', NULL, '2020-03-27 00:00:00', 'analysis', '2020-02-26 11:57:30', 'Verify1', '2020-02-26 12:01:17', 'approver', '2020-02-29 06:02:05', 30, '1582718230', '2020-02-26 11:57:30', 0),
(2, 1, '', '', 2, '', 4, '', '', 'Dell', 'Model100', 2, 2, '2020-02-26 00:00:00', NULL, '2020-02-27 00:00:00', 'analysis', '2020-02-26 12:16:08', 'Verify1', '2020-02-26 13:00:54', 'approver', '2020-02-28 12:57:32', 30, '1582719343', '2020-02-26 12:16:08', 0),
(3, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 2, '2020-02-27 00:00:00', NULL, '2020-02-28 00:00:00', 'analysis', '2020-02-27 05:37:33', 'Verify1', '2020-02-27 05:42:32', 'approver', '2020-02-29 12:39:20', 40, '1582781832', '2020-02-27 05:37:33', 0),
(4, 2, '', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-02-27 00:00:00', NULL, '2020-03-28 00:00:00', 'analysis', '2020-02-27 05:39:57', 'verify', '2020-02-29 11:26:23', 'euler', '2020-03-02 13:04:11', 30, '1582781980', '2020-02-27 05:39:57', 0),
(5, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-02-27 00:00:00', NULL, '2020-02-28 00:00:00', 'analysis', '2020-02-27 07:54:33', 'verify', '2020-02-29 12:20:03', '', NULL, 25, '1582787373', '2020-02-27 07:54:33', 0),
(6, 1, '', '', 2, '', 4, '', '', 'Dell', 'Model100', 2, 2, '2020-02-27 00:00:00', NULL, '2020-02-28 00:00:00', 'analysis', '2020-02-27 08:40:16', 'verify', '2020-03-02 05:32:28', '', NULL, 20, '1582790083', '2020-02-27 08:40:16', 0),
(7, 2, '', '', 1, '', 2, '', '', 'HP', 'Model2', 2, 1, '2020-02-27 00:00:00', NULL, '2020-03-28 00:00:00', 'analysis', '2020-02-27 11:37:38', '', NULL, '', NULL, 10, '1582803448', '2020-02-27 11:37:39', 0),
(8, 2, '', '', 1, '', 2, '', '', 'HP', 'Model2', 2, 1, '2020-02-27 00:00:00', NULL, '2020-03-28 00:00:00', 'analysis', '2020-02-27 11:40:22', '', NULL, '', NULL, 10, '1582803448', '2020-02-27 11:40:22', 0),
(9, 2, '', '', 1, '', 2, '', '', 'HP', 'Model2', 2, 1, '2020-02-27 00:00:00', NULL, '2020-03-28 00:00:00', 'analysis', '2020-02-27 11:47:26', 'Verify1', '2020-03-19 17:43:22', '', NULL, 20, '1582803448', '2020-02-27 11:47:26', 0),
(10, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-02-28 00:00:00', NULL, '2020-02-29 00:00:00', 'analysis', '2020-02-28 06:16:56', 'verify', '2020-02-29 12:22:44', '', NULL, 20, '1582870515', '2020-02-28 06:16:56', 0),
(11, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-02-28 00:00:00', NULL, '2020-02-29 00:00:00', 'analysis', '2020-02-28 06:18:22', '', NULL, '', NULL, 10, '1582870515', '2020-02-28 06:18:22', 0),
(12, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-02-28 00:00:00', NULL, '2020-02-29 00:00:00', 'analysis', '2020-02-28 06:19:59', '', NULL, '', NULL, 10, '1582870515', '2020-02-28 06:19:59', 0),
(13, 2, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 2, '2020-02-28 00:00:00', NULL, '2020-03-29 00:00:00', 'analysis', '2020-02-28 06:21:01', '', NULL, '', NULL, 10, '1582870810', '2020-02-28 06:21:01', 0),
(14, 2, '', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 1, '2020-02-28 00:00:00', NULL, '2020-03-29 00:00:00', 'analysis', '2020-02-28 06:50:24', '', NULL, '', NULL, 10, '1582872453', '2020-02-28 06:50:24', 0),
(15, 2, '', '', 2, '', 4, '', '', 'Dell', 'Model100', 2, 1, '2020-03-02 00:00:00', NULL, '2020-04-01 00:00:00', 'analysis', '2020-03-02 08:18:14', '', NULL, '', NULL, 10, '1583134389', '2020-03-02 08:18:14', 0),
(16, 1, '', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-03-02 00:00:00', NULL, '2020-03-03 00:00:00', 'newton', '2020-03-02 13:06:19', '', NULL, '', NULL, 10, '1583154364', '2020-03-02 13:06:19', 0),
(17, 1, '', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 1, '2020-03-02 00:00:00', NULL, '2020-03-03 00:00:00', 'newton', '2020-03-02 13:17:04', '', NULL, '', NULL, 10, '1583154988', '2020-03-02 13:17:04', 0),
(18, 2, 'test', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 1, '2020-03-18 00:00:00', NULL, '2020-04-17 00:00:00', 'newton', '2020-03-18 09:56:02', 'Verify1', '2020-03-19 17:36:42', '', NULL, 25, '1584525150', '2020-03-18 09:56:02', 0),
(19, 2, 'test', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 2, '2020-03-18 00:00:00', NULL, '2020-04-17 00:00:00', 'analysis', '2020-03-18 18:12:34', '', NULL, '', NULL, 10, '1584535331', '2020-03-18 12:42:34', 0),
(20, 1, 'test1', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-03-18 00:00:00', NULL, '2020-03-19 00:00:00', 'analysis', '2020-03-19 12:25:14', '', NULL, '', NULL, 10, '1584600891', '2020-03-19 06:55:14', 0),
(21, 1, 'test2', '', 1, '', 2, '', '', 'HP', 'Model1', 1, 1, '2020-03-19 00:00:00', NULL, '2020-03-20 00:00:00', 'analysis', '2020-03-19 12:31:12', '', NULL, '', NULL, 10, '1584601254', '2020-03-19 07:01:12', 0),
(22, 1, 'test2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-03-19 00:00:00', NULL, '2020-03-20 00:00:00', 'analysis', '2020-03-19 17:58:42', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:22', '2020-03-19 12:28:42', 0),
(26, 1, 'test2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-03-20 00:00:00', NULL, '2020-03-21 00:00:00', 'analysis', '2020-03-20 15:46:00', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:23', '2020-03-20 10:16:00', 0),
(28, 1, 'test2', '', 1, '', 2, '', '', 'HP', 'Model1', 1, 1, '2020-03-20 00:00:00', NULL, '2020-03-21 00:00:00', 'analysis', '2020-03-19 12:31:12', '', NULL, '', NULL, 10, '1584601254', '2020-03-19 07:01:12', 0),
(29, 1, 'test2', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 1, '2020-03-21 00:00:00', NULL, '2020-03-22 00:00:00', 'analysis', '2020-03-21 11:23:56', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:25', '2020-03-21 05:53:56', 0),
(30, 1, 'test2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-04-01 00:00:00', '2020-04-02 00:00:00', NULL, 'analysis', '2020-04-01 15:24:32', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:26', '2020-04-01 09:54:32', 0),
(31, 2, 'test2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-01 00:00:00', '2020-05-01 00:00:00', '2020-04-02 00:00:00', 'analysis', '2020-04-01 18:41:29', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:27', '2020-04-01 13:11:29', 0),
(32, 1, 'test2', '', 1, '', 3, '', '', 'Dell', 'Model3', 0, 0, '2020-04-01 00:00:00', '2020-04-02 00:00:00', '2020-04-02 00:00:00', 'analysis', '2020-04-01 18:45:23', '', NULL, '', NULL, 10, 'BAL/AD/3/RP:28', '2020-04-01 13:15:23', 0),
(33, 2, 'test2', '', 1, '', 2, '', '', 'HP', 'Model2', 0, 0, '2020-04-01 00:00:00', '2020-05-01 00:00:00', '2020-04-08 00:00:00', 'analysis', '2020-04-01 18:50:04', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:29', '2020-04-01 13:20:04', 0),
(35, 2, 'test2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-03 00:00:00', '2020-05-03 00:00:00', '2020-04-15 00:00:00', 'analysis', '2020-04-03 10:44:50', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:30', '2020-04-03 05:14:50', 0),
(36, 2, 'test2', '', 1, '', 2, '', '', 'HP', 'Model2', 0, 0, '2020-04-03 00:00:00', '2020-05-03 00:00:00', '2020-04-07 00:00:00', 'analysis', '2020-04-03 10:55:57', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:31', '2020-04-03 05:25:57', 0),
(37, 2, 'test2', '', 1, '', 3, '', '', 'Dell', 'Model3', 0, 0, '2020-04-03 00:00:00', '2020-05-03 00:00:00', '2020-04-08 00:00:00', 'analysis', '2020-04-03 11:38:23', '', NULL, '', NULL, 10, 'BAL/AD/3/RP:32', '2020-04-03 06:08:23', 0),
(38, 2, 'test2', '', 2, '', 4, '', '', 'Dell', 'Model100', 0, 0, '2020-04-03 00:00:00', '2020-05-03 00:00:00', '2020-04-22 00:00:00', 'analysis', '2020-04-03 11:40:36', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:33', '2020-04-03 06:10:36', 0),
(39, 1, 'BOXID:2025', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-04 00:00:00', '2020-04-05 00:00:00', '2020-04-15 00:00:00', 'analysis', '2020-04-04 14:01:50', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:34', '2020-04-04 08:31:50', 0),
(40, 1, 'BOXID:2025', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-20 00:00:00', '2020-04-21 00:00:00', '2020-04-21 00:00:00', 'analysis', '2020-04-20 10:55:23', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:35', '2020-04-20 05:25:23', 0),
(41, 1, 'BOXID2025', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-24 00:00:00', '2020-04-25 00:00:00', '2020-04-01 00:00:00', 'analysis', '2020-04-24 11:35:07', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:36', '2020-04-24 06:05:07', 0),
(42, 2, 'BOXID2026', '', 4, '', 5, '', '', 'Test Make', 'Test Model', 0, 0, '2020-04-25 00:00:00', '2020-05-25 00:00:00', '2020-04-08 00:00:00', 'analysis', '2020-04-25 12:14:39', '', NULL, '', NULL, 10, 'BAL/AD/5/RP:37', '2020-04-25 06:44:39', 0),
(43, 1, 'BOXID2027', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-27 00:00:00', '2020-04-28 00:00:00', '2020-04-15 00:00:00', 'analysis', '2020-04-27 10:53:41', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:38', '2020-04-27 05:23:41', 0),
(44, 2, 'BOXID2035', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-27 00:00:00', '2020-05-27 00:00:00', '2020-04-08 00:00:00', 'analysis', '2020-04-27 12:42:48', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:39', '2020-04-27 07:12:48', 0),
(45, 1, 'BOXID2035', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 2, '2020-04-27 00:00:00', '2020-04-28 00:00:00', NULL, 'analysis', '2020-04-27 16:51:54', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:40', '2020-04-27 11:21:54', 0),
(46, 3, 'BOXID2038', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-04-27 00:00:00', '2020-04-28 00:00:00', NULL, 'analysis', '2020-04-27 18:08:05', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:41', '2020-04-27 12:38:05', 0),
(47, 3, 'BOXID2025', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 2, '2020-04-27 00:00:00', '2020-04-28 00:00:00', NULL, 'analysis', '2020-04-27 18:10:00', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:42', '2020-04-27 12:40:00', 0),
(48, 2, 'BOXID2035', '', 4, '', 5, '', '', 'Test Make', 'Test Model', 0, 0, '2020-04-27 00:00:00', '2020-05-27 00:00:00', '2020-04-28 00:00:00', 'analysis', '2020-04-27 18:15:15', '', NULL, '', NULL, 10, 'BAL/AD/5/RP:43', '2020-04-27 12:45:15', 0),
(49, 2, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-28 00:00:00', '2020-05-28 00:00:00', '2020-04-29 00:00:00', 'analysis', '2020-04-28 15:58:29', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:44', '2020-04-28 10:28:29', 0),
(50, 1, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-04-29 00:00:00', '2020-04-30 00:00:00', NULL, 'analysis', '2020-04-29 12:12:45', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:45', '2020-04-29 06:42:45', 0),
(51, 2, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-29 00:00:00', '2020-05-29 00:00:00', '2020-04-15 00:00:00', 'analysis', '2020-04-29 12:14:09', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:46', '2020-04-29 06:44:09', 0),
(52, 2, 'BOXID-2', '', 3, '', 7, '', '', 'test', 'test', 0, 0, '2020-04-30 00:00:00', '2020-05-30 00:00:00', '2020-05-01 00:00:00', 'analysis', '2020-04-30 11:16:36', '', NULL, '', NULL, 10, 'BAL/AD/7/RP:47', '2020-04-30 05:46:36', 0),
(53, 2, 'BOXID-4', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-04-30 00:00:00', '2020-05-30 00:00:00', '2020-04-30 00:00:00', 'analysis', '2020-04-30 12:43:48', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:48', '2020-04-30 07:13:48', 0),
(54, 1, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-04-30 00:00:00', '2020-05-01 00:00:00', NULL, 'analysis', '2020-04-30 14:58:07', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:49', '2020-04-30 09:28:07', 0),
(55, 1, 'BOXID-2', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 2, '2020-04-30 00:00:00', '2020-05-01 00:00:00', NULL, 'analysis', '2020-04-30 15:00:02', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:50', '2020-04-30 09:30:02', 0),
(56, 1, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-05-02 00:00:00', '2020-05-03 00:00:00', NULL, 'analysis', '2020-05-02 10:33:50', 'verify', '2020-05-09 11:21:10', '', NULL, 20, 'BAL/AD/1/RP:51', '2020-05-02 05:03:50', 10),
(57, 1, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-05-02 00:00:00', '2020-05-03 00:00:00', NULL, 'analysis', '2020-05-02 19:14:40', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:52', '2020-05-02 13:44:40', 0),
(62, 1, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-05-04 00:00:00', '2020-05-05 00:00:00', NULL, 'analysis', '2020-05-04 15:16:07', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:53', '2020-05-04 09:46:07', 10),
(63, 2, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-04 00:00:00', '2020-06-03 00:00:00', '2020-05-04 00:00:00', 'analysis', '2020-05-04 15:18:52', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:54', '2020-05-04 09:48:52', 0),
(64, 3, 'BOXID-2', '', 2, '', 4, '', '', 'Dell', 'Model100', 1, 2, '2020-05-04 00:00:00', '2020-05-05 00:00:00', NULL, 'analysis', '2020-05-04 15:26:22', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:55', '2020-05-04 09:56:22', 0),
(65, 1, 'BOXID-2', '', 1, '', 3, '', '', 'Dell', 'Model3', 1, 2, '2020-05-04 00:00:00', '2020-05-05 00:00:00', NULL, 'analysis', '2020-05-04 16:49:59', '', NULL, '', NULL, 10, 'BAL/AD/3/RP:56', '2020-05-04 11:19:59', 0),
(66, 2, 'BOXID-2', '', 1, '', 2, '', '', 'HP', 'Model2', 0, 0, '2020-05-04 00:00:00', '2020-06-03 00:00:00', '2020-05-05 00:00:00', 'analysis', '2020-05-04 18:52:55', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:57', '2020-05-04 13:22:55', 0),
(67, 1, 'BOXID-0507', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-05-07 00:00:00', '2020-05-08 00:00:00', NULL, 'analysis', '2020-05-07 15:09:44', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:58', '2020-05-07 09:39:44', 0),
(68, 2, 'BOXID-0507', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-07 00:00:00', '2020-06-06 00:00:00', '2020-05-15 00:00:00', 'analysis', '2020-05-07 15:14:40', 'verify', '2020-05-09 11:21:44', 'approver', '2020-05-09 11:47:35', 40, 'BAL/AD/1/RP:59', '2020-05-07 09:44:40', 0),
(69, 2, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-11 00:00:00', '2020-06-10 00:00:00', '2020-05-11 00:00:00', 'analysis', '2020-05-11 10:24:34', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:60', '2020-05-11 04:54:34', 0),
(70, 2, 'BOXID-2', '', 3, '', 7, '', '', 'test', 'test', 0, 0, '2020-05-11 00:00:00', '2020-06-10 00:00:00', '2020-05-06 00:00:00', 'analysis', '2020-05-11 10:28:07', '', NULL, '', NULL, 10, 'BAL/AD/7/RP:61', '2020-05-11 04:58:07', 0),
(71, 2, 'BOXID-0507', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-14 00:00:00', '2020-06-13 00:00:00', '2020-06-18 00:00:00', 'analysis', '2020-05-14 13:16:53', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:62', '2020-05-14 07:46:53', 0),
(72, 2, 'BOXID-2', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-16 00:00:00', '2020-06-15 00:00:00', '2020-05-04 00:00:00', 'analysis', '2020-05-16 00:26:00', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:63', '2020-05-15 18:56:00', 0),
(73, 2, 'BOX-123', '', 1, '', 2, '', '', 'HP', 'Model2', 0, 0, '2020-05-16 00:00:00', '2020-06-15 00:00:00', '2020-06-17 00:00:00', 'analysis', '2020-05-16 13:56:07', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:64', '2020-05-16 08:26:07', 0),
(74, 2, 'BOX-123', '', 3, '', 7, '', '', 'test', 'test', 0, 0, '2020-05-16 00:00:00', '2020-06-15 00:00:00', '2020-05-12 00:00:00', 'analysis', '2020-05-16 14:17:18', '', NULL, '', NULL, 10, 'BAL/AD/7/RP:65', '2020-05-16 08:47:18', 0),
(75, 1, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 2, '2020-05-16 00:00:00', '2020-05-17 00:00:00', NULL, 'analysis', '2020-05-16 15:32:27', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:66', '2020-05-16 10:02:27', 0),
(76, 2, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-19 00:00:00', '2020-06-18 00:00:00', '2020-06-23 00:00:00', 'analysis', '2020-05-19 11:01:49', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:67', '2020-05-19 05:31:49', 10),
(77, 2, 'BOX-123', '', 1, '', 2, '', '', 'HP', 'Model2', 0, 0, '2020-05-19 00:00:00', '2020-06-18 00:00:00', '2020-06-18 00:00:00', 'analysis', '2020-05-19 11:03:10', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:68', '2020-05-19 05:33:10', 0),
(78, 2, 'BOX-123', '', 3, '', 7, '', '', 'test', 'test', 0, 0, '2020-05-19 00:00:00', '2020-06-18 00:00:00', '2020-05-28 00:00:00', 'analysis', '2020-05-19 11:44:54', '', NULL, '', NULL, 10, 'BAL/AD/7/RP:69', '2020-05-19 06:14:54', 0),
(79, 2, 'BOX-123', '', 2, '', 4, '', '', 'Dell', 'Model100', 0, 0, '2020-05-19 00:00:00', '2020-06-18 11:57:00', '2020-06-24 11:57:00', 'analysis', '2020-05-19 11:57:12', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:70', '2020-05-19 06:27:12', 0),
(80, 2, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-19 00:00:00', '2020-06-18 15:06:00', '2020-06-16 15:06:00', 'analysis', '2020-05-19 15:06:28', 'verify', '2020-05-19 15:10:40', 'approver', '2020-05-19 15:11:52', 30, 'BAL/AD/1/RP:71', '2020-05-19 09:36:28', 0),
(81, 1, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 1, 1, '2020-05-20 11:16:00', '2020-05-21 11:16:00', NULL, 'analysis', '2020-05-20 11:19:11', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:72', '2020-05-20 05:49:11', 0),
(82, 2, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-20 11:46:00', '2020-06-19 11:46:00', '2020-05-12 13:05:00', 'analysis', '2020-05-20 11:47:34', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:73', '2020-05-20 06:17:34', 0),
(83, 2, 'BOX-74', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-21 10:43:00', '2020-06-20 10:44:00', '2020-07-15 14:01:00', 'analysis', '2020-05-21 10:45:00', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:74', '2020-05-21 05:15:00', 0),
(84, 2, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-25 15:10:00', '2020-06-24 15:10:00', '2020-06-15 14:00:00', 'analysis', '2020-05-25 15:11:22', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:75', '2020-05-25 09:41:22', 0),
(85, 2, 'BOX-123', '', 2, '', 4, '', '', 'Dell', 'Model100', 0, 0, '2020-05-25 18:55:00', '2020-06-24 18:55:00', '2020-05-14 14:01:00', 'analysis', '2020-05-25 18:56:18', '', NULL, '', NULL, 10, 'BAL/AD/4/RP:76', '2020-05-25 13:26:18', 0),
(86, 1, 'BOX-123', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 2, '2020-05-26 10:36:00', '2020-05-27 10:37:00', NULL, 'analysis', '2020-05-26 10:37:53', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:77', '2020-05-26 05:07:53', 0),
(87, 2, 'BOX-123', '', 4, '', 5, '', '', 'Test Make', 'Test Model', 0, 0, '2020-05-26 10:40:00', '2020-06-25 10:41:00', '2020-06-26 14:01:00', 'analysis', '2020-05-26 10:42:21', '', NULL, '', NULL, 10, 'BAL/AD/5/RP:78', '2020-05-26 05:12:21', 0),
(88, 2, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-26 10:46:00', '2020-06-25 10:46:00', '2020-06-11 15:52:00', 'analysis', '2020-05-26 10:47:13', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:79', '2020-05-26 05:17:13', 0),
(89, 3, 'BOX-123', '', 1, '', 11, '', '', '260520', '260520', 1, 1, '2020-05-26 17:26:00', '2020-05-27 17:27:00', NULL, 'analysis', '2020-05-26 17:28:13', 'verify', '2020-05-26 18:22:08', 'approver', '2020-05-26 19:47:10', 30, 'BAL/AD/11/RP:80', '2020-05-26 11:58:13', 0),
(90, 2, 'BOX-123', '', 1, '', 11, '', '', '260520', '260520', 0, 0, '2020-05-26 17:30:00', '2020-06-25 17:30:00', '2020-05-26 01:10:00', 'analysis', '2020-05-26 17:31:08', 'verify', '2020-05-26 18:18:58', '', NULL, 25, 'BAL/AD/11/RP:81', '2020-05-26 12:01:08', 0),
(91, 6, 'BOX-123', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-26 17:35:00', '2020-06-25 17:36:00', '2020-05-26 10:10:00', 'analysis', '2020-05-26 17:37:10', 'verify', '2020-05-26 18:59:28', 'approver', '2020-05-26 19:44:44', 40, 'BAL/AD/1/RP:82', '2020-05-26 12:07:10', 0),
(92, 2, 'BOX-12378', '', 1, '', 1, '', '', 'HP', 'Model1', 0, 0, '2020-05-27 17:12:00', '2020-06-26 17:13:00', '2020-05-27 17:13:00', 'analysis', '2020-05-27 17:14:02', '', NULL, '', NULL, 10, 'BAL/AD/1/RP:83', '2020-05-27 11:44:02', 0),
(93, 1, 'test', '', 1, '', 2, '', '', 'HP', 'Model2', 1, 2, '2020-06-01 18:19:00', '2020-06-02 18:19:00', NULL, 'analysis', '2020-06-01 18:19:43', '', NULL, '', NULL, 10, 'BAL/AD/2/RP:84', '2020-06-01 12:49:43', 0),
(94, 1, 'test', '', 2, '', 14, '', '', 'Test MG', 'Test MG', 1, 1, '2020-06-01 18:28:00', '2020-06-02 18:28:00', NULL, 'analysis', '2020-06-01 18:28:44', '', NULL, '', NULL, 10, 'BAL/AD/14/RP:85', '2020-06-01 12:58:44', 0),
(95, 6, 'test', '', 3, '', 7, '', '', 'test', 'test', 0, 0, '2020-06-07 01:41:00', '2020-07-07 01:42:00', '2020-06-24 01:42:00', 'analysis', '2020-06-07 01:42:13', '', NULL, '', NULL, 10, 'BAL/AD/7/RP:86', '2020-06-06 20:12:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `calibrationcomment`
--

CREATE TABLE `calibrationcomment` (
  `RecId` bigint(20) NOT NULL,
  `LineRecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `CalibrationStatus` int(11) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calibrationcomment`
--

INSERT INTO `calibrationcomment` (`RecId`, `LineRecId`, `RefRecId`, `CalibrationStatus`, `Comments`, `Type`, `CreatedBy`, `CreatedDate`) VALUES
(1, 0, 40, 10, 'test', 1, 'analysis', '2020-04-27 10:32:14'),
(2, 0, 40, 10, 'test', 1, 'analysis', '2020-04-27 10:34:49'),
(3, 0, 40, 10, 'testing edit', 1, 'analysis', '2020-04-27 10:35:18'),
(4, 0, 40, 10, 'sfsds', 1, 'analysis', '2020-04-27 12:36:28'),
(5, 0, 40, 10, 'wewq', 1, 'analysis', '2020-04-27 12:36:48'),
(6, 208, 47, 10, 'Line 2 : zscd', 1, 'analysis', '2020-04-27 12:39:21'),
(7, 211, 47, 10, 'Line 5 : sfafsaf', 1, 'analysis', '2020-04-27 12:39:21'),
(8, 214, 48, 10, 'Positive Line 2 : test', 2, 'analysis', '2020-04-27 12:43:30'),
(9, 214, 48, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-04-27 12:43:30'),
(10, 214, 48, 10, 'Line 2 : test', 3, 'analysis', '2020-04-27 12:46:07'),
(11, 215, 48, 10, 'Line 3 : test', 3, 'analysis', '2020-04-27 12:46:07'),
(12, 223, 49, 10, 'Positive Line 2 : testing', 2, 'analysis', '2020-04-28 10:26:59'),
(13, 224, 49, 10, 'Negative Line 3 : test', 2, 'analysis', '2020-04-28 10:26:59'),
(14, 224, 49, 10, 'Negative Line 3 : testtest', 2, 'analysis', '2020-04-28 10:26:59'),
(15, 224, 49, 10, 'Negative Line 3 : testtest', 2, 'analysis', '2020-04-28 10:26:59'),
(16, 223, 49, 10, 'Line 2 : testing', 4, 'analysis', '2020-04-28 13:24:46'),
(17, 224, 49, 10, 'Line 3 : test line 3', 4, 'analysis', '2020-04-28 13:24:46'),
(18, 233, 50, 10, 'Line 2 : check daily base form', 1, 'analysis', '2020-04-29 06:42:09'),
(19, 235, 51, 10, 'Positive Line 1 : test', 2, 'analysis', '2020-04-29 06:43:14'),
(20, 237, 51, 10, 'Negative Line 3 : testing', 2, 'analysis', '2020-04-29 06:43:14'),
(21, 236, 51, 10, 'Line 2 : test', 4, 'analysis', '2020-04-29 06:44:26'),
(22, 245, 52, 10, 'Positive Line 1 : Repeat Test', 2, 'analysis', '2020-04-30 05:44:24'),
(23, 246, 52, 10, 'Line 2 : test', 4, 'analysis', '2020-04-30 05:46:57'),
(26, 250, 53, 10, 'Positive Line 2 : add only 3 line', 2, 'analysis', '2020-04-30 07:12:32'),
(27, 250, 53, 10, 'Negative Line 2 : add only negative 3 line', 2, 'analysis', '2020-04-30 07:12:32'),
(28, 20, 53, 10, 'Line 2 : test', 4, 'analysis', '2020-04-30 07:14:06'),
(29, 18, 53, 10, 'Line 2 : test', 5, 'analysis', '2020-04-30 07:26:20'),
(30, 19, 53, 10, 'Line 3 : test', 5, 'analysis', '2020-04-30 07:26:20'),
(31, 250, 53, 10, 'Line 2 : test line 3', 3, 'analysis', '2020-04-30 07:28:10'),
(32, 259, 54, 10, 'Line 2 : test', 1, 'analysis', '2020-04-30 09:27:36'),
(33, 265, 56, 10, 'Line 2 : test', 1, 'analysis', '2020-05-02 05:02:56'),
(39, 296, 62, 10, 'Line 2 : test', 1, 'analysis', '2020-05-04 09:45:20'),
(40, 299, 63, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-04 09:48:17'),
(41, 305, 64, 10, 'Line 2 : test', 1, 'analysis', '2020-05-04 09:54:25'),
(42, 311, 66, 10, 'Positive Line 2 : test', 2, 'analysis', '2020-05-04 13:21:56'),
(43, 312, 66, 10, 'Negative Line 3 : test', 2, 'analysis', '2020-05-04 13:21:56'),
(44, 1, 66, 10, 'Positive Line 1 : testing', 1, 'analysis', '2020-05-07 07:00:21'),
(45, 2, 66, 10, 'Negative Line 2 : dsfsf', 1, 'analysis', '2020-05-07 07:02:10'),
(46, 1, 66, 10, 'Positive Line 1 : test comments', 2, 'analysis', '2020-05-07 07:10:48'),
(47, 258, 54, 10, 'Line 1 : test', 1, 'analysis', '2020-05-07 07:17:55'),
(48, 260, 54, 10, 'Line 3 : test add comment', 1, 'analysis', '2020-05-07 07:20:47'),
(49, 311, 66, 10, 'Positive Line 2 : edit line 2 and add comment', 2, 'analysis', '2020-05-07 07:33:03'),
(50, 314, 66, 10, 'Negative Line 2 : Positive Line 2 : edit line 2 and add comment', 2, 'analysis', '2020-05-07 07:33:42'),
(51, 315, 66, 10, 'Negative Line 3 : test12345', 2, 'analysis', '2020-05-07 07:36:33'),
(52, 313, 66, 10, 'Negative Line 1 : total 7', 2, 'analysis', '2020-05-07 07:37:23'),
(53, 314, 66, 10, 'Negative Line 2 : this is first line', 2, 'analysis', '2020-05-07 07:44:21'),
(54, 0, 66, 10, 'Form : BAL/AD/2/RP:57 Edit By : analysis at 07/05/2020 02:24 PM', 2, 'analysis', '2020-05-07 08:54:05'),
(55, 317, 67, 10, 'Line 2 : test date 07 May 2020', 1, 'analysis', '2020-05-07 09:38:54'),
(56, 317, 67, 10, 'Line 2 : test edit line', 1, 'analysis', '2020-05-07 09:41:31'),
(57, 318, 67, 10, 'Line 3 : test  view comment', 1, 'analysis', '2020-05-07 09:43:06'),
(58, 0, 67, 10, 'test', 1, 'analysis', '2020-05-07 09:43:13'),
(59, 321, 68, 10, 'Positive Line 3 : test', 2, 'analysis', '2020-05-07 09:43:53'),
(60, 321, 68, 10, 'Negative Line 3 : test', 2, 'analysis', '2020-05-07 09:43:53'),
(61, 27, 68, 10, 'Line 2 : test', 5, 'analysis', '2020-05-07 09:45:35'),
(62, 0, 68, 10, 'Form : BAL/AD/1/RP:59 Edit By : analysis at 07/05/2020 03:17 PM', 2, 'analysis', '2020-05-07 09:47:06'),
(63, 322, 68, 10, 'Line 4 : test', 3, 'analysis', '2020-05-07 09:53:55'),
(64, 29, 68, 10, 'Line 2 : testing', 4, 'analysis', '2020-05-07 10:27:09'),
(65, 35, 68, 10, 'Line 2 : testing  12', 4, 'analysis', '2020-05-07 10:28:59'),
(66, 34, 68, 10, 'Line 1 : test', 4, 'analysis', '2020-05-07 11:43:50'),
(67, 36, 68, 10, 'Line 3 : test add comment', 4, 'analysis', '2020-05-07 11:44:14'),
(68, 26, 68, 10, 'Line 1 : test first comment', 5, 'analysis', '2020-05-07 12:57:02'),
(69, 27, 68, 10, 'Line 2 : test 123', 5, 'analysis', '2020-05-07 12:57:42'),
(70, 330, 68, 10, 'Line 2 : test last page', 3, 'analysis', '2020-05-07 13:28:19'),
(71, 0, 68, 10, 'Form : BAL/AD/1/RP:59 Edit By : analysis at 07/05/2020 07:01 PM', 2, 'analysis', '2020-05-07 13:31:40'),
(72, 0, 68, 10, 'Form : BAL/AD/1/RP:59 Edit By : analysis at 09/05/2020 10:27 AM', 2, 'analysis', '2020-05-09 04:57:46'),
(73, 0, 56, 20, 'Form : BAL/AD/1/RP:51 is Verify by verify at 09/05/2020 11:21 AM.', 1, 'verify', '2020-05-09 05:51:10'),
(74, 0, 68, 20, 'Form : BAL/AD/1/RP:59 is Verify by verify at 09/05/2020 11:21 AM.', 2, 'verify', '2020-05-09 05:51:44'),
(75, 0, 68, 30, 'Form : BAL/AD/1/RP:59 is Approve by Approver at 09/05/2020 11:46 AM.', 1, 'approver', '2020-05-09 06:16:33'),
(76, 0, 68, 40, 'Form : BAL/AD/1/RP:59 is Decline (Approver) by Approver at 09/05/2020 11:47 AM.', 2, 'approver', '2020-05-09 06:17:35'),
(77, 0, 57, 10, 'testing', 1, 'analysis', '2020-05-09 06:37:41'),
(78, 0, 57, 10, 'saSDasd', 1, 'analysis', '2020-05-09 06:39:24'),
(79, 0, 57, 10, 'ewfwer', 1, 'analysis', '2020-05-09 06:40:13'),
(80, 0, 57, 10, 'test add comment', 1, 'analysis', '2020-05-09 06:41:09'),
(81, 0, 57, 10, 'xczc', 1, 'analysis', '2020-05-09 06:42:18'),
(82, 0, 68, 40, 'test after submit', 2, 'analysis', '2020-05-09 06:44:55'),
(83, 0, 68, 40, 'testing 1 2 3 4 5', 2, 'analysis', '2020-05-09 06:45:12'),
(84, 0, 68, 40, 'last test', 2, 'analysis', '2020-05-09 07:12:51'),
(85, 335, 69, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-11 04:53:49'),
(86, 344, 70, 10, 'Negative Line 1 : gsdfsg', 2, 'analysis', '2020-05-11 04:56:16'),
(87, 33, 70, 10, 'Line 2 : zxczc', 5, 'analysis', '2020-05-11 04:58:40'),
(88, 351, 71, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-14 07:46:09'),
(89, 0, 71, 10, 'Form : BAL/AD/1/RP:62 Edit By : analysis at 14/05/2020 02:22 PM', 2, 'analysis', '2020-05-14 08:52:58'),
(90, 57, 72, 10, 'Line 9 : test', 4, 'analysis', '2020-05-15 20:05:41'),
(91, 51, 72, 10, 'Line 3 : test', 4, 'analysis', '2020-05-15 20:06:06'),
(92, 0, 72, 10, 'Form : BAL/AD/1/RP:63 Edit By : analysis at 16/05/2020 01:54 PM', 2, 'analysis', '2020-05-16 08:24:10'),
(93, 368, 73, 10, 'Negative Line 3 : test', 2, 'analysis', '2020-05-16 08:25:01'),
(94, 61, 73, 10, 'Line 3 : test', 4, 'analysis', '2020-05-16 08:35:23'),
(95, 59, 73, 10, 'Line 1 : testing change value', 4, 'analysis', '2020-05-16 08:37:26'),
(96, 60, 73, 10, 'Line 2 : test change val', 4, 'analysis', '2020-05-16 08:37:59'),
(97, 0, 73, 10, 'Form : BAL/AD/2/RP:64 Edit By : analysis at 16/05/2020 02:41 PM', 2, 'analysis', '2020-05-16 09:11:56'),
(98, 0, 71, 10, 'Form : BAL/AD/1/RP:62 Edit By : analysis at 19/05/2020 11:00 AM', 2, 'analysis', '2020-05-19 05:30:22'),
(99, 381, 76, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-19 05:30:43'),
(100, 382, 76, 10, 'Positive Line 3 : testing', 2, 'analysis', '2020-05-19 05:30:43'),
(101, 0, 76, 10, 'Form : BAL/AD/1/RP:67 Edit By : analysis at 19/05/2020 11:02 AM', 2, 'analysis', '2020-05-19 05:32:24'),
(102, 0, 80, 20, 'Form : BAL/AD/1/RP:71 is Verify by verify at 19/05/2020 03:10 PM.', 2, 'verify', '2020-05-19 09:40:40'),
(103, 0, 80, 30, 'Form : BAL/AD/1/RP:71 is Approve by Approver at 19/05/2020 03:11 PM.', 2, 'approver', '2020-05-19 09:41:52'),
(104, 434, 81, 10, 'Line 2 : test', 1, 'analysis', '2020-05-20 05:46:44'),
(105, 0, 81, 10, 'test', 1, 'analysis', '2020-05-20 06:10:27'),
(106, 0, 81, 10, 'Form : BAL/AD/1/RP:72 Edit By : analysis at 20/05/2020 11:41 AM and edit Spirit level of Balance Checked: Yes to Yes, Internal Calibration: Fails to Passes', 1, 'analysis', '2020-05-20 06:11:17'),
(107, 0, 81, 10, 'dgsdg', 1, 'analysis', '2020-05-20 06:11:27'),
(108, 438, 82, 10, 'Positive Line 3 : test', 2, 'analysis', '2020-05-20 06:16:39'),
(109, 0, 82, 10, 'Form : BAL/AD/1/RP:73 Edit By : analysis at 20/05/2020 12:18 PM', 2, 'analysis', '2020-05-20 06:48:51'),
(110, 442, 82, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-20 06:49:15'),
(111, 0, 82, 10, 'Form : BAL/AD/1/RP:73 Edit By : analysis at 20/05/2020 12:19 PM', 2, 'analysis', '2020-05-20 06:49:28'),
(112, 77, 82, 10, 'Line 8 : test', 4, 'analysis', '2020-05-20 06:49:42'),
(113, 43, 82, 10, 'Line 2 : test', 5, 'analysis', '2020-05-20 06:50:27'),
(114, 0, 82, 10, 'Displayed weight(A): test', 6, 'analysis', '2020-05-20 12:14:02'),
(115, 0, 82, 10, 'Displayed weight(B): testing', 6, 'analysis', '2020-05-20 12:14:02'),
(116, 0, 82, 10, 'Displayed weight(A): test', 6, 'analysis', '2020-05-20 12:28:34'),
(117, 447, 83, 10, 'Negative Line 2 : test', 2, 'analysis', '2020-05-21 05:13:54'),
(118, 0, 83, 10, 'Displayed weight(B): test', 6, 'analysis', '2020-05-21 05:19:15'),
(119, 0, 83, 10, 'Displayed weight(A): test 123', 6, 'analysis', '2020-05-21 05:31:58'),
(120, 45, 83, 10, 'Line 1 : test', 5, 'analysis', '2020-05-21 05:40:52'),
(121, 0, 83, 10, 'Displayed weight(B): test data on b input', 6, 'analysis', '2020-05-21 07:01:17'),
(122, 0, 83, 10, 'Displayed weight(A): test data', 6, 'analysis', '2020-05-21 07:02:52'),
(123, 0, 83, 10, 'Displayed weight(B): testing', 6, 'analysis', '2020-05-21 07:05:46'),
(124, 0, 83, 10, 'Displayed weight(A): Displayed weight of 200 gm weight', 6, 'analysis', '2020-05-21 07:07:51'),
(125, 0, 83, 10, 'Displayed weight(B): test', 6, 'analysis', '2020-05-21 07:11:40'),
(126, 448, 83, 10, 'Line 3 : test', 3, 'analysis', '2020-05-21 08:34:34'),
(127, 0, 83, 10, 'test12345', 2, 'analysis', '2020-05-21 09:12:15'),
(128, 0, 83, 10, 'sczcscsc', 2, 'analysis', '2020-05-21 09:12:22'),
(129, 0, 83, 10, 'sczcscsc', 2, 'analysis', '2020-05-21 09:12:23'),
(130, 0, 77, 10, 'Form : BAL/AD/2/RP:68 Edit By : analysis at 25/05/2020 03:04 PM', 2, 'analysis', '2020-05-25 09:34:20'),
(131, 0, 84, 10, 'testing mg calibration', 4, 'analysis', '2020-05-25 10:59:16'),
(132, 0, 84, 10, 'test mg calibration comments', 4, 'analysis', '2020-05-25 10:59:59'),
(133, 0, 84, 10, 'sdffdfsf ewrf werwr wr rwr we rwrwre', 4, 'analysis', '2020-05-25 11:01:12'),
(134, 100, 84, 10, 'Line 1 : test mg calibration', 4, 'analysis', '2020-05-25 11:09:43'),
(135, 105, 84, 10, 'Line 6 : test', 4, 'analysis', '2020-05-25 13:56:54'),
(136, 464, 86, 10, 'Line 4 : test', 1, 'analysis', '2020-05-26 05:06:50'),
(137, 0, 86, 10, 'test', 1, 'analysis', '2020-05-26 05:10:21'),
(138, 467, 87, 10, 'Positive Line 2 : test', 2, 'analysis', '2020-05-26 05:10:58'),
(139, 467, 87, 10, 'Positive Line 2 : test', 2, 'analysis', '2020-05-26 05:10:58'),
(140, 110, 87, 10, 'Line 1 : test', 4, 'analysis', '2020-05-26 05:12:33'),
(141, 0, 86, 10, 'Form : BAL/AD/2/RP:77 Edit By : analysis at 26/05/2020 10:44 AM and edit Spirit level of Balance Checked: Yes to Yes, Internal Calibration: Fails to Fails', 1, 'analysis', '2020-05-26 05:14:54'),
(142, 0, 87, 10, 'Displayed weight(B): test', 6, 'analysis', '2020-05-26 05:15:25'),
(143, 0, 88, 10, 'test', 4, 'analysis', '2020-05-26 05:18:41'),
(144, 120, 88, 10, 'Line 10 : dsgdgdfsdfs', 4, 'analysis', '2020-05-26 05:19:32'),
(145, 0, 87, 10, 'Form : BAL/AD/5/RP:78 Edit By : analysis at 26/05/2020 10:49 AM', 2, 'analysis', '2020-05-26 05:19:43'),
(146, 0, 89, 10, 'testtttttttttttttttttttttttttttttttttt 26052020', 1, 'analysis', '2020-05-26 11:59:04'),
(147, 475, 89, 10, 'Line 1 : test re scan 26052020', 1, 'analysis', '2020-05-26 11:59:34'),
(148, 0, 89, 10, 'Form : BAL/AD/11/RP:80 Edit By : analysis at 26/05/2020 05:29 PM and edit Spirit level of Balance Checked: Yes to Yes, Internal Calibration: Passes to Passes', 1, 'analysis', '2020-05-26 11:59:37'),
(149, 482, 90, 10, 'Line 4 : test', 3, 'analysis', '2020-05-26 12:05:23'),
(150, 0, 91, 10, 'test', 4, 'analysis', '2020-05-26 12:31:57'),
(151, 0, 91, 10, 'sdsad ddaw', 4, 'analysis', '2020-05-26 12:32:04'),
(152, 122, 91, 10, 'Line 1 : testtt', 4, 'analysis', '2020-05-26 12:40:42'),
(153, 0, 90, 10, 'Form : BAL/AD/11/RP:81 Edit By : analysis at 26/05/2020 06:12 PM', 2, 'analysis', '2020-05-26 12:42:21'),
(154, 0, 90, 10, 'Displayed weight(A): jgbjhh', 6, 'analysis', '2020-05-26 12:43:49'),
(155, 0, 90, 10, 'Form : BAL/AD/11/RP:81 Edit By : analysis at 26/05/2020 06:14 PM', 2, 'analysis', '2020-05-26 12:44:07'),
(156, 478, 89, 10, 'Line 4 : trtyrtyry', 1, 'analysis', '2020-05-26 12:45:14'),
(157, 0, 89, 10, 'Form : BAL/AD/11/RP:80 Edit By : analysis at 26/05/2020 06:15 PM and edit Spirit level of Balance Checked: Yes to Yes, Internal Calibration: Passes to Passes', 1, 'analysis', '2020-05-26 12:45:16'),
(158, 0, 90, 25, 'Form : BAL/AD/11/RP:81 is Decline (Verify) by verify at 26/05/2020 06:18 PM.', 2, 'verify', '2020-05-26 12:48:58'),
(159, 0, 89, 20, 'Form : BAL/AD/11/RP:80 is Verify by verify at 26/05/2020 06:22 PM.', 1, 'verify', '2020-05-26 12:52:08'),
(160, 0, 91, 10, 'test', 4, 'verify', '2020-05-26 13:29:16'),
(161, 0, 91, 20, 'Form : BAL/AD/1/RP:82 is Verify by verify at 26/05/2020 06:59 PM.', 2, 'verify', '2020-05-26 13:29:28'),
(162, 0, 90, 10, 'Form : BAL/AD/11/RP:81 Edit By : analysis at 26/05/2020 07:39 PM', 2, 'analysis', '2020-05-26 14:09:35'),
(163, 121, 90, 10, 'Line 1 : testing after change', 4, 'analysis', '2020-05-26 14:09:54'),
(164, 0, 91, 30, 'Form : BAL/AD/1/RP:82 is Approve by Approver at 26/05/2020 07:43 PM.', 2, 'approver', '2020-05-26 14:13:53'),
(165, 0, 91, 40, 'Form : BAL/AD/1/RP:82 is Decline (Approver) by Approver at 26/05/2020 07:44 PM.', 2, 'approver', '2020-05-26 14:14:44'),
(166, 0, 89, 30, 'Form : BAL/AD/11/RP:80 is Approve by Approver at 26/05/2020 07:47 PM.', 1, 'approver', '2020-05-26 14:17:10'),
(167, 0, 92, 10, 'dfsds', 4, 'analysis', '2020-05-27 11:46:21'),
(168, 0, 42, 10, 'Form : BAL/AD/5/RP:37 Edit By : analysis at 07/06/2020 01:12 AM', 2, 'analysis', '2020-06-06 19:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationform`
--

CREATE TABLE `calibrationform` (
  `RecId` bigint(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `CType` bigint(20) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calibrationform`
--

INSERT INTO `calibrationform` (`RecId`, `Name`, `CType`, `IsActive`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Calibration Form(Daily)', 1, 1, 'admin', '2020-02-20 12:23:55'),
(2, 'Calibration Form(Monthly)', 2, 1, 'admin', '2020-02-20 12:23:55'),
(3, 'Calibration_2', 1, 1, 'tesla', '2020-03-03 06:35:38'),
(6, 'Calibration_1', 2, 1, 'tesla', '2020-03-03 06:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationformtype`
--

CREATE TABLE `calibrationformtype` (
  `RecId` bigint(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `DayAdd` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calibrationformtype`
--

INSERT INTO `calibrationformtype` (`RecId`, `Name`, `DayAdd`, `IsActive`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Daily', 1, 1, 'admin', '2020-02-20 12:21:56'),
(2, 'Monthly', 30, 1, 'admin', '2020-02-20 12:21:56'),
(3, 'Weekly', 10, 1, 'tesla', '2020-03-03 05:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationline`
--

CREATE TABLE `calibrationline` (
  `RecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `CertWeight` decimal(28,5) NOT NULL,
  `DispWeight` decimal(28,5) NOT NULL,
  `DiffWeight` decimal(28,5) NOT NULL,
  `AccpWeight` decimal(28,5) NOT NULL,
  `Result` int(11) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calibrationline`
--

INSERT INTO `calibrationline` (`RecId`, `RefRecId`, `LineId`, `Type`, `StWeight`, `CertWeight`, `DispWeight`, `DiffWeight`, `AccpWeight`, `Result`, `Tfile`, `Ifile`, `CreatedBy`, `CreatedDate`) VALUES
(1, 1, 1, 0, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-26 11:57:30'),
(2, 1, 2, 0, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-26 11:57:30'),
(3, 1, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 11:57:30'),
(4, 1, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 11:57:30'),
(5, 1, 5, 0, '200.00000', '200.00000', '2.79170', '197.20830', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 11:57:30'),
(6, 2, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 12:16:08'),
(7, 2, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 12:16:08'),
(8, 2, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 12:16:08'),
(9, 2, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 12:16:08'),
(10, 2, 5, 0, '200.00000', '200.00000', '2.79170', '197.20830', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-26 12:16:08'),
(11, 3, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:37:33'),
(12, 3, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:37:33'),
(13, 3, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:37:33'),
(14, 3, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:37:33'),
(15, 3, 5, 0, '200.00000', '200.00000', '2.79170', '197.20830', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:37:33'),
(16, 4, 1, 0, '0.02000', '0.02000', '2.79150', '-2.77150', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-27 05:39:57'),
(17, 4, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:39:57'),
(18, 4, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:39:57'),
(19, 4, 4, 0, '100.00000', '100.00000', '2.79150', '97.20850', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-27 05:39:57'),
(20, 4, 5, 0, '200.00000', '200.00000', '2.79170', '197.20830', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 05:39:57'),
(21, 5, 1, 0, '0.02000', '0.02000', '2.79150', '-2.77150', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-27 07:54:33'),
(22, 5, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 07:54:33'),
(23, 5, 3, 0, '0.01000', '0.01000', '2.79150', '-2.78150', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-27 07:54:33'),
(24, 6, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 08:40:16'),
(25, 7, 2, 0, '0.05000', '2.79130', '2.79130', '-0.00002', '0.00005', 1, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-27 11:37:39'),
(26, 8, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 11:40:22'),
(27, 9, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-27 11:47:26'),
(28, 10, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:16:56'),
(29, 10, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:16:56'),
(30, 10, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:16:56'),
(31, 10, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:16:56'),
(32, 11, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:18:22'),
(33, 11, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:18:22'),
(34, 11, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:18:22'),
(35, 11, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:18:22'),
(36, 12, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:19:59'),
(37, 12, 2, 0, '0.05000', '0.05000', '2.79170', '-2.74170', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:19:59'),
(38, 12, 3, 0, '0.01000', '0.01000', '2.79170', '-2.78170', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:19:59'),
(39, 12, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:19:59'),
(40, 13, 1, 0, '0.02000', '0.02000', '2.79170', '-2.77170', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:21:01'),
(41, 14, 1, 0, '0.02000', '0.02000', '2.79150', '-2.77150', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-28 06:50:24'),
(42, 14, 2, 0, '0.05000', '0.05000', '2.79150', '-2.74150', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-28 06:50:24'),
(43, 14, 3, 0, '0.01000', '0.01000', '2.79150', '-2.78150', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-02-28 06:50:24'),
(44, 14, 4, 0, '100.00000', '100.00000', '2.79170', '97.20830', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:50:24'),
(45, 14, 5, 0, '200.00000', '200.00000', '2.79170', '197.20830', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-02-28 06:50:24'),
(46, 15, 1, 0, '0.02000', '0.02000', '2.79130', '-2.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-03-02 08:18:14'),
(47, 15, 2, 0, '0.05000', '0.05000', '2.79130', '-2.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-03-02 08:18:14'),
(48, 16, 1, 0, '0.02000', '0.02000', '2.79130', '-2.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:06:19'),
(49, 16, 2, 0, '0.05000', '0.05000', '2.79130', '-2.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:06:19'),
(50, 16, 3, 0, '0.01000', '0.01000', '2.79130', '-2.78130', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:06:19'),
(51, 17, 1, 0, '0.02000', '0.02000', '2.79130', '-2.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:17:04'),
(52, 17, 2, 0, '0.05000', '0.05000', '2.79130', '-2.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:17:04'),
(53, 17, 3, 0, '0.01000', '0.01000', '2.79130', '-2.78130', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:17:04'),
(54, 17, 4, 0, '100.00000', '100.00000', '2.79130', '97.20870', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:17:04'),
(55, 17, 5, 0, '200.00000', '200.00000', '2.79130', '197.20870', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'newton', '2020-03-02 13:17:04'),
(56, 18, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'newton', '2020-03-18 09:56:02'),
(57, 18, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'newton', '2020-03-18 09:56:02'),
(58, 18, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'newton', '2020-03-18 09:56:02'),
(59, 18, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'newton', '2020-03-18 09:56:02'),
(60, 18, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'newton', '2020-03-18 09:56:02'),
(61, 19, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-18 12:42:34'),
(62, 19, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-18 12:42:34'),
(63, 20, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 06:55:14'),
(64, 20, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 06:55:14'),
(65, 20, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 06:55:14'),
(66, 21, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 07:01:12'),
(67, 21, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 07:01:12'),
(68, 21, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 07:01:12'),
(69, 21, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 07:01:12'),
(70, 22, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 12:28:42'),
(71, 22, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-19 12:28:42'),
(72, 23, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 08:58:20'),
(73, 23, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 08:58:20'),
(74, 23, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 08:58:20'),
(75, 24, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 09:35:45'),
(76, 24, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 09:35:45'),
(77, 24, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 09:35:45'),
(78, 24, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 09:35:45'),
(79, 25, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:09:50'),
(80, 25, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:09:50'),
(81, 25, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:09:50'),
(82, 25, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:09:50'),
(83, 25, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:09:50'),
(84, 26, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(85, 26, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(86, 26, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(87, 26, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(88, 26, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(89, 26, 1, 0, '151.00000', '0.20000', '2.79270', '-2.59270', '0.00051', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-20 10:16:00'),
(90, 29, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-21 05:53:56'),
(91, 29, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-21 05:53:56'),
(92, 29, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-21 05:53:56'),
(93, 29, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-21 05:53:56'),
(94, 29, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-03-21 05:53:56'),
(95, 30, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(96, 30, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(97, 30, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(98, 30, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(99, 30, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(100, 30, 1, 0, '151.00000', '0.20000', '2.79270', '-2.77270', '0.00051', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 09:54:32'),
(101, 31, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:11:29'),
(102, 31, 2, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:11:29'),
(103, 31, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:11:29'),
(104, 33, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(105, 33, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(106, 33, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(107, 33, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(108, 33, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(109, 33, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(110, 33, 2, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(111, 33, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(112, 33, 4, 1, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(113, 33, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:20:04'),
(114, 34, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(115, 34, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(116, 34, 2, 0, '200.00000', '0.20000', '2.79270', '-2.59270', '0.00051', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(117, 34, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(118, 34, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(119, 34, 1, 1, '200.00000', '0.20000', '2.79270', '-2.59270', '0.00051', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(120, 34, 1, 1, '151.00000', '0.15100', '2.79270', '-2.64170', '0.00051', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-01 13:23:41'),
(121, 35, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:14:50'),
(122, 35, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:14:50'),
(123, 35, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:14:50'),
(124, 35, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:14:50'),
(125, 35, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:14:50'),
(126, 36, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(127, 36, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(128, 36, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(129, 36, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(130, 36, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(131, 36, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 05:25:57'),
(132, 37, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(133, 37, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(134, 37, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(135, 37, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(136, 37, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(137, 37, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(138, 37, 2, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(139, 37, 3, 1, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(140, 37, 4, 1, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:08:23'),
(141, 38, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(142, 38, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(143, 38, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(144, 38, 2, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(145, 38, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(146, 38, 2, 1, '200.00000', '0.20000', '2.79270', '-2.74270', '0.00051', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(147, 38, 2, 1, '152.00000', '0.15200', '2.79270', '-2.74270', '0.00052', 0, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-03 06:10:36'),
(148, 39, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(149, 39, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(150, 39, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(151, 39, 1, 1, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(152, 39, 2, 1, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(153, 39, 3, 1, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-04 08:31:50'),
(154, 40, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(155, 40, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(156, 40, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(157, 40, 1, 1, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(158, 40, 2, 1, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(159, 40, 3, 1, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-20 05:25:23'),
(160, 41, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(161, 41, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(162, 41, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(163, 41, 1, 1, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(164, 41, 2, 1, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(165, 41, 3, 1, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-24 06:05:07'),
(166, 42, 1, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(167, 42, 2, 0, '0.30000', '0.03000', '2.79270', '-2.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(168, 42, 3, 0, '0.50000', '0.05000', '2.79270', '-2.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(169, 42, 1, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(170, 42, 2, 1, '0.30000', '0.03000', '2.79270', '-2.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(171, 42, 3, 1, '0.50000', '0.05000', '2.79270', '-2.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-25 06:44:39'),
(172, 43, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(173, 43, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(174, 43, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(175, 43, 1, 1, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(176, 43, 2, 1, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(177, 43, 3, 1, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 05:23:41'),
(178, 44, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:48'),
(179, 44, 2, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:48'),
(180, 44, 3, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:48'),
(181, 44, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:48'),
(182, 44, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:48'),
(183, 44, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:49'),
(184, 44, 2, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:49'),
(185, 44, 3, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:49'),
(186, 44, 4, 1, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:49'),
(187, 44, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 07:12:49'),
(188, 44, 1, 3, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:11'),
(189, 44, 2, 3, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:11'),
(190, 44, 3, 3, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:11'),
(191, 44, 4, 3, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:11'),
(192, 44, 5, 3, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:11'),
(193, 44, 1, 3, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:57'),
(194, 44, 2, 3, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:57'),
(195, 44, 3, 3, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:57'),
(196, 44, 4, 3, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:57'),
(197, 44, 5, 3, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:18:57'),
(198, 44, 1, 3, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:19:42'),
(199, 44, 2, 3, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:19:42'),
(200, 44, 3, 3, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:19:42'),
(201, 44, 4, 3, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:19:42'),
(202, 44, 5, 3, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 10:19:42'),
(203, 45, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 11:21:54'),
(204, 46, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:38:05'),
(205, 46, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:38:05'),
(206, 46, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:38:05'),
(207, 47, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(208, 47, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(209, 47, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(210, 47, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(211, 47, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(212, 47, 1, 0, '151.00000', '0.15600', '2.79270', '-2.63670', '0.00051', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:40:00'),
(213, 48, 1, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(214, 48, 2, 0, '0.30000', '0.03000', '2.79270', '-2.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(215, 48, 3, 0, '0.50000', '0.05000', '2.79270', '-2.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(216, 48, 1, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(217, 48, 2, 1, '0.30000', '0.03000', '2.79270', '-2.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(218, 48, 3, 1, '0.50000', '0.05000', '2.79270', '-2.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:45:16'),
(219, 48, 1, 3, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:46:49'),
(220, 48, 2, 3, '0.30000', '0.03000', '2.79270', '-2.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:46:49'),
(221, 48, 3, 3, '0.50000', '0.05000', '2.79270', '-2.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-27 12:46:49'),
(222, 49, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(223, 49, 2, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(224, 49, 3, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(225, 49, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(226, 49, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(227, 49, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(228, 49, 2, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(229, 49, 3, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(230, 49, 4, 1, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(231, 49, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-28 10:28:29'),
(232, 50, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:42:45'),
(233, 50, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:42:45'),
(234, 50, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:42:45'),
(235, 51, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(236, 51, 2, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(237, 51, 3, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(238, 51, 4, 0, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(239, 51, 5, 0, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(240, 51, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(241, 51, 2, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(242, 51, 3, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(243, 51, 4, 1, '100.00000', '100.00000', '2.79270', '97.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(244, 51, 5, 1, '200.00000', '200.00000', '2.79270', '197.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-29 06:44:09'),
(245, 52, 1, 0, '10.00000', '10.00006', '2.79270', '7.20736', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 05:46:36'),
(246, 52, 2, 0, '20.00000', '20.00007', '2.79270', '17.20737', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 05:46:36'),
(247, 52, 1, 1, '10.00000', '10.00006', '2.79270', '7.20736', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 05:46:36'),
(248, 52, 2, 1, '20.00000', '20.00007', '2.79270', '17.20737', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 05:46:36'),
(249, 53, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(250, 53, 2, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(251, 53, 3, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(252, 53, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(253, 53, 2, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(254, 53, 3, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:13:48'),
(255, 53, 1, 3, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:28:25'),
(256, 53, 2, 3, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:28:25'),
(257, 53, 3, 3, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 07:28:25'),
(258, 54, 1, 0, '20.00000', '20.00067', '4.79130', '15.20937', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-04-30 09:28:07'),
(259, 54, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 09:28:07'),
(260, 54, 3, 0, '50.00000', '50.00009', '4.79130', '45.20879', '0.05000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-04-30 09:28:07'),
(261, 55, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 09:30:02'),
(262, 55, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 09:30:02'),
(263, 55, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-04-30 09:30:02'),
(264, 56, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 05:03:50'),
(265, 56, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 05:03:50'),
(266, 56, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 05:03:50'),
(267, 57, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 13:44:40'),
(268, 57, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 13:44:40'),
(269, 57, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-02 13:44:40'),
(270, 58, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 06:24:45'),
(271, 58, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 06:24:45'),
(272, 58, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 06:24:45'),
(295, 62, 1, 0, '20.00000', '20.00067', '2.79270', '17.20797', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:46:07'),
(296, 62, 2, 0, '10.00000', '10.00060', '2.79270', '7.20790', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:46:07'),
(297, 62, 3, 0, '50.00000', '50.00009', '2.79270', '47.20739', '0.05000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:46:07'),
(298, 63, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(299, 63, 2, 0, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(300, 63, 3, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(301, 63, 1, 1, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(302, 63, 2, 1, '0.20000', '0.02000', '2.79270', '-2.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(303, 63, 3, 1, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:48:52'),
(304, 64, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:56:22'),
(305, 64, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:56:22'),
(306, 64, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 09:56:22'),
(307, 65, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 11:19:59'),
(308, 65, 2, 0, '0.05000', '0.05000', '2.79270', '-2.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 11:19:59'),
(309, 65, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 11:19:59'),
(310, 66, 1, 0, '0.02000', '0.02000', '2.79270', '-2.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 13:22:55'),
(311, 66, 2, 0, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-04 13:22:55'),
(312, 66, 3, 0, '0.01000', '0.01000', '2.79270', '-2.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-04 13:22:55'),
(313, 66, 1, 1, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-04 13:22:55'),
(314, 66, 2, 1, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-04 13:22:55'),
(315, 66, 3, 1, '0.01000', '0.01000', '4.79130', '-4.78130', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-04 13:22:55'),
(316, 67, 1, 0, '20.00000', '20.00067', '4.79130', '15.20937', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:39:44'),
(317, 67, 2, 0, '10.00000', '10.00060', '4.79130', '5.20930', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:39:44'),
(318, 67, 3, 0, '50.00000', '50.00009', '4.79130', '45.20879', '0.05000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:39:44'),
(319, 68, 1, 0, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(320, 68, 2, 0, '0.20000', '0.02000', '4.79130', '-4.77130', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(321, 68, 3, 0, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(322, 68, 4, 0, '100.00000', '100.00000', '4.79130', '95.20870', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(323, 68, 5, 0, '200.00000', '200.00000', '4.79130', '195.20870', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(324, 68, 1, 1, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(325, 68, 2, 1, '0.20000', '0.02000', '4.79130', '-4.77130', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(326, 68, 3, 1, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(327, 68, 4, 1, '100.00000', '100.00000', '4.79130', '95.20870', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(328, 68, 5, 1, '200.00000', '200.00000', '4.79130', '195.20870', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:44:40'),
(329, 68, 1, 3, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:54:13');
INSERT INTO `calibrationline` (`RecId`, `RefRecId`, `LineId`, `Type`, `StWeight`, `CertWeight`, `DispWeight`, `DiffWeight`, `AccpWeight`, `Result`, `Tfile`, `Ifile`, `CreatedBy`, `CreatedDate`) VALUES
(330, 68, 2, 3, '0.20000', '0.02000', '1.79270', '-1.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-07 09:54:13'),
(331, 68, 3, 3, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:54:13'),
(332, 68, 4, 3, '100.00000', '100.00000', '4.79130', '95.20870', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:54:13'),
(333, 68, 5, 3, '200.00000', '200.00000', '4.79130', '195.20870', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:54:13'),
(334, 69, 1, 0, '0.02000', '0.02000', '1.79270', '-1.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(335, 69, 2, 0, '0.20000', '0.02000', '1.79270', '-1.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(336, 69, 3, 0, '0.05000', '0.05000', '1.79270', '-1.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(337, 69, 4, 0, '100.00000', '100.00000', '1.79270', '98.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(338, 69, 5, 0, '200.00000', '200.00000', '1.79270', '198.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(339, 69, 1, 1, '0.02000', '0.02000', '1.79270', '-1.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(340, 69, 2, 1, '0.20000', '0.02000', '1.79270', '-1.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(341, 69, 3, 1, '0.05000', '0.05000', '1.79270', '-1.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(342, 69, 4, 1, '100.00000', '100.00000', '1.79270', '98.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(343, 69, 5, 1, '200.00000', '200.00000', '1.79270', '198.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:54:34'),
(344, 70, 1, 0, '10.00000', '10.00006', '1.79270', '8.20736', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:07'),
(345, 70, 2, 0, '20.00000', '20.00007', '1.79270', '18.20737', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:07'),
(346, 70, 1, 1, '10.00000', '10.00006', '1.79270', '8.20736', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:07'),
(347, 70, 2, 1, '20.00000', '20.00007', '1.79270', '18.20737', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:07'),
(348, 70, 1, 3, '10.00000', '10.00006', '1.79270', '8.20736', '0.01000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:59:49'),
(349, 70, 2, 3, '20.00000', '20.00007', '1.79270', '18.20737', '0.02000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:59:49'),
(350, 71, 1, 0, '0.02000', '0.02000', '1.79270', '-1.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(351, 71, 2, 0, '0.20000', '0.02000', '1.79270', '-1.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(352, 71, 3, 0, '0.05000', '0.05000', '1.79270', '-1.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(353, 71, 4, 0, '100.00000', '100.00000', '1.79270', '98.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(354, 71, 5, 0, '200.00000', '200.00000', '1.79270', '198.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(355, 71, 1, 1, '0.02000', '0.02000', '1.79270', '-1.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(356, 71, 2, 1, '0.20000', '0.02000', '1.79270', '-1.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(357, 71, 3, 1, '0.05000', '0.05000', '1.79270', '-1.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(358, 71, 4, 1, '100.00000', '100.00000', '1.79270', '98.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(359, 71, 5, 1, '200.00000', '200.00000', '1.79270', '198.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:46:53'),
(360, 72, 1, 0, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(361, 72, 2, 0, '0.20000', '0.02000', '4.79130', '-4.77130', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(362, 72, 3, 0, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(363, 72, 1, 1, '0.02000', '0.02000', '4.79130', '-4.77130', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(364, 72, 2, 1, '0.20000', '0.02000', '4.79130', '-4.77130', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(365, 72, 3, 1, '0.05000', '0.05000', '4.79130', '-4.74130', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 18:56:00'),
(366, 73, 1, 0, '0.02000', '0.02000', '9.99994', '-9.97994', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(367, 73, 2, 0, '0.05000', '0.05000', '9.99994', '-9.94994', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(368, 73, 3, 0, '0.01000', '0.01000', '9.99994', '-9.98994', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(369, 73, 4, 0, '100.00000', '100.00000', '9.99994', '90.00006', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(370, 73, 5, 0, '200.00000', '200.00000', '9.99994', '190.00006', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(371, 73, 1, 1, '0.02000', '0.02000', '9.99994', '-9.97994', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(372, 73, 2, 1, '0.05000', '0.05000', '9.99994', '-9.94994', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(373, 73, 3, 1, '0.01000', '0.01000', '9.99994', '-9.98994', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(374, 73, 4, 1, '100.00000', '100.00000', '9.99994', '90.00006', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(375, 73, 5, 1, '200.00000', '200.00000', '9.99994', '190.00006', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:26:07'),
(376, 74, 1, 0, '10.00000', '10.00006', '4.99995', '5.00011', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:47:18'),
(377, 74, 2, 0, '20.00000', '20.00007', '4.99995', '15.00012', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:47:18'),
(378, 74, 1, 1, '10.00000', '10.00006', '4.99995', '5.00011', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:47:18'),
(379, 74, 2, 1, '20.00000', '20.00007', '4.99995', '15.00012', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:47:18'),
(380, 76, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(381, 76, 2, 0, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(382, 76, 3, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(383, 76, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(384, 76, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(385, 76, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(386, 76, 2, 1, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(387, 76, 3, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(388, 76, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(389, 76, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:31:49'),
(390, 77, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(391, 77, 2, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(392, 77, 3, 0, '0.01000', '0.01000', '4.99991', '-4.98991', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(393, 77, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(394, 77, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(395, 77, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(396, 77, 2, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(397, 77, 3, 1, '0.01000', '0.01000', '4.99991', '-4.98991', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(398, 77, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(399, 77, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:10'),
(400, 77, 1, 3, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:34:10'),
(401, 77, 2, 3, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:34:10'),
(402, 77, 3, 3, '0.01000', '0.01000', '4.99991', '-4.98991', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:34:10'),
(403, 77, 4, 3, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:34:10'),
(404, 77, 5, 3, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:34:10'),
(405, 78, 1, 0, '10.00000', '10.00006', '4.99991', '5.00015', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:14:54'),
(406, 78, 2, 0, '20.00000', '20.00007', '4.99991', '15.00016', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:14:54'),
(407, 78, 1, 1, '10.00000', '10.00006', '4.99991', '5.00015', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:14:54'),
(408, 78, 2, 1, '20.00000', '20.00007', '4.99991', '15.00016', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:14:54'),
(409, 79, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(410, 79, 2, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(411, 79, 3, 0, '0.01000', '0.01000', '4.99991', '-4.98991', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(412, 79, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(413, 79, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(414, 79, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(415, 79, 2, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(416, 79, 3, 1, '0.01000', '0.01000', '4.99991', '-4.98991', '0.00010', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(417, 79, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(418, 79, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 06:27:12'),
(419, 80, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(420, 80, 2, 0, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(421, 80, 3, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(422, 80, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(423, 80, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(424, 80, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(425, 80, 2, 1, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(426, 80, 3, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(427, 80, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(428, 80, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:28'),
(429, 80, 1, 3, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:42'),
(430, 80, 2, 3, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:42'),
(431, 80, 3, 3, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:42'),
(432, 80, 4, 3, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:42'),
(433, 81, 1, 0, '20.00000', '20.00067', '4.99991', '15.00076', '0.02000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 05:49:11'),
(434, 81, 2, 0, '10.00000', '10.00060', '4.99991', '5.00069', '0.01000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 05:49:11'),
(435, 81, 3, 0, '50.00000', '50.00009', '4.99991', '45.00018', '0.05000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 05:49:11'),
(436, 82, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(437, 82, 2, 0, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(438, 82, 3, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(439, 82, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(440, 82, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(441, 82, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(442, 82, 2, 1, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(443, 82, 3, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(444, 82, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(445, 82, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:17:34'),
(446, 83, 1, 0, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(447, 83, 2, 0, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(448, 83, 3, 0, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(449, 83, 4, 0, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(450, 83, 5, 0, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(451, 83, 1, 1, '0.02000', '0.02000', '4.99991', '-4.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(452, 83, 2, 1, '0.20000', '0.02000', '4.99991', '-4.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(453, 83, 3, 1, '0.05000', '0.05000', '4.99991', '-4.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(454, 83, 4, 1, '100.00000', '100.00000', '4.99991', '95.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(455, 83, 5, 1, '200.00000', '200.00000', '4.99991', '195.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:15:00'),
(456, 83, 1, 3, '0.02000', '0.02000', '3.99991', '-3.97991', '0.00002', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 08:34:55'),
(457, 83, 2, 3, '0.20000', '0.02000', '3.99991', '-3.97991', '0.00020', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 08:34:55'),
(458, 83, 3, 3, '0.05000', '0.05000', '3.99991', '-3.94991', '0.00005', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 08:34:55'),
(459, 83, 4, 3, '100.00000', '100.00000', '3.99991', '96.00009', '0.10000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 08:34:55'),
(460, 83, 5, 3, '200.00000', '200.00000', '3.99991', '196.00009', '0.20000', 2, '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 08:34:55'),
(461, 86, 1, 0, '0.02000', '0.02000', '0.79270', '-0.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:07:53'),
(462, 86, 2, 0, '0.05000', '0.05000', '0.79270', '-0.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:07:53'),
(463, 86, 3, 0, '0.01000', '0.01000', '0.79270', '-0.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:07:53'),
(464, 86, 4, 0, '100.00000', '100.00000', '0.79270', '99.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:07:53'),
(465, 86, 5, 0, '200.00000', '200.00000', '0.79270', '199.20730', '0.20000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:07:53'),
(466, 87, 1, 0, '0.20000', '0.02000', '0.79270', '-0.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(467, 87, 2, 0, '0.30000', '0.03000', '0.79270', '-0.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(468, 87, 3, 0, '0.50000', '0.05000', '0.79270', '-0.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(469, 87, 1, 1, '0.20000', '0.02000', '0.79270', '-0.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(470, 87, 2, 1, '0.30000', '0.03000', '0.79270', '-0.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(471, 87, 3, 1, '0.50000', '0.05000', '0.79270', '-0.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:12:21'),
(472, 87, 1, 3, '0.20000', '0.02000', '0.79270', '-0.77270', '0.00020', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:16:36'),
(473, 87, 2, 3, '0.30000', '0.03000', '0.79270', '-0.76270', '0.00030', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:16:36'),
(474, 87, 3, 3, '0.50000', '0.05000', '0.79270', '-0.74270', '0.00050', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:16:36'),
(475, 89, 1, 0, '1.00000', '1.00000', '0.79270', '0.20730', '1.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 11:58:13'),
(476, 89, 2, 0, '1.00000', '1.00000', '0.79270', '0.20730', '1.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 11:58:13'),
(477, 89, 3, 0, '1.00000', '1.00000', '0.79270', '0.20730', '1.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 11:58:13'),
(478, 89, 4, 0, '1.00000', '1.00000', '0.79270', '0.20730', '1.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 11:58:13'),
(479, 90, 1, 0, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(480, 90, 2, 0, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(481, 90, 3, 0, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(482, 90, 4, 0, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(483, 90, 1, 1, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(484, 90, 2, 1, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(485, 90, 3, 1, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(486, 90, 4, 1, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:01:08'),
(487, 90, 1, 3, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:05:39'),
(488, 90, 2, 3, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:05:39'),
(489, 90, 3, 3, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:05:39'),
(490, 90, 4, 3, '2.00000', '2.00000', '0.79270', '1.20730', '2.00000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:05:39'),
(491, 93, 1, 0, '0.02000', '0.02000', '0.79270', '-0.77270', '0.00002', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:49:43'),
(492, 93, 2, 0, '0.05000', '0.05000', '0.79270', '-0.74270', '0.00005', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:49:43'),
(493, 93, 3, 0, '0.01000', '0.01000', '0.79270', '-0.78270', '0.00010', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:49:43'),
(494, 93, 4, 0, '100.00000', '100.00000', '0.79270', '99.20730', '0.10000', 2, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:49:43'),
(495, 94, 1, 0, '1.50000', '1.60000', '0.79270', '0.80730', '1.70000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:58:44'),
(496, 94, 2, 0, '2.50000', '2.60000', '0.79270', '1.80730', '2.70000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:58:44'),
(497, 94, 3, 0, '3.50000', '3.60000', '0.79270', '2.80730', '3.70000', 1, '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-01 12:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationlineobsmass`
--

CREATE TABLE `calibrationlineobsmass` (
  `RecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `ObsMass` decimal(28,5) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calibrationlineobsmass`
--

INSERT INTO `calibrationlineobsmass` (`RecId`, `RefRecId`, `LineId`, `Type`, `StWeight`, `ObsMass`, `Tfile`, `Ifile`, `CreatedBy`, `CreatedDate`) VALUES
(1, 41, 1, 0, '9.99994', '8.00000', '', '', 'analysis', '2020-04-24 11:07:24'),
(2, 41, 2, 0, '9.99997', '2.00000', '', '', 'analysis', '2020-04-24 11:07:24'),
(3, 41, 3, 0, '9.99996', '3.00000', '', '', 'analysis', '2020-04-24 11:07:24'),
(4, 42, 1, 0, '0.20000', '10.00000', '', '', 'analysis', '2020-04-25 06:45:48'),
(5, 42, 2, 0, '0.50000', '2.00000', '', '', 'analysis', '2020-04-25 06:45:48'),
(6, 42, 3, 0, '0.80000', '2.00000', '', '', 'analysis', '2020-04-25 06:45:48'),
(7, 44, 1, 0, '0.20000', '5.00000', '', '', 'analysis', '2020-04-27 08:41:25'),
(8, 44, 2, 0, '0.30000', '2.00000', '', '', 'analysis', '2020-04-27 08:41:25'),
(9, 44, 3, 0, '0.40000', '3.00000', '', '', 'analysis', '2020-04-27 08:41:25'),
(10, 49, 1, 0, '0.20000', '2.79270', '', '', 'analysis', '2020-04-28 13:28:31'),
(11, 49, 2, 0, '0.30000', '2.79270', '', '', 'analysis', '2020-04-28 13:28:31'),
(12, 49, 3, 0, '0.40000', '2.79270', '', '', 'analysis', '2020-04-28 13:28:31'),
(13, 51, 1, 0, '0.20000', '2.79270', '', '', 'analysis', '2020-04-29 06:44:48'),
(14, 51, 2, 0, '0.30000', '2.79270', '', '', 'analysis', '2020-04-29 06:44:48'),
(15, 51, 3, 0, '0.40000', '2.79270', '', '', 'analysis', '2020-04-29 06:44:48'),
(16, 52, 1, 0, '9.99994', '2.79270', '', '', 'analysis', '2020-04-30 05:47:25'),
(17, 52, 2, 0, '9.99993', '2.79270', '', '', 'analysis', '2020-04-30 05:47:25'),
(18, 52, 3, 0, '9.99994', '2.79270', '', '', 'analysis', '2020-04-30 05:47:25'),
(19, 53, 1, 0, '0.20000', '2.79270', '', '', 'analysis', '2020-04-30 07:14:27'),
(20, 53, 2, 0, '0.30000', '2.79270', '', '', 'analysis', '2020-04-30 07:14:27'),
(21, 53, 3, 0, '0.40000', '2.79270', '', '', 'analysis', '2020-04-30 07:14:27'),
(34, 68, 1, 0, '0.20000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-07 10:29:22'),
(35, 68, 2, 0, '0.30000', '4.79130', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 10:29:22'),
(36, 68, 3, 0, '0.40000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-07 10:29:22'),
(40, 69, 1, 0, '0.20000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:55:04'),
(41, 69, 2, 0, '0.30000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:55:04'),
(42, 69, 3, 0, '0.40000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:55:04'),
(43, 70, 1, 0, '9.99994', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:39'),
(44, 70, 2, 0, '9.99993', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:39'),
(45, 70, 3, 0, '9.99994', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:58:39'),
(46, 71, 1, 0, '0.20000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:25'),
(47, 71, 2, 0, '0.30000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:25'),
(48, 71, 3, 0, '0.40000', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:25'),
(49, 72, 1, 0, '9.99994', '9.99993', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(50, 72, 2, 0, '9.99994', '9.99993', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(51, 72, 3, 0, '9.99993', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(52, 72, 4, 0, '9.99994', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(53, 72, 5, 0, '9.99994', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(54, 72, 6, 0, '9.99993', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(55, 72, 7, 0, '9.99994', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(56, 72, 8, 0, '9.99994', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(57, 72, 9, 0, '9.99994', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(58, 72, 10, 0, '9.99993', '9.99994', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-15 20:04:33'),
(59, 73, 1, 0, '10.00000', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:36:06'),
(60, 73, 2, 0, '10.00000', '4.99995', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:36:06'),
(61, 73, 3, 0, '10.00000', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-16 08:36:06'),
(62, 77, 1, 0, '10.00000', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:33'),
(63, 77, 2, 0, '10.00000', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:33'),
(64, 77, 3, 0, '10.00000', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:33'),
(65, 80, 1, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:57'),
(66, 80, 2, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:57'),
(67, 80, 3, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:57'),
(68, 80, 4, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:57'),
(69, 80, 5, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:36:57'),
(70, 82, 1, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(71, 82, 2, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(72, 82, 3, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(73, 82, 4, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(74, 82, 5, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(75, 82, 6, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(76, 82, 7, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(77, 82, 8, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(78, 82, 9, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(79, 82, 10, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:14'),
(80, 83, 1, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(81, 83, 2, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(82, 83, 3, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(83, 83, 4, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(84, 83, 5, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(85, 83, 6, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(86, 83, 7, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(87, 83, 8, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(88, 83, 9, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(89, 83, 10, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:16:02'),
(90, 83, 1, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(91, 83, 2, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(92, 83, 3, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(93, 83, 4, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(94, 83, 5, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(95, 83, 6, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(96, 83, 7, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(97, 83, 8, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(98, 83, 9, 0, '9.99994', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(99, 83, 10, 0, '9.99993', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(100, 84, 1, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-25 09:49:38'),
(101, 84, 2, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(102, 84, 3, 0, '9.99993', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(103, 84, 4, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(104, 84, 5, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(105, 84, 6, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-25 09:49:38'),
(106, 84, 7, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(107, 84, 8, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(108, 84, 9, 0, '9.99994', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(109, 84, 10, 0, '9.99993', '3.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-25 09:49:38'),
(110, 87, 1, 0, '0.20000', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:14:29'),
(111, 87, 2, 0, '0.50000', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:14:29'),
(112, 88, 1, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(113, 88, 3, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(114, 88, 4, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(115, 88, 5, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(116, 88, 6, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(117, 88, 7, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(118, 88, 8, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(119, 88, 9, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(120, 88, 10, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:18:11'),
(121, 90, 1, 0, '0.25000', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:02:51'),
(122, 91, 1, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(123, 91, 2, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(124, 91, 3, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(125, 91, 4, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(126, 91, 5, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(127, 91, 6, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(128, 91, 7, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(129, 91, 8, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(130, 91, 9, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(131, 91, 10, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:08:02'),
(132, 92, 1, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(133, 92, 2, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(134, 92, 3, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(135, 92, 4, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(136, 92, 5, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(137, 92, 6, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(138, 92, 7, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(139, 92, 8, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(140, 92, 9, 0, '9.99994', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(141, 92, 10, 0, '9.99993', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-27 11:45:23'),
(142, 95, 1, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(143, 95, 2, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(144, 95, 3, 0, '9.99993', '9.99993', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(145, 95, 4, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(146, 95, 5, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(147, 95, 6, 0, '9.99993', '9.99993', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(148, 95, 7, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(149, 95, 8, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(150, 95, 9, 0, '9.99994', '9.99994', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51'),
(151, 95, 10, 0, '9.99993', '9.99993', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-06-06 20:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationposition`
--

CREATE TABLE `calibrationposition` (
  `RecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `PositionWeight` varchar(250) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `ActualMass` decimal(28,5) NOT NULL,
  `ObsMass` decimal(28,5) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calibrationposition`
--

INSERT INTO `calibrationposition` (`RecId`, `RefRecId`, `LineId`, `Type`, `PositionWeight`, `StWeight`, `ActualMass`, `ObsMass`, `Tfile`, `Ifile`, `CreatedBy`, `CreatedDate`) VALUES
(1, 42, 1, 0, '0.3000', '0.03000', '0.00300', '0.00030', '', '', 'analysis', '2020-04-25 07:37:10'),
(2, 42, 2, 0, '0.5000', '0.05000', '0.00500', '0.00050', '', '', 'analysis', '2020-04-25 07:37:10'),
(3, 42, 3, 0, '0.11000', '0.01100', '0.00110', '0.00011', '', '', 'analysis', '2020-04-25 07:37:10'),
(4, 42, 4, 0, '0.9000', '0.09000', '0.00900', '0.00090', '', '', 'analysis', '2020-04-25 07:37:10'),
(17, 53, 1, 0, '0.11000', '0.00000', '2.79270', '2.79270', '', '', 'analysis', '2020-04-30 07:27:35'),
(18, 53, 2, 0, '0.3000', '0.00000', '2.79270', '2.79270', '', '', 'analysis', '2020-04-30 07:27:35'),
(19, 53, 3, 0, '0.11000', '0.00000', '2.79270', '2.79270', '', '', 'analysis', '2020-04-30 07:27:35'),
(26, 68, 1, 0, '0.11000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-07 09:46:12'),
(27, 68, 2, 0, '0.3000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-07 09:46:12'),
(28, 68, 3, 0, '0.11000', '0.00000', '4.79130', '4.79130', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-07 09:46:12'),
(29, 69, 1, 0, '0.11000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:56:02'),
(30, 69, 2, 0, '0.3000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:56:02'),
(31, 69, 3, 0, '0.11000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:56:02'),
(32, 70, 1, 0, 'Center', '100.00015', '1.79270', '-98.20745', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:59:23'),
(33, 70, 2, 0, 'Place At \"1\"', '100.00015', '1.79270', '-98.20745', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:59:23'),
(34, 70, 3, 0, 'Place At \"2\"', '100.00015', '1.79270', '-98.20745', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-11 04:59:23'),
(35, 71, 1, 0, '0.11000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:41'),
(36, 71, 2, 0, '0.3000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:41'),
(37, 71, 3, 0, '0.11000', '0.00000', '1.79270', '1.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-14 07:47:41'),
(38, 77, 1, 0, '9.999994', '9.36555', '4.99991', '-4.36564', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 05:33:48'),
(39, 80, 1, 0, '0.11000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:04'),
(40, 80, 2, 0, '0.3000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:04'),
(41, 80, 3, 0, '0.11000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-19 09:37:04'),
(42, 82, 1, 0, '0.11000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:36'),
(43, 82, 2, 0, '0.3000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:36'),
(44, 82, 3, 0, '0.11000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-20 06:46:36'),
(45, 83, 1, 0, '0.11000', '0.00000', '2.99991', '2.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:19:15'),
(46, 83, 2, 0, '0.3000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:19:15'),
(47, 83, 3, 0, '0.11000', '0.00000', '4.99991', '4.99991', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:19:15'),
(48, 87, 1, 0, '0.3000', '0.00000', '0.79270', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:15:25'),
(49, 87, 2, 0, '0.5000', '0.00000', '0.79270', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:15:25'),
(50, 87, 3, 0, '0.11000', '0.00000', '0.79270', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:15:25'),
(51, 87, 4, 0, '0.9000', '0.00000', '0.79270', '0.79270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:15:25'),
(52, 90, 1, 0, '0.35', '0.15000', '0.79270', '0.64270', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `calibrationreq`
--

CREATE TABLE `calibrationreq` (
  `RecId` bigint(20) NOT NULL,
  `CalibrationId` bigint(20) NOT NULL,
  `InstrumentId` bigint(20) NOT NULL,
  `DeviceId` bigint(20) NOT NULL,
  `CalibrationDate` datetime NOT NULL,
  `ReqStatus` int(11) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(70) NOT NULL,
  `ResponseBy` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calibrationreq`
--

INSERT INTO `calibrationreq` (`RecId`, `CalibrationId`, `InstrumentId`, `DeviceId`, `CalibrationDate`, `ReqStatus`, `CreatedDate`, `CreatedBy`, `ResponseBy`) VALUES
(1, 1, 1, 1, '2020-05-04 00:00:00', 20, '2020-05-04 13:16:52', 'analysis', 'admin'),
(2, 2, 1, 1, '2020-05-19 00:00:00', 20, '2020-05-19 09:26:41', 'analysis', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `RecId` bigint(20) NOT NULL,
  `Data` varchar(500) NOT NULL,
  `DisplayValue` varchar(250) NOT NULL,
  `RealValue` decimal(28,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`RecId`, `Data`, `DisplayValue`, `RealValue`) VALUES
(1, 'Acceptance Criteria', 'NMT 0.10%', '0.10'),
(2, 'Acceptance Criteria: difference should not be more then', '0.05g', '0.05');

-- --------------------------------------------------------

--
-- Table structure for table `devicemaster`
--

CREATE TABLE `devicemaster` (
  `RecId` bigint(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `InstrumentId` bigint(100) NOT NULL,
  `Make` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `SearialNo` varchar(100) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `DirPath` varchar(250) NOT NULL,
  `DeviceType` bigint(20) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devicemaster`
--

INSERT INTO `devicemaster` (`RecId`, `Name`, `InstrumentId`, `Make`, `Model`, `SearialNo`, `IsActive`, `DirPath`, `DeviceType`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Device1', 1, 'HP', 'Model1', '123456789', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'admin', '2020-02-20 12:27:04'),
(2, 'Device2', 1, 'HP', 'Model2', '123456789', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'admin', '2020-02-20 12:27:04'),
(3, 'Device3', 1, 'Dell', 'Model3', '64565655', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'admin', '2020-02-20 12:28:12'),
(4, 'Device4', 2, 'Dell', 'Model100', '64564654', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'admin', '2020-02-20 12:28:12'),
(5, 'Test Device 1', 4, 'Test Make', 'Test Model', 'SEARIAL-ABCD-123456', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'tesla', '2020-03-04 00:55:33'),
(6, 'Test Device 2', 3, 'Test Make', 'Test Model', 'ABCD1234', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'tesla', '2020-03-18 10:52:17'),
(7, 'Test Device 3', 3, 'test', 'test', 'ABCD12345678', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'tesla', '2020-03-18 10:53:41'),
(8, 'Test Device 4', 3, 'test', 'test', 'ABCD12345678', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'tesla', '2020-03-18 10:54:28'),
(9, 'fsdf', 3, 'sdfsfsdfsfs', 'sdfsdffs', 'fsdfsfsdfsf', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'tesla', '2020-03-18 10:55:21'),
(10, 'test18320', 1, 'test', 'test', 'gfsdgdsgfsd', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'admin', '2020-03-18 12:37:16'),
(11, 'Device260520', 1, '260520', '260520', 'Device260520', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'admin', '2020-05-26 11:53:35'),
(12, 'Test Device', 5, 'test-12250', 'test-12250', 'test-12250', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 1, 'admin', '2020-05-29 15:21:25'),
(13, 'Test Device 1', 5, 'test-1251', 'test-1251', 'test-1251', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'admin', '2020-05-29 15:21:56'),
(14, 'Test MG Device', 2, 'Test MG', 'Test MG', 'Test MG', 1, 'E:\\xampp\\htdocs\\Calibration\\public\\Doc', 2, 'admin', '2020-06-01 12:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `devicepositionweight`
--

CREATE TABLE `devicepositionweight` (
  `RecId` bigint(20) NOT NULL,
  `DeviceId` bigint(20) NOT NULL,
  `InstrumentId` bigint(20) NOT NULL,
  `CalibrationTypeId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `PositionWeight` varchar(250) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devicepositionweight`
--

INSERT INTO `devicepositionweight` (`RecId`, `DeviceId`, `InstrumentId`, `CalibrationTypeId`, `LineId`, `PositionWeight`, `StWeight`, `Type`, `CreatedBy`, `CreatedDate`) VALUES
(18, 5, 4, 2, 1, '0.3000', '0.00000', 0, 'admin', '2020-04-25 05:09:43'),
(19, 5, 4, 2, 2, '0.5000', '0.00000', 0, 'admin', '2020-04-25 05:09:43'),
(20, 5, 4, 2, 3, '0.11000', '0.00000', 0, 'admin', '2020-04-25 05:09:43'),
(21, 5, 4, 2, 4, '0.9000', '0.00000', 0, 'admin', '2020-04-25 05:09:43'),
(32, 1, 1, 2, 1, '0.11000', '0.00000', 0, 'admin', '2020-05-15 19:57:33'),
(33, 1, 1, 2, 2, '0.3000', '0.00000', 0, 'admin', '2020-05-15 19:57:33'),
(34, 1, 1, 2, 3, '0.11000', '0.00000', 0, 'admin', '2020-05-15 19:57:33'),
(35, 2, 1, 2, 1, '9.999994', '9.36555', 0, 'admin', '2020-05-16 08:28:12'),
(37, 11, 1, 2, 1, '1', '1.00000', 0, 'admin', '2020-05-26 12:41:48'),
(38, 7, 3, 2, 1, 'Center', '100.00015', 0, 'admin', '2020-06-06 20:11:19'),
(39, 7, 3, 2, 2, 'Place At \"1\"', '100.00015', 0, 'admin', '2020-06-06 20:11:19'),
(40, 7, 3, 2, 3, 'Place At \"2\"', '100.00015', 0, 'admin', '2020-06-06 20:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `deviceweight`
--

CREATE TABLE `deviceweight` (
  `RecId` bigint(20) NOT NULL,
  `DeviceId` bigint(20) NOT NULL,
  `InstrumentId` int(100) NOT NULL,
  `CalibrationTypeId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `CertWeight` decimal(28,5) NOT NULL,
  `AccpWeight` decimal(28,5) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deviceweight`
--

INSERT INTO `deviceweight` (`RecId`, `DeviceId`, `InstrumentId`, `CalibrationTypeId`, `LineId`, `Type`, `StWeight`, `CertWeight`, `AccpWeight`, `CreatedBy`, `CreatedDate`) VALUES
(6, 2, 1, 1, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-02-20 12:33:23'),
(7, 2, 1, 1, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-02-20 12:33:23'),
(8, 2, 1, 1, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-02-20 12:33:23'),
(9, 2, 1, 1, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-02-20 12:33:23'),
(10, 2, 1, 1, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-02-20 12:33:23'),
(11, 3, 1, 1, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-02-20 12:33:23'),
(12, 3, 1, 1, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-02-20 12:33:23'),
(13, 3, 1, 1, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-02-20 12:33:23'),
(14, 3, 1, 1, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-02-20 12:33:23'),
(15, 3, 1, 1, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-02-20 12:33:23'),
(16, 4, 2, 1, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-02-20 12:33:23'),
(17, 4, 2, 1, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-02-20 12:33:23'),
(18, 4, 2, 1, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-02-20 12:33:23'),
(19, 4, 2, 1, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-02-20 12:33:23'),
(20, 4, 2, 1, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-02-20 12:33:23'),
(31, 3, 1, 2, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-02-20 12:33:23'),
(32, 3, 1, 2, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-02-20 12:33:23'),
(33, 3, 1, 2, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-02-20 12:33:23'),
(34, 3, 1, 2, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-02-20 12:33:23'),
(35, 3, 1, 2, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-02-20 12:33:23'),
(36, 4, 2, 2, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-02-20 12:33:23'),
(37, 4, 2, 2, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-02-20 12:33:23'),
(38, 4, 2, 2, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-02-20 12:33:23'),
(39, 4, 2, 2, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-02-20 12:33:23'),
(40, 4, 2, 2, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-02-20 12:33:23'),
(42, 4, 2, 2, 1, 0, '200.00000', '0.20000', '0.00051', 'tesla', '2020-03-04 11:18:24'),
(43, 4, 2, 2, 2, 0, '200.00000', '0.20000', '0.00051', 'tesla', '2020-03-04 11:18:24'),
(63, 4, 2, 2, 1, 0, '151.00000', '0.15100', '0.00051', 'tesla', '2020-03-05 06:08:35'),
(64, 4, 2, 2, 2, 0, '152.00000', '0.15200', '0.00052', 'tesla', '2020-03-05 06:08:35'),
(65, 4, 2, 2, 3, 0, '153.00000', '0.15300', '0.00053', 'tesla', '2020-03-05 06:08:35'),
(66, 4, 2, 2, 4, 0, '154.00000', '0.15400', '0.00054', 'tesla', '2020-03-05 06:08:35'),
(67, 4, 2, 2, 5, 0, '155.00000', '0.15500', '0.00044', 'tesla', '2020-03-05 06:08:35'),
(68, 4, 2, 2, 6, 0, '156.00000', '0.15600', '0.00045', 'tesla', '2020-03-05 06:08:35'),
(72, 4, 2, 1, 1, 0, '151.00000', '0.15600', '0.00051', 'einstein', '2020-03-07 08:11:33'),
(92, 3, 1, 2, 1, 0, '10.00000', '10.00060', '0.01000', 'admin', '2020-04-04 06:44:17'),
(93, 3, 1, 2, 2, 0, '20.00000', '20.00067', '0.02000', 'admin', '2020-04-04 06:44:17'),
(112, 1, 1, 1, 1, 0, '20.00000', '20.00067', '0.02000', 'admin', '2020-04-04 07:33:36'),
(113, 1, 1, 1, 2, 0, '10.00000', '10.00060', '0.01000', 'admin', '2020-04-04 07:33:36'),
(114, 1, 1, 1, 3, 0, '50.00000', '50.00009', '0.05000', 'admin', '2020-04-04 07:33:36'),
(139, 5, 4, 2, 1, 0, '0.20000', '0.02000', '0.00020', 'admin', '2020-04-25 05:09:43'),
(140, 5, 4, 2, 2, 0, '0.30000', '0.03000', '0.00030', 'admin', '2020-04-25 05:09:43'),
(141, 5, 4, 2, 3, 0, '0.50000', '0.05000', '0.00050', 'admin', '2020-04-25 05:09:43'),
(152, 1, 1, 2, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-05-15 19:57:33'),
(153, 1, 1, 2, 2, 0, '0.20000', '0.02000', '0.00020', 'admin', '2020-05-15 19:57:33'),
(154, 1, 1, 2, 3, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-05-15 19:57:33'),
(155, 1, 1, 2, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-05-15 19:57:33'),
(156, 1, 1, 2, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-05-15 19:57:33'),
(157, 2, 1, 2, 1, 0, '0.02000', '0.02000', '0.00002', 'admin', '2020-05-16 08:28:12'),
(158, 2, 1, 2, 2, 0, '0.05000', '0.05000', '0.00005', 'admin', '2020-05-16 08:28:12'),
(159, 2, 1, 2, 3, 0, '0.01000', '0.01000', '0.00010', 'admin', '2020-05-16 08:28:12'),
(160, 2, 1, 2, 4, 0, '100.00000', '100.00000', '0.10000', 'admin', '2020-05-16 08:28:12'),
(161, 2, 1, 2, 5, 0, '200.00000', '200.00000', '0.20000', 'admin', '2020-05-16 08:28:12'),
(162, 11, 1, 1, 1, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-26 11:54:55'),
(163, 11, 1, 1, 2, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-26 11:54:55'),
(164, 11, 1, 1, 3, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-26 11:54:55'),
(165, 11, 1, 1, 4, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-26 11:54:55'),
(170, 11, 1, 2, 1, 0, '2.00000', '2.00000', '3.00000', 'admin', '2020-05-26 12:41:48'),
(171, 11, 1, 2, 2, 0, '2.00000', '2.00000', '3.00000', 'admin', '2020-05-26 12:41:48'),
(172, 11, 1, 2, 3, 0, '2.00000', '2.00000', '2.00000', 'admin', '2020-05-26 12:41:48'),
(173, 11, 1, 2, 4, 0, '2.00000', '2.00000', '2.00000', 'admin', '2020-05-26 12:41:48'),
(174, 10, 1, 1, 1, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-29 14:47:45'),
(175, 10, 1, 1, 2, 0, '1.00000', '1.00000', '1.00000', 'admin', '2020-05-29 14:47:45'),
(176, 14, 2, 1, 1, 0, '1.50000', '1.60000', '1.70000', 'admin', '2020-06-01 12:54:15'),
(177, 14, 2, 1, 2, 0, '2.50000', '2.60000', '2.70000', 'admin', '2020-06-01 12:54:15'),
(178, 14, 2, 1, 3, 0, '3.50000', '3.60000', '3.70000', 'admin', '2020-06-01 12:54:15'),
(179, 7, 3, 2, 1, 0, '10.00000', '10.00006', '0.01000', 'admin', '2020-06-06 20:11:19'),
(180, 7, 3, 2, 2, 0, '20.00000', '20.00007', '0.02000', 'admin', '2020-06-06 20:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `deviceweightobsmass`
--

CREATE TABLE `deviceweightobsmass` (
  `RecId` bigint(20) NOT NULL,
  `DeviceId` bigint(20) NOT NULL,
  `InstrumentId` bigint(20) NOT NULL,
  `CalibrationTypeId` bigint(20) NOT NULL,
  `LineId` int(11) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deviceweightobsmass`
--

INSERT INTO `deviceweightobsmass` (`RecId`, `DeviceId`, `InstrumentId`, `CalibrationTypeId`, `LineId`, `StWeight`, `Type`, `CreatedBy`, `CreatedDate`) VALUES
(16, 5, 4, 2, 1, '0.20000', 0, 'admin', '2020-04-25 05:09:43'),
(17, 5, 4, 2, 2, '0.50000', 0, 'admin', '2020-04-25 05:09:43'),
(18, 5, 4, 2, 3, '0.80000', 0, 'admin', '2020-04-25 05:09:43'),
(31, 1, 1, 2, 1, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(32, 1, 1, 2, 2, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(33, 1, 1, 2, 3, '9.99993', 0, 'admin', '2020-05-15 19:57:33'),
(34, 1, 1, 2, 4, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(35, 1, 1, 2, 5, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(36, 1, 1, 2, 6, '9.99993', 0, 'admin', '2020-05-15 19:57:33'),
(37, 1, 1, 2, 7, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(38, 1, 1, 2, 8, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(39, 1, 1, 2, 9, '9.99994', 0, 'admin', '2020-05-15 19:57:33'),
(40, 1, 1, 2, 10, '9.99993', 0, 'admin', '2020-05-15 19:57:33'),
(41, 2, 1, 2, 1, '10.00000', 0, 'admin', '2020-05-16 08:28:12'),
(42, 2, 1, 2, 2, '10.00000', 0, 'admin', '2020-05-16 08:28:12'),
(43, 2, 1, 2, 3, '10.00000', 0, 'admin', '2020-05-16 08:28:12'),
(45, 11, 1, 2, 1, '1.00000', 0, 'admin', '2020-05-26 12:41:48'),
(46, 7, 3, 2, 1, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(47, 7, 3, 2, 2, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(48, 7, 3, 2, 3, '9.99993', 0, 'admin', '2020-06-06 20:11:19'),
(49, 7, 3, 2, 4, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(50, 7, 3, 2, 5, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(51, 7, 3, 2, 6, '9.99993', 0, 'admin', '2020-06-06 20:11:19'),
(52, 7, 3, 2, 7, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(53, 7, 3, 2, 8, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(54, 7, 3, 2, 9, '9.99994', 0, 'admin', '2020-06-06 20:11:19'),
(55, 7, 3, 2, 10, '9.99993', 0, 'admin', '2020-06-06 20:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `instrumentmaster`
--

CREATE TABLE `instrumentmaster` (
  `RecId` bigint(20) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instrumentmaster`
--

INSERT INTO `instrumentmaster` (`RecId`, `Name`, `IsActive`, `CreatedBy`, `CreatedDate`) VALUES
(1, 'Instrument1', 1, 'admin', '2020-02-20 12:25:50'),
(2, 'Instrument2', 1, 'admin', '2020-02-20 12:25:50'),
(3, 'Instrument3', 1, 'tesla', '2020-03-03 07:41:35'),
(4, 'Instrument4', 1, 'tesla', '2020-03-03 23:50:22'),
(5, 'Test Instrument', 1, 'admin', '2020-05-29 15:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `monthlycalibrationdetails`
--

CREATE TABLE `monthlycalibrationdetails` (
  `RecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `AverageMass` decimal(28,5) DEFAULT NULL,
  `SD1` decimal(28,5) DEFAULT NULL,
  `SD2` decimal(28,8) DEFAULT NULL,
  `AcceptanceCriteria` varchar(200) DEFAULT NULL,
  `CompliesAcceptanceCriteria` int(11) NOT NULL,
  `DiffAcceptanceCriteria` varchar(200) DEFAULT NULL,
  `CompliesAcceptanceCriteria2` int(11) NOT NULL,
  `CompliesAcceptanceCriteria3` int(11) NOT NULL,
  `DisplayWeightA` decimal(28,5) DEFAULT NULL,
  `DisplayWeightB` decimal(28,5) DEFAULT NULL,
  `Sensitivity` varchar(200) DEFAULT NULL,
  `AcceptanceCriteriaDetail` varchar(500) DEFAULT NULL,
  `TfileA` varchar(250) DEFAULT NULL,
  `IfileA` varchar(250) DEFAULT NULL,
  `TfileB` varchar(250) DEFAULT NULL,
  `IfileB` varchar(250) DEFAULT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthlycalibrationdetails`
--

INSERT INTO `monthlycalibrationdetails` (`RecId`, `RefRecId`, `AverageMass`, `SD1`, `SD2`, `AcceptanceCriteria`, `CompliesAcceptanceCriteria`, `DiffAcceptanceCriteria`, `CompliesAcceptanceCriteria2`, `CompliesAcceptanceCriteria3`, `DisplayWeightA`, `DisplayWeightB`, `Sensitivity`, `AcceptanceCriteriaDetail`, `TfileA`, `IfileA`, `TfileB`, `IfileB`, `CreatedBy`, `CreatedDate`) VALUES
(1, 41, '1.00000', '0.04800', '1.00000000', 'NMT 10%', 1, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-04-24 11:07:24'),
(2, 42, '0.66667', '0.04800', '0.66667000', 'NMT 10%', 1, '0.05g', 1, 2, '200.50000', '250.25000', 'Fails', 'testing', '', '', '', '', 'analysis', '2020-04-25 06:45:48'),
(3, 44, '1.00000', '0.04800', '1.00000000', 'NMT 10%', 1, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', '', '', 'analysis', '2020-04-27 08:41:25'),
(4, 49, '2.79270', '0.04800', '2.79270000', 'NMT 0.10%', 1, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-04-28 13:28:31'),
(5, 51, '2.79270', '0.04800', '2.79270000', 'NMT 0.10%', 1, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-04-29 06:44:48'),
(6, 52, '2.79270', '0.04800', '2.79270000', 'NMT 0.10%', 1, '0.05g', 1, 2, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-04-30 05:47:25'),
(7, 53, '2.79270', '0.04800', '2.79270000', 'NMT 0.10%', 1, '0.05g', 2, 2, '0.20000', '0.10000', 'Fails', 'test', '', '', '', '', 'analysis', '2020-04-30 07:14:27'),
(10, 68, '1.79270', '0.04800', '1.79270000', 'NMT 0.10%', 1, '0.05g', 2, 1, '0.20001', '0.60002', 'FAIL', 'test Fail data', '', '', '', '', 'analysis', '2020-05-07 09:45:34'),
(12, 69, '1.79270', '0.04800', '1.79270000', 'NMT 0.10%', 1, '0.05g', 2, 2, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-11 04:55:04'),
(13, 70, '1.79270', '0.04800', '1.79270000', 'NMT 0.10%', 1, '0.05g', 1, 2, '0.20000', '0.60000', 'PASS', 'test', '', '', '', '', 'analysis', '2020-05-11 04:58:39'),
(14, 71, '1.79270', '0.00000', '0.00000000', 'NMT 0.10%', 1, '0.05g', 2, 2, '4.79130', '4.79130', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '', '', '', '', 'analysis', '2020-05-14 07:47:25'),
(15, 72, '9.99994', '0.04000', '0.00000000', 'NMT 0.10%', 1, '0.05g', 1, 0, '0.00000', '0.00000', NULL, NULL, '', '', '', '', 'analysis', '2020-05-15 20:04:33'),
(16, 73, '4.99992', '0.18856', '0.00002000', 'NMT 0.10%', 2, '0.05g', 1, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-16 08:36:06'),
(17, 77, '4.99991', '0.00000', '0.00000000', 'NMT 0.10%', 1, '0.05g', 1, 2, '4.99991', '4.99991', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '', '', '', '', 'analysis', '2020-05-19 05:33:33'),
(18, 80, '2.49995', '24999.55000', '2.49995000', 'NMT 0.10%', 2, '0.05g', 2, 2, '4.99991', '4.99991', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '', '', '', '', 'analysis', '2020-05-19 09:36:57'),
(19, 82, '4.99991', '0.00000', '0.00000000', 'NMT 0.10%', 2, '0.05g', 2, 2, '4.99991', '4.99991', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '637139226052210585.txt', '637139226052210585.bmp', '', '', 'analysis', '2020-05-20 06:46:14'),
(20, 83, '4.99991', '0.00000', '0.00000000', 'NMT 0.10%', 2, '0.05g', 2, 2, '3.99991', '0.00000', 'PASSES', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '637139226052210585.txt', '637139226052210585.bmp', '637139226052210585.txt', '637139226052210585.bmp', 'analysis', '2020-05-21 05:18:09'),
(21, 84, '3.35847', '12828.84000', '1.28288000', 'NMT 0.10%', 1, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-25 09:49:38'),
(22, 87, '0.79270', '0.00000', '0.00000000', 'NMT 0.10%', 2, '0.05g', 2, 2, '0.79270', '0.79270', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '637139226648446407.txt', '637139226648446407.bmp', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 05:14:29'),
(23, 88, '0.79270', '0.00000', '0.00000000', 'NMT 0.10%', 2, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-26 05:18:11'),
(24, 90, '0.79270', '0.00000', '0.00000000', 'NMT 0.10%', 2, '0.05g', 2, 2, '0.79270', '0.79270', 'FAILS', 'The weight displayed after taking out 200g weight should not be more than 0.1g.', '637139226648446407.txt', '637139226648446407.bmp', '637139226648446407.txt', '637139226648446407.bmp', 'analysis', '2020-05-26 12:04:18'),
(25, 91, '0.79270', '0.00000', '0.00000000', 'NMT 0.10%', 2, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-26 12:08:02'),
(26, 92, '0.79270', '0.00000', '0.00000000', 'NMT 0.10%', 2, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-05-27 11:45:24'),
(27, 95, '9.99994', '0.04830', '0.00000483', 'NMT 0.10%', 2, '', 0, 0, '0.00000', '0.00000', '', '', '', '', '', '', 'analysis', '2020-06-06 20:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `rolemaster`
--

CREATE TABLE `rolemaster` (
  `RecId` bigint(20) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolemaster`
--

INSERT INTO `rolemaster` (`RecId`, `Role`, `IsActive`) VALUES
(1, 'admin', 1),
(2, 'analysis', 1),
(3, 'verify', 1),
(4, 'approver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statusmaster`
--

CREATE TABLE `statusmaster` (
  `RecId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusmaster`
--

INSERT INTO `statusmaster` (`RecId`, `Name`, `IsActive`) VALUES
(10, 'New', 1),
(20, 'Verify', 1),
(25, 'Decline (Verify)', 1),
(30, 'Approve', 1),
(40, 'Decline (Approver)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userloginlog`
--

CREATE TABLE `userloginlog` (
  `RecId` bigint(20) NOT NULL,
  `UserId` varchar(70) NOT NULL,
  `LoginDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userloginlog`
--

INSERT INTO `userloginlog` (`RecId`, `UserId`, `LoginDate`, `Status`) VALUES
(1, 'admin', '2020-02-26 02:06:41', 1),
(2, 'admin', '2020-02-26 02:06:55', 0),
(3, 'admin', '2020-02-26 02:07:10', 1),
(4, 'admin', '2020-02-26 02:12:01', 1),
(5, 'analysis@gmail.com', '2020-02-26 02:12:25', 0),
(6, 'analysis', '2020-02-26 02:12:38', 1),
(7, 'admin', '2020-02-26 02:13:16', 1),
(8, 'admin', '2020-02-26 02:17:16', 1),
(9, 'analysis', '2020-02-26 03:34:02', 1),
(10, 'admin', '2020-02-26 04:47:46', 1),
(11, 'analysis', '2020-02-26 04:50:43', 1),
(12, 'Verify1', '2020-02-26 05:56:42', 1),
(13, 'analysis', '2020-02-26 06:02:12', 1),
(14, 'Verify1', '2020-02-26 06:02:30', 1),
(15, 'analysis', '2020-02-26 06:27:06', 1),
(16, 'Verify1', '2020-02-26 06:28:11', 1),
(17, 'analysis', '2020-02-26 06:33:26', 1),
(18, 'Verify1', '2020-02-26 06:33:44', 1),
(19, 'analysis', '2020-02-26 06:45:35', 1),
(20, 'Verify1', '2020-02-26 07:04:19', 1),
(21, 'Verify1', '2020-02-26 07:37:15', 1),
(22, 'approver', '2020-02-26 07:49:08', 1),
(23, 'admin', '2020-02-26 23:58:20', 1),
(24, 'analysis', '2020-02-27 00:06:21', 1),
(25, 'Verify1', '2020-02-27 00:11:48', 1),
(26, 'approver', '2020-02-27 00:32:16', 1),
(27, 'analysis', '2020-02-27 01:16:22', 1),
(28, 'analysis', '2020-02-27 01:35:42', 1),
(29, 'analysis', '2020-02-27 06:03:12', 1),
(30, 'analysis', '2020-02-27 07:49:59', 1),
(31, 'analysis', '2020-02-27 07:52:42', 1),
(32, 'analysis', '2020-02-27 23:49:14', 1),
(33, 'admin', '2020-02-28 04:50:53', 1),
(34, 'analysis', '2020-02-28 04:54:22', 1),
(35, 'admin', '2020-02-28 04:56:32', 1),
(36, 'admin', '2020-02-28 05:00:57', 1),
(37, 'analysis', '2020-02-28 05:40:37', 1),
(38, 'analysis', '2020-02-28 06:28:29', 1),
(39, 'approver', '2020-02-28 07:18:31', 1),
(40, 'approver', '2020-02-28 07:20:48', 1),
(41, 'analysis', '2020-02-28 07:32:23', 1),
(42, 'analysis', '2020-02-28 23:54:18', 1),
(43, 'admin', '2020-02-28 23:59:24', 1),
(44, 'verify', '2020-02-28 23:59:46', 1),
(45, 'verify', '2020-02-29 00:00:31', 1),
(46, 'approver', '2020-02-29 00:00:50', 1),
(47, 'approver', '2020-02-29 00:16:04', 0),
(48, 'approver1', '2020-02-29 00:16:11', 0),
(49, 'approver', '2020-02-29 00:16:17', 1),
(50, 'verify', '2020-02-29 00:33:45', 1),
(51, 'analysis', '2020-02-29 05:56:46', 1),
(52, 'verify', '2020-02-29 06:37:14', 1),
(53, 'approver', '2020-02-29 07:05:29', 1),
(54, 'analysis', '2020-03-01 23:52:29', 1),
(55, 'verify', '2020-03-02 00:02:19', 1),
(56, 'approver', '2020-03-02 00:04:54', 1),
(57, 'admin', '2020-03-02 00:50:13', 1),
(58, 'analysis', '2020-03-02 00:51:40', 1),
(59, 'analysis', '2020-03-02 01:02:11', 1),
(60, 'admin', '2020-03-02 01:04:29', 1),
(61, 'analysis', '2020-03-02 01:54:30', 1),
(62, 'ksadsad', '2020-03-02 05:49:12', 0),
(63, 'asdad', '2020-03-02 05:49:18', 0),
(64, 'verify', '2020-03-02 05:56:05', 0),
(65, 'newton', '2020-03-02 05:58:05', 0),
(66, 'newton', '2020-03-02 05:58:41', 0),
(67, 'admin', '2020-03-02 06:01:24', 0),
(68, 'newton', '2020-03-02 06:01:34', 1),
(69, 'newton', '2020-03-02 06:06:53', 1),
(70, 'tesla', '2020-03-02 06:38:40', 1),
(71, 'tesla', '2020-03-02 06:40:05', 1),
(72, 'tesla', '2020-03-02 06:40:20', 1),
(73, 'tesla', '2020-03-02 06:41:36', 0),
(74, 'tesla', '2020-03-02 06:42:49', 0),
(75, 'tesla', '2020-03-02 06:43:25', 1),
(76, 'tesla', '2020-03-02 06:43:48', 1),
(77, 'tesla', '2020-03-02 06:45:55', 1),
(78, 'tesla', '2020-03-02 06:47:45', 1),
(79, 'tesla', '2020-03-02 06:47:54', 1),
(80, 'newton', '2020-03-02 06:53:09', 1),
(81, 'newton', '2020-03-02 06:56:12', 1),
(82, 'newton', '2020-03-02 07:13:31', 1),
(83, 'euler', '2020-03-02 07:26:27', 1),
(84, 'newton', '2020-03-02 07:35:19', 1),
(85, 'tesla', '2020-03-02 23:41:39', 1),
(86, 'tesla', '2020-03-02 23:56:35', 1),
(87, 'newton', '2020-03-03 00:11:09', 1),
(88, 'tesla', '2020-03-03 00:11:40', 1),
(89, 'newton', '2020-03-03 00:14:56', 1),
(90, 'tesla', '2020-03-03 00:16:46', 1),
(91, 'newton', '2020-03-03 02:14:50', 0),
(92, 'newton', '2020-03-03 02:15:16', 0),
(93, 'newton', '2020-03-03 02:15:47', 0),
(94, 'newton', '2020-03-03 02:16:48', 0),
(95, 'adsasdada', '2020-03-03 02:16:57', 0),
(96, 'newton', '2020-03-03 02:17:11', 0),
(97, 'newton', '2020-03-03 02:17:22', 1),
(98, 'tesla', '2020-03-03 02:17:39', 0),
(99, 'tesla', '2020-03-03 02:17:53', 1),
(100, 'tesla', '2020-03-03 06:02:35', 1),
(101, 'tesla', '2020-03-03 06:15:44', 1),
(102, 'tesla', '2020-03-03 23:50:04', 1),
(103, 'tesla', '2020-03-04 01:27:25', 1),
(104, 'tesla', '2020-03-04 07:40:24', 1),
(105, 'tesla', '2020-03-04 23:50:02', 1),
(106, 'tesla', '2020-03-05 00:21:39', 1),
(107, 'newton', '2020-03-05 00:41:28', 1),
(108, 'newton', '2020-03-05 04:37:05', 1),
(109, 'newton', '2020-03-05 04:46:32', 1),
(110, 'tesla', '2020-03-05 04:47:25', 1),
(111, 'newton', '2020-03-05 04:48:28', 1),
(112, 'tesla', '2020-03-05 07:02:30', 1),
(113, 'tesla', '2020-03-05 07:02:46', 1),
(114, 'tesla', '2020-03-05 07:04:30', 1),
(115, 'tesla', '2020-03-06 00:30:14', 1),
(116, 'tesla', '2020-03-06 03:39:44', 0),
(117, 'tesla', '2020-03-06 03:40:06', 1),
(118, 'tesla', '2020-03-06 03:42:01', 1),
(119, 'tesla', '2020-03-06 03:43:11', 1),
(120, 'tesla', '2020-03-06 04:13:44', 0),
(121, 'tesla', '2020-03-06 04:13:50', 1),
(122, 'tesla', '2020-03-06 07:13:53', 1),
(123, 'tesla', '2020-03-07 00:13:06', 0),
(124, 'tesla', '2020-03-07 00:13:23', 0),
(125, 'newton', '2020-03-07 00:13:49', 0),
(126, 'tesla', '2020-03-07 00:15:23', 1),
(127, 'tesla', '2020-03-07 01:08:00', 1),
(128, 'tesla', '2020-03-07 02:32:06', 1),
(129, 'einstein', '2020-03-07 02:40:29', 1),
(130, 'tesla', '2020-03-11 01:14:08', 1),
(131, 'newton', '2020-03-11 01:42:31', 1),
(132, 'tesla', '2020-03-11 01:45:31', 1),
(133, 'tesla', '2020-03-16 02:17:34', 1),
(134, 'newton', '2020-03-16 02:18:03', 1),
(135, 'newton', '2020-03-16 02:25:15', 1),
(136, 'tesla', '2020-03-16 05:31:27', 1),
(137, 'sdfsfs', '2020-03-16 06:35:06', 0),
(138, 'sdfsf', '2020-03-16 06:35:09', 0),
(139, 'tesla', '2020-03-18 01:36:40', 1),
(140, 'tesla', '2020-03-18 01:40:39', 1),
(141, 'TestUser', '2020-03-18 03:54:58', 0),
(142, 'TestUser', '2020-03-18 03:55:11', 0),
(143, 'tesla', '2020-03-18 04:01:25', 0),
(144, 'tesla', '2020-03-18 04:01:31', 0),
(145, 'tesla', '2020-03-18 04:01:39', 0),
(146, 'newton', '2020-03-18 04:02:13', 0),
(147, 'tesla', '2020-03-18 04:03:44', 1),
(148, 'TestUser', '2020-03-18 04:04:05', 0),
(149, 'TestUser', '2020-03-18 04:04:22', 0),
(150, 'tesla', '2020-03-18 04:18:50', 1),
(151, 'test123', '2020-03-18 04:21:37', 1),
(152, 'newton', '2020-03-18 04:21:54', 1),
(153, 'tesla', '2020-03-18 04:50:20', 1),
(154, 'newton', '2020-03-18 10:28:47', 1),
(155, 'tesla', '2020-03-18 10:30:10', 1),
(156, 'tesla', '2020-03-18 10:56:45', 1),
(157, 'newton', '2020-03-18 10:57:10', 1),
(158, 'tesla', '2020-03-18 11:21:59', 1),
(159, 'tesla', '2020-03-18 11:31:52', 0),
(160, 'tesla', '2020-03-18 11:32:03', 1),
(161, 'newton', '2020-03-18 12:14:16', 0),
(162, 'newton', '2020-03-18 12:15:01', 0),
(163, 'newton', '2020-03-18 12:15:48', 0),
(164, 'newton', '2020-03-18 12:27:03', 1),
(165, 'admin', '2020-03-18 12:36:44', 1),
(166, 'analysis', '2020-03-18 12:41:30', 1),
(167, 'admin', '2020-03-18 13:16:27', 1),
(168, 'admin', '2020-03-19 06:01:37', 1),
(169, 'analysis', '2020-03-19 06:47:36', 0),
(170, 'analysis', '2020-03-19 06:47:42', 1),
(171, 'approver', '2020-03-19 07:51:02', 1),
(172, 'admin', '2020-03-19 09:14:34', 1),
(173, 'approver', '2020-03-19 11:52:54', 1),
(174, 'Verify1', '2020-03-19 11:53:05', 1),
(175, 'analysis', '2020-03-19 11:55:34', 1),
(176, 'Verify1', '2020-03-19 12:01:58', 1),
(177, 'analysis', '2020-03-19 12:16:34', 1),
(178, 'admin', '2020-03-20 07:23:51', 1),
(179, 'analysis', '2020-03-20 08:52:34', 1),
(180, 'admin', '2020-03-20 11:25:31', 1),
(181, 'admin', '2020-03-20 11:58:52', 1),
(182, 'admin', '2020-03-21 05:47:50', 1),
(183, 'analysis', '2020-03-21 05:50:39', 1),
(184, 'admin', '2020-03-21 07:18:42', 1),
(185, 'analysis', '2020-03-23 09:32:01', 1),
(186, 'admin', '2020-03-23 09:36:27', 1),
(187, 'analysis', '2020-03-23 09:37:57', 1),
(188, 'admin', '2020-03-23 09:50:57', 1),
(189, 'admin', '2020-03-24 11:56:21', 1),
(190, 'admin', '2020-03-28 08:49:14', 1),
(191, 'admin', '2020-03-30 08:59:17', 1),
(192, 'admin', '2020-03-31 05:18:13', 1),
(193, 'analiysis', '2020-03-31 05:18:43', 0),
(194, 'analysis', '2020-03-31 05:18:56', 1),
(195, 'admin', '2020-03-31 05:38:58', 1),
(196, 'analysis', '2020-03-31 05:39:14', 1),
(197, 'analysis', '2020-03-31 06:52:25', 1),
(198, 'admin', '2020-03-31 06:57:10', 1),
(199, 'analysis', '2020-03-31 08:30:27', 1),
(200, 'admin', '2020-03-31 09:05:09', 1),
(201, 'analiysis', '2020-03-31 11:37:23', 0),
(202, 'analysis', '2020-03-31 11:37:30', 1),
(203, 'analysis', '2020-04-01 05:16:13', 1),
(204, 'admin', '2020-04-03 05:03:49', 1),
(205, 'analysis', '2020-04-03 05:04:08', 1),
(206, 'admin', '2020-04-03 06:57:59', 1),
(207, 'admin', '2020-04-03 07:22:32', 1),
(208, 'analysis', '2020-04-03 07:22:43', 1),
(209, 'analysis', '2020-04-03 12:14:45', 1),
(210, 'admin', '2020-04-03 12:19:37', 1),
(211, 'analysis', '2020-04-04 05:09:51', 1),
(212, 'admin', '2020-04-04 05:12:03', 1),
(213, 'admin', '2020-04-04 06:45:22', 1),
(214, 'analysis', '2020-04-04 07:34:38', 1),
(215, 'admin', '2020-04-20 05:23:25', 1),
(216, 'analysis', '2020-04-20 05:23:51', 1),
(217, 'admin', '2020-04-20 05:35:14', 1),
(218, 'admin', '2020-04-20 06:01:37', 1),
(219, 'analysis', '2020-04-20 06:02:20', 1),
(220, 'analysis', '2020-04-20 06:43:49', 1),
(221, 'admin', '2020-04-23 05:50:18', 1),
(222, 'admin', '2020-04-23 08:39:33', 1),
(223, 'admin', '2020-04-24 05:33:07', 1),
(224, 'analysis', '2020-04-24 06:01:16', 1),
(225, 'analysis', '2020-04-24 09:26:23', 1),
(226, 'admin', '2020-04-24 11:15:54', 1),
(227, 'analysis', '2020-04-24 11:16:56', 1),
(228, 'admin', '2020-04-24 11:17:23', 1),
(229, 'analysis', '2020-04-24 11:24:15', 1),
(230, 'admin', '2020-04-24 11:24:52', 1),
(231, 'admin', '2020-04-24 11:25:38', 1),
(232, 'analysis', '2020-04-24 11:25:54', 1),
(233, 'admin', '2020-04-24 11:27:09', 1),
(234, 'admin', '2020-04-25 05:04:59', 1),
(235, 'analysis', '2020-04-25 05:10:30', 1),
(236, 'analysis', '2020-04-27 05:11:18', 1),
(237, 'admin', '2020-04-27 05:30:31', 1),
(238, 'analysis', '2020-04-27 05:54:10', 1),
(239, 'admin', '2020-04-27 06:04:33', 1),
(240, 'analysis', '2020-04-27 06:26:06', 1),
(241, 'admin', '2020-04-27 06:32:28', 1),
(242, 'analysis', '2020-04-27 07:10:39', 1),
(243, 'admin', '2020-04-27 07:11:11', 1),
(244, 'analysis', '2020-04-27 07:11:53', 1),
(245, 'analysis', '2020-04-27 10:25:00', 1),
(246, 'analysis', '2020-04-28 10:24:23', 1),
(247, 'analysis', '2020-04-29 06:41:23', 1),
(248, 'admin', '2020-04-29 09:37:29', 1),
(249, 'analysis', '2020-04-29 12:29:28', 1),
(250, 'admin', '2020-04-30 05:18:44', 1),
(251, 'analysis', '2020-04-30 05:31:12', 1),
(252, 'admin', '2020-04-30 05:40:47', 1),
(253, 'analysis', '2020-04-30 05:43:42', 1),
(254, 'admin', '2020-04-30 10:32:34', 1),
(255, 'analysis', '2020-04-30 12:01:35', 1),
(256, 'admin', '2020-05-02 05:01:10', 1),
(257, 'analysis', '2020-05-02 05:02:44', 1),
(258, 'verify', '2020-05-02 10:05:38', 1),
(259, 'analysis', '2020-05-02 10:08:17', 1),
(260, 'verify', '2020-05-02 10:13:10', 1),
(261, 'analysis', '2020-05-02 12:03:29', 1),
(262, 'approver', '2020-05-02 12:19:20', 1),
(263, 'approver', '2020-05-02 12:42:19', 1),
(264, 'analysis', '2020-05-02 13:37:52', 1),
(265, 'admin', '2020-05-02 13:38:32', 1),
(266, 'analysis', '2020-05-02 13:44:04', 1),
(267, 'admin', '2020-05-04 06:01:32', 1),
(268, 'anaysis', '2020-05-04 06:23:16', 0),
(269, 'analysis', '2020-05-04 06:23:26', 1),
(270, 'admin', '2020-05-04 06:26:27', 1),
(271, 'analysis', '2020-05-04 06:27:08', 1),
(272, 'admin', '2020-05-04 06:41:58', 1),
(273, 'analysis', '2020-05-04 06:42:37', 1),
(274, 'admin', '2020-05-04 08:39:07', 1),
(275, 'analysis', '2020-05-04 08:41:18', 1),
(276, 'admin', '2020-05-04 09:23:26', 1),
(277, 'analysis', '2020-05-04 09:30:42', 1),
(278, 'analysis', '2020-05-04 10:05:21', 1),
(279, 'analysis', '2020-05-04 11:18:50', 1),
(280, 'analysis', '2020-05-04 11:37:10', 1),
(281, 'admin', '2020-05-04 13:17:09', 1),
(282, 'analysis', '2020-05-04 13:17:42', 1),
(283, 'admin', '2020-05-04 13:20:30', 1),
(284, 'analysis', '2020-05-04 13:21:52', 1),
(285, 'admin', '2020-05-06 06:45:59', 1),
(286, 'analysis', '2020-05-06 09:07:59', 1),
(287, 'analysis', '2020-05-07 04:57:04', 1),
(288, 'analysis', '2020-05-09 04:46:52', 1),
(289, 'verify', '2020-05-09 05:50:25', 1),
(290, 'approver', '2020-05-09 06:16:04', 1),
(291, 'analysis', '2020-05-09 06:29:40', 1),
(292, 'analysis', '2020-05-09 06:37:28', 1),
(293, 'analysis', '2020-05-11 04:53:39', 1),
(294, 'admin', '2020-05-11 06:19:38', 1),
(295, 'analysis', '2020-05-14 07:45:56', 1),
(296, 'analysis', '2020-05-15 18:25:03', 1),
(297, 'admin', '2020-05-15 19:55:48', 1),
(298, 'analysis', '2020-05-15 19:57:48', 1),
(299, 'analysis', '2020-05-16 07:11:26', 1),
(300, 'admin', '2020-05-16 08:27:19', 1),
(301, 'analysis', '2020-05-16 08:28:35', 1),
(302, 'admin', '2020-05-16 09:14:24', 1),
(303, 'analysis', '2020-05-16 09:17:23', 1),
(304, 'analysis', '2020-05-19 05:06:16', 1),
(305, 'analysis', '2020-05-19 09:25:45', 1),
(306, 'admin', '2020-05-19 09:27:06', 1),
(307, 'analysis', '2020-05-19 09:27:29', 1),
(308, 'verify', '2020-05-19 09:38:43', 1),
(309, 'approver', '2020-05-19 09:39:05', 1),
(310, 'verify', '2020-05-19 09:40:21', 1),
(311, 'approver', '2020-05-19 09:41:23', 1),
(312, 'analysis', '2020-05-20 05:21:50', 1),
(313, 'analysis', '2020-05-20 06:15:29', 1),
(314, 'verify', '2020-05-20 09:25:21', 1),
(315, 'approver', '2020-05-20 09:25:42', 1),
(316, 'analysis', '2020-05-20 10:10:03', 1),
(317, 'analysis', '2020-05-20 12:14:00', 1),
(318, 'analysis', '2020-05-21 05:13:32', 1),
(319, 'analysis', '2020-05-23 05:04:31', 1),
(320, 'analysis', '2020-05-23 13:02:46', 1),
(321, 'admin', '2020-05-23 13:03:32', 1),
(322, 'analysis', '2020-05-23 13:04:33', 1),
(323, 'analysis', '2020-05-25 08:26:32', 1),
(324, 'analysis', '2020-05-26 05:00:35', 1),
(325, 'analysis', '2020-05-26 11:43:50', 1),
(326, 'analysis', '2020-05-26 11:45:30', 0),
(327, 'analysis', '2020-05-26 11:45:46', 1),
(328, 'admin', '2020-05-26 11:50:21', 1),
(329, 'ANALYSIS', '2020-05-26 11:56:29', 0),
(330, 'analysis', '2020-05-26 11:56:39', 1),
(331, 'admin', '2020-05-26 12:11:50', 1),
(332, 'analysis', '2020-05-26 12:13:37', 1),
(333, 'admin', '2020-05-26 12:14:35', 1),
(334, 'admin', '2020-05-26 12:17:38', 1),
(335, 'analysis', '2020-05-26 12:30:35', 1),
(336, 'admin', '2020-05-26 12:41:03', 1),
(337, 'analysis', '2020-05-26 12:42:07', 1),
(338, 'verify', '2020-05-26 12:45:55', 1),
(339, 'analysis', '2020-05-26 13:30:22', 1),
(340, 'approver', '2020-05-26 14:13:11', 1),
(341, 'analysis', '2020-05-27 11:42:28', 1),
(342, 'admin', '2020-05-29 14:47:00', 1),
(343, 'analysis', '2020-06-01 12:49:05', 1),
(344, 'analysis', '2020-06-01 12:49:07', 1),
(345, 'admin', '2020-06-01 12:51:53', 1),
(346, 'analysis', '2020-06-01 12:54:23', 1),
(347, 'admin', '2020-06-01 12:55:20', 1),
(348, 'analysis', '2020-06-01 12:56:51', 1),
(349, 'analysis', '2020-06-03 10:04:15', 1),
(350, 'analysis', '2020-06-06 17:26:56', 1),
(351, 'analysis', '2020-06-06 19:28:47', 1),
(352, 'admin', '2020-06-06 20:09:50', 1),
(353, 'analysis', '2020-06-06 20:11:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `UserId` varchar(70) NOT NULL,
  `UserName` varchar(250) DEFAULT NULL,
  `UserEmail` varchar(70) DEFAULT NULL,
  `ContactNum` varchar(25) DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Role` bigint(20) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `IsActive` int(11) NOT NULL,
  `LdapUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`UserId`, `UserName`, `UserEmail`, `ContactNum`, `CreatedDate`, `Role`, `Password`, `IsActive`, `LdapUser`) VALUES
('admin', 'Admin', 'dk@omtechsoft.com', '123456789', '2020-02-20 06:53:31', 1, 'admin', 1, 0),
('analysis', 'Analysis', 'dk@omtechsoft.com', '3424434234', '2020-02-20 12:20:18', 2, '123', 1, 0),
('approver', 'Approver', 'dk@omtechsoft.com', '45355435345345345', '2020-02-20 12:20:59', 4, '123', 1, 0),
('einstein', 'Albert Einstein 123', 'dk@omtechsoft.com', '314-159-2653', '2020-03-03 02:00:29', 3, '', 1, 1),
('euler', 'Euler Approver', NULL, '1234567890', '2020-03-02 11:27:38', 4, '123123123', 1, 1),
('gauss', 'Carl Friedrich Gauss', NULL, NULL, '2020-03-03 02:05:30', 4, '', 1, 1),
('newton', 'Newton Analysis', 'dk@omtechsoft.com', '1234567890', '2020-03-02 11:27:38', 2, '123123123', 1, 1),
('tesla', 'Tesla Admin', 'dk@omtechsoft.com', '+91 265 265 2652 2658', '2020-03-02 11:27:38', 1, NULL, 1, 1),
('test', 'Test', 'dk@omtechsoft.com', NULL, '2020-03-18 03:42:14', 2, NULL, 1, 1),
('test123', 'Test User', 'dk@omtechsoft.com', '123456789', '2020-03-18 04:19:45', 3, 'test123456789', 1, 0),
('TestUser', 'Test User', 'dk@omtechsoft.com', NULL, '2020-03-18 04:03:57', 4, 'TestUser', 1, 0),
('verify', 'verify', 'dk@omtechsoft.com', '123123123', '2020-02-20 12:20:18', 3, '123', 1, 0),
('Verify1', 'Verify 1', '-', '1234567890', '2020-02-26 10:13:12', 3, '123', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibration`
--
ALTER TABLE `calibration`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationcomment`
--
ALTER TABLE `calibrationcomment`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationform`
--
ALTER TABLE `calibrationform`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationformtype`
--
ALTER TABLE `calibrationformtype`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationline`
--
ALTER TABLE `calibrationline`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationlineobsmass`
--
ALTER TABLE `calibrationlineobsmass`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationposition`
--
ALTER TABLE `calibrationposition`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `calibrationreq`
--
ALTER TABLE `calibrationreq`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `devicemaster`
--
ALTER TABLE `devicemaster`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `devicepositionweight`
--
ALTER TABLE `devicepositionweight`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `deviceweight`
--
ALTER TABLE `deviceweight`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `deviceweightobsmass`
--
ALTER TABLE `deviceweightobsmass`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `instrumentmaster`
--
ALTER TABLE `instrumentmaster`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `monthlycalibrationdetails`
--
ALTER TABLE `monthlycalibrationdetails`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `rolemaster`
--
ALTER TABLE `rolemaster`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `statusmaster`
--
ALTER TABLE `statusmaster`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `userloginlog`
--
ALTER TABLE `userloginlog`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calibration`
--
ALTER TABLE `calibration`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `calibrationcomment`
--
ALTER TABLE `calibrationcomment`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `calibrationform`
--
ALTER TABLE `calibrationform`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calibrationformtype`
--
ALTER TABLE `calibrationformtype`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calibrationline`
--
ALTER TABLE `calibrationline`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `calibrationlineobsmass`
--
ALTER TABLE `calibrationlineobsmass`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `calibrationposition`
--
ALTER TABLE `calibrationposition`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `calibrationreq`
--
ALTER TABLE `calibrationreq`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `devicemaster`
--
ALTER TABLE `devicemaster`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `devicepositionweight`
--
ALTER TABLE `devicepositionweight`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `deviceweight`
--
ALTER TABLE `deviceweight`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `deviceweightobsmass`
--
ALTER TABLE `deviceweightobsmass`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `instrumentmaster`
--
ALTER TABLE `instrumentmaster`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthlycalibrationdetails`
--
ALTER TABLE `monthlycalibrationdetails`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rolemaster`
--
ALTER TABLE `rolemaster`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statusmaster`
--
ALTER TABLE `statusmaster`
  MODIFY `RecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userloginlog`
--
ALTER TABLE `userloginlog`
  MODIFY `RecId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
