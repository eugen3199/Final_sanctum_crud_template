<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PositionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Positions Test
    public function test_if_positions_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/positions?posName=Pre1&client=test');
        $response->assertStatus(201);
    }

    public function test_if_positions_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/positions?posName=Pre1&client=test');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/positions?client=test');
        $response->assertStatus(200);
    }

    public function test_if_positions_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/positions?posName=Pre1&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/positions/'.$response['id'].'?posName=GGWP&client=test');
        $response->assertStatus(200);
    }

    public function test_if_positions_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/positions?posName=Pre1&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/positions/'.$response['id'].'?client=test');
        $response->assertStatus(200);
    }
}
