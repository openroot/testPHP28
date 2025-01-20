<?php
	namespace _procedure_;

	class bean {
		protected ?string $basket;
		protected ?array $stick;

		function __construct() {
			$this->basket = null;
			$this->stick = null;
		}
	}

	class beanDump extends bean {
		function __construct() {
			$this->basket = "bowl";
			$this->stick["foo"] = ["bar", "baz"];
		}
	}

	class phpCLI extends bean {
		function __construct() {
			$this->basket = php_sapi_name() !== false ? php_sapi_name() : null;
			$this->stick["argument"] = $this->terminalArguments();
		}

		private function terminalArguments(): array {
			global $argv;
			return $argv;
		}
	}

	class internetBrowser extends bean {
		function __construct() {
			$this->basket = $this->browserName();
			$this->stick["superglobal"] = $this->superglobalVariables();
		}

		private function browserName(): string {
			$userAgent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
			$browser = "Unknown Browser";
			$browsers = [
				"/msie/i" => "Internet Explorer",
				"/firefox/i" => "Firefox",
				"/safari/i" => "Safari",
				"/chrome/i" => "Chrome",
				"/edge/i" => "Edge",
				"/opera/i" => "Opera",
				"/netscape/i" => "Netscape",
				"/maxthon/i" => "Maxthon",
				"/konqueror/i" => "Konqueror",
				"/mobile/i" => "Handheld Browser"
			];
			foreach ($browsers as $regex => $value) {
				if (preg_match($regex, $userAgent)) {
					$browser = $value;
				}
			}
			return $browser;
		}

		private function superglobalVariables(): array {
			return [
				"argv" => isset ($GLOBALS["argv"]) ? $GLOBALS["argv"] : null,
				"argc" => isset ($GLOBALS["argc"]) ? $GLOBALS["argc"] : null,
				'_SERVER' => isset($_SERVER) ? $_SERVER : null,
				"_GET" => isset($_GET) ? $_GET : null,
				"_POST" => isset($_POST) ? $_POST : null,
				"_FILES" => isset($_FILES) ? $_FILES : null,
				"_COOKIE" => isset($_COOKIE) ? $_COOKIE : null,
				"_SESSION" => isset($_SESSION) ? $_SESSION : null,
				"_REQUEST" => isset($_REQUEST) ? $_REQUEST : null,
				"_ENV" => isset($_ENV) ? $_ENV : null
			];
		}
	}

	$cli = new phpCLI();
	$ib = new internetBrowser();
	$bowl = new beanDump();
?>