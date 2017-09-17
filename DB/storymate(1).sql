-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 05:54 AM
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
  `audioFile` varchar(48) NOT NULL,
  `storyID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`audioID`, `audioFile`, `storyID`) VALUES
(1, './uploads/04 Brooklyn Zoo.mp3', 64),
(2, './uploads/04 Brooklyn Zoo.mp3', 65);

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
  `dateCreated` date NOT NULL,
  `storyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `commentBody`, `authorID`, `dateCreated`, `storyID`) VALUES
(1, 'abcabc', 1, '0000-00-00', 41),
(2, 'Testing commment upload feature', 1, '0000-00-00', 41),
(5, 'Working to resolve authorID passing issues in comment_processing.php', 1, '0000-00-00', 41),
(6, 'AuthorID passing issues resolved.', 1, '0000-00-00', 41);

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `flagID` int(11) NOT NULL,
  `storyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 62, '../uploads/14613136744_69599d1d26_o.jpg'),
(10, 62, '../uploads/14721969260_3361274dea_z.jpg'),
(11, 62, '../uploads/14721969260_c455a59252_o.jpg'),
(12, 62, '../uploads/14788794355_99b128acec_z.jpg');

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
(1, 65, 0),
(2, 65, 0),
(3, 65, 1),
(4, 65, 1),
(5, 65, 1),
(6, 65, 1),
(7, 65, 1),
(8, 65, 1),
(9, 65, 1),
(10, 65, 1),
(11, 65, 1),
(12, 65, 1),
(13, 65, 1),
(14, 65, 1);

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
(2, 'The testing of the Website', 'This is  short story detailing the testing of this website\'s basic functionality. This story will allow the testing of the follo', 1, 0, 0, 0, '0000-00-00', '', 0, 1, 0),
(4, 'The testing of the Website 1', 'This is  short story detailing the testing of this website\'s basic functionality. This story will allow the testing of the follo', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(9, 'Testing multi image upload', 'Testing multi image', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(39, 'IMAGES', 'IMAGES', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(40, '5 IMAGES', '5 IMAGES', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(41, 'audio test', 'audio upload test', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(42, 'audio test 2', 'audio upload test 2', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(43, 'testing image upload multiple', 'testing image upload multiple', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(44, 'testing image upload multiple', 'testing image upload multiple', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(45, 'testing image upload multiple', 'testing image upload multiple', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(46, 'testing image upload multiple', 'testing image upload multiple', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(47, 'testing image upload multipletesting image uploa', 'testing image upload multipletesting image upload multiple', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(48, 'blah', 'blah', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(49, 'sgbdb', 'sdfgbnrfd', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(50, 'sgbdb', 'sdfgbnrfd', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(51, 'sgbdb', 'sdfgbnrfd', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(52, 'dfb', 'dbfg', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(53, 'dfb', 'dbfg', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(54, 'dgfnxfgn', 'fdsgnfhn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(55, 'dgfnxfgn', 'fdsgnfhn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(56, 'dgfnxfgn', 'fdsgnfhn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(57, 'dgfnxfgn', 'fdsgnfhn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(58, 'dgfnxfgn', 'fdsgnfhn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(59, 'szdvdsfb', 'sfbvdsfb', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(60, 'testing image string upload', 'this should put all the image locations into link in the database', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(61, 'asdgffasdg', 'sadfsadfgva', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(62, 'tdhsfdgnh', 'gfnfn', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(63, 'testing the audio upload', 'testing the audio upload', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(64, 'testing the audio upload 2', 'testing the audio upload 2', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(65, 'testing the audio upload 3', 'testing the audio upload 3', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(66, 'Testing draft functionality', 'Testing draft functionality', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(67, 'Testing save draft functionality', 'Testing save draft functionality', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(68, 'Testing save draft functionality', 'Testing save draft functionality', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(69, 'Testing save draft functionality 2', 'Testing save draft functionality 2', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 0),
(70, 'Testing save draft functionality SUCCESS', 'Testing save draft functionality SUCCESS', 1, 0, 0, 0, '0000-00-00', '', 0, 0, 1);

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
(1, 46, '', 0, 0, 0),
(2, 47, '', 0, 0, 0),
(3, 48, '', 0, 0, 0),
(4, 49, '', 0, 0, 0),
(5, 50, '', 0, 0, 0),
(6, 51, '', 0, 0, 0),
(7, 52, '', 0, 0, 0),
(8, 53, '', 0, 0, 0),
(9, 54, '', 0, 0, 0),
(10, 55, '', 0, 0, 0),
(11, 56, '', 0, 0, 0),
(12, 57, '', 0, 0, 0),
(13, 58, '', 0, 0, 0),
(14, 59, '', 0, 0, 0),
(15, 60, '', 0, 0, 0),
(16, 61, '', 0, 0, 0),
(17, 62, '', 0, 0, 0),
(18, 63, '', 0, 0, 0),
(19, 64, '', 0, 0, 0),
(20, 65, '', 0, 0, 0),
(29, 66, '', 0, 0, 0),
(30, 67, '', 0, 0, 0),
(31, 68, '', 0, 0, 0),
(32, 69, '', 0, 0, 0),
(33, 70, '', 0, 0, 0);

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
(1, 0, 'Nate', 'Johns', 'nathan.johns@qut.edu.au', '0452012790', 1, '2017-07-01', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86'),
(2, 0, 'jack', 'pilsken', 'jack@gmail.com', '0', 0, '0000-00-00', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

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
  MODIFY `audioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `flagID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `storycontents`
--
ALTER TABLE `storycontents`
  MODIFY `contentsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
