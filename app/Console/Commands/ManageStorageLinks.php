<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ManageStorageLinks extends Command
{
    protected $signature = 'manage:storage-links {action}';

    protected $description = 'Create or remove symbolic links for the storage directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $action = $this->argument('action');

        if ($action === 'create') {
            $this->createStorageLink();
        } elseif ($action === 'remove') {
            $this->removeStorageLink();
        } else {
            $this->error('Invalid action. Use "create" or "remove".');
        }
    }

    private function createStorageLink()
    {
        if (is_link(public_path('storage'))) {
            $this->error('The storage link already exists.');
        } else {
            $this->laravel->make('files')->link(
                storage_path('app/public'), public_path('storage')
            );

            $this->info('The storage link has been created.');
        }
    }

    private function removeStorageLink()
    {
        if (!is_link(public_path('storage'))) {
            $this->error('The storage link does not exist.');
        } else {
            $this->laravel->make('files')->delete(public_path('storage'));

            $this->info('The storage link has been removed.');
        }
    }
}
