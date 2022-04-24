-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2020 às 19:59
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sysmedical`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `descricao`, `valor`) VALUES
(1, 'Consulta Pediatra', '120.00'),
(2, 'Exame', '60.00'),
(3, 'Cirúrgia Estética', '2500.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Balconista'),
(2, 'Caixa'),
(3, 'Faxineira'),
(4, 'Enfermeira'),
(7, 'Recepcionista'),
(8, 'Tesoureiro'),
(10, 'MÃ©dico'),
(11, 'FarmÃ¡ceutico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas`
--

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamadas`
--

INSERT INTO `chamadas` (`id`, `paciente`, `consultorio`, `status`) VALUES
(1, 'Pablo Silva', '105', 'Aguardando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `paciente` int(11) NOT NULL,
  `tipo_atendimento` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pgto_confirmado` varchar(5) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `atestado` int(11) DEFAULT NULL,
  `prescricao` varchar(10) DEFAULT NULL,
  `receita` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `data`, `hora`, `paciente`, `tipo_atendimento`, `medico`, `valor`, `pgto_confirmado`, `status`, `atestado`, `prescricao`, `receita`) VALUES
(1, '0000-00-00', '00:00:00', 2, 3, 0, '2500.00', 'Sim', '', NULL, NULL, NULL),
(2, '2020-03-17', '12:00:00', 1, 1, 2, '120.00', 'Sim', '', NULL, NULL, NULL),
(3, '2020-03-17', '18:00:00', 2, 2, 2, '60.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(4, '2020-03-17', '19:00:00', 2, 1, 2, '120.00', 'Sim', '', NULL, NULL, NULL),
(5, '2020-03-19', '15:00:00', 4, 1, 2, '120.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(6, '2020-03-19', '12:00:00', 3, 2, 2, '60.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(7, '2020-03-19', '14:00:00', 4, 1, 2, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(8, '2020-03-19', '16:00:00', 4, 2, 2, '60.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(9, '2020-03-19', '08:00:00', 2, 1, 2, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(10, '2020-03-19', '16:00:00', 2, 2, 1, '60.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(11, '2020-03-19', '11:00:00', 1, 1, 1, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(12, '2020-03-19', '18:00:00', 3, 1, 1, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(13, '2020-03-19', '11:00:00', 3, 2, 2, '60.00', 'NÃ£o', NULL, NULL, NULL, NULL),
(14, '2020-03-23', '15:00:00', 1, 3, 2, '2500.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(15, '2020-03-23', '12:00:00', 3, 1, 1, '120.00', 'Sim', 'Finalizada', 0, NULL, NULL),
(16, '2020-03-23', '15:00:00', 4, 1, 1, '120.00', 'Sim', 'Finalizada', 0, NULL, NULL),
(17, '2020-03-23', '11:00:00', 2, 1, 2, '120.00', 'Sim', 'Aguardando', 6, NULL, NULL),
(18, '2020-03-23', '14:00:00', 2, 3, 2, '2500.00', 'Não', NULL, NULL, NULL, NULL),
(19, '2020-03-23', '13:00:00', 4, 3, 2, '2500.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(20, '2020-03-23', '13:00:00', 4, 1, 1, '120.00', 'Sim', 'Consultando', 0, NULL, NULL),
(21, '2020-03-23', '18:00:00', 1, 1, 1, '120.00', 'Sim', 'Aguardando', 6, NULL, NULL),
(22, '2020-03-24', '14:00:00', 1, 1, 2, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(23, '2020-03-24', '16:00:00', 2, 2, 2, '60.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(24, '2020-03-24', '12:00:00', 3, 3, 1, '2500.00', 'Sim', 'Aguardando', 3, NULL, 'Sim'),
(25, '2020-03-24', '11:00:00', 4, 1, 1, '120.00', 'Sim', 'Finalizada', 6, 'Sim', 'Sim'),
(26, '2020-03-25', '13:00:00', 2, 1, 1, '120.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(27, '2020-03-25', '11:00:00', 4, 1, 1, '120.00', 'Sim', 'Finalizada', NULL, NULL, NULL),
(28, '2020-03-25', '15:00:00', 1, 1, 1, '120.00', 'Sim', 'Consultando', NULL, NULL, NULL),
(29, '2020-03-25', '19:00:00', 1, 1, 1, '120.00', 'Não', NULL, NULL, NULL, NULL),
(30, '2020-03-25', '15:00:00', 2, 1, 2, '120.00', 'Sim', 'Aguardando', NULL, NULL, NULL),
(31, '2020-03-25', '14:00:00', 1, 3, 1, '2500.00', 'Sim', 'Aguardando', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `valor`, `vencimento`, `pagamento`, `pago`, `funcionario`, `foto`) VALUES
(1, 'Luz', '980.00', '2020-03-17', '2020-03-17', 'Sim', '000.000.000-00', 'conta2.jpg'),
(2, 'Agua', '680.00', '2020-03-17', '2020-03-17', 'Sim', '000.000.000-00', 'conta3.jpg'),
(3, 'Conta de Telefone', '690.00', '2020-03-18', NULL, 'Não', '000.000.000-00', 'conta.jpg'),
(5, 'Telefone', '1200.00', '2020-03-17', '2020-03-17', 'Sim', '000.000.000-00', 'conta.jpg'),
(6, 'Vidraçaria', '1800.00', '2020-03-17', NULL, 'Não', '000.000.000-00', 'sem-foto.png'),
(7, 'Compra de Cadeiras', '1200.00', '2020-03-17', NULL, 'Não', '000.000.000-00', 'conta2.jpg'),
(8, 'Compra de Remédios', '16.00', '2020-03-18', '2020-03-18', 'Sim', '000.000.000-00', 'sem-foto.png'),
(9, 'Compra de Remédios', '24.00', '2020-03-18', NULL, 'Não', '999.999.999-80', 'sem-foto.png'),
(10, 'Compra de Remédios', '16.00', '2020-03-18', NULL, 'Não', '777.777.777-80', 'sem-foto.png'),
(11, 'Compra de Materiais', '400.00', '2020-03-19', '2020-03-19', 'Sim', '000.000.000-00', 'sem-foto.png'),
(13, 'Compra de RemÃ©dios', '30.00', '2020-03-19', '2020-03-19', 'Sim', '000.000.000-00', 'sem-foto.png'),
(14, 'Pagamento Eletrecista', '400.00', '2020-03-19', '2020-03-19', 'Sim', '000.000.000-00', 'sem-foto.png'),
(15, 'Compra de RemÃ©dios', '18.00', '2020-03-19', NULL, 'NÃ£o', '777.777.777-80', 'sem-foto.png'),
(16, 'Luz', '980.00', '2020-03-25', NULL, 'Não', '000.000.000-00', 'sem-foto.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `descricao`, `valor`, `vencimento`, `data_baixa`, `forma_pgto`, `tipo_pgto`, `tesoureiro`, `id_consulta`) VALUES
(1, '3', '2500.00', '2020-03-17', '2020-03-17', 'Dinheiro', 'A Vista', '000.000.000-00', 1),
(2, '1', '120.00', '2020-03-17', '2020-03-17', 'Dinheiro', 'A Vista', '000.000.000-00', 2),
(3, '2', '60.00', '2020-03-17', '2020-03-17', 'Convênio', 'Unimed', '000.000.000-00', 3),
(4, '1', '120.00', '2020-03-17', '2020-03-17', 'Convênio', 'Unimed', '000.000.000-00', 4),
(5, '1', '120.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 5),
(6, '2', '60.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 6),
(7, '1', '120.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 7),
(8, '2', '60.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 8),
(9, '1', '120.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 9),
(10, '2', '60.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 10),
(11, '1', '120.00', '2020-03-19', '2020-03-19', 'Dinheiro', 'A Vista', '000.000.000-00', 11),
(12, '1', '120.00', '2020-03-19', '2020-03-19', 'ConvÃªnio', 'Unimed', '000.000.000-00', 12),
(13, '2', '60.00', '2020-03-19', NULL, NULL, NULL, NULL, 13),
(14, '3', '2500.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'A Vista', '000.000.000-00', 14),
(15, '1', '120.00', '2020-03-23', '2020-03-23', 'Convênio', 'Unimed', '000.000.000-00', 15),
(16, '1', '120.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'A Vista', '000.000.000-00', 16),
(17, '1', '120.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'A Vista', '000.000.000-00', 17),
(18, '3', '2500.00', '2020-03-23', NULL, NULL, NULL, NULL, 18),
(19, '3', '2500.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'A Vista', '000.000.000-00', 19),
(20, '1', '120.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'A Vista', '000.000.000-00', 20),
(21, '1', '120.00', '2020-03-23', '2020-03-23', 'Dinheiro', 'Unimed', '000.000.000-00', 21),
(22, '1', '120.00', '2020-03-24', '2020-03-24', 'Dinheiro', 'A Vista', '000.000.000-00', 22),
(23, '2', '60.00', '2020-03-24', '2020-03-24', 'Dinheiro', 'A Vista', '000.000.000-00', 23),
(24, '3', '2500.00', '2020-03-24', '2020-03-24', 'Dinheiro', 'A Vista', '000.000.000-00', 24),
(25, '1', '120.00', '2020-03-24', '2020-03-24', 'Dinheiro', 'A Vista', '000.000.000-00', 25),
(26, '1', '120.00', '2020-03-25', '2020-03-25', 'Dinheiro', 'A Vista', '000.000.000-00', 26),
(27, '1', '120.00', '2020-03-25', '2020-03-25', 'Dinheiro', 'A Vista', '000.000.000-00', 27),
(28, '1', '120.00', '2020-03-25', '2020-03-25', 'Convênio', 'Unimed', '000.000.000-00', 28),
(29, '1', '120.00', '2020-03-25', NULL, NULL, NULL, NULL, 29),
(30, '1', '120.00', '2020-03-25', '2020-03-25', 'Dinheiro', 'A Vista', '000.000.000-00', 30),
(31, '3', '2500.00', '2020-03-25', '2020-03-25', 'Dinheiro', 'A Vista', '000.000.000-00', 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas_remedios`
--

CREATE TABLE `entradas_remedios` (
  `id` int(11) NOT NULL,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entradas_remedios`
--

INSERT INTO `entradas_remedios` (`id`, `remedio`, `quantidade`, `valor`, `fornecedor`, `farmaceutico`, `nome_remedio`, `data`) VALUES
(8, 1, 3, '3.00', 2, '777.777.777-80', 'Dipirona Líquida', '2020-03-18'),
(9, 2, 4, '4.00', 2, '777.777.777-80', 'Dipirona Comprimido', '2020-03-18'),
(10, 2, 4, '4.00', 2, '777.777.777-80', 'Dipirona Comprimido', '2020-03-18'),
(11, 2, 12, '2.00', 2, '999.999.999-80', 'Dipirona Comprimido', '2020-03-18'),
(12, 1, 8, '2.00', 2, '777.777.777-80', 'Dipirona Líquida', '2020-03-18'),
(13, 4, 6, '5.00', 2, '777.777.777-80', 'Aspirina', '2020-03-19'),
(14, 4, 6, '3.00', 2, '777.777.777-80', 'Aspirina', '2020-03-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especializacoes`
--

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especializacoes`
--

INSERT INTO `especializacoes` (`id`, `nome`) VALUES
(1, 'Pediatra'),
(3, 'Ortopedista'),
(4, 'Clínico Geral'),
(5, 'Cirúrgião');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `telefone`, `email`, `remedios`) VALUES
(2, 'Matheus Silva', '(33) 33333-3333', 'mateus@hotmail.com', 'Dipirona, Aspirina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `telefone`, `email`, `cargo`) VALUES
(1, 'Paula Campos', '333.333.333-33', '(33) 33333-3333', 'paula@hotmail.com', 'Medico'),
(2, 'Marcia Silva', '555.555.555-55', '(55) 55555-5555', 'marcia@hotmail.com', 'Medico'),
(3, 'Marcos Silva', '444.444.444-44', '(44) 44444-4444', 'marcos@hotmail.com', 'Recepcionista'),
(4, 'Patricia Carla', '999.999.999-99', '(99) 99999-9999', 'patricia@hotmail.com', 'Recepcionista'),
(5, 'Kamila Silva', '555.555.555-52', '(66) 66666-6666', 'kamila@hotmail.com', 'Tesoureiro'),
(6, 'Pedro Freitas', '000.000.000-00', '(88) 88888-8888', 'tesoureiro@hotmail.com', 'Tesoureiro'),
(10, 'Thiago Paulo', '444.445.666-66', '(66) 66666-6666', 'thiago@hotmail.com', 'Balconista'),
(11, 'Marcela Santos', '544.545.445-45', '(55) 55555-5555', 'marcelas@hotmail.com', 'Enfermeira'),
(12, 'Patricia Silva', '245.545.454-54', '(45) 45454-5454', 'pat@hotmail.com', 'Caixa'),
(13, 'Antonieta', '222.222.222-26', '(55) 55555-5555', 'anton@hotmail.com', 'Faxineira'),
(17, 'Mauro Santos', '999.999.999-80', '(55) 55555-5555', 'mauro@hotmail.com', 'Farmáceutico'),
(18, 'Gabriel Silva', '777.777.777-80', '(33) 33333-3344', 'gabriel@hotmail.com', 'FarmÃ¡ceutico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `consultorio` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `cpf`, `telefone`, `email`, `turno`, `consultorio`) VALUES
(1, 'Paula Campos', 5, 'MG4589941', '333.333.333-33', '(33) 33333-3333', 'paula@hotmail.com', 'Manhã', '105'),
(2, 'Marcia Silva', 3, 'MG855454', '555.555.555-55', '(55) 55555-5555', 'marcia@hotmail.com', 'Tarde', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `valor`, `tesoureiro`, `data`, `id_movimento`) VALUES
(1, 'Entrada', 'Consulta', '2500.00', '000.000.000-00', '2020-03-17', 1),
(2, 'Entrada', 'Consulta', '60.00', '000.000.000-00', '2020-03-17', 3),
(6, 'Saída', 'Pagamento Conta', '1800.00', '000.000.000-00', '2020-03-17', 6),
(7, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-17', 4),
(8, 'Saída', 'Pagamento Conta', '1200.00', '000.000.000-00', '2020-03-17', 7),
(9, 'Saída', 'Pgto Funcionário', '500.00', '000.000.000-00', '2020-03-17', 7),
(10, 'Saída', 'Pagamento Conta', '1200.00', '000.000.000-00', '2020-03-17', 5),
(11, 'Saída', 'Pagamento Conta', '16.00', '000.000.000-00', '2020-03-18', 8),
(12, 'SaÃ­da', 'Pagamento Conta', '400.00', '000.000.000-00', '2020-03-19', 11),
(13, 'Entrada', 'Consulta', '60.00', '000.000.000-00', '2020-03-19', 6),
(14, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-19', 5),
(15, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-19', 12),
(16, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-19', 11),
(17, 'Entrada', 'Consulta', '60.00', '000.000.000-00', '2020-03-19', 10),
(18, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-19', 9),
(19, 'Entrada', 'Consulta', '60.00', '000.000.000-00', '2020-03-19', 8),
(20, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-19', 7),
(21, 'SaÃ­da', 'Pagamento Conta', '400.00', '000.000.000-00', '2020-03-19', 14),
(22, 'SaÃ­da', 'Pagamento Conta', '30.00', '000.000.000-00', '2020-03-19', 13),
(23, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-23', 16),
(24, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-23', 15),
(25, 'Entrada', 'Consulta', '2500.00', '000.000.000-00', '2020-03-23', 14),
(26, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-23', 17),
(27, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-23', 21),
(28, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-23', 20),
(29, 'Entrada', 'Consulta', '2500.00', '000.000.000-00', '2020-03-23', 19),
(30, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-24', 25),
(31, 'Entrada', 'Consulta', '2500.00', '000.000.000-00', '2020-03-24', 24),
(32, 'Entrada', 'Consulta', '60.00', '000.000.000-00', '2020-03-24', 23),
(33, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-24', 22),
(34, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-25', 28),
(35, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-25', 27),
(36, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-25', 26),
(37, 'Entrada', 'Consulta', '120.00', '000.000.000-00', '2020-03-25', 30),
(38, 'Entrada', 'Consulta', '2500.00', '000.000.000-00', '2020-03-25', 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `data_nasc` date NOT NULL,
  `idade` int(11) NOT NULL,
  `civil` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `obs` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `rg`, `telefone`, `email`, `data_nasc`, `idade`, `civil`, `sexo`, `endereco`, `obs`) VALUES
(1, 'Pablo Silva', '456.666.666-66', 'MG45555555', '(33) 33333-3333', 'pablo@hotmail.com', '2018-02-14', 2, 'Solteiro', 'Feminino', 'Rua A', 'Diabético'),
(2, 'Hugo Vasconcelos', '023.555.466-94', 'MG45555655', '(99) 99999-9999', 'hugo@hotmail.com', '2018-02-14', 2, 'Solteiro', 'Masculino', 'Rua A', 'Saúde Normal'),
(3, 'MaurÃ­cio Silva Santos', '123.456.788-88', 'MG 102459872', '(22) 22222-2222', 'mauri@hotmail.com', '1980-02-20', 40, 'Solteiro', 'Masculino', 'Rua Almeida Campos 150', 'Tem DiabÃ©ts, Fez duas cirÃºrgias cardÃ­acas, atualmente apressenta um quadro normal, sem queixas de dores! Na ultima consulta paciente queixou de dores na cabeça.'),
(4, 'Paloma Silva Ribeiro', '456.889.487-88', 'MG 102459876', '(33) 33333-3333', 'paloma@hotmail.com', '1985-02-20', 35, 'Solteiro', 'Feminino', 'Rua Almeida Campos 150', 'Apresenta um bom estado de saÃºde!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `funcionario`, `valor`, `tesoureiro`, `data`, `nome_funcionario`) VALUES
(3, '245.545.454-54', '1500.00', '000.000.000-00', '2020-03-18', 'Patricia Silva'),
(4, '544.545.445-45', '2500.00', '000.000.000-00', '2020-03-17', 'Marcela Santos'),
(5, '333.333.333-33', '20000.00', '000.000.000-00', '2020-03-14', 'Paula Campos'),
(7, '000.000.000-00', '500.00', '000.000.000-00', '2020-03-17', 'Pedro Freitas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prescricao`
--

INSERT INTO `prescricao` (`id`, `id_consulta`, `item`, `remedio`) VALUES
(1, 15, 1, 'Dipirona Liquida'),
(3, 15, 3, 'Outro RemÃ©dio'),
(4, 15, 4, 'Teste'),
(5, 15, 5, 'testes'),
(6, 15, 6, 'testess'),
(7, 15, 7, 'aaa'),
(8, 25, 1, 'Dipirona'),
(18, 21, 1, 'Dipirona'),
(19, 25, 2, 'Aspirina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `id_consulta`, `item`, `remedio`) VALUES
(1, 25, 1, 'Dipirona Liquida 200 ML dsfdaxxx'),
(3, 25, 2, 'Soro xxxxxxxxx'),
(4, 24, 1, 'RemÃ©dio do Item 1 da Receita'),
(5, 24, 2, 'RemÃ©dio do Item 2 da Receita'),
(7, 24, 3, 'RemÃ©dio do Item 3 da Receita'),
(8, 25, 3, 'RemÃ©dio X ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recepcionistas`
--

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recepcionistas`
--

INSERT INTO `recepcionistas` (`id`, `nome`, `cpf`, `telefone`, `email`, `turno`) VALUES
(1, 'Marcos Silva', '444.444.444-44', '(44) 44444-4444', 'marcos@hotmail.com', 'Tarde'),
(2, 'Patricia Carla', '999.999.999-99', '(99) 99999-9999', 'patricia@hotmail.com', 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedios`
--

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `remedios`
--

INSERT INTO `remedios` (`id`, `nome`, `descricao`, `estoque`) VALUES
(2, 'Dipirona Comprimido', '25 Comprimidos', 17),
(4, 'Aspirina', '13 Capsulas', 9),
(5, 'Dipirona LÃ­quida', '200 ML', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas_remedios`
--

CREATE TABLE `saidas_remedios` (
  `id` int(11) NOT NULL,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `saidas_remedios`
--

INSERT INTO `saidas_remedios` (`id`, `remedio`, `quantidade`, `funcionario`, `farmaceutico`, `nome_remedio`, `data`) VALUES
(1, 2, 1, 11, '777.777.777-80', 'Dipirona Comprimido', '2020-03-18'),
(3, 4, 3, 11, '777.777.777-80', 'Aspirina', '2020-03-19'),
(4, 2, 5, 11, '777.777.777-80', 'Dipirona Comprimido', '2020-03-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tesoureiros`
--

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tesoureiros`
--

INSERT INTO `tesoureiros` (`id`, `nome`, `cpf`, `telefone`, `email`, `turno`) VALUES
(1, 'Kamila Silva', '555.555.555-52', '(66) 66666-6666', 'kamila@hotmail.com', 'Manhã'),
(2, 'Pedro Freitas', '000.000.000-00', '(88) 88888-8888', 'tesoureiro@hotmail.com', 'Manhã');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `senha_original`, `nivel`) VALUES
(11, 'Hugo Vasconcelos', 'contato@hugocursos.com.br', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(43, 'Paula Campos', 'paula@hotmail.com', 'd86641a4189b19defacd72ed661d6a88', '33333333333', 'Medico'),
(44, 'Marcia Silva', 'marcia@hotmail.com', '9079b6ee1d5ca04ab00e44e877a222ee', '55555555555', 'Medico'),
(45, 'Marcos Silva', 'marcos@hotmail.com', 'da9d3427a781fc66847d855ed67c7ae7', '44444444444', 'Recepcionista'),
(46, 'Patricia Carla', 'patricia@hotmail.com', '473a9b0f3477d9422fe57bfae5cdf290', '99999999999', 'Recepcionista'),
(47, 'Kamila Silva', 'kamila@hotmail.com', '0b77553896d72e86d1816efa903e9e96', '55555555552', 'Tesoureiro'),
(48, 'Pedro Freitas', 'tesoureiro@hotmail.com', '645a8aca5a5b84527c57ee2f153f1946', '00000000000', 'Tesoureiro'),
(51, 'Mauro Santos', 'mauro@hotmail.com', '50a05d3e1fe1ab80905f1ebf4b69dcfe', '99999999980', 'Farmáceutico'),
(52, 'Gabriel Silva', 'gabriel@hotmail.com', 'f50fc87845a98fe31ae10920065cbc0c', '77777777780', 'FarmÃ¡ceutico'),
(54, 'Tela', 'tela@tela', 'c6f057b86584942e415435ffb1fa93d4', '000', 'Tela');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chamadas`
--
ALTER TABLE `chamadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `especializacoes`
--
ALTER TABLE `especializacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `remedios`
--
ALTER TABLE `remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `chamadas`
--
ALTER TABLE `chamadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `entradas_remedios`
--
ALTER TABLE `entradas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `especializacoes`
--
ALTER TABLE `especializacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `recepcionistas`
--
ALTER TABLE `recepcionistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `remedios`
--
ALTER TABLE `remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `saidas_remedios`
--
ALTER TABLE `saidas_remedios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
