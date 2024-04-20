<?php

namespace app\Interfaces;

interface UserServiceInterface {
    public function updateSetting(array $setting): void;
}