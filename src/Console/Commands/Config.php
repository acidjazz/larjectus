<?php

namespace Larjectus\Console\Commands;

use Illuminate\Console\Command;

class Config extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larjectus:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return the current stacked config in JSON';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line(json_encode(config()->all(), JSON_PRETTY_PRINT));
    }
}
