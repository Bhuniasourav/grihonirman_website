<?php
include('connection.php');  
$sql = "

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+05:30';

CREATE TABLE `system_info` (
  `id` int(10) NOT NULL,
  `system_name` varchar(100) DEFAULT '',
  `logo` varchar(100) DEFAULT '',
  `favicon` varchar(100) DEFAULT '',
  `email` varchar(150) DEFAULT '',
  `address` varchar(200) DEFAULT '',
  `ph_num` varchar(50) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `system_info` (`id`, `system_name`, `logo`, `favicon`, `email`, `address`, `ph_num`, `entry_user_code`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'Demo Project', 'logo.png', 'favicon.png', 'support@demo.com', 'Demo Address', '+910123456789', 'PA_0001', '', NULL);



CREATE TABLE `user_master` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_code` varchar(50) DEFAULT '',
  `user_id` varchar(50) DEFAULT '',
  `user_password` varchar(200) DEFAULT '',
  `name` varchar(150) DEFAULT '',
  `email` varchar(150) NOT NULL,
  `profile_img` varchar(100) DEFAULT '',
  `user_mode_code` varchar(50) DEFAULT '',
  `active` varchar(10) DEFAULT '',
  `entry_permission` varchar(10) DEFAULT '',
  `view_permission` varchar(10) DEFAULT '',
  `edit_permission` varchar(10) DEFAULT '',
  `delete_permissioin` varchar(10) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `user_master` (`id`, `user_code`, `user_id`, `user_password`, `name`, `email`, `profile_img`, `user_mode_code`, `active`, `entry_permission`, `view_permission`, `edit_permission`, `delete_permissioin`, `entry_user_code`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'PA_0001', 'admin', 'YWRtaW4=', 'Project Admin', 'kolkata121@gmail.com', '', 'Project Admin', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'PA_0001', '', NULL);




CREATE TABLE `menu_master` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `menu_code` varchar(50) DEFAULT '',
  `menu_name` varchar(150) DEFAULT '',
  `menu_icon` varchar(50) DEFAULT '',
  `icon_color` varchar(20) DEFAULT '',
  `sub_menu_status` varchar(10) DEFAULT '',
  `file_name` varchar(100) DEFAULT '',
  `folder_name` varchar(100) DEFAULT '',
  `order_num` decimal(10,0) DEFAULT NULL,
  `active` varchar(10) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_master` (`id`, `menu_code`, `menu_name`, `menu_icon`, `icon_color`, `sub_menu_status`, `file_name`, `folder_name`, `order_num`, `active`, `entry_user_code`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'MC_6497e30d4eaca1687675661', 'Dashboard', 'fas fa-tachometer-alt text-primary', '', 'No', 'dashboard', 'dashboard', '0', 'Yes', 'PA_0001',  '', NULL),
(2, 'MM_5fec5b7265be41609325426', 'System Config', 'la la-cog text-success', '', 'Yes', '', '', '1', 'Yes', 'PA_0001', '', NULL),
(3, 'MC_62e041fd9a5401658864125', 'Profile Info', 'fas fa-user text-danger', '', 'Yes', '', '', '2', 'Yes', 'PA_0001', '', NULL);


CREATE TABLE `sub_menu_master` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `sub_menu_code` varchar(50) DEFAULT '',
  `sub_menu_name` varchar(150) DEFAULT '',
  `menu_icon` varchar(150) DEFAULT '',
  `icon_color` varchar(20) DEFAULT '',
  `menu_code` varchar(50) DEFAULT '',
  `file_name` varchar(100) DEFAULT '',
  `folder_name` varchar(100) DEFAULT '',
  `order_num` decimal(10,0) DEFAULT NULL,
  `active` varchar(10) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `sub_menu_master` (`id`, `sub_menu_code`, `sub_menu_name`, `menu_icon`, `icon_color`, `menu_code`, `file_name`, `folder_name`, `order_num`, `active`, `entry_user_code`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'SMC_626eee3d921351651437117', 'Create Menu', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'menu_master', 'menu_master', '1', 'Yes', 'PA_0001', '', NULL),
(2, 'SMC_626eee5724f631651437143', 'Create Sub Menu', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'sub_menu_master', 'sub_menu_master', '2', 'Yes', 'PA_0001', '', NULL),
(3, 'SMC_627282dd0c22a1651671773', 'Create User Mode', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'create_user_mode', 'create_user_mode', '4', 'Yes', 'PA_0001', '', NULL),
(4, 'SMC_6272831fc83db1651671839', 'Create User', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'create_user', 'create_user', '6', 'Yes', 'PA_0001', '', NULL),
(5, 'SMC_62735a3e12dfc1651726910', 'User Mode Permission', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'user_mode_permission', 'user_mode_permission', '5', 'Yes', 'PA_0001', '', NULL),
(6, 'SMC_62df7c8e76fd51658813582', 'System Info', 'fa fa-circle-notch', '', 'MM_5fec5b7265be41609325426', 'system_info', 'system_info', '3', 'Yes', 'PA_0001', '', NULL),
(7, 'SMC_62e0421c5d0c11658864156', 'Manage Profile', 'fa fa-circle-notch', '', 'MC_62e041fd9a5401658864125', 'manage_profile', 'manage_profile', '1', 'Yes', 'PA_0001', '', NULL),
(8, 'SMC_62e042410ee2b1658864193', 'Activity Details', 'fa fa-circle-notch', '', 'MC_62e041fd9a5401658864125', 'activity', 'activity', '3', 'Yes', 'PA_0001', '', NULL),
(9, 'SMC_6316229e460bf1662395038', 'Change Password', 'fa fa-circle-notch', '', 'MC_62e041fd9a5401658864125', 'change_password', 'change_password', '2', 'Yes', 'PA_0001', '', NULL);

CREATE TABLE `user_mode` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_mode_code` varchar(50) DEFAULT '',
  `user_mode` varchar(50) DEFAULT '',
  `active` varchar(10) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_mode` (`id`, `user_mode_code`, `user_mode`, `active`, `entry_user_code`, `entry_timestamp`, `update_timestamp`) VALUES
(1, 'UMC_64a1c6dfb94111688323807', 'ADMIN', 'Yes', 'PA_0001', '', NULL);

CREATE TABLE `user_permission` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_mode_code` varchar(50) DEFAULT '',
  `all_menu_code` varchar(50) DEFAULT '',
  `menu_type` varchar(20) DEFAULT '',
  `entry_user_code` varchar(50) DEFAULT '',
  `entry_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `user_activity` (
  `id` bigint(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `activity_code` varchar(50) DEFAULT '',
   `user_code` varchar(50) DEFAULT '',
   `activity_details` longtext,
   `activity_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `login_token_auth` (
  `id` int(244) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_code` varchar(50) DEFAULT '',
  `user_type` varchar(50) DEFAULT '',
  `password` varchar(150) DEFAULT '',
  `selector` varchar(150) DEFAULT '',
  `expiry` varchar(10) DEFAULT '',
  `expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$result = mysqli_query($con, "SHOW TABLES LIKE 'system_info'");
if (!$result || mysqli_num_rows($result) == 0) {
  mysqli_multi_query($con, $sql);
}
