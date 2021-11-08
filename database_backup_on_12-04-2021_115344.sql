

CREATE TABLE `calibration` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `DailyCalibrationNextDate` varchar(50) NOT NULL DEFAULT '',
  `PerformedBy` varchar(70) NOT NULL,
  `PerformDate` datetime NOT NULL,
  `VerifiedBy` varchar(70) NOT NULL,
  `VerifiedDate` datetime DEFAULT NULL,
  `AproovelBy` varchar(70) NOT NULL,
  `AproovelDate` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `FormId` varchar(50) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `RePerform` int(11) NOT NULL,
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;


INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('88','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2020-12-30 11:39','suresh.makwana','2020-12-29 13:39:03','ajay.patel','2020-12-30 09:17:28','','','20','BAL/1077/20/12/29/D/00','2020-12-29 13:39:03','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('89','2','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-01-29 11:12:00','','analysis','2020-12-30 11:16:26','','','','','10','BAL/1077/20/12/30/M/00','2020-12-30 11:16:26','10');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('90','2','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-01-29 11:58:00','','payal.kate','2020-12-30 11:58:49','','','','','10','BAL/1250/20/12/30/M/00','2020-12-30 11:58:49','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('91','2','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-01-29 12:24:00','','payal.kate','2020-12-30 12:26:00','','','','','10','BAL/1077/20/12/30/M/01','2020-12-30 12:26:00','10');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('92','2','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-01-29 12:55:00','','payal.kate','2020-12-30 12:56:28','verify','2020-12-30 15:06:01','approver','2020-12-30 15:07:31','30','BAL/1077/20/12/30/M/03','2020-12-30 12:56:28','10');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('93','2','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-01-29 15:39:00','','payal.kate','2020-12-30 15:41:27','','','','','10','BAL/1077/20/12/30/M/06','2020-12-30 15:41:27','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('94','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-05 09:57','analysis','2021-01-04 11:57:48','','','','','10','BAL/1250/21/01/04/D/00','2021-01-04 11:57:48','10');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('95','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-05 10:30','ritendra.raulji','2021-01-04 12:30:35','dhiren.patel','2021-01-04 12:41:19','','','20','BAL/1250/21/01/04/D/01','2021-01-04 12:30:35','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('96','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 23:30:00','2021-06-09 00:00:00','','2021-01-05 11:37','analysis','2021-01-04 13:37:25','','','','','10','BAL/1077/21/01/04/D/00','2021-01-04 13:37:25','10');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('97','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-05 12:32','abhishek.joshi','2021-01-04 14:32:05','verify','2021-01-04 14:42:01','approver','2021-01-04 14:43:11','30','BAL/1077/21/01/04/D/01','2021-01-04 14:32:05','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('98','2','ADD/WB-002','','5','','16','','','Sartorius','MSA225P-100-DA','0','0','2020-06-10 23:30:00','2021-06-09 00:00:00','2021-02-03 14:21:00','','analysis','2021-01-04 14:40:49','','','','','10','BAL/1251/21/01/04/M/00','2021-01-04 14:40:49','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('99','2','ADD/WB-002','','5','','16','','','Sartorius','MSA225P-100-DA','0','0','2020-06-10 23:30:00','2021-06-09 00:00:00','2021-02-03 14:21:00','','analysis','2021-01-04 14:44:27','','','','','10','BAL/1251/21/01/04/M/00','2021-01-04 14:44:27','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('100','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-06 08:38','ritendra.raulji','2021-01-05 10:38:26','','','','','10','BAL/1077/21/01/05/D/00','2021-01-05 10:38:26','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('101','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-06 08:49','abhishek.joshi','2021-01-05 10:49:32','','','','','10','BAL/1250/21/01/05/D/00','2021-01-05 10:49:32','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('102','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-07 07:43','ritendra.raulji','2021-01-06 09:43:57','','','','','10','BAL/1077/21/01/06/D/00','2021-01-06 09:43:57','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('103','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-07 07:50','abhishek.joshi','2021-01-06 09:50:47','','','','','10','BAL/1250/21/01/06/D/00','2021-01-06 09:50:47','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('104','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-08 08:43','abhishek.joshi','2021-01-07 10:43:10','','','','','10','BAL/1250/21/01/07/D/00','2021-01-07 10:43:10','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('105','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-09 07:57','abhishek.joshi','2021-01-08 09:57:07','','','','','10','BAL/1250/21/01/08/D/00','2021-01-08 09:57:07','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('106','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-12 08:51','abhishek.joshi','2021-01-11 10:51:10','','','','','10','BAL/1250/21/01/11/D/00','2021-01-11 10:51:10','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('107','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-13 07:47','abhishek.joshi','2021-01-12 09:47:44','','','','','10','BAL/1250/21/01/12/D/00','2021-01-12 09:47:44','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('108','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-13 07:57','ritendra.raulji','2021-01-12 09:57:09','','','','','10','BAL/1077/21/01/12/D/00','2021-01-12 09:57:09','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('109','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-14 07:27','abhishek.joshi','2021-01-13 09:27:54','','','','','10','BAL/1250/21/01/13/D/00','2021-01-13 09:27:54','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('110','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-14 09:13','ritendra.raulji','2021-01-13 11:13:43','','','','','10','BAL/1077/21/01/13/D/00','2021-01-13 11:13:43','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('111','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-17 08:07','abhishek.joshi','2021-01-16 10:07:02','','','','','10','BAL/1250/21/01/16/D/00','2021-01-16 10:07:02','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('112','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-19 08:44','ritendra.raulji','2021-01-18 10:44:19','','','','','10','BAL/1077/21/01/18/D/00','2021-01-18 10:44:19','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('113','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-20 07:41','abhishek.joshi','2021-01-19 09:41:30','','','','','10','BAL/1250/21/01/19/D/00','2021-01-19 09:41:30','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('114','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-21 07:41','abhishek.joshi','2021-01-20 09:41:55','','','','','10','BAL/1250/21/01/20/D/00','2021-01-20 09:41:55','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('115','2','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-02-19 16:41:00','','abhishek.joshi','2021-01-20 16:41:46','verify','2021-02-10 14:51:25','','','25','BAL/1250/21/01/20/M/00','2021-01-20 16:41:46','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('116','2','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','0','0','2020-06-10 00:00:00','2021-06-09 00:00:00','2021-02-19 16:41:00','','abhishek.joshi','2021-01-20 16:42:31','','','','','10','BAL/1250/21/01/20/M/00','2021-01-20 16:42:31','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('117','1','ADD/WB-002','','5','','10','','','Sartorius','MSA--00M','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-22 08:04','abhishek.joshi','2021-01-21 10:04:19','','','','','10','BAL/1250/21/01/21/D/00','2021-01-21 10:04:19','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('118','1','ADD/WB-002','','5','','15','','','METTLER TOLEDO','X5205DU','1','1','2020-06-10 00:00:00','2021-06-09 00:00:00','','2021-01-29 17:05','analysis','2021-01-28 19:05:20','','','','','10','BAL/1077/21/01/28/D/00','2021-01-28 19:05:20','0');


CREATE TABLE `calibrationcomment` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
  `LineRecId` bigint(20) NOT NULL,
  `RefRecId` bigint(20) NOT NULL,
  `CalibrationStatus` int(11) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `Type` int(11) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;


INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('145','0','88','10','ok','1','ajay.patel','2020-12-30 09:17:20');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('146','0','88','20','Form : BAL/1077/20/12/29/D/00 is Verify by patel ajay at 30/12/2020 09:17 AM.','1','ajay.patel','2020-12-30 09:17:28');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('147','490','89','10','Positive Line 5 : ok','2','analysis','2020-12-30 11:12:45');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('148','490','89','10','Positive Line 5 : ok','2','analysis','2020-12-30 11:12:45');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('149','65','89','10','Line 5 : ok','5','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('150','0','89','10','Displayed weight(A): ok','6','analysis','2020-12-30 11:19:23');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('151','490','89','10','Line 5 : ok','3','analysis','2020-12-30 11:20:22');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('153','0','91','10','Form : BAL/1077/20/12/30/M/01 Edit By : payal.kate at 30/12/2020 12:50 PM','2','payal.kate','2020-12-30 12:50:42');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('154','0','92','10','Form : BAL/1077/20/12/30/M/03 Edit By : payal.kate at 30/12/2020 02:07 PM','2','payal.kate','2020-12-30 14:07:56');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('155','0','92','20','Form : BAL/1077/20/12/30/M/03 is Verify by verify at 30/12/2020 03:06 PM.','2','verify','2020-12-30 15:06:01');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('156','0','92','30','Form : BAL/1077/20/12/30/M/03 is Approve by Approver at 30/12/2020 03:07 PM.','2','approver','2020-12-30 15:07:31');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('157','0','92','30','ok','2','approver','2020-12-30 15:10:45');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('158','0','95','10','Reviewed','1','dhiren.patel','2021-01-04 12:41:16');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('159','0','95','20','Form : BAL/1250/21/01/04/D/01 is Verify by Dhiren Patel at 04/01/2021 12:41 PM.','1','dhiren.patel','2021-01-04 12:41:19');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('160','0','97','10','twrad','1','verify','2021-01-04 14:41:54');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('161','0','97','20','Form : BAL/1077/21/01/04/D/01 is Verify by verify at 04/01/2021 02:42 PM.','1','verify','2021-01-04 14:42:01');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('162','0','97','30','Form : BAL/1077/21/01/04/D/01 is Approve by Approver at 04/01/2021 02:43 PM.','1','approver','2021-01-04 14:43:11');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('163','0','101','10','Form : BAL/1250/21/01/05/D/00 Edit By : abhishek.joshi at 05/01/2021 10:55 AM and edit Spirit level of Balance Checked: Yes to Yes, Internal Calibration: Passes to Passes','1','abhishek.joshi','2021-01-05 10:55:40');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('164','640','118','10','Line 1 : test demo','1','analysis','2021-01-28 18:51:41');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('165','0','115','25','Form : BAL/1250/21/01/20/M/00 is Decline (Verify) by verify at 10/02/2021 02:51 PM.','2','verify','2021-02-10 14:51:25');


CREATE TABLE `calibrationline` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `StWeight` decimal(28,4) NOT NULL,
  `CertWeight` decimal(28,4) NOT NULL,
  `DispWeight` decimal(28,5) NOT NULL,
  `DiffWeight` decimal(28,5) NOT NULL,
  `AccpWeight` decimal(28,5) NOT NULL,
  `Result` int(11) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=670 DEFAULT CHARSET=latin1;


INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('480','88','1','0','0.0200','0.0200','0.02002','-0.00002','0.00002','1','637448457927651882.txt','637448457927651882.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('481','88','2','0','0.0500','0.0500','0.04999','0.00001','0.00005','1','637448458173836992.txt','637448458173836992.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('482','88','3','0','0.1000','0.1000','0.09993','0.00007','0.00010','1','637448458701596885.txt','637448458701596885.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('483','88','4','0','1.0000','1.0000','0.99995','0.00005','0.00100','1','637448458972124151.txt','637448458972124151.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('484','88','5','0','100.0000','100.0001','99.99970','0.00040','0.10000','1','637448459132647122.txt','637448459132647122.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('485','88','6','0','200.0000','200.0002','199.99960','0.00060','0.20000','1','637448459257652321.txt','637448459257652321.bmp','suresh.makwana','2020-12-29 13:39:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('486','89','1','0','10.0000','10.0000','199.99960','-189.99960','0.01000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('487','89','2','0','20.0000','20.0000','199.99960','-179.99960','0.02000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('488','89','3','0','50.0000','50.0000','199.99960','-149.99960','0.05000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('489','89','4','0','100.0000','100.0000','199.99960','-99.99960','0.10000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('490','89','5','0','200.0000','200.0000','199.99960','0.00040','0.20000','1','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('491','89','1','1','10.0000','10.0000','199.99960','-189.99960','0.01000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('492','89','2','1','20.0000','20.0000','199.99960','-179.99960','0.02000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('493','89','3','1','50.0000','50.0000','199.99960','-149.99960','0.05000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('494','89','4','1','100.0000','100.0000','199.99960','-99.99960','0.10000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('495','89','5','1','200.0000','200.0000','199.99960','0.00040','0.20000','1','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:16:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('496','89','1','3','10.0000','10.0000','199.99960','-189.99960','0.01000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:21:48');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('497','89','2','3','20.0000','20.0000','199.99960','-179.99960','0.02000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:21:48');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('498','89','3','3','50.0000','50.0000','199.99960','-149.99960','0.05000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:21:48');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('499','89','4','3','100.0000','100.0000','199.99960','-99.99960','0.10000','2','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:21:48');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('500','89','5','3','200.0000','200.0000','199.99960','0.00040','0.20000','1','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:21:48');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('501','91','1','0','10.0000','10.0000','9.99992','0.00008','0.01000','1','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('502','91','2','0','20.0000','20.0000','9.99992','10.00008','0.02000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('503','91','3','0','50.0000','50.0000','9.99992','40.00008','0.05000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('504','91','4','0','100.0000','100.0000','9.99992','90.00008','0.10000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('505','91','5','0','200.0000','200.0000','9.99992','190.00008','0.20000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('506','91','1','1','10.0000','10.0000','9.99992','0.00008','0.01000','1','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('507','91','2','1','20.0000','20.0000','9.99992','10.00008','0.02000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('508','91','3','1','50.0000','50.0000','9.99992','40.00008','0.05000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('509','91','4','1','100.0000','100.0000','9.99992','90.00008','0.10000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('510','91','5','1','200.0000','200.0000','9.99992','190.00008','0.20000','2','637449278997694166.txt','637449278997694166.bmp','payal.kate','2020-12-30 12:26:00');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('511','92','1','0','10.0000','10.0000','9.99997','0.00003','0.01000','1','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('512','92','2','0','20.0000','20.0000','9.99997','10.00003','0.02000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('513','92','3','0','50.0000','50.0000','9.99997','40.00003','0.05000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('514','92','4','0','100.0000','100.0000','9.99997','90.00003','0.10000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('515','92','5','0','200.0000','200.0000','9.99997','190.00003','0.20000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('516','92','1','1','10.0000','10.0000','9.99997','0.00003','0.01000','1','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('517','92','2','1','20.0000','20.0000','9.99997','10.00003','0.02000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('518','92','3','1','50.0000','50.0000','9.99997','40.00003','0.05000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('519','92','4','1','100.0000','100.0000','9.99997','90.00003','0.10000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('520','92','5','1','200.0000','200.0000','9.99997','190.00003','0.20000','2','637449280013288000.txt','637449280013288000.bmp','payal.kate','2020-12-30 12:56:28');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('521','93','1','0','10.0000','10.0000','9.99999','0.00001','0.01000','1','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('522','93','2','0','20.0000','20.0000','9.99999','10.00001','0.02000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('523','93','3','0','50.0000','50.0000','9.99999','40.00001','0.05000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('524','93','4','0','100.0000','100.0000','9.99999','90.00001','0.10000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('525','93','5','0','200.0000','200.0000','9.99999','190.00001','0.20000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('526','93','1','1','10.0000','10.0000','9.99999','0.00001','0.01000','1','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('527','93','2','1','20.0000','20.0000','9.99999','10.00001','0.02000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('528','93','3','1','50.0000','50.0000','9.99999','40.00001','0.05000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('529','93','4','1','100.0000','100.0000','9.99999','90.00001','0.10000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('530','93','5','1','200.0000','200.0000','9.99999','190.00001','0.20000','2','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:41:27');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('531','95','1','0','1.0000','1.0030','1.00220','0.00080','0.00100','1','637453598348559597.txt','637453598348559597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('532','95','2','0','0.0200','2.0020','2.00250','-0.00050','0.00200','1','637453599214303597.txt','637453599214303597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('533','95','3','0','5.0000','5.0020','5.00140','0.00060','0.00500','1','637453599845901597.txt','637453599845901597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('534','95','4','0','10.0000','10.0010','10.00170','-0.00070','0.01000','1','637453600643037597.txt','637453600643037597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('535','95','5','0','20.0000','19.9980','20.00040','-0.00240','0.02000','1','637453601266357597.txt','637453601266357597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('536','95','6','0','50.0000','50.0090','50.00380','0.00520','0.05000','1','637453602122965597.txt','637453602122965597.bmp','ritendra.raulji','2021-01-04 12:30:35');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('537','96','1','0','0.0200','0.0200','0.18000','-0.16000','0.00002','2','637450363038549331.txt','637450363038549331.bmp','analysis','2021-01-04 13:37:25');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('538','96','2','0','0.0500','0.0500','0.18000','-0.13000','0.00005','2','637450363038549331.txt','637450363038549331.bmp','analysis','2021-01-04 13:37:25');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('539','97','1','0','0.0200','0.0200','0.01999','0.00001','0.00002','1','637453671226747171.txt','637453671226747171.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('540','97','2','0','0.0500','0.0500','0.05000','0.00000','0.00005','1','637453672271192171.txt','637453672271192171.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('541','97','3','0','0.1000','0.1000','0.10003','-0.00003','0.00010','1','637453673110808225.txt','637453673110808225.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('542','97','4','0','1.0000','1.0000','1.00001','-0.00001','0.00100','1','637453673743565169.txt','637453673743565169.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('543','97','5','0','100.0000','100.0000','99.99990','0.00010','0.10000','1','637453674170871430.txt','637453674170871430.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('544','97','6','0','200.0000','200.0000','199.99980','0.00020','0.20000','1','637453674708624983.txt','637453674708624983.bmp','abhishek.joshi','2021-01-04 14:32:05');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('545','100','1','0','0.0200','0.0200','0.02000','0.00000','0.00002','1','637454396344932067.txt','637454396344932067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('546','100','2','0','0.0500','0.0500','0.04999','0.00001','0.00005','1','637454396938225067.txt','637454396938225067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('547','100','3','0','0.1000','0.1000','0.10000','0.00000','0.00010','1','637454397476450067.txt','637454397476450067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('548','100','4','0','1.0000','1.0000','1.00000','0.00000','0.00100','1','637454397932931067.txt','637454397932931067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('549','100','5','0','100.0000','100.0000','0.00000','100.00000','0.10000','2','637454398505994067.txt','637454398505994067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('550','100','6','0','200.0000','200.0000','199.99960','0.00040','0.20000','1','637454398666518067.txt','637454398666518067.bmp','ritendra.raulji','2021-01-05 10:38:26');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('551','101','1','0','1.0000','1.0030','1.00260','0.00040','0.00100','1','637454401230426077.txt','637454401230426077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('552','101','2','0','0.0200','2.0020','2.00270','-0.00070','0.00200','1','637454402196406077.txt','637454402196406077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('553','101','3','0','5.0000','5.0020','5.00120','0.00080','0.00500','1','637454402920780077.txt','637454402920780077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('554','101','4','0','10.0000','10.0010','10.00230','-0.00130','0.01000','1','637454404109204077.txt','637454404109204077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('555','101','5','0','20.0000','19.9980','20.00770','-0.00970','0.02000','1','637454404783302077.txt','637454404783302077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('556','101','6','0','50.0000','50.0090','50.00590','0.00310','0.05000','1','637454405418316077.txt','637454405418316077.bmp','abhishek.joshi','2021-01-05 10:49:32');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('557','102','1','0','0.0200','0.0200','0.02000','0.00000','0.00002','1','637455227628938553.txt','637455227628938553.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('558','102','2','0','0.0500','0.0500','0.00000','0.05000','0.00005','2','637455228754224587.txt','637455228754224587.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('559','102','3','0','0.1000','0.1000','0.09999','0.00001','0.00010','1','637455228950945631.txt','637455228950945631.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('560','102','4','0','1.0000','1.0000','1.00000','0.00000','0.00100','1','637455229579173739.txt','637455229579173739.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('561','102','5','0','100.0000','100.0000','99.99980','0.00020','0.10000','1','637455229920223484.txt','637455229920223484.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('562','102','6','0','200.0000','200.0000','199.99950','0.00050','0.20000','1','637455230185767293.txt','637455230185767293.bmp','ritendra.raulji','2021-01-06 09:43:57');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('563','103','1','0','1.0000','1.0030','1.00240','0.00060','0.00100','1','637455230159314452.txt','637455230159314452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('564','103','2','0','0.0200','2.0020','2.00280','-0.00080','0.00200','1','637455231125274452.txt','637455231125274452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('565','103','3','0','5.0000','5.0020','5.00180','0.00020','0.00500','1','637455231936574452.txt','637455231936574452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('566','103','4','0','10.0000','10.0010','10.00290','-0.00190','0.01000','1','637455232859844452.txt','637455232859844452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('567','103','5','0','20.0000','19.9980','20.00420','-0.00620','0.02000','1','637455233600504452.txt','637455233600504452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('568','103','6','0','50.0000','50.0090','50.00520','0.00380','0.05000','1','637455234239334452.txt','637455234239334452.bmp','abhishek.joshi','2021-01-06 09:50:47');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('569','104','1','0','1.0000','1.0030','1.00290','0.00010','0.00100','1','637456125670386013.txt','637456125670386013.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('570','104','2','0','0.0200','2.0020','2.00270','-0.00070','0.00200','1','637456126600250189.txt','637456126600250189.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('571','104','3','0','5.0000','5.0020','5.00170','0.00030','0.00500','1','637456127287013345.txt','637456127287013345.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('572','104','4','0','10.0000','10.0010','10.00590','-0.00490','0.01000','1','637456128274263620.txt','637456128274263620.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('573','104','5','0','20.0000','19.9980','20.00340','-0.00540','0.02000','1','637456129012939997.txt','637456129012939997.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('574','104','6','0','50.0000','50.0090','50.00620','0.00280','0.05000','1','637456129649150987.txt','637456129649150987.bmp','abhishek.joshi','2021-01-07 10:43:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('575','105','1','0','1.0000','1.0030','1.00220','0.00080','0.00100','1','637456961020869221.txt','637456961020869221.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('576','105','2','0','0.0200','2.0020','2.00250','-0.00050','0.00200','1','637456962777745125.txt','637456962777745125.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('577','105','3','0','5.0000','5.0020','5.00180','0.00020','0.00500','1','637456963549986589.txt','637456963549986589.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('578','105','4','0','10.0000','10.0010','10.00350','-0.00250','0.01000','1','637456964421909861.txt','637456964421909861.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('579','105','5','0','20.0000','19.9980','20.00010','-0.00210','0.02000','1','637456965116945982.txt','637456965116945982.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('580','105','6','0','50.0000','50.0090','50.00350','0.00550','0.05000','1','637456965903060286.txt','637456965903060286.bmp','abhishek.joshi','2021-01-08 09:57:07');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('581','106','1','0','1.0000','1.0030','1.00310','-0.00010','0.00100','1','637459586695584046.txt','637459586695584046.bmp','abhishek.joshi','2021-01-11 10:51:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('582','106','2','0','0.0200','2.0020','2.00280','-0.00080','0.00200','1','637459587330310046.txt','637459587330310046.bmp','abhishek.joshi','2021-01-11 10:51:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('583','106','3','0','5.0000','5.0020','5.00180','0.00020','0.00500','1','637459588049664046.txt','637459588049664046.bmp','abhishek.joshi','2021-01-11 10:51:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('584','106','4','0','10.0000','10.0010','10.00370','-0.00270','0.01000','1','637459589006264046.txt','637459589006264046.bmp','abhishek.joshi','2021-01-11 10:51:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('585','106','5','0','20.0000','19.9980','20.00060','-0.00260','0.02000','1','637459589865790046.txt','637459589865790046.bmp','abhishek.joshi','2021-01-11 10:51:10');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('586','107','1','0','1.0000','1.0030','1.00250','0.00050','0.00100','1','637460412468690038.txt','637460412468690038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('587','107','2','0','0.0200','2.0020','2.00280','-0.00080','0.00200','1','637460413393258038.txt','637460413393258038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('588','107','3','0','5.0000','5.0020','5.00380','-0.00180','0.00500','1','637460414077384038.txt','637460414077384038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('589','107','4','0','10.0000','10.0010','10.00260','-0.00160','0.01000','1','637460415079718038.txt','637460415079718038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('590','107','5','0','20.0000','19.9980','19.99990','-0.00190','0.02000','1','637460415760372038.txt','637460415760372038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('591','107','6','0','50.0000','50.0090','50.00310','0.00590','0.05000','1','637460416372278038.txt','637460416372278038.bmp','abhishek.joshi','2021-01-12 09:47:44');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('592','108','1','0','0.0200','0.0200','0.02000','0.00000','0.00002','1','637460419344255220.txt','637460419344255220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('593','108','2','0','0.0500','0.0500','0.05000','0.00000','0.00005','1','637460419922129220.txt','637460419922129220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('594','108','3','0','0.1000','0.1000','0.10000','0.00000','0.00010','1','637460420489084220.txt','637460420489084220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('595','108','4','0','1.0000','1.0000','0.99999','0.00001','0.00100','1','637460421338735220.txt','637460421338735220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('596','108','5','0','100.0000','100.0000','99.99990','0.00010','0.10000','1','637460421770774220.txt','637460421770774220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('597','108','6','0','200.0000','200.0000','199.99960','0.00040','0.20000','1','637460422076403220.txt','637460422076403220.bmp','ritendra.raulji','2021-01-12 09:57:09');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('598','109','1','0','1.0000','1.0030','1.00300','0.00000','0.00100','1','637461264935720540.txt','637461264935720540.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('599','109','2','0','0.0200','2.0020','2.00280','-0.00080','0.00200','1','637461265844611316.txt','637461265844611316.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('600','109','3','0','5.0000','5.0020','5.00440','-0.00240','0.00500','1','637461266450921830.txt','637461266450921830.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('601','109','4','0','10.0000','10.0010','10.00280','-0.00180','0.01000','1','637461267302495302.txt','637461267302495302.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('602','109','5','0','20.0000','19.9980','20.00420','-0.00620','0.02000','1','637461267970715778.txt','637461267970715778.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('603','109','6','0','50.0000','50.0090','50.01140','-0.00240','0.05000','1','637461268594807778.txt','637461268594807778.bmp','abhishek.joshi','2021-01-13 09:27:54');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('604','110','1','0','0.0200','0.0200','0.02000','0.00000','0.00002','1','637461328692554332.txt','637461328692554332.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('605','110','2','0','0.0500','0.0500','0.04999','0.00001','0.00005','1','637461329300445081.txt','637461329300445081.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('606','110','3','0','0.1000','0.1000','0.10000','0.00000','0.00010','1','637461330027818808.txt','637461330027818808.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('607','110','4','0','1.0000','1.0000','1.00003','-0.00003','0.00100','1','637461330765768386.txt','637461330765768386.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('608','110','5','0','100.0000','100.0000','100.00000','0.00000','0.10000','1','637461331238074737.txt','637461331238074737.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('609','110','6','0','200.0000','200.0000','199.99980','0.00020','0.20000','1','637461331745526472.txt','637461331745526472.bmp','ritendra.raulji','2021-01-13 11:13:43');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('610','111','1','0','1.0000','1.0030','1.00310','-0.00010','0.00100','1','637463878819736587.txt','637463878819736587.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('611','111','2','0','0.0200','2.0020','2.00320','-0.00120','0.00200','1','637463880221849187.txt','637463880221849187.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('612','111','3','0','5.0000','5.0020','5.00180','0.00020','0.00500','1','637463881006006869.txt','637463881006006869.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('613','111','4','0','10.0000','10.0010','10.00280','-0.00180','0.01000','1','637463881685274479.txt','637463881685274479.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('614','111','5','0','20.0000','19.9980','19.99970','-0.00170','0.02000','1','637463883253715089.txt','637463883253715089.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('615','111','6','0','50.0000','50.0090','50.00440','0.00460','0.05000','1','637463883922134940.txt','637463883922134940.bmp','abhishek.joshi','2021-01-16 10:07:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('616','112','1','0','0.0200','0.0200','0.02000','0.00000','0.00002','1','637465629700649786.txt','637465629700649786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('617','112','2','0','0.0500','0.0500','0.05000','0.00000','0.00005','1','637465630658851786.txt','637465630658851786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('618','112','3','0','0.1000','0.1000','0.09999','0.00001','0.00010','1','637465631935399786.txt','637465631935399786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('619','112','4','0','1.0000','1.0000','1.00000','0.00000','0.00100','1','637465633187343786.txt','637465633187343786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('620','112','5','0','100.0000','100.0000','99.99990','0.00010','0.10000','1','637465633679673786.txt','637465633679673786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('621','112','6','0','200.0000','200.0000','199.99960','0.00040','0.20000','1','637465634100374786.txt','637465634100374786.bmp','ritendra.raulji','2021-01-18 10:44:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('622','113','1','0','1.0000','1.0030','1.00310','-0.00010','0.00100','1','637466456987100336.txt','637466456987100336.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('623','113','2','0','0.0200','2.0020','2.00330','-0.00130','0.00200','1','637466457753954144.txt','637466457753954144.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('624','113','3','0','5.0000','5.0020','5.00450','-0.00250','0.00500','1','637466458412456468.txt','637466458412456468.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('625','113','4','0','10.0000','10.0010','10.00280','-0.00180','0.01000','1','637466459415507186.txt','637466459415507186.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('626','113','5','0','20.0000','19.9980','20.00110','-0.00310','0.02000','1','637466460133789646.txt','637466460133789646.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('627','113','6','0','50.0000','50.0090','50.00430','0.00470','0.05000','1','637466460790302613.txt','637466460790302613.bmp','abhishek.joshi','2021-01-19 09:41:30');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('628','114','1','0','1.0000','1.0030','1.00270','0.00030','0.00100','1','637467320733034292.txt','637467320733034292.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('629','114','2','0','0.0200','2.0020','2.00340','-0.00140','0.00200','1','637467321517554652.txt','637467321517554652.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('630','114','3','0','5.0000','5.0020','5.00170','0.00030','0.00500','1','637467322312383582.txt','637467322312383582.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('631','114','4','0','10.0000','10.0010','10.00550','-0.00450','0.01000','1','637467323084165582.txt','637467323084165582.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('632','114','5','0','20.0000','19.9980','20.00140','-0.00340','0.02000','1','637467324260629582.txt','637467324260629582.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('633','114','6','0','50.0000','50.0090','50.00100','0.00800','0.05000','1','637467325049293582.txt','637467325049293582.bmp','abhishek.joshi','2021-01-20 09:41:55');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('634','117','1','0','1.0000','1.0030','1.00280','0.00020','0.00100','1','637468198200971286.txt','637468198200971286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('635','117','2','0','0.0200','2.0020','2.00380','-0.00180','0.00200','1','637468199268369286.txt','637468199268369286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('636','117','3','0','5.0000','5.0020','5.00200','0.00000','0.00500','1','637468200012365286.txt','637468200012365286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('637','117','4','0','10.0000','10.0010','10.00300','-0.00200','0.01000','1','637468200769041286.txt','637468200769041286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('638','117','5','0','20.0000','19.9980','20.00070','-0.00270','0.02000','1','637468201610499286.txt','637468201610499286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('639','117','6','0','50.0000','50.0090','50.00220','0.00680','0.05000','1','637468202268621286.txt','637468202268621286.bmp','abhishek.joshi','2021-01-21 10:04:19');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('640','118','1','0','0.0200','0.0200','0.16000','-0.14000','0.00002','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('641','118','2','0','0.0500','0.0500','0.16000','-0.11000','0.00005','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('642','118','3','0','0.1000','0.1000','0.16000','-0.06000','0.00010','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('643','118','4','0','1.0000','1.0000','0.16000','0.84000','0.00100','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('644','118','5','0','100.0000','100.0000','0.16000','99.84000','0.10000','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('645','118','6','0','200.0000','200.0000','0.16000','199.84000','0.20000','2','637474561519501859.txt','637474561519501859.bmp','analysis','2021-01-28 19:05:20');


CREATE TABLE `calibrationlineobsmass` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `ObsMass` decimal(28,5) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8mb4;


INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('195','89','1','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('196','89','2','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('197','89','3','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('198','89','4','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('199','89','5','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('200','89','6','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('201','89','7','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('202','89','8','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('203','89','9','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('204','89','10','0','10.00000','199.99960','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('205','90','1','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('206','90','2','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('207','90','3','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('208','90','4','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('209','90','5','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('210','90','6','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('211','90','7','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('212','90','8','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('213','90','9','0','50.00000','49.99630','637449269542677336.txt','637449269542677336.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('214','90','10','0','50.00000','49.99510','637449270136913369.txt','637449270136913369.bmp','payal.kate','2020-12-30 12:10:40');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('215','93','1','0','10.00000','9.99999','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('216','93','2','0','10.00000','9.99999','637449396180669710.txt','637449396180669710.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('217','93','3','0','10.00000','9.99999','637449397178489330.txt','637449397178489330.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('218','93','4','0','10.00000','10.00001','637449397235271146.txt','637449397235271146.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('219','93','5','0','10.00000','10.00000','637449397374598787.txt','637449397374598787.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('220','93','6','0','10.00000','9.99998','637449397520609171.txt','637449397520609171.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('221','93','7','0','10.00000','9.99998','637449397520609171.txt','637449397520609171.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('222','93','8','0','10.00000','10.00002','637449397662744704.txt','637449397662744704.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('223','93','9','0','10.00000','10.00000','637449397787096921.txt','637449397787096921.bmp','payal.kate','2020-12-30 15:47:05');

INSERT INTO calibrationlineobsmass (RecId, RefRecId, LineId, Type, StWeight, ObsMass, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('224','93','10','0','10.00000','10.00000','637449397787096921.txt','637449397787096921.bmp','payal.kate','2020-12-30 15:47:05');


CREATE TABLE `calibrationposition` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
  `RefRecId` bigint(20) NOT NULL,
  `LineId` bigint(20) NOT NULL,
  `Type` int(11) NOT NULL,
  `PositionWeight` varchar(250) NOT NULL,
  `StWeight` decimal(28,5) NOT NULL,
  `ActualMass` decimal(28,5) NOT NULL,
  `Tfile` varchar(250) NOT NULL,
  `Ifile` varchar(250) NOT NULL,
  `ObsMass` decimal(28,5) NOT NULL,
  `CreatedBy` varchar(70) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;


INSERT INTO calibrationposition (RecId, RefRecId, LineId, Type, PositionWeight, StWeight, ActualMass, Tfile, Ifile, ObsMass, CreatedBy, CreatedDate) VALUES ('61','89','1','0','centere','100.00015','199.99960','637449221417911181.txt','637449221417911181.bmp','99.99945','analysis','2020-12-30 11:19:22');

INSERT INTO calibrationposition (RecId, RefRecId, LineId, Type, PositionWeight, StWeight, ActualMass, Tfile, Ifile, ObsMass, CreatedBy, CreatedDate) VALUES ('62','89','2','0','place at "1"','100.00015','199.99960','637449221417911181.txt','637449221417911181.bmp','99.99945','analysis','2020-12-30 11:19:22');

INSERT INTO calibrationposition (RecId, RefRecId, LineId, Type, PositionWeight, StWeight, ActualMass, Tfile, Ifile, ObsMass, CreatedBy, CreatedDate) VALUES ('63','89','3','0','place at "2"','100.00015','199.99960','637449221417911181.txt','637449221417911181.bmp','99.99945','analysis','2020-12-30 11:19:22');

INSERT INTO calibrationposition (RecId, RefRecId, LineId, Type, PositionWeight, StWeight, ActualMass, Tfile, Ifile, ObsMass, CreatedBy, CreatedDate) VALUES ('64','89','4','0','place at "3"','100.00015','199.99960','637449221417911181.txt','637449221417911181.bmp','99.99945','analysis','2020-12-30 11:19:22');

INSERT INTO calibrationposition (RecId, RefRecId, LineId, Type, PositionWeight, StWeight, ActualMass, Tfile, Ifile, ObsMass, CreatedBy, CreatedDate) VALUES ('65','89','5','0','place at "4"','100.00015','199.99960','637449221417911181.txt','637449221417911181.bmp','99.99945','analysis','2020-12-30 11:19:22');


CREATE TABLE `monthlycalibrationdetails` (
  `RecId` bigint(20) NOT NULL AUTO_INCREMENT,
  `RefRecId` bigint(20) NOT NULL,
  `AverageMass` decimal(28,5) DEFAULT NULL,
  `SD1` decimal(28,5) DEFAULT NULL,
  `SD2` decimal(28,5) DEFAULT NULL,
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
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;


INSERT INTO monthlycalibrationdetails (RecId, RefRecId, AverageMass, SD1, SD2, AcceptanceCriteria, CompliesAcceptanceCriteria, DiffAcceptanceCriteria, CompliesAcceptanceCriteria2, CompliesAcceptanceCriteria3, DisplayWeightA, DisplayWeightB, Sensitivity, AcceptanceCriteriaDetail, TfileA, IfileA, TfileB, IfileB, CreatedBy, CreatedDate) VALUES ('21','89','199.99960','0.41000','0.00000','NMT 0.10%','2','0.05g','2','0','199.99960','199.99960','FAILS','The weight displayed after taking out 200g weight should not be more than 0.1g.','637449221417911181.txt','637449221417911181.bmp','637449221417911181.txt','637449221417911181.bmp','analysis','2020-12-30 11:18:05');

INSERT INTO monthlycalibrationdetails (RecId, RefRecId, AverageMass, SD1, SD2, AcceptanceCriteria, CompliesAcceptanceCriteria, DiffAcceptanceCriteria, CompliesAcceptanceCriteria2, CompliesAcceptanceCriteria3, DisplayWeightA, DisplayWeightB, Sensitivity, AcceptanceCriteriaDetail, TfileA, IfileA, TfileB, IfileB, CreatedBy, CreatedDate) VALUES ('22','90','49.99618','3.79470','0.00038','NMT 0.10%','2','','0','0','0.00000','0.00000','','','','','','','payal.kate','2020-12-30 12:10:40');

INSERT INTO monthlycalibrationdetails (RecId, RefRecId, AverageMass, SD1, SD2, AcceptanceCriteria, CompliesAcceptanceCriteria, DiffAcceptanceCriteria, CompliesAcceptanceCriteria2, CompliesAcceptanceCriteria3, DisplayWeightA, DisplayWeightB, Sensitivity, AcceptanceCriteriaDetail, TfileA, IfileA, TfileB, IfileB, CreatedBy, CreatedDate) VALUES ('23','93','10.00000','0.41000','0.00001','NMT 0.10%','2','','0','0','0.00000','0.00000','','','','','','','payal.kate','2020-12-30 15:47:05');
