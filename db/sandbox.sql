-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 07:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement_assessment`
--

CREATE TABLE `achievement_assessment` (
  `AchievementAssessmentYear` int(4) NOT NULL,
  `SchoolID` text NOT NULL,
  `SchoolAssessmentName` text NOT NULL,
  `SchoolAssessmentDescription` text NOT NULL,
  `AssessmentorName` text NOT NULL,
  `AchievementAssessmentPassingFlag` tinyint(1) NOT NULL,
  `AchievementAssessmentAttachmentURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria`
--

CREATE TABLE `assessment_criteria` (
  `CriteriaID` int(16) NOT NULL,
  `CriteriaName` text NOT NULL,
  `CriteriaDescription` text NOT NULL,
  `CriteriaLevelAmount` int(2) NOT NULL,
  `CriteriaCompositionAmount` int(2) NOT NULL,
  `CriteriaPassingScorePercentage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assessment_criteria`
--

INSERT INTO `assessment_criteria` (`CriteriaID`, `CriteriaName`, `CriteriaDescription`, `CriteriaLevelAmount`, `CriteriaCompositionAmount`, `CriteriaPassingScorePercentage`) VALUES
(0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_composition`
--

CREATE TABLE `assessment_criteria_composition` (
  `CriteriaID` varchar(16) NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `CompositionName` text NOT NULL,
  `CompositionWeightScore` int(3) NOT NULL,
  `CompositionGuideline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_composition_level`
--

CREATE TABLE `assessment_criteria_composition_level` (
  `CriteriaID` text NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `LevelIndex` int(2) NOT NULL,
  `CompositionLevelDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_level`
--

CREATE TABLE `assessment_criteria_level` (
  `CriteriaID` int(16) NOT NULL,
  `LevelIndex` int(2) NOT NULL,
  `LevelName` text NOT NULL,
  `LevelScore` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `best_practice`
--

CREATE TABLE `best_practice` (
  `BestPracticeID` int(16) NOT NULL,
  `EducationYear` int(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `BestPracticeName` text NOT NULL,
  `BestPracticeTypeCode` text NOT NULL,
  `TargetEducationLevelCode` text NOT NULL,
  `Benefit` text NOT NULL,
  `RecognizedCode` text NOT NULL,
  `Abstract` text NOT NULL,
  `SearchKeyword` text NOT NULL,
  `AttachmentURL` text NOT NULL,
  `PracticeProcess` text NOT NULL,
  `Source` text NOT NULL,
  `PublishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `best_practice`
--

INSERT INTO `best_practice` (`BestPracticeID`, `EducationYear`, `Semester`, `BestPracticeName`, `BestPracticeTypeCode`, `TargetEducationLevelCode`, `Benefit`, `RecognizedCode`, `Abstract`, `SearchKeyword`, `AttachmentURL`, `PracticeProcess`, `Source`, `PublishDate`) VALUES
(19599, 2550, 1, 'อยากบิน', '02', '00', 'ไม่ต้องนั่งเครื่องบินมันแพง', '03', 'มันดีนะมันดี', 'บินๆ', '265f6be5699daa303693dd7d41c0cc66.xlsx', 'สร้างปีก', 'สมองชั้น', '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `best_practice_creator`
--

CREATE TABLE `best_practice_creator` (
  `BestPracticeID` int(16) NOT NULL,
  `CreatorPersonalID` int(13) NOT NULL,
  `CreatorPersonalIDTypeCode` text NOT NULL,
  `CreatorPrefixCode` text NOT NULL,
  `CreatorNameThai` text NOT NULL,
  `CreatorNameEnglish` text NOT NULL,
  `CreatorMiddleNameThai` text NOT NULL,
  `CreatorMiddleNameEnglish` text NOT NULL,
  `CreatorLastNameThai` text NOT NULL,
  `CreatorLastNameEnglish` text NOT NULL,
  `ParticipantRatio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `best_practice_creator`
--

INSERT INTO `best_practice_creator` (`BestPracticeID`, `CreatorPersonalID`, `CreatorPersonalIDTypeCode`, `CreatorPrefixCode`, `CreatorNameThai`, `CreatorNameEnglish`, `CreatorMiddleNameThai`, `CreatorMiddleNameEnglish`, `CreatorLastNameThai`, `CreatorLastNameEnglish`, `ParticipantRatio`) VALUES
(19599, 706, 'I', '003', 'ชื่อไทย', 'ชื่อฝรั่ง', 'ชื่อกลางไทย', 'ชื่อกลางฝรั่ง', 'นามสกุลไทย', 'นามสกุลฝรั่ง', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cls_academic_standing`
--

CREATE TABLE `cls_academic_standing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_activity_passing`
--

CREATE TABLE `cls_activity_passing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_appointment_type`
--

CREATE TABLE `cls_appointment_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_assistance_type`
--

CREATE TABLE `cls_assistance_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_attribute_evaluation`
--

CREATE TABLE `cls_attribute_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_attribute_passing`
--

CREATE TABLE `cls_attribute_passing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_award_level`
--

CREATE TABLE `cls_award_level` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_best_practice_type`
--

CREATE TABLE `cls_best_practice_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_blood`
--

CREATE TABLE `cls_blood` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_budget_type`
--

CREATE TABLE `cls_budget_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_building_design`
--

CREATE TABLE `cls_building_design` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_building_type`
--

CREATE TABLE `cls_building_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_commitee_position`
--

CREATE TABLE `cls_commitee_position` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_competency`
--

CREATE TABLE `cls_competency` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_competency_evaulation`
--

CREATE TABLE `cls_competency_evaulation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_contract_type`
--

CREATE TABLE `cls_contract_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_cooperation_level`
--

CREATE TABLE `cls_cooperation_level` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_cooperation_status`
--

CREATE TABLE `cls_cooperation_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_curriculum`
--

CREATE TABLE `cls_curriculum` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_degree`
--

CREATE TABLE `cls_degree` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_department`
--

CREATE TABLE `cls_department` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_disability`
--

CREATE TABLE `cls_disability` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_disability_level`
--

CREATE TABLE `cls_disability_level` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_disavantaged`
--

CREATE TABLE `cls_disavantaged` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_district`
--

CREATE TABLE `cls_district` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_education_content`
--

CREATE TABLE `cls_education_content` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_education_level`
--

CREATE TABLE `cls_education_level` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_electric_type`
--

CREATE TABLE `cls_electric_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_evaluation`
--

CREATE TABLE `cls_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_expense_type`
--

CREATE TABLE `cls_expense_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_extracurricular_evaluation`
--

CREATE TABLE `cls_extracurricular_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_extracurricular_passing`
--

CREATE TABLE `cls_extracurricular_passing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_family_relation`
--

CREATE TABLE `cls_family_relation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_family_status`
--

CREATE TABLE `cls_family_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_fundamental_subject_evaluation`
--

CREATE TABLE `cls_fundamental_subject_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_fundamental_subject_passing`
--

CREATE TABLE `cls_fundamental_subject_passing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_gender`
--

CREATE TABLE `cls_gender` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_grade`
--

CREATE TABLE `cls_grade` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_grade_level`
--

CREATE TABLE `cls_grade_level` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_innovation_area`
--

CREATE TABLE `cls_innovation_area` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_innovation_type`
--

CREATE TABLE `cls_innovation_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_internet_type`
--

CREATE TABLE `cls_internet_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_journey_type`
--

CREATE TABLE `cls_journey_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_jurisdiction`
--

CREATE TABLE `cls_jurisdiction` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_language`
--

CREATE TABLE `cls_language` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_literacy_evaluation`
--

CREATE TABLE `cls_literacy_evaluation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_literacy_passing`
--

CREATE TABLE `cls_literacy_passing` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_major`
--

CREATE TABLE `cls_major` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_marriage_status`
--

CREATE TABLE `cls_marriage_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_media_type`
--

CREATE TABLE `cls_media_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_municipal`
--

CREATE TABLE `cls_municipal` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_nationality`
--

CREATE TABLE `cls_nationality` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_occupation`
--

CREATE TABLE `cls_occupation` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_participant_type`
--

CREATE TABLE `cls_participant_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_personal_id_type`
--

CREATE TABLE `cls_personal_id_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_personnel_status`
--

CREATE TABLE `cls_personnel_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_personnel_type`
--

CREATE TABLE `cls_personnel_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_person_status`
--

CREATE TABLE `cls_person_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_position`
--

CREATE TABLE `cls_position` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_position_lelvel`
--

CREATE TABLE `cls_position_lelvel` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_prefix`
--

CREATE TABLE `cls_prefix` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_program`
--

CREATE TABLE `cls_program` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_province`
--

CREATE TABLE `cls_province` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_race`
--

CREATE TABLE `cls_race` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_recognized_by`
--

CREATE TABLE `cls_recognized_by` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_religion`
--

CREATE TABLE `cls_religion` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_salary_type`
--

CREATE TABLE `cls_salary_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_sandbox_curriculum`
--

CREATE TABLE `cls_sandbox_curriculum` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_school_assessment`
--

CREATE TABLE `cls_school_assessment` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_school_status`
--

CREATE TABLE `cls_school_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_school_type`
--

CREATE TABLE `cls_school_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_student_live_with`
--

CREATE TABLE `cls_student_live_with` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_student_status`
--

CREATE TABLE `cls_student_status` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_subdistrict`
--

CREATE TABLE `cls_subdistrict` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_subject_group`
--

CREATE TABLE `cls_subject_group` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_subject_type`
--

CREATE TABLE `cls_subject_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_talent`
--

CREATE TABLE `cls_talent` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_teacher_certificate`
--

CREATE TABLE `cls_teacher_certificate` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_teacher_development_activity_type`
--

CREATE TABLE `cls_teacher_development_activity_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_teacher_qualification`
--

CREATE TABLE `cls_teacher_qualification` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cls_water_type`
--

CREATE TABLE `cls_water_type` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `CommitteeProvinceCode` int(2) NOT NULL,
  `CommitteeYear` int(4) NOT NULL,
  `CommitteeAppointmentNumber` int(6) NOT NULL,
  `CommitteeAppointmentTypeCode` text NOT NULL,
  `CommitteeAppointmentAttachmentURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`CommitteeProvinceCode`, `CommitteeYear`, `CommitteeAppointmentNumber`, `CommitteeAppointmentTypeCode`, `CommitteeAppointmentAttachmentURL`) VALUES
(10, 1999, 706, '01', 'c44144bec770cad05a859e05f9793528.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `committee_member`
--

CREATE TABLE `committee_member` (
  `CommitteeProvinceCode` int(2) NOT NULL,
  `CommitteeYear` int(4) NOT NULL,
  `CommitteeAppointmentNumber` int(6) NOT NULL,
  `CommitteeMemberPrefixCode` text NOT NULL,
  `CommitteeMemberNameThai` text NOT NULL,
  `CommitteeMemberNameEnglish` text NOT NULL,
  `CommitteeMemberMiddleNameThai` text NOT NULL,
  `CommitteeMemberMiddleNameEnglish` text NOT NULL,
  `CommitteeMemberLastNameThai` text NOT NULL,
  `CommitteeMemberLastNameEnglish` text NOT NULL,
  `CommitteeMemberPositionCode` int(2) NOT NULL,
  `CommitteeMemberOrganizationPosition` text NOT NULL,
  `CommitteeMemberTermStartDate` date NOT NULL,
  `CommitteeMemberTermEndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `committee_member`
--

INSERT INTO `committee_member` (`CommitteeProvinceCode`, `CommitteeYear`, `CommitteeAppointmentNumber`, `CommitteeMemberPrefixCode`, `CommitteeMemberNameThai`, `CommitteeMemberNameEnglish`, `CommitteeMemberMiddleNameThai`, `CommitteeMemberMiddleNameEnglish`, `CommitteeMemberLastNameThai`, `CommitteeMemberLastNameEnglish`, `CommitteeMemberPositionCode`, `CommitteeMemberOrganizationPosition`, `CommitteeMemberTermStartDate`, `CommitteeMemberTermEndDate`) VALUES
(64, 1999, 706, '003', 'ท่าน', 'master', 'โสภณ', 'sophon', 'พริกเล็ก', 'priklek', 1, '24 conmunication.co.th', '2023-03-01', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `innovation`
--

CREATE TABLE `innovation` (
  `InnovationID` int(16) NOT NULL,
  `EducationYear` int(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `InnovationName` varchar(255) NOT NULL,
  `InnovationTypeCode` varchar(2) NOT NULL,
  `TargetEducationLevelCode` varchar(20) NOT NULL,
  `InnovationBenefit` text NOT NULL,
  `Abstract` text NOT NULL,
  `AttachmentURL` varchar(255) NOT NULL,
  `Source` varchar(255) NOT NULL,
  `PublishDate` date NOT NULL,
  `SearchKeyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `innovation_creator`
--

CREATE TABLE `innovation_creator` (
  `InnovationID` int(16) NOT NULL,
  `CreatorPersonalID` int(13) NOT NULL,
  `CreatorPersonalIDTypeCode` text NOT NULL,
  `CreatorPrefixCode` text NOT NULL,
  `CreatorNameThai` text NOT NULL,
  `CreatorNameEnglish` text NOT NULL,
  `CreatorMiddleNameThai` text NOT NULL,
  `CreatorMiddleNameEnglish` text NOT NULL,
  `CreatorLastNameThai` text NOT NULL,
  `CreatorLastNameEnglish` text NOT NULL,
  `ParticipantRatio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_technology_media`
--

CREATE TABLE `learning_technology_media` (
  `MediaID` int(16) NOT NULL,
  `EducationYear` int(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `MediaName` text NOT NULL,
  `MediaTypeCode` text NOT NULL,
  `TargetEducationLevelCode` text NOT NULL,
  `MediaBenefit` text NOT NULL,
  `Abstract` text NOT NULL,
  `SearchKeyword` text NOT NULL,
  `AttachmentURL` text NOT NULL,
  `Source` text NOT NULL,
  `PublishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `learning_technology_media`
--

INSERT INTO `learning_technology_media` (`MediaID`, `EducationYear`, `Semester`, `MediaName`, `MediaTypeCode`, `TargetEducationLevelCode`, `MediaBenefit`, `Abstract`, `SearchKeyword`, `AttachmentURL`, `Source`, `PublishDate`) VALUES
(0, 0, 0, '', 'เลือก', 'เลือก', '', '', '', '', '', '0000-00-00'),
(2147483647, 2550, 1, 'บินกันเถอะ', '01', '00', 'คนจนก็บินได้', '', 'ใครๆก็บินได้', 'eb83be28f43b0452fdf4816e9b1370ff.xlsx', 'ไทยบ้าน', '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `learning_technology_media_creator`
--

CREATE TABLE `learning_technology_media_creator` (
  `MediaID` int(16) NOT NULL,
  `CreatorPersonalID` int(13) NOT NULL,
  `CreatorPersonalIDTypeCode` text NOT NULL,
  `CreatorPrefixCode` text NOT NULL,
  `CreatorNameThai` text NOT NULL,
  `CreatorNameEnglish` text NOT NULL,
  `CreatorMiddleNameThai` text NOT NULL,
  `CreatorMiddleNameEnglish` text NOT NULL,
  `CreatorLastNameThai` text NOT NULL,
  `CreatorLastNameEnglish` text NOT NULL,
  `ParticipantRatio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `learning_technology_media_creator`
--

INSERT INTO `learning_technology_media_creator` (`MediaID`, `CreatorPersonalID`, `CreatorPersonalIDTypeCode`, `CreatorPrefixCode`, `CreatorNameThai`, `CreatorNameEnglish`, `CreatorMiddleNameThai`, `CreatorMiddleNameEnglish`, `CreatorLastNameThai`, `CreatorLastNameEnglish`, `ParticipantRatio`) VALUES
(2147483647, 2147483647, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ParticipantID` int(16) NOT NULL,
  `ParticipantName` text NOT NULL,
  `ParticipantTypeCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`ParticipantID`, `ParticipantName`, `ParticipantTypeCode`) VALUES
(9119, '', '01');

-- --------------------------------------------------------

--
-- Table structure for table `participant_contact`
--

CREATE TABLE `participant_contact` (
  `ParticipantID` int(16) NOT NULL,
  `ContactName` text NOT NULL,
  `ContactPhone` text NOT NULL,
  `ContactMobilePhone` text NOT NULL,
  `ContactEmail` text NOT NULL,
  `ContactOrganizationPosition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `participant_contact`
--

INSERT INTO `participant_contact` (`ParticipantID`, `ContactName`, `ContactPhone`, `ContactMobilePhone`, `ContactEmail`, `ContactOrganizationPosition`) VALUES
(9119, 'แก้ว', '', '', 'admin@24.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `participant_cooperation`
--

CREATE TABLE `participant_cooperation` (
  `ParticipantID` int(16) NOT NULL,
  `CooperationStartDate` date NOT NULL,
  `CooperationEndDate` date NOT NULL,
  `CooperationStatusCode` text NOT NULL,
  `CooperationActivity` text NOT NULL,
  `CooperationLevelCode` text NOT NULL,
  `CooperationSchoolID` text NOT NULL,
  `CooperationAttachmentURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `participant_cooperation`
--

INSERT INTO `participant_cooperation` (`ParticipantID`, `CooperationStartDate`, `CooperationEndDate`, `CooperationStatusCode`, `CooperationActivity`, `CooperationLevelCode`, `CooperationSchoolID`, `CooperationAttachmentURL`) VALUES
(9119, '0000-00-00', '0000-00-00', 'เลือก', '', 'เลือก', '', '9d20042d08cade50499eb375953d3913.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `participant_note`
--

CREATE TABLE `participant_note` (
  `ParticipantID` int(16) NOT NULL,
  `Note` text NOT NULL,
  `NoteReporterName` text NOT NULL,
  `NoteReporterPhone` text NOT NULL,
  `NoteReporterMobilePhone` text NOT NULL,
  `NoteReporterEmail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `participant_note`
--

INSERT INTO `participant_note` (`ParticipantID`, `Note`, `NoteReporterName`, `NoteReporterPhone`, `NoteReporterMobilePhone`, `NoteReporterEmail`) VALUES
(9119, '', 'แก้ว', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment`
--

CREATE TABLE `school_assessment` (
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `SchoolAssessmentName` text NOT NULL,
  `SchoolAssessmentDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment_criteria`
--

CREATE TABLE `school_assessment_criteria` (
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `CriteriaID` text NOT NULL,
  `AssessmentorName` text NOT NULL,
  `SchoolAssessmentScore` double(5,2) NOT NULL,
  `SchoolAssessmentCode` text NOT NULL,
  `SchoolAssessmentAttachmentURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment_result`
--

CREATE TABLE `school_assessment_result` (
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `CriteriaID` text NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `LevelIndex` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement_assessment`
--
ALTER TABLE `achievement_assessment`
  ADD UNIQUE KEY `AchievementAssessmentYear` (`AchievementAssessmentYear`),
  ADD UNIQUE KEY `SchoolID` (`SchoolID`) USING HASH;

--
-- Indexes for table `assessment_criteria`
--
ALTER TABLE `assessment_criteria`
  ADD PRIMARY KEY (`CriteriaID`);

--
-- Indexes for table `assessment_criteria_composition`
--
ALTER TABLE `assessment_criteria_composition`
  ADD PRIMARY KEY (`CompositionIndex`),
  ADD UNIQUE KEY `CriteriaID` (`CriteriaID`);

--
-- Indexes for table `assessment_criteria_composition_level`
--
ALTER TABLE `assessment_criteria_composition_level`
  ADD UNIQUE KEY `CompositionIndex` (`CompositionIndex`),
  ADD UNIQUE KEY `LevelIndex` (`LevelIndex`),
  ADD UNIQUE KEY `CriteriaID` (`CriteriaID`) USING HASH;

--
-- Indexes for table `assessment_criteria_level`
--
ALTER TABLE `assessment_criteria_level`
  ADD UNIQUE KEY `CriteriaID` (`CriteriaID`);

--
-- Indexes for table `best_practice`
--
ALTER TABLE `best_practice`
  ADD PRIMARY KEY (`BestPracticeID`);

--
-- Indexes for table `best_practice_creator`
--
ALTER TABLE `best_practice_creator`
  ADD PRIMARY KEY (`BestPracticeID`,`CreatorPersonalID`);

--
-- Indexes for table `cls_academic_standing`
--
ALTER TABLE `cls_academic_standing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_activity_passing`
--
ALTER TABLE `cls_activity_passing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_appointment_type`
--
ALTER TABLE `cls_appointment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_assistance_type`
--
ALTER TABLE `cls_assistance_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_attribute_evaluation`
--
ALTER TABLE `cls_attribute_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_attribute_passing`
--
ALTER TABLE `cls_attribute_passing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_award_level`
--
ALTER TABLE `cls_award_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_best_practice_type`
--
ALTER TABLE `cls_best_practice_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_blood`
--
ALTER TABLE `cls_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_budget_type`
--
ALTER TABLE `cls_budget_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_building_design`
--
ALTER TABLE `cls_building_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_building_type`
--
ALTER TABLE `cls_building_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_commitee_position`
--
ALTER TABLE `cls_commitee_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_competency`
--
ALTER TABLE `cls_competency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_competency_evaulation`
--
ALTER TABLE `cls_competency_evaulation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_contract_type`
--
ALTER TABLE `cls_contract_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_cooperation_level`
--
ALTER TABLE `cls_cooperation_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_cooperation_status`
--
ALTER TABLE `cls_cooperation_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_curriculum`
--
ALTER TABLE `cls_curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_degree`
--
ALTER TABLE `cls_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_department`
--
ALTER TABLE `cls_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_disability`
--
ALTER TABLE `cls_disability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_disability_level`
--
ALTER TABLE `cls_disability_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_disavantaged`
--
ALTER TABLE `cls_disavantaged`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_district`
--
ALTER TABLE `cls_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_education_content`
--
ALTER TABLE `cls_education_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_education_level`
--
ALTER TABLE `cls_education_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_electric_type`
--
ALTER TABLE `cls_electric_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_evaluation`
--
ALTER TABLE `cls_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_expense_type`
--
ALTER TABLE `cls_expense_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_extracurricular_evaluation`
--
ALTER TABLE `cls_extracurricular_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_extracurricular_passing`
--
ALTER TABLE `cls_extracurricular_passing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_family_relation`
--
ALTER TABLE `cls_family_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_family_status`
--
ALTER TABLE `cls_family_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_fundamental_subject_evaluation`
--
ALTER TABLE `cls_fundamental_subject_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_fundamental_subject_passing`
--
ALTER TABLE `cls_fundamental_subject_passing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_gender`
--
ALTER TABLE `cls_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_grade`
--
ALTER TABLE `cls_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_grade_level`
--
ALTER TABLE `cls_grade_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_innovation_area`
--
ALTER TABLE `cls_innovation_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_innovation_type`
--
ALTER TABLE `cls_innovation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_internet_type`
--
ALTER TABLE `cls_internet_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_journey_type`
--
ALTER TABLE `cls_journey_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_jurisdiction`
--
ALTER TABLE `cls_jurisdiction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_language`
--
ALTER TABLE `cls_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_literacy_evaluation`
--
ALTER TABLE `cls_literacy_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_literacy_passing`
--
ALTER TABLE `cls_literacy_passing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_major`
--
ALTER TABLE `cls_major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_marriage_status`
--
ALTER TABLE `cls_marriage_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_media_type`
--
ALTER TABLE `cls_media_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_municipal`
--
ALTER TABLE `cls_municipal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_nationality`
--
ALTER TABLE `cls_nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_occupation`
--
ALTER TABLE `cls_occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_participant_type`
--
ALTER TABLE `cls_participant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_personal_id_type`
--
ALTER TABLE `cls_personal_id_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_personnel_status`
--
ALTER TABLE `cls_personnel_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_personnel_type`
--
ALTER TABLE `cls_personnel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_person_status`
--
ALTER TABLE `cls_person_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_position`
--
ALTER TABLE `cls_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_position_lelvel`
--
ALTER TABLE `cls_position_lelvel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_prefix`
--
ALTER TABLE `cls_prefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_program`
--
ALTER TABLE `cls_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_province`
--
ALTER TABLE `cls_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_race`
--
ALTER TABLE `cls_race`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_recognized_by`
--
ALTER TABLE `cls_recognized_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_religion`
--
ALTER TABLE `cls_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_salary_type`
--
ALTER TABLE `cls_salary_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_sandbox_curriculum`
--
ALTER TABLE `cls_sandbox_curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_school_assessment`
--
ALTER TABLE `cls_school_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_school_status`
--
ALTER TABLE `cls_school_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_school_type`
--
ALTER TABLE `cls_school_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_student_live_with`
--
ALTER TABLE `cls_student_live_with`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_student_status`
--
ALTER TABLE `cls_student_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_subdistrict`
--
ALTER TABLE `cls_subdistrict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_subject_group`
--
ALTER TABLE `cls_subject_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_subject_type`
--
ALTER TABLE `cls_subject_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_talent`
--
ALTER TABLE `cls_talent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_teacher_certificate`
--
ALTER TABLE `cls_teacher_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_teacher_development_activity_type`
--
ALTER TABLE `cls_teacher_development_activity_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_teacher_qualification`
--
ALTER TABLE `cls_teacher_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cls_water_type`
--
ALTER TABLE `cls_water_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`CommitteeProvinceCode`,`CommitteeYear`,`CommitteeAppointmentNumber`);

--
-- Indexes for table `committee_member`
--
ALTER TABLE `committee_member`
  ADD PRIMARY KEY (`CommitteeProvinceCode`,`CommitteeYear`,`CommitteeAppointmentNumber`,`CommitteeMemberPositionCode`),
  ADD UNIQUE KEY `CommitteeMemberNameThai` (`CommitteeMemberNameThai`) USING HASH,
  ADD UNIQUE KEY `CommitteeMemberLastNameThai` (`CommitteeMemberLastNameThai`) USING HASH;

--
-- Indexes for table `innovation`
--
ALTER TABLE `innovation`
  ADD PRIMARY KEY (`InnovationID`) USING BTREE;

--
-- Indexes for table `innovation_creator`
--
ALTER TABLE `innovation_creator`
  ADD PRIMARY KEY (`InnovationID`,`CreatorPersonalID`);

--
-- Indexes for table `learning_technology_media`
--
ALTER TABLE `learning_technology_media`
  ADD PRIMARY KEY (`MediaID`);

--
-- Indexes for table `learning_technology_media_creator`
--
ALTER TABLE `learning_technology_media_creator`
  ADD PRIMARY KEY (`MediaID`,`CreatorPersonalID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ParticipantID`);

--
-- Indexes for table `participant_contact`
--
ALTER TABLE `participant_contact`
  ADD PRIMARY KEY (`ParticipantID`);

--
-- Indexes for table `participant_cooperation`
--
ALTER TABLE `participant_cooperation`
  ADD PRIMARY KEY (`ParticipantID`);

--
-- Indexes for table `participant_note`
--
ALTER TABLE `participant_note`
  ADD PRIMARY KEY (`ParticipantID`);

--
-- Indexes for table `school_assessment`
--
ALTER TABLE `school_assessment`
  ADD PRIMARY KEY (`SchoolAssessmentEducationYear`,`SchoolAssessmentSemester`),
  ADD UNIQUE KEY `SchoolID` (`SchoolID`) USING HASH;

--
-- Indexes for table `school_assessment_criteria`
--
ALTER TABLE `school_assessment_criteria`
  ADD PRIMARY KEY (`SchoolAssessmentEducationYear`),
  ADD UNIQUE KEY `SchoolAssessmentSemester` (`SchoolAssessmentSemester`),
  ADD UNIQUE KEY `SchoolID` (`SchoolID`) USING HASH,
  ADD UNIQUE KEY `CriteriaID` (`CriteriaID`) USING HASH;

--
-- Indexes for table `school_assessment_result`
--
ALTER TABLE `school_assessment_result`
  ADD UNIQUE KEY `SchoolAssessmentSemester` (`SchoolAssessmentSemester`),
  ADD UNIQUE KEY `SchoolAssessmentEducationYear` (`SchoolAssessmentEducationYear`),
  ADD UNIQUE KEY `CompositionIndex` (`CompositionIndex`),
  ADD UNIQUE KEY `SchoolID` (`SchoolID`) USING HASH,
  ADD UNIQUE KEY `CriteriaID` (`CriteriaID`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
