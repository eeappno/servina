<?php

namespace App\Enums;

enum PermissionType: string
{
    case MANGE_USERS = 'MANGE_USERS';
    case MANGE_PRODUCTS = 'MANGE_PRODUCTS';
    case MANAGE_WARRANTY = 'MANAGE_WARRANTY';
    case CLAIM_WARRANTY = 'CLAIM_WARRANTY';
    case MANAGE_SERVICES = 'MANAGE_SERVICES';
}
