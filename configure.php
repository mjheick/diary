<?php
/**
 * Master configuration
 *
 * 'mysql': settings to connect to mysql
 * 'diary_timezone': What timezone to store the diary in per https://www.php.net/manual/en/timezones.php
 * 'password_to_post': Every new/edit/delete must provide this password. null disabled.
 * 'diary_days_per_page': When viewing diary how many days are rendered per page. 0 dumps the entire thing.
 * 'title': What to show at the top of every page.
 */
$config = [
	'mysql' => [
		'server' => 'localhost',
		'username' => 'diary',
		'password' => 'diary',
		'database' => 'diary',
		'table' => 'diary',
	],
	'diary_timezone' => 'America/New_York',
	'password_to_post' => 'derp',
	'diary_entries_per_page' => 0,
	'title' => 'I Envy You, Alan Rickman / Diary of Matthew Heick',
];
$month_name = [null, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
/* in case anything in configs needs to be overridden but not committed on the main branch */
if (file_exists('overrides.php')) {
	include('overrides.php');
}