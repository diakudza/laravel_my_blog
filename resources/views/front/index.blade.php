@extends('front.layouts.layouts')

@section('title')
    @parent
    {{ "Главная" }}
@endsection

@section('main-banner')

    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">

                @foreach($posts as $post)
                    <div class="item">
                        <img src="{{$post->getImage()}}" alt="">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span>{{$post->category->title}}</span>
                                </div>
                                <a href="/post/{{$post->id}}"><h4>{{$post->description}}</h4></a>
                                <ul class="post-info">
{{--                                    <li><a href="#">Admin</a></li>--}}
                                    <li><a href="#">{{$post->created_at}}</a></li>
                                    <li><a href="#">{{count($post->comments)}} Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    @endsection

@section('aside')
    @include('front.layouts.sidebar')
@endsection

@section('content')


                                @foreach($posts as $post)
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{$post->getImage()}}" alt="">
                                        </div>
                                        <div class="down-content">
{{--                                            <span>Lifestyle</span>--}}
                                            <a href="/post/{{$post->id}}"><h4>{{$post->title}}</h4></a>
                                            <ul class="post-info">
                                                <li><a href="#">{{$post->created_at}}</a></li>
                                                <li><a href="#">{{count($post->comments)}} Comments</a></li>
                                                <li>{{$post->view}} Просмотров</li>
                                            </ul>


                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">

                                                            <li><i class="fa fa-tags"></i></li>
                                                            @foreach($post->tags as $tag)
                                                                <li><a href="#">{{$tag->title}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#"> Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

@endsection
