<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\NbpApiRepository;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function getExchangeRateData()
    {
        $NpbRepo = new NbpApiRepository();
        return $NpbRepo->getCurrencyExchangeData();
    }
}
