<?php
	namespace _procedure_\bean;

	class bean {
		protected ?string $basket;
		protected ?array $stick;

		function __construct() {
			$this->basket = null;
			$this->stick = null;
		}
	}

	class phpCLI extends bean {
		function __construct() {
			$this->basket = php_sapi_name() !== false ? php_sapi_name() : null;
			$this->stick["argument"]["value"] = $this->terminalArgumentValue();
			$this->stick["argument"]["count"] = $this->terminalArgumentCount();	
		}

		private function terminalArgumentValue(): ?array {
			global $argv;
			return $argv;
		}

		private function terminalArgumentCount(): ?int {
			global $argc;
			return $argc;
		}
	}

	class webBrowser extends bean {
		function __construct() {
			$this->basket = $this->browserName();
			$this->stick["superglobal"] = $this->superglobalValue();
		}

		private function browserName(): string {
			TODO: // This function is not working properly. Need to fix it.
			// For Edge it's showing Chrome.
			$userAgent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
			$browser = "";
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

		private function superglobalValue(): array {
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
?>