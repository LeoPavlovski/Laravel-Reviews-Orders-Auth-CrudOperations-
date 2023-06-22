<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;

class getMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listMovies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all of the movies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $movies = Movie::all();
        if ($movies->isEmpty()) {
            $this->info('No movies found.');
        } else {
            foreach ($movies as $movie) {
                $this->line('Movie ID: ' . $movie->id);
                $this->line('Name: ' . $movie->name);
                // Display other movie details as needed...
                $this->line('-----------------------');
            }
        }
    }
}
