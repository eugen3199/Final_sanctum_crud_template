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
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1&client=test');
        $response->assertStatus(201);
    }

    public function test_if_prefixes_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1&client=test');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/prefixes?client=test');
        $response->assertStatus(200);
    }

    public function test_if_prefixes_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1&client=test');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/prefixes/'.$response['id'].'?client=test');
        $response->assertStatus(200);
    }

    public function test_if_prefixes_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/prefixes/'.$response['id'].'?prefixName=GGWP&client=test');
        $response->assertStatus(200);
    }

    public function test_if_prefixes_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/prefixes?prefixName=Pre1&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/prefixes/'.$response['id'].'?client=test');
        $response->assertStatus(200);
    }
}
