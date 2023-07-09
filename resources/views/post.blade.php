@extends('layouts.main')

@push('css')
  @livewireStyles    
@endpush
@push('js')
  @livewireScripts
  <script>
    Livewire.on('comment_store', commentId => {
      var helloScroll = document.getElementById('comment-'+commentId);
      helloScroll.scrollIntoView({behavior: 'smooth'}, true);
    })
  </script>
@endpush

@section('container')
<div class="container-xxl bg-dark hero-background">
  <div class="row justify-content-center text-white">
    <div style=" height: 100px"></div>
    <div class="col-8">

      <article class="blog-post">
        <h1 class="mb-1 text-white">{{ $post->title }}</h1>
        <p class="mb-1 blog-post-meta">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}
          by <a href="#">{{ $post->admin->name }}</a></p>

        <div class="nav-scroller py-1 mb-3 y-1 border-bottom">
          <nav class="nav nav-underline d-flex flex-wrap">
            @foreach ($categories as $item)
              <a class=" pe-5 px-0 py-1 nav-item nav-link link-body-emphasis
                @if ($item->name == $post->category->name)
                  active
                @else
                  text-white
                @endif" 
                href="#">
                {{ $item->name }}
              </a>
            @endforeach
          </nav>
        </div>

        <div class="container">

          <div class="row ">
            <div class="col-4 d-flex align-items-center">
              @if ($post->image)
                <div style="max-height: 350px; overflow:hidden" >
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                </div>
              @else
                <img src="https://source.unsplash.com/600x400?{{ $post->title }}" class="card-img-top" alt="{{ $post->title }}">
              @endif
            </div>
            <div class="col-8">
              <h3 class="text-white align-items">Details</h3>
              <p>Lokasi : {{ $post->lokasi }}, {{ $post->lokasi_Detail }}</p>
              <ul>
                <li>{{ $post->category->name }}, {{ $post->category_detail }}</li>
                <li>Jam Wisata : {{ $post->jam }}</li>
              </ul>
            </div>
          </div>
        </div>

      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>

      {{-- comment --}}
      <div>
        <h3 class="text-white">Comments Section </h3>
          <div>
            @livewire('post.comment', ['id' => $post->id]) 
          </div>
      </div>
    </div>
  </div>
</div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");
    
        title.addEventListener('change', function() {
          fetch('/dashboard/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
        });
    
        function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');
    
          imgPreview.style.display = 'block';
    
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
          
          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }
        }
    
      </script>
@endsection