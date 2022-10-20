<?php

namespace App\Repositories;


/**
 * Class NbpApiRepository.
 */
class NbpApiRepository
{
    public function getCurrencyExchangeData()
    {
        $host = "http://api.nbp.pl/api/exchangerates/tables/a/";

        return $this->getData($host);
    }

    private function getData($host)
    {
        ini_set('max_execution_time', 360000);

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $result = curl_exec($ch);
        return json_decode($result, true);;
    }
}
