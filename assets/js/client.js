/**
 * Simple WebSocket example client
 */

$(document).ready(function(){

	$('#result').append('<div>Opening WebSocket...</div>');
	var ws = new WebSocket('ws://localhost:8080/');

	/**
	 * Fires when communication is confirmed between the client and server
	 */
	ws.onopen = function() {
		$('#result').append('<div>WebSocket open.</div>');
	};

	/**
	 * Fires when communication is lost or ended between the client and server
	 */
	ws.onclose = function() {
		$('#result').append('<div>WebSocket closed.</div>');
	};

	/**
	 * Fires whenever the server echos a line
	 */
	ws.onmessage = function(event) {
		$('#result').append('<div>'+event.data+'</div>');
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
