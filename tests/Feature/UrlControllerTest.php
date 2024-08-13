<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class UrlControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_url()
    {
        // Define the original URL to send
        $originalUrl = 'https://example.com';

        // Send a POST request to the store endpoint
        $response = $this->post(route('url.store'), [
            'original_url' => $originalUrl
        ]);

        // Assert that the response is a redirect with status 302
        $response->assertRedirect(route('url.create'));

        // Assert that the URL has been added to the database
        $this->assertDatabaseHas('urls', [
            'original_url' => $originalUrl
        ]);

        // Assert that a success message is set in the session
        $response->assertSessionHas('success', 'URL created successfully!');
    }

    /** @test */
    public function it_shows_an_error_when_storing_a_duplicate_url()
    {
        // Create a URL in the database
        Url::create([
            'original_url' => 'https://example.com',
            'shortened_url' => 'abc123'
        ]);

        // Send a POST request with the same URL
        $response = $this->post(route('url.store'), [
            'original_url' => 'https://example.com'
        ]);

        // Assert that the response is a redirect with status 302
        $response->assertRedirect(route('url.create'));

        // Assert that no duplicate URL was created in the database
        $this->assertDatabaseCount('urls', 1);

  
    }
}
