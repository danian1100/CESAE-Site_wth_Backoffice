-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2025 às 19:48
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_adofan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `answer_m` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `answer`
--

INSERT INTO `answer` (`id_answer`, `name`, `email`, `message`, `answer_m`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', 'hello, first of all I would like to say that the concert that happened in london was spetacular. It was the first time I saw her live and ......', 'hello, thank you for your contact');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fans`
--

CREATE TABLE `fans` (
  `id_fan` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(9) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fans`
--

INSERT INTO `fans` (`id_fan`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Daniela Filipa Vilas Boas Antunes', 'dsa@czc.com', 911998368, 'bjbbdjbfjr'),
(2, 'Jane Doe', 'janedoe@jane.doe', 123456789, 'hellohello'),
(5, 'John Doe', 'johndoe@gmail.com', 911111111, 'hello, first of all I would like to say that the concert that happened in london was spetacular. It was the first time I saw her live and ......');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `file`) VALUES
(1, 'Home', 'index.php'),
(2, 'History', 'history.php'),
(3, 'Songs', 'songs.php'),
(4, 'Tours', 'tours.php'),
(5, 'Contacts', 'contacts.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_network`
--

CREATE TABLE `social_network` (
  `id_social` int(11) NOT NULL,
  `site` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `social_network`
--

INSERT INTO `social_network` (`id_social`, `site`, `icon`, `title`) VALUES
(1, 'facebook.com', 'fa-square-facebook', 'Facebook'),
(2, 'instagram.com', 'fa-instagram', 'Instagram'),
(3, 'twitter.com', 'fa-x-twitter', 'X'),
(4, 'youtube.com', 'fa-youtube', 'Youtube'),
(5, 'tiktok.com', 'fa-tiktok', 'TikTok'),
(6, 'linkedin.com', 'fa-linkedin-in', 'Linkedin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `songs`
--

CREATE TABLE `songs` (
  `id_song` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL,
  `video_link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `songs`
--

INSERT INTO `songs` (`id_song`, `title`, `file`, `video_link`) VALUES
(1, 'Ussewa', 's_ussewa.jpg', 'https://youtu.be/Qp3b-RXtz4w?list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB'),
(2, 'Elf', 's_elf.jpg', 'https://youtu.be/SbxR25brgoE?list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB'),
(3, 'Readymade', 's_readymade.jpg', 'https://youtu.be/jg09lNupc1s?list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB'),
(4, 'Sakura Biyori and Time machine feat Hatsune Miku', 's_time machine.jpg', 'https://www.youtube.com/watch?v=nIWZfhpnq6M&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=6&ab_channel=Ado'),
(5, 'Mirror', 's_mirror.webp', 'https://www.youtube.com/watch?v=zsBBWBEZkFQ&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=10&ab_channel=Ado'),
(6, 'Chocolat Cadabra', 's_chocolatcadabra.png', 'https://www.youtube.com/watch?v=c5j7lpWprro&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=12&ab_channel=Ado'),
(7, 'Eien no Akuruhi', 's_eien.jpg', 'https://www.youtube.com/watch?v=ZHAnZTVF_10&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=35&ab_channel=Ado'),
(8, 'Fleeting Lullaby', 's_fleetinglullaby.jpg', 'https://www.youtube.com/watch?v=hyV1AJiFNyo&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=28&ab_channel=Ado'),
(9, 'Tot Musica', 's_tot.jpg', 'https://www.youtube.com/watch?v=V9_ZpqfqHFI&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=26&ab_channel=Ado'),
(10, 'Rules', 's_rules.jpg', 'https://www.youtube.com/watch?v=0Z_YqhYHhpg&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=10&ab_channel=Ado'),
(11, 'Dignity', 's_dignity.jpg', 'https://www.youtube.com/watch?v=Q9X0J_tLHwY&list=PLaxauk3chSWgwI1W0yo5Bv9GAn1O1cwKB&index=17&ab_channel=Ado'),
(12, 'Odo', 's_odo.jpeg', 'https://www.youtube.com/watch?v=YnSW8ian29w&ab_channel=Ado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`) VALUES
(1, 'admin', 'e99a18c428cb38d5f260853678922e03', 'Administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `name` (`name`,`email`,`message`),
  ADD KEY `email_fk` (`email`),
  ADD KEY `message_fk` (`message`);

--
-- Índices para tabela `fans`
--
ALTER TABLE `fans`
  ADD PRIMARY KEY (`id_fan`),
  ADD UNIQUE KEY `name` (`name`,`email`,`message`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `message` (`message`);

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Índices para tabela `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`id_social`);

--
-- Índices para tabela `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fans`
--
ALTER TABLE `fans`
  MODIFY `id_fan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `social_network`
--
ALTER TABLE `social_network`
  MODIFY `id_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`email`) REFERENCES `fans` (`email`),
  ADD CONSTRAINT `message_fk` FOREIGN KEY (`message`) REFERENCES `fans` (`message`),
  ADD CONSTRAINT `name_fk` FOREIGN KEY (`name`) REFERENCES `fans` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
