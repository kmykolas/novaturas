-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2017 m. Lie 11 d. 13:30
-- Serverio versija: 5.5.32
-- PHP versija: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `magento_nova`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `airLines`
--

CREATE TABLE IF NOT EXISTS `airLines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `countryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Sukurta duomenų kopija lentelei `airLines`
--

INSERT INTO `airLines` (`id`, `title`, `countryId`) VALUES
(2, 'turkish air', 25),
(4, 'RyanAir', 117);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `airport`
--

CREATE TABLE IF NOT EXISTS `airport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryId` int(11) NOT NULL,
  `longitude` varchar(12) NOT NULL,
  `latitude` varchar(12) NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Sukurta duomenų kopija lentelei `airport`
--

INSERT INTO `airport` (`id`, `countryId`, `longitude`, `latitude`, `title`) VALUES
(2, 117, '25.356445', '54.622554', 'Vilniaus oro uostas'),
(3, 111, '24.158936', '56.848572', 'Rygos oro uostas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `airportAirLines`
--

CREATE TABLE IF NOT EXISTS `airportAirLines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airportId` int(11) NOT NULL,
  `airLineId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `airportId` (`airportId`),
  KEY `airLineid` (`airLineId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Sukurta duomenų kopija lentelei `airportAirLines`
--

INSERT INTO `airportAirLines` (`id`, `airportId`, `airLineId`) VALUES
(1, 2, 2),
(2, 2, 4),
(14, 3, 2),
(15, 3, 4);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Sukurta duomenų kopija lentelei `countries`
--

INSERT INTO `countries` (`id`, `code`, `title`) VALUES
(1, 'AF/AFG', 'Afghanistan'),
(2, 'AX/ALA', 'Aland Islands'),
(3, 'AL/ALB', 'Albania'),
(4, 'DZ/DZA', 'Algeria'),
(5, 'AS/ASM', 'American Samoa'),
(6, 'AD/AND', 'Andorra'),
(7, 'AO/AGO', 'Angola'),
(8, 'AI/AIA', 'Anguilla'),
(9, 'AQ/ATA', 'Antarctica'),
(10, 'AG/ATG', 'Antigua and Barbuda'),
(11, 'AR/ARG', 'Argentina'),
(12, 'AM/ARM', 'Armenia'),
(13, 'AW/ABW', 'Aruba'),
(14, 'AU/AUS', 'Australia'),
(15, 'AT/AUT', 'Austria'),
(16, 'AZ/AZE', 'Azerbaijan'),
(17, 'BS/BHS', 'Bahamas'),
(18, 'BH/BHR', 'Bahrain'),
(19, 'BD/BGD', 'Bangladesh'),
(20, 'BB/BRB', 'Barbados'),
(21, 'BY/BLR', 'Belarus'),
(22, 'BE/BEL', 'Belgium'),
(23, 'BZ/BLZ', 'Belize'),
(24, 'BJ/BEN', 'Benin'),
(25, 'BM/BMU', 'Bermuda'),
(26, 'BT/BTN', 'Bhutan'),
(27, 'BO/BOL', 'Bolivia'),
(28, 'BA/BIH', 'Bosnia and Herzegovina'),
(29, 'BW/BWA', 'Botswana'),
(30, 'BV/BVT', 'Bouvet Island'),
(31, 'BR/BRA', 'Brazil'),
(32, 'VG/VGB', 'British Virgin Islands'),
(33, 'IO/IOT', 'British Indian Ocean Territory'),
(34, 'BN/BRN', 'Brunei Darussalam'),
(35, 'BG/BGR', 'Bulgaria'),
(36, 'BF/BFA', 'Burkina Faso'),
(37, 'BI/BDI', 'Burundi'),
(38, 'KH/KHM', 'Cambodia'),
(39, 'CM/CMR', 'Cameroon'),
(40, 'CA/CAN', 'Canada'),
(41, 'CV/CPV', 'Cape Verde'),
(42, 'KY/CYM', 'Cayman Islands'),
(43, 'CF/CAF', 'Central African Republic'),
(44, 'TD/TCD', 'Chad'),
(45, 'CL/CHL', 'Chile'),
(46, 'CN/CHN', 'China'),
(47, 'HK/HKG', 'Hong Kong, SAR China'),
(48, 'MO/MAC', 'Macao, SAR China'),
(49, 'CX/CXR', 'Christmas Island'),
(50, 'CC/CCK', 'Cocos (Keeling) Islands'),
(51, 'CO/COL', 'Colombia'),
(52, 'KM/COM', 'Comoros'),
(53, 'CG/COG', 'Congo (Brazzaville)'),
(54, 'CK/COK', 'Cook Islands'),
(55, 'CR/CRI', 'Costa Rica'),
(56, 'HR/HRV', 'Croatia'),
(57, 'CU/CUB', 'Cuba'),
(58, 'CY/CYP', 'Cyprus'),
(59, 'CZ/CZE', 'Czech Republic'),
(60, 'DK/DNK', 'Denmark'),
(61, 'DJ/DJI', 'Djibouti'),
(62, 'DM/DMA', 'Dominica'),
(63, 'DO/DOM', 'Dominican Republic'),
(64, 'EC/ECU', 'Ecuador'),
(65, 'EG/EGY', 'Egypt'),
(66, 'SV/SLV', 'El Salvador'),
(67, 'GQ/GNQ', 'Equatorial Guinea'),
(68, 'ER/ERI', 'Eritrea'),
(69, 'EE/EST', 'Estonia'),
(70, 'ET/ETH', 'Ethiopia'),
(71, 'FK/FLK', 'Falkland Islands (Malvinas)'),
(72, 'FO/FRO', 'Faroe Islands'),
(73, 'FJ/FJI', 'Fiji'),
(74, 'FI/FIN', 'Finland'),
(75, 'FR/FRA', 'France'),
(76, 'GF/GUF', 'French Guiana'),
(77, 'PF/PYF', 'French Polynesia'),
(78, 'TF/ATF', 'French Southern Territories'),
(79, 'GA/GAB', 'Gabon'),
(80, 'GM/GMB', 'Gambia'),
(81, 'GE/GEO', 'Georgia'),
(82, 'DE/DEU', 'Germany'),
(83, 'GH/GHA', 'Ghana'),
(84, 'GI/GIB', 'Gibraltar'),
(85, 'GR/GRC', 'Greece'),
(86, 'GL/GRL', 'Greenland'),
(87, 'GD/GRD', 'Grenada'),
(88, 'GP/GLP', 'Guadeloupe'),
(89, 'GU/GUM', 'Guam'),
(90, 'GT/GTM', 'Guatemala'),
(91, 'GG/GGY', 'Guernsey'),
(92, 'GW/GNB', 'Guinea-Bissau'),
(93, 'HT/HTI', 'Haiti'),
(94, 'HM/HMD', 'Heard and Mcdonald Islands'),
(95, 'HN/HND', 'Honduras'),
(96, 'IS/ISL', 'Iceland'),
(97, 'ID/IDN', 'Indonesia'),
(98, 'IQ/IRQ', 'Iraq'),
(99, 'IM/IMN', 'Isle of Man'),
(100, 'IT/ITA', 'Italy'),
(101, 'JP/JPN', 'Japan'),
(102, 'JO/JOR', 'Jordan'),
(103, 'KZ/KAZ', 'Kazakhstan'),
(104, 'KE/KEN', 'Kenya'),
(105, 'KI/KIR', 'Kiribati'),
(106, 'KP/PRK', 'Korea (North)'),
(107, 'KR/KOR', 'Korea (South)'),
(108, 'KW/KWT', 'Kuwait'),
(109, 'KG/KGZ', 'Kyrgyzstan'),
(110, 'LA/LAO', 'Lao PDR'),
(111, 'LV/LVA', 'Latvia'),
(112, 'LB/LBN', 'Lebanon'),
(113, 'LS/LSO', 'Lesotho'),
(114, 'LR/LBR', 'Liberia'),
(115, 'LY/LBY', 'Libya'),
(116, 'LI/LIE', 'Liechtenstein'),
(117, 'LT/LTU', 'Lithuania'),
(118, 'LU/LUX', 'Luxembourg'),
(119, 'MG/MDG', 'Madagascar'),
(120, 'MW/MWI', 'Malawi'),
(121, 'MY/MYS', 'Malaysia'),
(122, 'MV/MDV', 'Maldives'),
(123, 'ML/MLI', 'Mali'),
(124, 'MT/MLT', 'Malta'),
(125, 'MH/MHL', 'Marshall Islands'),
(126, 'MQ/MTQ', 'Martinique'),
(127, 'MR/MRT', 'Mauritania'),
(128, 'MU/MUS', 'Mauritius'),
(129, 'YT/MYT', 'Mayotte'),
(130, 'MX/MEX', 'Mexico'),
(131, 'FM/FSM', 'Micronesia, Federated States of'),
(132, 'MD/MDA', 'Moldova'),
(133, 'MC/MCO', 'Monaco'),
(134, 'MN/MNG', 'Mongolia'),
(135, 'ME/MNE', 'Montenegro'),
(136, 'MS/MSR', 'Montserrat'),
(137, 'MA/MAR', 'Morocco'),
(138, 'MZ/MOZ', 'Mozambique'),
(139, 'MM/MMR', 'Myanmar'),
(140, 'NA/NAM', 'Namibia'),
(141, 'NR/NRU', 'Nauru'),
(142, 'NP/NPL', 'Nepal'),
(143, 'NL/NLD', 'Netherlands'),
(144, 'AN/ANT', 'Netherlands Antilles'),
(145, 'NC/NCL', 'New Caledonia'),
(146, 'NZ/NZL', 'New Zealand'),
(147, 'NI/NIC', 'Nicaragua'),
(148, 'NE/NER', 'Niger'),
(149, 'NG/NGA', 'Nigeria'),
(150, 'NU/NIU', 'Niue'),
(151, 'NF/NFK', 'Norfolk Island'),
(152, 'MP/MNP', 'Northern Mariana Islands'),
(153, 'NO/NOR', 'Norway'),
(154, 'OM/OMN', 'Oman'),
(155, 'PK/PAK', 'Pakistan'),
(156, 'PW/PLW', 'Palau'),
(157, 'PS/PSE', 'Palestinian Territory'),
(158, 'PA/PAN', 'Panama'),
(159, 'PG/PNG', 'Papua New Guinea'),
(160, 'PY/PRY', 'Paraguay'),
(161, 'PE/PER', 'Peru'),
(162, 'PH/PHL', 'Philippines'),
(163, 'PN/PCN', 'Pitcairn'),
(164, 'PL/POL', 'Poland'),
(165, 'PT/PRT', 'Portugal'),
(166, 'PR/PRI', 'Puerto Rico'),
(167, 'QA/QAT', 'Qatar'),
(168, 'RE/REU', 'R&eacute;union'),
(169, 'RO/ROU', 'Romania'),
(170, 'RU/RUS', 'Russian Federation'),
(171, 'RW/RWA', 'Rwanda'),
(172, 'BL/BLM', 'Saint-Barth&eacute;lemy'),
(173, 'SH/SHN', 'Saint Helena'),
(174, 'KN/KNA', 'Saint Kitts and Nevis'),
(175, 'LC/LCA', 'Saint Lucia'),
(176, 'MF/MAF', 'Saint-Martin (French part)'),
(177, 'PM/SPM', 'Saint Pierre and Miquelon'),
(178, 'VC/VCT', 'Saint Vincent and Grenadines'),
(179, 'WS/WSM', 'Samoa'),
(180, 'SM/SMR', 'San Marino'),
(181, 'ST/STP', 'Sao Tome and Principe'),
(182, 'SA/SAU', 'Saudi Arabia'),
(183, 'SN/SEN', 'Senegal'),
(184, 'RS/SRB', 'Serbia'),
(185, 'SC/SYC', 'Seychelles'),
(186, 'SL/SLE', 'Sierra Leone'),
(187, 'SG/SGP', 'Singapore'),
(188, 'SK/SVK', 'Slovakia'),
(189, 'SI/SVN', 'Slovenia'),
(190, 'SB/SLB', 'Solomon Islands'),
(191, 'SO/SOM', 'Somalia'),
(192, 'ZA/ZAF', 'South Africa'),
(193, 'GS/SGS', 'South Georgia and the South Sandwich Islands'),
(194, 'ES/ESP', 'Spain'),
(195, 'LK/LKA', 'Sri Lanka'),
(196, 'SD/SDN', 'Sudan'),
(197, 'SR/SUR', 'Suriname'),
(198, 'SJ/SJM', 'Svalbard and Jan Mayen Islands'),
(199, 'SZ/SWZ', 'Swaziland'),
(200, 'SE/SWE', 'Sweden'),
(201, 'CH/CHE', 'Switzerland'),
(202, 'SY/SYR', 'Syrian Arab Republic (Syria)'),
(203, 'TJ/TJK', 'Tajikistan'),
(204, 'TZ/TZA', 'Tanzania, United Republic of'),
(205, 'TH/THA', 'Thailand'),
(206, 'TL/TLS', 'Timor-Leste'),
(207, 'TG/TGO', 'Togo'),
(208, 'TK/TKL', 'Tokelau'),
(209, 'TO/TON', 'Tonga'),
(210, 'TT/TTO', 'Trinidad and Tobago'),
(211, 'TN/TUN', 'Tunisia'),
(212, 'TR/TUR', 'Turkey'),
(213, 'TM/TKM', 'Turkmenistan'),
(214, 'TC/TCA', 'Turks and Caicos Islands'),
(215, 'TV/TUV', 'Tuvalu'),
(216, 'UG/UGA', 'Uganda'),
(217, 'UA/UKR', 'Ukraine'),
(218, 'AE/ARE', 'United Arab Emirates'),
(219, 'GB/GBR', 'United Kingdom'),
(220, 'US/USA', 'United States of America'),
(221, 'UM/UMI', 'US Minor Outlying Islands'),
(222, 'UY/URY', 'Uruguay'),
(223, 'UZ/UZB', 'Uzbekistan'),
(224, 'VU/VUT', 'Vanuatu'),
(225, 'VE/VEN', 'Venezuela (Bolivarian Republic)'),
(226, 'VN/VNM', 'Viet Nam'),
(227, 'VI/VIR', 'Virgin Islands, US'),
(228, 'WF/WLF', 'Wallis and Futuna Islands'),
(229, 'EH/ESH', 'Western Sahara'),
(230, 'YE/YEM', 'Yemen'),
(231, 'ZM/ZMB', 'Zambia'),
(232, 'ZW/ZWE', 'Zimbabwe');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         