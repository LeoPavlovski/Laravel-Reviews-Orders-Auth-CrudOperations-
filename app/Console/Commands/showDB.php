<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;

class showDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:DB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the current Database name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //This is where i want the logic to be

        $this->info("Hello from command!");
        $databaseName =DB::connection()->getDatabaseName();
        $this->info("Your Database name is :");
        //List all of the items that we have in the MovieController
        $this->info($databaseName);
    }
}
