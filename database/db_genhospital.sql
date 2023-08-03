-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 07:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_doctor_performance_chart` ()   SELECT CONCAT(B.firstname, " ", B.lastname) AS 'Doctor_Name',
       COUNT(A.doctor_id) AS "TotalAppointments"
FROM tbl_appointment A
LEFT JOIN tbl_login_user B ON B.id = A.doctor_id
WHERE A.status_id = 4
GROUP BY A.doctor_id, B.firstname, B.lastname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_calendar_get` (IN `iid` INT)   SELECT A.appointment_date,
       A.appointment_time,
       A.appointment_time_end,
       CONCAT(B.firstname, ' ', B.lastname) AS full_name,
       A.message,
       C.profile_pic
FROM tbl_appointment A
INNER JOIN tbl_login_user B ON B.id = A.patient_id
INNER JOIN tbl_patient_table C ON C.login_id = B.id
WHERE A.appointment_time_end IS NOT NULL AND
      A.doctor_id = iid AND 
      A.active = 1 AND
      a.status_id = 4$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_calendar_get_all` ()   SELECT days.day, IFNULL(COUNT(tbl_appointment.appointment_date), 0) AS appointment_count
FROM (
  SELECT 1 AS day UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL
  SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL
  SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15 UNION ALL
  SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20 UNION ALL
  SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24 UNION ALL SELECT 25 UNION ALL
  SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29 UNION ALL SELECT 30 UNION ALL
  SELECT 31
) AS days
LEFT JOIN tbl_appointment ON days.day = DAY(tbl_appointment.appointment_date)
                          AND MONTH(tbl_appointment.appointment_date) = MONTH(CURRENT_DATE())
                          AND YEAR(tbl_appointment.appointment_date) = YEAR(CURRENT_DATE())
AND tbl_appointment.status_id = 4
GROUP BY days.day$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_get` (IN `iid` INT(100))   SELECT A.appointment_date,
       A.appointment_time,
       A.appointment_time_end,
       CONCAT(B.firstname, " ", B.lastname) AS 'full_name',
       A.message,
       C.profile_pic,
       A.id,
       D.descrption as "istatus",
       D.class
FROM tbl_appointment A
INNER JOIN tbl_login_user B ON B.id = A.patient_id
INNER JOIN tbl_patient_table C ON C.login_id = B.id
INNER JOIN tbl_status D ON D.id = A.status_id
WHERE A.doctor_id = iid AND 
      A.active = 1 AND
      A.appointment_date >= CURDATE() AND
      A.status_id != 6
ORDER BY A.appointment_date ASC,
         A.appointment_time ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_patient_disapprove` (IN `iid` INT, IN `remarks` VARCHAR(255))   UPDATE tbl_appointment
SET   status_id = 5,
     remarks_dissapprove = remarks
WHERE id = iid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `appointment_patient_update` (IN `iid` INT, IN `timefrom` TIME, IN `timeto` TIME, IN `istatus` INT)   UPDATE tbl_appointment
SET appointment_time=timefrom,
    appointment_time_end=timeto, 
    status_id = istatus
WHERE id = iid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctors_Sched_Date_Check` (IN `DayFrom` INT, IN `DayTo` INT, IN `TimeFrom` TIME, IN `TimeTo` TIME, IN `DoctorsId` INT)   BEGIN
INSERT INTO `tbl_doctor_sched`(`DayFrom`, `DayTo`, `TimeFrom`, `TimeTo`, `doctorsId`) VALUES 
(DayFrom, DayTo, TimeFrom, TimeTo, DoctorsId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_approve_time_check` (IN `timestart` TIME, IN `idate` DATETIME)   SELECT COUNT(appointment_time) as 'result'
FROM tbl_appointment
WHERE appointment_date = idate AND
      timestart BETWEEN appointment_time AND appointment_time_end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_dashboards_disapprove_patient_count` (IN `iid` INT)   select count(patient_id) as 'disapprove'
from tbl_appointment
where doctor_id = iid and 
      status_id = 5 and
      appointment_date = CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_dashboard_appointments_date_get` (IN `iid` INT)   SELECT days.day, IFNULL(COUNT(tbl_appointment.appointment_date), 0) AS appointment_count
FROM (
  SELECT 1 AS day UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL
  SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL
  SELECT 11 UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15 UNION ALL
  SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19 UNION ALL SELECT 20 UNION ALL
  SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23 UNION ALL SELECT 24 UNION ALL SELECT 25 UNION ALL
  SELECT 26 UNION ALL SELECT 27 UNION ALL SELECT 28 UNION ALL SELECT 29 UNION ALL SELECT 30 UNION ALL
  SELECT 31
) AS days
LEFT JOIN tbl_appointment ON days.day = DAY(tbl_appointment.appointment_date)
                          AND MONTH(tbl_appointment.appointment_date) = MONTH(CURRENT_DATE())
                          AND YEAR(tbl_appointment.appointment_date) = YEAR(CURRENT_DATE())
                          AND tbl_appointment.doctor_id = iid
                          AND tbl_appointment.status_id = 4
GROUP BY days.day$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_dashboard_approve_patients_count` (IN `iid` INT)   select count(patient_id) as 'approve'
from tbl_appointment
where doctor_id = iid and 
      status_id = 4 and
      appointment_date = CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_dashboard_pending_patients_count` (IN `iid` INT)   select count(patient_id) as 'pending'
from tbl_appointment
where doctor_id = iid and 
      status_id = 3 and
      appointment_date >= CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_details_get` (IN `user_id` INT)   select 
	A.description, 
	A.contact_number, 
	A.email, 
	A.birthdate,
    A.specialize_id,
    A.profile_pic,
    B.value_day
FROM tbl_doctor_details A
INNER JOIN tbl_max_patients B ON B.doctor_id = A.login_id
WHERE A.login_id = user_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_get` (IN `iid` INT)   SELECT  A.login_id,
        CONCAT( B.firstname, " ",  B.lastname) AS full_name,
        C.description
FROM `tbl_doctor_details` A
INNER JOIN `tbl_login_user` B ON B.id = A.login_id
INNER JOIN `tbl_specialize` C ON C.id = A.specialize_id
INNER JOIN `tbl_max_patients` D ON  D.doctor_id = B.id
WHERE  D.value_day <> 0  AND
       B.id != iid
AND
A.active = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_schedule_appointment_get` (IN `iid` INT)   SELECT A.ID,
       A.TimeFrom, 
       A.TimeTo,
       A.doctorsId,
       B.Description AS "iDayFrom",
       C.Description AS "iDayTo"
FROM tbl_doctor_sched A 
LEFT JOIN tbl_day_name B ON B.Id_Day = A.DayFrom
LEFT JOIN tbl_day_name C ON C.Id_Day = A.DayTo
WHERE a.doctorsId = iid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_schedule_check` (IN `Idate` DATE, IN `iTime` TIME, IN `IdoctorId` INT)   SELECT
  CASE
    WHEN (DAYOFWEEK(Idate) BETWEEN DayFrom AND DayTo) AND 
          (iTime BETWEEN TimeFrom AND TimeTo) THEN 'OK'
    ELSE 'NO'
  END AS 'Availability'
 FROM tbl_doctor_sched
 WHERE doctorsid = IdoctorId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `doctor_schedule_get` (IN `iid` INT)   SELECT `ID`, 
       `DayFrom`,
       `DayTo`,
       `TimeFrom`,
       `TimeTo`, 
       `doctorsId` 
FROM `tbl_doctor_sched`
WHERE doctorsId = iid$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_profile_pic` (IN `image` LONGBLOB, IN `usertype` INT, IN `iid` INT)   BEGIN

IF usertype = 2 THEN

   UPDATE tbl_doctor_details
   SET profile_pic = image
   WHERE login_id = iid;
   
ELSEIF usertype = 3 THEN

   UPDATE tbl_patient_table 
   SET profile_pic = image
   WHERE login_id = iid;
   
end IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `my_appointment_history_get` (IN `iid` INT)   SELECT A.appointment_date,
       A.appointment_time,
       A.appointment_time_end,
       CONCAT(E.firstname, " ", E.lastname) AS 'Doctor_Name',
       A.message,
       A.doctor_id,
       A.id,
       D.descrption as "istatus",
       D.class
FROM tbl_appointment A
INNER JOIN tbl_login_user B ON B.id = A.patient_id
INNER JOIN tbl_patient_table C ON C.login_id = B.id
INNER JOIN tbl_status D ON D.id = A.status_id
INNER JOIN tbl_login_user E ON E.id = A.doctor_id
WHERE A.patient_id = iid AND
      A.active = 1 AND
      A.appointment_date >= CURDATE()
ORDER BY A.appointment_date ASC,
         A.appointment_time ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `my_appointment_status_cancel_update` (IN `iid` INT)   UPDATE tbl_appointment 
SET status_id = 6
where id = iid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `my_appointment_time_reSchedule` (IN `iid` INT, IN `timeStart` TIME, IN `idate` DATE)   UPDATE tbl_appointment SET appointment_time = timeStart ,
                           appointment_date = idate
WHERE id = iid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `password_update` (IN `iusername` VARCHAR(255), IN `ipassword` VARCHAR(255))   UPDATE tbl_login_user SET password = ipassword
WHERE username = iusername$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_appointment_calendar_get` (IN `iid` INT)   SELECT A.appointment_date,
       A.appointment_time,
       A.appointment_time_end,
       CONCAT('Dr ',B.firstname, ' ', B.lastname) AS full_name,
       A.message,
       D.description AS 'Specialization'
FROM tbl_appointment A
INNER JOIN tbl_login_user B ON B.id = A.doctor_id
INNER JOIN tbl_doctor_details C ON C.login_id = B.id
INNER JOIN tbl_specialize D ON D.id  = C.specialize_id
WHERE A.status_id = 4 AND
      A.patient_id = iid AND 
      A.active = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_approve_time_check` (IN `iid` INT, IN `time_In` TIME, IN `idate` DATE)   SELECT COUNT(A.id) AS "Time_reserve"
FROM tbl_appointment A
WHERE A.doctor_id = iid AND
      time_In BETWEEN A.appointment_time AND A.appointment_time_end AND
      idate = A.appointment_date AND
      A.status_id =  4$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_dashboards_disapprove_count` (IN `iid` INT)   select count(patient_id) as 'appointments'
from tbl_appointment
where patient_id = iid and 
      status_id = 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_dashboard_appointments_count` (IN `iid` INT)   select count(patient_id) as 'appointments'
from tbl_appointment
where patient_id = iid and
      appointment_date >= CURDATE()$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_details_get` (IN `user_id` INT)   select 
	A.description, 
	A.contact_number, 
	A.email, 
	A.birthdate
FROM tbl_patient_table A
WHERE A.login_id = user_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `username_check` (IN `iusername` VARCHAR(255))   BEGIN

DECLARE countResult INT;

SELECT COUNT(*) INTO countResult
FROM tbl_login_user
WHERE username = iusername;

IF countResult > 0 THEN
    SELECT TRUE as "result";
ELSE
    SELECT FALSE as "result"; 
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_time_end` time DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `remarks_dissapprove` varchar(255) DEFAULT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL DEFAULT 3,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `appointment_date`, `appointment_time`, `appointment_time_end`, `patient_id`, `doctor_id`, `message`, `remarks_dissapprove`, `idate`, `status_id`, `active`) VALUES
(53, '2023-07-24', '09:51:00', NULL, 31, 29, 'ewq', NULL, '2023-07-24 09:51:09', 3, 1),
(54, '2023-07-25', '09:54:00', NULL, 31, 29, 'ewq', NULL, '2023-07-24 09:52:01', 3, 1),
(55, '2023-07-26', '16:00:00', NULL, 31, 32, 'ewq', NULL, '2023-07-25 15:02:46', 3, 1),
(56, '2023-07-27', '22:24:00', NULL, 31, 29, '321ewq', NULL, '2023-07-26 08:29:50', 3, 1),
(57, '2023-07-26', '21:00:00', NULL, 31, 29, 'ewqe', NULL, '2023-07-26 08:30:12', 3, 1),
(58, '2023-08-02', '21:00:00', '23:27:00', 31, 29, 'Sample', NULL, '2023-07-28 15:42:33', 4, 1),
(59, '2023-08-02', '08:00:00', '12:09:00', 31, 29, 'sa', NULL, '2023-07-30 12:32:32', 4, 1),
(60, '2023-08-02', '12:10:00', '13:00:00', 31, 29, 'ewqq', NULL, '2023-07-30 13:01:56', 4, 1),
(61, '2023-08-03', '13:00:00', '14:00:00', 31, 29, 'weqe', NULL, '2023-08-02 09:45:47', 4, 1),
(62, '2023-08-03', '08:00:00', '12:00:00', 31, 29, 'ewq', NULL, '2023-08-02 10:05:11', 4, 1),
(63, '2023-08-04', '09:55:00', NULL, 31, 29, 'ewqe', NULL, '2023-08-03 09:31:38', 6, 1),
(64, '2023-08-04', '12:02:00', '13:00:00', 31, 32, 'ewqe', NULL, '2023-08-03 10:23:00', 4, 1),
(65, '2023-08-04', '15:23:00', '16:00:00', 31, 32, 'ewqweq', NULL, '2023-08-03 10:23:17', 4, 1),
(66, '2023-08-11', '15:20:00', '16:53:00', 31, 32, 'ewq', NULL, '2023-08-03 10:25:09', 4, 1),
(67, '2023-08-09', '12:01:00', '15:00:00', 31, 32, 'weq', NULL, '2023-08-03 12:55:53', 4, 1),
(68, '2023-08-10', '12:01:00', '14:00:00', 31, 32, 'ewq', NULL, '2023-08-03 13:20:18', 4, 1),
(69, '2023-08-10', '12:30:00', NULL, 31, 32, 'ewq', NULL, '2023-08-03 13:21:55', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_day_name`
--

CREATE TABLE `tbl_day_name` (
  `id` int(11) NOT NULL,
  `Id_Day` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_day_name`
--

INSERT INTO `tbl_day_name` (`id`, `Id_Day`, `Description`) VALUES
(2, 2, 'Monday'),
(3, 3, 'Tuesday'),
(4, 4, 'Wednesday'),
(7, 5, 'Thursday'),
(8, 6, 'Friday'),
(13, 7, 'Saturday'),
(14, 1, 'Sunday');

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
  `profile_pic` longblob NOT NULL,
  `idate` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_details`
--

INSERT INTO `tbl_doctor_details` (`id`, `contact_number`, `email`, `birthdate`, `description`, `specialize_id`, `login_id`, `profile_pic`, `idate`, `active`) VALUES
(18, '9051231422', 'russel@gmail.com', '2023-07-23', 'sample', 3, 29, '', '2023-07-23 20:22:05.465946', 1),
(19, '9123224444', 'christan@gmail.com', '1998-02-02', 'Docotr', 3, 32, '', '2023-07-25 14:35:09.626642', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_sched`
--

CREATE TABLE `tbl_doctor_sched` (
  `ID` int(11) NOT NULL,
  `DayFrom` int(11) NOT NULL,
  `DayTo` int(11) NOT NULL,
  `TimeFrom` time NOT NULL,
  `TimeTo` time NOT NULL,
  `doctorsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_sched`
--

INSERT INTO `tbl_doctor_sched` (`ID`, `DayFrom`, `DayTo`, `TimeFrom`, `TimeTo`, `doctorsId`) VALUES
(40, 2, 5, '08:00:00', '23:00:00', 29),
(41, 2, 6, '12:00:26', '15:24:26', 32);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login_user`
--

INSERT INTO `tbl_login_user` (`id`, `username`, `password`, `firstname`, `lastname`, `user_type_id`, `isadmin`, `idate`, `active`) VALUES
(29, 'rcg', '$2y$10$fEI16oQoaGKy0/yfg3Rzz.xmSuVj7bsWvGVsa9dUZ1f0OOP5obEkO', 'Russel', 'Gutierrez', 2, 0, '2023-07-20 11:59:23', 1),
(30, 'admin', '$2y$10$ScTR1eHt5FC1PbtNBl8Fo.t61.PI9XcRUWmugfrk8XH7elXUl5vyi', 'admin', 'admin', 1, 0, '2023-07-23 19:50:59', 1),
(31, 'ren', '$2y$10$iOvaXk.ukhO85ozPFrWs8O3ApBDbXN2vOsz1rQC802KpNbdLKW8tS', 'Renzy', 'Gutierrez', 3, 0, '2023-07-23 19:52:14', 1),
(32, 'stan', '$2y$10$4vn2LqIp/Ty2OQdl.T0JrucSPNJuBBoM2UNnpXBr9gdiscl/Pnbu2', 'Christan', 'Gutierrez', 2, 0, '2023-07-25 14:24:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_max_patients`
--

CREATE TABLE `tbl_max_patients` (
  `id` int(100) NOT NULL,
  `value_day` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_max_patients`
--

INSERT INTO `tbl_max_patients` (`id`, `value_day`, `doctor_id`, `idate`) VALUES
(5, 5, 29, '2023-07-23 20:22:05'),
(6, 5, 32, '2023-07-25 14:35:09');

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
  `login_id` int(255) NOT NULL,
  `profile_pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient_table`
--

INSERT INTO `tbl_patient_table` (`id`, `description`, `contact_number`, `email`, `birthdate`, `idate`, `active`, `login_id`, `profile_pic`) VALUES
(15, 'Sample', '2132100', 'russel@gmail.com', '2023-07-23', '2023-07-23 20:21:21', 1, 31, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `class` varchar(255) NOT NULL,
  `idate` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`, `descrption`, `class`, `idate`, `active`) VALUES
(3, 'Pending', 'Pending', 'bg-warning', '2023-06-17 08:14:38', 1),
(4, 'Approved', 'Approved', 'bg-success', '2023-06-17 08:14:38', 1),
(5, 'Disapproved', 'Disapproved', 'bg-danger', '2023-06-21 17:04:33', 1),
(6, 'Cancel', 'Cancel', 'bg-info', '2023-07-01 10:11:26', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tbl_day_name`
--
ALTER TABLE `tbl_day_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor_details`
--
ALTER TABLE `tbl_doctor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor_sched`
--
ALTER TABLE `tbl_doctor_sched`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_day_name`
--
ALTER TABLE `tbl_day_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_doctor_details`
--
ALTER TABLE `tbl_doctor_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_doctor_sched`
--
ALTER TABLE `tbl_doctor_sched`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_login_user`
--
ALTER TABLE `tbl_login_user`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_max_patients`
--
ALTER TABLE `tbl_max_patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_patient_table`
--
ALTER TABLE `tbl_patient_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_specialize`
--
ALTER TABLE `tbl_specialize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
