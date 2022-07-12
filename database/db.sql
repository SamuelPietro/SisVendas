-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2022 às 23:44
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
-- Banco de dados: `face`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(5) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(28) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `datCadCliente` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `razaoSocial`, `cnpj`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `datCadCliente`) VALUES
(1, 'SS Host Ltda', '25.269.387/0001-07', '33170-010', 'Avenida Professor Djalma Guimarães', '1623', '', 'Chácaras Santa Inês (São Benedito)', 'Santa Luzia', 'MG', '2022-07-12 21:19:33'),
(3, 'Empresa MG', '12.345.387/0001-05', '31170-050', 'Rua Paulo Nunes Vieira', '100', '', 'Cidade Nova', 'Belo Horizonte', 'MG', '2022-07-12 21:19:33'),
(4, 'Empresa SP', '45.345.123/0001-45', '11070-010', 'Rua Alfredo Albertini', '200', 'até 199/200', 'Marapé', 'Santos', 'SP', '2022-07-12 21:19:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(5) NOT NULL,
  `descricaoServico` varchar(256) NOT NULL,
  `valorHoraServico` float(13,2) NOT NULL,
  `datCadServico` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricaoServico`, `valorHoraServico`, `datCadServico`) VALUES
(1, 'ABC', 150.00, '2022-07-12 21:19:33'),
(2, 'XYZ', 55.00, '2022-07-12 21:19:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(5) NOT NULL,
  `clienteId` int(5) NOT NULL,
  `servicoId` int(5) NOT NULL,
  `dataVenda` date NOT NULL,
  `horasTrabalhadas` int(5) NOT NULL,
  `valorFaturado` decimal(15,2) NOT NULL,
  `valorCusto` decimal(15,2) NOT NULL,
  `resultadoVenda` decimal(15,2) NOT NULL,
  `datCadVenda` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `clienteId`, `servicoId`, `dataVenda`, `horasTrabalhadas`, `valorFaturado`, `valorCusto`, `resultadoVenda`, `datCadVenda`) VALUES
(1, 1, 1, '2021-06-01', 100, '15000.00', '8000.00', '7000.00', '2022-07-12 21:19:33'),
(2, 1, 2, '2021-06-02', 200, '11000.00', '8000.00', '3000.00', '2022-07-12 21:19:33'),
(3, 3, 2, '2021-06-03', 200, '15000.00', '8000.00', '7000.00', '2022-07-12 21:19:33'),
(4, 4, 1, '2021-06-04', 100, '10000.00', '8000.00', '2000.00', '2022-07-12 21:19:33');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD KEY `cnpj_2` (`cnpj`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
