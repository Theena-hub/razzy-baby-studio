-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2024 at 05:18 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u977418768_babystudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `mail`, `password`, `created_on`) VALUES
(1, 'Studio', 'admin@gmail.com', 'admin123', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `message` varchar(2255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `name`, `mobile`, `service_id`, `message`, `created_on`, `status`) VALUES
(1, 'Karthi', '65464849778', 1, 'new', '2024-02-14 07:33:11', 0),
(2, 'Karthi', '65464849778', 1, '1', '2024-02-14 07:33:15', 0),
(3, 'jack', '65464849778', 1, '', '2024-02-26 06:27:44', 0),
(4, 'raj', '9626519626', 7, '', '2024-03-15 05:47:32', 0),
(5, 'meera', '9585995665', 16, 'shoot date 28.3.2024', '2024-03-15 05:47:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `image`, `created_on`, `status`) VALUES
(1, '1920x1080_H.jpg', 0, 1),
(2, '1920x1080_I.jpg', 0, 1),
(3, '1920x1080_C.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_images`
--

CREATE TABLE `tbl_gallery_images` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery_images`
--

INSERT INTO `tbl_gallery_images` (`id`, `service_id`, `image`, `created_on`, `status`) VALUES
(1, 2, '800pxx800px_V.jpg', '2024-02-13 15:52:08', 1),
(2, 2, '800pxx450px_S.jpg', '2024-02-13 15:52:18', 1),
(3, 2, '800pxx800px_B.jpg', '2024-02-13 15:52:32', 1),
(4, 2, '800pxx800px_Q.jpg', '2024-02-13 15:52:42', 1),
(5, 1, '800pxx450px_D.jpg', '2024-02-13 15:52:59', 1),
(6, 1, '800pxx450px_L.jpg', '2024-02-13 15:53:10', 1),
(7, 1, '800pxx450px_G.jpg', '2024-02-13 15:53:22', 1),
(8, 1, '800pxx450px_H.jpg', '2024-02-13 15:53:33', 1),
(9, 1, '005 copy.jpg', '2024-02-14 06:29:42', 1),
(10, 2, '65cde45aa1082.jpg', '2024-02-15 10:15:54', 1),
(11, 7, '65cde47a8b041.jpg', '2024-02-15 10:16:26', 1),
(12, 16, '65cde49666f82.jpg', '2024-02-15 10:16:54', 1),
(13, 17, '65cde4fc37f9a.jpg', '2024-02-15 10:18:36', 0),
(14, 18, '65cde562eb7c7.jpg', '2024-02-15 10:20:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_homebanner`
--

CREATE TABLE `tbl_homebanner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `redirect` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_homebanner`
--

INSERT INTO `tbl_homebanner` (`id`, `title`, `image`, `redirect`, `created_on`, `status`) VALUES
(1, 'Newborn Photography', '65cc74f9edbe9.jpg', '2', '2024-02-13 14:34:19', 1),
(2, 'Maternity Photoshoot', '65cc751629dae.jpg', '1', '2024-02-13 14:52:55', 1),
(3, 'Toddler Photoshoot', '65cc7554a9f16.jpg', '7', '2024-02-14 08:06:46', 1),
(4, 'Family Portraits', '65cc757952ef7.jpg', '16', '2024-02-14 08:07:39', 1),
(5, 'Birthday Events', '65cc76ac3f773.jpg', '18', '2024-02-14 08:15:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_images`
--

CREATE TABLE `tbl_home_images` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_home_images`
--

INSERT INTO `tbl_home_images` (`id`, `service_id`, `image`, `created_on`, `status`) VALUES
(1, 2, '800pxx800px_U.jpg', '2024-02-14 06:32:04', 1),
(2, 1, '006 copy.jpg', '2024-02-15 09:57:48', 0),
(3, 7, '800pxx800px_007 copy.jpg', '2024-02-14 06:33:14', 1),
(4, 16, '800pxx800px_G.jpg', '2024-02-14 07:49:26', 1),
(5, 7, '800pxx800px_021 copy.jpg', '2024-02-14 07:46:12', 1),
(6, 1, '800pxx450px 002 copy.jpg', '2024-02-14 07:51:15', 1),
(7, 2, '800pxx800px_A.jpg', '2024-02-14 07:52:11', 1),
(8, 1, '800pxx800px_C.jpg', '2024-02-14 07:50:40', 1),
(9, 7, '800pxx800px_029 copy.jpg', '2024-02-14 07:52:58', 1),
(10, 7, '65cca033108dc.jpg', '2024-02-14 12:25:50', 0),
(11, 16, '65cddf1811963.jpg', '2024-02-15 09:53:28', 1),
(12, 16, '65cddf2e6fecc.jpg', '2024-02-15 09:53:50', 1),
(13, 16, '65cddf405c0c6.jpg', '2024-02-15 09:54:08', 1),
(14, 16, '65cddf4b0d6f6.jpg', '2024-02-15 09:54:19', 1),
(15, 16, '65cddf6a6350f.jpg', '2024-02-15 09:54:50', 1),
(16, 1, '65cddfbc60888.jpg', '2024-02-15 09:56:12', 1),
(17, 1, '65cddfdcd347e.jpg', '2024-02-15 09:56:44', 1),
(18, 1, '65cde0411daa8.jpg', '2024-02-15 09:58:25', 1),
(19, 1, '65cde0675267e.jpg', '2024-02-15 09:59:03', 1),
(20, 7, '65cde09a31b41.jpg', '2024-02-15 09:59:54', 1),
(21, 7, '65cde0ab60b57.jpg', '2024-02-15 10:00:11', 1),
(22, 7, '65cde0c511544.jpg', '2024-02-15 10:00:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instagram`
--

CREATE TABLE `tbl_instagram` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_instagram`
--

INSERT INTO `tbl_instagram` (`id`, `link`, `image`, `created_on`, `status`) VALUES
(1, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_D.jpg', '2024-02-14 06:55:55', 1),
(2, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_003 copy.jpg', '2024-02-14 06:57:12', 1),
(3, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_018 copy.jpg', '2024-02-14 06:57:36', 1),
(4, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_028 copy.jpg', '2024-02-14 06:58:04', 1),
(5, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_037 copy.jpg', '2024-02-14 06:58:23', 1),
(6, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_Y.jpg', '2024-02-14 06:59:03', 1),
(7, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_C.jpg', '2024-02-14 06:59:40', 1),
(8, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_030 copy.jpg', '2024-02-14 07:00:12', 1),
(9, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_Q.jpg', '2024-02-14 07:00:40', 1),
(10, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_L.jpg', '2024-02-14 07:01:05', 1),
(11, 'https://www.instagram.com/razzybabystudio/', '800pxx800px_A.jpg', '2024-02-14 07:01:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `name`, `description`, `image`, `image_two`, `created_on`, `status`) VALUES
(1, 'Maternity Photoshoot', 'Embrace the beauty of motherhood with our stunning maternity photoshoots. Celebrate this special chapter in your life with timeless portraits.', '65cc7412917ee.jpg', '65cc7412917f1.jpg', '2024-02-13 14:37:16', 1),
(2, 'Newborn Photography', 'Capture the sweetness of your newborn\'s arrival with our expert photoshoots. Cherish these precious moments forever.', '800pxx800px_U.jpg', '1920x1080_B.jpg', '2024-02-13 15:33:06', 1),
(7, 'Toddler Photoshoot', 'Preserve the innocence and wonder of your baby\'s early days with our professional photography. Capturing smiles, giggles, and all the tiny details you\'ll cherish forever', '800pxx800px_014 copy.jpg', '1920x1080_A.jpg', '2024-02-14 06:24:31', 1),
(16, 'Family Portraits', 'Create lasting memories with our expertly crafted family portraits. Capture the love and connection that defines your family in timeless photographs', '65cc6de395363.jpg', '65cc6de395367.jpg', '2024-02-14 07:38:11', 1),
(17, 'Cake Smash', 'Let the fun begin with our cake smash photography! Watch your little one delight in this messy, memorable moment captured forever', '65cc6eab0470f.jpg', '65cc6eab0471c.jpg', '2024-02-14 07:41:31', 1),
(18, 'Birthday Events', 'Create lasting memories with our expertly crafted family portraits. Capture the love and connection that defines your family in timeless photographs', '65cc6f1fbee2c.jpg', '65cc6f1fbee30.jpg', '2024-02-14 07:43:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_images`
--

CREATE TABLE `tbl_service_images` (
  `id` int(11) NOT NULL,
  `service_id` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service_images`
--

INSERT INTO `tbl_service_images` (`id`, `service_id`, `image`, `created_on`, `status`) VALUES
(1, '2', '800pxx800px_U.jpg', '2024-02-13 15:50:49', 1),
(2, '2', '800pxx800px_T.jpg', '2024-02-13 15:51:00', 1),
(3, '2', '800pxx450px_R.jpg', '2024-02-13 15:51:13', 1),
(4, '2', '800pxx450px_X.jpg', '2024-02-13 15:51:28', 1),
(5, '2', '800pxx800px_D.jpg', '2024-02-13 15:51:45', 1),
(6, '1', '800pxx450px_D.jpg', '2024-02-13 15:54:23', 1),
(7, '1', '800pxx450px_H.jpg', '2024-02-13 15:54:33', 1),
(8, '1', '800pxx450px_I.jpg', '2024-02-13 15:54:43', 1),
(9, '1', '800pxx450px_K.jpg', '2024-02-13 15:54:56', 1),
(10, '1', '005 copy.jpg', '2024-02-14 06:28:28', 1),
(11, '7', '65cc796c35408.jpg', '2024-02-14 08:27:24', 1),
(12, '7', '65cc7979d5f15.jpg', '2024-02-14 08:27:37', 1),
(13, '7', '65cc798acf37b.jpg', '2024-02-14 08:27:54', 1),
(14, '7', '65cc799bab4a8.jpg', '2024-02-14 08:28:11', 1),
(15, '7', '65cc79aff3bd6.jpg', '2024-02-14 08:28:31', 1),
(16, '7', '65ccca9bd782f.jpg', '2024-02-14 14:13:47', 1),
(17, '1', '65cdd91970786.jpg', '2024-02-15 09:27:53', 1),
(18, '1', '65cdd92ba36fb.jpg', '2024-02-15 09:28:11', 1),
(19, '1', '65cdd94031025.jpg', '2024-02-15 09:28:32', 1),
(20, '1', '65cdd953735d3.jpg', '2024-02-15 09:28:51', 1),
(21, '1', '65cdd9621898b.jpg', '2024-02-15 09:29:06', 1),
(22, '1', '65cdd971d7ea1.jpg', '2024-02-15 09:29:21', 1),
(23, '2', '65cdd9bb7cb92.jpg', '2024-02-15 09:30:35', 1),
(24, '2', '65cdd9d4c4ad7.jpg', '2024-02-15 09:31:00', 1),
(25, '2', '65cdd9e61c89a.jpg', '2024-02-15 09:31:18', 1),
(26, '2', '65cdd9f3c50a9.jpg', '2024-02-15 09:31:31', 1),
(27, '2', '65cdd9ff6bc39.jpg', '2024-02-15 09:31:43', 1),
(28, '2', '65cdda1496d21.jpg', '2024-02-15 09:32:04', 1),
(29, '2', '65cdda29a0a08.jpg', '2024-02-15 09:32:25', 1),
(30, '2', '65cdda385351b.jpg', '2024-02-15 09:32:40', 1),
(31, '2', '65cdda46626f8.jpg', '2024-02-15 09:32:54', 1),
(32, '2', '65cdda5314e5f.jpg', '2024-02-15 09:33:07', 1),
(33, '2', '65cdda66bf88a.jpg', '2024-02-15 09:33:26', 1),
(34, '2', '65cdda76e2fa5.jpg', '2024-02-15 09:33:42', 1),
(35, '2', '65cdda8fbdb5d.jpg', '2024-02-15 09:34:07', 1),
(36, '2', '65cdda9cb1fec.jpg', '2024-02-15 09:34:20', 1),
(37, '2', '65cddaf15f7d5.jpg', '2024-02-15 09:35:45', 1),
(38, '7', '65cddb4dd1cef.jpg', '2024-02-15 09:37:17', 1),
(39, '7', '65cddb5947932.jpg', '2024-02-15 09:37:29', 1),
(40, '7', '65cddb66ee095.jpg', '2024-02-15 09:37:42', 1),
(41, '7', '65cddb73beaa4.jpg', '2024-02-15 09:37:55', 1),
(42, '7', '65cddb87728e1.jpg', '2024-02-15 09:38:15', 1),
(43, '7', '65cddb9475da6.jpg', '2024-02-15 09:38:28', 1),
(44, '7', '65cddba657b88.jpg', '2024-02-15 09:38:46', 1),
(45, '7', '65cddbb130adb.jpg', '2024-02-15 09:38:57', 1),
(46, '7', '65cddbc3e5ed0.jpg', '2024-02-15 09:39:15', 1),
(47, '7', '65cddbd0d8746.jpg', '2024-02-15 09:39:28', 1),
(48, '7', '65cddbdc2d9c2.jpg', '2024-02-15 09:39:40', 1),
(49, '7', '65cddbf44a941.jpg', '2024-02-15 09:40:04', 1),
(50, '7', '65cddc0206db9.jpg', '2024-02-15 09:40:18', 1),
(51, '16', '65cddc22b35f9.jpg', '2024-02-15 09:40:50', 1),
(52, '16', '65cddc345bcdf.jpg', '2024-02-15 09:41:08', 1),
(53, '16', '65cddc3ff336c.jpg', '2024-02-15 09:41:19', 1),
(54, '16', '65cddc4e9e698.jpg', '2024-02-15 09:41:34', 1),
(55, '16', '65cddc5cd8c45.jpg', '2024-02-15 09:41:48', 1),
(56, '16', '65cddc6717cd7.jpg', '2024-02-15 09:41:59', 1),
(57, '16', '65cddc77a8a01.jpg', '2024-02-15 09:42:15', 1),
(58, '16', '65cddc82e94cb.jpg', '2024-02-15 09:42:26', 1),
(59, '16', '65cddc8f3c1fe.jpg', '2024-02-15 09:42:39', 1),
(60, '16', '65cddc9b0f11b.jpg', '2024-02-15 09:42:51', 1),
(61, '16', '65cddca77ad84.jpg', '2024-02-15 09:43:03', 1),
(62, '16', '65cddcb68f882.jpg', '2024-02-15 09:43:18', 0),
(63, '16', '65cddccbaa0fb.jpg', '2024-02-15 09:43:39', 1),
(64, '16', '65cddcde18fca.jpg', '2024-02-15 09:43:58', 1),
(65, '16', '65cddce991b6a.jpg', '2024-02-15 09:44:09', 1),
(66, '2', '65cddd4d7d632.jpg', '2024-02-15 09:45:49', 1),
(67, '16', '65f3dfc38dec4.jpg', '2024-03-15 05:42:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `designation`, `image`, `created_on`, `status`) VALUES
(1, 'Elayaraja', 'Photographer', '150pxx150px A.jpg', '2024-02-13 14:26:57', 1),
(2, 'Arthi', 'Editor', '150pxx150px B.jpg', '2024-02-13 14:27:40', 1),
(3, 'Subha', 'Editor', '150pxx150px B.jpg', '2024-02-13 14:28:01', 1),
(4, 'Sowbarniya', 'Studio Assistant', '150pxx150px B.jpg', '2024-02-13 14:28:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_description`
--

CREATE TABLE `tbl_team_description` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team_description`
--

INSERT INTO `tbl_team_description` (`id`, `description`, `created_on`) VALUES
(1, '\"At our professional photography team, we believe in the power of visual storytelling. Comprised of skilled photographers with diverse backgrounds and a shared commitment to excellence, we specialize in capturing the essence of every moment. With a blend of technical expertise and artistic vision, we turn ordinary scenes into extraordinary memories. From weddings to corporate events, family portraits to commercial campaigns, our team is dedicated to delivering stunning imagery that exceeds expectations and stands the test of time.\"', '2024-02-13 15:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `name`, `review`, `image`, `created_on`, `status`) VALUES
(1, 'Swathi', 'Really appreciating your work Razzy baby studio . I did new born photo shoot for my daughter from you . My baby was very comfortable throughout session and she was treated well got impressed from then on Till now for any photo framing work printing work everything I am reaching you guys . So reachable very professional friendly and mainly affordable. For this price your quality of work is really appreciated .long way to go guys', 'swathiCL.png', '2024-02-14 06:45:07', 1),
(2, 'Srinithi', 'My baby’s photoshoot done by Razzy Baby Studio was so beautiful and good .. they were so friendly with him and helped him to pose for photos .. they were so friendly and I was satisfied with the results and quality of their work highly recommended', 'srinithiCL.png', '2024-02-14 06:52:53', 1),
(3, 'Pooja Jadhav', 'For new born baby shoot its a perfect place where u can collect memories with colorful themes. I did my one month baby shoot .my baby was crying a lot but The way of handling my baby was so calm and patiently. All the team members where polite. Best studio with our comfortability  . Affordable price offer. Thank you Razzy team.', '65cdb970df34e.jpg', '2024-02-15 07:12:48', 0),
(4, 'Shoba', 'They did a great work for my daughter\'s first birthday.. very patiently they listen to our expectations n do it as it is...thanks guys', '65cdb9c6e2e91.png', '2024-02-15 07:14:14', 1),
(5, 'Vignesh Anandan', 'I recently had the pleasure of having my maternity photoshoot at Razzy Baby Studio, and I couldn\'t be happier with the experience. From the moment I walked in, I was greeted with warmth and professionalism by the staff. They made me feel like family, and their genuine friendliness put me at ease right away.\r\n\r\nRazzy Baby Studio\'s selection of props for maternity and baby photoshoots was absolutely delightful. For my maternity shoot, they had a beautiful array of flowing dresses, floral crowns, and elegant wraps that helped create stunning, ethereal images. When it came time for the baby photoshoot, their collection of adorable outfits, soft blankets, and tiny accessories was equally impressive. Each prop was carefully chosen and added a special touch to the photos.\r\n\r\nWhat truly stood out to me was the professionalism and expertise of the photographers at Razzy Baby Studio. They were not only incredibly skilled at capturing the perfect shots, but they also had a knack for making the entire experience enjoyable and stress-free. They were patient, attentive to detail, and full of creative ideas to ensure that every photo turned out beautifully.\r\n\r\nOverall, I cannot recommend Razzy Baby Studio highly enough. From their wonderful props to their professional and friendly staff, they exceeded all my expectations and delivered an unforgettable photoshoot experience. I am beyond thrilled with the stunning images they captured, and I will cherish them for years to come.', '65cdba40b33fb.png', '2024-02-15 07:16:16', 0),
(6, 'Shreelekha Vetrivel', 'Superb excellent service.. very dedicated team.... All the photos taken by their team was so good .. pics came out very well.. good good keep it up guys...', '65cdbad8bb60a.png', '2024-02-15 07:18:48', 1),
(7, 'Nandhinee Ananthakrishnan', 'Best baby photographer\r\nThe entire team was very friendly and patient through out the shoot\r\nWhen my baby cried in between the shoot they calmed down by baby very gently..\r\nIn 2 hours they gave us around 5 best theme which suits my baby..\r\nThey also replicated a theme which I wanted..\r\nI suggested them to many of my friends too\r\nKeep you the best work Razzy studio', '65cdbb56a618b.png', '2024-02-15 07:20:54', 0),
(8, 'Arunthathi', 'Recently we did a photography session for my babies. They were friendly and tried hard making my babies smile. I would say they’re the best! Team where patient throughout the session. Thanks for capturing cute little movements of our babies. I would definitely come again. Thankyou!', '65cdbbbfbcf84.png', '2024-02-15 07:22:39', 1),
(9, 'Karthikeyan', 'Actually When I was planning to take my baby shoot I got their Instagram page as a suggestion list and I saw their works in their pages. I thoroughly enjoyed my girl baby phot shoot. I liked their themes and outfits. Also photographers are friendly to collaborate and work with. All the best for your future projects bro.', '65cdbc19410d1.jpg', '2024-02-15 07:24:09', 0),
(10, 'Bavadhaarani', 'Best team we worked with so far for our baby’s photo session 😍 very professional and friendly team👌🏻picture outcomes are mind blowing. Thanks for making our baby’s sitter moments more cherishing one', '65cdbc5c0630a.png', '2024-02-15 07:25:16', 1),
(11, 'Jeevitha', 'Really wowwwww photoshoots...\r\nLittle moments BIG memories....😍thanks a lot Razzy Studios ...', '65cdbcc707b12.png', '2024-02-15 07:27:03', 1),
(12, 'Satheesh', 'Excellent Work done by the team. Gave a complete day of time for the baby to co operate to the photo session. Very happy with the output and the co ordination of team.', '65cdbd0218259.png', '2024-02-15 07:28:02', 1),
(13, 'Karthick', 'One of the best photography team, Especially the outcome of the pics are mind blowing.\r\nVery good Team Work.. Professional and friendly.\r\nI\'ll recommend for everyone who need a best out of their beautiful memories,, Thank You Razzy', '65cdc5a223563.png', '2024-02-15 08:04:50', 1),
(14, 'Daniel s', 'Fantastic work done by the team, Excellent photography. Razzy team was professional, very kind and friendly. I highly recommended Razzy team for photography.', '65cdc5f7c1bd2.jpg', '2024-02-15 08:06:15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_homebanner`
--
ALTER TABLE `tbl_homebanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home_images`
--
ALTER TABLE `tbl_home_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_images`
--
ALTER TABLE `tbl_service_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team_description`
--
ALTER TABLE `tbl_team_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gallery_images`
--
ALTER TABLE `tbl_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_homebanner`
--
ALTER TABLE `tbl_homebanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_home_images`
--
ALTER TABLE `tbl_home_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_service_images`
--
ALTER TABLE `tbl_service_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_team_description`
--
ALTER TABLE `tbl_team_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
