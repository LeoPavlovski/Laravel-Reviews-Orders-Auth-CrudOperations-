<?php

namespace App\Console\Commands;

use App\Models\Premier;
use Illuminate\Console\Command;

class addPremier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:Premier';

    /**
     * The console command description.
     *  'first_week',
    'city',
    'formats',
    'premier_id',
     * @var string
     */
    protected $description = 'Adds a premier';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $first_week =$this->ask('add first week');
        $city= $this->ask("add a city");
        $formats = $this->ask("add a format");

        //Retrieve the elements for the premier_id

        $premiersIds = Premier::pluck('premier_id')->toArray();

        $premierChoice = array_map('strval',$premiersIds);
        $premierChoice = array_combine(range(1, count($premierChoice)), array_values($premierChoice));
        $premier= $this->choice('Premier Id ',$premierChoice);
        $premiers = Premier::create([
           'first_week'=>$first_week,
            'city'=>$city,
            'formats'=>$formats,
            'premier_id'=>$premier
        ]);
        if(!$premiers) {
            $this->info("Premier has not been added.");
        }
        $this->info("Premier has been added to the database");
    }
}
