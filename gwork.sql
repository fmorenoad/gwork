-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-11-2020 a las 20:18:24
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project-managment`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refresource_id` bigint(20) NOT NULL DEFAULT '0',
  `cost` double(8,2) NOT NULL,
  `unit_of_money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `execution_date` date NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(337, '2014_10_12_000000_create_users_table', 1),
(338, '2014_10_12_100000_create_password_resets_table', 1),
(339, '2019_08_19_000000_create_failed_jobs_table', 1),
(340, '2020_09_17_184512_create_resources_table', 1),
(341, '2020_09_23_144354_create_works_table', 1),
(342, '2020_09_23_145517_create_costs_table', 1),
(343, '2020_09_23_145603_create_refworks_table', 1),
(344, '2020_09_24_205754_create_reffrequencies_table', 1),
(345, '2020_09_24_215102_create_refhighways_table', 1),
(346, '2020_09_24_221613_create_refroutes_table', 1),
(347, '2020_09_24_223246_create_refdirections_table', 1),
(348, '2020_09_24_224446_create_reforigins_table', 1),
(349, '2020_09_25_000025_create_refresources_table', 1),
(350, '2020_10_02_211830_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3),
(4, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'works.index', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(2, 'works.show', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(3, 'works.create', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(4, 'works.edit', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(5, 'works.destroy', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(6, 'works.store', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(7, 'works.update', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(8, 'resources.index', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(9, 'resources.show', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(10, 'resources.create', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(11, 'resources.edit', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(12, 'resources.destroy', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(13, 'resources.store', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(14, 'resources.update', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(15, 'admin.edit', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(16, 'index.reports', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(17, 'index.dashboards', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(18, 'admin.users', 'web', '2020-10-20 22:12:24', '2020-10-20 22:12:25'),
(19, 'admin.costs', 'web', '2020-10-26 12:40:00', '2020-10-26 12:40:01'),
(20, 'admin.costos', 'web', '2020-10-26 16:21:57', '2020-10-26 16:21:57'),
(21, 'admin.permission', 'web', '2020-10-26 16:24:14', '2020-10-26 16:24:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refdirections`
--

CREATE TABLE `refdirections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refdirections`
--

INSERT INTO `refdirections` (`id`, `direction`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Oriente', 'Sur a Norte', '2020-10-01 18:52:35', '2020-10-01 18:53:03'),
(2, 'Poniente', 'Norte a Sur', '2020-10-01 18:52:43', '2020-10-01 18:52:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reffrequencies`
--

CREATE TABLE `reffrequencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reffrequencies`
--

INSERT INTO `reffrequencies` (`id`, `frequency`, `created_at`, `updated_at`) VALUES
(1, 'Diaria', '2020-10-01 18:42:17', '2020-10-01 18:42:44'),
(2, 'Semanal', '2020-10-01 18:42:24', '2020-10-01 18:42:24'),
(3, 'Mensual', '2020-10-01 18:42:30', '2020-10-01 18:42:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refhighways`
--

CREATE TABLE `refhighways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `highway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refhighways`
--

INSERT INTO `refhighways` (`id`, `highway`, `created_at`, `updated_at`) VALUES
(1, 'Urbano', '2020-10-01 18:43:44', '2020-10-01 18:44:00'),
(2, 'Interurbano', '2020-10-01 18:43:47', '2020-10-01 18:43:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reforigins`
--

CREATE TABLE `reforigins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reforigins`
--

INSERT INTO `reforigins` (`id`, `origin`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rutinario', NULL, '2020-10-01 18:53:19', '2020-10-01 18:53:19'),
(2, 'Mantención', NULL, '2020-10-01 18:53:23', '2020-10-01 18:53:23'),
(3, 'Minuta de Fiscalización', NULL, '2020-10-01 18:53:33', '2020-10-01 18:53:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refresources`
--

CREATE TABLE `refresources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refresources`
--

INSERT INTO `refresources` (`id`, `type`, `code`, `resource`, `unit`, `observation`, `created_at`, `updated_at`) VALUES
(1, 'equipment', NULL, 'Arriendo Motobomba de 2 pulgadas, incluye combustible', 'día', NULL, '2020-10-15 14:42:08', '2020-10-15 14:42:08'),
(2, 'equipment', NULL, 'Arriendo Generador de 6 kva mínimo, incluye combustible', 'día', NULL, '2020-10-15 14:42:18', '2020-10-15 14:42:18'),
(3, 'equipment', NULL, 'Arriendo Soldadora eléctrica tipo Indura', 'día', NULL, '2020-10-15 14:42:26', '2020-10-15 14:42:26'),
(4, 'material', NULL, 'Señales ≤ 1,0 m2', 'Número', NULL, '2020-10-15 14:42:40', '2020-10-15 14:42:40'),
(5, 'material', NULL, 'Señales > 1,0 m2 y ≤ 3m2', 'Número', NULL, '2020-10-15 14:42:48', '2020-10-15 14:42:48'),
(6, 'material', NULL, 'Señales > 3 m2 y ≤ 5m2', 'Número', NULL, '2020-10-15 14:42:55', '2020-10-15 14:42:55'),
(7, 'material', NULL, 'Señales > 5 m2', 'Número', NULL, '2020-10-15 14:43:07', '2020-10-15 14:43:07'),
(8, 'material', NULL, 'TOPES VEHICULARES', 'Número', NULL, '2020-10-15 14:43:36', '2020-10-15 14:43:36'),
(9, 'material', NULL, 'TACHAS REFLECTANTES (incluye adhesivo) (Según MCV5 5.705)', 'Número', NULL, '2020-10-15 14:43:43', '2020-10-15 14:43:43'),
(10, 'material', NULL, 'CASETAS PARA PARADEROS DE LOCOMOCIÓN COLECTIVA (PARADERO SIMPLE TIPO Transantiago)', 'Número', NULL, '2020-10-15 14:43:51', '2020-10-15 14:43:51'),
(11, 'material', NULL, 'VALLA PEATONAL (MCV4 4.302.301)', 'metro lineal', NULL, '2020-10-15 14:44:05', '2020-10-15 14:44:05'),
(12, 'material', NULL, 'VALLA ANTIVANDALISMO Y CIERRO (MALLA TIPO ACMAFOR 3D) (Se deben incluir postes)', 'metro cuadrado', NULL, '2020-10-15 14:44:14', '2020-10-15 14:44:14'),
(13, 'material', NULL, 'POSTES OMEGA (3500mm y 3000mm)', 'Número', NULL, '2020-10-15 14:44:22', '2020-10-15 14:44:22'),
(14, 'material', NULL, 'ELEMENTOS REFLECTANTES PARA BARRERAS METÁLICAS (OJOS DE GATO según MCV4 4.302.013 1)', 'Número', NULL, '2020-10-15 14:44:28', '2020-10-15 14:44:28'),
(15, 'material', NULL, 'ELEMENTOS REFLECTANTES PARA BARRERAS HORMIGÓN (OJOS DE GATO según MCV4 4.302.013 2)', 'Número', NULL, '2020-10-15 14:44:34', '2020-10-15 14:44:34'),
(16, 'material', NULL, 'SACOS DE CEMENTO 42,5 KG', 'Número', NULL, '2020-10-15 14:44:40', '2020-10-15 14:44:40'),
(17, 'material', NULL, 'SACOS DE HORMIGÓN PREDOSIFICADO', 'Número', NULL, '2020-10-15 14:44:48', '2020-10-15 14:44:48'),
(18, 'material', NULL, 'PINTURA ACRÍLICA BLANCA PARA DEMARCACIÓN (INCLUYE MICROESFERAS) (según MCV5 5.704)', 'kg', NULL, '2020-10-15 14:44:58', '2020-10-15 14:44:58'),
(19, 'material', NULL, 'SOLERILLAS (100x20x6cm)', 'metro lineal', NULL, '2020-10-15 14:45:04', '2020-10-15 14:45:04'),
(20, 'material', NULL, 'SOLERAS TIPO A', 'metro lineal', NULL, '2020-10-15 14:45:11', '2020-10-15 14:45:11'),
(21, 'human', NULL, 'Equipo de Trabajo Hora Normal', 'hora normal', NULL, NULL, NULL),
(22, 'human', NULL, 'Equipo de Trabajo Hora Extra', 'hora extra', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refroutes`
--

CREATE TABLE `refroutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refroutes`
--

INSERT INTO `refroutes` (`id`, `route`, `created_at`, `updated_at`) VALUES
(1, 'Vía Express', '2020-10-01 18:51:35', '2020-10-01 18:51:35'),
(2, 'Vía Local', '2020-10-01 18:51:41', '2020-10-01 18:51:41'),
(3, 'Acceso', '2020-10-01 18:51:50', '2020-10-01 18:51:50'),
(4, 'Salida', '2020-10-01 18:51:58', '2020-10-01 18:52:09'),
(5, 'Eje Secundario', '2020-10-01 18:52:17', '2020-10-01 18:52:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refworks`
--

CREATE TABLE `refworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refworks`
--

INSERT INTO `refworks` (`id`, `item`, `work`, `unit`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ATU 1', 'Roce y Limpieza de La Faja', 'mes', NULL, '2020-10-01 17:41:33', '2020-10-01 18:43:29'),
(2, 'ATU 2', 'Retiro de Basuras y Desechos', 'mes', NULL, '2020-10-01 17:41:44', '2020-10-01 17:41:44'),
(3, 'ATU 3.1', 'Reparación de Cercos de Alambre de Púas', 'metro lineal', NULL, '2020-10-01 17:42:06', '2020-10-01 17:42:06'),
(4, 'ATU 3.2', 'Reparación de Cercos Especial (Malla Metálica)', 'metro lineal', NULL, '2020-10-01 17:42:22', '2020-10-01 17:42:22'),
(5, 'ATU 3.3', 'Reparación de Cercos Especial (Pandereta)', 'metro lineal', NULL, '2020-10-01 17:43:12', '2020-10-01 17:43:12'),
(6, 'ATU 6', 'Limpieza de Fosos, Contrafosos y Canales', 'metro lineal', NULL, '2020-10-01 17:43:21', '2020-10-01 17:43:21'),
(7, 'ATU 7', 'Limpieza de Alcantarillas y Sifones', 'metro lineal', NULL, '2020-10-01 17:43:31', '2020-10-01 17:43:31'),
(8, 'ATU 8', 'Limpieza de cunetas', 'metro lineal', NULL, '2020-10-01 17:43:41', '2020-10-01 17:43:41'),
(9, 'ATU 10', 'Limpieza de Bajadas de Aguas', 'Número', NULL, '2020-10-01 17:46:28', '2020-10-01 17:46:28'),
(10, 'ATU 10.1', 'Limpieza de Cámaras de Inspección, Tipo \"A\"', 'Número', NULL, '2020-10-01 17:46:41', '2020-10-01 17:46:41'),
(11, 'ATU 10.2', 'Limpieza de Cámaras de Inspección, Tipo \"B\"', 'Número', NULL, '2020-10-01 17:47:05', '2020-10-01 17:47:05'),
(12, 'ATU 10.3', 'Limpieza de Cámaras de Inspección Especial', 'Número', NULL, '2020-10-01 17:47:16', '2020-10-01 17:47:16'),
(13, 'ATU 10.4', 'Reemplazo de Tapas de Cámaras', 'Número', NULL, '2020-10-01 17:47:27', '2020-10-01 17:47:27'),
(14, 'ATU 10.5', 'Reemplazo de Escalines', 'Número', NULL, '2020-10-01 17:47:38', '2020-10-01 17:47:38'),
(15, 'ATU 11.1', 'Reemplazo de Soleras tipo A', 'metro lineal', NULL, '2020-10-01 17:47:51', '2020-10-01 17:47:51'),
(16, 'ATU 11.2', 'Reemplazo de Solerillas', 'metro lineal', NULL, '2020-10-01 17:48:04', '2020-10-01 17:48:04'),
(17, 'ATU 13', 'Reconstrucción de Fosos y Contrafosos', 'metro lineal', NULL, '2020-10-01 17:48:45', '2020-10-01 17:48:45'),
(18, 'ATU 15', 'Sellado de Grietas en Pavimentos Asfálticos', 'metro lineal', NULL, '2020-10-01 17:48:55', '2020-10-01 17:48:55'),
(19, 'ATU 16.1', 'Bacheo Superficial en Pavimentos Asfálticos', 'metro cuadrado', NULL, '2020-10-01 17:49:16', '2020-10-01 17:49:16'),
(20, 'ATU 16.2', 'Bacheo Superficial en Calles de Servicio', 'metro cuadrado', NULL, '2020-10-01 17:59:37', '2020-10-01 17:59:37'),
(21, 'ATU 16.3', 'Bacheo Superficial en Ciclovía', 'metro cuadrado', NULL, '2020-10-01 17:59:50', '2020-10-01 17:59:50'),
(22, 'ATU 17', 'Bacheos en berma', 'metro cuadrado', NULL, '2020-10-01 18:00:03', '2020-10-01 18:00:03'),
(23, 'ATU 17.1', 'Bacheo Profundo en pavimentos asfálticos de Vía Expresa', 'metro cuadrado', NULL, '2020-10-01 18:00:14', '2020-10-01 18:00:14'),
(24, 'ATU 17.2', 'Bacheo Profundo en pavimentos asfálticos de Calles de Servicio', 'metro cuadrado', NULL, '2020-10-01 18:00:34', '2020-10-01 18:00:34'),
(25, 'ATU 20', 'Pintura de Barandas Metálicas', 'metro lineal', NULL, '2020-10-01 18:01:59', '2020-10-01 18:01:59'),
(26, 'ATU 21.1', 'Limpieza de Señales Verticales Laterales', 'metro cuadrado', NULL, '2020-10-01 18:02:13', '2020-10-01 18:02:13'),
(27, 'ATU 21.2', 'Limpieza de Señales Verticales Sobre Calzada', 'metro cuadrado', NULL, '2020-10-01 18:03:43', '2020-10-01 18:03:43'),
(28, 'ATU 22.1', 'Reparación de Señales Verticales Laterales', 'metro cuadrado', NULL, '2020-10-01 18:03:52', '2020-10-01 18:03:52'),
(29, 'ATU 22.2', 'Reparación de Señales Verticales Sobre Calzada', 'metro cuadrado', NULL, '2020-10-01 18:04:03', '2020-10-01 18:04:03'),
(30, 'ATU 23', 'Reacondicionamiento de Postes para Señales Verticales Laterales', 'Número', NULL, '2020-10-01 18:04:13', '2020-10-01 18:04:13'),
(31, 'ATU 24.1', 'Reacondicionamiento de Señales Verticales Laterales', 'Número', NULL, '2020-10-01 18:04:23', '2020-10-01 18:04:23'),
(32, 'ATU 24.2', 'Reacondicionamiento de Señales Verticales Sobre Calzada', 'Número', NULL, '2020-10-01 18:04:32', '2020-10-01 18:04:32'),
(33, 'ATU 25.2', 'Reemplazo Balizas Iluminadas', 'Número', NULL, '2020-10-01 18:04:41', '2020-10-01 18:04:41'),
(34, 'ATU 25.3', 'Reemplazo Topes Vehiculares', 'Número', NULL, '2020-10-01 18:04:48', '2020-10-01 18:04:48'),
(35, 'ATU 25.4', 'Bandera Portaseñal', 'Número', NULL, '2020-10-01 18:04:57', '2020-10-01 18:04:57'),
(36, 'ATU 25.5', 'Marco Portaseñal en 4 pistas', 'Número', NULL, '2020-10-01 18:05:07', '2020-10-01 18:05:07'),
(37, 'ATU 25.6', 'Marco Portaseñal en 5 pistas', 'Número', NULL, '2020-10-01 18:05:17', '2020-10-01 18:05:17'),
(38, 'ATU 26', 'Limpieza de Elementos Reflectantes en Barreras Metálicas', 'Número', NULL, '2020-10-01 18:05:25', '2020-10-01 18:05:25'),
(39, 'ATU 27.1', 'Reposición de Barreras Metálicas de Seguridad, Doble Onda', 'metro lineal', NULL, '2020-10-01 18:08:46', '2020-10-01 18:08:46'),
(40, 'ATU 27.2', 'Reposición de Barreras Metálicas de Seguridad, Triple Onda', 'metro lineal', NULL, '2020-10-01 18:08:57', '2020-10-01 18:08:57'),
(41, 'ATU 28.1', 'Colocación de Barreras Metálicas de Seguridad, Doble Onda', 'metro lineal', NULL, '2020-10-01 18:09:06', '2020-10-01 18:09:06'),
(42, 'ATU 28.2', 'Colocación de Barreras Metálicas de Seguridad, Triple Onda', 'metro lineal', NULL, '2020-10-01 18:09:15', '2020-10-01 18:09:15'),
(43, 'ATU 28.3', 'Reparación de Barreras altas simples de hormigón (In Situ)', 'metro lineal', NULL, '2020-10-01 18:09:24', '2020-10-01 18:09:24'),
(44, 'ATU 28.4', 'Reparación de Barreras especiales simples de hormigón (In Situ)', 'metro lineal', NULL, '2020-10-01 18:09:33', '2020-10-01 18:09:33'),
(45, 'ATU 28.5', 'Amortiguadores de impacto con capacidad de redireccionamiento', 'Número', NULL, '2020-10-01 18:09:43', '2020-10-01 18:09:43'),
(46, 'ATU 29.1', 'Tachas Reflectantes', 'Número', NULL, '2020-10-01 18:09:54', '2020-10-01 18:09:54'),
(47, 'ATU 29.2', 'Resaltos reductores de velocidad', 'Número', NULL, '2020-10-01 18:10:05', '2020-10-01 18:10:05'),
(48, 'ATU 30.1', 'Demarcación del Pavimento, Línea de Eje Continúa, Tipo C1', 'Km', NULL, '2020-10-01 18:12:52', '2020-10-01 18:12:52'),
(49, 'ATU 30.2', 'Demarcación del Pavimento, Línea Lateral Continúa, Tipo C2', 'Km', NULL, '2020-10-01 18:13:03', '2020-10-01 18:13:03'),
(50, 'ATU 32.1', 'Demarcación del Pavimento, Línea de Eje Segmentada, Tipo A1', 'Km', NULL, '2020-10-01 18:13:13', '2020-10-01 18:13:13'),
(51, 'ATU 32.2', 'Demarcación del Pavimento, Línea de Eje Segmentada, Tipo A2', 'Km', NULL, '2020-10-01 18:13:23', '2020-10-01 18:13:23'),
(52, 'ATU 32.3', 'Demarcación del Pavimento, Línea Lateral Segmentada, Tipo D1', 'Km', NULL, '2020-10-01 18:13:33', '2020-10-01 18:13:33'),
(53, 'ATU 32.4', 'Demarcación del Pavimento, Línea Lateral Segmentada, Tipo D2', 'Km', NULL, '2020-10-01 18:13:44', '2020-10-01 18:13:44'),
(54, 'ATU 33.1', 'Demarcación del Pavimento, Líneas, símbolos y leyendas (P. Termoplástica)', 'metro cuadrado', NULL, '2020-10-01 18:13:57', '2020-10-01 18:13:57'),
(55, 'ATU 33.2', 'Demarcación del Pavimento, Líneas, símbolos y leyendas (Pintura Acrílica)', 'metro cuadrado', NULL, '2020-10-01 18:14:07', '2020-10-01 18:14:07'),
(56, 'ATU 33.3', 'Demarcación del Pavimento, en ciclovías', 'Km', NULL, '2020-10-01 18:14:17', '2020-10-01 18:14:17'),
(57, 'ATU 33.4', 'Bandas Alertadoras', 'metro lineal', NULL, '2020-10-01 18:14:36', '2020-10-01 18:14:36'),
(58, 'ATU 35', 'Reparación de paraderos de Buses', 'Número', NULL, '2020-10-01 18:14:46', '2020-10-01 18:14:46'),
(59, 'ATU 36.2', 'Valla Peatonal', 'metro lineal', NULL, '2020-10-01 18:14:56', '2020-10-01 18:14:56'),
(60, 'ATU 36.3', 'Valla Segregatoria', 'metro lineal', NULL, '2020-10-01 18:15:10', '2020-10-01 18:15:10'),
(61, 'ATU 36.4', 'Valla Antivandalismo', 'metro cuadrado', NULL, '2020-10-01 18:15:28', '2020-10-01 18:15:28'),
(62, 'ATU 37', 'Mantención de Paisajismo y Protección de Taludes', 'gl', NULL, '2020-10-01 18:15:39', '2020-10-01 18:15:39'),
(63, 'ATU 38', 'Borrado de grafitis', 'metro cuadrado', NULL, '2020-10-01 18:15:51', '2020-10-01 18:15:51'),
(64, 'BTU 4', 'Reconstrucción de Bajadas de Aguas', 'Número', NULL, '2020-10-01 18:16:03', '2020-10-01 18:16:03'),
(65, 'BTU 15.1', 'Reconstrucción de Alcantarilla de Tubos', 'metro lineal', NULL, '2020-10-01 18:16:15', '2020-10-01 18:16:15'),
(66, 'BTU 5', 'Revestimiento con Mampostería de Piedra', 'metro cuadrado', NULL, '2020-10-01 18:16:24', '2020-10-01 18:16:24'),
(67, 'BTU 8', 'Sello Tipo Lechada Asfáltica', 'metro cuadrado', NULL, '2020-10-01 18:16:33', '2020-10-01 18:16:33'),
(68, 'BTU 19', 'Limpieza de Placas de Apoyo', 'Número', NULL, '2020-10-01 18:16:43', '2020-10-01 18:16:43'),
(69, 'BTU 23', 'Limpieza despeje de Cauce y Defensas Fluviales', 'gl', NULL, '2020-10-01 18:16:56', '2020-10-01 18:16:56'),
(70, 'BTU 24', 'Limpieza Junta de Dilatación', 'metro lineal', NULL, '2020-10-01 18:17:06', '2020-10-01 18:17:06'),
(71, 'BTU 25', 'Limpieza  de Barbacanas y Calzadas', 'Número', NULL, '2020-10-01 18:17:15', '2020-10-01 18:17:15'),
(72, 'BTU 27', 'Construcción de Aceras de Hormigón', 'metro cuadrado', NULL, '2020-10-01 18:17:25', '2020-10-01 18:17:25'),
(73, 'BTU 29', 'Actualización de Programa de Mantención', 'gl', NULL, '2020-10-01 18:17:36', '2020-10-01 18:17:36'),
(74, 'BTU 30', 'Indicadores de Pavimento', 'gl', NULL, '2020-10-01 18:17:47', '2020-10-01 18:17:47'),
(75, 'BTU 31', 'Inspección Semestral de Puentes y Estructuras', 'gl', NULL, '2020-10-01 18:17:56', '2020-10-01 18:17:56'),
(76, 'BTU 32', 'Monitoreo Material Particulado', 'gl', NULL, '2020-10-01 18:18:05', '2020-10-01 18:18:05'),
(77, 'BTU 33', 'Monitoreo de Ruido', 'gl', NULL, '2020-10-01 18:18:19', '2020-10-01 18:18:19'),
(78, 'BTU 34', 'Otros Monitoreos Ambientales', 'gl', NULL, '2020-10-01 18:18:28', '2020-10-01 18:18:28'),
(79, 'BTU 35', 'Pantallas Acústicas', 'gl', NULL, '2020-10-01 18:18:40', '2020-10-01 18:18:40'),
(80, 'BTU 38', 'Elaboración Plan de Manejo para la Gestión Ambiental y Territorial', 'gl', NULL, '2020-10-01 18:18:49', '2020-10-01 18:18:49'),
(81, 'BTU 39', 'Elaboración Plan de Educación Vial para Peatones (PEVP)', 'gl', NULL, '2020-10-01 18:18:59', '2020-10-01 18:18:59'),
(82, 'BTU 40', 'Otros estudios de Ingeniería Especializados', 'gl', NULL, '2020-10-01 18:19:08', '2020-10-01 18:19:08'),
(83, 'CTU 1.4', 'Reconstrucción de pistas en calzadas Vía Expresa', 'metro cuadrado', NULL, '2020-10-01 18:33:24', '2020-10-01 18:33:24'),
(84, 'CTU 1.5', 'Recapado asfáltico sobre calzadas en vía expresa', 'metro cuadrado', NULL, '2020-10-01 18:33:33', '2020-10-01 18:33:33'),
(85, 'CTU 1.6', 'Recapado asfáltico en Calles de Servicio', 'metro cuadrado', NULL, '2020-10-01 18:33:43', '2020-10-01 18:33:43'),
(86, 'CTU 1.8', 'Reconstrucción de pistas en Calles de Servicio', 'metro cuadrado', NULL, '2020-10-01 18:33:52', '2020-10-01 18:33:52'),
(87, 'CTU 2', 'Reconstrucción de Bermas', 'metro cuadrado', NULL, '2020-10-01 18:34:05', '2020-10-01 18:34:05'),
(88, 'CTU 5', 'Reemplazo de Juntas de Dilatación', 'metro lineal', NULL, '2020-10-01 18:34:17', '2020-10-01 18:34:17'),
(89, 'CTU 6', 'Reemplazo  de Barbacanas', 'Número', NULL, '2020-10-01 18:34:28', '2020-10-01 18:34:28'),
(90, 'CTU 7', 'Reemplazo de Placas de Apoyo', 'Número', NULL, '2020-10-01 18:34:38', '2020-10-01 18:34:38'),
(91, 'CTU 11', 'Reparación Mayor', 'gl', NULL, '2020-10-01 18:34:47', '2020-10-01 18:34:47'),
(92, 'DTU 3', 'Mantención plaza de peaje', 'gl', NULL, '2020-10-01 18:34:56', '2020-10-01 18:34:56'),
(93, 'DTU 8', 'Mantención de Intersecciones Semaforizadas', 'gl', NULL, '2020-10-01 18:35:05', '2020-10-01 18:35:05'),
(94, 'DTU 9', 'Mantención Edificio Administración Lampa - Centro Gestión de Transito', 'gl', NULL, '2020-10-01 18:35:14', '2020-10-01 18:35:14'),
(95, 'DTU 10', 'Mantención de Edificio Centro de Atención de Emergencia (CAE)', 'gl', NULL, '2020-10-01 18:35:24', '2020-10-01 18:35:24'),
(96, 'DTU 11', 'Mantención Sistema de Gestión de Tránsito y Comunicaciones', 'gl', NULL, '2020-10-01 18:35:33', '2020-10-01 18:35:33'),
(97, 'DTU 12', 'Mantención de Iluminación General', 'gl', NULL, '2020-10-01 18:35:41', '2020-10-01 18:35:41'),
(98, '133-1', 'Emergencias recuperables', 'gl', NULL, '2020-10-01 18:35:49', '2020-10-01 18:35:49'),
(99, '133-2', 'Emergencias No recuperables', 'gl', NULL, '2020-10-01 18:36:03', '2020-10-01 18:36:03'),
(100, '113635', 'Trabajos por Vandalismo', 'gl', NULL, '2020-10-01 18:36:14', '2020-10-01 18:36:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresource_id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(8,2) NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `work_id`, `user_id`, `type`, `refresource_id`, `unit`, `quantity`, `observation`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Recurso Humano', 21, 'hora normal', 1.00, 'sada', '1', NULL, '2020-10-23 17:27:48', '2020-10-23 17:27:48'),
(2, 1, 1, 'Recurso Humano', 22, 'hora extra', 5.00, 'sada', '1', NULL, '2020-10-23 17:27:48', '2020-10-23 17:27:48'),
(3, 1, 1, 'Recurso Humano', 21, 'hora normal', 3.00, NULL, '1', NULL, '2020-10-23 17:36:43', '2020-10-23 17:36:43'),
(4, 1, 1, 'Recurso Humano', 22, 'hora extra', 3.00, NULL, '1', NULL, '2020-10-23 17:36:43', '2020-10-23 17:36:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(2, 'supervisor', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(3, 'foreman', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(4, 'guest', 'web', '2020-10-15 23:36:50', '2020-10-15 23:36:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(21, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(1, 3),
(2, 3),
(3, 3),
(8, 3),
(9, 3),
(10, 3),
(13, 3),
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `enterprise`, `team`, `position`, `is_active`, `deleted_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felipe', 'Moreno Duran', 'fmoreno@admin.com', 'Scada', 'Sistemas', 'admin', '1', NULL, NULL, '$2y$10$VcRrXMxQpJk9fJhCPO.x.OfDjoTlA0/rC5qHjKPmudg4/bhvFLaL.', NULL, '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(2, 'Supervisor', 'Supervisor', 'supervisor@supervisor.com', 'Scada', NULL, 'visita', '1', NULL, NULL, '$2y$10$a23/LqWNU0.CYCiHdUOpT.ncDyvOG1u5WXQMHDfv2eBnF.pYzOzzK', NULL, '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(3, 'Foreman', 'Foreman', 'foreman@foreman.com', 'Scada', NULL, 'visita', '1', NULL, NULL, '$2y$10$xqgErDa2L0BYfAA.AtoZMOHJthw/Z51bJH2YPOlCIvtS30mo1I0uC', NULL, '2020-10-15 23:36:50', '2020-10-15 23:36:50'),
(4, 'Guest', 'Guest', 'guest@guest.com', 'Scada', NULL, 'visita', '1', NULL, NULL, '$2y$10$zQZZ39GbhTRgWDHSCCs2f.LIJWMud.WA6MBGAOHbqryVqwuqzp02m', NULL, '2020-10-15 23:36:50', '2020-10-15 23:36:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `enterprise` text COLLATE utf8mb4_unicode_ci,
  `responsible_team` text COLLATE utf8mb4_unicode_ci,
  `refwork_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normal_hour` double(8,2) DEFAULT NULL,
  `extra_hour` double(8,2) DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` double(8,2) DEFAULT NULL,
  `end` double(8,2) DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `works`
--

INSERT INTO `works` (`id`, `user_id`, `enterprise`, `responsible_team`, `refwork_id`, `normal_hour`, `extra_hour`, `frequency`, `highway`, `route`, `direction`, `start`, `end`, `origin`, `amount_of_work`, `observation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '1', NULL, NULL, 'Semanal', 'Urbano', 'Vía Express', 'Oriente', 2.00, 3.00, 'Mantención', '23', 'sada', NULL, '2020-10-23 17:27:41', '2020-10-23 17:27:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refdirections`
--
ALTER TABLE `refdirections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reffrequencies`
--
ALTER TABLE `reffrequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refhighways`
--
ALTER TABLE `refhighways`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reforigins`
--
ALTER TABLE `reforigins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refresources`
--
ALTER TABLE `refresources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refroutes`
--
ALTER TABLE `refroutes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refworks`
--
ALTER TABLE `refworks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `refdirections`
--
ALTER TABLE `refdirections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reffrequencies`
--
ALTER TABLE `reffrequencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `refhighways`
--
ALTER TABLE `refhighways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reforigins`
--
ALTER TABLE `reforigins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `refresources`
--
ALTER TABLE `refresources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `refroutes`
--
ALTER TABLE `refroutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `refworks`
--
ALTER TABLE `refworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
