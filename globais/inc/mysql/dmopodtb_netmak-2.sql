-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08/09/2025 às 07:53
-- Versão do servidor: 11.4.7-MariaDB-cll-lve
-- Versão do PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dmopodtb_netmak`
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
(6, 'A08IJNI10ROSZXW82JXGDSG3QIEQGM', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'Amortecedores'),
(7, 'ESLLXUVHMMR2PCO0XJ0M7DTPFRIWOL', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'Acessórios');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`interno`, `id_key`, `titulo`, `obs`, `contador`, `link`, `formato`, `id_key_origem`, `fecha_hora`, `link_minia`, `tamanho_original`, `tamanho_resize`, `tipo_origem`, `tipo`, `principal`) VALUES
(1101557, 'U26HVLXRB5B7QEM1QNHL9A3DZJ4DDP', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DJ55TUXA3XXERVNCEFX4MQLBZC1V7L.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-25 12:15:36', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101559, '8H865TK5L5ZUFZAVGU2XJFF2LNRE1F', 'teste', NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_1B1VICYJ8C9VE73Y8MGRC52AKLJ6K3.png', 'png', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', '2025-08-28 14:04:10', NULL, NULL, NULL, NULL, NULL, 'on'),
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
(1101582, 'S8H4JAO84FVR7PO0HGYBQ27ZO2VT3Y', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_JZA6BUDZ270K1PF7I83MPEM01WGYE2.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-09-02 16:52:30', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101583, 'EHJQRKUUHMS4P1I46VTTZMOZYSI6TB', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_DTZTOREK5YETABC5XR5IPYO7I6GY8O.png', 'png', 'NT4M580KKSTFFT8PB958OIWI7UBBFH', '2025-09-02 16:52:30', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101584, 'PPO6U8GL0ATNLILFT70E7LGJ0BHFJH', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_P2S3XV7MCEXNWNAP0FZAV4XHLVUX99.png', 'png', 'K2RWZJYXUUUAVCVNP4C1MT0Q3LZNW5', '2025-08-28 13:09:07', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101585, '51FD1G6A9B3Q8399WLZLGRF3QSWLRK', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_1OA0YHJJT254XTW9SO5R4CGNIDU8P5.png', 'png', 'SO19Q516ZKVQLYAOUQ41AJ9FYFGDWI', '2025-08-28 13:12:00', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101586, '2FUQ6GA3TR7RKNXFUS7XHRXFFAWSAA', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_65VCO0LCBZQGEVTWDNUQKE1RHE2BGE.png', 'png', 'SO19Q516ZKVQLYAOUQ41AJ9FYFGDWI', '2025-08-28 13:15:13', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101587, '5CSYFED16ZA40UHNCGFN6WE4QRVV4S', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_17ZASN8TSZNVPHKRA9RXHDGH1OBE8R.png', 'png', 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', '2025-08-28 21:30:37', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101588, 'XE6X7YKA899JXKADHBT283DOMW30KG', NULL, NULL, 0, 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSite_V8IXIRQADR9NWTBQ4EEM076BHI080P.png', 'png', 'GSM67F05TDNKM7IGQTVT443XY4JBNL', '2025-08-28 21:47:47', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101589, '169M8BHQDDJK255MSZOMVRUSQ3MYVK', 'Empilhadeira Diesel Netmak D3648 Amarela Ambientada', NULL, 0, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSite_08WB4BW6RLRKBVY3KVPTUFKCEAFELU.jpg', 'jpg', 'WUOPM5Y909PB57N0AF6W0BLRS20DU0', '2025-09-02 12:56:27', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101590, 'UXBG6H5AZUROX66YZHARU3UK42VTIP', 'Ficha Técnica Empilhadeira Diesel NTK D3648 Amarela', NULL, 0, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSite_KQNM1F6REQOWN67HSYWXMTI70NLZEN.png', 'png', 'WUOPM5Y909PB57N0AF6W0BLRS20DU0', '2025-09-02 15:01:12', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101591, 'G82818UETHTY4SMY1P97L00Y66RQ4E', 'Thumb empilhadeira Diesel D3648 Amarela', NULL, 0, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSite_H6XLKOEEJT5CRLNGR8QYHTJ0XKXUDE.jpg', 'jpg', 'WUOPM5Y909PB57N0AF6W0BLRS20DU0', '2025-09-02 15:01:12', NULL, NULL, NULL, NULL, NULL, 'on'),
(1101592, 'Q8T8BATF13FF97J7SCX2LS13CI2G3F', 'paleteira elétrica verde e2000', NULL, 0, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSite_LK9EOFOJJFKOW61II7HZTTW123R9A3.png', 'png', '7TPRMNYZUE4B49PH65ZOL08IMERN40', '2025-09-05 12:16:52', NULL, NULL, NULL, NULL, NULL, 'xx'),
(1101593, 'SOZSJTDV2NPON5WZM6G1A8FVCJAG9W', 'ficha técnica paleteira elétrica verde bateria de lítio', NULL, 0, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSite_1FAN3L5LMQQE6K140QSMJMK30VVYB4.jpg', 'jpg', '7TPRMNYZUE4B49PH65ZOL08IMERN40', '2025-09-05 12:17:06', NULL, NULL, NULL, NULL, NULL, 'xx');

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
(1, '::1', '2025-08-13 17:34:00', 20, NULL, NULL, '13/08/2025 14:34:22 - Login vendedor\n13/08/2025 14:34:16 - Login vendedor\n13/08/2025 14:24:47 - Login vendedor\n13/08/2025 14:07:29 - Login vendedor\n13/08/2025 14:07:29 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:06 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n13/08/2025 14:05 - Login vendedor\n'),
(2, '177.91.225.196', '2025-09-05 13:13:00', 1, NULL, NULL, '05/09/2025 09:13:36 - Login usuario\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `linhas`
--

CREATE TABLE `linhas` (
  `intern` int(6) NOT NULL,
  `id_key` varchar(30) DEFAULT NULL,
  `nome` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `linhas`
--

INSERT INTO `linhas` (`intern`, `id_key`, `nome`) VALUES
(1, '34213434324', 'Linha Amarela\r\n'),
(2, 'we3333333', 'Linha Agro'),
(5, 'ss3322323232dsdd', 'Linha Movimentação Logística');

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
(5, '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', 'Ford', NULL),
(6, 'PRXR8QWM55XUHJRNXEJ3XA3SW3CBER', 'ss3322323232dsdd', '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', 'Netmak', NULL),
(8, 'ETJT0DFIM6AKWUH6PLG98DGR1PXJSP', 'ss3322323232dsdd', 'XX9FZLYNLEEHZCJ4ZGQCEM7JCD5ILA', 'NTK', NULL);

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
(9, 'UYZ3VHW3W04WSLXJF4VMU2FYHWG5ZY', 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'teste carlos', '2001/2023', NULL),
(16, 'FC1608A8ODW5MSKZJO6AINU8GPUIHA', 'ss3322323232dsdd', 'XX9FZLYNLEEHZCJ4ZGQCEM7JCD5ILA', 'ETJT0DFIM6AKWUH6PLG98DGR1PXJSP', 'E2000', '-', NULL),
(17, '787R9S2V88MVZQEFF8XR00LG9U2RFE', 'ss3322323232dsdd', '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', 'PRXR8QWM55XUHJRNXEJ3XA3SW3CBER', 'D3648', '-', NULL);

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
  `slug` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`interno`, `id_key`, `titulo`, `descrip`, `modelos`, `tipo`, `preco`, `preco_oferta`, `id_key_categoria`, `seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`, `descrip_seo`, `titulo_seo`, `slug`) VALUES
(3, 'NT4M580KKSTFFT8PB958OIWI7UBBFH', 'Amortecedor', '<p>teste</p>', NULL, 1, 123.50, 0.00, '--', '', NULL, 0.00, '', 0, '', NULL, NULL, '');

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
(1, 'TCW6F0PXXNGONI8TOL2DDLS2IBM88S', '', NULL, '1', 'UEW052HKRR2ICFEFZXPT83JO5TBFV9'),
(2, 'ULXJR5HFOBS5BGEIAPFHGOY0W30LUS', '', NULL, '4', 'NT4M580KKSTFFT8PB958OIWI7UBBFH'),
(3, 'R9DM0NTMF5U9PI4I62GRB8XPKF2YMR', 'empilhadeira-diesel-d3648-amarela', NULL, '1', 'WUOPM5Y909PB57N0AF6W0BLRS20DU0'),
(4, 'NO2IJ72D9YQZ0XI6AB3ZFPSAYLTBB1', 'paleteira-eletrica-ntk-e2000-litio', NULL, '1', '7TPRMNYZUE4B49PH65ZOL08IMERN40');

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
(13, 'OY7D5QMT63IYWA7EB1RV7PY1ASWHFF', 'carlos.alonso', 'Lx1FAwQ=', 'Carlos Alonso', NULL, 'sistemas10.info@gmail.com', '(47) 99980-0801', '', '', NULL, '', 1, 0, NULL, '', 'planetaprogramador', '', '', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgAvatar_MXRATF3XSR8V24UX64YA2I5JWJPB9T.png', 0, 'a6a86777fde1c71891ce80385baf255d', '2025-09-05 09:03:00', '177.91.227.17'),
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
  `condicao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`interno`, `id_key`, `titulo`, `descrip`, `especifica`, `tipo`, `id_key_vendedor`, `preco`, `id_key_linha`, `id_key_categoria`, `id_key_marca`, `id_key_modelo`, `seo`, `descrip_seo`, `titulo_seo`, `link_seo`, `comic`, `comic_fixa`, `apagado`, `estado`, `slug`, `motor`, `tipo_torre`, `cap_carga`, `cap_elevacao`, `codigo`, `locacao`, `periodo_locacao`, `valor_locacao`, `horimetro`, `ano_fabricacao`, `estado_veiculo`, `uf`, `cidade`, `condicao`) VALUES
(3, 'UEW052HKRR2ICFEFZXPT83JO5TBFV9', 'Empilhadeira X4 22 - Excelente opção de compra ', '<p>teste<br>gostei do negocio..<br>para mim tudo certo..<br><br></p>', '<p>Teste de especificações.<br>Porque funciona ok o quebra linha.<br><br>Att.<br><br></p>', 1, '--', 120000.00, 'ss3322323232dsdd', '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', 'PRXR8QWM55XUHJRNXEJ3XA3SW3CBER', 'STWT8HU9O3H83H2ESN31G1VO3JCW31', 'Teste do sistema teste', 'Descrip SEO', 'titulo SEO', 'https://localhost//cw3/NetMakProprio/tmp_files/ImgSeo_Q8XASQERRZ2R1Q5RR1JOHXNO52WS9R.png', 0.00, '', 0, '9', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'H0BUWHDBOCMNKP73VZB1TV0JSXU6PM', 'Linda empilhadeira.', '<p>teste do sistema..<br><br><br></p>', '', 2, '2IZY9VJDBRT849HIOXHA3ME84X0BIA', 12000.00, '--', '--', '--', '--', NULL, NULL, NULL, NULL, NULL, 'N', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'K2RWZJYXUUUAVCVNP4C1MT0Q3LZNW5', 'Teste maquina 01', NULL, NULL, 1, '--', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'SO19Q516ZKVQLYAOUQ41AJ9FYFGDWI', 'Teste maquina 01', '<p>teste 01</p>', '<p>teste 02</p>', 2, '4K5AU27VMI2K1ULF2OSK93K1ANTJ1X', 120.00, 'we3333333', 'KXDTGBZ89IXOM754O18XDJP89Z8ZCV', '55BYPOXMC1O1FFF938J4JE1J50NTHF', 'UYZ3VHW3W04WSLXJF4VMU2FYHWG5ZY', NULL, NULL, NULL, NULL, NULL, 'N', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'S', NULL, 0.00, 0, NULL, 'Ótimo estado', 'xx', '', 'Semi-nova'),
(11, 'GSM67F05TDNKM7IGQTVT443XY4JBNL', 'Novo veículo', '', '', 2, '4K5AU27VMI2K1ULF2OSK93K1ANTJ1X', 0.00, 'we3333333', 'V70X4ZNK34VKPP8PDZ5LE2JMXF6GXM', '--', '--', NULL, NULL, NULL, NULL, NULL, 'N', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'WUOPM5Y909PB57N0AF6W0BLRS20DU0', 'Empilhadeira Diesel Netmak D3648 3,6 Ton Torre Triplex 4,8 m Amarela', '<style type=\"text/css\">h2 {\r\n    font-size: 2rem !important;\r\n    line-height: 1.09 !important;\r\n    margin-bottom: 20px !important;\r\n  }\r\n\r\n  .container-tabela-produto {\r\n    width: 80%;\r\n  }\r\n\r\n  #produto_preco #precoDe {\r\n    margin-top: 2rem;\r\n  }\r\n\r\n  .box-frete {\r\n    display: none !important;\r\n  }\r\n\r\n  p strong {\r\n    font-size: 24px;\r\n  }\r\n\r\n  .container-tabela-produto table td {\r\n    font-size: 20px;\r\n    padding: 5px 2px;\r\n  }\r\n\r\n  #ficha {\r\n    display: none;\r\n  }\r\n\r\n  .box-frete {\r\n    display: none !important;\r\n  }\r\n\r\n  .header-descricao-produto p {\r\n    width: 90%;\r\n    font-size: 24px;\r\n    color: #000 !important;\r\n    margin-bottom: 0;\r\n  }\r\n\r\n  .container-slides {\r\n    margin: 0;\r\n    padding: 0;\r\n    top: 10%;\r\n  }\r\n\r\n  .content-slides {\r\n    height: 450px;\r\n    width: 1348px;\r\n    border-radius: 5px;\r\n    overflow: hidden;\r\n    position: relative;\r\n    margin-top: 5%;\r\n    background: #ffc000;\r\n  }\r\n\r\n  .navigation-slides {\r\n    position: absolute;\r\n    bottom: 2%;\r\n    left: 50%;\r\n    display: flex;\r\n  }\r\n\r\n  .bar-slides {\r\n    width: 50px;\r\n    height: 10px;\r\n    border: 1px solid #000;\r\n    margin: 5px;\r\n    border-radius: 5px;\r\n    cursor: pointer;\r\n    transition: 0.6s;\r\n  }\r\n\r\n  .bar-slides:hover {\r\n    background-color: #000;\r\n  }\r\n\r\n  .container-slides input {\r\n    display: none;\r\n  }\r\n\r\n  .slides {\r\n    display: flex;\r\n    width: 500%;\r\n    height: 100%;\r\n  }\r\n\r\n  .slide {\r\n    width: 20%;\r\n    transition: 0.6s;\r\n  }\r\n\r\n  .slide .container-transition-slides {\r\n    width: 100%;\r\n    height: 100%;\r\n    margin-top: 1.5rem !important;\r\n    padding: 0 2rem;\r\n  }\r\n\r\n  #slide1:checked~.s1 {\r\n    margin-left: 0;\r\n  }\r\n\r\n  #slide2:checked~.s1 {\r\n    margin-left: -20%;\r\n  }\r\n\r\n  #slide3:checked~.s1 {\r\n    margin-left: -40%;\r\n  }\r\n\r\n  #slide4:checked~.s1 {\r\n    margin-left: -60%;\r\n  }\r\n\r\n  .bar-slides span {\r\n    visibility: hidden;\r\n  }\r\n\r\n  .header-descricao-produto ul li {\r\n    font-size: 24px;\r\n    color: #000 !important;\r\n  }\r\n\r\n  .texto-container-tabela {\r\n    width: 80%;\r\n  }\r\n\r\n  .container-padding {\r\n    padding-left: 2rem;\r\n  }\r\n\r\n    @media (max-width: 770px) {\r\n        *{\r\n          margin: 0;\r\n          padding: 0;\r\n         }\r\n\r\n        .header-descricao-produto{\r\n            width: 100% !important;\r\n         }\r\n        .first-table {\r\n            margin-top: 0 !important;\r\n        }\r\n\r\n        .container-conteudo {\r\n            flex-direction: column !important;\r\n            text-align: center;\r\n            padding: 15px !important;\r\n        }\r\n\r\n        .foto-produto {\r\n            width: 100% !important;\r\n        }\r\n\r\n        .header-descricao-produto p {\r\n            width: 100% !important;\r\n            font-size: 17px !important;\r\n            text-align: left;\r\n            line-height: 1.2em !important;\r\n        }\r\n\r\n        .container-tabela-produto {\r\n            width: 100% !important;\r\n            margin: 0 !important;\r\n            padding: 0 !important;\r\n        }\r\n\r\n        .container-tabela-produto table {\r\n            width: 100% !important;\r\n        }\r\n\r\n        .content-slides {\r\n            width: 100% !important;\r\n            margin-top: 12% !important;\r\n            height: 700px !important;\r\n        }\r\n\r\n        .imagem-slides {\r\n            width: 100% !important;\r\n        }\r\n\r\n        .header-descricao-produto ul li {\r\n            font-size: 18px !important;\r\n            text-align: left;\r\n            line-height: 1.48em !important;\r\n        }\r\n\r\n        #container-transition h1 {\r\n            font-size: 18px !important;\r\n            /* text-align: center!important; */\r\n        }\r\n    #container-transition h2 {\r\n     font-size: 1.5rem !important;\r\n      /* text-align: center!important; */\r\n    line-height: 1.09;\r\n    margin-bottom: 20px;\r\n    display: flex\r\n;\r\n    }\r\n        .navigation-slides {\r\n            left: 20%;\r\n        }\r\n\r\n        .container-transition-slides {\r\n            gap: 0 !important;\r\n        }\r\n\r\n        .header-descricao-produto {\r\n            margin-top: 0 !important;\r\n        }\r\n\r\n        #texto-grande {\r\n            width: 100% !important;\r\n            font-size: 17px !important;\r\n            text-align: left;\r\n        }\r\n\r\n        .header-descricao-produto h1 {\r\n            font-size: 20px !important;\r\n            text-align: left !important;\r\n        }\r\n .header-descricao-produto h2 {\r\n      font-size: 20px !important;\r\n font-size: 1.5rem !important;\r\n      /* text-align: center!important; */\r\n    line-height: 1.09;\r\n    margin-bottom: 20px;\r\n    display: flex\r\n;    }\r\n        .slide .container-transition-slides {\r\n            padding: 0 20px !important;\r\n            flex-direction: column !important;\r\n        }\r\n\r\n        .container-imagem03,\r\n        .container-imagem02,\r\n        .container-imagem04,\r\n        .container-imagem05,\r\n        .container-imagem06 {\r\n            text-align: center;\r\n            width: 100% !important;\r\n        }\r\n\r\n        .container-imagem01 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-imagem02 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-imagem03 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-imagem04 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-imagem05 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-imagem06 img{\r\n            width: 100% !important;\r\n         }\r\n        .container-tabela-produto table td {\r\n            font-size: 18px !important;\r\n        }\r\n\r\n        .texto-container-tabela {\r\n            width: 100% !important;\r\n        }\r\n\r\n        .texto-container-tabela p {\r\n            margin-bottom: 0 !important;\r\n            text-align: left;\r\n        }\r\n\r\n        .table-final-container {\r\n            margin-top: -2%;\r\n        }\r\n\r\n\r\n    }\r\n</style>\r\n<!-- \r\n  \r\n -->\r\n<div class=\"container-descricao-produto\">\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; gap: 2rem\">\r\n<div class=\"header-descricao-produto\" style=\"width: 100%\">\r\n<p style=\"justify-content: left;\">A D3648 combina força, estabilidade e alta elevação. É a escolha certa para indústrias pesadas, depósitos logísticos verticalizados e pátios de armazenagem com múltiplos níveis de estocagem.</p>\r\n</div>\r\n\r\n<div class=\"container-tabela-produto\" style=\"width: 100%\"><!-- <table class=\"first-table\" style=\"margin-top: 1rem; margin-top: 19%\">\r\n        <tbody>\r\n          <tr style=\"line-height: 2\">\r\n            <td style=\"display: flex; align-items: center\">\r\n              <svg\r\n                class=\"bi bi-arrow-up-square-fill\"\r\n                fill=\"currentColor\"\r\n                viewbox=\"0 0 16 16\"\r\n                width=\"25\"\r\n                xmlns=\"http://www.w3.org/2000/svg\"\r\n              >\r\n                <path\r\n                  d=\"M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0\"\r\n                ></path>\r\n              </svg>\r\n              <b> Altura máxima da  plataforma</b>\r\n            </td>\r\n            <td>6 metros</td>\r\n          </tr>\r\n          <tr style=\"line-height: 2\">\r\n            <td style=\"display: flex; align-items: center\">\r\n              <svg\r\n                class=\"bi bi-wrench\"\r\n                fill=\"currentColor\"\r\n                viewbox=\"0 0 16 16\"\r\n                width=\"25\"\r\n                xmlns=\"http://www.w3.org/2000/svg\"\r\n              >\r\n                <path\r\n                  d=\"M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11z\"\r\n                ></path>\r\n              </svg>\r\n              <b> Altura máxima de trabalho</b>\r\n            </td>\r\n            <td>8 metros</td>\r\n          </tr>\r\n          <tr style=\"line-height: 2\">\r\n            <td style=\"display: flex; align-items: center\">\r\n              <svg\r\n                class=\"bi bi-bag-fill\"\r\n                fill=\"currentColor\"\r\n                viewbox=\"0 0 16 16\"\r\n                width=\"25\"\r\n                xmlns=\"http://www.w3.org/2000/svg\"\r\n              >\r\n                <path\r\n                  d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z\"\r\n                ></path>\r\n              </svg>\r\n              <b> Capacidade de carga</b>\r\n            </td>\r\n            <td>230 quilos</td>\r\n          </tr>\r\n          <tr style=\"line-height: 2\">\r\n            <td style=\"display: flex; align-items: center\">\r\n              <svg\r\n                class=\"bi bi-battery-full\"\r\n                fill=\"currentColor\"\r\n                viewbox=\"0 0 16 16\"\r\n                width=\"28\"\r\n                xmlns=\"http://www.w3.org/2000/svg\"\r\n              >\r\n                <path d=\"M2 6h10v4H2z\"></path>\r\n                <path\r\n                  d=\"M2 4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm10 1a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm4 3a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8\"\r\n                ></path>\r\n              </svg>\r\n              <b> Bateria</b>\r\n            </td>\r\n            <td>Lítio, 24v/135Ah</td>\r\n          </tr>\r\n        </tbody>\r\n      </table> -->\r\n<table class=\"first-table\" style=\"margin-top: 1rem; margin-top: 19%\">\r\n	<tbody>\r\n		<tr style=\"line-height: 2\">\r\n			<td style=\"display: flex; align-items: center\"><svg class=\"bi bi-bag-fill\" fill=\"currentColor\" viewBox=\"0 0 16 16\" width=\"25\" xmlns=\"http://www.w3.org/2000/svg\"> <path d=\"M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z\"> </path> </svg> <b> Capacidade de carga</b></td>\r\n			<td>3,6 toneladas</td>\r\n		</tr>\r\n		<tr style=\"line-height: 2\">\r\n			<td style=\"display: flex; align-items: center\"><svg class=\"bi bi-arrow-up-square-fill\" fill=\"currentColor\" viewBox=\"0 0 16 16\" width=\"25\" xmlns=\"http://www.w3.org/2000/svg\"> <path d=\"M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0\"> </path> </svg> <b> Capacidade de elevação</b></td>\r\n			<td>4,8 metros</td>\r\n		</tr>\r\n		<!-- <tr style=\"line-height: 2\">\r\n            <td style=\"display: flex; align-items: center\">\r\n              <svg class=\"bi bi-battery-full\" fill=\"currentColor\" viewbox=\"0 0 16 16\" width=\"28\"\r\n                xmlns=\"http://www.w3.org/2000/svg\">\r\n                <path d=\"M2 6h10v4H2z\"></path>\r\n                <path\r\n                  d=\"M2 4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm10 1a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm4 3a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8\">\r\n                </path>\r\n              </svg>\r\n              <b> Bateria</b>\r\n            </td>\r\n            <td>12V/71Ah</td>\r\n          </tr> -->\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; gap: 2rem; margin-top: 5%\">\r\n<div class=\"container-imagem05\"><img alt=\"Empilhadeira Diesel Netmak D3648 3,6 Ton Torre Triplex 4,8 m Amarela\" class=\"imagem-slides\" src=\"https://images.tcdn.com.br/img/img_prod/967402/empilhadeira_diesel_netmak_d3648_3_6_ton_torre_triplex_4_8_m_amarela_4290_3_d73559ba8db3c4b47a5962bd36c06e62.jpg\" style=\"max-width: 400px\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<h2 style=\"justify-content: left\">Controle e tração em qualquer terreno </h2>\r\n\r\n<p>Seu conjunto de rodado simples com pneus pneumáticos reforçados garante aderência e estabilidade em ambientes externos. O freio hidráulico proporciona frenagem precisa, mesmo com carga total, enquanto o raio de giro e a altura livre ao solo oferecem manobrabilidade e segurança durante toda a operação.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"\r\n      padding: 20px;\r\n      margin-top: 5%;\r\n      display: flex;\r\n      flex-direction: row;\r\n      gap: 2rem;\r\n      background: #ffc000;\r\n      border-radius: 10px;\r\n    \">\r\n<div class=\"header-descricao-produto\" style=\"margin-top: 2rem\">\r\n<h2 style=\"justify-content: left\">Motor econômico com performance contínua </h2>\r\n\r\n<p>Equipada com o motor Xinchai A495 e transmissão automática YQX, a empilhadeira entrega alto torque com baixo consumo e condução fluida.  A D3648 possui ótima autonomia operacional, reduzindo a necessidade de reabastecimento constante. </p>\r\n</div>\r\n\r\n<div class=\"container-imagem04\"><img alt=\"motor Xinchai A495\" class=\"imagem-slides\" src=\"https://d335luupugsy2.cloudfront.net/cms/files/981205/1751049752/$ql0zi35nv8\" style=\"max-width: 400px\"></div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; margin-top: 5%; gap: 2rem\">\r\n<div class=\"container-imagem06\"><img alt=\"Empilhadeira Diesel D3648 3,6 Ton Torre Triplex 4,8 m Amarela\" class=\"foto-produto\" src=\"https://images.tcdn.com.br/img/img_prod/967402/empilhadeira_diesel_netmak_d3648_3_6_ton_torre_triplex_4_8_m_amarela_4290_4_573ad40e7fb3544ab69ccdd94ae40a3c.jpg\" style=\"max-width: 400px\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<div style=\"margin-bottom: 20px\">\r\n<h2 style=\"justify-content: left\">Altura e robustez a serviço da produtividade </h2>\r\n\r\n<p>A Netmak D3648 é a solução ideal para operações de carga em altura com demanda constante de desempenho, sem abrir mão da eficiência energética, segurança e durabilidade em qualquer tipo de operação. </p></div></div></div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; margin-top: 5%; gap: 2rem\">\r\n<div class=\"container-imagem06\"><img alt=\"\" src=\"https://d335luupugsy2.cloudfront.net/cms/files/981205/1751395022/$m3mgpqjd73g\" style=\"max-width: 400px;\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<h2 style=\"justify-content: left\">Garantia e segurança para você e seu negócio</h2>\r\n\r\n<p>Para ter mais segurança e confiança no seu investimento, os equipamentos da marca NTK possuem garantia de 12 meses ou 1.000 horas, o que vencer primeiro. </p>\r\n\r\n<p>Durante este período, se ocorrer algum problema com a empilhadeira, você pode comunicar o SAC - Suporte ao Cliente e solicitar a resolução do problema.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; margin-top: 5%; gap: 2rem\">\r\n<div class=\"container-imagem06\"><img alt=\"\" src=\"https://images.tcdn.com.br/img/editor/up/967402/pos_venda_3.png\" style=\"max-width: 400px;\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<h2 style=\"justify-content: left\">Suporte durante toda vida útil do equipamento</h2>\r\n\r\n<p>A Netmak disponibiliza suporte técnico durante toda a vida útil da sua empilhadeira.</p>\r\n\r\n<p>Surgiu problema mecânico? Fique tranquilo! <br>\r\nVocê pode acionar um dos mais de 230 mecânicos credenciados em todo país. </p>\r\n\r\n<p>Se você precisar de peças de reposição, a loja virtual da Netmak possui mais de 1000 itens compatíveis com diversas marcas.</p>\r\n</div>\r\n</div>\r\n', '<table class=\"table-final\"><tbody><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Capacidade Nominal</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">3600 Quilos</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Centro de Carga</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">500 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Tipo de Torre</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Triplex</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Altura de Elevação</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">4800 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Inclinação da Torre Para Frente/Para Trás</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">6º/12º</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Altura da Torre Abaixada</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">2125 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Altura da Cabine</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">2190 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Comprimento da Empilhadeira Sem os Garfos</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">2860 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Largura Total</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">1225 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Dimensões dos Garfos</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">1220 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Raio de Giro</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">2510 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Distância Entre Eixos</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">1750 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Altura em Relação ao Solo</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">150 Milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Tipo de Freio</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Hidráulico</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Tipo do Pneu</span></td><td style=\"font-size: 20px; padding: 5px 2px;\"><span data-teams=\"true\">Pneumático</span></td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Rodado</span></td><td style=\"font-size: 20px; padding: 5px 2px;\"><span data-teams=\"true\">Simples</span></td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Peso da Empilhadeira</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">4750 Quilos</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Motor</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Xinchai A495BPG</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Capacidade do Tanque Combustível</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">50 Litros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Capacidade do Tanque Hidráulico</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">38 Litros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Transmissão Automática</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">YQX</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Voltagem e Capacidade da Bateria</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">12/80 Volt/Amperes</td></tr></tbody></table>', 1, '--', 89900.00, 'ss3322323232dsdd', '0GYUDY03HKSJNZAQ7CMHBOO34DFAC2', 'PRXR8QWM55XUHJRNXEJ3XA3SW3CBER', 'N2C3FLHC1WX1WRS9XWKV63ZA915GLV', 'empilhadeira diesel netmak, empilhadeira a diesel, empilhadeira 3600kg', 'A Empilhadeira Diesel Netmak D3648 é a escolha certa para indústrias pesadas, depósitos logísticos verticalizados e pátios de armazenagem com múltiplos níveis de estocagem.', 'Empilhadeira Diesel Netmak D3648 3,6 Ton Torre Triplex 4,8 m Amarela', 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/ImgSeo_2J4LWTP5M3KTIX081KC316GHH7TZBI.jpg', 5.00, '', 0, '9', 'empilhadeira-diesel-d3648-amarela', 'Diesel', 'Triplex', '3600kg', '4 a 5 metro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '7TPRMNYZUE4B49PH65ZOL08IMERN40', 'Paleteira Elétrica NTK E2000 Lítio', '<style type=\"text/css\">.container-tabela-produto {\r\n    width: 80%;\r\n  }\r\n\r\n  #produto_preco #precoDe {\r\n    margin-top: 2rem;\r\n  }\r\n\r\n  .box-frete {\r\n    display: none !important;\r\n  }\r\n\r\n  p strong {\r\n    font-size: 24px;\r\n  }\r\n\r\n  .container-tabela-produto table td {\r\n    font-size: 20px;\r\n    padding: 5px 2px;\r\n  }\r\n\r\n  #ficha {\r\n    display: none;\r\n  }\r\n\r\n  .box-frete {\r\n    display: none !important;\r\n  }\r\n\r\n  .header-descricao-produto p {\r\n    width: 90%;\r\n    font-size: 24px;\r\n    color: #000 !important;\r\n    margin-bottom: 0;\r\n  }\r\n\r\n  .container-slides {\r\n    margin: 0;\r\n    padding: 0;\r\n    top: 10%;\r\n  }\r\n\r\n  .content-slides {\r\n    height: 450px;\r\n    width: 1348px;\r\n    border-radius: 5px;\r\n    overflow: hidden;\r\n    position: relative;\r\n    margin-top: 5%;\r\n    background: #ffc000;\r\n  }\r\n\r\n  .navigation-slides {\r\n    position: absolute;\r\n    bottom: 2%;\r\n    left: 50%;\r\n    display: flex;\r\n  }\r\n\r\n  .bar-slides {\r\n    width: 50px;\r\n    height: 10px;\r\n    border: 1px solid #000;\r\n    margin: 5px;\r\n    border-radius: 5px;\r\n    cursor: pointer;\r\n    transition: 0.6s;\r\n  }\r\n\r\n  .bar-slides:hover {\r\n    background-color: #000;\r\n  }\r\n\r\n  .container-slides input {\r\n    display: none;\r\n  }\r\n\r\n  .slides {\r\n    display: flex;\r\n    width: 500%;\r\n    height: 100%;\r\n  }\r\n\r\n  .slide {\r\n    width: 20%;\r\n    transition: 0.6s;\r\n  }\r\n\r\n  .slide .container-transition-slides {\r\n    width: 100%;\r\n    height: 100%;\r\n    margin-top: 1.5rem !important;\r\n    padding: 0 2rem;\r\n  }\r\n\r\n  #slide1:checked ~ .s1 {\r\n    margin-left: 0;\r\n  }\r\n\r\n  #slide2:checked ~ .s1 {\r\n    margin-left: -20%;\r\n  }\r\n\r\n  #slide3:checked ~ .s1 {\r\n    margin-left: -40%;\r\n  }\r\n\r\n  #slide4:checked ~ .s1 {\r\n    margin-left: -60%;\r\n  }\r\n\r\n  .bar-slides span {\r\n    visibility: hidden;\r\n  }\r\n\r\n  .header-descricao-produto ul li {\r\n    font-size: 24px;\r\n    color: #000 !important;\r\n  }\r\n\r\n  .texto-container-tabela {\r\n    width: 80%;\r\n  }\r\n\r\n  .container-padding {\r\n    padding-left: 2rem;\r\n  }\r\n\r\n  @media (max-width: 770px) {\r\n    .first-table {\r\n      margin-top: none !important;\r\n    }\r\n\r\n    .container-conteudo {\r\n      flex-direction: column !important;\r\n      text-align: center;\r\n      padding: 15px !important;\r\n    }\r\n\r\n    .foto-produto {\r\n      max-width: 300px !important;\r\n    }\r\n\r\n    .header-descricao-produto p {\r\n      width: 100% !important;\r\n      font-size: 17px !important;\r\n      text-align: left;\r\n      line-height: 1.2em !important;\r\n    }\r\n\r\n    .container-tabela-produto {\r\n      width: 100% !important;\r\n    }\r\n\r\n    .container-tabela-produto table {\r\n      width: 100% !important;\r\n    }\r\n\r\n    .content-slides {\r\n      width: 100% !important;\r\n      margin-top: 12% !important;\r\n      height: 700px !important;\r\n    }\r\n\r\n    .imagem-slides {\r\n      max-width: 300px !important;\r\n    }\r\n\r\n    .header-descricao-produto ul li {\r\n      font-size: 18px !important;\r\n      text-align: left;\r\n      line-height: 1.48em !important;\r\n    }\r\n\r\n    #container-transition h1 {\r\n      font-size: 18px !important;\r\n      /* text-align: center!important; */\r\n    }\r\n\r\n    .navigation-slides {\r\n      left: 20%;\r\n    }\r\n\r\n    .container-transition-slides {\r\n      gap: 0 !important;\r\n    }\r\n\r\n    .header-descricao-produto {\r\n      margin-top: 0 !important;\r\n    }\r\n\r\n    #texto-grande {\r\n      width: 100% !important;\r\n      font-size: 17px !important;\r\n      text-align: left;\r\n    }\r\n\r\n    .header-descricao-produto h1 {\r\n      font-size: 20px !important;\r\n      text-align: left !important;\r\n    }\r\n\r\n    .slide .container-transition-slides {\r\n      padding: 0 20px !important;\r\n      flex-direction: column !important;\r\n    }\r\n\r\n    .container-imagem03,\r\n    .container-imagem02,\r\n    .container-imagem04,\r\n    .container-imagem05,\r\n    .container-imagem06 {\r\n      text-align: center;\r\n      margin-bottom: 1.5rem;\r\n    }\r\n\r\n    .container-tabela-produto table td {\r\n      font-size: 18px !important;\r\n    }\r\n\r\n    .texto-container-tabela {\r\n      width: 100% !important;\r\n    }\r\n\r\n    .texto-container-tabela p {\r\n      margin-bottom: 0 !important;\r\n      text-align: left;\r\n    }\r\n\r\n    .table-final-container {\r\n      margin-top: -2%;\r\n    }\r\n  }\r\n</style>\r\n<div class=\"container-descricao-produto\">\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; gap: 2rem\">\r\n<div class=\"header-descricao-produto\" style=\"width: 100%\">\r\n<p>A paleteira elétrica NTK E2000 é a solução ideal para a movimentação eficiente de cargas paletizadas em supermercados, setores do varejo, galpões e centros de distribuição.</p>\r\n\r\n<p>Esse equipamento resistente é feito de aço carbono, garantindo durabilidade e confiabilidade.</p>\r\n</div>\r\n\r\n<div class=\"container-tabela-produto\" style=\"width: 100%\">\r\n<table class=\"first-table\" style=\"margin-top: 1rem; margin-top: 19%\">\r\n	<tbody>\r\n		<tr style=\"line-height: 2\">\r\n			<td style=\"display: flex; align-items: center\"><svg class=\"bi bi-arrow-up-square-fill\" fill=\"currentColor\" viewBox=\"0 0 16 16\" width=\"25\" xmlns=\"http://www.w3.org/2000/svg\"> <path d=\"M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0\"></path> </svg> <b>&nbsp;Capacidade de carga</b></td>\r\n			<td>2,0 toneladas</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"display: flex; align-items: center\"><svg class=\"bi bi-battery-full\" fill=\"currentColor\" viewBox=\"0 0 16 16\" width=\"28\" xmlns=\"http://www.w3.org/2000/svg\"> <path d=\"M2 6h10v4H2z\"></path> <path d=\"M2 4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm10 1a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm4 3a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8\"> </path> </svg> <b>&nbsp;Bateria</b></td>\r\n			<td>Lítio 24V/40aH</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; gap: 2rem; margin-top: 5%\">\r\n<div class=\"container-imagem05\"><img alt=\"foto transpalete ambientada\" class=\"imagem-slides\" src=\"https://images.tcdn.com.br/img/img_prod/967402/paleteira_eletrica_ntk_e2000_litio_3896_3_80552f2039ee3ea0a8292c09a578b3dc.jpeg\" style=\"max-width: 400px\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<h2 style=\"justify-content: left\">Manuseio fácil com direção eletrônica</h2>\r\n\r\n<p>Com rodas duplas em poliuretano e raio de giro de 1,40 m, é fácil de manobrar em corredores operacionais de até 2,5 m.</p>\r\n\r\n<p>A altura do timão para condução é ajustada a uma posição ergonômica, garantindo conforto ao operador durante o uso</p>\r\n\r\n<p>Atinge até 4,2 km/h com cargas a bordo e possibilita movimentar cargas com agilidade e segurança, já que possui freio regenerativo eletromagnético.</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"\r\n      padding: 20px;\r\n      margin-top: 5%;\r\n      display: flex;\r\n      flex-direction: row;\r\n      gap: 2rem;\r\n      background: #ffc000;\r\n      border-radius: 10px;\r\n    \">\r\n<div class=\"header-descricao-produto\" style=\"margin-top: 2rem\">\r\n<h2 style=\"justify-content: left\">Bateria de lítio com autonomia para turnos longos</h2>\r\n\r\n<p><span background-color:=\"\" font-size:=\"\" pathway=\"\" style=\"color: rgb(0, 0, 0); font-family: \">Possui bateria de lítio de 24V/40Ah, com autonomia de trabalho de até 3 horas. Com carregamento rápido, leva cerca de 2 horas para recarga completa.</span></p>\r\n\r\n<p>Com alta capacidade de armazenamento de energia e manutenção econômica, a E2000 pode operar em locais fechados e com outras pessoas, já que não emite gases ou fumaça poluente.</p>\r\n</div>\r\n\r\n<div class=\"container-imagem04\"><img alt=\"bateria de lítio\" class=\"imagem-slides\" src=\"https://tray-phpassets-tmp.s3.sa-east-1.amazonaws.com/temp_967402_6881146ee66a9_dete20002.jpg\" style=\"max-width: 400px; width: 400px; height: 400px;\"></div>\r\n</div>\r\n\r\n<div class=\"container-conteudo container-padding\" style=\"display: flex; flex-direction: row; margin-top: 5%; gap: 2rem\">\r\n<div class=\"container-imagem06\"><img alt=\"paleteira elétrica ambientada\" class=\"foto-produto\" src=\"https://images.tcdn.com.br/img/img_prod/967402/paleteira_eletrica_ntk_e2000_litio_3896_4_92e15cc000174091105a64cf6d27a37c.jpeg\" style=\"max-width: 400px\"></div>\r\n\r\n<div class=\"header-descricao-produto\">\r\n<div style=\"margin-bottom: 20px\">\r\n<h2 style=\"justify-content: left\">Movimente cargas sem esforço</h2>\r\n\r\n<ul>\r\n	<li><img alt=\"\" src=\"https://cdn4.iconfinder.com/data/icons/materia-flat-interface-vol-2/24/008_078_checkbox_check_box_control_checked-512.png\" style=\"width: 35px; vertical-align: middle; margin-top: -5px\"> A NTK E2000 é totalmente elétrica e não exige esforço físico para a movimentação de cargas de até 2,0 toneladas.</li>\r\n	<li><img alt=\"\" src=\"https://cdn4.iconfinder.com/data/icons/materia-flat-interface-vol-2/24/008_078_checkbox_check_box_control_checked-512.png\" style=\"width: 35px; vertical-align: middle; margin-top: -5px\"> Os garfos possuem elevação automática de até 195 mm que permitem um encaixe facilitado em paletes de mercadorias.<!-- <li>\r\n            <img\r\n              src=\"https://cdn4.iconfinder.com/data/icons/materia-flat-interface-vol-2/24/008_078_checkbox_check_box_control_checked-512.png\"\r\n              style=\"width: 35px; vertical-align: middle; margin-top: -5px\"\r\n            />\r\n            Pneus pneumáticos e raio de giro de 2,4 metros: ótimo desempenho e\r\n            estabilidade em diversos ambientes. Permite adicionar rodado duplo\r\n            ou trocar por pneus maciços.\r\n          </li> --></li>\r\n	<li><img alt=\"\" src=\"https://cdn4.iconfinder.com/data/icons/materia-flat-interface-vol-2/24/008_078_checkbox_check_box_control_checked-512.png\" style=\"color: rgb(0, 0, 0); font-size: 24px; width: 35px; vertical-align: middle; margin-top: -5px;\">&nbsp;Atinge até 4,2 km/h com cargas a bordo e possibilita movimentar cargas com agilidade e segurança, já que possui freio regenerativo eletromagnético.</li></ul></div></div></div>\r\n</div>\r\n', '<table class=\"table-final\"><tbody><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Capacidade de carga</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">2,0 toneladas</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Capacidade de elevação</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">195 milímetros</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Bateria</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Lítio 24V/40aH</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Freio</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Regenerativo Eletromagnético</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Medidas do garfo</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">1150 x 155 x 55 mm</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Rodas</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">Duplas, Poliuretano</td></tr><tr style=\"line-height: 2.5;\"><td style=\"font-size: 20px; padding: 5px 2px;\"><span style=\"font-weight: bolder;\">Raio de giro</span></td><td style=\"font-size: 20px; padding: 5px 2px;\">1,4 metros</td></tr></tbody></table>', 1, '--', 10990.00, 'ss3322323232dsdd', 'XX9FZLYNLEEHZCJ4ZGQCEM7JCD5ILA', 'ETJT0DFIM6AKWUH6PLG98DGR1PXJSP', 'FC1608A8ODW5MSKZJO6AINU8GPUIHA', 'paleteira elétrica, transpalete netmak, paleteira netmak', 'A paleteira elétrica NTK E2000 é a solução ideal para a movimentação de cargas paletizadas em supermercados, setores do varejo, galpões e centros de distribuição.', 'Paleteira Elétrica NTK E2000 Litio - Netmak', NULL, 1.00, '', 0, '9', 'paleteira-eletrica-ntk-e2000-litio', 'Elétrica', NULL, '2000kg', 'Sem elevação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `slug` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`interno`, `id_key`, `nome`, `endereco`, `cep`, `email`, `telefone`, `celular`, `obs`, `nro`, `comple`, `cpf_cnpj`, `facebook`, `site`, `rg`, `razao_social`, `bairro`, `cidade`, `senha_acesso`, `codigo_int`, `fnac`, `uf`, `lat`, `longi`, `estado`, `comic`, `usuario`, `instagram`, `logo`, `capa`, `banner`, `foto`, `id_key_linhas`, `id_key_categorias`, `id_key_categorias_produtos`, `quem_somos`, `servicos_prestados`, `nome_empresa`, `slogan`, `modelo_site`, `rua`, `senha`, `altera_senha`, `link_logo`, `link_banner`, `subdominio`, `apagado`, `session_id`, `fult_login`, `ult_ip_login`, `slug`) VALUES
(230, '4K5AU27VMI2K1ULF2OSK93K1ANTJ1X', NULL, NULL, '88330-063', 'sistemas10.info@gmail.com', '', '(47) 9998-0801', '', '', '', '', '', '', NULL, 'Carlos Alonso', '', '', NULL, NULL, NULL, 'SC', NULL, NULL, '', NULL, 'carlos.alonso', '', NULL, NULL, NULL, NULL, 'we3333333-ss3322323232dsdd', '34123213123123', '--', NULL, NULL, NULL, NULL, NULL, '', '', 1, NULL, NULL, NULL, 0, '28ba1475d6ef4fa0c701ffbaa51f238d', '2025-09-07 17:58:00', '177.55.164.93', NULL),
(231, '2JS8ZZOJHN8QVRM6ZVXMKEQTLHGBS9', NULL, NULL, '88330-552', 'luizapilecco@netmak.com.br', '(55) 99984-8766', '(55) 99984-8766', 'Teste - somente movimentação logística', '60', 'apto 403', '', '', 'https://souparte.org/', NULL, 'Luiza Pilecco Moraes', 'Centro', 'Balneário Camboriú', NULL, NULL, NULL, 'SC', NULL, NULL, '9', NULL, 'luizapilecco', 'https://www.instagram.com/luizapileccom', NULL, NULL, NULL, NULL, 'ss3322323232dsdd', NULL, '--', '<p>Luiza Pilecco é mecânica especializada em empilhadeiras e máquinas pesadas, atuando com foco em qualidade, segurança e agilidade. Com experiência no setor, oferece soluções completas em manutenção e reparo para garantir máxima eficiência operacional aos clientes.</p>', '<h2 data-start=\"447\" data-end=\"485\">Manutenção Preventiva e Corretiva</h2><p data-start=\"486\" data-end=\"604\">Atendimento em manutenções programadas e emergenciais, reduzindo paradas e prolongando a vida útil dos equipamentos.</p><h2 data-start=\"606\" data-end=\"630\">Diagnóstico Técnico</h2><p data-start=\"631\" data-end=\"730\">Identificação precisa de falhas mecânicas, hidráulicas e elétricas, assegurando reparos eficazes.</p><h2 data-start=\"732\" data-end=\"764\">Recuperação de Equipamentos</h2><p data-start=\"765\" data-end=\"860\">Reformas e substituição de peças para restaurar o desempenho e a confiabilidade das máquinas.</p><h2 data-start=\"862\" data-end=\"886\">Consultoria Técnica</h2><p>\n\n\n\n\n\n\n</p><p data-start=\"887\" data-end=\"975\">Orientação especializada para otimizar a operação e os custos de manutenção de frotas.</p>', 'Luiza Pilecco', '“Cuidando da sua máquina, fortalecendo sua operação.”', '1', 'Rua 1170', 'KQgSQwBcX18=', 1, 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/Logo_L0EBNZGCKZW9E7ZGRLOEMQ9N16S5QQ.png', 'https://cotarfacil.com.br//cw3/NetMakProprio/tmp_files/banner_7O8DBCSQI9HYTI3T0YYOTLB91M60NH.jpg', 'luizapilecco', 0, 'f370f089004abeab10be8cd69cfdb6aa', '2025-09-02 15:00:00', '177.91.227.17', NULL),
(232, '9Q2YR4NAR6OZSQET7I0EIRF67E73NO', NULL, NULL, '88330-552', 'luizapilecco@netmak.com.br', '(55) 99984-8766', '(55) 99984-8766', 'Teste - somente movimentação logística', '60', 'apto 403', '', '', 'https://souparte.org/', NULL, 'Luiza Pilecco Moraes', 'Centro', 'Balneário Camboriú', NULL, NULL, NULL, 'SC', NULL, NULL, '9', NULL, 'Luiza Pilecco Moraes', 'https://www.instagram.com/luizapileccom', NULL, NULL, NULL, NULL, 'ss3322323232dsdd', NULL, '--', NULL, NULL, NULL, NULL, NULL, 'Rua 1170', '', 0, NULL, NULL, NULL, 1, NULL, '2025-09-02 13:52:24', NULL, NULL);

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
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101594;

--
-- AUTO_INCREMENT de tabela `ips_suspeitos`
--
ALTER TABLE `ips_suspeitos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `linhas`
--
ALTER TABLE `linhas`
  MODIFY `intern` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `slugs`
--
ALTER TABLE `slugs`
  MODIFY `interno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `interno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
