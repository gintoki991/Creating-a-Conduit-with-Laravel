<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <title>Conduit</title>
  <!-- Import Ionicon icons & Google Fonts our Bootstrap theme relies on -->
  <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="//fonts.googleapis.com/css?family=Titillium+Web:700|Source+Serif+Pro:400,700|Merriweather+Sans:400,700|Source+Sans+Pro:400,300,600,700,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Import the custom Bootstrap 4 theme from our hosted CDN -->
  <link rel="stylesheet" href="//demo.productionready.io/main.css" />

</head>

<body>

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

  <div class="article-page">
    <!-- バナー -->
    <div class="banner">
      <div class="container">
        <!-- タイトルtitle -->
        <h1>
          {{ $article->title }}
        </h1>

        <div class="article-meta">
          <a href="/profile/eric-simons"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
          <div class="info">
            <a href="/profile/eric-simons" class="author">Eric Simons</a>
            <span class="date">January 20th</span>
          </div>
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-plus-round"></i>
            &nbsp; Follow Eric Simons <span class="counter">(10)</span>
          </button>
          &nbsp;&nbsp;
          <button class="btn btn-sm btn-outline-primary">
            <i class="ion-heart"></i>
            &nbsp; Favorite Post <span class="counter">(29)</span>
          </button>

          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-edit"></i> Edit Article
          </button>

          <button class="btn btn-sm btn-outline-danger">
            <i class="ion-trash-a"></i> Delete Article
          </button>
        </div>
      </div>
    </div>

    <!-- コンテナ -->
    <div class="container page">
      <div class="row article-content">
        <div class="col-md-12">
          <!-- 記事についてaboutArticle -->
          <p>
            {{ $article->aboutArticle }}
          </p>
          <!-- 記事article -->
          <h2 id="introducing-ionic">
            {{ $article->aboutArticle }}
          </h2>
          <p>
            {{ $article->article }}
          </p>
          <ul class="tag-list">
            <li class="tag-default tag-pill tag-outline">realworld</li>
            <li class="tag-default tag-pill tag-outline">implementations</li>
          </ul>
        </div>
      </div>

      <hr />

      <!-- article-actions -->
      <div class="article-actions">
        <div class="article-meta">
          <a href="profile.html"><img src="http://i.imgur.com/Qr71crq.jpg" /></a>
          <div class="info">
            <a href="" class="author">Eric Simons</a>
            <span class="date">January 20th</span>
          </div>

          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-plus-round"></i>
            &nbsp; Follow Eric Simons
          </button>
          &nbsp;
          <button class="btn btn-sm btn-outline-primary">
            <i class="ion-heart"></i>
            &nbsp; Favorite Article <span class="counter">(29)</span>
          </button>

          <!-- <form method="get" action="{{ route('articles.edit', ['id' => $article->id ])}}"> -->
          <button class="btn btn-sm btn-outline-secondary">
            <i class="ion-edit"></i> Edit Article
          </button>
          <!-- </form> -->

          <form id="delete_{{ $article->id }}" method="post" action="{{ route('articles.destroy', ['id' => $article->id ])}}">
            @csrf
            <a href="#" data-id="{{ $article->id }}" onclick="deletePost(this)" class="btn btn-sm btn-outline-danger">
              <i class="ion-trash-a"></i> Delete Article
            </a>
        </div>
      </div>

      <!-- コメント -->
      <div class="row">
        <div class="col-xs-12 col-md-8 offset-md-2">
          <form method="post" action="{{ route('articles.store') }}">
            <div class="card-block">
              <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
            </div>
            <div class="card-footer">
              <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              <button class="btn btn-sm btn-primary">Post Comment</button>
            </div>
          </form>

          <div class="card">
            <div class="card-block">
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
              </p>
            </div>
            <div class="card-footer">
              <a href="/profile/author" class="comment-author">
                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              </a>
              &nbsp;
              <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
              <span class="date-posted">Dec 29th</span>
            </div>
          </div>

          <div class="card">
            <div class="card-block">
              <p class="card-text">
                With supporting text below as a natural lead-in to additional content.
              </p>
            </div>
            <div class="card-footer">
              <a href="/profile/author" class="comment-author">
                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
              </a>
              &nbsp;
              <a href="/profile/jacob-schmidt" class="comment-author">Jacob Schmidt</a>
              <span class="date-posted">Dec 29th</span>
              <span class="mod-options">
                <i class="ion-trash-a"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<footer>
  <div class="container">
    <a href="/" class="logo-font">conduit</a>
    <span class="attribution">
      An interactive learning project from <a href="https://thinkster.io">Thinkster</a>. Code &amp;
      design licensed under MIT.
    </span>
  </div>
</footer>

<!-- 確認メッセージ -->
<script>
  function deletePost(e) {
    'use strict'
    if (confirm('本当に削除していいですか？')) {
      document.getElementById('delete_' + e.dataset.id).submit()
    }
  }
</script>

</html>
