-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 12:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `slug`, `category_id`, `description`, `image`) VALUES
(1, 'Harry Potter', 'harry-potter', 1, 'Harry Potter adalah seri tujuh novel fantasi yang dikarang oleh penulis Inggris J. K. Rowling. Novel ini mengisahkan tentang petualangan seorang penyihir remaja bernama Harry Potter dan sahabatnya, Ronald Bilius Weasley dan Hermione Jean Granger, yang merupakan pelajar di Sekolah Sihir Hogwarts.', 'Harry.jpg'),
(5, 'Pirates of the Caribbean', 'pirates-of-the-caribbean', 1, 'Pirates of the Caribbean adalah serangkaian film fantasi petualang yang diproduksi oleh Jerry Bruckheimer dan berdasarkan atraksi taman hiburan Walt Disney dengan nama yang sama. Seri film berfungsi sebagai komponen utama dari waralaba media eponymous.', 'pirate.jpg'),
(6, 'The Hobbit', 'the-hobbit', 1, 'The Hobbit adalah seri tiga film epik fantasi-petualangan yang disutradarai, ditulis, dan diproduseri Peter Jackson dan didasarkan pada novel fantasi karya J. R. R. Tolkien berjudul The Hobbit.', '2022-01-06MV5BMTcwNTE4MTUxMl5BMl5BanBnXkFtZTcwMDIyODM4OA@@._V1_FMjpg_UX1000_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `book_id`, `page`, `content`) VALUES
(1, 1, 1, 'The Boy Who Lived \r\n Mr. and Mrs. Dursley, of number four, Privet Drive, were proud to say that they were perfectly \r\nnormal, thank you very much. They were the last people you’d expect to be involved in anything \r\nstrange or mysterious, because they just didn’t hold with such nonsense. \r\n Mr. Dursley was the director of a firm called Grunnings, which made drills. He was a big, beefy \r\nman with hardly any neck, although he did have a very large mustache. Mrs. Dursley was thin \r\nand blonde and had nearly twice the usual amount of neck, which came in very useful as she \r\nspent so much of her time craning over garden fences, spying on the neighbors. The Dursleys \r\nhad a small son called Dudley and in their opinion there was no finer boy anywhere. \r\n The Dursleys had everything they wanted, but they also had a secret, and their greatest fear was \r\nthat somebody would discover it. They didn’t think they could bear it if anyone found out about \r\nthe Potters. Mrs. Potter was Mrs. Dursley’s sister, but they hadn’t met for several years; in fact, \r\nMrs. Dursley pretended she didn’t have a sister, because her sister and her good-for-nothing \r\nhusband were as unDursleyish as it was possible to be. The Dursleys shuddered to think what the \r\nneighbors would say if the Potters arrived in the street. The Dursleys knew that the Potters had a \r\nsmall son, too, but they had never even seen him. This boy was another good reason for keeping \r\nthe Potters away; they didn’t want Dudley mixing with a child like that. \r\n When Mr. and Mrs. Dursley woke up on the dull, gray Tuesday our story starts, there was \r\nnothing about the cloudy sky outside to suggest that strange and mysterious things would soon be \r\nhappening all over the country. Mr. Dursley hummed as he picked out his most boring tie for \r\nwork, and Mrs. Dursley gossiped away happily as she wrestled a screaming Dudley into his high \r\nchair. \r\n None of them noticed a large, tawny owl flutter past the window. \r\n At half past eight, Mr. Dursley picked up his briefcase, pecked Mrs. Dursley on the cheek, and \r\ntried to kiss Dudley good-bye but missed, because Dudley was now having a tantrum and \r\nthrowing his cereal at the walls.'),
(2, 1, 2, '“Little tyke,” chortled Mr. Dursley as he left the house. He got into his car and backed out of \r\nnumber four’s drive. \r\n It was on the corner of the street that he noticed the first sign of something peculiar — a cat \r\nreading a map. For a second, Mr. Dursley didn’t realize what he had seen — then he jerked his head \r\naround to look again. There was a tabby cat standing on the corner of Privet Drive, but there wasn’t a \r\nmap in sight. What could he have been thinking of? It must have been a trick of the light. Mr. \r\nDursley blinked and stared at the cat. It stared back. As Mr. Dursley drove around the corner and up \r\nthe road, he watched the cat in his mirror. It was now reading the sign that said Privet Drive — no, \r\nlooking at the sign; cats couldn’t read maps or signs. Mr. Dursley gave himself a little shake and put \r\nthe cat out of his mind. As he drove toward town he thought of nothing except a large order of drills \r\nhe was hoping to get that day. \r\n But on the edge of town, drills were driven out of his mind by something else. As he sat in the \r\nusual morning traffic jam, he couldn’t help noticing that there seemed to be a lot of strangely \r\ndressed people about. People in cloaks. Mr. Dursley couldn’t bear people who dressed in funny \r\nclothes — the getups you saw on young people! He supposed this was some stupid new fashion. \r\nHe drummed his fingers on the steering wheel and his eyes fell on a huddle of these weirdos \r\nstanding quite close by. They were whispering excitedly together. Mr. Dursley was enraged to \r\nsee that a couple of them weren’t young at all; why, that man had to be older than he was, and \r\nwearing an emerald-green cloak! The nerve of him! But then it struck Mr. Dursley that this was \r\nprobably some silly stunt —these people were obviously collecting for something… yes, that \r\nwould be it. The traffic moved on and a few minutes later, Mr. Dursley arrived in the Grunnings \r\nparking lot, his mind back on drills. \r\n Mr. Dursley always sat with his back to the window in his office on the ninth floor. If he hadn’t, \r\nhe might have found it harder to concentrate on drills that morning. He didn’t see the owls \r\nswooping past in broad daylight, though people down in the street did; they pointed and gazed \r\nopen-mouthed as owl after owl sped overhead. Most of them had never seen an owl even at \r\nnighttime. Mr. Dursley, however, had a perfectly normal, owl-free morning. He yelled at five \r\ndifferent people. He made several important telephone calls and shouted a bit more. He was in a \r\nvery good mood until lunchtime, when he thought he’d stretch his legs and walk across the road \r\nto buy himself a bun from the bakery. \r\n He’d forgotten all about the people in cloaks until he passed a group of them next to the baker’s. \r\nHe eyed them angrily as he passed. He didn’t know why, but they made him uneasy. This bunch \r\nwere whispering excitedly, too, and he couldn’t see a single collecting tin. It was on his way \r\nback past them, clutching a large doughnut in a bag, that he caught a few words of what they \r\nwere saying. \r\n “The Potters, that’s right, that’s what I heard —” \r\n “ — yes, their son, Harry —”'),
(7, 5, 1, '<p>dbdsbhds</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` enum('1','2','','') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `role`) VALUES
(9, 'admin', 'admin@gmail.com', 'admin', '1'),
(11, 'user', 'user@gmail.com', 'user', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
