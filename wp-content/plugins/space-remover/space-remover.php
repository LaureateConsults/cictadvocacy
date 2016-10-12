<?php
    /*
    Plugin Name: Space Remover Plugin
    Plugin URI:
    Description: Plugin for removing unnecessary spaces
    Author: MGWE
    Version: 2.0
    Author URI:
    */
    /*	Copyright 2012-2014 MG

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    */

// Prohibit direct script loading
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

// Define certain plugin variables as constants
define( 'MGWE_SPACEREMOVER_ABSPATH', plugin_dir_path( __FILE__ ) );
define( 'MGWE_SPACEREMOVER__FILE__', __FILE__ );

// Load TablePress class, which holds common functions and variables
require_once MGWE_SPACEREMOVER_ABSPATH . 'classes/mgwe_space_remover_class.php';
require_once MGWE_SPACEREMOVER_ABSPATH . 'classes/mgwe_space_remover_admin_class.php';

$MGWESpaceRemover = new MGWESpaceRemover();
