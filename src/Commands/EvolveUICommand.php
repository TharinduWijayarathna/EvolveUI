<?php

namespace EvolveUI\EvolveUI\Commands;

use Illuminate\Console\Command;

class EvolveUICommand extends Command
{
    public $signature = 'evolveui';

    public $description = 'EvolveUI command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
