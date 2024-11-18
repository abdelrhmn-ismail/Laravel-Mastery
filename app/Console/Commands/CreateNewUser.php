<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Str;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateNewUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new record at user table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $newUser = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
