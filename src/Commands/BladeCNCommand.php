<?php

namespace BladeCN\BladeCN\Commands;

use Illuminate\Console\Command;

class BladeCNCommand extends Command
{
    public $signature = 'bladecn';

    public $description = 'BladeCN command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
