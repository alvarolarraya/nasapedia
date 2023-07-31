-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2023 a las 14:00:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `IW_pangolin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Planets`
--

CREATE TABLE `Planets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `radius` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Planets`
--

INSERT INTO `Planets` (`id`, `name`, `image`, `description`, `radius`) VALUES
(1, 'Mercury', 'mercurio.jpg', 'Mercury is the planet of the solar system closest to the Sun and the smallest.It is part of the so-called inner planets and lacks natural satellites like Venus.', 0.38),
(2, 'Venus', 'venus.jpg', 'Venus is the second planet in the solar system in order of proximity to the Sun and the third smallest after Mercury and Mars.Along with Mercurius, it lacks natural satellites.It is named in honor of Venus, the Roman goddess of love.', 1),
(3, 'Earth', 'tierra.jpg', 'Earth (from Latin Terra, Roman deity equivalent to Gea, Greek goddess of femininity and fecundity) is a planet of the solar system that revolves around its star — the Sun — in the third inner orbit.', 1),
(4, 'Mars', 'marte.jpg', 'Mars is the fourth largest planet in order of distance from the Sun and the second smallest planet in the solar system, after Mercury.', 0.5),
(5, 'Jupiter', 'jupiter.jpg', 'Jupiter is the largest planet in the solar system and the fifth in the order of distance to the sun. It is a gaseous giant that forms part of the so-called external planets.', 11),
(6, 'Saturn', 'saturno.jpg', 'Saturn is the sixth planet of the solar system counting from the Sun, the second in size and mass after Jupiter and the only one with a system of rings visible from the Earth.', 9.5),
(7, 'Uranus', 'urano.jpg', 'Uranus is the seventh planet in the solar system, the third largest, and the fourth most massive.It is named so in honor of the Greek goddess of the sky Urano, the father of Crono and the grandfather of Zeus.', 4),
(8, 'Neptune', 'neptuno.jpg', 'Neptune is the eighth planet in distance from the Sun and the furthest in the solar system.It is part of the so-called outer planets, and within these, it is one of the ice giants, and is the first to be discovered thanks to mathematical predictions.', 3.9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Satellites`
--

CREATE TABLE `Satellites` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Satellites`
--

INSERT INTO `Satellites` (`id`, `name`, `image`, `description`) VALUES
(1, 'ISS', 'ISS.jpg', 'The International Space Station is a modular space station located in low Earth orbit.It is a multinational collaboration project between the five participating space agencies: NASA, Roscosmos, JAXA, ESA, and the CSA/ASC.'),
(3, 'CENTAURI-3', 'centauri-3.jpg', 'Centauri 3 is a pioneering satellite for Fleet Space Technologies’ planned 140-satellite network for global satellitary connectivity to the Internet of Things (IoT) designed for use in the energy, public services and resource industries.'),
(4, 'Moon', 'luna.jpg', 'The Moon is the only natural satellite of the Earth. With an equatorial diameter of 3474.8 km, it is the fifth largest satellit of the solar system, while in terms of proportional size with respect to its planet is the largest: a quarter of Earth\'s diameter and 1/81 of its mass. It is, in addition, after Io, the second most dense satellit. It lies in synchronous relationship with the Earth, always showing the same face towards the planet. The visible hemisphere is marked by dark lunar seas of volcanic origin between the bright ancient mountains and the prominent astroblems'),
(5, 'NOAA 19', 'noaa-19.jpg', 'NOAA-19, known as NOAA-N\' before launch, is the last of the series of weather satellites of the National Oceanic and Atmospheric Administration of the United States. NOAA-19 was launched on February 6, 2009.'),
(6, 'NOAA 18', 'noaa-18.jpg', 'NOAA-18, also known as NOAA-N before launch, is a series of operational polar orbit weather satellites operated by the National Environmental Satellite Service of the National Oceanic and Atmospheric Administration.'),
(7, 'NOAA 15', 'noaa-15.jpg', 'NOAA-15, also known as NOAA-K before launch, is a polar orbit operating satellite of the series of infrared television observation satellites provided by NASA operated by the National Oceanic and Atmospheric Administration.'),
(8, 'WARP-01', 'warp-01.jpg', 'WARP-01, nicknamed Nichirin, was a 1U-sized CubeSat developed and operated by Warpspace, a new space company based in Tsukuba, Japan. It was launched on February 20, 2021 aboard a Cygnus cargo spacecraft and deployed from the International Space Station on March 14, 2021.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Planets`
--
ALTER TABLE `Planets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Satellites`
--
ALTER TABLE `Satellites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Planets`
--
ALTER TABLE `Planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `Satellites`
--
ALTER TABLE `Satellites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
