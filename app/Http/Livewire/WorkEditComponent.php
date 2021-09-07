<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Refwork;
use App\Work;
use Livewire\WithPagination;


class WorkEditComponent extends Component
{
    use WithPagination;

    public $refwork_id;
    public $unit;
    public $count_render = 0;

    public function render()
    {
        $refworks = Refwork::all();
        $uri = explode("/", $_SERVER["REQUEST_URI"]);
        $work = Work::find($uri[2]);

        if($this->count_render == 0)
        {
            $this->refwork_id = $work->refwork_id;
            $this->count_render += 1; 
        }
       
        WorkEditComponent::update_field();

        return view('livewire.work-edit-component', compact('refworks', 'work'));
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
