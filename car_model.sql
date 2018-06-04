CREATE TABLE `car_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(30) DEFAULT NULL,
  `car_manufacturer_id` int(11) DEFAULT NULL,
  `color` varchar(11) DEFAULT NULL,
  `manufacturing_year` year(4) DEFAULT NULL,
  `registration_no` varchar(30) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `car_image1` blob,
  `car_image2` blob,
  PRIMARY KEY (`id`),
  KEY `FK_car_model_manufacturer` (`car_manufacturer_id`)
) ENGINE=InnoDB