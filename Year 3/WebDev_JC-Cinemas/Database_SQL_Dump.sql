-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 09:43 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamie walsh-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_Ref` int(11) NOT NULL,
  `Customer_Name` varchar(30) NOT NULL,
  `Movie` varchar(50) NOT NULL,
  `Show_Time` varchar(5) NOT NULL,
  `Show_Date` varchar(40) NOT NULL,
  `Number_of_Tickets` int(2) NOT NULL,
  `Total_Cost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_Ref`, `Customer_Name`, `Movie`, `Show_Time`, `Show_Date`, `Number_of_Tickets`, `Total_Cost`) VALUES
(1, 'KeyBag1', 'Interstellar', '20:00', '13-Dec-2018', 4, 28),
(2, 'KeyBag1', 'The Prestige', '14:00', '13-Dec-2018', 2, 14),
(3, 'JamieW', 'Interstellar', '15:30', '08-Dec-2018', 3, 21),
(4, 'JamieW', 'The Green Mile', '13:00', '14-Dec-2018', 2, 14),
(5, 'JamieW', 'The Incredibles 2', '19:00', '09-Dec-2018', 6, 42),
(6, 'JamieW', 'The Hangover', '22:45', '11-Dec-2018', 9, 63);

-- --------------------------------------------------------

--
-- Table structure for table `coming_soon`
--

CREATE TABLE `coming_soon` (
  `Title` varchar(50) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Date` varchar(12) NOT NULL,
  `Poster` varchar(100) NOT NULL,
  `Trailer` varchar(500) NOT NULL,
  `ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coming_soon`
--

INSERT INTO `coming_soon` (`Title`, `Description`, `Date`, `Poster`, `Trailer`, `ID`) VALUES
('A Star is Born', 'A musician helps a young singer and actress find fame, even as age and alcoholism send his own career into a downward spiral.', '12-Dec-2018', './images/star.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/bo_efYhYU2A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1),
('Bohemian Rhapsody', 'A chronicle of the years leading up to Queen\'s legendary appearance at the Live Aid (1985) concert.', '20-Dec-2018', './images/Bohemianrhapsody.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/mP0VHJYFOAU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2),
('Goosebumps 2', 'Goosebumps 2 is a horror adventure in which three teens must stop an evil dummy intent on bringing Halloween creatures to life.', '15-Dec-2018', './images/goosebumps2.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/iUm2FikfDps\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 3),
('Robin Hood', 'A war-hardened Crusader and his Moorish commander mount an audacious revolt against the corrupt English crown', '30-Dec-2018', './images/robin.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/cwuBuoqzygg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 4),
('The Grinch', 'The Grinch and his loyal dog, Max, live a solitary existence inside a cave on Mount Crumpet. He plots to ruin Christmas for the village of Whoville. ', '23-Dec-2018', './images/Grinch.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/Bf6D-i8YpHg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5),
('Widows', 'Four women with nothing in common accept a debt left behind by their dead husbands\' criminal activities, take fate into their own hands, and conspire to forge a future on their own terms.', '02-Jan-2018', './images/Widows.jpg', '<iframe width=\"260\" height=\"160\" src=\"https://www.youtube.com/embed/nN2yBBSRC78\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 6);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `Showing_ID` int(3) NOT NULL,
  `Movie_ID` int(3) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time1` varchar(5) NOT NULL,
  `Time2` varchar(5) NOT NULL,
  `Time3` varchar(5) NOT NULL,
  `Time4` varchar(5) NOT NULL,
  `Screen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`Showing_ID`, `Movie_ID`, `Title`, `Day`, `Date`, `Time1`, `Time2`, `Time3`, `Time4`, `Screen`) VALUES
(1, 2, 'Halloween', 'Wednesday', '12-Dec-2018', '16:00', '18:30', '21:00', '23:00', 5),
(2, 3, 'Interstellar', 'Tuesday', '11-Dec-2018', '12:15', '15:30', '19:00', '22:00', 3),
(3, 3, 'Interstellar', 'Thursday', '13-Dec-2018', '13:25', '17:00', '20:00', '22:45', 7),
(4, 5, 'Shutter Island', 'Tuesday', '11-Dec-2018', '13:30', '17:10', '19:00', '22:00', 4),
(5, 5, 'Shutter Island', 'Friday', '14-Dec-2018', '13:00', '17:15', '19:45', '22:00', 9),
(6, 6, 'The Green Mile', 'Friday', '14-Dec-2018', '13:00', '16:30', '19:45', '23:00', 15),
(7, 1, 'Goodfellas', 'Wednesday', '12-Dec-2018', '13:30', '16:40', '19:15', '22:30', 6),
(8, 1, 'Goodfellas', 'Saturday', '08-Dec-2018', '13:00', '16:30', '19:00', '22:10', 14),
(9, 2, 'Halloween', 'Saturday', '08-Dec-2018', '17:00', '19:45', '21:40', '23:30', 18),
(10, 5, 'Shutter Island', 'Monday', '10-Dec-2018', '13:00', '15:45', '18:00', '21:15', 1),
(11, 3, 'Interstellar', 'Saturday', '08-Dec-2018', '11:15', '15:30', '19:30', '22:00', 2),
(12, 6, 'The Green Mile', 'Monday', '10-Dec-2018', '13:00', '16:00', '18:45', '21:30', 8),
(13, 2, 'Halloween', 'Sunday', '09-Dec-2018', '17:15', '19:30', '20:45', '22:55', 13),
(14, 8, 'The Incredibles 2', 'Saturday', '08-Dec-2018', '10:15', '12:30', '14:00', '17:00', 10),
(15, 8, 'The Incredibles 2', 'Sunday', '09-Dec-2018', '12:30', '15:00', '17:30', '19:00', 10),
(16, 8, 'The Incredibles 2', 'Wednesday', '12-Dec-2018', '15:30', '17:15', '19:00', '21:15', 12),
(17, 9, 'The Prestige', 'Thursday', '13-Dec-2018', '14:00', '16:45', '19:00', '22:15', 10),
(18, 9, 'The Prestige', 'Sunday', '09-Dec-2018', '13:00', '15:45', '18:00', '20:30', 17),
(19, 9, 'The Prestige', 'Friday', '14-Dec-2018', '14:00', '16:30', '19:20', '21:50', 11),
(20, 7, 'The Hangover', 'Saturday', '08-Dec-2018', '13:00', '15:15', '18:30', '21:00', 20),
(21, 7, 'The Hangover', 'Tuesday', '11-Dec-2018', '13:00', '17:25', '20:00', '22:45', 16),
(22, 7, 'The Hangover', 'Monday', '10-Dec-2018', '16:55', '19:10', '21:30', '23:20', 19),
(23, 4, 'Meet The Fockers', 'Saturday', '08-Dec-2018', '10:15', '14:30', '17:45', '20:00', 16),
(24, 4, 'Meet The Fockers', 'Thursday', '13-Dec-2018', '17:00', '19:00', '21:15', '23:00', 19),
(25, 4, 'Meet The Fockers', 'Sunday', '09-Dec-2018', '10:30', '12:55', '15:40', '19:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `Movie_ID` int(3) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Starring` varchar(80) NOT NULL,
  `Length` varchar(20) NOT NULL,
  `Age_Limit` varchar(5) NOT NULL,
  `Trailer` varchar(100) NOT NULL,
  `Poster` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`Movie_ID`, `Title`, `Genre`, `Starring`, `Length`, `Age_Limit`, `Trailer`, `Poster`) VALUES
(1, 'Goodfellas', 'Crime', 'Robert De Niro, Joe Pesci, Ray Liotta', '2 hours 28 minutes', '18', 'https://www.youtube.com/watch?v=qo5jJpHtI1Y', 'images/Goodfellas.jpg'),
(2, 'Halloween', 'Horror', 'Jamie Lee Curtis, Judy Greer, Nick Castle', '1 hour 44 minutes', '18', 'https://www.youtube.com/watch?v=aMCLVSlk1Tk', 'images/Halloween.jpg'),
(3, 'Interstellar', 'Sci-Fi', 'Matthew McConaughey, Anne Hathaway, Michael Caine', '2 hours 49 minutes', '12', 'https://www.youtube.com/watch?v=zSWdZVtXT7E', 'images/Interstellar.jpg'),
(4, 'Meet The Fockers', 'Comedy', 'Ben Stiller, Robert Di Nero, Barbra Streisand, Dustin Hoffman', '1 hour 55 minutes', '12', 'https://www.youtube.com/watch?v=JG5NnOIKeew', 'images/Fockers.jpg'),
(5, 'Shutter Island', 'Mystery', 'Leonardo DiCaprio, Mark Ruffalo, Emily Mortimer', '2 hours and 18 minut', '15', 'https://www.youtube.com/watch?v=YDGldPitxic', 'images/Shutter.jpg'),
(6, 'The Green Mile', 'Drama', 'Tom Hanks, Bonnie Hunt, Michael Clarke Duncan', '3 hours 9 minutes', '18', 'https://www.youtube.com/watch?v=Ki4haFrqSrw', 'images/Green_Mile.jpg'),
(7, 'The Hangover', 'Comedy', ' Zach Galifianakis, Bradley Cooper, Justin Bartha', '1 hour 48 minutes', '15', 'https://www.youtube.com/watch?v=vhFVZsk3XEs', 'images/Hangover.jpg'),
(8, 'The Incredibles 2', 'Family', 'Holly Hunter, Craig T. Nelson, Samuel L. Jackson', '2 hours 31 minutes', 'U', 'https://www.youtube.com/watch?v=o-1EkVDiJRc', 'images/Incredibles.jpg'),
(9, 'The Prestige', 'Drama', 'Hugh Jackman, Christian Bale, Scarlette Johansson', '2 hours 10 minutes', '12', 'https://www.youtube.com/watch?v=o4gHCmTQDVI', 'images/The_Prestige.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

CREATE TABLE `mylist` (
  `ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mylist`
--

INSERT INTO `mylist` (`ID`, `User`) VALUES
(1, 'KeyBag1'),
(2, 'JamieW'),
(2, 'KeyBag1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First_name`, `Surname`, `Date`, `Address`, `Email`, `Username`, `Password`) VALUES
('Catherine', 'Garner', '18-11-1998', '128 Hillside', 'cat@gmail.com', 'catcatcat', 'Pass1'),
('Jamie', 'Walsh', '13-10-1998', '1 Roundabout Rd', 'jamiew@gmail.com', 'JamieW', 'Pass'),
('Killian', 'Waldron', '21-11-1997', '28 Dalkey Avenue', 'KWaldo@gmail.com', 'KeyBag1', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_Ref`);

--
-- Indexes for table `coming_soon`
--
ALTER TABLE `coming_soon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`Showing_ID`),
  ADD KEY `Movie_ID` (`Movie_ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Movie_ID`);

--
-- Indexes for table `mylist`
--
ALTER TABLE `mylist`
  ADD PRIMARY KEY (`ID`,`User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_Ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coming_soon`
--
ALTER TABLE `coming_soon`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `Showing_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `Movie_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `FKey` FOREIGN KEY (`Movie_ID`) REFERENCES `movies` (`Movie_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
