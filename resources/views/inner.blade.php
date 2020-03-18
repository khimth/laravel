@extends('layouts.frontend')

@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{ $post->title }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{ $user->name }}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $post->created_at->diffForHumans() }}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{ route('category.single', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                            </span>

                            </div>

                            <div class="post__content-info">

                            {!! $post->content !!}

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        <a href="#" class="w-tags-item">SEO</a>
                                        <a href="#" class="w-tags-item">Advertising</a>
                                        <a href="#" class="w-tags-item">Business</a>
                                        <a href="#" class="w-tags-item">Optimization</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials">Share:
                            <a href="#" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{ asset('app/img/blog-details-author.png')}}" alt="Author">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{ $user->name }}</h5>
                            </div>
                            <p class="text">{!! $user->profile->about !!}
                            </p>
                            <div class="socials">

                                <a href="{{ $user->profile->facebook }}" target="_blank" class="social__item">
                                    <img src="{{ asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="{{ $user->profile->youtube }}" target="_blank" class="social__item">
                                    <img src="{{ asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">
                        @if($next)
                            <a href="{{ route('single.post', ['slug' => $next->slug]) }}" class="btn-prev-wrap">
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{ $next->title }}</p>
                                </div>
                            </a>
                        @endif
                        @if($previous)
                        <a href="{{ route('single.post', ['slug' => $previous->slug]) }}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Previous Post</div>
                                <p class="btn-content-subtitle">{{ $previous->title }}</p>
                            </div>
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                        </a>
                    @endif

                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                        @include('includes.comments')
                    </div>

                    <div class="row">

                    </div>


                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                <a href="#" class="w-tags-item">SEO</a>
                                <a href="#" class="w-tags-item">Advertising</a>
                                <a href="#" class="w-tags-item">Business</a>
                                <a href="#" class="w-tags-item">Optimization</a>
                                <a href="#" class="w-tags-item">Digital Marketing</a>
                                <a href="#" class="w-tags-item">Social</a>
                                <a href="#" class="w-tags-item">Keyword</a>
                                <a href="#" class="w-tags-item">Strategy</a>
                                <a href="#" class="w-tags-item">Audience</a>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>
@endsection
