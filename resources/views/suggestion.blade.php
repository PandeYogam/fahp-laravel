@extends('layouts.main')

@section('container')
  <h1 class="mb-3 text-center">Halaman {{ $title }}</h1>

  
  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('admin'))
          <input type="hidden" name="admin" value="{{ request('admin') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search">
          <button class="btn btn-danger" type="submit">Search</button>
        </div>
      </form>

      
      {{-- @foreach ($total_posts as $p) --}}
        {{-- @if ()
          
        @endif --}}
        {{-- <h5>Total Post dari count : {{count($total_posts)}}</h5> --}}
      {{-- @endforeach --}}
      
      {{-- 
      @if (old('total_posts'))
        <h5>Total Post dari count ini if : {{ count(old('total_posts')) }}</h5>
      @else
        <h5>Total Post dari count ini else : {{count($total_posts)}}</h5>
      @endif --}}
      {{-- @php
      
        $totalPost = count($total_posts)
      @endphp
      <h5>Total Post dari count : {{count($total_posts)}}</h5>
      <h5>{{ $totalPost }}</h5> --}}
      {{-- @foreach ($total_posts as $post)
      @endforeach --}}

    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3">
      @if ($posts[0]->image)
        <div style="max-height: 350px; overflow:hidden" >
          <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}" class="img-fluid mt-3">
        </div>
      @else
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->title }}" class="card-img-top" alt="{{ $posts[0]->title }}">
      @endif


      <div class="card-body">
        <h3 class="card-title">
          <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
            {{ $posts[0]->title }}
          </a>
        </h3>
        <p>by. 
          <small class="text-body-secondary">
            <a href="/posts?admin={{ $posts[0]->admin->username }}" class="text-decoration-none">{{ $posts[0]->admin->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        
        <a name="" id="" class="btn btn-primary text-decoration-none" href="/posts/{{ $posts[0]->slug }}" role="button">Read More</a>
      </div>
    </div>
  

  <div class="row">
    @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3 d-flex align-items-stretch">
        <div class="card">
          <div class="fs-6 position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.4)">
            <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
          <img src="https://source.unsplash.com/600x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}">
          
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
              <h5><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>

              <small>
                by. <a href="/posts?admin={{ $post->admin->username }}" class="text-decoration-none">{{ $post->admin->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
              </small>

              <p class="card-text">{{ $post->excerpt }}</p>
            </div>

            <div class="d-flex justify-content-between">
              <div>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
              </div>
              <div class="align-self-end">
                {{ $post->created_at->diffForHumans() }}
              </div>
            </div>
            

          </div>
        </div>
      </div>
    @endforeach
  </div>

  @else
    <p class="text-center fs-4">No Post Found.</p>
  @endif

  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>

@endsection