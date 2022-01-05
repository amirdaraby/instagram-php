-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 01:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darab2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `comment`) VALUES
(134, 24, 25, 'dfasdfasdfasdf'),
(135, 24, 21, 'dfsafasdfasdfasdf'),
(136, 24, 25, 'asdfgghfgj'),
(137, 24, 25, 'zffxcvbbvc'),
(138, 24, 25, ' r fghgfjg'),
(139, 24, 25, ' r fghgfjg'),
(140, 23, 25, 'aswdcsx gcfghghfc'),
(141, 23, 25, 'sdacdvxxcvbsd'),
(142, 23, 21, 'sxbfvvbn'),
(143, 23, 20, '265489489'),
(144, 24, 25, 'in chie');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic`
--

CREATE TABLE `dynamic` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userid`, `postid`) VALUES
(25, 24, 1),
(27, 23, 25),
(28, 23, 21),
(30, 24, 25),
(31, 23, 20);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  `caption` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `photo`, `caption`, `time`) VALUES
(1, 24, 'posts/619361d12142d1601758012505581755[Downloader.la]-615d59b296a6b.jpg', 'No Caption', 1637048785),
(16, 25, 'posts/618bcd850f51321037291550513042845.jpeg', 'this is edited', 1636552069),
(17, 23, 'posts/618bcddcdb20d19332698156670170762.jpeg', 'sdxcvbv', 1636552156),
(18, 26, 'posts/618bcebad8b8816657913942827378064.jpg', 'this is edited', 1636552378),
(19, 23, 'posts/618f98ff264b715366349223041813295.jpeg', 'adsvdcsxccvxadsc', 1636800767),
(20, 23, 'posts/619363b3f2dea1903342361235046704as.jpg', 'zdicusoiuodfuhyvopidhvopdfihvokixjcv \r\n', 1637049267),
(21, 23, 'posts/6193640d216a31703391667836127137image.jpg', 'fact : iphone is iphone.', 1637049357),
(25, 23, 'posts/6193674917edb1371721231115117865map3.jpg', 'map', 1637050185);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `school` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `school`, `picture`) VALUES
(23, 'amir', 'darabi', 'darabi', 'awmir@outlook.com', '601f1889667efaebb33b8c12572835da3f027f78', 'myschool', 'uploads/618bcca981c491604981634612014190slider.png'),
(24, 'akbar', 'abdi', 'akbar', 'a@outlook.com', '601f1889667efaebb33b8c12572835da3f027f78', 'myschool', 'uploads/618bccd859cf01820411413609338424isfmobicon.png'),
(25, 'mamad', 'mamadi', 'mamad', 'amyrdarabi1@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'myschool', 'uploads/618bcd40b372a2185594925666928000isfmobicon.png'),
(26, 'mahya', 'johari', 'princess', 'mahya@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'beatifull', 'uploads/618bce9baca2a25227308595825358834.jpg'),
(27, 'akbar', 'abdi', 'akvarian', 'akbar@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'myschool', 'uploads/618fcfb97a3b12102666182007063608png-transparent-web-development-mobile-app-development-android-software-development-phone-stereo-weather-forecast-electronics-web-design-phone-icon.png'),
(30, 'hello', 'world', 'helloworld', 'hello@world.com', '601f1889667efaebb33b8c12572835da3f027f78', 'myschool', 'uploads/61921d6848cdb1511576992573123280asc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic`
--
ALTER TABLE `dynamic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `dynamic`
--
ALTER TABLE `dynamic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
