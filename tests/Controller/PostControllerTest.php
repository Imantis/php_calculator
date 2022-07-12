<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
//        $crawler = $client->request('GET', '/');
        $crawler = $client->request('GET', '/lucky/number/100');

        $this->assertResponseIsSuccessful();
//        $this->assertSelectorTextContains('h1', 'Hello World');
        $this->assertSelectorTextContains('body', '100');
    }
}
