<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as BasePermission;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Permission extends BasePermission
{
    use Cachable;
}
