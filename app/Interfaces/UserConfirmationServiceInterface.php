<?php

namespace app\Interfaces;

use app\Models\User;

interface UserConfirmationServiceInterface {
    public function checkConfirmCode(User $user, string $code): bool;

    public function sendConfirmCode(User $user, string $notificationType): void;
}