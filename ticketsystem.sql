-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ağu 2018, 00:51:25
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Software x module not working'),
(2, 'System error'),
(3, 'The software is not responding');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`) VALUES
(1, 'WOW Product'),
(2, 'My Lovely Product'),
(3, 'That''s Crazy'),
(4, 'X CRM');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_date` date NOT NULL,
  `categorie_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `ticket_exp` text COLLATE utf8_turkish_ci NOT NULL,
  `ticket_title` text COLLATE utf8_turkish_ci NOT NULL,
  `ticket_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `ticket_date`, `categorie_id`, `product_id`, `ticket_exp`, `ticket_title`, `ticket_status`) VALUES
(1, 2, '2018-08-06', '1', 1, 'Sed molestie purus lacus, sit amet eleifend augue sagittis id. In in purus suscipit, sagittis velit a, porta enim. Curabitur non eros vitae eros pretium auctor a et justo. Quisque ut urna aliquet, volutpat massa sed, tristique risus. Sed efficitur mauris vel nibh consectetur rutrum. Donec lacus leo, mattis eu ligula a, volutpat consectetur diam. Morbi et neque vel sapien finibus pretium. Phasellus vestibulum viverra faucibus. Sed vitae quam euismod, luctus elit ac, egestas eros. Quisque ex leo, commodo ac mauris eu, congue egestas ex. Pellentesque congue, risus a euismod efficitur, lectus mauris placerat risus, et hendrerit erat neque id augue.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lobortis dui eget felis mollis iaculis. ', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets_reply`
--

CREATE TABLE `tickets_reply` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `reply_exp` text COLLATE utf8_turkish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_date` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tickets_reply`
--

INSERT INTO `tickets_reply` (`id`, `ticket_id`, `reply_exp`, `user_id`, `reply_date`) VALUES
(1, 1, 'Suspendisse potenti. Fusce lobortis vehicula ante, non luctus nisl vestibulum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in odio sed orci elementum malesuada id ac risus. Praesent lobortis erat augue, eget scelerisque arcu mollis nec. Aliquam porta dictum justo, rutrum porttitor ex tempus id. Vestibulum consectetur turpis dignissim justo aliquam tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet ac justo quis ornare. Nullam aliquet quis nisl vitae rhoncus. Pellentesque sit amet nisi ut tellus porttitor commodo aliquet quis quam. Praesent dapibus malesuada ultrices. Quisque et hendrerit elit.\n\nSed ac tortor quam. Nunc ut odio sit amet elit mattis interdum quis vel nisi. Quisque malesuada sapien sed dui lobortis hendrerit. Sed vitae posuere ex. Duis malesuada molestie ligula, sed maximus tellus malesuada et. Pellentesque libero velit, tincidunt sit amet risus at, auctor imperdiet est. Mauris nec lorem metus. Aliquam vel gravida felis.', 1, '06 August 2018 - 00:13:57'),
(2, 1, 'Mauris pellentesque fringilla tellus, a ultrices elit congue a. Quisque condimentum justo at magna rutrum, eget auctor tellus placerat. Donec feugiat orci sapien. Phasellus porttitor dapibus mi et scelerisque. Vivamus pellentesque mi pulvinar, luctus quam nec, pharetra ipsum. Suspendisse congue eget felis quis rhoncus.', 2, '06 August 2018 - 00:15:37'),
(3, 1, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla quis velit tempus, pretium metus in, fermentum ligula. Vestibulum mattis diam magna, vitae hendrerit odio vulputate nec. Curabitur hendrerit sem efficitur nunc commodo sagittis. Cras at nibh ac ligula pulvinar gravida vel ut nunc. Sed a augue ex.', 2, '06 August 2018 - 00:26:01'),
(4, 1, 'Mauris molestie aliquet eros eu semper. Suspendisse finibus felis neque, a blandit dui ullamcorper sit amet. Maecenas convallis semper vulputate. Phasellus in ligula et urna scelerisque convallis ac et sem. Cras ut eros est. Donec pretium ipsum vitae condimentum pretium. Nulla facilisi. Praesent non eros sit amet libero commodo molestie vel eu metus. ', 1, '06 August 2018 - 00:26:07'),
(5, 1, 'Quisque ex leo, commodo ac mauris eu, congue egestas ex. Pellentesque congue, risus a euismod efficitur, lectus mauris placerat risus, et hendrerit erat neque id augue. Nulla nec tortor at tortor dapibus tincidunt in ac neque. Etiam nunc sapien, porttitor at fermentum eget, porttitor quis odio.', 2, '06 August 2018 - 00:27:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_auth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_pass`, `user_auth`) VALUES
(1, 'John Doe', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Brittany Sandoval', '202cb962ac59075b964b07152d234b70', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tickets_reply`
--
ALTER TABLE `tickets_reply`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `tickets_reply`
--
ALTER TABLE `tickets_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
