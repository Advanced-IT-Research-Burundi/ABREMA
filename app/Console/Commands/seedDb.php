<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Colis;
use App\Models\User;

class seedDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        Colis::factory()->count(5)->create();
        $this->info('Database seeded successfully!');
    }
}
