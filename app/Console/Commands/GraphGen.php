<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GraphGen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = ' graph:gen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command should create a random graph with $nbNodes nodes and random relations';

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
