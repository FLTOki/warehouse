<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Post $post)
    {
        $post = Post::where('id', 'user_id')->orderBy('title')->paginate(6);

        return view('admins.posts.showPosts', ['posts' => $post]);
    }

    public function show(Post $post)
    {
        return view('admins.posts.editPosts', [
            'post' => $post,
            'allPosts' => Post::all()
        ]);

    }

    public function update(Request $request, Post $post)
    {

        $request->validate([
            'id' => 'required'
        ]);

        $post->update( $request->only(['id']));
        return redirect(route('admins.posts.showPosts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete( );

        return redirect(route('admins.posts.showPosts'))->withSuccess('Role deleted successfully');
    }
}
