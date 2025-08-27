-- Maid Hiring Management System Database
-- Fresh SQL with Pending & Rejected tables included

CREATE DATABASE IF NOT EXISTS mhmsdb;
USE mhmsdb;

-- -----------------------------
-- Table structure for tbladmin
-- -----------------------------
DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `Password`, `Email`, `ContactNumber`) VALUES
(1, 'System Admin', 'admin', 'admin123', 'admin@mhms.com', 9876543210);

-- -----------------------------
-- Table structure for tblcategory
-- -----------------------------
DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `Description`) VALUES
(1, 'Housekeeping', 'Cleaning and household help'),
(2, 'Cooking', 'Daily cooking services'),
(3, 'Childcare', 'Taking care of children');

-- -----------------------------
-- Table structure for tblmaid
-- -----------------------------
DROP TABLE IF EXISTS `tblmaid`;
CREATE TABLE `tblmaid` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` int(11) DEFAULT NULL,
  `MaidName` varchar(200) DEFAULT NULL,
  `MaidContactNo` bigint(10) DEFAULT NULL,
  `MaidEmail` varchar(200) DEFAULT NULL,
  `MaidGender` varchar(50) DEFAULT NULL,
  `MaidAdd` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblmaid` (`ID`, `Category`, `MaidName`, `MaidContactNo`, `MaidEmail`, `MaidGender`, `MaidAdd`, `DOB`, `Status`) VALUES
(1, 1, 'Lakshmi Devi', 9876543211, 'lakshmi@example.com', 'Female', 'Bangalore, Karnataka', '1995-04-12', 'Approved'),
(2, 2, 'Ramesh Kumar', 9876543212, 'ramesh@example.com', 'Male', 'Hyderabad, Telangana', '1990-07-19', 'Approved');

-- -----------------------------
-- Table structure for tblmaidbooking
-- -----------------------------
DROP TABLE IF EXISTS `tblmaidbooking`;
CREATE TABLE `tblmaidbooking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaidID` int(11) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `BookingDate` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblmaidbooking` (`ID`, `MaidID`, `UserName`, `BookingDate`, `Status`) VALUES
(1, 1, 'Arjun Singh', '2025-08-01', 'Confirmed'),
(2, 2, 'Priya Sharma', '2025-08-03', 'Pending');

-- -----------------------------
-- Table structure for tblpendingmaids
-- -----------------------------
DROP TABLE IF EXISTS `tblpendingmaids`;
CREATE TABLE `tblpendingmaids` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` int(11) DEFAULT NULL,
  `MaidName` varchar(200) DEFAULT NULL,
  `MaidContactNo` bigint(10) DEFAULT NULL,
  `MaidEmail` varchar(200) DEFAULT NULL,
  `MaidGender` varchar(50) DEFAULT NULL,
  `MaidAdd` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblpendingmaids` (`ID`, `Category`, `MaidName`, `MaidContactNo`, `MaidEmail`, `MaidGender`, `MaidAdd`, `DOB`) VALUES
(1, 1, 'Sita Kumari', 9876543213, 'sita@example.com', 'Female', 'Delhi, India', '1998-05-21'),
(2, 2, 'Anjali Reddy', 9876543214, 'anjali@example.com', 'Female', 'Hyderabad, India', '1996-11-02');

-- -----------------------------
-- Table structure for tblrejectedmaids
-- -----------------------------
DROP TABLE IF EXISTS `tblrejectedmaids`;
CREATE TABLE `tblrejectedmaids` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` int(11) DEFAULT NULL,
  `MaidName` varchar(200) DEFAULT NULL,
  `MaidContactNo` bigint(10) DEFAULT NULL,
  `MaidEmail` varchar(200) DEFAULT NULL,
  `MaidGender` varchar(50) DEFAULT NULL,
  `MaidAdd` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblrejectedmaids` (`ID`, `Category`, `MaidName`, `MaidContactNo`, `MaidEmail`, `MaidGender`, `MaidAdd`, `DOB`) VALUES
(1, 3, 'Meena Devi', 9876543215, 'meena@example.com', 'Female', 'Chennai, Tamil Nadu', '1992-12-15'),
(2, 1, 'Radha Sharma', 9876543216, 'radha@example.com', 'Female', 'Mumbai, Maharashtra', '1994-09-08');
