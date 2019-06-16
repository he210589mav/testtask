@extends('admin.layouts.app')

@section('content')

    <form class="form-horizontal" action="{{route('news.update', $news)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <label for="">Статус</label>
        <select class="form-control" name="published">
            @if (isset($news->id))
                <option value="0" @if ($news->published==0) selected="" @endif> Не опубликовано</option>
                <option value="1" @if ($news->published==1) selected="" @endif> Опубликовано</option>
            @else
                <option value="0"> Не опубликовано</option>
                <option value="1"> Опубликовано</option>
            @endif
        </select>
        <div class="form-group">
        <label for="">Лицевая картинка</label>
        <input type="file" id="image" name="image" value="{{$news->image ?? ""}}" >
        </div>
            <div class="form-group">
        <label for="">Заголовок</label>
        <input type="text" class="form-control" name="title" placeholder="Заголовок новости"
               value="{{$news->title ?? ""}}" required>
            </div>
        <label for="">Краткое описание</label>
        <textarea class="form-control" id="description" name="description">{{$news->description ?? ""}}</textarea>
                <div class="form-group">
        <label for="">Полное описание</label>
        <textarea class="form-control" id="content" name="content">{{$news->content ?? ""}}</textarea>
                </div>

        <input class="btn btn-primary" type="submit" value="Сохранить">

    </form>

@endsection

