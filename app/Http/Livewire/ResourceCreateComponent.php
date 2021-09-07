<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Refresource;

class ResourceCreateComponent extends Component
{
    use WithPagination;
    
    public $refresource_id = 1;
    public $unit;
    public $type = 'material';
    public $count_render = 0;
    
    public function render()
    {
        $refresources = Refresource::where('type', $this->type)->get();     

        ResourceCreateComponent::update_field();

        return view('livewire.resource-create-component', compact('refresources'));
    }

    public function update_field()
    {
        $data = Refresource::find($this->refresource_id);

        try {
            $this->unit = $data->unit;
        } catch (\Throwable $th) {
            $this->unit = "";
        }        
    }
}
