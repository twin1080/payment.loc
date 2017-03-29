-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 29 2017 г., 07:44
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `payment`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '100', 1490733760),
('customer', '103', 1490733760),
('customer', '104', 1490763830);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1490733760, 1490733760),
('adminPermission', 2, 'admin permissions', NULL, NULL, 1490733760, 1490733760),
('customer', 1, NULL, NULL, NULL, 1490733760, 1490733760),
('customerPermission', 2, 'customer permissions', NULL, NULL, 1490733760, 1490733760);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'adminPermission'),
('customer', 'customerPermission');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `custom`
--

CREATE TABLE `custom` (
  `ID` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `custom`
--

INSERT INTO `custom` (`ID`, `Time`, `Sum`) VALUES
(1, '2017-03-24 10:41:29', '5000.00'),
(2, '2017-03-24 10:54:46', '2000.00'),
(3, '2017-03-24 11:02:26', '3000.00'),
(4, '2017-03-28 09:13:25', '5000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `forexrate`
--

CREATE TABLE `forexrate` (
  `ID` int(11) NOT NULL,
  `Name` varchar(3) NOT NULL,
  `USD` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forexrate`
--

INSERT INTO `forexrate` (`ID`, `Name`, `USD`) VALUES
(1, 'USD', '1.0000'),
(2, 'EUR', '0.9300'),
(3, 'GBP', '0.8000'),
(4, 'RUB', '57.7000'),
(5, 'CNY', '0.1500');

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `CardNumder` varchar(16) NOT NULL,
  `CardHolder` varchar(255) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `CustomID` int(11) NOT NULL,
  `Sum` decimal(10,2) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `done` tinyint(1) NOT NULL DEFAULT '1',
  `CurrencyID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`ID`, `CardNumder`, `CardHolder`, `ExpirationDate`, `cvv`, `CustomID`, `Sum`, `Time`, `done`, `CurrencyID`, `UserID`) VALUES
(1, '4716330659372831', 'IVAN ROMANOV', '2018-02-01', '122', 2, '2000.00', '2017-03-24 11:55:04', 1, 4, 103),
(2, '4716371675988945', 'QWE', '2020-12-01', '33', 2, '234.00', '2017-03-25 17:01:53', 1, 1, 103),
(3, '5235922217903765', 'QWE', '2020-10-01', '22', 2, '2.00', '2017-03-26 09:37:52', 0, 1, 100),
(4, '4916920109389175', 'ROMANOV', '2020-11-01', '122', 2, '2.00', '2017-03-26 11:52:39', 1, 1, 100),
(7, '5231701238537404', 'QWE', '2018-12-01', '222', 1, '2000.00', '2017-03-26 19:37:45', 1, 3, 100),
(8, '5231701238537404', 'QWE', '2020-12-01', '914', 2, '233.00', '2017-03-27 10:39:55', 1, 4, 100),
(9, '5214392774183349', 'WER', '2018-12-01', '999', 2, '333.00', '2017-03-27 10:41:56', 1, 1, 100),
(10, '5214392774183349', 'ASD', '2020-02-01', '333', 1, '444.00', '2017-03-27 11:02:22', 1, 2, 100),
(11, '4929676741797580', 'QWE', '2020-02-01', '222', 2, '2000.00', '2017-03-27 13:47:08', 1, 2, 100),
(12, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:51:42', 0, 1, 100),
(13, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:02', 1, 1, 100),
(14, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:07', 1, 1, 100),
(15, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:38', 1, 1, 100),
(16, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:54:34', 1, 1, 100),
(17, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:57:39', 1, 1, 100),
(18, '4539149951080974', 'R', '2022-02-01', '222', 4, '3333.00', '2017-03-28 09:26:52', 1, 1, 100),
(19, '4539598525969890', 'QWE', '2022-02-01', '222', 1, '2000.00', '2017-03-28 13:41:30', 1, 1, 100),
(20, '30583494817322', 'QWE', '2018-12-01', '333', 1, '2000.00', '2017-03-29 05:05:21', 1, 1, 104);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `authKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`) VALUES
(100, 'admin', '$2y$10$kpKK9CybNojLDIyZUplpLerHoQnFISXG9TAnGCTA2y4qMtIqik8ou', 'b90695ba-13b2-11e7-b1df-60a44c3bd74c'),
(103, 'customer', '$2y$10$kpKK9CybNojLDIyZUplpLerHoQnFISXG9TAnGCTA2y4qMtIqik8ou', '048b902f-13d8-11e7-b1df-60a44c3bd74c'),
(104, 'newuser', '$2y$13$WqylX/Ybf3gq3wGVyI7Z5uIFpEZAc5SKAYNxZOBBXbPc/4MeawWQu', '1757d998-143d-11e7-b1df-60a44c3bd74c');

--
-- Триггеры `user`
--
DELIMITER $$
CREATE TRIGGER `before_insert_app_users` BEFORE INSERT ON `user` FOR EACH ROW SET New.authKey = UUID()
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Индексы таблицы `forexrate`
--
ALTER TABLE `forexrate`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `CustomID` (`CustomID`),
  ADD KEY `CurrencyID` (`CurrencyID`) USING BTREE,
  ADD KEY `UserID` (`UserID`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `custom`
--
ALTER TABLE `custom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `forexrate`
--
ALTER TABLE `forexrate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_currency` FOREIGN KEY (`CurrencyID`) REFERENCES `forexrate` (`ID`),
  ADD CONSTRAINT `payment_custom` FOREIGN KEY (`CustomID`) REFERENCES `custom` (`ID`),
  ADD CONSTRAINT `payment_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
