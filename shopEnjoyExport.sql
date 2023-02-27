-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.39 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп данных таблицы testEnjoy_db.carts: ~0 rows (приблизительно)

-- Дамп данных таблицы testEnjoy_db.categories: ~0 rows (приблизительно)
INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
	(2, 'phone', NULL, NULL, '2023-02-27 15:14:50', '2023-02-27 15:14:50'),
	(3, 'laptop', NULL, NULL, '2023-02-27 15:15:13', '2023-02-27 15:15:13');

-- Дамп данных таблицы testEnjoy_db.failed_jobs: ~0 rows (приблизительно)

-- Дамп данных таблицы testEnjoy_db.migrations: ~9 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2014_10_12_000000_create_users_table', 1),
	(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(12, '2019_08_19_000000_create_failed_jobs_table', 1),
	(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(14, '2023_02_21_143836_create_permission_tables', 1),
	(15, '2023_02_21_150452_create_categories_table', 1),
	(16, '2023_02_21_150516_create_products_table', 1),
	(17, '2023_02_25_210736_create_cart_table', 1),
	(18, '2023_02_26_103906_create_orders_table', 1);

-- Дамп данных таблицы testEnjoy_db.model_has_permissions: ~0 rows (приблизительно)

-- Дамп данных таблицы testEnjoy_db.model_has_roles: ~2 rows (приблизительно)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 3);

-- Дамп данных таблицы testEnjoy_db.orders: ~0 rows (приблизительно)
INSERT INTO `orders` (`id`, `product_id`, `email`, `price`, `amount`, `postName`, `postOffice`, `postCity`, `postStreet`, `postBuilder`, `created_at`, `updated_at`) VALUES
	(1, 1, 'test@gmail.com', '1111', '1', 'Nova Poshta', 'office test', 'text3', 'text4', 'test 5', '2023-02-27 15:18:47', '2023-02-27 15:18:47'),
	(2, 2, 'babuska@gmail.com', '300', '2', 'Ukr Poshta', 'test name', 'office ciy', 'sdgf fdg', 'sdf sd g', '2023-02-27 15:19:41', '2023-02-27 15:19:41');

-- Дамп данных таблицы testEnjoy_db.password_reset_tokens: ~0 rows (приблизительно)

-- Дамп данных таблицы testEnjoy_db.permissions: ~12 rows (приблизительно)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'show products', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(2, 'add products', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(3, 'edit products', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(4, 'delete products', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(5, 'show categories', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(6, 'add categories', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(7, 'edit categories', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(8, 'delete categories', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(9, 'show users', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(10, 'add users', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(11, 'edit users', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24'),
	(12, 'delete users', 'web', '2023-02-27 15:00:24', '2023-02-27 15:00:24');

-- Дамп данных таблицы testEnjoy_db.personal_access_tokens: ~0 rows (приблизительно)

-- Дамп данных таблицы testEnjoy_db.products: ~0 rows (приблизительно)
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `image`, `amount`, `price`, `created_at`, `updated_at`) VALUES
	(1, 2, 'test', 'test', '20230227181531.jpg', '110', 1111, '2023-02-27 15:15:31', '2023-02-27 15:18:47'),
	(2, 3, 'phone1', 'phone', '20230227181607.jpg', '5', 150, '2023-02-27 15:16:07', '2023-02-27 15:19:41'),
	(3, 3, 'laptop', 'laptop', '20230227181821.jpg', '0', 500, '2023-02-27 15:18:21', '2023-02-27 15:18:21');

-- Дамп данных таблицы testEnjoy_db.roles: ~2 rows (приблизительно)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super-user', 'web', '2023-02-27 14:59:48', '2023-02-27 14:59:48'),
	(3, 'user', 'web', '2023-02-27 15:02:00', '2023-02-27 15:02:00');

-- Дамп данных таблицы testEnjoy_db.role_has_permissions: ~0 rows (приблизительно)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 3),
	(5, 3);

-- Дамп данных таблицы testEnjoy_db.users: ~2 rows (приблизительно)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$cIkPoi70qb5Rad2rjrSubu0p.pBNbWApXkObeSbYJmv7IPR7ioddq', NULL, '2023-02-27 14:59:48', '2023-02-27 14:59:48'),
	(3, 'test', 'test@gmail.com', NULL, '$2y$10$t53QpANR0.AwY2vV3cXdUeNpord5ISPmIBSihQ1THs2D.Qz68DEc.', NULL, '2023-02-27 15:02:14', '2023-02-27 15:02:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
