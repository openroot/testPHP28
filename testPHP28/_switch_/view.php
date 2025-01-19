<?php
	namespace _switch_;

	require_once("testPHP28/_process_/void.php");
	use _process_\html as html;

	class shelf {
		private int $id;
		private string $title;
		public ?array $storage;
		private string $preIndex;

		function __construct(string $title, ?array $storage = null, ?string $preIndex = null) {
			$this->id = 0;
			$this->title = $title;
			$this->storage = $storage;
			$this->preIndex = isset($preIndex) ? $preIndex : "Content";
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

		public function theBracket(string $banner, ?string $preBanner = null, ?string $delimiter  = null): int {
			$preBanner = isset($preBanner) ? $preBanner : "# ";
			$delimiter = isset($delimiter) ? $delimiter : " :\\\\\> ";
			$this->id++;
			html::tabletShow($preBanner . $banner . $delimiter . $this->title . html::lineBreak(), html::lineBreak() . "- " . $this->preIndex . " " . $this->id);
			return $this->id;
		}

		function __destruct() {
			html::screenEnd();
		}
	}
?>