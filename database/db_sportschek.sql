-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 02:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportschek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(1, 'shoes'),
(2, 'coats'),
(3, 'pants'),
(4, 'socks'),
(5, 'swimwear'),
(6, 'hats'),
(7, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_procate`
--

CREATE TABLE `tbl_procate` (
  `procate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_procate`
--

INSERT INTO `tbl_procate` (`procate_id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_cover` varchar(250) NOT NULL,
  `product_title` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_rate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_cover`, `product_title`, `product_price`, `product_description`, `product_rate`) VALUES
(1, 'shoes_one.png', 'Saucony Men\'s Excursion TR11 Trail Running Shoes - Black/Orange', '$109.99', 'Great traction and rugged protection around the foot make the Excursion TR11 ready to tackle the trails.\r\nWith an updated knit mesh design, this neutral trail running shoe keeps out debris while being\r\ncomfortable and wearable for all day use. It’s great for hiking too!', '3.0'),
(2, 'shoes_two.png', 'Saucony Men\'s Excurion TR 13 Trail Running Shoes - Grey/Citron', '$109.99', 'The Saucony Men’s Excurion TR 13 Trail Running Shoe packs the necessities for a good time—essential\r\ncushioning, rugged traction, and durable protection. The trail-specific mesh with supportive overlays\r\nlocks your foot into place and protects from trail debris.', '4.8'),
(3, 'shoes_three.png', 'Saucony Men\'s Koa ST Trail Running Shoes - Orange/Citron', '$159.99', 'When conditions get tough, the KOA ST is there to answer the call. Featuring an aggressive PWR TRAC\r\noutsole pattern with 8mm lugs, the KOA ST is designed to keep you on your feet and moving forward\r\nacross soft, muddy, slick terrains. The synthetic upper of this neutral trail running shoe sheds mud and\r\nmoisture, while the toggle lacing system lets you quickly adjust your fit throughout the run. It\'s great for hiking too!\r\n', '4.7'),
(4, 'shoes_four.png', 'Saucony Men\'s VF Excursion TR 13 GTX Trail Running Shoes - Black/Orange', '$149.99', 'All of the great benefits of the Saucony Men’s VF Excursion TR 13 GTX Trail Running Shoes , now with a\r\nGORE-TEX membrane that ensures breathable, waterproof protection. So while the weatherman may\r\ncall for rain, the forecast for your feet will be “Sunny and dry”.', '4.7'),
(5, 'shoes_five.png', 'Saucony Men\'s Everun Mad River Trail Running Shoes - Blue/Black\r\n', '$139.99', 'For trail-running adventure seekers, the Saucony Men’s Everun Mad River Trail Running Shoe is a fast,\r\ngrippy shoe that puts you in control of your destiny with customizable features to make it entirely your\r\nown.\r\n', '5.0'),
(6, 'coat_one.png', 'Under Armour Men\'s Baseline Woven Jacket', '$59.97', 'Perfect for warming up before a scrimmage or before the big game, the UA Baseline\r\nJacket a made to get you ready for the game.', 'None'),
(7, 'coat_two.png', 'PUMA Men\'s Don’t Flinch Track Jacket', '$85.97', 'On the court or in the streets, rep your style loud and proud with the Don’t Flinch Since 73 Track Jacket.', 'None'),
(8, 'coat_three.png', 'Burton Men\'s Mallet Jacket', '$179.99', 'Quilted patterning, rib-knit collar, and classic style are the elements that together define the vibe of the\r\nMen’s Burton Mallet Jacket. For street-ready or field-worthy performance, the water-repellent fabric\r\nsheds mist, sleet, and snow, while the Living Lining® tech adapts to your ups and downs in activity for\r\nconsistent all-day comfort.', 'None'),
(9, 'coat_four.png', 'The North Face Men\'s Shielder Down Parka', '$239.97', 'The Men\'s Shielder parka is perfect for cruising city streets or strolling through mountaiin towns.', 'None'),
(10, 'coat_five.png', 'Helly Hansen Men\'s Tromsoe Insulated Jacket', '$349.99', 'Get ready to be impressed by how well the Tromsoe Jacket regulated temperature on a milder winter\r\ndays, but still has plenty of insulation for the most frigid days. So if around freezing temperatures are commonplace at where you live, check this jacket out. When this jacket is all buttoned up - hood, zips,cuffs - you’ll be the warmest one out there.', '4.9'),
(11, 'pants_one.png', 'Rhone Men\'s Guru Pants', '$135.99', 'The Guru Pant is a jack of all trades and a master of one: bringing you into a state of complete comfort.\r\nComplete with four-way stretch, two hand pockets, and a power mesh media pocket.', 'None'),
(12, 'pants_two.png', 'Rhone Men\'s Spar Tactel Jogger Pants - Black Heather', '$162.99', 'Boasting softness and stretch way beyond its weight class, this jogger rises to any challenge.', '5.0'),
(13, 'pants_three.png', 'Alo Men\'s Lounge Moto Jogger Pants', '$108.97', 'Wanna Hang? Chill out and look good doing it in the Lounge Moto Jogger. Featuring a drawcord waist,\r\nrelaxed rise and exposed zipper pockets, this soon-to-be-favorite-jogger is also finished with a ribbed\r\ncuff.\r\n', 'None'),
(14, 'pants_four.png', 'Nike Men\'s Team Woven Pants', '$68', 'Nike Dry Men’s Woven Training Pants are made with sweat-wicking support and woven fabric for comfort and durability. Side pockets offer small-item storage, while the elastic waistband provides a personalized fit.', 'None'),
(15, 'pants_five.png', 'PUMA Men\'s Reactive Woven Pants', '$55.97', 'Built with windCELL fabric, the PUMA Reactive Woven Pants have performance mesh for comfort and can take you to and from the gym.', 'None'),
(16, 'socks_one.png', 'Stance Men\'s Step Brother Crew Socks', '$25.99', 'To the legendary comedy that brought us more classic quotes than we can count, Stance teams with\r\nPrestige Worldwide in bringing you the Step Brothers sock. The collab features main characters Brennan\r\nHuff and Dale Doback on an argyle-patterned sock. Perfect for a job interview, wine mixer, or simply\r\nlounging in your parent’s basement during Shark Week.', 'None'),
(17, 'socks_two.png', 'Stance Men\'s Elf \"I Know Him\" Crew Socks', '$25.99', 'SANTA!!!! \"I Know Him\" collaboration for Holiday ’19 is the ultimate homage to Will Ferrell’s 2003 holiday\r\nclassic, Elf.\r\n', 'None'),
(18, 'socks_three.png', 'Stance Men\'s The Grinch Crew Socks', '$22.99', 'A gift is a gift, no matter how small. And by giving The Grinch this holiday, you’ll undoubtedly bring\r\nsmiles to all.', 'None'),
(19, 'socks_four.png', 'Stance Men\'s Star Wars Droids Crew Socks', '$25.99', 'The unofficial mascot of the Star Wars saga, R2D2 never looked more comfortable than in this 70’sinspired\r\nthrowback design. These are the Droids you’re looking for.', 'None'),
(20, 'socks_five.png', 'Stance Men\'s Foundation Eddy Crew Sock', '$19.99', 'Our friend Eddy here is known for his patriotic flair, ability to fly and love of seafood. What a charmer!', 'None'),
(21, 'swimwear_one.png', 'SAXX Men\'s Cannonball 2 In 1 7\" Swim Trunks', '$74.99', 'Meet Cannonball - the swim short equipped with the patented BallPark-Pouch™ to keep you chafe-free\r\nagainst the elements of sand, saltwater and sunscreen. With quick-drain pockets and a breathable mesh\r\nliner, you’ll feel like you’re wearing nothing at all - without a skinny-dipping citation.', 'None'),
(22, 'swimwear_two.png', 'Nike Men\'s Core Contend 9\" Trunks', '$64', 'Nike Swim Men’s Contend 9\" Volley Short combines a cool color-blocked design with smart\r\nperformance features. Great for both training days and tropical vacations, the long swimming trunks are\r\nmade with a breathable perforated fabric that features a water repellent finish for faster drying. A built-in\r\nmesh brief and a stretch waistband provide added comfort and support, while multiple pockets ensure\r\nthat your small essentials will be easily accessible throughout the day.', 'None'),
(23, 'swimwear_three.png', 'Nike Men\'s 6:1 Stripe Breaker 9\" Volley Shorts', '$68', 'Nike Swim Men’s 6:1 Stripe Breaker 9\" Volley Short features built-in mesh briefs for enhanced comfort\r\nand support both in and out of the water. The long men’s swim shorts have a stretch waistband with a\r\ndrawcord to help hold them securely in place. Welt pockets on the exterior and an internal mesh pocket\r\nprovide convenient on the go storage for small essentials, while a water repellent finish encourages\r\nfaster drying and helps to extend the life of the swimming shorts.', 'None'),
(24, 'swimwear_four.png', 'Nike Men\'s JDI Vital 7 Inch Volley Shorts - Ember Glow', '$53.97', 'Nike Swim Men’s JDI Vital 7\" Volley Short calls you to action with its bold Nike statement to ’Just Do It’.\r\nA stretch waistband and built-in support brief makes it designed for comfort. Quick-drying waterrepellent\r\nfabric with mesh drainage points enables pool-to-patio versatility.', 'None'),
(25, 'swimwear_five.png', 'Nike Men\'s JDI Vital 7 Inch Volley Shorts - Indigo Fog', '$42.97', 'Nike Swim Men’s JDI Vital 7\" Volley Short calls you to action with its bold Nike statement to ’Just Do It’.\r\nA stretch waistband and built-in support brief makes it designed for comfort. Quick-drying waterrepellent\r\nfabric with mesh drainage points enables pool-to-patio versatility.', 'None'),
(26, 'hat_one.png', 'Fox Racing Men\'s Clouded Flexfit Hat', '$36.99', 'After a hard day of riding, throw on your Clouded Flexfit Hat for some post ride brews. This comfortable\r\nhat features a solid colorway with a contrast Fox Head embroidery and flex-to-fit design.', 'None'),
(27, 'hat_two.png', 'Quiksilver Men\'s Pierside Straw Hat', '$24.99', 'The Quiksilver Men’s Pierside Straw Hat is a lifeguard style cap with a Quiksilver woven patch on the\r\nfront, adjustable chin strap and made from 100% straw. Perfect for a day at the beach or an adventure\r\nin the sun.', '4.0'),
(28, 'hat_three.png', 'Burton Men\'s Treehopper Hat - Castle Rock', '$34.99', 'If you wake up early for sunrise hikes and take extra long lunch breaks to get more time outside, this\r\nhat’s for you.', 'None'),
(29, 'hat_four.png', 'Ripzone Alloy Trucker Hat - Black', '$13.97', 'The Ripzone mens classic trucker hat comes with snap back for easy adjustability.\r\n', 'None'),
(30, 'hat_five.png', 'Dakine Evil Shred Trucker Hat - Black', '$13.97', 'Let the power of the Evil Shred posses your moves in this hat. It’s a classic five-panel foam-backed trucker to liven up your everyday routine.', 'None'),
(31, 'watch_one.png', 'Fitbit Versa 2 Smartwatch - Carbon', '$ 249.95', 'Meet Fitbit Versa 2 ™ —a smartwatch that elevates every moment. Use your voice to create alarms, set\r\nbedtime reminders or check the weather with Amazon Alexa Built-in. Take your look from the gym to the\r\noffice with its modern and versatile design. Control your favourite playlists and podcasts with Spotify.\r\nPlus get Fitbit Pay ™ , daily in-app sleep quality scores, notifications, 24/7 heart rate and store 300+\r\nsongs for an experience that revolves around you.', '3.9'),
(32, 'watch_two.png', 'Apple Watch S5 GPS+LTE 44 Sport', '$ 699.99', 'With a display that is now always on, Apple Watch Series 5 is there for you like never before. Faces and\r\ncomplications let you see the information that matters most to you without raising your wrist.', 'None'),
(33, 'watch_three.png', 'Garmin Forerunner 45S Fitness Watch\r\n', '$ 279.99', 'Forerunner 45S is the smaller-sized GPS running watch with all the running-related features you need in\r\na sleek, lightweight smartwatch you’ll want to wear all day and night. Connect Iq™ Store: Download\r\nCustom Watch Faces, Add Data Fields, And Get Apps And Widgets From The Connect Iq Store Music\r\nControls: Easily Control The Music Playing On Your Phone, So You Can Skip Songs Without Missing A\r\nBeat Syncs With Garmin Connect™: Upload Your Activities To The Garmin Connect App To Interact With\r\nA Thriving Online Community Where People On The Go Can Connect And Compete — And Even Share\r\nTheir Triumphs Via Social Media Color Display: Memory/History: 200 Hours Of Activity Data In The Box:-\r\nForerunner 45S, Charging cable, Documentation', '4.2'),
(34, 'watch_four.png', 'Garmin Fenix 6 Pro Fitness Watch', '$ 949.99', 'These rugged fenix multisport GPS watches let you add mapping, music, intelligent pace planning and\r\nmore to your workouts — so you can take any challenge in stride. Climbpro Feature: Use Climbpro\r\nAscent Planner On Downloaded Courses To See Real-time Information On Your Current And Upcoming\r\nClimbs, Including Gradient, Distance And Elevation Gain. Multi-gnss Support: Access Multiple Global\r\nNavigation Satellite Systems (Gps, Glonass And Galileo) To Track In More Challenging Environments\r\nThan GPS Alone. Abc Sensors: Navigate Your Next Trail With Abc Sensors, Including An Altimeter For\r\nElevation Data, Barometer To Monitor Weather And Three-axis Electronic Compass. Pulse Ox Sensor:\r\nFor Altitude Acclimation Or Sleep Monitoring, A Pulse Ox2 Sensor Uses Light Beams At Your Wrist To\r\nGauge How Well Your Body Is Absorbing Oxygen. Respiration Tracking: See How You’re Breathing\r\nThroughout The Day, During Sleep And During Breathwork And Yoga Activities. Expedition Mode: Trek\r\nFar And Wide Between Recharges. Expedition Mode, An Ultralow-powered GPS Reference, Lasts For\r\nWeeks. Topo And Ski Maps: Use Topographical Maps To Navigate Your Adventures. View Run Names\r\nAnd Difficulty Ratings For 2,000 Worldwide Ski Resorts. Round-trip Routing: Enter A Distance You Want\r\nTo Travel, And Get Suggested Routes That Will Bring You Back To Your Starting Point. Trendline™\r\nPopularity Routing Helps You Find The Best Local Paths. Turn-by-turn Navigation: Follow A Route Or\r\nCourse With Help From Turn-by-turn Directions, Which Let You Know Ahead Of Time When The Next\r\nTurn Is Coming. Smart Notifications: Receive Emails, Texts And Alerts Right On Your Watch When Paired\r\nWith A Compatible Device.', '4.0'),
(35, 'watch_five.png', 'SUUNTO 5 Fitness Watch', '$ 449.99', 'One step, one stroke, one revolution at a time, repeated thousands of times. You fall into the rhythm. The\r\nworld around you disappears. Suunto 5 is built for these moments. It is engineered to perform with you,\r\nfor you to find your flow. Suunto 5 offers long battery life in a compact GPS watch, packed with multiple\r\nsport features making it easy for you to track all your workouts and follow your progress. The watch also\r\ntracks your 24/7 activity including steps, calories, stress and sleep, so you can make sure that you are\r\nrecovered and ready for your next sports activity.', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_login_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_date`, `user_login_count`) VALUES
(1, 'admin', 'zouling', 'zouling707@gmail.com', '2020-02-29 05:59:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_procate`
--
ALTER TABLE `tbl_procate`
  ADD PRIMARY KEY (`procate_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_procate`
--
ALTER TABLE `tbl_procate`
  MODIFY `procate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
