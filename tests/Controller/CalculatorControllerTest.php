<?php

namespace App\Tests\Controller;

use App\Entity\CalculatorRecord;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testCalculatorView(): void
    {
        $client = static::createClient();
        $client->request('GET', '/calculator');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Last records');
    }

    public function testCalculatorRecordCreate(): void
    {
        $client = static::createClient();
        $client->xmlHttpRequest('POST', '/calculator/create_record', ['record' => '1337']);

        $this->assertResponseIsSuccessful();

        //Get last CalculatorRecords
        $calculatorRecord = $client->getContainer()->get('doctrine')->getRepository(CalculatorRecord::class)->getRecords()[0];
        $this->assertEquals('1337', $calculatorRecord->getRecord());
    }

}
