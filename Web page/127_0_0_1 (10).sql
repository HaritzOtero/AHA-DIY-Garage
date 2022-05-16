-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2022 a las 11:31:28
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aha_diy_garage`
--
DROP DATABASE IF EXISTS `aha_diy_garage`;
CREATE DATABASE IF NOT EXISTS `aha_diy_garage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aha_diy_garage`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buying_products`
--

CREATE TABLE `buying_products` (
  `session` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `buy` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`client_id`, `name`, `surname`, `email_address`, `phone_number`, `password`) VALUES
(1, 'Alain', 'Basterra', 'alainbasterra@gmail.com', 214748364, 'alain'),
(2, 'name', 'surname', 'email_address', 666999000, 'password'),
(3, 'Iker', 'Laskurain', 'ikerlaskurain@gmail.com', 876876876, 'iker'),
(4, 'Ander', 'Gallastegui', 'andergallastegui@gmail.com', 654654654, 'ander'),
(5, 'Jone', 'Gomez', 'jonegomez@gmail.com', 543543543, 'jone'),
(6, 'Ruben', 'Perez', 'rubenperez@gmail.com', 321432534, 'ruben'),
(7, 'Abdullah', 'Rahmadech', 'abdullahramadech@gmail.acom', 239847981, 'abdullah'),
(8, 'Hasbulla', 'Magomedov', 'hasbullamagomedov@gmail.com', 214748361, 'hasbulla'),
(9, 'Lucia', 'Garcia', 'luciagarcia@gmail.com', 231789682, 'lucia'),
(10, 'Jokin', 'Laskurain', 'jokinlaskurain@gmail.com', 123123123, 'jokin'),
(11, 'Aitzol', 'Soto', 'aitzolsoto@gmail.com', 622344578, 'aitzol'),
(12, 'Alain', 'Basterra', '', 0, 'alain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deleted_products`
--

CREATE TABLE `deleted_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deleted_products`
--

INSERT INTO `deleted_products` (`product_id`, `name`, `description`, `price`) VALUES
(3, 'dfsadfasdf', 'asdfasdf', 1234234),
(4, 'dfgsdf', 'sdfgsdgf', 1234),
(1, 'Total Quartz Ineo ECS 5W30 5L', 'Fully synthetic high quality multigrade oil with applicability in modern petrol and diesel engines. This lubricant is denominated \"low saps\" so it is appropriate to use it in vehicles with particulate filter and three-way catalysts. It\'s a long life oil, so the frequency of change extends to 30,000 kilometers.', 9.45),
(2, 'Antifreeze liquid 50% organic G-12 pink', 'Organic direct use G12 antifreeze liquid formulated from ethylene glycol and a specially studied organic technology corrosion inhibitor package to protect the different metals found in the cooling circuit of internal combustion engines, including aluminium and light alloys. 50% organic G-12 antifreeze liquid.', 10.5),
(3, 'Brake Kit, Disc Brake Box, Pad and Disc Kit', 'Element that is part of the car braking system and that provides friction to the brake discs to stop the country.Kit Brakes, Disc Brake Box, Pad and Disc Kit', 67.35),
(4, 'Rain-X 14126 Rain-Rain Washer protection -5°C', 'Usefull product for cleaning windows of the car. Can be used for all type of vehicles.', 8.5),
(5, 'QM cleaner Upholstery cleaner kit', 'QM cleaner Upholstery cleaner kit for Car, Seats, Fabric, Sewer... - Includes 2 QM upholstery 2 microfibers and 1 extra premium brush', 19.99),
(6, 'Maddox Detail - Tire Detailer ', 'Tire Opener, Plastics, Exterior Rubber (500ml)', 9.99),
(13, 'dfgsdfg', 'sldkjfhlskdjlkghsdlkghsdkjghhhhhhhhhhhhhhhhhhhhhhhhhhhhhsldkjfhlskdjlkghsdlkghsdkjghhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1),
(12, 'OwO', 'sldkjfhlskdjlkghsdlkghsdkjghhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1.16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `position` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `surname`, `adress`, `phone_number`, `age`, `salary`, `position`, `password`) VALUES
(1, 'Haritz', 'Otero', 'CALLE LEONARDO PRIETO CASTRO 8, 28040 MADRID ', 943256182, 19, 1300, 'Mechanic', '1'),
(2, 'Alain', 'Basterra', 'CALLE MONTALBAN 1, 28014 MADRID ', 345278345, 21, 1400, 'Mechanic', '2'),
(3, 'Aitzol', 'Soto', 'CARRETERA M-607 2100, 28049 MADRID ', 345234567, 34, 1450, 'Mechanic', '3'),
(4, 'Ruben', 'San Martín', 'PASEO JULIO ROMERO DE TORRES S/N, 28009 MADRID ', 243765978, 27, 1600, 'Cleaner', '4'),
(5, 'Idoia', 'Madariaga', 'CALLE HACIENDA DE PAVONES 146, 28030 MADRID ', 432543654, 36, 1550, 'Security', '5'),
(7, 'Gorka ', 'Elortza', 'CALLE BERENISA 29, 28023 MADRID ', 543654765, 34, 1840, 'Security', '7'),
(8, 'Elena', 'Unzueta', 'CALLE PEDRO JUSTO DORADO DELLMANS 11, 28040 MADRID ', 666434654, 59, 2300, 'Boss', '8');

--
-- Disparadores `employee`
--
DELIMITER $$
CREATE TRIGGER `delete_employees` BEFORE DELETE ON `employee` FOR EACH ROW INSERT INTO old_workers VALUES
(OLD.employee_id,OLD.name,OLD.surname,OLD.position,OLD.phone_number,OLD.age,OLD.salary,OLD.adress)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage`
--

CREATE TABLE `garage` (
  `garage_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `garage`
--

INSERT INTO `garage` (`garage_id`, `size`, `vehicle_type`) VALUES
(1, '6 x 6 x 2.5m', 'Cars'),
(2, '3 x 3 x 2.5m', 'Motorbikes'),
(3, '7 x 7 x 4m', 'Vans');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage_1`
--

CREATE TABLE `garage_1` (
  `Client_ID` varchar(11) NOT NULL,
  `Hours` varchar(10) NOT NULL,
  `session` int(11) NOT NULL,
  `buy` tinyint(4) NOT NULL,
  `week` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage_2`
--

CREATE TABLE `garage_2` (
  `Client_ID` varchar(11) NOT NULL,
  `Hours` varchar(10) NOT NULL,
  `session` int(11) NOT NULL,
  `buy` tinyint(4) NOT NULL,
  `week` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage_3`
--

CREATE TABLE `garage_3` (
  `Client_ID` varchar(11) NOT NULL,
  `Hours` varchar(10) NOT NULL,
  `session` int(11) NOT NULL,
  `buy` tinyint(4) NOT NULL,
  `week` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`name`, `email_address`, `phone_number`, `message`) VALUES
('Alain Basterra', 'alainbasterra@gmail.com', 765454545, 'Proba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `old_workers`
--

CREATE TABLE `old_workers` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `old_workers`
--

INSERT INTO `old_workers` (`employee_id`, `name`, `surname`, `position`, `phone_number`, `age`, `salary`, `address`) VALUES
(6, 'Idoia', 'Mugartegi', 'Security', 645765876, 28, 1800, 'AVENIDA INSTITUCION LIBRE DE ENSEÑANZA 2, 28037 MADRID ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `stock`, `price`, `img`) VALUES
(11, 'UwU', 'sldkjfhlskdjlkghsdlkghsdkjghhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 61, 1.11, '../../../assets/images/products/key-messenger.png');

--
-- Disparadores `products`
--
DELIMITER $$
CREATE TRIGGER `dleted_products` BEFORE DELETE ON `products` FOR EACH ROW INSERT INTO deleted_products VALUES(old.product_id,old.name,old.description,old.price)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renting`
--

CREATE TABLE `renting` (
  `renting_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `week` tinyint(4) NOT NULL,
  `rented_hours` varchar(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `renting`
--

INSERT INTO `renting` (`renting_id`, `client_id`, `garage_id`, `date`, `week`, `rented_hours`, `number`) VALUES
(1, 1, 1, '2022-05-13', 19, '12_2', 7),
(1, 1, 1, '2022-05-13', 19, '8_5', 8),
(2, 2, 1, '2022-05-13', 19, '14_4', 9),
(2, 2, 1, '2022-05-13', 19, '18_6', 10),
(2, 2, 1, '2022-05-13', 20, '18_2', 11),
(2, 2, 1, '2022-05-13', 20, '12_5', 12),
(3, 3, 1, '2022-05-13', 20, '8_4', 13),
(3, 3, 1, '2022-05-13', 20, '16_6', 14),
(3, 3, 1, '2022-05-13', 23, '12_2', 15),
(3, 3, 1, '2022-05-13', 23, '12_3', 16),
(3, 3, 1, '2022-05-13', 23, '12_4', 17),
(4, 4, 1, '2022-05-13', 23, '14_5', 18),
(4, 4, 1, '2022-05-13', 23, '16_6', 19),
(4, 4, 1, '2022-05-13', 28, '12_2', 20),
(4, 4, 1, '2022-05-13', 28, '10_3', 21),
(4, 4, 1, '2022-05-13', 28, '12_4', 22),
(4, 4, 1, '2022-05-13', 28, '14_3', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selling`
--

CREATE TABLE `selling` (
  `selling_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `selling`
--
DELIMITER $$
CREATE TRIGGER `selling_info` AFTER INSERT ON `selling` FOR EACH ROW INSERT INTO selling_info VALUES
(new.client_id,new.product_id,new.amount,new.total_cost,new.date)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selling_info`
--

CREATE TABLE `selling_info` (
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `selling_info`
--

INSERT INTO `selling_info` (`client_id`, `product_id`, `amount`, `total_cost`, `date`) VALUES
(4, 2, 3, 31.5, '2022-01-03'),
(2, 4, 5, 42.5, '2022-01-06'),
(8, 3, 2, 134.7, '2022-01-07'),
(9, 6, 3, 29.97, '2022-01-10'),
(7, 1, 1, 9.45, '2022-01-11'),
(4, 5, 2, 39.98, '2022-01-13'),
(5, 4, 2, 17, '2022-01-17'),
(1, 11, 15, 16.65, '2022-05-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session`
--

CREATE TABLE `session` (
  `session` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `session`
--

INSERT INTO `session` (`session`, `ID`, `Name`, `Date`) VALUES
(15, 0, 'Elena', '2022-05-12'),
(16, 0, 'Elena', '2022-05-12'),
(17, 0, 'Elena', '2022-05-12'),
(18, 0, 'Haritz', '2022-05-12'),
(19, 0, 'Elena', '2022-05-12'),
(20, 1, 'Alain', '2022-05-13'),
(21, 0, 'Haritz', '2022-05-13'),
(22, 0, 'Elena', '2022-05-13'),
(23, 1, 'Alain', '2022-05-13'),
(24, 0, 'Elena', '2022-05-13'),
(25, 2, 'Haritz', '2022-05-13'),
(26, 0, 'Elena', '2022-05-13'),
(27, 0, 'Elena', '2022-05-13'),
(28, 0, 'Elena', '2022-05-13'),
(29, 0, 'Elena', '2022-05-13'),
(30, 8, 'Elena', '2022-05-13'),
(31, 1, 'Alain', '2022-05-13'),
(32, 2, 'Haritz', '2022-05-13'),
(33, 8, 'Elena', '2022-05-13'),
(34, 8, 'Elena', '2022-05-13'),
(35, 8, 'Elena', '2022-05-13'),
(36, 8, 'Elena', '2022-05-13'),
(37, 1, 'Alain', '2022-05-13'),
(38, 1, 'Alain', '2022-05-13'),
(39, 2, 'Haritz', '2022-05-13'),
(40, 3, 'Iker', '2022-05-13'),
(41, 4, 'Ander', '2022-05-13'),
(42, 5, 'Jone', '2022-05-13'),
(43, 8, 'Elena', '2022-05-13'),
(44, 1, 'Alain', '2022-05-13'),
(45, 8, 'Elena', '2022-05-13'),
(46, 1, 'Alain', '2022-05-13'),
(47, 1, 'Alain', '2022-05-13'),
(48, 2, 'name', '2022-05-13'),
(49, 1, 'Haritz', '2022-05-13'),
(50, 8, 'Elena', '2022-05-13'),
(51, 1, 'Alain', '2022-05-13'),
(52, 8, 'Elena', '2022-05-13'),
(53, 1, 'Alain', '2022-05-16'),
(54, 1, 'Alain', '2022-05-16'),
(55, 8, 'Elena', '2022-05-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `working`
--

CREATE TABLE `working` (
  `employee_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `working`
--

INSERT INTO `working` (`employee_id`, `garage_id`) VALUES
(1, 3),
(2, 1),
(3, 2),
(4, 3),
(5, 1),
(7, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indices de la tabla `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`garage_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `renting`
--
ALTER TABLE `renting`
  ADD PRIMARY KEY (`number`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- Indices de la tabla `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`selling_id`,`client_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indices de la tabla `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session`);

--
-- Indices de la tabla `working`
--
ALTER TABLE `working`
  ADD PRIMARY KEY (`employee_id`,`garage_id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `garage`
--
ALTER TABLE `garage`
  MODIFY `garage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `renting`
--
ALTER TABLE `renting`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `session`
--
ALTER TABLE `session`
  MODIFY `session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `renting`
--
ALTER TABLE `renting`
  ADD CONSTRAINT `renting_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `renting_ibfk_2` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`garage_id`);

--
-- Filtros para la tabla `selling`
--
ALTER TABLE `selling`
  ADD CONSTRAINT `selling_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Filtros para la tabla `working`
--
ALTER TABLE `working`
  ADD CONSTRAINT `working_ibfk_2` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`garage_id`),
  ADD CONSTRAINT `working_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
