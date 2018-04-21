<?php
use PHPUnit\Framework\TestCase;


class UserAgentTest extends TestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost/'
        ]);
    }

    public function testPOST()
    {
       // $bookId = uniqid();

        $response = $this->client->post('users', [
            'json' => [
                'name'    => 'sr. batata',
                'email'     => 'Mr.potato@email'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
      public function testPut(){
          $response = $this->client->put('users/1', [
            'json' => [
                'name'    => 'sr. batata_changed',
                'email'     => 'Mr.potato@email_Changed'
            ]
        ]);

        $this->assertEquals(201, $response->getStatusCode());
      }
    public function testGet()
    {
        $response = $this->client->get('users/1');



        $data = json_decode($response->getBody(), true);

//        $this->assertArrayHasKey('id', $data);
//        $this->assertArrayHasKey('name', $data);
//        $this->assertArrayHasKey('email', $data);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDelete()
    {
        $response = $this->client->delete('users/1', [
            'http_errors' => false
        ]);

        $this->assertEquals(204, $response->getStatusCode());
    }

}
?>