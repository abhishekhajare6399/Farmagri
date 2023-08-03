-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 11:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmagri.main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `cid` int(11) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `image` varchar(50) NOT NULL,
  `proof` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `otp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`cid`, `loginid`, `name`, `mobile`, `email`, `password`, `cpassword`, `address`, `city`, `state`, `pincode`, `date`, `time`, `image`, `proof`, `status`, `mstatus`, `token`, `otp`) VALUES
(1, 'AD7590735', 'Farmagri', '685748958', 'farmagrimitaoe@gmail.com', '$2y$10$QTznaBAdYJIZW6XxzaP/1.oqpHyg9xceqC2Lwdz.fG3ey0p8nL/.u', '$2y$10$QTznaBAdYJIZW6XxzaP/1.oqpHyg9xceqC2Lwdz.fG3ey0p8nL/.u', 'Near Mit Academy of Engineering Dehu phata Alandi Pune', 'Pune', 'MAHARASHTRA', 12545, '2023-05-28', '06:00:16', 'image/profile.jpg', 'proof/Agriculture _crop.png', 'Active', 'Active', '879f70e6908ccaf2b88828b102ea23', 7263);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `farmer` varchar(15) NOT NULL,
  `goodid` varchar(15) NOT NULL,
  `buyer` varchar(15) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(15) NOT NULL,
  `noti` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `goodid` int(10) NOT NULL,
  `goods` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `goodid`, `goods`, `image`) VALUES
(1, 50166, 'Onion', 'goods/mp_2.jpg'),
(2, 58955, 'Tomato', 'goods/fruit_img2.jpg'),
(3, 62992, 'Potato', 'goods/mp_1.jpg'),
(4, 71903, 'Peanuts', 'goods/peanut.jpg'),
(5, 90806, 'Rice', 'goods/mp_5.jpg'),
(6, 39018, 'Wheat', 'goods/mp_6.jpg'),
(7, 52077, 'Cotton', 'goods/mp_7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `fetid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `solution` varchar(1000) NOT NULL,
  `status` varchar(15) NOT NULL,
  `noti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detect`
--

CREATE TABLE `detect` (
  `id` int(11) NOT NULL,
  `Lid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plant` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `result` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detect`
--

INSERT INTO `detect` (`id`, `Lid`, `name`, `plant`, `image`, `result`, `date`) VALUES
(1, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(2, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(3, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(4, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/curl57.jpg', 'curl virus', '2023-05-28'),
(5, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/d (378).jpg', 'bacterial blight', '2023-05-28'),
(6, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/0e068694-63b7-4edf-a93d-f2e9f28efaa6___RS_LB 3923.JPG', 'fussarium wilt', '2023-05-28'),
(7, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/0b3e5032-8ae8-49ac-8157-a1cac3df01dd___RS_HL 1817.JPG', 'curl virus', '2023-05-28'),
(8, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/0b3e5032-8ae8-49ac-8157-a1cac3df01dd___RS_HL 1817.JPG', 'curl virus', '2023-05-28'),
(9, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0b3e5032-8ae8-49ac-8157-a1cac3df01dd___RS_HL 1817.JPG', 'curl virus', '2023-05-28'),
(10, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0a47f32c-1724-4c8d-bfe4-986cedd3587b___RS_Early.B 8001.JPG', 'curl virus', '2023-05-28'),
(11, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/0a47f32c-1724-4c8d-bfe4-986cedd3587b___RS_Early.B 8001.JPG', 'curl virus', '2023-05-28'),
(12, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/0e068694-63b7-4edf-a93d-f2e9f28efaa6___RS_LB 3923.JPG', 'fussarium wilt', '2023-05-28'),
(13, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/00b1f292-23dd-44d4-aad3-c1ffb6a6ad5a___RS_LB 4479.JPG', 'curl virus', '2023-05-28'),
(14, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0a8a68ee-f587-4dea-beec-79d02e7d3fa4___RS_Early.B 8461.JPG', 'Late blight', '2023-05-28'),
(15, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0a47f32c-1724-4c8d-bfe4-986cedd3587b___RS_Early.B 8001.JPG', 'Late blight', '2023-05-28'),
(16, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0b3e5032-8ae8-49ac-8157-a1cac3df01dd___RS_HL 1817.JPG', 'Late blight', '2023-05-28'),
(17, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/00b1f292-23dd-44d4-aad3-c1ffb6a6ad5a___RS_LB 4479.JPG', 'Late blight', '2023-05-28'),
(18, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0e068694-63b7-4edf-a93d-f2e9f28efaa6___RS_LB 3923.JPG', 'Late blight', '2023-05-28'),
(19, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/healthy potato.jpg', 'Late blight', '2023-05-28'),
(20, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(21, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/curl57.jpg', 'curl virus', '2023-05-28'),
(22, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(23, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/curl57.jpg', 'curl virus', '2023-05-28'),
(24, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/curl57.jpg', 'curl virus', '2023-05-28'),
(25, 'FM7709341', 'Abhishek Hajare', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(26, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/curl57.jpg', 'Early blight', '2023-05-28'),
(27, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/0e068694-63b7-4edf-a93d-f2e9f28efaa6___RS_LB 3923.JPG', 'Late blight', '2023-05-28'),
(28, 'FM7709341', 'Abhishek Hajare', 'Potato', 'static/user_uploaded/curl57.jpg', 'Early blight', '2023-05-28'),
(29, 'IN4363797', 'Siddharth Adawale', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(30, 'IN4363797', 'Siddharth Adawale', 'Potato', 'static/user_uploaded/curl57.jpg', 'Early blight', '2023-05-28'),
(31, 'IN8165062', 'Vishwas Garade', 'Cotton', 'static/user_uploaded/bacteria_blight.jfif', 'bacterial blight', '2023-05-28'),
(32, 'IN8165062', 'Vishwas Garade', 'Potato', 'static/user_uploaded/curl57.jpg', 'Early blight', '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `country_id`) VALUES
(1, 'Nicobar', 1),
(2, 'North and Middle Andaman	', 1),
(3, 'South Andaman', 1),
(4, 'Ananthapur', 2),
(5, 'Chittoor', 2),
(6, 'Cuddapah	', 2),
(7, 'East Godavari', 2),
(8, 'Guntur', 2),
(9, 'Krishna', 2),
(10, 'Kurnool', 2),
(11, 'Nellore', 2),
(12, 'Prakasam', 2),
(13, 'Srikakulam', 2),
(14, 'Visakhapatnam', 2),
(15, 'Vizianagaram', 2),
(16, 'West Godavari	', 2),
(17, 'Changlang', 3),
(18, 'Dibang Valley', 3),
(19, 'East Kameng', 3),
(20, 'East Siang', 3),
(21, 'Kurung Kumey', 3),
(22, 'Lohit', 3),
(23, 'Lower Dibang Valley', 3),
(24, 'Lower Subansiri', 3),
(25, 'Papum Pare', 3),
(26, 'Tawang', 3),
(27, 'Tirap', 3),
(28, 'Upper Siang', 3),
(29, 'Upper Subansiri', 3),
(30, 'West Kameng', 3),
(31, 'West Siang', 3),
(32, 'Barpeta', 4),
(33, 'Bongaigaon', 4),
(34, 'Cachar', 4),
(35, 'Darrang', 4),
(36, 'Dhemaji', 4),
(37, 'Dhubri', 4),
(38, 'Dibrugarh', 4),
(39, 'Goalpara', 4),
(40, 'Golaghat', 4),
(41, 'Hailakandi', 4),
(42, 'Jorhat', 4),
(43, 'Kamrup', 4),
(44, 'Karbi Anglong', 4),
(45, 'Karimganj', 4),
(46, 'Kokrajhar', 4),
(47, 'Lakhimpur', 4),
(48, 'Marigaon', 4),
(49, 'Nagaon', 4),
(50, 'Nalbari', 4),
(51, 'North Cachar Hills', 4),
(52, 'Sibsagar', 4),
(53, 'Sonitpur', 4),
(54, 'Tinsukia', 4),
(55, 'Araria', 5),
(56, 'Arwal', 5),
(57, 'Aurangabad(BH)', 5),
(58, 'Banka', 5),
(59, 'Begusarai', 5),
(60, 'Bhagalpur', 5),
(61, 'Bhojpur', 5),
(62, 'Buxar', 5),
(63, 'Darbhanga', 5),
(64, 'East Champaran', 5),
(65, 'Gaya', 5),
(66, 'Gopalganj', 5),
(67, 'Jamui', 5),
(68, 'Jehanabad', 5),
(69, 'Kaimur (Bhabua)', 5),
(70, 'Katihar', 5),
(71, 'Khagaria', 5),
(72, 'Kishanganj', 5),
(73, 'Lakhisarai', 5),
(74, 'Madhepura', 5),
(75, 'Madhubani', 5),
(76, 'Munger', 5),
(77, 'Muzaffarpur', 5),
(78, 'Nalanda', 5),
(79, 'Nawada', 5),
(80, 'Patna', 5),
(81, 'Purnia', 5),
(82, 'Rohtas', 5),
(83, 'Saharsa', 5),
(84, 'Samastipur', 5),
(85, 'Saran', 5),
(86, 'Sheikhpura', 5),
(87, 'Sheohar', 5),
(88, 'Sitamarhi', 5),
(89, 'Siwan', 5),
(90, 'Supaul', 5),
(91, 'Vaishali', 5),
(92, 'West Champaran', 5),
(93, 'Bastar', 6),
(94, 'Bijapur(CGH)', 6),
(95, 'Bilaspur(CGH)', 6),
(96, 'Dantewada', 6),
(97, 'Dhamtari', 6),
(98, 'Durg', 6),
(99, 'Gariaband', 6),
(100, 'Janjgir-champa', 6),
(101, 'Jashpur', 6),
(102, 'Kanker', 6),
(103, 'Kawardha', 6),
(104, 'Korba', 6),
(105, 'Koriya', 6),
(106, 'Mahasamund', 6),
(107, 'Narayanpur', 6),
(108, 'Raigarh', 6),
(109, 'Raipur', 6),
(110, 'Rajnandgaon', 6),
(111, 'Surguja', 6),
(112, 'Dadra & Nagar Haveli', 10),
(113, 'Chandigarh', 7),
(114, 'Daman', 8),
(115, 'Diu', 8),
(116, 'Central Delhi', 9),
(117, 'East Delhi', 9),
(118, 'New Delhi', 9),
(119, 'North Delhi', 9),
(120, 'North East Delhi', 9),
(121, 'North West Delhi', 9),
(122, 'South Delhi', 9),
(123, 'South West Delhi', 9),
(124, 'West Delhi', 9),
(125, 'North Goa', 11),
(126, 'South Goa', 11),
(127, 'Ahmedabad', 12),
(128, 'Amreli', 12),
(129, 'Anand', 12),
(130, 'Banaskantha', 12),
(131, 'Bharuch', 12),
(132, 'Bhavnagar', 12),
(133, 'Dahod', 12),
(134, 'Gandhi Nagar', 12),
(135, 'Jamnagar', 12),
(136, 'Junagadh', 12),
(137, 'Kachchh', 12),
(138, 'Kheda', 12),
(139, 'Mahesana', 12),
(140, 'Narmada', 12),
(141, 'Navsari', 12),
(142, 'Panch Mahals', 12),
(143, 'Patan', 12),
(144, 'Porbandar', 12),
(145, 'Rajkot', 12),
(146, 'Sabarkantha', 12),
(147, 'Surat', 12),
(148, 'Surendra Nagar', 12),
(149, 'Tapi', 12),
(150, 'The Dangs', 12),
(151, 'Vadodara', 12),
(152, 'Valsad', 12),
(153, 'Bilaspur (HP)', 13),
(154, 'Chamba', 13),
(155, 'Hamirpur(HP)', 13),
(156, 'Kangra', 13),
(157, 'Kinnaur', 13),
(158, 'Kullu', 13),
(159, 'Lahul & Spiti', 13),
(160, 'Mandi', 13),
(161, 'Shimla', 13),
(162, 'Sirmaur', 13),
(163, 'Solan', 13),
(164, 'Una', 13),
(165, 'Ambala', 14),
(166, 'Bhiwani', 14),
(167, 'Faridabad', 14),
(168, 'Fatehabad', 14),
(169, 'Gurgaon', 14),
(170, 'Hisar', 14),
(171, 'Jhajjar', 14),
(172, 'Jind', 14),
(173, 'Kaithal', 14),
(174, 'Karnal', 14),
(175, 'Kurukshetra', 14),
(176, 'Mahendragarh', 14),
(177, 'Panchkula', 14),
(178, 'Panipat', 14),
(179, 'Rewari', 14),
(180, 'Rohtak', 14),
(181, 'Sirsa', 14),
(182, 'Sonipat', 14),
(183, 'Yamuna Nagar', 14),
(184, 'Ananthnag', 15),
(185, 'Bandipur', 15),
(186, 'Baramulla', 15),
(187, 'Budgam', 15),
(188, 'Doda', 15),
(189, 'Jammu', 15),
(190, 'Kargil', 15),
(191, 'Kathua', 15),
(192, 'Kulgam', 15),
(193, 'Kupwara', 15),
(194, 'Leh', 15),
(195, 'Poonch', 15),
(196, 'Pulwama', 15),
(197, 'Rajauri', 15),
(198, 'Reasi', 15),
(199, 'Shopian', 15),
(200, 'Srinagar', 15),
(201, 'Udhampur', 15),
(202, 'Bokaro', 16),
(203, 'Chatra', 16),
(204, 'Deoghar', 16),
(205, 'Dhanbad', 16),
(206, 'Dumka', 16),
(207, 'East Singhbhum', 16),
(208, 'Garhwa', 16),
(209, 'Giridh', 16),
(210, 'Godda', 16),
(211, 'Gumla', 16),
(212, 'Hazaribag', 16),
(213, 'Jamtara', 16),
(214, 'Khunti', 16),
(215, 'Koderma', 16),
(216, 'Latehar', 16),
(217, 'Lohardaga', 16),
(218, 'Pakur', 16),
(219, 'Palamau', 16),
(220, 'Ramgarh', 16),
(221, 'Ranchi', 16),
(222, 'Sahibganj', 16),
(223, 'Seraikela-kharsawan', 16),
(224, 'Simdega', 16),
(225, 'West Singhbhum', 16),
(226, 'Alappuzha', 17),
(227, 'Ernakulam', 17),
(228, 'Idukki', 17),
(229, 'Kannur', 17),
(230, 'Kasargod', 17),
(231, 'Kollam', 17),
(232, 'Kottayam', 17),
(233, 'Kozhikode', 17),
(234, 'Malappuram', 17),
(235, 'Palakkad', 17),
(236, 'Pathanamthitta', 17),
(237, 'Thiruvananthapuram', 17),
(238, 'Thrissur', 17),
(239, 'Wayanad', 17),
(240, 'Bagalkot', 18),
(241, 'Bangalore', 18),
(242, 'Bangalore Rural', 18),
(243, 'Belgaum', 18),
(244, 'Bellary', 18),
(245, 'Bidar', 18),
(246, 'Bijapur(KAR)', 18),
(247, 'Chamrajnagar', 18),
(248, 'Chickmagalur', 18),
(249, 'Chikkaballapur', 18),
(250, 'Chitradurga', 18),
(251, 'Dakshina Kannada', 18),
(252, 'Davangere', 18),
(253, 'Dharwad', 18),
(254, 'Gadag', 18),
(255, 'Gulbarga', 18),
(256, 'Hassan', 18),
(257, 'Haveri', 18),
(258, 'Kodagu', 18),
(259, 'Kolar', 18),
(260, 'Koppal', 18),
(261, 'Mandya', 18),
(262, 'Mysore', 18),
(263, 'Raichur', 18),
(264, 'Ramanagar', 18),
(265, 'Shimoga', 18),
(266, 'Tumkur', 18),
(267, 'Udupi', 18),
(268, 'Uttara Kannada', 18),
(269, 'Yadgir	', 18),
(270, 'Lakshadweep', 19),
(271, 'East Garo Hills', 20),
(272, 'East Khasi Hills', 20),
(273, 'Jaintia Hills', 20),
(274, 'Ri Bhoi', 20),
(275, 'South Garo Hills', 20),
(276, 'West Garo Hills', 20),
(277, 'West Khasi Hills', 20),
(278, 'Ahmednagar', 21),
(279, 'Akola', 21),
(280, 'Amravati', 21),
(281, 'Aurangabad', 21),
(282, 'Beed', 21),
(283, 'Bhandara', 21),
(284, 'Buldhana', 21),
(285, 'Chandrapur', 21),
(286, 'Dhule', 21),
(287, 'Gadchiroli', 21),
(288, 'Gondia', 21),
(289, 'Hingoli', 21),
(290, 'Jalgaon', 21),
(291, 'Jalna', 21),
(292, 'Kolhapur', 21),
(293, 'Latur', 21),
(294, 'Mumbai', 21),
(295, 'Mumbai', 21),
(296, 'Nanded', 21),
(297, 'Nandurbar', 21),
(298, 'Nashik', 21),
(299, 'Osmanabad', 21),
(300, 'Parbhani', 21),
(301, 'Pune', 21),
(302, 'Raigarh(MH)', 21),
(303, 'Ratnagiri', 21),
(304, 'Sangli', 21),
(305, 'Satara', 21),
(306, 'Sindhudurg', 21),
(307, 'Solapur', 21),
(308, 'Thane', 21),
(309, 'Wardha', 21),
(310, 'Washim', 21),
(311, 'Yavatmal', 21),
(312, 'Bishnupur', 22),
(313, 'Chandel', 22),
(314, 'Churachandpur', 22),
(315, 'Imphal East', 22),
(316, 'Imphal West', 22),
(317, 'Senapati', 22),
(318, 'Tamenglong', 22),
(319, 'Thoubal', 22),
(320, 'Ukhrul', 22),
(321, 'Alirajpur', 23),
(322, 'Anuppur', 23),
(323, 'Ashok Nagar', 23),
(324, 'Balaghat', 23),
(325, 'Barwani', 23),
(326, 'Betul', 23),
(327, 'Bhind', 23),
(328, 'Bhopal', 23),
(329, 'Burhanpur', 23),
(330, 'Chhatarpur', 23),
(331, 'Chhindwara', 23),
(332, 'Damoh', 23),
(333, 'Datia', 23),
(334, 'Dewas', 23),
(335, 'Dhar', 23),
(336, 'Dindori', 23),
(337, 'East Nimar', 23),
(338, 'Guna', 23),
(339, 'Gwalior', 23),
(340, 'Harda', 23),
(341, 'Hoshangabad', 23),
(342, 'Indore', 23),
(343, 'Jabalpur', 23),
(344, 'Jhabua', 23),
(345, 'Katni', 23),
(346, 'Khandwa', 23),
(347, 'Khargone', 23),
(348, 'Mandla', 23),
(349, 'Mandsaur', 23),
(350, 'Morena', 23),
(351, 'Narsinghpur', 23),
(352, 'Neemuch', 23),
(353, 'Panna', 23),
(354, 'Raisen', 23),
(355, 'Rajgarh', 23),
(356, 'Ratlam', 23),
(357, 'Rewa', 23),
(358, 'Sagar', 23),
(359, 'Satna', 23),
(360, 'Sehore', 23),
(361, 'Seoni', 23),
(362, 'Shahdol', 23),
(363, 'Shajapur', 23),
(364, 'Sheopur', 23),
(365, 'Shivpuri', 23),
(366, 'Sidhi', 23),
(367, 'Singrauli', 23),
(368, 'Tikamgarh', 23),
(369, 'Ujjain', 23),
(370, 'Umaria', 23),
(371, 'Vidisha', 23),
(372, 'West Nimar', 23),
(373, 'Aizawl', 24),
(374, 'Champhai', 24),
(375, 'Kolasib', 24),
(376, 'Lawngtlai', 24),
(377, 'Lunglei', 24),
(378, 'Mammit', 24),
(379, 'Saiha', 24),
(380, 'Serchhip', 24),
(381, 'Dimapur', 25),
(382, 'Kiphire', 25),
(383, 'Kohima', 25),
(384, 'Longleng', 25),
(385, 'Mokokchung', 25),
(386, 'Mon', 25),
(387, 'Peren', 25),
(388, 'Phek', 25),
(389, 'Tuensang', 25),
(390, 'Wokha', 25),
(391, 'Zunhebotto', 25),
(392, 'Angul', 26),
(393, 'Balangir', 26),
(394, 'Baleswar', 26),
(395, 'Bargarh', 26),
(396, 'Bhadrak', 26),
(397, 'Boudh', 26),
(398, 'Cuttack', 26),
(399, 'Debagarh', 26),
(400, 'Dhenkanal', 26),
(401, 'Gajapati', 26),
(402, 'Ganjam', 26),
(403, 'Jagatsinghapur', 26),
(404, 'Jajapur', 26),
(405, 'Jharsuguda', 26),
(406, 'Kalahandi', 26),
(407, 'Kandhamal', 26),
(408, 'Kendrapara', 26),
(409, 'Kendujhar', 26),
(410, 'Khorda', 26),
(411, 'Koraput', 26),
(412, 'Malkangiri', 26),
(413, 'Mayurbhanj', 26),
(414, 'Nabarangapur', 26),
(415, 'Nayagarh', 26),
(416, 'Nuapada', 26),
(417, 'Puri', 26),
(418, 'Rayagada', 26),
(419, 'Sambalpur', 26),
(420, 'Sonapur', 26),
(421, 'Sundergarh', 26),
(422, 'Amritsar', 27),
(423, 'Barnala', 27),
(424, 'Bathinda', 27),
(425, 'Faridkot', 27),
(426, 'Fatehgarh Sahib', 27),
(427, 'Fazilka', 27),
(428, 'Firozpur', 27),
(429, 'Gurdaspur', 27),
(430, 'Hoshiarpur', 27),
(431, 'Jalandhar', 27),
(432, 'Kapurthala', 27),
(433, 'Ludhiana', 27),
(434, 'Mansa', 27),
(435, 'Moga', 27),
(436, 'Mohali', 27),
(437, 'Muktsar', 27),
(438, 'Nawanshahr', 27),
(439, 'Pathankot', 27),
(440, 'Patiala', 27),
(441, 'Ropar', 27),
(442, 'Rupnagar', 27),
(443, 'Sangrur', 27),
(444, 'Tarn Taran', 27),
(445, 'Karaikal', 28),
(446, 'Mahe', 28),
(447, 'Pondicherry', 28),
(448, 'Ajmer', 29),
(449, 'Alwar', 29),
(450, 'Banswara', 29),
(451, 'Baran', 29),
(452, 'Barmer', 29),
(453, 'Bharatpur', 29),
(454, 'Bhilwara', 29),
(455, 'Bikaner', 29),
(456, 'Bundi', 29),
(457, 'Chittorgarh', 29),
(458, 'Churu', 29),
(459, 'Dausa', 29),
(460, 'Dholpur', 29),
(461, 'Dungarpur', 29),
(462, 'Ganganagar', 29),
(463, 'Hanumangarh', 29),
(464, 'Jaipur', 29),
(465, 'Jaisalmer', 29),
(466, 'Jalor', 29),
(467, 'Jhalawar', 29),
(468, 'Jhujhunu', 29),
(469, 'Jodhpur', 29),
(470, 'Karauli', 29),
(471, 'Kota', 29),
(472, 'Nagaur', 29),
(473, 'Pali', 29),
(474, 'Rajsamand', 29),
(475, 'Sawai Madhopur', 29),
(476, 'Sikar', 29),
(477, 'Sirohi', 29),
(478, 'Tonk', 29),
(479, 'Udaipur', 29),
(480, 'East Sikkim', 30),
(481, 'North Sikkim', 30),
(482, 'South Sikkim', 30),
(483, 'West Sikkim', 30),
(484, 'Ariyalur', 31),
(485, 'Chennai', 31),
(486, 'Coimbatore', 31),
(487, 'Cuddalore', 31),
(488, 'Dharmapuri', 31),
(489, 'Dindigul', 31),
(490, 'Erode', 31),
(491, 'Kanchipuram', 31),
(492, 'Kanyakumari', 31),
(493, 'Karur', 31),
(494, 'Krishnagiri', 31),
(495, 'Madurai', 31),
(496, 'Nagapattinam', 31),
(497, 'Namakkal', 31),
(498, 'Nilgiris', 31),
(499, 'Perambalur', 31),
(500, 'Pudukkottai', 31),
(501, 'Ramanathapuram', 31),
(502, 'Salem', 31),
(503, 'Sivaganga', 31),
(504, 'Thanjavur', 31),
(505, 'Theni', 31),
(506, 'Tiruchirappalli', 31),
(507, 'Tirunelveli', 31),
(508, 'Tiruvallur', 31),
(509, 'Tiruvannamalai', 31),
(510, 'Tiruvarur', 31),
(511, 'Tuticorin', 31),
(512, 'Vellore', 31),
(513, 'Villupuram', 31),
(514, 'Virudhunagar', 31),
(515, 'Dhalai', 32),
(516, 'North Tripura', 32),
(517, 'South Tripura', 32),
(518, 'West Tripura', 32),
(519, 'Almora', 33),
(520, 'Bageshwar', 33),
(521, 'Chamoli', 33),
(522, 'Champawat', 33),
(523, 'Dehradun', 33),
(524, 'Haridwar', 33),
(525, 'Nainital', 33),
(526, 'Pauri Garhwal', 33),
(527, 'Pithoragarh', 33),
(528, 'Rudraprayag', 33),
(529, 'Tehri Garhwal', 33),
(530, 'Udham Singh Nagar', 33),
(531, 'Uttarkashi', 33),
(532, 'Agra', 34),
(533, 'Aligarh', 34),
(534, 'Allahabad', 34),
(535, 'Ambedkar Nagar', 34),
(536, 'Auraiya', 34),
(537, 'Azamgarh', 34),
(538, 'Bagpat', 34),
(539, 'Bahraich', 34),
(540, 'Ballia', 34),
(541, 'Balrampur', 34),
(542, 'Banda', 34),
(543, 'Barabanki', 34),
(544, 'Bareilly', 34),
(545, 'Basti', 34),
(546, 'Bijnor', 34),
(547, 'Budaun', 34),
(548, 'Bulandshahr', 34),
(549, 'Chandauli', 34),
(550, 'Chitrakoot', 34),
(551, 'Deoria', 34),
(552, 'Etah', 34),
(553, 'Etawah', 34),
(554, 'Faizabad', 34),
(555, 'Farrukhabad', 34),
(556, 'Fatehpur', 34),
(557, 'Firozabad', 34),
(558, 'Gautam Buddha Nagar', 34),
(559, 'Ghaziabad', 34),
(560, 'Ghazipur', 34),
(561, 'Gonda', 34),
(562, 'Gorakhpur', 34),
(563, 'Hamirpur', 34),
(564, 'Hardoi', 34),
(565, 'Hathras', 34),
(566, 'Jalaun', 34),
(567, 'Jaunpur', 34),
(568, 'Jhansi', 34),
(569, 'Jyotiba Phule Nagar', 34),
(570, 'Kannauj', 34),
(571, 'Kanpur Dehat', 34),
(572, 'Kanpur Nagar', 34),
(573, 'Kaushambi', 34),
(574, 'Kheri', 34),
(575, 'Kushinagar', 34),
(576, 'Lalitpur', 34),
(577, 'Lucknow', 34),
(578, 'Maharajganj', 34),
(579, 'Mahoba', 34),
(580, 'Mainpuri', 34),
(581, 'Mathura', 34),
(582, 'Mau', 34),
(583, 'Meerut', 34),
(584, 'Mirzapur', 34),
(585, 'Moradabad', 34),
(586, 'Muzaffarnagar', 34),
(587, 'Pilibhit', 34),
(588, 'Pratapgarh', 34),
(589, 'Raebareli	', 34),
(590, 'Rampur', 34),
(591, 'Saharanpur', 34),
(592, 'Sant Kabir Nagar', 34),
(593, 'Sant Ravidas Nagar', 34),
(594, 'Shahjahanpur', 34),
(595, 'Shrawasti', 34),
(596, 'Siddharthnagar', 34),
(597, 'Sitapur', 34),
(598, 'Sonbhadra', 34),
(599, 'Sultanpur', 34),
(600, 'Unnao', 34),
(601, 'Varanasi', 34),
(602, 'Bankura', 35),
(603, 'Bardhaman', 35),
(604, 'Birbhum', 35),
(605, 'Cooch Behar', 35),
(606, 'Darjiling', 35),
(607, 'East Midnapore', 35),
(608, 'Hooghly', 35),
(609, 'Howrah', 35),
(610, 'Jalpaiguri', 35),
(611, 'Kolkata', 35),
(612, 'Malda', 35),
(613, 'Medinipur', 35),
(614, 'Murshidabad', 35),
(615, 'Nadia', 35),
(616, 'North 24 Parganas', 35),
(617, 'North Dinajpur', 35),
(618, 'Puruliya', 35),
(619, 'South 24 Parganas', 35),
(620, 'South Dinajpur', 35),
(621, 'West Midnapore', 35),
(622, 'Adilabad', 36),
(623, 'Hyderabad', 36),
(624, 'K.V.Rangareddy', 36),
(625, 'Karim Nagar', 36),
(626, 'Khammam', 36),
(627, 'Mahabub Nagar', 36),
(628, 'Medak', 36),
(629, 'Nalgonda', 36),
(630, 'Nizamabad', 36),
(631, 'Warangal', 36);

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `id` int(11) NOT NULL,
  `fetid` int(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`id`, `fetid`, `fname`, `description`, `price`, `image`, `status`) VALUES
(1, 18891, 'Ammonium nitrate N34.4', 'Fertilizing effect: ammonium nitrate provides plants with required amount of nitrogen, which is especially important during the period of intensive growth. Fertilization not only ensures effective growth and ripening, faster root development, rapid nutrient absorption, but also prevents leave yellowing. Nitrogen stimulates and regulates many vital plant growth processes. Plants fertilized with ammonium nitrate consume less water, contain more proteins and sugar, have longer vegetation period.', 480, 'fertilizer/500kgAmonio salietra_3D_foto.jpg', 'Avaliable'),
(2, 76028, 'Organic Nitrogen (Thyla-N), 1 ', 'Composition:  Protein Hydrolysate - 30% Nitrogen – 12 to15% Organic carbon – less than 50% Other Nutrients – 1 to 2% Benefits:  Increase the yield and quality of crop Enhances the flowering and reduces the flower drop Increase the chlorophyll content in the leaves leading to higher photosynthetic rate Increase the resistance power of the plant by strengthening the immune system Increase soil micro flora and improves the health of the soil Application Dosage:  Foliar application 2-3 ml/ Liter of ', 750, 'fertilizer/organic-plant-nutrient-thyla-n--500x500.jpg', 'Avaliable'),
(3, 74587, 'Ashar Nitrogen Coating Fertili', 'With the valuable assistance of skilled team of professionals, we are engaged in offering an extensive range of high-quality Nitrogen Coating Fertilizer.  Note: Increasing efficiency of Nitrogen Fertilizer in Crop production by adding N-Balance.', 200, 'fertilizer/nitrogen-fertilizer-500x500.webp', 'Avaliable'),
(4, 50283, 'Liquid Potash Nitrogen Fertili', 'Product Specification Purity	99 % Form	Liquid Product Type	Plant Based Application	Agriculture Organic Matter	100% Water Soluble	Yes Release Type	Quick Target Crops And Plants	All Crop Dosage	20ml per 15 Litre Water Shelf Life	2 Year Solubiity	100 % Nitrogen %	80% Amino Acid %	20% Packaging Size	1 Litre Packaging Type	Bottle Manufacturer	Hexa Minimum Order Quantity	25 Litre Product Description Enrich with all natural nitrogen + 20 amino acidEnrichm with all natural nitrogen + 2o amino acid +2 mi', 880, 'fertilizer/potash-nitrogen-fertilizer-250x250.webp', 'Avaliable'),
(5, 55135, 'Jeevamrutham Concentrate 100% ', '100% organic biofertilizer prepared from desi cow dung, desi cow urine, fertile soil mix, besan flour and jaggery. Benefits the soil by improving soil biomass, carbon and essential nutrients like nitrogen, potassium and calcium.  Organically enriching microbial activity: Improves nutrient available to the plants, Prevents root diseases Augments water penetration and retention capacities of the soil. Reduces the risk of soil erosion. Improves soil air circulation. ', 3250, 'fertilizer/Jeevamrutham-5ltr_700x.webp', 'Avaliable'),
(6, 54300, 'Redo Force Granules, Pack Type', 'Being a customer focused organization, we are engaged in the manufacturing and supplying process of a wide gamut of Zyme Granules. Offered by us, these zyme granules are widely used in agriculture sector. These are used for enhancing the yield of agricultural crops. Our professionals also ensure that the products formulated by us are environment-friendly and meet the international quality standards.\r\n\r\n \r\n\r\nFeatures:\r\n\r\nPromotes the growth and increases the yield\r\nEffective\r\nEasy to use\r\nNon-tox', 1000, 'fertilizer/zyme-graneules-250x250.webp', 'Avaliable'),
(7, 35108, 'Utkarsh Magnesium Sulphate (Ep', 'Magnesium Sulphate is a Good source for Magnesium and Sulphur. Magnesium Sulphate play important role in photosynthesis.\r\nMagnesium Sulphateregulates the uptake of other nutrients by the plant.\r\nMagnesium Sulphatepromotes the formation of oils and fats.\r\nMagnesium Sulphate enhances plants ability to produce flowers and set fruits.', 778, 'fertilizer/uk fertilizer.jpg', 'Avaliable'),
(8, 93489, 'Utkarsh Prime-All (Amino Acid ', 'Prime – All is especially useful for the healthy vegetative growth of young seedlings and growing plants.\r\nPrime – All supply required macronutrients (N, P, K) together in optimum dose to crops.\r\nPrime – All is free-flowing, fine crystalline powder which dissolves speedily and completely in water to form a spray solution.\r\n', 841, 'fertilizer/uk fertilizer1.jpg', 'Avaliable'),
(9, 11363, 'Greatindos Grade A NPK 12:61:0', 'MONO AMMONIUM PHOSPHATE (NPK 12:61:00)\r\n\r\nImported 100% Water Soluble Fertilizer and recommended using for drip fertigation or foliar spray.\r\n\r\nIt contains a higher percentage of Phosphorus in available form.\r\n\r\nIt has urea free nitrogen hence it can give better availability of Nitrogen through ammonia form.\r\n\r\nMAP(12:61:00) is free-flowing, fine crystalline powder which dissolves speedily and completely in water to form spray solution. MAP (12:61:00) is water-soluble fertilizer containing the h', 1795, 'fertilizer/uk fertilizer2.jpg', 'Avaliable'),
(10, 99732, 'Yaravita Zintrac 700, Zinc Oxi', 'Zintrac 700 is a highly concentrated flowable zinc formulation containing 39.5 percent zinc.\r\nHigher nutrient concentration means that application rates are lower.\r\nZintrac 700 is designed for rapid uptake and long-term feeding power, so fewer applications are required.\r\nIt is made from pharmaceutical-grade raw materials and is free from impurities.\r\nCo-formulants such as wetting, sticking, dispersion, and stabilizing agents ensure rain fastness, efficiency, safe, and easy use.\r\nWidely tank mixa', 1907, 'fertilizer/uk fertilizer3', 'Avaliable'),
(11, 20666, 'Yaravita Zintrac 700, Zinc Oxi', 'Improved cell wall structure by the movement of calcium\r\n\r\nImproved cell division at root tips, leaf and bud development\r\n\r\nImproved sugar transport rate via photosynthesis in the root region\r\n\r\n  Regulation of hormone levels in plants for growth and reproduction\r\n\r\n  Meristem differentiation provides flowering and fruiting of plant\r\n\r\nApplication method and Dosage:\r\n\r\n • 0.5 gm – 1.0 gm per liter water for foliar spray\r\n\r\n• 500 gm - 1 kg per acre for Drip irrigation\r\n\r\nRecommended Crops: All fr', 494, 'fertilizer/uk fertilizer4.jpg', 'Avaliable'),
(12, 45626, 'NPK 13:00:45 (Potassium Nitrat', 'NPK 13:00:45 (Potassium Nitrate)\r\nIt is a free-flowing, 100% water-soluble product and is recommended for use for drip fertigation or foliar spray. It has nitrate nitrogen content which has proved best for fertilization for almost all crops.\r\n\r\n', 9016, 'fertilizer/uk fertilizer5', 'Avaliable'),
(13, 28160, 'Utkarsh Horse Power ', 'Utkarsh Horse Power is a unique combination of activated polyphosphate blended with all 6 micronutrients in available form. It’s also the best-balanced combination of various nutrients for trunk formation.\r\nUtkarsh Horse Power Helps photosynthesis and optimizes plant metabolism, induces excellent flowering and fruit set, reduces flowering dropping stimulates tillering in sugarcane for bumper millable canes for best yield.\r\n\r\nTarget crops\r\n\r\nGuava, Ber, Apple, Pear, Peach, Plum, Loquat, Almond, C', 534, 'fertilizer/uk fertilizer6.jpg', 'Avaliable'),
(14, 36449, 'Geolife Nano Fert NPK Fertiliz', 'It is rich in water soluble Phosporus and Potash Suitable for pre-bloom as well as post-bloom applications.\r\n\r\nThe absenece of nitrogen promotes more flowering then vegetation, increases C:N ratio.\r\n\r\nProperly used for proper flowering and attractive color formation.\r\n\r\nDosage: 1-2 gram/ 1 gram of litre water , 200 Grams per acre required', 6021, 'fertilizer/uk fertilizer7.jpg', 'Avaliable'),
(15, 33127, 'Geolife Nano Fert NPK 00:00:50', 'It helps in application of Potassium enriched Water Soluble Fertilizer protein production\r\nRequired majorly during the fruit stage development\r\nDosage: 1-2 gram/ 1 litre of water , 200 Grams per Acre required\r\nThe absence of nitrogen promotes more flowering than vegetation, increases C:N ratio. Popularly used for proper and attractive color formation', 948, 'fertilizer/uk fertilizer8.jpg', 'Avaliable'),
(16, 19664, 'Liquibor A Unique Liquid Boron', 'LIQUIBOR provides Boron for effective maintenance of Boron levels in Plant tissues or for rapid correction of Boron Deficiencies in deficient crops.\r\n LIQUIBOR is a unique stabilizing agent and can be directly applied to foliage or soil.\r\nIt is compatible with most agricultural chemicals.\r\nFoliar application of Boron is more efficient than soil application because the former avoids the formation of complex soil borates.\r\nLIQUIBOR is normal water soluble and rapidly absorbed by the foliage and ut', 1300, 'fertilizer/uk fertilizer9.jpg', 'Avaliable'),
(17, 92398, 'NPK 00:52:34 (Mono Potassium P', 'It is a free-flowing, 100% water-soluble product and is recommended to use for drip fertigation or foliar spray.\r\n\r\nDose:- 5gms per liter of water by drip fertigation/spray.', 2380, 'fertilizer/uk fertilizer10.jpg', 'Avaliable');

-- --------------------------------------------------------

--
-- Table structure for table `goodprice`
--

CREATE TABLE `goodprice` (
  `id` int(11) NOT NULL,
  `gid` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(15) NOT NULL,
  `reciver` varchar(15) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `noti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `link` varchar(20) NOT NULL,
  `news` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `link`, `news`, `date`) VALUES
(1, 'YhfQkG2QeMo', 'PM Modi Endorses Agriculture Budget While Addressing Webinar | Breaking News | India Today', '2023-05-25'),
(2, 'jyIol4x6KGI', 'What are Primary Agricultural Credit Societies? - IN NEWS I Drishti IAS', '2023-05-28'),
(3, 'xFqecEtdGZ0', 'Can we create the \"perfect\" farm? - Brent Loken', '2023-05-28'),
(4, 'f91s8-C4lzw', 'India: Government introduces scientific ways for apple farming | Latest World English News | WION', '2023-05-28'),
(5, 'Jsfiqw_f4jU', 'Union Budget 2023-24 - Key Highlights (AGRICULTURE)', '2023-05-28'),
(6, '2qK9x-06MfE', 'Integrating Technology To Bolster Agriculture Sector: Niramala Sitharaman In Budget 2023 Speech', '2023-05-28'),
(7, 'fiVbR4lB66k', 'The State of Food and Agriculture 2022 Report released - Daily Current News | Drishti IAS', '2023-05-28'),
(8, 'HgGvs0fhMHM', 'India: Farmers cheer over healthy Saffron cultivation in Kashmir | Latest English News | WION', '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `cid` int(11) NOT NULL,
  `orderid` varchar(15) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `fetid` varchar(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `noti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`cid`, `orderid`, `loginid`, `fetid`, `fname`, `price`, `quantity`, `discount`, `total`, `date`, `time`, `status`, `noti`) VALUES
(1, '3589891129', 'FM7709341', '35108', 'Utkarsh Magnesium Sulphate (Ep', '778', '2', '727.7', '1556', '2023-05-29', '12:29:24', 'Delivered', 1),
(2, '3589891129', 'FM7709341', '99732', 'Yaravita Zintrac 700, Zinc Oxi', '1907', '3', '727.7', '5721', '2023-05-29', '12:29:24', 'Delivered', 1),
(3, '3076752322', 'FM7709341', '74587', 'Ashar Nitrogen Coating Fertili', '200', '5', '50', '1000', '2023-05-29', '11:43:18', 'Delivered', 0),
(4, '8756683488', 'IN8165062', '50283', 'Liquid Potash Nitrogen Fertili', '880', '4', '507.6', '3520', '2023-05-29', '11:45:01', 'Completed', 0),
(5, '8756683488', 'IN8165062', '35108', 'Utkarsh Magnesium Sulphate (Ep', '778', '2', '507.6', '1556', '2023-05-29', '11:45:01', 'Completed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `Lid` varchar(15) NOT NULL,
  `goodid` int(10) NOT NULL,
  `age` int(4) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` int(15) NOT NULL,
  `epu` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(700) NOT NULL,
  `total` int(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `sellstatus` varchar(19) NOT NULL,
  `noti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `Lid`, `goodid`, `age`, `product`, `quantity`, `epu`, `image`, `description`, `total`, `date`, `time`, `sellstatus`, `noti`) VALUES
(1, 'FM7709341', 6210207, 5, 'Onion', 100, 30, 'goods/mp_2.jpg', 'The onion plant has a fan of hollow, bluish-green leaves and its bulb at the base of the plant begins to swell when a certain day-length is reached. The bulbs are composed of shortened, compressed, underground stems surrounded by fleshy modified scale (leaves) that envelop a central bud at the tip of the stem. In the autumn (or in spring, in the case of overwintering onions), the foliage dies down and the outer layers of the bulb become more dry and brittle. The crop is harvested and dried and t', 250000, '2023-04-27', '06:15:22', 'Pending', 0),
(2, 'FM7709341', 2868336, 2, 'Potato', 120, 28, 'goods/mp_1.jpg', 'The potato is a starchy food, a tuber of the plant Solanum tuberosum and is a root vegetable native to the Americas. The plant is a perennial in the nightshade family Solanaceae.\n\nWild potato species can be found from the southern United States to southern Chile. The potato was originally believed to have been domesticated by Native Americans independently in multiple locations, but later genetic studies traced a single origin, in the area of present-day southern Peru and extreme northwestern ', 336000, '2023-04-17', '06:19:25', 'Pending', 0),
(3, 'FM7709341', 7985498, 12, 'Wheat', 250, 23, 'goods/mp_6.jpg', 'Wheat is a grass widely cultivated for its seed, a cereal grain that is a worldwide staple food. The many species of wheat together make up the genus Triticum /ˈtrɪtɪkəm/; the most widely grown is common wheat (T. aestivum). The archaeological record suggests that wheat was first cultivated in the regions of the Fertile Crescent around 9600 BCE. Botanically, the wheat kernel is a type of fruit called a caryopsis.\r\n\r\nWheat is grown on more land area than any other food crop (220.4 million hectares or 545 million acres, 2014). World trade in wheat is greater than for all other crops combined.', 575000, '2023-03-28', '06:23:52', 'Pending', 0),
(4, 'FM7645092', 7547660, 10, 'Cotton', 500, 45, 'goods/mp_7.jpg', 'Cotton is a soft, fluffy staple fiber that grows in a boll, or protective case, around the seeds of the cotton plants of the genus Gossypium in the mallow family Malvaceae. The fiber is almost pure cellulose, and can contain minor percentages of waxes, fats, pectins, and water. Under natural conditions, the cotton bolls will increase the dispersal of the seeds.\r\n\r\nThe plant is a shrub native to tropical and subtropical regions around the world, including the Americas, Africa, Egypt and India. The greatest diversity of wild cotton species is found in Mexico, followed by Australia and Africa. Cotton was independently domesticated in the Old and New Worlds.', 2250000, '2023-03-18', '06:27:00', 'Pending', 0),
(5, 'FM7645092', 6771821, 1, 'Tomato', 75, 40, 'goods/fruit_img2.jpg', 'The tomato  is the edible berry of the plant Solanum lycopersicum, commonly known as the tomato plant. The species originated in western South America, Mexico, and Central America. The Nahuatl word tomatl gave rise to the Spanish word tomate, from which the English word tomato derived. Its domestication and use as a cultivated food may have originated with the indigenous peoples of Mexico. The Aztecs used tomatoes in their cooking at the time of the Spanish conquest of the Aztec Empire, and after the Spanish encountered the tomato for the first time after their contact with the Aztecs, they brought the plant to Europe, in a widespread transfer of plants known as the Columbian exchange. From ', 300000, '2023-04-28', '06:30:04', 'Pending', 0),
(6, 'FM7645092', 9388567, 3, 'Peanuts', 180, 50, 'goods/peanut.jpg', 'The peanut (Arachis hypogaea), also known as the groundnut, goober (US), pindar (US) or monkey nut (UK), is a legume crop grown mainly for its edible seeds. It is widely grown in the tropics and subtropics, important to both small and large commercial producers. It is classified as both a grain legume and, due to its high oil content, an oil crop.[5] World annual production of shelled peanuts was 44 million tonnes in 2016, led by China with 38% of the world total. Atypically among legume crop plants, peanut pods develop underground (geocarpy) rather than above ground. With this characteristic in mind, the botanist Carl Linnaeus gave peanuts the specific epithet hypogaea, which means \"under t', 900000, '2023-01-28', '06:35:07', 'Pending', 0),
(7, 'FM4920972', 5025354, 10, 'Rice', 210, 19, 'goods/mp_5.jpg', 'Rice is the seed of the grass species Oryza sativa (Asian rice) or less commonly O. glaberrima (African rice). The name wild rice is usually used for species of the genera Zizania and Porteresia, both wild and domesticated, although the term may also be used for primitive or uncultivated varieties of Oryza.\r\n\r\nAs a cereal grain, domesticated rice is the most widely consumed staple food for over half of the world\'s human population,[Liu 1] particularly in Asia and Africa. It is the agricultural commodity with the third-highest worldwide production, after sugarcane and maize. Since sizable portions of sugarcane and maize crops are used for purposes other than human consumption, rice is the mos', 399000, '2023-02-21', '06:38:20', 'Pending', 0),
(8, 'FM4920972', 9043101, 1, 'Tomato', 125, 32, 'goods/tomato.jpg', 'The tomato  is the edible berry of the plant Solanum lycopersicum, commonly known as the tomato plant. The species originated in western South America, Mexico, and Central America. The Nahuatl word tomatl gave rise to the Spanish word tomate, from which the English word tomato derived. Its domestication and use as a cultivated food may have originated with the indigenous peoples of Mexico. The Aztecs used tomatoes in their cooking at the time of the Spanish conquest of the Aztec Empire, and after the Spanish encountered the tomato for the first time after their contact with the Aztecs, they brought the plant to Europe, in a widespread transfer of plants known as the Columbian exchange. From ', 400000, '2023-02-08', '09:45:50', 'Pending', 0),
(9, 'FM4920972', 6226239, 5, 'Potato', 190, 26, 'goods/pexels-marco-antonio-victorino-2286776.jpg', 'The potato is a starchy food, a tuber of the plant Solanum tuberosum and is a root vegetable native to the Americas. The plant is a perennial in the nightshade family Solanaceae.\r\n\r\nWild potato species can be found from the southern United States to southern Chile. The potato was originally believed to have been domesticated by Native Americans independently in multiple locations, but later genetic studies traced a single origin, in the area of present-day southern Peru and extreme northwestern ', 494000, '2023-05-28', '09:47:05', 'Pending', 0),
(10, 'FM1117201', 5688561, 10, 'Onion', 250, 22, 'goods/photo.webp', 'The onion plant has a fan of hollow, bluish-green leaves and its bulb at the base of the plant begins to swell when a certain day-length is reached. The bulbs are composed of shortened, compressed, underground stems surrounded by fleshy modified scale (leaves) that envelop a central bud at the tip of the stem. In the autumn (or in spring, in the case of overwintering onions), the foliage dies down and the outer layers of the bulb become more dry and brittle. The crop is harvested and dried and t', 550000, '2023-05-28', '09:51:36', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `cid` int(11) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `image` varchar(50) NOT NULL,
  `proof` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mstatus` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `otp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`cid`, `loginid`, `name`, `mobile`, `email`, `password`, `cpassword`, `address`, `city`, `state`, `pincode`, `date`, `time`, `image`, `proof`, `status`, `mstatus`, `token`, `otp`) VALUES
(1, 'FM7709341', 'Abhishek Hajare', '9421017990', 'abhishekhajare088@gmail.com', '$2y$10$vTAmTPSz.y/E1.opJvIBoOfnx54RIlFOS3DHrBaAmwjLRS2jPaMAC', '$2y$10$f4tgqSSPgXEiX.MVL9eVD.xdLw2/V1cYCr1611AgPYSWMFDnr73DW', 'Ho. No. 4748 Nirfarake Gali Maliwada Ahmednagar', 'Ahmednagar', 'MAHARASHTRA', 414001, '2023-05-28', '05:05:54', 'image/profile.jpg', 'proof/abhi-modified.png', 'Active', 'Active', 'c46751191570931e5e0f892b941674', 3123),
(2, 'FM7645092', 'Shirish Hajare', '9422339397', 'shirishhajare270@gmail.com', '$2y$10$9LpFPmla6cvaBHAIdYDzeungIGUNW/mHIr3J10NsDv91fnFW3N.7e', '$2y$10$9LpFPmla6cvaBHAIdYDzeungIGUNW/mHIr3J10NsDv91fnFW3N.7e', 'Ho. No. 4748 Nirfarake Gali', 'Ahmednagar', 'MAHARASHTRA', 414001, '2023-05-28', '05:09:47', 'image/profile.jpg', 'proof/profile.jpg', 'Active', 'Active', 'c2160b6c0f5840ec78e024dd717080', 9126),
(3, 'IN8165062', 'Vishwas Garade', '7219844782', 'vishwas.garade@mitaoe.ac.in', '$2y$10$I8efqneyMjHvGCnakx1Yz.A6//tlEWkbPKyG6jaFbLZBBSmld13gq', '$2y$10$I8efqneyMjHvGCnakx1Yz.A6//tlEWkbPKyG6jaFbLZBBSmld13gq', 'Near, MIT AOE, Alandi, Pune', 'Pune', 'MAHARASHTRA', 412105, '2023-05-28', '05:12:22', 'image/profile.jpg', 'proof/profile.jpg', 'Active', 'Active', 'c8e0efa1e448ad5f141e95644cc8fb', 8866),
(4, 'IN4363797', 'Siddharth Adawale', '8455425622', 'siddharth.adawale@mitaoe.ac.in', '$2y$10$GiU.AlS8t1umj4Ubb3duvOuiOzwK80MJMyAhsuGPOPsxEEkrv/m2O', '$2y$10$GiU.AlS8t1umj4Ubb3duvOuiOzwK80MJMyAhsuGPOPsxEEkrv/m2O', 'Raj guru nagar Khed Pune', 'Pune', 'MAHARASHTRA', 412105, '2023-05-28', '05:15:11', 'image/profile.jpg', 'proof/_MG_9352-modified (2).png', 'Active', 'Active', '8d68d3cc90e88ee0696bae1ace091d', 3562),
(5, 'FM4920972', 'Aalhad Narwade', '9654785462', 'aalhad.narwade@mitaoe.ac.in', '$2y$10$3C8Dnv23JIg1AocysxI6/.WX/e2zUS07ACfJik9CIsWyKZT69I.6m', '$2y$10$3C8Dnv23JIg1AocysxI6/.WX/e2zUS07ACfJik9CIsWyKZT69I.6m', 'Near, MIT AOE, Alandi, Pune', 'Pune', 'MAHARASHTRA', 412105, '2023-05-28', '05:16:33', 'image/profile.jpg', 'proof/aalhad-modified.png', 'Active', 'Active', '8583af4bd1c16f2cee906cacd26315', 5157),
(6, 'FM1117201', 'Abhi Shirish Hajare', '9421017990', 'abhishekshajare786@gmail.com', '$2y$10$/Qkr75sSLMyvNkialrx6s.x1bkLHSpfkR/lPjbGsJhoBlbyg.h15e', '$2y$10$/Qkr75sSLMyvNkialrx6s.x1bkLHSpfkR/lPjbGsJhoBlbyg.h15e', 'Ho. No. 4748 Nirfarake Gali Maliwada Ahmednagar', 'Ahmednagar', 'MAHARASHTRA', 414001, '2023-05-28', '05:19:37', 'image/profile.jpg', 'proof/abhi-modified.png', 'Active', 'Active', '5c5316e233f5d8feb9d7a4982b806d', 6337),
(7, 'IN6157255', 'Sanket Ajay Patil', '6477854685', 'sanket.patil@mitaoe.ac.in', '$2y$10$qLDjcgs.BWVbWyGyV2wdwOdBmNbw85HdfDYvIu2oibPffSEM7JwQe', '$2y$10$qLDjcgs.BWVbWyGyV2wdwOdBmNbw85HdfDYvIu2oibPffSEM7JwQe', 'Near, MIT AOE, Alandi, Pune', 'Pune', 'MAHARASHTRA', 412105, '2023-05-28', '05:20:48', 'image/profile.jpg', 'proof/profile.jpg', 'Active', 'Active', '827a65bbdcfad83b364f00e35ca41d', 1304),
(8, 'FM3194109', 'Sairaj Pise', '6589589487', 'sairaj.pis@mitaoe.ac.in', '$2y$10$kNPs5a7MtVdqny8qInLx7uXfu10NdUfllhjxAI9cw252Y8FL/kFAS', '$2y$10$kNPs5a7MtVdqny8qInLx7uXfu10NdUfllhjxAI9cw252Y8FL/kFAS', 'Near, MIT AOE, Alandi, Pune', 'Pune', 'MAHARASHTRA', 412105, '2023-05-28', '05:22:09', 'image/profile.jpg', 'proof/sai-modified.png', 'Active', 'Active', '60db97b56a02e06a21327a3e234336', 1940);

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `farmer` varchar(15) NOT NULL,
  `goodid` varchar(15) NOT NULL,
  `buyer` varchar(15) NOT NULL,
  `price` double NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ODISHA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detect`
--
ALTER TABLE `detect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goodprice`
--
ALTER TABLE `goodprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detect`
--
ALTER TABLE `detect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `goodprice`
--
ALTER TABLE `goodprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
