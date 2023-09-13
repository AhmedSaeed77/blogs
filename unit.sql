-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 11:26 AM
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
-- Database: `unit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'a@a.com', '$2y$10$.B9.eL4hoWnYrIQpo3ItMuInLCO2t/a4C/ia1cnsVXOU9a47T8V0m', NULL, 3, NULL, '2023-03-18 10:45:42'),
(4, 'Ahmed', 'a2@a.com', '$2y$10$.B9.eL4hoWnYrIQpo3ItMuInLCO2t/a4C/ia1cnsVXOU9a47T8V0m', NULL, 3, '2023-04-12 11:13:54', '2023-05-14 04:48:06'),
(5, 'asd', 'a4@a.com', '$2y$10$.B9.eL4hoWnYrIQpo3ItMuInLCO2t/a4C/ia1cnsVXOU9a47T8V0m', NULL, 5, '2023-05-03 06:31:26', '2023-05-14 04:49:19'),
(9, 'Ali', 'a12@a.com', '$2y$10$T8heYBaM0zQjn1zsFoXwfOi/wvNrzJuzRQMEDcW5f1CIFPjufXXJa', NULL, 3, '2023-05-24 11:12:43', '2023-05-24 11:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `amenitieprojects`
--

CREATE TABLE `amenitieprojects` (
  `id` int(11) NOT NULL,
  `amenitie_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenitieprojects`
--

INSERT INTO `amenitieprojects` (`id`, `amenitie_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 31, '2022-10-25 05:34:57', '2022-10-25 05:34:57'),
(2, 2, 31, '2022-10-25 05:34:57', '2022-10-25 05:34:57'),
(3, 1, 32, '2022-10-25 05:35:49', '2022-10-25 05:35:49'),
(4, 2, 32, '2022-10-25 05:35:49', '2022-10-25 05:35:49'),
(5, 1, 33, '2022-10-25 05:36:50', '2022-10-25 05:36:50'),
(6, 2, 33, '2022-10-25 05:36:50', '2022-10-25 05:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, ' Air Cond', 'اير كو', ' Air Cond', '2022-10-24 21:01:22', '2022-10-24 21:01:22'),
(2, 'Balcony', 'بلاك', 'Balcony', '2022-10-24 21:01:22', '2022-10-24 21:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Al Ghadeer ', 1, '2022-10-24 22:05:29', '2022-10-24 22:05:29'),
(2, 'Al Barsha 1', 2, '2022-10-24 22:05:29', '2022-10-24 22:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(7, 'blog1', 'blog description', '323965494_475047768151234_8568520129679171240_n.jpg', '2023-03-18 12:26:50', '2023-03-21 07:18:33'),
(8, 'blog 2', 'blog decription', '1679149649.jpg', '2023-03-18 12:27:29', '2023-03-18 12:27:29'),
(29, 'new ddd', 'asdasd', 'sYPSRVU2fCwhroBCi69jpogMpgWjm0zIaYuemP09.jpg', '2023-05-14 09:54:30', '2023-05-14 09:54:30'),
(30, 'Ahmed', 'hbhbhbhb', 'GdwCPU9PhSG0MMU29EHjmY2MTLp6YgiCG59HKFoL.jpg', '2023-05-14 09:55:45', '2023-05-14 09:55:45'),
(31, 'new asd', 'erdsvdf', 'ut0idmlztW1oYwbociGsxMoSc7s69HqAQ84rCB1z.jpg', '2023-05-14 09:57:57', '2023-05-14 09:57:57'),
(32, 'new ddd', 'asadaDSADS', '0vbJ1cvkDrFamO2F2gGHL1qBbVS4oDq53d4lmF9F.jpg', '2023-05-14 11:00:56', '2023-05-14 11:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `image`, `blog_id`, `created_at`, `updated_at`) VALUES
(34, 'download (1).png', 7, '2023-03-22 10:51:16', '2023-03-22 10:51:16'),
(37, 'cat.png', 8, '2023-03-22 10:54:32', '2023-03-22 10:54:32'),
(59, '323965494_475047768151234_8568520129679171240_n.jpg', 8, '2023-05-09 04:35:53', '2023-05-09 04:35:53'),
(69, '323965494_475047768151234_8568520129679171240_n.jpg', 7, '2023-05-09 04:44:24', '2023-05-09 04:44:24'),
(70, 'ahmed.jpg', 7, '2023-05-09 09:35:40', '2023-05-09 09:35:40'),
(72, '310637.jpg', 7, '2023-05-14 04:45:15', '2023-05-14 04:45:15'),
(73, '343950389_1930527450634536_8718356356726890034_n.jpg', 30, '2023-05-15 05:53:27', '2023-05-15 05:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment1_models`
--

CREATE TABLE `comment1_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(5) NOT NULL,
  `dial_code` varchar(5) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN'),
(2, 'Aland Islands', 'AX', '+358', '', '', ''),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL'),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD'),
(5, 'AmericanSamoa', 'AS', '+1684', '', '', ''),
(6, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR'),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA'),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD'),
(9, 'Antarctica', 'AQ', '+672', '', '', ''),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD'),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS'),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD'),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG'),
(14, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD'),
(15, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR'),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN'),
(17, 'Bahamas', 'BS', '+1242', '', '', ''),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD'),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT'),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD'),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR'),
(22, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR'),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD'),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF'),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD'),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN'),
(27, 'Bolivia, Plurination', 'BO', '+591', '', '', ''),
(28, 'Bosnia and Herzegovi', 'BA', '+387', '', '', ''),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP'),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL'),
(31, 'British Indian Ocean', 'IO', '+246', '', '', ''),
(32, 'Brunei Darussalam', 'BN', '+673', '', '', ''),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN'),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF'),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF'),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR'),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF'),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD'),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE'),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD'),
(41, 'Central African Repu', 'CF', '+236', '', '', ''),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF'),
(43, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP'),
(44, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY'),
(45, 'Christmas Island', 'CX', '+61', '', '', ''),
(46, 'Cocos (Keeling) Isla', 'CC', '+61', '', '', ''),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP'),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF'),
(49, 'Congo', 'CG', '+242', '', '', ''),
(50, 'Congo, The Democrati', 'CD', '+243', '', '', ''),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD'),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC'),
(53, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF'),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK'),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC'),
(56, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR'),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK'),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK'),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF'),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD'),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP'),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD'),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP'),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF'),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN'),
(67, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR'),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB'),
(69, 'Falkland Islands (Ma', 'FK', '+500', '', '', ''),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK'),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD'),
(72, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR'),
(73, 'France', 'FR', '+33', 'Euro', '€', 'EUR'),
(74, 'French Guiana', 'GF', '+594', '', '', ''),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF'),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF'),
(77, 'Gambia', 'GM', '+220', '', '', ''),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL'),
(79, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR'),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS'),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP'),
(82, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR'),
(83, 'Greenland', 'GL', '+299', '', '', ''),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD'),
(85, 'Guadeloupe', 'GP', '+590', '', '', ''),
(86, 'Guam', 'GU', '+1671', '', '', ''),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ'),
(88, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP'),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF'),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF'),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD'),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG'),
(93, 'Holy See (Vatican Ci', 'VA', '+379', '', '', ''),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL'),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD'),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF'),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK'),
(98, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR'),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR'),
(100, 'Iran, Islamic Republ', 'IR', '+98', '', '', ''),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD'),
(102, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR'),
(103, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP'),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS'),
(105, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR'),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD'),
(107, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY'),
(108, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP'),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD'),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT'),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES'),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD'),
(113, 'Korea, Democratic Pe', 'KP', '+850', '', '', ''),
(114, 'Korea, Republic of S', 'KR', '+82', '', '', ''),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD'),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS'),
(117, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK'),
(118, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR'),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP'),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL'),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD'),
(122, 'Libyan Arab Jamahiri', 'LY', '+218', '', '', 'LYD'),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF'),
(124, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR'),
(125, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR'),
(126, 'Macao', 'MO', '+853', '', '', ''),
(127, 'Macedonia', 'MK', '+389', '', '', ''),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA'),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK'),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR'),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR'),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF'),
(133, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR'),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD'),
(135, 'Martinique', 'MQ', '+596', '', '', ''),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO'),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR'),
(138, 'Mayotte', 'YT', '+262', '', '', ''),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN'),
(140, 'Micronesia, Federate', 'FM', '+691', '', '', ''),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL'),
(142, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR'),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT'),
(144, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR'),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD'),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD'),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN'),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK'),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD'),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD'),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR'),
(152, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR'),
(153, 'Netherlands Antilles', 'AN', '+599', '', '', ''),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF'),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD'),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO'),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF'),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN'),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD'),
(160, 'Norfolk Island', 'NF', '+672', '', '', ''),
(161, 'Northern Mariana Isl', 'MP', '+1670', '', '', ''),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK'),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR'),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR'),
(165, 'Palau', 'PW', '+680', 'Palauan dollar', '$', ''),
(166, 'Palestinian Territor', 'PS', '+970', 'Israeli Shekel', '₪', 'ILS'),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB'),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK'),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG'),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN'),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP'),
(172, 'Pitcairn', 'PN', '+872', '', '', ''),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN'),
(174, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR'),
(175, 'Puerto Rico', 'PR', '+1939', '', '', ''),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR'),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON'),
(178, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB'),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF'),
(180, 'Reunion', 'RE', '+262', '', '', ''),
(181, 'Saint Barthelemy', 'BL', '+590', '', '', ''),
(182, 'Saint Helena, Ascens', 'SH', '+290', '', '', ''),
(183, 'Saint Kitts and Nevi', 'KN', '+1869', '', '', ''),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD'),
(185, 'Saint Martin', 'MF', '+590', '', '', ''),
(186, 'Saint Pierre and Miq', 'PM', '+508', '', '', ''),
(187, 'Saint Vincent and th', 'VC', '+1784', '', '', ''),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST'),
(189, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR'),
(190, 'Sao Tome and Princip', 'ST', '+239', '', '', ''),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR'),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF'),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD'),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR'),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL'),
(196, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND'),
(197, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR'),
(198, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR'),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD'),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS'),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR'),
(202, 'South Georgia and th', 'GS', '+500', '', '', ''),
(203, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR'),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR'),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG'),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD'),
(207, 'Svalbard and Jan May', 'SJ', '+47', '', '', ''),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL'),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK'),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF'),
(211, 'Syrian Arab Republic', 'SY', '+963', '', '', ''),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD'),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS'),
(214, 'Tanzania, United Rep', 'TZ', '+255', '', '', ''),
(215, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB'),
(216, 'Timor-Leste', 'TL', '+670', '', '', ''),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF'),
(218, 'Tokelau', 'TK', '+690', '', '', ''),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP'),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD'),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND'),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY'),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT'),
(224, 'Turks and Caicos Isl', 'TC', '+1649', '', '', ''),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD'),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX'),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH'),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED'),
(229, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP'),
(230, 'United States', 'US', '+1', 'United States dollar', '$', 'USD'),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU'),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS'),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV'),
(234, 'Venezuela, Bolivaria', 'VE', '+58', '', '', ''),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND'),
(236, 'Virgin Islands, Brit', 'VG', '+1284', '', '', ''),
(237, 'Virgin Islands, U.S.', 'VI', '+1340', '', '', ''),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF'),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER'),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW'),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `logo` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `fax`, `site`, `logo`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(4, 'dev_1', NULL, NULL, '166665594590.webp', NULL, NULL, '2022-10-24 20:49:28', '2022-10-24 20:49:28'),
(5, 'dev_2', NULL, NULL, '166665621519.webp', NULL, NULL, '2022-10-24 20:49:28', '2022-10-24 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `excel_files`
--

CREATE TABLE `excel_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excel_files`
--

INSERT INTO `excel_files` (`id`, `name`, `age`, `address`, `created_at`, `updated_at`) VALUES
(17, 'ahmed', 5, 'qena', '2023-05-15 05:24:57', '2023-05-15 05:24:57'),
(18, 'ali', 8, 'luxor', '2023-05-15 05:24:57', '2023-05-15 05:24:57'),
(19, 'mohamed', 11, 'qussier', '2023-05-15 05:24:57', '2023-05-15 05:24:57'),
(20, 'abdo', 12, 'red sea', '2023-05-15 05:24:57', '2023-05-15 05:24:57'),
(21, 'ahmed', 5, 'qena', '2023-05-15 05:25:29', '2023-05-15 05:25:29'),
(22, 'ali', 8, 'luxor', '2023-05-15 05:25:29', '2023-05-15 05:25:29'),
(23, 'mohamed', 11, 'qussier', '2023-05-15 05:25:29', '2023-05-15 05:25:29'),
(24, 'abdo', 12, 'red sea', '2023-05-15 05:25:29', '2023-05-15 05:25:29'),
(25, 'ahmed', 5, 'qena', '2023-05-15 05:26:13', '2023-05-15 05:26:13'),
(26, 'ali', 8, 'luxor', '2023-05-15 05:26:13', '2023-05-15 05:26:13'),
(27, 'mohamed', 11, 'qussier', '2023-05-15 05:26:13', '2023-05-15 05:26:13'),
(28, 'abdo', 12, 'red sea', '2023-05-15 05:26:13', '2023-05-15 05:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(5, '7a41e2e3-199b-4f75-981a-290c90aafa6b', 'database', 'default', '{\"uuid\":\"7a41e2e3-199b-4f75-981a-290c90aafa6b\",\"displayName\":\"App\\\\Jobs\\\\SendMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMail\",\"command\":\"O:17:\\\"App\\\\Jobs\\\\SendMail\\\":1:{s:4:\\\"data\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:3:{i:0;i:6;i:1;i:8;i:2;i:9;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Expected response code \"354\" but got code \"550\", with message \"550 5.7.0 Too many emails per second. Please upgrade your plan https://mailtrap.io/billing/plans/testing\". in D:\\Blog\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php:338\nStack trace:\n#0 D:\\Blog\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(201): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->assertResponseCode(\'550 5.7.0 Too m...\', Array)\n#1 D:\\Blog\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(105): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->executeCommand(\'DATA\\r\\n\', Array)\n#2 D:\\Blog\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(223): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'DATA\\r\\n\', Array)\n#3 D:\\Blog\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#4 D:\\Blog\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#5 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(523): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#6 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(287): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#7 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(204): Illuminate\\Mail\\Mailer->send(\'mails.testmail\', Array, Object(Closure))\n#8 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(197): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(309): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(253): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\MailTest))\n#12 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\MailTest))\n#13 D:\\Blog\\app\\Jobs\\SendMail.php(38): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\MailTest))\n#14 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMail->handle()\n#15 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMail))\n#21 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMail))\n#22 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMail), false)\n#24 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMail))\n#25 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMail))\n#26 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMail))\n#28 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(147): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(130): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(661): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(183): Illuminate\\Container\\Container->call(Array)\n#40 D:\\Blog\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(152): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 D:\\Blog\\vendor\\symfony\\console\\Application.php(1022): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 D:\\Blog\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 D:\\Blog\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 D:\\Blog\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 D:\\Blog\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2023-05-09 03:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `featurs`
--

CREATE TABLE `featurs` (
  `id` int(11) NOT NULL,
  `featur` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'primary satge', 'notess', '2023-03-14 12:08:12', '2023-03-16 07:04:51'),
(2, 'secondary school', 'notesss', '2023-03-14 12:29:01', '2023-03-16 07:05:09'),
(3, 'unversity', 'description', '2023-03-18 12:28:05', '2023-03-18 12:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Class` varchar(255) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `Name_Class`, `section_id`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, 1, '2023-03-27 07:42:01', '2023-03-27 07:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Abu Dhabi', '16656215180.webp', '2022-10-23 03:39:09', '2022-10-23 03:39:09'),
(2, 'Dubai', '166656215180.webp', '2022-10-23 03:39:09', '2022-10-23 03:39:09'),
(3, 'Sharjah', '1666656215180.webp', '2022-10-23 03:39:09', '2022-10-23 03:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_08_124203_create_posts_table', 2),
(6, '2022_12_08_124215_create_comments_table', 2),
(7, '2022_12_08_184042_create_comment1_models_table', 2),
(8, '2022_12_08_184059_create_post1_models_table', 2),
(9, '2023_01_07_114906_create_videos_table', 2),
(10, '2023_01_07_182600_create_products_table', 2),
(11, '2023_03_14_114109_create_grades_table', 2),
(13, '2023_03_15_075347_create_levels_table', 3),
(14, '2023_04_11_094658_create_roles_table', 4),
(15, '2023_05_08_123031_create_jobs_table', 5),
(16, '2023_05_14_101421_create_photos_table', 6),
(17, '2023_05_14_101838_create_photos_table', 7),
(18, '2023_05_14_140901_create_excel_files_table', 8),
(19, '2023_05_20_135447_create_cache_table', 9),
(20, '2023_09_13_091657_create_rooms_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `flag` tinyint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `flag`, `created_at`) VALUES
('a@a.com', 'ANdRaRJNIYB7UDaJ8Zf3Jx1PwjTfbX8hoqx1GFx65zGWR6V1SxLdupYufCgUCOY2', 1, '2023-03-18 06:14:37'),
('a@a.com', 'ejhcct05hRNLdHfO5Wshug91P0oTWH0w4vxwe5nn8iBgrfaaCm', 0, '2023-03-18 11:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `pers` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `project_id`, `pers`, `created_at`, `updated_at`) VALUES
(12, 21, 1, '2022-10-24 21:54:50', '2022-10-24 21:54:50'),
(13, 21, 1, '2022-10-24 21:54:50', '2022-10-24 21:54:50'),
(14, 21, 1, '2022-10-24 21:54:50', '2022-10-24 21:54:50'),
(15, 21, 1, '2022-10-24 21:54:50', '2022-10-24 21:54:50'),
(16, 22, 1, '2022-10-24 21:55:23', '2022-10-24 21:55:23'),
(17, 22, 1, '2022-10-24 21:55:23', '2022-10-24 21:55:23'),
(18, 22, 1, '2022-10-24 21:55:23', '2022-10-24 21:55:23'),
(19, 22, 1, '2022-10-24 21:55:23', '2022-10-24 21:55:23'),
(20, 23, 1, '2022-10-24 21:56:48', '2022-10-24 21:56:48'),
(21, 23, 1, '2022-10-24 21:56:48', '2022-10-24 21:56:48'),
(22, 23, 1, '2022-10-24 21:56:48', '2022-10-24 21:56:48'),
(23, 23, 1, '2022-10-24 21:56:48', '2022-10-24 21:56:48'),
(24, 24, 1, '2022-10-24 21:59:05', '2022-10-24 21:59:05'),
(25, 24, 1, '2022-10-24 21:59:05', '2022-10-24 21:59:05'),
(26, 24, 1, '2022-10-24 21:59:05', '2022-10-24 21:59:05'),
(27, 24, 1, '2022-10-24 21:59:05', '2022-10-24 21:59:05'),
(28, 25, 1, '2022-10-24 21:59:39', '2022-10-24 21:59:39'),
(29, 25, 1, '2022-10-24 21:59:39', '2022-10-24 21:59:39'),
(30, 25, 1, '2022-10-24 21:59:39', '2022-10-24 21:59:39'),
(31, 25, 1, '2022-10-24 21:59:39', '2022-10-24 21:59:39'),
(32, 26, 1, '2022-10-24 22:02:44', '2022-10-24 22:02:44'),
(33, 26, 1, '2022-10-24 22:02:44', '2022-10-24 22:02:44'),
(34, 26, 1, '2022-10-24 22:02:44', '2022-10-24 22:02:44'),
(35, 26, 1, '2022-10-24 22:02:44', '2022-10-24 22:02:44'),
(36, 27, 1, '2022-10-24 22:03:35', '2022-10-24 22:03:35'),
(37, 27, 1, '2022-10-24 22:03:35', '2022-10-24 22:03:35'),
(38, 27, 1, '2022-10-24 22:03:35', '2022-10-24 22:03:35'),
(39, 27, 1, '2022-10-24 22:03:35', '2022-10-24 22:03:35'),
(40, 28, 10, '2022-10-25 03:55:17', '2022-10-25 03:55:17'),
(41, 28, 10, '2022-10-25 03:55:17', '2022-10-25 03:55:17'),
(42, 29, 100, '2022-10-25 03:56:30', '2022-10-25 03:56:30'),
(47, 31, 1, '2022-10-25 05:34:55', '2022-10-25 05:34:55'),
(48, 31, 1, '2022-10-25 05:34:55', '2022-10-25 05:34:55'),
(49, 31, 1, '2022-10-25 05:34:55', '2022-10-25 05:34:55'),
(50, 31, 1, '2022-10-25 05:34:55', '2022-10-25 05:34:55'),
(51, 31, 1, '2022-10-25 05:34:55', '2022-10-25 05:34:55'),
(52, 32, 1, '2022-10-25 05:35:47', '2022-10-25 05:35:47'),
(53, 32, 1, '2022-10-25 05:35:47', '2022-10-25 05:35:47'),
(54, 32, 1, '2022-10-25 05:35:47', '2022-10-25 05:35:47'),
(55, 32, 1, '2022-10-25 05:35:47', '2022-10-25 05:35:47'),
(56, 32, 1, '2022-10-25 05:35:47', '2022-10-25 05:35:47'),
(57, 33, 1, '2022-10-25 05:36:48', '2022-10-25 05:36:48'),
(58, 33, 1, '2022-10-25 05:36:48', '2022-10-25 05:36:48'),
(59, 33, 1, '2022-10-25 05:36:48', '2022-10-25 05:36:48'),
(60, 33, 1, '2022-10-25 05:36:48', '2022-10-25 05:36:48'),
(61, 33, 1, '2022-10-25 05:36:48', '2022-10-25 05:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photoable_type` varchar(255) NOT NULL,
  `photoable_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photoable_type`, `photoable_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'App\\Project', 65, 'home.jpg', '2023-05-14 07:50:20', '2023-05-14 07:50:20'),
(2, 'App\\Project', 66, '310637.jpg', '2023-05-14 08:28:22', '2023-05-14 08:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `post1_models`
--

CREATE TABLE `post1_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `auth` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `auth` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(40, 'project 1', 'off', '2023-03-26 07:50:17', '2023-03-26 10:12:39'),
(45, 'project 2', 'on', '2023-03-26 08:42:22', '2023-03-27 07:55:20'),
(50, 'project 4', 'off', '2023-03-26 09:33:51', '2023-03-27 07:55:44'),
(53, 'project 5', 'off', '2023-03-27 07:58:55', '2023-03-27 07:58:55'),
(65, 'project new', 'on', '2023-05-14 07:50:19', '2023-05-15 10:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `name`, `project_id`, `created_at`, `updated_at`) VALUES
(1, '1666655979133.webp', 25, '2022-10-24 21:59:40', '2022-10-24 21:59:40'),
(2, '1666656164119.webp', 26, '2022-10-24 22:02:44', '2022-10-24 22:02:44'),
(3, '166665621519.webp', 27, '2022-10-24 22:03:35', '2022-10-24 22:03:35'),
(4, '1666677317570.webp', 28, '2022-10-25 03:55:19', '2022-10-25 03:55:19'),
(5, '1666677391392.webp', 29, '2022-10-25 03:56:31', '2022-10-25 03:56:31'),
(6, '1666677390840.webp', 29, '2022-10-25 03:56:31', '2022-10-25 03:56:31'),
(8, '1666683296193.webp', 31, '2022-10-25 05:34:56', '2022-10-25 05:34:56'),
(9, '1666683348843.webp', 32, '2022-10-25 05:35:48', '2022-10-25 05:35:48'),
(10, '1666683409973.webp', 33, '2022-10-25 05:36:50', '2022-10-25 05:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `project_id`, `type_id`, `created_at`, `updated_at`) VALUES
(48, 40, 11, '2023-03-27 08:29:44', '2023-03-27 08:29:44'),
(49, 45, 8, '2023-03-27 08:29:54', '2023-03-27 08:29:54'),
(50, 50, 8, '2023-03-27 08:30:03', '2023-03-27 08:30:03'),
(51, 50, 9, '2023-03-27 08:30:03', '2023-03-27 08:30:03'),
(52, 53, 7, '2023-03-27 08:30:16', '2023-03-27 08:30:16'),
(53, 53, 8, '2023-03-27 08:30:16', '2023-03-27 08:30:16'),
(66, 65, 7, '2023-05-15 10:57:41', '2023-05-15 10:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'dfgfgf', 'rttr', 'rtrtrt', 'trttr', '2022-10-25 06:00:27', '2022-10-25 06:00:27'),
(2, 'dfgfgf', 'rttr', 'rtrtrt', 'trttr', '2022-10-25 06:00:32', '2022-10-25 06:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', '[\"section\",\"level\"]', '2023-04-11 08:58:02', '2023-04-13 09:09:34'),
(3, 'super admin', '[\"grade\",\"section\",\"level\",\"project\",\"project.delete\",\"project.edit\"]', '2023-04-12 10:23:04', '2023-05-24 11:40:01'),
(4, 'asd', '[\"grade\",\"section\"]', '2023-04-12 20:19:07', '2023-04-12 20:19:07'),
(5, 'user', '[\"level\"]', '2023-04-13 08:28:44', '2023-04-13 08:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `number_city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name_en`, `name_ar`, `number_city`, `created_at`, `updated_at`) VALUES
(1, 'adipisci', 'accusamus', 'voluptas', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(2, 'occaecati', 'sit', 'quas', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(3, 'suscipit', 'animi', 'praesentium', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(4, 'inventore', 'eaque', 'similique', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(5, 'vitae', 'odio', 'quia', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(6, 'optio', 'ut', 'eligendi', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(7, 'ut', 'at', 'suscipit', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(8, 'et', 'doloremque', 'perspiciatis', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(9, 'ipsum', 'minus', 'quia', '2023-09-13 06:23:15', '2023-09-13 06:23:15'),
(10, 'perferendis', 'non', 'enim', '2023-09-13 06:23:15', '2023-09-13 06:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Section` varchar(255) NOT NULL,
  `grad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `Name_Section`, `grad_id`, `created_at`, `updated_at`) VALUES
(1, 'first', 1, '2023-03-14 12:57:41', '2023-03-16 07:08:54'),
(2, 'second', 1, '2023-03-15 05:34:36', '2023-03-16 07:09:12'),
(4, 'first', 2, '2023-03-16 07:09:22', '2023-03-16 07:09:22'),
(5, 'second', 2, '2023-03-16 07:09:32', '2023-03-16 07:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL,
  `value_en` varchar(255) NOT NULL,
  `value_fr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `value`, `value_en`, `value_fr`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'جيوار 11', 'J-www', 'J-www', '2022-10-22 18:14:08', '2023-03-09 10:27:41'),
(2, 'goals', 'test Arabic 11', 'test english', 'test french', '2022-10-23 00:26:35', '2023-03-09 10:29:38'),
(3, 'phone', '0104554554 +', '0104554554', '0104554554', '2022-10-23 00:29:13', '2023-03-09 10:29:35'),
(4, 'address', '95 South Park Avenue, USA', '95 South Park Avenue, USA', '95 South Park Avenue, USA', '2022-10-23 00:29:36', '2023-03-09 10:29:29'),
(5, 'email', 'support@findhouses.com', 'support@findhouses.com', 'support@findhouses.com', '2022-10-23 00:29:54', '2023-03-09 10:29:26'),
(6, 'Brief', '\"شركة جيوار العقارية هي شركة مصرية متخصصة في إدارة المشروعات العقارية من حيث التطوير والاستثمار العقاري،\r\nالتسويق العقاري، الإشراف على أعمال المقاولات والتشطيبات الداخلية وتقديم الاستشارات الادرية والمالية للشركات\r\nالعقارية\r\n\"', 'Jiwar', 'jwar', '2022-10-23 04:25:51', '2023-03-09 10:29:24'),
(7, 'vision', '\"Selling is the goal of every broker company, it\'s the ultimate goal in advertising campaigns through the page. but, aim to appear in a different way. Provide deep local real estate experience and knowledge to make The client’s experience as frictionless and empowering as possible.\r\nThe brand is raising product and page value, but the most essential features automatically come into the client\'s thoughts.\"', 'vision', 'vision', '2022-10-23 04:26:29', '2023-03-09 10:29:22'),
(8, 'message', 'To be the only one in real estate field and the easiest way to rush your business', 'To be the only one in real estate field and the easiest way to rush your business', 'To be the only one in real estate field and the easiest way to rush your business', '2022-10-23 04:26:59', '2023-03-09 10:29:19'),
(9, 'insta', 'https://instagram.com/jiwar__realestate?igshid=YzAyZWRlMzg=', 'https://instagram.com/jiwar__realestate?igshid=YzAyZWRlMzg=', 'https://instagram.com/jiwar__realestate?igshid=YzAyZWRlMzg=', '2022-10-23 04:27:35', '2023-03-09 10:29:18'),
(10, 'linkedin', 'https://www.linkedin.com/in/jiwar-real-estate-87b33587', 'https://www.linkedin.com/in/jiwar-real-estate-87b33587', 'https://www.linkedin.com/in/jiwar-real-estate-87b33587', '2022-10-23 04:28:01', '2023-03-09 10:29:16'),
(11, 'facebook', 'https://www.facebook.com/jiwarproperties', 'https://www.facebook.com/jiwarproperties', 'https://www.facebook.com/jiwarproperties', '2022-10-23 04:28:19', '2023-03-09 10:29:14'),
(12, 'site', 'http://jiwarrealestate.com/', 'http://jiwarrealestate.com/', 'http://jiwarrealestate.com/', '2022-10-23 04:28:34', '2023-03-09 10:29:11'),
(13, 'whatsapp', '971 50 230 6164', '971 50 230 6164', '971 50 230 6164', '2022-10-23 04:28:54', '2023-03-09 10:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New Launch', '2022-10-23 03:36:02', '2022-10-23 03:36:02'),
(2, 'Under Construction', '2022-10-23 03:36:02', '2022-10-23 03:36:02'),
(3, 'Ready to Move in', '2022-10-23 03:36:02', '2022-10-23 03:36:02'),
(4, 'Upcoming', '2022-10-23 03:36:02', '2022-10-23 03:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `project_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 27, '454', '1666656215180.webp', '2022-10-24 22:03:36', '2022-10-24 22:03:36'),
(2, 28, 'fghgh', '1666677319148.webp', '2022-10-25 03:55:20', '2022-10-25 03:55:20'),
(3, 29, 'tytyrty', '1666677391171.webp', '2022-10-25 03:56:32', '2022-10-25 03:56:32'),
(5, 31, 'fgfg', '166668329646.webp', '2022-10-25 05:34:57', '2022-10-25 05:34:57'),
(6, 32, 'fgfg', '166668334881.webp', '2022-10-25 05:35:49', '2022-10-25 05:35:49'),
(7, 33, 'fgfg', '166668341086.webp', '2022-10-25 05:36:50', '2022-10-25 05:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'eng', '2022-10-16 14:10:44', '2022-10-16 14:10:44'),
(2, 'eng', '2022-10-16 14:11:27', '2022-10-16 14:11:27'),
(3, 'eng', '2022-10-16 14:12:41', '2022-10-16 14:12:41'),
(4, 'eng', '2022-10-16 14:12:41', '2022-10-16 14:12:41'),
(5, 'eng', '2022-10-16 14:18:27', '2022-10-16 14:18:27'),
(6, 'eng', '2022-10-16 14:19:16', '2022-10-16 14:19:16'),
(7, 'en', '2022-10-16 14:32:19', '2022-10-16 14:32:19'),
(8, 'en', '2022-10-16 14:35:37', '2022-10-16 14:35:37'),
(9, 'en', '2022-10-16 14:36:13', '2022-10-16 14:36:13'),
(10, 'en', '2022-10-16 14:37:34', '2022-10-16 14:37:34'),
(11, 'en', '2022-10-16 14:38:56', '2022-10-16 14:38:56'),
(12, 'en', '2022-10-16 14:39:28', '2022-10-16 14:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `transcodes`
--

CREATE TABLE `transcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_` varchar(191) NOT NULL,
  `lang_` varchar(191) NOT NULL,
  `column_` varchar(191) NOT NULL,
  `row_` int(11) NOT NULL,
  `transcode` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcodes`
--

INSERT INTO `transcodes` (`id`, `table_`, `lang_`, `column_`, `row_`, `transcode`, `created_at`, `updated_at`) VALUES
(5913, 'test', 'ar', 'name', 7, 'ar', '2022-10-16 14:32:19', '2022-10-16 14:32:19'),
(5914, 'test', 'fr', 'name', 7, 'فرنساوى', '2022-10-16 14:32:19', '2022-10-16 14:32:19'),
(5915, 'test', 'ar', 'name', 12, 'عربي', '2022-10-16 14:39:28', '2022-10-16 14:39:28'),
(5916, 'test', 'fr', 'name', 12, 'فرنساوى', '2022-10-16 14:39:28', '2022-10-16 14:39:28'),
(5925, 'projects', 'ar', 'name', 12, 'يبيبي', '2022-10-20 23:01:31', '2022-10-20 23:01:31'),
(5926, 'projects', 'ar', 'description', 12, 'يبيبيب', '2022-10-20 23:01:31', '2022-10-20 23:01:31'),
(5927, 'projects', 'fr', 'name', 12, 'ddfdfd', '2022-10-20 23:01:31', '2022-10-20 23:01:31'),
(5928, 'projects', 'fr', 'description', 12, 'fdfdfdf', '2022-10-20 23:01:31', '2022-10-20 23:01:31'),
(5929, 'projects', 'ar', 'name', 13, 'dfdf', '2022-10-20 23:05:48', '2022-10-20 23:05:48'),
(5930, 'projects', 'ar', 'description', 13, 'dffd', '2022-10-20 23:05:48', '2022-10-20 23:05:48'),
(5931, 'projects', 'fr', 'name', 13, 'dfdffd', '2022-10-20 23:05:48', '2022-10-20 23:05:48'),
(5932, 'projects', 'fr', 'description', 13, 'dfdf', '2022-10-20 23:05:48', '2022-10-20 23:05:48'),
(5945, 'projects', 'ar', 'name', 17, 'fg', '2022-10-21 00:04:34', '2022-10-21 00:04:34'),
(5946, 'projects', 'ar', 'description', 17, 'fg', '2022-10-21 00:04:34', '2022-10-21 00:04:34'),
(5947, 'projects', 'fr', 'name', 17, 'fg', '2022-10-21 00:04:34', '2022-10-21 00:04:34'),
(5948, 'projects', 'fr', 'description', 17, 'fg', '2022-10-21 00:04:34', '2022-10-21 00:04:34'),
(5949, 'type', 'ar', 'type', 1, '1', '2022-10-21 20:32:00', '2022-10-21 20:32:00'),
(5950, 'type', 'fr', 'type', 1, '3', '2022-10-21 20:32:00', '2022-10-21 20:32:00'),
(5951, 'type', 'ar', 'type', 2, 'rt', '2022-10-21 21:21:53', '2022-10-21 21:21:53'),
(5952, 'type', 'fr', 'type', 2, 't', '2022-10-21 21:21:53', '2022-10-21 21:21:53'),
(5953, 'type', 'ar', 'type', 3, 'fg', '2022-10-21 21:22:57', '2022-10-21 21:22:57'),
(5954, 'type', 'fr', 'type', 3, 'g', '2022-10-21 21:22:57', '2022-10-21 21:22:57'),
(5955, 'type', 'ar', 'type', 4, 'fg', '2022-10-21 21:24:14', '2022-10-21 21:24:14'),
(5956, 'type', 'fr', 'type', 4, 'fg', '2022-10-21 21:24:14', '2022-10-21 21:24:14'),
(5957, 'setting', 'fr', 'value', 2, 'ffffffffffffffffffffffffffffffffffffff', NULL, NULL),
(5958, 'blogs', 'ar', 'title', 1, 'rt', '2022-10-23 02:42:45', '2022-10-23 02:42:45'),
(5959, 'blogs', 'ar', 'title', 2, 'rt', '2022-10-23 02:43:01', '2022-10-23 02:43:01'),
(5960, 'blogs', 'ar', 'title', 3, 'rt', '2022-10-23 02:45:17', '2022-10-23 02:45:17'),
(5961, 'blogs', 'ar', 'article', 3, 'tr', '2022-10-23 02:45:17', '2022-10-23 02:45:17'),
(5962, 'blogs', 'ar', 'title', 4, 'rt', '2022-10-23 02:45:58', '2022-10-23 02:45:58'),
(5963, 'blogs', 'ar', 'article', 4, 'tr', '2022-10-23 02:45:58', '2022-10-23 02:45:58'),
(5964, 'blogs', 'fr', 'title', 4, 'rt', '2022-10-23 02:45:58', '2022-10-23 02:45:58'),
(5965, 'blogs', 'fr', 'article', 4, 'tr', '2022-10-23 02:45:58', '2022-10-23 02:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `type_en` varchar(255) NOT NULL,
  `type_fr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`, `type_en`, `type_fr`, `created_at`, `updated_at`) VALUES
(7, 'townhouse', 'apartement', 'apartement', '2022-10-23 03:35:15', '2022-10-23 03:35:15'),
(8, 'twin house', 'apartement', 'apartement', '2022-10-23 03:35:15', '2022-10-23 03:35:15'),
(9, 'penthouse', 'apartement', 'apartement', '2022-10-23 03:35:15', '2022-10-23 03:35:15'),
(10, 'plot or land', 'apartement', 'apartement', '2022-10-23 03:35:15', '2022-10-23 03:35:15'),
(11, 'hotel rooms', 'apartement', 'apartement', '2022-10-23 03:35:15', '2022-10-23 03:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang` varchar(3) DEFAULT 'en',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `expire` int(1) NOT NULL DEFAULT 0,
  `device_token` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lang`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `expire`, `device_token`, `type`, `provider`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed adawe', 'en', 'aaa15107@gmail.com', NULL, '$2y$10$DaccoTVyKKyGb6GTtx2NAuCDRHUM4guXCsT5cwEmbQWmfeIGZ5wmi', NULL, 3, 0, NULL, NULL, NULL, NULL, '2022-10-16 14:08:54', '2023-05-09 10:13:18'),
(2, 'fgfg', 'en', 'a@a.com', NULL, '$2y$10$kiuDpsxMkAaA1we.GUrSBeabs77i3bRloj2D1fe3z7ivhC9cEzc/a', NULL, 1, 0, NULL, NULL, NULL, NULL, '2022-10-21 21:55:38', '2023-05-09 10:13:18'),
(4, 'Ahmed', 'en', 'a@a1.com', NULL, '$2y$10$5V8jTXTz0rE598xrJA72L.eqaRrSIvir1r4/0xbC6qXO0Y0bOq/QG', NULL, 3, 1, NULL, NULL, NULL, NULL, '2023-04-12 10:52:07', '2023-05-09 10:13:18'),
(6, 'ahmed user', 'en', 'a12@a.com', NULL, '$2y$10$N7nE6TBSxx4icdzRBZXrRuhgPaK9hTafPo.F/7YIUN85cF5nJLaSu', NULL, NULL, 1, 'cEUaMdSbqWTNklH0irtQ4x:APA91bFKh0AuQMSZd1l1GHn0s9o8ygBgeERqDPamD-mO_eZHAz9a_2msz_wyf9g_jDvLPaF6JFKIwA6SXi_2hPG-4uBX_3AEllUR_4v9DHMDxTYpcpoRantcTtrdIPSQG3hH6Zdwsn2_', NULL, NULL, NULL, '2023-04-16 08:17:39', '2023-05-17 07:42:54'),
(8, 'Ahmed', 'en', 'a78@a.com', NULL, '$2y$10$U/EnVezSzOtdBQvn7WFJ6ubm3DiZJKnVqthzq2IZK1z9pHzGX90lO', NULL, NULL, 1, 'cEUaMdSbqWTNklH0irtQ4x:APA91bFKh0AuQMSZd1l1GHn0s9o8ygBgeERqDPamD-mO_eZHAz9a_2msz_wyf9g_jDvLPaF6JFKIwA6SXi_2hPG-4uBX_3AEllUR_4v9DHMDxTYpcpoRantcTtrdIPSQG3hH6Zdwsn2_', NULL, NULL, NULL, '2023-05-03 04:34:52', '2023-05-20 06:00:30'),
(19, 'Ahmed Saeed', 'en', 'ahmedsaeed1722@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'google', '106790861836152753844', '2023-06-04 06:51:24', '2023-06-04 06:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `viewer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `amenitieprojects`
--
ALTER TABLE `amenitieprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comment1_models`
--
ALTER TABLE `comment1_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment1_models_post_id_foreign` (`post_id`),
  ADD KEY `comment1_models_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excel_files`
--
ALTER TABLE `excel_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `featurs`
--
ALTER TABLE `featurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_section_id_foreign` (`section_id`),
  ADD KEY `levels_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_photoable_type_photoable_id_index` (`photoable_type`,`photoable_id`);

--
-- Indexes for table `post1_models`
--
ALTER TABLE `post1_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_ar_unique` (`name_ar`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_id` (`grad_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcodes`
--
ALTER TABLE `transcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `amenitieprojects`
--
ALTER TABLE `amenitieprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `comment1_models`
--
ALTER TABLE `comment1_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `excel_files`
--
ALTER TABLE `excel_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `featurs`
--
ALTER TABLE `featurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post1_models`
--
ALTER TABLE `post1_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transcodes`
--
ALTER TABLE `transcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5966;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment1_models`
--
ALTER TABLE `comment1_models`
  ADD CONSTRAINT `comment1_models_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment1_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `levels_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `grade_id` FOREIGN KEY (`grad_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
