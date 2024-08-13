-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 10:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycorpec_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `presence_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `entry_time` time DEFAULT NULL,
  `exit_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Direktur', 'manage all'),
(2, 'Admin', 'manage content and blog'),
(3, 'Mandor', 'manage pembukaan presensi, presensi dan profile'),
(4, 'Teknisi', 'only presensi dan profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 5),
(4, 4),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'abayadmin123@gmail.com', 1, '2024-06-15 20:07:36', 1),
(2, '::1', 'abayadmin123@gmail.com', 1, '2024-06-16 12:49:42', 1),
(3, '::1', 'abayadmin123@gmail.com', 1, '2024-06-16 13:20:55', 1),
(4, '::1', 'abayadmin123@gmail.com', 1, '2024-06-21 18:00:07', 1),
(5, '::1', 'testerr', NULL, '2024-06-21 19:18:01', 0),
(6, '::1', 'abay123', NULL, '2024-06-21 19:18:07', 0),
(7, '::1', 'abayadmin123@gmail.com', 1, '2024-06-21 19:18:13', 1),
(8, '::1', 'testerr', NULL, '2024-06-21 19:18:31', 0),
(9, '::1', 'testerr', NULL, '2024-06-21 19:18:37', 0),
(10, '::1', 'testerr', NULL, '2024-06-21 19:19:04', 0),
(11, '::1', 'abayadmin123@gmail.com', 1, '2024-06-21 19:19:16', 1),
(12, '::1', 'tester123@test.com', 2, '2024-06-21 19:19:34', 1),
(13, '::1', 'abayadmin123@gmail.com', 1, '2024-06-21 19:22:59', 1),
(14, '::1', 'tester123@test.com', 2, '2024-06-21 19:54:56', 1),
(15, '::1', 'abayadmin123@gmail.com', 1, '2024-06-21 19:55:51', 1),
(16, '::1', 'tester123@test.com', 2, '2024-06-21 19:57:35', 1),
(17, '::1', 'abayadmin123@gmail.com', 1, '2024-06-22 07:23:24', 1),
(18, '::1', 'tester11', NULL, '2024-06-22 07:25:18', 0),
(19, '::1', 'tester@test.com', 4, '2024-06-22 07:25:29', 1),
(20, '::1', 'abayadmin123@gmail.com', 1, '2024-06-23 01:22:26', 1),
(21, '::1', 'tester@test.com', 4, '2024-06-23 01:24:26', 1),
(22, '::1', 'tester@test.com', 4, '2024-06-23 01:28:41', 1),
(23, '::1', 'tester@test.com', 4, '2024-06-23 01:29:30', 1),
(24, '::1', 'abayadmin123@gmail.com', 1, '2024-06-23 05:55:15', 1),
(25, '::1', 'tester@test.com', 4, '2024-06-23 05:56:21', 1),
(26, '::1', 'tester@test.com', 4, '2024-06-23 05:59:15', 1),
(27, '::1', 'tester@test.com', 4, '2024-06-23 06:06:16', 1),
(28, '::1', 'tester@test.com', 4, '2024-06-23 06:08:19', 1),
(29, '::1', 'tester11', NULL, '2024-06-23 21:02:26', 0),
(30, '::1', 'tester@test.com', 4, '2024-06-23 21:02:30', 1),
(31, '::1', 'direktur', NULL, '2024-06-23 21:04:19', 0),
(32, '::1', 'direktur', NULL, '2024-06-23 21:04:25', 0),
(33, '::1', 'abayadmin123@gmail.com', 1, '2024-06-23 21:04:39', 1),
(34, '::1', 'testerr', NULL, '2024-06-23 21:06:26', 0),
(35, '::1', 'testerrr', NULL, '2024-06-23 21:06:32', 0),
(36, '::1', 'testerr', NULL, '2024-06-23 21:06:40', 0),
(37, '::1', 'testerr', NULL, '2024-06-23 21:06:45', 0),
(38, '::1', 'testerrr', NULL, '2024-06-23 21:06:54', 0),
(39, '::1', 'tester11@test.com', 5, '2024-06-23 21:10:53', 1),
(40, '::1', 'abayadmin123@gmail.com', 1, '2024-06-24 04:16:02', 1),
(41, '::1', 'tester@test.com', 4, '2024-06-24 04:16:28', 1),
(42, '::1', 'tester@test.com', 4, '2024-06-24 04:19:05', 1),
(43, '::1', 'abayadmin123@gmail.com', 1, '2024-06-25 01:10:40', 1),
(44, '::1', 'testerrrqwe', NULL, '2024-06-25 01:11:10', 0),
(45, '::1', 'testerrrqwe', NULL, '2024-06-25 01:11:19', 0),
(46, '::1', 'tester@test.com', 4, '2024-06-25 01:11:31', 1),
(47, '::1', 'tester@test.com', 4, '2024-06-25 01:58:18', 1),
(48, '::1', 'testerrrqwe', NULL, '2024-06-25 10:22:07', 0),
(49, '::1', '1234561@gmail.com', 6, '2024-06-25 10:22:09', 1),
(50, '::1', 'tester11', NULL, '2024-06-25 13:21:29', 0),
(51, '::1', 'tester@test.com', 4, '2024-06-25 13:21:35', 1),
(52, '::1', 'abayadmin123@gmail.com', 1, '2024-06-25 14:39:33', 1),
(53, '::1', 'abayadmin123@gmail.com', 1, '2024-06-25 23:12:29', 1),
(54, '::1', '1234561@gmail.com', 6, '2024-06-25 23:31:47', 1),
(55, '::1', 'abayadmin123@gmail.com', 1, '2024-06-25 23:45:27', 1),
(56, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 02:41:27', 1),
(57, '::1', 'abay123', NULL, '2024-06-26 07:56:49', 0),
(58, '::1', 'ataaaasss', NULL, '2024-06-26 07:57:11', 0),
(59, '::1', 'abay123', NULL, '2024-06-26 08:17:24', 0),
(60, '::1', 'tester11', NULL, '2024-06-26 08:17:30', 0),
(61, '::1', 'testerr', NULL, '2024-06-26 08:17:38', 0),
(62, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:17:43', 1),
(63, '::1', 'tester11', NULL, '2024-06-26 08:18:03', 0),
(64, '::1', 'tester@test.com', 4, '2024-06-26 08:18:07', 1),
(65, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:21:29', 1),
(66, '::1', 'testr12', NULL, '2024-06-26 08:23:26', 0),
(67, '::1', 'testr12', NULL, '2024-06-26 08:23:29', 0),
(68, '::1', 'tester11@test.com', 5, '2024-06-26 08:23:34', 1),
(69, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:23:55', 1),
(70, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:33:22', 1),
(71, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:33:47', 1),
(72, '::1', 'testr12', NULL, '2024-06-26 08:34:04', 0),
(73, '::1', 'testr12', NULL, '2024-06-26 08:34:18', 0),
(74, '::1', 'testr12', NULL, '2024-06-26 08:34:21', 0),
(75, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 08:34:27', 1),
(76, '::1', 'tester11@test.com', 5, '2024-06-26 08:34:56', 1),
(77, '::1', 'abayadmin123@gmail.com', 1, '2024-06-26 12:12:23', 1),
(78, '::1', 'asdsa12345', NULL, '2024-06-26 16:10:38', 0),
(79, '::1', 'tester11@test.com', 5, '2024-06-26 16:10:50', 1),
(80, '::1', 'abayadmin123@gmail.com', 1, '2024-06-27 14:20:13', 1),
(81, '::1', 'abayadmin123@gmail.com', 1, '2024-06-27 14:20:58', 1),
(82, '::1', 'testerr', NULL, '2024-06-27 14:21:17', 0),
(83, '::1', 'testerr', NULL, '2024-06-27 14:21:21', 0),
(84, '::1', 'tester123@test.com', 2, '2024-06-27 14:21:30', 1),
(85, '::1', 'abayadmin123@gmail.com', 1, '2024-06-28 01:46:09', 1),
(86, '::1', 'abayadmin123@gmail.com', 1, '2024-06-28 04:28:08', 1),
(87, '::1', 'admincorp', NULL, '2024-06-28 04:28:26', 0),
(88, '::1', 'tester123@test.com', 2, '2024-06-28 04:28:32', 1),
(89, '::1', 'abayadmin123@gmail.com', 1, '2024-06-28 04:32:03', 1),
(90, '::1', 'testr12', NULL, '2024-06-28 04:32:17', 0),
(91, '::1', 'testr12', NULL, '2024-06-28 04:32:22', 0),
(92, '::1', 'tester11@test.com', 5, '2024-06-28 04:32:28', 1),
(93, '::1', 'tester123@test.com', 2, '2024-06-28 04:37:11', 1),
(94, '::1', 'tester123@test.com', 2, '2024-06-28 04:38:42', 1),
(95, '::1', 'abayadmin123@gmail.com', 1, '2024-06-28 10:57:21', 1),
(96, '::1', 'abayadmin123@gmail.com', 1, '2024-06-30 12:54:36', 1),
(97, '::1', 'tester11@test.com', 5, '2024-06-30 12:55:00', 1),
(98, '::1', 'abayadmin123@gmail.com', 1, '2024-06-30 16:11:11', 1),
(99, '::1', 'tester11@test.com', 5, '2024-06-30 16:27:32', 1),
(100, '::1', 'abayadmin123@gmail.com', 1, '2024-06-30 16:33:39', 1),
(101, '::1', 'abay123', NULL, '2024-06-30 17:06:48', 0),
(102, '::1', 'abayadmin123@gmail.com', 1, '2024-06-30 17:06:53', 1),
(103, '::1', 'tester11', NULL, '2024-06-30 17:07:10', 0),
(104, '::1', 'tester11', NULL, '2024-06-30 17:07:13', 0),
(105, '::1', 'tester11', NULL, '2024-06-30 17:07:17', 0),
(106, '::1', 'tester11', NULL, '2024-06-30 17:07:31', 0),
(107, '::1', 'abayadmin123@gmail.com', 1, '2024-06-30 17:07:37', 1),
(108, '::1', '1234561@gmail.com', 6, '2024-06-30 17:07:56', 1),
(109, '::1', 'abayadmin123@gmail.com', 1, '2024-07-09 15:53:59', 1),
(110, '::1', 'testerrrqwe', NULL, '2024-07-09 15:58:10', 0),
(111, '::1', 'testerrrqwe', NULL, '2024-07-09 15:58:17', 0),
(112, '::1', '1234561@gmail.com', 6, '2024-07-09 15:58:23', 1),
(113, '::1', 'abayadmin123@gmail.com', 1, '2024-07-13 03:23:07', 1),
(114, '::1', '1234561@gmail.com', 6, '2024-07-13 03:28:49', 1),
(115, '::1', 'abayadmin123@gmail.com', 1, '2024-07-13 11:41:04', 1),
(116, '::1', '1234561@gmail.com', 6, '2024-07-13 11:42:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corpec_news`
--

CREATE TABLE `corpec_news` (
  `news_id` int(11) UNSIGNED NOT NULL,
  `url_news` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `image_news` varchar(255) NOT NULL,
  `news_description` text DEFAULT NULL,
  `category_News` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `corpec_news`
--

INSERT INTO `corpec_news` (`news_id`, `url_news`, `news_title`, `image_news`, `news_description`, `category_News`, `created_at`, `updated_at`) VALUES
(1, 'perencanaan-aplikasi-penggajian-di-corpec-inspeksi-utama', 'Perencanaan Aplikasi Penggajian di Corpec inspeksi utama', '1719329302_ba67622fc35f0ff46d0b.png', '<p>Membuat Website PT. Corpec Inspeksi Utama Untuk Menyelesaikan Skripsi&nbsp;</p>', 4, '2024-06-25 19:29:58', '2024-06-25 22:29:16'),
(2, 'pharmaceutical', 'Pharmaceutical', '1719329442_7e2ba39a99d58dcc45df.png', '<p>PT. Corpec Inspeksi Utama has in depth knowledge about the regulation is needed in the pharmaceutical industries (FDA ,USP 36,WHO TRS 929,ISPE 2011, BP POM, ASME BPE 2010, and ASME Code), so the products that is produced will meet the quality standard including functionality and documentation are need such as Design Qualification(DQ), Installation qualification (IQ) and Operating Qualification (OQ).</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:795/401;\" src=\"https://corpec.co.id/wp-content/uploads/2021/04/engineering-.png\" width=\"795\" height=\"401\"></figure><p><strong>Scope of Supply:</strong></p><p><strong>As Turnkey Project</strong></p><ul><li>Water Treatment &amp; Purified Water Generator</li><li>Purified Water Loop System</li><li>Water For Injection Loop System</li><li>Pure Steam Distribution System</li><li>Oral Liquid Mixing System</li><li>CIP Systems</li><li>Small Volume Parentheral (SVP) Mixing System</li><li>Large Volume Parentheral (LVP) Mixing System</li><li>Alcohol Distribution System</li><li>Sorbitol Distribution System</li></ul><p><strong>As Single Product</strong></p><ul><li>Stainless Steel Storage Tank</li><li>Stainless Steel Mixing Tank</li><li>Agitator</li><li>Homogenizer</li></ul><p><strong>As service &amp; maintenance</strong></p><ul><li>Upgrade PLC Automation</li><li>Supply Spare part for Project on going or existing equipment</li><li>Contract Maintenance</li><li>Passivating Work</li><li>Boroscope &amp; X-Ray Work</li><li>Piping Installation as Manual or Orbital Welding</li><li>Repair Tank</li></ul><p><strong>As Engineering Design</strong></p><ul><li>Consulting for Mechanical, Electrical and Process Design</li></ul>', 1, '2024-06-25 19:52:46', '2024-06-25 22:30:42'),
(3, 'chemical', 'Chemical', '1719328080_0cbaf79dad875e67283c.png', '<p>PT. Corpec Inspeksi Utama supporting main contractor or engineering company as license design, for supply good reactor and mixing tank included piping installation in turnkey project.</p><figure class=\"table\"><table><tbody><tr><td>As Single Product</td><td>As service &amp; maintenance</td><td>As Engineering Design</td></tr><tr><td>Stainless Steel Storage Tank</td><td>Piping Installation as Manual or Orbital Welding</td><td rowspan=\"5\">Consulting for Mechanical, Electrical and Process Design</td></tr><tr><td>Stainless Steel Mixing Tank</td><td>Repair Tank</td></tr><tr><td>Stainless Steel Reactor</td><td>Inspection Works</td></tr><tr><td>Agitator</td><td rowspan=\"2\">Utility Line as per steam, compress air, gas distribution &amp; chiller Line</td></tr><tr><td>Modular units</td></tr></tbody></table></figure>', 1, '2024-06-25 19:58:17', '2024-06-25 22:08:00'),
(4, 'cosmetic', 'Cosmetic', 'corpecLogo.jpg', '<p>PT. Corpec Inspeksi Utama have familiar with emultion, suspension and gell process that most commons in cosmetic industry.</p><p>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>As Turnkey Project</td><td>As Single Product</td><td>As service &amp; maintenance</td><td>As Engineering Design</td></tr><tr><td>Water Treatment</td><td>Stainless Steel Storage Tank</td><td>Upgrade PLC Automation</td><td>Consulting for Mechanical, Electrical and Process Design</td></tr><tr><td>RO Water DistributionSystem</td><td>Stainless Steel Mixing Tank</td><td>Supply Spare part for Project on going or existing equipment</td><td rowspan=\"5\">&nbsp;</td></tr><tr><td>Vacuum Mixing System</td><td>Agitator</td><td>Passivating Work</td></tr><tr><td>CIP System</td><td rowspan=\"3\">Homogenize</td><td>Contract Maintenance</td></tr><tr><td rowspan=\"2\">Alcohol Distribution System</td><td>Piping Installation as Manual or Orbital Welding</td></tr><tr><td>Repair Tank</td></tr></tbody></table></figure><p>&nbsp;</p><p>&nbsp;</p>', 1, '2024-06-25 21:58:47', '2024-06-25 21:58:47'),
(5, 'food-beverage', 'Food & Beverage', 'corpecLogo.jpg', '<p>PT. Corpec Inspeksi Utama helps food and beverage companies efficiently transform raw materials into finished products</p><figure class=\"table\"><table><tbody><tr><td>As Turnkey Project</td><td>As Single Product</td><td>As service &amp; maintenance</td><td>As Engineering Design</td></tr><tr><td>Water Treatment</td><td>Stainless Steel Storage Tank</td><td>Upgrade PLC Automation</td><td>Consulting for Mechanical, Electrical and Process Design</td></tr><tr><td>RO Water Distribution System</td><td>Stainless Steel Giant Tank</td><td>Supply Spare part for Project on going or existing equipment</td><td rowspan=\"9\">&nbsp;</td></tr><tr><td>VaAlcohol Distribution System</td><td>Stainless Steel Mixing Tank</td><td>Contract Maintenance</td></tr><tr><td>Raw Water Tank &amp; Distribution System</td><td>Road Tanker</td><td>Passivating Work</td></tr><tr><td>Pasteurizer Units</td><td>Swing Bend Panel</td><td>Piping Installation as Manual or Orbital Welding</td></tr><tr><td>CIP System</td><td>Raw Water Tank</td><td>Repair Tank</td></tr><tr><td rowspan=\"4\">&nbsp;</td><td>Silo</td><td rowspan=\"4\">&nbsp;</td></tr><tr><td>Valve Cluster</td></tr><tr><td>Agitator</td></tr><tr><td>Homogenizer</td></tr></tbody></table></figure>', 1, '2024-06-25 22:03:33', '2024-06-25 22:03:33'),
(6, 'bussiness-overview-industrial', 'Bussiness Overview – Industrial', 'corpecLogo.jpg', '<p>Industrial Inspection</p><p>• Non Destructive Testing&nbsp;</p><p>• Tube Cleaning Service&nbsp;</p><p>• Crane Inspection&nbsp;</p><p>• Lifting Equipment Inspection&nbsp;</p><p>• Control of Corrosion Service&nbsp;</p><p>• Boiler Inspection&nbsp;</p><p>• Pressure Vessel Inspection&nbsp;</p><p>• Pipeline Inspection&nbsp;</p><p>• Instrument Control Service&nbsp;</p><p>• Antenna System Inspection&nbsp;</p><p>• Tower Inspection&nbsp;</p><p>• Lightening Protection&nbsp;</p><p>• Material Certification Service&nbsp;</p><p>• Equipment Testing Service&nbsp;</p><p>• In-plant Inspection Service&nbsp;</p><p>• Hydrostatic Testing&nbsp;</p><p>• Tank Inspection</p>', 2, '2024-06-25 22:10:05', '2024-06-25 22:10:05'),
(7, 'lightening-protection', 'Lightening Protection', '1719328710_4be404357c95ae1cf233.png', '<p>Lightning protection system is a series of protection or protection systems from the dangers of lightning strikes, both direct and indirect lightning strikes. as we all know how dangerous the effects or effects of lightning strikes directly or indirectly (read: detailed information about lightning) and lightning protection systems is one way or effort to overcome lightning strikes. Lightning protection system is divided into 2 (two) types, namely:&nbsp;</p><ol><li>External Lightning Protection System&nbsp;</li><li>Internal Lightning Protection System</li></ol>', 2, '2024-06-25 22:11:01', '2024-06-25 22:18:30'),
(8, 'project-experience-list-industrial', 'Project Experience List – Industrial', 'corpecLogo.jpg', '<p><strong>2015&nbsp;</strong></p><p>• Lightning Conductor and Generator Certification – PT. Bima PS&nbsp;<br>• Cathodic Protection TR 05 Balongan – PT. Pertamina&nbsp;<br>• Setting and Certification PSV, PVV – PT. Satu Bintang Timur&nbsp;<br>• Pipeline Inspection Balongan – PT. Pertamina&nbsp;<br>• Setting and Certification PSV, PVV Sibolga – PT. Pertamina&nbsp;<br>• Inspection and Calibration Tank-116 &amp; 101 Batam – PT. Pertamina • Inspection and Calibration Tank 02 Batam – PT. Pertamina • Eddy Current Test 5000 Tubes- PLN Padang&nbsp;<br>• Inspection and NDT MLA – Pertamina Plumpang&nbsp;<br>• Inspection and Calibration Tank 07 – Pertamina Bandung&nbsp;<br>• Setting and Certification PSV, PVV – PT. Satu Bintang Timur&nbsp;</p><p><strong>2016</strong>&nbsp;<br>• Setting, Calibraton and Certification PSV – PT. Bintang Satu Timur&nbsp;<br>• HP Heater Assesment and Inspection – PT. Indonesia Power&nbsp;<br>• Edy Current Testing Ombilin 2 – KSSO Ombilin&nbsp;<br>• Tank Inspection T-113 Pertalite – PT. Patra Niaga&nbsp;<br>• Breather Tank Valve Inspection T-113 Pertalite – PT. Patra Niaga&nbsp;<br>• Cathodic Tank TBBM Plumpang – PT. Pertamina&nbsp;<br>• Inspection and Cleaning Tank on Tran – PT. M3 Ketapang Sejahtera&nbsp;<br>• Pipe Locator – PT. Sinar Proteksindo • Cathodic Tank TBBM Ujung Berung – PT. Pertamina&nbsp;<br>• Setting, Calibration and Certifiaction PSV TBBM Balongan – PT. Pertamina&nbsp;<br>• Cathodic TR-3 BBM Balongan – PT. Pertamina&nbsp;<br>• Assesment PLTU Bukit Asam – PLN Bukit Asam&nbsp;<br>• HP Heater Simple Inspection – PT. Indonesia Power&nbsp;<br>• Cathodic TR ITP Kimasa – PT. Pertamina&nbsp;<br>• Tank Inspection Unindo Pulogadung – PT. ERM&nbsp;<br>• Setting, Calibration and Inspection 65 PRV TBBM Plumpang– PT. Pertamina&nbsp;<br>• Regular Calibration Pressure Vacum Valve TBBM Kertapati – PT. Pertamina&nbsp;<br>• PCM and ACVG – PT. MTI</p><p>&nbsp;</p>', 2, '2024-06-25 22:15:27', '2024-06-25 22:15:27'),
(9, 'project-experience-list-pre-audit', 'Project Experience List – Pre Audit', 'corpecLogo.jpg', '<p>Project Experience List – Pre Audit 2017 - 2018&nbsp;</p><ul><li>GOTS &amp; OCS Preparation and Guidance since 2014 until now – PT. Kurnia Ratu Kencana&nbsp;</li><li>OCS Preparation and Guidance since 2017 until now – Identity Intenational LTD&nbsp;</li><li>OCS Preparation and Guidance since 2017 until now – PT. Sandang Asia Maju Abadi</li><li>Social Compliance Audit Preparation at PT. Jusindo SumberPrakasa.</li></ul>', 4, '2024-06-25 22:20:26', '2024-06-26 02:42:14'),
(10, 'softlines-and-accesories', 'Softlines And Accesories', '1719328970_855bca678b1dc014e4fb.png', '<p>Corpec offers a wide range of services to the softlines and accessories industry, at every stage of the value chain.</p><p>We help to ensure the quality, safety and sustainability of these products, and their mode of distribution, to satisfy regulatory requirements as well as the demands of the market.</p><p><br>SOFTLINES AND ACCESSORIES SECTOR COMPRISES:</p><ul><li>TEXTILES AND CLOTHING</li><li>SHOES (AND OTHER FOOTWEAR)</li><li>BAGS AND ACCESSORIES</li><li>JEWELRY</li><li>LINENS AND TOWELS</li></ul><p>Due to the diverse nature of the industry, there are multiple manufacturers, suppliers and other actors along the supply chain. We can assist every player in this market, with services that can help you meet the requirements of regulators, distributors, retailers and consumers.</p><p>Thanks to our global network, we are able to provide our services to you and/or your suppliers wherever you are based and irrespective of the ultimate destination for your product(s).</p>', 3, '2024-06-25 22:22:50', '2024-06-25 22:22:50'),
(11, 'audit-service', 'Audit Service', '1719329140_192d67ca731413e18570.png', '<p>In today’s global business environment, it is essential not only to produce or manufacture the highest quality goods and products to compete in the market place, you need to ensure that they comply with international and national standards, market regulations and bespoke customer requirements.</p><p>We offer a range of pre-audit services to cover your entire value chain, from process to organization, service and systems. Our specialist audit service teams have global experience in every industry or sector, and bring global best practices into play to ensure that your processes and operations meet and exceed the market regulations and standards required.</p><p>Our specialist audit teams provide global market expertise, and our advanced testing facilities are among the best in the world. Our expertise will always add value, whether through audit, certification or technical assistance.</p><p><strong>SCOPE OF SERVICES:</strong></p><ul><li>ENVIRONMENTAL AUDIT SERVICE</li><li>SECURITY AUDITS</li><li>SOCIAL AUDITS</li><li>TECHNICAL AUDIT</li><li>GOTS &amp; OCS CONSULTANCY</li></ul><p>&nbsp;</p>', 4, '2024-06-25 22:25:40', '2024-06-25 22:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1718481575, 1),
(2, '2024-06-15-105455', 'App\\Database\\Migrations\\CorpecNews', 'default', 'App', 1719318419, 7),
(3, '2024-06-21-185140', 'App\\Database\\Migrations\\Presence', 'default', 'App', 1718995991, 2),
(4, '2024-06-21-185629', 'App\\Database\\Migrations\\PresenceUser', 'default', 'App', 1718996207, 3),
(5, '2024-06-22-073642', 'App\\Database\\Migrations\\Attendance', 'default', 'App', 1719042101, 5),
(6, '2024-06-25-012929', 'App\\Database\\Migrations\\Salary', 'default', 'App', 1719279962, 6),
(7, '2024-06-26-052928', 'App\\Database\\Migrations\\PartnerCorp', 'default', 'App', 1719380013, 8);

-- --------------------------------------------------------

--
-- Table structure for table `partnercorp`
--

CREATE TABLE `partnercorp` (
  `partnerid` int(11) UNSIGNED NOT NULL,
  `imagepartner` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `partnercorp`
--

INSERT INTO `partnercorp` (`partnerid`, `imagepartner`, `created_at`, `updated_at`) VALUES
(1, '1719518193_7d686e6a9d64ca8d172d.jpg', '2024-06-28 02:56:33', '2024-06-28 02:56:33'),
(2, '1719518205_d0a820f33b9a3a5d495f.png', '2024-06-28 02:56:45', '2024-06-28 02:56:45'),
(3, '1719518257_cac8f50ea4e93d914efb.jpg', '2024-06-28 02:57:37', '2024-06-28 02:57:37'),
(4, '1719518269_bdaae48183f8db06bc52.png', '2024-06-28 02:57:49', '2024-06-28 02:57:49'),
(5, '1719518499_31dcc130c5b39b17c17b.jpg', '2024-06-28 03:01:39', '2024-06-28 03:01:39'),
(6, '1719518569_7ae1900d699d65a7cfbd.png', '2024-06-28 03:02:49', '2024-06-28 03:02:49'),
(7, '1719519457_ca6a79684c2d42c52a73.png', '2024-06-28 03:17:37', '2024-06-28 03:17:37'),
(8, '1719519512_a5a6503ee09abaa90217.png', '2024-06-28 03:18:32', '2024-06-28 03:18:32'),
(9, '1719519683_5aa5293801576566c52d.jpg', '2024-06-28 03:21:23', '2024-06-28 03:21:23'),
(10, '1719519701_cce94fa0ca87480eb626.jpg', '2024-06-28 03:21:41', '2024-06-28 03:21:41'),
(11, '1719519711_b734e0c80743d5ae2035.jpg', '2024-06-28 03:21:51', '2024-06-28 03:21:51'),
(12, '1719519734_03c1c92c534c41c15bf9.png', '2024-06-28 03:22:14', '2024-06-28 03:22:14'),
(13, '1719519803_6ba75b4a427f303b75d3.png', '2024-06-28 03:23:23', '2024-06-28 03:23:23'),
(14, '1719519812_9aa837a17357a8bdc9de.png', '2024-06-28 03:23:32', '2024-06-28 03:23:32'),
(15, '1720819294_a006c82662a8e69df98e.jpeg', '2024-07-13 04:21:34', '2024-07-13 04:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `max_start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `max_end_time` time NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id`, `company_name`, `location`, `start_time`, `max_start_time`, `end_time`, `max_end_time`, `created_at`, `updated_at`) VALUES
(13, 'PT AMAN SEJAHTERA', '-6.6420736, 106.643456', '12:00:00', '12:05:00', '12:06:00', '12:06:00', '2024-07-13 12:03:57', '2024-07-13 12:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `presence_users`
--

CREATE TABLE `presence_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `presence_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `presence_users`
--

INSERT INTO `presence_users` (`id`, `user_id`, `presence_id`, `created_at`, `updated_at`) VALUES
(38, 6, 13, '2024-07-13 12:03:57', '2024-07-13 12:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `transfer_photo` varchar(255) DEFAULT NULL,
  `transfer_date` datetime NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `total_salary`, `deduction`, `transfer_photo`, `transfer_date`, `note`, `created_at`, `updated_at`) VALUES
(3, 4, '5000000.00', '0.00', '1719472980_533261b2c4d5ec6732b2.png', '2024-06-27 14:23:00', '', NULL, NULL),
(4, 2, '5000000.00', '0.00', '1719741505_6b176d5bedfee26d7bcb.png', '2024-06-30 16:58:25', 'www', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `nik_krywn` varchar(20) DEFAULT NULL,
  `usia_karyawan` varchar(3) NOT NULL,
  `gaji_karyawan` varchar(10) DEFAULT NULL,
  `rek_karyawan` varchar(100) NOT NULL,
  `gmbr_rekktp` varchar(255) NOT NULL,
  `image_karyawan` varchar(255) NOT NULL DEFAULT 'default.webp',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `nik_krywn`, `usia_karyawan`, `gaji_karyawan`, `rek_karyawan`, `gmbr_rekktp`, `image_karyawan`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abayadmin123@gmail.com', 'abay123', 'Muhammad Rizki Akbar', NULL, '', NULL, '', '', 'default.webp', '$2y$10$WQ.DNIHicw9f0uH6NEG3T.nOtXX4/8uDdVoAOHZ0PtQbK/U7BGe3K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-15 20:00:08', '2024-06-15 20:00:08', NULL),
(2, 'tester123@test.com', 'admincorp', 'Admin Corpec', '1234567', '21', '5000000', '12345', '1718481835_86da17ab41aabdfbc5db.jpg', '1718481835_ea759d9a1822baf6aafa.jpg', '$2y$10$WQ.DNIHicw9f0uH6NEG3T.nOtXX4/8uDdVoAOHZ0PtQbK/U7BGe3K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-15 20:03:55', '2024-06-15 20:03:55', NULL),
(4, 'tester@test.com', 'tester11', 'abay32', '1234567', '21', '5000000', '12343566', '1718999942_1f3e303dae5036fe7015.png', '1718999941_05129d521ffdc24b47c6.jpg', '$2y$10$wrP9.aGoLCw9ikRdWBKx7.NwCBZxvLEwrY9i7aZLtabqnfeF2RLey', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-21 19:59:02', '2024-06-21 19:59:02', NULL),
(5, 'tester11@test.com', 'testr12', 'Karyawan Page', '1234567', '24', '5000000', '123456', '1719177047_e975bcde56f8d86c6fad.png', '1719177047_1cf843338608521ac373.jpg', '$2y$10$RWSEUz/mWNKVpuZJm7pPBOYdARZH0XO/4jNRyHt3A49cKIdH7csSa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-23 21:10:47', '2024-06-23 21:10:47', NULL),
(6, '1234561@gmail.com', 'testerrrqwe', 'asdasd', '1234567', '24', '1000000', '112233445566', '1719182412_d2128a8ea12a2a4035d6.jpg', '1719182412_e20ad2d5ac87e5670146.png', '$2y$10$MB3PlWG0oI66oeE8M..Tpu5LEK2V6RTdSwVDN/dtXY0rbk5IpqIPm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-06-23 22:40:12', '2024-06-23 22:40:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`),
  ADD KEY `attendances_presence_id_foreign` (`presence_id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `corpec_news`
--
ALTER TABLE `corpec_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnercorp`
--
ALTER TABLE `partnercorp`
  ADD PRIMARY KEY (`partnerid`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presence_users`
--
ALTER TABLE `presence_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presence_users_user_id_foreign` (`user_id`),
  ADD KEY `presence_users_presence_id_foreign` (`presence_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corpec_news`
--
ALTER TABLE `corpec_news`
  MODIFY `news_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partnercorp`
--
ALTER TABLE `partnercorp`
  MODIFY `partnerid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `presence_users`
--
ALTER TABLE `presence_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_presence_id_foreign` FOREIGN KEY (`presence_id`) REFERENCES `presences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presence_users`
--
ALTER TABLE `presence_users`
  ADD CONSTRAINT `presence_users_presence_id_foreign` FOREIGN KEY (`presence_id`) REFERENCES `presences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presence_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
