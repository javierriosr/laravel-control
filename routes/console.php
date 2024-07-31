<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión exitosa';
    } catch (\Exception $e) {
        return 'Error en la conexión: ' . $e->getMessage();
    }
});
