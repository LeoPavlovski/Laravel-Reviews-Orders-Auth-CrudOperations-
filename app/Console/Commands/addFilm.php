<?php

namespace App\Console\Commands;

use App\Models\Film;
use Illuminate\Console\Command;

class addFilm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:film';

    /**
     * The console command description.
     *
     * 'premier_week',
    'city',
    'formats',
    'oscar_id',
     * @var string
     */
    protected $description = 'Add a film';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oscarIds = Film::pluck('oscar_id')->toArray();
        $premier_week = $this->ask('When is the premier week?');
        $city = $this->ask('What city is taking part?');
        $formats = $this->ask("what format is this taking place");
        if(!$premier_week && !$city && !$formats){
            $this->info("No input");
        }
        $oscarChoice = array_map('strval',$oscarIds);
        $oscarChoice = array_combine(range(1, count($oscarChoice)), array_values($oscarChoice));
        $oscar= $this->choice('Pick a OscarId',$oscarChoice);

        $film = Film::create([
           'premier_week'=>$premier_week,
           'city'=>$city,
           'formats'=>$formats,
           'oscar_id'=>$oscar
        ]);
        if(!$film){
            $this->info("Film not created!");
        }
        $this->info("Film is created");

        //oscars diff logic

    }
}
