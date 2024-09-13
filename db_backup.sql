-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2024 at 05:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_items`
--

CREATE TABLE `about_items` (
  `id` bigint UNSIGNED NOT NULL,
  `feature_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_items`
--

INSERT INTO `about_items` (`id`, `feature_status`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2024-09-11 08:07:46', '2024-09-11 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$12$HVXRvo2q9sDoyOGe2GvcEOgSST0.HThx8MMCbu41ChtVy5Rfs2Uly', NULL, '2024-09-11 08:07:45', '2024-09-11 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Swimming Pool', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(2, 'Mountain Bike', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(3, 'Sightseeing', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(4, 'Free Wifi', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(5, 'Personal Guide', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(6, 'Entrance Fees', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(7, 'Air fares', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(8, 'Accommodation', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(9, 'Departure Taxes', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(10, 'Festival & Events', '2024-09-11 08:07:46', '2024-09-11 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `title`, `slug`, `short_description`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 4, 'Partnering to create a strong community', 'partnering-to-create-a-strong-community', 'In order to create a good community we need to work together. We need to help, support each other and be respectful to each other.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069558.jpg', '2024-09-11 09:18:22', '2024-09-11 09:45:58'),
(2, 6, 'Turning your emergency donation into instant aid', 'turning-your-emergency-donation-into-instant-aid', 'We are working hard to help the poor people. We are trying to provide them food, shelter, clothing, education and medical assistance.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069534.jpg', '2024-09-11 09:44:21', '2024-09-11 09:45:34'),
(3, 5, 'Charity provides educational boost for children', 'charity-provides-educational-boost-for-children', 'In order boost the education of the children, we are providing them books, pens, pencils, notebooks and other necessary things.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069599.jpg', '2024-09-11 09:46:39', '2024-09-11 09:46:39'),
(4, 5, 'Cultural Crossroads Travelers Perspective.', 'cultural-crossroads-travelers-perspective', 'In order boost the education of the children, we are providing them books, pens, pencils, notebooks and other necessary things.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069710.jpg', '2024-09-11 09:48:30', '2024-09-11 09:49:14'),
(5, 3, 'The Traveler\'s Trail And Global Tour Adventure.', 'the-travelers-trail-and-global-tour-adventure', 'We are working hard to help the poor people. We are trying to provide them food, shelter, clothing, education and medical assistance.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069794.jpg', '2024-09-11 09:49:54', '2024-09-11 09:49:54'),
(6, 3, 'Roaming Free Adventures Off the Beaten Path.', 'roaming-free-adventures-off-the-beaten-path', 'In order boost the education of the children, we are providing them books, pens, pencils, notebooks and other necessary things.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069837.jpg', '2024-09-11 09:50:37', '2024-09-11 09:50:38'),
(7, 3, 'Passport Diariesoni Journeys and Experiences', 'passport-diariesoni-journeys-and-experiences', 'We are working hard to help the poor people. We are trying to provide them food, shelter, clothing, education and medical assistance.', '<p>Suspendisse bibendum efficitur orci, a pretium erat mattis nec. Vestibulum antema ypsumi primisot inaetahsjanl faucibus orci luctus etenjot ultrices posuere cubilia andt.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>&nbsp;</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p><p>Vestibulum quis odio ut dui malesuada ornare ut id tellus. Curabitur viverra at magna ac bibendum. Aliquam erat volutpat. Proin rhoncus est ac ipsum varius fermentum. Integer a odio ornare mauris pharetra suscipitot. Integer vulputate elit erat. Vestibulum quam velit, sagittis et ipsum id, faucibus volutpat nibh. Quisque cotten commodo massa eget fringilla facilisis. Integer non nisl elit. In ac tempor ante, eget iaculis augue. Nuncekon dolor mi, accumsan quis ante id, eleifend suscipit purus. Praesent augue eros, consectetur eu eleifend inno, eget condimentum auctor, libero ipsum viverra nisi, at vulputate ex mi suscipit nunc.</p>', '1726069887.jpg', '2024-09-11 09:51:27', '2024-09-11 09:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cultural Exploration', 'cultural-exploration', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(2, 'Adventure Safari', 'adventure-safari', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(3, 'Nature Excursion', 'nature-excursion', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(4, 'Cruise Voyage', 'cruise-voyage', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(5, 'City Discovery', 'city-discovery', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(6, 'Educational Journey', 'educational-journey', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(7, 'Luxury Retreat', 'luxury-retreat', '2024-09-11 08:07:46', '2024-09-11 08:07:46'),
(8, 'Photography Expedition', 'photography-expedition', '2024-09-11 08:07:46', '2024-09-11 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `tour_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_person` int DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `tour_id`, `package_id`, `user_id`, `total_person`, `paid_amount`, `payment_method`, `payment_status`, `invoice_no`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 3, '90.00', 'PayPal', 'Completed', '1726245708', '2024-09-13 10:41:48', '2024-09-13 10:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_items`
--

CREATE TABLE `contact_items` (
  `id` bigint UNSIGNED NOT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_items`
--

INSERT INTO `contact_items` (`id`, `map_code`, `created_at`, `updated_at`) VALUES
(1, ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7360.768539890718!2d90.3502345810408!3d22.71395433888304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755369d678f1643%3A0xa6b5fb9e5df4a123!2z4Kas4Ka_4KaG4Kaw4Kaf4Ka_4Ka44Ka_IOCmrOCmvuCmuCDgpqHgpr_gpqrgp4ssIOCmqOCmpeCngeCmsuCnjeCmsuCmvuCmrOCmvuCmpg!5e0!3m2!1sen!2sbd!4v1725812639154!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2024-09-11 08:07:46', '2024-09-11 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `counter_items`
--

CREATE TABLE `counter_items` (
  `id` bigint UNSIGNED NOT NULL,
  `item1_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item1_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item4_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item4_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Show','Hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_items`
--

INSERT INTO `counter_items` (`id`, `item1_name`, `item1_number`, `item2_name`, `item2_number`, `item3_name`, `item3_number`, `item4_name`, `item4_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Happy Traveler', '6000', 'Tours Success', '20', 'Positives Review', '20', 'Travel Guide', '6', 'Show', '2024-09-11 08:07:45', '2024-09-11 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_requirement` longtext COLLATE utf8mb4_unicode_ci,
  `activity` longtext COLLATE utf8mb4_unicode_ci,
  `best_time` longtext COLLATE utf8mb4_unicode_ci,
  `health_safety` longtext COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `featured_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `slug`, `description`, `country`, `language`, `currency`, `area`, `timezone`, `visa_requirement`, `activity`, `best_time`, `health_safety`, `map`, `featured_photo`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'Brazil', 'brazil', '<p>Australia, the land Down Under, is a vast and diverse country known for its stunning natural landscapes, unique wildlife, and vibrant cities. From the sun-kissed beaches of the Gold Coast to the rugged outback of the Northern Territory, Australia offers an array of experiences that cater to every type of traveler. Whether you\'re looking to relax on pristine shores, explore ancient rainforests, or venture into the heart of the desert, Australia has something for everyone.</p><p>In addition to its natural beauty, Australia is home to several bustling cities that boast a rich cultural heritage and modern attractions. Sydney, with its iconic Opera House and Harbour Bridge, offers a dynamic urban experience with world-class dining, shopping, and entertainment. Melbourne, known for its artistic vibe and diverse population, is a hub for street art, coffee culture, and live music. Other cities like Brisbane, Perth, and Adelaide each offer their own unique charm and attractions, making urban exploration in Australia equally rewarding.</p><p>Australia\'s wildlife is another major draw, with unique species such as kangaroos, koalas, and the platypus. The Great Barrier Reef, a UNESCO World Heritage site, is a must-visit for snorkeling and diving enthusiasts, showcasing a vibrant underwater ecosystem. Additionally, the country\'s commitment to preserving its natural and cultural heritage is evident in its numerous national parks and heritage sites. Whether you\'re an adventure seeker, a nature lover, or a cultural enthusiast, Australia\'s diverse offerings promise an unforgettable travel experience.</p>', 'Brazil', 'English', 'Doller', 'Approx 7.692 million km2', 'Federal District, Brazil (GMT-3)', '<p>Visa in not needed for EU citizens. Everyone else needs a visa.</p>', '<p>Surfing,&nbsp;<br>Scuba Diving,&nbsp;<br>Hiking,&nbsp;<br>Camping,&nbsp;<br>Skydiving,&nbsp;<br>Wildlife Safari</p>', '<p>Spring (September to November) and Autumn (March to May)<br>Summer (December to February)<br>Winter (June to August)</p>', '<p>Stay hydrated, use sun protection, and be aware of wildlife safety guidelines.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844963.37619008!2d-61.96708658174469!3d-14.171377817116744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9c59c7ebcc28cf%3A0x295a1506f2293e63!2z4Kas4KeN4Kaw4Ka-4Kac4Ka_4Kay!5e0!3m2!1sbn!2sbd!4v1726070403743!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1726071387.jpg', 2, '2024-09-11 10:00:27', '2024-09-11 10:16:28'),
(2, 'Italy', 'italy', '<p>Australia, the land Down Under, is a vast and diverse country known for its stunning natural landscapes, unique wildlife, and vibrant cities. From the sun-kissed beaches of the Gold Coast to the rugged outback of the Northern Territory, Australia offers an array of experiences that cater to every type of traveler. Whether you\'re looking to relax on pristine shores, explore ancient rainforests, or venture into the heart of the desert, Australia has something for everyone.</p><p>In addition to its natural beauty, Australia is home to several bustling cities that boast a rich cultural heritage and modern attractions. Sydney, with its iconic Opera House and Harbour Bridge, offers a dynamic urban experience with world-class dining, shopping, and entertainment. Melbourne, known for its artistic vibe and diverse population, is a hub for street art, coffee culture, and live music. Other cities like Brisbane, Perth, and Adelaide each offer their own unique charm and attractions, making urban exploration in Australia equally rewarding.</p><p>Australia\'s wildlife is another major draw, with unique species such as kangaroos, koalas, and the platypus. The Great Barrier Reef, a UNESCO World Heritage site, is a must-visit for snorkeling and diving enthusiasts, showcasing a vibrant underwater ecosystem. Additionally, the country\'s commitment to preserving its natural and cultural heritage is evident in its numerous national parks and heritage sites. Whether you\'re an adventure seeker, a nature lover, or a cultural enthusiast, Australia\'s diverse offerings promise an unforgettable travel experience.</p>', 'Italy', 'Chinise', 'En', 'Approx 7.692 million km2', 'Federal District, Brazil (GMT-3)', '<p>Visa in not needed for EU citizens. Everyone else needs a visa.</p>', '<p>Surfing,&nbsp;<br>Scuba Diving,&nbsp;<br>Hiking,&nbsp;<br>Camping,&nbsp;<br>Skydiving,&nbsp;<br>Wildlife Safari</p>', '<p>Spring (September to November) and Autumn (March to May)<br>Summer (December to February)<br>Winter (June to August)</p>', '<p>Stay hydrated, use sun protection, and be aware of wildlife safety guidelines.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7940755.656966937!2d-58.671188260986334!3d-13.63816048439047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9c59c7ebcc28cf%3A0x295a1506f2293e63!2z4Kas4KeN4Kaw4Ka-4Kac4Ka_4Kay!5e0!3m2!1sbn!2sbd!4v1726070583385!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1726071338.jpg', 2, '2024-09-11 10:04:59', '2024-09-11 10:15:38'),
(3, 'New York', 'new-york', '<p>Australia, the land Down Under, is a vast and diverse country known for its stunning natural landscapes, unique wildlife, and vibrant cities. From the sun-kissed beaches of the Gold Coast to the rugged outback of the Northern Territory, Australia offers an array of experiences that cater to every type of traveler. Whether you\'re looking to relax on pristine shores, explore ancient rainforests, or venture into the heart of the desert, Australia has something for everyone.</p><p>In addition to its natural beauty, Australia is home to several bustling cities that boast a rich cultural heritage and modern attractions. Sydney, with its iconic Opera House and Harbour Bridge, offers a dynamic urban experience with world-class dining, shopping, and entertainment. Melbourne, known for its artistic vibe and diverse population, is a hub for street art, coffee culture, and live music. Other cities like Brisbane, Perth, and Adelaide each offer their own unique charm and attractions, making urban exploration in Australia equally rewarding.</p><p>Australia\'s wildlife is another major draw, with unique species such as kangaroos, koalas, and the platypus. The Great Barrier Reef, a UNESCO World Heritage site, is a must-visit for snorkeling and diving enthusiasts, showcasing a vibrant underwater ecosystem. Additionally, the country\'s commitment to preserving its natural and cultural heritage is evident in its numerous national parks and heritage sites. Whether you\'re an adventure seeker, a nature lover, or a cultural enthusiast, Australia\'s diverse offerings promise an unforgettable travel experience.</p>', 'New York', 'English', 'Doller', 'Approx 7.692 million km2', 'Federal District, Brazil (GMT-3)', NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122897.91633420806!2d-48.093248115237074!3d-15.721493535919457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9c59c7ebcc28cf%3A0x295a1506f2293e63!2z4Kas4KeN4Kaw4Ka-4Kac4Ka_4Kay!5e0!3m2!1sbn!2sbd!4v1726070782910!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1726071317.jpg', 1, '2024-09-11 10:06:35', '2024-09-11 10:15:17'),
(4, 'France', 'france', '<p>Australia, the land Down Under, is a vast and diverse country known for its stunning natural landscapes, unique wildlife, and vibrant cities. From the sun-kissed beaches of the Gold Coast to the rugged outback of the Northern Territory, Australia offers an array of experiences that cater to every type of traveler. Whether you\'re looking to relax on pristine shores, explore ancient rainforests, or venture into the heart of the desert, Australia has something for everyone.</p><p>In addition to its natural beauty, Australia is home to several bustling cities that boast a rich cultural heritage and modern attractions. Sydney, with its iconic Opera House and Harbour Bridge, offers a dynamic urban experience with world-class dining, shopping, and entertainment. Melbourne, known for its artistic vibe and diverse population, is a hub for street art, coffee culture, and live music. Other cities like Brisbane, Perth, and Adelaide each offer their own unique charm and attractions, making urban exploration in Australia equally rewarding.</p><p>Australia\'s wildlife is another major draw, with unique species such as kangaroos, koalas, and the platypus. The Great Barrier Reef, a UNESCO World Heritage site, is a must-visit for snorkeling and diving enthusiasts, showcasing a vibrant underwater ecosystem. Additionally, the country\'s commitment to preserving its natural and cultural heritage is evident in its numerous national parks and heritage sites. Whether you\'re an adventure seeker, a nature lover, or a cultural enthusiast, Australia\'s diverse offerings promise an unforgettable travel experience.</p>', 'France', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1726071270.jpg', 20, '2024-09-11 10:09:17', '2024-09-13 10:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `destination_photos`
--

CREATE TABLE `destination_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `destination_id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_photos`
--

INSERT INTO `destination_photos` (`id`, `destination_id`, `photo`, `created_at`, `updated_at`) VALUES
(5, 4, 'multi1726071662.jpg', '2024-09-11 10:21:02', '2024-09-11 10:21:02'),
(6, 4, 'multi1726071739.jpg', '2024-09-11 10:22:19', '2024-09-11 10:22:19'),
(7, 4, 'multi1726071762.jpg', '2024-09-11 10:22:42', '2024-09-11 10:22:42'),
(8, 4, 'multi1726071783.jpg', '2024-09-11 10:23:03', '2024-09-11 10:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `destination_videos`
--

CREATE TABLE `destination_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `destination_id` bigint UNSIGNED NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_videos`
--

INSERT INTO `destination_videos` (`id`, `destination_id`, `video`, `created_at`, `updated_at`) VALUES
(3, 4, 'Vvcs_JKLYWI', '2024-09-11 10:18:04', '2024-09-11 10:18:04'),
(4, 4, 'AypEk_qEstA', '2024-09-11 10:18:28', '2024-09-11 10:18:28'),
(5, 4, 'AbluPg_E14k', '2024-09-11 10:18:41', '2024-09-11 10:18:41'),
(6, 4, 'ruQINsQ4CT4', '2024-09-11 10:19:19', '2024-09-11 10:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How to book a travel package online?', 'To book a travel package online, browse through our website’s offerings, select your desired destination and dates, and follow the prompts to customize your trip. Once you have chosen your options, proceed to the checkout page, enter your details, and make the payment securely. You will receive a confirmation email with your itinerary and booking details.', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(2, 'What is included in travel packages?', 'Our travel packages typically include accommodation, transportation, and selected activities or tours. Some packages may also offer meals, travel insurance, and airport transfers. Each package is designed to provide a comprehensive travel experience, but you can always customize your package to include additional services or specific requests. Please check the package details for exact inclusions. ', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(3, 'Are there any travel discounts available?', 'Yes, we offer various travel discounts throughout the year, including early bird specials, last-minute deals, and seasonal promotions. To stay updated on our latest discounts, subscribe to our newsletter, follow us on social media, or check the “Deals” section of our website. We aim to provide affordable travel options without compromising quality. ', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(4, 'How to cancel or modify bookings?', 'To cancel or modify a booking, log into your account on our website and go to the “My Bookings” section. Here, you can view your current reservations and follow the prompts to make changes or cancellations. Please note that cancellation policies and modification fees may apply, depending on the terms and conditions of your booking. Contact our customer support for assistance if needed. ', '2024-09-11 08:07:45', '2024-09-11 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` longtext COLLATE utf8mb4_unicode_ci,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"70\" height=\"70\" viewBox=\"0 0 70 70\">\n                            <path d=\"M7.93843 51.3252C12.6831 53.68 5.85265 67.3267 12.9084 67.6647C75.927 66.7022 62.2114 79.3328 63.2231 16.2584C63.2406 13.9156 60.9842 12.6644 58.8459 12.9772C59.5798 8.84501 55.3722 8.22704 52.2834 8.6022C54.0936 -0.339209 39.5347 -0.33374 41.3459 8.6022H38.0647C39.8748 -0.339209 25.3159 -0.33374 27.1272 8.6022H23.8459C25.6561 -0.339209 11.0972 -0.33374 12.9084 8.6022C10.3972 8.47532 6.29125 8.33095 6.34593 11.8834C6.93656 13.7144 4.78296 51.5155 7.93843 51.3252ZM61.0662 16.7309C61.1406 17.6692 61.1358 18.6121 61.052 19.5495C60.1803 19.3308 59.4989 20.115 58.8459 20.5733V19.4292C61.3933 19.3702 61.8428 16.3995 58.8459 17.9308V17.5786C59.6577 17.5412 60.4361 17.2441 61.0662 16.7309ZM58.8459 21.5752C59.6078 21.5006 60.3403 21.2428 60.9809 20.8238C60.954 21.1259 60.972 21.4304 61.0345 21.7272H58.847L58.8459 21.5752ZM59.9397 15.1658C60.1215 15.15 60.3036 15.1937 60.4585 15.2904C60.6133 15.3871 60.7326 15.5314 60.7983 15.7017C60.0917 15.5158 59.4092 16.137 58.847 16.5002V15.1658H59.9397ZM58.8459 23.9158H61.0334C60.433 82.3045 70.2953 62.3064 12.9073 65.4794C10.6837 65.8064 12.2686 56.1431 11.8158 55.2113C14.0656 56.8202 18.527 63.5183 21.6595 63.2908C69.3623 63.2263 57.7478 69.9517 58.847 23.9158H58.8459ZM15.0959 50.1658H21.6584V56.7283H19.4709C19.8898 53.7194 18.6572 50.1199 15.0959 50.1658ZM17.2834 57.5869L12.0498 52.3522C16.7716 51.9158 17.6586 52.9319 17.2845 57.5869H17.2834ZM43.5334 6.4147C43.5334 3.7536 47.203 3.96907 48.9584 4.45142C44.0803 6.66626 45.7231 8.9172 49.9811 6.01329C50.0705 6.42552 50.1217 6.8451 50.1342 7.26673C47.5573 7.91204 46.5467 10.5064 50.1211 8.7411C50.1025 9.18517 50.0806 9.61282 50.073 9.99017C48.8447 10.3325 48.3087 11.8638 50.0456 11.3169C49.6847 13.1314 47.2566 13.0669 45.7209 12.9772C42.5797 13.0559 43.7358 8.25985 43.5334 6.4147ZM29.3147 6.4147C29.2862 3.72517 33.4578 3.77657 35.07 4.67782C30.882 5.99579 31.8719 8.96532 35.7481 5.95751C35.8546 6.42791 35.9122 6.90807 35.9198 7.39032C35.4014 7.63751 34.6216 7.73923 34.4564 8.39439C32.4297 9.36892 33.3309 10.9789 35.1094 9.48814C35.3709 9.53698 35.6414 9.4941 35.875 9.36673C35.8608 9.72767 35.8487 10.0645 35.8542 10.3588C34.172 10.7459 32.8836 13.3491 35.5458 11.9972C34.7758 13.1106 32.8136 13.0538 31.5022 12.9772C28.3609 13.0559 29.517 8.25985 29.3147 6.4147ZM15.0959 6.4147C15.0281 3.69673 19.7553 3.58298 21.1127 4.96439C16.462 6.24954 17.3939 9.83923 21.6081 6.3272C21.6742 6.77182 21.7064 7.22082 21.7044 7.67032C18.9197 8.59126 18.1136 11.6428 21.677 8.90079C21.6573 9.34157 21.6387 9.75501 21.6355 10.1225C20.673 10.4025 19.8909 12.3013 21.4616 11.7642C20.8152 13.1183 18.6802 13.0581 17.2834 12.9783C14.1422 13.0559 15.2983 8.25985 15.0959 6.41579V6.4147ZM8.53343 11.8834C8.46015 10.0897 11.9481 10.9986 12.9084 10.7897C12.8264 16.8097 23.9291 16.8097 23.8459 10.7897H27.1272C27.0452 16.8097 38.1478 16.8097 38.0647 10.7897H41.3459C41.2639 16.8097 52.3666 16.8097 52.2834 10.7897C58.4544 9.91798 56.315 13.1763 56.6584 17.3522C40.9609 17.1127 24.1434 18.4853 8.53343 17.3522V11.8834ZM56.6584 19.5397C54.04 69.1303 70.4309 60.5663 21.6595 61.1022C21.0795 61.1019 20.5232 60.8713 20.1131 60.4612C19.7029 60.051 19.4723 59.4948 19.472 58.9147C25.4439 60.2808 23.5955 53.6024 23.847 50.1647C23.9947 46.5739 17.0177 48.3961 15.097 47.9772C14.517 47.9778 13.961 48.2084 13.5509 48.6185C13.1408 49.0286 12.9101 49.5847 12.9095 50.1647C11.235 50.2555 8.49734 50.3419 8.53453 47.9772V19.5397H56.6584Z\"></path>\n                            <path d=\"M12.9069 23.8962C13.3236 26.2576 11.7562 30.7529 14.1789 31.9309C17.1211 31.4945 23.1848 33.3987 23.9986 29.5181C23.759 26.8274 24.0751 21.0076 20.1551 21.4768C18.4872 21.8924 10.1594 20.6565 12.9069 23.8962ZM16.0634 23.5867C22.4509 22.4295 22.8622 23.159 22.0178 29.6023C19.7881 29.9834 17.5192 30.0812 15.265 29.8932C15.0615 27.8293 14.8964 25.8026 14.5781 23.7496C15.0747 23.672 15.5887 23.6402 16.0634 23.5867ZM27.9175 23.3449C28.0389 25.4449 26.2167 31.3293 29.0878 31.5699C32.03 30.5374 35.8384 32.2087 38.3573 30.6588C38.4361 27.5928 37.8716 24.5443 36.7003 21.7098C34.1562 20.6215 31.1003 21.9012 28.39 21.3838C28.1594 21.3882 27.9367 21.4688 27.7569 21.6132C27.577 21.7576 27.4501 21.9576 27.3961 22.1819C27.3421 22.4061 27.364 22.6419 27.4583 22.8524C27.5527 23.0628 27.7141 23.2361 27.9175 23.3449ZM30.5239 23.089C32.2941 22.8799 34.0745 22.7685 35.857 22.7554C36.1447 24.8434 36.218 26.9871 36.4323 29.0926C34.249 28.8701 32.047 28.9061 29.872 29.1998C29.8522 27.2215 29.6663 25.2484 29.3164 23.3012C29.7136 23.203 30.117 23.1321 30.5239 23.089ZM42.2248 29.716C41.5095 33.9488 49.4873 31.8576 51.9876 31.652C53.6469 29.8517 52.8933 22.5345 50.9125 21.176C42.344 19.7421 40.8215 21.2318 42.2248 29.716ZM44.6037 30.6151L44.6694 30.7288C44.6256 30.8459 44.6037 30.8021 44.6037 30.6151ZM43.989 23.1087C46.103 22.755 48.2493 22.6332 50.3897 22.7456C50.755 25.0922 50.861 27.472 50.7058 29.8418C48.6495 29.9435 46.6009 29.9862 44.5425 30.0529C44.2253 27.7254 43.6598 25.4482 43.498 23.101C43.6606 23.1298 43.8256 23.1324 43.989 23.1087ZM23.1815 34.5931C21.1745 34.1599 14.0105 33.3615 13.8595 36.0554C13.7906 38.1871 12.4355 44.9432 15.1753 45.3676C17.5052 44.9456 19.8633 44.6981 22.23 44.6271C25.6315 43.3343 25.4784 36.7992 23.1815 34.5931ZM22.4455 40.2259C22.3518 40.871 22.1931 41.5049 21.9719 42.1181C21.9762 42.1104 21.8537 42.3149 21.9172 42.2198C20.0687 42.8192 17.7762 42.3357 15.8239 42.9931C15.7034 40.9104 15.4785 38.8352 15.1501 36.7751C19.0308 36.3726 23.7251 34.2092 22.4455 40.2259ZM51.8389 33.4687C50.1086 33.3079 43.1326 32.5346 44.199 35.4834C42.7181 37.2246 43.4859 40.4326 43.2628 42.6606C43.6117 45.7493 47.5437 43.9917 49.5759 44.0999C51.2253 44.1185 53.2247 43.704 53.3155 41.7079C53.5069 39.1671 54.4617 34.9376 51.8389 33.4687ZM51.303 35.3718H51.3139C51.5326 35.351 51.327 35.4517 51.303 35.3718ZM45.505 42.4265C45.5148 42.4637 45.5422 42.421 45.505 42.4265V42.4265ZM51.397 38.9079C51.3481 39.8327 51.21 40.7506 50.9847 41.6488C49.1641 41.8531 47.3384 42.0074 45.5094 42.1115C45.307 40.0345 45.7117 37.7223 44.875 35.7896C46.9608 35.8334 49.1712 35.1892 51.2865 35.3729C51.4508 36.5438 51.4885 37.7291 51.397 38.9079ZM38.9589 48.0779C29.9748 45.8937 27.8289 47.9302 28.8275 56.9526C29.0025 61.0607 34.3575 59.081 36.9748 59.0985C39.3494 59.3501 40.0373 57.1801 39.7792 55.2059C39.3723 52.9451 41.0512 49.6277 38.9589 48.0779ZM30.9034 57.1342C30.9303 57.1308 30.9575 57.136 30.9812 57.1489C31.005 57.1619 31.0241 57.182 31.0358 57.2063C30.9947 57.1771 30.9502 57.1529 30.9034 57.1342ZM37.7033 56.9777C37.6289 57.027 37.6726 57.0784 37.7033 56.9777V56.9777ZM38.365 50.5695C38.2221 52.7076 38.0032 54.8399 37.7087 56.9624C35.5497 57.0346 33.2758 57.6843 31.1473 57.2763C31.1692 54.6312 30.9395 51.9899 30.4615 49.3882C32.2586 49.6912 38.6515 47.9401 38.365 50.5695ZM49.3867 47.4534C48.0983 47.7804 42.9489 46.8431 44.4331 49.2176C43.6325 51.8579 43.2814 56.3707 45.4503 58.3012C48.5521 58.7564 51.7135 58.5879 54.7494 57.8057C56.1056 52.991 56.5781 45.5688 49.3867 47.4534ZM53.6764 48.6598C54.523 50.9184 53.8536 54.0749 53.5889 56.5599C51.2308 56.1585 48.8344 56.887 46.4697 56.5052C45.8524 54.1521 45.553 51.7268 45.5794 49.2942C48.2656 49.1137 50.9934 48.2343 53.6764 48.6598ZM30.2067 34.6806C30.1995 34.7111 30.1955 34.7422 30.1947 34.7735L30.2067 34.6806ZM30.1936 34.7954C30.1888 34.8196 30.1852 34.8441 30.1826 34.8687L30.1936 34.7954Z\"></path>\n                            <path d=\"M27.5413 36.9599C28.4054 37.2453 31.2404 34.64 29.7474 34.0067C28.5552 33.8547 26.6412 35.9153 27.5413 36.9599ZM27.4166 41.0396C29.3996 42.7611 28.0729 39.3049 28.0882 38.2833C27.0207 36.8002 26.7505 40.4183 27.4166 41.0396ZM30.6804 42.6802C28.7488 40.8427 28.9194 43.7193 30.3982 44.4072C32.0727 45.7963 34.398 43.8024 31.5455 43.1089L31.7501 43.1964C31.3756 43.0635 31.0176 42.8904 30.6804 42.6802Z\"></path>\n                            <path d=\"M33.795 44.7878C35.3361 45.6256 39.406 43.0564 36.4682 42.3969C35.6347 42.8037 32.1489 43.6284 33.795 44.7878ZM40.3269 39.7303C39.1478 39.5564 38.5441 41.2911 38.0596 42.1158C38.6021 44.113 41.8866 40.613 40.3269 39.7303ZM33.9066 34.1533C37.551 35.2656 37.6264 32.2775 34.0674 32.3989C31.1175 32.225 30.703 34.0461 33.9066 34.1533Z\"></path>\n                            <path d=\"M37.7899 34.3283C37.8528 34.9919 38.0872 35.6278 38.4702 36.1734L38.3357 35.9984C38.5369 36.2916 38.7437 36.6645 39.1538 36.6317C37.756 37.755 36.6644 39.8364 35.3662 37.4083C33.0988 34.5722 33.7146 38.758 34.8685 39.8856C38.736 45.0044 49.7151 26.8427 39.9041 35.9427C40.2399 34.8981 38.5151 32.7675 37.7899 34.3283Z\"></path>\n                            </svg>', 'Travel Deals & Discounts', 'Take advantage of our exclusive travel deals and discounts, ensuring you get the best value for your dream vacation.', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(2, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"65\" height=\"65\" viewBox=\"0 0 70 70\">\n                            <path d=\"M63.3244 22.918C62.2732 22.7909 58.8339 22.9134 57.757 22.876C56.4317 22.8749 53.0974 22.8597 51.8059 22.8597L50.8142 22.8574C50.1877 22.9134 49.8389 22.3744 50.071 21.84C50.1854 21.5157 50.806 19.8847 50.9344 19.5149C52.4779 15.3639 54.9104 8.78736 56.4679 4.64103C56.6837 4.05303 56.9905 3.31453 57.1819 2.7102C57.4339 1.7407 56.679 0.652196 55.6442 0.590363L39.7274 0.416529C37.7744 0.376863 30.8957 0.259029 29.0652 0.220529C28.7036 0.197772 28.3422 0.267313 28.0148 0.422618C27.6875 0.577923 27.405 0.813894 27.1939 1.10836C26.8987 1.47353 26.838 1.98103 26.7249 2.3917C26.6234 2.7837 26.4099 3.72753 26.236 4.46953C25.9333 4.45046 25.6438 4.33887 25.4065 4.14986C23.7569 2.80936 22.176 1.69986 20.1857 3.2632C19.3877 3.79403 18.9794 4.4917 18.0892 4.6177C17.0812 4.66903 16.0685 4.25253 14.8855 4.5022C14.1739 4.62353 13.475 5.23953 13.1659 5.85086C12.6525 6.71886 12.5207 7.8062 11.9654 8.46653C11.3505 9.0557 10.2387 9.2412 9.41037 9.77086C8.12004 10.402 7.95554 12.0237 8.24137 13.195C8.38837 14.168 8.62871 14.8575 8.01037 15.6894C5.90921 18.2957 5.92671 19.0645 8.07687 21.6044C8.73254 22.4175 8.53187 23.191 8.39887 24.1687C7.73154 27.6512 10.2772 27.3152 12.1882 28.6499C12.761 29.2239 12.9407 30.3065 13.4925 31.297C14.0245 32.4905 15.5587 32.6562 16.6659 32.4124C17.6447 32.2759 18.438 32.0764 19.2547 32.7355L19.9185 33.2535L19.1707 36.456L19.0739 36.8749C18.7087 38.2445 19.9524 39.697 21.3185 39.6329C21.3349 39.6235 28.5484 39.6795 28.8879 39.6515C29.834 39.655 36.1364 39.6597 36.9274 39.6667C36.9285 39.6025 35.9859 42.7759 35.9812 42.7712L28.3045 68.5709C28.2413 68.7725 28.2508 68.9898 28.3313 69.1852C28.4118 69.3805 28.5582 69.5414 28.7451 69.6399C28.932 69.7384 29.1475 69.7683 29.3542 69.7243C29.5608 69.6803 29.7455 69.5653 29.876 69.3992C36.2904 61.1614 52.9294 39.8184 59.1909 31.885L64.1025 25.6539C64.9519 24.8209 64.5202 23.1782 63.3255 22.9215L63.3244 22.918ZM16.5235 31.4569C15.6089 31.5899 14.7805 31.7334 14.2882 30.8245C13.797 30.0499 13.6897 28.9579 12.8427 27.9907C11.886 27.125 10.7882 27.0107 10.0205 26.5242C9.11871 26.0307 9.27387 25.2245 9.40338 24.3145C9.62271 23.2692 9.72071 21.8902 8.94254 20.9849C8.31604 20.1122 7.53671 19.3434 7.55887 18.6667C7.63121 17.521 9.76854 16.1677 9.68921 14.6522C9.74871 13.629 9.37771 12.5919 9.53404 11.704C9.60871 11.396 9.76854 11.2257 10.1395 11.0122C11.0717 10.507 12.1415 10.4032 13.0655 9.5667C13.923 8.67886 14.0817 7.59853 14.6149 6.70136C14.8424 6.35136 14.9824 6.2557 15.239 6.20903C16.1117 6.11336 17.1115 6.5112 18.1627 6.48436C19.3644 6.52753 20.4937 5.49503 21.3372 4.87553C22.4992 3.92703 23.1549 5.2232 24.1804 5.87186C25.137 6.73753 26.8007 6.7212 27.8997 6.4902C28.5052 6.43653 28.9054 6.32336 29.2367 6.55086C29.9869 7.5227 29.9507 8.77453 30.989 9.84436C32.0507 10.8804 33.292 10.8734 34.2557 11.62C34.5929 12.4682 34.062 13.5695 34.1647 14.6732C34.0877 16.2704 35.9054 17.4195 36.288 18.669C36.3009 18.8137 36.1935 19.124 35.9392 19.4845C35.5239 20.034 34.818 20.9382 34.5415 21.588C33.9815 22.8819 34.7072 24.4102 34.5987 25.5897C34.4412 26.2722 33.5242 26.4635 32.8394 26.789C32.3494 27.006 31.787 27.2347 31.255 27.7574C30.415 28.6884 30.3182 29.7512 29.82 30.695C29.379 31.549 28.7117 31.3729 27.8332 31.2912C27.0562 31.1909 26.0447 31.017 25.2245 31.381C24.1384 31.8384 23.0639 33.2885 22.1655 33.3014C21.4679 33.3282 20.6932 32.5465 19.8275 31.92C18.9269 31.1477 17.5654 31.241 16.5224 31.4592L16.5235 31.4569ZM57.253 32.662C56.6171 32.2274 55.9652 31.8165 55.2989 31.43C53.9304 30.6357 52.544 29.8725 51.1409 29.141C50.0395 28.5682 48.9289 28.014 47.8124 27.4704C46.718 26.9313 45.6072 26.4263 44.4815 25.956C44.4211 25.9315 44.3596 25.9097 44.2972 25.8907C44.2379 25.8736 44.1746 25.8759 44.1167 25.8973C44.0587 25.9187 44.0092 25.9581 43.9752 26.0097C43.938 26.066 43.9224 26.1338 43.9311 26.2006C43.9399 26.2675 43.9726 26.329 44.023 26.3737C44.0919 26.432 44.1677 26.4892 44.2505 26.5417C46.3063 27.8269 48.411 29.0322 50.5599 30.1549L50.687 30.2214C51.7814 30.793 52.8862 31.3449 54.0015 31.8769C54.9407 32.3237 55.8927 32.7484 56.847 33.166L55.4377 34.9184C53.0577 33.502 50.5984 32.2467 48.1425 30.982C45.5164 29.7045 42.8984 28.4084 40.1824 27.3105C40.1123 27.2834 40.0346 27.2834 39.9645 27.3105C39.8944 27.3376 39.8369 27.3898 39.8032 27.457C39.7696 27.5242 39.7622 27.6015 39.7824 27.6739C39.8027 27.7462 39.8492 27.8084 39.9129 27.8484C42.4352 29.3255 45.0051 30.7197 47.6187 32.0285C50.0485 33.2423 52.5144 34.3822 55.013 35.4469L52.5934 38.4499C52.004 38.0298 51.3984 37.6328 50.778 37.2599C49.434 36.4651 48.0689 35.7065 46.6842 34.9849C44.7965 34.0119 42.9077 33.0424 40.9302 32.2292C40.8229 32.1849 40.698 32.2094 40.6304 32.2887C40.5499 32.3832 40.5639 32.5104 40.6444 32.571C41.8274 33.4647 43.6392 34.5987 45.577 35.6732C45.8839 35.8435 46.1942 36.008 46.5057 36.1737C47.7158 36.8147 48.9387 37.4312 50.1737 38.0229C50.8889 38.367 51.5585 38.6727 52.1909 38.9469L49.7992 41.909C49.4907 41.6414 49.1674 41.3914 48.8309 41.16C47.9699 40.5639 46.9922 39.9899 46.2455 39.543C46.0962 39.4532 45.9679 39.3739 45.8629 39.3144C44.4862 38.5257 43.0979 37.7592 41.6197 37.1339C41.5404 37.1 41.4494 37.0965 41.391 37.1292C41.3175 37.1712 41.3012 37.2435 41.3175 37.2797C41.552 37.7954 42.9835 38.8734 44.6472 39.8965C45.7635 40.564 46.8991 41.1986 48.0527 41.7994C48.5369 42.0537 48.9779 42.2742 49.3617 42.4527L47.1357 45.206C47.0914 45.1664 47.0494 45.1267 47.0027 45.087C46.291 44.4734 45.3367 43.8235 45.1617 43.6695C44.233 43.0629 43.3149 42.4399 42.2707 41.9977C41.2405 42.0385 42.3722 43.092 43.8352 44.1467C44.5667 44.674 45.381 45.2014 46.0484 45.6015C46.2374 45.7147 46.41 45.815 46.571 45.9049C41.279 52.4499 35.5787 59.486 31.4732 64.5505L38.1757 43.449C38.4989 42.413 38.9107 41.1869 39.1989 40.1252C39.5384 38.7182 38.2889 37.2599 36.8737 37.3392C36.596 37.3322 35.903 37.3509 35.6125 37.3415L28.8844 37.352C28.4399 37.3275 21.3664 37.4069 21.2229 37.352C21.2229 37.352 21.217 37.345 21.2182 37.3275L21.2999 36.925L21.8295 34.3222C23.0137 34.4984 24.0415 33.6502 25.1324 32.8067C25.9665 32.186 26.6677 32.4264 27.6419 32.5757C29.988 33.117 31.0275 32.018 31.7625 29.9285C32.3319 27.9639 34.6104 28.476 35.8307 27.0247C36.5435 26.2547 36.477 24.92 36.3464 24.1034C36.2414 23.1864 36.0465 22.5505 36.6252 21.8622C37.3182 20.9125 38.3005 20.16 38.374 18.6667C38.3635 17.7684 37.9575 17.1174 37.632 16.639L36.7127 15.4082C36.1935 14.7152 36.4362 14.1634 36.5599 13.2604C36.7372 12.425 36.8037 10.9527 36.0489 10.1255C35.2089 9.03353 33.5324 8.86203 32.6445 8.18653C32.1475 7.60903 31.9539 6.51703 31.4265 5.6957C31.08 5.0412 30.2692 4.36803 29.498 4.2572C29.1273 4.1916 28.7494 4.17591 28.3745 4.21053L28.4597 3.7847C28.5449 3.43936 28.6814 2.5282 28.7817 2.21903C28.7945 2.19458 28.8126 2.17324 28.8346 2.15651C28.8565 2.13978 28.8819 2.12807 28.9089 2.1222L29.8037 2.10236C36.0302 1.9542 49.1774 1.81303 55.5427 1.75703C55.8729 1.76053 56.1482 2.12336 56.0712 2.4652C54.9139 5.80653 52.577 12.0715 51.366 15.449L50.0057 19.1765C49.8704 19.5359 49.2824 21.175 49.1552 21.5064C48.6407 22.603 49.6359 23.9575 50.8084 23.8129L52.6365 23.807C53.8839 24.759 55.1803 25.6449 56.5204 26.4612C57.2423 26.8991 57.9764 27.3165 58.7219 27.713C59.3075 28.0245 59.906 28.3127 60.5069 28.5985L59.0835 30.3754C58.6121 30.0059 58.1206 29.6627 57.6112 29.3475C56.468 28.6375 55.3076 27.9555 54.131 27.3024C53.2191 26.7979 52.2981 26.3102 51.3684 25.8394C50.4507 25.3642 49.5156 24.9237 48.5649 24.5187C48.5145 24.4973 48.4615 24.4824 48.4074 24.4744C48.3558 24.4666 48.3031 24.4733 48.2552 24.4937C48.2072 24.5141 48.1658 24.5474 48.1355 24.5899C48.1025 24.635 48.0842 24.6893 48.0832 24.7453C48.0821 24.8012 48.0984 24.8562 48.1297 24.9025C48.1745 24.9676 48.2306 25.0241 48.2954 25.0694C49.9767 26.2245 51.7128 27.298 53.4975 28.2859L53.6025 28.3442C54.5108 28.8495 55.4304 29.3342 56.3605 29.7979C57.1224 30.1782 57.8982 30.534 58.6752 30.8864L58.3847 31.248L57.2484 32.6655L57.253 32.662ZM63.3512 25.053L60.9572 28.0397C60.6311 27.76 60.2891 27.4994 59.9329 27.2592C58.7744 26.4612 57.3277 25.627 57.1317 25.4579C56.4014 25.0344 55.6745 24.6074 54.9337 24.2025C54.6805 24.0637 54.4239 23.933 54.1684 23.8C56.728 23.793 59.4744 23.7884 61.7237 23.7954C61.9325 23.807 62.9382 23.7732 63.0922 23.8257C63.616 23.9902 63.8039 24.6167 63.3512 25.053Z\"></path>\n                            <path d=\"M20.878 14.0001C21.1265 9.52474 14.3983 9.60757 14.6083 14.0001C14.9105 17.7567 20.5817 17.8256 20.878 14.0001ZM18.7885 14.0001C19.0627 16.4186 15.5592 16.3766 15.7248 14.0001C16.0935 12.0634 18.4012 12.3866 18.7885 14.0001ZM23.9417 23.3334C24.2438 27.0901 29.915 27.1589 30.2113 23.3334C30.4598 18.8581 23.7317 18.9409 23.9417 23.3334ZM28.123 23.3334C28.3972 25.7519 24.8937 25.7099 25.0593 23.3334C25.428 21.3967 27.7357 21.7199 28.123 23.3334ZM27.3285 12.1614L15.509 23.6752C14.4065 24.7626 16.0772 26.4227 17.1587 25.3249L28.6725 13.5054C29.5277 12.6211 28.2058 11.3097 27.3285 12.1614Z\"></path>\n                            </svg>', 'Custom Travel Packages', 'Create custom travel packages designed to your accommodations, activities & transportation for a smooth journey.', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(3, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"65\" height=\"65\" viewBox=\"0 0 70 70\">\n                            <path d=\"M36.6322 3.49316L36.7071 3.42037C20.062 3.2598 3.21674 16.7033 3.50361 36.4612C3.78192 55.5747 19.1789 69.0525 37.1471 68.2261C39.5098 68.1213 41.8522 67.7401 44.1263 67.0904C46.9554 69.3115 51.6471 70.7908 54.7171 69.5459C55.9695 69.0268 57.087 68.1929 58.0215 67.1268C61.4811 63.9669 62.0067 58.5719 61.1899 53.8749C66.343 46.5607 67.7998 38.1471 66.4746 30.3159C64.0383 15.9133 52.1941 3.48459 36.6322 3.49316ZM52.7667 10.5901C52.7056 10.715 52.679 10.8539 52.6897 10.9926C52.9551 13.6076 50.1314 15.4423 47.8492 14.1578C46.1633 13.2073 45.2374 10.7464 42.9788 9.92213C38.8416 8.40748 35.7812 13.2276 32.4297 12.8797C31.1516 12.7438 29.8928 11.744 29.2217 10.3321C28.7186 9.27453 28.4948 7.96861 28.4981 6.30303C37.1364 3.73721 45.6291 5.30539 52.7667 10.5901ZM7.88701 27.1613C13.5142 25.469 21.1025 29.0132 15.6037 31.8701C14.3245 32.5145 13.0101 33.1086 12.28 34.3257C11.3541 35.8735 11.8347 38.0476 13.3312 39.0741C13.9049 39.4648 14.6553 39.7442 14.7377 40.061C14.9304 40.7975 11.216 43.2552 7.12165 42.0435C6.6924 40.0691 6.45296 38.0583 6.40661 36.0384C6.32712 33.0449 6.70137 30.0567 7.51664 27.1753C7.63942 27.2004 7.76645 27.1956 7.88701 27.1613ZM23.1866 55.3692C25.0877 51.8689 29.0932 50.8863 29.6134 51.5071C29.9431 51.9021 29.4133 52.995 29.2548 53.9113C28.816 56.3957 31.2341 58.8438 33.7292 58.4392C36.5873 57.9725 37.9306 54.6295 40.1197 54.3491C41.1558 54.2206 42.3611 54.849 43.3524 56.0446C44.7953 57.7798 45.7169 61.3839 45.4857 64.045C42.6071 65.0931 39.5761 65.6619 36.5134 65.7288C31.7532 65.8361 27.0411 64.7579 22.8012 62.5914C22.1954 60.458 22.1911 57.2028 23.1866 55.3692ZM43.6328 41.1304C43.5825 39.8373 43.4262 38.5785 43.2325 36.8969C43.2181 36.7796 43.1778 36.6669 43.1144 36.5671C43.0511 36.4673 42.9664 36.3829 42.8664 36.3199C41.8142 35.3244 39.9784 33.3473 36.8881 31.0994C36.7942 31.031 36.6867 30.9837 36.5728 30.9609C36.4589 30.9381 36.3415 30.9402 36.2285 30.9672C36.1156 30.9941 36.0098 31.0453 35.9185 31.1171C35.8273 31.1889 35.7527 31.2797 35.6999 31.3831C33.5869 35.5267 32.2585 39.4605 31.4225 44.0238C30.7213 43.6705 30.6785 43.6491 30.5436 43.5742C31.3807 37.7821 31.5306 32.3005 31.6098 27.1731C31.6117 27.0484 31.5846 26.9249 31.5305 26.8125C31.4765 26.7001 31.397 26.6018 31.2983 26.5255C28.6351 24.4639 26.2031 22.7362 23.8706 21.2483C23.4339 19.8996 23.1288 19.6876 23.3161 19.4008C23.4617 19.176 23.5484 19.313 24.9721 19.1599C27.981 21.1648 30.8187 22.9171 33.407 24.3707C33.6254 24.4928 33.8887 24.5078 34.1199 24.4071C38.6906 22.4322 43.9068 20.7795 49.2343 19.6148C49.2996 19.7165 49.4077 19.8932 49.4698 20.0002C45.6998 21.8413 41.8505 24.5677 38.286 27.946C38.2087 28.0191 38.1467 28.1069 38.1036 28.2042C38.0605 28.3015 38.0373 28.4064 38.0352 28.5129C38.0331 28.6193 38.0522 28.725 38.0914 28.824C38.1306 28.9229 38.1891 29.0131 38.2635 29.0892C40.3883 31.2728 42.3098 33.0733 43.9689 34.437C44.6882 35.0236 45.4204 34.0089 49.4217 33.2125C49.5897 33.4105 49.7663 33.6438 49.9408 33.8922C46.3763 36.1615 45.1539 37.1142 43.9571 41.2674C43.8492 41.2214 43.7411 41.1757 43.6328 41.1304ZM48.1821 37.0596C55.2448 44.6896 63.745 59.1135 56.4383 66.4567C61.4768 58.6736 54.3446 46.8251 46.4191 39.2711C46.8357 38.4124 47.4379 37.657 48.1821 37.0596ZM56.3591 59.3276C56.5539 61.4492 56.2735 63.0099 55.7757 64.2623C53.6616 67.3387 49.777 67.6406 47.2016 66.0231C50.2759 64.7322 53.1211 62.844 55.2116 60.3328C55.6044 60.0116 55.9802 59.6702 56.3591 59.3276ZM50.5617 35.4026C50.8678 35.2024 51.1579 35.0204 51.4052 34.878C51.4351 34.8663 51.4673 34.8705 51.4951 34.8545C51.6773 34.7443 51.8084 34.5664 51.8596 34.3597C51.9108 34.153 51.8778 33.9344 51.768 33.752C51.5443 33.3816 50.9513 32.446 50.2801 31.7749C50.1893 31.6832 50.0775 31.6151 49.9544 31.5763C49.8313 31.5375 49.7007 31.5292 49.5737 31.5522C47.7732 31.868 46.1783 32.3872 44.6454 32.9117C43.2635 31.7503 41.7007 30.2881 39.9869 28.554C43.5054 25.3213 47.2755 22.7437 50.9299 21.077C51.107 20.9944 51.2475 20.8493 51.3245 20.6697C51.4015 20.49 51.4096 20.2882 51.3474 20.103C51.3323 19.967 51.2818 19.8374 51.2007 19.7272C50.6794 19.0529 50.2662 17.7587 49.3703 17.9439C43.9207 19.1032 38.5633 20.7709 33.8491 22.7758C26.3197 18.5069 25.8466 17.4387 25.0706 17.5307C23.5987 17.718 22.6717 17.4569 21.9738 18.5187C21.8041 18.7778 21.6982 19.0735 21.6649 19.3815C21.6316 19.6894 21.6718 20.0009 21.7822 20.2903C23.269 23.8837 20.8541 20.5151 29.9977 27.5499C29.9121 32.8539 29.7483 38.1075 28.8791 43.8514C28.7271 44.8608 30.4366 45.1338 31.3914 45.8563C31.4936 45.9345 31.6133 45.9867 31.7402 46.0083C31.867 46.03 31.9972 46.0205 32.1196 45.9807C32.242 45.9409 32.3529 45.872 32.4427 45.7798C32.5325 45.6877 32.5986 45.5751 32.6353 45.4517C33.331 44.7688 32.9457 40.6883 36.705 32.9663C38.3385 34.2144 39.9056 35.6145 41.675 37.4C41.7339 38.0444 41.8216 38.3034 42.0036 41.1679C42.0818 42.386 42.1503 42.2404 43.2539 42.7136C44.0749 43.07 44.1273 43.1064 44.4067 43.0668C44.611 43.1005 44.8203 43.0534 44.9905 42.9356C45.1607 42.8177 45.2784 42.6383 45.3187 42.4352C45.4193 41.9343 45.5842 41.4044 45.7662 40.8853C50.5927 45.5737 54.7042 50.6647 56.0776 57.4148C53.4756 59.9274 50.4401 61.9481 47.1181 63.3792C47.1502 60.4323 46.1387 56.8839 44.5887 55.0181C43.2239 53.3739 41.5166 52.554 39.9141 52.7552C37.0144 53.1288 35.672 56.4964 33.4702 56.8549C32.0733 57.0862 30.5897 55.5897 30.8348 54.1896C31.0189 53.162 31.8453 51.6698 30.8434 50.4763C30.2375 49.7484 29.1928 49.5279 27.9008 49.8512C25.3307 50.4977 23.041 52.2725 21.7747 54.6017C20.7835 56.4289 20.6047 59.242 20.9419 61.5488C14.5622 57.6674 9.69174 51.3904 7.56802 43.8161C10.2227 44.331 12.888 43.7165 14.9229 42.3207C16.034 41.5564 16.5328 40.5866 16.2898 39.6543C15.9955 38.5303 14.8683 38.1771 14.2368 37.7489C13.4447 37.2062 13.1674 35.9667 13.6577 35.151C14.1383 34.346 15.1777 33.8815 16.3444 33.2938C20.4088 31.1829 19.7516 27.688 16.0351 26.1038C13.5571 25.044 10.6905 24.83 8.06256 25.4626C11.1347 16.79 18.2455 9.92642 26.8817 6.8286C27.0102 11.7804 29.6605 14.1996 32.2563 14.4768C36.0531 14.8729 39.3982 10.3235 42.4264 11.4293C44.153 12.0608 45.0511 14.4243 47.0603 15.5558C49.9569 17.1893 53.8789 15.4702 54.2718 11.7815C59.7973 16.4549 63.517 23.0402 64.8197 30.1253C66.1385 37.2993 64.9803 44.985 60.7093 51.7158C59.0202 45.5373 54.6593 40.2013 50.5617 35.4026Z\"></path>\n                            <path d=\"M59.2244 26.0313C58.6495 25.632 58.6281 25.6138 58.6838 24.841C58.7095 24.4781 58.7395 24.066 58.6281 23.6346C58.0544 21.3974 54.8121 21.2657 53.9001 23.6196C53.2578 25.2798 50.3709 26.0805 51.7175 29.5498C52.8789 32.5427 57.2794 33.7202 59.6279 31.4947C60.3515 30.8097 60.7711 29.7778 60.7508 28.7363C60.723 27.441 60.1353 26.6618 59.2244 26.0313ZM53.215 28.9685C52.2677 26.529 54.5048 26.5012 55.3976 24.1998C55.5581 23.7855 55.9681 23.5051 56.3256 23.5051C56.6543 23.5051 56.9989 23.7459 57.0728 24.0328C57.2034 24.5434 56.8405 25.4565 57.3008 26.3385C57.9099 27.5053 59.1162 27.3019 59.1451 28.7684C59.2029 31.7538 54.2876 31.7399 53.215 28.9685ZM52.7954 5.07556L53.382 0.879487C53.4014 0.673445 53.3407 0.467836 53.2124 0.30546C53.084 0.143084 52.898 0.036453 52.6931 0.007764C52.4881 -0.020925 52.28 0.0305387 52.112 0.151442C51.944 0.272345 51.8292 0.453372 51.7913 0.656838L51.2047 4.85398C51.0592 5.90621 52.6477 6.12778 52.7954 5.07556ZM57.7654 2.49048L55.1471 6.2466C54.5338 7.12542 55.8707 8.01816 56.4637 7.16396L59.082 3.4089C59.1449 3.32257 59.1899 3.22456 59.2144 3.1206C59.2389 3.01665 59.2425 2.90885 59.2248 2.80351C59.2072 2.69818 59.1687 2.59743 59.1116 2.50716C59.0545 2.41689 58.98 2.33892 58.8924 2.27781C58.8048 2.21671 58.7058 2.17369 58.6014 2.15129C58.497 2.1289 58.3891 2.12756 58.2842 2.14736C58.1792 2.16717 58.0793 2.20772 57.9902 2.26663C57.9011 2.32555 57.8247 2.40165 57.7654 2.49048ZM59.4995 11.1438L64.1323 7.6692C64.3026 7.54145 64.4152 7.35126 64.4453 7.14048C64.4754 6.9297 64.4206 6.71559 64.2928 6.54525C64.1651 6.37491 63.9749 6.2623 63.7641 6.23219C63.5533 6.20208 63.3392 6.25694 63.1689 6.38469L58.535 9.86036C57.6797 10.5015 58.6613 11.7754 59.4984 11.1449L59.4995 11.1438Z\"></path>\n                            </svg>', 'Explore Destinations', 'Discover amazing places to visit, from bustling cities to serene beaches, and plan your perfect adventure with our expert guides.', '2024-09-11 08:07:45', '2024-09-11 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `home_items`
--

CREATE TABLE `home_items` (
  `id` bigint UNSIGNED NOT NULL,
  `destination_heading` text COLLATE utf8mb4_unicode_ci,
  `destination_subheading` text COLLATE utf8mb4_unicode_ci,
  `destination_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_heading` text COLLATE utf8mb4_unicode_ci,
  `feature_subheading` text COLLATE utf8mb4_unicode_ci,
  `feature_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_heading` text COLLATE utf8mb4_unicode_ci,
  `package_subheading` text COLLATE utf8mb4_unicode_ci,
  `package_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_heading` text COLLATE utf8mb4_unicode_ci,
  `testimonial_subheading` text COLLATE utf8mb4_unicode_ci,
  `testimonial_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_heading` text COLLATE utf8mb4_unicode_ci,
  `blog_subheading` text COLLATE utf8mb4_unicode_ci,
  `blog_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_items`
--

INSERT INTO `home_items` (`id`, `destination_heading`, `destination_subheading`, `destination_status`, `feature_heading`, `feature_subheading`, `feature_status`, `package_heading`, `package_subheading`, `package_status`, `testimonial_heading`, `testimonial_subheading`, `testimonial_status`, `blog_heading`, `blog_subheading`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 'Popular Destinations', 'Explore our most popular travel destinations around the world', 'Active', 'Our Success', 'Why Choose TripRex', 'Active', 'Popular Packages', 'Explore our most popular travel packages around the world', 'Active', 'Client Testimonials', 'See what our clients have to say about their experience with us', 'Active', 'Latest Blog', 'Latest Travel Blog', 'Active', '2024-09-11 08:07:46', '2024-09-11 10:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-09-13 08:50:26', '2024-09-13 08:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `message_comments`
--

CREATE TABLE `message_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `message_id` bigint UNSIGNED NOT NULL,
  `sender_id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_comments`
--

INSERT INTO `message_comments` (`id`, `message_id`, `sender_id`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'User', 'hlw', '2024-09-13 08:50:31', '2024-09-13 08:50:31'),
(2, 1, 1, 'User', 'ji bolen', '2024-09-13 08:53:16', '2024-09-13 08:53:16'),
(3, 1, 1, 'Admin', 'ji', '2024-09-13 08:53:33', '2024-09-13 08:53:33'),
(4, 1, 1, 'Admin', 'vai apni ki kisu jante chan taile amader k janate paren', '2024-09-13 08:56:40', '2024-09-13 08:56:40'),
(5, 1, 1, 'User', 'ji ami jante chai', '2024-09-13 08:57:22', '2024-09-13 08:57:22'),
(6, 1, 1, 'Admin', 'ji taile bolen ?', '2024-09-13 08:57:38', '2024-09-13 08:57:38'),
(7, 1, 1, 'Admin', 'hlw sir', '2024-09-13 09:03:05', '2024-09-13 09:03:05'),
(8, 1, 1, 'Admin', 'hlw', '2024-09-13 09:06:12', '2024-09-13 09:06:12'),
(9, 1, 1, 'User', 'ji bolen', '2024-09-13 09:08:06', '2024-09-13 09:08:06'),
(10, 1, 1, 'Admin', 'ki', '2024-09-13 09:08:30', '2024-09-13 09:08:30'),
(11, 1, 1, 'Admin', '.', '2024-09-13 09:11:43', '2024-09-13 09:11:43'),
(12, 1, 1, 'Admin', 's', '2024-09-13 09:13:54', '2024-09-13 09:13:54'),
(13, 1, 1, 'Admin', 'This is testing from ajax', '2024-09-13 09:14:20', '2024-09-13 09:14:20'),
(14, 1, 1, 'Admin', 'ki', '2024-09-13 09:15:59', '2024-09-13 09:15:59'),
(15, 1, 1, 'User', 'test again', '2024-09-13 09:43:26', '2024-09-13 09:43:26'),
(16, 1, 1, 'Admin', 'ok', '2024-09-13 09:43:40', '2024-09-13 09:43:40'),
(17, 1, 1, 'Admin', 'test 2', '2024-09-13 09:43:54', '2024-09-13 09:43:54'),
(18, 1, 1, 'Admin', 'ji bolen', '2024-09-13 09:51:06', '2024-09-13 09:51:06'),
(19, 1, 1, 'Admin', 'hlw', '2024-09-13 10:01:50', '2024-09-13 10:01:50'),
(20, 1, 1, 'Admin', 'ji', '2024-09-13 10:01:56', '2024-09-13 10:01:56'),
(21, 1, 1, 'User', 'sdfdfff', '2024-09-13 10:08:25', '2024-09-13 10:08:25'),
(22, 1, 1, 'User', 'j', '2024-09-13 10:09:31', '2024-09-13 10:09:31'),
(23, 1, 1, 'User', 'ji?', '2024-09-13 10:11:21', '2024-09-13 10:11:21'),
(24, 1, 1, 'User', '..', '2024-09-13 10:13:43', '2024-09-13 10:13:43'),
(25, 1, 1, 'User', '.', '2024-09-13 10:14:23', '2024-09-13 10:14:23'),
(26, 1, 1, 'Admin', 'test9', '2024-09-13 10:14:37', '2024-09-13 10:14:37'),
(27, 1, 1, 'User', 'test10', '2024-09-13 10:14:51', '2024-09-13 10:14:51'),
(28, 1, 1, 'User', 'g', '2024-09-13 10:15:03', '2024-09-13 10:15:03'),
(29, 1, 1, 'User', 'o', '2024-09-13 10:16:35', '2024-09-13 10:16:35'),
(30, 1, 1, 'Admin', 'oo', '2024-09-13 10:16:45', '2024-09-13 10:16:45'),
(31, 1, 1, 'User', 'ami valo pola na', '2024-09-13 11:52:02', '2024-09-13 11:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_06_172633_create_admins_table', 1),
(5, '2024_08_11_090044_create_sliders_table', 1),
(6, '2024_08_11_175145_create_welcome_items_table', 1),
(7, '2024_08_12_154932_create_features_table', 1),
(8, '2024_08_12_175148_create_counter_items_table', 1),
(9, '2024_08_13_045113_create_testimonials_table', 1),
(10, '2024_08_13_064759_create_team_members_table', 1),
(11, '2024_08_14_065350_create_faqs_table', 1),
(12, '2024_08_14_155017_create_blog_categories_table', 1),
(13, '2024_08_14_164430_create_blogs_table', 1),
(14, '2024_08_15_083211_create_destinations_table', 1),
(15, '2024_08_16_070611_create_destination_photos_table', 1),
(16, '2024_08_16_095437_create_destination_videos_table', 1),
(17, '2024_08_16_134351_create_packages_table', 1),
(18, '2024_08_16_163042_create_settings_table', 1),
(19, '2024_08_17_090434_create_amenities_table', 1),
(20, '2024_08_17_094703_create_package_amenities_table', 1),
(21, '2024_08_17_143043_create_package_itineraries_table', 1),
(22, '2024_08_17_185942_create_package_photos_table', 1),
(23, '2024_08_18_085320_create_package_videos_table', 1),
(24, '2024_08_19_062418_create_package_faqs_table', 1),
(25, '2024_08_21_043506_create_tours_table', 1),
(26, '2024_08_22_193414_create_bookings_table', 1),
(27, '2024_08_30_082946_create_reviews_table', 1),
(28, '2024_09_04_055409_create_messages_table', 1),
(29, '2024_09_04_055511_create_message_comments_table', 1),
(30, '2024_09_07_122440_create_subscribers_table', 1),
(31, '2024_09_08_052350_create_home_items_table', 1),
(32, '2024_09_08_111845_create_about_items_table', 1),
(33, '2024_09_09_052002_create_contact_items_table', 1),
(34, '2024_09_09_054130_create_term_privacy_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `destination_id` bigint UNSIGNED NOT NULL,
  `featured_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `price` double DEFAULT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_rating` int NOT NULL DEFAULT '0',
  `total_score` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `destination_id`, `featured_photo`, `name`, `slug`, `description`, `map`, `price`, `old_price`, `total_rating`, `total_score`, `created_at`, `updated_at`) VALUES
(1, 4, '1726244803.jpg', 'Venice Grand Canal', 'venice-grand-canal', '<p>The Great Barrier Reef, located off the coast of Queensland, Australia, is the world\'s largest coral reef system, stretching over 2,300 kilometers and comprising more than 2,900 individual reefs and 900 islands. Renowned for its stunning biodiversity, the reef is home to an extraordinary variety of marine life, including over 1,500 species of fish and 400 types of coral. Its vibrant coral formations and crystal-clear waters make it a premier destination for snorkeling and diving enthusiasts.</p><p>Beyond its natural beauty, the Great Barrier Reef holds significant ecological and economic importance. It supports a vast array of marine life and contributes to the livelihoods of many local communities through tourism and fishing. However, the reef faces numerous threats, including climate change and coral bleaching, making conservation efforts crucial for its future.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 400, '800', 0, 0, '2024-09-13 10:26:43', '2024-09-13 10:26:44'),
(2, 4, '1726244862.jpg', 'Great Barrier Reef', 'great-barrier-reef', '<p>The Great Barrier Reef, located off the coast of Queensland, Australia, is the world\'s largest coral reef system, stretching over 2,300 kilometers and comprising more than 2,900 individual reefs and 900 islands. Renowned for its stunning biodiversity, the reef is home to an extraordinary variety of marine life, including over 1,500 species of fish and 400 types of coral. Its vibrant coral formations and crystal-clear waters make it a premier destination for snorkeling and diving enthusiasts.</p><p>Beyond its natural beauty, the Great Barrier Reef holds significant ecological and economic importance. It supports a vast array of marine life and contributes to the livelihoods of many local communities through tourism and fishing. However, the reef faces numerous threats, including climate change and coral bleaching, making conservation efforts crucial for its future.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 856, '2135', 0, 0, '2024-09-13 10:27:42', '2024-09-13 10:27:42'),
(3, 4, '1726244931.jpg', 'Similan Islands, Andaman Sea', 'similan-islands-andaman-sea', '<p>The Great Barrier Reef, located off the coast of Queensland, Australia, is the world\'s largest coral reef system, stretching over 2,300 kilometers and comprising more than 2,900 individual reefs and 900 islands. Renowned for its stunning biodiversity, the reef is home to an extraordinary variety of marine life, including over 1,500 species of fish and 400 types of coral. Its vibrant coral formations and crystal-clear waters make it a premier destination for snorkeling and diving enthusiasts.</p><p>Beyond its natural beauty, the Great Barrier Reef holds significant ecological and economic importance. It supports a vast array of marine life and contributes to the livelihoods of many local communities through tourism and fishing. However, the reef faces numerous threats, including climate change and coral bleaching, making conservation efforts crucial for its future.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 200, '450', 0, 0, '2024-09-13 10:28:51', '2024-09-13 10:28:51'),
(4, 4, '1726244971.jpg', 'Royal Ontario Museum', 'royal-ontario-museum', '<p>The Great Barrier Reef, located off the coast of Queensland, Australia, is the world\'s largest coral reef system, stretching over 2,300 kilometers and comprising more than 2,900 individual reefs and 900 islands. Renowned for its stunning biodiversity, the reef is home to an extraordinary variety of marine life, including over 1,500 species of fish and 400 types of coral. Its vibrant coral formations and crystal-clear waters make it a premier destination for snorkeling and diving enthusiasts.</p><p>Beyond its natural beauty, the Great Barrier Reef holds significant ecological and economic importance. It supports a vast array of marine life and contributes to the livelihoods of many local communities through tourism and fishing. However, the reef faces numerous threats, including climate change and coral bleaching, making conservation efforts crucial for its future.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 8000, '10000', 0, 0, '2024-09-13 10:29:31', '2024-09-13 10:29:31'),
(5, 4, '1726245063.jpg', 'Experience the tour', 'experience-the-tour', '<p>The Great Barrier Reef, located off the coast of Queensland, Australia, is the world\'s largest coral reef system, stretching over 2,300 kilometers and comprising more than 2,900 individual reefs and 900 islands. Renowned for its stunning biodiversity, the reef is home to an extraordinary variety of marine life, including over 1,500 species of fish and 400 types of coral. Its vibrant coral formations and crystal-clear waters make it a premier destination for snorkeling and diving enthusiasts.</p><p>Beyond its natural beauty, the Great Barrier Reef holds significant ecological and economic importance. It supports a vast array of marine life and contributes to the livelihoods of many local communities through tourism and fishing. However, the reef faces numerous threats, including climate change and coral bleaching, making conservation efforts crucial for its future.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3841.213796657222!2d-48.19850276265277!3d-15.68680004610411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bb6e0b3e152d1%3A0x1f78638e8d8f779!2sCentral%20Fair%20Brazl%C3%A2ndia!5e0!3m2!1sbn!2sbd!4v1726070895889!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 30, '120', 1, 5, '2024-09-13 10:31:03', '2024-09-13 10:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `package_amenities`
--

CREATE TABLE `package_amenities` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `amenity_id` bigint UNSIGNED NOT NULL,
  `type` enum('Include','Exclude') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_amenities`
--

INSERT INTO `package_amenities` (`id`, `package_id`, `amenity_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 'Include', '2024-09-13 10:36:19', '2024-09-13 10:36:19'),
(2, 5, 7, 'Include', '2024-09-13 10:36:23', '2024-09-13 10:36:23'),
(3, 5, 6, 'Exclude', '2024-09-13 10:36:27', '2024-09-13 10:36:27'),
(4, 5, 10, 'Exclude', '2024-09-13 10:36:33', '2024-09-13 10:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `package_faqs`
--

CREATE TABLE `package_faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_itineraries`
--

CREATE TABLE `package_itineraries` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_itineraries`
--

INSERT INTO `package_itineraries` (`id`, `package_id`, `day`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, '1', 'First Day', '<figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td><strong>Morning:</strong><br>1. Arrive at Cairns or Port Douglas and check into your hotel.<br>2. Welcome meeting with the tour guide and fellow travelers.<br><strong>Afternoon</strong><br>1. Lunch at a local restaurant.<br>2. Visit the Cairns Aquarium to get an introduction to the marine life of the Great Barrier Reef.<br><strong>Evening</strong><br>1. Free time to explore the local area.<br>2. Welcome dinner at the hotel, with an overview of the tour itinerary and reef conservation briefing.</td></tr></tbody></table></figure>', '2024-09-13 10:40:10', '2024-09-13 10:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `package_photos`
--

CREATE TABLE `package_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_videos`
--

CREATE TABLE `package_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `package_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 5, 'vloi', '2024-09-13 10:50:38', '2024-09-13 10:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wE653FnD4Q5dOmtgMrzLNAGauO2mGHz2cKuimDk4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiVFdVNXdacEliMlRldnVrR2JKWTJ5WTNBcHVGc0h3RmtkSERGbnpqbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTI6InRvdGFsX3BlcnNvbiI7czoxOiIzIjtzOjc6InRvdXJfaWQiO3M6MToiMSI7czoxMDoicGFja2FnZV9pZCI7czoxOiI1IjtzOjc6InVzZXJfaWQiO2k6MTt9', 1726249961);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `banner`, `phone`, `email`, `address`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'default_logo.png', 'default_favicon.png', 'default_banner.jpg', '+999-858 624 984', 'triprex@example.com', 'House 168/170, Avenue 01, Mirpur 10, Dhaka Bangladesh', '#', '#', '#', '#', '#', '© Copyright 2024, TripRex. All Rights Reserved.', '2024-09-11 08:07:46', '2024-09-11 08:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `text`, `button_name`, `button_link`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Trip to Nice Cities', 'Exploring vibrant cities, immersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.', 'Read More', '#', 'slider-1.jpg', '2024-09-11 08:07:45', '2024-09-11 08:07:45'),
(2, 'Hire Quality Cars', 'Exploring vibrant cities, immersing in diverse cultures, visiting landmarks, savoring local cuisine, and engaging with locals offer unforgettable experiences, enriching your perspective, and creating lasting memories, making city trips unique and invaluable.', 'Read More', '#', 'slider-2.jpg', '2024-09-11 08:07:45', '2024-09-11 08:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sazzat@gmail.com', '', 'Active', '2024-09-11 10:26:11', '2024-09-11 10:28:00'),
(2, 'admin@gmail.com', '', 'Active', '2024-09-11 10:26:52', '2024-09-11 10:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `slug`, `designation`, `address`, `email`, `phone`, `biography`, `photo`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Landry Palmer', 'landry_palmer', 'Tour Guide', 'USA', 'landrypalmer@gmail.com', '+1 (194) 631-1723', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p><p>Nec purto lobortis ad, mei ea molestie constituto accommodare, deserunt persecuti voluptaria mei ei. In diceret fierent adversarium duo, in homero dissentias vim. Ea nam lucilius liberavisse. At his erant utamur, eam persius laoreet no. Te ubique persecuti usu, cum aliquip aliquando signiferumque eu, ei tale ludus per. Vix at argumentum comprehensam, veri nullam evertitur ne vel.</p>', '1726065362.png', '#', '#', '#', '#', '2024-09-11 08:36:02', '2024-09-11 08:52:35'),
(2, 'Dani Alves', 'dani_alves', 'Tour Guide', 'Finland', 'danialves@gmail.com', '+1 (194) 631-1723', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p><p>Nec purto lobortis ad, mei ea molestie constituto accommodare, deserunt persecuti voluptaria mei ei. In diceret fierent adversarium duo, in homero dissentias vim. Ea nam lucilius liberavisse. At his erant utamur, eam persius laoreet no. Te ubique persecuti usu, cum aliquip aliquando signiferumque eu, ei tale ludus per. Vix at argumentum comprehensam, veri nullam evertitur ne vel.</p>', '1726066630.png', '#', NULL, NULL, '#', '2024-09-11 08:57:10', '2024-09-11 08:57:11'),
(3, 'Lucas Mora', 'lucas-mora', 'Tour Guide', 'UK', 'lucasmora@gmail.com', '+1 (194) 631-1713', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p><p>Nec purto lobortis ad, mei ea molestie constituto accommodare, deserunt persecuti voluptaria mei ei. In diceret fierent adversarium duo, in homero dissentias vim. Ea nam lucilius liberavisse. At his erant utamur, eam persius laoreet no. Te ubique persecuti usu, cum aliquip aliquando signiferumque eu, ei tale ludus per. Vix at argumentum comprehensam, veri nullam evertitur ne vel.</p>', '1726066846.png', NULL, NULL, '#', NULL, '2024-09-11 09:00:46', '2024-09-11 09:00:47'),
(4, 'Mason Ezra', 'mason_ezra', 'Tour Guide', 'Finland', 'masonezra@gmail.com', '+1 (194) 631-3423', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p><p>Nec purto lobortis ad, mei ea molestie constituto accommodare, deserunt persecuti voluptaria mei ei. In diceret fierent adversarium duo, in homero dissentias vim. Ea nam lucilius liberavisse. At his erant utamur, eam persius laoreet no. Te ubique persecuti usu, cum aliquip aliquando signiferumque eu, ei tale ludus per. Vix at argumentum comprehensam, veri nullam evertitur ne vel.</p>', '1726067183.png', NULL, NULL, NULL, NULL, '2024-09-11 09:06:23', '2024-09-11 09:06:23'),
(5, 'Asher Samuel', 'asher_samuel', 'Tour Guide', 'India', 'ashersamuel@gmail.com', '+1 (194) 546-1723', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p>', '1726067366.png', '#', NULL, '#', '#', '2024-09-11 09:09:26', '2024-09-11 09:09:26'),
(6, 'Joseph David', 'joseph_david', 'Tour Guide', 'Bangladesh', 'josephdavid@gmail.com', '+1 (194) 898-1723', '<p>Lorem ipsum dolor sit amet, et ius explicari persequeris, an per novum noluisse hendrerit, atqui regione laboramus ea eum. Rebum tractatos ne qui, quis volumus pri an. Vim id idque partem, primis accumsan voluptatum vix ea, id vis zril tibique conclusionemque. Blandit pertinacia in has, cu duo quod deleniti. Vix quas referrentur cu.</p><p>Nec purto lobortis ad, mei ea molestie constituto accommodare, deserunt persecuti voluptaria mei ei. In diceret fierent adversarium duo, in homero dissentias vim. Ea nam lucilius liberavisse. At his erant utamur, eam persius laoreet no. Te ubique persecuti usu, cum aliquip aliquando signiferumque eu, ei tale ludus per. Vix at argumentum comprehensam, veri nullam evertitur ne vel.</p>', '1726067454.png', NULL, NULL, NULL, NULL, '2024-09-11 09:10:54', '2024-09-11 09:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `term_privacy_items`
--

CREATE TABLE `term_privacy_items` (
  `id` bigint UNSIGNED NOT NULL,
  `term` text COLLATE utf8mb4_unicode_ci,
  `privacy` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_privacy_items`
--

INSERT INTO `term_privacy_items` (`id`, `term`, `privacy`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>Effective Date: [11-09-2024]</strong></p><p>Welcome to Triprex! By accessing or using our website (the \"Site\"), you agree to comply with and be bound by the following Terms of Use. Please review these terms carefully. If you do not agree with them, you should not use the Site.</p><h3>1. Acceptance of Terms</h3><p>By using Triprex (referred to as \"we\", \"our\", or \"the Site\"), you agree to follow and be bound by these Terms of Use, as well as our Privacy Policy, which may be updated from time to time without prior notice. Your continued use of the Site after any changes constitutes your acceptance of the new terms.</p><h3>2. Use of the Website</h3><p>You agree to use the Site in compliance with all applicable laws, rules, and regulations. You may not use the Site in any manner that could harm, disable, or impair the Site, or interfere with other users\' enjoyment of it.</p><p>You must not:</p><ul><li>Use any automated means to access the Site or extract data.</li><li>Engage in hacking, spamming, or violating any security measures.</li><li>Submit false, misleading, or illegal information.</li><li>Use the Site for any fraudulent, unlawful, or prohibited activity.</li></ul><h3>3. Intellectual Property</h3><p>All content, including but not limited to text, graphics, logos, icons, images, and software on Triprex, is the property of Triprex or its content suppliers and is protected by copyright, trademark, and other applicable intellectual property laws. You may not reproduce, distribute, or exploit the content in any way without prior written consent from Triprex.</p><h3>4. Bookings and Payments</h3><p>All bookings made through Triprex are subject to availability and acceptance by the relevant service provider. Triprex is not responsible for any third-party services provided by airlines, hotels, or other travel operators. Payment terms for bookings are outlined at the time of purchase and are subject to the terms and conditions of the service providers.</p><h3>5. Cancellations and Refunds</h3><p>Cancellation and refund policies vary depending on the service provider and the specific terms of the booking. Please review the cancellation and refund policies at the time of booking for detailed information. Triprex is not liable for any fees incurred as a result of cancellations or changes.</p><h3>6. Limitation of Liability</h3><p>Triprex and its affiliates will not be liable for any damages, including but not limited to indirect, incidental, or consequential damages, arising out of your use or inability to use the Site, any services obtained through the Site, or unauthorized access to or alteration of your data.</p><h3>7. Indemnification</h3><p>You agree to indemnify and hold Triprex, its affiliates, and its service providers harmless from any claims, losses, damages, liabilities, including legal fees, arising from your use of the Site, violation of these Terms, or infringement of any third-party rights.</p><h3>8. Governing Law</h3><p>These Terms of Use are governed by and construed in accordance with the laws of [Your Country/Region]. Any disputes arising from these terms or your use of the Site will be subject to the exclusive jurisdiction of the courts of [Your Country/Region].</p><h3>9. Changes to the Terms of Use</h3><p>Triprex reserves the right to modify these Terms of Use at any time. It is your responsibility to check this page periodically for updates. Your continued use of the Site following any changes means you accept those changes.</p><h3>10. Contact Us</h3><p>If you have any questions regarding these Terms of Use, please contact us at [<a href=\"tel:+999-858 624 984\">+999-858 624 984</a>].</p>', '<h3>1. Information We Collect</h3><p>We collect the following types of information:</p><h3>a. <strong>Personal Information</strong></h3><p>When you use Triprex to book travel services, we may collect personal information such as:</p><ul><li>Name</li><li>Email address</li><li>Phone number</li><li>Payment information (credit/debit card details)</li><li>Passport or government-issued ID information (if required for travel bookings)</li></ul><h3>b. <strong>Non-Personal Information</strong></h3><p>We may collect non-personal information about how you use the Site, including:</p><ul><li>IP address</li><li>Browser type and version</li><li>Device type</li><li>Pages you visit on the Site</li><li>Time spent on the Site</li><li>Referral URLs (the website that referred you to us)</li></ul><h3>c. <strong>Cookies and Tracking Technologies</strong></h3><p>We use cookies and similar tracking technologies to enhance your experience on the Site, to track user activity, and to collect analytical information. You may opt-out of cookies through your browser settings, but doing so may affect your ability to use certain features of the Site.</p><h3>2. How We Use Your Information</h3><p>We use your information to provide, maintain, and improve our services, including:</p><ul><li>Processing your bookings and payments</li><li>Communicating with you regarding your bookings, inquiries, or updates</li><li>Providing customer support</li><li>Personalizing your experience on Triprex</li><li>Sending promotional and marketing communications (with your consent)</li><li>Analyzing website traffic and user behavior to improve our offerings</li></ul><h3>3. How We Share Your Information</h3><p>We may share your information with third parties in the following situations:</p><h3>a. <strong>Service Providers</strong></h3><p>We may share your personal information with third-party service providers (e.g., airlines, hotels, travel operators) to facilitate your bookings and other travel services.</p><h3>b. <strong>Legal Obligations</strong></h3><p>We may disclose your information to comply with legal obligations, such as responding to subpoenas, court orders, or other legal processes.</p><h3>c. <strong>Business Transfers</strong></h3><p>If Triprex undergoes a merger, acquisition, or sale of assets, your personal information may be transferred as part of that transaction.</p><h3>d. <strong>With Your Consent</strong></h3><p>We may share your information with third parties when you provide explicit consent.</p><h3>4. Data Security</h3><p>We are committed to protecting your personal information. We use reasonable administrative, technical, and physical security measures to safeguard your data from unauthorized access, disclosure, or misuse. However, no method of data transmission or storage is completely secure, and we cannot guarantee absolute security.</p><h3>5. Your Rights</h3><p>Depending on your location, you may have certain rights regarding your personal information, including:</p><ul><li><strong>Access</strong>: You have the right to request access to the personal data we hold about you.</li><li><strong>Correction</strong>: You may request corrections to any inaccurate or incomplete personal data.</li><li><strong>Deletion</strong>: You may request the deletion of your personal data, subject to legal obligations.</li><li><strong>Opt-Out</strong>: You have the right to opt-out of marketing communications by clicking the \"unsubscribe\" link in emails.</li></ul><p>To exercise any of these rights, please contact us at [Your Contact Information].</p><h3>6. Third-Party Links</h3><p>The Site may contain links to third-party websites. We are not responsible for the privacy practices or the content of these external websites. We recommend reviewing their privacy policies before providing any personal information.</p><h3>7. International Data Transfers</h3><p>If you are accessing the Site from outside [Your Country/Region], your information may be transferred to, stored, or processed in a country different from your own. By using the Site, you consent to such transfers.</p><h3>8. Children\'s Privacy</h3><p>Triprex does not knowingly collect personal information from children under the age of 13. If we become aware that we have collected such information, we will take steps to delete it.</p><h3>9. Changes to This Privacy Policy</h3><p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and the effective date will be updated. We encourage you to review the policy periodically to stay informed of any updates.</p><h3>10. Contact Us</h3><p>If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:</p><ul><li><strong>Email</strong>: [<a href=\"mailto:triprex@example.com\">triprex@example.com</a>]</li><li><strong>Phone</strong>: [<a href=\"tel:+999-858 624 984\">+999-858 624 984</a>]</li><li><strong>Mailing Address</strong>: [<a href=\"http://127.0.0.1:8000/privacy-policy#\">House 168/170, Avenue 01, Mirpur 10, Dhaka Bangladesh</a></li></ul>', '2024-09-11 08:07:46', '2024-09-11 11:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `location`, `comment`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Jack Michael', 'Bangladesh', 'Duis ac est tincidunt, bibendum eros attendato, dignissim purus.Nunc posuere ornare velitbon, bibendum venenatis metus bibendum admora. Aliquam at vestibulum.', '1726064978.png', '2024-09-11 08:07:45', '2024-09-11 08:29:39'),
(2, 'Mateo Daniel', 'Indonesia', 'I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.', '1726064918.png', '2024-09-11 08:07:45', '2024-09-11 08:28:39'),
(3, 'Liam Nohkan', 'Istanbul', 'I love Tour! This is an amazing service and it has saved me and my small business so much time. I plan to use it for a long time to come. And i travel with TripRex again', '1726064900.png', '2024-09-11 08:07:45', '2024-09-11 08:28:21'),
(4, 'Jack Michael', 'Bangladesh', 'Duis ac est tincidunt, bibendum eros attendato, dignissim purus.Nunc posuere ornare velitbon, bibendum venenatis metus bibendum admora. Aliquam at vestibulum.', '1726064885.png', '2024-09-11 08:07:45', '2024-09-11 08:28:06'),
(5, 'Mateo Daniel', 'Indonesia', 'I cannot express enough how satisfied I am with the web development services provided by Egens Lab. From the initial consultation to the final delivery, they have exceeded.', '1726064846.png', '2024-09-11 08:07:45', '2024-09-11 08:27:27'),
(6, 'Liam Nohkan', 'Istanbul', 'I love Tour! This is an amazing service and it has saved me and my small business so much time. I plan to use it for a long time to come. And i travel with TripRex again', '1726064829.png', '2024-09-11 08:07:45', '2024-09-11 08:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `tour_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_seat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `package_id`, `tour_start_date`, `tour_end_date`, `booking_end_date`, `total_seat`, `created_at`, `updated_at`) VALUES
(1, 5, '2024-09-27', '2024-09-30', '2024-09-19', NULL, '2024-09-13 10:41:08', '2024-09-13 10:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending, 1=active, 2=suspended',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `password`, `phone`, `country`, `address`, `state`, `city`, `zip`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asikul Islam Sazzat', 'sazzat@gmail.com', 'default.jpg', '$2y$12$BZ5t/pXzMLSaAoqzF0XaguMChvndf5.ft0u78NJpvaC93zWAvnSu2', '01518347975', 'Bangladesh', 'Choumatha,Barishal', 'Barishal', 'Barishal', '8200', '', '1', '2024-09-13 07:58:44', '2024-09-13 08:11:09'),
(2, 'John Doe', 'john@gmail.com', 'default.jpg', '$2y$12$9nk11ikGBGuav7PzcVl96OurHJtYbsnvq1aSXYLvIA.oB6ucuZm2m', NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '2024-09-13 08:27:12', '2024-09-13 08:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `welcome_items`
--

CREATE TABLE `welcome_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Show','Hide') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welcome_items`
--

INSERT INTO `welcome_items` (`id`, `heading`, `description`, `button_name`, `button_link`, `photo`, `video`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to TripRex', 'At TripSummit, our mission is to turn travel dreams into reality by providing personalized and memorable experiences. We leverage our expertise and trusted partners to ensure every trip is seamless and enjoyable. <br>We believe travel fosters personal growth and cultural understanding. Our goal is to help clients explore new destinations and connect with diverse cultures. We promote sustainable travel to positively impact communities and preserve our planet’s beauty.', 'Read More', '#', 'default.png', 'S4DI3Bve_bQ', 'Show', '2024-09-11 08:07:45', '2024-09-11 08:07:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_items`
--
ALTER TABLE `about_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_tour_id_foreign` (`tour_id`),
  ADD KEY `bookings_package_id_foreign` (`package_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact_items`
--
ALTER TABLE `contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_items`
--
ALTER TABLE `counter_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_photos`
--
ALTER TABLE `destination_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_photos_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `destination_videos`
--
ALTER TABLE `destination_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_videos_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_items`
--
ALTER TABLE `home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `message_comments`
--
ALTER TABLE `message_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_comments_message_id_foreign` (`message_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `package_amenities`
--
ALTER TABLE `package_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_amenities_package_id_foreign` (`package_id`),
  ADD KEY `package_amenities_amenity_id_foreign` (`amenity_id`);

--
-- Indexes for table `package_faqs`
--
ALTER TABLE `package_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_faqs_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_itineraries`
--
ALTER TABLE `package_itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_itineraries_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_photos`
--
ALTER TABLE `package_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_photos_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_videos`
--
ALTER TABLE `package_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_videos_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_package_id_foreign` (`package_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_privacy_items`
--
ALTER TABLE `term_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_package_id_foreign` (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `welcome_items`
--
ALTER TABLE `welcome_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_items`
--
ALTER TABLE `about_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_items`
--
ALTER TABLE `contact_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter_items`
--
ALTER TABLE `counter_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination_photos`
--
ALTER TABLE `destination_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destination_videos`
--
ALTER TABLE `destination_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_items`
--
ALTER TABLE `home_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_comments`
--
ALTER TABLE `message_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_amenities`
--
ALTER TABLE `package_amenities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_faqs`
--
ALTER TABLE `package_faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_itineraries`
--
ALTER TABLE `package_itineraries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_photos`
--
ALTER TABLE `package_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_videos`
--
ALTER TABLE `package_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `term_privacy_items`
--
ALTER TABLE `term_privacy_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `welcome_items`
--
ALTER TABLE `welcome_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_photos`
--
ALTER TABLE `destination_photos`
  ADD CONSTRAINT `destination_photos_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `destination_videos`
--
ALTER TABLE `destination_videos`
  ADD CONSTRAINT `destination_videos_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_comments`
--
ALTER TABLE `message_comments`
  ADD CONSTRAINT `message_comments_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_amenities`
--
ALTER TABLE `package_amenities`
  ADD CONSTRAINT `package_amenities_amenity_id_foreign` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_amenities_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_faqs`
--
ALTER TABLE `package_faqs`
  ADD CONSTRAINT `package_faqs_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_itineraries`
--
ALTER TABLE `package_itineraries`
  ADD CONSTRAINT `package_itineraries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_photos`
--
ALTER TABLE `package_photos`
  ADD CONSTRAINT `package_photos_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_videos`
--
ALTER TABLE `package_videos`
  ADD CONSTRAINT `package_videos_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
