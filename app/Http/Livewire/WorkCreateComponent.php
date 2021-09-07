<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Refwork;
use Livewire\WithPagination;
use App\Work;

class WorkCreateComponent extends Component
{
    use WithPagination;

    public $refwork_id = 1;
    public $unit;

    public function render()
    {
        $refworks = Refwork::all();

        WorkCreateComponent::update_field();

        return view('livewire.work-create-component', compact('refworks'));
    }

    public function update_field()
    {
        $data = Refwork::find($this->refwork_id);

        try {
            $this->unit = $data->unit;
        } catch (\Throwable $th) {
            $this->unit = "";
        }        
    }
}