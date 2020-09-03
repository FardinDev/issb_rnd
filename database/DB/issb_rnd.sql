-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 08:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issb_rnd`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_division` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_district` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parmanent_address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parmanent_division` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parmanent_district` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height_in_meter` double(8,2) DEFAULT NULL,
  `weight_in_kg` double(8,2) DEFAULT NULL,
  `built` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complexion` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_occupation` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monthly_income` int(11) DEFAULT 0,
  `maritaial_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caste_or_tribe` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_tounge` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hobby` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visit_abroad` tinyint(1) NOT NULL DEFAULT 0,
  `physical_or_mental_disease` tinyint(1) NOT NULL DEFAULT 0,
  `preparation_of_issb` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `previous_result_in_issb` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `break_of_study` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_school` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_college` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_last_college_or_university` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `standard_of_college_or_university` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accademic_qualification` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_of_passing` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `standard_of_academic_attainments` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HSC` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduate` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masters` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_present_organization` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_curricular_activities` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_educational_qualification` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_profession` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_professional_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_average_monthly_income` int(11) DEFAULT 0,
  `father_last_professional_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_educational_qualification` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_profession` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_professional_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_average_monthly_income` int(11) DEFAULT 0,
  `mother_last_professional_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parental_relation_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relation_with_guardian` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_profession` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_professional_status` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_average_monthly_income` int(11) DEFAULT 0,
  `family_monthly_income` int(11) DEFAULT 0,
  `number_of_brother` int(11) DEFAULT 0,
  `number_of_sister` int(11) DEFAULT 0,
  `number_of_step_brother` int(11) DEFAULT 0,
  `number_of_step_sister` int(11) DEFAULT 0,
  `total_number_of_sibling` int(11) DEFAULT 0,
  `sibling_order` int(11) DEFAULT 0,
  `social-status_of_family` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issb_data`
--

CREATE TABLE `issb_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `board_no` int(11) DEFAULT NULL,
  `chest_no` int(11) DEFAULT NULL,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psy_bpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psy_tpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gto_bpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gto_tpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_bpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_tpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_tpq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_marks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psy_initial_grades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gto_initial_grades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_initial_grades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_grades_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_and_initial_grades_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_case` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ops` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `migrated_from_original_course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gto_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `president_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_17_050702_create_permission_tables', 1),
(4, '2020_02_17_053836_create_posts_table', 1),
(5, '2020_02_17_054928_add_image_to_posts_table', 1),
(6, '2020_02_17_061855_create_comments_table', 1),
(7, '2020_02_17_081937_add_phone_to_users_table', 1),
(8, '2020_02_18_053933_add_extra_info_to_users_table', 1),
(9, '2020_02_18_071911_modify_info_to_posts_table', 1),
(10, '2020_02_18_072555_add_email_to_users_table', 1),
(11, '2020_02_20_160811_create_thanas_table', 1),
(12, '2020_02_20_164318_add_info_to_users_table', 1),
(13, '2020_02_23_112341_add_level_to_users_table', 1),
(14, '2020_02_23_121043_create_thana_users_table', 1),
(15, '2020_02_23_154528_add_info_to_posts_table', 1),
(16, '2020_02_26_161314_create_notifications_table', 1),
(18, '2020_08_11_161109_create_candidates_table', 2),
(19, '2020_08_28_231316_create_issb_data_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add-users', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(2, 'view-users', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(3, 'edit-users', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(4, 'delete-users', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(5, 'add-roles', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(6, 'view-roles', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(7, 'edit-roles', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(8, 'delete-roles', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(9, 'assign-roles', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(10, 'add-info', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(11, 'view-info', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(12, 'edit-info', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(13, 'delete-info', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(14, 'view-report', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(15, 'export-report', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `thana_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `location` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Title',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `long` decimal(10,7) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `is_confidential` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(2, 'admin', 'web', '2020-08-11 08:29:56', '2020-08-11 08:29:56'),
(3, 'observer', 'web', '2020-08-11 08:29:57', '2020-08-11 08:29:57'),
(4, 'oparator', 'web', '2020-08-11 08:29:57', '2020-08-11 08:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 4),
(13, 1),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `isEnabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thana_users`
--

CREATE TABLE `thana_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `thana_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `works_at` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/default-user-image.png',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `gender`, `dob`, `designation`, `works_at`, `is_enable`, `avatar`, `active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fardin Rahman', '01795514777', 'koushikfardin@gmail.com', NULL, NULL, NULL, NULL, 1, 'images/default-user-image.png', 1, NULL, '$2y$10$b.27rk7MYcjwyOfEWneqf.yUKzJ0/gnFMXCrkm35Ir16xDjy1858a', NULL, '2020-08-11 08:30:43', '2020-08-11 08:30:43'),
(2, 'Fardin Rahman', '01795589778', 'admin@admin.com', 'male', '05-08-2020', '-', 'Dhaka, ISSB', 1, 'images/default-user-image.png', 1, NULL, '$2y$10$VSwZtPu0mCl4vofzluu00OotD4IOWVKf8bUSVplwgW/HdihkuPAhe', NULL, '2020-08-11 09:55:48', '2020-08-11 09:55:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `issb_data`
--
ALTER TABLE `issb_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issb_data_candidate_id_foreign` (`candidate_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_thana_id_foreign` (`thana_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thanas_unique_id_unique` (`unique_id`);

--
-- Indexes for table `thana_users`
--
ALTER TABLE `thana_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thana_users_user_id_foreign` (`user_id`),
  ADD KEY `thana_users_thana_id_foreign` (`thana_id`);

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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issb_data`
--
ALTER TABLE `issb_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thana_users`
--
ALTER TABLE `thana_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `issb_data`
--
ALTER TABLE `issb_data`
  ADD CONSTRAINT `issb_data_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_thana_id_foreign` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thana_users`
--
ALTER TABLE `thana_users`
  ADD CONSTRAINT `thana_users_thana_id_foreign` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`),
  ADD CONSTRAINT `thana_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
