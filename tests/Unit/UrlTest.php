<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_url()
    {
        $url = Url::create([
            'original_url' => 'https://senda.uy/portfolio',
            'shortened_url' => '1c0215bb'
        ]);

        $this->assertDatabaseHas('urls', [
            'original_url' => 'https://senda.uy/portfolio',
            'shortened_url' => '1c0215bb'
        ]);
    }

    /** @test */
    public function it_can_retrieve_a_url_by_shortened_url()
    {
        $url = Url::create([
            'original_url' => 'https://senda.uy/',
            'shortened_url' => '6b01aa38'
        ]);

        $retrievedUrl = Url::where('shortened_url', '6b01aa38')->first();

        $this->assertEquals('https://senda.uy/', $retrievedUrl->original_url);
    }
}
