-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Сен 11 2020 г., 18:34
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `nickname` varchar(64) NOT NULL DEFAULT 'Аноним',
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `nickname`, `data`) VALUES
(1, 'тестовый анонимный отзыв', 'Аноним not', NULL),
(2, 'Ура, отзывы работают!', 'Николай', NULL),
(8, 'тест тест тест', 'очень длинное имя', NULL),
(16, 'new test', 'test', NULL),
(18, 'Hello', 'tested', NULL),
(19, 'Поздравляю!', 'Vova', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `name`, `path`, `size`, `views`) VALUES
(1, '1.jpg', 'img/gallery/', 595284, 1),
(2, '2.jpg', 'img/gallery/', 879394, 0),
(3, '3.jpg', 'img/gallery/', 845941, 1),
(4, '4.jpg', 'img/gallery/', 777835, 5),
(5, '5.jpg', 'img/gallery/', 561276, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Macbook Pro 16', '1600.99', 'Новый MacBook Pro — наш самый мощный ноутбук, созданный для тех, кто меняет мир и раздвигает границы. Впечатляющий дисплей Retina 16 дюймов, невероятно быстрый процессор, графическая карта нового поколения, самый высокий ресурс аккумулятора для MacBook Pro, новая клавиатура Magic Keyboard и вместительный накопитель — это лучший профессиональный ноутбук для самых серьёзных профессионалов.', 'macbook.jpg'),
(2, 'iPhone XR', '599.00', 'Прекрасен во всех отношениях.Новый дисплей Liquid Retina. Ещё более быстрый Face ID. Самый мощный и умный процессор iPhone. И потрясающая камера. iPhone XR — воплощение красоты и интеллекта.', 'iphone.jpg'),
(3, 'AirPods', '230.45', 'Увеличенное время работы в режиме телефонного разговора. Активация Siri с помощью голоса. Новый футляр с возможностью беспроводной зарядки. Всё это AirPods — уникальные беспроводные наушники. Они подойдут ко всем вашим устройствам. Достаньте их из футляра, и сразу можете пользоваться. Просто наденьте их, и они мгновенно установят соединение, а значит, вы сможете сразу погрузиться в насыщенный качественный звук. Словно по волшебству.', 'airpods.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `telephone` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `telephone`) VALUES
(1, 'User', '827ccb0eea8a706c4c34a16891f84e7b', 'Andrey', 89221112233),
(2, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Алексей', 89112223344);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;