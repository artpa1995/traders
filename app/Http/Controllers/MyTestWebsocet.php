<?php
namespace App\WebSocket;

use BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManager;
use BeyondCode\LaravelWebSockets\WebSockets\WebSocketHandler;
use Illuminate\Support\Facades\Log;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;

use Ratchet\MessageComponentInterface;

class MyTestWebsocet  implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $conn)
    {
        // Logic when a WebSocket connection is opened
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Logic to handle incoming WebSocket messages
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Logic when a WebSocket connection is closed
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Logic to handle WebSocket errors
    }
}
