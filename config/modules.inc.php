<?php
/*
 * Copyright (C) 2011 OpenSIPS Project
 *
 * This file is part of opensips-cp, a free Web Control Panel Application for 
 * OpenSIPS SIP server.
 *
 * opensips-cp is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * opensips-cp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


### List with all the available modules - you can enable and disable module from here

$config_admin_modules = array (
	"list_admins"	=> array (
		"enabled"	=> true,
		"name"		=> "Access"
	),
	"boxes_config"    => array (
		"enabled"   => true,
		"name"		=> "Boxes"
	),
	"db_config"    => array (
		"enabled"   => true,
		"name"		=> "DB config"
	)
);

$config_modules 	= array (
	"asterisk"		=> array (
		"enabled"	=> true,
		"name"		=> "Asterisk",
		"icon"		=> "images/icon-system.svg",
		"modules"	=> array (
			"realtime"	=> array (
				"enabled"	=> true,
				"name"		=> "Realtime Tables",
				"path"		=> "asterisk/realtime"
			),
		)
	),
	"asterisk"		=> array (
		"enabled"	=> true,
		"name"		=> "Asterisk",
		"icon"		=> "images/icon-system.svg",
		"modules"	=> array (
			"ps_endpoints"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Endpoints"
			),
			"ps_auths"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Auths"
			),
			"ps_aors"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP AORs"
			),
			"ps_contacts"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Contacts"
			),
			"ps_transports"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Transports"
			),
			"ps_registrations"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Registrations"
			),
			"ps_endpoint_id_ips"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Identify"
			),
			"ps_domain_aliases"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Domain Aliases"
			),
			"ps_globals"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Globals"
			),
			"ps_systems"	=> array (
				"enabled"	=> true,
				"name"		=> "PJSIP Systems"
			),
			"ps_asterisk_publications"	=> array (
				"enabled"	=> true,
				"name"		=> "Asterisk Publications"
			),
			"ps_inbound_publications"	=> array (
				"enabled"	=> true,
				"name"		=> "Inbound Publications"
			),
			"ps_outbound_publishes"	=> array (
				"enabled"	=> true,
				"name"		=> "Outbound Publishes"
			),
			"ps_resource_list"	=> array (
				"enabled"	=> true,
				"name"		=> "Resource Lists"
			),
			"ps_subscription_persistence"	=> array (
				"enabled"	=> true,
				"name"		=> "Subscription Persistence"
			),
			"extensions"	=> array (
				"enabled"	=> true,
				"name"		=> "Dialplan Extensions"
			),
			"sippeers"	=> array (
				"enabled"	=> true,
				"name"		=> "SIP Peers"
			),
			"iaxfriends"	=> array (
				"enabled"	=> true,
				"name"		=> "IAX Friends"
			),
			"queues"	=> array (
				"enabled"	=> true,
				"name"		=> "Queues"
			),
			"queue_members"	=> array (
				"enabled"	=> true,
				"name"		=> "Queue Members"
			),
			"queue_rules"	=> array (
				"enabled"	=> true,
				"name"		=> "Queue Rules"
			),
			"queue_log"	=> array (
				"enabled"	=> true,
				"name"		=> "Queue Log"
			),
			"voicemail"	=> array (
				"enabled"	=> true,
				"name"		=> "Voicemail"
			),
			"musiconhold"	=> array (
				"enabled"	=> true,
				"name"		=> "Music On Hold"
			),
			"musiconhold_entry"	=> array (
				"enabled"	=> true,
				"name"		=> "MOH Entries"
			),
			"meetme"	=> array (
				"enabled"	=> true,
				"name"		=> "MeetMe"
			),
			"cdr"	=> array (
				"enabled"	=> true,
				"name"		=> "CDR"
			),
			"stir_tn"	=> array (
				"enabled"	=> true,
				"name"		=> "STIR/SHAKEN TN"
			),
			"alembic_version_config"	=> array (
				"enabled"	=> true,
				"name"		=> "Alembic Version"
			),
		)
	)
);




?>
