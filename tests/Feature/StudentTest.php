<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Students Test
    public function test_if_students_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/students?studName=Eugene&studCardID=KBTC-001&studClassID=1&studBatchID=1&studEmgcPhone1=123456&studEmgcPhone2=123456&SchoolEmgcCall=123456&studGuardName=John&studDoB=1-1-2023&studKey=asdzxc123123ASD&studStatus=1&studQR=KBTC-001&studProfileImg=None&client=test');

        $response->assertStatus(201);
    }

    public function test_if_students_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/students?studName=Eugene&studCardID=KBTC-001&studClassID=1&studBatchID=1&studEmgcPhone1=123456&studEmgcPhone2=123456&SchoolEmgcCall=123456&studGuardName=John&studDoB=1-1-2023&studKey=asdzxc123123ASD&studStatus=1&studQR=KBTC-001&studProfileImg=None&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/students?client=test');
        $response->assertStatus(200);
    }

    public function test_if_students_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/students?studName=Eugene&studCardID=KBTC-001&studClassID=1&studBatchID=1&studEmgcPhone1=123456&studEmgcPhone2=123456&SchoolEmgcCall=123456&studGuardName=John&studDoB=1-1-2023&studKey=asdzxc123123ASD&studStatus=1&studQR=KBTC-001&studProfileImg=None&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/students/'.$response['id'].'?client=test');
        $response->assertStatus(200);
    }

    public function test_if_students_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/students?studName=Eugene&studCardID=KBTC-001&studClassID=1&studBatchID=1&studEmgcPhone1=123456&studEmgcPhone2=123456&SchoolEmgcCall=123456&studGuardName=John&studDoB=1-1-2023&studKey=asdzxc123123ASD&studStatus=1&studQR=KBTC-001&studProfileImg=None&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/students/'.$response['id'].'?studName=GGWP&client=test');
        $response->assertStatus(200);
    }

    public function test_if_students_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/students?studName=Eugene&studCardID=KBTC-001&studClassID=1&studBatchID=1&studEmgcPhone1=123456&studEmgcPhone2=123456&SchoolEmgcCall=123456&studGuardName=John&studDoB=1-1-2023&studKey=asdzxc123123ASD&studStatus=1&studQR=KBTC-001&studProfileImg=None&client=test');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/students/'.$response['id'].'?client=test');
        $response->assertStatus(200);
    }
}
