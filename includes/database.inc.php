<?php
	require('vendor/autoload.php');

	use Illuminate\Database\Capsule\Manager as Capsule;

	$capsule = new Capsule;
	$capsule->addConnection([
	    'driver'    => 'mysql',
	    'host'      => 'localhost',
	    'database'  => 'smartcalendar',
	    'username'  => 'YOUR_DATABASE_USERNAME',
	    'password'  => 'YOUR_DATABASE_PASSWORD',
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => '',
	]);

	$capsule->setAsGlobal();
	$capsule->bootEloquent();

	class Event extends Illuminate\Database\Eloquent\Model {
		public $timestamps = false;
	}