#!/usr/bin/php
<?php
/**
 * Example two-way communication WebSocket server using websocketd

 * @author Jason Hinkle http://verysimple.com/
 * @see http://websocketd.com/
 */

date_default_timezone_set('America/Chicago');
$stdin = fopen('php://stdin', 'r');
$counter = 0;

// websocketd will kill the server when necessary so just run forever
while (true) {
	
	// lower sleep time will make the server respond faster, but is also
	// likely to consume more resources
	sleep(1);
	
	// look for input from the client
	if ($line = fgets_u($stdin)) {
		echo "You sent '" . trim($line) . "' to the server.\n";
	}
	
	// send some unsolicited output to the client
	if ($counter++ == 5) {
		echo "Heartbeat from server at " . date("H:m:s") .  ".\n";
		$counter = 0;
	}
}

/**
 * Read from STDIN without blocking or waiting for input
 * @param filehandle pointer to php://stdin'
 * @return string the input from the stream if ready, otherwise empty string
 */
function fgets_u($fh) {
	
	// the stream_select function will indicate if there is anything to read
    $read = array($fh);
	$write  = NULL;
	$except = NULL;
	$num_changed_streams = stream_select($read, $write, $except, 0);
	
    if (false === $num_changed_streams) {
        throw new Exception("Unable to watch STDIN");
    } 
	
	if ($num_changed_streams > 0) {
        return trim(fgets($fh));
    }
}
?>