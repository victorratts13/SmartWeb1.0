-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/10/2019 às 20:47
-- Versão do servidor: 10.1.37-MariaDB-0+deb9u1
-- Versão do PHP: 7.0.33-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `SmartDatabase`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `user` varchar(2000) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `pass` varchar(2000) NOT NULL,
  `contacts` varchar(2000) NOT NULL,
  `privilege` varchar(2000) NOT NULL,
  `groups` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `user`, `email`, `pass`, `contacts`, `privilege`, `groups`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '588e57b852a16b297af73ae818065474', '//', '0', '//');

-- --------------------------------------------------------

--
-- Estrutura para tabela `groupSchema`
--

CREATE TABLE `groupSchema` (
  `user` varchar(2000) NOT NULL,
  `mensage` varchar(2000) NOT NULL,
  `dataTime` varchar(2000) NOT NULL,
  `mensageId` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `privateMensages`
--

CREATE TABLE `privateMensages` (
  `fromUser` varchar(2000) NOT NULL,
  `toUser` varchar(2000) NOT NULL,
  `mensage` varchar(2000) NOT NULL,
  `dataTime` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `sName` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `coutry` varchar(1000) NOT NULL,
  `onl` varchar(1000) NOT NULL,
  `groups` varchar(1000) NOT NULL,
  `privilegy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
