<?php

declare(strict_types=1);

namespace KimSpeer\TryAlf\Components\Livewire;

use Illuminate\Contracts\View\View;
use KimSpeer\TryAlf\Components\LivewireComponent;

class FirstLivewireComponent extends LivewireComponent
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
        return view('tryalf::components.livewire.first-livewire-component');
    }
}
