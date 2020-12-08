<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePageTest()
    {
        $response = $this->get('/');

        $response->assertSee('Recent Blogs');
    }

    public function testLoginPageTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testRegisterPageTest()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
