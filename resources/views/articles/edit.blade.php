<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8" />
  <title>Conduit ArticleCreste</title>
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

  <!-- 入力画面 -->
  <div class="editor-page">
    <div class="container page">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
          <ul class="error-messages">
            <li>That title is required</li>
          </ul>

          <form method="post" action="{{ route('articles.update', ['id' => $article->id ]) }}">
            @csrf
            <fieldset>
              <fieldset class="form-group">
                <input type="text" id="title" name="title" value="{{ $article->title }}" class="form-control form-control-lg" placeholder="Article Title" />
              </fieldset>
              <fieldset class="form-group">
                <input type="text" id="aboutArticle" name="aboutArticle" value="{{ $article->aboutArticle }}" class="form-control" placeholder="What's this article about?" />
              </fieldset>
              <fieldset class="form-group">
                <textarea id="article" name="article" class="form-control" rows="8" placeholder="Write your article (in markdown)">{{ $article->article }}</textarea>
              </fieldset>
              <fieldset class="form-group">
                <input type="text" id="tag" name="tag" value="{{ $article->tag }}" class="form-control" placeholder="Enter tags" />
                <div class="tag-list">
                  <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
                </div>
              </fieldset>
              <button class="btn btn-lg pull-xs-right btn-primary">edit Article
              </button>
            </fieldset>
          </form>
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
