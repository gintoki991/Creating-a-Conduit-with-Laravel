<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::select('comment')
        ->get();
        return view('home', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  // 送信されたデータをダンプして停止

        $request->validate([
            'comment' => 'required|string|max:255',
            'id' => 'required|integer',
        ]);
        // コメントを新規作成し、記事IDをセットして保存
        $comment = new Comment([
            'comment' => $request->comment,
            'article_id' => $request->id,  // 記事のIDを外部キーとしてセット?
            'user_id' => $request->user()->id,
        ]);
        $comment->save();

        //$article = Article::find($id);
        return to_route('articles.show', ['id' => $request->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        $article->comment = $request->comment;
        $article->save();

        return to_route('articles.show', ['id' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
