-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sisbiblioteca
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ sisbiblioteca;
USE sisbiblioteca;

--
-- Table structure for table `sisbiblioteca`.`alufunprof`
--

DROP TABLE IF EXISTS `alufunprof`;
CREATE TABLE `alufunprof` (
  `idAluFunProf` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `matricula` int(10) unsigned NOT NULL DEFAULT '0',
  `curso` varchar(45) NOT NULL DEFAULT '',
  `cpf` varchar(14) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `telefone` varchar(45) NOT NULL DEFAULT '',
  `endereco` varchar(45) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT '',
  `cep` varchar(45) NOT NULL DEFAULT '',
  `login` varchar(45) NOT NULL DEFAULT '',
  `senha` varchar(45) NOT NULL DEFAULT '',
  `idSituacao` int(10) unsigned NOT NULL DEFAULT '0',
  `idTipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAluFunProf`),
  KEY `FK_alufunprof_1` (`idSituacao`),
  KEY `FK_alufunprof_2` (`idTipo`),
  CONSTRAINT `FK_alufunprof_2` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`),
  CONSTRAINT `FK_alufunprof_1` FOREIGN KEY (`idSituacao`) REFERENCES `situacao` (`idSituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`alufunprof`
--

/*!40000 ALTER TABLE `alufunprof` DISABLE KEYS */;
/*!40000 ALTER TABLE `alufunprof` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `idArea` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`area`
--

/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `idAutor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `sobrenome` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `formacao` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`autor`
--

/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`editora`
--

DROP TABLE IF EXISTS `editora`;
CREATE TABLE `editora` (
  `idEditora` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `cnpj` varchar(45) NOT NULL DEFAULT '',
  `telefone` varchar(45) NOT NULL DEFAULT '',
  `endereco` varchar(45) NOT NULL DEFAULT '',
  `site` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idEditora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`editora`
--

/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
CREATE TABLE `emprestimo` (
  `idEmprestimo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idLivro` int(10) unsigned NOT NULL DEFAULT '0',
  `idAluFunProf` int(10) unsigned NOT NULL DEFAULT '0',
  `dataEmprestimo` date NOT NULL DEFAULT '0000-00-00',
  `dataDevolucao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`idEmprestimo`),
  KEY `FK_emprestimo_1` (`idLivro`),
  KEY `FK_emprestimo_2` (`idAluFunProf`),
  CONSTRAINT `FK_emprestimo_1` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`idLivro`),
  CONSTRAINT `FK_emprestimo_2` FOREIGN KEY (`idAluFunProf`) REFERENCES `alufunprof` (`idAluFunProf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`emprestimo`
--

/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `idGrupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `tipoGrupo` int(10) unsigned NOT NULL DEFAULT '0',
  `idPermissao` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGrupo`),
  KEY `FK_grupo_1` (`idPermissao`),
  CONSTRAINT `FK_grupo_1` FOREIGN KEY (`idPermissao`) REFERENCES `permissoes` (`idPermissao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`grupo`
--

/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE `livro` (
  `idLivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `issn` varchar(45) NOT NULL DEFAULT '',
  `subtitulo` varchar(45) NOT NULL DEFAULT '',
  `dataPublicacao` date NOT NULL DEFAULT '0000-00-00',
  `numExemplares` int(10) unsigned NOT NULL DEFAULT '0',
  `volume` varchar(45) NOT NULL DEFAULT '',
  `dataAquisicao` date NOT NULL DEFAULT '0000-00-00',
  `numPaginas` int(10) unsigned NOT NULL DEFAULT '0',
  `idEditora` int(10) unsigned NOT NULL DEFAULT '0',
  `idArea` int(10) unsigned NOT NULL DEFAULT '0',
  `idAutor` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idLivro`),
  KEY `FK_livro_1` (`idArea`),
  KEY `FK_livro_2` (`idAutor`),
  KEY `FK_livro_3` (`idEditora`),
  CONSTRAINT `FK_livro_1` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`),
  CONSTRAINT `FK_livro_2` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  CONSTRAINT `FK_livro_3` FOREIGN KEY (`idEditora`) REFERENCES `editora` (`idEditora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`livro`
--

/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
CREATE TABLE `permissoes` (
  `idPermissao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cadastrar` varchar(45) NOT NULL DEFAULT '',
  `visualizar` varchar(45) NOT NULL DEFAULT '',
  `alterar` varchar(45) NOT NULL DEFAULT '',
  `deletar` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPermissao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`permissoes`
--

/*!40000 ALTER TABLE `permissoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissoes` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`resumo`
--

DROP TABLE IF EXISTS `resumo`;
CREATE TABLE `resumo` (
  `idResumo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resumo` text NOT NULL,
  `idLivro` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idResumo`),
  KEY `FK_resumo_1` (`idLivro`),
  CONSTRAINT `FK_resumo_1` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`idLivro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`resumo`
--

/*!40000 ALTER TABLE `resumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumo` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`situacao`
--

DROP TABLE IF EXISTS `situacao`;
CREATE TABLE `situacao` (
  `idSituacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ativo` varchar(45) NOT NULL DEFAULT '',
  `pendente` varchar(45) NOT NULL DEFAULT '',
  `inativo` varchar(45) NOT NULL DEFAULT '',
  `bloqueado` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idSituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`situacao`
--

/*!40000 ALTER TABLE `situacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `situacao` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `idTipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


--
-- Table structure for table `sisbiblioteca`.`usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sisbiblioteca`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
