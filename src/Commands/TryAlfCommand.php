<?php

namespace KimSpeer\TryAlf\Commands;

use Illuminate\Console\Command;

class TryAlfCommand extends Command
{
    public $signature = 'tryalf';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
