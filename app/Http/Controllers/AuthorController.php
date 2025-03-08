<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $user) {
        return view('author', [
            'title' => 'User Posts',
            'posts' => $user->posts,
            'author' => $user->name
        ]);
    }
}
