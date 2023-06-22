<?php

namespace App\Console\Commands;

use App\Models\Director;
use Illuminate\Console\Command;

class addDirector extends Command
{
    /**
     * The name and signature of the console command.
     *  $table->string('name');
    $table->string('surname');
    $table->string('expertise');
    $table->string('genre');
     *
     * @var string
     */
    protected $signature = 'make:director';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new director to the database';

    /**
     * Execute the console command.
     *   *  $table->string('name');
    $table->string('surname');
    $table->string('expertise');
    $table->string('genre');
     */
    public function handle()
    {
        $name = $this->ask("What is your director name ?");
        $surname = $this->ask('What is the director surname ?');
        $expertise = $this->ask("What is the expertise?");
        $genre = $this->ask("What is the genre?");

        if(!$name){
            $this->info("The name doesn't exist");
        }
        if(!$surname){
            $this->info("The surname doesnt exist");
        }
        if(!$expertise){
            $this->info("The expertise doesn't exist");
        }
        if(!$genre){
            $this->info("The genre doesn't exist");
        }
        $director = Director::create([
            'name'=>$name,
            'surname'=>$surname,
            'expertise'=> $expertise,
            'genre'=>$genre
        ]);
        if(!$director){
            $this->info("The director is invalid.");
        }
        $this->info("The director has been created");
    }
}
