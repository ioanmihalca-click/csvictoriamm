<?php
namespace App\Livewire\Blog;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public Post $post; 
    public $recommendedPosts; 
    public function mount($slug)
    {
        $this->post = Post::whereSlug($slug)->firstOrFail();
        $this->loadRecommendedPosts();

        // Track post view
        $this->post->trackView(request());
    }

    public function loadRecommendedPosts()
    {
        $this->recommendedPosts = Post::published()
            ->where('id', '!=', $this->post->id) // Exclude the current post
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.show', [
            'post' => $this->post,
            'recommendedPosts' => $this->recommendedPosts, 
        ])
        ->layout('layouts.articol-blog', ['post' => $this->post]); 
    }
}
