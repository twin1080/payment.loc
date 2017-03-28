-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2017 г., 16:36
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
  `CurrencyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`ID`, `CardNumder`, `CardHolder`, `ExpirationDate`, `cvv`, `CustomID`, `Sum`, `Time`, `done`, `CurrencyID`) VALUES
(1, '4716330659372831', 'IVAN ROMANOV', '2018-02-01', '122', 2, '2000.00', '2017-03-24 11:55:04', 1, 4),
(2, '4716371675988945', 'QWE', '2020-12-01', '33', 2, '234.00', '2017-03-25 17:01:53', 1, 1),
(3, '5235922217903765', 'QWE', '2020-10-01', '22', 2, '2.00', '2017-03-26 09:37:52', 0, 1),
(4, '4916920109389175', 'ROMANOV', '2020-11-01', '122', 2, '2.00', '2017-03-26 11:52:39', 1, 1),
(7, '5231701238537404', 'QWE', '2018-12-01', '222', 1, '2000.00', '2017-03-26 19:37:45', 1, 3),
(8, '5231701238537404', 'QWE', '2020-12-01', '914', 2, '233.00', '2017-03-27 10:39:55', 1, 4),
(9, '5214392774183349', 'WER', '2018-12-01', '999', 2, '333.00', '2017-03-27 10:41:56', 1, 1),
(10, '5214392774183349', 'ASD', '2020-02-01', '333', 1, '444.00', '2017-03-27 11:02:22', 1, 2),
(11, '4929676741797580', 'QWE', '2020-02-01', '222', 2, '2000.00', '2017-03-27 13:47:08', 1, 2),
(12, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:51:42', 0, 1),
(13, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:02', 1, 1),
(14, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:07', 1, 1),
(15, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:53:38', 1, 1),
(16, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:54:34', 1, 1),
(17, '4485285554541006', 'QWE', '2020-02-01', '233', 2, '2000.00', '2017-03-27 13:57:39', 1, 1),
(18, '4539149951080974', 'R', '2022-02-01', '222', 4, '3333.00', '2017-03-28 09:26:52', 1, 1),
(19, '4539598525969890', 'QWE', '2022-02-01', '222', 1, '2000.00', '2017-03-28 13:41:30', 1, 1);

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
(100, 'admin', '$2y$10$kpKK9CybNojLDIyZUplpLerHoQnFISXG9TAnGCTA2y4qMtIqik8ou', 'b90695ba-13b2-11e7-b1df-60a44c3bd74c');

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
  ADD KEY `CurrencyID` (`CurrencyID`) USING BTREE;

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_currency` FOREIGN KEY (`CurrencyID`) REFERENCES `forexrate` (`ID`),
  ADD CONSTRAINT `payment_custom` FOREIGN KEY (`CustomID`) REFERENCES `custom` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
