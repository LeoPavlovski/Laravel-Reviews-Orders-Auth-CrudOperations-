<?php

namespace App\Console\Commands;

use App\Models\Actor;
use App\Models\Agent;
use Illuminate\Console\Command;

class createActor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:actor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new actor in database';

    /**
     * Execute the console command.d
     *      'name',
    //      'nickname',
    //      'date_of_birth',
    //      'agent_id',
     */
    public function handle()
    {
        $name = $this->ask('What is the actor name?');
        //TODO CHANGE THE CHOICE TO ASK (enter is null)
        $nickname =$this->choice('Does your actor have a nickname?',["Yes", "NULL"]);
        if($nickname === 'Yes'){
            $this->ask("Enter the actor nickname");
        }
        if($nickname=== 'NULL'){
            $this->info("Your actor doesn't have a nickname");
            $nickname=NULL;
        }

        $date_of_birth=$this->ask('What is the actor birthdate?');
        $agent_ids = Agent::pluck('id')->toArray();
        if(empty($agent_ids)){
            $this->info("No Agents Found");
            return;
        }
        $agentChoices = array_map('strval',$agent_ids);
        $agentChoices = array_combine(range(1,count($agentChoices)),array_values($agentChoices));
        $agentId=  $this->choice('Pick a Agent',$agentChoices);
        $actor = Actor::create([
            'name'=>$name,
            'nickname'=>$nickname,
            'date_of_birth'=>$date_of_birth,
            'agent_id'=>$agentId
        ]);
        if(!$actor){
            $this->info("Actor can't be added to the database");
        }
        $this->info("Actor is added to the database");
    }
}
