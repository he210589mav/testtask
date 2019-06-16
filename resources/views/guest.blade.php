@extends('layouts.app')

@section('content')
    <!--main content start-->

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">

                                <div class="post-content">
                                    <header class="entry-header text-center text-uppercase">
                                        <h3 class="text-uppercase">Оставьте свой отзыв</h3>
                                        <br>
                                        <form class="form-horizontal contact-form" role="form" method="post" action="{{route('guest.store')}}">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z-0-9\s]+s[A-Za-z-'0-9\s]+"
                                                           placeholder="Введите свое имя, используются цифры и буквы латинского алфавита" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Введите ваш email" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">

										<textarea class="form-control" rows="6" id="text" name="text" pattern=""
                                                  placeholder="Введите ваше сообщение" required></textarea>
                                                </div>
                                            </div>
                                            {{csrf_field()}}
                                            <br>
                                            <div class="selectme_forcss">
                                                <img id="img_xabcapt" src="https://api.xab.su?api=get_img_captca" >
                                            </div>

                                            <input required class="xab_captcha"/>
                                             <br>
                                            <input class="btn btn-primary" type="submit" value="Сохранить">

                                        </form>

                                    </header>
                    </article>
                </div>


            </div>
        </div>
<br>
        @foreach($guests as $guest)

            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <article class="post">
                                <div class="post-thumb">
            <div class="col-md-12">
                        <div class="text-center ">
                            {!!$guest->name!!}|| {!!$guest->email!!}||{!!$guest->created_at!!}<br>
                            {!!$guest->text!!}
                            <hr>
                        </div>
                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @endforeach
    {{$guests->links()}}
        <!-- end main content-->

@endsection
