-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 10:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssrumovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `imdb_rating` float DEFAULT NULL,
  `synopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `poster`, `release_date`, `duration`, `rating`, `format`, `imdb_rating`, `synopsis`) VALUES
(1, 'Avatar', 'avatar11.jpg', '2009-12-18', '110 minutes', 'PG-15', 'Digital 2D', 7.9, 'Avatar 1 เป็นเรื่องราวในศตวรรษที่ 22 ยุคที่มนุษย์ผลาญพลังงานบนโลกจนแทบสิ้น และเริ่มตั้งหน้าสำรวจดาวเคราะห์อื่นเพื่ออพยพ หนึ่งในนั้น คือ การสำรวจดาวแพนดอรา ดาวที่ยังคงมีความสมบูรณ์ของธรรมชาติอยู่มาก โดยที่ตัวเองของเรา เจค ซัลลี่ อดีตนาวิกพิการ มีเหตุให้ต้องเข้าร่วมภารกิจ เพราะพี่ชายฝาแฝดเขาตาย แต่โปรเจคนี้ลงทุนทำร่าง Avatar เพื่อสำรวจดาวนี้ไปแล้ว คนเดียวที่ใช้ได้ คือ เจค โดยเจคต้องแฝงตัวไปตีสนิทกับชนเผ่าพื้นเมืองชาวนาวี เพื่อเกลี้ยกล่อมให้พวกเขาอพยพออกจากจุดที่มีแร่สำคัญอย่างอันอ๊อบเทเนียมอยู่ เพื่อให้มนุษย์ผู้แสนโลภได้เข้ามาลงทุนทำเหมืองแร่ต่อไป'),
(2, 'Avatar: The Way of Water', 'avatar_away_of_water.jpg', '2022-12-16', '192 minutes', 'PG-13', 'IMAX 3D', 7.6, 'หลังจากเหตุการณ์ในภาคแรกผ่านไปกว่าสิบปี เจค ซัลลี และเนย์ทิรีได้สร้างครอบครัวและพยายามรักษาความปลอดภัยให้แก่ลูกๆ ของพวกเขา เมื่อภัยคุกคามใหม่เข้ามาถึง พวกเขาจำเป็นต้องออกเดินทางไปยังเผ่าน้ำที่ชื่อว่า เม็ตคายีน่า เพื่อขอที่หลบภัยและปรับตัวให้เข้ากับวิถีชีวิตใหม่ท่ามกลางสายน้ำ ทั้งครอบครัวต้องฝึกฝนทักษะในการใช้ชีวิตในน้ำและรับมือกับศัตรูเก่าที่หวนกลับมาเพื่อล้างแค้น'),
(3, 'Black Adam', 'black_ADUM.jpg', '2022-10-21', '125 minutes', 'PG-13', 'IMAX 3D', 6.3, 'Black Adam เป็นภาพยนตร์ซูเปอร์ฮีโร่จากจักรวาล DC ซึ่งเล่าเรื่องของเทธ-อดัม หรือแบล็ก อดัม นักรบที่ได้รับพลังจากเทพเจ้าอียิปต์ในยุคโบราณ หลังจากถูกกักขังมาเป็นเวลานานกว่า 5,000 ปี เขาได้รับการปลดปล่อยในโลกปัจจุบันและตัดสินใจใช้พลังของเขาเพื่อล้างแค้นและปกป้องบ้านเกิดของเขา นอกจากนี้ แบล็ก อดัมต้องเผชิญหน้ากับกลุ่มฮีโร่ที่รู้จักกันในนาม \"Justice Society of America\" ซึ่งมีหน้าที่หยุดยั้งการทำลายล้างของเขาและช่วยโลก'),
(4, 'Avengers: Age of Ultron (2015)', 'Avengers2.jpg', '2015-05-01', '141 minutes', 'PG-13', 'IMAX 3D', 7.3, 'ใน Avengers: Age of Ultron เหล่าอเวนเจอร์ส ซึ่งประกอบด้วย Iron Man, Captain America, Thor, Hulk, Black Widow, และ Hawkeye ต้องกลับมาร่วมมือกันอีกครั้งเพื่อต่อสู้กับ Ultron ปัญญาประดิษฐ์ที่ Tony Stark และ Bruce Banner สร้างขึ้นเพื่อปกป้องโลก แต่กลับกลายเป็นศัตรูที่มุ่งหมายจะทำลายล้างมนุษยชาติ เหล่าอเวนเจอร์สจึงต้องรวมพลังเพื่อหยุดยั้ง Ultron และปกป้องอนาคตของโลก ในระหว่างนั้นพวกเขายังได้พบกับฮีโร่ใหม่ๆ เช่น Scarlet Witch และ Quicksilver'),
(5, 'Avengers: Infinity War (2018)', 'avengers_infinity_war.jpg', '2015-06-04', '149 minute', 'PG13', 'IMAX 3D', 8.4, 'Avengers: Infinity War เล่าเรื่องราวของธานอส (Thanos) จอมวายร้ายที่มุ่งหมายจะรวบรวม \"Infinity Stones\" ทั้งหก ซึ่งแต่ละเม็ดมีพลังอันมหาศาลที่จะทำให้เขาสามารถควบคุมจักรวาลได้ เมื่อธานอสรวบรวมหินทั้งหมดสำเร็จ เขาจะสามารถใช้พลังในการทำลายล้างครึ่งหนึ่งของจักรวาลในทันที เพื่อป้องกันภัยพิบัตินี้ เหล่าอเวนเจอร์สที่ประกอบด้วย Iron Man, Captain America, Thor, Hulk และฮีโร่จากทั่วจักรวาลอย่าง Guardians of the Galaxy, Spider-Man, Doctor Strange และ Black Panther ต้องร่วมมือกันต่อสู้เพื่อหยุดยั้งธานอสจากแผนการอันชั่วร้ายของเขา'),
(6, 'Avengers: Endgame', 'AvengersEnd.jpg', '2019-04-26', '181 minutes', 'PG-13', 'IMAX 3D', 8.4, 'หลังจากการสูญเสียใน Avengers: Infinity War เหล่าอเวนเจอร์สที่เหลืออยู่ต้องร่วมมือกันอีกครั้งเพื่อย้อนเวลาและหยุดธานอสจากการทำลายล้างจักรวาล'),
(7, 'First Love', 'First Love2.jpeg', '2019-11-15', '123 minutes', 'R', 'IMAX 3D', 6.8, 'ภาพยนตร์แอ็คชั่น-โรแมนติกจากญี่ปุ่น เล่าเรื่องนักมวยหนุ่มที่พบรักครั้งแรกกับหญิงสาวที่ถูกไล่ล่าโดยแก๊งยาเสพติดในโตเกียว'),
(8, 'Ben 10: Alien Swarm', 'ben16.jpg', '2009-11-25', '69 minutes', 'PG', 'Digital', 4.6, 'เบนและทีมงานต้องเผชิญกับภัยคุกคามจากเอเลี่ยนที่กำลังรุกรานโลก และต่อสู้เพื่อปกป้องมวลมนุษย์'),
(9, 'Ben 10: Race Against Time', 'Ben_10.jpg', '2007-11-21', '67 minutes', 'PG', 'Digital', 4.2, 'เบนต้องหยุดยั้งวายร้ายจากมิติอื่นที่ต้องการใช้พลังออมนิทริกซ์เพื่อทำลายล้างโลก'),
(10, 'Doctor Strange', 'Doctor Strange.jpg', '2016-11-04', '115 minutes', 'PG-13', 'IMAX', 7.5, 'เรื่องราวของศัลยแพทย์ที่เดินทางสู่โลกแห่งเวทมนตร์หลังจากประสบอุบัติเหตุ และต้องต่อสู้กับภัยเหนือธรรมชาติ'),
(11, 'Deadpool & Wolverine', 'Deadpool&Wolverine.jpg', '2024-05-03', '140 minutes', 'R', 'IMAX', 7.8, 'Deadpool และ Wolverine ต้องร่วมกันเผชิญภารกิจสุดฮาและอันตราย เพื่อต่อสู้กับวายร้ายในโลกที่เต็มไปด้วยความขัดแย้ง'),
(12, 'Doraemon: Space Heroes', 'Doraemon_space heroes.jpg', '2015-03-07', '100 minutes', 'G', 'Digital', 6.8, 'โดราเอมอนและผองเพื่อนกลายเป็นฮีโร่เพื่อช่วยดาวดวงหนึ่งจากภัยคุกคามของศัตรูที่มาโจมตี'),
(13, 'Doraemon: Symphony', 'doraemon_symphony.jpg', '2020-07-10', '110 minutes', 'G', 'Digital', 7.2, 'โดราเอมอนและเพื่อนๆ ร่วมผจญภัยในโลกแห่งเสียงดนตรีเพื่อปกป้องมันจากการถูกทำลาย'),
(14, 'Goosebumps', 'goosebumps.jpg', '2015-10-16', '103 minutes', 'PG', 'IMAX', 6.3, 'เด็กหนุ่มต้องช่วยนักเขียน R.L. Stine ปกป้องเมืองจากตัวละครที่หลุดออกมาจากหนังสือของเขา'),
(15, 'Interstellar', 'interstellar.jpg', '2014-11-07', '169 minutes', 'PG-13', 'IMAX', 8.6, 'การเดินทางของทีมสำรวจเพื่อหาดาวเคราะห์ใหม่ที่สามารถอาศัยได้ หลังจากโลกกำลังเผชิญกับภัยพิบัติ'),
(16, 'The Avengers', 'avengers1.jpg', '2012-05-04', '143 minutes', 'PG-13', 'IMAX', 8, 'เหล่าฮีโร่จากมาร์เวลต้องรวมตัวกันเพื่อปกป้องโลกจาก Loki และกองทัพชิตอรี'),
(17, 'Joker: Folie à Deux', 'joker2.jpg', '2024-10-04', 'TBA', 'R', 'IMAX', 8.4, 'ภาคต่อของ Joker ที่เล่าเรื่องราวของ Arthur Fleck และการต่อสู้กับจิตใจที่สับสนและบิดเบี้ยว'),
(18, 'Joker', 'joker.jpg', '2019-10-04', '122 minutes', 'R', 'IMAX', 8.5, 'เรื่องราวของอาร์เธอร์ เฟล็ก ชายหนุ่มผู้มีความฝันอยากเป็นนักstand-up comedian แต่ชีวิตเขากลับเต็มไปด้วยความยากลำบากและการถูกทำร้ายทางอารมณ์ อาร์เธอร์ต่อสู้กับอาการโรคจิตที่ทำให้เขาไม่สามารถควบคุมอารมณ์และความรู้สึกของตนได้ เมื่อเขาถูกปฏิเสธและถูกผลักดันจนถึงขีดสุด เขาเริ่มปล่อยให้ความมืดมิดในใจได้แสดงออกมา กลายเป็นโจ๊กเกอร์ ตัวร้ายที่สร้างความวุ่นวายให้กับเมืองโกธัม การเดินทางของเขาเผยให้เห็นถึงความโหดร้ายของสังคมที่ทำให้คนหนึ่งต้องกลายเป็นอาชญากรในที่สุด'),
(19, 'My Little Pony: The Movie', 'mylittle_pony.jpg', '2017-10-06', '99 minutes', 'PG', 'Digital', 6.3, 'ในภาพยนตร์ที่เต็มไปด้วยความสนุกสนานและเพลงนี้ พวกเพื่อนม้าของเราต้องออกเดินทางผจญภัยไปยังโลกใหม่เพื่อช่วยเหลืออาณาจักรแห่งอีควอสเทรียจากการคุกคามของศัตรูที่มีอำนาจ พวกเขาจะต้องใช้ความรักและมิตรภาพในการเผชิญหน้ากับอุปสรรคต่างๆ และค้นพบคุณค่าที่แท้จริงของความเป็นเพื่อน'),
(20, 'Ad Astra', 'ADASTRA.jpg', '2019-09-20', '124 minutes', 'PG-13', 'IMAX', 7, 'เรื่องราวของรอย แม็คไบรด์ นักบินอวกาศที่ต้องออกเดินทางไปยังขอบจักรวาลเพื่อค้นหาพ่อที่หายไปและเปิดเผยความลับที่อาจจะทำลายโลก การเดินทางนี้เต็มไปด้วยความตึงเครียดและความลึกลับ ซึ่งเขาจะต้องเผชิญหน้ากับความท้าทายทางจิตใจและอารมณ์ในขณะที่ค้นหาความหมายของชีวิต'),
(21, 'ธี่หยด', 'T_YOD.jpg', '2023-12-22', '100 minutes', 'PG-13', 'Digital', 6.5, 'เมื่อเหตุการณ์แปลกประหลาดเกิดขึ้นในหมู่บ้านเล็กๆ ชาวบ้านต้องรวมตัวกันเพื่อค้นหาความจริงที่ซ่อนอยู่ และในระหว่างทางพวกเขาต้องเผชิญหน้ากับความกลัวและความลับที่อาจเปลี่ยนแปลงชีวิตของพวกเขาไปตลอดกาล'),
(22, 'ธี่หยด 2', 'T_YOD2.jpg', '2024-12-21', '110 minutes', 'PG-13', 'Digital', 7, 'การกลับมาของตัวละครเดิมในภาคต่อที่ทำให้เรื่องราวเดิมมีความเข้มข้นมากขึ้น พวกเขาต้องกลับมาเผชิญหน้ากับความท้าทายที่ยิ่งใหญ่กว่าเดิมและเผยให้เห็นถึงความลับใหม่ๆ ที่ซ่อนอยู่ภายในตัวพวกเขา'),
(23, 'Toy Story', 'toy_story.jpg', '1995-11-22', '81 minutes', 'G', 'Digital', 8.3, 'เรื่องราวของของเล่นที่มีชีวิต ซึ่งถูกมองข้ามเมื่อเจ้าของของพวกเขาไม่ได้อยู่ใกล้ ในโลกที่เต็มไปด้วยการผจญภัยของวู้ดดี้และบัซ ไลท์เยียร์ พวกเขาต้องร่วมมือกันเพื่อกลับไปหาแอนดี้หลังจากที่เกิดเหตุการณ์ที่ทำให้พวกเขาหลงทาง'),
(24, 'Toy Story 2', 'toy_story2.jpg', '1999-11-24', '92 minutes', 'G', 'Digital', 7.9, 'การกลับมาของวู้ดดี้และบัซ ไลท์เยียร์ เมื่อวู้ดดี้ถูกขโมยไป และบัซต้องรวมทีมกับของเล่นอื่นๆ เพื่อช่วยวู้ดดี้จากการถูกขายในร้านสะสม เรื่องราวนี้สอนเกี่ยวกับมิตรภาพและความสำคัญของการอยู่เคียงข้างกัน'),
(25, 'Toy Story 3', 'Toy_Stor_3.jpg', '2010-06-18', '103 minutes', 'G', 'Digital', 8.2, 'เรื่องราวของแอนดี้ที่กำลังจะเข้ามหาวิทยาลัย และของเล่นของเขาต้องหาที่อยู่ใหม่ เมื่อพวกเขาถูกส่งไปยังสวนเด็กเล่น เรื่องราวแห่งการผจญภัยและการเผชิญหน้ากับความกลัวการถูกทิ้งทวนความหมายของการเติบโตและมิตรภาพ'),
(26, 'Toy Story 4', 'toy_story4.jpg', '2019-06-21', '100 minutes', 'G', 'Digital', 7.8, 'การผจญภัยครั้งใหม่ของวู้ดดี้และบัซ เมื่อวู้ดดี้พบกับฟอร์กี้ ของเล่นใหม่ที่ไม่มั่นใจในตัวเอง ทั้งคู่ต้องร่วมกันช่วยฟอร์กี้ค้นหาตัวตนที่แท้จริง และค้นหาความหมายของการเป็นของเล่น'),
(27, 'Ultraman Rising', 'ultraman_rising.jpg', '2023-07-22', '120 minutes', 'PG', 'Digital', 6.8, 'เมื่อโลกเผชิญหน้ากับอันตรายจากมอนสเตอร์ที่มีพลังมหาศาล อุลตร้าแมนต้องกลับมาอีกครั้งเพื่อปกป้องมนุษยชาติ ในการต่อสู้ที่เต็มไปด้วยความตื่นเต้นและการผจญภัย'),
(28, 'พี่นาค 4', 'unnamed.jpg', '2024-02-08', '115 minutes', 'PG-13', 'Digital', 7.5, 'การกลับมาของพี่นาคในภาคที่สี่ เมื่อนักเรียนกลุ่มหนึ่งต้องไปฝึกสอนที่วัดและพบกับประสบการณ์เหนือธรรมชาติที่ทำให้พวกเขาต้องเผชิญหน้ากับความกลัวและการเปิดเผยความจริง'),
(29, 'Wreck-It Ralph', 'WRECK-IT-RALPH.jpg\n', '2012-11-02', '101 minutes', 'PG', 'Digital', 7.7, 'เรื่องราวของราล์ฟ ตัวร้ายในเกมที่ต้องการเป็นฮีโร่ เขาตัดสินใจหนีออกจากเกมและออกเดินทางเพื่อค้นหาตนเอง ในการเดินทางเขาได้พบกับเพื่อนใหม่และเรียนรู้ว่าความเป็นจริงคือการเป็นตัวของตัวเอง'),
(30, 'Wreck-It Ralph 2: Ralph Breaks the Internet', 'Wreck-It-Ralph2.jpg', '2018-11-21', '112 minutes', 'PG', 'Digital', 7, 'เมื่อราล์ฟและแวนิลล่าต้องออกเดินทางสู่โลกอินเทอร์เน็ตเพื่อค้นหาอุปกรณ์ใหม่ให้กับเกมของพวกเขา เรื่องราวที่เต็มไปด้วยการผจญภัยและการสำรวจความเชื่อมโยงในยุคดิจิตอล');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_number` enum('1','2','3','4','5','6') NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `status` enum('available','reserved') DEFAULT 'available',
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_number`, `movie_name`, `reservation_date`, `reservation_time`, `status`, `username`) VALUES
(48, '1', 'test1', '2024-10-09', '19:16:00', 'reserved', 'wi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `student_id`, `role`) VALUES
(10, 'wittaya', '$2y$10$EwYbU8mRAXP91862kz8InOu5k.m4AzYpFcgzdAKDQG/7yNKk45UOe', '1', 'admin'),
(11, 'benzbenz', '$2y$10$pbVtOr6a3RJyqjDiedi5v.Op2B4UYP9/ZBKFik9NLFjqz.702bGH6', '1234511', 'user'),
(12, 'benz', '$2y$10$FrG1P5zQ80yrHF7YuZoKvuBFCmjpDs5iBs3TTT8Cpe/cJdxoua9Ua', '1234511', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
