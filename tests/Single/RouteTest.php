<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * existence of important routes the app controllers rely on
     * 
     */
    public function testRoutes() 
    {

        $appURL = env('APP_URL');
        
        $urls = [
            '/',
            '/alphabet',
            '/entities',
            '/entity',
            '/entity/645', 
        ];
        
        foreach ($urls as $url) {
            $response = $this->get($url);
            $info = 'called: ' .$appURL . $url;
            $response->assertStatus(200, $info); // ! info not shown
            // !!! should 
        }
    }
}
    