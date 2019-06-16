@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">
                            <header class="entry-header text-center text-uppercase">
                            <img src="{{$news->getImg()}}" width="500" height="310"alt="">

                        <div class="post-content">

                                <h1 class="entry-title">{{$news->title}}</h1>

                        </div>
                            </header>

                            <div class="entry-content">
                                {!! $news->content !!}
                            </div>

                            <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">{{$news->created_at}}</span>

                            </div>
                            <ul class="text-center pull-right">
                                <li><a class="" ><i class="">Просмотров: {{$news->viewed}}</i></a></li>

                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endsection