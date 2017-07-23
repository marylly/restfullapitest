<?php

namespace Tests\Functional;
use App\Controllers as Controllers;

class UserRESTFullAPITest extends BaseTestCase
{
    public function testGetAllUsers() {
        $response = $this->runApp('GET', '/users');
        
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUser() {
        $response = $this->runApp('GET', '/user/1');
        
        $this->assertEquals(200, $response->getStatusCode());
    }

    // public function testNewUser() {
    //     $response = $this->runApp('POST', '/user/new');
        
    //     $this->assertEquals(200, $response->getStatusCode());
    // }
}