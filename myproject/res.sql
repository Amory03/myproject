-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 08:35 PM
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
-- Database: `res`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ahmed samy', 'ahmedsamylike@gmail.com', '$2y$10$2hURogghD/qVXQkslt69SuNvOqC.3cD/yLi/HSkjfzqc5WeXYzpri'),
(4, 'ali', 'ali@gmail.com', '$2y$10$rA07U10l/GI7ycdOIPFSdeRQIHHMJYP7.8V.XwX4KJLmRJZ53jwHe'),
(5, 'eslam abd', 'omar@gmail.com', '$2y$10$RdgzME0VdBlaD6IUuhL9leAGk9Cn7pKib7vF75o/dVOinTZ2MYedi'),
(6, 'sohib', 'sohaib@gmail.com', '$2y$10$0IWGXxYfx8q2Kw7/2VJpi.qXag0i0GTJkQRA6/4gYxnApMt/ZDSWO'),
(7, 'mo', 'mo@mo.com', '$2y$10$3dP8Bt82rHG1b39Q5Y1F8uXba9JBeEp9IKiWqNe6p9LmP.weOuFQC'),
(8, 'jana', 'jana@gmail.com', '$2y$10$WbcFBtrn32Azw0xh6W8zkuDm3mZrRgDRtMpfVsxMEBcCxtdq5emlu'),
(10, 'ahmed', 'ahmed123@gmail.com', '$2y$10$EMYlbBqnuOVe8BPcdbvM3OiA00C6V00G5OSAAppp6FmuI4pOtkMn.'),
(11, 'ali', 'ali12@gmail.com', '$2y$10$p9C0rRVAsugFjXQdM.a4CeUvJWxaQdxlPdokoRnDDzu3MeHnAkLWO'),
(12, 'lll', 'll@gmail.com', '$2y$10$U78n5Z4ClZANbQGTaGMYqO4t1Q9TUM6MVmInSCec4bTEexV.ScpKe');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `content` mediumtext NOT NULL,
  `meal_id` int(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `meal_id`, `date`) VALUES
(1, 5, 'I love this sandwich very much, it is very delicious', 2, '2023-09-18'),
(7, 5, 'this burger  is very delicious\r\n', 2, '2023-09-18'),
(10, 5, 'wow', 29, '2023-09-18'),
(11, 6, 'wow ', 24, '2023-09-19'),
(12, 7, 'i love it', 2, '2023-09-19'),
(13, 8, 'i love burgerr', 2, '2023-09-20'),
(14, 9, 'i love it\r\n', 2, '2023-09-21'),
(15, 10, 'wow', 2, '2023-09-21'),
(16, 11, 'wow i love it', 2, '2023-09-21'),
(17, 12, 'hsbknx', 2, '2023-09-22'),
(18, 13, 'jb', 2, '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `ID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `short_des` mediumtext NOT NULL,
  `long_des` longtext NOT NULL,
  `state` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`ID`, `name`, `price`, `short_des`, `long_des`, `state`, `image`) VALUES
(2, 'burgerr', 15, '  Delicious burger, order now  ', '  A burger consisting of meat, tomatoes, lettuce, and bread, prepared by skilled chefs', 'available', '../../images/meal_photos/65078a5d78ace5.79508310.jpg'),
(20, 'Hot Dog', 25, 'Hot dogs made entirely of beef.', '3 packs Garden Gourmet Sensational Sausage‏\r\n6 hot dog buns‏\r\n1 avocado‏\r\n6 cherry tomatoes‏\r\n1 leaf of red cabbage‏', 'available', '../../images/meal_photos/6507743a062017.32731198.jpeg'),
(22, 'pasta', 30, ' Pasta with white sauce and delicious spices ', ' Pasta is a versatile Italian dish made from wheat dough, enjoyed with different sauces.', 'available', '../../images/meal_photos/65078dae91f339.62894340.jpeg'),
(23, 'Fried Chicken', 50, 'Marinated chicken fried in delicious, crispy oil, cooked by skilled chefs.', 'It is a dish consisting of chicken pieces coated in flour or seasoned batter and fried, deep-fried, pressure-fried, or air-fried. Breading adds a crunchy coating or crust to the outside of the chicken while retaining the juices in the meat. Broiler chickens are the most commonly used.', 'available', '../../images/meal_photos/650779a4324f66.07408956.jpeg'),
(24, 'pizza', 50, 'Enjoy the ease of ordering delicious pizza with all flavors', 'Pizza or pizza is a dish of Italian origin made from wheat dough that is usually round, flat, leavened and topped with tomatoes, cheese and many other ingredients and then traditionally baked in a wood-fired oven at a high temperature. It is sometimes called mini pizza and the person who makes the pizza is known as the pizza maker.', 'available', '../../images/meal_photos/65077ab27ad329.05830032.jpg'),
(25, 'French fries', 8, 'Crispy french fries with some spices and sauces.', 'French fries, French fries, or potato sticks are potatoes cut into long sticks and deep fried. French fries are served hot, either soft or crispy, and are usually eaten as part of a lunch or dinner meal or on their own as a snack, and typically appear on the menus of bistros, snack bars, pubs and bars.', 'available', '../../images/meal_photos/65077ba262f7c7.53092903.jpg'),
(29, 'steak', 95, 'Enjoy the best juicy steak with all types of cooking', 'Steak is a slice of meat that we take from specific areas of the animal’s body and it is cooked through dry cooking, which is grilling or on a frying pan quickly and does not require any other cooking method.', 'available', '../../images/meal_photos/65078d06eddf11.00420843.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `meal_id` int(10) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `num_of_meal` int(11) NOT NULL,
  `address` text NOT NULL,
  `date` date DEFAULT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `meal_id`, `meal_name`, `user_id`, `user_name`, `num_of_meal`, `address`, `date`, `state`) VALUES
(2, 2, 'burgerr', 5, 'hmada', 2, 'cairo Egypt', '2023-09-18', 'confirmed'),
(3, 22, 'pasta', 5, 'hmada', 5, '‏‎El Bagur Monufia ', '2023-09-18', 'confirmed'),
(4, 24, 'pizza', 6, 'mo_mo', 5, 'shbin', '2023-09-19', 'confirmed'),
(5, 2, 'burgerr', 7, 'mohmed', 2, 'sobk', '2023-09-19', 'confirmed'),
(6, 2, 'burgerr', 8, 'jana', 5, 'jrndnfkls ', '2023-09-20', 'confirmed'),
(7, 2, 'burgerr', 9, 'ahmed samy', 3, 'egypt', '2023-09-21', 'confirmed'),
(8, 2, 'burgerr', 10, 'ahmed samy', 3, 'egypt', '2023-09-21', 'confirmed'),
(9, 2, 'burgerr', 11, 'ahmed samy ', 6, 'egypt', '2023-09-21', 'confirmed'),
(10, 2, 'burgerr', 12, 'sss', 5, '‏‎El-Bâgûr, Al Minufiyah', '2023-09-22', 'confirmed'),
(11, 23, 'Fried Chicken', 12, 'sss', 5, '‏‎El-Bâgûr, Al Minufiyah', '2023-09-22', 'confirmed'),
(12, 2, 'burgerr', 13, 'Ahmed samy', 5, 'elel', '2023-11-02', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `photo`, `reg_date`) VALUES
(4, 'ali', 'rwkdnfrewkd@gmail.com', '$2y$10$VeM7gzw7mA.pw5ZBjJKxieLHvcLNVmcHTMf9A5/4WI7jtuEfawYeK', '01205926527', '../../images/user_photos/avatar_icon.png', '2023-09-16'),
(5, 'hmada', 'hmada@hmada.com', '$2y$10$1BYQmAl2Pa9b9dG8P4OeUeJQBeA8rF2N8tPb11/P.fslrqIw49UFm', '01200100012', '../../images/user_photos/656f2441613e86.52354029.jpg', '2023-09-16'),
(6, 'mo_mo', 'mo_hani@gmail.com', '$2y$10$Bg5gL0uO1q7xSeEtgKTDK.aQ/AKhvZlgXEVqMeNus.2Kr8tmCfOT2', '01068926024', '../../images/user_photos/6509ad1b1c7f51.52416453.jpg', '2023-09-19'),
(7, 'mohmed', 'mo_hi@gmail.com', '$2y$10$Jz3AoYNIRt0gVtCqzB1ZFO.shKNd6QOjD7FlyIR1YyjXjQO1Egcrq', '0109938300', '../../images/user_photos/6509b7f69c5d68.76961177.jpg', '2023-09-19'),
(8, 'jana', 'jana@gmail.com', '$2y$10$a4TypAOdMQqJWAmJod2atOPXYHV4/Liby1j3lpORtihf9BD5qHqka', '01205926527', '../../images/user_photos/650b1e8fb022d3.31879228.jpg', '2023-09-20'),
(9, 'ahmed ali', 'ahmed@gmail.com', '$2y$10$ubVgiJiz1QVtk.D4UZ2FLev8EHwx9iU.fl.BRZXNtg3egsc5ivefK', '01205926527', '../../images/user_photos/avatar_icon.png', '2023-09-21'),
(10, 'ahmed', 'ahmed12@gmail.com', '$2y$10$eb3vg4ctk7ISfZBZHP4iPujFiRw0XrCNtcYt8NSQBvIJ.esTvtLiO', '01205926527', '../../images/user_photos/650c642e9a1af4.36603249.jpg', '2023-09-21'),
(11, 'ahmed samy ', 'ahmed122@gmail.com', '$2y$10$OIPJ9L2ldFdwcYifx8.px.U7clU/42wWReiJhBmzFDLqGH8VbQx0e', '01205926527', '../../images/user_photos/650c68db388620.48388268.jpg', '2023-09-21'),
(12, 'sss', 'ahmedsamyli@gmail.com', '$2y$10$jpzKyXZAqRobqalf5Y.8lO.V5Dl68MPta8m0F5WqgNSNZJkkXXfIG', '01205926527', '../../images/user_photos/650d8a0bb31fa9.65573023.jpg', '2023-09-22'),
(13, 'Ahmed samy', 'ahmed11@gmail.com', '$2y$10$l.9/MyOsYl2WOiLibktxTe4NiD5XKX2rjYAVibSpF9pCLFhamVVZq', '+201205926527', '../../images/user_photos/6543ec26d74af6.86172397.jpg', '2023-11-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
