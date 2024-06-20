<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $searchbox = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('searchbox')]
    public function updateSearch($key)
    {
        $this->searchbox = $key;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->orderBy("published_at", $this->sort)
            ->where('title', 'like', "%{$this->searchbox}%")
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
