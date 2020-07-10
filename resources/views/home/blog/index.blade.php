@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
@endsection

@section('content')
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @empty($onlyBlogList)

                    @else
                        @foreach($onlyBlogList as $item)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a href="{{ route('home.blog_details', ['id' => $item['id']]) }}">
                                        <img src="{{ $item['img_path'] }}" style="max-height: 225px">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-text">
                                            <a class="text-dark a-remove-line" href="{{ route('home.blog_details', ['id' => $item['id']]) }}">{{ $item['title'] }}</a>
                                        </h5>
                                        <p class="card-text text-break jay-max-blog-detail-3">
                                            {!! $item['blog_detail']['post_content_info'] !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group dropright">
                                                <span class="badge badge-light tag-right">
                                                    <svg class="bi bi-hand-thumbs-up" width="1em" height="1em"
                                                         viewBox="0 0 16 16" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd"
        d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg>
                                                    {{ $item['likes_volume'] }}
                                                </span>
                                                <span class="badge badge-light tag-right">
                                                    <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                    {{ $item['reading_volume'] }}
                                                </span>

                                                <span class="badge badge-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="bi bi-tag" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M.5 2A1.5 1.5 0 0 1 2 .5h4.586a1.5 1.5 0 0 1 1.06.44l7 7a1.5 1.5 0 0 1 0 2.12l-4.585 4.586a1.5 1.5 0 0 1-2.122 0l-7-7A1.5 1.5 0 0 1 .5 6.586V2zM2 1.5a.5.5 0 0 0-.5.5v4.586a.5.5 0 0 0 .146.353l7 7a.5.5 0 0 0 .708 0l4.585-4.585a.5.5 0 0 0 0-.708l-7-7a.5.5 0 0 0-.353-.146H2z"/>
                                                    <path fill-rule="evenodd" d="M2.5 4.5a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm2-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                </svg>
                                                    <span class="dropdown-toggle">Tags</span>
                                                     @if(!empty($item['tags']))
                                                        <div class="dropdown-menu">
                                                            @foreach($item['tags'] as $tag)
                                                                <a class="dropdown-item" href="{{ $tag['tag_slug'] }}">{{ $tag['tag_name'] }}</a>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">最后更新于 {{ $item['diffTime'] }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endempty

                </div>
            </div>
        </div>
    </main>
@endsection
