<?php

namespace App\Console\Commands;

use App\Actions\GenerateRandomPassword;
use App\Mail\UserPasswordMail;
use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\text;

#[Signature('app:create-user
    {--name= : The name of the admin user. Prompts interactively when omitted}
    {--email= : The email of the admin user. Prompts interactively when omitted}
    {--password= : The password of the admin user. Generates a random password and emails it when omitted}
    {--length=8 : The length of the generated password when no password is provided}')]
#[Description('Create or update the first admin user of the application')]
class CreateUser extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name') ?: text('What is the name of the admin user?', required: true);

        $email = $this->option('email') ?: text('What is the email of the admin user?', required: true);

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->components->error("Invalid email [$email].");

            return self::FAILURE;
        }

        $password = $this->option('password') ?: app(GenerateRandomPassword::class)->handle((int) $this->option('length'));

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->forceFill([
                'name' => $name,
                'password' => $password,
                'role' => User::ROLE_USER,
            ])->save();

            $this->components->info("Admin user [$email] updated successfully.");
        } else {
            $user = User::query()->forceCreate([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => User::ROLE_USER,
            ]);
            $user->email_verified_at = Carbon::now();
            $user->save();

            $this->components->info("Admin user [$email] created successfully.");
        }

        Mail::to($user)->send(new UserPasswordMail($user, $password));

        $this->components->info("Password sent to [$email].");

        return self::SUCCESS;
    }
}
