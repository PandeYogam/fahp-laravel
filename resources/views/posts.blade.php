@extends('layouts.main')

@section('container')

  <div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
      <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1> 
      
      <h5 class=" p-0 m-0 text-light">Total Post : {{$total_posts_count}}</h5>

      <div class="row justify-content-center mt-5">
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
        </div>
      </div>
    </div>
  </div>

  <div class=" container">    
    @if ($posts->count())
      <div class="card mb-3">
        <div class="fs-6 position-absolute px-3 py-2" style="background-color: rgba(0,0,0,0.4)">
          <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-white text-decoration-none">{{ $posts[0]->category->name }}</a></div>

        @if ($posts[0]->image)
          <div style="max-height: 350px; overflow:hidden" >
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}" class="card-img-top">
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
              <a href="/posts?admin={{ $posts[0]->admin }}" class="text-decoration-none">{{ $posts[0]->admin->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
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
            
              @if ($post->image)
                <div style="max-height: 350px; overflow:hidden" >
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="100%" height="225">
                </div>
              @else
                <img src="https://source.unsplash.com/600x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}">
              @endif
              
            
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="mb-3">
                <h5 class=" mb-0"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                <small class="mt-0">
                  <p class="mb-0">{{ $post->comments_count ?? 0 }} comments</p>
                </small>

                <small>
                  by. <a href="/posts?admin={{ $post->admin['username'] }}" class="text-decoration-none">{{ $post->admin['name'] }}</a>
                  in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
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
  </div>


@endsection