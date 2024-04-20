<?php

namespace app\Repositories;

use app\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function updateSetting(array $settings): bool {
        // Тут запрос на обновление User
        // $user = User::query()->where('id', 1)->first();
    }
}