<?php

namespace tests\AppBundle\Tests\Entity;

use AppBundle\Entity\Exchange;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExchangeTest extends WebTestCase
{

    public function testDecimal()
    {
        $exchange = new Exchange();

        $exchange->setAmount(123.45);
        $exchange->setAmountAfterExchange(246.9);
        $exchange->setForeginCurrency('XYZ');
        $exchange->setCity('Undercity');
        $exchange->setDate(new \DateTime());

        $this->assertEquals(123.45, $exchange->getAmount());

    }
}