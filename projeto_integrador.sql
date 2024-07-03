-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2024 às 02:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_integrador`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `projeto_integrador` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projeto_integrador`;
--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `ID` int(11) NOT NULL,
  `Comprador` char(20) NOT NULL,
  `Veiculo` char(100) NOT NULL,
  `DataInicial` date NOT NULL,
  `DataDeDevolucao` date NOT NULL,
  `PrecoFinal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoeslogin`
--

CREATE TABLE `informacoeslogin` (
  `Nome` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `CPF` varchar(50) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `DataDeNascimento` date NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `informacoeslogin`
--

INSERT INTO `informacoeslogin` (`Nome`, `Sobrenome`, `CPF`, `Telefone`, `Email`, `Senha`, `DataDeNascimento`, `Cargo`) VALUES
('Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', '0000-00-00', 'Funcionário');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoesveiculos`
--

CREATE TABLE `informacoesveiculos` (
  `TipoVeiculo` varchar(50) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Placa` varchar(20) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Refrigeracao` varchar(20) NOT NULL,
  `NumeroDePortas` varchar(20) NOT NULL,
  `TipoDeTrava` varchar(50) NOT NULL,
  `TipoDeVidro` varchar(50) NOT NULL,
  `Airbag` varchar(20) NOT NULL,
  `TipoDeDirecao` varchar(50) NOT NULL,
  `NumeroDeAssentos` varchar(20) NOT NULL,
  `Preco` float NOT NULL,
  `ImagemVeiculo` varchar(500) NOT NULL,
  `Disponibilidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `informacoesveiculos`
--

INSERT INTO `informacoesveiculos` (`TipoVeiculo`, `Modelo`, `Placa`, `Marca`, `Refrigeracao`, `NumeroDePortas`, `TipoDeTrava`, `TipoDeVidro`, `Airbag`, `TipoDeDirecao`, `NumeroDeAssentos`, `Preco`, `ImagemVeiculo`, `Disponibilidade`) VALUES
('Carro', 'Amarok', 'ABC1D23', 'VolksWagen', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 199.99, 'Imagens/11a3070b-f57c-4d8e-b79d-fb8b8bc44e65.jpg', 'Disponível'),
('Carro', 'Frontier', 'AFK4J20', 'Nissan', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 167.58, 'Imagens/508df4f4-296b-490c-bd47-31666735c89f.jpg', 'Disponível'),
('Carro', 'T-Cross', 'AGP6K81', 'VolksWagen', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 114.99, 'Imagens/7e2cc9d6-a208-4c83-96e6-53802a26debf.jpg', 'Disponível'),
('Carro', 'Corolla', 'GMN9L24', 'Toyota', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 142.9, 'Imagens/1d6698bb-5acb-4b1e-bb74-e4a1abacde00.jpg', 'Disponível'),
('Carro', 'Compass', 'JEE4P84', 'Jeep', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 121.99, 'Imagens/010d7d91-2bfb-450c-937f-37d99ee16e5d.jpg', 'Disponível'),
('Carro', 'Nivus', 'VKS6I85', 'VolksWagen', 'Ar-condicionado', '4', 'Trava elétrica', 'Vidro Temperado', 'Sim', 'Automático', '5', 109.99, 'Imagens/05f9c1ed-7f04-4066-b8d4-8247f3ea3717.jpg', 'Disponível');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Comprador` (`Comprador`),
  ADD KEY `Veiculo` (`Veiculo`);

--
-- Índices de tabela `informacoeslogin`
--
ALTER TABLE `informacoeslogin`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices de tabela `informacoesveiculos`
--
ALTER TABLE `informacoesveiculos`
  ADD PRIMARY KEY (`Placa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Comprador`) REFERENCES `informacoeslogin` (`CPF`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`Veiculo`) REFERENCES `informacoesveiculos` (`Placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
