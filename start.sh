#!/bin/bash
#
# The command ulimit will indicate how many processes can be opened on this machine
#
echo Starting server...
export PATH=/Users/jason/Sites/websocket:$PATH
/Users/jason/Sites/websocket/bin/websocketd --port=8080 server.php
