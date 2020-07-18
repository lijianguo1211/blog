@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
@endsection

@section('content')
    <main role="main" class="container">
        <div class="row jay">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="a-remove-line" href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="a-remove-line" href="{{ route('home.blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(!empty($blogDetail['categories']))
                                {{ $blogDetail['categories'][0]['categories_name'] }}
                            @endif
                        </li>
                    </ol>
                </nav>
                @if(!empty($blogDetail))
                    <div class="blog-post">
                        <div>
                            <h2 class="blog-post-title">{{ $blogDetail['title'] }}</h2>
                            <div class="blog-post-meta">{{ $blogDetail['created_at'] }}
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                </svg>
                                <em class="jay-name"> LIYI </em>
                            </div>


                        </div>

                        <div class="language-php-jay">
                            {!! $blogDetail['blog_detail']['content_html'] !!}
                        </div>

                    </div>
                @endif

                <div class="meta">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                    @if(!empty($blogDetail['tags']))
                        @foreach($blogDetail['tags'] as $item)
                            <a class="badge badge-dark a-remove-line" href="{{ $item['tag_slug'] }}">{{ $item['tag_name'] }}</a>
                        @endforeach
                    @endif
                </div>

                <div class="card box_margin_max_35">
                    <div class="card-body">
                        <a href="javascript:void(0);" class="new_a_liyi">
                            @if(empty($blogDetail))
                                <input type="hidden" value="{{ route('home.addLikes', ['id' => 0]) }}" class="add">
                                <input type="hidden" value="{{ route('home.removeLikes', ['id' => 0]) }}" class="remove">
                            @else
                                <input type="hidden" value="{{ route('home.addLikes', ['id' => $blogDetail['id']]) }}" class="add">
                                <input type="hidden" value="{{ route('home.removeLikes', ['id' => $blogDetail['id']]) }}" class="remove">
                            @endif


                            <div style="display: none" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                            </svg>
                            <span class="likes_count">@if(!empty($blogDetail)) {{ $blogDetail['likes_volume'] }} @else 0 @endif </span>人点赞
                        </a>
                    </div>
                </div>

                <div class="card box_margin_max_35">
                    <p class="card-header">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                        请勿发布不友善或者负能量的内容。与人为善，比聪明更重要！
                    </p>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea id="liyi_post_detail_comment" class="form-control" rows="3"></textarea>
                            @csrf
                            @if(empty($blogDetail))
                                <input type="hidden" class="comment" value="{{ route('home.comment', ['id' => 0]) }}">
                            @else
                                <input type="hidden" class="comment" value="{{ route('home.comment', ['id' => $blogDetail['id']]) }}">
                            @endif
                        </div>
                        <a href="javascript:void(0);" type="button" class="btn btn-dark jay-float-right">
                            <svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                <path fill-rule="evenodd"
                                      d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                <path
                                    d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                            </svg>
                            评论
                        </a>

                    </div>
                </div>
            </div>

            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    @empty($homeSources)
                        <h4 class="font-italic">
                            <a  class="text-dark a-remove-line" href="/" target="_blank">
                                吃瓜
                            </a>
                        </h4>
                        <p class="mb-0">LIYi
                            今日LiYi吃瓜
                        </p>
                    @else
                        <h4 class="font-italic">
                            <a class="a-remove-line" href="{{ $homeSources['from_there'] }}" target="_blank">
                                {{ $homeSources['theme'] }}
                            </a>
                        </h4>
                        <p class="mb-0">{{ $homeSources['author'] }}
                            {{ $homeSources['content'] }}
                        </p>
                    @endempty
                </div>

                <div class="p-4">
                    <h4>阅读推荐</h4>
                    <ul class="list-group">
                        @foreach($rankingList as $item)
                            <a class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center" href="{{ route('home.blog_details', ['id' => $item['id']]) }}">{{ $item['title'] }}<span class="badge jay-badge badge-pill">{{ $item['reading_volume'] }}</span></a>
                        @endforeach
                    </ul>
                </div>

                <div class="p-4">
                    <h4>点击排行榜</h4>
                    <ul class="list-group">
                        @foreach($likesList as $item)
                            <a class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center" href="{{ route('home.blog_details', ['id' => $item['id']]) }}">{{ $item['title'] }}<span class="badge jay-badge badge-pill">{{ $item['likes_volume'] }}</span></a>
                        @endforeach
                    </ul>
                </div>

                @if(!empty($seriesList))
                    <div class="p-4">
                        <h4>系列文章</h4>
                        <ul class="list-group">
                            @foreach($seriesList as $item)
                            <a href="{{ route('home.blog_details', ['id' => $item['id']]) }}" class="list-group-item list-group-item-action list-group-item-light d-flex justify-content-between align-items-center">{{ $item['title'] }}<span class="badge jay-badge badge-pill">{{ $item['reading_volume'] }}</span></a>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="p-4">
                    <h4>友情链接</h4>
                    <ul class="list-group">
                        @empty($linkService)
                            <a class="list-group-item list-group-item-action list-group-item-light" target="_blank" href="https://www.zhihu.com/">ZhiHu</a>
                            <a class="list-group-item list-group-item-action list-group-item-light" target="_blank" href="https://github.com/">GitHub</a>
                            <a class="list-group-item list-group-item-action list-group-item-light" target="_blank" href="https://laravel.com/">Laravel</a>
                        @else
                            @foreach($linkService as $item)
                                <a class="list-group-item list-group-item-action list-group-item-light" target="_blank" href="{{ $item['title_slug'] }}">{{ $item['title'] }}</a>
                            @endforeach
                        @endempty
                    </ul>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main>

    <template class="liyi_loading">
        <div class="spinner-border spinner-border-sm" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </template>
@endsection
