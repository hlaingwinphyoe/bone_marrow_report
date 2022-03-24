-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bm_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirate_reports`
--

CREATE TABLE `aspirate_reports` (
  `id` int(11) NOT NULL,
  `institute_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_date` date NOT NULL,
  `lab_no` int(11) NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `physician_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_history` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmexamination` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_perform` enum('Aspirate','Trephine biopsy','Aspirate / Trephine biopsy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `anato_aspirate` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ease_diff_aspirate` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_count` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_smear` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellularity` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nucleated_differential` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cell` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `myeloid` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `erythro` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `myelopoiesis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `megaka` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lympho` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plasma_cell` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `haemopoietic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `abnormal_cell` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `iron_stain` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cytochemistry` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `investigation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_cyto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conclusion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trephine_reports`
--

CREATE TABLE `trephine_reports` (
  `id` int(11) NOT NULL,
  `institute_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_date` date NOT NULL,
  `lab_no` int(11) NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `physician_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_history` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmexamination` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_perform` enum('Aspirate biopsy','Trephine biopsy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `anato_trephine` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biopsy_core` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ade_macro_appearance` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_cellularity` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bone_architecture` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_from` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tre_number` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `erythroid` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `myeloid` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `megaka` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lymphoid` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plasma_cell` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `macrophages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `abnormal_cell` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reticulin_stain` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `immu_histo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `histochemistry` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `investigation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conclusion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `sg_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo`, `sg_photo`, `created_at`) VALUES
(1, 'Ko Phyoe', 'hlaingwinphyoe27@gmail.com', '$2y$10$WO6l5Z7iEyq/vpZaINe4nucvW1C.LN3lur68Zl.vae9LdXuBMwGFa', '0', 'default.png', 'store/623ab1f0679d5_photo_2022-03-21_21-33-52.jpg', '2022-03-23 05:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirate_reports`
--
ALTER TABLE `aspirate_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trephine_reports`
--
ALTER TABLE `trephine_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirate_reports`
--
ALTER TABLE `aspirate_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trephine_reports`
--
ALTER TABLE `trephine_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
