<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortIon extends Component
{


    public $field;
    public $sortField;
    public $sortAsc;

    public function __construct($field, $sortField, $sortAsc)
    {
        $this->field = $field;
        $this->sortField = $sortField;
        $this->sortAsc = $sortAsc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.sort-ion');
    }
}
