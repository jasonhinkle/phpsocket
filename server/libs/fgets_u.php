<?php 
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