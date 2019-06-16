@extends('admin.layouts.app')

@section('content')
    <hr>
    <a href="{{route('news.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o">
            Создать новость
        </i> </a>
    <table class="table table-striped">
        <thead>
        <th>Наименование</th>
        <th>Публикация</th>
        <th class="text-right">Действие</th>
        </thead>
        <tbody>
        @forelse($news as $new)
            <tr>
                <td>{{$new->title}}</td>
                <td>{{$new->published}}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                          action="{{route('news.destroy', $new)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{csrf_field()}}
                        <a class="btn btn-default" href="{{route('news.edit',$new)}}">
                            <i class="fa fa-edit"></i> </a>
                        <button type="submit" class="btn"><i class="fa fa-remove"></i></button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">
                <ul class="pagination pull-right">

                </ul>
            </td>
        </tr>
        </tfoot>
    </table>
    </div>


@endsection

