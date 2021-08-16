<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CheckoutController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.checkout', compact('post'));
    }
}
