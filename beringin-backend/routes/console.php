<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:seed-anis', function () {
    require_once database_path('seeders/DatabaseSeeder.php');
    (new \Database\Seeders\DatabaseSeeder())->run();
    $this->info('Anis database seeded successfully!');
});
