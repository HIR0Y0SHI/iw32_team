-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 12 月 11 日 00:42
-- サーバのバージョン： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IW32_Team`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `m_age_limit`
--

CREATE TABLE IF NOT EXISTS `m_age_limit` (
  `age_limit_id` int(11) NOT NULL,
  `limit_level_name` varchar(10) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_age_limit`
--

INSERT INTO `m_age_limit` (`age_limit_id`, `limit_level_name`, `age`) VALUES
(1, 'G', 0),
(2, 'PG12', 12),
(3, 'R15+', 15),
(4, 'R18+', 18);

-- --------------------------------------------------------

--
-- テーブルの構造 `m_creditcard`
--

CREATE TABLE IF NOT EXISTS `m_creditcard` (
  `member_id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_creditcard`
--

INSERT INTO `m_creditcard` (`member_id`, `card_no`) VALUES
(1, 2147483647),
(2, 2147483647),
(3, 2147483647);

-- --------------------------------------------------------

--
-- テーブルの構造 `m_customer_partition`
--

CREATE TABLE IF NOT EXISTS `m_customer_partition` (
  `customer_partition_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_customer_partition`
--

INSERT INTO `m_customer_partition` (`customer_partition_id`, `name`) VALUES
('child', '幼児'),
('college', '大学生・専門学生'),
('general', '一般'),
('highschool', '高校生'),
('junior', '中学生・小学生'),
('senior', 'シニア'),
('women', '女性');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_director`
--

CREATE TABLE IF NOT EXISTS `m_director` (
  `director_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_director`
--

INSERT INTO `m_director` (`director_id`, `name`) VALUES
(1, '新海誠'),
(2, 'デイビッド・イェーツ'),
(3, '草川啓造'),
(4, '三木孝浩');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_language`
--

CREATE TABLE IF NOT EXISTS `m_language` (
  `language_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_language`
--

INSERT INTO `m_language` (`language_id`, `name`) VALUES
('dubbing', '日本語吹替'),
('en', '英語版'),
('ja', '日本語'),
('subtitles', '字幕版');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_member`
--

CREATE TABLE IF NOT EXISTS `m_member` (
  `member_id` int(11) NOT NULL,
  `login_id` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name_kana` varchar(10) NOT NULL,
  `first_name_kana` varchar(10) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `prefectures` varchar(5) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `apartment` varchar(100) DEFAULT NULL,
  `tel` varchar(11) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `birthday` varchar(8) NOT NULL,
  `entry_date` datetime NOT NULL,
  `withdrawal_day` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_member`
--

INSERT INTO `m_member` (`member_id`, `login_id`, `password`, `last_name`, `first_name`, `last_name_kana`, `first_name_kana`, `sex`, `postal_code`, `prefectures`, `city`, `address`, `apartment`, `tel`, `mail`, `birthday`, `entry_date`, `withdrawal_day`) VALUES
(1, 'test01', 'password', '藤井', '弘春', 'フジイ', 'ヒロハル', '男', '0382201', '青森県', '西津軽郡', '深浦町沢辺8-4-4', 'パナハイツ沢辺 1006', '09027440843', 'urahorih@anet.ne.jp', '19910225', '2016-11-11 00:20:16', '2016-12-11 00:00:00'),
(2, 'test02', 'password', '土田', '愛佳', 'ツチダ', 'アイカ', '女', '6200058', '京都府', '福知山市', '厚3-12-8', 'サンシャイン厚 11F', '09058659128', 'aikatoda@coara.or.jp', '19850319', '2016-10-13 00:20:16', '2016-12-11 00:00:00'),
(3, 'test03', 'password', '北村', '朋絵', 'キタムラ', 'トモエ', '女', '1430013', '東京都', '大田区', '大森南5-12-4', NULL, '08006573953', 'eomot86@example.jp', '19861105', '2016-12-11 00:20:16', '2016-12-11 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_movie`
--

CREATE TABLE IF NOT EXISTS `m_movie` (
  `movie_id` varchar(6) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `introduction` text,
  `running_time` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `age_limit_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `movie_genre_id` int(11) NOT NULL,
  `movie_category_id` int(11) NOT NULL,
  `language_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_movie`
--

INSERT INTO `m_movie` (`movie_id`, `movie_name`, `introduction`, `running_time`, `start_date`, `end_date`, `age_limit_id`, `director_id`, `movie_genre_id`, `movie_category_id`, `language_id`) VALUES
('000001', 'ファンタスティック・ビーストと魔法使いの旅', '魔法使いのニュート・スキャマンダーは、優秀だけどおっちょこちょい、そして魔法動物をこよなく愛する変わり者──。世界中を旅しては魔法動物を集め、不思議なトランクに詰め込んでいる。ある時ニュートは、旅の途中でニューヨークへ立ち寄ったが、そこでひょんなことから自分のトランクが普通の人間のトランクと入れ替わってしまう！トランクの中から魔法動物たちは逃げ出してしまい、ニューヨーク中を巻き込む大騒動に！そこで出会う仲間たちや奇想天外な魔法動物とともに、ニュートの新しい冒険が始まる！', 133, '2016-12-01', '2017-02-08', 1, 2, 1, 1, 'dubbing'),
('000002', '君の名は。', '千年ぶりとなる彗星の来訪を一か月後に控えた日本。山深い田舎町に暮らす女子高校生・三葉は憂鬱な毎日を過ごしていた。町長である父の選挙運動に、家系の神社の古き風習。小さく狭い町で、周囲の目が余計に気になる年頃だけに、都会への憧れを強くするばかり。そんなある日、自分が男の子になる夢を見る。見覚えのない部屋、見知らぬ友人、目の前に広がるのは東京の街並み。念願だった都会での生活を思いっきり満喫する三葉。一方、東京で暮らす男子高校生、瀧も、奇妙な夢を見た。行ったこともない山奥の町で、自分が女子高校生になっているのだ。繰り返される不思議な夢。そして、二人は気付く。「私／俺たち、入れ替わってる！？」', 106, '2016-08-24', '2017-01-31', 1, 1, 2, 1, 'ja'),
('000003', '劇場版　艦これ', '海を蹂躙する謎の敵「深海棲艦」。在りし日の艦艇の魂を胸に抱き、その脅威に唯一対抗できる「艦娘」たち。艦娘たちの拠点「鎮守府」の存亡をかけ双方が激突した「MI作戦」では特型駆逐艦「吹雪」の活躍もあり艦娘たちが勝利を収めたが、その激戦以降、彼女たちの戦いはますます熾烈なものとなっていた。MI作戦の成功を足がかりに、鎮守府の戦力は南方の海域に進出。敵泊地の攻略を続け、その戦域を少しずつ拡大していた。その中で新たな前線基地に集結し、次の作戦に備える艦娘たち。戦いを経て成長し、そして新たな戦力も加わり続けて作戦に成功を収め意気上がる彼女たちだったが、目標とする海域に重大な異変が発生していることが判明する。', 91, '2016-12-07', '2017-02-23', 4, 3, 2, 1, 'ja'),
('000004', 'ぼくは明日、昨日のきみとデートする', '京都の美大に通う20歳の学生・南山高寿（福士蒼汰）は、いつものように大学まで向かう電車の中で出会った女性・福寿愛美（小松菜奈）を一目見た瞬間、恋に落ちた。 勇気を振り絞って声をかけ、「また会える？」と約束を取り付けようとした高寿だったが、それを聞いた彼女は、なぜか、突然涙してしまう―。 彼女のこの時の涙の理由を知る由もない高寿だったが、2人は意気投合し、その後、すぐに交際をスタート。 高寿と愛美の関係は誰もがうらやむ程に順調で、すべてがうまくいくものだと信じていた。しかし、高寿はある日、愛美から彼女の想像もできなかった大きな秘密を明かされる…。', 110, '2016-12-10', '2017-02-27', 1, 4, 6, 1, 'ja');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_movie_category`
--

CREATE TABLE IF NOT EXISTS `m_movie_category` (
  `movie_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_movie_category`
--

INSERT INTO `m_movie_category` (`movie_category_id`, `name`) VALUES
(1, '通常映画'),
(2, '3D映画'),
(3, '４DX映画'),
(4, 'IMAX');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_movie_genre`
--

CREATE TABLE IF NOT EXISTS `m_movie_genre` (
  `movie_genre_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_movie_genre`
--

INSERT INTO `m_movie_genre` (`movie_genre_id`, `name`) VALUES
(1, 'ファンタジー'),
(2, 'アニメ'),
(3, 'ドラマ映画'),
(4, 'ホラー'),
(5, 'ヒステリー'),
(6, '恋愛\r\n');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_performer`
--

CREATE TABLE IF NOT EXISTS `m_performer` (
  `performer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_performer`
--

INSERT INTO `m_performer` (`performer_id`, `name`) VALUES
(1, '福士蒼汰'),
(2, '小松菜奈'),
(3, '山田裕貴'),
(4, '清原果耶'),
(5, '東出昌大'),
(6, '大鷹明良'),
(7, '上坂すみれ'),
(8, '藤田咲'),
(9, '井口裕香'),
(10, '佐倉綾音'),
(11, '竹達彩奈'),
(12, '東山奈央'),
(13, '神木隆之介'),
(14, '上白石萌音'),
(15, 'エディ・レッドメイン'),
(16, 'キャサリン・ウォーターストン'),
(17, 'アリソン・スドル'),
(18, 'ダン・フォグラー'),
(19, 'エズラ・ミラー');

-- --------------------------------------------------------

--
-- テーブルの構造 `m_price`
--

CREATE TABLE IF NOT EXISTS `m_price` (
  `movie_category_id` int(11) NOT NULL,
  `customer_partition_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_price`
--

INSERT INTO `m_price` (`movie_category_id`, `customer_partition_id`, `name`, `price`) VALUES
(1, 'child', '通常料金 / 幼児（３歳〜）', 1000),
(1, 'college', '通常料金 / 大学生', 1500),
(1, 'general', '通常料金 / 一般', 1800),
(1, 'highschool', '通常料金 / 高校生', 1000),
(1, 'junior', '通常料金 / 中・小学生', 1000),
(1, 'senior', '通常料金 / シニア（６０歳以上）', 1000),
(1, 'women', 'レディースデイ', 1500);

-- --------------------------------------------------------

--
-- テーブルの構造 `m_schedual`
--

CREATE TABLE IF NOT EXISTS `m_schedual` (
  `schedual_id` int(11) NOT NULL,
  `movie_id` varchar(6) NOT NULL,
  `doors_open_time` datetime NOT NULL,
  `closing_time` datetime NOT NULL,
  `screen_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_schedual`
--

INSERT INTO `m_schedual` (`schedual_id`, `movie_id`, `doors_open_time`, `closing_time`, `screen_id`) VALUES
(1, '000001', '2016-12-13 12:20:00', '2016-12-13 14:45:00', 1),
(2, '000001', '2016-12-13 15:15:00', '2016-12-13 17:40:00', 1),
(3, '000001', '2016-12-13 18:15:00', '2016-12-13 20:40:00', 1),
(4, '000002', '2016-12-13 09:00:00', '2016-12-13 11:00:00', 2),
(5, '000002', '2016-12-13 11:30:00', '2016-12-13 13:30:00', 2),
(6, '000002', '2016-12-13 14:00:00', '2016-12-13 16:00:00', 2),
(7, '000002', '2016-12-13 16:30:00', '2016-12-13 18:30:00', 2),
(8, '000002', '2016-12-13 19:00:00', '2016-12-13 21:00:00', 2),
(9, '000002', '2016-12-13 21:30:00', '2016-12-13 23:30:00', 2),
(10, '000003', '2016-12-13 11:05:00', '2016-12-13 12:50:00', 3),
(11, '000003', '2016-12-13 13:15:00', '2016-12-13 15:00:00', 3),
(12, '000003', '2016-12-13 15:30:00', '2016-12-13 17:15:00', 3),
(13, '000003', '2016-12-13 17:45:00', '2016-12-13 19:30:00', 3),
(14, '000004', '2016-12-13 09:00:00', '2016-12-13 11:00:00', 4),
(15, '000004', '2016-12-13 11:30:00', '2016-12-13 13:30:00', 4),
(16, '000004', '2016-12-13 14:00:00', '2016-12-13 16:00:00', 4),
(17, '000004', '2016-12-13 16:30:00', '2016-12-13 18:30:00', 4),
(18, '000004', '2016-12-13 19:00:00', '2016-12-13 21:00:00', 4),
(19, '000004', '2016-12-13 21:30:00', '2016-12-13 23:30:00', 4),
(20, '000004', '2016-12-11 09:00:00', '2016-12-11 11:00:00', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `m_screen`
--

CREATE TABLE IF NOT EXISTS `m_screen` (
  `screen_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `number_of_seats` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_screen`
--

INSERT INTO `m_screen` (`screen_id`, `name`, `number_of_seats`) VALUES
(1, 'スクリーン１', 100),
(2, 'スクリーン２', 100),
(3, 'スクリーン3', 100),
(4, 'スクリーン4', 100);

-- --------------------------------------------------------

--
-- テーブルの構造 `m_special_day`
--

CREATE TABLE IF NOT EXISTS `m_special_day` (
  `special_day_id` int(11) NOT NULL,
  `customer_partition_id` varchar(10) NOT NULL,
  `movie_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `monday` tinyint(1) DEFAULT NULL,
  `tuesday` tinyint(1) DEFAULT NULL,
  `wednesday` tinyint(1) DEFAULT NULL,
  `thursday` tinyint(1) DEFAULT NULL,
  `friday` tinyint(1) DEFAULT NULL,
  `saturday` tinyint(1) DEFAULT NULL,
  `sunday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_special_day`
--

INSERT INTO `m_special_day` (`special_day_id`, `customer_partition_id`, `movie_category_id`, `name`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(1, 'women', 1, 'レディースデイ', NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_performance`
--

CREATE TABLE IF NOT EXISTS `t_performance` (
  `movie_id` varchar(6) NOT NULL,
  `performer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_performance`
--

INSERT INTO `t_performance` (`movie_id`, `performer_id`) VALUES
('000004', 1),
('000004', 2),
('000004', 3),
('000004', 4),
('000004', 5),
('000004', 6),
('000003', 7),
('000003', 8),
('000003', 9),
('000003', 10),
('000003', 11),
('000003', 12),
('000002', 13),
('000002', 14),
('000001', 15),
('000001', 16),
('000001', 17),
('000001', 18),
('000001', 19);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_reservation`
--

CREATE TABLE IF NOT EXISTS `t_reservation` (
  `reservation_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_reservation`
--

INSERT INTO `t_reservation` (`reservation_id`, `member_id`, `date`, `schedule_id`) VALUES
(1, 1, '2016-12-10 15:33:17', 20);

-- --------------------------------------------------------

--
-- テーブルの構造 `t_seat`
--

CREATE TABLE IF NOT EXISTS `t_seat` (
  `schedual_id` int(11) NOT NULL,
  `seat_positon` varchar(5) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `customer_partition_id` varchar(10) NOT NULL,
  `movie_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `t_seat`
--

INSERT INTO `t_seat` (`schedual_id`, `seat_positon`, `reservation_id`, `customer_partition_id`, `movie_category_id`) VALUES
(20, '01_01', 1, 'general', 1),
(20, '01_02', 1, 'general', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_age_limit`
--
ALTER TABLE `m_age_limit`
  ADD PRIMARY KEY (`age_limit_id`);

--
-- Indexes for table `m_creditcard`
--
ALTER TABLE `m_creditcard`
  ADD PRIMARY KEY (`member_id`,`card_no`);

--
-- Indexes for table `m_customer_partition`
--
ALTER TABLE `m_customer_partition`
  ADD PRIMARY KEY (`customer_partition_id`);

--
-- Indexes for table `m_director`
--
ALTER TABLE `m_director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `m_language`
--
ALTER TABLE `m_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `m_member`
--
ALTER TABLE `m_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `m_movie`
--
ALTER TABLE `m_movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `age_limit_id` (`age_limit_id`),
  ADD KEY `director_id` (`director_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `movie_category_id` (`movie_category_id`),
  ADD KEY `movie_genre_id` (`movie_genre_id`);

--
-- Indexes for table `m_movie_category`
--
ALTER TABLE `m_movie_category`
  ADD PRIMARY KEY (`movie_category_id`);

--
-- Indexes for table `m_movie_genre`
--
ALTER TABLE `m_movie_genre`
  ADD PRIMARY KEY (`movie_genre_id`);

--
-- Indexes for table `m_performer`
--
ALTER TABLE `m_performer`
  ADD PRIMARY KEY (`performer_id`);

--
-- Indexes for table `m_price`
--
ALTER TABLE `m_price`
  ADD PRIMARY KEY (`movie_category_id`,`customer_partition_id`),
  ADD KEY `customer_partition_id` (`customer_partition_id`);

--
-- Indexes for table `m_schedual`
--
ALTER TABLE `m_schedual`
  ADD PRIMARY KEY (`schedual_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `screen_id` (`screen_id`);

--
-- Indexes for table `m_screen`
--
ALTER TABLE `m_screen`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `m_special_day`
--
ALTER TABLE `m_special_day`
  ADD PRIMARY KEY (`special_day_id`),
  ADD KEY `customer_partition_id` (`customer_partition_id`,`movie_category_id`);

--
-- Indexes for table `t_performance`
--
ALTER TABLE `t_performance`
  ADD PRIMARY KEY (`movie_id`,`performer_id`),
  ADD KEY `performer_id` (`performer_id`);

--
-- Indexes for table `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `t_seat`
--
ALTER TABLE `t_seat`
  ADD PRIMARY KEY (`schedual_id`,`seat_positon`),
  ADD KEY `customer_partition_id` (`customer_partition_id`,`movie_category_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_age_limit`
--
ALTER TABLE `m_age_limit`
  MODIFY `age_limit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_director`
--
ALTER TABLE `m_director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_member`
--
ALTER TABLE `m_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_movie_category`
--
ALTER TABLE `m_movie_category`
  MODIFY `movie_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_movie_genre`
--
ALTER TABLE `m_movie_genre`
  MODIFY `movie_genre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_performer`
--
ALTER TABLE `m_performer`
  MODIFY `performer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `m_schedual`
--
ALTER TABLE `m_schedual`
  MODIFY `schedual_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `m_screen`
--
ALTER TABLE `m_screen`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_special_day`
--
ALTER TABLE `m_special_day`
  MODIFY `special_day_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_reservation`
--
ALTER TABLE `t_reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `m_creditcard`
--
ALTER TABLE `m_creditcard`
  ADD CONSTRAINT `m_creditcard_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `m_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `m_movie`
--
ALTER TABLE `m_movie`
  ADD CONSTRAINT `m_movie_ibfk_1` FOREIGN KEY (`age_limit_id`) REFERENCES `m_age_limit` (`age_limit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_movie_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `m_director` (`director_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_movie_ibfk_3` FOREIGN KEY (`language_id`) REFERENCES `m_language` (`language_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_movie_ibfk_4` FOREIGN KEY (`movie_category_id`) REFERENCES `m_movie_category` (`movie_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_movie_ibfk_5` FOREIGN KEY (`movie_genre_id`) REFERENCES `m_movie_genre` (`movie_genre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `m_price`
--
ALTER TABLE `m_price`
  ADD CONSTRAINT `m_price_ibfk_1` FOREIGN KEY (`customer_partition_id`) REFERENCES `m_customer_partition` (`customer_partition_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_price_ibfk_2` FOREIGN KEY (`movie_category_id`) REFERENCES `m_movie_category` (`movie_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `m_schedual`
--
ALTER TABLE `m_schedual`
  ADD CONSTRAINT `m_schedual_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `m_movie` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_schedual_ibfk_2` FOREIGN KEY (`screen_id`) REFERENCES `m_screen` (`screen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `m_special_day`
--
ALTER TABLE `m_special_day`
  ADD CONSTRAINT `m_special_day_ibfk_1` FOREIGN KEY (`customer_partition_id`, `movie_category_id`) REFERENCES `m_price` (`customer_partition_id`, `movie_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `t_performance`
--
ALTER TABLE `t_performance`
  ADD CONSTRAINT `t_performance_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `m_movie` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_performance_ibfk_2` FOREIGN KEY (`performer_id`) REFERENCES `m_performer` (`performer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD CONSTRAINT `t_reservation_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `m_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- テーブルの制約 `t_seat`
--
ALTER TABLE `t_seat`
  ADD CONSTRAINT `t_seat_ibfk_1` FOREIGN KEY (`customer_partition_id`, `movie_category_id`) REFERENCES `m_price` (`customer_partition_id`, `movie_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_seat_ibfk_2` FOREIGN KEY (`schedual_id`) REFERENCES `m_schedual` (`schedual_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_seat_ibfk_3` FOREIGN KEY (`reservation_id`) REFERENCES `t_reservation` (`reservation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
