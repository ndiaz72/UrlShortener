<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_url()
    {
        $url = Url::create([
            'original_url' => 'https://example.com',
            'shortened_url' => 'abc123'
        ]);

        $this->assertDatabaseHas('urls', [
            'original_url' => 'https://example.com',
            'shortened_url' => 'abc123'
        ]);
    }

    /** @test */
    public function it_can_retrieve_a_url_by_shortened_url()
    {
        $url = Url::create([
            'original_url' => 'https://example.com',
            'shortened_url' => 'abc123'
        ]);

        $retrievedUrl = Url::where('shortened_url', 'abc123')->first();

        $this->assertEquals('https://example.com', $retrievedUrl->original_url);
    }
}
