<?php

namespace tests\Verify;

use app\Models\User;
use app\Services\UserConfirmationService;
use PHPUnit\Framework\TestCase;

class UserVerifyTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('1555555', '89999999999', 'test@email.com');
    }

    public function testVerificationConfirmationCodeByTelegram()
    {
        $this->user->setConfirmationCode('8888');
        $userVerify = new UserConfirmationService();
        $userVerify->sendConfirmCode($this->user, 'telegram');

        $isSuccess = $userVerify->checkConfirmCode($this->user, '8888');
        $this->assertTrue($isSuccess);

        // Дальше если придёт true обновляем через UserService
    }

    public function testVerificationConfirmationCodeByPhone()
    {
        $this->user->setConfirmationCode('8888');
        $userVerify = new UserConfirmationService();
        $userVerify->sendConfirmCode($this->user, 'phone');

        $isSuccess = $userVerify->checkConfirmCode($this->user, '8888');
        $this->assertTrue($isSuccess);
    }

    public function testVerificationConfirmationCodeByEmail()
    {
        $this->user->setConfirmationCode('8888');
        $userVerify = new UserConfirmationService();
        $userVerify->sendConfirmCode($this->user, 'email');

        $isSuccess = $userVerify->checkConfirmCode($this->user, '8888');
        $this->assertTrue($isSuccess);
    }
}
