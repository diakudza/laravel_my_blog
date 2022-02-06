
@section('blogItem')
<div class="blog-post">
    <div class="blog-thumb">
        <img src="{{asset("front/".$post->getImage())}}" alt="">
    </div>
    <div class="down-content">
        <span>Lifestyle</span>
        <a href="post-details.html"><h4>{{$post->title}}</h4></a>
        <ul class="post-info">
            <li><a href="#">{{$post->created_at}}</a></li>
            <li><a href="#">12 Comments</a></li>
        </ul>
        <p>{!! $post->content !!}<a rel="nofollow" href="https://templatemo.com/contact" target="_parent">Contact TemplateMo</a> for more info. Thank you.</p>

        <div class="post-options">
            <div class="row">
                <div class="col-6">
                    <ul class="post-tags">
                        <li><i class="fa fa-tags"></i></li>
                        <li><a href="#">Beauty</a>,</li>
                        <li><a href="#">Nature</a></li>
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

@endsection




