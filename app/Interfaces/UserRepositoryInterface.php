<?php

namespace app\Interfaces;

interface UserRepositoryInterface {
    public function updateSetting(array $settings): bool;
}