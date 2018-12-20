-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2018 at 02:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `RENTZEN`
--

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `feature_name`, `description`, `quantity`) VALUES
(201, 'Laundry', NULL, NULL),
(202, 'Parking', NULL, NULL),
(203, 'Pets Allowed', NULL, NULL),
(204, 'Central Air', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `landlord_property`
--

DROP TABLE IF EXISTS `landlord_property`;
CREATE TABLE `landlord_property` (
  `landlord_property_id` int(11) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landlord_property`
--

INSERT INTO `landlord_property` (`landlord_property_id`, `landlord_id`, `property_id`) VALUES
(9301, 902, 301),
(9302, 902, 302),
(9303, 902, 303),
(9304, 902, 304),
(9305, 902, 305),
(9306, 902, 306),
(9307, 903, 307),
(9308, 902, 308),
(9309, 903, 309),
(9310, 902, 314),
(9311, 902, 315),
(9312, 908, 316),
(9313, 902, 317),
(9314, 913, 318),
(9315, 902, 319),
(9316, 902, 320),
(9317, 902, 321),
(9318, 902, 322),
(9319, 902, 323),
(9320, 902, 324),
(9321, 924, 325);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `credit_rating` int(11) DEFAULT NULL,
  `income` decimal(10,0) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `email`, `username`, `password`, `firstname`, `lastname`, `phone`, `street`, `city`, `state_id`, `zip`, `role_id`, `credit_rating`, `income`, `date_updated`) VALUES
(901, '', 'esmith@email.com', 'esmith123', 'Emily', 'Smith', '2677462000', '1234 Elm Ave.', 'Marlton', 30, '08053', 101, 670, '120888', '2018-02-08 00:00:00'),
(902, '', 'ajones@email.com', 'ajones123', 'Alex', 'Jones', '2677462999', '1234 Oak Ave.', 'Medford', 30, '08055', 102, NULL, NULL, NULL),
(903, 'abc@email.com', 'abc@email.com', 'password', 'Harold', 'Benz', '2677462002', '1234 Spruce St.', 'Philadelphia', 38, '19147', 102, NULL, NULL, NULL),
(904, 'def@email.com', 'def@email.com', 'password', 'Jennie', 'Mercedes', '2677462008', '1234 Old Ave.', 'Philadelphia', 38, '19147', 101, 740, '80000', '2018-03-24 17:21:06'),
(905, 'ghi@email.com', 'ghi@email.com', 'password', 'Alfred', 'Camry', '2677462005', '1234 10th St.', 'Philadelphia', 38, '19147', 101, 800, '90000', '2018-03-24 17:21:06'),
(907, '', 'terry@temple.edu', 'tree789', 'Terry', 'Taylor', '', '', '', NULL, '', 102, NULL, NULL, NULL),
(908, '', 'samantha@rentzen.com', 'samantha', 'Samantha', 'Nichols', '5555555555', '', '', NULL, '', 102, NULL, NULL, NULL),
(909, '', 'nichols@rentzen.com', 'nichols', 'Nick', 'Nichols', '', '', '', NULL, '', 101, 500, '50000', NULL),
(910, '', 'ajones@email.com', 'ajones123', 'Alex', 'Jones', '2677462999', '', '', NULL, '', 102, NULL, NULL, NULL),
(911, '', 'eusmith@email.com', 'esmith456', 'Eustace', 'Smith', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(912, '', 'ben@gmail.com', 'ben123', 'Ben', 'Ascione', '2158558783', '', '', NULL, '', 101, 670, '70000', NULL),
(913, '', 'marvin@temple.edu', 'marvin', 'Marvin', 'Michaels', '44444444444', '', '', NULL, '', 102, NULL, NULL, NULL),
(914, '', 'noah.good@gmail.com', 'good', 'Noah', 'Good', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(915, '', 'chris.nichols@gmail.com', 'chris123', 'Chris', 'Nichols', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(916, '', 'chris.cini@gmail.com', 'chris123', 'Chris', 'Cini', '215-886-3434', '', '', NULL, '', 101, 600, '50000', NULL),
(917, '', 'nichols@nichols.com', 'nichols123', 'Larry', 'Nichols', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(918, '', 'chris.nichols@temple.edu', 'cncn123', 'Chris', 'Nichols', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(919, '', 'dum@temple.edu', 'dumdeedumdum', 'Danny', 'Dumb', '215 555 1212', '', '', NULL, '', 101, NULL, NULL, NULL),
(920, '', 'jon.jet@email.com', 'jon123', 'Johnny', 'Jet', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(921, '', 'john.cini@gmail.com', 'john123', 'John', 'Cini', '2156887575', '', '', NULL, '', 101, 560, '40000', NULL),
(922, '', 'ajones@email.com', 'ajones123', 'Alvin', 'Jones', '', '', '', NULL, '', 102, NULL, NULL, NULL),
(923, '', 'jeremy.schaeffer@temple.edu', 'test', 'Jeremy', 'Schaeffer', '', '', '', NULL, '', 101, NULL, NULL, NULL),
(924, '', 'test@test.com', 'test', 'Tom', 'Test', '', '', '', NULL, '', 102, NULL, NULL, NULL),
(925, '', 'test@test1.com', 'test', 'Tammy', 'Test', '', '', '', NULL, '', 101, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people_role`
--

DROP TABLE IF EXISTS `people_role`;
CREATE TABLE `people_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people_role`
--

INSERT INTO `people_role` (`role_id`, `role`) VALUES
(101, 'renter'),
(102, 'landlord'),
(103, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` decimal(5,1) NOT NULL,
  `sqft` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `propstat_id` int(11) NOT NULL,
  `income_requirement` decimal(8,2) NOT NULL,
  `credit_requirement` int(11) NOT NULL,
  `rental_fee` decimal(8,0) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `street`, `city`, `state_id`, `zip`, `beds`, `baths`, `sqft`, `type_id`, `propstat_id`, `income_requirement`, `credit_requirement`, `rental_fee`, `description`, `picture`) VALUES
(301, '33 walnut street', 'Philadelphia', 38, '19145', 2, '1.5', 1100, 504, 403, '60000.00', 750, '1300', 'Welcome home to Walnut Street in Philadelphia. This 1100 square foot home has been completely renovated and is move-in ready! A charming covered front porch provides tons of curb appeal.  You''ll love', '../images/home1.jpg'),
(302, '43 chestnut street', 'Philadelphia', 38, '19145', 5, '2.5', 1500, 504, 402, '80000.00', 750, '2000', 'Pack your bags and move right into Chestnut Street. This rowhome blends original Old City charm with modern living. Step into the main entrance and see the spacious living area', '../images/home2.jpg'),
(303, '89 locust street', 'Philadelphia', 38, '19145', 4, '1.5', 1300, 504, 403, '70000.00', 790, '1700', 'Pack your bags and move right into Chestnut Street. This rowhome blends original Old City charm with modern living. Step into the main entrance and see the spacious living area', '../images/home3.jpg'),
(304, '22 spruce street', 'Philadelphia', 38, '19145', 2, '1.0', 1100, 504, 403, '60000.00', 750, '1300', 'Welcome home to Spruce Street in Philadelphia. This 1100 square foot home has been completely renovated and is move-in ready! A charming covered front porch provides tons of curb appeal.  You''ll love', '../images/home4.jpg'),
(305, '38 spruce street', 'Philadelphia', 38, '19145', 3, '1.5', 1200, 504, 402, '60000.00', 740, '1200', 'Pack your bags and move right into Chestnut Street.This rowhome blends original Old City charm with modern living. Step into the main entrance and see the spacious living area', '../images/home5.jpg'),
(306, '2116 Walnut St', 'Philadelphia', 38, '19103', 1, '1.0', 700, 502, 403, '50000.00', 500, '1000', 'Pack your bags and move right into Walnut Street. This rowhome blends with modern living. Step into the main entrance and see the spacious living area. Prime location! Fantastic studio unit with kitch', '../images/home6.jpg'),
(307, '800 lombard street', 'Philadelphia', 38, '19145', 2, '1.0', 1100, 503, 402, '60000.00', 600, '1450', 'Welcome home to Lombard Street in Philadelphia. This 1100 square foot home has been completely renovated and is move-in ready! A charming covered front porch provides tons of curb appeal.  You''ll love', '../images/home7.jpg'),
(308, '700 race street', 'Philadelphia', 38, '19145', 1, '1.0', 800, 502, 402, '50000.00', 750, '800', 'Fantastic studio condominium with a sunrise and river view from the three floor to ceiling windows in the I.M. Pei designed Society Hill Towers. This residence has been completely gutted and renovated', '../images/home8.jpg'),
(309, '400 2nd street', 'Philadelphia', 38, '19145', 1, '1.0', 600, 502, 403, '50000.00', 750, '800', 'Fantastic studio condominium with a sunrise and river view from the three floor to ceiling windows in the I.M. Pei designed Society Hill Towers. This residence has been completely gutted and renovated', '../images/home9.jpg'),
(312, '1603 N Broad St, S-0916', 'Phoenixville', 38, '19122', 4, '1.0', 1, 501, 401, '2.00', 1, '1', 'IRS', '../images/home5.jpg'),
(314, '1603 N Broad', 'Pittsburg', 38, '19122', 2, '2.0', 1, 501, 402, '1.00', 1, '2', 'asdf', NULL),
(315, '831 Columbus', 'Brick', 30, '08724', 1, '10.0', 2500, 501, 402, '36000.00', 600, '750', 'Beautiful home in Brick, New Jersey. Located right next to the famous Tyler Ascione''s Home.', NULL),
(316, '1800 Elm Street', 'Philadelphia', 38, '19147', 2, '2.0', 500, 502, 402, '50000.00', 500, '500', 'Standout!', '../images/home6.jpg'),
(317, '1601 N. Broad Street', 'Philadelphia', 38, '19122', 1, '1.0', 800, 502, 403, '40000.00', 800, '700', 'Lovely Home in morgan north', '../images/home5.jpg'),
(318, 'Elf lane', 'philadelphia', 19, '55555', 1, '1.0', 500, 501, 402, '50000.00', 300, '5000', 'Beachfront!', '../images/home6.jpg'),
(319, '1601 N. Broad Street, RM-N1801', 'Philadelphia', 38, '19122', 1, '1.0', 250, 501, 402, '56000.00', 700, '800', 'Nice home - Tyler might live here.', '../images/home3.jpg'),
(320, '1901 Susquehana', 'Philadelphia', 38, '19302', 4, '4.0', 800, 502, 402, '130000.00', 700, '1450', 'A nice apartment in North Philly', '../images/home5.jpg'),
(321, '1900 N Broad', 'Philadelphia', 38, '19144', 3, '2.0', 800, 501, 402, '120000.00', 680, '1700', 'Great place to live', '../images/home7.jpg'),
(322, '1700 N Broad St', 'Philadelphia', 8, '19100', 1, '1.0', 1100, 502, 402, '60000.00', 700, '800', 'A beautiful home', '../images/home1.jpg'),
(323, '1700 Carlisle Street', 'Philadelphia', 38, '19121', 1, '1.0', 600, 502, 402, '40000.00', 560, '1400', 'Beautiful Home in philadelphia with amazing views.', '../images/home6.jpg'),
(324, '1900 N. Broad Street', 'Philadelphia', 38, '19122', 2, '1.0', 1200, 502, 402, '35000.00', 550, '600', 'Beautiful home.', '../images/home7.jpg'),
(325, '123 street', 'Feasterville', 38, '19053', 2, '1.0', 5000, 503, 402, '55000.00', 500, '1000', 'test', '../images/home2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_feature`
--

DROP TABLE IF EXISTS `property_feature`;
CREATE TABLE `property_feature` (
  `propertyfeature_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_feature`
--

INSERT INTO `property_feature` (`propertyfeature_id`, `feature_id`, `property_id`) VALUES
(3201, 201, 301),
(3202, 202, 301),
(3203, 203, 301),
(3204, 201, 302),
(3205, 202, 302),
(3206, 203, 302),
(3207, 201, 303),
(3208, 202, 303),
(3209, 203, 303);

-- --------------------------------------------------------

--
-- Table structure for table `property_status`
--

DROP TABLE IF EXISTS `property_status`;
CREATE TABLE `property_status` (
  `propstat_id` int(11) NOT NULL,
  `propertystat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_status`
--

INSERT INTO `property_status` (`propstat_id`, `propertystat`) VALUES
(401, 'vacant'),
(402, 'occupied'),
(403, 'listed');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
CREATE TABLE `property_type` (
  `propertytype_id` int(11) NOT NULL,
  `typename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`propertytype_id`, `typename`) VALUES
(501, 'Houses'),
(502, 'Apartments'),
(503, 'Condos/co-ops'),
(504, 'Townhomes');

-- --------------------------------------------------------

--
-- Table structure for table `rental_application`
--

DROP TABLE IF EXISTS `rental_application`;
CREATE TABLE `rental_application` (
  `rental_application_id` int(11) NOT NULL,
  `renterproperty_id` int(11) NOT NULL,
  `last_status_id` int(11) DEFAULT NULL,
  `move_in_date` date DEFAULT NULL,
  `move_out_date` date DEFAULT NULL,
  `renter_message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_application`
--

INSERT INTO `rental_application` (`rental_application_id`, `renterproperty_id`, `last_status_id`, `move_in_date`, `move_out_date`, `renter_message`) VALUES
(1, 3, 4, '2018-05-17', NULL, NULL),
(2, 4, 4, '2018-05-17', NULL, NULL),
(3, 5, 2, '2018-05-17', NULL, NULL),
(4, 6, 2, '2018-05-17', NULL, NULL),
(5, 7, 2, '2018-05-17', NULL, NULL),
(6, 8, 4, '2018-05-17', NULL, NULL),
(7, 9, 2, '2018-05-17', NULL, NULL),
(8, 10, 4, '2018-05-17', NULL, NULL),
(9, 11, 1, '2018-04-20', NULL, NULL),
(10, 12, 1, '0000-00-00', NULL, NULL),
(11, 13, 1, '2018-04-19', NULL, NULL),
(12, 14, 1, '2018-04-27', NULL, NULL),
(13, 15, 1, '2018-04-27', NULL, NULL),
(14, 16, 2, '0000-00-00', NULL, NULL),
(15, 17, 4, '2018-05-18', NULL, 'Your house looks really nice. I''m a student looking for a place to live in the next 2 years'),
(16, 18, 1, '2018-04-21', NULL, NULL),
(17, 19, 2, '2018-06-15', NULL, 'I''m excited to be your renter'),
(18, 20, 2, '2018-01-01', NULL, ''),
(19, 21, 2, '2006-04-18', NULL, 'HI IM BEN! Can i live here plzzzzzzzzzzzzzzzzzzzzzzzzz'),
(20, 22, 4, '2019-02-05', NULL, 'I hope you are friendyl~!'),
(21, 23, 2, '2018-04-30', NULL, 'This place seems very nice'),
(22, 24, 2, '2018-04-27', NULL, 'Hi'),
(23, 25, 2, '2018-05-05', NULL, ''),
(24, 26, 1, '2018-09-01', NULL, 'Hi,\r\n\r\nI''m looking for a place for the next 3 years. I''m a recent graduate from Temple University. \r'),
(25, 27, 2, '2018-08-27', NULL, 'Hello, I''m looking to move in!'),
(26, 28, 2, '2018-07-21', NULL, 'I want to live with Tyler'),
(27, 29, 4, '2018-09-01', NULL, 'I''m looking for a place for the next three years. I''m excited to be your renter.');

-- --------------------------------------------------------

--
-- Table structure for table `rental_app_status`
--

DROP TABLE IF EXISTS `rental_app_status`;
CREATE TABLE `rental_app_status` (
  `app_status_id` int(11) NOT NULL,
  `app_status_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_app_status`
--

INSERT INTO `rental_app_status` (`app_status_id`, `app_status_name`) VALUES
(1, 'submitted'),
(2, 'rejected'),
(3, 'saved_as_draft'),
(4, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `renter_property`
--

DROP TABLE IF EXISTS `renter_property`;
CREATE TABLE `renter_property` (
  `renterproperty_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `renter_match_score` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter_property`
--

INSERT INTO `renter_property` (`renterproperty_id`, `renter_id`, `property_id`, `renter_match_score`) VALUES
(1, 901, 307, NULL),
(2, 901, 308, NULL),
(3, 901, 308, NULL),
(4, 905, 303, NULL),
(5, 901, 308, NULL),
(6, 901, 308, NULL),
(7, 901, 308, NULL),
(8, 904, 304, NULL),
(9, 901, 308, NULL),
(10, 901, 308, NULL),
(11, 901, 309, NULL),
(12, 901, 312, NULL),
(13, 901, 312, NULL),
(14, 901, 309, NULL),
(15, 901, 309, NULL),
(16, 901, 301, NULL),
(17, 901, 304, NULL),
(18, 901, 312, NULL),
(19, 901, 306, NULL),
(20, 909, 303, NULL),
(21, 912, 306, NULL),
(22, 901, 319, NULL),
(23, 901, 306, NULL),
(24, 901, 306, NULL),
(25, 901, 306, NULL),
(26, 901, 306, NULL),
(27, 916, 317, NULL),
(28, 920, 319, NULL),
(29, 921, 306, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Alabama'),
(2, 'Alaska'),
(3, 'Arizona'),
(4, 'Arkansas'),
(5, 'California'),
(6, 'Colorado'),
(7, 'Connecticut'),
(8, 'Delaware'),
(9, 'Florida'),
(10, 'Georgia'),
(11, 'Hawaii'),
(12, 'Idaho'),
(13, 'Illinois'),
(14, 'Indiana'),
(15, 'Iowa'),
(16, 'Kansas'),
(17, 'Kentucky'),
(18, 'Louisiana'),
(19, 'Maine'),
(20, 'Maryland'),
(21, 'Massachusetts'),
(22, 'Michigan'),
(23, 'Minnesota'),
(24, 'Mississippi'),
(25, 'Missouri'),
(26, 'Montana'),
(27, 'Nebraska'),
(28, 'Nevada'),
(29, 'New Hampshire'),
(30, 'New Jersey'),
(31, 'New Mexico'),
(32, 'New York'),
(33, 'North Carolina'),
(34, 'North Dakota'),
(35, 'Ohio'),
(36, 'Oklahoma'),
(37, 'Oregon'),
(38, 'Pennsylvania'),
(39, 'Rhode Island'),
(40, 'South Carolina'),
(41, 'South Dakota'),
(42, 'Tennessee'),
(43, 'Texas'),
(44, 'Utah'),
(45, 'Vermont'),
(46, 'Virginia'),
(47, 'Washington'),
(48, 'West Virginia'),
(49, 'Wisconsin'),
(50, 'Wyoming');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `landlord_property`
--
ALTER TABLE `landlord_property`
  ADD PRIMARY KEY (`landlord_property_id`),
  ADD KEY `people_id` (`landlord_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `people_role`
--
ALTER TABLE `people_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `propstat_id` (`propstat_id`);

--
-- Indexes for table `property_feature`
--
ALTER TABLE `property_feature`
  ADD PRIMARY KEY (`propertyfeature_id`),
  ADD KEY `feature_id` (`feature_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_status`
--
ALTER TABLE `property_status`
  ADD PRIMARY KEY (`propstat_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`propertytype_id`);

--
-- Indexes for table `rental_application`
--
ALTER TABLE `rental_application`
  ADD PRIMARY KEY (`rental_application_id`),
  ADD KEY `renterproperty_id` (`renterproperty_id`),
  ADD KEY `last_status_id` (`last_status_id`);

--
-- Indexes for table `rental_app_status`
--
ALTER TABLE `rental_app_status`
  ADD PRIMARY KEY (`app_status_id`);

--
-- Indexes for table `renter_property`
--
ALTER TABLE `renter_property`
  ADD PRIMARY KEY (`renterproperty_id`),
  ADD KEY `people_id` (`renter_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `landlord_property`
--
ALTER TABLE `landlord_property`
  MODIFY `landlord_property_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `people_role`
--
ALTER TABLE `people_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_feature`
--
ALTER TABLE `property_feature`
  MODIFY `propertyfeature_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_status`
--
ALTER TABLE `property_status`
  MODIFY `propstat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `propertytype_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rental_application`
--
ALTER TABLE `rental_application`
  MODIFY `rental_application_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rental_app_status`
--
ALTER TABLE `rental_app_status`
  MODIFY `app_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `renter_property`
--
ALTER TABLE `renter_property`
  MODIFY `renterproperty_id` int(11) NOT NULL AUTO_INCREMENT;