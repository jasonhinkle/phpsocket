#!/usr/bin/php
<?php
/**
 * Example two-way communication WebSocket server using websocketd

 * @author Jason Hinkle http://verysimple.com/
 * @see http://websocketd.com/
 */

require_once 'fgets_u.php';
date_default_timezone_set('America/Chicago');
$stdin = fopen('php://stdin', 'r');
$data = '';

// websocketd kills the server when necessary so just loop forever
while (true) {
	
	// check for input from the client
	if ($line = fgets_u($stdin)) {
		file_put_contents('server/data.txt', strip_tags(trim($line)) . "\n", FILE_APPEND);
	}
	
	// if any changes are received from this or any client, publish it to the client
	$newData = file_get_contents('server/data.txt');
	
	if ($newData != $data) {
		$data = $newData;
		echo str_replace("\n", "\\n", $data) . "\n";
	}
	
	// add a slight delay to avoid hamering the server
	usleep(.25 * 1000000);
	
}