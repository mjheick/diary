<?php
include('header.php');
?>
<!-- index.php -->
<div class="alert alert-success text-center"><?php echo $config['title']; ?></div>
<div class="well">
	<div><h3>Add New Entry</h3></div>
	<div><textarea id="dear_diary" class="form-control" rows="5"></textarea></div>
<?php
if (!is_null($config['password_to_post'])) {
	echo "\t" . '<div>Password: <input type="password" id="password_to_post" class="form-control" /></div>' . "\n";
}
?>
	<div>
		<button id="shoot_the_moon" class="btn btn-primary">Scratch a page...</button>
	</div>
</div>
<div>
	<div class="well"><h3>Diary</h3></div>
<?php
if ($config['diary_days_per_page'] === 0) {
	/* Infinite Diary Dump */
} else {

}
?>
</div>
<?php
include('footer.php');

