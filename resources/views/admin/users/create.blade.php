@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый пользователь</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Новый пользователь</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Имя"
                                           value="{{old('name')}}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Email</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{old('email')}}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Password</label>
                                    <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation">
                                </div>


                                <div class="form-group">
                                    <label for="avatar">Аватар</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" id="avatar" class="custom-file-input">
                                            <label class="custom-file-label" for="avatar">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
