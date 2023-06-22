<?php

namespace App\Console\Commands;

use App\Models\Actor;
use App\Models\Oscar;
use Illuminate\Console\Command;

class addOscars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:oscar';

    /**
     * The console command description.
    'role'=>$request->role,
    'year'=>$request->year,
    'actor_id'=>$request->actor_id,     *
     * @var string
     */
    protected $description = 'Adds a new oscar in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //logic
        $role = $this->ask('What is the role');
        $year = $this->ask('What is the year?');

        if(!$role){
            $this->info('role not typed');
        }
        if(!$year){
            $this->info('year not typed');
        }
        //Choice
          $actor_ids = Actor::pluck('id')->toArray();

        if(empty($actor_ids)){
            $this->info("No Actors Found");
            return;
        }
        //we are getting them as mapped (array)
        $actorChoices = array_map('strval',$actor_ids);

        //use this to print the oscarChoices
        $actorChoices = array_combine(range(1, count($actorChoices)),array_values($actorChoices));

            $oscar = Oscar::create([
                'role'=>$role,
                'year'=>$year,
//                Now we need to check about the oscar_id because it's going to be a choice
                'actor_id'=>1
            ]);
            if(!$oscar){
                $this->info("The oscar doesn't exist");
            }
            $this->info("Oscar has been created");
    }
}
