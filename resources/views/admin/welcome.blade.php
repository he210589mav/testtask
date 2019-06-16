@extends('admin.layouts.app')

@section('content')
    <div class="text-right ">
        Сортировка новостей:
        <a href="/date">по дате</a> ||
        <a href="/views">по просмотрам</a>
    </div>
    @foreach($news as $new)

        <div class="content">
            <div class="title m-b-md">
                <header class="entry-header text-center text-uppercase">
                    <h1 class="entry-title"><a href="{{route('news.show', $new->slug)}}">{{$new->title}}</a></h1>
                </header>
            </div>
            <div class="entry-content">


                <div class="btn-continue-reading text-center text-uppercase">
                    {!!$new->description!!}
                </div>
            </div>
        </div>

    @endforeach
    {{$news->links()}}

@endsection


