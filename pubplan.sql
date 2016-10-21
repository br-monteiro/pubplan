-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Out-2016 às 17:02
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pubplan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth`
--

CREATE TABLE `auth` (
  `id` int(15) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(1) NOT NULL,
  `change_password` int(1) NOT NULL,
  `created_at` int(15) NOT NULL,
  `updated_at` int(15) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `name`, `email`, `level`, `change_password`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Te0pIRsS+dQOamTKKmBSeKsLArTzehawxJgAAtz7iM8=', '$2y$11$WM1sqJ2Rtz1DBep9qNZEEudd4jFvn8nBtu9HACevne41.ubHeCWyS', 'Administrador', 'Uiy8bHEdkAHqyKbZXACOl3JkUsLOTOT+o9wPvon92xg=', 1, 0, 1476973435, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `biografia` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id`, `nome`, `biografia`) VALUES
(1, 'Joaquim Maria Machado de Assis', 'Joaquim Maria Machado de Assis foi um escritor brasileiro, amplamente considerado como o maior nome da literatura nacional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `idiomas`
--

INSERT INTO `idiomas` (`id`, `nome`) VALUES
(1, 'Inglês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacacoes_autores`
--

CREATE TABLE `publicacacoes_autores` (
  `id` int(11) NOT NULL,
  `autores_id` int(11) NOT NULL,
  `publicacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL COMMENT 'Título da Obra',
  `ano` int(4) NOT NULL COMMENT 'Ano',
  `editora` varchar(45) DEFAULT NULL COMMENT 'Editora',
  `edicao` varchar(20) DEFAULT NULL COMMENT 'Edição',
  `isbn` varchar(45) DEFAULT NULL COMMENT 'ISBN',
  `sinopse` text NOT NULL COMMENT 'Sinopse',
  `palavras_chave` varchar(100) NOT NULL COMMENT 'Palavras Chaves',
  `numero_pagias` int(4) NOT NULL COMMENT 'Quantidade de Páginas',
  `idiomas_id` int(11) NOT NULL COMMENT 'Idiomas',
  `categorias_id` int(11) NOT NULL COMMENT 'Categorias',
  `tipos_id` int(11) NOT NULL COMMENT 'Tipo Publicação'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `nome`) VALUES
(1, 'Artigo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicacacoes_autores`
--
ALTER TABLE `publicacacoes_autores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicacao_autores_autores1_idx` (`autores_id`),
  ADD KEY `fk_publicacacoes_autores_publicacoes1_idx` (`publicacoes_id`);

--
-- Indexes for table `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`,`idiomas_id`,`categorias_id`,`tipos_id`),
  ADD KEY `fk_publicacoes_idiomas_idx` (`idiomas_id`),
  ADD KEY `fk_publicacoes_categorias1_idx` (`categorias_id`),
  ADD KEY `fk_publicacoes_tipos1_idx` (`tipos_id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publicacacoes_autores`
--
ALTER TABLE `publicacacoes_autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `publicacacoes_autores`
--
ALTER TABLE `publicacacoes_autores`
  ADD CONSTRAINT `fk_publicacacoes_autores_publicacoes1` FOREIGN KEY (`publicacoes_id`) REFERENCES `publicacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacao_autores_autores1` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `fk_publicacoes_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_idiomas` FOREIGN KEY (`idiomas_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_tipos1` FOREIGN KEY (`tipos_id`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
