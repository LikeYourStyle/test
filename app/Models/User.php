<?php

namespace app\Models;

class User
{
    private string $id;
    private string $confirmationCode;
    private string $telegramChatId;
    private string $phone;
    private string $email;

    public function __construct(string $telegramChatId = '', string $phone = '', string $email = '')
    {
        $this->telegramChatId =$telegramChatId;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getConfirmationCode(): string
    {
        return $this->confirmationCode;
    }

    public function setConfirmationCode(string $confirmationCode): void
    {
        // TODO: Можно Сохранять в кэше
        $this->confirmationCode = $confirmationCode;
    }

    public function getTelegramChatId(): string
    {
        return $this->telegramChatId;
    }


    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}