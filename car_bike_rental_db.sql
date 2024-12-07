-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 02:23 AM
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
-- Database: `car_bike_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `vehicleId` int(100) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `fromDate` varchar(50) NOT NULL,
  `toDate` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`booking_id`, `user_id`, `vehicleId`, `vehicleType`, `fromDate`, `toDate`, `status`, `message`) VALUES
(1, 7, 1, 'bike', '2023-09-26', '2023-09-29', 'cancelled', 'approve my booking'),
(6, 7, 5, 'car', '2023-10-02', '2023-10-07', 'Confirmed', 'booked'),
(7, 7, 3, 'bike', '2023-10-02', '2023-10-07', 'cancelled', 'hfghf'),
(8, 8, 4, 'bike', '2023-10-09', '2023-10-14', 'cancelled', 'fsdf');

-- --------------------------------------------------------

--
-- Table structure for table `brand_table`
--

CREATE TABLE `brand_table` (
  `brand_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_table`
--

INSERT INTO `brand_table` (`brand_id`, `name`, `Date`) VALUES
(1, 'Royal Enfield', '2023-09-25'),
(2, 'Hyundai', '2023-09-25'),
(3, 'Hero', '2023-09-27'),
(4, 'Bajaj', '2023-09-27'),
(5, 'TVS', '2023-09-27'),
(6, 'Maruti Suzuki', '2023-09-27'),
(7, 'Honda', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `car_bike_table`
--

CREATE TABLE `car_bike_table` (
  `vehicle_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Overview` varchar(1000) NOT NULL,
  `brand_id` int(50) NOT NULL,
  `pricePerDay` varchar(100) NOT NULL,
  `modelYear` varchar(50) NOT NULL,
  `seatingCapacity` varchar(50) NOT NULL,
  `mileage` varchar(50) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `fuelType` varchar(50) NOT NULL,
  `vehicleType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_bike_table`
--

INSERT INTO `car_bike_table` (`vehicle_id`, `Name`, `Overview`, `brand_id`, `pricePerDay`, `modelYear`, `seatingCapacity`, `mileage`, `image1`, `image2`, `image3`, `fuelType`, `vehicleType`) VALUES
(1, 'Royal Enfield-3', '                     Royal Enfield  .                   ', 1, '2000', '2020', '2', '48', 'royal.webp', 'royalEnfield.jpg', 'Royal-Enfield-Classic-350.png', 'petrol', 'bike'),
(2, 'Hyundai Aura', 'Hyundai', 2, '2000', '2020', '5', '40', 'hundai aura.jpg', 'hundai.jpg', 'hundai_arua.jpg', 'CNG', 'car'),
(3, 'Super Splender', '\r\nHero Super Splendor is powered by 124.7 cc engine.\r\nThis Super Splendor engine generates a power of 10.8 PS @ 7500 rpm and a torque of 10.6 Nm @ 6000 rpm. The claimed mileage of Super Splendor is 55 kmpl. Hero Super Splendor gets Drum brakes in the front and rear. The kerb weight of Super Splendor is 123 Kg. Hero Super Splendor has Tubeless Tyre and Alloy Wheels.       \r\n \r\nEngine	                      124 CC\r\nKerb Weight	              123 Kg\r\nFuel Tank Capacity	     12 Liters\r\nSeat Height	             1102 mm           ', 3, '1000', '2021', '2', '50', 'splendeer1.jpg', 'splender.webp', 'splender2.jpg', 'petrol', 'bike'),
(4, 'Apache RTR 160', '      TVS Apache RTR 160 4V Specifications\r\n\r\n    Engine Type: SI, 4-stroke, 4-valve, Oil-cooled Engine\r\n    Emission Standard: BS6\r\n    Displacement: 159.7 cc\r\n    Cooling System: Oil-cooled with Air Assist\r\n    Starting Mechanism: Self-Starter Only\r\n    Max Power: 17.55 PS @ 9250 rpm\r\n    Max Torque: 14.73 Nm @ 7250 rpm\r\n    Gearbox: 5-Speed\r\n    Top Speed: 114 Kmph\r\n    Fuel Tank Capacity: 12 liter\r\n    Mileage: 35-40 kmpl\r\n    Front Tyre: 90/90-17 – Disc\r\n    Rear Tyre: 130/70-R17 – Disc\r\n    Tubeless Tyres: Yes\r\n    Braking System: Single-Channel ABS\r\n    Suspension Setup: Telescopic Forks and Mono Shock Suspension\r\n    Seat Height: 800 mm\r\n    Ground Clearance: 180 mm\r\n    Kerb Weight: 146 – 147 kg                ', 5, '2000', '2020', '2', '38', 'apache2.jpg', 'apache1.webp', 'apache3.webp', 'petrol', 'bike'),
(5, 'Maruti Suzuki Fronx', '  The leading automobile manufacturer Maruti Suzuki, has officially announced \r\n the booking for its much-awaited latest creation Fronx SUV in Nepal. CG MotoCorp, \r\n the authorized distributor of Suzuki Cars in Nepal, has also announced the pricing\r\n details for the Suzuki Fronx. In addition to the Suzuki Fronx, the highly anticipated\r\n New Suzuki Jimny is also now open for bookings in Nepal. The Suzuki Fronx SUV\r\n is a fresh addition to the automobile market, built upon the reliable Suzuki Baleno\r\n platform. Nevertheless, it showcases a contemporary and sporty design concept,\r\n accompanied by a host of advanced and cutting-edge features. This dynamic and \r\n powerful vehicle promises to redefine the Nepalese automobile industry.\r\n \r\n Suzuki Fronx is only available in three main trims - the entry-level Sigma, mid-spec \r\n Delta and Delta Plus. All three variants are powered by a 1.2L K series dual jet dual\r\n VVT petrol engine that can generate a max power of 88 bhp @6000 rpm and a max\r\n ', 6, '3000', '2023', '5', '25', 'marutisuzuki.jpg', 'maruti-suzuki3.avif', 'maruti-suzuki2.avif', 'Diesel', 'car'),
(6, 'Honda City Hybrid', '                                           The leading automobile manufacturer Honda, has officially launched its much-anticipa\r\nted flagship model - the Honda City Hybrid (e-HEV) in Nepal. Syakar Trading Company,\r\n the authorized distributor of Honda vehicles in Nepal, has officially unveiled the latest \r\nadditions to their lineup - the all-new Honda City Hybrid. This highly anticipated model \r\ncomes in two exciting variants, V and ZX. This model will be available in addition to the \r\nregular Honda City variant.  Combining cutting-edge technology, elegant performance, \r\nand eco-consciousness, this revolutionary hybrid sedan is set to redefine the streets of \r\nNepal and beyond.\r\n\r\nOne of the most impressive features of the Honda City e-HEV is its ability to seamlessly\r\n transition between different driving modes. The Honda City e-HEV utilizes its motor to \r\nswitch seamlessly between EV Drive, Hybrid Drive, and Engine Drive modes. EV Drive\r\n employs an electric motor and a battery to en', 7, '3000', '2023', '5', '24', 'honda1.webp', 'honda2.webp', 'honda3.webp', 'Diesel', 'car');

-- --------------------------------------------------------

--
-- Table structure for table `contact_from_user`
--

CREATE TABLE `contact_from_user` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` varchar(300) NOT NULL,
  `postingDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_from_user`
--

INSERT INTO `contact_from_user` (`id`, `name`, `email`, `phone`, `message`, `postingDate`) VALUES
(2, 'Hari Sharma', 'hari@gmail.com', '9811223344', 'Hello', '2023-09-25'),
(3, 'Rahul', 'rahul@gmail.com', '9812434567', 'Hello', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `manage_page`
--

CREATE TABLE `manage_page` (
  `id` int(50) NOT NULL,
  `pageName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `details` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_page`
--

INSERT INTO `manage_page` (`id`, `pageName`, `type`, `details`) VALUES
(1, 'About Us', 'aboutus', 'Welcome to our Vehicle Rental System, the premier destination for hassle-free car and bike rentals. We are passionate about providing you with the freedom to explore the world on your terms, and we\'ve made it our mission to simplify the process of booking and enjoying your favorite vehicles.\r\nA vehicle booking system is a digital platform designed to streamline the process of reserving and managing vehicles. It allows users to easily book, track, and manage various types of vehicles, such as cars, bikes. This system typically provides an intuitive user interface, real-time availability information and administrative tools for fleet owners. Whether for personal use, rental services, or corporate fleets, a vehicle booking system enhances efficiency and convenience in vehicle reservations and utilization.\r\n\r\n'),
(2, 'Privacy Policy', 'privacy', ''),
(3, 'Terms and Conditions', 'termsAndConditions', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(100) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(50) NOT NULL,
  `userRole` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `Country`, `RegDate`, `updateDate`, `userRole`) VALUES
(2, 'Bisesh Ghimire', 'biseshghimire2020@gmail.com', 'bisesh12', '9824395570', '2058-12-10', 'Itahari-8,sunsari', 'Nepal', '2023-09-25', '2023-10-01', 'user'),
(5, 'Nipesh Ghimire', 'admin@gmail.com', 'admin', '9811041939', '2057-11-04', 'Kerabari-9,Morang', 'Nepal', '2023-09-25', '', 'admin'),
(6, 'ShahRukh Khan', 'srk@gmail.com', 'srk11', '9822334455', '2024-12-21', 'Mumbai', 'India', '2023-09-25', '2023-10-01', 'user'),
(7, 'Saroj Ghimire', 'saroj@gmail.com', '1234', '9823435678', '2052-02-12', 'Itahari-8', 'Nepal', '2023-09-26', '2023-09-30', 'user'),
(8, 'Ramesh Poudel', 'ramesh@gmail.com', 'ramesh12', '9812342343', '2012-12-21', 'Kerabari-9,Morang', 'India', '2023-10-01', '2023-10-03', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_fc` (`user_id`),
  ADD KEY `vehicle_fc` (`vehicleId`);

--
-- Indexes for table `brand_table`
--
ALTER TABLE `brand_table`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `car_bike_table`
--
ALTER TABLE `car_bike_table`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `brand_fc` (`brand_id`);

--
-- Indexes for table `contact_from_user`
--
ALTER TABLE `contact_from_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_page`
--
ALTER TABLE `manage_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brand_table`
--
ALTER TABLE `brand_table`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car_bike_table`
--
ALTER TABLE `car_bike_table`
  MODIFY `vehicle_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_from_user`
--
ALTER TABLE `contact_from_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_page`
--
ALTER TABLE `manage_page`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD CONSTRAINT `user_fc` FOREIGN KEY (`user_id`) REFERENCES `tblusers` (`user_id`),
  ADD CONSTRAINT `vehicle_fc` FOREIGN KEY (`vehicleId`) REFERENCES `car_bike_table` (`vehicle_id`);

--
-- Constraints for table `car_bike_table`
--
ALTER TABLE `car_bike_table`
  ADD CONSTRAINT `brand_fc` FOREIGN KEY (`brand_id`) REFERENCES `brand_table` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
