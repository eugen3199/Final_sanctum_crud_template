<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Classes Test
    public function test_if_classes_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/classes?className=Pre1&classPrefixID=1');
        $response->assertStatus(201);
    }

    public function test_if_classes_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/classes?className=Pre1&classClassID=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/classes');
        $response->assertStatus(200);
    }

    public function test_if_classes_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/classes?className=Pre1&classPrefixID=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/classes/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_classes_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/classes?className=Pre1&classPrefixID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/classes/'.$response['id'].'?className=GGWP');
        $response->assertStatus(200);
    }

    public function test_if_classes_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/classes?className=Pre1&classPrefixID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/classes/'.$response['id']);
        $response->assertStatus(200);
    }
}
