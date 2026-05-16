<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:reset-password {email?} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset admin user password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?? 'admin@admin.com';
        $password = $this->option('password');

        if (!$password) {
            $password = $this->secret('Enter new password (or press Enter for default "password"):');
            if (empty($password)) {
                $password = 'password';
                $this->info('Using default password: password');
            }
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            // Create admin user if doesn't exist
            $user = User::create([
                'name' => 'Admin User',
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]);
            $this->info("Admin user created successfully!");
        } else {
            $user->password = Hash::make($password);
            $user->save();
            $this->info("Admin password reset successfully!");
        }

        $this->line("Email: {$email}");
        $this->line("Password: {$password}");
        
        return 0;
    }
}
