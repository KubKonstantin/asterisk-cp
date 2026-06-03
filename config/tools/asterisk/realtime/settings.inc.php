<?php
/*
 * Shared settings for Asterisk realtime table viewers.
 */

global $config;

if (!isset($asterisk_realtime_module_id))
	$asterisk_realtime_module_id = isset($module_id) ? $module_id : basename(__DIR__);

$config->$asterisk_realtime_module_id = array(
	"title0" => array(
		"type" => "title",
		"title" => "Database"
	),
	"db_config" => array(
		"default" => 0,
		"name" => "DB configuration",
		"type" => "dropdown",
		"options" => get_db_configs(),
		"tip" => "DB configuration to use for the Asterisk realtime table"
	),
);
?>
