<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categorySlug = $request->input('category');

        $query = Story::with('category')->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('excerpt', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $featuredStory = Story::where('is_featured', true)->latest()->first();
        $stories = $query->paginate(12);
        $categories = Category::withCount('stories')->get();

        return view('pages.home', compact('stories', 'featuredStory', 'categories', 'search', 'categorySlug'));
    }

    public function show($slug)
    {
        $story = Story::with(['category', 'tags'])->where('slug', $slug)->firstOrFail();
        
        $story->increment('views');

        $relatedStories = Story::where('category_id', $story->category_id)
            ->where('id', '!=', $story->id)
            ->limit(3)
            ->get();

        return view('pages.story-detail', compact('story', 'relatedStories'));
    }
}