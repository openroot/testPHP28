<?php
	namespace _process_;

	class setting {
		const timeZone = [
			"UTC" => "UTC",
			"India" => "Asia/Kolkata",
			"New York" => "America/New_York"
		];
		public static function updateTimeZone(string $timeZone = self::timeZone["India"]): void {
			date_default_timezone_set($timeZone);
		}
	}

	class html {
		public static function flatShow(string $data): void {
			echo $data;
		}

		public static function tabletShow(string $data, ?string $ticket = null): void {
			$ticket = "<b>" . (isset($ticket) ? $ticket : currentTime()) . "</b>:\\\\ ";
			echo "<br>" . $ticket . $data;
		}

		public static function screenStart(string $data): void {
			echo "<hr>" . $data ."<hr>";
		}

		public static function screenEnd(): void {
			echo "<br><br>";
		}
	}

	class verbose {
		public function printHeader(): void {
			html::flatShow('
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<title>testPHP28</title>
						<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="css/style.css">
					</head>
					<body>
			');
		}

		public function printFooter(): void {
			html::flatShow('
					</body>
				</html>
			');
		}
	}

	class feature {
		public static function functionToggle($name, ?bool $on = null, ?string $message = null, ?string $comment = null): void {
			if (isset($on) && $on === false) {
				if (isset($message)) {
					html::tabletShow($message, $comment);
				}
				else {
					html::tabletShow("Inactive", "Status");
				}
			}
			else {
				try {
					call_user_func($name);
				}
				catch (Exception $exception) {
					html::tabletShow(html::anError($exception));
				}
			}
		}
	}
?>