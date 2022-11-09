-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 17-Out-2013 às 05:16
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `painel`
--
CREATE DATABASE IF NOT EXISTS `painel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `painel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `obs` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `painel.pessoa.FK` (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_pessoa`, `obs`) VALUES
(5, 5, 'Concerto fonte do computador'),
(7, 7, '-nero\r\n-winamp\r\n-google earth\r\n-ccleaner'),
(8, 8, 'Pai de Danielle'),
(9, 9, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `pais` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Estado_pais` (`pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`, `pais`) VALUES
(1, 'Acre', 'AC', 1),
(2, 'Alagoas', 'AL', 1),
(3, 'Amazonas', 'AM', 1),
(4, 'Amapá', 'AP', 1),
(5, 'Bahia', 'BA', 1),
(6, 'Ceará', 'CE', 1),
(7, 'Distrito Federal', 'DF', 1),
(8, 'Espírito Santo', 'ES', 1),
(9, 'Goiás', 'GO', 1),
(10, 'Maranhão', 'MA', 1),
(11, 'Minas Gerais', 'MG', 1),
(12, 'Mato Grosso do Sul', 'MS', 1),
(13, 'Mato Grosso', 'MT', 1),
(14, 'Pará', 'PA', 1),
(15, 'Paraíba', 'PB', 1),
(16, 'Pernambuco', 'PE', 1),
(17, 'Piauí', 'PI', 1),
(18, 'Paraná', 'PR', 1),
(19, 'Rio de Janeiro', 'RJ', 1),
(20, 'Rio Grande do Norte', 'RN', 1),
(21, 'Rondônia', 'RO', 1),
(22, 'Roraima', 'RR', 1),
(23, 'Rio Grande do Sul', 'RS', 1),
(24, 'Santa Catarina', 'SC', 1),
(25, 'Sergipe', 'SE', 1),
(26, 'São Paulo', 'SP', 1),
(27, 'Tocantins', 'TO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `nome`, `sigla`) VALUES
(1, 'Brasil', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(22) DEFAULT NULL,
  `celular` varchar(22) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `telefone`, `celular`, `endereco`, `cep`, `cidade`, `estado`) VALUES
(4, 'Luan Poletti', '96270727', '96270727', 'Marques do Herval 0650', '95020260', 'Caxias do Sul', '23'),
(5, 'Margo Froener Novello', '35378009', '81273002', 'Flores da Cunha', '95020260', 'Caxias do Sul', '23'),
(6, 'Marcia Albani', '96150651', '96150651', 'Linha 40', '', 'Caxias do Sul', '23'),
(7, 'Sérgio', '32234265', '91076631', 'Marques do Herval', '95020260', 'Caxias do Sul', '23'),
(8, 'Daniel', '05499645838', '05499645838', 'Perto do postinho descendo a escola joÃ£o bosco', '', 'caxias do sul', '23'),
(9, 'Nivaldo', '99690556', '99690556', '', '', 'Caxias do Sul', '23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_servico`
--

CREATE TABLE IF NOT EXISTS `solicitacao_servico` (
  `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `des_servico` varchar(800) NOT NULL,
  `valor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_solicitacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `solicitacao_servico`
--

INSERT INTO `solicitacao_servico` (`id_solicitacao`, `id_cliente`, `status`, `parcelas`, `des_servico`, `valor`) VALUES
(2, 5, 'fechado', 1, '- Fonte Wise Max: 220W (R$60,00)\r\n- Formatação/Instalação Windows 7 HP(R$60,00)\r\n- Venda de Pendrive Cruzer fit 16GB (R$40,00)', '160,00'),
(3, 7, 'fechado', 1, '- Formatação Notebook HP veinhu\r\n- Instalado windows XP SP3\r\n- resolvido problema com uma atualização do windows com o processo svchost.exe (desabilitando o serviço de Atualização Automatica que consumia 100% da CPU)', '60,00'),
(4, 8, 'fechado', 1, '-Formatação/Instalação netbook Samsung\r\n-Winrar', 'R$ 60,00'),
(5, 9, 'aberto', 1, '-Backup das fotos\r\n-Formatar\r\n-Instalar drive webcam\r\n-Modem Tim', 'R$ 60,00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `painel.pessoa.FK` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
