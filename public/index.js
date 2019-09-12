/**
 * A Socket.io server
 *
 */
var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    //
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});

io.on('connection', function(socket){
    console.log('connected opened');
    socket.on('disconnect', function(){
        console.log('connection closed');
    });

    socket.on('kick', function(){
        console.log('kick');
        io.emit('kick', 1);
    });

    /**
     * This code was intended for having the server submit the kick order...
     *
    //If connection is from our server (localhost)
    if(socket.remoteAddress == "::ffff:127.0.0.1") {
        socket.on('data', function(buf) {
            var js = JSON.parse(buf);
            io.emit(js.msg,js.data); //Send the msg to socket.io clients
        });
    }
    **/
});
