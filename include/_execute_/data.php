<?php
	function aTicket(string $ticket): string {
		return $ticket;
	}

	function anError(Exception $exception): string {
		return "<br>Error[<br>" . $exception->getMessage() . "<br>]";
	}

	function currentTime(): string {
		$date = date("Y/m/d h:i:s a", time());
		return $date;
	}
?>