@extends('front.layouts.layouts')

@section('title')
    @parent
    {{ "Регистрация" }}
@endsection

@section('content')


    @if (session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="register-box " style="margin: 0 auto;">
        <div class="register-logo" style="margin-top: 200px;">
            <b>Регистрация</b>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">

            <div class="card-body register-card-body">
                <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Имя" name="name" value="{{old('name')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
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

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">

                        </div>

                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
                        </div>

                    </div>
                </form>

                <a href="{{route('login')}}" class="text-center">Уже есть учетная запись</a>
            </div>

        </div>
    </div>
@endsection
