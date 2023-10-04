<?php
include('header.php');
include('configure.php');
?>
<!-- index.php -->
<div class="alert alert-success text-center"><?php echo $config['title']; ?></div>
<div class="card card-body bg-light">
	<div><h3>Add New Entry</h3></div>
	<div><textarea id="dear_diary" class="form-control" rows="5"></textarea></div>
<?php
if (!is_null($config['password_to_post'])) {
	echo "\t" . '<div>Password: <input type="password" id="password_to_post" class="form-control" /></div>' . "\n";
}
?>
	<div>
		<button id="shoot_the_moon" class="btn btn-primary" onclick="write_to_diary();">Scratch a page...</button>
	</div>
</div>

<div class="card card-body bg-light">
	<h3>Diary</h3>
<?php
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$limit = '';
if ($config['diary_entries_per_page'] !== 0) {
	$limit = 'LIMIT ' . ($page * $config['diary_entries_per_page']) . ',' . $config['diary_entries_per_page'];
}

$mysql = $config['mysql'];
try {
	$link = mysqli_connect($mysql['server'], $mysql['username'], $mysql['password'], $mysql['database']);
} catch (Exception $e) {
	$link = false;
	error_log('diary/index.php: could not connect to mysql [' . $e->getMessage() . ']');
}
if ($link !== false) {
	/* get all the years */
	$years = [];
	$query = 'SELECT DISTINCT YEAR(`entry_time`) AS `entry_year` FROM `' . $mysql['table'] . '` GROUP BY `entry_time` DESC';
	$result = mysqli_query($link, $query);
	while ($record = mysqli_fetch_assoc($result)) {
		$years[] = $record['entry_year'];
	}
	mysqli_free_result($result);
	/* Enumerate through all the years, dump month/days that match */
	foreach ($years as $year) {
		$monthday = [];
		$query = 'SELECT DISTINCT CONCAT(MONTH(`entry_time`),"-",DAY(`entry_time`)) AS `monthday` FROM `' . $mysql['table'] . '` WHERE YEAR(`entry_time`)=' . $year . ' GROUP BY `entry_time` DESC;';
		$result = mysqli_query($link, $query);
		while ($record = mysqli_fetch_assoc($result)) {
			$monthday[] = $record['monthday'];
		}
		echo '<div><h4>' . $year . '</h4></div>';
		foreach ($monthday as $md) {
			list($month, $day) = explode('-', $md);
			$query = 'SELECT TIME(`entry_time`) as `entry_time`, `entry` FROM `' . $mysql['table'] . '` WHERE YEAR(`entry_time`)=' . $year . ' AND MONTH(`entry_time`)=' . $month . ' AND DAY(`entry_time`)=' . $day . ' ORDER BY `entry_time` DESC';
			$result = mysqli_query($link, $query);
			$output_day = false;
			while ($record = mysqli_fetch_assoc($result)) {
				if (!$output_day) {
					/* One day designation per entry set */
					echo '<div><h5>' . $day . ' ' . $month_name[$month] . '</h5></div>';
					$output_day = true;
				}
				echo '<p class="text-justify"><span class="font-italic">' . $record['entry_time'] . '</span>: ' . $record['entry'] . '</p>';
			}
		}
	}
}
?>
</div>

<?php
include('footer.php');
