@extends('front.layouts.layouts')

@section('title')
    @parent
    {{ "Логин" }}
@endsection

@section('content')
    <div class="register-box " style="margin: 0 auto;">
        <div class="register-logo" style="margin-top: 200px;">
            <b>Логин</b>
        </div>

        <div class="card">

            <div class="card-body register-card-body">
                <form action="{{route('auth')}}" method="POST">
                    @csrf


                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8">

                        </div>

                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>

                    </div>
                </form>


            </div>

        </div>
    </div>
@endsection
