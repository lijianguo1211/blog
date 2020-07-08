@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
@endsection

@section('header_content')
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h3 class="mb-0">Post title</h3>
                    <div class="mb-1 text-muted">Nov 11</div>
                    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    LiYi ~
                </h3>
                @if(!empty($topBlog))
                    <div class="blog-post">
                        <h2 class="blog-post-title">
                            <a href="{{ route('blog_details', ['id' => $topBlog['id']]) }}">{{ $topBlog['title'] }}</a>
                        </h2>
                        <p class="blog-post-meta">{{ $topBlog['created_at'] }} <a href="#">Mark</a></p>
                        {!! $topBlog['blog_detail']['post_content_info'] !!}
                    </div>
                @endif

                @if(!empty($allBlog))
                    @foreach($allBlog as $item)
                        <div class="blog-post">
                            <h2 class="blog-post-title">
                                <a href="{{ route('blog_details', ['id' => $item['id']]) }}">
                                    {{ $item['title'] }}
                                </a>
                            </h2>
                            <p class="blog-post-meta">{{ $item['created_at'] }} <a href="#">Mark</a></p>
                            {!! $item['blog_detail']['post_content_info'] !!}
                        </div>
                    @endforeach
                @endif
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    @empty($homeSources)
                        <h4 class="font-italic">
                            <a href="/" target="_blank">
                                吃瓜
                            </a>
                        </h4>
                        <p class="mb-0">LIYi
                            今日LiYi吃瓜
                        </p>
                    @else
                        <h4 class="font-italic">
                            <a href="{{ $homeSources['from_there'] }}" target="_blank">
                                {{ $homeSources['theme'] }}
                            </a>
                        </h4>
                        <p class="mb-0">{{ $homeSources['author'] }}
                            {{ $homeSources['content'] }}
                        </p>
                    @endempty
                </div>

                <div class="p-4">
                    <h4 class="font-italic">阅读推荐</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($rankingList as $item)
                            <li><a href="{{ route('blog_details', ['id' => $item['id']]) }}">{{ $item['title'] }}</a></li>
                        @endforeach
                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">点击排行榜</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">友情链接</h4>
                    <ol class="list-unstyled">
                        @empty($linkService)
                            <li><a target="_blank" href="https://www.zhihu.com/">ZhiHu</a></li>
                            <li><a target="_blank" href="https://github.com/">GitHub</a></li>
                            <li><a target="_blank" href="https://laravel.com/">Laravel</a></li>
                        @else
                            @foreach($linkService as $item)
                                <li><a target="_blank" href="{{ $item['title_slug'] }}">{{ $item['title'] }}</a></li>
                            @endforeach
                        @endempty

                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main>
@endsection
