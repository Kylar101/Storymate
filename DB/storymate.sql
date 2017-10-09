-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 09:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storymate`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `audioID` int(11) NOT NULL,
  `audioFile` varchar(255) NOT NULL,
  `storyID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`audioID`, `audioFile`, `storyID`) VALUES
(3, './uploads/E01416A3-8AB3-487F-8B31-353E17107C38.m', 0),
(4, './uploads/508BD7C5-CF1E-4469-A18A-F1D7311334B5.mp3', 0),
(5, './uploads/1C986382-CD3A-43F8-8B23-26B444D15A54.mp3', 75),
(6, './uploads/8DCD807F-4AE2-47C3-AA66-1FB1495B87BB.mp3', 0),
(7, './uploads/01224CAA-CA3A-43EF-A107-3550DC156A1E.mp3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(48) NOT NULL,
  `categoryDescription` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryDescription`) VALUES
(1, 'Lifestyle', 'A description'),
(4, 'health', 'asodfhvihfvashvd[a sidvja ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `commentBody` text NOT NULL,
  `authorID` int(11) NOT NULL,
  `dateCreated` date NOT NULL,
  `storyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flagID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`flagID`, `storyID`, `userID`) VALUES
(1, 73, 3);

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `followID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `followingID` text NOT NULL,
  `follows` int(11) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `storyID` int(10) NOT NULL,
  `imagepath` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `storyID`, `imagepath`) VALUES
(35, 71, './uploads/profile-pic.gif'),
(36, 71, './uploads/story-feature1.jpg'),
(37, 71, './uploads/story-feature2backup.jpg'),
(38, 72, './uploads/profile-background-v1.jpg'),
(39, 72, './uploads/story-feature1.jpg'),
(40, 76, './uploads/persian-cats-and-kittens-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `storyID`, `userID`) VALUES
(15, 71, 3),
(16, 75, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL COMMENT 'tells wheatther or not hte notifcation has been sseen',
  `notification` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='notications about stories';

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `storyID` int(11) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `dateCreated` date NOT NULL,
  `storyText` longtext NOT NULL,
  `approved` int(1) NOT NULL,
  `trash` int(1) NOT NULL,
  `draft` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='holds the stories contents';

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`storyID`, `title`, `description`, `authorID`, `tagID`, `categoryID`, `public`, `dateCreated`, `storyText`, `approved`, `trash`, `draft`) VALUES
(71, 'gegst', 'efa hspodfh aposdfhapjdj', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(72, 'aaishfbals fj', 'wjf asodfh', 3, 0, 0, 0, '0000-00-00', '', 0, 0, 1),
(73, 'a isdfuoiasduhf oaiu', 'posd hpsug', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(74, 'asd fasdf asdf', 'adsf asdf asdf', 3, 0, 0, 0, '0000-00-00', '', 0, 1, 0),
(75, 'kasjdjhf aosdif', 'ajdhfg laskdhuf', 3, 0, 0, 0, '0000-00-00', '', 0, 1, 0),
(76, 'g', 'sdf', 3, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(78, '.zsdjzn', 'akwjef', 3, 0, 3, 0, '0000-00-00', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `storycontents`
--

CREATE TABLE `storycontents` (
  `contentsID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `textfield` text,
  `imageID` int(11) NOT NULL,
  `audioID` int(11) NOT NULL,
  `contentWarning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='holds the contents of the story';

--
-- Dumping data for table `storycontents`
--

INSERT INTO `storycontents` (`contentsID`, `storyID`, `textfield`, `imageID`, `audioID`, `contentWarning`) VALUES
(34, 71, '', 0, 0, 0),
(35, 72, 'lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf lakwehf lasudhfl ajdhfl asdhf alksjdf ', 0, 0, 0),
(36, 73, '', 0, 3, 0),
(37, 74, '', 0, 4, 0),
(38, 75, '', 0, 0, 0),
(39, 76, '\r\nFruitcake carrot cake gingerbread sweet roll apple pie dragÃ©e gummi bears. Pastry cookie gummies halvah lollipop bonbon. DragÃ©e carrot cake carrot cake topping gummi bears toffee. Muffin marshmallow dragÃ©e croissant sweet liquorice gummies oat cake chupa chups. Pudding gummi bears bonbon cake dragÃ©e. Cupcake ice cream toffee pudding marzipan tart tiramisu apple pie. Cupcake pie candy cookie gingerbread. Cake lollipop marshmallow carrot cake marzipan chocolate cake brownie marzipan sweet. Candy gummies croissant donut pie cheesecake gummies. Cake lollipop caramels gummies. Pudding bonbon cake marshmallow jelly muffin sweet candy. Cake pie pudding. Gummi bears ice cream apple pie.\r\nIcing chupa chups cupcake gummi bears tootsie roll oat cake pudding halvah. Cheesecake soufflÃ© candy canes brownie. Ice cream chocolate cake sweet roll lemon drops pudding oat cake fruitcake. Cake pastry wafer macaroon brownie sesame snaps lemon drops gummi bears cupcake. Jelly beans powder cookie. Biscuit cheesecake carrot cake gingerbread bear claw cake. Donut icing cake soufflÃ©. DragÃ©e tiramisu sweet caramels tootsie roll cake dessert marzipan. Fruitcake caramels macaroon liquorice. Cupcake brownie tiramisu pastry macaroon cookie. Biscuit sweet jujubes powder jelly-o brownie. Jujubes muffin croissant apple pie macaroon cotton candy dessert. Apple pie cotton candy jelly beans.', 0, 0, 0),
(40, 77, '', 0, 0, 0),
(41, 78, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagID` int(11) NOT NULL,
  `tagName` varchar(48) NOT NULL,
  `tagDescription` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `rollID` int(11) NOT NULL,
  `roleName` varchar(48) NOT NULL,
  `roleDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`rollID`, `roleName`, `roleDescription`) VALUES
(1, 'admin', 'Role type for admins'),
(2, 'User', 'Role type for normal users');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userRole` int(1) NOT NULL COMMENT 'number defining the users permissions. 1 - user, 0 - admin.',
  `firstName` varchar(48) NOT NULL,
  `lastName` varchar(48) NOT NULL,
  `email` varchar(48) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `activated` tinyint(1) NOT NULL COMMENT 'wheather the user''s account has been approved by an admin.',
  `dateCreated` date NOT NULL COMMENT 'date the account was created.',
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userRole`, `firstName`, `lastName`, `email`, `phone`, `activated`, `dateCreated`, `password`) VALUES
(1, 1, 'Nate', 'Johns', 'nathan.johns@qut.edu.au', '0', 1, '2017-07-01', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(3, 1, 'Ben', 'Lowbridge', 'lowbridge.ba@gmail.com', '0', 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(4, 2, 'Renzo', 'Alvarado', 'renzo@gmail.com', '0', 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(5, 2, 'Ashleigh', 'Wilson', 'ashleigh@gmail.com', '0', 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`audioID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`flagID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`storyID`);

--
-- Indexes for table `storycontents`
--
ALTER TABLE `storycontents`
  ADD PRIMARY KEY (`contentsID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`rollID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `audioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `storycontents`
--
ALTER TABLE `storycontents`
  MODIFY `contentsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `rollID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
