<?php

namespace KimSpeer\TryAlf\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use KimSpeer\TryAlf\TryAlfServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'KimSpeer\\TryAlf\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            TryAlfServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_tryalf_table.php.stub';
        $migration->up();
        */
    }
}
