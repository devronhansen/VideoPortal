<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DropAllTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DropAllTables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test';

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
        foreach (\DB::select('SHOW TABLES') as $table) {
            $table_array = get_object_vars($table);
            \Schema::drop($table_array[key($table_array)]);
        }
        if (\DB::select('SHOW TABLES') == null) {
            $this->info('Success! All Tables have been dropped');
        } else {
            $this->error('Something went wrong. Tables still exists');
        }
    }
}
