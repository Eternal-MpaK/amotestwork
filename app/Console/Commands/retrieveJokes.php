<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Services\Retrieve;
#[Signature('api:retrieve-jokes')]
#[Description('Retrieve data from external Jokes API every 5 minutes')]
class retrieveJokes extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(Retrieve $retrieve)
    {
        try {
            $this->info('Updating DB with new joke');
            $retrieve->retrieveJokes();
            $this->info('Added new joke');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
