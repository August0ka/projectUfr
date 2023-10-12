-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2023 às 18:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consult`
--

CREATE TABLE `consult` (
  `id` int(10) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `description` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hour` time(6) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consult`
--

INSERT INTO `consult` (`id`, `doctors_id`, `patient_id`, `description`, `data`, `hour`, `active`) VALUES
(1, 1, 1, 'teste', '2023-10-09', '12:00:00.000000', 0),
(2, 2, 1, 'teste', '2023-10-09', '11:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) NOT NULL,
  `CRM` int(10) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `expertise` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doctors`
--

INSERT INTO `doctors` (`id`, `CRM`, `name`, `email`, `phone`, `expertise`, `active`) VALUES
(1, 90254, 'Marcelo Antunes', 'marcantun@marci.com', '35996811523', 'Pediatra', 1),
(2, 10532, 'Meire Arnaldo', 'meirevane@mail.com', '6698643254', 'Odontologista', 1),
(3, 54236, 'BIZERRO', 'bizerrinho@mail.com', '9963255100', 'ginecologista', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patient`
--

CREATE TABLE `patient` (
  `id` int(10) NOT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `patient`
--

INSERT INTO `patient` (`id`, `CPF`, `name`, `email`, `phone`, `address`, `active`) VALUES
(1, '01236589412', 'Rogerio Marq', 'marqgerio@outk.com', '4596123258', 'R Farias, n° 25, Jd Matriz, Nova Iorque - Mt', 1),
(2, '25423615420', 'Carlos Farias', 'cadfaz@mail.com', '56999613245', 'R Franciline, n° 50, Jd Antonieta, Nova Mutum - MT', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patients` (`patient_id`),
  ADD KEY `fk_doctors` (`doctors_id`);

--
-- Índices para tabela `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `consult`
--
ALTER TABLE `consult`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consult`
--
ALTER TABLE `consult`
  ADD CONSTRAINT `fk_doctors` FOREIGN KEY (`doctors_id`) REFERENCES `doctors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_patients` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
