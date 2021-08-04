<DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">
<link href="/css/index.css" rel="stylesheet">
@yield('pageCss')
</head>
<body>
 
@yield('header')


 
<div class="contents">
    <!-- コンテンツ -->
    <div class="big">
        <div class = "back">@yield('back')</div>
        <h1> @yield('big') </h1>
    </div>

    <div class="main">
        @yield('content')
    </div>
 
    <!-- 共通メニュー -->
    <div class="sub">
        @yield('submenu')
    </div>
</div>
 
@yield('footer')
</body>
</html>