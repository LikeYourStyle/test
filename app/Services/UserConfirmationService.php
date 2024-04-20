<?php

namespace app\Services;

use app\Interfaces\NotificationSenderInterface;
use app\Interfaces\UserConfirmationServiceInterface;
use app\Models\User;
use app\Services\NotificationSenders\EmailSender;
use app\Services\NotificationSenders\PhoneSender;
use app\Services\NotificationSenders\TelegramSender;

class UserConfirmationService implements UserConfirmationServiceInterface {

    public function checkConfirmCode(User $user, string $code): bool {
        return $user->getConfirmationCode() === $code;
    }

    public function sendConfirmCode(User $user, string $notificationType): void {
        $sender = $this->getSenderByNotificationType($notificationType);

        $to = $this->getToByNotificationType($notificationType, $user);

        $code = $this->generateCode();
        $user->setConfirmationCode($code);

        $sender->send($to, 'Код подтверждения: ');
    }

    private function getSenderByNotificationType(string $notificationType): NotificationSenderInterface
    {
        return match ($notificationType) {
            'telegram' => new TelegramSender(),
            'phone' => new PhoneSender(),
            'email' => new EmailSender()
        };
    }

    private function getToByNotificationType(string $notificationType, User $user): string
    {
        return match ($notificationType) {
            'telegram' => $user->getTelegramChatId(),
            'phone' => $user->getPhone(),
            'email' => $user->getEmail()
        };
    }

    private function generateCode(): int
    {
        return rand(1000, 9999);
    }
}
