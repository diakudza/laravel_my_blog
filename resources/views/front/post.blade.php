@extends('front.layouts.layouts')

@section('title',"$post->title")

@section('main-banner')

    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>{{$post->title}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('aside')
 @include('front.layouts.sidebar')
@endsection

@section('content')

    <div class="all-blog-posts">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="{{$post->getImage()}}" alt="">
                    </div>
                    <div class="down-content">
                        <span>{{$post->category->title}}</span>
                        <a href="post-details.html"><h4>{{$post->title}}</h4></a>
                        <ul class="post-info">

                            <li><a href="#">{{$post->created_at}}</a></li>

                        </ul>
                        <p>{!! $post->content !!}</p>
                        <div class="post-options">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <li><a href="#">Best Templates</a>,</li>
                                        <li><a href="#">TemplateMo</a></li>
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
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                        <h2>{{count($post->comments)}} comments</h2>
                    </div>
                    <div class="content">
                        <ul>

                            @foreach($comments as $comment)
                            <li>
                                <div class="author-thumb">
                                    <img src="../uploads/{{$user->find($comment->user_id)->avatar}}" alt="">
                                </div>
                                <div class="right-content">
                                    <h4>{{$user->find($comment->user_id)->name}}<span>{{$comment->created_at}}</span></h4>
                                    <p>{{$comment->title}}</p>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

            @auth()
                <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                        <h2>Your comment</h2>
                    </div>
                    <div class="content">
                        <form id="comment" action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="content" rows="6" id="message" placeholder="Оставьте свой комментарий" required="">{{old('content')}}</textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Submit</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endauth

            </div>
        </div>
    </div>
@endsection
