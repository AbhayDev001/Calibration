

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


INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('29','1','ADD_BW_001','','5','','10','','','Sartorius','MSA--00M','1','1','2020-04-22 00:00:00','2020-04-23 00:00:00','0000-00-00 00:00:00','','analysis','2020-04-22 13:00:03','verify','2020-04-22 13:02:31','','','20','1587540260','2020-04-22 13:00:03','0');

INSERT INTO calibration (RecId, CalibrationId, WeightBoxId, CalibrationName, InstrumentId, InstrumentName, DeviceId, DeviceName, DeviceType, Make, Model, SpiritLevel, Internal, CalibrationDate, CalibrationNextDate, CalibrationNextDate1, DailyCalibrationNextDate, PerformedBy, PerformDate, VerifiedBy, VerifiedDate, AproovelBy, AproovelDate, Status, FormId, CreatedDate, RePerform) VALUES ('30','1','123','','5','','10','','','Sartorius','MSA--00M','1','1','2020-04-29 00:00:00','2020-04-30 00:00:00','0000-00-00 00:00:00','','analysis','2020-04-29 14:25:02','','','','','10','1588150119','2020-04-29 14:25:02','0');

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


INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('66','0','29','10','ok','0','verify','2020-04-22 13:02:25');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('67','0','29','20','Form : 1587540260 is Verify by verify at 22/04/2020 01:02 PM.','0','verify','2020-04-22 13:02:31');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('68','0','29','20','Saved','0','verify','2020-04-29 14:29:23');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('69','0','29','20','Saved','0','verify','2020-04-29 14:29:33');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('70','0','30','10','Saved','0','govind.jijala','2020-04-29 14:31:14');

INSERT INTO calibrationcomment (RecId, LineRecId, RefRecId, CalibrationStatus, Comments, Type, CreatedBy, CreatedDate) VALUES ('164','640','118','10','Line 1 : test demo','1','analysis','2021-01-28 18:51:41');


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


INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('105','29','1','0','1.0000','1.0020','1.00140','0.00060','0.00100','1','637231569293402257.txt','637231569293402257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('106','29','2','0','0.0200','2.0050','2.00340','0.00160','0.00200','1','637231569695171257.txt','637231569695171257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('107','29','3','0','5.0000','5.0050','5.00280','0.00220','0.00500','1','637231570145144257.txt','637231570145144257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('108','29','4','0','10.0000','10.0010','9.99610','0.00490','0.01000','1','637231570414444257.txt','637231570414444257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('109','29','5','0','20.0000','19.9910','19.99240','-0.00140','0.02000','1','637231570773812257.txt','637231570773812257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('110','29','6','0','50.0000','49.9990','50.00550','-0.00650','0.05000','1','637231565974520257.txt','637231565974520257.bmp','analysis','2020-04-22 13:00:03');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('111','30','1','0','1.0000','1.0020','1.00140','0.00060','0.00100','1','637237668716039503.txt','637237668716039503.bmp','analysis','2020-04-29 14:25:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('112','30','2','0','0.0200','2.0050','2.00270','0.00230','0.00200','2','637237669117243079.txt','637237669117243079.bmp','analysis','2020-04-29 14:25:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('113','30','3','0','5.0000','5.0050','5.00240','0.00260','0.00500','1','637237669770731268.txt','637237669770731268.bmp','analysis','2020-04-29 14:25:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('114','30','4','0','10.0000','10.0010','9.99580','0.00520','0.01000','1','637237670144971672.txt','637237670144971672.bmp','analysis','2020-04-29 14:25:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('115','30','5','0','20.0000','19.9910','19.99160','-0.00060','0.02000','1','637237670482626844.txt','637237670482626844.bmp','analysis','2020-04-29 14:25:02');

INSERT INTO calibrationline (RecId, RefRecId, LineId, Type, StWeight, CertWeight, DispWeight, DiffWeight, AccpWeight, Result, Tfile, Ifile, CreatedBy, CreatedDate) VALUES ('116','30','6','0','50.0000','49.9990','50.00600','-0.00700','0.05000','1','637237670773462710.txt','637237670773462710.bmp','analysis','2020-04-29 14:25:02');

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

