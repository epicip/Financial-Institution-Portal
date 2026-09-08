CREATE TABLE IF NOT EXISTS `financial_institution_audit_logs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_id` BIGINT UNSIGNED NOT NULL,
  `actor_user_id` BIGINT UNSIGNED DEFAULT NULL,
  `actor_name` VARCHAR(255) NOT NULL DEFAULT '',
  `actor_type` VARCHAR(50) NOT NULL DEFAULT '',
  `action` VARCHAR(50) NOT NULL,
  `entity_type` VARCHAR(50) NOT NULL,
  `entity_id` VARCHAR(100) NOT NULL DEFAULT '',
  `description` TEXT NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL DEFAULT '',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_audit_institution_created` (`institution_id`, `created_at`),
  KEY `idx_audit_actor` (`actor_user_id`),
  KEY `idx_audit_action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
