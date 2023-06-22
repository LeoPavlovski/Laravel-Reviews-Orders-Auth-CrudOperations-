<?php

namespace App\Console\Commands;

use App\Models\ActorMovie;
use Illuminate\Console\Command;

class addActorMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ActorMovie';

    /**
     * The console command description.
     *   $actor_movie = ActorMovie::create([
    'actor_id'=>$request->actor_id,
    'movie_id'=>$request->movie_id
    ]);
     *
     * @var string
     */
    protected $description = 'Add a new ActorMovie in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $actorId = $this->ask("WWhat is your actor id?");
        if(!$actorId){
            $this->info("That ActorID doesnt exist");
        }
        if($actorId){
            $this->info("ActorId Created");
        }
        $movieId =$this->ask("What is your movie id");
        //login
        $actorMovie = ActorMovie::create([
           'actor_id'=>$actorId,
           'movie_id'=>$movieId
        ]);
        if(!$actorMovie){
            $this->info("Can't Create Data for ActorMovie");
        }
        $this->info("Create Data for ActorMovie");
    }
}
