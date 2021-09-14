<?php

use Medoo\Medoo;

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => "db_dipo",
	'server' => "localhost",
	'username' => "root",
	'password' => "",
	'charset' => 'utf8',

 	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	],

	// [optional] Medoo will execute those commands after connected to the database for initialization
	'command' => [
		'SET SQL_MODE=ANSI_QUOTES'
	]
]);

$base_url = "http://localhost/sistem_pura";

?>
