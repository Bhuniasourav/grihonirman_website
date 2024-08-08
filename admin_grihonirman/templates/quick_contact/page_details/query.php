<?php
$sql = "CREATE TABLE `db_griho_nirman`.`tbl_quick_contact` (
  `quick_contact_code` VARCHAR(50) PRIMARY KEY NOT NULL,
  `sl_no` INT NOT NULL AUTO_INCREMENT UNIQUE KEY,
  `name` VARCHAR(100),
  `isd_code` VARCHAR(10),
  `phone` VARCHAR(20),
  `email` VARCHAR(150),
  `category` VARCHAR(100),
  `message` LONGTEXT,
  `entry_user_code` VARCHAR(50) DEFAULT '',
  `entry_timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$result = mysqli_query($con, "SHOW TABLES LIKE 'tbl_quick_contact'");
if (!$result || mysqli_num_rows($result) == 0) {
  mysqli_multi_query($con, $sql);
}
?>
