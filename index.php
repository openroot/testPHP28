<?php
	require_once("testPHP28/_initiate_/private/public.php");
	require_once("testPHP28/_initiate_/private/protected.php");
	require_once("testPHP28/_process_/void.php");
	require_once("testPHP28/_switch_/view.php");
?>

<?php
	try {
		_process_\setting::updateTimeZone(_process_\setting::timeZone["India"]);
		$verbose = new _process_\verbose();
		$verbose->printHeader(
			"Prepaid PHP",
			'<div style="display: flex; justify-content: center; align-items: center; border: 3px solid #FFF842; padding: 8px;">Say it, <h4>Prepaid PHP</h4></div>'
		);
	}
	catch (Exception $exception) {
		_process_\html::tabletShow(anError($exception));
	}
?>

<?php
	$shelf = new _switch_\shelf(
		"testPHP28", [
			"foo" => '"Foo Bar"'
		],
		"Index"
	);
	$shelf->theBracket("Showing greetings.", "---#--- ", " :\\\\\> &#x2665 ");
	_process_\feature::functionToggle(
		function () {
			_process_\html::tabletShow("Hello World!", "testPHP28");
			_process_\html::tabletShow("At the left side you can see the current date & time. Surprise yourself with PHP development onwards. Thank you!");
		},
		true,
		"See you soon!",
		"Good Bye"
	);
	$shelf->theBracket("Printing storage contents.");
	_process_\feature::functionToggle(
		function () use ($shelf) {
			_process_\html::tabletPre($shelf->storage);
			_process_\html::tabletShow("Here you are.");
		},
		true
	);
	$shelf = null;
?>

<?php
	$shelf = new _switch_\shelf(
		"MySQL DATABASE", [
			"credential" => $configuration["mysql1"]["credential"],
			"URI" => null,
			"DB" => null
		]
	);
	$shelf->theBracket("Establishing MySQL connection.");
	_process_\feature::functionToggle(
		function () use ($shelf) {
			$credential = $shelf->storage["credential"];
			$URI = "mysql:";
			$URI .= "host=" . $credential["host"];
			$URI .= ";port=" . $credential["port"];
			$URI .= ";dbname=" . $credential["DB1"]["name"];
			$URI .= ";sslmode=" . $credential["ssl"]["mode"];
			$URI .= ";sslrootcert=" . $credential["ssl"]["caCertificatePath"];
			$shelf->storage["URI"] = $URI;
			$shelf->storage["DB"] = new PDO($URI, $credential["username"], $credential["password"]);
		},
		true,
		"MySQL connection establishment is overridden to escape.",
		"Offline"
	);
	$shelf->theBracket("Executing MYSQL query for sample.");
	_process_\feature::functionToggle(
		function () use ($shelf) {
			$DB = $shelf->storage["DB"];
			$statement = $DB->query("SELECT VERSION()");
			_process_\html::tabletShow($statement->fetch()[0], aTicket("MySQL Version"));
		},
		true,
		null,
		null
	);
	$shelf = null;
?>

<?php
	/*
	$shelf = new _switch_\shelf(
		"Design Ground"
	);
	$shelf->theBracket("IJKL.");
	$shelf->theBracket("MNOP.");
	$shelf = null;
	*/
?>

<?php
	/*
	$shelf = new _switch_\shelf(
		"API Ground"
	);
	$shelf->theBracket("QRST.");
	$shelf->theBracket("UVWX.");
	$shelf = null;
	*/
?>

<?php
	$shelf = new _switch_\shelf(
		"About testPHP28"
	);
	_process_\html::tabletShow("Yak", "Y");
	_process_\html::tabletShow("Zoo", "Z");
	$shelf = null;
?>

<?php
	try {
		$verbose->printFooter('
			<div style="display: flex; justify-content: center; align-items: center; border: 3px solid #FFF842; padding: 8px;">
				<a href="https://github.com/openroot/testPHP28" target="_blank">Download it from <b>Github</b></a>
				<span style="padding: 0 5px;"></span>
				Copyright&copy; - 2025
			</div>
		');
	}
	catch (Exception $exception) {
		_process_\html::tabletShow(anError($exception));
	}
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