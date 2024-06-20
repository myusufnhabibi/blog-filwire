<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    // updated + properti -> hook livewire
    // live search many request
    // public function updatedSearch()
    // {
    //     $this->dispatch('searchbox', key: $this->search);
    // }
    public function update()
    {
        $this->dispatch('searchbox', key: $this->search);
    }
    public function render()
    {
        return view('livewire.search-box');
    }
}
