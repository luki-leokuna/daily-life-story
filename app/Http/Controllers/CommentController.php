<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $storyId)
    {
        $request->validate([
            'body' => 'required|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'story_id' => $storyId,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
