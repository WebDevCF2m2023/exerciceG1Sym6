-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2024 at 06:19 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exeg1sym6`
--

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `comment_text`, `comment_date`, `comment_visible`) VALUES
(1, 1, 3, 'This is a Comment', '2024-09-28 13:54:20', 1),
(2, 11, 1, 'test', '2024-09-29 17:30:29', 1);

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240928114048', '2024-09-28 11:40:59', 9160),
('DoctrineMigrations\\Version20240928151801', '2024-09-28 15:18:07', 1264),
('DoctrineMigrations\\Version20240928154333', '2024-09-28 15:43:41', 229),
('DoctrineMigrations\\Version20240928171724', '2024-09-28 17:17:46', 332);

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_title`, `post_text`, `post_date_created`, `post_date_published`, `post_is_published`, `post_img_loc`) VALUES
(2, 3, 'New Test', 'This is a test made by the Editor user', '2024-09-28 17:24:49', '2024-09-30 16:44:37', 1, 'images/post/post-4.jpg'),
(10, 3, 'Ed Test', 'Default to not published', '2024-09-29 11:29:16', '2024-09-30 13:26:18', 1, 'images/post/post-4.jpg'),
(11, 1, 'Soda Bread', 'Ingredients:\r\n    250g plain white flour\r\n    250g plain wholemeal flour\r\n    100g porridge oats\r\n    1 tsp bicarbonate of soda\r\n    1 tsp salt\r\n    25g butter, cut in pieces\r\n    500ml buttermilk\r\n\r\nMethod\r\n\r\n    STEP 1\r\n\r\n    Preheat the oven to 200C/gas 6/fan 180C and dust a baking sheet with flour. Mix the dry ingredients in a large bowl, then rub in the butter. Pour in the buttermilk and mix it in quickly with a table knife, then bring the dough together very lightly with your fingertips (handle it very, very gently). Now shape it into a flat, round loaf measuring 20cm/8in in diameter.\r\n    STEP 2\r\n\r\n    Put the loaf on the baking sheet and score a deep cross in the top. (Traditionally, this lets the fairies out, but it also helps the bread to cook through.) Bake for 30-35 minutes until the bottom of the loaf sounds hollow when tapped. If it isn’t ready after this time, turn it upside down on the baking sheet and bake for a few minutes more.\r\n    STEP 3\r\n\r\n    Transfer to a wire rack, cover with a clean tea towel (this keeps the crust nice and soft) and leave to cool. To serve, break into quarters, then break or cut each quarter in half to make 8 wedges or slices – or simply slice across. Eat very fresh.', '2024-09-29 16:16:18', '2024-09-29 16:25:59', 1, 'images/soda-bread.jpeg'),
(12, 2, 'Deluxe Burger', 'Ingredients\r\n    1 small onion, diced\r\n    500g good-quality beef mince\r\n    1 egg\r\n    1 tbsp vegetable oil\r\n    4 burger buns\r\n    All or any of the following to serve: sliced tomato, beetroot, horseradish sauce, mayonnaise, ketchup, handful iceberg lettuce, rocket, watercress\r\n\r\nMethod\r\n    STEP 1\r\n\r\n    Tip 500g beef mince into a bowl with 1 small diced onion and 1 egg, then mix.\r\n    STEP 2\r\n\r\n    Divide the mixture into four. Lightly wet your hands. Carefully roll the mixture into balls, each about the size of a tennis ball.\r\n    STEP 3\r\n\r\n    Set in the palm of your hand and gently squeeze down to flatten into patties about 3cm thick. Make sure all the burgers are the same thickness so that they will cook evenly.\r\n    STEP 4\r\n\r\n    Put on a plate, cover with cling film and leave in the fridge to firm up for at least 30 mins.\r\n    STEP 5\r\n\r\n    Heat the barbecue to medium hot (there will be white ash over the red hot coals – about 40 mins after lighting). Lightly brush one side of each burger with vegetable oil.\r\n    STEP 6\r\n\r\n    Place the burgers, oil-side down, on the barbecue. Cook for 5 mins until the meat is lightly charred. Don’t move them around or they may stick.\r\n    STEP 7\r\n\r\n    Oil the other side, then turn over using tongs. Don’t press down on the meat, as that will squeeze out the juices.\r\n    STEP 8\r\n\r\n    Cook for 5 mins more for medium. If you like your burgers pink in the middle, cook 1 min less each side. For well done, cook 1 min more.\r\n    STEP 9\r\n\r\n    Take the burgers off the barbecue. Leave to rest on a plate so that all the juices can settle inside.\r\n    STEP 10\r\n\r\n    Slice four burger buns in half. Place, cut-side down, on the barbecue rack and toast for 1 min until they are lightly charred. Place a burger inside each bun, then top with your choice of accompanimen', '2024-09-30 13:07:34', '2024-09-30 16:47:44', 1, 'images/beef-burger.jpg'),
(13, 3, 'Recent Post Test', 'Can I get it to correctly select what I need here?', '2024-09-30 13:36:24', '2024-09-30 13:37:33', 1, 'images/post/post-2.jpg'),
(14, 2, 'Recent Post Test - 2', 'I\'m pretty sure that you\'ll manage it :)', '2024-09-30 13:37:18', '2024-09-30 13:37:27', 1, 'images/post/post-3.jpg');

--
-- Dumping data for table `post_section`
--

INSERT INTO `post_section` (`post_id`, `section_id`) VALUES
(2, 4),
(2, 5),
(11, 4),
(12, 5);

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(2, 3),
(2, 5),
(11, 3),
(11, 4),
(12, 3),
(12, 6),
(12, 7),
(13, 3);

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_title`, `section_description`) VALUES
(4, 'Baking', 'A collection of recipes that will require an oven'),
(5, 'Griiled', 'From Burgers to Croque'),
(6, 'Unused', 'A placeholder section');

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `tag_slug`) VALUES
(3, 'easy', 'easy'),
(4, 'bread', 'bread'),
(5, 'salad', 'salad'),
(6, 'Meat', 'Meat'),
(7, 'Beef', 'Beef'),
(8, 'EmptyTag', 'EmptyTag');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `user_mail`, `user_real_name`, `user_active`, `user_details`, `user_img_loc`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\", \"ROLE_MANAGER\", \"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$OhtwWCroRU1v7FSeafT79uHGHWghroXv37Zlt3tHODJxvrStgq.Va', '', 'Lee Brennan', 1, 'Web Developer in the making', 'images/author-1.jpg'),
(2, 'manager', '[\"ROLE_MANAGER\", \"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$mkzuOtMaW0wpjoX55QhOp.1l9pvc2Odzh6bap.2JK4JyK6sBDDrka', '', 'Mika Pitz', 1, 'The True Master', 'images/author-4.jpg'),
(3, 'editor', '[\"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$DEUIa1Tn9.eE9Age0SX8hO9.bswh0xFPma0PQ0JnoAs5j3.YWbfUu', '', 'Eddy Eddington', 1, 'I was born to edit and edit I will', 'images/author-3.jpg'),
(4, 'visitor', '[\"ROLE_VISITOR\"]', '$2y$13$G.S.Hc2GexNNJOGEfI58nO6dVgO.Agn30AYBZGJMkAb2GzFZ8pPxO', '', 'Nana Visitor', 1, 'Was once Major Kira', 'images/author-2.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
