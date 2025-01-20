<?php
	namespace _procedure_;

	class command {
		public function __construct() { }

		public function run() {
			global $argv;

			if (count($argv) < 2) {
				$this->printUsage();
				exit(1);
			}

			$command = $argv[1];
			$params = array_slice($argv, 2);

			switch ($command) {
				case 'greet':
					$this->greet($params);
					break;
				default:
					echo "Unknown command: $command\n";
					$this->printUsage();
					exit(1);
			}
		}

		private function greet($params)
		{
			if (count($params) < 1) {
				echo "Usage: php interface.php greet <name>\n";
				exit(1);
			}

			$name = $params[0];
			echo "Hello, $name!\n";
		}

		private function printUsage()
		{
			echo "Usage: php interface.php <command> [params]\n";
			echo "Commands:\n";
			echo "  greet <name>  - Greet a person by name\n";
		}
	}

	$cli = new command();
	$cli->run();
?>