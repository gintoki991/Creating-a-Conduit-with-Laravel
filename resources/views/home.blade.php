<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ConduitHome</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="//demo.productionready.io/main.css" />

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <header>
        @auth
        <!-- 認証されている -->
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">conduit</a>
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item">
                        <!-- Add "active" class when you're on that page" -->
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- 記事編集画面resources/views/articles/create.blade.phpに飛ばす -->
                        <a class="nav-link" href="{{ route('articles.create') }}"> <i class="ion-compose"></i>&nbsp;New Article </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings"> <i class="ion-gear-a"></i>&nbsp;Settings </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/eric-simons">
                            <img src="" class="user-pic" />
                            Eric Simons
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endauth
        <!-- 認証されていない -->
        @guest
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">conduit</a>
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item">
                        <!-- Add "active" class when you're on that page" -->
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Sign up</a>
                    </li>
                </ul>
            </div>
        </nav>
        @endguest
    </header>

    <!-- ホーム -->
    <div class="home-page">
        <div class="banner">
            <div class="container">
                <h1 class="logo-font">conduit</h1>
                <p>A place to share your knowledge.</p>
            </div>
        </div>

        <div class="container page">
            <div class="row">
                <div class="col-md-9">
                    <div class="feed-toggle">
                        <ul class="nav nav-pills outline-active">

                            <li class="nav-item">
                                <a class="nav-link active" href="">Global Feed</a>
                            </li>
                        </ul>
                    </div>

                    <!-- article-preview 1 -->
                    @foreach($articles as $article)
                    <div class="article-preview">
                        <div class="article-meta">
                            <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
                            <div class="info">
                                <a href="/profile/eric-simons" class="author">Eric Simons</a>
                                <span class="date">January 20th</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> 29
                            </button>
                        </div>
                        <a href="{{ route('articles.show', ['id' => $article->id ]) }}" class="preview-link">

                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->aboutArticle }}</p>

                            <span>Read more...</span>
                            <ul class="tag-list">
                                <li class="tag-default tag-pill tag-outline">{{ $article->tag }}
                                    realworld</li>
                                <li class="tag-default tag-pill tag-outline">implementations</li>
                            </ul>
                        </a>
                    </div>
                    @endforeach


                    <!-- article-preview 2 -->
                    <div class="article-preview">
                        <div class="article-meta">
                            <a href="/profile/albert-pai"><img src="http://i.imgur.com/N4VcUeJ.jpg" /></a>
                            <div class="info">
                                <a href="/profile/albert-pai" class="author">Albert Pai</a>
                                <span class="date">January 20th</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> 32
                            </button>
                        </div>
                        <a href="/article/the-song-you" class="preview-link">
                            <h1>The song you won't ever stop singing. No matter how hard you try.</h1>
                            <p>This is the description for the post.</p>
                            <span>Read more...</span>
                            <ul class="tag-list">
                                <li class="tag-default tag-pill tag-outline">realworld</li>
                                <li class="tag-default tag-pill tag-outline">implementations</li>
                            </ul>
                        </a>
                    </div>


                    <!-- pagination -->
                    <ul class="pagination">
                        <li class="page-item active">
                            <a class="page-link" href="">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">2</a>
                        </li>
                    </ul>


                </div>

                <!-- Popular Tags -->
                <div class="col-md-3">
                    <div class="sidebar">
                        <p>Popular Tags</p>

                        <div class="tag-list">
                            <a href="" class="tag-pill tag-default">programming</a>
                            <a href="" class="tag-pill tag-default">javascript</a>
                            <a href="" class="tag-pill tag-default">emberjs</a>
                            <a href="" class="tag-pill tag-default">angularjs</a>
                            <a href="" class="tag-pill tag-default">react</a>
                            <a href="" class="tag-pill tag-default">mean</a>
                            <a href="" class="tag-pill tag-default">node</a>
                            <a href="" class="tag-pill tag-default">rails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- フッター -->
    <footer>
        <div class="container">
            <a href="/" class="logo-font">conduit</a>
            <span class="attribution">
                An interactive learning project from <a href="https://thinkster.io">Thinkster</a>. Code &amp;
                design licensed under MIT.
            </span>
        </div>
    </footer>


</body>

</html>
