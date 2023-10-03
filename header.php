<?php
include('api.php');
/**
 * A header for each page. Should include css/java
 * try to keep double quotes in html and single quotes in js/php
 */
?><!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8" />
		<title>
			<?php echo $config['title']; ?>
		</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<style>

		</style>
		<script>
function write_to_diary() {
	var diary_post = 'dear_diary=' + encodeURIComponent(document.getElementById('dear_diary').value);
	if (document.getElementById('password_to_post')) {
		diary_post = diary_post + '&password_to_post=' + encodeURIComponent(document.getElementById('password_to_post').value);
	}
	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'index.php', false); /* sync right now */
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(diary_post);
	location.reload();
}
		</script>
	</head>
	<body>
		<div class="container">
<!-- top -->

