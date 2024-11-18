<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class UpdateUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateUserStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of inactive users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $users = User::get();
        // foreach ($users as $user) {
        //     $user->status = 1;
        //     $user->save();
        // }
    }
}
