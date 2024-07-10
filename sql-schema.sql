-- db1.data_pelanggan definition

CREATE TABLE `data_pelanggan` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ktp` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;