<?php

require __DIR__.'/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // 有人連線時觸發
        $this->clients->attach($conn);
        //time UTC+8
        $time = date('Y-m-d H:i:s',time()+8*60*60);
        echo "New connection from IP: {$conn->remoteAddress}    Time : {$time}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // 接收到message時觸發
        foreach ($this->clients as $client) {
            $client->send($msg); // 發送訊息給所有客戶端
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // 連線中斷時觸發
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

// 建立WebSocket伺服器
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080 // port
);

echo "Server started\n";

$server->run(); 