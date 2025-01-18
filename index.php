<?php
	require_once("include/_process_/void.php");
	require_once("include/_execute_/data.php");
	require_once("private/protected/mysql/configurationMysql.php");

	date_default_timezone_set("Asia/Kolkata");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>testPHP28</title>
		<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

<?php
	try {
		$functionToggleMessage = null;
		$functionToggleComment = null;
?>

<?php
		screenStart("testPHP28");

		// Printing greetings.
		//$functionToggleMessage = "See you soon!";
		//$functionToggleComment = "Good Bye";
		functionToggle(function () {
			tabletShow("Hello World!", "testPHP28");
		}, $functionToggleMessage, $functionToggleComment);

		screenEnd();
?>

<?php
		screenStart("MySQL");

		$mysqlURI = null;
		$mysqlDB = null;

		// Preparing MySQL URI string.
		//$functionToggleMessage = "MySQL connection establishment is overridden to escape.";
		//$functionToggleComment = "Offline";
		functionToggle(function () {
			global $configurationMysql;
			global $mysqlURI;
			$mysqlURI = "mysql:";
			$mysqlURI .= "host=" . $configurationMysql["mysql1"]["connection"]["host"];
			$mysqlURI .= ";port=" . $configurationMysql["mysql1"]["connection"]["port"];
			$mysqlURI .= ";dbname=" . $configurationMysql["mysql1"]["connection"]["DB1"]["name"];
			$mysqlURI .= ";sslmode=" . $configurationMysql["mysql1"]["connection"]["ssl"]["mode"];
			$mysqlURI .= ";sslrootcert=" . $configurationMysql["mysql1"]["connection"]["ssl"]["caCertificatePath"];
		}, $functionToggleMessage, $functionToggleComment);

		// Establishing MySQL connection.
		//$functionToggleMessage = null;
		//$functionToggleComment = null;
		functionToggle(function () {
			global $configurationMysql;
			global $mysqlURI;
			global $mysqlDB;
			if (isset($mysqlURI)) {
				$mysqlDB = new PDO($mysqlURI, $configurationMysql["mysql1"]["connection"]["username"], $configurationMysql["mysql1"]["connection"]["password"]);
			}
		}, $functionToggleMessage, $functionToggleComment);

		// Executing MYSQL query for sample.
		//$functionToggleMessage = null;
		//$functionToggleComment = null;
		functionToggle(function () {
			global $mysqlDB;
			if (isset($mysqlDB)) {
				$statement = $mysqlDB->query("SELECT VERSION()");
				tabletShow($statement->fetch()[0], aTicket("MySQL Version"));
			}
		}, $functionToggleMessage, $functionToggleComment);

		screenEnd();
?>

<?php
	}
	catch (Exception $exception) {
		tabletShow(anError($exception));
	}
?>

	</body>
</html>

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