<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Location;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $locations = Location::query()
            ->join('location_post', 'locations.id', '=', 'location_post.location_id')
            ->select('locations.title', 'locations.slug', DB::raw('count(*) as total'))
            ->groupBy('locations.id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('layouts.app', compact('categories', 'locations'));
    }
}
