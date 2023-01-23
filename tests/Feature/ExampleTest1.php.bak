<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_if_register_works()
    {
        $response = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response->assertStatus(201);
    }

    public function test_if_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/products?name=item1&price=200');

        $response->assertStatus(201);
    }

    public function test_if_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/products');

        $response->assertStatus(200);
    }

    public function test_if_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/products?name=item1&price=200');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('/api/products/1');
        $response->assertStatus(200);
    }

    public function test_if_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/products?name=item1&price=200');
        $id = $response['id'];
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('/api/products/'.$id.'?name=test2&price=300');
        $response->assertStatus(200);
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
