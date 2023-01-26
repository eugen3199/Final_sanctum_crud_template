<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Departments Test
    public function test_if_departments_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/departments?deptName=Pre1&deptPrefixID=1');
        $response->assertStatus(201);
    }

    public function test_if_departments_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/departments?deptName=Pre1&deptPrefixID=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/departments');
        $response->assertStatus(200);
    }

    public function test_if_departments_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/departments?deptName=Pre1&deptPrefixID=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/departments/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_departments_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/departments?deptName=Pre1&deptPrefixID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/departments/'.$response['id'].'?deptName=GGWP');
        $response->assertStatus(200);
    }

    public function test_if_departments_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/departments?deptName=Pre1&deptPrefixID=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/departments/'.$response['id']);
        $response->assertStatus(200);
    }
}
