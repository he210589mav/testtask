@extends('admin.layouts.app')

@section('content')
    <form class="form-horizontal" action="{{route('guests.update', $guests)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <label for="">Статус</label>
        <select class="form-control" name="published">
            @if (isset($guests->id))
                <option value="0" @if ($guests->published==0) selected="" @endif> Не опубликовано</option>
                <option value="1" @if ($guests->published==1) selected="" @endif> Опубликовано</option>
            @else
                <option value="0"> Не опубликовано</option>
                <option value="1"> Опубликовано</option>
            @endif
        </select>
         <div class="form-group">
            <label for="">Имя</label>
            <input type="text" class="form-control" name="name"
                   value="{{$guests->name ?? ""}}" required>
        </div>
        <label for="">Email</label>
        <textarea class="form-control" id="email" name="email">{{$guests->email ?? ""}}</textarea>
        <div class="form-group">
            <label for="">Текст отзыва</label>
            <textarea class="form-control" id="text" name="text">{{$guests->text ?? ""}}</textarea>
        </div>

        <input class="btn btn-primary" type="submit" value="Сохранить">

    </form>


@endsection
