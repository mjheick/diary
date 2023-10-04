<?php
include('configure.php');
/**
 * For inbound POST requests this handles them
 * This also does a bit of security as well.
 */
$dear_diary = isset($_POST['dear_diary']) ? $_POST['dear_diary'] : '';
$password_to_post = isset($_POST['password_to_post']) ? $_POST['password_to_post'] : null;
if (strlen($dear_diary) > 0) {
	$can_post_content = true;
	if (!is_null($config['password_to_post'])) {
		if ($password_to_post !== $config['password_to_post']) {
			$can_post_content = false;
			error_log('diary/api.php: password incorrect on diary post');
		}
	}
	if ($can_post_content) {
		$mysql = $config['mysql'];
		try {
			$link = mysqli_connect($mysql['server'], $mysql['username'], $mysql['password'], $mysql['database']);
		} catch (Exception $e) {
			$link = false;
			error_log('diary/api.php: could not connect to mysql [' . $e->getMessage() . ']');
		}
		if ($link !== false) {
			$query = 'INSERT INTO `' . $mysql['table'] . '` (`entry_time`, `entry`) VALUES (NOW(), "' . mysqli_real_escape_string($link, $dear_diary) . '")';
			$ret = mysqli_query($link, $query);
			if ($ret === false) {
				error_log('diary/api.php: query failed to insert data into table');
			}
		}
	}
	die();
}