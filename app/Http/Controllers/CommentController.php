<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Remove the specified comment from the database.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}