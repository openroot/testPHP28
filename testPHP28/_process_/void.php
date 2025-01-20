<?php
	namespace _process_;

	require_once("testPHP28/_execute_/data.php");

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
		public static function anError(\Exception $exception): string {
			return "<br><i>Error[</i><br>" . $exception->getMessage() . "<br><i>]</i>";
		}

		public static function lineBreak(): string {
			return "<br>";
		}

		public static function lineHorizontal(): string {
			return "<hr>";
		}

		private static function formatTicket(?string $ticket = null): string {
			return "<b>" . (isset($ticket) ? $ticket : currentTime()) . " <@> </b> ";
		}

		public static function flatShow(string $data): void {
			echo $data;
		}

		public static function tabletShow(string $data, ?string $ticket = null): void {
			$ticket = self::formatTicket($ticket);
			echo self::lineBreak() . $ticket . $data;
		}

		public static function tabletPre(array $data, ?string $ticket = null): void {
			$ticket = self::formatTicket($ticket);
			echo self::lineBreak() . $ticket . self::lineBreak() . self::lineBreak();
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}

		public static function screenStart(string $data): void {
			echo self::lineBreak() . self::lineBreak() . self::lineHorizontal() . $data . self::lineHorizontal();
		}

		public static function screenEnd(): void {
			echo self::lineBreak();
		}
	}

	class verbose {
		public function printHeader(?string $title = null, ?string $html = null): void {
			$title = isset($title) ? $title : "testPHP28";
			html::flatShow('
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<title>' . $title . '</title>
						<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="css/style.css">
					</head>
					<body>
			');
			if (isset($html)) {
				html::flatShow($html);
			}
		}

		public function printFooter(?string $html = null): void {
			html::flatShow(html::lineBreak() . html::lineBreak());
			if (isset($html)) {
				html::flatShow($html);
			}
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
				catch (\Exception $exception) {
					html::tabletShow(html::anError($exception));
				}
			}
		}
	}
?>