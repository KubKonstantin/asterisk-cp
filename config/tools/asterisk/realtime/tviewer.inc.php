<?php
/*
 * Shared table viewer configuration for Asterisk realtime tables.
 *
 * This file is included by both the legacy aggregate realtime module and by
 * per-table modules under config/tools/asterisk/<table>/.
 */

if (!isset($module_id))
	$module_id = "realtime";

$asterisk_realtime_tables = array(
	"ps_endpoints" => array(
		"label" => "PJSIP Endpoints",
		"pk" => "id",
		"visible_columns" => array("id", "transport", "aors", "auth", "context", "disallow", "allow", "direct_media", "dtmf_mode", "callerid", "mailboxes", "outbound_auth", "rewrite_contact", "force_rport", "rtp_symmetric", "webrtc"),
		"search_columns" => array("id", "transport", "aors", "auth", "context", "callerid", "mailboxes", "outbound_auth")
	),
	"ps_auths" => array("label" => "PJSIP Auths", "pk" => "id"),
	"ps_aors" => array("label" => "PJSIP AORs", "pk" => "id"),
	"ps_contacts" => array("label" => "PJSIP Contacts", "pk" => "id"),
	"ps_transports" => array("label" => "PJSIP Transports", "pk" => "id"),
	"ps_registrations" => array("label" => "PJSIP Registrations", "pk" => "id"),
	"ps_endpoint_id_ips" => array("label" => "PJSIP Identify", "pk" => "id"),
	"ps_domain_aliases" => array("label" => "PJSIP Domain Aliases", "pk" => "id"),
	"ps_globals" => array("label" => "PJSIP Globals", "pk" => "id"),
	"ps_systems" => array("label" => "PJSIP Systems", "pk" => "id"),
	"ps_asterisk_publications" => array("label" => "Asterisk Publications", "pk" => "id"),
	"ps_inbound_publications" => array("label" => "Inbound Publications", "pk" => "id"),
	"ps_outbound_publishes" => array("label" => "Outbound Publishes", "pk" => "id"),
	"ps_resource_list" => array("label" => "Resource Lists", "pk" => "id"),
	"ps_subscription_persistence" => array("label" => "Subscription Persistence", "pk" => "id"),
	"extensions" => array("label" => "Dialplan Extensions", "pk" => "id"),
	"sippeers" => array("label" => "SIP Peers", "pk" => "id"),
	"iaxfriends" => array("label" => "IAX Friends", "pk" => "id"),
	"queues" => array("label" => "Queues", "pk" => "name"),
	"queue_members" => array("label" => "Queue Members", "pk" => "uniqueid"),
	"queue_rules" => array("label" => "Queue Rules", "pk" => "rule_name", "readonly" => true),
	"queue_log" => array("label" => "Queue Log", "pk" => "callid", "readonly" => true),
	"voicemail" => array("label" => "Voicemail", "pk" => "uniqueid"),
	"musiconhold" => array("label" => "Music On Hold", "pk" => "name"),
	"musiconhold_entry" => array("label" => "MOH Entries", "pk" => "name", "readonly" => true),
	"meetme" => array("label" => "MeetMe", "pk" => "bookid"),
	"cdr" => array("label" => "CDR", "pk" => "uniqueid", "readonly" => true),
	"stir_tn" => array("label" => "STIR/SHAKEN TN", "pk" => "id"),
	"alembic_version_config" => array("label" => "Alembic Version", "pk" => "version_num"),
);

function asterisk_realtime_pretty_header($column)
{
	return ucwords(str_replace(array("_", "-", "@"), " ", $column));
}

function asterisk_realtime_table_config($table, $table_config)
{
	$is_readonly = isset($table_config['readonly']) && $table_config['readonly'];

	return array(
		"custom_table" => $table,
		"custom_table_primary_key" => $table_config['pk'],
		"custom_table_order_by" => $table_config['pk'],
		"custom_table_column_defs" => array(),
		"custom_action_columns" => $is_readonly ? array() : array(
			array(
				"header" => "Edit",
				"show_header" => false,
				"type" => "link",
				"action" => "edit",
				"icon" => "../../../images/share/edit.png",
				"action_script" => "custom_actions/edit.php",
				"action_template" => "template/custom_templates/edit.php"
			),
			array(
				"header" => "Delete",
				"show_header" => false,
				"type" => "link",
				"action" => "delete",
				"icon" => "../../../images/share/delete.png",
				"action_script" => "custom_actions/delete.php",
				"action_template" => "template/custom_templates/delete.php",
				"events" => "onclick=\"return confirmDelete()\""
			)
		),
		"custom_action_buttons" => $is_readonly ? array() : array(
			array(
				"text" => "Add",
				"action" => "add",
				"style" => "formButton",
				"action_script" => "custom_actions/add.php",
				"action_template" => "template/custom_templates/add.php"
			)
		),
		"custom_search" => array("enabled" => true, "action_script" => "custom_actions/search.php"),
		"auto_columns" => true,
		"auto_columns_func" => "asterisk_realtime_build_columns",
		"per_page" => $is_readonly ? 100 : 50,
		"page_range" => 3,
		"reload" => false,
		"readonly_table" => $is_readonly
	);
}

$custom_config[$module_id] = array();

if (isset($asterisk_realtime_tables[$module_id])) {
	$custom_config[$module_id]['custom_name'] = $asterisk_realtime_tables[$module_id]['label'];
	$custom_config[$module_id][0] = asterisk_realtime_table_config($module_id, $asterisk_realtime_tables[$module_id]);
} else {
	$custom_config[$module_id]['custom_name'] = "Asterisk Realtime";
	$custom_config[$module_id]['submenu_items'] = array();
	$submenu_id = 0;
	foreach ($asterisk_realtime_tables as $table => $table_config) {
		$custom_config[$module_id]['submenu_items'][$submenu_id] = $table_config['label'];
		$custom_config[$module_id][$submenu_id] = asterisk_realtime_table_config($table, $table_config);
		$submenu_id++;
	}
}

function asterisk_realtime_build_columns($link, &$table_config)
{
	$table = $table_config['custom_table'];
	$primary_key = $table_config['custom_table_primary_key'];
	$statement = $link->query("DESCRIBE ".tviewer_quote_identifier($table));
	if ($statement === false)
		die('Failed to describe table, error message : ' . print_r($link->errorInfo(), true));

	$columns = $statement->fetchAll(PDO::FETCH_ASSOC);
	$table_config['custom_table_column_defs'] = array();
	foreach ($columns as $column) {
		$name = $column['Field'];
		$type = strtolower($column['Type']);
		$is_primary = ($name === $primary_key);
		$is_auto_increment = strpos(strtolower($column['Extra']), 'auto_increment') !== false;
		$is_textarea = strpos($type, 'text') !== false || preg_match('/varchar\((\d+)\)/', $type, $match) && (int)$match[1] > 255;
		$is_required = ($column['Null'] === 'NO' && $column['Default'] === null && !$is_auto_increment);
		$is_readonly_table = isset($table_config['readonly_table']) && $table_config['readonly_table'];
		$is_visible = !isset($table_config['visible_columns']) || in_array($name, $table_config['visible_columns']);
		$is_searchable = (!$is_textarea && (!isset($table_config['search_columns']) || in_array($name, $table_config['search_columns'])));

		$table_config['custom_table_column_defs'][$name] = array(
			"header" => asterisk_realtime_pretty_header($name),
			"type" => $is_textarea ? "textarea" : "text",
			"key" => $is_primary ? "PRI" : (($column['Key'] === 'UNI') ? "UNI" : (($column['Key'] === 'MUL') ? "MUL" : null)),
			"tip" => $column['Type'].($column['Null'] === 'NO' ? ", required" : ", optional"),
			"is_optional" => $is_required ? "n" : "y",
			"show_in_add_form" => !$is_readonly_table && !$is_auto_increment,
			"show_in_edit_form" => !$is_readonly_table && !$is_auto_increment,
			"searchable" => $is_searchable,
			"visible" => $is_visible,
			"keep_empty_str_val" => $column['Null'] === 'NO'
		);
	}
}
?>
