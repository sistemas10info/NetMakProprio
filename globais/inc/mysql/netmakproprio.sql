-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/08/2025 às 13:06
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
  `id_key` varchar(30) NOT NULL,
  `titulo` varchar(120) DEFAULT NULL,
  `obs` longtext DEFAULT NULL,
  `contador` int(3) NOT NULL,
  `link` varchar(256) DEFAULT NULL,
  `formato` varchar(3) NOT NULL DEFAULT 'jpg',
  `id_key_origem` varchar(30) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link_minia` varchar(256) DEFAULT NULL,
  `tamanho_original` varchar(32) DEFAULT NULL,
  `tamanho_resize` varchar(32) DEFAULT NULL,
  `tipo_origem` varchar(2) DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `principal` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `fecha_hora_bloqueio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', 'Novo veículo', NULL, 1, '--', NULL, NULL, NULL, NULL, NULL, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSeo_Q8XASQERRZ2R1Q5RR1JOHXNO52WS9R.png', NULL, 'N', 0, '0');

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
  `apagado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`interno`, `id_key`, `nome`, `endereco`, `cep`, `email`, `telefone`, `celular`, `obs`, `nro`, `comple`, `cpf_cnpj`, `facebook`, `site`, `rg`, `razao_social`, `bairro`, `cidade`, `senha_acesso`, `codigo_int`, `fnac`, `uf`, `lat`, `longi`, `estado`, `comic`, `usuario`, `instagram`, `logo`, `capa`, `banner`, `foto`, `id_key_categorias`, `quem_somos`, `servicos_prestados`, `nome_empresa`, `slogan`, `modelo_site`, `rua`, `senha`, `altera_senha`, `link_logo`, `link_banner`, `subdominio`, `apagado`) VALUES
(227, '2IZY9VJDBRT849HIOXHA3ME84X0BIA', NULL, NULL, '88330-272', '', '(47) 99980-0801', '(47) 99980-0801', '', '512', 'sala 02', '', '', '', NULL, 'Carlos Gabriel Alonso', 'Centro', 'Balneário Camboriú', NULL, NULL, NULL, 'SC', NULL, NULL, '1', NULL, '', '', NULL, NULL, NULL, NULL, '34123213123123-VUFVKDZ4KK23ZEI8T7P1LYUHO6B8OG', '', '', 'Carlos Alonso Testes', 'Sempre com o cliente', '2', 'Rua 3300', '', 1, NULL, NULL, 'pedrinho', 0),
(228, 'BP4RNBCCTSRVBBK3Q03TG4FH7UCBDS', NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, 'Novo veículo', '', '', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', 0, NULL, NULL, NULL, 0),
(229, 'TVCOIK1E5JZUC52GUKLSYAE2TXTFGU', NULL, NULL, '', '', '', '', '', '', '', '', '', '', NULL, 'Novo veículo', '', '', NULL, NULL, NULL, '', NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', 0, NULL, NULL, NULL, 0);

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
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101526;

--
-- AUTO_INCREMENT de tabela `ips_suspeitos`
--
ALTER TABLE `ips_suspeitos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
