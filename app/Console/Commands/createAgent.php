<?php

namespace App\Console\Commands;

use App\Models\Agent;
use Illuminate\Console\Command;

class createAgent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:agent';

    /**
     * The console command description.
     *
     * @var string
     *    $table->string('name');
          $table->string('code');
     */
    protected $description = 'Create a new agent in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Give me your agent name ');
        if(!$name){
            $this->info("Name is null");
        }
        $code = $this->ask("Give me your agent code");

        if(!$code){
            $this->info("Code is null");
        }
        $agent = Agent::create([
            'name'=>$name,
            'code'=>$code,
        ]);
        if(!$agent){
            $this->info("Agent not created");
        }
        $this->info("Agent is created");

    }
}
