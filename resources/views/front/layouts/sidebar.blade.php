
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" method="GET" action="{{route('search')}}">
                        <input type="text" name="searchInput" class="searchText" placeholder="type to search..." autocomplete="on" value="{{old('searchInput')}}">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Последние посты</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($lastPosts as $post)
                                <li>
                                    <a href="/post/{{$post->slug}}">
                                        <h5>{{$post->title}}</h5>
                                        <span>{{$post->created_at}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Категории</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="#">- {{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Тэги</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($tags as $tag)
                                <li><a href="#">{{$tag->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


