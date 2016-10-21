-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2016 às 18:41
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(15) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(1) NOT NULL,
  `change_password` int(1) NOT NULL,
  `created_at` int(15) NOT NULL,
  `updated_at` int(15) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `name`, `email`, `level`, `change_password`, `created_at`, `updated_at`, `active`) VALUES
(1, 'OFh+gRU0QWHuKIrIeUZGEuHJZN0XFUeKkbkUOoaRG3k=', '$2y$11$1G7W/3F6KPajx9m8WVAZduGXTgDi8Vj1ZBu.4WY84QbW3mDiIIMKm', 'Admistrador', 'I/0HJ2HOQ/dfxYGCaIA3Sg+D6/mLgtKCbOtO8l1q1Z0=', 1, 1, 1445514631, 1465749259, 1),
(2, 'DbW5gO1WyKCG9Xa+2zEYb2WMLcft3XyqMgrpbZ4/pN0=', '$2y$11$gvBqfS45HlesqqZbUdHboOjyAlQi02PWQSQV21XHDV40qtH9ZiF0G', 'Teste', 'ju88y9sNp3QjuhlVctz/nzt1I5sbIoyzK1bgg4H3arU=', 2, 1, 1465749313, 1465749421, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
