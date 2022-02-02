<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <title>Document</title>
</head>
<body>

<div class="contariner">
    <div class="m-5 ">Главная страница</div>
    <div class="d-flex flex-row mb-2 align-content-center flex-wrap">
        @foreach($posts as $post)
        <div class="m-5">
            <div class="card" style="width: 18rem;">
                <img src="{{$post->getImage()}}" class="card-img-top" width="200" >

                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <p class="mb-1 text-muted">{{$post->created_at}}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
