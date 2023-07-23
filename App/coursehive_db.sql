-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 03:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursehive`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_description` varchar(500) NOT NULL,
  `course_start_date` date NOT NULL,
  `course_end_date` date NOT NULL,
  `course_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_description`, `course_start_date`, `course_end_date`, `course_img`) VALUES
(1, 'Introduction to Programming', 'What is programming? Programming is writing computer code to create a program, to solve a problem. Programs are created to implement algorithms . Algorithms can be represented as pseudocode or a flowchart , and programming is the translation of these into actual functioning program.', '2023-07-01', '2023-07-01', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiRhyDX-0U5Znby3iJEeNWKR2Rjv5475ESAA&usqp=CAU'),
(2, 'Web Development Fundamentals', 'In simple terms, web development includes web designing, development, and maintenance of a website. Web developers develops websites, ensuring that they function properly in a way to provide good experience. Web developers do this by writing codes, using the right tools.', '2023-08-15', '2023-08-15', 'https://www.w3.org/html/logo/downloads/HTML5_1Color_Black.svg'),
(39, 'Computational Methods III', 'Computational models are mathematical models used to numerically study the behaviour of complex systems by means of a computer simulation. A computational model can be used to make predictions of the systems behaviour under different conditions.', '2023-06-28', '2023-06-28', 'https://leverageedublog.s3.ap-south-1.amazonaws.com/blog/wp-content/uploads/2019/11/23171108/Mathematics-and-Computing.jpg'),
(42, 'Network Security', 'Network security is the protection of the underlying networking infrastructure from unauthorized access, misuse, or theft. It involves creating a secure infrastructure for devices, applications, users, and applications to work in a secure manner.', '2023-06-13', '2023-06-13', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHrUK3E5Zicnke7fG91EU0zAKGNAwoFZB90w&usqp=CAU'),
(45, 'Cybersecurity Fundamentals', 'The term cybersecurity refers to techniques and practices designed to protect digital data. The data that is stored, transmitted or used on an information system. After all, that is what criminal wants, data. The network, servers, computers are just mechanisms to get to the data. ', '2023-07-05', '2023-07-05', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTR0OBsQfKm5jY-nipxv9i8pFY1lEbC5wNd8Q&usqp=CAU'),
(48, 'Digital Forensics', 'In its strictest connotation, the application of computer science and investigative procedures involving the examination of digital evidence - following proper search authority, chain of custody, validation with mathematics, use of validated tools, repeatability, reporting, and possibly expert testimony.', '2023-03-08', '2023-10-05', 'https://srisaibharathgroup.org/images/forensic.jpg'),
(49, 'Introduction to Politics', 'What is politics as a course?\r\nPolitics is the study of how governments work, how public policies are made, international relations and political ideas - from democracy to human rights. You will learn to assess ideas and arguments and develop your written and spoken communication skills.', '2023-06-15', '2023-11-29', 'https://polisci.indiana.edu/images/courses/global-economy.jpg'),
(50, 'Introduction to Philosophy', 'Explore the fundamental questions of existence, knowledge, values, reason, and more in this thought-provoking course that delves into the depths of human understanding and critical thinking. Challenge your perspectives and engage in philosophical discourse to broaden your intellectual horizons.', '2023-06-28', '2023-06-28', 'https://majorsdata.arizona.edu/sites/default/files/styles/az_trellis_800w_scale/public/2020-02/ua_sbs_philosophy_politics_economics_and_law.jpg?itok=zrbToNff'),
(51, 'Arabic 101', 'Immerse yourself in the beauty of the Arabic language, its rich history, and cultural significance. Learn to read, write, and speak Arabic while exploring the traditions, literature, and diverse Arabic-speaking communities around the world.', '2023-06-01', '2023-07-04', 'https://www.cmuse.org/wp-content/uploads/2020/05/learn-arabic-lessons-online.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`course_id`, `instructor_id`, `availability`) VALUES
(42, 2, 'Not Available'),
(42, 3, 'Not Available'),
(2, 2, 'Not Available'),
(2, 3, 'Not Available'),
(45, 2, 'Not Available'),
(45, 3, 'Not Available'),
(2, 1, 'Not Available'),
(1, 2, ''),
(1, 3, ''),
(48, 1, ''),
(49, 2, ''),
(49, 3, ''),
(51, 2, ''),
(51, 3, ''),
(50, 2, ''),
(50, 3, ''),
(39, 2, ''),
(39, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_id`, `student_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `instructor_username` varchar(255) NOT NULL,
  `instructor_password` varchar(255) NOT NULL,
  `instructor_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_username`, `instructor_password`, `instructor_email`) VALUES
(1, 'instructor1', 'instructorpass1', 'instructor1@example.com'),
(2, 'instructor2', 'instructorpass2', 'instructor2@example.com'),
(3, 'instructor3', 'instructorpass3', 'instructor3@example.cpm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_username`, `student_password`, `student_email`, `student_phone`) VALUES
(1, 'student1', 'studentpass1', 'student1@example.com', '01012333251'),
(2, 'student2', 'studentpass2', 'student2@example.com', '01012663412'),
(3, 'student3', 'studentpass3', 'student3@example.com', '014198660422');

-- --------------------------------------------------------

--
-- Table structure for table `trainingprovider`
--

CREATE TABLE `trainingprovider` (
  `trainingprovider_id` int(11) NOT NULL,
  `trainingprovider_username` varchar(255) NOT NULL,
  `trainingprovider_password` varchar(255) NOT NULL,
  `trainingprovider_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainingprovider`
--

INSERT INTO `trainingprovider` (`trainingprovider_id`, `trainingprovider_username`, `trainingprovider_password`, `trainingprovider_email`) VALUES
(1, 'provider1', 'providerpass1', 'provider1@example.com'),
(2, 'provider2', 'providerpass2', 'provider2@example.com'),
(5, 'provider3', 'providerpass3', 'provider3@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `trainingprovider`
--
ALTER TABLE `trainingprovider`
  ADD PRIMARY KEY (`trainingprovider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainingprovider`
--
ALTER TABLE `trainingprovider`
  MODIFY `trainingprovider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `course_instructor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_instructor_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
