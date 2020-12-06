<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GraphStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command display graphs stats (display the graph meta data, number of nodes, number of relations) by graph id.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
