-- Create 'users' table

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) UNIQUE NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `email` varchar(255) UNIQUE NOT NULL,
    `password` varchar(32) NOT NULL,
    `location` varchar(32) DEFAULT NULL,
    `bio` varchar(255) DEFAULT NULL,
    `phone` varchar(32) DEFAULT NULL,
    `birthday` DATETIME DEFAULT NULL,
    `profile_photo` varchar(255) DEFAULT NULL,
    `cover_photo` varchar(255) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `email_confirmed` enum("0", "1") NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;