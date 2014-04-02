<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => '',
		'database' => 'dcma',
		'encoding' => 'utf8'
	);
	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test',
		'encoding' => 'utf8'
	);
	public $dcma = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => '',
		'database' => 'dcma',
		'encoding' => 'utf8'
	);
}
