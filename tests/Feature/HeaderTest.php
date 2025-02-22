<?php

use Tests\TestCase;
use App\Models\User;

class HeaderTest extends TestCase
{

    /** @test */
    public function it_displays_the_header_correctly_for_guests()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Home');
        $response->assertSee('Bases');
        $response->assertSee('Search');
        $response->assertSee('Contact');
        $response->assertSee('Login');
        $response->assertSee('Register');
        $response->assertDontSee('Dashboard');
        $response->assertDontSee('Logout');
    }

    /** @test */
    public function it_displays_the_header_correctly_for_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee('Home');
        $response->assertSee('Bases');
        $response->assertSee('Search');
        $response->assertSee('Contact');
        $response->assertSee('Account');
        $response->assertSee('Dashboard');
        $response->assertSee('Logout');
        $response->assertDontSee('Login');
        $response->assertDontSee('Register');
    }
}