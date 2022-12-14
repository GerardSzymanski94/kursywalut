<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use App\Repositories\NbpApiRepository;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = Currency::all();

        return view('index', compact('currencies'));
    }

    public function updateExchangeRates()
    {
        $currencyRepo = new CurrencyRepository();
        try {
            $currencyRepo->updateExchangeRates();
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => true]);
        }
        return redirect()->back()->with(['success' => true]);
    }
}
