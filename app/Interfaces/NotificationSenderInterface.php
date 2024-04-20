<?php

namespace app\Interfaces;

interface NotificationSenderInterface {
    public function send(string $to, string $message);
}