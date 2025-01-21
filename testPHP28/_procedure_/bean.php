<?php
	namespace _procedure_\bean;

	class bean {
		protected ?string $basket;
		protected ?array $stick;

		function __construct() {
			$this->basket = null;
			$this->stick = null;
		}

		public function getBasket(): ?string {
			return $this->basket;
		}

		public function getStick(): ?array {
			return $this->stick;
		}
	}

	class phpCLI extends bean {
		function __construct() {
			$this->basket = php_sapi_name() !== false ? php_sapi_name() : null;
			$this->stick["arguments"]["value"] = $this->terminalArguments();
			$this->stick["arguments"]["count"] = $this->terminalArgumentCount();
			$this->stick["server"] = isset($_SERVER) ? $_SERVER : null;
		}

		private function terminalArguments(): ?array {
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
			$this->stick["superglobals"] = $this->superglobals();
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

		private function superglobals(): array {
			return [
				"_SERVER" => isset($_SERVER) ? $_SERVER : null,
				"_GET" => isset($_GET) ? $_GET : null,
				"_POST" => isset($_POST) ? $_POST : null,
				"_FILES" => isset($_FILES) ? $_FILES : null,
				"_COOKIE" => isset($_COOKIE) ? $_COOKIE : null,
				"_SESSION" => isset($_SESSION) ? $_SESSION : null,
				"_REQUEST" => isset($_REQUEST) ? $_REQUEST : null,
				"_ENV" => isset($_ENV) ? $_ENV : null,
				"arguments" => [
					"value" => isset($GLOBALS["argv"]) ? $GLOBALS["argv"] : null,
					"count" => isset($GLOBALS["argc"]) ? $GLOBALS["argc"] : null
				]
			];
		}
	}

	// TODO: Need to fix this function.
	$className = "bean";
	if (isset($_SERVER["PHP_SELF"]) && pathinfo($_SERVER["PHP_SELF"], PATHINFO_FILENAME) === $className) {
		$phpCLI = new phpCLI();
		$webBrowser = new webBrowser();

		if ($phpCLI->getBasket() === "cli") {
			echo "[phpCLI]" . PHP_EOL;
			echo "phpCLI->getBasket(): " . $phpCLI->getBasket() . PHP_EOL;
			echo "phpCLI->getStick(): " . print_r($phpCLI->getStick(), true) . PHP_EOL;
		}
		else if ($webBrowser->getBasket() !== "") {
			echo "<pre>";
			echo "[webBrowser]" . "<br>";
			echo "webBrowser->getBasket(): " . $webBrowser->getBasket() . "<br>";
			echo "webBrowser->getStick(): " . print_r($webBrowser->getStick(), true) . "<br>";
			echo "</pre>";
		}
	}
?>