-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 12:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `date`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '22222');

-- --------------------------------------------------------

--
-- Table structure for table `branch_office`
--

CREATE TABLE `branch_office` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_office`
--

INSERT INTO `branch_office` (`id`, `store_id`, `store_owner_id`, `branch_name`, `date_created`, `time`, `address`, `email`, `phone`) VALUES
(16, 113, 7, 'Sukor', '2022-01-11', '1641884172', '', '', ''),
(15, 106, 2, 'Apokor', '2022-01-09', '1641697298', '', '', ''),
(14, 105, 2, 'Indoomie Noodles', '2022-01-08', '1641672711', '', '', ''),
(13, 104, 1, 'Edo Branch', '2022-01-07', '1641540904', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers_tbl`
--

CREATE TABLE `customers_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `branch_store_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_tbl`
--

INSERT INTO `customers_tbl` (`id`, `name`, `email`, `phone`, `date_created`, `time`, `store_id`, `store_owner_id`, `store_name`, `branch_store_id`, `branch_store_name`) VALUES
(55, 'douglas', '22@21', '121212', '2022-01-10', '1641769543', 105, 2, 'Noodles', 14, 'Indoomie Noodles'),
(40, 'Endurance Zionnite', 'zionnite555@gmail.com', '2054659438', '2021-12-23', '1640275051', 101, 1, 'zion store', 8, 'Delta Branch'),
(37, 'Endurance Nosakhare', 'zionnite555@gmail.com', '2054659438', '2021-12-23', '1640248412', 101, 1, 'Mental Clinics', 4, 'dfd adfd');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tbl`
--

CREATE TABLE `invoice_tbl` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `invoice_number` varchar(55) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL,
  `store_owner_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_tbl`
--

INSERT INTO `invoice_tbl` (`id`, `store_id`, `branch_id`, `invoice_number`, `date_created`, `time`, `store_owner_id`) VALUES
(2, 8, 8, 'etMXohiR28', '2021-12-28 16:06:31pm', '1640703991', ''),
(3, 8, 8, 'FbkBVcG828', '2021-12-28 16:07:46pm', '1640704066', ''),
(24, 105, 14, 'kPsueYZI09', '2022-01-09 23:56:32pm', '1641768992', ''),
(25, 105, 14, 'B9zsowR409', '2022-01-09 23:56:39pm', '1641768999', ''),
(20, 101, 8, 'QwYmnPA804', '2022-01-04 07:49:20am', '1641278960', ''),
(23, 105, 14, 'wZy8xUW309', '2022-01-09 23:56:29pm', '1641768989', ''),
(22, 105, 14, '1VFjuflI09', '2022-01-09 03:39:04am', '1641695944', ''),
(19, 101, 8, 'z1yVlXOm04', '2022-01-04 07:49:06am', '1641278946', ''),
(26, 105, 14, 'XSfdJwzx09', '2022-01-09 23:57:13pm', '1641769033', ''),
(27, 105, 14, 'Cmk8I5bB09', '2022-01-09 23:57:49pm', '1641769069', ''),
(28, 105, 14, '9H6xkapL09', '2022-01-09 23:58:18pm', '1641769098', ''),
(29, 105, 14, 'OgNbAoVj09', '2022-01-09 23:59:57pm', '1641769197', ''),
(30, 105, 14, '8shHUOAW10', '2022-01-10 00:01:13am', '1641769273', ''),
(31, 105, 14, '2UEW5wPM10', '2022-01-10 00:01:14am', '1641769274', ''),
(32, 105, 14, 'swLSOXE610', '2022-01-10 00:01:32am', '1641769292', ''),
(33, 105, 14, 'jasSeWy310', '2022-01-10 00:01:35am', '1641769295', ''),
(34, 105, 14, 'PmyBHa9T10', '2022-01-10 00:01:35am', '1641769295', ''),
(35, 105, 14, 'wkMUybT710', '2022-01-10 00:01:48am', '1641769308', ''),
(36, 105, 14, 'HJlaykzR10', '2022-01-10 00:06:32am', '1641769592', ''),
(37, 105, 14, 'uV0NrMFd10', '2022-01-10 00:06:38am', '1641769598', ''),
(38, 105, 14, 'Es6J4Tr510', '2022-01-10 00:07:44am', '1641769664', ''),
(39, 105, 14, 'P7fHArRi10', '2022-01-10 00:08:18am', '1641769698', ''),
(40, 105, 14, 'gkTmuriE10', '2022-01-10 00:08:46am', '1641769726', ''),
(41, 105, 14, 'TCoaVJ5f10', '2022-01-10 00:09:29am', '1641769769', ''),
(42, 105, 14, 'c5aqZdGF10', '2022-01-10 00:09:46am', '1641769786', ''),
(43, 105, 14, 'cB2A80ed10', '2022-01-10 00:09:47am', '1641769787', ''),
(44, 105, 14, '1fXwmhsO10', '2022-01-10 00:09:48am', '1641769788', ''),
(45, 105, 14, 'FmwJsT6310', '2022-01-10 00:09:49am', '1641769789', ''),
(46, 105, 14, 'M4wx0vsC10', '2022-01-10 00:11:57am', '1641769917', ''),
(47, 105, 14, 'HpoY9Dly10', '2022-01-10 00:11:58am', '1641769918', ''),
(48, 105, 14, 'xHwSEZ0310', '2022-01-10 00:11:58am', '1641769918', ''),
(49, 105, 14, 'HtFWI8m010', '2022-01-10 00:11:58am', '1641769918', ''),
(50, 105, 14, 'VpRIbi1t10', '2022-01-10 00:11:59am', '1641769919', ''),
(51, 105, 14, '02PDjoxb10', '2022-01-10 00:11:59am', '1641769919', ''),
(52, 105, 14, 'VRs7AL9B10', '2022-01-10 00:11:59am', '1641769919', ''),
(53, 105, 14, 'bcAgJMwy10', '2022-01-10 00:12:00am', '1641769920', ''),
(54, 105, 14, 'CsiOgPnM10', '2022-01-10 00:12:00am', '1641769920', ''),
(55, 105, 14, 'Dn9EJP3O10', '2022-01-10 00:12:00am', '1641769920', ''),
(56, 105, 14, 'A4sVEzTx10', '2022-01-10 00:12:00am', '1641769920', ''),
(57, 105, 14, '9uUpgzvY10', '2022-01-10 00:15:30am', '1641770130', ''),
(58, 105, 14, 'oEvCRfdx10', '2022-01-10 00:15:31am', '1641770131', ''),
(59, 105, 14, 'xQuq1MY310', '2022-01-10 00:15:31am', '1641770131', ''),
(60, 105, 14, 'WVXp9Lc010', '2022-01-10 00:15:32am', '1641770132', ''),
(61, 105, 14, 'ZwoBnghW10', '2022-01-10 00:16:41am', '1641770201', ''),
(62, 105, 14, 'QEHduxRf10', '2022-01-10 00:16:42am', '1641770202', ''),
(63, 105, 14, 'xIqOatuQ10', '2022-01-10 00:16:42am', '1641770202', ''),
(64, 105, 14, 'T6awO24R10', '2022-01-10 00:16:59am', '1641770219', ''),
(65, 105, 14, '1bOIwReh10', '2022-01-10 00:19:34am', '1641770374', ''),
(66, 105, 14, 'f1NWIzcQ10', '2022-01-10 00:19:38am', '1641770378', ''),
(67, 105, 14, '6zxePKro10', '2022-01-10 00:19:39am', '1641770379', ''),
(68, 105, 14, 'Hg71BISY10', '2022-01-10 00:19:39am', '1641770379', ''),
(69, 105, 14, 'VgfM7Q3J10', '2022-01-10 00:19:39am', '1641770379', ''),
(70, 105, 14, 'QanlNheo10', '2022-01-10 00:19:53am', '1641770393', ''),
(71, 105, 14, '82JF09wv10', '2022-01-10 00:19:54am', '1641770394', ''),
(72, 105, 14, 'dq92FA6010', '2022-01-10 00:20:20am', '1641770420', ''),
(73, 105, 14, 'irebUuVt10', '2022-01-10 00:20:21am', '1641770421', ''),
(74, 105, 14, 'W21COcVo10', '2022-01-10 00:20:22am', '1641770422', ''),
(75, 105, 14, 'SOBdm3FC10', '2022-01-10 00:23:53am', '1641770633', ''),
(76, 105, 14, 'beiTuIfD10', '2022-01-10 00:23:54am', '1641770634', ''),
(77, 105, 14, 'tBk5O6aA10', '2022-01-10 00:31:25am', '1641771085', ''),
(78, 105, 14, '8ESelqz610', '2022-01-10 00:31:26am', '1641771086', ''),
(79, 105, 14, 'B06OJjQL10', '2022-01-10 00:31:26am', '1641771086', ''),
(80, 105, 14, '4al2enzK10', '2022-01-10 00:31:44am', '1641771104', ''),
(81, 105, 14, 'OidJAa8S10', '2022-01-10 00:31:45am', '1641771105', ''),
(82, 105, 14, 'FdMyBKvh10', '2022-01-10 00:31:46am', '1641771106', ''),
(83, 105, 14, 'ErsISaVP10', '2022-01-10 00:31:46am', '1641771106', ''),
(84, 105, 14, 'T1DVlmdo10', '2022-01-10 00:31:46am', '1641771106', ''),
(85, 105, 14, '29qUywc110', '2022-01-10 00:31:46am', '1641771106', ''),
(86, 105, 14, 'Nfqim0M310', '2022-01-10 00:33:39am', '1641771219', ''),
(87, 105, 14, '51aTONPX10', '2022-01-10 00:33:40am', '1641771220', ''),
(88, 105, 14, '6cksoX8V10', '2022-01-10 00:33:40am', '1641771220', ''),
(89, 105, 14, '9iDRkdyP10', '2022-01-10 00:33:41am', '1641771221', ''),
(90, 105, 14, 'JFpcUnrX10', '2022-01-10 00:33:41am', '1641771221', ''),
(91, 105, 14, 'Xj0w5nh310', '2022-01-10 00:33:42am', '1641771222', ''),
(92, 105, 14, 'PYXhVkTI10', '2022-01-10 00:33:42am', '1641771222', ''),
(93, 105, 14, 'XL6BvRCi10', '2022-01-10 00:33:42am', '1641771222', ''),
(94, 105, 14, '9G1EDVuY10', '2022-01-10 00:33:42am', '1641771222', ''),
(95, 105, 14, 'RnaDMrq910', '2022-01-10 00:33:43am', '1641771223', ''),
(96, 105, 14, 'sZeG9yjf10', '2022-01-10 00:33:43am', '1641771223', ''),
(97, 105, 14, 'eB7iljCF10', '2022-01-10 00:33:43am', '1641771223', ''),
(98, 105, 14, '71oJSht210', '2022-01-10 00:33:43am', '1641771223', ''),
(99, 105, 14, 'Io2fSH0310', '2022-01-10 00:33:44am', '1641771224', ''),
(100, 105, 14, '9Cwt2NLY10', '2022-01-10 00:37:11am', '1641771431', ''),
(101, 105, 14, 'TZycC2OP10', '2022-01-10 00:37:12am', '1641771432', ''),
(102, 105, 14, 'W3Bp5oZt10', '2022-01-10 00:37:12am', '1641771432', ''),
(103, 105, 14, '53y0hemu10', '2022-01-10 00:37:26am', '1641771446', ''),
(104, 105, 14, '7tjIAgKe10', '2022-01-10 00:37:27am', '1641771447', ''),
(105, 105, 14, 'hO5tZRf110', '2022-01-10 00:41:03am', '1641771663', ''),
(106, 105, 14, 'aOitENMc10', '2022-01-10 00:41:04am', '1641771664', ''),
(107, 105, 14, 'KtGkmB1010', '2022-01-10 00:41:04am', '1641771664', ''),
(108, 105, 14, 'GJN5nZmK10', '2022-01-10 00:41:04am', '1641771664', ''),
(109, 105, 14, 'fFxGNjPS10', '2022-01-10 00:41:05am', '1641771665', ''),
(110, 105, 14, '1ZzsBtLh10', '2022-01-10 00:41:31am', '1641771691', ''),
(111, 105, 14, 'ruaokSyb10', '2022-01-10 00:41:32am', '1641771692', ''),
(112, 105, 14, 'qKZdwR2B10', '2022-01-10 00:41:33am', '1641771693', ''),
(113, 105, 14, 'MZzcIH0r10', '2022-01-10 00:41:33am', '1641771693', ''),
(114, 105, 14, 'Kina8B7I10', '2022-01-10 00:41:33am', '1641771693', ''),
(115, 105, 14, 'TqBcpXfh10', '2022-01-10 00:41:33am', '1641771693', ''),
(116, 105, 14, 'JAZvBSyR10', '2022-01-10 00:41:33am', '1641771693', ''),
(117, 105, 14, 'RSunf7Um10', '2022-01-10 00:41:34am', '1641771694', ''),
(118, 105, 14, 'tEuAmoOI10', '2022-01-10 00:42:00am', '1641771720', ''),
(119, 105, 14, 'Gc8qpmxH10', '2022-01-10 00:42:01am', '1641771721', ''),
(120, 105, 14, 'WOI06don10', '2022-01-10 00:42:01am', '1641771721', ''),
(121, 105, 14, 'SnV2v0ql10', '2022-01-10 00:42:01am', '1641771721', ''),
(122, 105, 14, 'i9Q4TmM510', '2022-01-10 00:42:28am', '1641771748', ''),
(123, 105, 14, '6JDfaCHu10', '2022-01-10 00:42:29am', '1641771749', ''),
(124, 105, 14, 'Qbph3mJd10', '2022-01-10 00:42:30am', '1641771750', ''),
(125, 105, 14, 'NwyARPLT10', '2022-01-10 00:42:30am', '1641771750', ''),
(126, 105, 14, 'Rtci1UDb10', '2022-01-10 00:42:30am', '1641771750', ''),
(127, 105, 14, 'nkp0w4BJ10', '2022-01-10 00:42:30am', '1641771750', ''),
(128, 105, 14, '6bHYAvO810', '2022-01-10 00:42:31am', '1641771751', ''),
(129, 105, 14, '7gJpusG110', '2022-01-10 00:42:31am', '1641771751', ''),
(130, 105, 14, 'av03HKLx10', '2022-01-10 00:42:31am', '1641771751', ''),
(131, 105, 14, 'Sc2UhxA910', '2022-01-10 00:42:31am', '1641771751', ''),
(132, 105, 14, 'qfwIRQHu10', '2022-01-10 00:42:32am', '1641771752', ''),
(133, 105, 14, 'Qcu67J9i10', '2022-01-10 01:12:42am', '1641773562', ''),
(134, 105, 14, 'Nf5EgcjX10', '2022-01-10 01:13:39am', '1641773619', ''),
(135, 105, 14, 'QxTzY5pk10', '2022-01-10 01:14:10am', '1641773650', ''),
(136, 105, 14, 'XKg9kI7h10', '2022-01-10 01:14:51am', '1641773691', ''),
(137, 105, 14, 'BYAmEWu510', '2022-01-10 01:16:20am', '1641773780', ''),
(138, 105, 14, 'p2fUCm3H10', '2022-01-10 01:16:21am', '1641773781', ''),
(139, 105, 14, 'xWdzPGc810', '2022-01-10 01:16:33am', '1641773793', ''),
(140, 105, 14, 'Wpb1V4zI10', '2022-01-10 01:16:45am', '1641773805', ''),
(141, 105, 14, 'F7Dl4zhZ10', '2022-01-10 01:16:46am', '1641773806', ''),
(142, 105, 14, 'xph4Bf7H10', '2022-01-10 01:16:46am', '1641773806', ''),
(143, 105, 14, 'yJjUmPYA10', '2022-01-10 01:17:23am', '1641773843', ''),
(144, 105, 14, 'Gxkjc9DY10', '2022-01-10 01:18:25am', '1641773905', ''),
(145, 105, 14, '1V9zgwXB10', '2022-01-10 01:18:51am', '1641773931', ''),
(146, 105, 14, 'cvrGEROe10', '2022-01-10 01:18:52am', '1641773932', ''),
(147, 105, 14, '9ibge36h10', '2022-01-10 01:18:52am', '1641773932', ''),
(148, 105, 14, 'm9s3Xzj510', '2022-01-10 01:18:53am', '1641773933', ''),
(149, 105, 14, 'DvxhaXN710', '2022-01-10 01:18:53am', '1641773933', ''),
(150, 105, 14, 'u7TA8SlF10', '2022-01-10 01:19:23am', '1641773963', ''),
(151, 105, 14, 'KxQ0wq9h10', '2022-01-10 01:20:29am', '1641774029', ''),
(152, 105, 14, 'JH9bKLDa10', '2022-01-10 01:20:56am', '1641774056', ''),
(153, 105, 14, 'qF8NWZwT10', '2022-01-10 01:21:10am', '1641774070', ''),
(154, 105, 14, 'EHWc9GNw10', '2022-01-10 01:22:11am', '1641774131', ''),
(155, 105, 14, 'K7AB04js10', '2022-01-10 01:22:13am', '1641774133', ''),
(156, 105, 14, 'dgZOtxjk10', '2022-01-10 01:22:15am', '1641774135', ''),
(157, 105, 14, 'ODN3njMV10', '2022-01-10 01:22:15am', '1641774135', ''),
(158, 105, 14, 'LVuwdC9Y10', '2022-01-10 01:22:17am', '1641774137', ''),
(159, 105, 14, 'keLY4qdA10', '2022-01-10 01:22:17am', '1641774137', ''),
(160, 105, 14, 'm1zFXnpj10', '2022-01-10 01:22:17am', '1641774137', ''),
(161, 105, 14, 'rhOAX86N10', '2022-01-10 01:22:18am', '1641774138', ''),
(162, 105, 14, 'fmPYpn3W10', '2022-01-10 01:22:18am', '1641774138', ''),
(163, 105, 14, 'Qf4yVkJP10', '2022-01-10 01:22:18am', '1641774138', ''),
(164, 105, 14, 'Wez9EB2w10', '2022-01-10 01:22:18am', '1641774138', ''),
(165, 105, 14, 'awFW3m9v10', '2022-01-10 01:22:18am', '1641774138', ''),
(166, 105, 14, 'AgikUGYV10', '2022-01-10 01:22:19am', '1641774139', ''),
(167, 105, 14, 'fG8JjU9310', '2022-01-10 01:22:19am', '1641774139', ''),
(168, 105, 14, 'glExZP6t10', '2022-01-10 01:22:57am', '1641774177', ''),
(169, 105, 14, '9A54qItx10', '2022-01-10 01:22:58am', '1641774178', ''),
(170, 105, 14, 'ARKpFyDt10', '2022-01-10 01:22:58am', '1641774178', ''),
(171, 105, 14, 'PfE75Kx310', '2022-01-10 01:22:59am', '1641774179', ''),
(172, 105, 14, 'PlrpHKBx10', '2022-01-10 01:22:59am', '1641774179', ''),
(173, 105, 14, '73tW6DIh10', '2022-01-10 01:22:59am', '1641774179', ''),
(174, 105, 14, 'R6p3QtCn10', '2022-01-10 01:23:20am', '1641774200', ''),
(175, 105, 14, 'vxprgXY910', '2022-01-10 01:23:20am', '1641774200', ''),
(176, 105, 14, 'dBQ9DART10', '2022-01-10 01:24:07am', '1641774247', ''),
(177, 105, 14, 'CWZjRfhF10', '2022-01-10 01:25:32am', '1641774332', ''),
(178, 105, 14, '3f8x6sDo10', '2022-01-10 01:30:58am', '1641774658', ''),
(179, 105, 14, 'wZTJ5mAB10', '2022-01-10 01:31:02am', '1641774662', ''),
(180, 105, 14, 'yhUz5er610', '2022-01-10 01:31:10am', '1641774670', ''),
(181, 105, 14, 'gxMdC28l10', '2022-01-10 01:31:12am', '1641774672', ''),
(182, 105, 14, 'XMzAanOI10', '2022-01-10 01:31:12am', '1641774672', ''),
(183, 105, 14, 'to4wXsLn10', '2022-01-10 01:31:13am', '1641774673', ''),
(184, 105, 14, 'zMHoUauB10', '2022-01-10 01:31:13am', '1641774673', ''),
(185, 105, 14, 'uU93TYpD10', '2022-01-10 01:31:14am', '1641774674', ''),
(186, 105, 14, 'vd5TkUCH10', '2022-01-10 01:39:00am', '1641775140', ''),
(187, 105, 14, 'mZ7swV0J10', '2022-01-10 01:40:02am', '1641775202', ''),
(188, 105, 14, 'irbUEKed10', '2022-01-10 01:40:45am', '1641775245', ''),
(189, 105, 14, 'Q7aW0mBg10', '2022-01-10 01:41:04am', '1641775264', ''),
(190, 105, 14, 'tDiO9TsV10', '2022-01-10 01:42:46am', '1641775366', ''),
(191, 105, 14, 'XiRKzSGy10', '2022-01-10 01:42:47am', '1641775367', ''),
(192, 105, 14, 'V01TzQql10', '2022-01-10 01:42:58am', '1641775378', ''),
(193, 105, 14, 'QJURnCIP10', '2022-01-10 01:42:59am', '1641775379', ''),
(194, 105, 14, 'Nb2OFDVT10', '2022-01-10 01:43:00am', '1641775380', ''),
(195, 105, 14, 'tQcy72gf10', '2022-01-10 01:43:00am', '1641775380', ''),
(196, 105, 14, 'PNvErQ5j10', '2022-01-10 01:43:00am', '1641775380', ''),
(197, 105, 14, 'gaizGNXO10', '2022-01-10 01:43:00am', '1641775380', ''),
(198, 105, 14, '7lXaJsVC10', '2022-01-10 01:43:00am', '1641775380', ''),
(199, 105, 14, '0UuXTlt510', '2022-01-10 01:43:01am', '1641775381', ''),
(200, 105, 14, 'jbm3u49Y10', '2022-01-10 01:43:01am', '1641775381', ''),
(201, 105, 14, 'N30doiKn10', '2022-01-10 01:43:01am', '1641775381', ''),
(202, 105, 14, 'FnGYXpEv10', '2022-01-10 01:43:01am', '1641775381', ''),
(203, 105, 14, '5B3ikmLC10', '2022-01-10 01:43:11am', '1641775391', ''),
(204, 105, 14, 'dgBup5RA10', '2022-01-10 01:43:12am', '1641775392', ''),
(205, 105, 14, 'Qt3Pdvhe10', '2022-01-10 01:43:13am', '1641775393', ''),
(206, 105, 14, 'ovYBbew110', '2022-01-10 01:43:13am', '1641775393', ''),
(207, 105, 14, 'wUlEz3ce10', '2022-01-10 01:43:14am', '1641775394', ''),
(208, 105, 14, 'vd3wQyFN10', '2022-01-10 01:43:14am', '1641775394', ''),
(209, 105, 14, 'ArM8aU0610', '2022-01-10 01:43:15am', '1641775395', ''),
(210, 105, 14, 'RPrI8dLF10', '2022-01-10 01:43:15am', '1641775395', ''),
(211, 105, 14, 'w2gPrYZk10', '2022-01-10 01:43:16am', '1641775396', ''),
(212, 105, 14, 'JnLQTkGS10', '2022-01-10 01:43:16am', '1641775396', ''),
(213, 105, 14, 'xd0HzfrI10', '2022-01-10 01:43:16am', '1641775396', ''),
(214, 105, 14, 'JHZUDEwc10', '2022-01-10 01:43:17am', '1641775397', ''),
(215, 105, 14, 'XwksB0ZV10', '2022-01-10 01:43:17am', '1641775397', ''),
(216, 105, 14, '2pBj4wMn10', '2022-01-10 01:44:31am', '1641775471', ''),
(217, 105, 14, 'lQS62CiU10', '2022-01-10 01:45:08am', '1641775508', ''),
(218, 105, 14, 'akFTHJC310', '2022-01-10 01:45:10am', '1641775510', ''),
(219, 105, 14, 'g0rhHsRB10', '2022-01-10 01:45:11am', '1641775511', ''),
(220, 105, 14, '9D5toeM610', '2022-01-10 01:45:11am', '1641775511', ''),
(221, 105, 14, 'mduQeM4V10', '2022-01-10 01:45:11am', '1641775511', ''),
(222, 105, 14, 'b3ZjnaKA10', '2022-01-10 01:45:11am', '1641775511', ''),
(223, 105, 14, 'UKtGQxR410', '2022-01-10 01:45:12am', '1641775512', ''),
(224, 105, 14, 'zAcVSnGm10', '2022-01-10 01:45:12am', '1641775512', ''),
(225, 105, 14, 'D4kbpoAh10', '2022-01-10 01:46:35am', '1641775595', ''),
(226, 105, 14, 'LX2rdEwK10', '2022-01-10 01:48:22am', '1641775702', ''),
(227, 105, 14, 'a2v745xE10', '2022-01-10 01:48:27am', '1641775707', ''),
(228, 105, 14, 'xQbmvWVk10', '2022-01-10 01:48:37am', '1641775717', ''),
(229, 105, 8, 'invo232', '2022-01-10 01:54:48am', '1641776088', ''),
(230, 105, 14, 'U3LXaDKO10', '2022-01-10 01:58:29am', '1641776309', ''),
(231, 105, 14, 't2rBlRAi10', '2022-01-10 01:58:30am', '1641776310', ''),
(232, 105, 14, 'wzFPyRLG10', '2022-01-10 01:58:30am', '1641776310', ''),
(233, 105, 14, 'bsPk0Ltv10', '2022-01-10 01:58:31am', '1641776311', ''),
(234, 105, 14, '6MXFEYNa10', '2022-01-10 01:58:31am', '1641776311', ''),
(235, 105, 14, 'cU9PJCH610', '2022-01-10 01:58:31am', '1641776311', ''),
(236, 105, 14, 'Dsf4AJpR10', '2022-01-10 01:58:58am', '1641776338', ''),
(237, 105, 14, 's3VDOMAS10', '2022-01-10 01:58:59am', '1641776339', ''),
(238, 105, 14, 'YvAg8Gsh10', '2022-01-10 01:58:59am', '1641776339', ''),
(239, 105, 14, 'LczCOo9410', '2022-01-10 01:59:00am', '1641776340', ''),
(240, 105, 14, 'MWrgVjoP10', '2022-01-10 01:59:00am', '1641776340', ''),
(241, 105, 14, '7kiqp5Ft10', '2022-01-10 01:59:00am', '1641776340', ''),
(242, 105, 14, '17n4hgWP10', '2022-01-10 01:59:00am', '1641776340', ''),
(243, 105, 14, 'I36YfJRs10', '2022-01-10 01:59:20am', '1641776360', ''),
(244, 105, 14, 'UoSWIp3010', '2022-01-10 01:59:21am', '1641776361', ''),
(245, 105, 14, 'qL3nBhG710', '2022-01-10 02:05:14am', '1641776714', ''),
(246, 105, 14, 'E5FBn3qX10', '2022-01-10 02:16:31am', '1641777391', ''),
(247, 105, 14, 'd7UY9OgZ10', '2022-01-10 02:16:57am', '1641777417', ''),
(248, 105, 14, 'RIm9DQGb10', '2022-01-10 02:18:46am', '1641777526', ''),
(249, 105, 14, '6XyiBdvk11', '2022-01-11 14:32:31pm', '1641907951', '2');

-- --------------------------------------------------------

--
-- Table structure for table `my_plan`
--

CREATE TABLE `my_plan` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date_created` varchar(155) NOT NULL,
  `time` varchar(155) NOT NULL,
  `ref` text NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_plan`
--

INSERT INTO `my_plan` (`id`, `plan_id`, `user_id`, `status`, `date_created`, `time`, `ref`, `trans_id`, `amount`) VALUES
(1, 1, 1, 'active', '', '', '', '', ''),
(6, 1, 7, 'active', '2022-01-10 10:06:27am', '1641805587', '1641805319', '562817856', '1');

-- --------------------------------------------------------

--
-- Table structure for table `office_store`
--

CREATE TABLE `office_store` (
  `id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `store_owner_user_name` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_name_2` varchar(255) NOT NULL,
  `store_img` varchar(255) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_store`
--

INSERT INTO `office_store` (`id`, `store_owner_id`, `store_owner_user_name`, `store_name`, `store_name_2`, `store_img`, `date_created`, `time`) VALUES
(104, 1, 'zionnite', 'wizy Amunition', 'wizy_Amunition', '5e5a89f3607d1262adc96c2361aaca87.png', '2022-01-07', '1641540884'),
(105, 2, 'ken', 'Noodles', 'Noodles', '2b689445a11f73b8dadfcdd3f06a6736.jpg', '2022-01-08', '1641672695'),
(106, 2, 'ken', 'Pepper Gang', 'Pepper_Gang', '3ff092723ddcef9109aae1c8ddd334ac.JPG', '2022-01-09', '1641697278'),
(113, 7, 'love', 'Deney', 'Deney', '645ea28437a80e5eb78441f4a63d6b60.JPG', '2022-01-11', '1641884099');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `public_live_key` varchar(255) NOT NULL,
  `private_live_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `public_live_key`, `private_live_key`) VALUES
(9, 'dfdfd', 'aaad');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `store_num` varchar(155) NOT NULL,
  `amount` varchar(155) NOT NULL,
  `store_desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `title`, `store_num`, `amount`, `store_desc`) VALUES
(6, 'Basic', '2', '10000', ''),
(2, 'Gold', '4', '4000', 'You can create only 4 store'),
(3, 'Diamond', '6', '10000', 'you can create six store'),
(4, 'Premium Gold', '14', '500000', 'You can create only 14 store');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `cat_name`, `store_id`, `branch_store_id`, `store_owner_id`) VALUES
(6, 'China', 105, 14, 2),
(5, 'Fashion', 104, 13, 1),
(3, 'War Head', 104, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`id`, `sub_cat_name`, `cat_id`, `store_id`, `branch_store_id`, `store_owner_id`) VALUES
(1, 'Male Fashion', 1, 101, 8, 1),
(2, 'Female Fasion', 1, 101, 8, 1),
(3, 'Male Fashion', 2, 101, 8, 0),
(4, 'Male', 2, 101, 8, 0),
(7, 'Women Fashion', 5, 104, 13, 1),
(6, 'Machine Gun', 3, 104, 13, 1),
(8, 'Male Fashion', 5, 104, 13, 1),
(9, 'small', 6, 105, 14, 2),
(10, 'Mega', 6, 105, 14, 2),
(11, 'Big Mega', 6, 105, 14, 2),
(14, 'Nosakhare Atekha', 8, 105, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `prod_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `prod_name` text NOT NULL,
  `prod_size` varchar(155) NOT NULL,
  `prod_bunk` varchar(155) NOT NULL,
  `prod_cat` varchar(155) NOT NULL,
  `prod_sub_cat` varchar(155) NOT NULL,
  `prod_color` varchar(155) NOT NULL,
  `prod_supplier` varchar(155) NOT NULL,
  `prod_brand` varchar(155) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_cost` varchar(155) NOT NULL,
  `prod_price` varchar(155) NOT NULL,
  `prod_whole` varchar(155) NOT NULL,
  `currency` varchar(55) NOT NULL DEFAULT '&#8358;',
  `prod_weight` varchar(155) NOT NULL,
  `prod_discount` varchar(155) NOT NULL,
  `prod_image` varchar(155) NOT NULL,
  `meta_title` varchar(155) NOT NULL,
  `meta_key` longtext NOT NULL,
  `meta_desc` text NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_id`, `store_id`, `store_name`, `branch_id`, `branch_name`, `store_owner_id`, `prod_name`, `prod_size`, `prod_bunk`, `prod_cat`, `prod_sub_cat`, `prod_color`, `prod_supplier`, `prod_brand`, `prod_desc`, `prod_cost`, `prod_price`, `prod_whole`, `currency`, `prod_weight`, `prod_discount`, `prod_image`, `meta_title`, `meta_key`, `meta_desc`, `date_created`, `time`) VALUES
(5, 101, 'Mental Clinics', 8, 'Edo Branch', 1, 'Zora', 'S,M, L, XXL, XXXL', '-319404', '1', '1', 'red,green,yellow', 'This store does not have a Supplier Yet!', '', 'Hello Summernote\r\n													', '11', '1', '2', '&#8358;', '0', '0', 'b3f1c8ff99b54b8bc4037a3c6d56f396.png', 'kidney pro', 'kidney,pro', 'kidney,pro', '2021-12-25', '1640442620'),
(6, 101, '1', 8, 'e', 1, 'this product name', 'm,l', '-319261', '1', '2', 'green', 'az', 'd', 'd', '12', '5', '', '&#8358;', '1', '0', '344546654', 'this', 'dd', '', '', ''),
(7, 105, 'Noodles', 14, 'Indoomie Noodles', 2, 'ee', 'S,M, L, XXL, XXXL', '85', '6', '6', 'red,green', '62', '', 'Hello Summernote\r\n													', '13', '32', '23', '&#8358;', '32', '1', '91f53d1b7223d2830e32a15e0de4dcb1.jpg', 'e', 's', 's', '2022-01-09', '1641691635'),
(8, 105, 'Noodles', 14, 'Indoomie Noodles', 2, 'qq', 'S,M, L, XXL, XXXL', '15', '6', '6', 'red,green', '63', '', 'Hello Summernote\r\n													', '323', '3533', '566', '&#8358;', '22', '222', '546ecc74e5a202a1405aa30c1f4353d1.JPG', '23', 'qqq', 'qqq', '2022-01-09', '1641692824');

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep`
--

CREATE TABLE `sales_rep` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `branch_store_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL,
  `phone_no` varchar(155) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_rep`
--

INSERT INTO `sales_rep` (`id`, `store_id`, `store_owner_id`, `store_name`, `branch_store_id`, `branch_store_name`, `name`, `email`, `password`, `phone_no`, `date_created`, `time`) VALUES
(7, 105, 2, 'Noodles', 14, 'Indoomie Noodles', 'biga', 'big@gi.com', '827ccb0eea8a706c4c34a16891f84e7b', '12432', '2022-01-08', '1641672803');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_phone` varchar(155) NOT NULL,
  `site_logo` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_name`, `site_email`, `site_phone`, `site_logo`) VALUES
(2, 'All Coins', 'zionnite555@gmail.com', '+2349034286339', '555fffe72d1da57e863d601a28e5c1dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_owner`
--

CREATE TABLE `store_owner` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_owner`
--

INSERT INTO `store_owner` (`id`, `user_name`, `email`, `password`, `phone`, `full_name`) VALUES
(1, 'zionnite', 'zionnite555@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2948242', ''),
(2, 'ken', 'email@email.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234343', ''),
(7, 'love', 'love@l.com', '827ccb0eea8a706c4c34a16891f84e7b', '133', 'James Jubittter');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `branch_store_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `store_id`, `store_owner_id`, `store_name`, `branch_store_id`, `branch_store_name`, `name`, `email`, `password`, `phone_no`, `date_created`, `time`) VALUES
(7, 106, 2, 'Pepper Gang', 15, 'Apokor', 'ap', 'ap@ap.com', '827ccb0eea8a706c4c34a16891f84e7b', '121111', '2022-01-09', '1641697329'),
(5, 104, 1, 'wizy Amunition', 13, 'Edo Branch', 'douglas', 'donddoug@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234566778990', '2022-01-07', '1641541238'),
(6, 105, 2, 'Noodles', 14, 'Indoomie Noodles', 'little', 'lite@lite.com', '00c66aaf5f2c3f49946f15c1ad2ea0d3', '12111', '2022-01-08', '1641672758');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_tbl`
--

CREATE TABLE `suppliers_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `date_created` varchar(55) NOT NULL,
  `time` varchar(55) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_owner_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `branch_store_id` int(11) NOT NULL,
  `branch_store_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers_tbl`
--

INSERT INTO `suppliers_tbl` (`id`, `name`, `email`, `phone`, `date_created`, `time`, `store_id`, `store_owner_id`, `store_name`, `branch_store_id`, `branch_store_name`) VALUES
(38, 'Endurance Nosakhare', 'zionnite555@gmail.com', '2054659438', '2021-12-23', '1640248440', 102, 1, 'zion store', 3, 'fdgvfgrf'),
(37, 'Endurance Nosakhare', 'zionnite555@gmail.com', '2054659438', '2021-12-23', '1640248412', 101, 1, 'Mental Clinics', 4, 'dfd adfd'),
(40, 'Kenneth', 'Ken@gma.cm', '122334987344', '2021-12-23', '1640275005', 101, 1, 'Mental Clinics', 4, 'dfd adfd'),
(41, 'Kenneth', 'Ken@gma.cm', '122334987344', '2021-12-23', '1640275006', 101, 1, 'Mental Clinics', 4, 'dfd adfd'),
(44, 'James', 'zionnite555@gmail.com', '09034286339', '2021-12-23', '1640275562', 102, 1, 'zion store', 5, 'Lagos Branch'),
(45, 'Koral', 'zionnite555@gmail.com', '08067543476', '2021-12-23', '1640275599', 101, 1, 'Mental Clinics', 7, 'Ibandan Branch'),
(46, 'Seth', 'as@d.com', '90323', '2021-12-23', '1640275757', 102, 1, 'zion store', 9, 'Delta Branch'),
(47, 'Sutton', 'agentjoons@gmail.com', '08067543476', '2021-12-23', '1640275806', 101, 1, 'Mental Clinics', 7, 'Ibandan Branch'),
(48, 'Endurance Nosakhare', 'zionnite555@gmail.com', '09034286339', '2021-12-23', '1640275856', 101, 1, 'Mental Clinics', 6, 'Lagos Branch'),
(49, 'Endurance Nosakhare', 'zionnite555@gmail.com', '09034286339', '2021-12-23', '1640275857', 101, 1, 'Mental Clinics', 6, 'Lagos Branch'),
(66, 'youruba woman', '12@eami.com', '123211', '2022-01-09', '1641697382', 106, 2, 'Pepper Gang', 15, 'Apokor'),
(67, 'douglas', '12@eami.com', '122322', '2022-01-09', '1641697557', 105, 2, 'Noodles', 14, 'Indoomie Noodles'),
(62, 'se', 'sam@gmail.com', '12231', '2022-01-09', '1641691469', 105, 2, 'Noodles', 14, 'Indoomie Noodles');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(55) NOT NULL,
  `size` varchar(55) NOT NULL,
  `sub_total` varchar(155) NOT NULL,
  `quantity` varchar(155) NOT NULL,
  `transaction_type` varchar(155) NOT NULL,
  `payment_method` varchar(155) NOT NULL,
  `optional_note` longtext NOT NULL,
  `status` varchar(155) NOT NULL,
  `customer_name` varchar(155) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_status` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` varchar(155) NOT NULL,
  `time` varchar(155) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `invoice` varchar(55) NOT NULL,
  `store_owner_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `prod_name`, `prod_id`, `price`, `color`, `size`, `sub_total`, `quantity`, `transaction_type`, `payment_method`, `optional_note`, `status`, `customer_name`, `customer_id`, `user_status`, `user_id`, `date_created`, `time`, `store_id`, `branch_id`, `invoice`, `store_owner_id`) VALUES
(1, 'Zora', 5, '1', 'red', 'S', '30', '30', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:47:24pm', '1640699244', 0, 0, '', ''),
(2, 'this product name', 6, '5', 'green', 'm', '100', '20', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:47:24pm', '1640699244', 0, 0, '', ''),
(3, 'Zora', 5, '1', 'red', 'S', '30', '30', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:48:56pm', '1640699336', 0, 0, '', ''),
(4, 'this product name', 6, '5', 'green', 'm', '100', '20', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:48:56pm', '1640699336', 0, 0, '', ''),
(5, 'Zora', 5, '1', 'red', 'S', '30', '30', 'installment', 'pos', 'nota taking', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:50:06pm', '1640699406', 0, 0, '', ''),
(6, 'this product name', 6, '5', 'green', 'm', '100', '20', 'installment', 'pos', 'nota taking', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:50:06pm', '1640699406', 0, 0, '', ''),
(7, 'Zora', 5, '1', 'red', 'S', '30', '30', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:51:58pm', '1640699518', 0, 0, '', ''),
(8, 'this product name', 6, '5', 'green', 'm', '100', '20', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:51:58pm', '1640699518', 0, 0, '', ''),
(9, 'Zora', 5, '1', 'red', 'S', '30', '30', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:52:48pm', '1640699568', 0, 0, '', ''),
(10, 'this product name', 6, '5', 'green', 'm', '100', '20', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:52:48pm', '1640699568', 0, 0, '', ''),
(11, 'Zora', 5, '1', 'red', 'S', '30', '30', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:53:34pm', '1640699614', 0, 0, '', ''),
(12, 'this product name', 6, '5', 'green', 'm', '100', '20', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:53:34pm', '1640699614', 0, 0, '', ''),
(13, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 14:54:33pm', '1640699673', 0, 0, '', ''),
(14, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 15:05:39pm', '1640700339', 0, 0, '', ''),
(15, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 15:06:43pm', '1640700403', 0, 0, '', ''),
(16, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 15:06:43pm', '1640700403', 0, 0, '', ''),
(17, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:02:12pm', '1640703732', 8, 8, 'K9nibDOr28', ''),
(18, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:02:12pm', '1640703732', 8, 8, 'K9nibDOr28', ''),
(19, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:06:31pm', '1640703991', 8, 8, 'etMXohiR28', ''),
(20, 'this product name', 6, '5', 'red', 'S', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:06:31pm', '1640703991', 8, 8, 'etMXohiR28', ''),
(21, 'this product name', 6, '5', 'red', 'S', '280', '56', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:07:46pm', '1640704066', 8, 8, 'FbkBVcG828', ''),
(22, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:07:46pm', '1640704066', 8, 8, 'FbkBVcG828', ''),
(23, 'this product name', 6, '5', 'red', 'S', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:09:34pm', '1640704174', 0, 0, 'GDxImpiy28', ''),
(24, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:14:29pm', '1640704469', 101, 8, 'gYOB1nzF28', ''),
(25, 'this product name', 6, '5', 'red', 'S', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2021-12-28 16:14:29pm', '1640704469', 101, 8, 'gYOB1nzF28', ''),
(26, 'this product name', 6, '5', 'red', 'S', '400', '80', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-03 16:39:35pm', '1641224375', 101, 8, 'wG5lt6dz03', ''),
(27, 'Zora', 5, '1', 'red', 'S', '210', '210', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-03 16:39:35pm', '1641224375', 101, 8, 'wG5lt6dz03', ''),
(28, 'Zora', 5, '1', 'red', 'S', '319001', '319001', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:23:56am', '1641277436', 101, 8, 'idNTC0Bf04', ''),
(29, 'this product name', 6, '5', 'red', 'S', '1595000', '319000', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:23:56am', '1641277436', 101, 8, 'idNTC0Bf04', ''),
(30, 'this product name', 6, '5', 'red', 'S', '50', '10', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:32:27am', '1641277947', 101, 8, 'dTJ4R6i104', ''),
(31, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:32:27am', '1641277947', 101, 8, 'dTJ4R6i104', ''),
(32, 'Zora', 5, '1', 'yellow', ' XXL', '13', '13', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:34:38am', '1641278078', 101, 8, 'Lh8dUW9K04', ''),
(33, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:35:01am', '1641278101', 101, 8, '1CFW6zjg04', ''),
(34, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:36:27am', '1641278187', 101, 8, 's1yYfdmx04', ''),
(35, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:36:42am', '1641278202', 101, 8, 'YSBUJEx504', ''),
(36, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:37:03am', '1641278223', 101, 8, 'ElyLdfRV04', ''),
(37, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:38:32am', '1641278312', 101, 8, 'Vd7IWbJh04', ''),
(38, 'this product name', 6, '5', 'red', 'S', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:38:53am', '1641278333', 101, 8, 'Ye6kAwCs04', ''),
(39, 'this product name', 6, '5', 'green', 'm', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:39:06am', '1641278346', 101, 8, 'Zs8IXOwS04', ''),
(40, 'Zora', 5, '1', 'red', 'S', '1', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:40:16am', '1641278416', 101, 8, 'mYQc9KbB04', ''),
(41, 'this product name', 6, '5', 'red', 'S', '5', '1', 'deposit', 'cash', '', '', 'Endurance Zionnite', 40, 'sales_rep', 1, '2022-01-04 07:40:16am', '1641278416', 101, 8, 'mYQc9KbB04', ''),
(46, 'ee', 7, '32', 'red', 'S', '32', '1', 'deposit', 'cash', '', '', 'Endurance Nosakhare', 41, 'manager', 6, '2022-01-09 03:39:04am', '1641695944', 105, 14, '1VFjuflI09', '2'),
(47, 'qq', 8, '3533', 'red', 'S', '3533', '1', 'deposit', 'cash', '', '', 'Endurance Nosakhare', 41, 'manager', 6, '2022-01-09 03:39:04am', '1641695944', 105, 14, '1VFjuflI09', '2'),
(48, 'ee', 7, '32', 'red', 'S', '160', '5', 'deposit', 'cash', '', '', '0', 0, 'manager', 6, '2022-01-09 23:58:18pm', '1641769098', 105, 14, '9H6xkapL09', '2'),
(49, 'ee', 7, '32', 'red', 'S', '1728', '54', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:12:42am', '1641773562', 105, 14, 'Qcu67J9i10', '2'),
(50, 'ee', 7, '32', 'red', 'S', '32', '1', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:13:39am', '1641773619', 105, 14, 'Nf5EgcjX10', '2'),
(51, 'ee', 7, '32', 'red', 'S', '480', '15', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:14:10am', '1641773650', 105, 14, 'QxTzY5pk10', '2'),
(52, 'ee', 7, '32', 'red', 'S', '64', '2', 'deposit', 'pos', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:14:51am', '1641773691', 105, 14, 'XKg9kI7h10', '2'),
(53, 'ee', 7, '32', 'red', 'S', '192', '6', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:19:23am', '1641773963', 105, 14, 'u7TA8SlF10', '2'),
(54, 'ee', 7, '32', 'red', 'S', '32', '1', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:20:29am', '1641774029', 105, 14, 'KxQ0wq9h10', '2'),
(55, 'ee', 7, '32', 'red', 'S', '256', '8', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:24:07am', '1641774247', 105, 14, 'dBQ9DART10', '2'),
(56, 'ee', 7, '32', 'red', 'S', '32', '1', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-10 01:25:32am', '1641774332', 105, 14, 'CWZjRfhF10', '2'),
(57, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '$customer_name', 4, 'user_status', 1, '2022-01-10 01:52:42am', '1641775962', 105, 8, 'invo232', '2'),
(58, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '$customer_name', 4, 'user_status', 1, '2022-01-10 01:54:04am', '1641776044', 105, 8, 'invo232', '2'),
(59, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:54:48am', '1641776088', 105, 8, 'invo232', '2'),
(60, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:54:49am', '1641776089', 105, 8, 'invo232', '2'),
(61, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:54:50am', '1641776090', 105, 8, 'invo232', '2'),
(62, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:55:14am', '1641776114', 105, 8, 'invo232', '2'),
(63, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:57:47am', '1641776267', 105, 8, 'invo232', '2'),
(64, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:58:41am', '1641776321', 105, 8, 'invo232', '2'),
(65, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:58:58am', '1641776338', 105, 8, 'invo232', '2'),
(66, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:58:59am', '1641776339', 105, 8, 'invo232', '2'),
(67, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:58:59am', '1641776339', 105, 8, 'invo232', '2'),
(68, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:59:00am', '1641776340', 105, 8, 'invo232', '2'),
(69, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:59:00am', '1641776340', 105, 8, 'invo232', '2'),
(70, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:59:00am', '1641776340', 105, 8, 'invo232', '2'),
(71, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:59:00am', '1641776340', 105, 8, 'invo232', '2'),
(72, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 01:59:40am', '1641776380', 105, 8, 'invo232', '2'),
(73, 'keen', 1, '2', 'blue', 's', '22', '2', 'cash', 'post', '', '', '0', 4, 'user_status', 1, '2022-01-10 02:00:52am', '1641776452', 105, 8, 'invo232', '2'),
(74, 'ee', 7, '32', 'red', 'S', '384', '12', 'deposit', 'cash', '', '', 'douglas', 55, 'sales_rep', 7, '2022-01-10 02:16:31am', '1641777391', 105, 14, 'E5FBn3qX10', '2'),
(75, 'qq', 8, '3533', 'red', 'S', '56528', '16', 'deposit', 'cash', '', '', 'douglas', 55, 'sales_rep', 7, '2022-01-10 02:16:57am', '1641777417', 105, 14, 'd7UY9OgZ10', '2'),
(76, 'ee', 7, '32', 'red', 'S', '32', '1', 'installment', 'transfer', '', '', 'douglas', 55, 'sales_rep', 7, '2022-01-10 02:18:46am', '1641777526', 105, 14, 'RIm9DQGb10', '2'),
(77, 'ee', 7, '32', 'red', 'S', '32', '1', 'deposit', 'cash', '', '', 'douglas', 55, 'manager', 6, '2022-01-11 14:32:31pm', '1641907951', 105, 14, '6XyiBdvk11', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_office`
--
ALTER TABLE `branch_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_tbl`
--
ALTER TABLE `customers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_plan`
--
ALTER TABLE `my_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_store`
--
ALTER TABLE `office_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sales_rep`
--
ALTER TABLE `sales_rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_owner`
--
ALTER TABLE `store_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch_office`
--
ALTER TABLE `branch_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers_tbl`
--
ALTER TABLE `customers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `my_plan`
--
ALTER TABLE `my_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office_store`
--
ALTER TABLE `office_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_rep`
--
ALTER TABLE `sales_rep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_owner`
--
ALTER TABLE `store_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
