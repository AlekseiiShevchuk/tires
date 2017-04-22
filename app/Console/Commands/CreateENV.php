<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateENV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create env file';

    /**
     * Create a new command instance.
     *
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
        if (file_exists('.env.docker'))
            rename('.env.docker', '.env');
    }
}
