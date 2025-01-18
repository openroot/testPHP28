<?php
	function screenStart(string $data): void {
		echo "<hr>" . $data ."<hr>";
	}

	function screenEnd(): void {
		echo "<br><br>";
	}

	function tabletShow(string $data, ?string $ticket = null): void {
		$ticket = "<b>" . (isset($ticket) ? $ticket : currentTime()) . "</b>:\\\\ ";
		echo "<br>" . $ticket . $data;
	}

	function functionToggle($function, ?string $message = null, ?string $comment = null): void {
		global $functionToggleMessage;
		global $functionToggleComment;
		if (!isset($message)) {
			try {
				call_user_func($function);
			}
			catch (Exception $exception) {
				tabletShow(anError($exception));
			}
		}
		else {
			tabletShow($message, $comment);
		}
		$functionToggleMessage = null;
		$functionToggleComment = null;
	}
?>