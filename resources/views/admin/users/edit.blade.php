@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование пользователя</h1>
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
                            <h3 class="card-title">Пользователь "{{$user->name}}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('users.update',['user' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           value="{{$user->name}}">
                                </div>

                            <div class="form-group">
                                <label for="description">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                          placeholder="email" value="{{$user->email}}" disabled>
                            </div>

                            <div class="form-group">
                                     <label for="thumbnail">Thumbnail</label>



                                    <div>
                                        <img class="img-thumbnail" src="/uploads/{{$user->avatar}}" width="300" id="avatar">
                                        <input type="file" name="avatar">
                                    </div>
                                </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
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
