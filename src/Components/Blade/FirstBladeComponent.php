<?php

declare(strict_types=1);

namespace KimSpeer\TryAlf\Components\Blade;

use Illuminate\Contracts\View\View;
use KimSpeer\TryAlf\Components\BladeComponent;

class FirstBladeComponent extends BladeComponent
{
    /** @var array */
    protected static $assets = ['example'];

    /** @var string|null */
    public string $first_var = "";

    public function mount(): void
    {
        // mount
    }

    public function render(): View
    {
        return view('tryalf::components.blade.first-blade-component');
    }
}
