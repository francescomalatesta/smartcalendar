<?php
	require('includes/database.inc.php');

	$events = Event::where('happens_at', '>', date('Y-m-d H:i:s'))->orderBy('happens_at', 'ASC')->get();