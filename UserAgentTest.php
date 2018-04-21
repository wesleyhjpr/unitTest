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

        $response = $this->client->post('RestApi/public/index.php/users', [
            'json' => [
                'name'    => 'sr. batata',
                'email'     => 'Mr.potato@email'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
      public function testPut(){
          $response = $this->client->put('RestApi/public/index.php/users/12', [
            'json' => [
                'name'    => 'sr. batata_changed',
                'email'     => 'Mr.potato@email_Changed'
            ]
        ]);

        $this->assertEquals(201, $response->getStatusCode());
      }
    public function testGet()
    {
        $response = $this->client->get('RestApi/public/index.php/users/1');

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('email', $data);
    }

    public function testDelete()
    {
        $response = $this->client->delete('RestApi/public/index.php/users/13', [
            'http_errors' => false
        ]);

        $this->assertEquals(204, $response->getStatusCode());
    }

}
?>