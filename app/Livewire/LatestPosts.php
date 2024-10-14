<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class LatestPosts extends Component
{
    public $latestPosts;

    public function mount()
    {
        $this->loadLatestPosts();
    }

    public function loadLatestPosts()
    {
        $this->latestPosts = Post::published()
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.latest-posts');
    }
}