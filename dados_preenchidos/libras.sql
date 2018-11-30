-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 30-Out-2018 às 23:25
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT 'Nome do Objeto',
  `video` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `name`, `video`, `image`, `updated_at`, `created_at`, `category_id`) VALUES
(1, 'Gato', '/card/I8HGpccRE0.mp4', '/card/bJIqc3o8Ly.jpeg', '2018-10-30 23:27:29', '2018-10-30 23:27:29', 1),
(2, 'Cachorro', '/card/avzSnMGuqU.mp4', '/card/xxoWBpTt78.jpeg', '2018-10-30 23:28:58', '2018-10-30 23:28:58', 1),
(3, 'Carro', '/card/txpr4nfmE1.mp4', '/card/VLo8qfRx8N.jpeg', '2018-10-30 23:29:23', '2018-10-30 23:29:23', 2),
(4, 'Caminhão', '/card/N7Fjza6DgO.mp4', '/card/nmFpH4hK3T.jpeg', '2018-10-30 23:31:01', '2018-10-30 23:31:01', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Animais', '/category/rXifrbMSqt.jpeg', '2018-10-30 23:23:06', '2018-10-30 23:23:06'),
(2, 'Automóveis', '/category/br4NUUTMC4.jpeg', '2018-10-30 23:25:36', '2018-10-30 23:26:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `choice` longtext NOT NULL,
  `status_choice` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `quiz_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `history`
--

INSERT INTO `history` (`id`, `choice`, `status_choice`, `created_at`, `updated_at`, `quiz_id`, `users_id`) VALUES
(4, '/quiz/0_CHQYAUdH1m.jpeg', 'ACERTOU', NULL, NULL, 1, 2),
(5, '/quiz/1_HEJY5gqyEZ.jpeg', 'ERROU', NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', '2018-10-30 22:52:47', '2018-10-30 22:52:47'),
(2, '2', 'Usuário', '2018-10-30 22:52:47', '2018-10-30 22:52:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `points`
--

INSERT INTO `points` (`id`, `score`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 0, '2018-10-30 23:43:10', '2018-10-30 23:43:10', 1),
(2, 1, '2018-10-30 23:43:10', '2018-10-30 23:43:10', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `points_has_quiz`
--

CREATE TABLE `points_has_quiz` (
  `points_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `ask` varchar(245) NOT NULL,
  `answer_1` varchar(200) NOT NULL,
  `answer_2` varchar(200) NOT NULL,
  `answer_3` varchar(200) NOT NULL,
  `correct_answer` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `quiz`
--

INSERT INTO `quiz` (`id`, `ask`, `answer_1`, `answer_2`, `answer_3`, `correct_answer`, `created_at`, `updated_at`, `category_id`) VALUES
(1, '/quiz/0_M5AGqKW0FC.mp4', '/quiz/0_ZU2jIn39Lq.jpeg', '/quiz/0_CHQYAUdH1m.jpeg', '/quiz/0_FJur5RrPX7.jpeg', '/quiz/0_CHQYAUdH1m.jpeg', '2018-10-30 23:34:10', '2018-10-30 23:34:10', 1),
(2, '/quiz/1_n8D9hseBwQ.mp4', '/quiz/1_pVe0pBNZer.jpeg', '/quiz/1_CJEQMtY9NX.jpeg', '/quiz/1_HEJY5gqyEZ.jpeg', '/quiz/1_pVe0pBNZer.jpeg', '2018-10-30 23:35:58', '2018-10-30 23:35:58', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `password` longtext,
  `remember_token` longtext,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `nivel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `password`, `remember_token`, `updated_at`, `created_at`, `nivel_id`) VALUES
(1, 'Admin', 'admin@admin.com', '1234', '$2y$10$gHLSjFAOMqNklSm/NSadruQVfdok1ky.XfJj7oF5zy13aak9fUpqq', 'w8thlka22h4sgzVWGaFJ6uf9zRlOBddA6YKGEnDPAfcCeYVRdovcquOhXlNg', '2018-10-30 22:52:48', '2018-10-30 22:52:48', 1),
(2, 'Usuário Default', 'libras@libras.com', '1234', '$2y$10$PyLqCFC2kh5qXHPlIQqmke1lKIk29ubfjj3WZD/eaZVKQH/bvUASS', NULL, '2018-10-30 22:52:48', '2018-10-30 22:52:48', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_has_quiz`
--

CREATE TABLE `users_has_quiz` (
  `users_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cards_category1_idx` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_quiz1_idx` (`quiz_id`),
  ADD KEY `fk_history_users1_idx` (`users_id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_points_users1_idx` (`users_id`);

--
-- Indexes for table `points_has_quiz`
--
ALTER TABLE `points_has_quiz`
  ADD PRIMARY KEY (`points_id`,`quiz_id`),
  ADD KEY `fk_points_has_quiz_quiz1_idx` (`quiz_id`),
  ADD KEY `fk_points_has_quiz_points1_idx` (`points_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz_category1_idx` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_nivel1_idx` (`nivel_id`);

--
-- Indexes for table `users_has_quiz`
--
ALTER TABLE `users_has_quiz`
  ADD PRIMARY KEY (`users_id`,`quiz_id`),
  ADD KEY `fk_users_has_quiz_quiz1_idx` (`quiz_id`),
  ADD KEY `fk_users_has_quiz_users1_idx` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `fk_cards_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_quiz1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_points_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `points_has_quiz`
--
ALTER TABLE `points_has_quiz`
  ADD CONSTRAINT `fk_points_has_quiz_points1` FOREIGN KEY (`points_id`) REFERENCES `points` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_points_has_quiz_quiz1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_nivel1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users_has_quiz`
--
ALTER TABLE `users_has_quiz`
  ADD CONSTRAINT `fk_users_has_quiz_quiz1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_quiz_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
