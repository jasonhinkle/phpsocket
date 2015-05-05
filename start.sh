#!/bin/bash
chmod 700 server/server.php
chmod 700 bin/websocketd
export PATH=$PWD/server:$PATH
./bin/websocketd --port=8080 server.php
