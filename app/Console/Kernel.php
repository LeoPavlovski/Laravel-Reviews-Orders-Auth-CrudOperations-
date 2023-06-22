<?php

namespace App\Console;

use App\Console\Commands\addActorMovies;
use App\Console\Commands\addDirector;
use App\Console\Commands\addOscars;
use App\Console\Commands\createActor;
use App\Console\Commands\createAgent;
use App\Console\Commands\createuser;
use App\Console\Commands\getMovies;
use App\Console\Commands\showDB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        $this->commands[] = showDB::class;
        $this->commands[]= getMovies::class;
        $this->commands[]= createuser::class;
        $this->commands[] = createActor::class;
        $this->commands[]=createAgent::class;
        $this->commands[]=addActorMovies::class;
        $this->commands[]=addDirector::class;
        $this->commands[]=addOscars::class;

        require base_path('routes/console.php');
    }
}
