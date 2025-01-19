<?php
	namespace _switch_;

	require_once("testPHP28/_process_/void.php");
	use _process_\html as html;

	class shelf {
		private int $id;
		private string $title;
		public ?array $storage;

		function __construct(string $title, ?array $storage = null) {
			$this->id = 0;
			$this->title = $title;
			$this->storage = $storage;
			html::screenStart($this->title);
		}

		public function __get($name): mixed {
			switch ($name) {
				case "idRecent":
					return $this->id;
				case "title":
					return $this->title;
					break;
				case "storage":
					return $this->storage;
					break;
			}
		}

		public function theBracket(string $banner): int {
			$this->id++;
			html::tabletShow("# " . $banner . " :\\\\> " . $this->title . html::lineBreak(), html::lineBreak() . "- Content " . $this->id);
			return $this->id;
		}

		function __destruct() {
			html::screenEnd();
		}
	}
?>