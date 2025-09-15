-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/09/2025 às 21:47
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `netmakproprio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_linha` varchar(30) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `template` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`interno`, `id_key`, `id_key_linha`, `nome`, `template`) VALUES
(11, 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', 'we3333333', 'Teste agro 01', 0),
(12, 'V70X4ZNK34VKPP8PDZ5LE2JMXF6GXM', 'we3333333', 'Teste agro 02', 0),
(13, '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', 'ss3322323232dsdd', 'Empilhadeira', 1),
(14, 'XX9FZLYNLEEHZCJ4ZGQCEM7JCD5ILA', 'ss3322323232dsdd', 'Transpaletes', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias_produtos`
--

CREATE TABLE `categorias_produtos` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_linha` varchar(30) DEFAULT '--',
  `id_key_categoria` varchar(30) NOT NULL DEFAULT '--',
  `id_key_marca` varchar(30) NOT NULL DEFAULT '--',
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias_produtos`
--

INSERT INTO `categorias_produtos` (`interno`, `id_key`, `id_key_linha`, `id_key_categoria`, `id_key_marca`, `nome`) VALUES
(6, 'A08IJNI10ROSZXW82JXGDSG3QIEQGM', '--', '--', '--', 'Amortecedores'),
(7, 'ESLLXUVHMMR2PCO0XJ0M7DTPFRIWOL', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ddds`
--

CREATE TABLE `ddds` (
  `id` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `regiao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ddds`
--

INSERT INTO `ddds` (`id`, `codigo`, `regiao`) VALUES
(1, '11', 'São Paulo - Capital e Região Metropolitana'),
(2, '12', 'Vale do Paraíba e Litoral Norte - SP'),
(3, '13', 'Baixada Santista e Litoral Sul - SP'),
(4, '14', 'Bauru, Marília - SP'),
(5, '15', 'Sorocaba e Região - SP'),
(6, '16', 'Ribeirão Preto - SP'),
(7, '17', 'São José do Rio Preto - SP'),
(8, '18', 'Presidente Prudente - SP'),
(9, '19', 'Campinas - SP'),
(10, '21', 'Rio de Janeiro - Capital e Região Metropolitana'),
(11, '22', 'Região dos Lagos, Norte Fluminense - RJ'),
(12, '24', 'Vale do Paraíba Fluminense - RJ'),
(13, '27', 'Vitória e Região Metropolitana - ES'),
(14, '28', 'Sul do Espírito Santo - ES'),
(15, '31', 'Belo Horizonte e Região Metropolitana - MG'),
(16, '32', 'Zona da Mata - MG'),
(17, '33', 'Vale do Rio Doce - MG'),
(18, '34', 'Triângulo Mineiro - MG'),
(19, '35', 'Sul de Minas - MG'),
(20, '37', 'Centro-Oeste de Minas - MG'),
(21, '38', 'Norte de Minas - MG'),
(22, '41', 'Curitiba e Região Metropolitana - PR'),
(23, '42', 'Centro-Sul do Paraná - PR'),
(24, '43', 'Norte do Paraná - PR'),
(25, '44', 'Noroeste do Paraná - PR'),
(26, '45', 'Oeste do Paraná - PR'),
(27, '46', 'Sudoeste do Paraná - PR'),
(28, '47', 'Norte de Santa Catarina'),
(29, '48', 'Florianópolis e Sul de Santa Catarina'),
(30, '49', 'Oeste de Santa Catarina'),
(31, '51', 'Porto Alegre e Região Metropolitana - RS'),
(32, '53', 'Sul do Rio Grande do Sul'),
(33, '54', 'Serra Gaúcha - RS'),
(34, '55', 'Oeste do Rio Grande do Sul'),
(35, '61', 'Distrito Federal e Entorno - DF/GO'),
(36, '62', 'Goiânia e Região - GO'),
(37, '63', 'Tocantins'),
(38, '64', 'Sul de Goiás'),
(39, '65', 'Cuiabá - MT'),
(40, '66', 'Interior de Mato Grosso'),
(41, '67', 'Mato Grosso do Sul'),
(42, '68', 'Acre'),
(43, '69', 'Rondônia'),
(44, '71', 'Salvador e Região Metropolitana - BA'),
(45, '73', 'Sul da Bahia'),
(46, '74', 'Norte da Bahia'),
(47, '75', 'Feira de Santana e Região - BA'),
(48, '77', 'Oeste da Bahia'),
(49, '79', 'Sergipe'),
(50, '81', 'Recife e Região Metropolitana - PE'),
(51, '82', 'Alagoas'),
(52, '83', 'Paraíba'),
(53, '84', 'Rio Grande do Norte'),
(54, '85', 'Fortaleza e Região Metropolitana - CE'),
(55, '86', 'Piauí - Teresina'),
(56, '87', 'Interior de Pernambuco'),
(57, '88', 'Interior do Ceará'),
(58, '89', 'Sul do Piauí'),
(59, '91', 'Belém e Região Metropolitana - PA'),
(60, '92', 'Manaus e Região Metropolitana - AM'),
(61, '93', 'Oeste do Pará'),
(62, '94', 'Sudeste do Pará'),
(63, '95', 'Roraima'),
(64, '96', 'Amapá'),
(65, '97', 'Interior do Amazonas'),
(66, '98', 'São Luís - MA'),
(67, '99', 'Interior do Maranhão');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `codigo_uf` int(11) NOT NULL,
  `uf` char(2) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `codigo_uf`, `uf`, `nome`) VALUES
(1, 12, 'AC', 'Acre'),
(2, 27, 'AL', 'Alagoas'),
(3, 13, 'AM', 'Amazonas'),
(4, 16, 'AP', 'Amapá'),
(5, 29, 'BA', 'Bahia'),
(6, 23, 'CE', 'Ceará'),
(7, 53, 'DF', 'Distrito Federal'),
(8, 32, 'ES', 'Espírito Santo'),
(9, 52, 'GO', 'Goiás'),
(10, 21, 'MA', 'Maranhão'),
(11, 31, 'MG', 'Minas Gerais'),
(12, 50, 'MS', 'Mato Grosso do Sul'),
(13, 51, 'MT', 'Mato Grosso'),
(14, 15, 'PA', 'Pará'),
(15, 25, 'PB', 'Paraíba'),
(16, 26, 'PE', 'Pernambuco'),
(17, 22, 'PI', 'Piauí'),
(18, 41, 'PR', 'Paraná'),
(19, 33, 'RJ', 'Rio de Janeiro'),
(20, 24, 'RN', 'Rio Grande do Norte'),
(21, 43, 'RS', 'Rio Grande do Sul'),
(22, 11, 'RO', 'Rondônia'),
(23, 14, 'RR', 'Roraima'),
(24, 42, 'SC', 'Santa Catarina'),
(25, 28, 'SE', 'Sergipe'),
(26, 35, 'SP', 'São Paulo'),
(27, 17, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `interno` int(8) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `obs` longtext DEFAULT NULL,
  `contador` int(3) NOT NULL DEFAULT 0,
  `link` varchar(256) DEFAULT NULL,
  `formato` varchar(3) NOT NULL DEFAULT 'jpg',
  `id_key_origem` varchar(30) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link_minia` varchar(256) DEFAULT NULL,
  `tamanho_original` varchar(32) DEFAULT NULL,
  `tamanho_resize` varchar(32) DEFAULT NULL,
  `tipo_origem` varchar(2) DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `principal` varchar(2) DEFAULT 'xx'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`interno`, `id_key`, `titulo`, `obs`, `contador`, `link`, `formato`, `id_key_origem`, `fecha_hora`, `link_minia`, `tamanho_original`, `tamanho_resize`, `tipo_origem`, `tipo`, `principal`) VALUES
(1101556, '05AUNKGWIHJDR2H9KKE1DNM6B5IJXX', '---', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_KWNBBB4QFF7CH9FKW5KVPBLEYDFQFG.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-09-04 19:09:08', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101557, 'U26HVLXRB5B7QEM1QNHL9A3DZJ4DDP', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DJ55TUXA3XXERVNCEFX4MQLBZC1V7L.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-09-04 19:09:08', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101559, '8H865TK5L5ZUFZAVGU2XJFF2LNRE1F', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_1B1VICYJ8C9VE73Y8MGRC52AKLJ6K3.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:39:45', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101561, 'W91G73CVEDALBJ2I87M8SRDDXVNJTQ', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_X4IIQ3RQ5TP2T28UK8WWIHDRRN5H5S.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:18:33', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101562, 'FMW4YU6I47NCI6LKDFBJ9VEC93CF1X', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_V76IPK91B76XK6D5E3OKA97FKIDQOE.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-25 12:33:36', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101563, 'E0G997R1KMWP2P94TW97OFTWZMQCDW', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_OXPMK82USEZUMO2VPNRKCZRTJC6LV8.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-25 14:35:05', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101568, 'S1V0RJTVBG290XXXU2X3XW44YZVRXY', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_SNE2BPNAKUTMAJXYBGQM5FEEKDKRD4.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:18:49', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101570, 'T3BKUNUX0J9EREKRMKYIQ6LHZ1GVTP', 'Teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_7HJTCPL6DBUTXL7TCWMOL1KNLQ8E34.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:02:10', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101576, '64DKW8ACWF77F51RQRPQKK1GKO70UB', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_137S77C8S0SF9B142YUGBKKZCG74WL.png', 'png', 'RSU8OIPLL4HSMIA8B4MLBYQKO97R0Q', '2025-08-13 18:51:24', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101577, 'QF61A0TYYT2HWA2U6ULPONXKFIKWVG', 'teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_2TXYUB4178BRN04JRYSJQI47DEGFTW.png', 'png', '7GFTJJ9QTXTQUZADIV3FDQG7263MUP', '2025-08-13 18:54:49', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101579, 'J6C22VTXD8K1Y5GNRRQQV5K9S3O2YK', 'teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_PGOV34952YFTRHIO7UKZUXCCF88V5T.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-14 12:38:38', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101580, 'AX5MNZ9LRV25VTQPPTE1VTC65VLYRZ', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_8ZSKW3ZUAYQPA9EK0P3I8PVUSJ8F3X.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-13 18:59:55', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101581, 'MFUP7DO44T80I3N5XZYCMR5RDCT13Y', 'teste 2', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_VN3PQFTNQV9VY3NTNFTHFGJGQ126EB.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-13 19:01:17', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101582, 'S8H4JAO84FVR7PO0HGYBQ27ZO2VT3Y', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_JZA6BUDZ270K1PF7I83MPEM01WGYE2.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-09-02 16:52:21', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101583, 'EHJQRKUUHMS4P1I46VTTZMOZYSI6TB', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DTZTOREK5YETABC5XR5IPYO7I6GY8O.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-09-02 16:52:21', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101585, '5QFFM7XM6QHAX1Q0V7AQ9GTLORVAE9', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_OU7BP71DSI4QQ7ECIA1ET85SEAUAYY.png', 'png', 'RGPO6XT58EVGF28520GW6D85CEUD7X', '2025-09-10 11:50:53', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101586, 'P07PAAATJWQJ6EUB7L55CNAA9PGTPD', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_D6KK2HRA2WVXCBNOH0LS3FM4BGMUP7.png', 'png', 'RGPO6XT58EVGF28520GW6D85CEUD7X', '2025-09-10 11:51:00', NULL, NULL, NULL, NULL, NULL, 'xx');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ips_suspeitos`
--

CREATE TABLE `ips_suspeitos` (
  `interno` int(6) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `fecha_hora` timestamp NULL DEFAULT NULL,
  `tentativas` int(5) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL COMMENT 'X = bloqueado',
  `fecha_hora_bloqueio` datetime DEFAULT NULL,
  `logs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ips_suspeitos`
--

INSERT INTO `ips_suspeitos` (`interno`, `ip`, `fecha_hora`, `tentativas`, `estado`, `fecha_hora_bloqueio`, `logs`) VALUES
(1, '::1', '2025-08-13 17:34:00', 20, NULL, NULL, '13/08/2025 14:34:22 - Login vendedor\n13/08/2025 14:34:16 - Login vendedor\n13/08/2025 14:24:47 - Login vendedor\n13/08/2025 14:07:29 - Login vendedor\n13/08/2025 14:07:29 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `linhas`
--

CREATE TABLE `linhas` (
  `intern` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `abrev` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `linhas`
--

INSERT INTO `linhas` (`intern`, `id_key`, `nome`, `abrev`) VALUES
(1, '34213434324', 'Linha Amarela\r\n', 'AMR'),
(2, 'we3333333', 'Linha Agro', 'AGR'),
(5, 'ss3322323232dsdd', 'Linha Movimentação Logística', 'MOV');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_linha` varchar(30) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `obs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`interno`, `id_key`, `id_key_linha`, `id_key_categoria`, `nome`, `obs`) VALUES
(5, '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', 'Ford', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos`
--

CREATE TABLE `modelos` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_linha` varchar(30) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `id_key_marca` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `anos` varchar(20) DEFAULT NULL,
  `obs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modelos`
--

INSERT INTO `modelos` (`interno`, `id_key`, `id_key_linha`, `id_key_categoria`, `id_key_marca`, `nome`, `anos`, `obs`) VALUES
(8, '2DMOUX8NP84BC7DOZWI1IKI2VCNNEB', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', 'Xp 201sA', '2001/2010', NULL),
(9, 'UYZ3VHW3W04WSLXJF4VMU2FYHWG5ZY', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'teste carlos', '2001/2023', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `interno` int(11) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `titulo` varchar(256) DEFAULT NULL,
  `descrip` longtext DEFAULT NULL,
  `modelos` longtext DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1 COMMENT '1=novo - 2=usado',
  `preco` double(12,2) DEFAULT NULL,
  `preco_oferta` double(12,2) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `seo` longtext DEFAULT NULL,
  `link_seo` varchar(256) DEFAULT NULL,
  `comic` double(12,2) DEFAULT NULL,
  `comic_fixa` varchar(1) NOT NULL DEFAULT 'N',
  `apagado` int(1) NOT NULL DEFAULT 0 COMMENT '0=ativo | 1=apagado',
  `estado` varchar(1) DEFAULT '0',
  `descrip_seo` varchar(256) DEFAULT NULL,
  `titulo_seo` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`interno`, `id_key`, `titulo`, `descrip`, `modelos`, `tipo`, `preco`, `preco_oferta`, `id_key_categoria`, `seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`, `descrip_seo`, `titulo_seo`, `slug`, `codigo`) VALUES
(3, 'NT4M580KKSTFFT8PB958OIWI7UBBFH', 'Amortecedor', '<p>teste</p>', NULL, 1, 123.50, 0.00, 'A08IJNI10ROSZXW82JXGDSG3QIEQGM', '', NULL, 0.00, '', 0, '9', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `slugs`
--

CREATE TABLE `slugs` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  `tipo_pagina` varchar(1) DEFAULT NULL COMMENT '1=vei.novos-2=vei.usados-3=loja vendedor-4=produtos',
  `id_key_origem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `slugs`
--

INSERT INTO `slugs` (`interno`, `id_key`, `slug`, `link`, `tipo_pagina`, `id_key_origem`) VALUES
(1, 'T72VZRKPTEF2SG9CEX5WF2284PN3BL', '', NULL, '4', 'NT4M580KKSTFFT8PB958OIWI7UBBFH'),
(2, 'AGOG6NTEQXPSTCLTZ5806GYCX329DB', '', NULL, '1', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `sobrenome` varchar(120) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `telefone` varchar(60) DEFAULT NULL,
  `obs` longtext DEFAULT NULL,
  `fult_log` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT '1' COMMENT '\r\n1=on | x=off',
  `nivel` int(1) DEFAULT 2 COMMENT '1:admin - 2:usuario',
  `altera_senha` int(1) NOT NULL DEFAULT 0 COMMENT '0=nao - 1=sim',
  `avatar` varchar(256) DEFAULT NULL,
  `site` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `link_avatar` varchar(256) DEFAULT NULL,
  `apagado` int(1) NOT NULL DEFAULT 0 COMMENT '0=on - 1=apagado',
  `session_id` varchar(256) DEFAULT NULL,
  `fult_login` datetime DEFAULT NULL,
  `ult_ip_login` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`interno`, `id_key`, `usuario`, `senha`, `nome`, `sobrenome`, `email`, `celular`, `telefone`, `obs`, `fult_log`, `estado`, `nivel`, `altera_senha`, `avatar`, `site`, `instagram`, `facebook`, `cpf_cnpj`, `link_avatar`, `apagado`, `session_id`, `fult_login`, `ult_ip_login`) VALUES
(1, 'VWDIHN5RCU9DF1YMIN1SPYZEY2YWPK', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSeo_EFDCEMNKJEMEV1G5YFJ652AMVU7OIY.png', 1, NULL, NULL, NULL),
(2, 'PURBMKC47CM3N0PL3QU11H4QLUXFBV', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_YG4R7XL61ZH13QK53T640VDXI47VIM.png', 1, NULL, NULL, NULL),
(3, 'A1P3507YOA8Y9Q11BSRYDXLAF46MY3', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_MLE8PGGFTGPSPML4IZGTKWJJC7MJD2.png', 1, NULL, NULL, NULL),
(4, 'MW26GPD930GRIRWRDTRIBX5WMCEDMU', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_J8HUJDYYNGV0BC9ZLV9FQH5MGOFYA5.png', 1, NULL, NULL, NULL),
(5, 'QB4TY2WC0SKL4QKR3HSAQCU9QD0X12', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_I88E7WK2BT4APUX7I1L9BHZO22HJ85.png', 1, NULL, NULL, NULL),
(6, 'CKH9T1EGN1F2DZAFO18SIBVH5XA1ZM', NULL, NULL, 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_Y4H6QSA5O24EG0AKXFFJBEBB2GJ84Y.png', 1, NULL, NULL, NULL),
(7, 'LTG37K8KTX1MBEMN9G7P4660NV7HHR', NULL, NULL, 'Carlos Alonso', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_HX114ISHN2TEHY0URHZALVYG58OHFC.png', 1, NULL, NULL, NULL),
(8, 'LW4WKPWS0H31FRN824EE3HH14UYTU8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(9, '9LCGVOQR07YXUKR3KRXPNSVF954IKR', NULL, NULL, 'Carlos Alonso', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_BQHI04IZDCG7AJK6ZOQD4F9ARYJBTB.png', 1, NULL, NULL, NULL),
(10, 'L7DJ02EEN1C8E9LGUD2EWUFCDFL5SE', NULL, NULL, 'Novo usuário', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_60IMKFA5E5V1T18DJ8FIU4BBTXM1QV.png', 1, NULL, NULL, NULL),
(11, '3B9AYBYTLLV7TV11K9ZZNEM4I1MT3Z', NULL, NULL, 'Carlos Alonso', NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_MXRATF3XSR8V24UX64YA2I5JWJPB9T.png', 1, NULL, NULL, NULL),
(12, 'NI2FZJ3MAEO3KEAV4HK619GGPM3W20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, 'OY7D5QMT63IYWA7EB1RV7PY1ASWHFF', 'carlos.alonso', 'Lx1FAwQ=', 'Carlos Alonso', NULL, 'sistemas10.info@gmail.com', '(47) 99980-0801', '', '', NULL, '', 1, 0, NULL, '', 'planetaprogramador', '', '', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_MXRATF3XSR8V24UX64YA2I5JWJPB9T.png', 0, 'sdnbjfi0356ju7nn3efd0v8mie', '2025-09-15 16:40:00', '::1'),
(14, 'NKDIKSHUYDY7BOSJV8IK9DCHIXFA0Y', 'carlos.alonso2', '', 'Carlos Gabriel Alonso', NULL, 'sistemas10.info@gmail.com', '(47) 9998-0801', '', '', NULL, '', 2, 0, NULL, '', '', '', '', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_O8UJNL26W89SMGO8P37TDIS5ALYKIT.jpeg', 0, '--', '2025-08-20 14:30:00', '::1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `interno` int(11) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `titulo` varchar(256) DEFAULT NULL,
  `descrip` longtext DEFAULT NULL,
  `especifica` longtext DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1 COMMENT '1=novo - 2=usado',
  `id_key_vendedor` varchar(30) NOT NULL DEFAULT '--',
  `preco` double(12,2) DEFAULT NULL,
  `id_key_linha` varchar(30) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `id_key_marca` varchar(30) DEFAULT NULL,
  `id_key_modelo` varchar(30) DEFAULT NULL,
  `seo` longtext DEFAULT NULL,
  `descrip_seo` longtext DEFAULT NULL,
  `titulo_seo` varchar(256) DEFAULT NULL,
  `link_seo` varchar(256) DEFAULT NULL,
  `comic` double(12,2) DEFAULT NULL,
  `comic_fixa` varchar(1) NOT NULL DEFAULT 'N',
  `apagado` int(1) NOT NULL DEFAULT 0 COMMENT '0=ativo | 1=apagado',
  `estado` varchar(1) DEFAULT '0',
  `slug` varchar(60) DEFAULT NULL,
  `motor` varchar(100) DEFAULT NULL,
  `tipo_torre` varchar(100) DEFAULT NULL,
  `cap_carga` varchar(100) DEFAULT NULL,
  `cap_elevacao` varchar(100) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `locacao` varchar(1) DEFAULT NULL,
  `periodo_locacao` varchar(1) DEFAULT NULL,
  `valor_locacao` double(12,2) DEFAULT NULL,
  `horimetro` int(6) DEFAULT NULL,
  `ano_fabricacao` varchar(25) DEFAULT NULL,
  `estado_veiculo` varchar(20) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `condicao` varchar(15) DEFAULT NULL,
  `f_solicitado` date NOT NULL DEFAULT '0000-00-00',
  `f_autorizado` date NOT NULL DEFAULT '0000-00-00',
  `id_key_usuario_autoriza` varchar(30) DEFAULT '--',
  `estado_autorizado` varchar(1) NOT NULL DEFAULT 'P' COMMENT 'S=publicado\r\nP=Pendente\r\nR=Rechazado',
  `obs_publicacao` longtext DEFAULT NULL,
  `ddd` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`interno`, `id_key`, `titulo`, `descrip`, `especifica`, `tipo`, `id_key_vendedor`, `preco`, `id_key_linha`, `id_key_categoria`, `id_key_marca`, `id_key_modelo`, `seo`, `descrip_seo`, `titulo_seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`, `slug`, `motor`, `tipo_torre`, `cap_carga`, `cap_elevacao`, `codigo`, `locacao`, `periodo_locacao`, `valor_locacao`, `horimetro`, `ano_fabricacao`, `estado_veiculo`, `uf`, `cidade`, `condicao`, `f_solicitado`, `f_autorizado`, `id_key_usuario_autoriza`, `estado_autorizado`, `obs_publicacao`, `ddd`) VALUES
(3, 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', 'Empilhadeira X4 22 - Excelente opção de compra ', '<p>teste<br>gostei do negocio..<br>para mim tudo certo..<br><br></p>', '<p>Teste de especificações.<br>Porque funciona ok o quebra linha.<br><br>Att.<br><br></p>', 1, '--', 120000.00, 'ss3322323232dsdd', 'XX9FZLYNLEEHZCJ4ZGQCEM7JCD5ILA', '--', '--', 'Teste do sistema teste', 'Descrip SEO', 'titulo SEO', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSeo_Q8XASQERRZ2R1Q5RR1JOHXNO52WS9R.png', 0.00, '', 0, '', '', 'Manual', 'Duplex', '2500kg', 'Sem elevação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '0000-00-00', '--', 'P', NULL, NULL),
(8, 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', 'Linda empilhadeira.', '<p>teste do sistema..<br><br><br></p>', NULL, 2, '2IZY9VJDBRT849HIOXHA3ME84X0BIA', 12000.00, NULL, '--', '--', '--', NULL, NULL, NULL, NULL, NULL, 'N', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', '0000-00-00', '--', 'P', NULL, NULL),
(14, 'RGPO6XT58EVGF28520GW6D85CEUD7X', 'Lindo veiculos para venda.....', '<p>Teste do anuncio do sistema....teste teste....<br><br></p>', '', 2, '4K5AU27VMI2K1ULF2OSK93K1ANTJ1X', 0.00, 'ss3322323232dsdd', '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', '--', '--', NULL, NULL, NULL, NULL, NULL, 'N', 0, '9', NULL, 'GLP', 'Triplex', '3500kg', '4 a 5 metros', NULL, 'N', NULL, 0.00, 2232, '2011 a 2015', 'Ótimo estado', 'AM', '', 'Semi-nova', '0000-00-00', '0000-00-00', '--', 'P', NULL, '47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `interno` int(8) NOT NULL,
  `id_key` varchar(30) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `obs` longtext DEFAULT NULL,
  `nro` varchar(20) DEFAULT NULL,
  `comple` varchar(20) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `site` varchar(120) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `razao_social` varchar(120) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `senha_acesso` varchar(256) DEFAULT NULL,
  `codigo_int` varchar(10) DEFAULT NULL,
  `fnac` date DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `lat` varchar(12) DEFAULT NULL,
  `longi` varchar(12) DEFAULT NULL,
  `estado` varchar(1) DEFAULT '1',
  `comic` double(12,2) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `instagram` varchar(120) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `capa` varchar(256) DEFAULT NULL,
  `banner` varchar(256) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `id_key_linhas` varchar(256) DEFAULT NULL,
  `id_key_categorias` varchar(256) DEFAULT NULL,
  `id_key_categorias_produtos` varchar(256) DEFAULT NULL,
  `quem_somos` longtext DEFAULT NULL,
  `servicos_prestados` longtext DEFAULT NULL,
  `nome_empresa` varchar(256) DEFAULT NULL,
  `slogan` varchar(256) DEFAULT NULL,
  `modelo_site` varchar(1) DEFAULT NULL,
  `rua` varchar(256) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `altera_senha` int(1) NOT NULL DEFAULT 0,
  `link_logo` varchar(256) DEFAULT NULL,
  `link_banner` varchar(256) DEFAULT NULL,
  `subdominio` varchar(30) DEFAULT NULL,
  `apagado` int(1) NOT NULL DEFAULT 0,
  `session_id` varchar(256) DEFAULT NULL,
  `fult_login` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `ult_ip_login` varchar(20) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `ddd` varchar(2) DEFAULT NULL,
  `linhas_trabalha` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`interno`, `id_key`, `nome`, `endereco`, `cep`, `email`, `telefone`, `celular`, `obs`, `nro`, `comple`, `cpf_cnpj`, `facebook`, `site`, `rg`, `razao_social`, `bairro`, `cidade`, `senha_acesso`, `codigo_int`, `fnac`, `uf`, `lat`, `longi`, `estado`, `comic`, `usuario`, `instagram`, `logo`, `capa`, `banner`, `foto`, `id_key_linhas`, `id_key_categorias`, `id_key_categorias_produtos`, `quem_somos`, `servicos_prestados`, `nome_empresa`, `slogan`, `modelo_site`, `rua`, `senha`, `altera_senha`, `link_logo`, `link_banner`, `subdominio`, `apagado`, `session_id`, `fult_login`, `ult_ip_login`, `slug`, `ddd`, `linhas_trabalha`) VALUES
(230, '4K5AU27VMI2K1ULF2OSK93K1ANTJ1X', NULL, NULL, '88330-063', 'sistemas10.info@gmail.com', '(47) 99980-0801', '(47) 9998-0801', '', '', '', '04.037.707/0001-23', '', '', NULL, 'Carlos Alonso', '', 'Balneário Camboriú', NULL, NULL, NULL, 'SC', NULL, NULL, '', NULL, 'carlos.alonso', '', NULL, NULL, NULL, NULL, '34213434324-ss3322323232dsdd', '34123213123123', '--', NULL, NULL, NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 0, 'sdnbjfi0356ju7nn3efd0v8mie', '2025-09-15 16:39:00', '::1', NULL, '47', 'AMR/MOV/');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`);

--
-- Índices de tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`);

--
-- Índices de tabela `ddds`
--
ALTER TABLE `ddds`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`),
  ADD KEY `id_key_origem` (`id_key_origem`);

--
-- Índices de tabela `ips_suspeitos`
--
ALTER TABLE `ips_suspeitos`
  ADD PRIMARY KEY (`interno`);

--
-- Índices de tabela `linhas`
--
ALTER TABLE `linhas`
  ADD PRIMARY KEY (`intern`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`,`id_key_categoria`);

--
-- Índices de tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`interno`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`interno`);

--
-- Índices de tabela `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`),
  ADD KEY `id_key_2` (`id_key`,`nome`) USING BTREE;

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`,`id_key_vendedor`),
  ADD KEY `id_key_vendedor` (`id_key_vendedor`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`interno`),
  ADD KEY `id_key` (`id_key`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `ddds`
--
ALTER TABLE `ddds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101587;

--
-- AUTO_INCREMENT de tabela `ips_suspeitos`
--
ALTER TABLE `ips_suspeitos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `linhas`
--
ALTER TABLE `linhas`
  MODIFY `intern` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `slugs`
--
ALTER TABLE `slugs`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
