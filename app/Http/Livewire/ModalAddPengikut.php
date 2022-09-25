<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Personel;
class ModalAddPengikut extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $data['personels'] = Personel::where('is_deleted',0)
                                            ->where('nama_personel', 'like', '%'.$this->search.'%')
                                            ->paginate(10);
        return view('livewire.modal-add-pengikut', $data);
    }

    
}
