-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2013 at 10:49 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cpds`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(75) NOT NULL,
  `emailAluno` varchar(45) NOT NULL,
  `telefoneAluno` varchar(45) NOT NULL,
  `matriculaAluno` varchar(45) NOT NULL,
  `bolsista` tinyint(4) NOT NULL,
  `dataNasc` datetime NOT NULL,
  PRIMARY KEY (`idaluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`idaluno`, `nomeAluno`, `emailAluno`, `telefoneAluno`, `matriculaAluno`, `bolsista`, `dataNasc`) VALUES
(1, 'Juracy', 'naoseiaporradoewmail', '21423434', '23432432', 1, '2013-09-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aluno_has_projeto`
--

CREATE TABLE `aluno_has_projeto` (
  `aluno_idaluno` int(11) NOT NULL,
  `Projeto_idProjeto` int(11) NOT NULL,
  PRIMARY KEY (`aluno_idaluno`,`Projeto_idProjeto`),
  KEY `fk_aluno_has_Projeto_Projeto1_idx` (`Projeto_idProjeto`),
  KEY `fk_aluno_has_Projeto_aluno1_idx` (`aluno_idaluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
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
-- Dumping data for table `comment`
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
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDepartamento` varchar(45) NOT NULL,
  `descricaoDepartamento` tinytext,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE KEY `nome_UNIQUE` (`nomeDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipamento`
--

CREATE TABLE `equipamento` (
  `idEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `nTombo` varchar(15) NOT NULL,
  `tipoEquipamento_idTipoEquipamento` int(11) NOT NULL,
  `sala_idsala` int(11) NOT NULL,
  `projeto_idProjeto` int(11) NOT NULL,
  `observacao` text,
  PRIMARY KEY (`idEquipamento`),
  KEY `fk_Equipamentos_TiposEquipamentos_idx` (`tipoEquipamento_idTipoEquipamento`),
  KEY `fk_equipamento_sala1_idx` (`sala_idsala`),
  KEY `fk_equipamento_projeto1_idx` (`projeto_idProjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `frequencia`
--

CREATE TABLE `frequencia` (
  `idFrequencia` int(11) NOT NULL AUTO_INCREMENT,
  `horarioEntrada` datetime NOT NULL,
  `horarioSaida` datetime NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idFrequencia`),
  KEY `fk_controleFreq_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `IDX_21EE7069A76ED395` (`user_id`),
  KEY `IDX_21EE70696A5458E8` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` varchar(100) NOT NULL,
  `emailFuncionario` varchar(45) NOT NULL,
  `telefoneFuncionario` varchar(15) NOT NULL,
  `funcionariocol` varchar(45) NOT NULL,
  PRIMARY KEY (`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `language`
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
-- Table structure for table `local`
--

CREATE TABLE `local` (
  `idlocal` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLocal` varchar(45) NOT NULL,
  PRIMARY KEY (`idlocal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `idocorrencia` int(11) NOT NULL,
  `observacao` text NOT NULL,
  `reserva_sala_idreservaSala` int(11) NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idocorrencia`),
  KEY `fk_ocorrencia_reserva_sala1_idx` (`reserva_sala_idreservaSala`),
  KEY `fk_ocorrencia_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `content`, `date`, `user_id`, `visible`) VALUES
(1, 'Hello Mundo de DB', '2013-09-12 16:33:01', 3, 1),
(13, 'Chico vai fazer o resto', '2013-09-12 19:30:20', 3, 1),
(14, 'cd chico?', '2013-09-12 20:34:58', 4, 1),
(15, 'baitola', '2013-09-12 20:35:31', 6, 1),
(16, 'olÃ¡', '2013-09-12 21:05:32', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `matriculaProfessor` varchar(10) DEFAULT NULL,
  `nomeProfessor` varchar(100) NOT NULL,
  `emailProfessor` varchar(45) DEFAULT NULL,
  `telefoneProfessor` varchar(15) DEFAULT NULL,
  `departamento_idDepartamento` int(11) NOT NULL,
  `areaDeAtuacao` varchar(45) NOT NULL,
  `formacao` varchar(45) NOT NULL,
  `titulacao` varchar(45) NOT NULL,
  `classe` varchar(45) NOT NULL,
  `regimeDeTrabalho` varchar(45) NOT NULL,
  `tipoVinculo` varchar(45) NOT NULL,
  `dataNasc` datetime DEFAULT NULL,
  PRIMARY KEY (`idProfessor`),
  UNIQUE KEY `matricula_UNIQUE` (`matriculaProfessor`),
  KEY `fk_Professores_Departamentos1_idx` (`departamento_idDepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `professor_has_projeto`
--

CREATE TABLE `professor_has_projeto` (
  `professor_idProfessor` int(11) NOT NULL,
  `Projeto_idProjeto` int(11) NOT NULL,
  PRIMARY KEY (`professor_idProfessor`,`Projeto_idProjeto`),
  KEY `fk_professor_has_Projeto_Projeto1_idx` (`Projeto_idProjeto`),
  KEY `fk_professor_has_Projeto_professor1_idx` (`professor_idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projeto`
--

CREATE TABLE `projeto` (
  `idProjeto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) NOT NULL,
  `objetivoGeral` text NOT NULL,
  `professor_idCoordenador` int(11) NOT NULL,
  `objetivoEspec` text,
  `resultadosEsperados` text,
  `finaciamento` tinyint(4) NOT NULL,
  `fonteFinaciamento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProjeto`),
  KEY `fk_projeto_professor1_idx` (`professor_idCoordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reserva_sala`
--

CREATE TABLE `reserva_sala` (
  `idreservaSala` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` text NOT NULL,
  `dataInicio` datetime NOT NULL,
  `dataFim` datetime NOT NULL,
  `sala_idsala` int(11) NOT NULL,
  `professor_idProfessor` int(11) NOT NULL,
  `funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idreservaSala`),
  KEY `fk_reserva_sala_sala1_idx` (`sala_idsala`),
  KEY `fk_reserva_sala_professor1_idx` (`professor_idProfessor`),
  KEY `fk_reserva_sala_funcionario1_idx` (`funcionario_idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'guest'),
(2, 'member'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `idsala` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `local_idlocal` int(11) NOT NULL,
  PRIMARY KEY (`idsala`),
  KEY `fk_sala_local1_idx` (`local_idlocal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_equipamento`
--

CREATE TABLE `tipo_equipamento` (
  `idTipoEquipamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTipoEquipamento` varchar(45) NOT NULL,
  `descricaoTipoEquipamento` tinytext NOT NULL,
  PRIMARY KEY (`idTipoEquipamento`),
  UNIQUE KEY `nome_UNIQUE` (`nomeTipoEquipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `language_id`, `username`, `display_name`, `password`, `email`, `state`, `question`, `answer`, `picture`, `password_salt`, `registration_date`, `registration_token`, `email_confirmed`) VALUES
(3, 2, 1, 'ohackgb', 'George Barbosa', '534560c7ff6515a1c9e393e91f0d378c', 'gcgbarbosa@gmail.com', 1, NULL, NULL, NULL, '>|`A;3,%*Hv`&Bs<8nzO#@wN`2RHoA^/>?OYRZ][$T=*v1E0!A', '2013-09-12 15:40:19', '048b08f53198c2f4d93694392516e9b7', 1),
(4, 2, 1, 'SadaoYokoyama', 'Sadao Yokoyama', '883566f9d5f12439ad826d559b1e4ca6', 'sadaosistemas@gmail.com', 1, NULL, NULL, NULL, 't9TN/=LUJ\\$OmkJMRy$W=aL_**cldUfZm;)|XUR$2VR~B{LtvO', '2013-09-12 20:29:19', 'f136e4ae34b99718fef15a41ab5faaf7', 1),
(6, 2, 1, 'proguesb', 'Francisco', 'ce1910db59ca02ad1040fc751c0e23c1', 'chicobrandao.si@gmail.com', 1, NULL, NULL, NULL, 'OZ@5B!l_Nkw.Khy]5$H,X$],pA.f{]gL8(`Z)M:W:3de{_C2ck', '2013-09-12 20:34:21', '150b981aa6d67c9d71e4b865ecbba175', 1),
(7, 2, 1, 'Rose', 'Santos', '1d175ad65b80adc95303b3ba4dd89238', 'pedagogaroseaneoliveira@gmail.com', 0, NULL, NULL, NULL, 'WEtv~Nx]|JQ>nC!heWv12NU?m_z*/dEf*;])hVfe"8%p[%YA\\Q', '2013-09-12 20:53:27', '4c5d0b50fa7d5c9c5f08fe190ecd592b', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno_has_projeto`
--
ALTER TABLE `aluno_has_projeto`
  ADD CONSTRAINT `fk_aluno_has_Projeto_aluno1` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_Projeto_Projeto1` FOREIGN KEY (`Projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `fk_Equipamentos_TiposEquipamentos` FOREIGN KEY (`tipoEquipamento_idTipoEquipamento`) REFERENCES `tipo_equipamento` (`idTipoEquipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipamento_projeto1` FOREIGN KEY (`projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipamento_sala1` FOREIGN KEY (`sala_idsala`) REFERENCES `sala` (`idsala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_controleFreq_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `FK_21EE70696A5458E8` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_21EE7069A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_ocorrencia_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocorrencia_reserva_sala1` FOREIGN KEY (`reserva_sala_idreservaSala`) REFERENCES `reserva_sala` (`idreservaSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_Professores_Departamentos1` FOREIGN KEY (`departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `professor_has_projeto`
--
ALTER TABLE `professor_has_projeto`
  ADD CONSTRAINT `fk_professor_has_Projeto_professor1` FOREIGN KEY (`professor_idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_Projeto_Projeto1` FOREIGN KEY (`Projeto_idProjeto`) REFERENCES `projeto` (`idProjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_projeto_professor1` FOREIGN KEY (`professor_idCoordenador`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reserva_sala`
--
ALTER TABLE `reserva_sala`
  ADD CONSTRAINT `fk_reserva_sala_funcionario1` FOREIGN KEY (`funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_sala_professor1` FOREIGN KEY (`professor_idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserva_sala_sala1` FOREIGN KEY (`sala_idsala`) REFERENCES `sala` (`idsala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_sala_local1` FOREIGN KEY (`local_idlocal`) REFERENCES `local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64982F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
