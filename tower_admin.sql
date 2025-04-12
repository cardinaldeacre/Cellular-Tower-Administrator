-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 02:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tower_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_towers`
--

CREATE TABLE `active_towers` (
  `id` varchar(50) NOT NULL,
  `tower_name` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `address` text,
  `height` int DEFAULT NULL,
  `tower_type` varchar(255) DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `active_towers`
--

INSERT INTO `active_towers` (`id`, `tower_name`, `operator`, `latitude`, `longitude`, `address`, `height`, `tower_type`, `installation_date`, `maintenance_date`, `status`) VALUES
('101', 'Tower Alpha', 'Operator A', -2.154320, 99.543210, 'https://maps.google.com/?q=-2.15432,99.54321', 55, 'Self-Supporting', '2021-01-15', '2025-01-15', 'Active'),
('103', 'Tower Charlie', 'Operator C', -4.567890, 107.123456, 'https://maps.google.com/?q=-4.56789,107.12346', 70, 'Lattice', '2020-08-12', '2024-08-12', 'Active'),
('104', 'Tower Delta II', 'Operator D', 3.456789, 98.987654, 'https://maps.google.com/?q=3.45679,98.98765', 50, 'Guyed', '2023-03-01', '2024-03-01', 'Active'),
('107', 'Tower Golf II', 'Operator G', 0.123456, 111.654321, 'https://maps.google.com/?q=0.12346,111.65432', 68, 'Self-Supporting', '2021-06-10', '2023-06-10', 'Active'),
('109', 'Tower India II', 'Operator A', -1.234567, 120.876543, 'https://maps.google.com/?q=-1.23457,120.87654', 63, 'Monopole', '2021-04-07', '2024-04-07', 'Active'),
('111', 'Tower Kilo', 'Operator C', -3.543210, 106.987654, 'https://maps.google.com/?q=-3.54321,106.98765', 64, 'Guyed', '2020-12-02', '2025-12-02', 'Active'),
('114', 'Tower November', 'Operator F', -6.123456, 109.876543, 'https://maps.google.com/?q=-6.12346,109.87654', 50, 'Lattice', '2022-04-23', '2023-04-23', 'Active'),
('116', 'Tower Papa', 'Operator H', -9.123456, 116.987654, 'https://maps.google.com/?q=-9.12346,116.98765', 66, 'Monopole', '2023-08-09', '2024-08-09', 'Active'),
('118', 'Tower Romeo', 'Operator B', 1.654321, 103.765432, 'https://maps.google.com/?q=1.65432,103.76543', 62, 'Self-Supporting', '2021-03-15', '2025-03-15', 'Active'),
('342', 'Tower Malaka', 'Operator L', -8.456123, 115.678912, 'https://maps.google.com/?q=-8.45612,115.67891', 74, 'Lattice', '2024-02-29', '2025-01-25', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inactive_towers`
--

CREATE TABLE `inactive_towers` (
  `id` varchar(50) NOT NULL,
  `tower_name` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `address` text,
  `height` int DEFAULT NULL,
  `tower_type` varchar(255) DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inactive_towers`
--

INSERT INTO `inactive_towers` (`id`, `tower_name`, `operator`, `latitude`, `longitude`, `address`, `height`, `tower_type`, `installation_date`, `maintenance_date`, `status`) VALUES
('102', 'Tower Beta', 'Operator B', 1.123456, 103.654321, 'https://maps.google.com/?q=1.12346,103.65432', 60, 'Monopole', '2022-05-22', '2023-05-22', 'Inactive'),
('106', 'Tower Foxtrot II', 'Operator F', -8.456123, 115.678912, 'https://maps.google.com/?q=-8.45612,115.67891', 62, 'Monopole', '2022-09-03', '2023-09-03', 'Inactive'),
('110', 'Tower Juliet II', 'Operator B', 2.345678, 100.234567, 'https://maps.google.com/?q=2.34568,100.23457', 58, 'Self-Supporting', '2023-01-15', '2024-01-15', 'Inactive'),
('113', 'Tower Mike', 'Operator E', -7.456789, 115.678901, 'https://maps.google.com/?q=-7.45679,115.67890', 49, 'Self-Supporting', '2021-08-11', '2022-08-11', 'Inactive'),
('117', 'Tower Quebec', 'Operator A', -7.678901, 107.432100, 'https://maps.google.com/?q=-7.67890,107.43210', 48, 'Lattice', '2020-05-12', '2024-05-12', 'Inactive'),
('120', 'Tower Tango', 'Operator D', -5.678901, 104.234567, 'https://maps.google.com/?q=-5.67890,104.23457', 65, 'Monopole', '2022-10-07', '2023-10-07', 'Inactive'),
('4234', 'Tower Walden', 'Operator G', -7.392271, 107.337882, 'https://maps.app.goo.gl/3Z6ao9n6Zx16Hd3R6', 48, 'Monopole', '2020-06-09', '2024-02-14', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email_address`, `password`) VALUES
(1, 'acre@gmail.com', '123'),
(3, 'ionic@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_towers`
--

CREATE TABLE `maintenance_towers` (
  `id` varchar(50) NOT NULL,
  `tower_name` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `address` text,
  `height` int DEFAULT NULL,
  `tower_type` varchar(255) DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maintenance_towers`
--

INSERT INTO `maintenance_towers` (`id`, `tower_name`, `operator`, `latitude`, `longitude`, `address`, `height`, `tower_type`, `installation_date`, `maintenance_date`, `status`) VALUES
('105', 'Tower Echo II', 'Operator E', -6.789012, 120.543210, 'https://maps.google.com/?q=-6.78901,120.54321', 45, 'Self-Supporting', '2021-07-18', '2022-07-18', 'Under Maintenance'),
('108', 'Tower Hotel II', 'Operator H', -5.234567, 106.345678, 'https://maps.google.com/?q=-5.23457,106.34568', 56, 'Lattice', '2022-11-05', '2023-11-05', 'Under Maintenance'),
('112', 'Tower Lima', 'Operator D', 4.123456, 101.987654, 'https://maps.google.com/?q=4.12346,101.98765', 60, 'Monopole', '2023-07-20', '2024-07-20', 'Under Maintenance'),
('115', 'Tower Oscar', 'Operator G', 5.123456, 99.234567, 'https://maps.google.com/?q=5.12346,99.23457', 55, 'Self-Supporting', '2021-09-14', '2023-09-14', 'Under Maintenance'),
('119', 'Tower Sierra', 'Operator C', -4.123456, 108.432100, 'https://maps.google.com/?q=-4.12346,108.43210', 70, 'Guyed', '2023-05-11', '2024-05-11', 'Under Maintenance'),
('876', 'Tower Naraka', 'Operator F', -6.214620, 110.345540, 'https://maps.app.goo.gl/7D2ddhw8tdz5WrDv8', 62, 'Self Support', '2025-01-01', '2025-01-25', 'Under Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE `tower` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tower_name` varchar(250) NOT NULL,
  `operator` varchar(250) NOT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `height` int NOT NULL,
  `tower_type` varchar(100) NOT NULL,
  `installation_date` date NOT NULL,
  `maintenance_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tower`
--

INSERT INTO `tower` (`id`, `tower_name`, `operator`, `latitude`, `longitude`, `address`, `height`, `tower_type`, `installation_date`, `maintenance_date`, `status`) VALUES
('10', 'Tower Juliet', 'Operator I', 3.595200, 98.672220, 'https://maps.google.com/?q=3.59520,98.67222', 42, 'Monopole', '2023-07-10', '2024-07-10', 'Active'),
('101', 'Tower Alpha', 'Operator A', -2.154320, 99.543210, 'https://maps.google.com/?q=-2.15432,99.54321', 55, 'Self-Supporting', '2021-01-15', '2025-01-15', 'Active'),
('102', 'Tower Beta', 'Operator B', 1.123456, 103.654321, 'https://maps.google.com/?q=1.12346,103.65432', 60, 'Monopole', '2022-05-22', '2023-05-22', 'Inactive'),
('103', 'Tower Charlie', 'Operator C', -4.567890, 107.123456, 'https://maps.google.com/?q=-4.56789,107.12346', 70, 'Lattice', '2020-08-12', '2024-08-12', 'Active'),
('104', 'Tower Delta II', 'Operator D', 3.456789, 98.987654, 'https://maps.google.com/?q=3.45679,98.98765', 50, 'Guyed', '2023-03-01', '2024-03-01', 'Active'),
('105', 'Tower Echo II', 'Operator E', -6.789012, 120.543210, 'https://maps.google.com/?q=-6.78901,120.54321', 45, 'Self-Supporting', '2021-07-18', '2022-07-18', 'Under Maintenance'),
('106', 'Tower Foxtrot II', 'Operator F', -8.456123, 115.678912, 'https://maps.google.com/?q=-8.45612,115.67891', 62, 'Monopole', '2022-09-03', '2023-09-03', 'Inactive'),
('107', 'Tower Golf II', 'Operator G', 0.123456, 111.654321, 'https://maps.google.com/?q=0.12346,111.65432', 68, 'Self-Supporting', '2021-06-10', '2023-06-10', 'Active'),
('108', 'Tower Hotel II', 'Operator H', -5.234567, 106.345678, 'https://maps.google.com/?q=-5.23457,106.34568', 56, 'Lattice', '2022-11-05', '2023-11-05', 'Under Maintenance'),
('109', 'Tower India II', 'Operator A', -1.234567, 120.876543, 'https://maps.google.com/?q=-1.23457,120.87654', 63, 'Monopole', '2021-04-07', '2024-04-07', 'Active'),
('110', 'Tower Juliet II', 'Operator B', 2.345678, 100.234567, 'https://maps.google.com/?q=2.34568,100.23457', 58, 'Self-Supporting', '2023-01-15', '2024-01-15', 'Inactive'),
('111', 'Tower Kilo', 'Operator C', -3.543210, 106.987654, 'https://maps.google.com/?q=-3.54321,106.98765', 64, 'Guyed', '2020-12-02', '2025-12-02', 'Active'),
('112', 'Tower Lima', 'Operator D', 4.123456, 101.987654, 'https://maps.google.com/?q=4.12346,101.98765', 60, 'Monopole', '2023-07-20', '2024-07-20', 'Under Maintenance'),
('113', 'Tower Mike', 'Operator E', -7.456789, 115.678901, 'https://maps.google.com/?q=-7.45679,115.67890', 49, 'Self-Supporting', '2021-08-11', '2022-08-11', 'Inactive'),
('114', 'Tower November', 'Operator F', -6.123456, 109.876543, 'https://maps.google.com/?q=-6.12346,109.87654', 50, 'Lattice', '2022-04-23', '2023-04-23', 'Active'),
('115', 'Tower Oscar', 'Operator G', 5.123456, 99.234567, 'https://maps.google.com/?q=5.12346,99.23457', 55, 'Self-Supporting', '2021-09-14', '2023-09-14', 'Under Maintenance'),
('116', 'Tower Papa', 'Operator H', -9.123456, 116.987654, 'https://maps.google.com/?q=-9.12346,116.98765', 66, 'Monopole', '2023-08-09', '2024-08-09', 'Active'),
('117', 'Tower Quebec', 'Operator A', -7.678901, 107.432100, 'https://maps.google.com/?q=-7.67890,107.43210', 48, 'Lattice', '2020-05-12', '2024-05-12', 'Inactive'),
('118', 'Tower Romeo', 'Operator B', 1.654321, 103.765432, 'https://maps.google.com/?q=1.65432,103.76543', 62, 'Self-Supporting', '2021-03-15', '2025-03-15', 'Active'),
('119', 'Tower Sierra', 'Operator C', -4.123456, 108.432100, 'https://maps.google.com/?q=-4.12346,108.43210', 70, 'Guyed', '2023-05-11', '2024-05-11', 'Under Maintenance'),
('120', 'Tower Tango', 'Operator D', -5.678901, 104.234567, 'https://maps.google.com/?q=-5.67890,104.23457', 65, 'Monopole', '2022-10-07', '2023-10-07', 'Inactive'),
('2', 'Tower Bravo', 'Operator B', -7.797220, 110.368800, 'https://maps.google.com/?q=-7.79722,110.36880', 50, 'Lattice', '2022-06-05', '2023-06-05', 'Active'),
('342', 'Tower Malaka', 'Operator L', -8.456123, 115.678912, 'https://maps.google.com/?q=-8.45612,115.67891', 74, 'Lattice', '2024-02-29', '2025-01-25', 'Active'),
('4', 'Tower Delta', 'Operator A', -2.991560, 104.756920, 'https://maps.google.com/?q=-2.99156,104.75692', 60, 'Self-Supporting', '2020-12-20', '2023-12-20', 'Inactive'),
('4234', 'Tower Walden', 'Operator G', -7.392271, 107.337882, 'https://maps.app.goo.gl/3Z6ao9n6Zx16Hd3R6', 48, 'Monopole', '2020-06-09', '2024-02-14', 'Inactive'),
('5', 'Tower Echo', 'Operator D', -8.409520, 115.188920, 'https://maps.google.com/?q=-8.40952,115.18892', 55, 'Monopole', '2023-03-01', '2024-03-01', 'Active'),
('6', 'Tower Foxtrot', 'Operator E', -3.312070, 117.357600, 'https://maps.google.com/?q=-3.31207,117.35760', 48, 'Guyed', '2022-04-12', '2023-04-12', 'Active'),
('6423', 'Tower Waffa', 'Operator G', -6.214620, 106.845130, 'https://maps.google.com/?q=-6.21462,106.84513', 53, 'Monopole', '2023-06-28', '2025-01-07', 'Active'),
('7', 'Tower Golf', 'Operator F', -0.789270, 113.921330, 'https://maps.google.com/?q=-0.78927,113.92133', 53, 'Monopole', '2021-11-22', '2022-11-22', 'Inactive'),
('8', 'Tower Hotel', 'Operator G', -8.409520, 115.204800, 'https://maps.google.com/?q=-8.40952,115.20480', 65, 'Lattice', '2023-02-15', '2024-02-15', 'Under Maintenance'),
('876', 'Tower Naraka', 'Operator F', -6.214620, 110.345540, 'https://maps.app.goo.gl/7D2ddhw8tdz5WrDv8', 62, 'Self Support', '2025-01-01', '2025-01-25', 'Under Maintenance'),
('9', 'Tower India', 'Operator H', -1.460210, 120.830630, 'https://maps.google.com/?q=-1.46021,120.83063', 50, 'Self-Supporting', '2020-05-30', '2023-05-30', 'Active');

--
-- Triggers `tower`
--
DELIMITER $$
CREATE TRIGGER `after_tower_insert_or_update` AFTER INSERT ON `tower` FOR EACH ROW BEGIN
    
    IF NEW.status = 'Active' THEN
        
        INSERT INTO active_towers (id, tower_name, operator, latitude, longitude, address, height, tower_type, installation_date, maintenance_date, status)
        VALUES (NEW.id, NEW.tower_name, NEW.operator, NEW.latitude, NEW.longitude, NEW.address, NEW.height, NEW.tower_type, NEW.installation_date, NEW.maintenance_date, NEW.status)
        ON DUPLICATE KEY UPDATE
            tower_name = VALUES(tower_name),
            operator = VALUES(operator),
            latitude = VALUES(latitude),
            longitude = VALUES(longitude),
            address = VALUES(address),
            height = VALUES(height),
            tower_type = VALUES(tower_type),
            installation_date = VALUES(installation_date),
            maintenance_date = VALUES(maintenance_date),
            status = VALUES(status);
            
    ELSEIF NEW.status = 'Inactive' THEN
        
        INSERT INTO inactive_towers (id, tower_name, operator, latitude, longitude, address, height, tower_type, installation_date, maintenance_date, status)
        VALUES (NEW.id, NEW.tower_name, NEW.operator, NEW.latitude, NEW.longitude, NEW.address, NEW.height, NEW.tower_type, NEW.installation_date, NEW.maintenance_date, NEW.status)
        ON DUPLICATE KEY UPDATE
            tower_name = VALUES(tower_name),
            operator = VALUES(operator),
            latitude = VALUES(latitude),
            longitude = VALUES(longitude),
            address = VALUES(address),
            height = VALUES(height),
            tower_type = VALUES(tower_type),
            installation_date = VALUES(installation_date),
            maintenance_date = VALUES(maintenance_date),
            status = VALUES(status);
                   
    ELSEIF NEW.status = 'Under Maintenance' THEN
        
        INSERT INTO maintenance_towers (id, tower_name, operator, latitude, longitude, address, height, tower_type, installation_date, maintenance_date, status)
        VALUES (NEW.id, NEW.tower_name, NEW.operator, NEW.latitude, NEW.longitude, NEW.address, NEW.height, NEW.tower_type, NEW.installation_date, NEW.maintenance_date, NEW.status)
        ON DUPLICATE KEY UPDATE
            tower_name = VALUES(tower_name),
            operator = VALUES(operator),
            latitude = VALUES(latitude),
            longitude = VALUES(longitude),
            address = VALUES(address),
            height = VALUES(height),
            tower_type = VALUES(tower_type),
            installation_date = VALUES(installation_date),
            maintenance_date = VALUES(maintenance_date),
            status = VALUES(status);
            
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_tower` BEFORE DELETE ON `tower` FOR EACH ROW BEGIN
    INSERT INTO tower_recycle_bin (id, tower_name, operator, latitude, longitude, address, tower_type, height, installation_date, maintenance_date, status)
    VALUES (OLD.id, OLD.tower_name, OLD.operator, OLD.latitude, OLD.longitude, OLD.address, OLD.tower_type, OLD.height, OLD.installation_date, OLD.maintenance_date, OLD.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tower_recycle_bin`
--

CREATE TABLE `tower_recycle_bin` (
  `id` varchar(50) NOT NULL,
  `tower_name` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `address` text,
  `tower_type` varchar(100) DEFAULT NULL,
  `height` double DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `maintenance_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tower_recycle_bin`
--

INSERT INTO `tower_recycle_bin` (`id`, `tower_name`, `operator`, `latitude`, `longitude`, `address`, `tower_type`, `height`, `installation_date`, `maintenance_date`, `status`, `deleted_at`) VALUES
('3', 'Tower Charlie', 'Operator C', -5.147660, 119.432730, 'https://maps.google.com/?q=-5.14766,119.43273', 'Guyed', 40, '2021-09-10', '2023-09-10', 'Under Maintenance', '2025-01-21 04:09:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_towers`
--
ALTER TABLE `active_towers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inactive_towers`
--
ALTER TABLE `inactive_towers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `maintenance_towers`
--
ALTER TABLE `maintenance_towers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tower_recycle_bin`
--
ALTER TABLE `tower_recycle_bin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
