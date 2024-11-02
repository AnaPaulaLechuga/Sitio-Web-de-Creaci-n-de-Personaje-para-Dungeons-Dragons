-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.infinityfree.com
-- Generation Time: Nov 02, 2024 at 04:39 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37569584_items`
--

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Rarity` varchar(250) NOT NULL,
  `Stat 1` varchar(250) NOT NULL,
  `Stat 2` varchar(250) NOT NULL,
  `Stat 3` varchar(250) NOT NULL,
  `Stat 4` varchar(250) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Cost` varchar(250) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `itempic` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`id`, `Name`, `Rarity`, `Stat 1`, `Stat 2`, `Stat 3`, `Stat 4`, `Weight`, `Cost`, `Description`, `itempic`) VALUES
(1, 'Padded Armor', 'Common', 'AC 11+Dex', 'Stealth Disadvantage', '', '', 8, '5gp', '', ''),
(3, 'Bag of Holding', 'Uncommon', '500 pounds extra holding strength', '', '', '', 15, '500 gold pieces', 'This bag has an interior space considerably larger than its outside dimensions, roughly 2 feet in diameter at the mouth and 4 feet deep. The bag can hold up to 500 pounds, not exceeding a volume of 64 cubic feet. The bag weighs 15 pounds, regardless of its contents. Retrieving an item from the bag requires an action.\r\nIf the bag is overloaded, pierced, or torn, it ruptures and is destroyed, and its contents are scattered in the Astral Plane. If the bag is turned inside out, its contents spill forth, unharmed, but the bag must be put right before it can be used again. Breathing creatures inside the bag can survive up to a number of minutes equal to 10 divided by the number of creatures (minimum 1 minute), after which time they begin to suffocate.\r\nPlacing a bag of holding inside an extradimensional space created by a Heward\'s handy haversack, portable hole, or similar item instantly destroys both items and opens a gate to the Astral Plane. The gate originates where the one item was placed inside the other. Any creature within 10 feet of the gate is sucked through it to a random location on the Astral Plane. The gate then closes. The gate is one-way only and can\'t be reopened. ', ''),
(4, 'Club', 'Common', 'Simple Weapon', '1d4 Bludgeoning Damage', '', '', 2, '1 Silver Pieces', 'Light', ''),
(5, 'Battleaxe', 'Common', 'Martial Weapon', 'One Handed 1d8 Slashing', 'Two Handed 1d10 Slashing', '', 4, '10 Gold Pieces', 'Versatile', ''),
(6, 'Ring of Uselessness', 'Common', 'Just a ring', '', '', '', 1, '0 copper pieces', 'Literally just a ring', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
