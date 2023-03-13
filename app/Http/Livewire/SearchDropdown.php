<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{


    public $search;
    public $searchResults = [];


    public function updatedSearch($newValue)
    {


        if (strlen($this->search) > 3) {

            $this->searchResults = [];

            return;
        }

        $response = Http::get('https://itunes.apple.com/search/?term=' . $this->search . '&limit=10');

        $this->searchResults = $response->json()['results'];


        // dump($this->searchResults);

        // dd($response->json());
    }


    public function render()
    {

        return view('livewire.search-dropdown');
    }
}
