<?php

namespace App\Http\Livewire;

use App\Entities\Biodata;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
class UserStatus extends Component
{
    // public Model $model;

    // public $field;

    // public $isActive;

    // public function mount()
    // {
    //     $this->isActive = (bool) $this->model->getAttribute($this->field);
    // }

    // public function updating($field, $value)
    // {
    //     $this->model->setAttribute($this->field, $value)->save();

    // }

    public function render()
    {
        $biodata = Biodata::get();
        return view('booth.index',[
            'biodatas' => $biodata
        ]);
        // return view('livewire.user-status',[
        //     'biodatas' => $biodata
        // ]);
    }
    public function biodataStatus($id_biodata){
        $biodata = Biodata::find($id_biodata);
        if ($biodata->status_toko == 1){
            return view('Booth.index');
        }
    }
}
