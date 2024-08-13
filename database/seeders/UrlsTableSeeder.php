<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Url;

class UrlsTableSeeder extends Seeder
{
    public function run()
    {
        // Insertar datos de ejemplo en la tabla 'urls'
        Url::create([
            'original_url' => 'https://google.com',
            'shortened_url' => 'dbee8df7',
        ]); 

        Url::create([
            'original_url' => 'https://youtube.com',
            'shortened_url' => 'ab97ab0b',
        ]);

    }
}
