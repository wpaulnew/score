-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 19 2018 г., 14:59
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `code` varchar(256) NOT NULL COMMENT 'code группы товаров',
  `processed` int(1) NOT NULL DEFAULT '0' COMMENT '1-выполнено 0-впроцесе отправки'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `client`, `product`, `quantity`, `code`, `processed`) VALUES
(1, 1, 4, 3, 'd09bf41544a3365a46c9077ebb5e35c3', 0),
(2, 1, 4, 3, '19ca14e7ea6328a42e0eb13d585e4c22', 0),
(3, 1, 1, 3, '9a1158154dfa42caddbd0694a4e9bdc8', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `forwhat` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `forwhat`) VALUES
(1, 'all', 'monthly'),
(2, 'hoodies', 'yearly'),
(3, 'cups', 'cups');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `login`, `email`, `password`) VALUES
(1, 'Paul', 'login', 'example@gmail.com', 'password'),
(2, 'name', 'login1', 'email', 'password'),
(3, 'name', 'login12', 'email', 'password'),
(4, 'name', 'loginz', 'example@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Структура таблицы `denominations`
--

CREATE TABLE `denominations` (
  `id` int(64) NOT NULL,
  `appellation` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `denominations`
--

INSERT INTO `denominations` (`id`, `appellation`) VALUES
(1, 'Hoodies');

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `forwhat` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `title`, `forwhat`) VALUES
(1, 'men', 'free'),
(2, 'women', 'basic');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(64) NOT NULL,
  `appellation` varchar(256) NOT NULL COMMENT 'Название товара',
  `denomination` varchar(64) NOT NULL COMMENT 'К какой категории относиться',
  `category` varchar(64) NOT NULL,
  `img` varchar(64) NOT NULL,
  `price` varchar(8) NOT NULL,
  `ended` int(64) NOT NULL DEFAULT '0' COMMENT 'Если "1", тогда продан'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `appellation`, `denomination`, `category`, `img`, `price`, `ended`) VALUES
(1, 'INSPIRE TRAVEL LEARN T SHIRT - \"THE SKETCH\" [BLACK]', 'all', 'men', 'product.png', '24.40', 0),
(2, 'Road to the Dream V-shape Logo Худи – Бордовый', 'all', 'men', 'product.png', '24.40', 0),
(3, 'INSPIRE BLACK REX', 'all', 'men', 'hoodie.png', '52.40', 0),
(4, 'INSPIRE CUP', 'all', 'women', 'cup.png', '24.40', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `current` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `title`, `current`) VALUES
(1, 'Text', 0),
(2, 'Second post', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `saved`
--

CREATE TABLE `saved` (
  `id` int(64) NOT NULL,
  `client` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `saved`
--

INSERT INTO `saved` (`id`, `client`, `product`) VALUES
(135, 2, 4),
(141, 1, 2),
(129, 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `denominations`
--
ALTER TABLE `denominations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `denominations`
--
ALTER TABLE `denominations`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
