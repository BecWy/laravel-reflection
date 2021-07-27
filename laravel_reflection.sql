-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 06:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_reflection`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `logo`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Daugherty and Sons', 'xbosco@farrell.com', 'https://via.placeholder.com/200x200.png/00aa00?text=ut', 'leannon.net', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(2, 'Torphy, Hauck and Rohan', 'psenger@towne.info', 'https://via.placeholder.com/200x200.png/004488?text=qui', 'kutch.com', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(3, 'Bradtke-Stoltenberg', 'verla.hackett@metz.biz', 'https://via.placeholder.com/200x200.png/00cc55?text=animi', 'bednar.org', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(4, 'Bogisich PLC', 'leila16@ankunding.com', 'https://via.placeholder.com/200x200.png/00ffbb?text=reprehenderit', 'roberts.net', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(5, 'Rutherford Inc', 'nhartmann@yost.com', 'https://via.placeholder.com/200x200.png/00ff22?text=ipsa', 'beatty.org', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(6, 'Bayer-Hudson', 'nikita18@grimes.org', 'https://via.placeholder.com/200x200.png/0055ee?text=enim', 'sawayn.org', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(7, 'Harber Group', 'darren.breitenberg@fritsch.com', 'https://via.placeholder.com/200x200.png/00cc88?text=modi', 'pouros.net', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(8, 'Boehm LLC', 'eric.hills@hegmann.com', 'https://via.placeholder.com/200x200.png/003300?text=soluta', 'klocko.com', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(9, 'Hintz-Bartoletti', 'vernie.wyman@hirthe.com', 'https://via.placeholder.com/200x200.png/0022bb?text=odio', 'pacocha.com', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(10, 'Crooks, Treutel and Dickinson', 'ward.margaretta@renner.com', 'https://via.placeholder.com/200x200.png/00ee55?text=veritatis', 'bayer.info', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(11, 'Haag-Bednar', 'jack.raynor@rath.biz', 'https://via.placeholder.com/200x200.png/0044aa?text=deleniti', 'connelly.net', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(12, 'A Company With Lots Of Employees', 'genevieve99@schumm.com', 'https://via.placeholder.com/200x200.png/0000cc?text=minus', 'reichert.org', '2021-07-27 15:01:52', '2021-07-27 15:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `company_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Elijah', 'Kris', 1, 'chloe70@example.com', '949-306-2309', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(2, 'Garett', 'Prosacco', 2, 'barney.kemmer@example.org', '+1-820-545-3048', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(3, 'Victor', 'Runolfsdottir', 3, 'aabbott@example.net', '+1-940-631-9720', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(4, 'Melba', 'Conroy', 4, 'wilford89@example.org', '320.520.6850', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(5, 'Tianna', 'Haley', 5, 'sschroeder@example.org', '+1-585-825-1613', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(6, 'Hoyt', 'Denesik', 6, 'sammy.legros@example.org', '+1-779-489-0580', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(7, 'Meda', 'Langworth', 7, 'gottlieb.gardner@example.org', '385.798.7371', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(8, 'Warren', 'Effertz', 8, 'hope.schumm@example.com', '347.387.8272', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(9, 'Betsy', 'Schneider', 9, 'hartmann.corene@example.net', '(737) 293-3396', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(10, 'Emmett', 'Vandervort', 10, 'anais03@example.org', '+18472448142', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(11, 'Molly', 'Doyle', 11, 'justus.corwin@example.com', '+1.727.769.4402', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(12, 'Shyanne', 'Swaniawski', 12, 'padberg.dannie@example.com', '1-747-833-6780', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(13, 'Theresia', 'Bashirian', 12, 'lernser@example.org', '+1-239-665-7890', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(14, 'Gennaro', 'Walsh', 12, 'pfeffer.lura@example.com', '(984) 963-5716', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(15, 'Itzel', 'Wunsch', 12, 'breanna99@example.com', '478-250-1140', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(16, 'Bettye', 'Thiel', 12, 'camilla.altenwerth@example.org', '+1-941-691-3886', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(17, 'Broderick', 'Wyman', 12, 'towne.kathryn@example.net', '+1 (484) 634-5811', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(18, 'Richard', 'Kiehn', 12, 'sallie14@example.com', '+1-870-540-5215', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(19, 'Bethel', 'Boehm', 12, 'braxton05@example.org', '+1-239-836-3737', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(20, 'Gilberto', 'Watsica', 12, 'donavon85@example.org', '+1-336-843-1323', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(21, 'Joy', 'Goyette', 12, 'ziemann.deion@example.net', '1-228-516-7430', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(22, 'Priscilla', 'King', 12, 'shields.leland@example.com', '732-702-5829', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(23, 'Eugene', 'Crona', 12, 'ggleason@example.com', '726.892.5769', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(24, 'Rhea', 'Hegmann', 12, 'armani75@example.org', '1-458-280-9375', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(25, 'Roderick', 'Ortiz', 12, 'clifford.rogahn@example.com', '949-769-1370', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(26, 'Dana', 'Brakus', 12, 'bartoletti.addie@example.com', '1-219-201-6790', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(27, 'Rosalind', 'Kertzmann', 12, 'jkuvalis@example.com', '+1-440-246-4469', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(28, 'Benedict', 'Moen', 12, 'tturner@example.com', '+1-580-320-4038', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(29, 'Jamie', 'Gaylord', 12, 'gabernathy@example.net', '(626) 350-1181', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(30, 'Yasmine', 'Littel', 12, 'gia58@example.org', '952.735.4718', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(31, 'Bonnie', 'Murphy', 12, 'tbauch@example.net', '(508) 704-6714', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(32, 'Karlie', 'Cronin', 12, 'abraham.schmitt@example.com', '910-683-2942', '2021-07-27 15:01:52', '2021-07-27 15:01:52'),
(33, 'Sister', 'Pfannerstill', 12, 'evalyn18@example.net', '904.376.4973', '2021-07-27 15:01:52', '2021-07-27 15:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_12_102041_create_companies_table', 1),
(5, '2021_07_13_101724_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'admin@admin.com', '2021-07-27 15:01:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rBNVkKpSY28mclqBqx74JTTqjnB4MPhNNCZGHk8n8H59neNhnnINIEKGPCQR', '2021-07-27 15:01:52', '2021-07-27 15:01:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_name_unique` (`name`),
  ADD UNIQUE KEY `companies_logo_unique` (`logo`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD UNIQUE KEY `companies_website_unique` (`website`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD KEY `employees_company_id_foreign` (`company_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
