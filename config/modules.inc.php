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
);




?>
