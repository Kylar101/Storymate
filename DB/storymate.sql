-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 06:43 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

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
  `audioFile` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(48) NOT NULL,
  `categoryDescription` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `commentBody` text NOT NULL,
  `authorID` int(11) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `imageFile` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `StoryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL COMMENT 'tells wheatther or not hte notifcation has been sseen'
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
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='holds the stories contents';

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`storyID`, `title`, `description`, `authorID`, `tagID`, `categoryID`, `public`, `dateCreated`) VALUES
(1, '', 'This is a test story to see if the story functionality has any bugs.', 7, 0, 0, 0, '0000-00-00'),
(2, 'The testing of the Website', 'This is  short story detailing the testing of this website\'s basic functionality. This story will allow the testing of the follo', 1, 0, 0, 0, '0000-00-00'),
(3, 'The testing of the Website 3', 'This is  short story detailing the testing of this website\'s basic functionality. This story will allow the testing of the follo', 3, 0, 0, 0, '0000-00-00'),
(4, 'The testing of the Website 1', 'This is  short story detailing the testing of this website\'s basic functionality. This story will allow the testing of the follo', 1, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `storycontents`
--

CREATE TABLE `storycontents` (
  `contentsID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `text` text,
  `imageID` int(11) NOT NULL,
  `audioID` int(11) NOT NULL,
  `contentWarning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='holds the contents of the story';

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
  `phone` int(10) NOT NULL,
  `activated` tinyint(1) NOT NULL COMMENT 'wheather the user''s account has been approved by an admin.',
  `dateCreated` date NOT NULL COMMENT 'date the account was created.',
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userRole`, `firstName`, `lastName`, `email`, `phone`, `activated`, `dateCreated`, `password`) VALUES
(1, 0, 'Nate', 'Johns', 'nathan.johns@qut.edu.au', 0, 1, '2017-07-01', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(2, 0, 'jack', 'pilsken', 'jack@gmail.com', 0, 0, '0000-00-00', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(3, 0, 'Ben', 'Lowbridge', 'lowbridge.ba@gmail.com', 0, 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(4, 0, 'Renzo', 'Alvarado', 'renzo@gmail.com', 0, 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86'),
(5, 0, 'Ashleigh', 'Wilson', 'ashleigh@gmail.com', 0, 1, '2017-08-16', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86');

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
  MODIFY `audioID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `storycontents`
--
ALTER TABLE `storycontents`
  MODIFY `contentsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `rollID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
