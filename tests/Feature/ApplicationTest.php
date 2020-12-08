<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Auth;

class ApplicationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    /** @test */
    public function redirect_to_home_page_and_logged_in_after_login()
    {
        $user = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@hotmail.com',
            'password' => '123456'
        ]);

        $response = $this->post('login', [
            'email' => 'test@hotmail.com',
            'password' => '123456'
        ]);

        $user = Auth::loginUsingId($user->id);
        $this->actingAs($user);

        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
