<?php

namespace Tests\AppBundle\Utils;

use AppBundle\Utils\Exchanger;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExchangerTest extends WebTestCase
{
    public function testPLN()
    {

     $currency = Exchanger::getCurrencyByCapital('Warsaw');
     $this->assertEquals('PLN', $currency);

    }
}
