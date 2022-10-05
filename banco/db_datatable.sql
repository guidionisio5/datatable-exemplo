-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_datatable
CREATE DATABASE IF NOT EXISTS `db_datatable` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_datatable`;

-- Copiando estrutura para tabela db_datatable.tb_alunos
CREATE TABLE IF NOT EXISTS `tb_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_datatable.tb_alunos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_datatable.tb_usuarios
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_datatable.tb_usuarios: ~18 rows (aproximadamente)
INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`, `ativo`, `data_cadastro`) VALUES
	(1, 'João', 'joao@gmail.com', '123', b'0', '2022-09-16 22:31:01'),
	(2, 'Lucas', 'lucas@gmail.com', '123', b'1', '2022-09-20 19:36:19'),
	(3, 'Guilherme', 'gui@gmail.com', '123', b'1', '2022-09-20 19:55:53'),
	(4, 'Kauã', 'kaua@gmail.com', '123', b'1', '2022-09-20 19:57:26'),
	(5, 'Vitor', 'vitor@gmail.com', '123', b'1', '2022-09-20 20:15:25'),
	(6, 'Luana', 'luana@gmail.com', '123', b'1', '2022-09-20 20:56:27'),
	(7, 'Julio', 'julio@gmail.com', '123', b'0', '2022-09-20 20:57:10'),
	(8, 'Izabel', 'izabel@gmail.com', '123', b'1', '2022-09-20 21:20:14'),
	(9, 'Angelo', 'angelo@gmail.com', '123', b'0', '2022-09-21 19:34:33'),
	(10, 'Thiago', 'thiago@gmail.com', '123', b'1', '2022-09-21 19:36:53'),
	(11, 'Matheus Santos', 'mateussantos@gmail.com', '123', b'1', '2022-09-21 19:48:33'),
	(12, 'Jennyfer', 'jennyfer@gmail.com', '123', b'0', '2022-09-21 19:49:37'),
	(13, 'Eros', 'eros@gmail.com', '123', b'0', '2022-09-21 19:50:46'),
	(14, 'Gabriel ', 'gabriel@gmail.com', '123', b'1', '2022-09-21 19:52:47'),
	(15, 'Renata', 'renata@gmail.com', '123', b'1', '2022-09-21 20:57:52'),
	(16, 'Gustavo', 'gustavo@gmail.com', '123', b'1', '2022-09-21 20:58:36'),
	(17, 'Mateus Vinicius', 'mateusvinicius@gmail.com', '123', b'1', '2022-09-21 21:00:04'),
	(18, 'José', 'jose@gmail.com', '123', b'0', '2022-09-21 21:11:49'),
	(28, 'Bruno', 'bruno@gmail.com', '123', b'0', '2022-09-27 21:59:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
