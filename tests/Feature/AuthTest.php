<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Authentication Test
    public function test_if_register_works()
    {
        $response = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response->assertStatus(201);
    }

    public function test_if_logout_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/logout');
        $response->assertStatus(200);
    }

    public function test_if_login_works(Type $var = null)
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/logout');
        $login = $this->post('api/login?email=test1@gmail.com&password=123');
        $response->assertStatus(200);
    }
}
