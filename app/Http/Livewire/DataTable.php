<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{

    use WithPagination;


    public $active = true;




    public function render()
    {

        return view('livewire.data-table', [

            'users' => User::where('active', $this->active)->paginate(5),

        ]);
    }


    // public function paginationView()
    // {
    //     return 'livewire.custom-pagination-links-view';
    // }
}
