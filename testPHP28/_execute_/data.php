<?php
	function aTicket(string $ticket): string {
		return $ticket;
	}

	function anError(Exception $exception): string {
		return "<br><i>Error[</i><br>" . $exception->getMessage() . "<br><i>]</i>";
	}

	function currentTime(): string {
		$date = date("Y/m/d h:i:s a", time());
		return $date;
	}
?>