-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2018 às 21:58
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbschool`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pendency`
--

CREATE TABLE `pendency` (
  `code` int(11) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `situation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_answer` date DEFAULT NULL,
  `students` int(11) NOT NULL,
  `vacancy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pendency`
--

INSERT INTO `pendency` (`code`, `request_date`, `situation`, `date_answer`, `students`, `vacancy`) VALUES
(15, '2018-11-11 16:59:56', 'canceled', '2018-11-12', 20, 13),
(16, '2018-11-11 17:08:46', 'accepted', '2018-11-12', 20, 2),
(18, '2018-11-13 01:26:20', 'declined', '2018-11-13', 17, 15),
(19, '2018-11-13 01:26:40', 'accepted', '2018-11-12', 18, 15),
(20, '2018-11-13 01:26:56', 'canceled', '2018-11-13', 19, 15),
(21, '2018-11-13 01:27:14', 'canceled', '2018-11-12', 17, 20),
(22, '2018-11-13 01:27:30', 'declined', '2018-11-12', 18, 20),
(23, '2018-11-13 01:27:57', 'pending', '2018-11-12', 19, 20),
(24, '2018-11-13 02:08:10', 'accepted', '2018-11-13', 20, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `school`
--

CREATE TABLE `school` (
  `code` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `complement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone2` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `school`
--

INSERT INTO `school` (`code`, `name`, `password`, `cep`, `address`, `number`, `complement`, `district`, `city`, `state`, `phone1`, `phone2`) VALUES
(159662, 'Escola Estadual Aurelio Luiz da Costa', '123', '38040-070', 'Rua Miguel Stefani', 1, '', 'Jardim Induberaba', 'Uberaba', 'MG', ' (034) 3336-1291', ''),
(159751, 'Escola Estadual Minas Gerais', '123', '38010-280', 'PraÃ§a Frei EugÃªnio', 473, '', 'Centro', 'Uberaba', 'MG', ' (034) 3332-3212', ''),
(159786, 'Escola Estadual Bernardo Vasconcelos', '123', '38035-420', 'PraÃ§a JosÃ© Tiveron', 50, '', 'Conjunto Costa Telles I', 'Uberaba', 'MG', '(034) 3313-1707', ''),
(160164, 'Escola Estadual IrmÃ£o Afonso', '123', '38082-258', 'Rua JosÃ© Carlos Rodrigues da Cunha JÃºnior', 160, '', 'Jardim Elza AmuÃ­ I', 'Uberaba', 'MG', '03433229197', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

CREATE TABLE `students` (
  `code` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `grade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastyear` text COLLATE utf8_unicode_ci NOT NULL,
  `guardianUser` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`code`, `name`, `birth`, `grade`, `education`, `lastyear`, `guardianUser`) VALUES
(8, 'Maicon Bernades Junior', '2008-09-09', '2nd grade', 'Elementary School', 'Classified', '34567890123'),
(9, 'Shayla Stheffany da Silva Cassiano de Assis', '2009-07-03', '3rd grade', 'Elementary School', 'Disapproved', '34567890123'),
(10, 'Walter Rodrigues Maia', '2007-06-14', '6th grade', 'Middle School', 'Approved', '34567890123'),
(12, 'Felipe Silva', '1999-01-01', '8th grade', 'Middle School', 'Disapproved', '34567890123'),
(13, 'Amora Marques ', '2004-02-20', '9th grade', 'Middle School', 'Approved', '13643880'),
(14, 'Robbie Stark', '2003-07-09', '1st grade', 'High School', 'Approved', '34567890123'),
(15, 'Marcos Vinicius Andre Sousa', '2004-09-07', '9th grade ', 'Middle School', 'Approved', '13643880'),
(16, 'Maiara Beatriz Sousa', '2006-09-07', '7th grade ', 'Middle School', 'Approved', '13643880'),
(17, 'Sthefanny Marcia Rodrigues', '2008-11-27', '5th grade', 'Elementary School', 'Approved', '86260987072'),
(18, 'Marcia Rodrigues Souza', '2007-12-07', '5th grade', 'Elementary School', 'Approved', '86260987072'),
(19, 'Rodrigues Antonio Souza', '2008-01-02', '5th grade', 'Elementary School', 'Approved', '86260987072'),
(20, 'Marcia Daniela Rodrigues Souza', '2007-08-27', '6th grade', 'Middle School', 'Approved', '86260987072');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `cpf` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `cep` int(10) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `complement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone2` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`cpf`, `name`, `password`, `birth`, `cep`, `address`, `number`, `complement`, `district`, `city`, `state`, `phone1`, `phone2`) VALUES
('06930189090', 'Marcos Antonio Souza', '123', '1988-01-15', 30421002, 'Avenida Silva Lobo', 324, '', 'Nova Suíssa', 'Belo Horizonte', 'MG', ' (99) 99999-9999', ''),
('13643880', 'Alice marques', 'aaa', '1993-02-07', 38082047, 'Rua Domingos Licursi', 47, '', 'SÃ£o JosÃ©', 'Uberaba', 'MG', '34991102936', '3499088567'),
('28484943011', 'Antonio Souza Oliveira', '123', '1998-11-15', 38061580, 'Rua Solimões', 324, '', 'Vila Celeste', 'Uberaba', 'MG', ' (99) 99999-9999', ''),
('34567890123', 'Mario Palmeiros', '123', '1967-07-09', 67120438, 'Rua Rio D\'ouro', 2312, 'casa', 'Quarenta Horas (Coqueiro)', 'Ananindeua', 'PA', '(34) 3333-4444', '(34) 9188-7002'),
('86260987072', 'Richard Marcos Antonio', '123', '1978-11-15', 38035725, 'Rua Artur Alegria', 324, '', 'Conjunto José Barbosa', 'Uberaba', 'MG', ' (99) 99999-9999', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacancies`
--

CREATE TABLE `vacancies` (
  `code` int(11) NOT NULL,
  `grade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `school` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vacancies`
--

INSERT INTO `vacancies` (`code`, `grade`, `education`, `quantity`, `school`) VALUES
(1, '1st grade', 'High School', 8, 159751),
(2, '6th grade', 'Middle School', 6, 159751),
(5, '3rd grade', 'High School', 8, 160164),
(8, '2nd grade', 'High School', 3, 160164),
(10, '1st grade', 'High School', 3, 160164),
(11, '7th grade', 'Middle School', 2, 160164),
(12, '8th grade', 'Middle School', 32, 160164),
(13, '6th grade', 'Middle School', 3, 160164),
(15, '5th grade', 'Elementary School', 4, 159786),
(16, '4th grade', 'Elementary School', 7, 159786),
(17, '3rd grade', 'Elementary School', 9, 159786),
(18, '2nd grade', 'Elementary School', 4, 159786),
(19, '1st grade', 'Elementary School', 6, 159786),
(20, '5th grade', 'Elementary School', 21, 159751),
(21, '1st grade', 'Elementary School', 12, 159751),
(22, '2nd grade', 'Elementary School', 34, 159751),
(23, '3rd grade', 'Elementary School', 45, 159751),
(24, '4th grade', 'Elementary School', 43, 159751);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendency`
--
ALTER TABLE `pendency`
  ADD PRIMARY KEY (`code`),
  ADD KEY `students` (`students`),
  ADD KEY `vacancy` (`vacancy`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`code`),
  ADD KEY `guardianUser` (`guardianUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`code`),
  ADD KEY `school` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendency`
--
ALTER TABLE `pendency`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pendency`
--
ALTER TABLE `pendency`
  ADD CONSTRAINT `students` FOREIGN KEY (`students`) REFERENCES `students` (`code`),
  ADD CONSTRAINT `vacancy` FOREIGN KEY (`vacancy`) REFERENCES `vacancies` (`code`);

--
-- Limitadores para a tabela `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `guardianUser` FOREIGN KEY (`guardianUser`) REFERENCES `user` (`cpf`);

--
-- Limitadores para a tabela `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `school` FOREIGN KEY (`school`) REFERENCES `school` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
