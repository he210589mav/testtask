@extends('admin.layouts.app')

@section('content')
    <hr>

    <table class="table table-striped">
        <thead>
        <th>Текст отзыва</th>
        <th>Публикация</th>

        <th class="text-right">Действие</th>
        </thead>
        <tbody>
        @forelse($guests as $guest)
            <tr>
                <td>{{$guest->text}}</td>
                <td>{{$guest->published}}</td>
                <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                          action="{{route('guests.destroy', $guest)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{csrf_field()}}
                        <a class="btn btn-default" href="{{route('guests.edit',$guest)}}">
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
