# phpsocket
An example WebSocket chat server written in PHP (using [websocketd](http://websocketd.com/)) with bi-directional communication between the client and server.

## Installation

* Clone the repo `phpsocket` into your web root
* Ensure the web server can read/write to the file `phpsocket/server/data.txt`
* Download [websocketd](http://websocketd.com/) and unzip the binary `websocketd` to `phpsocket/bin`

## Running The Example

The provided shell script `phpsocket/start.sh` will start the WebSocket server on port 8080. (The port can be changed by editing start.sh)

Once the WebSocket server is running, open your browser to `http://localhost/phpsocket/`

CTRL+c will stop the server

##Troubleshooting

websocketd will output any errors in server.php to the terminal. 

## License

MIT