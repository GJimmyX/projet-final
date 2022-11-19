<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_route_accueil()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_route_biographies()
    {
        $response = $this->get('/biographies');

        $response->assertStatus(200);
    }

    public function test_route_photos()
    {
        $response = $this->get('/photos');

        $response->assertStatus(200);
    }

    public function test_route_contact()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_route_plan_du_site()
    {
        $response = $this->get('/plan-du-site');

        $response->assertStatus(200);
    }
    
    public function test_route_connexion_passionf1()
    {
        $response = $this->get('/connexion_passionf1');

        $response->assertStatus(200);
    }
}
