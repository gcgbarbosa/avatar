-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jun-2014 às 22:56
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cpds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(75) NOT NULL,
  `emailAluno` varchar(45) NOT NULL,
  `telefoneAluno` varchar(45) NOT NULL,
  `matriculaAluno` varchar(45) NOT NULL,
  `cursoAluno` int(11) NOT NULL,
  `bolsista` tinyint(4) NOT NULL,
  `dataNasc` datetime NOT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `cursoAluno` (`cursoAluno`),
  KEY `cursoAluno_2` (`cursoAluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idaluno`, `nomeAluno`, `emailAluno`, `telefoneAluno`, `matriculaAluno`, `cursoAluno`, `bolsista`, `dataNasc`) VALUES
(2, 'Jeziel Ribeiro Lago', 'jezi.lago@hotmail.com', '(73) 9123-0593', '201210101', 1, 1, '1994-05-30 00:00:00'),
(3, 'Amilton Rodrigues Nunes', 'amilton.r.n@hotmail.com', '(77) 9168-1323', '201211005', 1, 0, '1992-04-27 00:00:00'),
(4, 'Milena Caldas de Souza', 'milenacaldas_15@hotmail.com', '(73) 9118-2338', '201010097', 1, 0, '1989-05-13 00:00:00'),
(5, 'Juracy Bertoldo Santos Junior', 'juracyjuracy@gmail.com', '(73) 9193-1279', '201011097', 1, 0, '1991-11-15 00:00:00'),
(6, 'Éllison Barros de Oliveira', 'ellisonbarros@hotmail.com', '(73) 8129-7455', '200920360', 1, 1, '1986-03-28 00:00:00'),
(7, 'José Carlos Gomes de Campos', 'ze.kalos@msn.com', '(73) 9143-7076', '201111786', 1, 0, '1992-08-02 00:00:00'),
(8, 'Álef Fernandes dos Santos', 'mr.fernandes@hotmail.com.br', '(73) 9933-0198', '201210097', 1, 0, '1993-12-30 00:00:00'),
(9, 'Marcos Viní­cius Pedreira Vieira', 'vini_si@outlook.com', '(73) 8814-1252', '2013114104', 1, 0, '1993-11-03 00:00:00'),
(11, 'Samila Silva Santos', 'milasillva2@gmail.com', '(73) 9130-2155', '201210767', 1, 0, '1995-08-16 00:00:00'),
(12, 'Manoel Ozeias Morais da Silva', 'timdao02@hotmail.com', '(73) 9133-3554', '201210771', 1, 0, '1993-11-22 00:00:00'),
(13, 'Marcelo Ribeiro Rodrigues', 'marcelo.rribeiro@hotmail.com', '(73) 9196-8262', '200910861', 1, 0, '1992-06-28 00:00:00'),
(14, 'Neirival Neri Santos', 'neynerys@gmail.com', '(73) 8831-2720', '201311042', 1, 0, '1981-02-10 00:00:00'),
(15, 'David Couto Bitencourt', 'david_couto1@hotmail.com', '(73) 8825-8518', '201310131', 1, 0, '1992-08-05 00:00:00'),
(16, 'Luan dos Santos Silva', 'luansiuesb@gmail.com', '(73) 3046-1825', '201310401', 1, 0, '1996-04-11 00:00:00'),
(17, 'Lucas dos Santos Silva', 'lucassilvasistemas@gmail.com', '(73) 3046-1825', '201310401', 1, 0, '1996-04-11 00:00:00'),
(18, 'Luane Alves dos Santos', 'luane_alves@live.com', '(73) 9134-1315', '201110120', 1, 0, '1992-11-16 00:00:00'),
(19, 'Francisco Brandão Gonçalves', 'chicobrandao.si@gmail.com', '(73) 9124-3727', '201210789', 1, 0, '1992-10-16 00:00:00'),
(20, 'David Reis de Oliveira', 'david._mozart@hotmail.com', '(73) 8878-6909', '201211443', 1, 1, '1986-10-02 00:00:00'),
(21, 'Elivan dos Santos Campos', 'elivan.scampos@gmail.com', '(73) 8838-4813', '201110132', 1, 0, '1990-01-17 00:00:00'),
(22, 'Luan Nascimento Silva', 'luan_lns@hotmail.com', '(73) 8848-8090', '201110118', 1, 0, '1990-06-01 00:00:00'),
(23, 'Bruna Souza Santos', 'bsouzasantos@gmail.com', '(73) 9119-0361', '201020198', 1, 1, '1991-03-23 00:00:00'),
(24, 'Marcela Neves Lima', 'marcelalima13@outlooc.com', '(73) 9164-2303', '201310170', 1, 0, '1995-07-08 00:00:00'),
(25, 'Maicon Vinícius Araújo Santos Silva', 'maiconvinicius01@hotmail.com', '(77) 9110-5280', '200920056', 1, 1, '1989-01-28 00:00:00'),
(26, 'Maíra dos Santos Carvalho', 'maifisioterapia@gmail.com', '(74) 8831-4708', '200813112', 1, 0, '1988-12-19 00:00:00'),
(27, 'Larissa Thábata Ferreira dos Santos', 'larissa_thabata@hotmail.com', '(73) 8825-9625', '200614783', 1, 0, '1987-07-18 00:00:00'),
(29, 'Francisco Sadao Yokoyama Filho', 'sadaosistemas@gmail.com', '(73) 9155-5010', '201210167', 1, 0, '1988-04-26 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_has_projeto`
--

CREATE TABLE IF NOT EXISTS `aluno_has_projeto` (
  `aluno_idaluno` int(11) NOT NULL,
  `Projeto_idProjeto` int(11) NOT NULL,
  PRIMARY KEY (`aluno_idaluno`,`Projeto_idProjeto`),
  KEY `fk_aluno_has_Projeto_Projeto1_idx` (`Projeto_idProjeto`),
  KEY `fk_aluno_has_Projeto_aluno1_idx` (`aluno_idaluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_has_projeto`
--

INSERT INTO `aluno_has_projeto` (`aluno_idaluno`, `Projeto_idProjeto`) VALUES
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `areaatuacao`
--

CREATE TABLE IF NOT EXISTS `areaatuacao` (
  `idAreaAtuacao` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomeAreaAtuacao` varchar(50) NOT NULL,
  PRIMARY KEY (`idAreaAtuacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `areaatuacao`
--

INSERT INTO `areaatuacao` (`idAreaAtuacao`, `nomeAreaAtuacao`) VALUES
(2, 'testeab'),
(5, 'biologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_post1_idx` (`post_id`),
  KEY `fk_comment_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `comment`
--

INSERT INTO `comment` (`id`, `content`, `date`, `post_id`, `user_id`, `visible`) VALUES
(1, 'fuck', '2013-09-01 00:00:00', 1, 3, 1),
(2, '123', '2013-09-12 20:05:35', 13, 3, 1),
(3, 'Sadao', '2013-09-12 20:05:48', 13, 3, 1),
(4, '12', '2013-09-12 20:21:28', 1, 3, 1),
(5, '12', '2013-09-12 20:21:28', 1, 3, 1),
(6, '313', '2013-09-12 20:21:31', 1, 3, 1),
(7, '4141', '2013-09-12 20:21:33', 1, 3, 1),
(8, 'Ei', '2013-09-12 20:22:54', 13, 3, 1),
(9, 'OlÃ¡', '2013-09-12 20:34:33', 1, 4, 1),
(10, 'oia yo aqui', '2013-09-12 20:35:40', 14, 6, 1),
(11, '\\oooo', '2013-09-12 20:36:34', 14, 3, 1),
(12, '\\ooooo', '2013-09-12 20:44:13', 15, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(45) NOT NULL,
  `departamentoCurso` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `departamentoCurso` (`departamentoCurso`),
  FULLTEXT KEY `nomeCurso` (`nomeCurso`),
  FULLTEXT KEY `nomeCurso_2` (`nomeCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `nomeCurso`, `departamentoCurso`) VALUES
(1, 'Sistemas de Informação', 1),
(2, 'Fisioterapia', 3),
(4, 'Medicina', 3),
(5, 'Farmácia', 3),
(6, 'Enfermagem', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDepartamento` varchar(45) NOT NULL,
  `descricaoDepartamento` tinytext,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE KEY `nome_UNIQUE` (`nomeDepartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nomeDepartamento`, `descricaoDepartamento`) VALUES
(1, 'DQE', 'Departamento de Quimica e Exatas'),
(2, 'DCB', 'Departamento de Ciências Biológicas'),
(3, 'DS', 'Departamento de Saúde'),
(4, 'DCHL', 'Departamento de Ciências Humanas e Letras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `idEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `nTombo` varchar(7) NOT NULL,
  `tipoEquipamento_idTipoEquipamento` int(11) NOT NULL,
  `sala_idsala` int(11) NOT NULL,
  `projeto_idProjeto` int(11) NOT NULL,
  `observacao` text,
  PRIMARY KEY (`idEquipamento`),
  KEY `fk_Equipamentos_TiposEquipamentos_idx` (`tipoEquipamento_idTipoEquipamento`),
  KEY `fk_equipamento_sala1_idx` (`sala_idsala`),
  KEY `fk_equipamento_projeto1_idx` (`projeto_idProjeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`idEquipamento`, `nTombo`, `tipoEquipamento_idTipoEquipamento`, `sala_idsala`, `projeto_idProjeto`, `observacao`) VALUES
(1, '123.456', 1, 1, 1, 'Importante'),
(2, '654.321', 1, 1, 1, 'Importante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE IF NOT EXISTS `frequencia` (
  `idFrequencia` int(11) NOT NULL AUTO_INCREMENT,
  `horarioEntrada` varchar(5) NOT NULL,
  `horarioSaida` varchar(5) NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  `dataFrequencia` datetime NOT NULL,
  PRIMARY KEY (`idFrequencia`),
  KEY `fk_controleFreq_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`idFrequencia`, `horarioEntrada`, `horarioSaida`, `funcionario_idFuncionario`, `dataFrequencia`) VALUES
(1, '10:00', '12:00', 2, '2014-05-22 00:00:00'),
(2, '10:00', '12:00', 1, '2014-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `IDX_21EE7069A76ED395` (`user_id`),
  KEY `IDX_21EE70696A5458E8` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` varchar(100) NOT NULL,
  `emailFuncionario` varchar(45) NOT NULL,
  `telefoneFuncionario` varchar(15) NOT NULL,
  `dataNasc` datetime NOT NULL,
  `dataAdmissao` datetime NOT NULL,
  `grauInstrucao` varchar(50) NOT NULL,
  `formacao` varchar(50) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `horarioInicio` varchar(5) NOT NULL,
  `horarioFim` varchar(5) NOT NULL,
  PRIMARY KEY (`idFuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nomeFuncionario`, `emailFuncionario`, `telefoneFuncionario`, `dataNasc`, `dataAdmissao`, `grauInstrucao`, `formacao`, `funcao`, `horarioInicio`, `horarioFim`) VALUES
(1, 'Roseane de Oliveira Santos ', 'pedagogaroseaneoliveira@gmail.com', '(73) 9128-5270', '1988-02-03 00:00:00', '0000-00-00 00:00:00', 'Superior Completo', 'Pedagogia', 'Recepcionista', '08:00', '20:00'),
(2, 'Jaqueline Jandiroba da Silva', 'jaquelinejandiroba@gmail.com', '(73) 8803-0359', '1986-09-13 00:00:00', '0000-00-00 00:00:00', 'Superior Completo', 'Pedagogia', 'Recepcionista', '08:00', '20:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupopesquisa_has_areaatuacao`
--

CREATE TABLE IF NOT EXISTS `grupopesquisa_has_areaatuacao` (
  `AreaAtuacao_idAreaAtuacao` int(11) unsigned NOT NULL,
  `grupoPesquisa_idGrupoPesquisa` int(11) unsigned NOT NULL,
  PRIMARY KEY (`AreaAtuacao_idAreaAtuacao`,`grupoPesquisa_idGrupoPesquisa`),
  KEY `fk_grupoPesquisa_has_areaAtuacao_areaatuacao_idx` (`AreaAtuacao_idAreaAtuacao`),
  KEY `fk_grupoPesquisa_has_areaAtuacao_grupoPesquisa_idx` (`grupoPesquisa_idGrupoPesquisa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_pesquisa`
--

CREATE TABLE IF NOT EXISTS `grupo_pesquisa` (
  `idGrupoPesquisa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomeGrupoPesquisa` varchar(50) NOT NULL,
  `objetivoGeralGrupoPesquisa` text NOT NULL,
  `sala_idsala` int(11) NOT NULL,
  `professor_idpesquisadorResp` int(11) NOT NULL,
  `coordPesquisa` int(11) DEFAULT NULL,
  `linhaPesquisaGrupoPesquisa` text NOT NULL,
  PRIMARY KEY (`idGrupoPesquisa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `grupo_pesquisa`
--

INSERT INTO `grupo_pesquisa` (`idGrupoPesquisa`, `nomeGrupoPesquisa`, `objetivoGeralGrupoPesquisa`, `sala_idsala`, `professor_idpesquisadorResp`, `coordPesquisa`, `linhaPesquisaGrupoPesquisa`) VALUES
(1, 'Grupo de Pesquisa de Informática na Saúde', 'teste', 4, 7, 7, 'teste'),
(2, 'teste', 'aaa', 6, 11, 10, 'asda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `language`
--

INSERT INTO `language` (`id`, `name`, `abbreviation`) VALUES
(1, 'English', 'en'),
(2, 'Français', 'fr'),
(3, 'Deutsch', 'de'),
(4, 'Español', 'es'),
(5, 'Italiano', 'it'),
(6, 'Български', 'bg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `idlocal` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLocal` varchar(45) NOT NULL,
  PRIMARY KEY (`idlocal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`idlocal`, `nomeLocal`) VALUES
(1, 'CPDS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `idocorrencia` int(11) NOT NULL AUTO_INCREMENT,
  `observacao` text NOT NULL,
  `reserva_sala_idreservaSala` int(11) NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idocorrencia`),
  KEY `fk_ocorrencia_reserva_sala1_idx` (`reserva_sala_idreservaSala`),
  KEY `fk_ocorrencia_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`idocorrencia`, `observacao`, `reserva_sala_idreservaSala`, `funcionario_idFuncionario`) VALUES
(1, 'Sumiu cadeira.', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `content`, `date`, `user_id`, `visible`) VALUES
(1, 'Hello Mundo de DB', '2013-09-12 16:33:01', 3, 1),
(13, 'Chico vai fazer o resto', '2013-09-12 19:30:20', 3, 1),
(14, 'cd chico?', '2013-09-12 20:34:58', 4, 1),
(15, 'baitola', '2013-09-12 20:35:31', 6, 1),
(16, 'olÃ¡', '2013-09-12 21:05:32', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `matriculaProfessor` varchar(10) DEFAULT NULL,
  `nomeProfessor` varchar(100) NOT NULL,
  `emailProfessor` varchar(45) DEFAULT NULL,
  `telefoneProfessor` varchar(15) DEFAULT NULL,
  `departamento_idDepartamento` int(11) NOT NULL,
  `areaDeAtuacao` varchar(45) NOT NULL,
  `cursoProfessor` int(11) NOT NULL,
  `titulacao` varchar(45) NOT NULL,
  `classe` varchar(45) NOT NULL,
  `regimeDeTrabalho` varchar(45) NOT NULL,
  `tipoVinculo` varchar(45) NOT NULL,
  `dataNasc` datetime DEFAULT NULL,
  PRIMARY KEY (`idProfessor`),
  UNIQUE KEY `matricula_UNIQUE` (`matriculaProfessor`),
  KEY `fk_Professores_Departamentos1_idx` (`departamento_idDepartamento`),
  KEY `cursoProfessor` (`cursoProfessor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `matriculaProfessor`, `nomeProfessor`, `emailProfessor`, `telefoneProfessor`, `departamento_idDepartamento`, `areaDeAtuacao`, `cursoProfessor`, `titulacao`, `classe`, `regimeDeTrabalho`, `tipoVinculo`, `dataNasc`) VALUES
(1, '725124931', 'Alex Ferreira dos Santos', 'alexferreira.ba@gmail.com', '(73) 9102-6899', 1, 'Redes de Computadores e ProgramaÃ§Ã£o', 1, 'Mestre', 'B', 'DE', 'Servidor PÃºblico', '1986-01-25 00:00:00'),
(2, '724949061', 'Wagner Rodrigues de Assis Soares', 'wrasfar@yahoo.com', '(71) 9118-7339', 3, 'Farmacologia e BioInformÃ¡tica', 5, 'Mestrado em GenÃ©tica e Biodiversidade conser', 'Auxiliar classe B', '40 horas', 'Efetivo', '1978-12-25 00:00:00'),
(3, '725206327', 'Lucas Santos de Oliveira', 'lucasant@gmail.com', '(73) 9116-0220', 1, 'Engenharia de software', 1, 'Mestre', 'B', 'DE', 'Assistente', '1982-11-19 00:00:00'),
(4, '725205761', 'Naiara Silva dos Santos', 'naiara.uesb@gmail.com', '(77) 9165-4249', 1, '', 1, '', 'B', 'DE', 'Efetivo', '1986-12-16 00:00:00'),
(5, '725088973', 'Bruno Silva Andrade', 'bandradefsa@yahoo.com.br', '(75) 9930-5583', 2, 'BioinformÃ¡tica; QuÃ­mica Computacional; Bioq', 1, 'Doutor em Biotecnologia', 'Assistente B', '40 h', 'Efetivo', '1981-01-19 00:00:00'),
(6, '72524846-8', 'Marcelo Alves Guimarães', 'marcelo.ssa@gmail.com', '(71) 9170-2857', 1, 'Redes, segurançaa; Sistemas Distribuí­dos', 1, 'Mestre', 'A', 'DE', 'Estatutário', '1978-04-08 00:00:00'),
(7, '00000000', 'Valéria Argolo Rosa de Queiroz', 'valeriauesb@gmail.com', '(73) 8804-0431', 1, 'Informática na Educação e Tecnologia na Sa', 1, 'Mestre', 'Assistente B', 'DE', 'Servidor Público', '1980-03-22 00:00:00'),
(10, '725410756', 'Murilo Silva Santana', 'murilossantana@ymail.com', '(73) 9118-6223', 1, 'ProgramaÃ§Ã£o, Banco de Dados e AlgorÃ­timo', 1, 'Especialista', 'Auxiliar', 'DE', 'Servidor PÃºblico', '1984-01-11 00:00:00'),
(11, '725400971', 'Robson Hebraico Cipriano Maniçoba', 'robsonhcm@gmail.com', '(73) 9147-9008', 1, 'Algorí­timo e estrutura de dados/ Rede de Com', 1, 'Doutor', 'Adjunto', 'DE', 'Servidor Público', '1984-04-08 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_has_projeto`
--

CREATE TABLE IF NOT EXISTS `professor_has_projeto` (
  `professor_idProfessor` int(11) NOT NULL,
  `Projeto_idProjeto` int(11) NOT NULL,
  PRIMARY KEY (`professor_idProfessor`,`Projeto_idProjeto`),
  KEY `fk_professor_has_Projeto_Projeto1_idx` (`Projeto_idProjeto`),
  KEY `fk_professor_has_Projeto_professor1_idx` (`professor_idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_has_projeto`
--

INSERT INTO `professor_has_projeto` (`professor_idProfessor`, `Projeto_idProjeto`) VALUES
(1, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `idProjeto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) NOT NULL,
  `objetivoGeral` text NOT NULL,
  `professor_idCoordenador` int(11) NOT NULL,
  `objetivoEspec` text,
  `resultadosEsperados` text,
  `finaciamento` tinyint(4) NOT NULL,
  `fonteFinaciamento` varchar(50) DEFAULT NULL,
  `grupoPesquisaProjeto` int(11) unsigned NOT NULL,
  `tipoPesquisa` tinyint(1) NOT NULL,
  PRIMARY KEY (`idProjeto`),
  KEY `fk_projeto_professor1_idx` (`professor_idCoordenador`),
  KEY `grupoPesquisaProjeto` (`grupoPesquisaProjeto`),
  KEY `grupoPesquisaProjeto_2` (`grupoPesquisaProjeto`),
  KEY `grupoPesquisaProjeto_3` (`grupoPesquisaProjeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`idProjeto`, `titulo`, `objetivoGeral`, `professor_idCoordenador`, `objetivoEspec`, `resultadosEsperados`, `finaciamento`, `fonteFinaciamento`, `grupoPesquisaProjeto`, `tipoPesquisa`) VALUES
(1, 'ZeroUm Hackerspace', 'Formar Hackers', 1, 'Dar palestras, mini cursos e desenvolver equipamentos utilizando plataforma de hardware open source', 'Alcance dos objetivos especificos', 0, '', 1, 0),
(2, 'SECTI', '', 7, '', '', 1, 'SECTI', 1, 0),
(3, 'MEC', '', 7, '', '', 1, 'MEC', 1, 0),
(4, 'UESB', '', 7, '', '', 1, 'UESB', 1, 0),
(5, 'ConvÃªnio SEED / EAD / UFRPE ', '', 7, '', '', 1, 'UFRPE', 1, 0),
(6, 'GRUPO DE ESTUDOS EM DANÃ‡A E NOVAS TECNOLOGIAS: InvestigaÃ§Ã£o e exper', 'Realizar um experimento com utilizaÃ§Ã£o de novas tecnologias na Ã¡rea das artes cÃªnicas e como a memÃ³ria psicofÃ­sica influencia diretamente na composiÃ§Ã£o coreogrÃ¡fica, como resultado em processo da disciplina de EstÃ¡gio de Montagem I, bem como experimentar uma metodologia criativa visando o aprimoramento da tÃ©cnica de improvisaÃ§Ã£o da danÃ§arina.', 7, 'Adquirir um conhecimento mais amplo da relaÃ§Ã£o entre danÃ§a e tecnologia;  Compreender a relaÃ§Ã£o do corpo em diferentes espaÃ§os;  Experimentar a criaÃ§Ã£o a partir da intervenÃ§Ã£o de um aparelho de captaÃ§Ã£o e de projeÃ§Ã£o de imagem;  Investigar a improvisaÃ§Ã£o como mÃ©todo criador;  Testar novas formas de criaÃ§Ã£o cÃªnica colaborativa;  Estimular a criaÃ§Ã£o colaborativa  Promover uma relaÃ§Ã£o entre Ã¡reas distintas do conhecimento;', 'Para este experimento de estudo e pesquisa da relaÃ§Ã£o entre a danÃ§a e a utilizaÃ§Ã£o de realidade virtual mediada, esperamos formular um experimento cÃªnico de aproximadamente 15 minutos que tenha como princÃ­pio criativo a interferÃªncia tecnolÃ³gica na cena. Para isso o trabalho se desenvolverÃ¡ por 3 (trÃªs) meses. Nesse processo aplicaremos a metodologia de criaÃ§Ã£o colaborativa, termo criado por AntÃ´nio AraÃºjo em 1990 quando estudava o procedimento de seu grupo de teatro Teatro da Vertigem.  Ao passo que o trabalho se concretize, o G-Dante terÃ¡ passado por um estudo teÃ³rico/prÃ¡tico sobre corpo, espaÃ§o, improvisaÃ§Ã£o, relaÃ§Ã£o multilinguagem e inter/multi/transdisciplinaridade. TerÃ¡ adquirido um conhecimento mais refinado da utilizaÃ§Ã£o de captaÃ§Ã£o e projeÃ§Ã£o de imagem em tempo real, tÃ©cnicas de improvisaÃ§Ã£o cÃªnica bem como a relaÃ§Ã£o do corpo em diferentes ambientes: o virtual e o fÃ­sico.', 0, '', 1, 0),
(7, 'asdad', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2, 'rrrr', 'rrrr', 1, 'asdad', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_sala`
--

CREATE TABLE IF NOT EXISTS `reserva_sala` (
  `idreservaSala` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` text NOT NULL,
  `dataInicio` varchar(5) NOT NULL,
  `dataFim` varchar(5) NOT NULL,
  `dataReserva` datetime NOT NULL,
  `sala_idsala` int(11) NOT NULL,
  `professor_idProfessor` int(11) NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idreservaSala`),
  KEY `fk_reserva_sala_sala1_idx` (`sala_idsala`),
  KEY `fk_reserva_sala_professor1_idx` (`professor_idProfessor`),
  KEY `fk_reserva_sala_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `reserva_sala`
--

INSERT INTO `reserva_sala` (`idreservaSala`, `objetivo`, `dataInicio`, `dataFim`, `dataReserva`, `sala_idsala`, `professor_idProfessor`, `funcionario_idFuncionario`) VALUES
(1, 'AUla', '14:00', '16:00', '2014-05-20 00:00:00', 9, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'guest'),
(2, 'member'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE IF NOT EXISTS `sala` (
  `idsala` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `local_idlocal` int(11) NOT NULL,
  PRIMARY KEY (`idsala`),
  KEY `fk_sala_local1_idx` (`local_idlocal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`idsala`, `nome`, `local_idlocal`) VALUES
(1, 'Fabrica de Software', 1),
(2, 'Sala de Reuniões', 1),
(3, 'Sala de Professores', 1),
(4, 'Sala da Coordenação', 1),
(5, 'Incubadora', 1),
(6, 'Núcleo de Desenvolvimento Humano', 1),
(7, 'Laboratório de Redes', 1),
(8, 'Laboratório de Realidade Virtual', 1),
(9, 'Laboratório de Pesquisa I', 1),
(10, 'Laboratório de Pesquisa II', 1),
(11, 'Núcleo de Empreendedorismo em Computação', 1),
(12, 'Recepção', 1),
(13, 'Cantina', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_equipamento`
--

CREATE TABLE IF NOT EXISTS `tipo_equipamento` (
  `idTipoEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTipoEquipamento` varchar(45) NOT NULL,
  `descricaoTipoEquipamento` tinytext NOT NULL,
  PRIMARY KEY (`idTipoEquipamento`),
  UNIQUE KEY `nome_UNIQUE` (`nomeTipoEquipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `tipo_equipamento`
--

INSERT INTO `tipo_equipamento` (`idTipoEquipamento`, `nomeTipoEquipamento`, `descricaoTipoEquipamento`) VALUES
(1, 'Cadeira', ''),
(3, 'Mesa', ''),
(4, 'ArmÃ¡rio de AÃ§o', ''),
(5, 'Projetor ', ''),
(6, 'Tela para ProjeÃ§Ã£o', 'a) suporte aÃ©reo passivo; b) projeÃ§Ã£o frontal; c) dimensÃµes de 2,40 X 1,30m; d)mÃ³veis, posicionados em Ã¢ngulo de 135Â°'),
(7, 'Retroprojetor de TransparÃªncia', ''),
(8, 'Suporte para Projetor', ''),
(9, 'Rack', ''),
(13, 'Condicionador de Ar de Parede', ''),
(14, 'Bebedouro ', ''),
(15, 'Microcomputador Tipo DeskTop  BÃ¡sico', 'pcs'),
(16, 'Microcomputador Tipo DeskTop  AvanÃ§ado', 'pcs'),
(18, 'Scanner de Mesa', ''),
(19, 'Impressora Laser', 'Modelo 3160N -  XEROX'),
(20, 'Impressora Laser - LaserJet HP P2014N', ''),
(21, 'Notebook', ''),
(22, 'Bancada', ''),
(23, 'Roteador', ''),
(24, 'Nobreak', ''),
(25, 'CÃ¢mera digital', ''),
(26, 'Quadro Digital', ''),
(27, 'switch', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tombo`
--

CREATE TABLE IF NOT EXISTS `tombo` (
  `idTombo` int(11) NOT NULL AUTO_INCREMENT,
  `numeroTombo` varchar(7) NOT NULL,
  `id_equipamento` int(11) NOT NULL,
  PRIMARY KEY (`idTombo`),
  KEY `numeroTombo` (`numeroTombo`),
  KEY `id_equipamento` (`id_equipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `question` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_salt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `registration_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirmed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D649D60322AC` (`role_id`),
  KEY `IDX_8D93D64982F1BAF4` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `role_id`, `language_id`, `username`, `display_name`, `password`, `email`, `state`, `question`, `answer`, `picture`, `password_salt`, `registration_date`, `registration_token`, `email_confirmed`) VALUES
(3, 2, 1, 'ohackgb', 'George Barbosa', '534560c7ff6515a1c9e393e91f0d378c', 'gcgbarbosa@gmail.com', 1, NULL, NULL, NULL, '>|`A;3,%*Hv`&Bs<8nzO#@wN`2RHoA^/>?OYRZ][$T=*v1E0!A', '2013-09-12 15:40:19', '048b08f53198c2f4d93694392516e9b7', 1),
(4, 2, 1, 'SadaoYokoyama', 'Sadao Yokoyama', '883566f9d5f12439ad826d559b1e4ca6', 'sadaosistemas@gmail.com', 1, NULL, NULL, NULL, 't9TN/=LUJ\\$OmkJMRy$W=aL_**cldUfZm;)|XUR$2VR~B{LtvO', '2013-09-12 20:29:19', 'f136e4ae34b99718fef15a41ab5faaf7', 1),
(6, 2, 1, 'proguesb', 'Francisco', 'ce1910db59ca02ad1040fc751c0e23c1', 'chicobrandao.si@gmail.com', 1, NULL, NULL, NULL, 'OZ@5B!l_Nkw.Khy]5$H,X$],pA.f{]gL8(`Z)M:W:3de{_C2ck', '2013-09-12 20:34:21', '150b981aa6d67c9d71e4b865ecbba175', 1),
(7, 2, 1, 'Rose', 'Santos', '1d175ad65b80adc95303b3ba4dd89238', 'pedagogaroseaneoliveira@gmail.com', 0, NULL, NULL, NULL, 'WEtv~Nx]|JQ>nC!heWv12NU?m_z*/dEf*;])hVfe"8%p[%YA\\Q', '2013-09-12 20:53:27', '4c5d0b50fa7d5c9c5f08fe190ecd592b', 0),
(8, 2, 1, 'juracy', 'juracy', '7590f07803d9227d2211e9fc1081a494', 'juracyjuracy@gmail.com', 1, NULL, NULL, NULL, 'ss`L]w65IxeFiKK%x&gdgKX4wBTfAZ!6N`b-YwB$p)J[Tt_MyG', '2014-01-14 15:05:04', '18813f87147b81849365beca10eb6a6b', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_curso` FOREIGN KEY (`cursoAluno`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno_has_projeto`
--
ALTER TABLE `aluno_has_projeto`
  ADD CONSTRAINT `fk_aluno_has_Projeto_aluno1` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_Projeto_Projeto1` FOREIGN KEY (`Projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `fk_Equipamentos_TiposEquipamentos` FOREIGN KEY (`tipoEquipamento_idTipoEquipamento`) REFERENCES `tipo_equipamento` (`idTipoEquipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipamento_projeto1` FOREIGN KEY (`projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipamento_sala1` FOREIGN KEY (`sala_idsala`) REFERENCES `sala` (`idsala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_controleFreq_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FK_21EE70696A5458E8` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_21EE7069A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `grupopesquisa_has_areaatuacao`
--
ALTER TABLE `grupopesquisa_has_areaatuacao`
  ADD CONSTRAINT `grupopesquisa_has_areaatuacao_ibfk_1` FOREIGN KEY (`AreaAtuacao_idAreaAtuacao`) REFERENCES `grupo_pesquisa` (`idGrupoPesquisa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupopesquisa_has_areaatuacao_ibfk_2` FOREIGN KEY (`grupoPesquisa_idGrupoPesquisa`) REFERENCES `areaatuacao` (`idAreaAtuacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocorrencia_reserva_sala1` FOREIGN KEY (`reserva_sala_idreservaSala`) REFERENCES `reserva_sala` (`idreservaSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_curso_professor` FOREIGN KEY (`cursoProfessor`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Professores_Departamentos1` FOREIGN KEY (`departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_has_projeto`
--
ALTER TABLE `professor_has_projeto`
  ADD CONSTRAINT `fk_professor_has_Projeto_professor1` FOREIGN KEY (`professor_idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_Projeto_Projeto1` FOREIGN KEY (`Projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_projeto_grupo1` FOREIGN KEY (`grupoPesquisaProjeto`) REFERENCES `grupo_pesquisa` (`idGrupoPesquisa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_professor1` FOREIGN KEY (`professor_idCoordenador`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reserva_sala`
--
ALTER TABLE `reserva_sala`
  ADD CONSTRAINT `fk_reserva_sala_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_sala_professor1` FOREIGN KEY (`professor_idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_sala_sala1` FOREIGN KEY (`sala_idsala`) REFERENCES `sala` (`idsala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_sala_local1` FOREIGN KEY (`local_idlocal`) REFERENCES `local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tombo`
--
ALTER TABLE `tombo`
  ADD CONSTRAINT `fk_tombo_equipamento` FOREIGN KEY (`id_equipamento`) REFERENCES `equipamento` (`idEquipamento`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64982F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
