<?php
/**
 * Master configuration
 *
 * 'mysql': settings to connect to mysql
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
	'password_to_post' => 'derp',
	'diary_days_per_page' => 0,
	'title' => 'I Envy You, Alan Rickman / Diary of Matthew Heick',
];
