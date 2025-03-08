<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $user) {
        return view('posts', [
            'title' => "Post By Author: $user->name",
            'posts' => $user->posts->load('category', 'user'),
        ]);
    }
}
