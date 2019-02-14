-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.27 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para sistemamodelo.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `cod_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(100) DEFAULT NULL,
  `subtitulo_noticia` varchar(100) DEFAULT NULL,
  `slug_noticia` varchar(100) DEFAULT NULL,
  `tipos_cod_tipo` int(11) DEFAULT NULL,
  `data_noticia` date DEFAULT NULL,
  `imagem_noticia` varchar(70) DEFAULT NULL,
  `conteudo_noticia` text,
  PRIMARY KEY (`cod_noticia`),
  KEY `tipos_cod_tipo` (`tipos_cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para sistemamodelo.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `cod_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para sistemamodelo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(80) DEFAULT NULL,
  `senha_usuario` varchar(60) DEFAULT NULL,
  `imagem_usuario` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
