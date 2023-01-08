<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class Converter extends Component
{
    public $amount;
    public $from;
    public $to;
    public $result;
    public $currencies = [];

    public function mount()
    {
        // Retrieve the list of supported currencies from the API
        $client = new Client();
        $response = $client->get('https://openexchangerates.org/api/currencies.json');
        $data = json_decode($response->getBody()->getContents(), true);
        $this->currencies = $data;
    }

    public function convert()
    {
        $this->validate([
            'amount' => 'required|numeric',
            'from' => 'required|alpha|size:3',
            'to' => 'required|alpha|size:3',
        ]);

        $client = new Client();
        $response = $client->request('GET', 'https://openexchangerates.org/api/latest.json', [
            'query' => [
                'app_id' => '526cc9165f7f42e5a7e60a0fdd15b8ad',
            ],
        ]);
        $data = json_decode($response->getBody(), true);

        $exchangeRates = $data['rates'];

        $this->result = round($this->amount * $exchangeRates[$this->to] / $exchangeRates[$this->from], 2);
    }

    public function render()
    {
        return view('livewire.converter');
    }
}
