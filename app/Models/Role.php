<?php

namespace App\Models;

use Spatie\Permission\Models\Role as BaseRole;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Role extends BaseRole
{
    use Cachable;
}
