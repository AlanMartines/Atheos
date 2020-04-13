<?php

//////////////////////////////////////////////////////////////////////////////80
// TextMode
//////////////////////////////////////////////////////////////////////////////80
// Copyright (c) Atheos & Liam Siira (Atheos.io), distributed as-is and without
// warranty under the modified License: MIT - Hippocratic 1.2: firstdonoharm.dev
// See [root]/license.md for more. This information must remain intact.
//////////////////////////////////////////////////////////////////////////////80
// Authors: Codiad Team, @ccvca, Atheos Team, @hlsiira
//////////////////////////////////////////////////////////////////////////////80

require_once "../../common.php";
require_once "class.textmode.php";

//////////////////////////////////////////////////////////////////
// Verify Session or Key
//////////////////////////////////////////////////////////////////
Common::checkSession();

$action = Common::data("action");

if (!$action) {
	die(Common::sendJSON("error", "missing action"));
}

$TextMode = new TextMode();

switch ($action) {
	//////////////////////////////////////////////////////////////////
	// Set custom text modes
	//////////////////////////////////////////////////////////////////
	case 'setTextModes':
		if (Common::checkAccess()) {
			$TextMode->setTextModes();
		} else {
			die(Common::sendJSON("error", "You are not allowed to edit the file extensions."));
		}
		break;

	//////////////////////////////////////////////////////////////////
	// Get text modes
	//////////////////////////////////////////////////////////////////
	case 'getTextModes':
		$TextMode->getTextModes();
		break;
	default:
		Common::sendJSON("E401i");
		die;
		break;
}