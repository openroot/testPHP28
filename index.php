<?php
	require_once("testPHP28/_initiate_/private/public.php");
	require_once("testPHP28/_initiate_/private/protected.php");
	require_once("testPHP28/_process_/void.php");
	require_once("testPHP28/_execute_/data.php");
?>

<?php
	_process_\setting::updateTimeZone(_process_\setting::timeZone["India"]);

	$verbose = new _process_\verbose();
	$verbose->printHeader();

	try {
		// ***************************************
		// ************** testPHP28 **************
		// ***************************************
		_process_\html::screenStart("testPHP28");

		_process_\feature::functionToggle(
			// Printing greetings.
			function () {
				_process_\html::tabletShow("Hello World!", "testPHP28");
			},
			true,
			"See you soon!",
			"Good Bye"
		);

		_process_\html::screenEnd();

		// ***************************************
		// **************** MySQL ****************
		// ***************************************
		_process_\html::screenStart("MySQL");

		$mysql1URI = null;
		$mysql1DB = null;

		_process_\feature::functionToggle(
			// Preparing MySQL URI string.
			function () {
				global $configurationMysql;
				global $mysql1URI;
				$mysql1URI = "mysql:";
				$mysql1URI .= "host=" . $configurationMysql["mysql1"]["connection"]["host"];
				$mysql1URI .= ";port=" . $configurationMysql["mysql1"]["connection"]["port"];
				$mysql1URI .= ";dbname=" . $configurationMysql["mysql1"]["connection"]["DB1"]["name"];
				$mysql1URI .= ";sslmode=" . $configurationMysql["mysql1"]["connection"]["ssl"]["mode"];
				$mysql1URI .= ";sslrootcert=" . $configurationMysql["mysql1"]["connection"]["ssl"]["caCertificatePath"];
			},
			true,
			"MySQL connection establishment is overridden to escape.",
			"Offline"
		);

		_process_\feature::functionToggle(
			// Establishing MySQL connection.
			function () {
				global $configurationMysql;
				global $mysql1URI;
				global $mysql1DB;
				if (isset($mysql1URI)) {
					$mysql1DB = new PDO($mysql1URI, $configurationMysql["mysql1"]["connection"]["username"], $configurationMysql["mysql1"]["connection"]["password"]);
				}
			},
			true,
			null,
			null
		);

		_process_\feature::functionToggle(
			// Executing MYSQL query for sample.
			function () {
				global $mysql1DB;
				if (isset($mysql1DB)) {
					$statement = $mysql1DB->query("SELECT VERSION()");
					_process_\html::tabletShow($statement->fetch()[0], aTicket("MySQL Version"));
				}
			},
			true,
			null,
			null
		);

		_process_\html::screenEnd();
	}
	catch (Exception $exception) {
		_process_\html::tabletShow(anError($exception));
	}

	$verbose->printFooter();
?>

<?php
//
//	_procedure_ _PHP_: Follow _PHP_ setup (if not already _office_).
//	_decide_ _PHP_: Find a name of _application_ and destination.
//	_initiate_ _Windows Explorer_: Navigate to destination and create _application_ _directory_.
//	_create_ _Windows Explorer_: Copy all content of this _directory_ into _application_ _directory_.
//	_process_ _execute_: Open _CMD_ and navigate into _application_ _directory_.
//	_execute_ _CMD_: Enter _command_ php -S localhost:28 -t "C:\Users\devop\OneDrive\dev.bitstationary\testPHP28"
//	_switch_ _Internet Browser_: Navigate to _URL_ http://localhost:28
//	_verify_ _application_: It must be representing desired _content_.
//	_feature_ _potential_: Text demonstration of greeting _content_.
//	_seize_ _CMD_: Hit _keyboard_ _shortcut_ Ctrl+C
//	_mandatory_ _prerequisite_: Basic understanding of _Windows Explorer_, _CMD_ and _Internet Browser_.
//	_extra_ _caution_: It is a _sample_ _PHP_ test _project_ built for _basic_ .referential purpose.
//	_device_ _requirement_: 32/64 bit x86/x64 based Personal Computer/Laptop, preferential Microsoft Windows OS.
//	_system_ _default_: _computer device_, _display unit_, _keyboard_, _mouse_ or _touchpad_ and _backup electric system_.
//	_use_ _measure_: "PHP application", "Hello World program" and "Internet Website".
//	_office_ _PHP_: https://www.php.net
//
?>