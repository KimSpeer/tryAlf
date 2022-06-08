<?php

declare(strict_types=1);

namespace KimSpeer\TryAlf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KimSpeer\TryAlf\TryAlf
 */
class TryAlf extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'tryalf';
    }
}
