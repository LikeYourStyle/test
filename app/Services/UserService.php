<?php

namespace app\Services;

use app\Interfaces\UserRepositoryInterface;
use app\Interfaces\UserServiceInterface;

readonly class UserService implements UserServiceInterface {

    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function updateSetting(array $setting): void {
        $this->userRepository->updateSetting($setting);
    }
}