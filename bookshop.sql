-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_username` varchar(255) NOT NULL,
  `Admin_password` varchar(255) NOT NULL,
  `Admin_role_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`Admin_id`, `Admin_username`, `Admin_password`, `Admin_role_fk`) VALUES
(1, 'Robin', '123apa123', 1),
(2, 'simon', 'hej123456', 2),
(3, 'alfons', '$2y$10$iMshvoVvZdVAAhYzQVJE..grHUIocs0q/dS6qRknucz42vdcjZeIO', 1),
(4, 'simon', '$2y$10$dC0hi2TYkO0AopNEFGMRzeKEK66EDcgZTxyUwE2/tY2fAFWoZmggW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_agerecom`
--

CREATE TABLE `table_agerecom` (
  `Agerecom_id` int(11) NOT NULL,
  `Agerecom_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_agerecom`
--

INSERT INTO `table_agerecom` (`Agerecom_id`, `Agerecom_name`) VALUES
(1, '0-3 år'),
(2, '3-6 år'),
(3, '6-9 år');

-- --------------------------------------------------------

--
-- Table structure for table `table_author`
--

CREATE TABLE `table_author` (
  `Author_id` int(11) NOT NULL,
  `Author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_author`
--

INSERT INTO `table_author` (`Author_id`, `Author_name`) VALUES
(1, 'Tove jansson');

-- --------------------------------------------------------

--
-- Table structure for table `table_books`
--

CREATE TABLE `table_books` (
  `Book_id` int(11) NOT NULL,
  `Book_title` varchar(255) NOT NULL,
  `Book_description` varchar(1000) NOT NULL,
  `Book_author_fk` int(11) NOT NULL,
  `Book_illustrator_fk` int(11) NOT NULL,
  `Book_language_fk` int(11) NOT NULL,
  `Book_pubyear` date NOT NULL,
  `Book_numofpages` int(11) NOT NULL,
  `Book_price` int(11) NOT NULL,
  `Book_cover` varchar(255) NOT NULL,
  `Book_category_fk` int(11) NOT NULL,
  `Book_genre_fk` int(11) NOT NULL,
  `Book_series_fk` int(11) NOT NULL,
  `Book_agerecom_fk` int(11) NOT NULL,
  `Book_publisher_fk` int(11) NOT NULL,
  `Book_status_fk` int(11) NOT NULL,
  `Book_rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_books`
--

INSERT INTO `table_books` (`Book_id`, `Book_title`, `Book_description`, `Book_author_fk`, `Book_illustrator_fk`, `Book_language_fk`, `Book_pubyear`, `Book_numofpages`, `Book_price`, `Book_cover`, `Book_category_fk`, `Book_genre_fk`, `Book_series_fk`, `Book_agerecom_fk`, `Book_publisher_fk`, `Book_status_fk`, `Book_rating`) VALUES
(27, 'Ipsum Lorem', 'naziTyskland', 1, 2, 2, '2023-12-13', 822, 120, 'okk.jpg', 7, 4, 4, 4, 5, 1, ''),
(28, 'Ipsum Lorem', 'dwedjoiedijdweifjoweijfweojfiowejofwofjwoifjowif', 1, 2, 1, '2023-12-07', 222, 22, 'Picture1.png', 5, 7, 4, 4, 4, 1, ''),
(29, 'Molnar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget enim venenatis, ultrices turpis a, porta risus. Maecenas suscipit ipsum a ultrices dignissim. Donec a aliquet ante. Etiam ullamcorper, erat sed sodales porttitor, nisi felis efficitur justo, a consequat nibh ex vel sapien. Integer viverra dictum gravida. Aenean a diam quis nulla scelerisque semper tincidunt et dolor. Integer eget erat gravida, luctus sapien ac, maximus metus. Sed at pellentesque sem, vitae ornare sem. Cras vitae finibus nibh, sed pretium eros.\r\n\r\nPhasellus iaculis diam felis. Nunc consectetur, libero a interdum ornare, massa metus accumsan risus, sed porttitor felis leo ut enim.', 1, 2, 2, '2023-12-13', 133, 11, '0930_001 (002).jpg', 4, 4, 2, 3, 3, 1, ''),
(30, 'Mumin mamman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget enim venenatis, ultrices turpis a, porta risus. Maecenas suscipit ipsum a ultrices dignissim. Donec a aliquet ante. Etiam ullamcorper, erat sed sodales porttitor, nisi felis efficitur justo, a consequat nibh ex vel sapien. Integer viverra dictum gravida. Aenean a diam quis nulla scelerisque semper tincidunt et dolor. Integer eget erat gravida, luctus sapien ac, maximus metus. Sed at pellentesque sem, vitae ornare sem. Cras vitae finibus nibh, sed pretium eros.\r\n\r\nPhasellus iaculis diam felis. Nunc consectetur, libero a interdum ornare, massa metus accumsan risus, sed porttitor felis leo ut enim.', 1, 1, 2, '2023-12-04', 299, 12, 'download (1).jpg', 5, 4, 3, 2, 1, 1, ''),
(32, 'arbeitare', 'cdsfsdfsfsfd', 0, 0, 1, '2023-12-13', 2222, 22, 'Picture5.png', 1, 1, 1, 1, 1, 1, ''),
(33, 'Mommo', 'dwdwdwedwe', 1, 1, 2, '2023-12-26', 11, 12, 'Picture1.png', 5, 9, 4, 2, 1, 1, '4/5'),
(34, 'Mommo', 'dwdwdwedwe', 1, 1, 2, '2023-12-26', 11, 12, 'Picture1.png', 5, 9, 4, 2, 1, 1, '4/5');

-- --------------------------------------------------------

--
-- Table structure for table `table_categories`
--

CREATE TABLE `table_categories` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_categories`
--

INSERT INTO `table_categories` (`Category_id`, `Category_name`) VALUES
(1, 'Deckare'),
(2, 'Romantik'),
(3, 'Skönliteratur'),
(4, 'Barnliteratur'),
(5, 'Barnliteratur'),
(6, 'Molnar'),
(7, 'Molnar'),
(8, 'Molnar'),
(9, 'Molnar'),
(10, 'Molnar');

-- --------------------------------------------------------

--
-- Table structure for table `table_featured`
--

CREATE TABLE `table_featured` (
  `Featured_id` int(11) NOT NULL,
  `Featured_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_genre`
--

CREATE TABLE `table_genre` (
  `Genre_id` int(11) NOT NULL,
  `Genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_genre`
--

INSERT INTO `table_genre` (`Genre_id`, `Genre_name`) VALUES
(1, 'Drama'),
(2, 'Novel'),
(3, 'Thriller'),
(4, 'Thriller'),
(5, 'hej'),
(6, 'då'),
(7, 'imorgon'),
(8, 'imorgon'),
(9, 'imorgon'),
(10, 'imorgon'),
(11, 'imorgon');

-- --------------------------------------------------------

--
-- Table structure for table `table_illustrator`
--

CREATE TABLE `table_illustrator` (
  `Illustrator_id` int(11) NOT NULL,
  `Illustrator_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_illustrator`
--

INSERT INTO `table_illustrator` (`Illustrator_id`, `Illustrator_name`) VALUES
(1, 'Miroslav Sokcic'),
(2, 'Lisa Zachizon');

-- --------------------------------------------------------

--
-- Table structure for table `table_language`
--

CREATE TABLE `table_language` (
  `Language_id` int(11) NOT NULL,
  `Language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_language`
--

INSERT INTO `table_language` (`Language_id`, `Language_name`) VALUES
(1, 'Svenska'),
(2, 'Finska');

-- --------------------------------------------------------

--
-- Table structure for table `table_publisher`
--

CREATE TABLE `table_publisher` (
  `Publisher_id` int(11) NOT NULL,
  `Publisher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_publisher`
--

INSERT INTO `table_publisher` (`Publisher_id`, `Publisher_name`) VALUES
(1, 'Bonnier förlagen'),
(2, 'Liber'),
(3, 'Höglund förlag'),
(4, 'Höglund förlag'),
(5, 'Höglund förlag'),
(6, 'Höglund förlag');

-- --------------------------------------------------------

--
-- Table structure for table `table_roles`
--

CREATE TABLE `table_roles` (
  `Role_id` int(11) NOT NULL,
  `Role_name` varchar(255) NOT NULL,
  `Role_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_roles`
--

INSERT INTO `table_roles` (`Role_id`, `Role_name`, `Role_level`) VALUES
(1, 'Admin', 10),
(2, 'User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_series`
--

CREATE TABLE `table_series` (
  `Series_id` int(11) NOT NULL,
  `Series_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_series`
--

INSERT INTO `table_series` (`Series_id`, `Series_name`) VALUES
(1, 'Harry Potter'),
(2, 'Sagan om ringen'),
(3, 'Johan falck'),
(4, 'Wallander'),
(5, 'hejsan'),
(6, 'hejsan'),
(7, 'hejsan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `table_agerecom`
--
ALTER TABLE `table_agerecom`
  ADD PRIMARY KEY (`Agerecom_id`);

--
-- Indexes for table `table_author`
--
ALTER TABLE `table_author`
  ADD PRIMARY KEY (`Author_id`);

--
-- Indexes for table `table_books`
--
ALTER TABLE `table_books`
  ADD PRIMARY KEY (`Book_id`);

--
-- Indexes for table `table_categories`
--
ALTER TABLE `table_categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `table_featured`
--
ALTER TABLE `table_featured`
  ADD PRIMARY KEY (`Featured_id`);

--
-- Indexes for table `table_genre`
--
ALTER TABLE `table_genre`
  ADD PRIMARY KEY (`Genre_id`);

--
-- Indexes for table `table_illustrator`
--
ALTER TABLE `table_illustrator`
  ADD PRIMARY KEY (`Illustrator_id`);

--
-- Indexes for table `table_language`
--
ALTER TABLE `table_language`
  ADD PRIMARY KEY (`Language_id`);

--
-- Indexes for table `table_publisher`
--
ALTER TABLE `table_publisher`
  ADD PRIMARY KEY (`Publisher_id`);

--
-- Indexes for table `table_roles`
--
ALTER TABLE `table_roles`
  ADD PRIMARY KEY (`Role_id`);

--
-- Indexes for table `table_series`
--
ALTER TABLE `table_series`
  ADD PRIMARY KEY (`Series_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_agerecom`
--
ALTER TABLE `table_agerecom`
  MODIFY `Agerecom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_author`
--
ALTER TABLE `table_author`
  MODIFY `Author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_books`
--
ALTER TABLE `table_books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_categories`
--
ALTER TABLE `table_categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_featured`
--
ALTER TABLE `table_featured`
  MODIFY `Featured_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_genre`
--
ALTER TABLE `table_genre`
  MODIFY `Genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_illustrator`
--
ALTER TABLE `table_illustrator`
  MODIFY `Illustrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_language`
--
ALTER TABLE `table_language`
  MODIFY `Language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_publisher`
--
ALTER TABLE `table_publisher`
  MODIFY `Publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_roles`
--
ALTER TABLE `table_roles`
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_series`
--
ALTER TABLE `table_series`
  MODIFY `Series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
