-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 08:14 PM
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
-- Database: `plantify2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `date`, `content`, `image`) VALUES
(1, 'Blossoming Wisdom: Your Ultimate Guide to Flourishing Gardens', 'Suleman', '2024-09-15', 'blah blah', '2.png'),
(2, 'Blossoming Wisdom: Your Ultimate Guide to Flourishing Gardens', 'Suleman', '2024-09-15', 'blah blah', '2.png'),
(3, 'Blossoming Wisdom: Your Ultimate Guide to Flourishing Gardens', 'Suleman', '2004-09-09', 'uhiuabshbhcbacbhxahbcuhdbaiudhsuifhsiF', '7.jpg'),
(4, 'Blossoming Wisdom: Your Ultimate Guide to Flourishing Gardens', 'Suleman', '2004-08-08', 'nuidsabugydulicnxlhjcvyuLSGITYTDFSYFGSAYGFD', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`, `image_path`, `created_at`) VALUES
(2, 'WhatsApp Image 2024-08-26 at 09.53.02_89e36283.jpg', 'img/gallery/WhatsApp Image 2024-08-26 at 09.53.02_89e36283.jpg', '2024-09-15 18:59:00'),
(3, 'WhatsApp Image 2024-08-26 at 09.53.23_d271cf40.jpg', 'img/gallery/WhatsApp Image 2024-08-26 at 09.53.23_d271cf40.jpg', '2024-09-15 18:59:06'),
(4, 'WhatsApp Image 2024-08-26 at 09.53.13_5ae744cf.jpg', 'img/gallery/WhatsApp Image 2024-08-26 at 09.53.13_5ae744cf.jpg', '2024-09-15 18:59:13'),
(5, '1.jpg', 'img/gallery/1.jpg', '2024-09-15 18:59:28'),
(6, '5.jpg', 'img/gallery/5.jpg', '2024-09-15 18:59:33'),
(7, '3.jpg', 'img/gallery/3.jpg', '2024-09-15 18:59:39'),
(8, '6.jpg', 'img/gallery/6.jpg', '2024-09-15 18:59:44'),
(9, '8.jpg', 'img/gallery/8.jpg', '2024-09-15 18:59:50'),
(10, '7.jpg', 'img/gallery/7.jpg', '2024-09-15 18:59:57'),
(11, '4.jpg', 'img/gallery/4.jpg', '2024-09-15 19:00:03'),
(12, '10.jpg', 'img/gallery/10.jpg', '2024-09-17 17:37:53'),
(13, '11.jpg', 'img/gallery/11.jpg', '2024-09-17 17:37:58'),
(14, '13.jpg', 'img/gallery/13.jpg', '2024-09-17 17:38:03'),
(15, '14.jpg', 'img/gallery/14.jpg', '2024-09-17 17:38:08'),
(16, '16.jpg', 'img/gallery/16.jpg', '2024-09-17 17:38:15'),
(17, '17.jpg', 'img/gallery/17.jpg', '2024-09-17 17:38:22'),
(18, '18.jpg', 'img/gallery/18.jpg', '2024-09-17 17:38:28'),
(19, 'Green and White Modern Minimalist Nature Presentation.jpg', 'img/gallery/Green and White Modern Minimalist Nature Presentation.jpg', '2024-09-17 17:38:36'),
(20, '25.jpg', 'img/gallery/25.jpg', '2024-09-17 17:38:42'),
(21, '24.jpg', 'img/gallery/24.jpg', '2024-09-17 17:38:47'),
(22, '21.jpg', 'img/gallery/21.jpg', '2024-09-17 17:38:55'),
(23, '20.jpg', 'img/gallery/20.jpg', '2024-09-17 17:39:03'),
(24, '20.jpg', 'img/gallery/20.jpg', '2024-09-17 17:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `index_products`
--

CREATE TABLE `index_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_products`
--

INSERT INTO `index_products` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `product_link`) VALUES
(7, 'Serene Pink Lotus', 'The serene beauty of this pink lotus plant adds tranquility to your home. Its elegant petals and rich green leaves create a peaceful atmosphere.', 100.00, 'img/plant-pro/flower.jpg', NULL),
(8, 'Floral Planter', 'A decorative pot featuring intricate floral designs embossed on its surface, complete with a drainage tray.	', 100.00, 'img/pots-pro/floral.jpg', NULL),
(9, 'Gardening Tools	', 'A collection of various gardening tools, including a trowel, fork, and pliers.	', 350.00, 'img/tools/t.jpg', NULL),
(10, 'Gardening Gloves	', 'A pair of gloves designed for gardening, featuring a textured grip.	', 100.00, 'img/tools/2.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `category`, `customer_name`, `customer_email`, `shipping_address`, `quantity`, `total_price`, `order_date`, `status`) VALUES
(13, 13, 'plants', 'Moon', 'moon@gmail.com', '0', 5, 500.00, '2024-09-19 13:12:03', 'delivered'),
(14, 11, 'pots', 'Muhammad Suleman', 'mhrsuleman99@gmail.com', '0', 1, 100.00, '2024-09-21 18:12:40', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`) VALUES
(11, 'White Blooms', 'Brighten your space with this stunning arrangement of delicate white flowers. Perfect for adding a touch of sophistication and freshness to any room.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.47.50_4feae3b2.jpg', '2024-09-16 19:29:46'),
(12, 'Lush Green Beauty', 'This vibrant plant features glossy green leaves and charming white flowers, bringing a refreshing burst of nature indoors. Ideal for enhancing any decor.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.48.16_495b1f7b.jpg', '2024-09-16 19:32:41'),
(13, 'Serene Pink Lotus', 'The serene beauty of this pink lotus plant adds tranquility to your home. Its elegant petals and rich green leaves create a peaceful atmosphere.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.48.26_c37e38e4.jpg', '2024-09-16 19:36:04'),
(14, 'New Growth Delight', 'Featuring lush, large leaves, this plant symbolizes new beginnings. Its vibrant green foliage makes a striking statement in any setting', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.48.48_fb19897b.jpg', '2024-09-16 19:36:43'),
(15, 'Tropical Elegance', 'This delightful plant showcases striking foliage, perfect for adding a tropical flair to your space. Its lush appearance brings life and vibrancy indoors.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.50.35_b5459fa4.jpg', '2024-09-16 19:37:08'),
(16, 'Whimsical Bonsai', 'This unique bonsai plant combines artistry and nature, featuring a beautifully twisted trunk and lush green leaves. A perfect centerpiece for any room.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.50.46_ab6e4430.jpg', '2024-09-16 19:37:57'),
(17, 'Miniature Ficus', 'With its dense green foliage, this miniature Ficus plant adds a touch of elegance. Its compact size makes it perfect for tabletops or small spaces.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.50.57_50808087.jpg', '2024-09-16 19:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `pots`
--

CREATE TABLE `pots` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pots`
--

INSERT INTO `pots` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`) VALUES
(10, 'Minimalist Pot', 'A smooth, cylindrical pot with a soft beige finish, embodying a minimalist aesthetic.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.38.23_86526d86.jpg', '2024-09-16 20:15:49'),
(11, 'Earthy Bowl Pot', 'A rounded, bowl-shaped pot in a muted, earthy tone, showcasing simplicity and elegance.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.38.59_3de6b686.jpg', '2024-09-16 20:16:20'),
(12, 'Floral Planter', 'A decorative pot featuring intricate floral designs embossed on its surface, complete with a drainage tray.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.39.19_ae4cfc78.jpg', '2024-09-16 20:16:56'),
(13, 'Ornate Relief Pot', 'An ornate pot with handles and detailed relief work, highlighting classic design elements.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.40.59_6d2ee0c8.jpg', '2024-09-16 20:17:25'),
(14, 'Fluted Urn Pot', 'A tall, fluted urn-style pot with elegant detailing and side handles.\r\n', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.41.25_a8389261.jpg', '2024-09-16 20:17:56'),
(15, 'Elegant Vase Pot', 'A tall pot with a textured surface and decorative rim, exuding sophistication.\r\n', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.41.57_c3ab79e0.jpg', '2024-09-16 20:19:23'),
(16, 'Smooth Round Pot', 'A rounded pot with a smooth finish and subtle decorative accents.\r\n', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.42.43_84e4c9ef.jpg', '2024-09-16 20:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`) VALUES
(9, 'Lettuce Seed Pack', 'A clear packet featuring vibrant green lettuce leaves on the front, ideal for home gardening.', 100.00, 'uploads/1.jpg', '2024-09-16 20:25:39'),
(10, 'Mixed Flower Seeds', 'A transparent bag filled with colorful seeds, perfect for creating a vibrant flower garden.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.56.24_0ed8f32e.jpg', '2024-09-16 20:26:05'),
(11, 'Multi Garden Seeds', 'A stylish packet showcasing a variety of colorful seeds for a lively and diverse garden.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.59.04_d6fc76a9.jpg', '2024-09-16 20:26:35'),
(12, 'Multicolored Seed ', 'A neutral-toned packet containing a blend of colorful seeds, suitable for any garden enthusiast.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.59.21_46c5338a.jpg', '2024-09-16 20:27:07'),
(13, 'Multicolored Seed Mix', 'A neutral-toned packet containing a blend of colorful seeds, suitable for any garden enthusiast.', 100.00, 'uploads/WhatsApp Image 2024-09-16 at 11.59.21_46c5338a.jpg', '2024-09-16 21:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `product_name`, `product_description`, `product_price`, `product_image`, `created_at`) VALUES
(12, 'Gardening Gloves', 'A pair of gloves designed for gardening, featuring a textured grip.', 100.00, 'uploads/2.jpg', '2024-09-16 19:42:51'),
(13, 'Garden Cart', 'A cart with a plant inside, designed for transporting soil or plants in a garden setting.', 100.00, 'img/tools/4.jpg', '2024-09-16 19:43:22'),
(14, 'Trellis', 'A wooden trellis supporting climbing plants or vines.', 100.00, 'uploads/5.jpg', '2024-09-16 19:43:52'),
(15, 'Gardening Fork', 'A traditional garden fork with a wooden handle.', 100.00, 'uploads/6.jpg', '2024-09-16 19:44:29'),
(16, 'Rake', 'A gardening rake, useful for leveling soil or collecting leaves.', 100.00, 'uploads/7.jpg', '2024-09-16 19:45:05'),
(17, 'Garden Trowel', 'A small hand tool for digging, planting, or moving soil.', 100.00, 'uploads/10.jpg', '2024-09-16 19:48:51'),
(21, 'Gardening Tools', 'A collection of various gardening tools, including a trowel, fork, and pliers.', 300.00, 'uploads/WhatsApp Image 2024-09-16 at 12.03.10_11e3ea44.jpg', '2024-09-16 20:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Moon', 'moon@gmail.com', '$2y$10$5Ayk3Uy7zi7wXPEmrHnAsOy3Futty2/hG6qJxCaGWAXh13icy/xly', '2024-09-13 16:00:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_products`
--
ALTER TABLE `index_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots`
--
ALTER TABLE `pots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `index_products`
--
ALTER TABLE `index_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pots`
--
ALTER TABLE `pots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
