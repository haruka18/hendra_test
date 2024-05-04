-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2024 pada 03.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hendra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `companies`
--

INSERT INTO `companies` (`id`, `nama`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'PT XYZ', NULL, '2024-05-03 12:01:48', '2024-05-03 12:01:48'),
(4, 'PT XYZ 1', 1, '2024-05-03 12:08:57', '2024-05-03 16:52:06'),
(5, 'PT XYZ 2', 1, '2024-05-03 12:09:03', '2024-05-03 16:52:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_03_163444_roles', 1),
(6, '2024_05_03_164019_companies', 1),
(9, '2024_05_03_225615_add_field_role_id_and_company_id_on_users_table', 2),
(10, '2024_05_03_234259_add_field_parent_id_on_companies_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', '2024-05-03 11:03:10', '2024-05-03 11:23:15'),
(9, 'Admin', 'admin', '2024-05-03 16:33:39', '2024-05-03 16:33:39'),
(10, 'Supervisor', 'supervisor', '2024-05-03 16:33:53', '2024-05-03 16:33:53'),
(11, 'Manager', 'manager', '2024-05-03 16:33:59', '2024-05-03 16:33:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `company_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hendra purnomo', 'hendrapurnomo39@gmail.com', 1, 1, NULL, '$2y$10$fFqPFiJGICRf9kqBnGZQzu60iBUehLpcKWRTJP5fszwmZ5dRt5lVe', NULL, '2024-05-03 09:43:23', '2024-05-03 18:00:38'),
(6, 'admin', 'admin@gmail.com', 5, 5, NULL, '$2y$10$dbes/sA1O8D4ATLDjGSVx.sjVh3XAbeo.YxeiaSrDV1iR5lsB07oe', NULL, '2024-05-03 12:47:54', '2024-05-03 12:47:54'),
(7, 'manager', 'manager@gmail.com', 11, 1, NULL, '$2y$10$517rcqrNX9nMkLMgl2LXfOWNxYV8g0JMyC2O9BFHrAakmyswmokZO', NULL, '2024-05-03 12:48:48', '2024-05-03 16:34:52'),
(8, 'supervisor XYZ 1', 'supervisor@gmail.com', 10, 4, NULL, '$2y$10$xddRH9qXgYKbQ0sYp8brL.Cb4Earl9dwp.B.y6ptrDnVM3AwjJUPu', NULL, '2024-05-03 12:48:59', '2024-05-03 16:35:22'),
(10, 'supervisor XYZ 2', 'admin2@gmail.com', 10, 5, NULL, '$2y$10$9CxO0//p8CkMNQ4TzBanzOfoL8RDg3VkmaCz/quKjIu5w5ahsYtoe', NULL, '2024-05-03 16:21:19', '2024-05-03 16:35:43'),
(11, 'bay', 'bayuprakosow@gmail.com', 1, 1, NULL, '$2y$10$5ii1onSgWUfvT/mz70qMw.5UdXAO.cTkIjxBqDqAmUExNz.MXuUBe', NULL, '2024-05-03 16:31:23', '2024-05-03 16:31:23'),
(12, 'karyawan 1 XYZ 1', 'karyawan@gmail.com', 9, 4, NULL, '$2y$10$Nbubhg5IrEIsq9YRzBmpl.i2zDCrJhNYgEN15gh6P75HWAOAtJ0fS', NULL, '2024-05-03 16:36:59', '2024-05-03 16:36:59'),
(14, 'karyawan 2 XYZ 1', 'karyawan2@gmail.com', 9, 4, NULL, '$2y$10$lcMVGChJjIp8zdTJ99f9DOjySZ8SKa6cYeBzDephiVjsQ5ogJp0r.', NULL, '2024-05-03 16:38:10', '2024-05-03 16:38:10'),
(15, 'karyawan 1 XYZ', 'karyawan1xyz@gmail.com', 9, 1, NULL, '$2y$10$SYjYvWCcsojq0kFdLTun6OGQsOszKSQ4G93Dokb66SyZwKRjaYuk2', NULL, '2024-05-03 16:39:22', '2024-05-03 16:39:22'),
(16, 'karyawan 2 XYZ', 'karyawan2XYZ@gmail.com', 9, 1, NULL, '$2y$10$Yn1u4cU7QBmQFjR2Tg0i9.tB7TH/xrgwhoenfcubq4pWiM7fsv0k.', NULL, '2024-05-03 16:40:17', '2024-05-03 16:40:17'),
(17, 'karyawan 1 XYZ 2', 'karyawan1XYZ2@gmail.com', 9, 5, NULL, '$2y$10$3JShxjUBYhPdP118HhNVzuDXH8BEsDoGznU8rNs9X5gruVQoaUrva', NULL, '2024-05-03 16:41:18', '2024-05-03 16:41:18'),
(18, 'karyawan 2 XYZ 2', 'karyawan2xyz2@gmail.com', 9, 5, NULL, '$2y$10$izO6ft0EhasUbyeqGs0DSuvzHgQxkRSecQndRgA.PJ12JtozUmH2G', NULL, '2024-05-03 16:41:47', '2024-05-03 16:41:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
