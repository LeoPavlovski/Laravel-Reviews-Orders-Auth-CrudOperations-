<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class adminPromotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:AdminPromote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Admin Promotes User or Moderator';

    /**
     * Execute the console command.
     */
    //TODO FIX THIS COMMAND
    public function handle(User $user)
    {
        $users = User::all();

   // Prepare the choices for user selection
        $userChoices = $users->pluck('name', 'id')->toArray();

   // Prompt the user to select the user to promote
        $selectedUserId = $this->choice("Who do you want to promote?", $userChoices);

   // Find the user by the selected ID
        $selectedUser = $users->where('id', $selectedUserId)->first();

        if ($selectedUser) {
            // Get the list of available role choices
            $roleChoices = Role::pluck('role')->toArray();

            // Prompt the user to select the role for the selected user
            $selectedRoleId = $this->choice("Pick the role for that user", $roleChoices);

            // Update the role ID for the selected user
            $selectedUser->role_id = $selectedRoleId;
            $selectedUser->save();

            $this->info("Role for user '{$selectedUser->name}' has been updated.");
        } else {
            $this->info("Invalid user selection.");
        }
    }
}
