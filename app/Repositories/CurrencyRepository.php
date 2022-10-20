<?php

namespace App\Repositories;

use App\Models\Currency;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class CurrencyRepository.
 */
class CurrencyRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Currency::class;
    }

    public function updateExchangeRates()
    {
        $NpbRepo = new NbpApiRepository();
        $currencyRates = $NpbRepo->getCurrencyExchangeData();

        if (!isset($currencyRates[0]) || !isset($currencyRates[0]['rates'])) {
            return false;
        }

        foreach ($currencyRates[0]['rates'] as $currencyRate) {
            Currency::updateOrCreate([
                'currency_code' => $currencyRate['code']
            ], [
                'name' => $currencyRate['currency'],
                'exchange_rate' => $currencyRate['mid']
            ]);
        }
        return true;
    }
}
