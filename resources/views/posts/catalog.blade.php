@extends('layout')
@section('content')


<div class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="bradcumbContent">
        <h2>Catálogo</h2>
    </div>
</div>

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @if (isset($category))
                            <div class="row section-padding-left-15">
                                <h3>Publicaciones de la categoría: '{{$category->name}}'</h3>
                            </div>
                            @endif
                            @foreach($posts as $post)
                            <!-- Single Top Popular Course -->
                            <div class="col-12">
                                <div class="etiquetas wow fadeInUp" data-wow-delay="300ms">
                                    <span> <a href="{{route('categories.show',$post->category)}}" style="color: inherit; text-decoration: underline;">{{$post->category->name}}</a></span>
                                </div>
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                @if(isset($post->photos->first()->url))
                                <div class="blog-post-thumb mb-50">
                                    <img src="/storage/{{$post->photos->first()->url}}" alt="">
                                </div>
                                @endif
                                <a href="/post/{{$post->url}}" class="post-title">{{ $post->title }}</a>
                                <div class="post-meta">
                                    <p>By <a href="#">{{$post->owner->name}}</a> | <a href="#">Termina {{$post->published_at->diffForHumans()}}</a> | 
                                        @foreach($post->tags as $tag)
                                            <a href="{{route('tags.show',$tag)}}">
                                                #{{$tag->name}}
                                            </a>
                                        @endforeach
                                    </p>
                                </div>
                                    <!-- Post Excerpt -->
                                <p>{{str_limit($post->excerpt, 100)}}</p>
                                            <!-- Read More btn -->
                                <a href="/post/{{$post->url}}" class="btn academy-btn btn-sm mt-15">Leer más</a>
                                </div>
                            </div>
                            <!-- END -->
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    {{$posts->links()}}
                </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->
                        <div class="blog-post-search-widget mb-30">
                            <form action="#" method="post">
                                <input type="search" name="search" id="Search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Categorías</h5>
                            <ul>
                                @foreach($categories as $cat)
                                    <li><a href="{{route('categories.show',$cat->url)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="/img/blog-img/lb-1.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-2.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>A great way to start</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-3.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="img/blog-img/lb-4.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Start your training</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="/img/blog-img/add.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@stop


