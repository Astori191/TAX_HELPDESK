-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2021 г., 21:35
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taxhelpdesk`
--
CREATE DATABASE IF NOT EXISTS `taxhelpdesk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taxhelpdesk`;

-- --------------------------------------------------------

--
-- Структура таблицы `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `part_of` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `maintenances`
--

INSERT INTO `maintenances` (`id`, `name`, `part_of`) VALUES
(1, 'Аппаратные проблемы с рабочей станцией.', 1),
(2, 'Настройка и обновление ОС.', 1),
(3, 'Переподключение существующей рабочей станции.', 1),
(4, 'Проблемы с ОС и общесистемным ПО.', 1),
(5, 'Установка и настройка клиентской части ППК ФНС России.', 2),
(6, 'Устранение технических сбоев в работе ППК ФНС России.', 2),
(7, 'Обновление клиентской части ППК ФНС России.', 2),
(8, 'Проблемы с подключением к ЛВС рабочих станций.', 3),
(9, 'Установка и настройка активного сетевого оборудования(только коммутаторы).', 3),
(10, 'Замена расходных материалов.', 4),
(11, 'Подключение периферийного оборудования.', 4),
(12, 'Проблемы с периферийным оборудованием.', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `maintenances_categories`
--

CREATE TABLE `maintenances_categories` (
  `id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `maintenances_categories`
--

INSERT INTO `maintenances_categories` (`id`, `type`) VALUES
(1, 'Рабочие станции.'),
(2, 'Прикладные программные комплексы ФНС России.'),
(3, 'Локальная вычислительная сеть. '),
(4, 'Периферийное оборудование.');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `news_type_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_when` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news_type_id`, `title`, `content`, `created_by`, `created_when`) VALUES
(1, 5, 'Массовая проблема. В отчете 2-НДС по состоянию на 01.09.2021 недоступна система Полиматика', 'Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(2, 7, 'О проведении технических работ в системе обработки обращений СТП', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 1, '2021-10-25 00:00:00'),
(3, 3, 'О нестабильной работе КПЭ АИН ', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(4, 4, 'О восстановлении штатной работоспособности КПЭ АИН ', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 1, '2021-10-25 00:00:00'),
(5, 1, 'О начале работ по обновлению Dionis ЦОД', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(6, 6, 'Решение массовой проблемы по ИАС МКГУ. На сайте «Ваш контроль» не отображаются сведения об оценке качества предоставленных услуг.', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 1, '2021-10-25 00:00:00'),
(7, 1, 'О планируемых технологических работах на КПЭ АИС Налог-3', 'Информируем о планируемых технологических работах на КПЭ АИС Налог-3 28.10.2021 с 21:00 до 02:00 29.10.2021. Контур будет недоступен. О восстановлении работоспособности будет сообщено дополнительно.', 1, '2021-10-27 18:48:17'),
(10, 2, 'О завершении технологических работ на КПЭ АИС Налог-3', 'Супер тест', 1, '2021-10-27 18:53:06'),
(11, 8, 'О возможной временной недоступности СТП', 'Супер тест', 1, '2021-10-27 18:53:06');

-- --------------------------------------------------------

--
-- Структура таблицы `news_heads`
--

CREATE TABLE `news_heads` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `news_heads`
--

INSERT INTO `news_heads` (`id`, `name`) VALUES
(1, 'Новости АИС'),
(2, 'Массовые пробелмы'),
(3, 'Новости портала');

-- --------------------------------------------------------

--
-- Структура таблицы `news_types`
--

CREATE TABLE `news_types` (
  `id` int NOT NULL,
  `news_head_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `news_types`
--

INSERT INTO `news_types` (`id`, `news_head_id`, `description`) VALUES
(1, 1, 'О начале технологических работ'),
(2, 1, 'О завершении технологических работ'),
(3, 1, 'О нестабильной работе'),
(4, 1, 'О восстановлении штатной работоспособности'),
(5, 2, 'Массовая проблема'),
(6, 2, 'Решение массовой проблемы'),
(7, 3, 'О проведении технических работ в системе обработки обращений'),
(8, 3, 'Общая информация');

-- --------------------------------------------------------

--
-- Структура таблицы `phases`
--

CREATE TABLE `phases` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `phases`
--

INSERT INTO `phases` (`id`, `name`) VALUES
(1, 'Передача данных.'),
(2, 'Выполнение.'),
(3, 'Закрытие.'),
(4, 'Завершено.'),
(5, 'Уточнение.');

-- --------------------------------------------------------

--
-- Структура таблицы `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int NOT NULL,
  `N_tab` int NOT NULL,
  `FIO` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `N_cab` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `priorities`
--

CREATE TABLE `priorities` (
  `id` int NOT NULL,
  `kind` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `priorities`
--

INSERT INTO `priorities` (`id`, `kind`) VALUES
(1, 'Низкий'),
(2, 'Средний'),
(3, 'Высокий'),
(4, 'Очень высокий');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `created_when` datetime NOT NULL,
  `priority_id` int NOT NULL,
  `maintenance_id` int NOT NULL,
  `record` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phase_id` int NOT NULL,
  `assignee_id` int NOT NULL,
  `created_by_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ui_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `ui_name`) VALUES
(1, 'admin', 'Администратор'),
(2, 'user', 'Заявитель'),
(3, 'assignee', 'Исполнитель'),
(4, 'news_editor', 'Редактор');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `login`, `password`) VALUES
(1, 'Степанов Алексей Сергеевич', 1, '7730-00-906', '111'),
(2, 'Тихонво Сергей Сергеевич', 2, '7730-00-907', '111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_of` (`part_of`);

--
-- Индексы таблицы `maintenances_categories`
--
ALTER TABLE `maintenances_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `news_type_id` (`news_type_id`);

--
-- Индексы таблицы `news_heads`
--
ALTER TABLE `news_heads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_types`
--
ALTER TABLE `news_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nh` (`news_head_id`);

--
-- Индексы таблицы `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_priority_id` (`priority_id`),
  ADD KEY `r_service_id` (`maintenance_id`),
  ADD KEY `r_phase_id` (`phase_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `maintenances_categories`
--
ALTER TABLE `maintenances_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `news_heads`
--
ALTER TABLE `news_heads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news_types`
--
ALTER TABLE `news_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `fk_part_of` FOREIGN KEY (`part_of`) REFERENCES `maintenances_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_nt_id` FOREIGN KEY (`news_type_id`) REFERENCES `news_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `news_types`
--
ALTER TABLE `news_types`
  ADD CONSTRAINT `fk_nh` FOREIGN KEY (`news_head_id`) REFERENCES `news_heads` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_phase_id` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_priority` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
