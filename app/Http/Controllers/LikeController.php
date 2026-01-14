<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Story $story)
    {
        // Pastikan user sudah login melalui middleware di route
        $user = Auth::user();

        // Logika Toggle: Jika sudah like maka hapus (detach), jika belum maka tambah (attach)
        if ($story->isLikedBy($user)) {
            $story->likes()->detach($user->id);
            $isLiked = false;
        } else {
            $story->likes()->attach($user->id);
            $isLiked = true;
        }

        // Mengembalikan response JSON agar bisa dibaca oleh JavaScript
        return response()->json([
            'isLiked' => $isLiked,
            'count' => $story->likes()->count()
        ]);
    }
}

