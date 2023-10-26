-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 12:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$KJ7ROWO8jlewPE.rxIh4w.rKbULtODnolnfuQf9nxqeuzQR4FQUeq', 'admin', NULL, NULL, '2023-10-01 05:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `visitor_website` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `visitor_name`, `visitor_email`, `visitor_website`, `body`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Camden Bernard', 'zubi@mailinator.com', 'https://www.sejyqoluvida.us', 'Deserunt culpa aliqu', 66, '2023-10-23 00:57:46', '2023-10-23 00:57:46'),
(2, 'Dakota Arnold', 'wucek@mailinator.com', 'https://www.jiroci.net', 'Eos molestiae volupt', 66, '2023-10-23 02:46:05', '2023-10-23 02:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_09_22_171441_create_posts_table', 1),
(17, '2023_09_24_143536_add_user_id_to_posts', 1),
(18, '2023_09_26_190116_create_admins_table', 2),
(21, '2023_10_20_143355_create_comments_table', 3),
(22, '2023_10_20_162906_create_replies_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('shuvo@gmail.com', '$2y$10$OcWqdTbeN5PSdzXCTugr5eg6GB8T6InZexBtIZEO5gucRRgQLCJhq', '2023-10-24 00:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `user_id`, `post_status`, `user_type`, `author_name`) VALUES
(47, 'bbbb quibusdam corpo', 'Reprehenderit sunt', '651ba85e402fa.png', '2023-10-02 23:36:30', '2023-10-03 05:04:56', 1, 'active', 'user', 'Mr. blog'),
(48, 'adminSunt fugit aspernat', 'adminReprehenderit quod o', '651bdcc7c3143.png', '2023-10-02 23:36:45', '2023-10-10 22:51:47', 1, 'active', 'user', 'Mr. blog'),
(49, 'Rerum sed quia sunt', 'Esse omnis deserunt', '651ba89d88901.png', '2023-10-02 23:37:33', '2023-10-14 04:18:10', 2, 'active', 'user', 'shuvo'),
(50, 'Veniam qui cupidata', 'Reiciendis aut velit', '651ba8ac86e8d.png', '2023-10-02 23:37:48', '2023-10-14 04:17:59', 2, 'active', 'user', 'shuvo'),
(51, 'Quas ad veniam maxi', 'Laborum quae officia', '651ba8f96c0fc.png', '2023-10-02 23:39:05', '2023-10-03 05:26:16', 1, 'active', 'admin', 'Admin'),
(52, 'Ducimus qui quis re', 'Ratione in ut cum te', '651ba909b1ffc.png', '2023-10-02 23:39:21', '2023-10-02 23:39:21', 1, 'active', 'admin', 'Admin'),
(53, 'Sunt dolor adipisici', 'Placeat sit qui in', '651bb4e157837.png', '2023-10-03 00:29:53', '2023-10-14 04:18:49', 1, 'active', 'admin', 'Admin'),
(55, 'Vel inventore deseru', 'Cumque est quis ali', '651bf5e4ce872.png', '2023-10-03 05:07:16', '2023-10-14 04:18:44', 1, 'active', 'admin', 'Admin'),
(56, 'Dolor excepturi vero', 'Ut in quo facere id', '651bf5fe4136c.png', '2023-10-03 05:07:42', '2023-10-21 07:03:09', 1, 'active', 'admin', 'Admin'),
(58, 'Enim quibusdam corpo', 'Reprehenderit sunt', '651ba85e402fa.png', '2023-10-02 23:36:30', '2023-10-03 05:04:56', 1, 'active', 'user', 'Mr. blog'),
(59, 'Enim quibusdam corpo', 'Reprehenderit sunt', '651ba85e402fa.png', '2023-10-02 23:36:30', '2023-10-03 05:04:56', 1, 'active', 'user', 'Mr. blog'),
(60, 'Rerum sed quia sunt', 'Esse omnis deserunt', '651ba89d88901.png', '2023-10-02 23:37:33', '2023-10-14 04:18:14', 2, 'active', 'user', 'shuvo'),
(61, 'Veniam qui cupidata', 'Reiciendis aut velit', '651ba8ac86e8d.png', '2023-10-02 23:37:48', '2023-10-14 04:18:04', 2, 'active', 'user', 'shuvo'),
(62, 'Quas ad veniam maxi', 'Laborum quae officia', '651ba8f96c0fc.png', '2023-10-02 23:39:05', '2023-10-03 05:26:16', 1, 'active', 'admin', 'Admin'),
(63, 'Ducimus qui quis re', 'Ratione in ut cum te', '651ba909b1ffc.png', '2023-10-02 23:39:21', '2023-10-02 23:39:21', 1, 'active', 'admin', 'Admin'),
(64, 'Sunt dolor adipisici', 'Placeat sit qui in', '651bb4e157837.png', '2023-10-03 00:29:53', '2023-10-03 00:29:53', 1, 'active', 'admin', 'Admin'),
(65, 'Vel inventore deseru', 'Cumque est quis ali', '651bf5e4ce872.png', '2023-10-03 05:07:16', '2023-10-14 04:18:46', 1, 'active', 'admin', 'Admin'),
(66, 'aaaalor excepturi vero', 'Ut in quo facere id', '651bf5fe4136c.png', '2023-10-03 05:07:42', '2023-10-14 04:18:42', 1, 'active', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `visitor_website` varchar(255) NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `visitor_name`, `visitor_email`, `visitor_website`, `comment_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Giselle Marshall', 'dabojaby@mailinator.com', 'https://www.raj.mobi', 1, 'Quos rerum explicabo', '2023-10-23 00:57:55', '2023-10-23 00:57:55'),
(2, 'Giselle Pearson', 'ruzuco@mailinator.com', 'https://www.hunusesigegavuz.cm', 1, 'Enim ut saepe ut sae', '2023-10-23 00:58:04', '2023-10-23 00:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. blog', 'blog@gmail.com', NULL, '$2y$10$8EO.O8Ir.r6UjcrmJmL2ruDA9PvbWZnldtYUmDVkrq9UfwniDdtBu', 'user', 'IS88w4CnFr7dVVwmO3xOF67h5nfxK76hunEMtWrkHtfLmemJyigohAPjMdoR', '2023-09-25 06:45:53', '2023-09-25 06:45:53'),
(2, 'shuvo', 'shuvo@gmail.com', NULL, '$2y$10$iYuQE/ys6uR3009phe1FEOMUtjN5hp4zuwA6nP2J2Gh4j96cwZa7O', 'user', NULL, '2023-09-25 06:46:20', '2023-09-25 06:46:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
