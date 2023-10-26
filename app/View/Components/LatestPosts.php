<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestPosts extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     */
    public function __construct($number)
    {
        $this->posts = Post::orderBy('created_at','DESC')
            ->take($number)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-posts');
    }
}
