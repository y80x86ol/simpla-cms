-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-03-24 14:23:43
-- 服务器版本： 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpla`
--

-- --------------------------------------------------------

--
-- 表的结构 `block`
--

CREATE TABLE IF NOT EXISTS `#__block` (
`id` int(10) unsigned NOT NULL,
  `baid` int(10) unsigned NOT NULL,
  `machine_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('system','model','customer') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `callback` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `weight` int(10) unsigned NOT NULL DEFAULT '0',
  `pages` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cache` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `block`
--

INSERT INTO `#__block` (`id`, `baid`, `machine_name`, `title`, `description`, `body`, `type`, `callback`, `format`, `theme`, `status`, `weight`, `pages`, `cache`) VALUES
(1, 4, 'system_new_posts', '最新文章', '最新发布的文章', '', 'system', 'Blocksystem::new_posts();', '', '', '1', 0, '', 0),
(2, 4, 'system_new_users', '新进用户', '最新注册的用户', '', 'system', 'Blocksystem::new_users();', '', '', '1', 0, '', 0),
(3, 1, 'system_friend_link', '友情连接', '友情连接', '', 'system', 'Blocksystem::friend_link();', '', '', '1', 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `block_area`
--

CREATE TABLE IF NOT EXISTS `#__block_area` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `machine_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `block_area`
--

INSERT INTO `#__block_area` (`id`, `title`, `description`, `machine_name`, `weight`) VALUES
(1, '未选择', '未选择', 'noarea', 9999),
(2, '头部区域', '头部区域', 'header', 1),
(3, '侧边栏左边区域', '侧边栏左边区域', 'sidebar_left', 2),
(4, '侧边栏右边区域', '侧边栏右边区域', 'sidebar_right', 3),
(5, '中间顶部区域', '中间顶部区域', 'content_top', 4),
(6, '中间底部区域', '中间底部区域', 'content_bottom', 5),
(7, '底部区域', '底部区域', 'footer', 6);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `#__category` (
`id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `tid` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `#__category` (`id`, `pid`, `tid`, `title`, `description`, `weight`) VALUES
(1, 0, 1, '未分类', '未分类栏目，所有未分类的文章都放在这里', 0);

-- --------------------------------------------------------

--
-- 表的结构 `category_data`
--

CREATE TABLE IF NOT EXISTS `#__category_data` (
  `cid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `category_data`
--

INSERT INTO `#__category_data` (`cid`, `nid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `category_type`
--

CREATE TABLE IF NOT EXISTS `#__category_type` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `machine_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `category_type`
--

INSERT INTO `#__category_type` (`id`, `title`, `description`, `machine_name`) VALUES
(1, '栏目', '系统默认内容分类，该分类可用于网站内容分类栏目', 'category');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `#__comment` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `machine_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `code_one` longtext COLLATE utf8_unicode_ci NOT NULL,
  `code_two` longtext COLLATE utf8_unicode_ci NOT NULL,
  `choose` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `#__comment` (`id`, `title`, `machine_name`, `code_one`, `code_two`, `choose`) VALUES
(1, '搜狐畅言', 'changyan', '', '', 1),
(2, '多说', 'duoshuo', '', '', 1),
(3, '国外disqus', 'disqus', '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `field`
--

CREATE TABLE IF NOT EXISTS `#__field` (
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `field`
--

INSERT INTO `#__field` (`type`, `name`, `description`, `data`) VALUES
('category', '分类术语', '添加分类到你所属的内容类型，将分类与内容绑定', ''),
('checkbox', '复选框', '设置一个或者多个复选框', ''),
('file', '文件上传', '文件上传功能', ''),
('image', '图片上传', '图片上传功能', ''),
('radio', '单选框', '单选框用于从多个选项中只选择一个', ''),
('select', '下拉列表', '一个下拉列表选择框', ''),
('text', '文本框', '一个普通的文本框', ''),
('textarea', '文本域', '一个普通的文本域，可以填写非常多的内容', '');

-- --------------------------------------------------------

--
-- 表的结构 `field_config`
--

CREATE TABLE IF NOT EXISTS `#__field_config` (
`id` int(10) unsigned NOT NULL,
  `node_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `field_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `field_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `config_data` text COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `field_config`
--

INSERT INTO `#__field_config` (`id`, `node_type`, `label`, `field_name`, `field_type`, `config_data`, `weight`) VALUES
(1, 'article', '分类', 'category', 'category', '{"category":"category","type":"category"}', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_link`
--

CREATE TABLE IF NOT EXISTS `#__link` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sp_logs`
--

CREATE TABLE IF NOT EXISTS `#__logs` (
`id` int(10) unsigned NOT NULL,
  `uid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('add','edit','delete','login','register','other') COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `#__menu` (
`id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `tid` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `#__menu` (`id`, `pid`, `tid`, `title`, `description`, `url`, `weight`) VALUES
(1, 0, 1, '首页', '顶部首页链接', '/', 0),
(2, 0, 1, '关于我', '关于我的描述', '/node/1', 0),
(3, 0, 2, '首页', '底部首页链接', '/', 0);

-- --------------------------------------------------------

--
-- 表的结构 `menu_type`
--

CREATE TABLE IF NOT EXISTS `#__menu_type` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `machine_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `menu_type`
--

INSERT INTO `#__menu_type` (`id`, `title`, `description`, `machine_name`) VALUES
(1, '顶部菜单', '网站顶部的菜单栏', 'menu_top'),
(2, '底部菜单', '网站底部的菜单栏', 'menu_bottom');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `#__migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `#__migrations` (`migration`, `batch`) VALUES
('2014_10_13_015117_create_users_table', 1),
('2014_10_13_015232_create_users_roles_table', 1),
('2014_10_13_015258_create_roles_table', 1),
('2014_10_13_130133_create_menu_table', 1),
('2014_10_13_130351_create_menu_type_table', 1),
('2014_10_16_123950_create_setting_table', 1),
('2014_10_18_120757_create_category_table', 1),
('2014_10_18_120832_create_category_type_table', 1),
('2014_10_19_032931_create_node_table', 1),
('2014_10_19_032943_create_node_type_table', 1),
('2014_10_22_140042_create_field_table', 1),
('2014_10_23_132015_create_field_config_table', 1),
('2014_10_23_132031_create_node_field_table', 1),
('2014_11_02_043039_create_category_data_table', 1),
('2015_01_21_142430_create_seo_table', 1),
('2015_01_21_142652_create_block_table', 1),
('2015_01_24_090209_create_block_area_table', 1),
('2015_01_26_132731_create_comment_table', 1),
('2015_02_06_145317_create_password_reminders_table', 1),
('2015_02_08_120045_create_logs_table', 1),
('2015_02_09_031030_create_roles_permission_table', 1),
('2015_03_27_114408_create_link_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `node`
--

CREATE TABLE IF NOT EXISTS `#__node` (
`id` int(10) unsigned NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `comment` int(10) unsigned NOT NULL DEFAULT '0',
  `view` int(10) unsigned NOT NULL DEFAULT '0',
  `promote` int(10) unsigned NOT NULL DEFAULT '0',
  `sticky` int(10) unsigned NOT NULL DEFAULT '0',
  `plusfine` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `node`
--

INSERT INTO `#__node` (`id`, `type`, `uid`, `title`, `body`, `status`, `comment`, `view`, `promote`, `sticky`, `plusfine`, `created_at`, `updated_at`) VALUES
(1, 'page', 1, '关于我', '<p>Simpla,源自于世界语，意味简单的意思，同英语里的Simple。</p><p>一起从简单开始。</p>', '1', 0, 0, 0, 0, 0, '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(2, 'article', 1, '欢迎使用Simpla', '<p>欢迎使用Simpla。这是系统自动生成的演示文章。编辑或者删除它，然后开始您的站点！</p><p>如有任何疑问或问题，请通过社区<a href="http://www.simplahub.com" target="_blank">www.simplahub.com</a>寻求帮助</p>', '1', 0, 0, 1, 1, 0, '2015-04-25 00:00:00', '2015-04-25 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `node_field`
--

CREATE TABLE IF NOT EXISTS `#__node_field` (
  `nid` int(10) unsigned NOT NULL,
  `field_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `node_field`
--

INSERT INTO `#__node_field` (`nid`, `field_name`, `value`, `weight`) VALUES
(2, 'category', '1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `node_type`
--

CREATE TABLE IF NOT EXISTS `#__node_type` (
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `node_type`
--

INSERT INTO `#__node_type` (`type`, `name`, `description`) VALUES
('article', '文章', '使用文章发布有关时间的内容，如消息，新闻或日志'),
('page', '基础页面', '对您的静态内容使用基本页面，比如"关于我们"页面');

-- --------------------------------------------------------

--
-- 表的结构 `password_reminders`
--

CREATE TABLE IF NOT EXISTS `#__password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE IF NOT EXISTS `#__roles` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `#__roles` (`id`, `title`, `description`) VALUES
(1, '匿名用户', '未登陆的用户'),
(2, '注册用户', '通过网站注册的用户'),
(3, '管理员', '后台管理员用户');

-- --------------------------------------------------------

--
-- 表的结构 `roles_permission`
--

CREATE TABLE IF NOT EXISTS `#__roles_permission` (
  `rid` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `seo`
--

CREATE TABLE IF NOT EXISTS `#__seo` (
`id` int(10) unsigned NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `seo`
--

INSERT INTO `#__seo` (`id`, `type`, `cid`, `nid`, `title`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'home', 0, 0, '首页', 'Simpla，一个开源免费的cms', 'Simpla,laravel,cms,开源cms，免费cms', '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(2, 'category', 1, 0, '未分类', '未分类内容栏目', '', '2015-04-25 00:00:00', '2015-04-25 00:00:00'),
(3, 'node', 0, 1, '关于Simpla', '关于Simpla', '', '2015-04-25 00:00:00', '2015-04-25 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `setting`
--

CREATE TABLE IF NOT EXISTS `#__setting` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `extend` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `setting`
--

INSERT INTO `#__setting` (`name`, `value`, `status`, `extend`) VALUES
('admin_theme', 'default', 0, ''),
('theme_default', 'default', 0, ''),
('site_name', 'Simpla', 0, ''),
('site_mail', '', 0, ''),
('site_description', 'Simpla，一个基于Laravel的内容管理系统', 0, ''),
('site_url', '', 0, ''),
('site_logo', 'logo.png', 0, ''),
('site_copyright', 'Powered By Simpla', 0, ''),
('site_tongji', '', 0, ''),
('user_is_allow_login', '1', 0, ''),
('user_is_allow_register', '1', 0, ''),
('site_cache', '0', 0, '0'),
('site_comment', '0', 0, '0'),
('site_version', '0.2', 0, '0'),
('site_maintenance', '0', 0, '0'),
('home_list_num', '10', 0, '0'),
('category_list_num', '10', 0, '0'),
('module_status', NULL, 0, '0');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `#__users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `picture` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'upload/default/default.png',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users_roles`
--

CREATE TABLE IF NOT EXISTS `#__users_roles` (
  `uid` int(11) NOT NULL,
  `rid` int(10) unsigned NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `#__block`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_area`
--
ALTER TABLE `#__block_area`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `#__category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_data`
--
ALTER TABLE `#__category_data`
 ADD PRIMARY KEY (`cid`,`nid`), ADD KEY `category_data_nid_foreign` (`nid`);

--
-- Indexes for table `category_type`
--
ALTER TABLE `#__category_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `#__comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field`
--
ALTER TABLE `#__field`
 ADD PRIMARY KEY (`type`);

--
-- Indexes for table `field_config`
--
ALTER TABLE `#__field_config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_link`
--
ALTER TABLE `#__link`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_logs`
--
ALTER TABLE `#__logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `#__menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `#__menu_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `node`
--
ALTER TABLE `#__node`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `node_field`
--
ALTER TABLE `#__node_field`
 ADD PRIMARY KEY (`nid`,`field_name`);

--
-- Indexes for table `node_type`
--
ALTER TABLE `#__node_type`
 ADD PRIMARY KEY (`type`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `#__password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `#__roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `#__seo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `#__users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `#__block`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `block_area`
--
ALTER TABLE `#__block_area`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `#__category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `#__category_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `#__comment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `field_config`
--
ALTER TABLE `#__field_config`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_link`
--
ALTER TABLE `#__link`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_logs`
--
ALTER TABLE `#__logs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `#__menu`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `#__menu_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `#__node`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `#__roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `#__seo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `#__users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `#__category_data`
--
ALTER TABLE `#__category_data`
ADD CONSTRAINT `category_data_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `category` (`id`),
ADD CONSTRAINT `category_data_nid_foreign` FOREIGN KEY (`nid`) REFERENCES `node` (`id`);

--
-- 限制表 `#__node_field`
--
ALTER TABLE `#__node_field`
ADD CONSTRAINT `node_field_nid_foreign` FOREIGN KEY (`nid`) REFERENCES `node` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
