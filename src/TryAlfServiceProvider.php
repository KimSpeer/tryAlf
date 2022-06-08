<?php

declare(strict_types=1);

namespace KimSpeer\TryAlf;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use KimSpeer\TryAlf\Commands\TryAlfCommand;
use KimSpeer\TryAlf\Components\BladeComponent;
use KimSpeer\TryAlf\Components\LivewireComponent;

class TryAlfServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('tryalf')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_tryalf_table')
            ->hasCommand(TryAlfCommand::class);
    }

    public function boot()
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootLivewireComponents();
        $this->bootDirectives();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tryalf');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('tryalf.prefix', '');
            $assets = config('tryalf.assets', []);

            /** @var BladeComponent $component */
            foreach (config('tryalf.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);

                $this->registerAssets($component, $assets);
            }
        });
    }

    private function bootLivewireComponents(): void
    {
        if (! class_exists(Livewire::class)) {
            return;
        }

        $prefix = config('tryalf.prefix', '');
        $assets = config('tryalf.assets', []);

        /** @var LivewireComponent $component */
        foreach (config('tryalf.livewire', []) as $alias => $component) {
            $alias = $prefix ? "$prefix-$alias" : $alias;

            Livewire::component($alias, $component);

            $this->registerAssets($component, $assets);
        }
    }

    private function registerAssets($component, array $assets): void
    {
        foreach ($component::assets() as $asset) {
            $files = (array) ($assets[$asset] ?? []);

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.css');
            })->each(function (string $style) {
                TryAlf::addStyle($style);
            });

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.js');
            })->each(function (string $script) {
                TryAlf::addScript($script);
            });
        }
    }

    private function bootDirectives(): void
    {
        Blade::directive('TryAlfStyles', function (string $expression) {
            return "<?php echo KimSpeer\\TryAlf\\TryAlf::outputStyles($expression); ?>";
        });

        Blade::directive('TryAlfScripts', function (string $expression) {
            return "<?php echo KimSpeer\\TryAlf\\TryAlf::outputScripts($expression); ?>";
        });
    }
}
