-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 07:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email_id` varchar(32) NOT NULL,
  `contact` char(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `email_id`, `contact`, `username`, `password`, `confirm_password`, `admin_image`, `admin_added`) VALUES
(2, 'Sleiman', '', 'Alfaihan', 'admin@gmail.com', '23659874', 'admin', 'admin', 'admin', 'axcvghjk.png', '2018-09-10 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `cat_image` varchar(200) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `details`, `cat_image`, `creation_date`) VALUES
(1, 'Sport', 'The precise definition of what separates a sport from other leisure activities varies between sources. The closest to an international agreement on a definition is provided by SportAccord, which is the association for all the largest international sports federations (including association football, athletics, cycling, tennis, equestrian sports, and more), and is therefore the de facto representative of international sport.', 'kmnknk.jpg', '2020-01-18 06:37:47'),
(2, 'Cinema', '   Cinematography, the science or art of motion-picture photography\r\nFilm or movie, a series of still images that create the illusion of a moving image\r\nFilm industry, the technological and commercial institutions of filmmaking\r\nFilmmaking, the process of making a film\r\nMovie theater (also called a cinema), a building in which films are shown\r\nCinema (2008 film) or Bommalattam, a Tamil film directed by Bharathiraja', 'dvfbgnhmj.jpg', '2020-01-18 06:35:20'),
(6, 'Travel', '  Travel is the movement of people between distant geographical locations. Travel can be done by foot, bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can be one way or round trip.[1][2] Travel can also include relatively short stays between successive movements, as in the case of tourism.', 'lmlkmklmm.jpg', '2020-03-18 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `contactquery`
--

CREATE TABLE IF NOT EXISTS `contactquery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(64) NOT NULL DEFAULT '',
  `countries_iso_code` varchar(2) NOT NULL,
  `countries_isd_code` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`countries_id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code`, `countries_isd_code`) VALUES
(1, 'Afghanistan', 'AF', '93'),
(2, 'Albania', 'AL', '355'),
(3, 'Algeria', 'DZ', '213'),
(4, 'American Samoa', 'AS', '1-684'),
(5, 'Andorra', 'AD', '376'),
(6, 'Angola', 'AO', '244'),
(7, 'Anguilla', 'AI', '1-264'),
(8, 'Antarctica', 'AQ', '672'),
(9, 'Antigua and Barbuda', 'AG', '1-268'),
(10, 'Argentina', 'AR', '54'),
(11, 'Armenia', 'AM', '374'),
(12, 'Aruba', 'AW', '297'),
(13, 'Australia', 'AU', '61'),
(14, 'Austria', 'AT', '43'),
(15, 'Azerbaijan', 'AZ', '994'),
(16, 'Bahamas', 'BS', '1-242'),
(17, 'Bahrain', 'BH', '973'),
(18, 'Bangladesh', 'BD', '880'),
(19, 'Barbados', 'BB', '1-246'),
(20, 'Belarus', 'BY', '375'),
(21, 'Belgium', 'BE', '32'),
(22, 'Belize', 'BZ', '501'),
(23, 'Benin', 'BJ', '229'),
(24, 'Bermuda', 'BM', '1-441'),
(25, 'Bhutan', 'BT', '975'),
(26, 'Bolivia', 'BO', '591'),
(27, 'Bosnia and Herzegowina', 'BA', '387'),
(28, 'Botswana', 'BW', '267'),
(29, 'Bouvet Island', 'BV', '47'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'Brunei Darussalam', 'BN', '673'),
(33, 'Bulgaria', 'BG', '359'),
(34, 'Burkina Faso', 'BF', '226'),
(35, 'Burundi', 'BI', '257'),
(36, 'Cambodia', 'KH', '855'),
(37, 'Cameroon', 'CM', '237'),
(38, 'Canada', 'CA', '1'),
(39, 'Cape Verde', 'CV', '238'),
(40, 'Cayman Islands', 'KY', '1-345'),
(41, 'Central African Republic', 'CF', '236'),
(42, 'Chad', 'TD', '235'),
(43, 'Chile', 'CL', '56'),
(44, 'China', 'CN', '86'),
(45, 'Christmas Island', 'CX', '61'),
(46, 'Cocos (Keeling) Islands', 'CC', '61'),
(47, 'Colombia', 'CO', '57'),
(48, 'Comoros', 'KM', '269'),
(49, 'Congo Democratic Republic of', 'CG', '242'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Cote D\'Ivoire', 'CI', '225'),
(53, 'Croatia', 'HR', '385'),
(54, 'Cuba', 'CU', '53'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Denmark', 'DK', '45'),
(58, 'Djibouti', 'DJ', '253'),
(59, 'Dominica', 'DM', '1-767'),
(60, 'Dominican Republic', 'DO', '1-809'),
(61, 'Timor-Leste', 'TL', '670'),
(62, 'Ecuador', 'EC', '593'),
(63, 'Egypt', 'EG', '20'),
(64, 'El Salvador', 'SV', '503'),
(65, 'Equatorial Guinea', 'GQ', '240'),
(66, 'Eritrea', 'ER', '291'),
(67, 'Estonia', 'EE', '372'),
(68, 'Ethiopia', 'ET', '251'),
(69, 'Falkland Islands (Malvinas)', 'FK', '500'),
(70, 'Faroe Islands', 'FO', '298'),
(71, 'Fiji', 'FJ', '679'),
(72, 'Finland', 'FI', '358'),
(73, 'France', 'FR', '33'),
(75, 'French Guiana', 'GF', '594'),
(76, 'French Polynesia', 'PF', '689'),
(77, 'French Southern Territories', 'TF', NULL),
(78, 'Gabon', 'GA', '241'),
(79, 'Gambia', 'GM', '220'),
(80, 'Georgia', 'GE', '995'),
(81, 'Germany', 'DE', '49'),
(82, 'Ghana', 'GH', '233'),
(83, 'Gibraltar', 'GI', '350'),
(84, 'Greece', 'GR', '30'),
(85, 'Greenland', 'GL', '299'),
(86, 'Grenada', 'GD', '1-473'),
(87, 'Guadeloupe', 'GP', '590'),
(88, 'Guam', 'GU', '1-671'),
(89, 'Guatemala', 'GT', '502'),
(90, 'Guinea', 'GN', '224'),
(91, 'Guinea-bissau', 'GW', '245'),
(92, 'Guyana', 'GY', '592'),
(93, 'Haiti', 'HT', '509'),
(94, 'Heard Island and McDonald Islands', 'HM', '011'),
(95, 'Honduras', 'HN', '504'),
(96, 'Hong Kong', 'HK', '852'),
(97, 'Hungary', 'HU', '36'),
(98, 'Iceland', 'IS', '354'),
(99, 'India', 'IN', '91'),
(100, 'Indonesia', 'ID', '62'),
(101, 'Iran (Islamic Republic of)', 'IR', '98'),
(102, 'Iraq', 'IQ', '964'),
(103, 'Ireland', 'IE', '353'),
(104, 'Israel', 'IL', '972'),
(105, 'Italy', 'IT', '39'),
(106, 'Jamaica', 'JM', '1-876'),
(107, 'Japan', 'JP', '81'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Korea, Democratic People\'s Republic of', 'KP', '850'),
(113, 'South Korea', 'KR', '82'),
(114, 'Kuwait', 'KW', '965'),
(115, 'Kyrgyzstan', 'KG', '996'),
(116, 'Lao People\'s Democratic Republic', 'LA', '856'),
(117, 'Latvia', 'LV', '371'),
(118, 'Lebanon', 'LB', '961'),
(119, 'Lesotho', 'LS', '266'),
(120, 'Liberia', 'LR', '231'),
(121, 'Libya', 'LY', '218'),
(122, 'Liechtenstein', 'LI', '423'),
(123, 'Lithuania', 'LT', '370'),
(124, 'Luxembourg', 'LU', '352'),
(125, 'Macao', 'MO', '853'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', '389'),
(127, 'Madagascar', 'MG', '261'),
(128, 'Malawi', 'MW', '265'),
(129, 'Malaysia', 'MY', '60'),
(130, 'Maldives', 'MV', '960'),
(131, 'Mali', 'ML', '223'),
(132, 'Malta', 'MT', '356'),
(133, 'Marshall Islands', 'MH', '692'),
(134, 'Martinique', 'MQ', '596'),
(135, 'Mauritania', 'MR', '222'),
(136, 'Mauritius', 'MU', '230'),
(137, 'Mayotte', 'YT', '262'),
(138, 'Mexico', 'MX', '52'),
(139, 'Micronesia, Federated States of', 'FM', '691'),
(140, 'Moldova', 'MD', '373'),
(141, 'Monaco', 'MC', '377'),
(142, 'Mongolia', 'MN', '976'),
(143, 'Montserrat', 'MS', '1-664'),
(144, 'Morocco', 'MA', '212'),
(145, 'Mozambique', 'MZ', '258'),
(146, 'Myanmar', 'MM', '95'),
(147, 'Namibia', 'NA', '264'),
(148, 'Nauru', 'NR', '674'),
(149, 'Nepal', 'NP', '977'),
(150, 'Netherlands', 'NL', '31'),
(151, 'Netherlands Antilles', 'AN', '599'),
(152, 'New Caledonia', 'NC', '687	'),
(153, 'New Zealand', 'NZ', '64'),
(154, 'Nicaragua', 'NI', '505'),
(155, 'Niger', 'NE', '227'),
(156, 'Nigeria', 'NG', '234'),
(157, 'Niue', 'NU', '683'),
(158, 'Norfolk Island', 'NF', '672'),
(159, 'Northern Mariana Islands', 'MP', '1-670'),
(160, 'Norway', 'NO', '47'),
(161, 'Oman', 'OM', '968'),
(162, 'Pakistan', 'PK', '92'),
(163, 'Palau', 'PW', '680'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787'),
(173, 'Qatar', 'QA', '974'),
(174, 'Reunion', 'RE', '262'),
(175, 'Romania', 'RO', '40'),
(176, 'Russian Federation', 'RU', '7'),
(177, 'Rwanda', 'RW', '250'),
(178, 'Saint Kitts and Nevis', 'KN', '1-869'),
(179, 'Saint Lucia', 'LC', '1-758'),
(180, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(181, 'Samoa', 'WS', '685'),
(182, 'San Marino', 'SM', '378'),
(183, 'Sao Tome and Principe', 'ST', '239'),
(184, 'Saudi Arabia', 'SA', '966'),
(185, 'Senegal', 'SN', '221'),
(186, 'Seychelles', 'SC', '248'),
(187, 'Sierra Leone', 'SL', '232'),
(188, 'Singapore', 'SG', '65'),
(189, 'Slovakia (Slovak Republic)', 'SK', '421'),
(190, 'Slovenia', 'SI', '386'),
(191, 'Solomon Islands', 'SB', '677'),
(192, 'Somalia', 'SO', '252'),
(193, 'South Africa', 'ZA', '27'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', '500'),
(195, 'Spain', 'ES', '34'),
(196, 'Sri Lanka', 'LK', '94'),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '290'),
(198, 'St. Pierre and Miquelon', 'PM', '508'),
(199, 'Sudan', 'SD', '249'),
(200, 'Suriname', 'SR', '597'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', '47'),
(202, 'Swaziland', 'SZ', '268'),
(203, 'Sweden', 'SE', '46'),
(204, 'Switzerland', 'CH', '41'),
(205, 'Syrian Arab Republic', 'SY', '963'),
(206, 'Taiwan', 'TW', '886'),
(207, 'Tajikistan', 'TJ', '992'),
(208, 'Tanzania, United Republic of', 'TZ', '255'),
(209, 'Thailand', 'TH', '66'),
(210, 'Togo', 'TG', '228'),
(211, 'Tokelau', 'TK', '690'),
(212, 'Tonga', 'TO', '676'),
(213, 'Trinidad and Tobago', 'TT', '1-868'),
(214, 'Tunisia', 'TN', '216'),
(215, 'Turkey', 'TR', '90'),
(216, 'Turkmenistan', 'TM', '993'),
(217, 'Turks and Caicos Islands', 'TC', '1-649'),
(218, 'Tuvalu', 'TV', '688'),
(219, 'Uganda', 'UG', '256'),
(220, 'Ukraine', 'UA', '380'),
(221, 'United Arab Emirates', 'AE', '971'),
(222, 'United Kingdom', 'GB', '44'),
(223, 'United States', 'US', '1'),
(224, 'United States Minor Outlying Islands', 'UM', '246'),
(225, 'Uruguay', 'UY', '598'),
(226, 'Uzbekistan', 'UZ', '998'),
(227, 'Vanuatu', 'VU', '678'),
(228, 'Vatican City State (Holy See)', 'VA', '379'),
(229, 'Venezuela', 'VE', '58'),
(230, 'Vietnam', 'VN', '84'),
(231, 'Virgin Islands (British)', 'VG', '1-284'),
(232, 'Virgin Islands (U.S.)', 'VI', '1-340'),
(233, 'Wallis and Futuna Islands', 'WF', '681'),
(234, 'Western Sahara', 'EH', '212'),
(235, 'Yemen', 'YE', '967'),
(236, 'Serbia', 'RS', '381'),
(238, 'Zambia', 'ZM', '260'),
(239, 'Zimbabwe', 'ZW', '263'),
(240, 'Aaland Islands', 'AX', '358'),
(241, 'Palestine', 'PS', '970'),
(242, 'Montenegro', 'ME', '382'),
(243, 'Guernsey', 'GG', '44-1481'),
(244, 'Isle of Man', 'IM', '44-1624'),
(245, 'Jersey', 'JE', '44-1534'),
(247, 'Curaçao', 'CW', '599'),
(248, 'Ivory Coast', 'CI', '225'),
(249, 'Kosovo', 'XK', '383');

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--

CREATE TABLE IF NOT EXISTS `eventlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userip` binary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `uid`, `email`, `userip`, `logintime`, `status`) VALUES
(24, 2, 'event@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-26 07:39:54', 1),
(25, 2, 'event@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-26 09:24:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_or_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `event_image` varchar(5000) NOT NULL,
  `added_by` int(11) NOT NULL,
  `event_added` datetime NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `ev_or_id`, `title`, `details`, `category_id`, `event_image`, `added_by`, `event_added`) VALUES
(15, 0, 'Movie', 'Film, also called movie or motion picture, is a visual art used to simulate experiences that communicate ideas, stories, perceptions, feelings, beauty or atmosphere by the means of recorded or programmed moving images along with other sensory stimulations.[1] The word \"cinema\", short for cinematography, is often used to refer to filmmaking and the film industry, and to the art form that is the result of it.', 2, 'fghj.jpg', 0, '2020-01-18 10:42:21'),
(16, 0, 'Football', 'Football is a family of team sports that involve, to varying degrees, kicking a ball to score a goal. Unqualified, the word football normally means the form of football that is the most popular where the word is used. Sports commonly called football include association football (known as soccer in some countries); gridiron football (specifically American football or Canadian football); Australian rules football; rugby football (either rugby league or rugby union); and Gaelic football.[1][2] These various forms of football are known as football codes.', 1, 'jkhg.jpg', 0, '2020-01-18 10:45:04'),
(17, 0, 'Airplane', 'An airplane or aeroplane (informally plane) is a powered, fixed-wing aircraft that is propelled forward by thrust from a jet engine, propeller or rocket engine. Airplanes come in a variety of sizes, shapes, and wing configurations. The broad spectrum of uses for airplanes includes recreation, transportation of goods and people, military, and research. Worldwide', 6, 'asdfgyjhvdsdfgthyjuk.jpg', 0, '2020-01-18 10:55:15'),
(18, 0, 'Wrestling', 'Wrestling is a combat sport involving grappling-type techniques such as clinch fighting, throws and takedowns, joint locks, pins and other grappling holds. The sport can either be theatrical for entertainment (see professional wrestling), or genuinely competitive. A wrestling bout is a physical competition, between two (occasionally more) competitors or sparring partners, who attempt to gain and maintain a superior position. There are a wide range of styles with varying rules with both traditional historic and modern styles. Wrestling techniques have been incorporated into other martial arts as well as military hand-to-hand combat systems.', 1, 'download.jpg', 0, '2020-03-18 13:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `event_organizer`
--

CREATE TABLE IF NOT EXISTS `event_organizer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` char(8) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_organizer`
--

INSERT INTO `event_organizer` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `contact`, `gender`, `address`, `image`, `creation_date`) VALUES
(2, 'Sleiman ', '', 'Alfaihan', 'event@gmail.com', '4119639092e62c55ea8be348e4d9260d', '01272895', 'Male', 'Kwuit', '', '2020-02-19 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE IF NOT EXISTS `tblsubscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubscriberEmail` varchar(100) NOT NULL,
  `PostingDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'ahmed@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonias`
--

CREATE TABLE IF NOT EXISTS `testimonias` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `Testimonial` text NOT NULL,
  `status` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonias`
--

INSERT INTO `testimonias` (`test_id`, `user_email`, `Testimonial`, `status`, `posting_date`) VALUES
(5, 'blackmarket@gmail.com', 'This is a very useful website', 1, '2020-03-17 07:17:15'),
(6, 'blackmarket@gmail.com', 'Nice', 1, '2020-03-26 07:44:50'),
(7, 'ahmedalamir521@gmail.com', 'good', 0, '2022-10-29 19:49:29'),
(8, 'ahmedalamir521@gmail.com', 'good', 0, '2022-10-29 19:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ev_or_id` int(11) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `ticket_title` varchar(200) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `event` varchar(100) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `final` varchar(200) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `status1` int(10) DEFAULT NULL,
  `start_date` varchar(100) NOT NULL,
  `time11` varchar(100) NOT NULL,
  `seat_num` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `duration` int(4) NOT NULL,
  `ticket_code` varchar(6) NOT NULL,
  `ticket_image` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `added_date` datetime NOT NULL,
  `checkout` varchar(10) DEFAULT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ev_or_id`, `user_email`, `ticket_title`, `ticket_type`, `event`, `ticket_price`, `final`, `status`, `status1`, `start_date`, `time11`, `seat_num`, `country`, `address`, `description`, `duration`, `ticket_code`, `ticket_image`, `image`, `added_date`, `checkout`, `remark`) VALUES
(54, 2, 'ahmedalamir521@gmail.com', 'Barchalona VS Real madrid', '1', '16', 20, 'Ticket Title ( Barchalona VS Real madrid ) Event Name ( Football ) Ticket Price ( 20 ) Status ( New ) Ticket Cod ( DCMLMG ) Date ( 2020-05-18 ) Duration by hours ( 4 ) ', 'New', NULL, '2020-05-18', '22:00', '105', 'Espan', 'Espan / Barchlona / Camp No studium', 'The Classico betwwen 2 espain national teams barchalona and real madrid is the biggest football event in espan and the world', 4, 'DCMLMG', 'meravi15063.png', 'download (1).jpg', '2020-03-18 15:10:32', '1', 'Available'),
(56, 2, 'ahmedalamir521@gmail.com', 'Barchalona VS Real madrid', '2', '16', 20, 'Ticket Title ( Barchalona VS Real madrid ) Event Name ( Football ) Ticket Price ( 20 ) Status ( New ) Ticket Cod ( SKDFJG ) Date ( 2020-05-18 ) Duration by hours ( 4 ) ', 'New', NULL, '2020-05-18', '22:00', '212', 'Espan', 'Espan / Barchlona / Camp No studium', 'The Classico betwwen 2 espain national teams barchalona and real madrid is the biggest football event in espan and the world', 4, 'SKDFJG', 'meravi18400.png', 'download (1).jpg', '2020-03-18 15:16:25', NULL, 'Not Available'),
(58, 2, 'ahmedalamir521@gmail.com', 'Barchalona VS Real madrid', '1', '16', 10, 'Ticket Title ( Barchalona VS Real madrid ) Event Name ( Football ) Ticket Price ( 10 ) Status ( New ) Ticket Cod ( SDRTYU ) Date ( 2020-05-18 ) Duration by hours ( 4 ) ', 'New', NULL, '2020-05-18', '22:00', '201', 'Espan', 'Espan / Barchlona / Camp No studium', 'The Classico betwwen 2 espain national teams barchalona and real madrid is the biggest football event in espan and the world', 4, 'SDRTYU', 'meravi8005.png', 'download (1).jpg', '2020-03-18 17:34:18', NULL, 'Not Available'),
(60, 2, NULL, 'Royal Rumble', '3', '18', 100, 'Ticket Title ( Royal Rumble ) Event Name ( Wrestling ) Ticket Price ( 100 ) Status ( New ) Ticket Cod ( DFTGHJ ) Date ( 2020-06-19 ) Duration by hours ( 10 ) ', 'New', NULL, '2020-06-19', '13:00', '2258', 'Sudia', 'Sadia / Gedah', 'The Royal Rumble is a professional wrestling event, produced every January since 1988 by professional wrestling promotion. WWE It is named after the Royal Rumble match, a battle royal whose participants enter at timed intervals', 10, 'DFTGHJ', 'meravi18152.png', 'download (2).jpg', '2020-03-19 11:34:59', NULL, 'Available'),
(61, 2, NULL, 'Royal Rumble', '2', '18', 100, 'Ticket Title ( Royal Rumble ) Event Name ( Wrestling ) Ticket Price ( 100 ) Status ( New ) Ticket Cod ( BGVFBG ) Date ( 2020-06-19 ) Duration by hours ( 10 ) ', 'New', NULL, '2020-06-19', '13:00', '2886', 'Sadia ', 'Sadia / Gedah', 'The Royal Rumble is a professional wrestling event, produced every January since 1988 by professional wrestling promotion. WWE It is named after the Royal Rumble match, a battle royal whose participants enter at timed intervals', 10, 'BGVFBG', 'meravi4207.png', 'download (2).jpg', '2020-03-19 11:36:29', NULL, 'Available'),
(62, 2, NULL, 'Royal Rumble', '2', '18', 100, 'Ticket Title ( Royal Rumble ) Event Name ( Wrestling ) Ticket Price ( 100 ) Status ( New ) Ticket Cod ( UYBTVT ) Date ( 2020-06-19 ) Duration by hours ( 10 ) ', 'New', NULL, '2020-06-19', '13:00', '288', 'Sudia', 'Sadia / Gedah', 'The Royal Rumble is a professional wrestling event, produced every January since 1988 by professional wrestling promotion. WWE It is named after the Royal Rumble match, a battle royal whose participants enter at timed intervals', 10, 'UYBTVT', 'meravi4353.png', 'download (2).jpg', '2020-03-19 11:38:18', NULL, 'Available'),
(63, 2, NULL, 'Liverpool Vs Manchester City', '2', '16', 30, 'Ticket Title ( Liverpool Vs Manchester City ) Event Name ( Football ) Ticket Price ( 30 ) Status ( New ) Ticket Cod ( ERFGBH ) Date ( 2020-07-20 ) Duration by hours ( 3 ) ', 'New', NULL, '2020-07-20', '20:00', '2564', 'Liverpool', 'Liverpool / Anfield studium', 'The Liverpool F.C.â€“Manchester City F.C. rivalry, also known as the M6 Derby, is a high-profile inter-city rivalry between English professional association football clubs Liverpool and Manchester City. It is considered to be one of the biggest rivalries in the association football world in the late 2010s.', 3, 'ERFGBH', 'meravi380.png', 'download (3).jpg', '2020-03-19 11:40:20', NULL, 'Available'),
(64, 2, NULL, 'Liverpool Vs Manchester City', '3', '16', 30, 'Ticket Title ( Liverpool Vs Manchester City ) Event Name ( Football ) Ticket Price ( 30 ) Status ( New ) Ticket Cod ( GHJKIJ ) Date ( 2020-07-20 ) Duration by hours ( 3 ) ', 'New', NULL, '2020-07-20', '20:00', '4242', 'Liverpool ', 'Liverpool / Anfield studium', 'The Liverpool F.C.â€“Manchester City F.C. rivalry, also known as the M6 Derby, is a high-profile inter-city rivalry between English professional association football clubs Liverpool and Manchester City. It is considered to be one of the biggest rivalries in the association football world in the late 2010s.', 3, 'GHJKIJ', 'meravi15270.png', 'download (3).jpg', '2020-03-19 11:44:11', NULL, 'Available'),
(65, 2, NULL, 'Ip.Man.4.The.Finale', '1', '15', 25, 'Ticket Title ( Ip.Man.4.The.Finale ) Event Name ( Movie ) Ticket Price ( 25 ) Status ( New ) Ticket Cod ( HJKIUJ ) Date ( 2020-09-04 ) Duration by hours ( 2 ) ', 'New', NULL, '2020-09-04', '00:00', '100', 'Egypt', 'Egypt / Bahlol Cinema', 'Ip Man 4: The Finale is a 2019 Chinese martial arts film directed by Wilson Yip and produced by Raymond Wong. It is the fourth and final film in the Ip Man film series based on the life of the Wing Chun grandmaster of the same name and features Donnie Yen reprising the role.', 2, 'HJKIUJ', 'meravi1102.png', 'download (4).jpg', '2020-03-19 11:48:46', NULL, 'Available'),
(66, 2, 'ahmedalamir521@gmail.com', 'Ip.Man.4.The.Finale', '3', '15', 25, 'Ticket Title ( Ip.Man.4.The.Finale ) Event Name ( Movie ) Ticket Price ( 25 ) Status ( New ) Ticket Cod ( SDCVBH ) Date ( 2020-09-04 ) Duration by hours ( 2 ) ', 'New', NULL, '2020-09-04', '00:00', '52', 'Egypt', 'Egypt / Bahlol Cinema', 'Ip Man 4: The Finale is a 2019 Chinese martial arts film directed by Wilson Yip and produced by Raymond Wong. It is the fourth and final film in the Ip Man film series based on the life of the Wing Chun grandmaster of the same name and features Donnie Yen reprising the role.', 2, 'SDCVBH', 'meravi10727.png', 'download (4).jpg', '2020-03-19 11:49:59', NULL, 'Not Available'),
(67, 2, 'blackmarket@gmail.com', 'Ip.Man.4.The.Finale', '1', '15', 25, 'Ticket Title ( Ip.Man.4.The.Finale ) Event Name ( Movie ) Ticket Price ( 25 ) Status ( New ) Ticket Cod ( DFTGHY ) Date ( 2020-09-04 ) Duration by hours ( 2 ) ', 'New', NULL, '2020-09-04', '00:00', '452', 'Egypt', 'Egypt / Bahlol Cinema', 'Ip Man 4: The Finale is a 2019 Chinese martial arts film directed by Wilson Yip and produced by Raymond Wong. It is the fourth and final film in the Ip Man film series based on the life of the Wing Chun grandmaster of the same name and features Donnie Yen reprising the role.', 2, 'DFTGHY', 'meravi27028.png', 'download (4).jpg', '2020-03-19 11:51:10', NULL, 'Not Available'),
(68, NULL, NULL, 'Ip.Man.4.The.Finale', '2', '15', 25, 'Ticket Title ( Ip.Man.4.The.Finale ) Event Name ( Movie ) Ticket Price ( 25 ) Status ( New ) Ticket Cod ( CVGHJG ) Date ( 2020-09-04 ) Duration by hours ( 2 ) ', 'New', NULL, '2020-09-04', '01:00', '254', 'Egypt', 'Egypt / Bahlol Cinema', 'Ip Man 4: The Finale is a 2019 Chinese martial arts film directed by Wilson Yip and produced by Raymond Wong. It is the fourth and final film in the Ip Man film series based on the life of the Wing Chun grandmaster of the same name and features Donnie Yen reprising the role.', 2, 'CVGHJG', 'meravi20829.png', 'download (4).jpg', '2020-03-19 12:00:02', NULL, 'Available'),
(69, 2, NULL, 'Barchalona VS Real madrid', '1', '16', 60, 'Ticket Title ( Barchalona VS Real madrid ) Event Name ( Football ) Ticket Price ( 60 ) Status ( New ) Ticket Cod ( DVBNJK ) Date ( 2020-05-18 ) Duration by hours ( 4 ) ', 'New', NULL, '2020-05-18', '22:00', '150', 'Espan', 'Espan / Barchlona / Camp No studium', 'The Classico betwwen 2 espain national teams barchalona and real madrid is the biggest football event in espan and the world', 4, 'DVBNJK', 'meravi23867.png', 'download (1).jpg', '2020-03-26 13:25:18', NULL, 'Available'),
(70, 2, NULL, 'Barchalona VS Real madrid', '3', '16', 15, 'Ticket Title ( Barchalona VS Real madrid ) Event Name ( Football ) Ticket Price ( 15 ) Status ( New ) Ticket Cod ( GBHNJJ ) Date ( 2020-05-18 ) Duration by hours ( 4 ) ', 'New', NULL, '2020-05-18', '22:00', '150', 'Espan ', 'Espan / Barchlona / Camp No studium', 'The Classico betwwen 2 espain national teams barchalona and real madrid is the biggest football event in espan and the world', 4, 'GBHNJJ', 'meravi25134.png', 'download (1).jpg', '2020-03-26 13:27:06', NULL, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `ttypes`
--

CREATE TABLE IF NOT EXISTS `ttypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `ttype` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttypes`
--

INSERT INTO `ttypes` (`type_id`, `ttype`, `created_at`) VALUES
(1, 'First Class', '2022-10-16 09:31:35'),
(2, 'Second Class', '2022-10-16 09:31:58'),
(3, 'Third Class', '2022-10-16 09:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `isd_code` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `isd_code`, `email`, `password`, `contact`, `address`, `country`, `city`, `user_added`) VALUES
(15, 'Black Market', '965', 'blackmarket@gmail.com', '1ffd9e753c8054cc61456ac7fac1ac89', '01272895124', 'Kwuit / Alahmadi', 'KW', 'Alahmadi', '2020-03-15 03:39:20'),
(16, 'Ahmed Mostafa', '20', 'ahmedalamir521@gmail.com', 'f02ae62bb0e52a1c961fc9f50b57cb37', '01012921224', '', 'EG', '', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
