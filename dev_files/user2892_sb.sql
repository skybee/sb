-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 14 2012 г., 14:44
-- Версия сервера: 5.1.49-3
-- Версия PHP: 5.2.17-4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `user2892_sb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `donor` varchar(255) NOT NULL,
  `scan_url_id` int(11) NOT NULL,
  `author_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `article_shingle`
--

CREATE TABLE IF NOT EXISTS `article_shingle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `shingle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `parent_id` int(3) NOT NULL,
  `img` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL,
  `url_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `img`, `sort`, `url_name`, `name`, `title`) VALUES
(1, 0, '', 1, 'news', 'Новости', ''),
(2, 0, '', 2, 'articles', 'Статьи', ''),
(3, 0, '', 3, 'blogs', 'Блоги', ''),
(4, 1, '', 1, 'ukraine', 'Украина', 'Новости Украины'),
(5, 1, '', 2, 'politics', 'Политика', 'Политические новости'),
(6, 1, '', 4, 'finance', 'Экономика', 'Экономика и Бизнес'),
(7, 1, '', 3, 'world', 'Мир', 'Мировые новости'),
(8, 1, '', 5, 'sport', 'Спорт', 'Новости Спорта'),
(9, 1, '', 6, 'science', 'Наука', 'Новости Науки и Технологий'),
(10, 1, '', 7, 'health', 'Здоровье', 'Новости Здоровья и Медицины '),
(11, 1, '', 8, 'showbiz', 'Шоу-биз и культура', 'Шоу-биз и Культура, Светская жизнь');

-- --------------------------------------------------------

--
-- Структура таблицы `scan_url`
--

CREATE TABLE IF NOT EXISTS `scan_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(255) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `scan` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `shingle`
--

CREATE TABLE IF NOT EXISTS `shingle` (
  `id` int(11) NOT NULL,
  `hash` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
