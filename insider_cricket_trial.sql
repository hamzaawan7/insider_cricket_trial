-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 09:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insider_cricket_trial`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_01_173538_create_teams_table', 1),
(4, '2019_03_01_174922_create_players_table', 1),
(5, '2019_03_01_203932_create_matches_table', 1),
(6, '2019_03_01_211212_create_tournaments_table', 1),
(7, '2019_03_01_211230_create_venues_table', 1),
(8, '2019_03_01_211302_add_relations_matches_table', 1),
(9, '2019_03_01_211832_create_countries_table', 1),
(10, '2019_03_01_213335_add_relation_tournaments_table', 1),
(11, '2019_03_01_215241_create_categories_table', 1),
(12, '2019_03_01_215305_create_player_roles_table', 1),
(13, '2019_03_01_215324_create_batting_styles_table', 1),
(14, '2019_03_01_215341_create_bowling_styles_table', 1),
(15, '2019_03_01_215722_add_relation_teams_table', 1),
(16, '2019_03_01_215734_add_relation_players_table', 1),
(17, '2019_03_01_215948_add_relation_tournaments_2_table', 1),
(18, '2019_03_01_220947_add_field_countries_table', 1),
(19, '2019_03_01_230300_add_field_teams_table', 1),
(20, '2019_03_01_232513_add_relation_teams_2_table', 1),
(21, '2019_03_01_232903_add_relation_venues_table', 1),
(22, '2019_03_01_233544_remove_image_players_table', 1),
(23, '2019_03_01_234500_add_relation_players_2_table', 1),
(24, '2019_03_01_235517_add_field_players_table', 1),
(25, '2019_03_02_010429_change_short_name_players_table', 1),
(26, '2019_03_02_011210_create_match_statuses_table', 1),
(27, '2019_03_02_011336_add_relation_matches_table', 1),
(28, '2019_03_02_013518_create_match_innings_table', 1),
(29, '2019_03_02_015655_create_match_inning_batsmen_table', 1),
(30, '2019_03_02_015929_create_match_inning_bowlers_table', 1),
(31, '2019_03_02_015944_create_match_inning_extras_table', 1),
(32, '2019_03_02_020320_create_match_inning_fows_table', 1),
(33, '2019_03_02_022514_create_match_inning_partnerships_table', 1),
(34, '2019_03_02_100847_create_standings_table', 1),
(35, '2019_03_02_101504_add_field_match_innings_batsmen_table', 1),
(36, '2019_03_02_101725_add_field_match_innings_bowlers_table', 1),
(37, '2019_03_02_113206_remove_rank_standings_table', 1),
(38, '2019_03_02_123224_add_winner_team_id_matches_table', 1),
(39, '2019_03_02_123504_add_winner_team_id_matche_innings_table', 1),
(40, '2019_03_02_145354_add_has_bowled_previous_over_match_inning_bowlers_table', 1),
(41, '2019_03_02_145541_change_has_bowled_previous_over_match_inning_bowlers_table', 1),
(42, '2019_03_02_151711_change_fields_match_inning_partnerships_table', 1),
(43, '2019_03_02_153959_change_fields_match_inning_extras_table', 1),
(44, '2019_03_02_160201_change_fields_match_inning_bb_table', 1),
(45, '2019_03_02_200813_add_field_matches_table', 1),
(46, '2019_03_02_201105_add_field_match_innings_table', 1),
(47, '2019_03_02_210847_add_bowling_rate_match_innings_table', 1),
(48, '2019_03_02_213718_add_current_extra_record_id_match_innings_table', 1),
(49, '2019_03_02_233228_change_field_match_inning_bowlers_table', 1),
(50, '2019_03_03_005439_add_field_non_strike_match_innings_table', 1),
(51, '2019_03_03_043815_change_default_values_match_inning_fows_table', 1),
(52, '2019_03_03_055058_add_has_batted_match_inning_batsmen_table', 2),
(53, '2019_03_03_065109_add_batting_order_match_inning_batsmen_table', 3),
(54, '2019_03_03_065555_change_batting_order_match_inning_batsmen_table', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
