-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 12 2021 г., 11:18
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
(2, 7, 'О проведении технических работ в системе обработки обращений СТП', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(3, 3, 'О нестабильной работе КПЭ АИН ', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(4, 4, 'О восстановлении штатной работоспособности КПЭ АИН ', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(5, 1, 'О начале работ по обновлению Dionis ЦОД', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(6, 6, 'Решение массовой проблемы по ИАС МКГУ. На сайте «Ваш контроль» не отображаются сведения об оценке качества предоставленных услуг.', 'Это самая первая тестовая новость. Это самая первая тестовая новость. Это самая первая тестовая новость.', 2, '2021-10-25 00:00:00'),
(7, 1, 'О планируемых технологических работах на КПЭ АИС Налог-3', 'Информируем о планируемых технологических работах на КПЭ АИС Налог-3 28.10.2021 с 21:00 до 02:00 29.10.2021. Контур будет недоступен. О восстановлении работоспособности будет сообщено дополнительно.', 2, '2021-10-27 18:48:17'),
(10, 2, 'О завершении технологических работ на КПЭ АИС Налог-3', 'Супер тест', 2, '2021-10-27 18:53:06'),
(11, 8, 'О возможной временной недоступности СТП', 'Супер тест', 2, '2021-10-27 18:53:06');

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
(1, 'Передача данных'),
(2, 'Выполнение'),
(3, 'Закрытие'),
(4, 'Завершено'),
(5, 'Уточнение'),
(6, 'Внешняя линия'),
(7, 'Отложенное выполнение');

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
  `maintenance_id` int NOT NULL,
  `priority_id` int NOT NULL,
  `record` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phase_id` int NOT NULL,
  `assignee_id` int NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `created_when`, `maintenance_id`, `priority_id`, `record`, `phase_id`, `assignee_id`, `created_by`) VALUES
(51, '2021-11-10 10:49:29', 2, 2, 'Добрый день! Требуется установить обновление ОС на компьютере i7730-w02001347 ', 6, 4, 'Грушин Игорь Игоревич'),
(56, '2021-11-12 11:05:16', 2, 3, 'Это обращение создано после реализации процесса обработки обращения.', 4, 4, 'Грушин Игорь Игоревич');

--
-- Триггеры `requests`
--
DELIMITER $$
CREATE TRIGGER `add_creation_message` AFTER INSERT ON `requests` FOR EACH ROW INSERT INTO requests_history VALUES (NULL, new.id, '1', 'Обращение создано. Номер:', '2', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `requests_history`
--

CREATE TABLE `requests_history` (
  `id` int NOT NULL,
  `request_id` int NOT NULL,
  `message_type_id` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `mcreated_when` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `requests_history`
--

INSERT INTO `requests_history` (`id`, `request_id`, `message_type_id`, `message`, `created_by`, `mcreated_when`) VALUES
(29, 51, 1, 'Обращение создано. Номер:', 2, '2021-11-10 10:49:29'),
(30, 51, 2, 'Обращение взято в работу.', 4, '2021-11-10 20:54:28'),
(33, 51, 3, 'Закрываемся', 4, '2021-11-12 00:00:55'),
(35, 51, 5, 'Уточняем', 4, '2021-11-12 00:03:20'),
(36, 51, 4, 'Завершаемся', 4, '2021-11-12 00:04:01'),
(37, 51, 6, 'Внешнием линием', 4, '2021-11-12 00:06:37'),
(48, 56, 1, 'Обращение создано. Номер:', 2, '2021-11-12 11:05:16'),
(49, 56, 2, 'Обращение взято в работу.', 4, '2021-11-12 11:06:15'),
(50, 56, 5, 'Проверка работы этапа уточнение', 4, '2021-11-12 11:06:45'),
(51, 56, 6, 'Проверка работы этапа внешняя линия', 4, '2021-11-12 11:06:59'),
(52, 56, 7, 'Проверка работы этапа отложенное выполнение', 4, '2021-11-12 11:07:31'),
(53, 56, 4, 'Проверка работы этапа завершено', 4, '2021-11-12 11:07:43');

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
(1, 'Распределение', 1, 'soo', '111'),
(2, 'Администратор системы обработки обращений', 2, 'Administrator_SOO', '111'),
(3, 'Грушин Игорь Игоревич', 2, '7730-00-624', '111'),
(4, 'Степанов Алексей Сергеевич', 3, '7730-00-906', '111');

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
  ADD KEY `r_phase_id` (`phase_id`),
  ADD KEY `maintenance_id` (`maintenance_id`),
  ADD KEY `assignee_id` (`assignee_id`);

--
-- Индексы таблицы `requests_history`
--
ALTER TABLE `requests_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `message_type` (`message_type_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `requests_history`
--
ALTER TABLE `requests_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_maintenance_id ` FOREIGN KEY (`maintenance_id`) REFERENCES `maintenances` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_phase_id` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_priority` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `requests_history`
--
ALTER TABLE `requests_history`
  ADD CONSTRAINT `fk_rh_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_rh_message_type` FOREIGN KEY (`message_type_id`) REFERENCES `phases` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_rh_request_id` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
