<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BatchTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Batches Test
    public function test_if_batches_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/batches?batchName=Pre1&batchClassID=1');
        $response->assertStatus(201);
    }

    public function test_if_batches_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/batches?batchName=Pre1&batchClassID=1&client=test');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/batches&client=test');
        $response->assertStatus(200);
    }

    public function test_if_batches_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/batches?batchName=Pre1&batchClassID=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/batches/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_batches_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/batches?batchName=Pre1&batchClassID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/batches/'.$response['id'].'?batchName=GGWP');
        $response->assertStatus(200);
    }

    public function test_if_batches_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/batches?batchName=Pre1&batchClassID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/batches/'.$response['id']);
        $response->assertStatus(200);
    }
}
