<?php
/*
 * Settings for the Asterisk realtime table viewer.
 */

global $config;

$config->realtime = array(
	"title0" => array(
		"type" => "title",
		"title" => "Database"
	),
	"db_config" => array(
		"default" => 0,
		"name" => "DB configuration",
		"type" => "dropdown",
		"options" => get_db_configs(),
		"tip" => "DB configuration to use for the Asterisk realtime tables"
	),
);
?>
