@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
@endsection

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <p class="pb-4 mb-4 border-bottom">
                    <em><a href="{{ route('/') }}">首页</a></em> | <em><a href="{{ route('blog') }}">Blog</a></em> | <em>{{ $blogDetail['title'] }}</em>
                </p>
                @if(!empty($blogDetail))
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $blogDetail['title'] }}</h2>
                        <p class="blog-post-meta">{{ $blogDetail['created_at'] }} <a href="#">Mark</a></p>
                        {!! $blogDetail['blog_detail']['content_md'] !!}
                    </div>
                @endif
            </div>

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
