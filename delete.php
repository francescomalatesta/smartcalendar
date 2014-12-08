<?php

	require('includes/database.inc.php');

	$event = Event::find($_GET['id']);
	$event->delete();

	header('Location: index.php');