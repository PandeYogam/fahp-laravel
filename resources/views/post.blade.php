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
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                <h5>by. <a href="/posts?admin?={{$post->admin->username }}" class="text-decoration-none">{{$post->admin->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
                
                <img src="https://source.unsplash.com/1200x400?{{ $post->title }}" alt="{{ $post->title }}" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <div>
                  <h3>Comments Section </h3>
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