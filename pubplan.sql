-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 23/10/2016 às 22:13
-- Versão do servidor: 5.5.52-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `pubplan`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `name`, `email`, `level`, `change_password`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Te0pIRsS+dQOamTKKmBSeKsLArTzehawxJgAAtz7iM8=', '$2y$11$WM1sqJ2Rtz1DBep9qNZEEudd4jFvn8nBtu9HACevne41.ubHeCWyS', 'Administrador', 'Uiy8bHEdkAHqyKbZXACOl3JkUsLOTOT+o9wPvon92xg=', 1, 0, 1476973435, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL COMMENT 'Nome',
  `biografia` text COMMENT 'Biografia',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Fazendo dump de dados para tabela `autores`
--

INSERT INTO `autores` (`id`, `nome`, `biografia`) VALUES
(1, 'Joaquim Maria Machado de Assis', 'Joaquim Maria Machado de Assis foi um escritor brasileiro, amplamente considerado como o maior nome da literatura nacional'),
(2, 'Edson Monteiro', NULL),
(3, 'Paulo Coelho', 'Grande autor brasileiro'),
(4, 'Ignacio del Valle', NULL),
(5, 'Ildefonso Falcones', NULL),
(6, 'Jennifer Donnelly', NULL),
(7, 'Laurent Gaudé', NULL),
(8, 'Manuel Jorge Marmelo', NULL),
(9, 'Melissa Marr', NULL),
(10, 'Onésimo Teotónio Almeida', NULL),
(11, 'Paolo Giordano', NULL),
(12, 'Rachael King', NULL),
(13, 'Rodrigo Dantas', 'Rodrigo Dantas é empreendedor. Fundador da Vindi, a plataforma de pagamento líder no segmento de serviços e assinaturas no país, também é o criador do Assinaturas Day, o evento oficial para o mercado SaaS e de assinaturas no país. Ajudou milhares de empresas de tecnologia a aderirem modelos de receita recorrente. Rodrigo é um dos principais disseminadores da nova economia no Brasil.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Romance'),
(2, 'Ficção Científica'),
(3, 'Aventura'),
(4, 'Drama'),
(5, 'Biográfico'),
(6, 'Direito'),
(7, 'Saúde'),
(8, 'Ciências Humanas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `idiomas`
--

CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `idiomas`
--

INSERT INTO `idiomas` (`id`, `nome`) VALUES
(1, 'Inglês'),
(2, 'Português'),
(3, 'Espanhol'),
(4, 'Francês'),
(5, 'Italiano');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes`
--

CREATE TABLE IF NOT EXISTS `publicacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL COMMENT 'Título da Obra',
  `ano` int(4) NOT NULL COMMENT 'Ano',
  `editora` varchar(45) DEFAULT NULL COMMENT 'Editora',
  `edicao` varchar(20) DEFAULT NULL COMMENT 'Edição',
  `isbn` varchar(45) DEFAULT NULL COMMENT 'ISBN',
  `sinopse` text NOT NULL COMMENT 'Sinopse',
  `palavras_chave` varchar(100) NOT NULL COMMENT 'Palavras Chaves',
  `numero_pagias` int(4) NOT NULL COMMENT 'Quantidade de Páginas',
  `link` text,
  `idiomas_id` int(11) NOT NULL COMMENT 'Idiomas',
  `categorias_id` int(11) NOT NULL COMMENT 'Categorias',
  `tipos_id` int(11) NOT NULL COMMENT 'Tipo Publicação',
  PRIMARY KEY (`id`,`idiomas_id`,`categorias_id`,`tipos_id`),
  KEY `fk_publicacoes_idiomas_idx` (`idiomas_id`),
  KEY `fk_publicacoes_categorias1_idx` (`categorias_id`),
  KEY `fk_publicacoes_tipos1_idx` (`tipos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Fazendo dump de dados para tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `titulo`, `ano`, `editora`, `edicao`, `isbn`, `sinopse`, `palavras_chave`, `numero_pagias`, `link`, `idiomas_id`, `categorias_id`, `tipos_id`) VALUES
(1, 'Diário de Anne Frank', 1947, 'Record', '1ª Edição', '3131313131211', 'É um livro escrito por Annelies Marie Frank entre 12 de junho de 1942 e 1 de agosto de 1944 durante a Segunda Guerra Mundial. Em 9 de julho 1942', 'Segunda Guerra Mundial', 222, 'https://github.com/Respect/Validation/blob/master/docs/Url.md', 2, 3, 2),
(19, 'Economia do acesso', 2016, 'Casa do Código', '1ª Edição', '978-85-5519-186-2', ' A forma de consumir produtos e serviços está mudando. Alguns mercados já se transformaram completamente. Novas empresas nasceram, e outras morreram sem entender o motivo. O consumidor também já acordou. É hora de consumir somente o necessário.\r\n\r\nA tecnologia amparada pelo consumo consciente e pela economia colaborativa criou empresas que não têm uma década e já fazem mais receita do que empresas centenárias. É a transformação das economias tradicionais para a economia do acesso.\r\n\r\nStreaming de vídeo, softwares, bitcoins, crowfunding, fintechs e startups de todos os tipos estão quebrando a hegemonia de grandes empresas através do componente mais flamejante do empreendedorismo: inovação.\r\n\r\n“Que sociedade é esta em que aquele ‘possuir’, que conheci durante 50 anos, passa a perder o sentido? Ter o CD na prateleira não vale mais nada, aliás, só custa. O que interessa é ter acesso à música que quero ouvir. O que vale é o acesso ao benefício, não a posse do produto” - Luciano Pires.\r\n\r\nA Economia do Acesso é um ensaio de como as pessoas e empresas de tecnologia transformam a forma de consumo, seja de produtos ou de serviços.\r\n\r\nAlém disso, é um bom manual para discutir como as novas gerações vão mudar o mundo através da sustentabilidade e do benefício real de cada consumo. ', 'acesso, economia, ti, web', 155, 'https://www.casadocodigo.com.br/products/livro-economia-acesso', 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes_autores`
--

CREATE TABLE IF NOT EXISTS `publicacoes_autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autores_id` int(11) NOT NULL,
  `publicacoes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicacao_autores_autores1_idx` (`autores_id`),
  KEY `fk_publicacacoes_autores_publicacoes1_idx` (`publicacoes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Fazendo dump de dados para tabela `publicacoes_autores`
--

INSERT INTO `publicacoes_autores` (`id`, `autores_id`, `publicacoes_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(17, 13, 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rankings`
--

CREATE TABLE IF NOT EXISTS `rankings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publicacoes_id` int(11) NOT NULL,
  `timestamp` int(15) NOT NULL,
  PRIMARY KEY (`id`,`publicacoes_id`),
  KEY `fk_rankings_publicacaoes1` (`publicacoes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `tipos`
--

INSERT INTO `tipos` (`id`, `nome`) VALUES
(1, 'Artigo'),
(2, 'Livro'),
(3, 'Áudio'),
(4, 'Vídeo');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `fk_publicacoes_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_idiomas` FOREIGN KEY (`idiomas_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_tipos1` FOREIGN KEY (`tipos_id`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `publicacoes_autores`
--
ALTER TABLE `publicacoes_autores`
  ADD CONSTRAINT `fk_publicacacoes_autores_publicacoes1` FOREIGN KEY (`publicacoes_id`) REFERENCES `publicacoes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacao_autores_autores1` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `fk_rankings_publicacaoes1` FOREIGN KEY (`publicacoes_id`) REFERENCES `publicacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
