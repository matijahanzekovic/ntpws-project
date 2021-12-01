
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT  NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `country` char(100) NOT NULL,
  `city` char(100) NOT NULL,
  `street` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `archive` enum('Y','N') DEFAULT 'N',
  `role` varchar(100) DEFAULT 'user' 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT  NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `archive` enum('Y','N') DEFAULT 'N',
  `approved` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT  NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT  NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `name` text NOT NULL,
  `news_id` int(11),
  FOREIGN KEY (`news_id`) REFERENCES `news`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;