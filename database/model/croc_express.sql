-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 30 jan. 2024 à 18:57
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `croc_express`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `user_id`, `street`, `zip`, `city`, `country`) VALUES
(1, 1, '1 rue de la paix', '45000', 'Combleux', 'France'),
(2, 1, '25 rue de la paix', '45000', 'Orleans', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_hidden` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `is_hidden`) VALUES
(1, 'Plats', 'Nos délicieux burgers et pizzas fais maison', 'robin-stickel-tzl1UCXg5Es-unsplash (1).jpg', 0),
(2, 'Boissons', 'Pour se désaltérer', 'james-yarema-wQFmDhrvVSs-unsplash.jpg', 0),
(3, 'Sides', 'À manger sans modération !', 'pexels-dzenina-lukac-1583884.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reduction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `reduction`) VALUES
(1, 'CODA', 20);

-- --------------------------------------------------------

--
-- Structure de la table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lipid` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbohydrate` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `is_hidden` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `foods`
--

INSERT INTO `foods` (`id`, `name`, `lipid`, `protein`, `carbohydrate`, `weight`, `is_hidden`) VALUES
(1, 'Pommes de terre', 1, 3, 2, 100, 1),
(2, 'Eau de coco', 0, 0, 0, 500, 1),
(3, 'Pain', 5, 5, 5, 100, 1),
(4, 'Steak haché', 10, 6, 9, 40, 1),
(5, 'Salade', 2, 0, 2, 20, 1),
(6, 'Tomate', 5, 5, 2, 20, 1),
(7, 'Cheddar', 3, 12, 4, 70, 1),
(8, 'Tenders', 5, 18, 9, 90, 1),
(9, 'Sucre', 10, 5, 10, 50, 1),
(10, 'Galette de blé', 5, 5, 5, 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `is_hidden` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `price`, `is_hidden`) VALUES
(1, 'Menu americain', 10, 0),
(2, 'Menu pizza midi', 10, 0),
(3, 'Menu gourmand', 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `menus_products`
--

CREATE TABLE `menus_products` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menus_products`
--

INSERT INTO `menus_products` (`id`, `menu_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 2, 4),
(4, 2, 7),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `user_id`, `ip`, `created_at`) VALUES
(1, 'Question sur les ingrédients', 'Est ce que les ingrédients sont bio ?', 1, '::1', '2024-01-30 18:27:06');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `is_in_delivery` tinyint(1) DEFAULT '0',
  `validated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `coupon_id`, `address_id`, `is_in_delivery`, `validated_at`, `created_at`) VALUES
(1, 1, 12, NULL, NULL, 0, NULL, '2024-01-30 18:26:14'),
(2, 1, 8, 1, NULL, 0, NULL, '2024-01-30 18:27:24'),
(3, 1, 8, NULL, 1, 0, '2024-01-30 18:32:54', '2024-01-30 18:31:14'),
(4, 1, 12, NULL, 2, 1, NULL, '2024-01-30 18:32:47'),
(5, 1, 27.2, 1, NULL, 0, NULL, '2024-01-30 18:45:28');

-- --------------------------------------------------------

--
-- Structure de la table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `price`, `quantity`, `type`) VALUES
(1, 1, 1, 7, 1, 'product'),
(2, 1, 4, 2, 1, 'product'),
(3, 1, 6, 3, 1, 'product'),
(4, 2, 2, 10, 1, 'menu'),
(5, 3, 7, 8, 1, 'product'),
(6, 4, 2, 12, 3, 'product'),
(7, 5, 4, 4, 2, 'product'),
(8, 5, 1, 10, 1, 'menu'),
(9, 5, 2, 20, 2, 'menu');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `buying_price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_hidden` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `buying_price`, `category_id`, `is_hidden`) VALUES
(1, 'Burger classique', 'La base !', 7, 4, 1, 0),
(2, 'Frites', 'Frites maison', 4, 1, 3, 0),
(3, 'Prime Framboise', 'Chimique mais ça passe', 2, 1, 2, 0),
(4, 'Coca Cola', 'Canette de 33cl', 2, 1, 2, 0),
(5, 'Dr Pepper', 'Canette de 33cl', 2, 1, 2, 0),
(6, 'Chips', 'Petit bol de chips', 3, 1, 3, 0),
(7, 'Pizza', 'Pizza margherita', 8, 3, 1, 0),
(8, 'Tacos mexicain', 'Accompagné de salade', 8, 4, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `products_foods`
--

CREATE TABLE `products_foods` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_foods`
--

INSERT INTO `products_foods` (`id`, `product_id`, `food_id`) VALUES
(8, 4, 9),
(10, 6, 1),
(11, 5, 9),
(13, 7, 3),
(14, 7, 6),
(15, 1, 3),
(16, 1, 4),
(17, 1, 5),
(18, 1, 6),
(19, 1, 7),
(20, 2, 1),
(21, 8, 5),
(22, 8, 6),
(23, 8, 10),
(24, 3, 2),
(25, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'burger_1.png'),
(2, 2, 'image-removebg-preview (1).png'),
(3, 3, 'image-removebg-preview.png'),
(4, 4, 'mae-mu-z8PEoNIlGlg-unsplash__1_-removebg-preview.png'),
(5, 5, 'image-removebg-preview (2).png'),
(6, 6, 'image-removebg-preview (3).png'),
(7, 7, 'peter-bravo-de-los-rios-OklpRh8-Sns-unsplash-removebg-preview.png'),
(8, 1, 'eiliv-aceron-5nvt9BrLaAc-unsplash.jpg'),
(9, 2, 'pexels-dzenina-lukac-1583884.jpg'),
(10, 8, 'tacos-mexicain.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `created_at`) VALUES
(1, 'Benoît', 'Parmentier', 'admin@admin.fr', '$2y$10$6PlU9YBhAXHAMb2b/jOy8.gWgIK9iltOxNp6lSZBS/dZRDUwjIZve', 1, '2024-01-30 15:23:09'),
(2, 'Raphael', 'Raclot', 'user@user.com', '$2y$10$QOQ.jUq.oLwHHhfrfP2BG.iBzCZy//q55kPNiMJNJws7K4Nqrp7de', 0, '2024-01-30 18:51:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_user_id_foreign` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus_products`
--
ALTER TABLE `menus_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_menus_products_product_id_foreign` (`product_id`),
  ADD KEY `croc_menus_products_menu_id_foreign` (`menu_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_message_sender_id_foreign` (`user_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_orders_coupon_id_foreign` (`coupon_id`),
  ADD KEY `croc_orders_address_id_foreign` (`address_id`),
  ADD KEY `croc_orders_user_id_foreign` (`user_id`);

--
-- Index pour la table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_orders_products_order_id_foreign` (`order_id`),
  ADD KEY `croc_orders_products_product_id_foreign` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_product_category_id_foreign` (`category_id`);

--
-- Index pour la table `products_foods`
--
ALTER TABLE `products_foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_products_foods_food_id_foreign` (`food_id`),
  ADD KEY `croc_products_foods_product_id_foreign` (`product_id`);

--
-- Index pour la table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `croc_products_images_product_id_foreign` (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `menus_products`
--
ALTER TABLE `menus_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `products_foods`
--
ALTER TABLE `products_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `croc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `menus_products`
--
ALTER TABLE `menus_products`
  ADD CONSTRAINT `croc_menus_products_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `croc_menus_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `croc_message_sender_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `croc_orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `croc_orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `croc_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `croc_orders_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `croc_orders_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `croc_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products_foods`
--
ALTER TABLE `products_foods`
  ADD CONSTRAINT `croc_products_food_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `croc_products_foods_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `croc_products_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
