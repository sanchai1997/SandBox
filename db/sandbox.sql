-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 07:42 PM
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
  `id` int(11) NOT NULL,
  `AchievementAssessmentYear` int(4) NOT NULL,
  `SchoolID` text NOT NULL,
  `SchoolAssessmentName` text NOT NULL,
  `SchoolAssessmentDescription` text NOT NULL,
  `AssessmentorName` text NOT NULL,
  `AchievementAssessmentPassingFlag` tinyint(1) NOT NULL,
  `AchievementAssessmentAttachmentURL` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria`
--

CREATE TABLE `assessment_criteria` (
  `id` int(11) NOT NULL,
  `CriteriaID` int(16) NOT NULL,
  `CriteriaName` text NOT NULL,
  `CriteriaDescription` text NOT NULL,
  `CriteriaLevelAmount` int(2) NOT NULL,
  `CriteriaCompositionAmount` int(2) NOT NULL,
  `CriteriaPassingScorePercentage` int(3) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_composition`
--

CREATE TABLE `assessment_criteria_composition` (
  `id` int(11) NOT NULL,
  `CriteriaID` varchar(16) NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `CompositionName` text NOT NULL,
  `CompositionWeightScore` int(3) NOT NULL,
  `CompositionGuideline` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_composition_level`
--

CREATE TABLE `assessment_criteria_composition_level` (
  `id` int(11) NOT NULL,
  `CriteriaID` text NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `LevelIndex` int(2) NOT NULL,
  `CompositionLevelDescription` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_criteria_level`
--

CREATE TABLE `assessment_criteria_level` (
  `id` int(11) NOT NULL,
  `CriteriaID` int(16) NOT NULL,
  `LevelIndex` int(2) NOT NULL,
  `LevelName` text NOT NULL,
  `LevelScore` int(3) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `best_practice`
--

CREATE TABLE `best_practice` (
  `id` int(11) NOT NULL,
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
  `PublishDate` date NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `best_practice_creator`
--

CREATE TABLE `best_practice_creator` (
  `id` int(11) NOT NULL,
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
  `ParticipantRatio` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `CommitteeProvinceCode` int(2) NOT NULL,
  `CommitteeYear` int(4) NOT NULL,
  `CommitteeAppointmentNumber` int(6) NOT NULL,
  `CommitteeAppointmentTypeCode` text NOT NULL,
  `CommitteeAppointmentAttachmentURL` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_member`
--

CREATE TABLE `committee_member` (
  `id` int(11) NOT NULL,
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
  `CommitteeMemberTermEndDate` date NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `innovation`
--

CREATE TABLE `innovation` (
  `id` int(11) NOT NULL,
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
  `SearchKeyword` varchar(255) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `innovation_creator`
--

CREATE TABLE `innovation_creator` (
  `id` int(11) NOT NULL,
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
  `ParticipantRatio` int(3) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_technology_media`
--

CREATE TABLE `learning_technology_media` (
  `id` int(11) NOT NULL,
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
  `PublishDate` date NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_technology_media_creator`
--

CREATE TABLE `learning_technology_media_creator` (
  `id` int(11) NOT NULL,
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
  `ParticipantRatio` int(3) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `ParticipantID` int(16) NOT NULL,
  `ParticipantName` text NOT NULL,
  `ParticipantTypeCode` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant_contact`
--

CREATE TABLE `participant_contact` (
  `id` int(11) NOT NULL,
  `ParticipantID` int(16) NOT NULL,
  `ContactName` text NOT NULL,
  `ContactPhone` text NOT NULL,
  `ContactMobilePhone` text NOT NULL,
  `ContactEmail` text NOT NULL,
  `ContactOrganizationPosition` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant_cooperation`
--

CREATE TABLE `participant_cooperation` (
  `id` int(11) NOT NULL,
  `ParticipantID` int(16) NOT NULL,
  `CooperationStartDate` date NOT NULL,
  `CooperationEndDate` date NOT NULL,
  `CooperationStatusCode` text NOT NULL,
  `CooperationActivity` text NOT NULL,
  `CooperationLevelCode` text NOT NULL,
  `CooperationSchoolID` text NOT NULL,
  `CooperationAttachmentURL` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant_note`
--

CREATE TABLE `participant_note` (
  `id` int(11) NOT NULL,
  `ParticipantID` int(16) NOT NULL,
  `Note` text NOT NULL,
  `NoteReporterName` text NOT NULL,
  `NoteReporterPhone` text NOT NULL,
  `NoteReporterMobilePhone` text NOT NULL,
  `NoteReporterEmail` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `SchoolID` varchar(10) NOT NULL,
  `EducationYear` int(4) DEFAULT NULL,
  `Semester` int(1) DEFAULT NULL,
  `JurisdictionCode` varchar(10) DEFAULT NULL,
  `InnovationAreaCode` varchar(2) DEFAULT NULL,
  `SchoolNameThai` varchar(255) DEFAULT NULL,
  `SchoolNameEnglish` varchar(255) DEFAULT NULL,
  `SchoolEstablishedDate` date DEFAULT NULL,
  `SchoolTypeCode` varchar(4) DEFAULT NULL,
  `SchoolStatusCode` varchar(1) DEFAULT NULL,
  `MunicipalCode` varchar(2) DEFAULT NULL,
  `SchoolAddressHouseRegisterID` varchar(11) DEFAULT NULL,
  `SchoolAddressHouseNumber` varchar(50) DEFAULT NULL,
  `SchoolAddressMoo` int(2) DEFAULT NULL,
  `SchoolAddressStreet` varchar(100) DEFAULT NULL,
  `SchoolAddressSoi` varchar(100) DEFAULT NULL,
  `SchoolAddressTrok` varchar(100) DEFAULT NULL,
  `SchoolAddressSubdistrictCode` varchar(6) DEFAULT NULL,
  `SchoolAddressDistrictCode` varchar(4) DEFAULT NULL,
  `SchoolAddressProvinceCode` varchar(2) DEFAULT NULL,
  `SchoolAddressPostcode` varchar(5) DEFAULT NULL,
  `SchoolLatitude` double(12,8) DEFAULT NULL,
  `SchoolLongitude` double(12,8) DEFAULT NULL,
  `SchoolMapURL` varchar(255) DEFAULT NULL,
  `SchoolPhoneNumber` varchar(100) DEFAULT NULL,
  `SchoolSecondPhoneNumber` varchar(100) DEFAULT NULL,
  `SchoolFaxNumber` varchar(100) DEFAULT NULL,
  `SchoolSecondFaxNumber` varchar(100) DEFAULT NULL,
  `SchoolEmail` varchar(50) DEFAULT NULL,
  `SchoolWebsiteURL` varchar(255) DEFAULT NULL,
  `AdministratorPersonalID` varchar(13) DEFAULT NULL,
  `AdministratorPrefixCode` varchar(3) DEFAULT NULL,
  `AdministratorNameThai` varchar(100) DEFAULT NULL,
  `AdministratorMiddleNameThai` varchar(100) DEFAULT NULL,
  `AdministratorLastNameThai` varchar(100) DEFAULT NULL,
  `EducationLevelCode` varchar(20) DEFAULT NULL,
  `ElectricTypeCode` varchar(20) DEFAULT NULL,
  `InternetTypeCode` varchar(20) DEFAULT NULL,
  `WaterTypeCode` varchar(20) DEFAULT NULL,
  `EducationContentCode` varchar(20) DEFAULT NULL,
  `DLTVFlag` tinyint(1) DEFAULT NULL,
  `ComputerOnlineNumber` int(4) DEFAULT NULL,
  `ComputerStandaloneNumber` int(4) DEFAULT NULL,
  `ComputerTeachNumber` int(4) DEFAULT NULL,
  `ComputerManageNumber` int(4) DEFAULT NULL,
  `ToiletMaleStudentNumber` int(4) DEFAULT NULL,
  `ToiletFemaleStudentNumber` int(4) DEFAULT NULL,
  `ToiletCombinationNumber` int(4) DEFAULT NULL,
  `DeleteStatus` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment`
--

CREATE TABLE `school_assessment` (
  `id` int(11) NOT NULL,
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `SchoolAssessmentName` text NOT NULL,
  `SchoolAssessmentDescription` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment_criteria`
--

CREATE TABLE `school_assessment_criteria` (
  `id` int(11) NOT NULL,
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `CriteriaID` text NOT NULL,
  `AssessmentorName` text NOT NULL,
  `SchoolAssessmentScore` double(5,2) NOT NULL,
  `SchoolAssessmentCode` text NOT NULL,
  `SchoolAssessmentAttachmentURL` text NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_assessment_result`
--

CREATE TABLE `school_assessment_result` (
  `id` int(11) NOT NULL,
  `SchoolAssessmentEducationYear` int(4) NOT NULL,
  `SchoolAssessmentSemester` int(1) NOT NULL,
  `SchoolID` text NOT NULL,
  `CriteriaID` text NOT NULL,
  `CompositionIndex` int(2) NOT NULL,
  `LevelIndex` int(2) NOT NULL,
  `del_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement_assessment`
--
ALTER TABLE `achievement_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_criteria`
--
ALTER TABLE `assessment_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_criteria_composition`
--
ALTER TABLE `assessment_criteria_composition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_criteria_composition_level`
--
ALTER TABLE `assessment_criteria_composition_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_criteria_level`
--
ALTER TABLE `assessment_criteria_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_practice`
--
ALTER TABLE `best_practice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_practice_creator`
--
ALTER TABLE `best_practice_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_member`
--
ALTER TABLE `committee_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation`
--
ALTER TABLE `innovation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_creator`
--
ALTER TABLE `innovation_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_technology_media`
--
ALTER TABLE `learning_technology_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_technology_media_creator`
--
ALTER TABLE `learning_technology_media_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_contact`
--
ALTER TABLE `participant_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_cooperation`
--
ALTER TABLE `participant_cooperation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_note`
--
ALTER TABLE `participant_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_assessment`
--
ALTER TABLE `school_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_assessment_criteria`
--
ALTER TABLE `school_assessment_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_assessment_result`
--
ALTER TABLE `school_assessment_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement_assessment`
--
ALTER TABLE `achievement_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_criteria`
--
ALTER TABLE `assessment_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_criteria_composition`
--
ALTER TABLE `assessment_criteria_composition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_criteria_composition_level`
--
ALTER TABLE `assessment_criteria_composition_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_criteria_level`
--
ALTER TABLE `assessment_criteria_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `best_practice`
--
ALTER TABLE `best_practice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `best_practice_creator`
--
ALTER TABLE `best_practice_creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_member`
--
ALTER TABLE `committee_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `innovation`
--
ALTER TABLE `innovation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `innovation_creator`
--
ALTER TABLE `innovation_creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_technology_media`
--
ALTER TABLE `learning_technology_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_technology_media_creator`
--
ALTER TABLE `learning_technology_media_creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant_contact`
--
ALTER TABLE `participant_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant_cooperation`
--
ALTER TABLE `participant_cooperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant_note`
--
ALTER TABLE `participant_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_assessment`
--
ALTER TABLE `school_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_assessment_criteria`
--
ALTER TABLE `school_assessment_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_assessment_result`
--
ALTER TABLE `school_assessment_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
