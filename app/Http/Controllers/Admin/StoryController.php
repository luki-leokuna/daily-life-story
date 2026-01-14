<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Category;
use App\Models\StoryTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function index()
    {
        // HANYA mengambil cerita milik user yang sedang login
        $stories = Story::with('category')
            ->where($user_id =Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.admin.stories.index', compact('stories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.stories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('featured_image')) {
            $imageName = time() . '_' . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('images/stories'), $imageName);
            $validated['featured_image'] = $imageName;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');

        // OTOMATIS mencatat ID user yang sedang login sebagai pemilik cerita
        $validated['user_id'] = Auth::id();

        $story = Story::create($validated);

        if ($request->filled('tags')) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                StoryTag::create([
                    'story_id' => $story->id,
                    'tag' => trim($tag)
                ]);
            }
        }

        return redirect()->route('admin.stories.index')
            ->with('success', 'Cerita kamu berhasil diterbitkan ke komunitas!');
    }

    public function show($id)
    {
        // Memastikan hanya bisa melihat detail milik sendiri di dashboard admin
        $story = Story::with(['category', 'tags'])
            ->where($user_id =Auth::id())
            ->findOrFail($id);

        return view('pages.admin.stories.show', compact('story'));
    }

    public function edit($id)
    {
        // User lain tidak akan bisa masuk ke halaman edit cerita orang lain
        $story = Story::with('tags')
            ->where($user_id =Auth::id())
            ->findOrFail($id);

        $categories = Category::all();
        return view('pages.admin.stories.edit', compact('story', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Cari cerita milik user tersebut
        $story = Story::where($user_id =Auth::id()) ->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'tags' => 'nullable|string',
        ]);

        if ($request->hasFile('featured_image')) {
            $oldImagePath = public_path('images/stories/' . $story->featured_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $imageName = time() . '_' . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('images/stories'), $imageName);
            $validated['featured_image'] = $imageName;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');

        $story->update($validated);

        StoryTag::where('story_id', $story->id)->delete();

        if ($request->filled('tags')) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                StoryTag::create([
                    'story_id' => $story->id,
                    'tag' => trim($tag)
                ]);
            }
        }

        return redirect()->route('admin.stories.index')
            ->with('success', 'Cerita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Pastikan hanya bisa menghapus ceritanya sendiri
        $story = Story::where($user_id =Auth::id()) ->findOrFail($id);

        $imagePath = public_path('images/stories/' . $story->featured_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')
            ->with('success', 'Cerita telah dihapus dari profilmu.');
    }
}
