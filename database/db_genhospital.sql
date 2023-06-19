-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 01:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_genhospital`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_get` (IN `iid` INT(100))   SELECT A.appointment_date,
       A.appointment_time,
       CONCAT(B.firstname, " ", B.lastname) AS 'full_name',
       A.message
FROM tbl_appointment A
INNER JOIN tbl_login_user B ON B.id = A.patient_id
WHERE A.doctor_id = iid
      AND A.active AND
      A.appointment_date = CURDATE()
ORDER BY A.appointment_date ASC,
         A.appointment_time ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_details_get` (IN `user_id` INT)   select 
	A.description, 
	A.contact_number, 
	A.email, 
	A.birthdate,
    A.specialize_id,
    B.value_day
FROM tbl_doctor_details A
INNER JOIN tbl_max_patients B ON B.doctor_id = A.login_id
WHERE A.login_id = user_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_get` ()   SELECT  A.login_id,
        CONCAT( B.firstname, " ",  B.lastname) AS full_name,
        C.description
FROM `tbl_doctor_details` A
INNER JOIN `tbl_login_user` B ON B.id = A.login_id
INNER JOIN `tbl_specialize` C ON C.id = A.specialize_id
INNER JOIN `tbl_max_patients` D ON  D.doctor_id = B.id
WHERE  D.value_day <> 0  AND
A.active = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_appointment` (IN `Appdate` DATE, IN `Apptime` TIME, IN `Patientid` INT(100), IN `Selectdoctorid` INT(100), IN `Appmessage` VARCHAR(255))   INSERT INTO `tbl_appointment`
(`appointment_date`, `appointment_time`, `patient_id`, `doctor_id`, `message`)
VALUES (Appdate, Apptime, Patientid, Selectdoctorid, Appmessage)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_profile` (IN `prof_firstname` VARCHAR(255), IN `prof_lastname` VARCHAR(255), IN `email` VARCHAR(255), IN `birthdate` DATE, IN `contact_number` VARCHAR(255), IN `bio` VARCHAR(255), IN `usertype` INT, IN `IID` INT, IN `specializeid` INT, IN `valuepatient` INT)   BEGIN
   DECLARE recordCount INT;
   DECLARE patientrecordCount INT;
  UPDATE `tbl_login_user` 
  SET `firstname`= prof_firstname,
      `lastname`= prof_lastname 
  WHERE `id` = iid;
  
  
  -- PATIENT
  IF usertype = 3 THEN
    -- Count the number of records
    SELECT COUNT(*) INTO recordCount 
    FROM `tbl_patient_table`
    where `login_id` = iid;
    
     IF recordCount > 0 THEN
         UPDATE `tbl_patient_table` 
         SET `contact_number`= contact_number,
             `email`= email,
             `birthdate`= birthdate,
             `description`= bio
          WHERE `login_id` = iid;
      ELSE
         INSERT INTO `tbl_patient_table`(`description`, `contact_number`, `email`, `birthdate`,`login_id`) 
         VALUES (bio, contact_number, email, birthdate, iid);
      END IF;
  

     
  ELSEIF usertype = 2 THEN
   -- Count the number of records
    SELECT COUNT(*) INTO recordCount 
    FROM `tbl_doctor_details`
    where `login_id` = iid;
    
    SELECT COUNT(*) INTO patientrecordCount 
    FROM `tbl_max_patients`
    where `doctor_id` = iid;
    

     IF recordCount > 0 AND patientrecordCount > 0  THEN
         UPDATE `tbl_doctor_details` 
         SET `contact_number`= contact_number,
             `email`= email,
             `birthdate`= birthdate,
             `description`= bio,
             `specialize_id` = specializeid
          WHERE `login_id` = iid;
          
         UPDATE `tbl_max_patients` 
		 SET `value_day`=valuepatient,
        `doctor_id`=iid
	  	 WHERE `doctor_id` = iid;
          
      ELSE
        INSERT INTO `tbl_doctor_details`(`contact_number`, `email`, `birthdate`, `description`, `specialize_id`,`login_id`)
        VALUES (contact_number, email, birthdate, bio, specializeid,iid);
        

        INSERT INTO `tbl_max_patients`(`value_day`, `doctor_id`) VALUES (valuepatient,iid);
      END IF;
  
  END IF;
  
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patients_max_check` (IN `p_doctor_id` INT, IN `user_appointment_date` DATE)   BEGIN
   
   DECLARE totaldoctorspatient INT;
    DECLARE totaldatenowpatient INT;

    SELECT value_day INTO totaldoctorspatient 
    FROM `tbl_max_patients`
    WHERE doctor_id = p_doctor_id;
    
    SELECT count(appointment_date) INTO totaldatenowpatient 
    FROM `tbl_appointment`
    WHERE doctor_id = p_doctor_id AND
          appointment_date = user_appointment_date;

    IF totaldoctorspatient = totaldatenowpatient THEN
        SELECT 1 as result;
    ELSE
        SELECT 0 as result;
    END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_details_get` (IN `user_id` INT)   select 
	A.description, 
	A.contact_number, 
	A.email, 
	A.birthdate
FROM tbl_patient_table A
WHERE A.login_id = user_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL DEFAULT 3,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_details`
--

CREATE TABLE `tbl_doctor_details` (
  `id` int(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `specialize_id` int(255) NOT NULL DEFAULT 0,
  `login_id` int(255) NOT NULL DEFAULT 0,
  `idate` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctor_details`
--

INSERT INTO `tbl_doctor_details` (`id`, `contact_number`, `email`, `birthdate`, `description`, `specialize_id`, `login_id`, `idate`, `active`) VALUES
(16, '09015321342', 'ren@gmail.com', '2023-06-07', 'doctor', 2, 20, '2023-06-19 10:23:35.687352', 1),
(17, '09915482179', 'angelica_azucena@yahoo.com', '2023-06-20', 'Doctor', 10, 23, '2023-06-19 10:27:57.785118', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_user`
--

CREATE TABLE `tbl_login_user` (
  `id` bigint(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_type_id` int(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT 0,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login_user`
--

INSERT INTO `tbl_login_user` (`id`, `username`, `password`, `firstname`, `lastname`, `user_type_id`, `isadmin`, `idate`, `active`) VALUES
(12, 'admin', '$2y$10$6eFqkGnjX6BgfJflfmJdd.lanCPFMgfXq8RCaPFjHzaXnRUmYVRNW', 'user2', 'admin', 1, 1, '2023-06-15 10:12:09', 1),
(20, 'ren', '$2y$10$3xt2FR6hDpUx/dTOTi4cV.nsTsau7Yfyvj3dOJFnm210WN7Iekcz6', 'renzy', 'gutierrez', 2, 0, '2023-06-17 17:10:50', 1),
(21, 'coy', '$2y$10$vunQCCLl35NNy.DU91KJXec5c5hmTZrL0JDuKkYDmX7b80seYr.Vi', 'coy', 'coy', 3, 0, '2023-06-17 17:14:15', 1),
(22, 'pol', '$2y$10$y/Kyle0dOhJY3dATB3mWUO4NYYgrWGxW2iNgsLTmOmTEoEv54LPJy', 'pol', 'pol', 3, 0, '2023-06-17 17:15:45', 1),
(23, 'rus', '$2y$10$rNWJe/z2Cm/r9D10ERuVuexHo.OhIVMJsDdJX1/46lZBQuMRQ.712', 'Russel', 'Gutierrez', 2, 0, '2023-06-19 10:26:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_max_patients`
--

CREATE TABLE `tbl_max_patients` (
  `id` int(100) NOT NULL,
  `value_day` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_max_patients`
--

INSERT INTO `tbl_max_patients` (`id`, `value_day`, `doctor_id`, `idate`) VALUES
(3, 5, 20, '2023-06-19 10:23:35'),
(4, 3, 23, '2023-06-19 10:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_table`
--

CREATE TABLE `tbl_patient_table` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `login_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient_table`
--

INSERT INTO `tbl_patient_table` (`id`, `description`, `contact_number`, `email`, `birthdate`, `idate`, `active`, `login_id`) VALUES
(11, 'ewqewwe', '3213123', 'coy@gmail.com', '2023-06-07', '2023-06-17 17:19:44', 1, 21),
(12, 'sad', '12344', 'pol@atecphil.com', '2023-06-29', '2023-06-17 18:35:23', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialize`
--

CREATE TABLE `tbl_specialize` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_specialize`
--

INSERT INTO `tbl_specialize` (`id`, `name`, `description`, `idate`, `active`) VALUES
(2, 'Pediatrician', 'Pediatrician', '2023-06-16 09:42:09', 1),
(3, 'Psychiatrist', 'Psychiatrist', '2023-06-16 09:42:09', 1),
(4, 'Cardiologist', 'Cardiologist', '2023-06-16 09:44:08', 1),
(5, 'Dermatologist', 'Dermatologist', '2023-06-16 09:44:08', 1),
(6, 'Gastroenterologist', 'Gastroenterologist', '2023-06-16 09:44:31', 1),
(7, 'Obstetrician/Gynecologist', 'Obstetrician/Gynecologist', '2023-06-16 09:44:31', 1),
(8, 'Ophthalmologist', 'Ophthalmologist', '2023-06-16 09:44:47', 1),
(9, 'Orthopedic ', 'Orthopedic ', '2023-06-16 09:44:47', 1),
(10, 'Family Physician', 'Family Physician', '2023-06-16 09:45:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descrption` varchar(255) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`, `descrption`, `idate`, `active`) VALUES
(3, 'Pending', 'Pending', '2023-06-17 08:14:38', 1),
(4, 'Approved', 'Approved', '2023-06-17 08:14:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `name`, `description`, `idate`, `active`) VALUES
(1, 'admin', 'Administrator', '2023-06-15 11:43:39', 1),
(2, 'DR', 'Doctor', '2023-06-15 11:43:56', 1),
(3, 'Patient', 'Patient', '2023-06-15 11:44:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor_details`
--
ALTER TABLE `tbl_doctor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_user`
--
ALTER TABLE `tbl_login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_max_patients`
--
ALTER TABLE `tbl_max_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient_table`
--
ALTER TABLE `tbl_patient_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_specialize`
--
ALTER TABLE `tbl_specialize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_doctor_details`
--
ALTER TABLE `tbl_doctor_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_login_user`
--
ALTER TABLE `tbl_login_user`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_max_patients`
--
ALTER TABLE `tbl_max_patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_patient_table`
--
ALTER TABLE `tbl_patient_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_specialize`
--
ALTER TABLE `tbl_specialize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
