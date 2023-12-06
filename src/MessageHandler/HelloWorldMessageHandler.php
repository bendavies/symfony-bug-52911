<?php

// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;

use App\Message\HelloWorld;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class HelloWorldMessageHandler
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(HelloWorld $message)
    {
        $this->logger->notice('Hello World!');
    }
}