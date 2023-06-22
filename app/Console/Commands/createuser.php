<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class createuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert user in user table';

    /**
     * Execute the console command.
     *     'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password
     */
    public function handle()
    {

        //Get user input
        $name=$this->ask('What is your name');
        $email=$this->ask('What is your email');
        $password= $this->secret("What is your password");
        $user = User::create([
           'name'=>$name,
           'email'=>$email,
           'password' =>$password
        ]);
        if(!$user){
          $this->info('Failed To submit in database');
        }
        else{
            $this->info('User Created');
        }

    }
}
