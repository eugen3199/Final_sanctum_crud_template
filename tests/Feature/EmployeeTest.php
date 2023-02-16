<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Employees Test
    public function test_if_employees_store_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-001&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');
        
        $response->assertStatus(201);
    }

    public function test_if_employees_index_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-002&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/employees');
        $response->assertStatus(200);
    }

    public function test_if_employees_show_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-003&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');
        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/employees/'.$response['id']);
        $response->assertStatus(200);
    }

    public function test_if_employees_show_Fail()
    {
       $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

       $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-004&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');
       $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->get('api/employees/100');
       $response->assertStatus(404);
    }

    public function test_if_employees_update_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-005&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->patch('api/employees/'.$response['id'].'?empName=GGWP');

        $response->assertStatus(200);
    }

    public function test_if_employees_delete_works()
    {
        $register = $this->post('api/register?name=test1&email=test1@gmail.com&password=123&password_confirmation=123');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->post('api/employees?empCardID=KBTC-006&empName=John&empPosID=1&empDeptID=1&empJoinDate=1-1-2023&empNRC=123456&empPhone=123456&empEmgcPerson=GGWP&empEmgcPhone=123456&empCampusID=1&empKey=asdzxc123123ASD&empStatus=1');

        $response = $this->withHeader('Authorization', 'Bearer ' . $register['token'])->delete('api/employees/'.$response['id']);

        $response->assertStatus(200);
    }
}
