-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 10:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expat`
--

-- --------------------------------------------------------

--
-- Table structure for table `3520_foreign_trusts`
--

CREATE TABLE `3520_foreign_trusts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_grantor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trust_info_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_trust_obligated_by_law` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trust_owners` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `5471_company_information`
--

CREATE TABLE `5471_company_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `5471_foreign_corporations_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foreign_tax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incorporation_date` date DEFAULT NULL,
  `corporation_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_laws` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_bank_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_activity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_in_us` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_branch_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_branch_id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filed_ustax_return` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_tax_paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_shares_issued` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `5471_company_shareholders`
--

CREATE TABLE `5471_company_shareholders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `5471_company_information_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownership_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownership_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `5471_foreign_corporations`
--

CREATE TABLE `5471_foreign_corporations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `operation_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_you_officer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signed_financial_stmt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advanced_child_tax_payments`
--

CREATE TABLE `advanced_child_tax_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amended_returns_files`
--

CREATE TABLE `amended_returns_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filings_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amended_returns_files`
--

INSERT INTO `amended_returns_files` (`id`, `filings_id`, `file`, `created_at`, `updated_at`) VALUES
(4, 2, 'files/DACVnN3vxnstFnFZ6ydLqRmhsC0gPUti8wbIgRZQ.pdf', '2022-06-19 00:49:30', '2022-06-19 00:49:30'),
(5, 2, 'files/dMu2todZofct0pfMlO98Qd6krLf1hqmTE3eBXm8F.pdf', '2022-06-19 00:49:30', '2022-06-19 00:49:30'),
(6, 2, 'files/oru9HGxinPhNXIorJSpxoSe9upOxcC0FfVBtXcis.png', '2022-06-19 00:49:30', '2022-06-19 00:49:30'),
(7, 2, 'files/scOHbaQaaZB2GCsppCJWGTQoKQw7t5DgID9Ltyoh.pdf', '2022-06-19 16:15:52', '2022-06-19 16:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `bank_information`
--

CREATE TABLE `bank_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_information`
--

INSERT INTO `bank_information` (`id`, `user_id`, `account_type`, `account_number`, `routing_number`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, '2345', 'sssjs', '2022-06-19 04:51:21', '2022-06-19 04:51:21'),
(3, 2, 'Savings Account', '0557303541', '655555', '2022-06-19 22:02:38', '2022-06-19 22:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `buisness_incomes`
--

CREATE TABLE `buisness_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_year_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_self_employed_israel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_self_employed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_names` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_name_business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principle_activity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_operates` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_start_date` date DEFAULT NULL,
  `employ_worker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_file_forms1099` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_other_self_employed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nec1099_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_income_from_nec1099` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buisness_incomes`
--

INSERT INTO `buisness_incomes` (`id`, `user_id`, `filing_years_id`, `filing_year_id`, `country`, `is_self_employed_israel`, `is_self_employed`, `business_names`, `is_name_business_name`, `business_address`, `principle_activity`, `who_operates`, `business_start_date`, `employ_worker`, `is_file_forms1099`, `is_other_self_employed`, `nec1099_file`, `is_income_from_nec1099`, `created_at`, `updated_at`) VALUES
(1, 2, 9, NULL, 'AL', NULL, 'yes', 'Mildax Technology,kk,bisness3', 'Mildax Technology', 'White House Street', 'Augustin Dennis', 'spouse', '2022-07-04', 'yes', 'no', 'yes', 'files/kfCyIlytirHNmfbEaMAupEqV83o4F02yFWZHeSjI.jpg', 'yes', '2022-07-02 14:07:38', '2022-07-04 23:48:14'),
(2, 2, 10, NULL, 'IL', 'yes', 'yes', '', 'Lyle Hartman', 'Leah Benton', 'Christen Thomas', 'taxpayer', '2020-03-06', 'yes', 'yes', 'yes', 'files/3EaEJxj3Oxk8e4z6WQU62u5N9NDLEXTS62MzFgLC.webp', 'yes', '2022-07-02 14:10:29', '2022-07-02 14:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `street_address`, `city`, `country`, `zipcode`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Luke', 'Steel', 'Blythe', 'Destiny', 'Casey', 'safitybosa@mailinator.com', '2022-06-19 04:36:26', '2022-06-19 04:36:26'),
(2, 2, 'Morgan', 'Coby', 'Yetta', 'Martha', '0551303541', 'vame@mailinator.com', '2022-06-19 22:02:26', '2022-06-19 22:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `cost_of_goods_solds`
--

CREATE TABLE `cost_of_goods_solds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `do_you_have` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_value_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_changes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_inventory` double DEFAULT NULL,
  `purchases_amount` double DEFAULT NULL,
  `cost_of_withdrawn_items` double DEFAULT NULL,
  `labor_cost` double DEFAULT NULL,
  `materials_cost` double DEFAULT NULL,
  `other_cost` double DEFAULT NULL,
  `end_inventory_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_of_goods_solds`
--

INSERT INTO `cost_of_goods_solds` (`id`, `user_id`, `filing_years_id`, `do_you_have`, `inventory_value_method`, `any_changes`, `beginning_inventory`, `purchases_amount`, `cost_of_withdrawn_items`, `labor_cost`, `materials_cost`, `other_cost`, `end_inventory_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'yes', 'lroem', 'lorem', 22, 2122, 22, 36, 57, 5, 77, '2022-07-05 00:42:13', '2022-07-05 00:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `phonecode` int(5) NOT NULL,
  `countrycode` char(2) NOT NULL,
  `countryname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `phonecode`, `countrycode`, `countryname`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `c_corporation1120s`
--

CREATE TABLE `c_corporation1120s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_first_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_filed_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_provided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ustax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_employ_worker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `independent_contractors_payments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_1099MISC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_sharholders_transactions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_of_year_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_assets_worth_one_million` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_income` double DEFAULT NULL,
  `has_expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising` double DEFAULT NULL,
  `vehicle` double DEFAULT NULL,
  `commissions` double DEFAULT NULL,
  `contract_labor` double DEFAULT NULL,
  `goods_sold` double DEFAULT NULL,
  `depletion` double DEFAULT NULL,
  `employee_benefits` double DEFAULT NULL,
  `employee_benefits_program` double DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `self_employed_health_insurance` double DEFAULT NULL,
  `mortgage_interest` double DEFAULT NULL,
  `other_interest` double DEFAULT NULL,
  `legal_services` double DEFAULT NULL,
  `office_expenses` double DEFAULT NULL,
  `pension` double DEFAULT NULL,
  `vehicle_rental` double DEFAULT NULL,
  `machinery_rental` double DEFAULT NULL,
  `other_items_rental` double DEFAULT NULL,
  `repairs` double DEFAULT NULL,
  `supplies` double DEFAULT NULL,
  `taxes` double DEFAULT NULL,
  `travel` double DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `wages_expense` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `cost_of_goods_sold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_inventory_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close_inventory_challenge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_spent_on_purchases` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_items_for_personal_use` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_costs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_end_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_corporation1120s`
--

INSERT INTO `c_corporation1120s` (`id`, `user_id`, `filing_years_id`, `is_first_time`, `last_filed_form`, `corporation_name`, `corporation_address`, `ein`, `product_provided`, `principal_business`, `corporation_date`, `shareholder_name`, `shareholder_address`, `shareholder_percentage`, `ustax_no`, `is_employ_worker`, `independent_contractors_payments`, `file_1099MISC`, `foreign_sharholders_transactions`, `end_of_year_balance`, `are_assets_worth_one_million`, `balance_sheet`, `profit_loss_statement`, `profit_loss_statement_file`, `income_currency`, `gross_income`, `has_expenses`, `advertising`, `vehicle`, `commissions`, `contract_labor`, `goods_sold`, `depletion`, `employee_benefits`, `employee_benefits_program`, `insurance`, `self_employed_health_insurance`, `mortgage_interest`, `other_interest`, `legal_services`, `office_expenses`, `pension`, `vehicle_rental`, `machinery_rental`, `other_items_rental`, `repairs`, `supplies`, `taxes`, `travel`, `meal`, `utilities`, `wages_expense`, `other_expenses`, `cost_of_goods_sold`, `closing_inventory_method`, `open_close_inventory_challenge`, `beginning_inventory_amount`, `amount_spent_on_purchases`, `cost_of_items_for_personal_use`, `labor_cost`, `material_cost`, `other_costs`, `year_end_inventory_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'yes', 'files/Gke4Y6kli4HoF9mOVCUpOy34xY8qnkmBjRbB7BI5.png', 'Flavia Martin', 'Kitra Pearson', 'Clio Mclean', 'Clark Burns', 'Felicia Rogers', '1981-02-08', 'Francis Nartey', 'White House Street', '22', '123456', 'yes', 'yes', 'yes', 'yes', '417', 'yes', 'files/SOxosobfN8DcyDi6ea8fSevjBchfTK20bOge30SZ.webp', 'yes', 'files/Z1jym0uQiRKJA3xwZfU5wWG8EjFRNc7BfcSLu8JN.png', 'AOA', 200, 'yes', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 'yes', 'others', 'lorem', '22', '22', '100', '21', '22', '32', '52', '2022-07-05 01:50:31', '2022-07-05 01:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE `dependents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn_date` date DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naturalized` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dependents`
--

INSERT INTO `dependents` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `ssn`, `ssn_date`, `birth_date`, `relationship`, `naturalized`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aquilaw', 'Blaine', 'Nehru', 'Keely', '2006-07-24', '2012-01-26', 'daughter', 'yes', NULL, '2022-06-19 04:29:27', '2022-06-19 21:20:34'),
(4, 2, 'Ryder', 'Ferris', 'Ezekiel', 'Emery', '1995-04-02', '1973-02-20', 'other', 'no', NULL, '2022-06-19 22:02:11', '2022-06-19 22:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `doch_revach_files`
--

CREATE TABLE `doch_revach_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `buisness_incomes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimated_tax_payments`
--

CREATE TABLE `estimated_tax_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimated_tax_payments`
--

INSERT INTO `estimated_tax_payments` (`id`, `user_id`, `filing_years_id`, `payment_date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 2, 9, '2022-07-18', 10, '2022-06-22 01:47:35', '2022-06-22 02:41:38'),
(3, 2, 9, '2022-07-19', 12, '2022-06-22 01:47:35', '2022-06-22 02:19:01'),
(4, 2, 9, '2022-07-21', 14, '2022-06-22 01:47:35', '2022-06-22 02:19:01'),
(5, 2, 9, '2022-07-21', 15, '2022-06-22 01:47:35', '2022-06-22 02:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fbr8938s`
--

CREATE TABLE `fbr8938s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `are_you_required_to_file_fbar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fbr8938_accounts`
--

CREATE TABLE `fbr8938_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fbr8938s_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_it_new_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_account_closed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_balance` double DEFAULT NULL,
  `balance_on_31dec` double DEFAULT NULL,
  `primary_account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownership_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_acc_holders` int(11) DEFAULT NULL,
  `additional_acc_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filings`
--

CREATE TABLE `filings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `additional_returns` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partnership` tinyint(4) DEFAULT 0,
  `foreign_corporation` tinyint(4) DEFAULT 0,
  `ccorporation` tinyint(4) DEFAULT 0,
  `scorporation` tinyint(4) DEFAULT 0,
  `not_profit` tinyint(4) DEFAULT 0,
  `amended_returns` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returning_clients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ustax_return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ustax_return_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxreturn_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duedate_return` date DEFAULT NULL,
  `claimed_dependent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streamlined_filing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `non_willful_wording` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `immigrated_date` date DEFAULT NULL,
  `living_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ippin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cant_find_ip_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filings`
--

INSERT INTO `filings` (`id`, `filing_years_id`, `additional_returns`, `partnership`, `foreign_corporation`, `ccorporation`, `scorporation`, `not_profit`, `amended_returns`, `returning_clients`, `ustax_return`, `ustax_return_file`, `taxreturn_extension`, `duedate_return`, `claimed_dependent`, `streamlined_filing`, `non_willful_wording`, `immigrated_date`, `living_us`, `ip_pin`, `ippin_number`, `cant_find_ip_pin`, `created_at`, `updated_at`) VALUES
(2, 1, 'yes', 1, NULL, 1, 1, 1, 'yes', 'no', 'no', 'files/YmubfZJf7KjaxOzKcxo66g1g7ZhbkMwdIigIBePv.png', 'yes', '2022-06-18', 'no', 'yes', 'mkmll', '2022-06-17', 'no', 'yes', 'jjjjj88', 'yes', '2022-06-19 00:49:30', '2022-06-19 16:23:03'),
(6, 9, 'no', NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, 'no', NULL, 'no', 'no', NULL, '2022-06-19', 'yes', 'no', NULL, NULL, '2022-06-19 21:59:43', '2022-06-19 22:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `filing_years`
--

CREATE TABLE `filing_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filing_years`
--

INSERT INTO `filing_years` (`id`, `user_id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2018', 0, '2022-06-18 18:06:56', '2022-06-18 18:06:56'),
(2, 1, '2020', 0, '2022-06-18 18:06:56', '2022-06-18 18:06:56'),
(3, 1, '2021', 0, '2022-06-18 18:06:56', '2022-06-18 18:06:56'),
(9, 2, '2021', 1, '2022-06-19 21:51:04', '2022-06-19 21:51:04'),
(10, 2, '2022', 1, '2022-06-21 00:03:07', '2022-06-21 00:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `foreign_earned_incomes`
--

CREATE TABLE `foreign_earned_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `separate_family_residence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_residence_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_resided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_start_date` date DEFAULT NULL,
  `residence_end_date` date DEFAULT NULL,
  `type_of_living_quarters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `did_family_live_with_you_abroad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_reside_period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stmt_to_foreign_country_authorities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_tax_to_foreign_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_in_us` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_arrival_date` date DEFAULT NULL,
  `us_date_left` date DEFAULT NULL,
  `us_business_days` int(11) DEFAULT NULL,
  `us_income` double DEFAULT NULL,
  `contractual_terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_limit_stay_lenght` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_way` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintain_us_home` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_home_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foreign_earned_incomes`
--

INSERT INTO `foreign_earned_incomes` (`id`, `user_id`, `filing_years_id`, `employer_name`, `employer_address`, `national`, `separate_family_residence`, `family_country`, `family_city`, `family_residence_days`, `country_resided`, `residence_start_date`, `residence_end_date`, `type_of_living_quarters`, `did_family_live_with_you_abroad`, `relative_name`, `relative_reside_period`, `stmt_to_foreign_country_authorities`, `pay_tax_to_foreign_country`, `present_in_us`, `us_arrival_date`, `us_date_left`, `us_business_days`, `us_income`, `contractual_terms`, `visa_type`, `visa_limit_stay_lenght`, `limit_way`, `maintain_us_home`, `us_home_address`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'Francis Nartey', 'White House Street', 'GH', 'yes', 'AT', 'Incididunt cupiditat', '22', 'AZ', '2022-07-02', '2022-07-02', 'Purchased home', 'no', '', NULL, 'no', NULL, 'yes', '2022-07-02', '2022-07-02', 33, 22, 'lorem', 'lorem', 'no', NULL, 'yes', 'White House Street', '2022-07-02 02:22:05', '2022-07-02 02:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `foreign_house_exclusions`
--

CREATE TABLE `foreign_house_exclusions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rent` double DEFAULT NULL,
  `household_repairs` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `property_insurance` double DEFAULT NULL,
  `occupancy_taxes` double DEFAULT NULL,
  `nonrefundable_security` double DEFAULT NULL,
  `furniture_rental` double DEFAULT NULL,
  `residential_parking_fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_corporation1120fs`
--

CREATE TABLE `f_corporation1120fs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_first_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_filed_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_provided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ustax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_employ_worker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `independent_contractors_payments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_1099MISC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_sharholders_transactions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_of_year_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_assets_worth_one_million` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_income` double DEFAULT NULL,
  `has_expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising` double DEFAULT NULL,
  `vehicle` double DEFAULT NULL,
  `commissions` double DEFAULT NULL,
  `contract_labor` double DEFAULT NULL,
  `goods_sold` double DEFAULT NULL,
  `depletion` double DEFAULT NULL,
  `employee_benefits` double DEFAULT NULL,
  `employee_benefits_program` double DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `self_employed_health_insurance` double DEFAULT NULL,
  `mortgage_interest` double DEFAULT NULL,
  `other_interest` double DEFAULT NULL,
  `legal_services` double DEFAULT NULL,
  `office_expenses` double DEFAULT NULL,
  `pension` double DEFAULT NULL,
  `vehicle_rental` double DEFAULT NULL,
  `machinery_rental` double DEFAULT NULL,
  `other_items_rental` double DEFAULT NULL,
  `repairs` double DEFAULT NULL,
  `supplies` double DEFAULT NULL,
  `taxes` double DEFAULT NULL,
  `travel` double DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `wages_expense` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `cost_of_goods_sold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_inventory_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close_inventory_challenge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_spent_on_purchases` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_items_for_personal_use` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_costs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_end_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_information`
--

CREATE TABLE `general_information` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `amended_returns` tinyint(1) DEFAULT NULL,
  `returning_clients` tinyint(1) DEFAULT NULL,
  `ustax_return` tinyint(1) DEFAULT NULL,
  `taxreturn_extension` tinyint(1) DEFAULT NULL,
  `duedate_return` datetime DEFAULT NULL,
  `claimed_dependent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_questions`
--

CREATE TABLE `general_questions` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `living_us` tinyint(1) NOT NULL,
  `ip_pin` tinyint(1) NOT NULL,
  `ippin_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_expenses`
--

CREATE TABLE `income_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_year` date DEFAULT NULL,
  `amount_of_gross` double DEFAULT NULL,
  `has_expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising` double DEFAULT NULL,
  `vehicle` double DEFAULT NULL,
  `commissions` double DEFAULT NULL,
  `goods_sold` double DEFAULT NULL,
  `depletion` double DEFAULT NULL,
  `employee_benefits` double DEFAULT NULL,
  `employee_benefits_program` double DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `self_employed_health_insurance` double DEFAULT NULL,
  `mortgage_interest` double DEFAULT NULL,
  `other_interest` double DEFAULT NULL,
  `legal_services` double DEFAULT NULL,
  `office_expenses` double DEFAULT NULL,
  `pension` double DEFAULT NULL,
  `vehicle_rental` double DEFAULT NULL,
  `machinery_rental` double DEFAULT NULL,
  `other_items_rental` double DEFAULT NULL,
  `repairs` double DEFAULT NULL,
  `supplies` double DEFAULT NULL,
  `taxes` double DEFAULT NULL,
  `travel` double DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `wages_expense` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_expenses`
--

INSERT INTO `income_expenses` (`id`, `user_id`, `filing_years_id`, `tax_year`, `amount_of_gross`, `has_expenses`, `advertising`, `vehicle`, `commissions`, `goods_sold`, `depletion`, `employee_benefits`, `employee_benefits_program`, `insurance`, `self_employed_health_insurance`, `mortgage_interest`, `other_interest`, `legal_services`, `office_expenses`, `pension`, `vehicle_rental`, `machinery_rental`, `other_items_rental`, `repairs`, `supplies`, `taxes`, `travel`, `meal`, `utilities`, `wages_expense`, `other_expenses`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2021-09-15', 10, 'yes', 34, 78, 27, 60, 86, 42, 15, 83, 27, 39, 26, 66, 77, 10, 49, 57, 70, 68, 95, 4, 1, 45, 86, 20, 17, '2022-07-05 00:13:58', '2022-07-05 00:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `itin_information`
--

CREATE TABLE `itin_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `itin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_itin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `non_resident_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itin_information`
--

INSERT INTO `itin_information` (`id`, `user_id`, `itin`, `itin_number`, `apply_itin`, `passport`, `driver_license`, `birth_cert`, `foreign_id`, `non_resident_tax`, `created_at`, `updated_at`) VALUES
(1, 1, 'yes', '3335', 'yes', NULL, 'files/l6BZAjrWlpGsTJsJPrYLe0IavMw9elTuak5sVq0m.png', 'files/jZfAhxGlUsnwi96XhIPQ1HxUseJP8u7cFkGqYzos.jpg', 'files/YpFD0A81niIxfjVO6OPV6tuhCnMyQTRSghkn1qm4.jpg', 'no', '2022-06-19 03:59:05', '2022-06-19 20:55:00'),
(2, 2, 'no', NULL, 'no', NULL, NULL, NULL, NULL, 'no', '2022-06-19 22:01:16', '2022-06-19 22:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_06_18_165140_create_filing_years_table', 1),
(17, '2022_06_18_190450_create_filings_table', 2),
(18, '2022_06_18_193715_create_amended_returns_files_table', 2),
(19, '2022_06_19_014408_create_personal_information_table', 3),
(20, '2022_06_19_015855_create_itin_information_table', 3),
(21, '2022_06_19_015951_create_spouse_personals_table', 3),
(22, '2022_06_19_020023_create_spouse_itins_table', 3),
(23, '2022_06_19_020055_create_dependents_table', 3),
(25, '2022_06_19_020149_create_bank_information_table', 3),
(26, '2022_06_19_020112_create_contacts_table', 4),
(29, '2022_06_19_221550_create_taxpayer_sids_table', 5),
(30, '2022_06_19_221722_create_spouse_sids_table', 5),
(31, '2022_06_21_001011_create_payment_for_our_services_table', 6),
(32, '2022_06_21_001551_create_our_fees_table', 6),
(33, '2022_06_21_122513_create_tax_deductions_table', 7),
(34, '2022_06_21_123609_create_tax_deductions_tuitions_table', 7),
(35, '2022_06_21_123635_create_tax_deductions_student_loans_table', 7),
(36, '2022_06_21_123715_create_estimated_tax_payments_table', 7),
(37, '2022_06_21_123740_create_stimuli_table', 7),
(38, '2022_06_21_123824_create_advanced_child_tax_payments_table', 7),
(64, '2022_06_28_235758_create_wages_table', 8),
(89, '2022_06_28_235937_create_wages_files_table', 9),
(90, '2022_06_29_000259_create_foreign_earned_incomes_table', 9),
(91, '2022_06_29_000347_create_spouse_foreign_earned_incomes_table', 9),
(93, '2022_06_29_000446_create_foreign_house_exclusions_table', 9),
(118, '2022_06_29_000420_create_us_home_occupants_table', 10),
(119, '2022_06_29_000505_create_buisness_incomes_table', 10),
(139, '2022_06_29_000534_create_income_expenses_table', 11),
(140, '2022_06_29_000554_create_cost_of_goods_solds_table', 11),
(141, '2022_06_29_000613_create_passive_incomes_table', 11),
(142, '2022_06_29_000627_create_passive_income_files_table', 11),
(143, '2022_06_29_000702_create_rental_property_information_table', 11),
(144, '2022_06_29_000729_create_rental_income_expenses_table', 11),
(145, '2022_06_29_000757_create_rental_income_expenses_files_table', 11),
(146, '2022_07_01_214726_create_fbr8938s_table', 11),
(147, '2022_07_01_214903_create_fbr8938_accounts_table', 11),
(148, '2022_07_01_215006_create_5471_foreign_corporations_table', 11),
(149, '2022_07_01_215803_create_5471_company_information_table', 11),
(150, '2022_07_01_220018_create_5471_company_shareholders_table', 11),
(151, '2022_07_01_220141_create_3520_foreign_trusts_table', 11),
(164, '2022_07_01_220319_create_c_corporation1120s_table', 12),
(165, '2022_07_01_220410_create_s_corporation1120s_table', 12),
(166, '2022_07_01_220450_create_partnership1065s_table', 12),
(167, '2022_07_01_220525_create_f_corporation1120fs_table', 12),
(168, '2022_07_01_220550_create_non_profits_table', 12),
(169, '2022_07_02_124307_create_doch_revach_files_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `non_profits`
--

CREATE TABLE `non_profits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officer_in_care_detials` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_time_filing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_filed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_1023` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `irs501c3_letter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articles_of_incorporation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2019_2020_profit_loss_report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2019_2020_balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_of_donors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_registered_charity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_fees`
--

CREATE TABLE `our_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `how_did_you_hear_about_firm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seventy_five_plus_vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_fees`
--

INSERT INTO `our_fees` (`id`, `user_id`, `how_did_you_hear_about_firm`, `seventy_five_plus_vat`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 'Facebook', 'yes', NULL, '2022-06-21 00:58:33', '2022-06-21 00:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `partnership1065s`
--

CREATE TABLE `partnership1065s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_first_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_filed_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partnership_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partnership_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_provided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_employ_worker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `independent_contractors_payments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_assets_worth_one_million` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_income` double DEFAULT NULL,
  `has_expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising` double DEFAULT NULL,
  `vehicle` double DEFAULT NULL,
  `commissions` double DEFAULT NULL,
  `contract_labor` double DEFAULT NULL,
  `goods_sold` double DEFAULT NULL,
  `depletion` double DEFAULT NULL,
  `employee_benefits` double DEFAULT NULL,
  `employee_benefits_program` double DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `self_employed_health_insurance` double DEFAULT NULL,
  `mortgage_interest` double DEFAULT NULL,
  `other_interest` double DEFAULT NULL,
  `legal_services` double DEFAULT NULL,
  `office_expenses` double DEFAULT NULL,
  `pension` double DEFAULT NULL,
  `vehicle_rental` double DEFAULT NULL,
  `machinery_rental` double DEFAULT NULL,
  `other_items_rental` double DEFAULT NULL,
  `repairs` double DEFAULT NULL,
  `supplies` double DEFAULT NULL,
  `taxes` double DEFAULT NULL,
  `travel` double DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `wages_expense` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `cost_of_goods_sold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_inventory_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close_inventory_challenge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_spent_on_purchases` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_items_for_personal_use` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_costs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_end_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passive_incomes`
--

CREATE TABLE `passive_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remove_password_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto_exchange_cost` double DEFAULT NULL,
  `crypto_acquire_date` date DEFAULT NULL,
  `crypto_sold_date` date DEFAULT NULL,
  `crypto_proceeds` double DEFAULT NULL,
  `crypto_transaction_date` date DEFAULT NULL,
  `crypto_value` double DEFAULT NULL,
  `crypto_income_value` double DEFAULT NULL,
  `crypto_expenses` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passive_income_files`
--

CREATE TABLE `passive_income_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `passive_income_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_for_our_services`
--

CREATE TABLE `payment_for_our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `card_number` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_for_our_services`
--

INSERT INTO `payment_for_our_services` (`id`, `user_id`, `card_number`, `expiration_date`, `cvv`, `card_name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 123456789, '2012-08-29', 332, 'Adrian Marquez', NULL, '2022-06-21 00:50:35', '2022-06-21 00:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_citizen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ss_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `birth_date`, `occupation`, `us_citizen`, `ssn`, `ss_card`, `created_at`, `updated_at`) VALUES
(5, 1, 'Malik', 'Aristotle', 'Venus', '2010-04-19', 'Chloem', 'no', '222', 'files/YMOdfmJQYsVxO8RBwzmPld1KQY6sktGQkWRFYPK0.pdf', '2022-06-19 03:24:37', '2022-06-19 21:01:39'),
(6, 2, 'Igor', 'Jolie', 'Kimberley', '1982-01-29', 'Maile', 'no', NULL, NULL, '2022-06-19 22:01:08', '2022-06-19 22:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `rental_income_expenses`
--

CREATE TABLE `rental_income_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_year,` int(11) DEFAULT NULL,
  `gross_rental_income,` double DEFAULT NULL,
  `currency,` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising,` double DEFAULT NULL,
  `auto,` double DEFAULT NULL,
  `travel,` double DEFAULT NULL,
  `cleaning,` double DEFAULT NULL,
  `commissions,` double DEFAULT NULL,
  `mortgage_insurance,` double DEFAULT NULL,
  `other_insurance,` double DEFAULT NULL,
  `legal_fees,` double DEFAULT NULL,
  `mortgage_interest,` double DEFAULT NULL,
  `other_mortgage_interest,` double DEFAULT NULL,
  `other_interest,` double DEFAULT NULL,
  `repairs,` double DEFAULT NULL,
  `supplies,` double DEFAULT NULL,
  `real_estate_taxes,` double DEFAULT NULL,
  `other_taxes,` double DEFAULT NULL,
  `utilities,` double DEFAULT NULL,
  `vehicle_rental,` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental_income_expenses_files`
--

CREATE TABLE `rental_income_expenses_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rental_income_expenses_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental_property_information`
--

CREATE TABLE `rental_property_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `rental_start_date` date DEFAULT NULL,
  `land_included_in_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_ownership` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_days` int(11) DEFAULT NULL,
  `personal_used_days` int(11) DEFAULT NULL,
  `property_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouseus_dls`
--

CREATE TABLE `spouseus_dls` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `license_number` int(50) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `issue_date` datetime NOT NULL,
  `issue_state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nydigit_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouse_foreign_earned_incomes`
--

CREATE TABLE `spouse_foreign_earned_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `separate_family_residence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_residence_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_resided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_start_date` date DEFAULT NULL,
  `residence_end_date` date DEFAULT NULL,
  `type_of_living_quarters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `did_family_live_with_you_abroad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_reside_period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stmt_to_foreign_country_authorities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_tax_to_foreign_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_in_us` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_arrival_date` date DEFAULT NULL,
  `us_date_left` date DEFAULT NULL,
  `us_business_days` int(11) DEFAULT NULL,
  `us_income` double DEFAULT NULL,
  `contractual_terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_limit_stay_lenght` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_way` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintain_us_home` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_home_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouse_itins`
--

CREATE TABLE `spouse_itins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `itin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_itin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `non_resident_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spouse_itins`
--

INSERT INTO `spouse_itins` (`id`, `user_id`, `itin`, `itin_number`, `apply_itin`, `passport`, `driver_license`, `birth_cert`, `foreign_id`, `non_resident_tax`, `created_at`, `updated_at`) VALUES
(2, 1, 'yes', '2222', 'yes', 'files/4EsHBE3MxPlgieSPWJWZtQl9foPE3kYWiG9fgHB8.jpg', 'files/5QTY08ZA4f8Q51wGeIVFD89pNrcQqhaIBQZGMfS9.jpg', 'files/44z6T7GapodTVUSBN0pjCCGLuCn3YHPkkECPXxKr.png', 'files/iInk4cIzQvJcYQxQwk4wxJ2QiAtZGQmqE4LnWNGR.jpg', 'yes', '2022-06-19 04:18:35', '2022-06-19 21:11:42'),
(3, 2, 'no', NULL, 'no', NULL, NULL, 'files/y9K2KM0DoN7jQWXLZnbduPIGxan91qCfI33eO2a5.pdf', NULL, 'no', '2022-06-19 22:01:50', '2022-06-19 22:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `spouse_personals`
--

CREATE TABLE `spouse_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `us_citizen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ss_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spouse_personals`
--

INSERT INTO `spouse_personals` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `occupation`, `birth_date`, `us_citizen`, `ssn`, `ss_card`, `created_at`, `updated_at`) VALUES
(1, 1, 'Keefe', 'Henry', 'Tamara', 'Lillith', '1974-04-03', 'no', 'Dolores deb', 'files/aotppN9mXGVroAsMPJJpjnyDVIozaPdMnC1gtxZq.png', '2022-06-19 04:03:42', '2022-06-19 19:10:57'),
(2, 2, 'Tana', 'Hiram', 'Eugenia', 'Blaze', '1977-11-19', 'no', NULL, NULL, '2022-06-19 22:01:25', '2022-06-19 22:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `spouse_sids`
--

CREATE TABLE `spouse_sids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nydigit_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spouse_sids`
--

INSERT INTO `spouse_sids` (`id`, `user_id`, `id_type`, `id_number`, `issue_state`, `nydigit_number`, `expiration_date`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '888888j', NULL, NULL, '2022-06-01', '2022-05-30', '2022-06-19 23:05:33', '2022-06-19 23:05:52'),
(2, 2, '1', 'hhggggg', NULL, NULL, '2022-02-02', '2021-12-09', '2022-06-19 23:11:00', '2022-06-19 23:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `stimuli`
--

CREATE TABLE `stimuli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `taxpayer_amount` double DEFAULT NULL,
  `spouse_amount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stimuli`
--

INSERT INTO `stimuli` (`id`, `user_id`, `filing_years_id`, `type`, `received_date`, `taxpayer_amount`, `spouse_amount`, `total`, `created_at`, `updated_at`) VALUES
(2, 2, 9, 'first', '2022-06-22', 500, 10, 510, '2022-06-22 03:44:25', '2022-06-22 03:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `s_corporation1120s`
--

CREATE TABLE `s_corporation1120s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_first_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_filed_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_provided` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_business` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corporation_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholder_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ustax_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_employ_worker` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `independent_contractors_payments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_1099MISC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_sharholders_transactions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_of_year_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_assets_worth_one_million` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_sheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_loss_statement_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_income` double DEFAULT NULL,
  `has_expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertising` double DEFAULT NULL,
  `vehicle` double DEFAULT NULL,
  `commissions` double DEFAULT NULL,
  `contract_labor` double DEFAULT NULL,
  `goods_sold` double DEFAULT NULL,
  `depletion` double DEFAULT NULL,
  `employee_benefits` double DEFAULT NULL,
  `employee_benefits_program` double DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `self_employed_health_insurance` double DEFAULT NULL,
  `mortgage_interest` double DEFAULT NULL,
  `other_interest` double DEFAULT NULL,
  `legal_services` double DEFAULT NULL,
  `office_expenses` double DEFAULT NULL,
  `pension` double DEFAULT NULL,
  `vehicle_rental` double DEFAULT NULL,
  `machinery_rental` double DEFAULT NULL,
  `other_items_rental` double DEFAULT NULL,
  `repairs` double DEFAULT NULL,
  `supplies` double DEFAULT NULL,
  `taxes` double DEFAULT NULL,
  `travel` double DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `utilities` double DEFAULT NULL,
  `wages_expense` double DEFAULT NULL,
  `other_expenses` double DEFAULT NULL,
  `cost_of_goods_sold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_inventory_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close_inventory_challenge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginning_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_spent_on_purchases` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_of_items_for_personal_use` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_costs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_end_inventory_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxpayer_sids`
--

CREATE TABLE `taxpayer_sids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nydigit_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxpayer_sids`
--

INSERT INTO `taxpayer_sids` (`id`, `user_id`, `id_type`, `id_number`, `issue_state`, `nydigit_number`, `expiration_date`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 'jjj', NULL, NULL, '2022-06-19', '2022-06-17', '2022-06-19 22:49:37', '2022-06-19 22:57:31'),
(2, 2, '1', '638380-dj', NULL, NULL, '2022-06-30', '2022-04-28', '2022-06-19 23:10:38', '2022-06-19 23:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `taxpayer_usdls`
--

CREATE TABLE `taxpayer_usdls` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `license_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expiration_date` datetime NOT NULL,
  `issue_date` date NOT NULL,
  `issue_state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nydigit_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_deductions`
--

CREATE TABLE `tax_deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tuition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_loan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_deductions`
--

INSERT INTO `tax_deductions` (`id`, `user_id`, `filing_years_id`, `tuition`, `student_loan`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'yes', 'yes', '2022-06-22 00:29:17', '2022-06-22 01:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `tax_deductions_student_loans`
--

CREATE TABLE `tax_deductions_student_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_deductions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_deductions_student_loans`
--

INSERT INTO `tax_deductions_student_loans` (`id`, `tax_deductions_id`, `filename`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'files/egiYdB06jZLV370RpqjIvp1oIuuLG9A1k53bwDma.png', '2022-06-22 00:40:18', '2022-06-22 00:40:18'),
(2, 1, NULL, 'files/fB6WK38qRs0tiu2SmLGIA8PAkepjXqLWHY1IbSEQ.jpg', '2022-06-22 00:40:18', '2022-06-22 00:40:18'),
(3, 1, NULL, 'files/zdm4qEUMmM7EIJMTb0p4m6tvPczHHoM9evPal3jz.png', '2022-06-22 00:43:28', '2022-06-22 00:43:28'),
(4, 1, NULL, 'files/vFlaAeXHpgPZo1WPJqm00jdKPKoqt6WY0uGowlki.png', '2022-06-22 00:43:31', '2022-06-22 00:43:31'),
(5, 1, NULL, 'files/M4eTEKAcrGzHpG4zL83GvPouRksSAlpN28zNtHhN.jpg', '2022-06-22 00:44:13', '2022-06-22 00:44:13'),
(6, 1, NULL, 'files/FgzpcOo9yxnbDEeBtudpH41PwEpdCNGg19KE4Rwl.png', '2022-06-22 00:44:13', '2022-06-22 00:44:13'),
(7, 1, NULL, 'files/6qqnR5avmKixU5AAnZfXPd9ktrvB93QnHd66nqt3.jpg', '2022-06-22 00:51:19', '2022-06-22 00:51:19'),
(8, 1, NULL, 'files/MAsbPfczpi0wgt3TyhUPYM2lFZjAdV0RBwXT4EwA.jpg', '2022-06-22 00:51:19', '2022-06-22 00:51:19'),
(9, 1, NULL, 'files/YvPgMblXphIpBTm3RUdiEkGRZKHVxczM484cGbSE.jpg', '2022-06-22 00:58:00', '2022-06-22 00:58:00'),
(10, 1, NULL, 'files/AsGuNs5IiwEgPiQev37Y5Et41AoioOlxodQxeNKt.jpg', '2022-06-22 01:03:48', '2022-06-22 01:03:48'),
(11, 1, NULL, 'files/iA3n4wjbqYjqUniLi893WeQYl8kURwSvFi1IodkQ.txt', '2022-06-22 01:05:51', '2022-06-22 01:05:51'),
(12, 1, NULL, 'files/oXjKarG1bwQOZMkfHKKeNQ8cXeGzmfl8MPCVwwmi.jpg', '2022-06-22 01:05:51', '2022-06-22 01:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `tax_deductions_tuitions`
--

CREATE TABLE `tax_deductions_tuitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_deductions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_deductions_tuitions`
--

INSERT INTO `tax_deductions_tuitions` (`id`, `tax_deductions_id`, `filename`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'files/dTZqx6r8GW8GwFBZpJQ2iAY9QwBk8GojN3SapuQB.jpg', '2022-06-22 01:01:03', '2022-06-22 01:01:03'),
(2, 1, NULL, 'files/hS2JCznP5hpba8bohqL43V03LqbWJvb6mO4WuTdt.png', '2022-06-22 01:02:15', '2022-06-22 01:02:15'),
(3, 1, NULL, 'files/e4OyaOOhnQkT16Lrme22bjmoPsQpjGcnSSDmCiDm.jpg', '2022-06-22 01:03:48', '2022-06-22 01:03:48'),
(4, 1, NULL, 'files/yK0ihZ8Z9GN4Fi0gKmLbpzBtjcfF1u2yaXE8pRpm.jpg', '2022-06-22 01:05:51', '2022-06-22 01:05:51'),
(5, 1, NULL, 'files/86xCny4PPZlJ1uFQvTqpGi8MbegSDJIr9BTjVCLx.jpg', '2022-06-22 01:05:51', '2022-06-22 01:05:51'),
(6, 1, NULL, 'files/GAy59wI6gjM0UuzZdfIrMoPv11DXRJW2LdEabX77.jpg', '2022-06-22 01:05:51', '2022-06-22 01:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `userstatus` tinyint(4) DEFAULT 0,
  `passwordactive` tinyint(4) DEFAULT 0,
  `password_expiration` date DEFAULT NULL,
  `softdelete` tinyint(4) DEFAULT 0,
  `loginstatus` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `remember_token`, `role_id`, `userstatus`, `passwordactive`, `password_expiration`, `softdelete`, `loginstatus`, `created_at`, `updated_at`) VALUES
(1, '57f18993-09fa-4462-b2d1-760cf6425a4e', 'Francis Nartey', 'narteyf9@gmail.com', '$2y$10$wRkU8GcDhVVTEOQFVLjv5uMVXWq2z6Z3IplUyZVbbPqkiaD/45cwq', NULL, NULL, 0, 0, NULL, 0, 0, '2022-06-17 13:08:53', NULL),
(2, '57f18993-09fa-4462-b2d1-760cf6425a4e', 'Test Nartey', 'test@gmail.com', '$2y$10$wRkU8GcDhVVTEOQFVLjv5uMVXWq2z6Z3IplUyZVbbPqkiaD/45cwq', NULL, NULL, 0, 0, NULL, 0, 0, '2022-06-17 13:08:53', '2022-06-18 17:53:43'),
(3, '78a16632-2888-499a-9bba-44818aef9e90', 'Demo', 'demok8080@gmail.com', '$2y$10$wRkU8GcDhVVTEOQFVLjv5uMVXWq2z6Z3IplUyZVbbPqkiaD/45cwq', NULL, NULL, 0, 0, NULL, 0, 0, '2022-06-21 19:58:02', '2022-06-21 19:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `account_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `timestamp`, `account_type`) VALUES
(1, 'andy', 'kwesi', 'monthy', 'andy@gmail.com', '$2y$10$tsG2LvvOqVIgHB.bICK7uuH/6Zet.AjM1sVkIb7X9HgbcFP5BT35.', '2008-04-22 05:20:17', 'client'),
(2, 'test', 'kwesi', 'test', 'test@gmail.com', '$2y$10$WvjlrYnEMz8VZxXla1RlJOjYvHuGFiLjK9mGy2.hO5dlzGY5Hpoae', '2008-04-22 05:25:23', 'client'),
(3, 'test1', 'kwesi', 'test1', 'test1@gmail.com', '$2y$10$MUjF0t42BZms5fE1fyb0JOxTDsdlZyzIK7TF.U0lVQmznv189E.RW', '2008-04-22 05:27:29', 'client'),
(4, 'test2', 'kwesi', 'test2', 'test2@gmail.com', '$2y$10$ZuA55TQ5klwPVJZkZykipemK4cgKKg3vBgdu4dTVOEGoaTPU1NM4a', '2008-04-22 05:29:54', 'client'),
(5, 'Nana', 'Kwesi', 'Mensah', 'nana@gmail.com', '$2y$10$KEwN2gAVRfw9DQxdc0/HAuSbSYjnmceDJ1XsYNPZik48ZOyG3qlfe', '2012-04-22 02:30:51', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `us_home_occupants`
--

CREATE TABLE `us_home_occupants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `occupant_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxpayer_or_spouse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `us_states`
--

CREATE TABLE `us_states` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `abbreviation` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `us_states`
--

INSERT INTO `us_states` (`id`, `name`, `abbreviation`, `created_at`, `update_at`) VALUES
(1, 'Alabama', 'AL', NULL, NULL),
(2, 'Alaska', 'AK', NULL, NULL),
(3, 'Arizona', 'AZ', NULL, NULL),
(4, 'Arkansas', 'AR', NULL, NULL),
(5, 'California', 'CA', NULL, NULL),
(6, 'Colorado', 'CO', NULL, NULL),
(7, 'Connecticut', 'CT', NULL, NULL),
(8, 'Delaware', 'DE', NULL, NULL),
(9, 'Florida', 'FL', NULL, NULL),
(10, 'Georgia', 'GA', NULL, NULL),
(11, 'Hawaii', 'HI', NULL, NULL),
(12, 'Idaho', 'ID', NULL, NULL),
(13, 'Illinois', 'IL', NULL, NULL),
(14, 'Indiana', 'IN', NULL, NULL),
(15, 'Iowa', 'IA', NULL, NULL),
(16, 'Kansas', 'KS', NULL, NULL),
(17, 'Kentucky', 'KY', NULL, NULL),
(18, 'Louisiana', 'LA', NULL, NULL),
(19, 'Maine', 'ME', NULL, NULL),
(20, 'Maryland', 'MD', NULL, NULL),
(21, 'Massachusetts', 'MA', NULL, NULL),
(22, 'Michigan', 'MI', NULL, NULL),
(23, 'Minnesota', 'MN', NULL, NULL),
(24, 'Mississippi', 'MS', NULL, NULL),
(25, 'Missouri', 'MO', NULL, NULL),
(26, 'Montana', 'MT', NULL, NULL),
(27, 'Nebraska', 'NE', NULL, NULL),
(28, 'Nevada', 'NV', NULL, NULL),
(29, 'New Hampshire', 'NH', NULL, NULL),
(30, 'New Jersey', 'NJ', NULL, NULL),
(31, 'New Mexico', 'NM', NULL, NULL),
(32, 'New York', 'NY', NULL, NULL),
(33, 'North Carolina', 'NC', NULL, NULL),
(34, 'North Dakota', 'ND', NULL, NULL),
(35, 'Ohio', 'OH', NULL, NULL),
(36, 'Oklahoma', 'OK', NULL, NULL),
(37, 'Oregon', 'OR', NULL, NULL),
(38, 'Pennsylvania', 'PA', NULL, NULL),
(39, 'Rhode Island', 'RI', NULL, NULL),
(40, 'South Carolina', 'SC', NULL, NULL),
(41, 'South Dakota', 'SD', NULL, NULL),
(42, 'Tennessee', 'TN', NULL, NULL),
(43, 'Texas', 'TX', NULL, NULL),
(44, 'Utah', 'UT', NULL, NULL),
(45, 'Vermont', 'VT', NULL, NULL),
(46, 'Virginia', 'VA', NULL, NULL),
(47, 'Washington', 'WA', NULL, NULL),
(48, 'West Virginia', 'WV', NULL, NULL),
(49, 'Wisconsin', 'WI', NULL, NULL),
(50, 'Wyoming', 'WY', NULL, NULL),
(51, 'District of Columbia', 'DC', NULL, NULL),
(52, 'American Samoa', 'AS', NULL, NULL),
(53, 'Federated States of Micronesia', 'FM', NULL, NULL),
(54, 'Marshall Islands', 'MH', NULL, NULL),
(55, 'Northern Mariana Islands', 'MP', NULL, NULL),
(56, 'Palau', 'PW', NULL, NULL),
(57, 'Puerto Rico', 'PR', NULL, NULL),
(58, 'Virgin Islands', 'VI', NULL, NULL),
(59, 'Armed Forces Africa', 'AE', NULL, NULL),
(60, 'Armed Forces Americas', 'AA', NULL, NULL),
(61, 'Armed Forces Canada', 'AE', NULL, NULL),
(62, 'Armed Forces Europe', 'AE', NULL, NULL),
(63, 'Armed Forces Middle East', 'AE', NULL, NULL),
(64, 'Armed Forces Pacific', 'AP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filing_years_id` bigint(20) UNSIGNED DEFAULT NULL,
  `salary_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w2forms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wage_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wages_files`
--

CREATE TABLE `wages_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `wages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3520_foreign_trusts`
--
ALTER TABLE `3520_foreign_trusts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `3520_foreign_trusts_user_id_foreign` (`user_id`),
  ADD KEY `3520_foreign_trusts_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `5471_company_information`
--
ALTER TABLE `5471_company_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `5471_company_information_user_id_foreign` (`user_id`),
  ADD KEY `5471_company_information_5471_foreign_corporations_id_foreign` (`5471_foreign_corporations_id`);

--
-- Indexes for table `5471_company_shareholders`
--
ALTER TABLE `5471_company_shareholders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `5471_company_shareholders_user_id_foreign` (`user_id`),
  ADD KEY `5471_company_shareholders_5471_company_information_id_foreign` (`5471_company_information_id`);

--
-- Indexes for table `5471_foreign_corporations`
--
ALTER TABLE `5471_foreign_corporations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `5471_foreign_corporations_user_id_foreign` (`user_id`),
  ADD KEY `5471_foreign_corporations_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `advanced_child_tax_payments`
--
ALTER TABLE `advanced_child_tax_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advanced_child_tax_payments_user_id_foreign` (`user_id`),
  ADD KEY `advanced_child_tax_payments_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `amended_returns_files`
--
ALTER TABLE `amended_returns_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amended_returns_files_filings_id_foreign` (`filings_id`);

--
-- Indexes for table `bank_information`
--
ALTER TABLE `bank_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_information_user_id_foreign` (`user_id`);

--
-- Indexes for table `buisness_incomes`
--
ALTER TABLE `buisness_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buisness_incomes_user_id_foreign` (`user_id`),
  ADD KEY `buisness_incomes_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cost_of_goods_solds`
--
ALTER TABLE `cost_of_goods_solds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_of_goods_solds_user_id_foreign` (`user_id`),
  ADD KEY `cost_of_goods_solds_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_corporation1120s`
--
ALTER TABLE `c_corporation1120s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_corporation1120s_user_id_foreign` (`user_id`),
  ADD KEY `c_corporation1120s_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependents_user_id_foreign` (`user_id`);

--
-- Indexes for table `doch_revach_files`
--
ALTER TABLE `doch_revach_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doch_revach_files_user_id_foreign` (`user_id`),
  ADD KEY `doch_revach_files_buisness_incomes_id_foreign` (`buisness_incomes_id`),
  ADD KEY `doch_revach_files_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `estimated_tax_payments`
--
ALTER TABLE `estimated_tax_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimated_tax_payments_user_id_foreign` (`user_id`),
  ADD KEY `estimated_tax_payments_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fbr8938s`
--
ALTER TABLE `fbr8938s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fbr8938s_user_id_foreign` (`user_id`),
  ADD KEY `fbr8938s_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `fbr8938_accounts`
--
ALTER TABLE `fbr8938_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fbr8938_accounts_user_id_foreign` (`user_id`),
  ADD KEY `fbr8938_accounts_fbr8938s_id_foreign` (`fbr8938s_id`);

--
-- Indexes for table `filings`
--
ALTER TABLE `filings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filings_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `filing_years`
--
ALTER TABLE `filing_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filing_years_user_id_foreign` (`user_id`);

--
-- Indexes for table `foreign_earned_incomes`
--
ALTER TABLE `foreign_earned_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_earned_incomes_user_id_foreign` (`user_id`),
  ADD KEY `foreign_earned_incomes_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `foreign_house_exclusions`
--
ALTER TABLE `foreign_house_exclusions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_house_exclusions_user_id_foreign` (`user_id`),
  ADD KEY `foreign_house_exclusions_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `f_corporation1120fs`
--
ALTER TABLE `f_corporation1120fs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_corporation1120fs_user_id_foreign` (`user_id`),
  ADD KEY `f_corporation1120fs_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `general_information`
--
ALTER TABLE `general_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `general_questions`
--
ALTER TABLE `general_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `income_expenses`
--
ALTER TABLE `income_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_expenses_user_id_foreign` (`user_id`),
  ADD KEY `income_expenses_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `itin_information`
--
ALTER TABLE `itin_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itin_information_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_profits`
--
ALTER TABLE `non_profits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_profits_user_id_foreign` (`user_id`),
  ADD KEY `non_profits_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `our_fees`
--
ALTER TABLE `our_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_fees_user_id_foreign` (`user_id`);

--
-- Indexes for table `partnership1065s`
--
ALTER TABLE `partnership1065s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partnership1065s_user_id_foreign` (`user_id`),
  ADD KEY `partnership1065s_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `passive_incomes`
--
ALTER TABLE `passive_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passive_incomes_user_id_foreign` (`user_id`),
  ADD KEY `passive_incomes_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `passive_income_files`
--
ALTER TABLE `passive_income_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passive_income_files_user_id_foreign` (`user_id`),
  ADD KEY `passive_income_files_passive_income_id_foreign` (`passive_income_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_for_our_services`
--
ALTER TABLE `payment_for_our_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_for_our_services_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_information_user_id_foreign` (`user_id`);

--
-- Indexes for table `rental_income_expenses`
--
ALTER TABLE `rental_income_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_income_expenses_user_id_foreign` (`user_id`),
  ADD KEY `rental_income_expenses_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `rental_income_expenses_files`
--
ALTER TABLE `rental_income_expenses_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_income_expenses_files_user_id_foreign` (`user_id`),
  ADD KEY `rental_income_expenses_files_rental_income_expenses_id_foreign` (`rental_income_expenses_id`);

--
-- Indexes for table `rental_property_information`
--
ALTER TABLE `rental_property_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_property_information_user_id_foreign` (`user_id`),
  ADD KEY `rental_property_information_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `spouseus_dls`
--
ALTER TABLE `spouseus_dls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spouse_foreign_earned_incomes`
--
ALTER TABLE `spouse_foreign_earned_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spouse_foreign_earned_incomes_user_id_foreign` (`user_id`),
  ADD KEY `spouse_foreign_earned_incomes_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `spouse_itins`
--
ALTER TABLE `spouse_itins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spouse_itins_user_id_foreign` (`user_id`);

--
-- Indexes for table `spouse_personals`
--
ALTER TABLE `spouse_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spouse_personals_user_id_foreign` (`user_id`);

--
-- Indexes for table `spouse_sids`
--
ALTER TABLE `spouse_sids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spouse_sids_user_id_foreign` (`user_id`);

--
-- Indexes for table `stimuli`
--
ALTER TABLE `stimuli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stimuli_user_id_foreign` (`user_id`),
  ADD KEY `stimuli_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `s_corporation1120s`
--
ALTER TABLE `s_corporation1120s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_corporation1120s_user_id_foreign` (`user_id`),
  ADD KEY `s_corporation1120s_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `taxpayer_sids`
--
ALTER TABLE `taxpayer_sids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taxpayer_sids_user_id_foreign` (`user_id`);

--
-- Indexes for table `taxpayer_usdls`
--
ALTER TABLE `taxpayer_usdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tax_deductions`
--
ALTER TABLE `tax_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_deductions_user_id_foreign` (`user_id`),
  ADD KEY `tax_deductions_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `tax_deductions_student_loans`
--
ALTER TABLE `tax_deductions_student_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_deductions_student_loans_tax_deductions_id_foreign` (`tax_deductions_id`);

--
-- Indexes for table `tax_deductions_tuitions`
--
ALTER TABLE `tax_deductions_tuitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_deductions_tuitions_tax_deductions_id_foreign` (`tax_deductions_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us_home_occupants`
--
ALTER TABLE `us_home_occupants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `us_home_occupants_user_id_foreign` (`user_id`),
  ADD KEY `us_home_occupants_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `us_states`
--
ALTER TABLE `us_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wages_user_id_foreign` (`user_id`),
  ADD KEY `wages_filing_years_id_foreign` (`filing_years_id`);

--
-- Indexes for table `wages_files`
--
ALTER TABLE `wages_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wages_files_user_id_foreign` (`user_id`),
  ADD KEY `wages_files_wages_id_foreign` (`wages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3520_foreign_trusts`
--
ALTER TABLE `3520_foreign_trusts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `5471_company_information`
--
ALTER TABLE `5471_company_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `5471_company_shareholders`
--
ALTER TABLE `5471_company_shareholders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `5471_foreign_corporations`
--
ALTER TABLE `5471_foreign_corporations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advanced_child_tax_payments`
--
ALTER TABLE `advanced_child_tax_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amended_returns_files`
--
ALTER TABLE `amended_returns_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_information`
--
ALTER TABLE `bank_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buisness_incomes`
--
ALTER TABLE `buisness_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cost_of_goods_solds`
--
ALTER TABLE `cost_of_goods_solds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `c_corporation1120s`
--
ALTER TABLE `c_corporation1120s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dependents`
--
ALTER TABLE `dependents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doch_revach_files`
--
ALTER TABLE `doch_revach_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimated_tax_payments`
--
ALTER TABLE `estimated_tax_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fbr8938s`
--
ALTER TABLE `fbr8938s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fbr8938_accounts`
--
ALTER TABLE `fbr8938_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filings`
--
ALTER TABLE `filings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `filing_years`
--
ALTER TABLE `filing_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foreign_earned_incomes`
--
ALTER TABLE `foreign_earned_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foreign_house_exclusions`
--
ALTER TABLE `foreign_house_exclusions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_corporation1120fs`
--
ALTER TABLE `f_corporation1120fs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_information`
--
ALTER TABLE `general_information`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_questions`
--
ALTER TABLE `general_questions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_expenses`
--
ALTER TABLE `income_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itin_information`
--
ALTER TABLE `itin_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `non_profits`
--
ALTER TABLE `non_profits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_fees`
--
ALTER TABLE `our_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partnership1065s`
--
ALTER TABLE `partnership1065s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passive_incomes`
--
ALTER TABLE `passive_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passive_income_files`
--
ALTER TABLE `passive_income_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_for_our_services`
--
ALTER TABLE `payment_for_our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rental_income_expenses`
--
ALTER TABLE `rental_income_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_income_expenses_files`
--
ALTER TABLE `rental_income_expenses_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_property_information`
--
ALTER TABLE `rental_property_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouseus_dls`
--
ALTER TABLE `spouseus_dls`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouse_foreign_earned_incomes`
--
ALTER TABLE `spouse_foreign_earned_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouse_itins`
--
ALTER TABLE `spouse_itins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spouse_personals`
--
ALTER TABLE `spouse_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spouse_sids`
--
ALTER TABLE `spouse_sids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stimuli`
--
ALTER TABLE `stimuli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `s_corporation1120s`
--
ALTER TABLE `s_corporation1120s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxpayer_sids`
--
ALTER TABLE `taxpayer_sids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxpayer_usdls`
--
ALTER TABLE `taxpayer_usdls`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_deductions`
--
ALTER TABLE `tax_deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_deductions_student_loans`
--
ALTER TABLE `tax_deductions_student_loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tax_deductions_tuitions`
--
ALTER TABLE `tax_deductions_tuitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `us_home_occupants`
--
ALTER TABLE `us_home_occupants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `us_states`
--
ALTER TABLE `us_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wages_files`
--
ALTER TABLE `wages_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `3520_foreign_trusts`
--
ALTER TABLE `3520_foreign_trusts`
  ADD CONSTRAINT `3520_foreign_trusts_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `3520_foreign_trusts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `5471_company_information`
--
ALTER TABLE `5471_company_information`
  ADD CONSTRAINT `5471_company_information_5471_foreign_corporations_id_foreign` FOREIGN KEY (`5471_foreign_corporations_id`) REFERENCES `5471_foreign_corporations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `5471_company_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `5471_company_shareholders`
--
ALTER TABLE `5471_company_shareholders`
  ADD CONSTRAINT `5471_company_shareholders_5471_company_information_id_foreign` FOREIGN KEY (`5471_company_information_id`) REFERENCES `5471_company_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `5471_company_shareholders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `5471_foreign_corporations`
--
ALTER TABLE `5471_foreign_corporations`
  ADD CONSTRAINT `5471_foreign_corporations_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `5471_foreign_corporations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advanced_child_tax_payments`
--
ALTER TABLE `advanced_child_tax_payments`
  ADD CONSTRAINT `advanced_child_tax_payments_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advanced_child_tax_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `amended_returns_files`
--
ALTER TABLE `amended_returns_files`
  ADD CONSTRAINT `amended_returns_files_filings_id_foreign` FOREIGN KEY (`filings_id`) REFERENCES `filings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_information`
--
ALTER TABLE `bank_information`
  ADD CONSTRAINT `bank_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buisness_incomes`
--
ALTER TABLE `buisness_incomes`
  ADD CONSTRAINT `buisness_incomes_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buisness_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cost_of_goods_solds`
--
ALTER TABLE `cost_of_goods_solds`
  ADD CONSTRAINT `cost_of_goods_solds_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cost_of_goods_solds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `c_corporation1120s`
--
ALTER TABLE `c_corporation1120s`
  ADD CONSTRAINT `c_corporation1120s_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `c_corporation1120s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dependents`
--
ALTER TABLE `dependents`
  ADD CONSTRAINT `dependents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doch_revach_files`
--
ALTER TABLE `doch_revach_files`
  ADD CONSTRAINT `doch_revach_files_buisness_incomes_id_foreign` FOREIGN KEY (`buisness_incomes_id`) REFERENCES `buisness_incomes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doch_revach_files_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doch_revach_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `estimated_tax_payments`
--
ALTER TABLE `estimated_tax_payments`
  ADD CONSTRAINT `estimated_tax_payments_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `estimated_tax_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fbr8938s`
--
ALTER TABLE `fbr8938s`
  ADD CONSTRAINT `fbr8938s_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fbr8938s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fbr8938_accounts`
--
ALTER TABLE `fbr8938_accounts`
  ADD CONSTRAINT `fbr8938_accounts_fbr8938s_id_foreign` FOREIGN KEY (`fbr8938s_id`) REFERENCES `fbr8938s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fbr8938_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `filings`
--
ALTER TABLE `filings`
  ADD CONSTRAINT `filings_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `filing_years`
--
ALTER TABLE `filing_years`
  ADD CONSTRAINT `filing_years_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foreign_earned_incomes`
--
ALTER TABLE `foreign_earned_incomes`
  ADD CONSTRAINT `foreign_earned_incomes_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_earned_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foreign_house_exclusions`
--
ALTER TABLE `foreign_house_exclusions`
  ADD CONSTRAINT `foreign_house_exclusions_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_house_exclusions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `f_corporation1120fs`
--
ALTER TABLE `f_corporation1120fs`
  ADD CONSTRAINT `f_corporation1120fs_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `f_corporation1120fs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_information`
--
ALTER TABLE `general_information`
  ADD CONSTRAINT `general_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_questions`
--
ALTER TABLE `general_questions`
  ADD CONSTRAINT `general_questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income_expenses`
--
ALTER TABLE `income_expenses`
  ADD CONSTRAINT `income_expenses_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `income_expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itin_information`
--
ALTER TABLE `itin_information`
  ADD CONSTRAINT `itin_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `non_profits`
--
ALTER TABLE `non_profits`
  ADD CONSTRAINT `non_profits_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `non_profits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `our_fees`
--
ALTER TABLE `our_fees`
  ADD CONSTRAINT `our_fees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partnership1065s`
--
ALTER TABLE `partnership1065s`
  ADD CONSTRAINT `partnership1065s_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `partnership1065s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passive_incomes`
--
ALTER TABLE `passive_incomes`
  ADD CONSTRAINT `passive_incomes_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `passive_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passive_income_files`
--
ALTER TABLE `passive_income_files`
  ADD CONSTRAINT `passive_income_files_passive_income_id_foreign` FOREIGN KEY (`passive_income_id`) REFERENCES `passive_incomes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `passive_income_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_for_our_services`
--
ALTER TABLE `payment_for_our_services`
  ADD CONSTRAINT `payment_for_our_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `personal_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_income_expenses`
--
ALTER TABLE `rental_income_expenses`
  ADD CONSTRAINT `rental_income_expenses_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rental_income_expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_income_expenses_files`
--
ALTER TABLE `rental_income_expenses_files`
  ADD CONSTRAINT `rental_income_expenses_files_rental_income_expenses_id_foreign` FOREIGN KEY (`rental_income_expenses_id`) REFERENCES `rental_income_expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rental_income_expenses_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_property_information`
--
ALTER TABLE `rental_property_information`
  ADD CONSTRAINT `rental_property_information_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rental_property_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spouseus_dls`
--
ALTER TABLE `spouseus_dls`
  ADD CONSTRAINT `spouseus_dls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spouse_foreign_earned_incomes`
--
ALTER TABLE `spouse_foreign_earned_incomes`
  ADD CONSTRAINT `spouse_foreign_earned_incomes_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spouse_foreign_earned_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spouse_itins`
--
ALTER TABLE `spouse_itins`
  ADD CONSTRAINT `spouse_itins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spouse_personals`
--
ALTER TABLE `spouse_personals`
  ADD CONSTRAINT `spouse_personals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spouse_sids`
--
ALTER TABLE `spouse_sids`
  ADD CONSTRAINT `spouse_sids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stimuli`
--
ALTER TABLE `stimuli`
  ADD CONSTRAINT `stimuli_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stimuli_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_corporation1120s`
--
ALTER TABLE `s_corporation1120s`
  ADD CONSTRAINT `s_corporation1120s_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_corporation1120s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxpayer_sids`
--
ALTER TABLE `taxpayer_sids`
  ADD CONSTRAINT `taxpayer_sids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxpayer_usdls`
--
ALTER TABLE `taxpayer_usdls`
  ADD CONSTRAINT `taxpayer_usdls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tax_deductions`
--
ALTER TABLE `tax_deductions`
  ADD CONSTRAINT `tax_deductions_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_deductions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_deductions_student_loans`
--
ALTER TABLE `tax_deductions_student_loans`
  ADD CONSTRAINT `tax_deductions_student_loans_tax_deductions_id_foreign` FOREIGN KEY (`tax_deductions_id`) REFERENCES `tax_deductions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_deductions_tuitions`
--
ALTER TABLE `tax_deductions_tuitions`
  ADD CONSTRAINT `tax_deductions_tuitions_tax_deductions_id_foreign` FOREIGN KEY (`tax_deductions_id`) REFERENCES `tax_deductions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `us_home_occupants`
--
ALTER TABLE `us_home_occupants`
  ADD CONSTRAINT `us_home_occupants_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `us_home_occupants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wages`
--
ALTER TABLE `wages`
  ADD CONSTRAINT `wages_filing_years_id_foreign` FOREIGN KEY (`filing_years_id`) REFERENCES `filing_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wages_files`
--
ALTER TABLE `wages_files`
  ADD CONSTRAINT `wages_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wages_files_wages_id_foreign` FOREIGN KEY (`wages_id`) REFERENCES `wages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
