-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 15 2024 г., 03:51
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `polyana`
--
CREATE DATABASE IF NOT EXISTS `polyana` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `polyana`;

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `number` varchar(20) NOT NULL,
  `addres` text NOT NULL,
  `payment` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Гарниры'),
(2, 'Мясо'),
(3, 'Рыба'),
(4, 'Салаты');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `popular` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `id_category`, `name`, `description`, `price`, `popular`) VALUES
(1, 1, 'Киноа с овощами', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 1300.00, 0),
(2, 1, 'Картофельное пюре с кресс-салатом\r\n', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 1200.00, 0),
(3, 1, 'Кус-кус с жареными овощами', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 1500.00, 0),
(4, 1, 'Картофельные ломтики с розмарином', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 1000.00, 0),
(5, 1, 'Цветная капуста тушеная с кунжутом', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 450.00, 0),
(6, 1, 'Чечевица с карамелизированным луком', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 820.00, 0),
(7, 1, 'Рисовая лапша с соевым соусом', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 560.00, 0),
(8, 1, 'Мексиканский рис с фасолью и кукурузой', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 920.00, 0),
(9, 1, 'Пюре из сладкого картофеля', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 500.00, 0),
(10, 1, 'Овощной рататуй', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 700.00, 0),
(11, 1, 'Бобы с томатным соусом', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 900.00, 0),
(12, 1, 'Жареный батат с медом и горчицей', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 680.00, 0),
(13, 1, 'Паста из цельнозерновой муки с томатным соусом', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 920.00, 0),
(14, 1, 'Гречка с шампиньонами и зеленью', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 580.00, 0),
(15, 1, 'Булгур с томатами и огурцом', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum iste numquam iure neque culpa nulla!', 1300.00, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_list`
--

CREATE TABLE `product_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_application` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `resrerve`
--

CREATE TABLE `resrerve` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `id_table` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `product_list`
--
ALTER TABLE `product_list`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_application` (`id_application`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `resrerve`
--
ALTER TABLE `resrerve`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_table` (`id_table`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `resrerve`
--
ALTER TABLE `resrerve`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`id_application`) REFERENCES `application` (`id`),
  ADD CONSTRAINT `product_list_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `resrerve`
--
ALTER TABLE `resrerve`
  ADD CONSTRAINT `resrerve_ibfk_1` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
