<?php
	function aTicket(string $ticket): string {
		return $ticket;
	}

	function currentTime(): string {
		$date = date("Y/m/d h:i:s a", time());
		return $date;
	}
?>