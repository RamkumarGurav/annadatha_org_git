<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-06-19 10:49:47 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:49:47 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:49:47 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:49:47 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:49:47 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:49:47 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:49:59 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:49:59 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:49:59 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:49:59 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:50:22 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:50:22 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:50:22 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:50:22 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:50:22 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:50:22 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:50:23 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:50:23 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:53:35 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 82
ERROR - 2024-06-19 10:53:35 --> Severity: Warning --> mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given E:\xampp\htdocs\xampp\MARS\pct_v300\application\hooks\Router_Hook.php 95
ERROR - 2024-06-19 10:53:35 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:53:35 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:53:57 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:53:57 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:57:19 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 10:57:19 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:32:27 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:32:27 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:33:46 --> Query error: Table 'pct_v300.configuration' doesn't exist - Invalid query: SELECT
			configuration.id,
			configuration.name,
			configuration.status,
			concat('{', GROUP_CONCAT(concat('"', configuration_data.name, '":"', configuration_data.value, '"')) ,'}') as config_data
		FROM
			configuration
		JOIN configuration_data ON configuration_data.configuration_id = configuration.id
		group by configuration.id
ERROR - 2024-06-19 11:33:57 --> Query error: Table 'pct_v300.configuration' doesn't exist - Invalid query: SELECT
			configuration.id,
			configuration.name,
			configuration.status,
			concat('{', GROUP_CONCAT(concat('"', configuration_data.name, '":"', configuration_data.value, '"')) ,'}') as config_data
		FROM
			configuration
		JOIN configuration_data ON configuration_data.configuration_id = configuration.id
		group by configuration.id
ERROR - 2024-06-19 11:35:45 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:35:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:35:52 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:45 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:45 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:37:46 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:38:02 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:38:10 --> Unable to load the requested class: Configuration
ERROR - 2024-06-19 11:38:41 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:38:41 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:38:51 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:57 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:58 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:58 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:58 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:44:59 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:00 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:01 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:01 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:01 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:01 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:45:07 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:02 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:03 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:03 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:03 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:04 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:04 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:47:04 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:49:56 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:34 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:35 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:35 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:35 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:36 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:39 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:51:40 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:22 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:22 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:23 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:24 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:24 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:24 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:24 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:24 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:54:28 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 11:58:45 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:58:45 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:58:46 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:58:46 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 11:58:53 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:07:41 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 12:07:41 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 12:08:30 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:10:34 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:11:27 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:11:37 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:11:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:11:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:11:38 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:13:14 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:13:27 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:15:08 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:16:22 --> Query error: Table 'pct_v300.brand_master' doesn't exist - Invalid query: SELECT count(*) as row_count
FROM `brand_master`
ERROR - 2024-06-19 12:38:02 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 12:38:02 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 15:07:39 --> 404 Page Not Found: secureRegions/master/Department_Module/department_list
ERROR - 2024-06-19 15:07:46 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 15:07:46 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 16:55:24 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 16:55:24 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 17:00:45 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 17:00:45 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 17:01:19 --> Severity: Warning --> unlink(assets/employee_file/logo_3_3_1.png): No such file or directory E:\xampp\htdocs\xampp\MARS\pct_v300\application\controllers\secureRegions\Ajax.php 158
ERROR - 2024-06-19 17:01:22 --> Severity: Warning --> unlink(assets/employee_file/logo_4_3_2.png): No such file or directory E:\xampp\htdocs\xampp\MARS\pct_v300\application\controllers\secureRegions\Ajax.php 158
ERROR - 2024-06-19 17:01:31 --> Severity: Warning --> unlink(assets/employee_file/logo_3_3_1.png): No such file or directory E:\xampp\htdocs\xampp\MARS\pct_v300\application\controllers\secureRegions\Ajax.php 158
ERROR - 2024-06-19 17:32:55 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
ERROR - 2024-06-19 17:32:55 --> Severity: Notice --> Undefined variable: csrf E:\xampp\htdocs\xampp\MARS\pct_v300\application\views\admin\login.php 88
