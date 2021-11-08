

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

