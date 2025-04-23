-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 06:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `id` varchar(255) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `grade` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`id`, `course_code`, `course_title`, `semester`, `grade`) VALUES
('213-15-4529', 'cse222', 'WEB BASED ENGINEERING', '7', 'a'),
('222-15-222', 'CSE234', 'WEB ENGINEERING', '8', '5');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` int(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `major` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `department`, `semester`, `shift`, `father_name`, `mother_name`, `address`, `number`, `file`, `time`, `dob`, `email`, `major`) VALUES
(160, 'Tanvir Ahmed', '233-15-4536', 'CSE', 2, 'Morning', 'Abul Kalam', 'Sufia Begum', 'DHAKA', '01711223344', '1745300001_TANVIR.jpg', '2025-04-23 14:31:08', '2003-03-11', 'tanvir4536@diu.edu.bd', 'AI & Robotics'),
(161, 'Rabeya Khatun', '233-15-4537', 'CSE', 2, 'Evening', 'Rashid Miah', 'Rokeya Begum', 'GAZIPUR', '01755667788', '1745300002_RABEYA.jpg', '2025-04-23 14:31:08', '2002-07-21', 'rabeya4537@diu.edu.bd', 'Data Science'),
(162, 'Hasan Mahmud', '233-15-4538', 'CSE', 1, 'Morning', 'Hasibur Rahman', 'Salma Khatun', 'RAJSHAHI', '01844556677', '1745300003_HASAN.jpg', '2025-04-23 14:31:08', '2004-02-18', 'hasan4538@diu.edu.bd', 'Cyber Security'),
(163, 'Sumaiya Zaman', '233-15-4539', 'CSE', 1, 'Evening', 'Zakir Hossain', 'Khadija Begum', 'KHULNA', '01933445566', '1745300004_SUMAIYA.jpg', '2025-04-23 14:31:08', '2003-09-22', 'sumaiya4539@diu.edu.bd', 'Networking'),
(164, 'Shahriar Kabir', '233-15-4540', 'CSE', 3, 'Morning', 'Mizanur Rahman', 'Fatema Begum', 'BARISAL', '01788776655', '1745300005_SHAHRIAR.jpg', '2025-04-23 14:31:08', '2002-11-13', 'shahriar4540@diu.edu.bd', 'Software Engineering'),
(165, 'Nusrat Jahan', '233-15-4541', 'CSE', 4, 'Evening', 'Jashim Uddin', 'Nilufa Begum', 'SYLHET', '01990011223', '1745300006_NUSRAT.jpg', '2025-04-23 14:31:08', '2001-05-06', 'nusrat4541@diu.edu.bd', 'Web Development'),
(166, 'Arafat Hossain', '233-15-4542', 'CSE', 3, 'Morning', 'Faruk Hossain', 'Shirin Akter', 'CUMILLA', '01744112233', '1745300007_ARAFAT.jpg', '2025-04-23 14:31:08', '2002-12-01', 'arafat4542@diu.edu.bd', 'Machine Learning'),
(167, 'Mahira Sultana', '233-15-4543', 'CSE', 2, 'Evening', 'Jahangir Alam', 'Rina Begum', 'MYMENSINGH', '01888990011', '1745300008_MAHIRA.jpg', '2025-04-23 14:31:08', '2003-06-15', 'mahira4543@diu.edu.bd', 'UI/UX Design'),
(168, 'Sakib Khan', '233-15-4544', 'CSE', 1, 'Morning', 'Alamgir Hossain', 'Rekha Akter', 'NARAYANGANJ', '01922334455', '1745300009_SAKIB.jpg', '2025-04-23 14:31:08', '2004-01-12', 'sakib4544@diu.edu.bd', 'Software Engineering'),
(169, 'Jannatul Ferdous', '233-15-4545', 'CSE', 3, 'Evening', 'Abdul Hakim', 'Nasima Begum', 'TANGAIL', '01733445566', '1745300010_JANNAT.jpg', '2025-04-23 14:31:08', '2002-10-30', 'jannatul4545@diu.edu.bd', 'Data Science'),
(170, 'Rakib Hasan', '233-15-4546', 'CSE', 4, 'Morning', 'Nazrul Islam', 'Amena Khatun', 'RANGPUR', '01877665544', '1745300011_RAKIB.jpg', '2025-04-23 14:31:08', '2001-12-24', 'rakib4546@diu.edu.bd', 'Database Management'),
(171, 'Shamima Akter', '233-15-4547', 'CSE', 2, 'Evening', 'Azizul Haque', 'Parvin Begum', 'NARSINGDI', '01799887766', '1745300012_SHAMIMA.jpg', '2025-04-23 14:31:08', '2003-08-09', 'shamima4547@diu.edu.bd', 'AI & Robotics'),
(172, 'Nahidul Islam', '233-15-4548', 'CSE', 1, 'Morning', 'Jahirul Islam', 'Asma Khatun', 'CHITTAGONG', '01911223344', '1745300013_NAHID.jpg', '2025-04-23 14:31:08', '2004-04-04', 'nahid4548@diu.edu.bd', 'Computer Vision'),
(173, 'Moushumi Akter', '233-15-4549', 'CSE', 2, 'Evening', 'Saidul Islam', 'Lubna Akter', 'JESSORE', '01855667799', '1745300014_MOUSHUMI.jpg', '2025-04-23 14:31:08', '2003-11-25', 'moushumi4549@diu.edu.bd', 'Human-Computer Interaction'),
(174, 'Tariqul Islam', '233-15-4550', 'CSE', 3, 'Morning', 'Mamun Hossain', 'Hasina Begum', 'BOGURA', '01744556633', '1745300015_TARIQ.jpg', '2025-04-23 14:31:08', '2002-02-17', 'tariqul4550@diu.edu.bd', 'Cloud Computing'),
(175, 'MD AL AMIN  SIAM', '213-11-1111', 'CSE', 1, '1st', 'roshidul', 'anzu', 'domar', '01951008871', '1745418982_dipu sir.jpg', '2025-04-23 14:37:19', '2025-04-04', 'akash.alamin.cse@gmail.com', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `c_password` varchar(200) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `c_password`, `photo`, `date`) VALUES
(17, 'MD AL AMIN AKASH', 'akash.alamin.cse@gmail.com', 'akash4529', 'akash4529', 'photo_2025-04-12_01-40-47.jpg', '2025-04-18 15:27:40'),
(19, 'MD AL AMIN AKASH', 'angkurdhar@gmail.com', 'akash4529', 'akash4529', 'akash 2.jpg', '2025-04-21 09:11:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
