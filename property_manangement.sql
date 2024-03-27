-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 11:37 AM
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
-- Database: `property_manangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_books`
--

CREATE TABLE `address_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_books`
--

INSERT INTO `address_books` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `group_id`) VALUES
(1, 'Ali Hassan', 'ali@gmail.com', '02313451', 'Sialkot', '2024-03-27 10:35:17', NULL, 'GROUP_6603f665bd07c');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2024-03-27 10:30:09', '2024-03-27 10:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `automated_indexings`
--

CREATE TABLE `automated_indexings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `document_date` date DEFAULT NULL,
  `document_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charge_settlements`
--

CREATE TABLE `charge_settlements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `charge_date` date NOT NULL,
  `settlement_date` date NOT NULL,
  `settlement_amount` bigint(20) NOT NULL,
  `charge_amount` bigint(20) NOT NULL,
  `charge_type` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rent_amount` bigint(20) NOT NULL,
  `security_deposit` bigint(20) NOT NULL,
  `late_fee_amount` bigint(20) NOT NULL,
  `early_termination_fee_amount` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_id` varchar(255) DEFAULT NULL,
  `document` text DEFAULT NULL,
  `gas_information` text DEFAULT NULL,
  `water_information` text DEFAULT NULL,
  `internet_information` text DEFAULT NULL,
  `electricity_information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `flag`, `dial_code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', '🇦🇫', '+93', NULL, NULL),
(2, 'Åland Islands', 'AX', '🇦🇽', '+358', NULL, NULL),
(3, 'Albania', 'AL', '🇦🇱', '+355', NULL, NULL),
(4, 'Algeria', 'DZ', '🇩🇿', '+213', NULL, NULL),
(5, 'American Samoa', 'AS', '🇦🇸', '+1684', NULL, NULL),
(6, 'Andorra', 'AD', '🇦🇩', '+376', NULL, NULL),
(7, 'Angola', 'AO', '🇦🇴', '+244', NULL, NULL),
(8, 'Anguilla', 'AI', '🇦🇮', '+1264', NULL, NULL),
(9, 'Antarctica', 'AQ', '🇦🇶', '+672', NULL, NULL),
(10, 'Antigua and Barbuda', 'AG', '🇦🇬', '+1268', NULL, NULL),
(11, 'Argentina', 'AR', '🇦🇷', '+54', NULL, NULL),
(12, 'Armenia', 'AM', '🇦🇲', '+374', NULL, NULL),
(13, 'Aruba', 'AW', '🇦🇼', '+297', NULL, NULL),
(14, 'Australia', 'AU', '🇦🇺', '+61', NULL, NULL),
(15, 'Austria', 'AT', '🇦🇹', '+43', NULL, NULL),
(16, 'Azerbaijan', 'AZ', '🇦🇿', '+994', NULL, NULL),
(17, 'Bahamas', 'BS', '🇧🇸', '+1242', NULL, NULL),
(18, 'Bahrain', 'BH', '🇧🇭', '+973', NULL, NULL),
(19, 'Bangladesh', 'BD', '🇧🇩', '+880', NULL, NULL),
(20, 'Barbados', 'BB', '🇧🇧', '+1246', NULL, NULL),
(21, 'Belarus', 'BY', '🇧🇾', '+375', NULL, NULL),
(22, 'Belgium', 'BE', '🇧🇪', '+32', NULL, NULL),
(23, 'Belize', 'BZ', '🇧🇿', '+501', NULL, NULL),
(24, 'Benin', 'BJ', '🇧🇯', '+229', NULL, NULL),
(25, 'Bermuda', 'BM', '🇧🇲', '+1441', NULL, NULL),
(26, 'Bhutan', 'BT', '🇧🇹', '+975', NULL, NULL),
(27, 'Bolivia, Plurinational State of bolivia', 'BO', '🇧🇴', '+591', NULL, NULL),
(28, 'Bosnia and Herzegovina', 'BA', '🇧🇦', '+387', NULL, NULL),
(29, 'Botswana', 'BW', '🇧🇼', '+267', NULL, NULL),
(30, 'Bouvet Island', 'BV', '🇧🇻', '+47', NULL, NULL),
(31, 'Brazil', 'BR', '🇧🇷', '+55', NULL, NULL),
(32, 'British Indian Ocean Territory', 'IO', '🇮🇴', '+246', NULL, NULL),
(33, 'Brunei Darussalam', 'BN', '🇧🇳', '+673', NULL, NULL),
(34, 'Bulgaria', 'BG', '🇧🇬', '+359', NULL, NULL),
(35, 'Burkina Faso', 'BF', '🇧🇫', '+226', NULL, NULL),
(36, 'Burundi', 'BI', '🇧🇮', '+257', NULL, NULL),
(37, 'Cambodia', 'KH', '🇰🇭', '+855', NULL, NULL),
(38, 'Cameroon', 'CM', '🇨🇲', '+237', NULL, NULL),
(39, 'Canada', 'CA', '🇨🇦', '+1', NULL, NULL),
(40, 'Cape Verde', 'CV', '🇨🇻', '+238', NULL, NULL),
(41, 'Cayman Islands', 'KY', '🇰🇾', '+345', NULL, NULL),
(42, 'Central African Republic', 'CF', '🇨🇫', '+236', NULL, NULL),
(43, 'Chad', 'TD', '🇹🇩', '+235', NULL, NULL),
(44, 'Chile', 'CL', '🇨🇱', '+56', NULL, NULL),
(45, 'China', 'CN', '🇨🇳', '+86', NULL, NULL),
(46, 'Christmas Island', 'CX', '🇨🇽', '+61', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', '🇨🇨', '+61', NULL, NULL),
(48, 'Colombia', 'CO', '🇨🇴', '+57', NULL, NULL),
(49, 'Comoros', 'KM', '🇰🇲', '+269', NULL, NULL),
(50, 'Congo', 'CG', '🇨🇬', '+242', NULL, NULL),
(51, 'Congo, The Democratic Republic of the Congo', 'CD', '🇨🇩', '+243', NULL, NULL),
(52, 'Cook Islands', 'CK', '🇨🇰', '+682', NULL, NULL),
(53, 'Costa Rica', 'CR', '🇨🇷', '+506', NULL, NULL),
(54, 'Cote d\'Ivoire', 'CI', '🇨🇮', '+225', NULL, NULL),
(55, 'Croatia', 'HR', '🇭🇷', '+385', NULL, NULL),
(56, 'Cuba', 'CU', '🇨🇺', '+53', NULL, NULL),
(57, 'Cyprus', 'CY', '🇨🇾', '+357', NULL, NULL),
(58, 'Czech Republic', 'CZ', '🇨🇿', '+420', NULL, NULL),
(59, 'Denmark', 'DK', '🇩🇰', '+45', NULL, NULL),
(60, 'Djibouti', 'DJ', '🇩🇯', '+253', NULL, NULL),
(61, 'Dominica', 'DM', '🇩🇲', '+1767', NULL, NULL),
(62, 'Dominican Republic', 'DO', '🇩🇴', '+1849', NULL, NULL),
(63, 'Ecuador', 'EC', '🇪🇨', '+593', NULL, NULL),
(64, 'Egypt', 'EG', '🇪🇬', '+20', NULL, NULL),
(65, 'El Salvador', 'SV', '🇸🇻', '+503', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', '🇬🇶', '+240', NULL, NULL),
(67, 'Eritrea', 'ER', '🇪🇷', '+291', NULL, NULL),
(68, 'Estonia', 'EE', '🇪🇪', '+372', NULL, NULL),
(69, 'Ethiopia', 'ET', '🇪🇹', '+251', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', '🇫🇰', '+500', NULL, NULL),
(71, 'Faroe Islands', 'FO', '🇫🇴', '+298', NULL, NULL),
(72, 'Fiji', 'FJ', '🇫🇯', '+679', NULL, NULL),
(73, 'Finland', 'FI', '🇫🇮', '+358', NULL, NULL),
(74, 'France', 'FR', '🇫🇷', '+33', NULL, NULL),
(75, 'French Guiana', 'GF', '🇬🇫', '+594', NULL, NULL),
(76, 'French Polynesia', 'PF', '🇵🇫', '+689', NULL, NULL),
(77, 'French Southern Territories', 'TF', '🇹🇫', '+262', NULL, NULL),
(78, 'Gabon', 'GA', '🇬🇦', '+241', NULL, NULL),
(79, 'Gambia', 'GM', '🇬🇲', '+220', NULL, NULL),
(80, 'Georgia', 'GE', '🇬🇪', '+995', NULL, NULL),
(81, 'Germany', 'DE', '🇩🇪', '+49', NULL, NULL),
(82, 'Ghana', 'GH', '🇬🇭', '+233', NULL, NULL),
(83, 'Gibraltar', 'GI', '🇬🇮', '+350', NULL, NULL),
(84, 'Greece', 'GR', '🇬🇷', '+30', NULL, NULL),
(85, 'Greenland', 'GL', '🇬🇱', '+299', NULL, NULL),
(86, 'Grenada', 'GD', '🇬🇩', '+1473', NULL, NULL),
(87, 'Guadeloupe', 'GP', '🇬🇵', '+590', NULL, NULL),
(88, 'Guam', 'GU', '🇬🇺', '+1671', NULL, NULL),
(89, 'Guatemala', 'GT', '🇬🇹', '+502', NULL, NULL),
(90, 'Guernsey', 'GG', '🇬🇬', '+44', NULL, NULL),
(91, 'Guinea', 'GN', '🇬🇳', '+224', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', '🇬🇼', '+245', NULL, NULL),
(93, 'Guyana', 'GY', '🇬🇾', '+592', NULL, NULL),
(94, 'Haiti', 'HT', '🇭🇹', '+509', NULL, NULL),
(95, 'Heard Island and Mcdonald Islands', 'HM', '🇭🇲', '+672', NULL, NULL),
(96, 'Holy See (Vatican City State)', 'VA', '🇻🇦', '+379', NULL, NULL),
(97, 'Honduras', 'HN', '🇭🇳', '+504', NULL, NULL),
(98, 'Hong Kong', 'HK', '🇭🇰', '+852', NULL, NULL),
(99, 'Hungary', 'HU', '🇭🇺', '+36', NULL, NULL),
(100, 'Iceland', 'IS', '🇮🇸', '+354', NULL, NULL),
(101, 'India', 'IN', '🇮🇳', '+91', NULL, NULL),
(102, 'Indonesia', 'ID', '🇮🇩', '+62', NULL, NULL),
(103, 'Iran, Islamic Republic of Persian Gulf', 'IR', '🇮🇷', '+98', NULL, NULL),
(104, 'Iraq', 'IQ', '🇮🇶', '+964', NULL, NULL),
(105, 'Ireland', 'IE', '🇮🇪', '+353', NULL, NULL),
(106, 'Isle of Man', 'IM', '🇮🇲', '+44', NULL, NULL),
(107, 'Israel', 'IL', '🇮🇱', '+972', NULL, NULL),
(108, 'Italy', 'IT', '🇮🇹', '+39', NULL, NULL),
(109, 'Jamaica', 'JM', '🇯🇲', '+1876', NULL, NULL),
(110, 'Japan', 'JP', '🇯🇵', '+81', NULL, NULL),
(111, 'Jersey', 'JE', '🇯🇪', '+44', NULL, NULL),
(112, 'Jordan', 'JO', '🇯🇴', '+962', NULL, NULL),
(113, 'Kazakhstan', 'KZ', '🇰🇿', '+7', NULL, NULL),
(114, 'Kenya', 'KE', '🇰🇪', '+254', NULL, NULL),
(115, 'Kiribati', 'KI', '🇰🇮', '+686', NULL, NULL),
(116, 'Korea, Democratic People\'s Republic of Korea', 'KP', '🇰🇵', '+850', NULL, NULL),
(117, 'Korea, Republic of South Korea', 'KR', '🇰🇷', '+82', NULL, NULL),
(118, 'Kosovo', 'XK', '🇽🇰', '+383', NULL, NULL),
(119, 'Kuwait', 'KW', '🇰🇼', '+965', NULL, NULL),
(120, 'Kyrgyzstan', 'KG', '🇰🇬', '+996', NULL, NULL),
(121, 'Laos', 'LA', '🇱🇦', '+856', NULL, NULL),
(122, 'Latvia', 'LV', '🇱🇻', '+371', NULL, NULL),
(123, 'Lebanon', 'LB', '🇱🇧', '+961', NULL, NULL),
(124, 'Lesotho', 'LS', '🇱🇸', '+266', NULL, NULL),
(125, 'Liberia', 'LR', '🇱🇷', '+231', NULL, NULL),
(126, 'Libyan Arab Jamahiriya', 'LY', '🇱🇾', '+218', NULL, NULL),
(127, 'Liechtenstein', 'LI', '🇱🇮', '+423', NULL, NULL),
(128, 'Lithuania', 'LT', '🇱🇹', '+370', NULL, NULL),
(129, 'Luxembourg', 'LU', '🇱🇺', '+352', NULL, NULL),
(130, 'Macao', 'MO', '🇲🇴', '+853', NULL, NULL),
(131, 'Macedonia', 'MK', '🇲🇰', '+389', NULL, NULL),
(132, 'Madagascar', 'MG', '🇲🇬', '+261', NULL, NULL),
(133, 'Malawi', 'MW', '🇲🇼', '+265', NULL, NULL),
(134, 'Malaysia', 'MY', '🇲🇾', '+60', NULL, NULL),
(135, 'Maldives', 'MV', '🇲🇻', '+960', NULL, NULL),
(136, 'Mali', 'ML', '🇲🇱', '+223', NULL, NULL),
(137, 'Malta', 'MT', '🇲🇹', '+356', NULL, NULL),
(138, 'Marshall Islands', 'MH', '🇲🇭', '+692', NULL, NULL),
(139, 'Martinique', 'MQ', '🇲🇶', '+596', NULL, NULL),
(140, 'Mauritania', 'MR', '🇲🇷', '+222', NULL, NULL),
(141, 'Mauritius', 'MU', '🇲🇺', '+230', NULL, NULL),
(142, 'Mayotte', 'YT', '🇾🇹', '+262', NULL, NULL),
(143, 'Mexico', 'MX', '🇲🇽', '+52', NULL, NULL),
(144, 'Micronesia, Federated States of Micronesia', 'FM', '🇫🇲', '+691', NULL, NULL),
(145, 'Moldova', 'MD', '🇲🇩', '+373', NULL, NULL),
(146, 'Monaco', 'MC', '🇲🇨', '+377', NULL, NULL),
(147, 'Mongolia', 'MN', '🇲🇳', '+976', NULL, NULL),
(148, 'Montenegro', 'ME', '🇲🇪', '+382', NULL, NULL),
(149, 'Montserrat', 'MS', '🇲🇸', '+1664', NULL, NULL),
(150, 'Morocco', 'MA', '🇲🇦', '+212', NULL, NULL),
(151, 'Mozambique', 'MZ', '🇲🇿', '+258', NULL, NULL),
(152, 'Myanmar', 'MM', '🇲🇲', '+95', NULL, NULL),
(153, 'Namibia', 'NA', '🇳🇦', '+264', NULL, NULL),
(154, 'Nauru', 'NR', '🇳🇷', '+674', NULL, NULL),
(155, 'Nepal', 'NP', '🇳🇵', '+977', NULL, NULL),
(156, 'Netherlands', 'NL', '🇳🇱', '+31', NULL, NULL),
(157, 'Netherlands Antilles', 'AN', '', '+599', NULL, NULL),
(158, 'New Caledonia', 'NC', '🇳🇨', '+687', NULL, NULL),
(159, 'New Zealand', 'NZ', '🇳🇿', '+64', NULL, NULL),
(160, 'Nicaragua', 'NI', '🇳🇮', '+505', NULL, NULL),
(161, 'Niger', 'NE', '🇳🇪', '+227', NULL, NULL),
(162, 'Nigeria', 'NG', '🇳🇬', '+234', NULL, NULL),
(163, 'Niue', 'NU', '🇳🇺', '+683', NULL, NULL),
(164, 'Norfolk Island', 'NF', '🇳🇫', '+672', NULL, NULL),
(165, 'Northern Mariana Islands', 'MP', '🇲🇵', '+1670', NULL, NULL),
(166, 'Norway', 'NO', '🇳🇴', '+47', NULL, NULL),
(167, 'Oman', 'OM', '🇴🇲', '+968', NULL, NULL),
(168, 'Pakistan', 'PK', '🇵🇰', '+92', NULL, NULL),
(169, 'Palau', 'PW', '🇵🇼', '+680', NULL, NULL),
(170, 'Palestinian Territory, Occupied', 'PS', '🇵🇸', '+970', NULL, NULL),
(171, 'Panama', 'PA', '🇵🇦', '+507', NULL, NULL),
(172, 'Papua New Guinea', 'PG', '🇵🇬', '+675', NULL, NULL),
(173, 'Paraguay', 'PY', '🇵🇾', '+595', NULL, NULL),
(174, 'Peru', 'PE', '🇵🇪', '+51', NULL, NULL),
(175, 'Philippines', 'PH', '🇵🇭', '+63', NULL, NULL),
(176, 'Pitcairn', 'PN', '🇵🇳', '+64', NULL, NULL),
(177, 'Poland', 'PL', '🇵🇱', '+48', NULL, NULL),
(178, 'Portugal', 'PT', '🇵🇹', '+351', NULL, NULL),
(179, 'Puerto Rico', 'PR', '🇵🇷', '+1939', NULL, NULL),
(180, 'Qatar', 'QA', '🇶🇦', '+974', NULL, NULL),
(181, 'Romania', 'RO', '🇷🇴', '+40', NULL, NULL),
(182, 'Russia', 'RU', '🇷🇺', '+7', NULL, NULL),
(183, 'Rwanda', 'RW', '🇷🇼', '+250', NULL, NULL),
(184, 'Reunion', 'RE', '🇷🇪', '+262', NULL, NULL),
(185, 'Saint Barthelemy', 'BL', '🇧🇱', '+590', NULL, NULL),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'SH', '🇸🇭', '+290', NULL, NULL),
(187, 'Saint Kitts and Nevis', 'KN', '🇰🇳', '+1869', NULL, NULL),
(188, 'Saint Lucia', 'LC', '🇱🇨', '+1758', NULL, NULL),
(189, 'Saint Martin', 'MF', '🇲🇫', '+590', NULL, NULL),
(190, 'Saint Pierre and Miquelon', 'PM', '🇵🇲', '+508', NULL, NULL),
(191, 'Saint Vincent and the Grenadines', 'VC', '🇻🇨', '+1784', NULL, NULL),
(192, 'Samoa', 'WS', '🇼🇸', '+685', NULL, NULL),
(193, 'San Marino', 'SM', '🇸🇲', '+378', NULL, NULL),
(194, 'Sao Tome and Principe', 'ST', '🇸🇹', '+239', NULL, NULL),
(195, 'Saudi Arabia', 'SA', '🇸🇦', '+966', NULL, NULL),
(196, 'Senegal', 'SN', '🇸🇳', '+221', NULL, NULL),
(197, 'Serbia', 'RS', '🇷🇸', '+381', NULL, NULL),
(198, 'Seychelles', 'SC', '🇸🇨', '+248', NULL, NULL),
(199, 'Sierra Leone', 'SL', '🇸🇱', '+232', NULL, NULL),
(200, 'Singapore', 'SG', '🇸🇬', '+65', NULL, NULL),
(201, 'Slovakia', 'SK', '🇸🇰', '+421', NULL, NULL),
(202, 'Slovenia', 'SI', '🇸🇮', '+386', NULL, NULL),
(203, 'Solomon Islands', 'SB', '🇸🇧', '+677', NULL, NULL),
(204, 'Somalia', 'SO', '🇸🇴', '+252', NULL, NULL),
(205, 'South Africa', 'ZA', '🇿🇦', '+27', NULL, NULL),
(206, 'South Sudan', 'SS', '🇸🇸', '+211', NULL, NULL),
(207, 'South Georgia and the South Sandwich Islands', 'GS', '🇬🇸', '+500', NULL, NULL),
(208, 'Spain', 'ES', '🇪🇸', '+34', NULL, NULL),
(209, 'Sri Lanka', 'LK', '🇱🇰', '+94', NULL, NULL),
(210, 'Sudan', 'SD', '🇸🇩', '+249', NULL, NULL),
(211, 'Suriname', 'SR', '🇸🇷', '+597', NULL, NULL),
(212, 'Svalbard and Jan Mayen', 'SJ', '🇸🇯', '+47', NULL, NULL),
(213, 'Eswatini', 'SZ', '🇸🇿', '+268', NULL, NULL),
(214, 'Sweden', 'SE', '🇸🇪', '+46', NULL, NULL),
(215, 'Switzerland', 'CH', '🇨🇭', '+41', NULL, NULL),
(216, 'Syrian Arab Republic', 'SY', '🇸🇾', '+963', NULL, NULL),
(217, 'Taiwan', 'TW', '🇹🇼', '+886', NULL, NULL),
(218, 'Tajikistan', 'TJ', '🇹🇯', '+992', NULL, NULL),
(219, 'Tanzania, United Republic of Tanzania', 'TZ', '🇹🇿', '+255', NULL, NULL),
(220, 'Thailand', 'TH', '🇹🇭', '+66', NULL, NULL),
(221, 'Timor-Leste', 'TL', '🇹🇱', '+670', NULL, NULL),
(222, 'Togo', 'TG', '🇹🇬', '+228', NULL, NULL),
(223, 'Tokelau', 'TK', '🇹🇰', '+690', NULL, NULL),
(224, 'Tonga', 'TO', '🇹🇴', '+676', NULL, NULL),
(225, 'Trinidad and Tobago', 'TT', '🇹🇹', '+1868', NULL, NULL),
(226, 'Tunisia', 'TN', '🇹🇳', '+216', NULL, NULL),
(227, 'Turkey', 'TR', '🇹🇷', '+90', NULL, NULL),
(228, 'Turkmenistan', 'TM', '🇹🇲', '+993', NULL, NULL),
(229, 'Turks and Caicos Islands', 'TC', '🇹🇨', '+1649', NULL, NULL),
(230, 'Tuvalu', 'TV', '🇹🇻', '+688', NULL, NULL),
(231, 'Uganda', 'UG', '🇺🇬', '+256', NULL, NULL),
(232, 'Ukraine', 'UA', '🇺🇦', '+380', NULL, NULL),
(233, 'United Arab Emirates', 'AE', '🇦🇪', '+971', NULL, NULL),
(234, 'United Kingdom', 'GB', '🇬🇧', '+44', NULL, NULL),
(235, 'United States', 'US', '🇺🇸', '+1', NULL, NULL),
(236, 'Uruguay', 'UY', '🇺🇾', '+598', NULL, NULL),
(237, 'Uzbekistan', 'UZ', '🇺🇿', '+998', NULL, NULL),
(238, 'Vanuatu', 'VU', '🇻🇺', '+678', NULL, NULL),
(239, 'Venezuela, Bolivarian Republic of Venezuela', 'VE', '🇻🇪', '+58', NULL, NULL),
(240, 'Vietnam', 'VN', '🇻🇳', '+84', NULL, NULL),
(241, 'Virgin Islands, British', 'VG', '🇻🇬', '+1284', NULL, NULL),
(242, 'Virgin Islands, U.S.', 'VI', '🇻🇮', '+1340', NULL, NULL),
(243, 'Wallis and Futuna', 'WF', '🇼🇫', '+681', NULL, NULL),
(244, 'Yemen', 'YE', '🇾🇪', '+967', NULL, NULL),
(245, 'Zambia', 'ZM', '🇿🇲', '+260', NULL, NULL),
(246, 'Zimbabwe', 'ZW', '🇿🇼', '+263', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customized_reports`
--

CREATE TABLE `customized_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_date` date NOT NULL,
  `report_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_reminders`
--

CREATE TABLE `email_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reminder_type` varchar(255) DEFAULT NULL,
  `reminder_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reminder_sent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `products` text DEFAULT NULL,
  `issue_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `total_amount` int(11) NOT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `tax_percentage` int(11) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_categories`
--

CREATE TABLE `invoice_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_dates`
--

CREATE TABLE `key_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `key_date_description` text NOT NULL,
  `key_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reminder_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_29_134743_create_tenants_table', 1),
(6, '2023_10_29_135045_create_properties_table', 1),
(7, '2023_10_29_135456_create_contracts_table', 1),
(8, '2023_10_29_140024_create_tasks_table', 1),
(9, '2023_10_29_140224_create_key_dates_table', 1),
(10, '2023_10_29_140326_create_address_books_table', 1),
(11, '2023_10_29_140451_create_rent_payments_table', 1),
(12, '2023_10_29_140729_create_automated_indexings_table', 1),
(13, '2023_10_29_141044_create_charge_settlements_table', 1),
(14, '2023_10_29_141300_create_customized_reports_table', 1),
(15, '2023_10_29_141531_create_email_reminders_table', 1),
(16, '2023_10_29_141848_create_sales_table', 1),
(17, '2023_10_29_142724_create_admins_table', 1),
(18, '2023_11_27_221239_add_field_rent_in_properties_table', 1),
(19, '2023_11_27_231652_add_fields_to_properties_table', 1),
(20, '2023_11_30_011817_add_new_field_in_tenants_table', 1),
(21, '2023_12_03_122508_add_field_in_tasks_table', 1),
(22, '2023_12_08_165852_change_column_in_address_books', 1),
(23, '2023_12_08_173718_change_field_in_address_books', 1),
(24, '2023_12_26_050653_add_field_in_users', 1),
(25, '2023_12_26_051147_add_field_in_users', 1),
(26, '2023_12_26_053353_add_field_in_properties', 1),
(27, '2023_12_30_074826_add_field_in_key_dates', 1),
(28, '2023_12_31_061730_add_field_in_contracts', 1),
(29, '2024_01_01_060919_create_countries_table', 1),
(30, '2024_01_01_061537_add_field_in_properties', 1),
(31, '2024_01_01_063731_create_vat_rates_table', 1),
(32, '2024_01_02_143134_create_invoice_categories_table', 1),
(33, '2024_01_02_143151_create_invoices_table', 1),
(34, '2024_01_02_201616_change_field_in_invoices', 1),
(35, '2024_01_03_063649_change_field_in_invoices', 1),
(36, '2024_01_04_144805_create_rent_follow_ups_table', 1),
(37, '2024_01_07_085441_add_field_in_automated_indexings', 1),
(38, '2024_01_07_091817_create_invoice_payments_table', 1),
(39, '2024_01_15_094930_change_field_in_email_reminders', 1),
(40, '2024_01_15_125816_change_columns_in_email_reminders', 1),
(41, '2024_02_03_135252_add_field_in_address_books', 1),
(42, '2024_02_03_140041_change_field_in_address_books', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `rent_amount` bigint(20) NOT NULL,
  `number_of_beds` int(11) NOT NULL,
  `number_of_baths` int(11) NOT NULL,
  `total_area` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cadastral_number` varchar(255) DEFAULT NULL,
  `rental_period` int(11) DEFAULT NULL,
  `security_deposit` int(11) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `terms_of_agreement` text DEFAULT NULL,
  `energy_performance_certificate` text DEFAULT NULL,
  `inventory_report` text DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `living_area` int(11) DEFAULT NULL,
  `electricity_information` text DEFAULT NULL,
  `gas_information` text DEFAULT NULL,
  `water_information` text DEFAULT NULL,
  `internet_information` text DEFAULT NULL,
  `key_information` text DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `address`, `rent_amount`, `number_of_beds`, `number_of_baths`, `total_area`, `status`, `created_at`, `updated_at`, `cadastral_number`, `rental_period`, `security_deposit`, `floors`, `owner_id`, `tenant_id`, `terms_of_agreement`, `energy_performance_certificate`, `inventory_report`, `manager_id`, `living_area`, `electricity_information`, `gas_information`, `water_information`, `internet_information`, `key_information`, `additional_notes`, `country_id`) VALUES
(1, 'Esse est pariatur', 45, 315, 168, 26, 'available', '2024-03-27 10:37:25', '2024-03-27 10:37:25', 'CAD1711540940', 66, 20, 77, 1, NULL, NULL, '1711535845-dummy.pdf', NULL, 1, 1, 'a:2:{s:4:\"info\";s:19:\"Consequatur non sin\";s:5:\"price\";s:3:\"842\";}', 'a:2:{s:4:\"info\";s:20:\"Laboris exercitation\";s:5:\"price\";s:3:\"809\";}', 'a:2:{s:4:\"info\";s:19:\"Ea consequat Deseru\";s:5:\"price\";s:3:\"143\";}', 'a:2:{s:4:\"info\";s:19:\"Tempore maxime illu\";s:5:\"price\";s:2:\"82\";}', NULL, 'Est fuga Iusto eos', 122);

-- --------------------------------------------------------

--
-- Table structure for table `rent_follow_ups`
--

CREATE TABLE `rent_follow_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_payments`
--

CREATE TABLE `rent_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `sale_price` bigint(20) NOT NULL,
  `sale_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `task_description` text NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `move_in_date` date DEFAULT NULL,
  `move_out_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vat_rates`
--

CREATE TABLE `vat_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat_rates` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_books`
--
ALTER TABLE `address_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `automated_indexings`
--
ALTER TABLE `automated_indexings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `automated_indexings_tenant_id_foreign` (`tenant_id`),
  ADD KEY `automated_indexings_property_id_foreign` (`property_id`),
  ADD KEY `automated_indexings_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `charge_settlements`
--
ALTER TABLE `charge_settlements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charge_settlements_tenant_id_foreign` (`tenant_id`),
  ADD KEY `charge_settlements_property_id_foreign` (`property_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contracts_contract_id_unique` (`contract_id`),
  ADD KEY `contracts_property_id_foreign` (`property_id`),
  ADD KEY `contracts_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customized_reports`
--
ALTER TABLE `customized_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customized_reports_tenant_id_foreign` (`tenant_id`),
  ADD KEY `customized_reports_property_id_foreign` (`property_id`);

--
-- Indexes for table `email_reminders`
--
ALTER TABLE `email_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_reminders_tenant_id_foreign` (`tenant_id`),
  ADD KEY `email_reminders_property_id_foreign` (`property_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_invoice_category_id_foreign` (`invoice_category_id`),
  ADD KEY `invoices_property_id_foreign` (`property_id`),
  ADD KEY `invoices_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `invoice_categories`
--
ALTER TABLE `invoice_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `key_dates`
--
ALTER TABLE `key_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_dates_tenant_id_foreign` (`tenant_id`),
  ADD KEY `key_dates_property_id_foreign` (`property_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_cadastral_number_unique` (`cadastral_number`),
  ADD KEY `properties_country_id_foreign` (`country_id`),
  ADD KEY `properties_manager_id_foreign` (`manager_id`),
  ADD KEY `properties_owner_id_foreign` (`owner_id`),
  ADD KEY `properties_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `rent_follow_ups`
--
ALTER TABLE `rent_follow_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_follow_ups_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `rent_payments`
--
ALTER TABLE `rent_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_payments_tenant_id_foreign` (`tenant_id`),
  ADD KEY `rent_payments_property_id_foreign` (`property_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_property_id_foreign` (`property_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_tenant_id_foreign` (`tenant_id`),
  ADD KEY `tasks_property_id_foreign` (`property_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_email_unique` (`email`),
  ADD UNIQUE KEY `tenants_phone_unique` (`phone`),
  ADD KEY `tenants_property_id_foreign` (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `vat_rates`
--
ALTER TABLE `vat_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vat_rates_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_books`
--
ALTER TABLE `address_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `automated_indexings`
--
ALTER TABLE `automated_indexings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charge_settlements`
--
ALTER TABLE `charge_settlements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customized_reports`
--
ALTER TABLE `customized_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_reminders`
--
ALTER TABLE `email_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_categories`
--
ALTER TABLE `invoice_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_dates`
--
ALTER TABLE `key_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rent_follow_ups`
--
ALTER TABLE `rent_follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_payments`
--
ALTER TABLE `rent_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vat_rates`
--
ALTER TABLE `vat_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automated_indexings`
--
ALTER TABLE `automated_indexings`
  ADD CONSTRAINT `automated_indexings_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `automated_indexings_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `automated_indexings_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `charge_settlements`
--
ALTER TABLE `charge_settlements`
  ADD CONSTRAINT `charge_settlements_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `charge_settlements_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `contracts_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `address_books` (`id`);

--
-- Constraints for table `customized_reports`
--
ALTER TABLE `customized_reports`
  ADD CONSTRAINT `customized_reports_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `customized_reports_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `email_reminders`
--
ALTER TABLE `email_reminders`
  ADD CONSTRAINT `email_reminders_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `email_reminders_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_invoice_category_id_foreign` FOREIGN KEY (`invoice_category_id`) REFERENCES `invoice_categories` (`id`),
  ADD CONSTRAINT `invoices_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `invoices_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD CONSTRAINT `invoice_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `key_dates`
--
ALTER TABLE `key_dates`
  ADD CONSTRAINT `key_dates_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `key_dates_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `properties_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `address_books` (`id`),
  ADD CONSTRAINT `properties_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `address_books` (`id`),
  ADD CONSTRAINT `properties_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `address_books` (`id`);

--
-- Constraints for table `rent_follow_ups`
--
ALTER TABLE `rent_follow_ups`
  ADD CONSTRAINT `rent_follow_ups_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `rent_payments`
--
ALTER TABLE `rent_payments`
  ADD CONSTRAINT `rent_payments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `rent_payments_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tasks_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `vat_rates`
--
ALTER TABLE `vat_rates`
  ADD CONSTRAINT `vat_rates_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
