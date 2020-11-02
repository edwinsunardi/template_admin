-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 04:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumiaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dept` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sub_dept` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullname`, `password`, `email`, `level`, `dept`, `sub_dept`, `status`) VALUES
(1, 'sadsa', '1d3d32d12321', '7d14c4bcb9dd6c1643b1e0ee7c813e93', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 1),
(2, 'admin', 'admin', 'e7333dacd7703b143c6af4ee262c6d95', '', 'super administrator', 'TMD', 'T11', 1),
(3, 'edwin', 'Edwin Budiyanto Sunardi', 'b3c13af75fae633d67b259392c19a5cb', '', 'super administrator', 'WSTP', 'T21', 1),
(4, 'Yudi', 'Yudistira', '9b71753a067b3c8b6ea59e908bfea1aa', '', 'admin', '', '', 0),
(5, 'yanti', 'Yanti', '1f2ff07eb8b9ef9860902845e9f70165', '', 'admin', '', '', 0),
(6, 'mira', 'Mira', '1f2ff07eb8b9ef9860902845e9f70165', '', 'super administrator', '', '', 0),
(7, 'trini', 'trini', 'bebc9d53b9192c5b3df20db771b1e517', 'cs@townmanagementsgc.com', 'admin', 'CS', '', 1),
(8, 'indri', 'indri', '71f7be7b8496f7ece8454b1bcdcd2162', 'cs@townmanagementsgc.com', 'admin', 'CS', '', 0),
(9, 'renny', 'renny', 'b91b6c3e57f643f0e0f0fbb971de6cc9', 'cs@townmanagementsgc.com', 'admin', 'CS', '', 1),
(10, 'meiske', 'meiske', 'e8e60b35c04cee8d7ce27b2babed951f', '', 'admin', 'CS', '', 0),
(11, 'aulia', 'aulia', '585599b86c964f31d3da0d8cc5cbcd06', '', 'admin', 'CS', '', 0),
(12, 'vresnu', 'vresnu', '1f2ff07eb8b9ef9860902845e9f70165', 'vresnu.s@townmanagementsgc.com', 'super administrator', 'EO', 'EO', 1),
(13, 'baby', 'baby', 'f1621d667b801fe0f7a1552a5ed9b104', 'prastiti.h@townmanagementsgc.com', 'super administrator', 'TMD', '', 1),
(14, 'maulana_eo', 'maulana', '1f2ff07eb8b9ef9860902845e9f70165', 'maulana@townmanagementsgc.com', 'super administrator', 'EO', '', 1),
(15, 'gaol', 'gaol', 'b7e4d5cebf72a255de86b204a5ade4c8', '', 'super administrator', 'SECURITY', '', 0),
(16, 'samsudin', 'Samsudin', '7a6e6669bee12334049f4468493d31fa', 'udin@townmanagementsgc.com', 'admin', 'TMD', 'T13', 1),
(17, 'donna', 'Donna', '1c76c78636c588ef55187fff5eea8446', '', 'super administrator', 'CS', '', 0),
(18, 'citra', 'Citra', 'e37286c7a20e3d274e3f2f2b035457f1', 'cfathoni@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(19, 'titib', 'Titib', '1f2ff07eb8b9ef9860902845e9f70165', 'tibet@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(20, 'day', 'Day Fadinama', '1f2ff07eb8b9ef9860902845e9f70165', 'day@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(21, 'pramono', 'Pramono', '1f2ff07eb8b9ef9860902845e9f70165', 'supratmono@townmanagementsgc.com', 'admin', 'BILL_COLL', 'N12', 1),
(22, 'deden', 'Deden', '665721dcb5f05d160c628598da0f9d2c', 'deden@townmanagementsgc.com', 'admin', 'WSTP', 'T21', 1),
(23, 'aden', 'Aden', 'a6c6af0cfcbce59380af35471e26cfea', 'aden@townmanagementsgc.com', 'admin', 'WSTP', 'T22', 0),
(24, 'ramon', 'Ramon', '1f2ff07eb8b9ef9860902845e9f70165', 'ramon@townmanagementsgc.com', 'super administrator', 'SECURITY', '', 1),
(25, 'gundala', 'Gundala', 'bd7b9c6c28a7ed780c139781b64dd61f', 'gundala@townmanagementsgc.com', 'admin', 'SECURITY', 'S11', 1),
(26, 'anton', 'anton', 'cdfe99b735d37c08f6069e504c07b761', 'antana@townmanagementsgc.com', 'super administrator', 'BILL_COLL', '', 1),
(27, 'irma', 'Irma', '1f2ff07eb8b9ef9860902845e9f70165', 'irma@townmanagementsgc.com', 'admin', 'BILL_COLL', 'N11', 1),
(28, 'apendi', 'Apendi', '061df5476bd0edb7e81dde34d65d9c92', 'apendi@townmanagementsgc.com', 'admin', 'BILL_COLL', 'N11', 1),
(29, 'usmanto', 'usmanto', '9bba874e9cdf94a3a8398e6ab3d7b023', 'usmanto@townmanagementsgc.com', 'admin', 'TMD', 'T11', 1),
(30, 'nugroho', 'Nugroho', '9e85aaddef2f53e612689101a0115529', 'nugroho@townmanagementsgc.com', 'super administrator', 'WSTP', '', 0),
(31, 'ilmy', 'ilmy', '742d17b48155cbb90476242560c1b6f7', 'ilmy@townmanagementsgc.com', 'admin', 'TMD', 'T12', 1),
(32, 'tommy', 'Tommy Aditia', 'ba020b334db4a6e7caa96ae5ee719565', 'tommy@townmanagementsgc.com', 'admin', 'EO', 'EO', 0),
(33, 'dede', 'Dede Nurdin', '1f2ff07eb8b9ef9860902845e9f70165', 'dede@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(34, 'kabut', 'Kabut Satriya', 'f531e92e5442198912be5d0243353eea', '', 'super administrator', 'BDU', '', 0),
(35, 'novi', 'Novi', '4110b1a1c4017dc38eb5d3bc0c00d8e8', 'novi@townmanagementsgc.com', 'admin', 'BDU', 'B11', 0),
(36, 'mustofa', 'Mustofa ', '7af11d60c01cbe437b121eaa66318288', '', 'admin', 'BDU', 'B11', 0),
(37, 'truly', 'Truly', '9841ffee268b3efd4623bd25cf78450d', '', 'admin', 'BDU', 'B11', 0),
(38, 'magda', 'Magda L', '28631b3d036fd68b2643f1b5ca185d95', '', 'super administrator', 'CS', '', 1),
(39, 'adiyat', 'adiyat achmadi', 'b385fd768695494bd7464d5ed9803f2c', '', 'super administrator', 'CS', '', 0),
(40, 'it', 'IT SC', '28c4b8221763aa6ea965f40c66a586b4', '', 'super administrator', 'CS', '', 1),
(41, 'dudi', 'Dudi ikhsan', '2ae4bb452ca5d449bca88c04436e35b1', 'dudi.ikhsan@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(42, 'komarudin', 'Komarudin', '2afee8e1922d46f8871fb82d0d6c5931', 'komarudin@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(43, 'elbas', 'Elbas', 'e6b3c8b707f6fb8b105e7532fa4e1604', 'elbas@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(44, 'rahmat', 'Rahmat', 'a964b9be574eab64304ccf48b38d8acc', 'rahmat.k@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(45, 'aris', 'Aris', '495442eb0f3cc95339a73c2f2ce8b0f7', 'aris@sentulcity.co.id', 'super administrator', 'BILL_COLL', '', 1),
(46, 'waris', 'waris', '01528d13d9648dc0f3116f924f0b4e92', 'waris@townmanagementsgc.com', 'admin', 'WSTP', 'WSTP', 0),
(47, 'mella', 'mella', 'dce0da45b2f16ad321e7a92f031b4959', 'mella@townmanagementsgc.com', 'admin', 'CS', '', 1),
(48, 'baby_wtp', 'Prastiti Handayani', 'f1621d667b801fe0f7a1552a5ed9b104', 'prastiti.h@townmanagementsgc.com', 'super administrator', 'WSTP', '', 1),
(49, 'maulana_ec', 'Maulana', '1f2ff07eb8b9ef9860902845e9f70165', 'maulana@townmanagementsgc.com', 'super administrator', 'BCD_HCU', '', 1),
(50, 'risyad', 'Kemas Risyad', '651a23ab849947efdc799eb616636eb3', 'risyad@townmanagementsgc.com', 'admin', 'WSTP', 'T22', 1),
(51, 'maulana_cs', 'Maulana', '1f2ff07eb8b9ef9860902845e9f70165', 'maulana@townmanagementsgc.com', 'super administrator', 'CS', '', 1),
(52, 'aridwi', 'Aridwi', '7535ec99fc5f45102878af9f4400e19d', 'aridwi.prayoko@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(53, 'maryono', 'Maryono', '1f2ff07eb8b9ef9860902845e9f70165', 'maryono@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(54, 'agung', 'Agung Putra', '1f2ff07eb8b9ef9860902845e9f70165', 'agung.putra@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(55, 'erwin', 'Erwin Milano', '1f2ff07eb8b9ef9860902845e9f70165', 'erwin.milano@townmanagementsgc.com', 'admin', 'TMD', 'N22', 1),
(56, 'rachmat_h', 'Rachmat Hidayat', '09c0b75b6f0ed7c1804255d4a833f7bd', 'rahmat.h@townmanagementsgc.com', 'admin', 'BILL_COLL', '', 1),
(57, 'fahmi', 'fahmi', '28466ccdf721a038a0b8aa6b558b5629', 'fahmi@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(58, 'rochmad', 'Rochmad Arwanto', '1f2ff07eb8b9ef9860902845e9f70165', 'roy@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(59, 'jenni', 'Mohammad Jenni', 'a18fe910877fbba447da723dfcd8c8ad', 'mohjen@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(60, 'fani', 'fani Muntari', '1f2ff07eb8b9ef9860902845e9f70165', 'fani.muntari@townmanagementsgc.com', 'admin', 'EO', 'EO', 1),
(61, 'rahmat_hidayat', 'Rahmat Hidayat', '1f2ff07eb8b9ef9860902845e9f70165', 'rahmat@townmanagementsgc.com', 'admin', 'BILL_COLL', 'N11', 1),
(62, 'lusiana', 'Lusiana', '1f2ff07eb8b9ef9860902845e9f70165', 'lusiana.ucay@townmanagementsgc.com', 'admin', 'TMD', 'T12', 1),
(63, 'putri', 'putri', '1f2ff07eb8b9ef9860902845e9f70165', 'cs@townmanagementsgc.com', 'admin', 'CS', '', 1),
(64, 'gigih', 'gigih', '1f2ff07eb8b9ef9860902845e9f70165', 'gigih@townmanagementsgc.com', 'admin', 'TMD', 'T12', 1),
(65, 'edwin', '123123', 'c22b263211ce18710bc755943333599e', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 0),
(66, 'edwin', '123123', 'c22b263211ce18710bc755943333599e', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 1),
(67, 'edwin', '123123', 'c22b263211ce18710bc755943333599e', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 1),
(68, 'edwin', '123123', 'c22b263211ce18710bc755943333599e', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 0),
(69, 'edwin', '123123', '1f2ff07eb8b9ef9860902845e9f70165', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 0),
(70, 'edwin123', '123123', '1f2ff07eb8b9ef9860902845e9f70165', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 0),
(71, 'edwin123', '123123', '1f2ff07eb8b9ef9860902845e9f70165', 'edwin_navy@yahoo.co.id', 'super administrator', '', '', 0),
(72, 'edwin12332221', 'Dwi Wahyudi', 'c22b263211ce18710bc755943333599e', 'sihlin@gmail.com', 'super administrator', '', '', 1),
(73, 'edwin12332221', 'Dwi Wahyudi', 'c22b263211ce18710bc755943333599e', 'sihlin@gmail.com', 'super administrator', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_icon` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_url` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_active_sub` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_order` int(3) DEFAULT NULL,
  `menu_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu_name`, `menu_icon`, `menu_url`, `menu_active_sub`, `menu_parent_id`, `menu_order`, `menu_status`) VALUES
(1, 'Administrator', 'nav-icon fas fa-tachometer-alt', 'javascript::', 'administration', 0, 99, 1),
(2, 'List Admin', 'nav-icon fas fa-tachometer-alt', 'admin/administration/listAdmin', 'administration_listadmin', 1, 1, 1),
(3, 'Javascript', 'nav-icon fab fa-js', 'javascript::', 'javascript', 0, 2, 1),
(4, 'Vue JS', 'nav-icon far fa-circle text-info', 'javascript/javascript/vuejs', 'vuejs', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_prev`
--

CREATE TABLE `admin_menu_prev` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin_menu_prev`
--

INSERT INTO `admin_menu_prev` (`id`, `admin_id`, `menu_id`) VALUES
(0, 2, 1),
(0, 2, 2),
(0, 3, 3),
(0, 3, 4),
(0, 3, 1),
(0, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `receiver` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `create_date`) VALUES
(1, 'edwin', 'admin', 'mantap', '2020-10-19 16:06:46'),
(2, 'edwin', 'admin', 'saya sudah bisa loh', '2020-10-19 16:06:55'),
(3, 'edwin', 'admin', 'jangan menyerah! kamu harus bisa', '2020-10-19 16:07:12'),
(4, 'admin', 'edwin', 'horeee', '2020-10-19 18:59:24'),
(5, 'admin', 'edwin', 'akuuu bisa', '2020-10-19 19:00:21'),
(6, 'admin', 'edwin', 'masa sih?', '2020-10-19 19:31:18'),
(7, 'edwin', 'admin', 'wahahaha', '2020-10-19 20:31:21'),
(8, 'edwin', 'admin', 'santai donk', '2020-10-19 20:31:33'),
(9, 'admin', 'admin', 'udah dulu yah', '2020-10-19 21:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `telepon`
--

CREATE TABLE `telepon` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telepon`
--

INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Orion', '08576666762'),
(2, 'Mars', '08576666770'),
(7, 'Alpha', '08576666765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `telepon`
--
ALTER TABLE `telepon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
