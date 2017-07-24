<?php

namespace Tests\Functional;
use App\Controllers as Controllers;

class UserRESTFullAPITest extends BaseTestCase
{
    public function testGetAllUsers() {
        $response = $this->runApp('GET', '/users');
        $body = (string)$response->getBody();
        $this->assertContains('id',$body);
        $this->assertContains('nome',$body);
        $this->assertContains('dt_cadastro',$body);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUser() {
        $response = $this->runApp('GET', '/user/1');
        $body = (string)$response->getBody();
        $this->assertContains('id',$body);
        $this->assertContains('nome',$body);
        $this->assertContains('dt_cadastro',$body);
        $this->assertEquals(200, $response->getStatusCode());
    }
}