<?php

namespace App\Enums;

enum RoleType: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case TECHNICIAN = 'technician';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => __('Admin'),
            self::USER => __('User'),
            self::TECHNICIAN => __('Technician'),
        };
    }
}
