<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Campuses Test
    public function test_if_campuses_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/campuses?campusName=Pre1');
        $response->assertStatus(201);
    }

    public function test_if_campuses_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/campuses?campusName=Pre1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/campuses');
        $response->assertStatus(200);
    }

    public function test_if_campuses_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/campuses?campusName=Pre1');
        
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/campuses/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_campuses_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/campuses?campusName=Pre1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/campuses/'.$response['id'].'?campusName=GGWP');
        $response->assertStatus(200);
    }

    public function test_if_campuses_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/campuses?campusName=Pre1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/campuses/'.$response['id']);
        $response->assertStatus(200);
    }
}
