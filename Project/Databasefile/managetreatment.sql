-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 09:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managetreatment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(4) NOT NULL,
  `DateAppoint` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TimeAppoint` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Reason` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(1) NOT NULL,
  `PetID` int(3) NOT NULL,
  `VetID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `DateAppoint`, `TimeAppoint`, `Reason`, `Status`, `PetID`, `VetID`) VALUES
(100014, '2020-03-27', '07:20', 'ดูอาการ', 1, 13, 27),
(100015, '2020-04-02', '17:04', 'นัดดูอาการ', 1, 13, 27),
(100016, '2020-03-31', '11:11', 'นัดดูความคืบหน้าของอาการ', 2, 13, 27),
(100017, '2020-03-30', '09:20', 'ดูอาการ', 1, 13, 27),
(100019, '2020-04-04', '11:11', 'ฉีดวัคซีนเฝ้าระวัง', 2, 16, 27),
(100020, '2020-04-04', '00:22', 'ฉีดยา', 2, 13, 27),
(100021, '2020-04-10', '11:05', 'ดูอาการหลังจากฉีดวัคซีนไป', 1, 17, 27),
(100022, '2020-04-11', '11:30', 'ดูอาการหลังจากฉีดวัคซีนไปได้ซักระยะแล้ว', 2, 17, 27),
(100023, '2020-04-11', '11:10', 'ดูอาการหลังจากฉีดวัคซีน', 2, 18, 27);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `DiseaseID` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TreatmentType` int(1) DEFAULT NULL,
  `Syndrome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TypeDisease` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`DiseaseID`, `Name`, `TreatmentType`, `Syndrome`, `TypeDisease`) VALUES
('000000', 'ไม่เป็นโรคใดๆ', NULL, NULL, NULL),
('000001', 'ปอดบวม', 1, 'ระบบทางเดินหายใจ', 0),
('000002', 'พิษสุนัขบ้า', 1, 'ระบบประสาท', 2),
('000004', 'ตาแดง', 1, 'โรคตา', 0),
('000015', 'มดลูกอักเสบ (เป็นหนอง)', 2, 'ระบบสืบพันธุ์', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dispensetransection`
--

CREATE TABLE `dispensetransection` (
  `DtID` int(11) NOT NULL,
  `ListID` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TreatmentID` int(4) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dispensetransection`
--

INSERT INTO `dispensetransection` (`DtID`, `ListID`, `TreatmentID`, `amount`) VALUES
(89, '000001', 35, 11),
(90, '000002', 35, 1),
(95, '000001', 34, 1),
(96, '000001', 39, 1),
(97, '000001', 40, 1),
(98, '000008', 41, 1),
(100, '000002', 42, 1),
(101, '000001', 43, 1),
(103, '000001', 44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `drugservicecatagory`
--

CREATE TABLE `drugservicecatagory` (
  `DcID` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugservicecatagory`
--

INSERT INTO `drugservicecatagory` (`DcID`, `Name`, `Type`) VALUES
('001', 'วัคซีน', 3),
('002', 'ผ่าตัด', 2),
('003', 'ยาแก้ปวด', 1),
('004', 'เย็บแผล', 2),
('005', 'ยาฉีด', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drugserviceinfo`
--

CREATE TABLE `drugserviceinfo` (
  `DrugID` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Properties` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `instruction` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DcID` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `manufactid` char(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugserviceinfo`
--

INSERT INTO `drugserviceinfo` (`DrugID`, `Name`, `Properties`, `instruction`, `extra`, `DcID`, `manufactid`) VALUES
('001', 'Rabies', '-', '-', '-', '001', '001'),
('002', 'Canine Distemper', '-', '-', '-', '001', '001'),
('003', 'Infectious Canine Hepatitis', '-', '-', '-', '001', '001'),
('004', 'Leptospirosis', '-', '-', '-', '001', '001'),
('005', 'Canine Parvovirus Disease', '-', '-', '-', '001', '001'),
('006', 'Canine Coronavirus Infections', '-', '-', '-', '001', '001'),
('007', 'Canine Parainfluenza Virus Inf', '-', '-', '-', '001', '001'),
('008', 'Feline panleukopenia', '-', '-', '-', '001', '001'),
('009', 'Feline Infectious Rhinotrachei', '-', '-', '-', '001', '001'),
('010', 'Feline Calicivirosis', '-', '-', '-', '001', '001'),
('011', 'Chlamydiasis', '-', '-', '-', '001', '001'),
('012', 'Feline leukemia', '-', '-', '-', '001', '001'),
('013', 'ผ่าคลอด', '-', '-', '-', '002', '002'),
('014', 'พาราเซตามอล', 'แก้ปวด', 'รับประทาน', '-', '003', '002'),
('016', 'เย็บแผลด้วยไหมละลาย', '-', '-', '-', '004', '002');

-- --------------------------------------------------------

--
-- Table structure for table `drugservicelist`
--

CREATE TABLE `drugservicelist` (
  `ListID` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `DshID` int(1) NOT NULL,
  `DrugID` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Balance` int(4) NOT NULL,
  `unit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugservicelist`
--

INSERT INTO `drugservicelist` (`ListID`, `DshID`, `DrugID`, `Balance`, `unit`, `price`) VALUES
('000001', 1, '001', 79, 'ขวด', 500.00),
('000002', 1, '002', 97, 'เข็ม', 250.00),
('000008', 1, '013', 999, 'ครั้ง', 5000.00),
('000009', 1, '014', 99, 'เม็ด', 10.00),
('000010', 1, '016', 1000, 'ครั้ง', 500.00),
('000050', 2, '008', 100, 'ขวด', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `drugservicestorehouse`
--

CREATE TABLE `drugservicestorehouse` (
  `DshID` int(1) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Connumber` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugservicestorehouse`
--

INSERT INTO `drugservicestorehouse` (`DshID`, `Name`, `Address`, `Connumber`) VALUES
(1, 'คลังยาที่1', 'ข้างโกดัง', '0841516564'),
(2, 'คลังยาที่2', 'ข้างห้องโถง', '0875465454');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `ManufactID` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `CompanyName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Contractname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CompanyAddress` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ContractNumber` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`ManufactID`, `CompanyName`, `Contractname`, `CompanyAddress`, `ContractNumber`) VALUES
('001', 'โกดักกี้ จำกัด', 'คุณบุญมา', 'กรุงเทพ', '0841654984'),
('002', 'โรงพยาบาลสัตว์หมออสุรศักดิ์', '-', '-', '07436493'),
('003', 'ไทลินอล', 'เก๋', 'กรุงเทพ', '0811845555');

-- --------------------------------------------------------

--
-- Table structure for table `ownerpet`
--

CREATE TABLE `ownerpet` (
  `OwnerPetID` int(3) NOT NULL,
  `UserID` int(3) NOT NULL,
  `PetID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ownerpet`
--

INSERT INTO `ownerpet` (`OwnerPetID`, `UserID`, `PetID`) VALUES
(21, 29, 13),
(23, 29, 15),
(24, 29, 16),
(25, 32, 16),
(26, 32, 13),
(27, 36, 17),
(28, 38, 18);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetID` int(3) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Species` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` int(1) NOT NULL,
  `birthday` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Sterilization` int(1) NOT NULL,
  `PetTypeID` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetID`, `Name`, `Species`, `Gender`, `birthday`, `Sterilization`, `PetTypeID`) VALUES
(13, 'ไซม่อน', 'บีเกิ้ล', 1, '2019-10-03', 2, '09'),
(15, 'มีมี้', 'ชิสุ', 2, '2020-03-04', 2, '09'),
(16, 'ชีต้า', 'เปอร์เซีย', 2, '2020-01-06', 1, '10'),
(17, 'แอนนี่', 'ชิบะอีนุ', 2, '2020-02-12', 1, '09'),
(18, 'แอนดี้', 'เปอร์เซีย', 1, '2020-02-05', 2, '10');

-- --------------------------------------------------------

--
-- Table structure for table `pettype`
--

CREATE TABLE `pettype` (
  `PetTypeID` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pettype`
--

INSERT INTO `pettype` (`PetTypeID`, `Name`) VALUES
('02', 'โค'),
('03', 'ม้า'),
('04', 'ช้าง'),
('05', 'กระบือ'),
('06', 'แพะ'),
('07', 'แกะ'),
('08', 'สุกร'),
('09', 'สุนัข'),
('10', 'แมว');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `TreatmentID` int(4) NOT NULL,
  `DateTreatment` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `chiefcom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight1` float(5,2) DEFAULT NULL,
  `vitalsign` int(1) DEFAULT NULL,
  `temperature` float(5,2) DEFAULT NULL,
  `RR` int(2) DEFAULT NULL,
  `CRT` int(2) DEFAULT NULL,
  `HR` int(2) DEFAULT NULL,
  `dehydrate` int(2) DEFAULT NULL,
  `BCS` int(1) DEFAULT NULL,
  `urination` int(1) DEFAULT NULL,
  `urdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `defecation` int(1) DEFAULT NULL,
  `dedetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prexdisorder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prextreatment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appetite` int(1) DEFAULT NULL,
  `thrist` int(1) DEFAULT NULL,
  `weight2` int(1) DEFAULT NULL,
  `behavior` int(1) DEFAULT NULL,
  `adverseeffect` int(1) DEFAULT NULL,
  `aedetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newprob` int(1) DEFAULT NULL,
  `newprobdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geappear` int(1) DEFAULT NULL,
  `gedetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eye` int(1) DEFAULT NULL,
  `eyedetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nose` int(1) DEFAULT NULL,
  `nosedetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mouth` int(1) DEFAULT NULL,
  `mouthdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ear` int(1) DEFAULT NULL,
  `eardetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lymphnode` int(1) DEFAULT NULL,
  `lymdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `larynxandtrac` int(1) DEFAULT NULL,
  `larydetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oropharynx` int(1) DEFAULT NULL,
  `ordetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thorax` int(1) DEFAULT NULL,
  `thodetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abdominal` int(1) DEFAULT NULL,
  `abddetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skincoat` int(1) DEFAULT NULL,
  `skdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pergen` int(1) DEFAULT NULL,
  `perdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forelimb` int(1) DEFAULT NULL,
  `foredetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hindlimb` int(1) DEFAULT NULL,
  `hindetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gastroin` int(1) DEFAULT NULL,
  `gasdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urinarytract` int(1) DEFAULT NULL,
  `uridetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reproduct` int(1) DEFAULT NULL,
  `reprodetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `muscul` int(1) DEFAULT NULL,
  `musdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nervous` int(1) DEFAULT NULL,
  `nerdetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mental` int(1) DEFAULT NULL,
  `mentaldetail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `differential` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `labequip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finaldiagnosis` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finaldiagnosis2` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finaldiagnosis3` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `treatmentplan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clienteducation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BillNumber` int(4) DEFAULT NULL,
  `TotalPrice` float(8,2) DEFAULT NULL,
  `VetID` int(3) NOT NULL,
  `PetID` int(3) NOT NULL,
  `TreatmentRoomID` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`TreatmentID`, `DateTreatment`, `Status`, `chiefcom`, `weight1`, `vitalsign`, `temperature`, `RR`, `CRT`, `HR`, `dehydrate`, `BCS`, `urination`, `urdetail`, `defecation`, `dedetail`, `prexdisorder`, `prextreatment`, `appetite`, `thrist`, `weight2`, `behavior`, `adverseeffect`, `aedetail`, `newprob`, `newprobdetail`, `geappear`, `gedetail`, `eye`, `eyedetail`, `nose`, `nosedetail`, `mouth`, `mouthdetail`, `ear`, `eardetail`, `lymphnode`, `lymdetail`, `larynxandtrac`, `larydetail`, `oropharynx`, `ordetail`, `thorax`, `thodetail`, `abdominal`, `abddetail`, `skincoat`, `skdetail`, `pergen`, `perdetail`, `forelimb`, `foredetail`, `hindlimb`, `hindetail`, `gastroin`, `gasdetail`, `urinarytract`, `uridetail`, `reproduct`, `reprodetail`, `muscul`, `musdetail`, `nervous`, `nerdetail`, `mental`, `mentaldetail`, `differential`, `labequip`, `finaldiagnosis`, `finaldiagnosis2`, `finaldiagnosis3`, `treatmentplan`, `clienteducation`, `BillNumber`, `TotalPrice`, `VetID`, `PetID`, `TreatmentRoomID`) VALUES
(34, '2020-03-27', 4, 'หน้าซีดดูอิดโรยตาลอยๆ', 55.00, 28, 50.00, 39, 10, 25, 10, 1, 1, '', 1, '', 'หายใจอิดโรย', 'ไม่มี', 1, 1, 1, 1, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 2, NULL, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 'พิษสุนัขบ้า', 'วัคซีน', '000002', '', '', 'ฉีดวัคซีนและรอดูอาการ', 'พยายามอย่าให้สุนัขพักผ่อนเยอะๆ', 34, 500.00, 27, 13, '01'),
(35, '2020-03-30', 4, 'chif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 25500.00, 27, 13, '01'),
(39, '2020-04-01', 4, 'ซึมๆ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, 500.00, 27, 16, '01'),
(40, '2020-04-01', 4, 'เลือดออกตามไรฟัน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 500.00, 27, 13, '01'),
(41, '2020-04-09', 4, 'ปวดท้องคลอด', 50.00, 80, 38.00, 80, 60, 60, 60, 2, 1, '', 1, '', 'ร้องตลอดเวลา', '-', 1, 1, 3, 3, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, NULL, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', '-', 'แลปผ่าตัด', '000000', '', '', 'ผ่าคลอดด้วย', '-', 41, 5000.00, 27, 15, '01'),
(42, '2020-04-09', 4, 'ซึมๆ', 50.00, 80, 38.00, 80, 50, 80, 80, 3, 1, '', 1, '', 'ตาลอยๆ', '-', 1, 1, 3, 3, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, NULL, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 'พิษสุนัขบ้า', 'ฉีดวัคซีน', '000002', '', '', 'ฉีดวัคซีน', 'ให้กลับบ้าน', 42, 250.00, 27, 17, '01'),
(43, '2020-04-09', 4, 'กินข้าวกินน้ำน้อยลง', 50.00, 80, 41.00, 80, 50, 60, 50, 3, 1, '', 1, '', 'มีไข้เล็กน้อย', 'ฉีดวัคซีน', 3, 1, 1, 1, 1, '', 1, '', 1, '', 2, 'ม่านตาขยายกว้างกว่าปกติ', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, NULL, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 2, 'มีอารมณ์หงุดหงิด', 'พิษสุนัขบ้า', 'เข็มฉีดยา', '000002', '', '', 'ฉีดวัคซีนป้องกันระยะเริ่มต้น', 'พยายามสังเกตุอาการหลังจากการรักษาถ้าไม่ดีขึ้นรีบพากลับมาพบหมอโดยด่วนครับ', 43, 500.00, 27, 17, '01'),
(44, '2020-04-10', 3, 'กินข้าวกินน้ำน้อยลง', 50.00, 60, 41.00, 70, 50, 60, 20, 3, 1, '', 1, '', 'มีไข้เล็กน้อย', '-', 1, 1, 1, 1, 1, '', 1, '', 1, '', 2, 'ม่านตาขยายกว้างกว่าปกติ', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, NULL, 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 2, 'ดุไม่ยอมให้ใครแตะต้อง', 'พิษสุนัขบ้า', 'เข็มฉีดยา', '000002', '', '', 'จะฉีดวัคซีนให้กับสัตว์ป่วยแล้วรอดูอาการหลังจากนี้', 'ให้สังเกตุอาการหลังจากฉีดวัคซีนไปถ้าผิดปกติก็นำกลับมาโดยด่วน', 44, 500.00, 27, 18, '01');

-- --------------------------------------------------------

--
-- Table structure for table `treatmentroom`
--

CREATE TABLE `treatmentroom` (
  `TreatmentRoomID` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VetID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatmentroom`
--

INSERT INTO `treatmentroom` (`TreatmentRoomID`, `Name`, `VetID`) VALUES
('01', 'ห้องตรวจที่1', 27),
('02', 'ห้องตรวจที่2', 34),
('03', 'ห้องตรวจที่3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(3) NOT NULL,
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Hnumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Village` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alley` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Road` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `District` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Canton` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Postnumber` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `Hpnumber` char(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phonenumber` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Pwd`, `level`, `Status`, `Name`, `Surname`, `Hnumber`, `Village`, `Alley`, `Road`, `District`, `Canton`, `Province`, `Postnumber`, `Hpnumber`, `Phonenumber`, `Email`) VALUES
(26, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 1, 1, 'ชัยณรงค์', 'ภูมิมิ', '-', '-', '-', '-', '-', '-', 'สงขลา', '-', '074564565', '0882260867', 'chai@gmail.com'),
(27, 'vet', '*C227C01CD0795D9BBE283117B43FB5DE4DDA0E72', 2, 1, 'สิริศักดิ์', 'กิตติเจริญกุล', '100', '-', 'เทียนจ่ออุทิศ3', 'กาญจนวณิชย์', 'หาดใหญ่', 'หาดใหญ่', 'เพชรบุรี', '90110', '084611151', '0594989849', 'siri@gmail.com'),
(28, 'officer', '*BD0B1161415CD1534B2A4CD355AF9407858C5CA9', 3, 1, 'นิโรมา', 'เปาโล', '99', '99', '-', 'กาญจนวณิชย์', 'หาดใหญ่', 'หาดใหญ่', 'สงขลา', '90110', '084545616', '0498494984', 'niro@gmail.com'),
(29, 'member', '*F76A0292E763BD108EA5492E25EC051F7E23E6E9', 4, 1, 'ชัยยุทธ์', 'ก้องประวัติกูล', '22', 'กิตติกูล', '222', 'กาญจนวณิชย์', 'หาดใหญ่', 'หาดใหญ่', 'สงขลา', '90110', '076156165', '0856416521', 'benzcyber53@gmail.com'),
(32, 'member2', '*2FAF8D7F69BBF9784796EA6D378EF19AD0D73231', 4, 1, 'กนกพจน์', 'มหาชัย', '99', '-', '-', 'เพชรเกษม', 'หาดใหญ่', 'หาดใหญ่', 'สงขลา', '90110', '084121315', '0845646516', 'kanok@gmail.com'),
(33, 'admin2', '*0E6FD44C7B722784DAE6E67EF8C06FB1ACB3E0A6', 1, 1, 'ชาติชาย', 'ไกลภพ', '-', '-', '-', '-', 'สะเดา', 'สะเดา', 'สงขลา', '90120', '084546546', '0846548676', 'chatchai@gmail.com'),
(34, 'vet2', '*6D7616F65F16AD8C661E576FA2B7D0DE457D8039', 2, 1, 'สมชาย', 'ไทยเมือง', '22', '55', '55', 'กาญเทพ', 'สะเดา', 'สะเดา', 'สงขลา', '90120', '074212121', '0894564312', 'somchai@gmail.com'),
(35, 'vet3', '*45198C565A94F17E11A6F568E29CF75A3939B635', 2, 2, 'เอก', 'สองนาม', '-', '-', '-', '-', '-', '-', 'กระบี่', '95232', '058775456', '0789754515', 'aa@gmail.com'),
(36, 'member3', '*A4B6157319038724E3560894F7F932C8886EBFCF', 4, 1, 'ทองตรี', 'สามทอง', '-', '-', '-', '-', '-', '-', 'สงขลา', '90110', '087454654', '0874564564', 'th@gmail.com'),
(37, 'officer3', '*7FF65BB36BC60DD0CC2153874DEDAECC84999717', 3, 1, 'เจนนี่', 'นัดดาทอง', '-', '-', '-', '-', '-', '-', 'กรุงเทพมหานคร', '90110', '084651651', '0894564156', 'dd@gmail.com'),
(38, 'member5', '*1C97E07C905BC36E6030E8979B233D84859BC419', 4, 1, 'กิตติกูล', 'ทองเรือง', '-', '-', '-', '-', '-', '-', 'สงขลา', '90110', '074564654', '0845645646', 'member@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `VettFK` (`VetID`),
  ADD KEY `PetFKKK` (`PetID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`DiseaseID`);

--
-- Indexes for table `dispensetransection`
--
ALTER TABLE `dispensetransection`
  ADD PRIMARY KEY (`DtID`),
  ADD KEY `DrugserviceListFK` (`ListID`),
  ADD KEY `TreatmentFK` (`TreatmentID`);

--
-- Indexes for table `drugservicecatagory`
--
ALTER TABLE `drugservicecatagory`
  ADD PRIMARY KEY (`DcID`);

--
-- Indexes for table `drugserviceinfo`
--
ALTER TABLE `drugserviceinfo`
  ADD PRIMARY KEY (`DrugID`),
  ADD KEY `DrugserviceCatagoryFK` (`DcID`),
  ADD KEY `ManufactFK` (`manufactid`);

--
-- Indexes for table `drugservicelist`
--
ALTER TABLE `drugservicelist`
  ADD PRIMARY KEY (`ListID`),
  ADD KEY `DrugservicestorehouseFK` (`DshID`),
  ADD KEY `DrugInfoFK` (`DrugID`);

--
-- Indexes for table `drugservicestorehouse`
--
ALTER TABLE `drugservicestorehouse`
  ADD PRIMARY KEY (`DshID`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`ManufactID`);

--
-- Indexes for table `ownerpet`
--
ALTER TABLE `ownerpet`
  ADD PRIMARY KEY (`OwnerPetID`),
  ADD KEY `PetFK` (`PetID`),
  ADD KEY `UserFK` (`UserID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `PetTypeFK` (`PetTypeID`);

--
-- Indexes for table `pettype`
--
ALTER TABLE `pettype`
  ADD PRIMARY KEY (`PetTypeID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`TreatmentID`),
  ADD KEY `TreatmentRoomFK` (`TreatmentRoomID`),
  ADD KEY `PettFK` (`PetID`),
  ADD KEY `VetFK` (`VetID`);

--
-- Indexes for table `treatmentroom`
--
ALTER TABLE `treatmentroom`
  ADD PRIMARY KEY (`TreatmentRoomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100024;

--
-- AUTO_INCREMENT for table `dispensetransection`
--
ALTER TABLE `dispensetransection`
  MODIFY `DtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `ownerpet`
--
ALTER TABLE `ownerpet`
  MODIFY `OwnerPetID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PetID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `TreatmentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `PetFKKK` FOREIGN KEY (`PetID`) REFERENCES `pet` (`PetID`),
  ADD CONSTRAINT `VettFK` FOREIGN KEY (`VetID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `dispensetransection`
--
ALTER TABLE `dispensetransection`
  ADD CONSTRAINT `DrugserviceListFK` FOREIGN KEY (`ListID`) REFERENCES `drugservicelist` (`ListID`),
  ADD CONSTRAINT `TreatmentFK` FOREIGN KEY (`TreatmentID`) REFERENCES `treatment` (`TreatmentID`);

--
-- Constraints for table `drugserviceinfo`
--
ALTER TABLE `drugserviceinfo`
  ADD CONSTRAINT `DrugserviceCatagoryFK` FOREIGN KEY (`DcID`) REFERENCES `drugservicecatagory` (`DcID`),
  ADD CONSTRAINT `ManufactFK` FOREIGN KEY (`manufactid`) REFERENCES `manufacturer` (`ManufactID`);

--
-- Constraints for table `drugservicelist`
--
ALTER TABLE `drugservicelist`
  ADD CONSTRAINT `DrugInfoFK` FOREIGN KEY (`DrugID`) REFERENCES `drugserviceinfo` (`DrugID`),
  ADD CONSTRAINT `DrugservicestorehouseFK` FOREIGN KEY (`DshID`) REFERENCES `drugservicestorehouse` (`DshID`);

--
-- Constraints for table `ownerpet`
--
ALTER TABLE `ownerpet`
  ADD CONSTRAINT `PetFK` FOREIGN KEY (`PetID`) REFERENCES `pet` (`PetID`),
  ADD CONSTRAINT `UserFK` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `PetTypeFK` FOREIGN KEY (`PetTypeID`) REFERENCES `pettype` (`PetTypeID`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `PettFK` FOREIGN KEY (`PetID`) REFERENCES `pet` (`PetID`),
  ADD CONSTRAINT `TreatmentRoomFK` FOREIGN KEY (`TreatmentRoomID`) REFERENCES `treatmentroom` (`TreatmentRoomID`),
  ADD CONSTRAINT `VetFK` FOREIGN KEY (`VetID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
