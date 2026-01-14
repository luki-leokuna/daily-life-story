<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // Mengambil cerita milik user tersebut dengan pagination
        $stories = $user->stories()->latest()->paginate(9);

        return view('pages.profile', compact('user', 'stories'));
    }
}
