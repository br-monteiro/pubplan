-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2016 às 16:36
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
  `nome` varchar(100) NOT NULL COMMENT 'Nome',
  `biografia` text COMMENT 'Biografia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
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
(1, 'Inglês'),
(2, 'Português'),
(3, 'Espanhol'),
(4, 'Francês'),
(5, 'Italiano');

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
  `link` text,
  `idiomas_id` int(11) NOT NULL COMMENT 'Idiomas',
  `categorias_id` int(11) NOT NULL COMMENT 'Categorias',
  `tipos_id` int(11) NOT NULL COMMENT 'Tipo Publicação'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `titulo`, `ano`, `editora`, `edicao`, `isbn`, `sinopse`, `palavras_chave`, `numero_pagias`, `link`, `idiomas_id`, `categorias_id`, `tipos_id`) VALUES
(1, 'Diário de Anne Frank', 1947, 'Record', '1ª Edição', '3131313131211', 'É um livro escrito por Annelies Marie Frank entre 12 de junho de 1942 e 1 de agosto de 1944 durante a Segunda Guerra Mundial. Em 9 de julho 1942', 'Segunda Guerra Mundial', 222, NULL, 2, 3, 2),
(19, 'Economia do acesso', 2016, 'Casa do Código', '1ª Edição', '978-85-5519-186-2', ' A forma de consumir produtos e serviços está mudando. Alguns mercados já se transformaram completamente. Novas empresas nasceram, e outras morreram sem entender o motivo. O consumidor também já acordou. É hora de consumir somente o necessário.\r\n\r\nA tecnologia amparada pelo consumo consciente e pela economia colaborativa criou empresas que não têm uma década e já fazem mais receita do que empresas centenárias. É a transformação das economias tradicionais para a economia do acesso.\r\n\r\nStreaming de vídeo, softwares, bitcoins, crowfunding, fintechs e startups de todos os tipos estão quebrando a hegemonia de grandes empresas através do componente mais flamejante do empreendedorismo: inovação.\r\n\r\n“Que sociedade é esta em que aquele ‘possuir’, que conheci durante 50 anos, passa a perder o sentido? Ter o CD na prateleira não vale mais nada, aliás, só custa. O que interessa é ter acesso à música que quero ouvir. O que vale é o acesso ao benefício, não a posse do produto” - Luciano Pires.\r\n\r\nA Economia do Acesso é um ensaio de como as pessoas e empresas de tecnologia transformam a forma de consumo, seja de produtos ou de serviços.\r\n\r\nAlém disso, é um bom manual para discutir como as novas gerações vão mudar o mundo através da sustentabilidade e do benefício real de cada consumo. ', 'acesso, economia, ti, web', 155, 'https://www.casadocodigo.com.br/products/livro-economia-acesso', 2, 2, 2),
(20, 'Construindo Aplicações Web com PHP e MySQL', 2016, 'Novatec', '2ª Edição', '978-85-7522-529-5', 'A construção de sites e aplicações cresce de forma acelerada na internet e, por trás de grande parte desses projetos, o PHP e o MySQL são utilizados por serem tecnologias muito eficientes e terem sido criados visando este nicho de mercado: aplicações web (intranet e internet).\r\n\r\nCom a capacidade de criar códigos de forma simples e rápida, o PHP é uma linguagem de programação extremamente funcional, com recursos voltados para web e em constante evolução. Por ser uma das tecnologias mais utilizadas em aplicações de internet, diversas bibliotecas e módulos são criados e disponibilizados para uso de programadores todos os dias. Além disso, há outro fator importante: é gratuito e, ao ser integrado com o MySQL, gera um ambiente perfeito e completo para o desenvolvimento de aplicações.\r\n\r\nEste livro traz todos os passos necessários para conhecer e utilizar o PHP e o MySQL por meio de exemplos práticos, partindo do básico, para quem não teve ainda nenhum contato com tais tecnologias, ensinando ao leitor desde a linguagem de programação e a modelagem de banco de dados até seu uso avançado por meio de construção de exemplos, servindo como um guia de referência para programadores e desenvolvedores.\r\n\r\nOs códigos-fonte deste livro são baseados na versão 7 do PHP, incluindo a nova classe PDO para conexão com bancos de dados.', 'Aplicações Web, PHP, MySql', 336, 'http://www.novatec.com.br/livros/aplicacoes-web-php-mysql-2ed/', 2, 2, 2),
(21, 'Aprendendo Padrões de Projeto em Python', 2016, 'Novatec', '1ª Edição', '978-85-7522-523-3', 'Com um foco cada vez maior na otimização dos níveis de arquitetura e design de software, é importante que os arquitetos de software pensem em otimizações na criação de objetos, na estrutura do código e na interação entre objetos nesses níveis. Isso garante que o custo da manutenção de software seja baixo e o código seja facilmente reutilizado ou adaptável a mudanças. Aprendendo padrões de projeto em Python ajudará você a implementar cenários do mundo real com a versão mais recente de Python, a v3.5. Começaremos apresentando os padrões de projeto do ponto de vista de Python. À medida que avançar no livro, você conhecerá os padrões Singleton, Factory e Façade em detalhes. Depois disso, veremos como controlar o acesso a objetos com o padrão Proxy. O livro também inclui os padrões Observer, Command e Compound. Ao chegar ao final desta obra, você terá melhorado suas habilidades profissionais em arquitetura, design e desenvolvimento de software.', 'Python, Patterns, Programação', 168, 'http://www.novatec.com.br/livros/padroes-projeto-python/', 2, 6, 2),
(22, 'Arduino prático', 2014, 'Casa do Código', '1ª Edição', '978-85-5519-216-6', 'Arduino é uma plataforma de prototipagem formada por uma placa eletrônica com um microprocessador e um ambiente de programação integrado. Recentemente, muito se tem discutido sobre seu uso em projetos de tecnologia: o que é possível fazer? Quais projetos criar? Como, de fato, colocar a mão na massa?', 'Arduino, Prática, Depoimento', 213, 'https://www.casadocodigo.com.br/products/livro-arduino-pratico', 2, 8, 2),
(23, 'Introdução ao SEO', 2016, 'Novatec', '1ª Edição', '978-85-7522-527-1', 'Sua introdução rápida e facilmente compreensível ao SEO (Search Engine Optimization, ou Otimização para ferramentas de busca) – uma metodologia obrigatória para melhorar a visibilidade de sites usando diferentes estratégias e técnicas.\n\nCom uma abordagem prática e calculada, este livro ensina técnicas e conceitos de SEO que permitem dominar os aspectos fundamentais da otimização para ferramentas de busca.\n\nIntrodução ao SEO dá o impulso inicial para a sua aquisição de conhecimento usando uma abordagem facilmente compreensível. Adicione-o à sua biblioteca ainda hoje.', 'SEO, Negócio', 176, 'http://www.novatec.com.br/livros/introducao-seo/', 2, 5, 2),
(24, 'Primeiros passos com React', 2016, 'Novatec', '1ª Edição', '978-85-7522-520-2', 'Saia trabalhando de imediato com React: a tecnologia de código aberto do Facebook para construir rapidamente aplicações web sofisticadas. Com este guia prático, o desenvolvedor web Stoyan Stefanov ensina você a construir componentes – os blocos de construção básicos da React – e a organizá-los em aplicações de larga escala, viáveis do ponto de vista da manutenção. Se você tiver familiaridade com a sintaxe básica de JavaScript, estará pronto para começar.\r\n\r\nDepois de entender como React funciona, você construirá uma aplicação personalizada Whinepad completa para ajudar os usuários a classificar vinhos e a guardar anotações. Você aprenderá rapidamente por que alguns desenvolvedores consideram React essencial para o quebra-cabeça que é o desenvolvimento de aplicações web.', 'React, Web, Programação', 248, 'http://www.novatec.com.br/livros/primeiros-passos-com-react/', 2, 1, 2),
(25, 'Definindo Escopo em Projetos de Software', 2015, 'Novatec', '1ª Edição', '978-85-7522-429-8', 'Definindo Escopo em Projetos de Software é uma obra que pretende tratar, de forma clara e direta, a definição de escopo como o fator mais influente no sucesso dos projetos de desenvolvimento de sistemas, uma vez que exerce forte impacto sobre seus custos. Abrange diversas áreas do conhecimento ligadas ao tema, abordando desde questões teóricas como a normatização e a definição das características de engenharia de software, até questões práticas como métodos para coleta de requisitos e ferramentas para desenho e projeto de soluções sistêmicas.', 'Engenharia de Software', 144, '', 2, 7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes_autores`
--

CREATE TABLE `publicacoes_autores` (
  `id` int(11) NOT NULL,
  `autores_id` int(11) NOT NULL,
  `publicacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publicacoes_autores`
--

INSERT INTO `publicacoes_autores` (`id`, `autores_id`, `publicacoes_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(17, 13, 19),
(19, 11, 21),
(20, 6, 22),
(21, 5, 23),
(22, 9, 23),
(23, 4, 24),
(24, 12, 24),
(25, 2, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rankings`
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `publicacoes_id` int(11) NOT NULL,
  `timestamp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rankings`
--

INSERT INTO `rankings` (`id`, `publicacoes_id`, `timestamp`) VALUES
(1, 1, 1477473094),
(2, 19, 1477473334),
(3, 1, 1477474054),
(4, 25, 1477492398),
(5, 25, 1477492493);

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
(1, 'Artigo'),
(2, 'Livro'),
(3, 'Áudio'),
(4, 'Vídeo');

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
-- Indexes for table `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`,`idiomas_id`,`categorias_id`,`tipos_id`),
  ADD KEY `fk_publicacoes_idiomas_idx` (`idiomas_id`),
  ADD KEY `fk_publicacoes_categorias1_idx` (`categorias_id`),
  ADD KEY `fk_publicacoes_tipos1_idx` (`tipos_id`);

--
-- Indexes for table `publicacoes_autores`
--
ALTER TABLE `publicacoes_autores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicacao_autores_autores1_idx` (`autores_id`),
  ADD KEY `fk_publicacacoes_autores_publicacoes1_idx` (`publicacoes_id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`,`publicacoes_id`),
  ADD KEY `fk_rankings_publicacaoes1` (`publicacoes_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `publicacoes_autores`
--
ALTER TABLE `publicacoes_autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `fk_publicacoes_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_idiomas` FOREIGN KEY (`idiomas_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacoes_tipos1` FOREIGN KEY (`tipos_id`) REFERENCES `tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `publicacoes_autores`
--
ALTER TABLE `publicacoes_autores`
  ADD CONSTRAINT `fk_publicacacoes_autores_publicacoes1` FOREIGN KEY (`publicacoes_id`) REFERENCES `publicacoes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacao_autores_autores1` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `fk_rankings_publicacaoes1` FOREIGN KEY (`publicacoes_id`) REFERENCES `publicacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
