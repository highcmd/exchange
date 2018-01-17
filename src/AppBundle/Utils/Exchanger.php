<?php

namespace AppBundle\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;

class Exchanger
{
    public static function getCurrencyByCapital($capital)
    {
        try {

            $client = new Client(
                [
                    'base_uri' => 'https://restcountries.eu/rest/v2/'
                ]
            );

            $response = $client->request('GET', sprintf('capital/%s', $capital));
            $json = json_decode($response->getBody());
            return $json[0]->currencies[0]->code;
        } catch (ClientException $e) {
            echo Psr7\str($e->getRequest());
            echo Psr7\str($e->getResponse());
            return new \Exception($e);
        }

    }

    public static function convertCurrency($amount, $to)
    {

        try {
            $url = sprintf("http://finance.google.com/finance/converter?a=%s&from=PLN&to=%s", $amount, $to);
            $request = curl_init();
            $timeOut = 0;
            curl_setopt($request, CURLOPT_URL, $url);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
            curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
            $response = curl_exec($request);
            curl_close($request);

            $regularExpression = '#\<span class=bld\>(.+?)\<\/span\>#s';
            preg_match($regularExpression, $response, $finalData);
            $rate = $finalData[0];
            $rate = strip_tags($rate);
            $rate = substr($rate, 0, -4);
            return $rate;
        } catch (\Exception $e) {
            return new \Exception($e);
        }

    }

}