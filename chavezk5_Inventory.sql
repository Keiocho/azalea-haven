-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2025 at 01:51 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chavezk5_Inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cartID` int(11) NOT NULL,
  `custID` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CartProduct`
--

CREATE TABLE `CartProduct` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `numToBuy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CartProduct`
--

INSERT INTO `CartProduct` (`cartID`, `productID`, `numToBuy`) VALUES
(1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `customerID` int(11) NOT NULL,
  `gFirst` varchar(50) DEFAULT NULL,
  `gLast` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `streetAddress` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `eID` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `fName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `employmentDate` date DEFAULT NULL,
  `ssn` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Producers`
--

CREATE TABLE `Producers` (
  `producerID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `dealer` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `name`, `description`, `quantity`, `price`, `category`) VALUES
(1, 'Blush Belle Azalea Shrub', 'Live Pink Azalea plant in decorative ceramic pot.', 20, 19.99, 'SHRUBS'),
(2, 'Phoenix Petal Azalea Shrub', 'A Fierce Red Azalea bush with thorns', 20, 18.99, 'SHRUBS'),
(3, 'Golden Pop Azalea Shrub', 'Beautiful Yellow Azalea Shrub on Azalea decorated pot.', 20, 25.99, 'SHRUBS'),
(4, 'Twilight Bloom Azalea Shrub', 'A Beautiful Midnight colored Azalea Shrub, Has thorns.', 20, 22.99, 'SHRUBS'),
(5, 'Amber Blaze Azalea Shrub', 'A Sunset Orange Azalea shrub, comes in Azalea decorated pot.', 20, 20.99, 'SHRUBS'),
(6, 'Snowdrift Azalea Shrub', 'A Beautiful Snow White Azalea Shrub, comes with and without thorns.', 20, 19.99, 'SHRUBS'),
(7, 'Luna Frost Azalea Shrub', 'Beautiful Blue Frosted Azalea Shrub, requires extra care.', 20, 18.99, 'SHRUBS'),
(8, 'Azalea Spring Petal Pillowcases', 'Matching pillowcases adorned with scattered Azalea blossoms (Set of Two).', 12, 17.99, 'BEDDING'),
(9, 'Azalea Floral Dreams Duvet Cover', 'Duvet cover featuring a realistic photograph of Azalea bushes.', 6, 49.99, 'BEDDING'),
(10, 'Azalea Bloom Blanket Throw', 'Fleece throw blanket with stylized Azalea vines and leaves.', 15, 25.99, 'BEDDING'),
(11, 'Azalea Pastel Bloom Bed Skirt', 'Bed skirt with ruffled Azalea accents along the hem.', 10, 21.99, 'BEDDING'),
(12, 'Azalea Body Pillow Cover', 'Long pillow cover with a continuous Azalea print.', 10, 12.99, 'BEDDING'),
(13, 'Azalea Porcelain Plate', 'Delicate porcelain plate with hand-painted Azaleas (Single).', 18, 12.99, 'TABLEWARE'),
(14, 'Azalea Blooming Cups Set', 'Set of ceramic teacups with pastel Azalea rim art (Set Pack of 4)', 10, 24.99, 'TABLEWARE'),
(15, 'Azalea Petal Dance Dinner Set', 'Dinnerware set with bold Azalea print — includes plates and bowls (8 pc).', 7, 65.99, 'TABLEWARE'),
(16, 'Azalea Spring Garden Serving Tray', 'Wooden tray with a lacquered Azalea floral scene.', 8, 28.99, 'TABLEWARE'),
(17, 'Azalea Floral Edge Napkin Set', 'Reusable napkins with Azalea stitching along the borders(4-Pack).', 20, 6.99, 'TABLEWARE'),
(18, 'Azalea Blossom Pitcher', 'Clear glass pitcher with etched Azalea blossoms.', 6, 18.99, 'TABLEWARE'),
(19, 'Snowdrift Azalea Seeds', 'Seed variety from the Snowdrift Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack)', 25, 4.99, 'SEEDS'),
(20, 'Blush Belle Azalea Seeds', 'Seed variety from the Blush Belle Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack).', 25, 4.99, 'SEEDS'),
(21, 'Twilight Bloom Azalea Seeds', 'Seed variety from the Twilight Bloom Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack).', 25, 4.99, 'SEEDS'),
(22, 'Luna Frost Azalea Seeds', 'Seed variety from the Luna Frost Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack)', 25, 4.99, 'SEEDS'),
(23, 'Phoenix Petal Azalea Seeds', 'Seed variety from the Phoenix Petal Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack)', 25, 4.99, 'SEEDS'),
(24, 'Amber Blaze Azalea Seeds', 'Seed variety from the Amber Blaze Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack)', 25, 4.99, 'SEEDS'),
(25, 'Golden Pop Azalea Seeds', 'Seed variety from the Golden Pop Azalea Shrub line. Ideal for growing your own vibrant Azaleas(20 Pack)', 25, 4.99, 'SEEDS'),
(26, 'Azalea Print Apron', 'Kitchen apron with blooming Azalea patterns.', 10, 16.99, 'APPAREL'),
(27, 'Azalea Bloom T-Shirt', 'A soft cotton tee featuring a watercolor-style Azalea flower print.', 15, 15.99, 'APPAREL'),
(28, 'Azalea Petal Wrap Scarf', 'Lightweight scarf with pastel Azalea petal patterns.', 10, 22.99, 'APPAREL'),
(29, 'Azalea Embroidered Hat', 'Stylish baseball cap with Azalea embroidery on the front.', 12, 14.99, 'APPAREL'),
(30, 'Azalea Canvas Tote Bag', 'Eco-friendly tote bag with blooming Azalea illustrations.', 20, 14.99, 'APPAREL'),
(37, 'Azalea Socks', 'Comfy ankle socks with repeating pink Azalea graphics(Set of 2)', 25, 8.00, 'APPAREL'),
(38, 'Azalea Garden Hoodie', 'Warm fleece hoodie with a vibrant Azalea bouquet print.', 10, 32.00, 'APPAREL'),
(39, 'Azalea Clay Pot', 'Classic terracotta clay pot with a subtle Azalea embossing.', 15, 9.99, 'POT'),
(40, 'Azalea Glazed Ceramic Pot', 'High-gloss ceramic pot featuring pastel Azalea illustrations.', 10, 14.99, 'POT'),
(41, 'Azalea Hanging Basket Pot', 'Woven hanging pot with trailing Azalea design print.', 8, 12.99, 'POT'),
(42, 'Azalea Painted Stone Pot', 'Hand-painted stone pot with vibrant Azalea motifs.', 10, 16.99, 'POT'),
(43, 'Azalea Decorative Metal Planter', 'Rustic metal pot with laser-cut Azalea flower cutouts.', 12, 13.99, 'POT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `CartProduct`
--
ALTER TABLE `CartProduct`
  ADD PRIMARY KEY (`cartID`,`productID`),
  ADD KEY `fk_product_id` (`productID`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`eID`);

--
-- Indexes for table `Producers`
--
ALTER TABLE `Producers`
  ADD PRIMARY KEY (`producerID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `eID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Producers`
--
ALTER TABLE `Producers`
  MODIFY `producerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
