-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para face
CREATE DATABASE IF NOT EXISTS `face` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `face`;

-- Copiando estrutura para tabela face.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(18) NOT NULL,
  `razaoSocial` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `datCadCliente` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`),
  KEY `cnpj_2` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela face.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `cnpj`, `razaoSocial`, `endereco`, `cidade`, `uf`, `cep`, `datCadCliente`) VALUES
	(1, '04.819.665/0001-82', 'FACE Digital', 'Rua Guia Lopes, 236', 'Joinville', 'SC', '89218-060', '2022-05-22 22:36:31'),
	(7, '04.055.601/0001-52', 'Becomex', 'Rua Santos Dumont,1000', 'Jaraguá do Sul', 'SC', '88120-000', '2022-05-22 23:30:17');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela face.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricaoServico` varchar(256) NOT NULL,
  `valorHoraServico` decimal(15,0) NOT NULL,
  `datCadServico` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela face.servicos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` (`id`, `descricaoServico`, `valorHoraServico`, `datCadServico`) VALUES
	(1, 'ABC', 150, '2022-05-22 22:36:31'),
	(2, 'xyz', 120, '2022-05-22 22:36:31'),
	(3, 'KTM', 170, '2022-05-22 22:36:31');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;

-- Copiando estrutura para tabela face.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `clienteId` int(5) NOT NULL,
  `servicoId` int(5) NOT NULL,
  `dataVenda` date NOT NULL,
  `horasTrabalhadas` int(5) NOT NULL,
  `valorFaturado` decimal(15,2) NOT NULL,
  `valorCusto` decimal(15,2) NOT NULL,
  `resultadoVenda` decimal(15,2) NOT NULL,
  `datCadVenda` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela face.vendas: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` (`id`, `clienteId`, `servicoId`, `dataVenda`, `horasTrabalhadas`, `valorFaturado`, `valorCusto`, `resultadoVenda`, `datCadVenda`) VALUES
	(1, 1, 1, '2021-06-01', 100, 15000.00, 8000.00, 7000.00, '2022-05-22 22:36:31'),
	(2, 1, 1, '2021-06-02', 53, 8000.00, 6500.00, 1500.00, '2022-05-22 22:36:31'),
	(3, 1, 1, '2021-06-07', 50, 7500.00, 6000.00, 1500.00, '2022-05-22 22:36:31'),
	(4, 1, 1, '2021-06-10', 80, 12000.00, 8000.00, 4000.00, '2022-05-22 22:36:31'),
	(5, 1, 1, '2021-06-14', 36, 5400.00, 5000.00, 400.00, '2022-05-22 22:36:31'),
	(6, 1, 1, '2021-06-15', 9, 1350.00, 1400.00, -50.00, '2022-05-22 22:36:31'),
	(7, 7, 1, '2021-06-02', 333, 50000.00, 45000.00, 5000.00, '2022-05-22 22:36:31'),
	(8, 7, 1, '2021-06-15', 273, 41000.00, 29000.00, 12000.00, '2022-05-22 22:36:31'),
	(9, 1, 2, '2021-06-03', 41, 5000.00, 6500.00, -1500.00, '2022-05-22 22:36:31'),
	(10, 1, 2, '2021-06-04', 29, 3500.00, 1600.00, 1900.00, '2022-05-22 22:36:31'),
	(11, 1, 2, '2021-06-06', 63, 7600.00, 7000.00, 600.00, '2022-05-22 22:36:31'),
	(12, 1, 2, '2021-06-09', 10, 1200.00, 5000.00, -3800.00, '2022-05-22 22:36:31'),
	(13, 1, 2, '2021-06-12', 83, 10000.00, 7500.00, 2500.00, '2022-05-22 22:36:31'),
	(14, 1, 2, '2021-06-13', 8, 1000.00, 650.00, 350.00, '2022-05-22 22:36:31'),
	(15, 7, 2, '2021-06-14', 233, 28000.00, 27000.00, 1000.00, '2022-05-22 22:36:31'),
	(16, 7, 2, '2021-06-16', 250, 30000.00, 30000.00, 0.00, '2022-05-22 22:36:31'),
	(17, 1, 3, '2021-06-05', 14, 2500.00, 3000.00, -500.00, '2022-05-22 22:36:31'),
	(18, 1, 3, '2021-06-08', 35, 6000.00, 500.00, 5500.00, '2022-05-22 22:36:31'),
	(19, 1, 3, '2021-06-11', 64, 11000.00, 8000.00, 3000.00, '2022-05-22 22:36:31'),
	(20, 7, 3, '2021-06-05', 188, 32000.00, 30000.00, 2000.00, '2022-05-22 22:36:31'),
	(21, 7, 3, '2021-06-10', 135, 23000.00, 24000.00, -1000.00, '2022-05-22 22:36:31'),
	(22, 7, 3, '2021-06-12', 147, 25000.00, 22500.00, 2500.00, '2022-05-22 22:36:31');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
