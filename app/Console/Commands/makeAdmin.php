<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class makeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates an Administrator for the website';

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
        $user = new User();
        $user->name = 'Ron Hansen';
        $user->password= bcrypt('citrix170890');
        $user->email='ron.hansen112@gmail.com';
        $user->isAdmin = '1';
        $user->save();
        $this->info('Admin was succesfully created!');
    }
}
