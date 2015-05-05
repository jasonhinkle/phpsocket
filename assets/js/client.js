/**
 * Simple WebSocket example client
 */

$(document).ready(function(){

	$('#status').removeClass().addClass('alert alert-info').html('Opening WebSocket...');
	
	var ws = new WebSocket('ws://localhost:8080/');

	/**
	 * Fires when communication is confirmed between the client and server
	 */
	ws.onopen = function() {
		$('#status').removeClass().addClass('alert alert-success').html('WebSocket Open');
	};

	/**
	 * Fires when communication is lost or ended between the client and server
	 */
	ws.onclose = function() {
		$('#status').removeClass().addClass('alert alert-danger').html('WebSocket Closed');
	};

	/**
	 * Fires whenever the server echos a line
	 */
	ws.onmessage = function(event) {
		var normalized = event.data.replace(/\\n/g,'<br>');
		$('#result').html(normalized);
	};

	/**
	 * Sends the contents of the input control to the server 
	 */
	$('#send-button').on("click", function(e){
		e.preventDefault();
		ws.send( $('#message').val() );
		$('#message').val('');
	})
	
});
