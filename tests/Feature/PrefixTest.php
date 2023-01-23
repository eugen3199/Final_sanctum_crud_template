<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrefixTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Prefixes Test
    public function test_if_prefixes_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1');
        $response->assertStatus(201);
    }

    public function test_if_prefixes_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/prefixes');
        $response->assertStatus(200);
    }

    public function test_if_prefixes_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/prefixes/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_prefixes_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/prefixes/'.$response['id'].'?prefixName=GGWP');
        $response->assertStatus(200);
    }

    public function test_if_prefixes_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/prefixes/'.$response['id']);
        $response->assertStatus(200);
    }
}
