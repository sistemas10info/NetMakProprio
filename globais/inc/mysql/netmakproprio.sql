-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/08/2025 às 16:14
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
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`interno`, `id_key`, `nome`) VALUES
(1, '34123213123123', 'Empilhadeiras'),
(3, 'fsdsdasdasdasd', 'Tratores'),
(6, '232321dddddvgvv', 'Caminhões'),
(7, 'VUFVKDZ4KK23ZEI8T7P1LYUHO6B8OG', 'Teste'),
(8, 'M486VLMVUAQKUIIDNGGIKXOEL4LKCX', 'teste 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias_produtos`
--

CREATE TABLE `categorias_produtos` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias_produtos`
--

INSERT INTO `categorias_produtos` (`interno`, `id_key`, `nome`) VALUES
(2, 'O53J95OU62ZN6ME8SPS0ZM4BBNBIBE', 'Amortecedores');

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
(1101556, '05AUNKGWIHJDR2H9KKE1DNM6B5IJXX', '---', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_KWNBBB4QFF7CH9FKW5KVPBLEYDFQFG.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-19 11:42:11', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101557, 'U26HVLXRB5B7QEM1QNHL9A3DZJ4DDP', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DJ55TUXA3XXERVNCEFX4MQLBZC1V7L.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-19 11:42:10', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101559, '8H865TK5L5ZUFZAVGU2XJFF2LNRE1F', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_1B1VICYJ8C9VE73Y8MGRC52AKLJ6K3.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:39:45', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101561, 'W91G73CVEDALBJ2I87M8SRDDXVNJTQ', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_X4IIQ3RQ5TP2T28UK8WWIHDRRN5H5S.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:18:33', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101562, 'FMW4YU6I47NCI6LKDFBJ9VEC93CF1X', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_V76IPK91B76XK6D5E3OKA97FKIDQOE.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-19 11:42:08', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101563, 'E0G997R1KMWP2P94TW97OFTWZMQCDW', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_OXPMK82USEZUMO2VPNRKCZRTJC6LV8.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-19 11:42:11', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101568, 'S1V0RJTVBG290XXXU2X3XW44YZVRXY', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_SNE2BPNAKUTMAJXYBGQM5FEEKDKRD4.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:18:49', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101570, 'T3BKUNUX0J9EREKRMKYIQ6LHZ1GVTP', 'Teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_7HJTCPL6DBUTXL7TCWMOL1KNLQ8E34.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-13 12:02:10', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101576, '64DKW8ACWF77F51RQRPQKK1GKO70UB', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_137S77C8S0SF9B142YUGBKKZCG74WL.png', 'png', 'RSU8OIPLL4HSMIA8B4MLBYQKO97R0Q', '2025-08-13 18:51:24', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101577, 'QF61A0TYYT2HWA2U6ULPONXKFIKWVG', 'teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_2TXYUB4178BRN04JRYSJQI47DEGFTW.png', 'png', '7GFTJJ9QTXTQUZADIV3FDQG7263MUP', '2025-08-13 18:54:49', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101579, 'J6C22VTXD8K1Y5GNRRQQV5K9S3O2YK', 'teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_PGOV34952YFTRHIO7UKZUXCCF88V5T.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-14 12:38:38', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101580, 'AX5MNZ9LRV25VTQPPTE1VTC65VLYRZ', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_8ZSKW3ZUAYQPA9EK0P3I8PVUSJ8F3X.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-13 18:59:55', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101581, 'MFUP7DO44T80I3N5XZYCMR5RDCT13Y', 'teste 2', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_VN3PQFTNQV9VY3NTNFTHFGJGQ126EB.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-13 19:01:17', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101582, 'S8H4JAO84FVR7PO0HGYBQ27ZO2VT3Y', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_JZA6BUDZ270K1PF7I83MPEM01WGYE2.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-08-19 12:59:02', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101583, 'EHJQRKUUHMS4P1I46VTTZMOZYSI6TB', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DTZTOREK5YETABC5XR5IPYO7I6GY8O.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-08-19 12:59:02', NULL, NULL, NULL, NULL, NULL, 'on');

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
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `obs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`interno`, `id_key`, `id_key_categoria`, `nome`, `obs`) VALUES
(1, '8UJWS27Q8X5UUKOC0SV3MU14972EVN', 'VUFVKDZ4KK23ZEI8T7P1LYUHO6B8OG', 'Marcad e teste', NULL),
(2, 'PDP6I7ZFMT04PTBVKQZR18K0LZKLRU', 'M486VLMVUAQKUIIDNGGIKXOEL4LKCX', 'teste teste 2', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos`
--

CREATE TABLE `modelos` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `id_key_marca` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `anos` varchar(20) DEFAULT NULL,
  `obs` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modelos`
--

INSERT INTO `modelos` (`interno`, `id_key`, `id_key_categoria`, `id_key_marca`, `nome`, `anos`, `obs`) VALUES
(1, 'BF7KL5R8LARDT51H1U5ES1VWB1YD2E', 'VUFVKDZ4KK23ZEI8T7P1LYUHO6B8OG', '8UJWS27Q8X5UUKOC0SV3MU14972EVN', 'XL 45 Gh', '2001-2010', NULL),
(3, 'XNO7RAVNJ2LMEQINYD4ONG8RL825N6', 'M486VLMVUAQKUIIDNGGIKXOEL4LKCX', 'PDP6I7ZFMT04PTBVKQZR18K0LZKLRU', 'Teste 01', '2001-2023', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `interno` int(11) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `titulo` varchar(256) DEFAULT NULL,
  `descrip` longtext DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1 COMMENT '1=novo - 2=usado',
  `preco` double(12,2) DEFAULT NULL,
  `preco_oferta` double(12,2) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `seo` longtext DEFAULT NULL,
  `link_seo` varchar(256) DEFAULT NULL,
  `comic` double(12,2) DEFAULT NULL,
  `comic_fixa` varchar(1) NOT NULL DEFAULT 'N',
  `apagado` int(1) NOT NULL DEFAULT 0 COMMENT '0=ativo | 1=apagado',
  `estado` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`interno`, `id_key`, `titulo`, `descrip`, `tipo`, `preco`, `preco_oferta`, `id_key_categoria`, `seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`) VALUES
(3, 'NT4M580KKSTFFT8PB958OIWI7UBBFH', 'Amortecedor', '<p>teste</p>', 1, 123.50, 0.00, '--', '', NULL, 0.00, '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `slugs`
--

CREATE TABLE `slugs` (
  `interno` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `palavra` varchar(40) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `obs` longtext DEFAULT NULL,
  `fult_log` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT '1' COMMENT '\r\n1=on | x=off',
  `nivel` int(1) DEFAULT 2 COMMENT '1:admin - 2:usuario',
  `altera_senha` int(1) NOT NULL DEFAULT 0 COMMENT '0=nao - 1=sim',
  `avatar` varchar(256) DEFAULT NULL,
  `site` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `interno` int(11) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `titulo` varchar(256) DEFAULT NULL,
  `descrip` longtext DEFAULT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1 COMMENT '1=novo - 2=usado',
  `id_key_vendedor` varchar(30) NOT NULL DEFAULT '--',
  `preco` double(12,2) DEFAULT NULL,
  `id_key_categoria` varchar(30) DEFAULT NULL,
  `id_key_marca` varchar(30) DEFAULT NULL,
  `id_key_modelo` varchar(30) DEFAULT NULL,
  `seo` longtext DEFAULT NULL,
  `link_seo` varchar(256) DEFAULT NULL,
  `comic` double(12,2) DEFAULT NULL,
  `comic_fixa` varchar(1) NOT NULL DEFAULT 'N',
  `apagado` int(1) NOT NULL DEFAULT 0 COMMENT '0=ativo | 1=apagado',
  `estado` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`interno`, `id_key`, `titulo`, `descrip`, `tipo`, `id_key_vendedor`, `preco`, `id_key_categoria`, `id_key_marca`, `id_key_modelo`, `seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`) VALUES
(3, 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', 'Empilhadeira X4 22 - Excelente opção de compra ', '<p>teste<br>gostei do negocio..<br>para mim tudo certo..<br><br></p>', 1, '--', 120000.00, '--', '--', '--', 'Teste do sistema teste', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSeo_Q8XASQERRZ2R1Q5RR1JOHXNO52WS9R.png', 0.00, '', 0, ''),
(8, 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', 'Linda empilhadeira.', '<p>teste do sistema..<br><br><br></p>', 2, '2IZY9VJDBRT849HIOXHA3ME84X0BIA', 12000.00, '--', '--', '--', NULL, NULL, NULL, 'N', 0, '');

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
  `ult_ip_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`interno`, `id_key`, `nome`, `endereco`, `cep`, `email`, `telefone`, `celular`, `obs`, `nro`, `comple`, `cpf_cnpj`, `facebook`, `site`, `rg`, `razao_social`, `bairro`, `cidade`, `senha_acesso`, `codigo_int`, `fnac`, `uf`, `lat`, `longi`, `estado`, `comic`, `usuario`, `instagram`, `logo`, `capa`, `banner`, `foto`, `id_key_categorias`, `id_key_categorias_produtos`, `quem_somos`, `servicos_prestados`, `nome_empresa`, `slogan`, `modelo_site`, `rua`, `senha`, `altera_senha`, `link_logo`, `link_banner`, `subdominio`, `apagado`, `session_id`, `fult_login`, `ult_ip_login`) VALUES
(227, '2IZY9VJDBRT849HIOXHA3ME84X0BIA', NULL, NULL, '88330-272', 'sistemas10.info@gmail.com', '(47) 99980-0801', '(47) 99980-0801', '', '512', 'sala 02', '', '', '', NULL, 'Carlos Gabriel Alonso', 'Centro', 'Balneário Camboriú', NULL, NULL, NULL, 'SC', NULL, NULL, '1', NULL, '', '', NULL, NULL, NULL, NULL, '34123213123123-VUFVKDZ4KK23ZEI8T7P1LYUHO6B8OG', 'O53J95OU62ZN6ME8SPS0ZM4BBNBIBE', '', '<p>teste<br>sdsds<br>sdsdasdasdasdas<br>dsaasdasdasdasd</p>', 'Carlos Alonso Testes', 'Sempre com o cliente', '2', 'Rua 3300', '', 1, NULL, NULL, 'pedrinho', 0, '6qf7ddq8e7kchdl353gn22esco', '2025-08-19 09:00:48', '::1');

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
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101584;

--
-- AUTO_INCREMENT de tabela `ips_suspeitos`
--
ALTER TABLE `ips_suspeitos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `slugs`
--
ALTER TABLE `slugs`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
