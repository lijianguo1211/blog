@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
    <link rel="stylesheet" href="{{ mix('css/time.css') }}">
@endsection

@section('content')
    <section id="cd-timeline" class="cd-container">
        @empty($diaryList))

        @else
            @foreach($diaryList as $item)
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <img src="image/cd-icon-picture.svg" alt="Picture">
                    </div>

                    <div class="cd-timeline-content">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="image/timg.jpg" class="card-img img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['title'] }}</h5>
                                        <p class="card-text">{{ $item['content'] }}</p>
                                        <p class="card-text"><small class="text-muted">最后更新于 {{ $item['diffTime'] }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="cd-date">{{ $item['created_at'] }}</span>
                    </div>
                </div>
            @endforeach
        @endif

    </section>
@endsection
