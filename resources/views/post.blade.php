@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                <h5>by. <a href="/posts?admin?={{$post->admin->username }}" class="text-decoration-none">{{$post->admin->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
                
                <img src="https://source.unsplash.com/1200x400?{{ $post->title }}" alt="{{ $post->title }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block mt-3">back</a>
            </div>
        </div>
    </div>
    
@endsection