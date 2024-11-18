<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Santri;
use Livewire\WithPagination;

class SantriTable extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if (!$this->search) {
            $data =  Santri::filter(request(['ortu']))->latest()->paginate(3);
        } else {
            $data = Santri::filter(request(['ortu']))->latest()->where('nama', 'like', '%' . $this->search . '%')->paginate(3);
        };
        return view('livewire.santri-table', ["santris" => $data]);
    }
}
