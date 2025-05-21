-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 10:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Fast food'),
(2, 'Drinks'),
(3, 'Healthy food');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_status`, `comment_author`, `comment_content`, `comment_date`, `comment_email`) VALUES
(28, 39, 'unapproved', 'kk', 'very tasty bun kababs. Enjoyed!! ', '2023-05-10', 'mukandrathi112@gmail.com'),
(29, 39, 'approved', 'kk', 'very tasty bun kabas, enjoyed!!', '2023-05-10', 'mukandrathi112@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food_blogs`
--

CREATE TABLE `food_blogs` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comments` int(10) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'pending',
  `post_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_blogs`
--

INSERT INTO `food_blogs` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comments`, `post_status`, `post_price`) VALUES
(37, 1, 'Haleem', 'mukand', '2023-05-06', 'f5.jpeg', '        Haleem is a thick and hearty stew made with a combination of lentils, meat (usually beef or chicken), and wheat. Slow-cooked for hours, the result is a velvety and flavorful dish that is often enjoyed during the holy month of Ramadan or on special occasions. It is typically garnished with fried onions, ginger, and lemon juice.    ', 'Haleem', 3, 'published', 1000.00),
(38, 1, 'Chicken Tikka: ', 'mukand', '2023-05-06', 'f4.jpeg', '        Karachi is famous for its succulent and flavorful Chicken Tikka. Marinated in a blend of spices and yogurt, the chicken is grilled to perfection, resulting in tender and juicy pieces. It is often served with naan, mint chutney, and a side of salad, making it a delicious option for a satisfying meal.    ', 'Chicken Tikka: ', 2, 'published', 500.00),
(39, 1, 'Bun Kabab', 'mukand', '2023-05-06', 'f2.jpeg', '                A quintessential Karachi street food, Bun Kabab is a flavorful and affordable treat. It consists of a spiced meat or vegetarian patty, usually made with lentils or potatoes, served on a soft bun with chutneys, onions, and sometimes a fried egg. The combination of textures and flavors makes it a beloved choice for a quick bite.        ', 'Bun kabab ', 4, 'published', 200.00),
(45, 2, 'Soft Drinks', 'sumsam', '2023-05-06', 'd1.jpg', '        Soft drinks are a popular, bubbly drink choice with a variety of flavors including cola, lemon-lime, ginger ale, orange soda, and root beer. However, consuming large quantities of soft drinks can have negative health effects due to their high sugar and calorie content, which can lead to obesity and diabetes. Some soft drinks also contain caffeine, which can cause jitters and anxiety. Despite these potential drawbacks, soft drinks remain a widely available and popular drink choice.', 'Soft Drinks', 0, 'Published', 450.00),
(47, 1, 'Chapli Kabab', 'bahadur', '2023-05-06', 'f3.jpeg', '                Eating healthy food is one of the most powerful things you can do for yourself. It not only provides the energy you need to get through the day but also has a profound impact on your overall health and well-being.\r\n\r\nHealthy food is packed with nutrients that keep your body functioning optimally and reduce your risk of chronic diseases. By choosing a variety of foods from all the food groups, you can achieve a balanced diet that nourishes your body and mind.\r\n\r\nEating healthy food also helps you maintain a healthy weight and reduces your risk of overeating. By selecting wholesome options like fruits, vegetables, whole grains, and lean protein sources, you can avoid high-calorie, low-nutrient foods that leave you feeling unsatisfied.    ', 'Chapli Kabab', 0, 'published', 350.00),
(48, 1, 'Biryani', 'yasir', '2023-05-06', 'f1.jpeg', '        What sets Karachi Biryani apart is its distinct flavors and enticing aromas. The blend of spices, such as cumin, cardamom, cinnamon, cloves, and star anise, infuses the rice and meat with a tantalizing fragrance. The succulent meat, cooked to perfection, absorbs the flavors of the spices, while the potatoes add a unique texture and taste to each bite. The caramelized onions lend a sweet note, balancing the heat of the spices and adding depth to the overall flavor profile. Each mouthful of Karachi Biryani is a burst of flavors that leaves a lasting impression.    ', 'Chicken Biryani', 0, 'published', 450.00),
(50, 3, '  Chicken Shawarma Wrap', 'sumsam', '2023-05-06', 'hf2.jpeg', '       This is a Middle Eastern-inspired dish that features tender strips of chicken marinated in spices and grilled, then wrapped in a soft pita bread along with vegetables and a flavorful sauce.', '  Chicken Shawarma Wrap', 3, 'published', 1450.00),
(51, 3, ' Fresh Fruit Salad', 'bahadur', '2023-05-06', 'hf3.jpeg', 'Fresh fruit salad is a delightful and vibrant dish that showcases the natural sweetness and juiciness of a variety of fresh fruits. It is a versatile and refreshing option that can be enjoyed as a healthy snack, a light dessert, or as a side dish for a meal. fruit salad truly special is the combination of flavors and textures. The sweetness of the ripe fruits is complemented by the tanginess of citrus fruits, while the softness of berries contrasts with the crispness of apples or pears. The vibrant colors of the fruits make the salad visually appealing and inviting.', ' Fresh Fruit Salad', 0, 'published', 850.00),
(52, 1, 'Sushi Rolls', 'yasir', '2023-05-06', 'hf4.jpeg', '        Sushi is a traditional Japanese dish made with seasoned rice and a variety of ingredients like raw fish, vegetables, and nori seaweed. Sushi rolls are a popular variation that consist of rice and ingredients wrapped in a sheet of nori and cut into bite-sized pieces.    ', 'Sushi Rolls', 0, 'published', 1450.00);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `date_time`) VALUES
(32, '2023-05-09 20:15:51'),
(33, '2023-05-10 19:50:05'),
(34, '2023-05-10 19:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `blog_id` int(3) NOT NULL,
  `subscriber_id` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `rider_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `blog_id`, `subscriber_id`, `order_date`, `rider_id`) VALUES
(2, 37, 19, '2022-12-05', 0),
(4, 37, 19, '2022-12-05', 1),
(5, 37, 20, '2023-05-05', 1),
(6, 38, 20, '2023-05-05', 1),
(7, 37, 20, '2023-05-06', 1),
(8, 37, 20, '2023-05-06', 1),
(9, 37, 20, '2023-05-06', 1),
(10, 37, 20, '2023-05-06', 1);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `order_placedd` AFTER INSERT ON `orders` FOR EACH ROW INSERT INTO orders_placed (order_id,date_time)
  VALUES (NEW.order_id, CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_placed`
--

CREATE TABLE `orders_placed` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_placed`
--

INSERT INTO `orders_placed` (`id`, `order_id`, `date_time`) VALUES
(1, 16, '2023-05-09 20:19:14'),
(2, 17, '2023-05-10 21:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` int(3) NOT NULL,
  `rider_numberplate` varchar(7) NOT NULL,
  `rider_free` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(3) NOT NULL,
  `rider_address` varchar(255) NOT NULL,
  `rider_image` varchar(255) NOT NULL,
  `rider_fullname` varchar(255) NOT NULL,
  `rider_phonenumber` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `rider_numberplate`, `rider_free`, `order_id`, `rider_address`, `rider_image`, `rider_fullname`, `rider_phonenumber`) VALUES
(3, '123-456', 1, 0, 'Hala', '2.jpg', 'Imran', '+921234567890'),
(4, '323-234', 1, 0, 'Gulshan Kareem, Karachi', '13.jpg', 'Imtiaz', '+923328844888');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phonenumber` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `user_address`, `user_phonenumber`) VALUES
(33, 'kk', '$2y$10$WuEs6XlkIDI3bwQmBv4kX.CgBUFiSwK0xpyHXE1Aamr9h87CBg8Wi', 'Mukand', 'kk', 'mukandrathi112@gmail.com', 'a2.jpeg', 'admin', '', 'multan', '+923328844888'),
(34, 'sumsam', '$2y$10$S3cR/DT4SpWHa9ZeE9rGg.2s7iC.MS20pWtSDe9M6Tr54KdxPHAe6', 'sumsam', 'ali', 'sumsamali189@gmail.com', 'a1.jpeg', 'subscriber', '', 'khairpur', '+923328844888');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `user_addedd` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO logs (id,date_time)
  VALUES (NEW.user_id, CURRENT_TIMESTAMP)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `food_blogs`
--
ALTER TABLE `food_blogs`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_placed`
--
ALTER TABLE `orders_placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `food_blogs`
--
ALTER TABLE `food_blogs`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_placed`
--
ALTER TABLE `orders_placed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
