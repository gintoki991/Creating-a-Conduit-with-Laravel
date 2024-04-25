<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::select('id', 'title', 'aboutArticle', 'user_id')
        ->get();
        $comments = Comment::select('comment', 'article_id')
        ->get();
        $tags = tag::select('tag', 'article_id')
        ->get();
        // dd($articles);  // これにより、$articles が何を含んでいるかブラウザに表示されます。
        return view('home', compact('articles', 'comments', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        Article::create([
            'title' => $request->title,
            'aboutArticle' => $request->aboutArticle,
            'article' => $request->article,
            'user_id' => Auth::id() // 認証されたユーザーのIDを使用
        ]);

    return to_route('home.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->aboutArticle = $request->aboutArticle;
        $article->article = $request->article;
        $article->save();

        //記事 (Article) の検索と存在チェック
        $article = Article::find($id);
        if (!$article) {
            return redirect()->back()->with('error', 'Article not found.');
        }

        // タグの同期
        $tagIds = $request->tags; // タグのIDの配列がリクエストから渡されると仮定
        $article->tags()->sync($tagIds);

        //記事の編集画面にコメントの編集は載せない。記事詳細画面でコメントは編集？
        // $comment = Comment::find($article_id);
        // $comment->comment = $request->comment;
        // $comment->save();

        return to_route('articles.show', ['id' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('home.index');
    }
}
