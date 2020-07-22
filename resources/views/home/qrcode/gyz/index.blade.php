@extends('home.basics.default')

@section('css')
    <link rel="stylesheet" href="{{ mix('/css/home.css') }}">
@endsection

@section('content')
    <main role="main" class="container">

        <div class="jay-alert">

        </div>

        <nav>
            <div class="nav nav-tabs" id="jay-nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-text-tab" data-toggle="tab" href="#nav-text" role="tab" aria-controls="nav-text" aria-selected="true">
                    文本
                </a>
                <a class="nav-item nav-link" id="nav-website-tab" data-toggle="tab" href="#nav-website" role="tab" aria-controls="nav-website" aria-selected="false">
                    网址
                </a>
                <a class="nav-item nav-link" id="nav-img-tab" data-toggle="tab" href="#nav-img" role="tab" aria-controls="nav-img" aria-selected="false">
                    图片
                </a>
            </div>
        </nav>
        <div class="row jay-row-qrcode">
            <div class="col-md-8">
                <div class="tab-content jay-tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-text" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="qrcode-content-form">
                            <div class="form-group">
                                <label for="qrcode-content">文本内容</label>
                                <textarea class="form-control" placeholder="请输入文本内容" id="qrcode-content" rows="10"></textarea>
                                <input type="hidden" name="ajaxUrl" value="{{ route('home.gyz.ajaxTest') }}">
                            </div>

                            <button class="btn btn-primary qrcode-content-submit">生成二维码</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-website" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="qrcode-website">把网址直接生成二维码，扫描访问</label>
                                    <input type="text" class="form-control" placeholder="http://" id="qrcode-website" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">生成二维码</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-img" role="tabpanel" aria-labelledby="nav-contact-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="jay-qrocde-show">

                </div>
                <div class="jay-qrcode-download" style="display: none">
                    <span class="btn btn-dark">download</span>
                </div>
            </div>
        </div>
    </main>
@endsection
