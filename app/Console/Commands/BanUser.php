<?php

namespace App\Console\Commands;

use App\Events\UserWasBanned;
use Illuminate\Console\Command;
use App\User;
class BanUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ban:user {username}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ban the user of your choice!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::where('name', $this->argument('username'))->first();
        if($user->isAdmin){
            return $this->info('You are not allowed to ban Administrators');
        }
        if(event(new UserWasBanned($user))){
            $this->info($user->name.' was succesfully banned');
        }
    }
}
