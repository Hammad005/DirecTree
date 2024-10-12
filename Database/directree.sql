-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 02:55 PM
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
-- Database: `directree`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `profile_pic` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `profile_pic`, `username`, `email`, `location`, `password`, `add_time`) VALUES
(1, 'hammad.jpg', 'Hammad Khatri', 'khatrihammad911@gmail.com', 'Karachi, Pakistan', '1234567890', '2024-09-19 20:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `add-time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `username`, `title`, `content`, `status`, `add-time`) VALUES
(3, 'Hammad Khatri', 'The Importance of Local Directories', 'In the digital age, local directories are essential for connecting businesses with customers. They help users find relevant services and products nearby while improving a business&apos;s visibility and search engine ranking.\r\n\r\nThese platforms also promote community engagement by showcasing local businesses and events. With user reviews and recommendations, consumers can make informed choices, fostering a stronger local economy.\r\n\r\nIn summary, local directories are invaluable resources for both businesses and consumers, enhancing connections and supporting community growth.', 'approved', '2024-09-27 15:52:54'),
(6, 'khan', 'Why Your Business Needs to Be Listed in a Directory', 'Listing your business in a directory can significantly boost visibility and attract more customers. Directories act as a central hub where people search for services and products, making it easier for them to find you.\r\n\r\nNot only does it improve online presence, but a directory listing also enhances credibility. Many users trust directory platforms as reliable sources of information, which can lead to increased trust in your brand.\r\n\r\nIn short, being listed in a directory gives your business the exposure it needs to grow in today’s competitive market.', 'approved', '2024-09-27 19:35:59'),
(7, 'Nabeel ahmed', 'The Power of Online Directories: Boosting Visibility in the Digital Age', 'In today&apos;s digital landscape, businesses and individuals alike are constantly seeking new ways to increase their online presence and reach a broader audience. One tool that has stood the test of time, yet remains underutilized by many, is the online directory. Whether it&apos;s a niche-specific directory or a general listing, these platforms offer tremendous value for visibility and growth.', 'approved', '2024-10-01 14:47:17'),
(8, 'wasam', 'How Online Directories Help Small Businesses Thrive', 'Online directories have become essential tools for small businesses aiming to boost their visibility and attract new customers. These platforms act as digital yellow pages, listing businesses across various industries, making it easier for consumers to find the services they need.\r\n\r\nFor small businesses, being listed in a directory can significantly improve local search rankings. It helps potential customers discover their services faster and increases credibility. Even a simple listing with accurate contact information and a short description can lead to more traffic and, ultimately, more sales.\r\n\r\nIn today&apos;s competitive market, an online directory listing is a low-cost, high-impact strategy to get noticed and grow.', 'approved', '2024-10-01 14:49:13'),
(9, 'arham', 'Why Your Business Needs to Be Listed in an Online Directory', 'Getting your business listed in an online directory can be a game-changer, especially in a crowded digital marketplace. Online directories act as centralized hubs, connecting consumers with businesses they might otherwise miss. For small to medium-sized businesses, this is an easy and cost-effective way to boost visibility.\r\n\r\nBy being listed, your business becomes more accessible to potential customers searching for your services. Directories also improve your online credibility and increase your chances of appearing in local search results. With minimal effort, you can reach a wider audience and stand out in your industry.', 'approved', '2024-10-01 14:52:00'),
(10, 'Wasam', 'The Ultimate Guide to Building a Successful Directory Website', 'Explore the key features every directory website should have and how to ensure its success.\r\n', 'approved', '2024-10-12 17:42:02'),
(11, 'Wasam', 'Why Directory Websites are the Future of Local Business Listings', 'Dive into the reasons why directory websites are becoming essential for local businesses to increase visibility.', 'approved', '2024-10-12 17:42:26'),
(12, 'Nabeel ahmed', 'Top 10 SEO Tips to Boost Your Directory Website&apos;s Traffic', 'A list of search engine optimization techniques specifically tailored to improve your directory website&apos;s rankings.', 'approved', '2024-10-12 17:43:04'),
(13, 'Nabeel ahmed', 'How to Monetize Your Directory Website: Strategies That Work', 'Learn the different ways to generate revenue from your directory website, from listing fees to affiliate marketing.', 'approved', '2024-10-12 17:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `add-time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `add-time`) VALUES
(1, 'Food & Drink', '2024-09-19 19:53:34'),
(2, 'Hotels', '2024-09-19 19:53:49'),
(3, 'Shopping', '2024-09-19 19:54:28'),
(4, 'Beauty', '2024-09-19 19:54:28'),
(5, 'Fitness', '2024-09-19 19:54:56'),
(6, 'Hookah Bars', '2024-09-19 19:54:56'),
(7, 'Games', '2024-09-19 19:55:25'),
(8, 'Places', '2024-09-19 19:55:25'),
(9, 'Shows', '2024-09-19 19:56:06'),
(10, 'Movie Theaters', '2024-09-19 19:56:06'),
(11, 'Sports', '2024-09-19 19:56:33'),
(12, 'Health', '2024-09-19 19:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `listing_cat` varchar(250) NOT NULL,
  `name` text NOT NULL,
  `desciption` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `phone` text NOT NULL,
  `website` text NOT NULL,
  `picture` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `username`, `listing_cat`, `name`, `desciption`, `address`, `location`, `open_time`, `close_time`, `phone`, `website`, `picture`, `status`, `add_time`) VALUES
(2, 'Hammad Khatri', 'Hotels', 'Pearl-Continental Hotel', 'This upscale high-rise hotel is 4 km from the Port Grand entertainment district, and 5 km from the Mazar-e-Quaid mausoleum.', 'Club Rd، opposite PIDC, Civil Lines, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28962.668223653294!2d66.98770263017435!3d24.852455837777626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ddfa27f7849%3A0xc2fbc4a56857f36a!2sPearl-Continental%20Hotel%20Karachi!5e0!3m2!1sen!2s!4v1727793329632!5m2!1sen!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '12:00:00', '12:00:00', '021111505505', 'http://www.pchotels.com/pckarachi', 'pc.jpg', 'approved', '2024-10-01 19:37:39'),
(3, 'Arham', 'Food & Drink', 'KFC - I.I. Chundrigar', 'Restaurant chain known for its buckets of fried chicken, plus combo meals & sides.', 'Room No. 1/3 Ground Floor 74200، Muhammadi House, I.I Chundrigar Rd, Seari Quarters, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115853.322980586!2d66.92199475518805!3d24.849626004639088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e0135e5e33b%3A0x232f33cec04bcf44!2sKFC%20-%20I.I.%20Chundrigar!5e0!3m2!1sen!2s!4v1727962816152!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '12:00:00', '23:30:00', '021111532532', 'https://www.kfcpakistan.com/', 'kfc.jpg', 'approved', '2024-10-03 18:41:24'),
(4, 'Wasam', 'Shopping', ' Atrium Mall', 'Atrium Mall is a popular shopping destination offering a wide range of retail stores, dining options, and entertainment facilities, all within a modern and vibrant atmosphere', '249, Staff Lines، Main Zaibunnisa Street, Karachi Cantonment صدر, Karachi, Karachi City, Sindh 74400', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115847.30549698998!2d66.94786985540681!3d24.856051200341923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e71379ad79b%3A0x96a2a069b4557361!2sAtrium%20Mall!5e0!3m2!1sen!2s!4v1727965106723!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '23:00:00', '22:00:00', '021111287486', 'http://www.atrium.com.pk/', 'atrium.jpg', 'approved', '2024-10-03 19:19:31'),
(5, 'Nabeel ahmed', 'Fitness', 'The Venom Gym', 'The Venom Gym is a high-energy fitness center offering top equipment and expert training for all fitness levels.', 'Muhammad bin Qasim street, Main fresco chowk, in front of Molty foam main, Burns Road, Karachi, 33410, Pakistan', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14480.96264031835!2d67.01825133766415!3d24.855628817109075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f7afc5721c9%3A0x734e5aeee9b4842d!2sThe%20Venom%20Gym%20Official!5e0!3m2!1sen!2s!4v1727965384111!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '19:23:00', '19:23:00', '03060037330', '', 'venom-gym.jpg', 'approved', '2024-10-03 19:24:00'),
(7, 'Hammad Khatri', 'Beauty', 'Jilani store', 'Jilani Store is your one-stop beauty destination, offering a wide range of skincare, makeup, and wellness products to enhance your natural beauty.', 'Shop no 12, Younus Market Marriot Road, Market quarters, near M.A. jinnah Road, Market Quarter, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115850.29044535618!2d66.92096365529827!3d24.85286420247325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f3a31ee3705%3A0x71921634f61a246f!2sJilani%20store!5e0!3m2!1sen!2s!4v1727968070098!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '11:00:00', '19:00:00', '02132426100', '', 'Jilani-store.jpg', 'approved', '2024-10-03 20:10:54'),
(8, 'Hammad Khatri', 'Hookah Bars', 'Euphoria Restaurant', 'Euphoria Restaurant is a vibrant hookah bar and dining experience, where delicious cuisine meets a relaxing atmosphere, perfect for enjoying flavorful hookah with friends.', '6-C 6th Commercial Ln, Zamzama Commercial Area Defence V Karachi, Karachi City, Sindh 75600, Pakistan', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28966.617198882523!2d67.00874836573578!3d24.83558408547448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33dadfba84ee1%3A0x30db8f11a28956ad!2sEuphoria%20restaurant!5e0!3m2!1sen!2s!4v1727968487912!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '06:00:00', '05:00:00', '03333761061', '', 'euphoria-restaurant.jpg', 'approved', '2024-10-03 20:16:28'),
(9, 'khan', 'Games', 'R.J Gaming ZonE', 'R.J Gaming ZonE is an exciting gaming hub offering a diverse range of video games, competitive tournaments, and a vibrant atmosphere for gamers of all ages.', 'Udham Das Tara Chand Rd, Garden West Garden West Area, Karachi, Karachi City, Sindh, Pakistan', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115830.41557507732!2d66.93477975602072!3d24.874077188292226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e382dcf7a89%3A0xcc21eca86eccb7f6!2sR.J%20Gaming%20ZonE!5e0!3m2!1sen!2s!4v1727968765159!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '20:19:00', '20:19:00', '03133096837', '', 'RJGamingZonE.jpg', 'approved', '2024-10-03 20:20:10'),
(10, 'khan', 'Places', 'Port Grand karachi', 'Busy, waterside entertainment hub with street-food stalls, clothing stores, concerts & boat rides.\r\n', 'Road،, Port Grand Food St, opposite PNSC Building, West Wharf, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115857.68908007903!2d66.90858695502932!3d24.84496310775834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb315fd9484034d%3A0xa34ea99b28ea0c40!2sPort%20Grand%20karachi!5e0!3m2!1sen!2s!4v1727968896820!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '17:00:00', '00:00:00', '03488311111', 'https://www.portgrand.com/', 'portgrand.jpg', 'approved', '2024-10-03 20:22:50'),
(11, 'khan', 'Shows', 'Dolphin Show', 'The Dolphin Show is a mesmerizing aquatic performance featuring intelligent dolphins showcasing their skills and captivating audiences with their playful antics.', ' V3PR+XC2, Maritime Museum Rd, Karsaz Faisal Cantonment, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115817.95704613195!2d67.00862195647358!3d24.887365879414972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ecbbf95755d%3A0xbc0ba58d80556f21!2sDolphin%20Show!5e0!3m2!1sen!2s!4v1727969083346!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '19:00:00', '21:15:00', '03332251077', '', 'dolphinshow.jpg', 'approved', '2024-10-03 20:25:30'),
(12, 'ashhad', 'Movie Theaters', 'ME Cinemas', 'ME Cinemas offers a premium cinematic experience with state-of-the-art technology, showcasing the latest movies in a luxurious and comfortable setting.', 'V24J+C24, MBL Panorama Karachi Cantonment, Karachi, Karachi City, Sindh', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57924.49074815589!2d66.97277315032156!3d24.854261800667977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e7137fd642d%3A0xb68694e45827d9c0!2sAtrium%20Mall%20%26%20Cinemas!5e0!3m2!1sen!2s!4v1728118737885!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '11:00:00', '23:00:00', '021111626384', 'http://mecinemas.com/', 'mecinema.jpg', 'approved', '2024-10-05 14:01:13'),
(13, 'ashhad', 'Sports', 'Kakri Ground', 'Kakri Ground is a well-known open space often used for sporting events, gatherings, and community activities, providing a versatile environment for various recreational purposes.', 'Plot A 38A Embankment Rd, Moosa Lane Musa Lane, Karachi, Karachi City, Sindh, Pakistan', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115846.83248043203!2d66.91703895542398!3d24.85655620000423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb315f7fe1238cd%3A0x8a97363e565a6bed!2sKakri%20Ground%20Sports%20Complex!5e0!3m2!1sen!2s!4v1728120661443!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '14:31:00', '14:31:00', '', '', 'kakriground.jpg', 'approved', '2024-10-05 14:31:23'),
(14, 'ashhad', 'Health', 'Kharadar General Hospital', 'Kharadar General Hospital, formerly known as Cement Hospital, is a private hospital located in Kharadar, a neighborhood in Karachi, Pakistan. The hospital provides medical services to patients in various fields such as internal medicine, pediatrics, gynecology, surgery, and orthopedics, among others.', 'Agha Khan Road, Nawab Mahabat Khanji Rd, Dharamsala Kharadar, Karachi, Karachi City, Sindh, Pakistan', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115849.57819262292!2d66.91281345532417!3d24.853624701964634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb315f9b7119e91%3A0xdffc0f2cffb85aa2!2sKharadar%20General%20Hospital!5e0!3m2!1sen!2s!4v1728120939564!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '14:36:00', '14:36:00', '021111544544', 'http://www.kgh.org.pk/', 'kharadargenralhospital.jpg', 'approved', '2024-10-05 14:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `add_time`) VALUES
(5, 'wasam', 'wasam88@gmail.com', 'Adding a Listing', 'What information do I need to provide for my listing?', '2024-09-26 01:46:39'),
(6, 'Zeeshan Khan', 'zeeshankhan99@gmail.com', 'Support and Issues', 'How can I contact support if I have issues with my listing?', '2024-09-26 01:47:11'),
(7, 'Yaseen', 'yaseenkhan666@gmail.com', 'Costs and Guidelines', 'What are the guidelines for submitting a listing?', '2024-09-26 01:47:37'),
(8, 'Nabeel Ahmed', 'nabeel098@gmail.com', 'Support and Issues', 'How can I contact support if I have issues with my listing?', '2024-10-08 13:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `listing` text NOT NULL,
  `rating` int(10) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `listing`, `rating`, `name`, `comment`, `add_time`) VALUES
(1, 'Pearl-Continental Hotel', 5, 'Hammad khatri', 'I recently had the pleasure of staying at the Pearl-Continental Hotel, and I must say, it exceeded my expectations. The ambiance is luxurious, and the staff is exceptionally attentive and friendly, making you feel right at home. My room was spacious and well-appointed, with stunning views of the city.', '2024-10-03 15:36:53'),
(2, 'Pearl-Continental Hotel', 3, 'wasam', 'The on-site dining options are fantastic, offering a variety of cuisines that cater to all tastes. I particularly enjoyed the breakfast buffet, which had a wide selection of fresh and delicious items. The hotel&apos;s amenities, including the spa and fitness center, are top-notch and perfect for unwinding after a busy day.', '2024-10-03 15:37:24'),
(3, 'Pearl-Continental Hotel', 0, 'Nabeel Ahmed', 'I recently stayed at the Pearl-Continental Hotel and was quite disappointed with my experience. While the hotel has a beautiful exterior and great location, the service left much to be desired. The check-in process was slow and disorganized, and the staff seemed overwhelmed and unresponsive to guest needs.', '2024-10-03 15:38:10'),
(5, 'The Venom Gym', 5, 'hammad khatri', 'best gym', '2024-10-05 15:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `add-time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `add-time`) VALUES
(3, 'Nabeel ahmed', 'nabeel098@gmail.com', 'nabeel', '2024-09-25 19:48:52'),
(5, 'yaseen', 'yaseenkhan666@gmail.com', 'y771', '2024-09-25 19:49:23'),
(7, 'ashhad', 'ashhad88@gmail.com', '123', '2024-09-26 01:03:26'),
(8, 'Arham', 'arhamgujjar99@gmail.com', '12345', '2024-09-26 01:07:37'),
(10, 'khan', 'khan@gmail.com', '123', '2024-09-27 17:45:43'),
(11, 'Fatima', 'fatima55@gmail.com', '123', '2024-10-05 18:46:47'),
(12, 'wasam', 'wasam88@gmail.com', '123', '2024-10-12 17:18:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `blogs` ADD FULLTEXT KEY `username` (`username`,`title`,`content`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `listings` ADD FULLTEXT KEY `username` (`username`,`listing_cat`,`name`,`desciption`,`address`,`phone`,`website`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `message` ADD FULLTEXT KEY `name` (`name`,`email`,`subject`,`message`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
