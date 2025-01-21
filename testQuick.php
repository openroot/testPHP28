<?php
	// Function to get Windows Event Logs
	function getWindowsEventLogs($logType = 'Application', $maxRecords = 10) {
		$command = "wevtutil qe $logType /c:$maxRecords /f:Text";
		$output = shell_exec($command);
		return $output;
	}

	// Example usage
	$logType = 'System'; // You can change this to 'Application', 'Security', etc.
	$maxRecords = 5; // Number of records to fetch
	$logs = getWindowsEventLogs($logType, $maxRecords);
	echo nl2br($logs);
?>