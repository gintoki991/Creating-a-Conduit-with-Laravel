<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::select('title', 'aboutArticle', 'article', 'tag', 'comment')
        ->get();

        return view('articles.index', compact('articles'));
    }


    public function welcome()
    {
        $articles = Article::select('id', 'title', 'aboutArticle', 'tag')
        ->get();
        // dd($articles);  // これにより、$articles が何を含んでいるかブラウザに表示されます。
        return view('welcome', compact('articles'));
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
            'tag' => $request->tag,
            'article' => $request->article,
        ]);

    return to_route('articles.index');

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
        $article->tag = $request->tag;
        //$article->comment = $request->comment;
        $article->save();

        return to_route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('articles.index');
    }
}
